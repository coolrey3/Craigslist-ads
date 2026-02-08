<?php

declare(strict_types=1);

namespace Tests;

use PHPUnit\Framework\TestCase;

/**
 * Tests for the footer component.
 */
class FooterTest extends TestCase
{
    private string $projectRoot;

    protected function setUp(): void
    {
        $this->projectRoot = dirname(__DIR__);
    }

    // ── Footer Rendering ───────────────────────────────────────

    public function testFooterContainsExpectedLinks(): void
    {
        $output = $this->renderFooter();

        $expectedLinks = [
            'POS',
            'Website Front End',
            'Website Back End',
            'Facebook',
            'Tasks',
            'Marketing Cards',
            'Craigslist Ads',
        ];

        foreach ($expectedLinks as $link) {
            $this->assertStringContainsString($link, $output);
        }
    }

    public function testFooterLinksAreSorted(): void
    {
        $output = $this->renderFooter();

        // Links should be alphabetically sorted
        $this->assertGreaterThan(
            strpos($output, 'Craigslist Ads'),
            strpos($output, 'Facebook'),
            'Links should be sorted alphabetically'
        );
        
        $this->assertGreaterThan(
            strpos($output, 'Marketing Cards'),
            strpos($output, 'POS'),
            'Links should be sorted alphabetically'
        );
    }

    public function testFooterHasCorrectStructure(): void
    {
        $output = $this->renderFooter();

        $this->assertStringContainsString('class="footer-bar"', $output);
        $this->assertStringContainsString('<div', $output);
    }

    public function testFooterLinksHaveCorrectFormat(): void
    {
        $output = $this->renderFooter();

        // All links should be anchor tags
        $linkCount = substr_count($output, '<a href=');
        $this->assertGreaterThanOrEqual(5, $linkCount);
    }

    public function testFooterLinksSeparatedByPipes(): void
    {
        $output = $this->renderFooter();

        // Links should be separated by pipes
        $pipeCount = substr_count($output, ' | ');
        
        // Should have (number of links - 1) pipes
        $linkCount = substr_count($output, '<a href=');
        $this->assertSame($linkCount - 1, $pipeCount);
    }

    public function testFooterEscapesUrls(): void
    {
        $output = $this->renderFooter();

        // Check that special characters in URLs are properly escaped
        $this->assertStringNotContainsString('"><script>', $output);
        
        // URLs should be within quotes
        $this->assertMatchesRegularExpression('/<a href=[\'"][^"\']+["\']>/', $output);
    }

    public function testFooterEscapesLabels(): void
    {
        $output = $this->renderFooter();

        // Labels should not contain raw HTML
        $this->assertStringNotContainsString('<script>', $output);
    }

    public function testFooterHasStyles(): void
    {
        $output = $this->renderFooter();

        // Should include CSS styles
        $this->assertStringContainsString('<style>', $output);
        $this->assertStringContainsString('.footer-bar', $output);
        $this->assertStringContainsString('background-color', $output);
    }

    public function testFooterStylesIncludeHoverEffect(): void
    {
        $output = $this->renderFooter();

        $this->assertStringContainsString('.footer-bar a:hover', $output);
        $this->assertStringContainsString('text-decoration: underline', $output);
    }

    // ── Link Validation ────────────────────────────────────────

    public function testFooterAllLinksHaveUrls(): void
    {
        $output = $this->renderFooter();

        // Extract all hrefs
        preg_match_all('/href=[\'"]([^\'"]+)[\'"]/', $output, $matches);
        $urls = $matches[1];

        foreach ($urls as $url) {
            $this->assertNotEmpty($url, 'All links should have URLs');
            $this->assertStringStartsWith('http', $url, 'URLs should start with http');
        }
    }

    public function testFooterAllLinksHaveLabels(): void
    {
        $output = $this->renderFooter();

        // Extract all link text content
        preg_match_all('/<a[^>]*>([^<]+)<\/a>/', $output, $matches);
        $labels = $matches[1];

        foreach ($labels as $label) {
            $this->assertNotEmpty(trim($label), 'All links should have labels');
        }
    }

    // ── Helper Methods ─────────────────────────────────────────

    /**
     * Render the footer and capture its output.
     *
     * @return string The rendered footer HTML
     */
    private function renderFooter(): string
    {
        $path = $this->projectRoot . '/footer.php';
        
        if (!file_exists($path)) {
            $this->fail("Footer file not found: {$path}");
        }

        ob_start();
        include $path;
        $output = ob_get_clean();
        
        return $output ?: '';
    }
}
