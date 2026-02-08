<?php

declare(strict_types=1);

namespace Tests;

use PHPUnit\Framework\TestCase;

/**
 * Integration tests for the web page workflows.
 * Tests the full request/response cycle for each page.
 */
class IntegrationTest extends TestCase
{
    private string $projectRoot;

    protected function setUp(): void
    {
        $this->projectRoot = dirname(__DIR__);
    }

    // ── index.php ──────────────────────────────────────────────

    public function testIndexPageRenders(): void
    {
        $output = $this->renderPage('index.php');

        $this->assertStringContainsString('Craigslist Quick Lister', $output);
        $this->assertStringContainsString('how many listings', $output);
        $this->assertStringContainsString('craigslist.php', $output);
    }

    public function testIndexPageHasQuantityInput(): void
    {
        $output = $this->renderPage('index.php');

        $this->assertStringContainsString('type=\'number\'', $output);
        $this->assertStringContainsString('name=\'quantity\'', $output);
        $this->assertStringContainsString('min=\'1\'', $output);
        $this->assertStringContainsString('max=\'100\'', $output);
    }

    public function testIndexPageHasSubmitButton(): void
    {
        $output = $this->renderPage('index.php');

        $this->assertStringContainsString('type=\'submit\'', $output);
        $this->assertStringContainsString('value=\'Submit\'', $output);
    }

    public function testIndexPageIncludesFooter(): void
    {
        $output = $this->renderPage('index.php');

        // Footer should be included
        $this->assertStringContainsString('footer-bar', $output);
    }

    // ── craigslist.php ─────────────────────────────────────────

    public function testCraigslistPageWithValidQuantity(): void
    {
        $_POST = ['quantity' => '3'];
        $output = $this->renderPage('craigslist.php');

        $this->assertStringContainsString('Fill in information below', $output);
        $this->assertStringContainsString('Generate Ads', $output);
        
        // Should have 3 rows
        $this->assertSame(3, substr_count($output, '<tr class=\'row\'>'));
    }

    public function testCraigslistPageHasAllInputFields(): void
    {
        $_POST = ['quantity' => '1'];
        $output = $this->renderPage('craigslist.php');

        // Check for all required input fields
        $this->assertStringContainsString('name=\'type[]\'', $output);
        $this->assertStringContainsString('name=\'brand[]\'', $output);
        $this->assertStringContainsString('name=\'model[]\'', $output);
        $this->assertStringContainsString('name=\'size[]\'', $output);
        $this->assertStringContainsString('name=\'color[]\'', $output);
        $this->assertStringContainsString('name=\'condition[]\'', $output);
        $this->assertStringContainsString('name=\'carrier[]\'', $output);
        $this->assertStringContainsString('name=\'price[]\'', $output);
    }

    public function testCraigslistPageHasTypeOptions(): void
    {
        $_POST = ['quantity' => '1'];
        $output = $this->renderPage('craigslist.php');

        // Check for product type options
        $expectedTypes = ['Phone', 'Computer', 'Console', 'Laptop', 'Tablet', 'TV', 'Accessory'];
        foreach ($expectedTypes as $type) {
            $this->assertStringContainsString("value='{$type}'", $output);
        }
    }

    public function testCraigslistPageHasConditionOptions(): void
    {
        $_POST = ['quantity' => '1'];
        $output = $this->renderPage('craigslist.php');

        // Check for condition options
        $expectedConditions = ['Great', 'Mint', 'Excellent', 'Good', 'Fair', 'Poor', 'Broken', 'As-Is'];
        foreach ($expectedConditions as $condition) {
            $this->assertStringContainsString("value='{$condition}'", $output);
        }
    }

    public function testCraigslistPageHasCarrierOptions(): void
    {
        $_POST = ['quantity' => '1'];
        $output = $this->renderPage('craigslist.php');

        // Check for carrier options
        $expectedCarriers = ['AT&amp;T', 'Cricket', 'T-Mobile', 'Verizon', 'Boost', 'Straight Talk', 'Sprint', 'Unlocked'];
        foreach ($expectedCarriers as $carrier) {
            $this->assertStringContainsString($carrier, $output);
        }
    }

    public function testCraigslistPageRedirectsOnInvalidQuantity(): void
    {
        $_POST = ['quantity' => '0'];
        
        // Capture redirect
        ob_start();
        $this->expectOutputRegex('/Invalid quantity/');
        
        try {
            include $this->projectRoot . '/craigslist.php';
        } catch (\Exception $e) {
            // header() will trigger an exception in test context
        }
        
        ob_end_clean();
        
        // Reset POST for other tests
        $_POST = [];
    }

    public function testCraigslistPageRedirectsOnQuantityTooHigh(): void
    {
        $_POST = ['quantity' => '101'];
        
        ob_start();
        $this->expectOutputRegex('/Invalid quantity/');
        
        try {
            include $this->projectRoot . '/craigslist.php';
        } catch (\Exception $e) {
            // header() will trigger an exception in test context
        }
        
        ob_end_clean();
        
        $_POST = [];
    }

