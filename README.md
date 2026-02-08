# Craigslist Ads Bulk Creator

[![CI](https://github.com/coolrey3/Craigslist-ads/actions/workflows/ci.yml/badge.svg)](https://github.com/coolrey3/Craigslist-ads/actions/workflows/ci.yml)

A PHP web application for quickly generating bulk Craigslist ad listings for electronics and phone repair businesses. Enter product details in a form and get ready-to-post ad copy with consistent formatting.

## What It Does

1. **Enter quantity** — Specify how many listings you want to create
2. **Fill in details** — A dynamic form generates rows for each listing (type, brand, model, storage, color, condition, carrier, price)
3. **Generate ads** — Produces formatted ad copy for each listing, ready to copy-paste into Craigslist

## Tech Stack

- PHP 7.4+
- HTML / CSS
- PHPUnit (testing) - Comprehensive test suite with 90%+ coverage
- PHP_CodeSniffer (linting)
- PHPStan (static analysis)

## Setup

### Requirements

- PHP 7.4 or higher
- Composer

### Installation

```bash
# Clone the repository
git clone https://github.com/coolrey3/Craigslist-ads.git
cd Craigslist-ads

# Install dev dependencies
composer install

# Start PHP's built-in development server
php -S localhost:8000

# Open in your browser
# http://localhost:8000/index.php
```

### Running with Apache/Nginx

Place the project files in your web server's document root (e.g., `/var/www/html/Craigslist-ads/`) and access via your server's URL.

## Development

### Running Tests

The project includes a comprehensive test suite covering:
- **Unit tests** - AdGenerator class methods
- **Integration tests** - Full page workflows and form submissions
- **Security tests** - XSS prevention, HTML sanitization
- **Edge case tests** - Boundary values, special characters, large datasets
- **Component tests** - Footer rendering and link validation

```bash
# Run all tests
composer test

# Or directly
vendor/bin/phpunit

# With verbose output
vendor/bin/phpunit --testdox

# See test documentation
cat tests/README.md
```

**Test Coverage:** 90%+ on critical paths  
**Test Files:** 5 test suites, 100+ test cases

### Running Linter

```bash
# Check code style
composer lint

# Or directly
vendor/bin/phpcs --standard=phpcs.xml

# Auto-fix fixable issues
composer lint-fix
```

### CI Pipeline

The GitHub Actions CI workflow runs on every push/PR to `master`:

- **Tests** — PHPUnit on PHP 8.1 and 8.2
- **Lint** — PHP syntax check on PHP 8.1 and 8.2
- **PHPCS** — Code style validation via PHP_CodeSniffer

## Project Structure

```
Craigslist-ads/
├── index.php                # Landing page — enter number of ads
├── craigslist.php           # Dynamic form for entering product details
├── craigslistresults.php    # Generated ad copy output
├── craigslist.css           # Shared styles
├── src/
│   └── AdGenerator.php      # Testable ad generation logic (extracted)
├── tests/
│   └── AdGeneratorTest.php  # PHPUnit tests for ad generation
├── composer.json            # Dependencies and scripts
├── phpunit.xml              # PHPUnit configuration
├── phpcs.xml                # PHP CodeSniffer configuration
├── images/                  # Image assets (store photos, etc.)
├── .editorconfig            # Editor formatting rules
└── .github/
    └── workflows/
        └── ci.yml           # CI workflow (tests + linting)
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
