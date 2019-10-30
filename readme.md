# Prérequis

php 7.1
composer
mysql

# Installation

cloner le repos

$ cp algotestsgen

$ composer install

Guide officiel ici: https://laravel.com/docs/6.x#configuration

$ cp .env.example .env

Renseigner les infos de votre DB et vos clés Api GitHub (en créer une OAuth ici https://github.com/settings/developers)

$ php artisan key:generate

Population de la DB
$ php artisan migrate:fresh --seed

Permissions
$ sudo chmod -R g+w bootstrap/cache/ 
$ sudo chmod -R g+w storage/ 

Et normalement ça devrait fonctionner 
