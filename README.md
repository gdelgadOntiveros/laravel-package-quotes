# Laravel Package Quotes API and Vuejs 3

Example Laravel package.
FrontEnd Vuejs 3

## Installation


Add the package's repository in the `composer.json` file:\
 

 	```json
    "repositories": [
        {
            "type": "path",
            "url": "packages/gdelgado/quotes",
            "options": {
                "symlink": true
            }
        }
    ],
	```
Ejecute el siguiente comando para instalar el paquete:

	```bash
	composer install
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