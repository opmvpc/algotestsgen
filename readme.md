# Prérequis

php 7.1
composer
mysql

# Installation

cloner le repos

```bash
$ cp algotestsgen
```

Installation avec composer

```bash
$ composer install
```

Guide officiel ici: https://laravel.com/docs/6.x#configuration

Copier le fichier de config

```bash
$ cp .env.example .env
```

Puis renseigner les infos de votre DB et vos clés Api GitHub (en créer une OAuth ici https://github.com/settings/developers)
ainsi que le lien de callback de l'auth par github (Ex: http://localhost/login/github/callback) situés en fin de fichier.

Générer la clé d'encryption

```bash
$ php artisan key:generate
```

Population de la DB

```bash
$ php artisan migrate:fresh --seed
```

Permissions

```bash
$ sudo chmod -R g+w bootstrap/cache/ 
$ sudo chmod -R g+w storage/ 
```

Et normalement ça devrait fonctionner 
