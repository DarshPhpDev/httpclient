# Laravel HttpClient Package

[![Issues](https://img.shields.io/github/issues/DarshPhpDev/HttpClient.svg?style=flat-square)](https://github.com/DarshPhpDev/HttpClient/issues)
[![Stars](https://img.shields.io/github/stars/DarshPhpDev/HttpClient.svg?style=flat-square)](https://github.com/DarshPhpDev/HttpClient/stargazers)
[![Downloads](https://img.shields.io/packagist/dt/DarshPhpDev/HttpClient.svg?style=flat-square)](https://github.com/DarshPhpDev/HttpClient)
[![License](https://poser.pugx.org/DarshPhpDev/HttpClient/license.svg)](https://github.com/DarshPhpDev/HttpClient)

## Simple Http Client Package For Laravel Framework Built on Top of Guzzle.


## INSTALLATION

Install the package through [Composer](http://getcomposer.org/).

`composer require darshphpdev/httpclient`

## CONFIGURATION
1. Optional: The service provider will automatically get registered. 
Or you may manually add the service provider to providers array in your config/app.php file:
```php
'providers' => [
    // ...
    DarshPhpDev\\HttpHelper\\HttpClientServiceProvider::class,
];
```

2. Optional configuration file (useful if you plan to have full control)

```php
php artisan vendor:publish --tag="httpclient"
```

## HOW TO USE

-   [Quick Usage](#Quick Usage)
-   [Usage](#usage)
-   [Credits](#credits)
-   [License](#license)

## Quick Usage

```php
// In your controller
// Use The Helper class HttpClient to send http requests
use HttpClient;

// Get Request
HttpClient::get('https://jsonplaceholder.typicode.com/posts');

// Get Request with params
HttpClient::get('https://jsonplaceholder.typicode.com/posts', ['limit' => 3]);
// Hits https://jsonplaceholder.typicode.com/posts?limit=3

// Get Request with headers
HttpClient::get('https://jsonplaceholder.typicode.com/posts', [], ['Content-Type' => 'application/json']);

// Post Request
HttpClient::post('https://jsonplaceholder.typicode.com/posts');

// Post Request with body
HttpClient::post('https://jsonplaceholder.typicode.com/posts', ['title' => 'HttpClient Package']);

// Post Request with body & headers
HttpClient::post('https://jsonplaceholder.typicode.com/posts',[
	'title' => 'HttpClient Package'
	] , [
		'Content-Type' => 'application/json'
	]);


// FOR FULL USAGE, SEE BELOW..
```

## Usage

### IMPORTANT NOTE!

By default, in post request the body type used is json, 
if you want to change it specify the body type on the 4th argument\s

Available Body Types:-
* "json": Sends body params as json object (Default).
* "form_params": Sends body params as form parameters.
* "multipart": Used if you want to send files in body.

Example:

```php
HttpClient::post('https://jsonplaceholder.typicode.com/posts', 
	['title' => 'HttpClient Package'],
	['Content-Type' => 'application/x-www-form-urlencoded'],
	'form_params'
);
HttpClient::post('https://jsonplaceholder.typicode.com/posts', 
	['name' => 'myFile', 'content' => 'path/to/file'], 
	['Content-Type' => 'multipart/form-data'], 
	'multipart'
);
// and so on..
```

## Credits

- [MUSTAFA AHMED](https://github.com/DarshPhpDev)

## License

The Http Client Package is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT)

