[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/KonstantinKuklin/AsseticStaticGzipBundle/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/KonstantinKuklin/AsseticStaticGzipBundle/?branch=master)
[![Minimum PHP Version](http://img.shields.io/badge/php-%3E%3D%205.3.3-8892BF.svg)](https://php.net/)
[![License](https://img.shields.io/packagist/l/konstantin-kuklin/assetic-static-gzip-bundle.svg)](https://packagist.org/packages/konstantin-kuklin/assetic-static-gzip-bundle)
[![Latest Stable Version](https://poser.pugx.org/konstantin-kuklin/assetic-static-gzip-bundle/v/stable.png)](https://packagist.org/packages/konstantin-kuklin/assetic-static-gzip-bundle)
[![Total Downloads](https://poser.pugx.org/konstantin-kuklin/assetic-static-gzip-bundle/downloads.png)](https://packagist.org/packages/konstantin-kuklin/assetic-static-gzip-bundle)


What is AsseticStaticGzipBundle?
-----------------

AsseticStaticGzipBundle is a bundle which creates gzipped versions of your css and js files.

It works transparently with AsseticBundle so you don't need to modify your code.

Motivation
-----------------
Nginx web server can compress response data on the fly. To save time it can be configured to send an already compressed copy of a file.

Nginx plugin: http://nginx.org/en/docs/http/ngx_http_gzip_static_module.html

Saving CPU time.

Requirements
------------
Zip extension http://php.net/manual/en/zip.installation.php

PHP 5.3.3 and UP

Installation
------------

via Composer:
```
php composer.phar require konstantin-kuklin/assetic-static-gzip-bundle  
```
Add to your config file:

```
assetic_static_gzip:
    use: true
    level: 9
```
   
Option `level` can be 0-9 and provide level of gzip compression type. (where: `9` - best, `0` - without compression)
    
Option `use` enables or disables creating compression files

Add bundle to `app/AppKernel.php`:
```
new KonstantinKuklin\AsseticStaticGzipBundle\AsseticStaticGzipBundle()
```

Documentation
------------

Compression files will be creating with command:
```
php app/console assetic:dump
```
   
Output example:

```
...
02:08:24 [file+] ...app/../web/css/794c670.css
02:08:24 [gzipped file+] ...app/../web/css/794c670.css.gz
...
```
