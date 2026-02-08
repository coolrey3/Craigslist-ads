<?php

declare(strict_types=1);

namespace Tests;

use AdGenerator;
use PHPUnit\Framework\TestCase;

/**
 * Edge case and boundary testing for AdGenerator.
 */
class EdgeCasesTest extends TestCase
{
    private AdGenerator $generator;

    protected function setUp(): void
    {
        $this->generator = new AdGenerator();
    }

    // ── Boundary Values ────────────────────────────────────────

    public function testGenerateTitleWithVeryLongBrand(): void
    {
        $longBrand = str_repeat('A', 100);
        $title = $this->generator->generateTitle(
            $longBrand,
            'Model',
            '128 GB',
            'Black',
            'AT&T'
        );

        $this->assertStringContainsString($longBrand, $title);
    }

    public function testGenerateTitleWithVeryLongModel(): void
    {
        $longModel = str_repeat('X', 150);
        $title = $this->generator->generateTitle(
            'Brand',
            $longModel,
            '128 GB',
            'Black',
            'AT&T'
        );

        $this->assertStringContainsString($longModel, $title);
    }

    public function testGenerateBodyWithVeryLongStrings(): void
    {
        $longBrand = str_repeat('B', 200);
        $longModel = str_repeat('M', 200);
        
        $body = $this->generator->generateBody(
            $longBrand,
            $longModel,
            '128 GB',
            'Phone',
            'Excellent',
            'AT&T'
        );

        $this->assertStringContainsString($longBrand, $body);
        $this->assertStringContainsString($longModel, $body);
    }

    public function testGenerateTitleWithEmptyStrings(): void
    {
        $title = $this->generator->generateTitle('', '', '', '', '');
        
        // Should still generate a title with warranty text
        $this->assertStringContainsString('90-Day Warranty', $title);
    }

    public function testGenerateBodyWithEmptyStrings(): void
    {
        $body = $this->generator->generateBody('', '', '', '', '', '');
        
        // Should still contain store info
        $this->assertStringContainsString('Cell Phone Repair of Gainesville', $body);
    }

    // ── Special Characters ─────────────────────────────────────

    public function testGenerateTitleWithSpecialCharacters(): void
    {
        $title = $this->generator->generateTitle(
            'AT&T',
            'Phone™',
            '256 GB',
            'Café',
            'T-Mobile®'
        );

        $this->assertStringContainsString('AT&T', $title);
        $this->assertStringContainsString('™', $title);
        $this->assertStringContainsString('Café', $title);
        $this->assertStringContainsString('®', $title);
    }

    public function testGenerateBodyWithUnicodeCharacters(): void
    {
        $body = $this->generator->generateBody(
            '苹果',  // Apple in Chinese
            'iPhone 📱',
            '128 GB',
            'Phone',
            'Excellent',
            'AT&T'
        );

        $this->assertStringContainsString('苹果', $body);
        $this->assertStringContainsString('📱', $body);
    }

    public function testGenerateTitleWithQuotes(): void
    {
        $title = $this->generator->generateTitle(
            'Brand "Premium"',
            'Model \'Pro\'',
            '128 GB',
            'Color',
            'Carrier'
        );

        $this->assertStringContainsString('"Premium"', $title);
        $this->assertStringContainsString("'Pro'", $title);
    }

    public function testGenerateBodyWithNewlines(): void
    {
        $body = $this->generator->generateBody(
            "Brand\nName",
            "Model\nNumber",
            '128 GB',
            'Phone',
            'Excellent',
            'AT&T'
        );

        // Should preserve newlines in brand/model names
        $this->assertStringContainsString("Brand\nName", $body);
    }

    // ── Array Operations ───────────────────────────────────────

    public function testGenerateBulkAdsWithLargeArray(): void
    {
        $listings = [];
        for ($i = 0; $i < 100; $i++) {
            $listings[] = $this->sampleListing();
        }

        $ads = $this->generator->generateBulkAds($listings);

        $this->assertCount(100, $ads);
    }

    public function testGenerateBulkAdsWithSingleItem(): void
    {
        $ads = $this->generator->generateBulkAds([$this->sampleListing()]);

        $this->assertCount(1, $ads);
        $this->assertArrayHasKey('title', $ads[0]);
    }

    public function testGenerateBulkAdsWithMixedData(): void
    {
        $listings = [
            $this->sampleListing(['brand' => '']),
            $this->sampleListing(['model' => '']),
            $this->sampleListing(),
        ];

        $ads = $this->generator->generateBulkAds($listings);

        $this->assertCount(3, $ads);
    }

    // ── Form Data Parsing Edge Cases ──────────────────────────

    public function testParseFormDataWithNegativeQuantity(): void
    {
        $post = ['quantity' => '-1'];
        $listings = AdGenerator::parseFormData($post);

        $this->assertCount(0, $listings);
    }

    public function testParseFormDataWithFloatQuantity(): void
    {
        $post = ['quantity' => '2.5'];
        $listings = AdGenerator::parseFormData($post);

        // Should truncate to 2
        $this->assertCount(2, $listings);
    }

    public function testParseFormDataWithStringQuantity(): void
    {
        $post = ['quantity' => 'abc'];
        $listings = AdGenerator::parseFormData($post);

        $this->assertCount(0, $listings);
    }

    public function testParseFormDataWithVeryLargeQuantity(): void
    {
        $post = [
            'quantity' => '1000',
            'brand' => array_fill(0, 1000, 'Apple'),
        ];

        $listings = AdGenerator::parseFormData($post);

        $this->assertCount(1000, $listings);
    }