    public function testCraigslistPageRedirectsOnNegativeQuantity(): void
    {
        $_POST = ['quantity' => '-5'];
        
        ob_start();
        $this->expectOutputRegex('/Invalid quantity/');
        
        try {
            include $this->projectRoot . '/craigslist.php';
        } catch (\Exception $e) {
            // header() will trigger an exception in test context
        }
        
        ob_end_clean();
        
        $_POST = [];
    }

    // ── craigslistresults.php ──────────────────────────────────

    public function testResultsPageWithValidData(): void
    {
        $_SERVER['REQUEST_METHOD'] = 'POST';
        $_POST = [
            'quantity' => '2',
            'type' => ['Phone', 'Tablet'],
            'brand' => ['Apple', 'Samsung'],
            'model' => ['iPhone 14', 'Galaxy Tab S8'],
            'size' => ['128 GB', '256 GB'],
            'color' => ['Black', 'Silver'],
            'condition' => ['Excellent', 'Great'],
            'carrier' => ['AT&T', 'T-Mobile'],
            'price' => ['$299', '$399'],
        ];

        $output = $this->renderPage('craigslistresults.php');

        // Check for ad content
        $this->assertStringContainsString('Below are your 2 Ads', $output);
        $this->assertStringContainsString('Apple iPhone 14', $output);
        $this->assertStringContainsString('Samsung Galaxy Tab S8', $output);
        $this->assertStringContainsString('$299', $output);
        $this->assertStringContainsString('$399', $output);
        $this->assertStringContainsString('90-Day Warranty', $output);
    }

    public function testResultsPageIncludesStoreInfo(): void
    {
        $_SERVER['REQUEST_METHOD'] = 'POST';
        $_POST = $this->samplePostData(1);

        $output = $this->renderPage('craigslistresults.php');

        $this->assertStringContainsString('Cell Phone Repair of Gainesville', $output);
        $this->assertStringContainsString('4203 NW 16th BLVD', $output);
        $this->assertStringContainsString('352-575-0438', $output);
        $this->assertStringContainsString('352-448-8408', $output);
    }

    public function testResultsPageSanitizesInput(): void
    {
        $_SERVER['REQUEST_METHOD'] = 'POST';
        $_POST = [
            'quantity' => '1',
            'type' => ['Phone'],
            'brand' => ['<script>alert("xss")</script>'],
            'model' => ['Test<br>Model'],
            'size' => ['128 GB'],
            'color' => ['"Quoted"'],
            'condition' => ['Excellent'],
            'carrier' => ['AT&T'],
            'price' => ['$299'],
        ];

        $output = $this->renderPage('craigslistresults.php');

        // XSS should be escaped
        $this->assertStringNotContainsString('<script>', $output);
        $this->assertStringContainsString('&lt;script&gt;', $output);
        
        // HTML should be escaped
        $this->assertStringNotContainsString('<br>', $output);
        $this->assertStringContainsString('&lt;br&gt;', $output);
        
        // Quotes should be escaped
        $this->assertStringContainsString('&quot;Quoted&quot;', $output);
    }

    // ── Helper Methods ─────────────────────────────────────────

    /**
     * Render a PHP page and capture its output.
     *
     * @param string $filename Relative filename (e.g., 'index.php')
     * @return string The rendered HTML output
     */
    private function renderPage(string $filename): string
    {
        $path = $this->projectRoot . '/' . $filename;
        
        if (!file_exists($path)) {
            $this->fail("Page not found: {$path}");
        }

        ob_start();
        
        // Suppress any headers or exit() calls in test context
        try {
            include $path;
        } catch (\Exception $e) {
            // Catch header() exceptions in test context
        }
        
        $output = ob_get_clean();
        
        return $output ?: '';
    }

    /**
     * Generate sample POST data for testing.
     *
     * @param int $quantity Number of items
     * @return array<string, mixed>
     */
    private function samplePostData(int $quantity): array
    {
        $data = [
            'quantity' => (string) $quantity,
            'type' => [],
            'brand' => [],
            'model' => [],
            'size' => [],
            'color' => [],
            'condition' => [],
            'carrier' => [],
            'price' => [],
        ];

        for ($i = 0; $i < $quantity; $i++) {
            $data['type'][] = 'Phone';
            $data['brand'][] = 'Apple';
            $data['model'][] = 'iPhone 14';
            $data['size'][] = '128 GB';
            $data['color'][] = 'Black';
            $data['condition'][] = 'Excellent';
            $data['carrier'][] = 'AT&T';
            $data['price'][] = '$299';
        }

        return $data;
    }

    protected function tearDown(): void
    {
        // Clean up global state
        $_POST = [];
        $_SERVER = [];
    }
}
