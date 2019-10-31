# Prérequis

+ php 7.1
+ composer
+ mysql

# Installation

### 1. cloner le repos

```bash
$ cp algotestsgen
```

### 2. Installation avec composer

```bash
$ composer install
```

**Guide officiel ici: https://laravel.com/docs/6.x#configuration**

### 3. Copier le fichier de config

```bash
$ cp .env.example .env
```

### 4. Puis renseigner les infos de votre DB et vos clés Api GitHub (en créer une OAuth ici https://github.com/settings/developers)
ainsi que le lien de callback de l'auth par github (Ex: http://localhost/login/github/callback) situés en fin de fichier.

### 5. Générer la clé d'encryption

```bash
$ php artisan key:generate
```

### 6. Population de la DB

```bash
$ php artisan migrate:fresh --seed
```

### 7. Permissions

```bash
$ sudo chmod -R g+w bootstrap/cache/
$ sudo chmod -R g+w storage/
```

### 1. cloner le repos

```bash
$ php artisan storage:link
```

Et normalement ça devrait fonctionner