    public function testParseFormDataWithMismatchedArrayLengths(): void
    {
        $post = [
            'quantity' => '3',
            'brand' => ['Apple', 'Samsung'],  // Only 2 items
            'model' => ['iPhone', 'Galaxy', 'Pixel'],  // 3 items
        ];

        $listings = AdGenerator::parseFormData($post);

        $this->assertCount(3, $listings);
        // Third listing should have empty brand
        $this->assertSame('', $listings[2]['brand']);
    }

    public function testParseFormDataWithNonArrayFields(): void
    {
        $post = [
            'quantity' => '1',
            'brand' => 'Apple',  // Not an array
        ];

        // Should handle gracefully without throwing errors
        $listings = AdGenerator::parseFormData($post);

        $this->assertCount(1, $listings);
    }

    // ── Validation Edge Cases ─────────────────────────────────

    public function testValidateListingWithAllEmptyStrings(): void
    {
        $listing = [
            'brand' => '',
            'model' => '',
            'size' => '',
            'color' => '',
            'condition' => '',
            'carrier' => '',
            'price' => '',
            'type' => '',
        ];

        $missing = AdGenerator::validateListing($listing);

        // All required fields should be reported as missing
        $this->assertGreaterThanOrEqual(4, count($missing));
    }

    public function testValidateListingWithOnlyWhitespace(): void
    {
        $listing = [
            'brand' => '   ',
            'model' => "\t\t",
            'size' => "\n",
            'color' => '  ',
            'condition' => '   ',
            'carrier' => "\t",
            'price' => '  ',
            'type' => "\n\t",
        ];

        $missing = AdGenerator::validateListing($listing);

        $this->assertContains('brand', $missing);
        $this->assertContains('model', $missing);
        $this->assertContains('type', $missing);
    }

    public function testValidateListingWithMissingKeys(): void
    {
        $listing = [
            'brand' => 'Apple',
            // Missing other keys
        ];

        $missing = AdGenerator::validateListing($listing);

        $this->assertGreaterThan(0, count($missing));
    }

    public function testValidateListingWithNullValues(): void
    {
        $this->expectException(\TypeError::class);
        
        $listing = [
            'brand' => null,
            'model' => 'Model',
            'type' => 'Phone',
            'condition' => 'Good',
            'carrier' => 'AT&T',
            'price' => '$299',
        ];

        AdGenerator::validateListing($listing);
    }

    // ── Store Info Edge Cases ─────────────────────────────────

    public function testCustomStoreInfoWithEmptyStrings(): void
    {
        $custom = new AdGenerator('', '', '', '', '');
        $body = $custom->generateBody(
            'Apple',
            'iPhone',
            '128 GB',
            'Phone',
            'Excellent',
            'AT&T'
        );

        // Should still generate body without store info
        $this->assertStringContainsString('Apple', $body);
    }

    public function testCustomStoreInfoWithSpecialCharacters(): void
    {
        $custom = new AdGenerator(
            'Ray\'s "Best" Phone Shop',
            '123 Main St. & Co.',
            'Mon-Fri 9:00am-5:00pm',
            '(555) 123-4567',
            '555.987.6543'
        );

        $body = $custom->generateBody(
            'Apple',
            'iPhone',
            '128 GB',
            'Phone',
            'Excellent',
            'AT&T'
        );

        $this->assertStringContainsString('Ray\'s "Best" Phone Shop', $body);
        $this->assertStringContainsString('123 Main St. & Co.', $body);
        $this->assertStringContainsString('(555) 123-4567', $body);
    }

    public function testCustomStoreInfoWithVeryLongStrings(): void
    {
        $longName = str_repeat('A', 500);
        $custom = new AdGenerator($longName, '', '', '', '');
        
        $body = $custom->generateBody(
            'Apple',
            'iPhone',
            '128 GB',
            'Phone',
            'Excellent',
            'AT&T'
        );

        $this->assertStringContainsString($longName, $body);
    }

    // ── Type Variations ────────────────────────────────────────

    public function testGenerateBodyWithDifferentProductTypes(): void
    {
        $types = ['Phone', 'Tablet', 'Computer', 'Laptop', 'Console', 'TV', 'Accessory'];

        foreach ($types as $type) {
            $body = $this->generator->generateBody(
                'Brand',
                'Model',
                '128 GB',
                $type,
                'Excellent',
                'AT&T'
            );

            $this->assertStringContainsString($type, $body);
        }
    }

    public function testGenerateBodyWithLowercaseType(): void
    {
        $body = $this->generator->generateBody(
            'Apple',
            'iPhone',
            '128 GB',
            'phone',  // lowercase
            'Excellent',
            'AT&T'
        );

        $this->assertStringContainsString('phone', $body);
    }

    public function testGenerateBodyWithMixedCaseType(): void
    {
        $body = $this->generator->generateBody(
            'Apple',
            'iPhone',
            '128 GB',
            'PhOnE',  // mixed case
            'Excellent',
            'AT&T'
        );

        $this->assertStringContainsString('PhOnE', $body);
    }

    // ── Helper Methods ─────────────────────────────────────────

    /**
     * @param array<string, string> $overrides
     * @return array<string, string>
     */
    private function sampleListing(array $overrides = []): array
    {
        return array_merge([
            'brand'     => 'Apple',
            'model'     => 'iPhone 14',
            'size'      => '128 GB',
            'color'     => 'Black',
            'condition' => 'Excellent',
            'carrier'   => 'AT&T',
            'price'     => '$199',
            'type'      => 'Phone',
        ], $overrides);
    }
}
