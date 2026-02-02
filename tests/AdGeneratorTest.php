<?php

declare(strict_types=1);

namespace Tests;

use AdGenerator;
use PHPUnit\Framework\TestCase;

/**
 * Unit tests for the AdGenerator class.
 */
class AdGeneratorTest extends TestCase
{
    private AdGenerator $generator;

    protected function setUp(): void
    {
        $this->generator = new AdGenerator();
    }

    // ── generateTitle ──────────────────────────────────────────

    public function testGenerateTitleContainsAllFields(): void
    {
        $title = $this->generator->generateTitle(
            'Apple',
            'iPhone 14',
            '128 GB',
            'Black',
            'AT&T'
        );

        $this->assertStringContainsString('Apple', $title);
        $this->assertStringContainsString('iPhone 14', $title);
        $this->assertStringContainsString('128 GB', $title);
        $this->assertStringContainsString('Black', $title);
        $this->assertStringContainsString('AT&T', $title);
        $this->assertStringContainsString('90-Day Warranty', $title);
    }

    public function testGenerateTitleFormat(): void
    {
        $title = $this->generator->generateTitle(
            'Samsung',
            'Galaxy S23',
            '256 GB',
            'White',
            'Verizon'
        );

        $this->assertSame(
            'Samsung Galaxy S23 256 GB White (Verizon) 90-Day Warranty!!!',
            $title
        );
    }

    // ── generateBody ───────────────────────────────────────────

    public function testGenerateBodyContainsBrandAndModel(): void
    {
        $body = $this->generator->generateBody(
            'Apple',
            'iPhone 14',
            '128 GB',
            'Phone',
            'Excellent',
            'T-Mobile'
        );

        $this->assertStringContainsString('Apple', $body);
        $this->assertStringContainsString('iPhone 14', $body);
        $this->assertStringContainsString('128 GB', $body);
    }

    public function testGenerateBodyContainsCondition(): void
    {
        $body = $this->generator->generateBody(
            'Apple',
            'iPhone 14',
            '128 GB',
            'Phone',
            'Mint',
            'AT&T'
        );

        $this->assertStringContainsString('Mint condition', $body);
    }

    public function testGenerateBodyContainsCarrier(): void
    {
        $body = $this->generator->generateBody(
            'Apple',
            'iPhone 14',
            '128 GB',
            'Phone',
            'Good',
            'Unlocked'
        );

        $this->assertStringContainsString('activated on Unlocked', $body);
    }

    public function testGenerateBodyContainsType(): void
    {
        $body = $this->generator->generateBody(
            'Apple',
            'iPad Pro',
            '256 GB',
            'Tablet',
            'Great',
            'WiFi'
        );

        $this->assertStringContainsString('This Tablet is in', $body);
        $this->assertStringContainsString('All Tablet purchases', $body);
    }

    public function testGenerateBodyContainsStoreInfo(): void
    {
        $body = $this->generator->generateBody(
            'Apple',
            'iPhone 14',
            '128 GB',
            'Phone',
            'Excellent',
            'AT&T'
        );

        $this->assertStringContainsString('Cell Phone Repair of Gainesville', $body);
        $this->assertStringContainsString('4203 NW 16th BLVD', $body);
        $this->assertStringContainsString('352-575-0438', $body);
        $this->assertStringContainsString('352-448-8408', $body);
    }

    public function testGenerateBodyContainsFinancingInfo(): void
    {
        $body = $this->generator->generateBody(
            'Apple',
            'iPhone 14',
            '128 GB',
            'Phone',
            'Good',
            'AT&T'
        );

        $this->assertStringContainsString('PayPal credit', $body);
        $this->assertStringContainsString('$99', $body);
        $this->assertStringContainsString('6 months', $body);
    }

    // ── Custom store info ──────────────────────────────────────

    public function testCustomStoreInfo(): void
    {
        $custom = new AdGenerator(
            'My Phone Shop',
            '123 Main St',
            'Mon-Fri 9-5',
            '555-1234',
            '555-5678'
        );

        $body = $custom->generateBody(
            'Google',
            'Pixel 8',
            '128 GB',
            'Phone',
            'Excellent',
            'Fi'
        );

        $this->assertStringContainsString('My Phone Shop', $body);
        $this->assertStringContainsString('123 Main St', $body);
        $this->assertStringContainsString('Mon-Fri 9-5', $body);
        $this->assertStringContainsString('555-1234', $body);
        $this->assertStringContainsString('555-5678', $body);
    }

    // ── generateAd ─────────────────────────────────────────────

    public function testGenerateAdReturnsExpectedKeys(): void
    {
        $ad = $this->generator->generateAd($this->sampleListing());

        $this->assertArrayHasKey('title', $ad);
        $this->assertArrayHasKey('price', $ad);
        $this->assertArrayHasKey('body', $ad);
        $this->assertArrayHasKey('store', $ad);
    }

    public function testGenerateAdPriceMatchesInput(): void
    {
        $listing = $this->sampleListing();
        $listing['price'] = '$299';

        $ad = $this->generator->generateAd($listing);

        $this->assertSame('$299', $ad['price']);
    }

