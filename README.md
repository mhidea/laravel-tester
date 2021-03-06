# LaravelTester
Test your laravel routes. Routes and requests will be loaded automatically. This package doesn't need migration.
## Installation
Install using composer:
```bash
composer require mhidea/laravel-tester
```
Add serviceproviver to 'providers' in config/app.php:
```bash
Mhidea\laraveltester\LaravelTesterServiceProvider::class
```
Publish config file to config/laravel-tester.php:
```bash
php artisan vendor:publish --tag=laraveltester
```
## Request headers
Add your headers to laravel-tester.config after you publish it. If you put 'testertoken' in header value, it will take the value you give it once and will be saved for next request. It is useful for authentication. For example to add bearer token header you need to have:
```php
"Authorization" => 'Bearer testertoken'
```
Now 'testertoken' will be replaced with token you give to input and will be saved for next requests.
## Request parameters
Currently you can have four request parameter types:
1. **required url parameter**: is loaded from route path definition.  e.g. id
    ```php
    Route::post("mail/{id}", "Controller@readmail");
    ```
2. **optional url parameter**: is loaded from route path definition.  e.g. id
    ```php
    Route::get("mail/{id?}", "Controller@showmail");
    ```
3. **query paramete**r: is loaded from controller doc. Follow this pattern. Type is optional.
    ```php
        * @queryParam parameter-name parameter-type parameter-description
    ```
    For example you will get username in request pane under queryParam.
    ```php
        * @queryParam username string name of the user to show points
    ```
4. **body parameter**: is loaded from controller doc. Follow this pattern. Type is optional. 
    ```php
        * @bodyParam name type description
    ```
    For example you will get id in request pane under bodyParam.
    ```php
        * @bodyParam id int current user_id to get info
    ```
    Object params are allowed. If you need to have objects, don't forget to mention the parameter with type 'object' in docs. 
    ```php
        * @bodyParam friend object friend to follow
        * @bodyParam friend.id int id of friend
    ```
	You can find more about documentation [here][1].
	
	
[1]: https://beyondco.de/docs/laravel-apidoc-generator/getting-started/documenting-your-api#specifying-request-parameters 
