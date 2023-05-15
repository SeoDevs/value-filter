# Laravel Nova Value Filter

A Value Filter for [Laravel Nova](https://nova.laravel.com/).

![Preview 1](https://github.com/SeoDevs/value-filter/blob/main/docs/preview.png)

## Install

```
composer require seoegypt/value-filter
```
## requires

```
php: "^7.3|^8.0",
laravel/nova: "^4.0"

```
## Usage

```php
use Seoegypt\ValueFilter\ValueFilter;

//..
your custom filter extends our ValueFilter as :
class NameFilter extends ValueFilter{

}

You can optionally override the default type of the ValueFilter package by adding property $type to your Nova filter.
$type ="text";

```

### Field Help Text

> you can use all functions and properties of laravel nova filter

