# Php_checkpoint4 - WILD CIRCUS

Projet Symfony 4

## Description

Repository created for the last checkpoint of my Wild Code School training between September 2019 abd January 2020.

Skills :  
HTML5, CSS3, SCSS, Bootstrap,  
PHP, Doctrine, MySQL
Symfony 4, Webpack Encore  
Composer, Yarn, Node  

## How to set up the Project¶

You only need to get the project code and install the dependencies with Composer.  
And follow this command:
https://symfony.com/doc/current/setup.html#setting-up-an-existing-symfony-project  

Then run those commands at the root of the project:
```
composer install  
yarn install
```
Copy the .env to .env.local with your database info
```
php bin/console doctrine:database:create
php bin/console doctrine:migration:migrate
```
And at least run :
```
symfony server:start (to launch a local server)
yarn encore dev (to launch your local server for assets)  
```