    public function testGenerateAdStoreMatchesDefault(): void
    {
        $ad = $this->generator->generateAd($this->sampleListing());

        $this->assertSame('Cell Phone Repair of Gainesville', $ad['store']);
    }

    // ── generateBulkAds ────────────────────────────────────────

    public function testGenerateBulkAdsReturnsCorrectCount(): void
    {
        $listings = [
            $this->sampleListing(),
            $this->sampleListing(['brand' => 'Samsung', 'model' => 'Galaxy S23']),
            $this->sampleListing(['brand' => 'Google', 'model' => 'Pixel 8']),
        ];

        $ads = $this->generator->generateBulkAds($listings);

        $this->assertCount(3, $ads);
    }

    public function testGenerateBulkAdsEmptyInput(): void
    {
        $ads = $this->generator->generateBulkAds([]);

        $this->assertCount(0, $ads);
        $this->assertSame([], $ads);
    }

    public function testGenerateBulkAdsEachAdIsUnique(): void
    {
        $listings = [
            $this->sampleListing(['brand' => 'Apple']),
            $this->sampleListing(['brand' => 'Samsung']),
        ];

        $ads = $this->generator->generateBulkAds($listings);

        $this->assertStringContainsString('Apple', $ads[0]['title']);
        $this->assertStringContainsString('Samsung', $ads[1]['title']);
    }

    // ── parseFormData ──────────────────────────────────────────

    public function testParseFormDataSingleItem(): void
    {
        $post = [
            'quantity' => '1',
            'brand'    => ['Apple'],
            'model'    => ['iPhone 14'],
            'size'     => ['128 GB'],
            'color'    => ['Black'],
            'condition' => ['Excellent'],
            'carrier'  => ['AT&T'],
            'price'    => ['$199'],
            'type'     => ['Phone'],
        ];

        $listings = AdGenerator::parseFormData($post);

        $this->assertCount(1, $listings);
        $this->assertSame('Apple', $listings[0]['brand']);
        $this->assertSame('iPhone 14', $listings[0]['model']);
        $this->assertSame('Phone', $listings[0]['type']);
    }

    public function testParseFormDataMultipleItems(): void
    {
        $post = [
            'quantity' => '2',
            'brand'    => ['Apple', 'Samsung'],
            'model'    => ['iPhone 14', 'Galaxy S23'],
            'size'     => ['128 GB', '256 GB'],
            'color'    => ['Black', 'White'],
            'condition' => ['Excellent', 'Good'],
            'carrier'  => ['AT&T', 'Verizon'],
            'price'    => ['$199', '$249'],
            'type'     => ['Phone', 'Phone'],
        ];

        $listings = AdGenerator::parseFormData($post);

        $this->assertCount(2, $listings);
        $this->assertSame('Samsung', $listings[1]['brand']);
        $this->assertSame('Galaxy S23', $listings[1]['model']);
    }

    public function testParseFormDataZeroQuantity(): void
    {
        $post = ['quantity' => '0'];
        $listings = AdGenerator::parseFormData($post);

        $this->assertCount(0, $listings);
    }

    public function testParseFormDataMissingQuantity(): void
    {
        $post = [];
        $listings = AdGenerator::parseFormData($post);

        $this->assertCount(0, $listings);
    }

    public function testParseFormDataMissingFieldsDefaultToEmpty(): void
    {
        $post = [
            'quantity' => '1',
            'brand'    => ['Apple'],
            'model'    => ['iPhone 14'],
            // missing: size, color, condition, carrier, price, type
        ];

        $listings = AdGenerator::parseFormData($post);

        $this->assertCount(1, $listings);
        $this->assertSame('Apple', $listings[0]['brand']);
        $this->assertSame('', $listings[0]['size']);
        $this->assertSame('', $listings[0]['color']);
    }

    // ── validateListing ────────────────────────────────────────

    public function testValidateListingAllFieldsPresent(): void
    {
        $missing = AdGenerator::validateListing($this->sampleListing());

        $this->assertEmpty($missing);
    }

    public function testValidateListingMissingBrand(): void
    {
        $listing = $this->sampleListing(['brand' => '']);
        $missing = AdGenerator::validateListing($listing);

        $this->assertContains('brand', $missing);
    }

    public function testValidateListingMissingMultipleFields(): void
    {
        $listing = $this->sampleListing([
            'brand' => '',
            'price' => '',
            'carrier' => '  ',
        ]);

        $missing = AdGenerator::validateListing($listing);

        $this->assertContains('brand', $missing);
        $this->assertContains('price', $missing);
        $this->assertContains('carrier', $missing);
        $this->assertCount(3, $missing);
    }

    public function testValidateListingWhitespaceOnlyIsMissing(): void
    {
        $listing = $this->sampleListing(['model' => '   ']);
        $missing = AdGenerator::validateListing($listing);

        $this->assertContains('model', $missing);
    }

    public function testValidateListingOptionalFieldsNotRequired(): void
    {
        // size and color are optional
        $listing = $this->sampleListing(['size' => '', 'color' => '']);
        $missing = AdGenerator::validateListing($listing);

        $this->assertEmpty($missing);
    }

    // ── Helpers ────────────────────────────────────────────────

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
