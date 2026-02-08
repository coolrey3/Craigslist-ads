<?php

/**
 * Shared utility functions for the Craigslist ads application.
 */

/**
 * Sanitize a string for safe HTML output.
 *
 * @param string $value Raw input string
 * @return string Escaped string safe for HTML
 */
function sanitize(string $value): string
{
    return htmlspecialchars(trim($value), ENT_QUOTES, 'UTF-8');
}

/**
 * Sanitize an array of strings.
 *
 * @param array<string> $values Array of raw strings
 * @return array<string> Array of sanitized strings
 */
function sanitizeArray(array $values): array
{
    return array_map('sanitize', $values);
}
