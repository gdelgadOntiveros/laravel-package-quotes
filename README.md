# Laravel Package Quotes API and Vuejs 3

Example Laravel package.
FrontEnd Vuejs 3

## Installation


Add the package's repository in the `composer.json` file:\
 

 	```json
    "repositories": [
        {
            "type": "vcs",
            "url": "https://github.com/gdelgadOntiveros/laravel-package-quotes.git",
            "options": {
                "symlink": true
            }
        }
    ],
	```
And:

	```bash
	composer require gdelgadontiveros/laravel-package-quotes:dev-master --with-dependencies
	```


Ejecute el siguiente comando:

```bash
php artisan vendor:publish --tag=quotes-config
```
 

```bash
php artisan vendor:publish --tag=quotes-routes
```

```bash
php artisan vendor:publish --tag=quotes-ui
```

```bash
php artisan vendor:publish --tag=quotes-views
```