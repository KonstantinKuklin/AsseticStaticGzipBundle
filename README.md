
What is AsseticStaticGzipBundle?
-----------------

AsseticStaticGzipBundle is a bundle witch provide functional for creating gzipped versions of your css and js files.

It work with AsseticBundle and do it transparently, you don't need to modify your code.

Motivation
-----------------
Nginx web server can sent compress data in real time. Also nginx can sent already compressed file.

Nginx plugin: http://nginx.org/en/docs/http/ngx_http_gzip_static_module.html

Saving CPU time.

Requirements
------------
Zip extension http://php.net/manual/en/zip.installation.php

PHP 5.3 and UP

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
   
Option `level` can be 0-9 and provide level of gzip compression type. 

 9 - best
 
 0 - without
    
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
