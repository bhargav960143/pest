<p align="center">

  <img alt="Pest" src="https://raw.githubusercontent.com/nunomaduro/pest/feat/first/art/logo.png" >

  <p align="center">
    <a href="https://travis-ci.org/nunomaduro/pest"><img src="https://img.shields.io/travis/nunomaduro/pest/master.svg" alt="Build Status"></a>
    <a href="https://packagist.org/packages/nunomaduro/pest"><img src="https://poser.pugx.org/nunomaduro/pest/d/total.svg" alt="Total Downloads"></a>
    <a href="https://packagist.org/packages/nunomaduro/pest"><img src="https://poser.pugx.org/nunomaduro/pest/v/stable.svg" alt="Latest Version"></a>
    <a href="https://packagist.org/packages/nunomaduro/pest"><img src="https://poser.pugx.org/nunomaduro/pest/license.svg" alt="License"></a>
  </p>
  <p align="center">
    <strong>For full documentation, visit <a href="https://pest.com">pest.com</a></strong>.
  </p>
</p>

**Pest** was created by, and is maintained by  **[Nuno Maduro](https://github.com/nunomaduro)**  and is an enjoyable **PHP testing solution**. Works out of the box for any PHPUnit project.

## 🚀 Installation & Usage

> **Requires [PHP 7.2+](https://php.net/releases/)**

First, Install Pest using [Composer](https://getcomposer.org):

```
composer require nunomaduro/pest --dev
```

Then, create a file named `tests/sum.php`. This will contain our actual test:
```php
test('adds 1 + 2 to equal 3', function () {
    assertEquals(3, Math::sum(1,2));
});
```

Finally, run `vendor/bin/pest ` and pest will print this message:

```
PASS  ./sum.php
✓ adds 1 + 2 to equal 3 (5ms)
```

## 📚 Documentation

### Testing

### Assertions

### Setup and Teardown

Often while writing tests you have some setup work that needs to happen before tests run, and you have some finishing work that needs to happen after tests run. Pest provides helper functions to handle this.

```
# Runs before each test on this file
beforeEach(function () {
  migrateDatabase();
});

# Runs after each test on this file
afterEach(function () {
  deleteDatabase();
});

test('city database has Vienna', (function () {
  assertTrue(City::exists('San Juan'));
});

test('city database has San Juan', (function () {
  assertTrue(City::exists('San Juan'));
});
```

### One-Time Setup

In some cases, you only need to do setup once, at the beginning of a file. This can be especially bothersome when the setup is asynchronous, so you can't just do it inline. Pest provides beforeAll and afterAll to handle this situation.

```
# Runs before the first test of the file
beforeAll(function () {
  migrateDatabase();
});

# Runs after the last test of the file
afterAll(function () {
  deleteDatabase();
});

test('city database has Vienna', function () {
  assertTrue(City::exists('San Juan'));
});

test('city database has San Juan', function () {
  assertTrue(City::exists('San Juan'));
});
```

It may help to illustrate the order of execution of all hooks.

```
beforeAll(function () { echo 'beforeAll'); };
afterAll(function () { echo 'afterAll'); };
beforeEach(function () { echo 'beforeEach'); };
afterEach(function () { echo 'afterEach'); };
test('', function () { echo 'test'); };

// beforeAll
// beforeEach
// test
// afterEach
// beforeAll
```

### Mocks

### Migrating to Pest from PHPUnit

### Configuration

## 💖 Support the development
**Do you like this project? Support it by donating**

- PayPal: [Donate](https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=66BYDWAT92N6L)
- Patreon: [Donate](https://www.patreon.com/nunomaduro)

Pest is open-sourced software licensed under the [MIT license](LICENSE.md).
