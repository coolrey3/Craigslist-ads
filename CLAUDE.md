# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## Project Overview

Craigslist-ads is a PHP web application for bulk-generating Craigslist ad listings for an electronics/phone repair business. Users enter product details (brand, model, storage, color, condition, carrier, price) and the app generates formatted, ready-to-post ad copy.

## Commands

```bash
# Run with PHP built-in server
php -S localhost:8000

# Access at http://localhost:8000/index.php

# Run PHP syntax check
php -l index.php craigslist.php craigslistresults.php footer.php

# Run PHP CodeSniffer (if installed)
phpcs --standard=phpcs.xml .
```

## Architecture

- **index.php** — Landing page: user enters how many ads to create
- **craigslist.php** — Dynamic form: generates input rows for each listing
- **craigslistresults.php** — Output page: renders formatted ad copy for each listing
- **footer.php** — Shared footer nav component with links to internal tools
- **craigslist.css** — Shared stylesheet
- **Images/** — Store photos, device type icons, favicon
- **Front-end files/** — Legacy/backup frontend assets

## Data Flow

1. `index.php` → POST `quantity` → `craigslist.php`
2. `craigslist.php` → POST arrays (type[], brand[], model[], etc.) → `craigslistresults.php`
3. `craigslistresults.php` → renders formatted ads

## Tech Stack

- PHP 7+ (no frameworks, no Composer dependencies)
- HTML/CSS (no JavaScript frameworks)
- CI: GitHub Actions for PHP linting + CodeSniffer

## Security Notes

- All user input is sanitized with `htmlspecialchars()` before output
- Quantity is validated as integer between 1-100
- POST method is verified before processing form data
- Required array fields are validated before use
