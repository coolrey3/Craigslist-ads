# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## Project Overview

Craigslist-ads is a PHP web application for searching and displaying Craigslist listings.

## Commands

```bash
# Run with PHP built-in server
php -S localhost:8000

# Access at http://localhost:8000/index.php
```

## Architecture

- **index.php** - Main entry point/landing page
- **craigslist.php** - Craigslist search logic
- **craigslistresults.php** - Results display page
- **footer.php** - Shared footer component
- **craigslist.css** - Styles
- **Front-end files/** - Static frontend assets
- **Images/** - Image assets

## Tech Stack

- PHP 7+
- HTML/CSS
- Craigslist scraping/API
