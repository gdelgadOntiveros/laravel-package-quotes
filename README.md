# Laravel Package Quotes API and Vuejs 3

Example Laravel package.
FrontEnd Vuejs 3

## Installation


Add the package's repository in the `composer.json` file:\
 

 	```json
    "repositories": [
        {
            "type": "vcs",
            "url": "https://github.com/gdelgadontiveros/laravel-package-quotes.git"
        }
    ],
	```
And:

	```bash
	composer require gdelgadontiveros/laravel-package-quotes:dev-master --with-dependencies
	```


## Publish Files

config file, Run the following command:

```bash
php artisan vendor:publish --tag=quotes-config
```
 
route file, Run the following command:

```bash
php artisan vendor:publish --tag=quotes-routes
```

views file, Run the following command:

```bash
php artisan vendor:publish --tag=quotes-ui
```

```bash
php artisan vendor:publish --tag=quotes-views
```

## Test

test file, Run the following command:

```bash
php artisan vendor:publish --tag=quotes-tests
```

```bash
./vendor/bin/phpunit
```


## URL API GET METHOD

`/api/quotes`: all quotes.
`/api/quotes/random`: random quote.
`/api/quotes/{id}`: specific quote by ID.