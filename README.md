## Installation
Using Composer :

```
composer install
```

If you don't have composer, you can get it from [Composer](https://getcomposer.org/)

## LIVE DEMO
No Input / Output method define :
```
http://shahbazali.net/globalm/
```

Output as jSON :
```
http://shahbazali.net/globalm?output=json
```

## Documentation Generated by PHPDOC
Please check global directory for PHPDOC you can also find a copy of it on [Live Server](http://shahbazali.net/globalm/project/)

```
Global Directory
```


## Run the application
Note that the source file used for this application is located in "sourcefile" folder.
Only Json format is supported for this example.

```
php index.php
```
## Input as File/jSON/API(POST REQUEST)
you can send input array from three formats as below
1- PHP File Array (you can pull data from Database)
2- jSON File (it will read json file contents & convert it into PHP File)
3- API (it will recevies data as POST from API)

```
php index.php?input=array
php index.php?input=json
php index.php?input=api
```
![Alt text](response.png?raw=true "API REQUEST")

## Output in jSON
If you need output as text you can just use index.php, but if jSON is required, please add output parameter as below

```
php index.php?output=json
```


## Tests
To run tests make sure you are in the main folder, and then you can run this command line :

```
vendor/phpunit/phpunit/phpunit --bootstrap tests/bootstrap.php tests
```


