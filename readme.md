# Visitor tracking API with Lumen

## Installation

First of all, install `composer`, `PHP 5.6` and `MySQL`.

Then, run these:

    php composer.phar install
    php artisan migrate

## Running

Simply use Artisan:

    php artisan serve

## API

`GET /track` - tracks visitor, adding one to the database or updating his visits counter

`GET /visitors` - returns a list of tracked visitors