# Craigslist Ads Bulk Creator

A PHP web application for quickly generating bulk Craigslist ad listings for electronics and phone repair businesses. Enter product details in a form and get ready-to-post ad copy with consistent formatting.

## What It Does

1. **Enter quantity** — Specify how many listings you want to create
2. **Fill in details** — A dynamic form generates rows for each listing (type, brand, model, storage, color, condition, carrier, price)
3. **Generate ads** — Produces formatted ad copy for each listing, ready to copy-paste into Craigslist

## Tech Stack

- PHP 7+
- HTML / CSS
- No external dependencies

## Setup

### Requirements

- PHP 7.0 or higher

### Running Locally

```bash
# Clone the repository
git clone https://github.com/coolrey3/Craigslist-ads.git
cd Craigslist-ads

# Start PHP's built-in development server
php -S localhost:8000

# Open in your browser
# http://localhost:8000/index.php
```

### Running with Apache/Nginx

Place the project files in your web server's document root (e.g., `/var/www/html/Craigslist-ads/`) and access via your server's URL.

## Project Structure

```
Craigslist-ads/
├── index.php                # Landing page — enter number of ads
├── craigslist.php           # Dynamic form for entering product details
├── craigslistresults.php    # Generated ad copy output
├── craigslist.css           # Shared styles
├── images/                  # Image assets (store photos, etc.)
├── .editorconfig            # Editor formatting rules
├── phpcs.xml                # PHP CodeSniffer configuration
└── .github/
    └── workflows/
        └── lint.yml         # CI workflow for PHP linting
```

## Usage

1. Open `index.php` in your browser
2. Enter the number of ads you want to create
3. Fill in the product details for each listing (brand, model, storage, color, condition, carrier, price)
4. Click **Generate Ads**
5. Copy the generated ad text and paste it into your Craigslist posting

## Notes

- The footer includes a reference to `../Frontend/footer.php` — ensure this file exists relative to the project if you want the footer to render
- The `images/` folder should contain a `store.jpg` file referenced by the ad template

## License

This project is provided as-is for personal/business use.
