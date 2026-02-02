<?php

/**
 * AdGenerator - Core logic for generating Craigslist ad listings.
 *
 * Extracted from craigslistresults.php to enable unit testing.
 */
class AdGenerator
{
    /** @var string */
    private $storeName;

    /** @var string */
    private $storeAddress;

    /** @var string */
    private $storeHours;

    /** @var string */
    private $phoneCall;

    /** @var string */
    private $phoneText;

    public function __construct(
        string $storeName = 'Cell Phone Repair of Gainesville',
        string $storeAddress = '4203 NW 16th BLVD. Gainesville, FL. 32605',
        string $storeHours = 'Monday-Saturday 10:00am-7:00pm',
        string $phoneCall = '352-575-0438',
        string $phoneText = '352-448-8408'
    ) {
        $this->storeName = $storeName;
        $this->storeAddress = $storeAddress;
        $this->storeHours = $storeHours;
        $this->phoneCall = $phoneCall;
        $this->phoneText = $phoneText;
    }

    /**
     * Generate the ad title line for a single listing.
     *
     * @param string $brand   Product brand
     * @param string $model   Product model
     * @param string $size    Storage size
     * @param string $color   Product color
     * @param string $carrier Phone carrier
     *
     * @return string The formatted title line
     */
    public function generateTitle(
        string $brand,
        string $model,
        string $size,
        string $color,
        string $carrier
    ): string {
        return "{$brand} {$model} {$size} {$color} ({$carrier}) 90-Day Warranty!!!";
    }

    /**
     * Generate the ad body text for a single listing.
     *
     * @param string $brand     Product brand
     * @param string $model     Product model
     * @param string $size      Storage size
     * @param string $type      Product type (Phone, Tablet, etc.)
     * @param string $condition Product condition
     * @param string $carrier   Phone carrier
     *
     * @return string The formatted ad body text
     */
    public function generateBody(
        string $brand,
        string $model,
        string $size,
        string $type,
        string $condition,
        string $carrier
    ): string {
        $body = "Hey everyone, we currently have an {$brand} {$model} {$size} up for sale! ";
        $body .= "This {$type} is in {$condition} condition, it's clean for activation ";
        $body .= "and is ready to be activated on {$carrier}. ";
        $body .= "All {$type} purchases from us come with a 90-day warranty so you can rest ";
        $body .= "assured you'll have no problems with your new {$type}.";
        $body .= "\n\n";
        $body .= "We also carry a wide range of accessories such as colored tempered glass, ";
        $body .= "cases, chargers, portable battery packs etc. Please stop by and check out our ";
        $body .= "growing inventory. We repair all electronic devices from phones and tablets to ";
        $body .= "computers, laptops, game consoles and more!";
        $body .= "\n\n";
        $body .= "All phones and tablets include charger block and cable";
        $body .= "\n\n";
        $body .= "Financing through PayPal credit is available for all purchases over \$99, ";
        $body .= "no payments and no interest for the first 6 months!";
        $body .= "\n\n";
        $body .= "{$this->storeName}\n";
        $body .= "{$this->storeAddress}\n";
        $body .= "Hours of operation: {$this->storeHours}\n";
        $body .= "Please Call: {$this->phoneCall} Text: {$this->phoneText}";

        return $body;
    }

    /**
     * Generate a full ad (title + price + body) for a single listing.
     *
     * @param array<string, string> $listing Associative array with keys:
     *     brand, model, size, color, carrier, price, type, condition
     *
     * @return array{title: string, price: string, body: string, store: string}
     */
    public function generateAd(array $listing): array
    {
        return [
            'title' => $this->generateTitle(
                $listing['brand'],
                $listing['model'],
                $listing['size'],
                $listing['color'],
                $listing['carrier']
            ),
            'price' => $listing['price'],
            'body' => $this->generateBody(
                $listing['brand'],
                $listing['model'],
                $listing['size'],
                $listing['type'],
                $listing['condition'],
                $listing['carrier']
            ),
            'store' => $this->storeName,
        ];
    }

    /**
     * Generate ads for multiple listings.
     *
     * @param array<int, array<string, string>> $listings Array of listing data
     *
     * @return array<int, array{title: string, price: string, body: string, store: string}>
     */
    public function generateBulkAds(array $listings): array
    {
        $ads = [];
        foreach ($listings as $listing) {
            $ads[] = $this->generateAd($listing);
        }
        return $ads;
    }

    /**
     * Parse POST data from the craigslist.php form into structured listings.
     *
     * @param array<string, mixed> $postData The $_POST data
     *
     * @return array<int, array<string, string>> Structured listing data
     */
    public static function parseFormData(array $postData): array
    {
        $quantity = (int) ($postData['quantity'] ?? 0);
        $listings = [];

        for ($i = 0; $i < $quantity; $i++) {
            $listings[] = [
                'brand'     => $postData['brand'][$i] ?? '',
                'model'     => $postData['model'][$i] ?? '',
                'size'      => $postData['size'][$i] ?? '',
                'color'     => $postData['color'][$i] ?? '',
                'condition' => $postData['condition'][$i] ?? '',
                'carrier'   => $postData['carrier'][$i] ?? '',
                'price'     => $postData['price'][$i] ?? '',
                'type'      => $postData['type'][$i] ?? '',
            ];
        }

        return $listings;
    }

    /**
     * Validate a single listing has required fields.
     *
     * @param array<string, string> $listing The listing data
     *
     * @return array<int, string> Array of missing field names (empty if valid)
     */
    public static function validateListing(array $listing): array
    {
        $required = ['brand', 'model', 'type', 'condition', 'carrier', 'price'];
        $missing = [];

        foreach ($required as $field) {
            if (empty(trim($listing[$field] ?? ''))) {
                $missing[] = $field;
            }
        }

        return $missing;
    }
}
