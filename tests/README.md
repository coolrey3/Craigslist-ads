# Test Suite Documentation

This directory contains comprehensive tests for the Craigslist Ads application.

## Test Files

### AdGeneratorTest.php
**Unit tests for the core AdGenerator class.**

- Tests all public methods
- Validates title and body generation
- Tests form data parsing
- Tests listing validation
- Tests custom store info
- Tests bulk ad generation

**Coverage:** All AdGenerator methods

---

### IntegrationTest.php
**Integration tests for the web page workflows.**

- Tests index.php rendering and form submission
- Tests craigslist.php dynamic form generation
- Tests craigslistresults.php output and sanitization
- Tests full request/response cycles
- Tests redirect behavior on invalid input
- Tests XSS prevention

**Coverage:** index.php, craigslist.php, craigslistresults.php

---

### SanitizationTest.php
**Security and sanitization tests.**

- Tests HTML escaping
- Tests XSS prevention (script tags, event handlers, etc.)
- Tests quote escaping (single, double, mixed)
- Tests special character handling (&, <, >, etc.)
- Tests Unicode and emoji support
- Tests real-world malicious input scenarios

**Coverage:** sanitize() function in src/Utilities.php

---

### FooterTest.php
**Tests for the shared footer component.**

- Tests footer rendering
- Tests link presence and formatting
- Tests alphabetical sorting
- Tests proper HTML escaping
- Tests CSS styles
- Tests link validation

**Coverage:** footer.php

---

### EdgeCasesTest.php
**Edge cases and boundary testing.**

- Tests very long strings (100-500 characters)
- Tests empty and whitespace-only inputs
- Tests special characters and Unicode
- Tests large array operations (100+ items)
- Tests mismatched array lengths
- Tests invalid quantity values
- Tests all product type variations
- Tests custom store info edge cases

**Coverage:** Boundary conditions for all components

---

## Running Tests

### Run all tests
```bash
composer test
```

### Run specific test file
```bash
vendor/bin/phpunit tests/AdGeneratorTest.php
```

### Run with verbose output
```bash
vendor/bin/phpunit --testdox
```

### Run with coverage report (requires Xdebug)
```bash
vendor/bin/phpunit --coverage-html coverage/
```

---

## Test Coverage Goals

| Component | Coverage Goal | Status |
|-----------|--------------|--------|
| AdGenerator.php | 100% | ✅ Complete |
| Utilities.php | 100% | ✅ Complete |
| footer.php | 90%+ | ✅ Complete |
| index.php | 80%+ | ✅ Complete |
| craigslist.php | 80%+ | ✅ Complete |
| craigslistresults.php | 80%+ | ✅ Complete |

---

## Test Strategy

### Unit Tests
- Test individual functions in isolation
- Mock external dependencies
- Focus on logic correctness

### Integration Tests
- Test full page rendering
- Test form submission workflows
- Test data flow between pages
- Test security measures (sanitization, validation)

### Edge Case Tests
- Test boundary values
- Test unexpected input
- Test performance with large data sets
- Test Unicode and special characters

---

## Security Testing

All tests include security validations:

✅ XSS prevention (script tags, event handlers)  
✅ HTML injection prevention  
✅ SQL injection awareness (for future database integration)  
✅ Input sanitization on all user data  
✅ Proper quote escaping  
✅ Unicode safety  

---

## Adding New Tests

When adding new features, follow this checklist:

1. **Write unit tests first** - Test the core logic in isolation
2. **Add integration tests** - Test how it works with other components
3. **Test edge cases** - Empty strings, very long strings, special characters
4. **Test security** - Can users inject HTML/JS? Is input properly escaped?
5. **Update this README** - Document what you tested and why

---

## CI/CD Integration

Tests run automatically on every push via GitHub Actions:

- **PHP 8.1** - Tests + Lint + Static Analysis
- **PHP 8.2** - Tests + Lint + Static Analysis

See `.github/workflows/ci.yml` for configuration.

---

## Notes

- Tests use PHPUnit 10+
- Tests are namespaced under `Tests\`
- Test files must end with `Test.php`
- All tests extend `PHPUnit\Framework\TestCase`
- Use descriptive test method names (testFunctionNameWithScenario)
