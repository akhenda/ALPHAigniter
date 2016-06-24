# ALPHAigniter

ALPHAigniter is a barebones CI 3 setup containing Ion-Auth, Modules, Smarty, JS Libs, Requests for PHP, REST Client and REST Server.

This package installs the offical [CodeIgniter](https://github.com/bcit-ci/CodeIgniter) (version `3.0.*`) with secure folder structure via Composer.

You can update CodeIgniter system folder to latest version with one command.

## What's included
- [Codeigniter 3](https://github.com/bcit-ci/CodeIgniter)
- Ion Auth
- HMVC third-party (modular applications)
- Smarty (Template Engine)
- JS Libraries (Jquery,Loadash,Bootstrap)
- Requests for PHP
- REST Client
- REST Server

## Folder Structure

```
codeigniter/
├── application/
├── composer.json
├── composer.lock
├── public/
│   ├── .htaccess
│   └── index.php
└── vendor/
    └── codeigniter/
        └── framework/
            └── system/
```

## Requirements

* PHP 5.3.2 or later
* `composer` command (See [Composer Installation](https://getcomposer.org/doc/00-intro.md#installation-linux-unix-osx))
* Git

### Run PHP built-in server (PHP 5.4 or later)

```
$ bin/server.sh
```

### Update CodeIgniter

```
$ cd /path/to/codeigniter
$ composer update
```

You must update files manually if files in `application` folder or `index.php` change. Check [CodeIgniter User Guide](http://www.codeigniter.com/user_guide/installation/upgrading.html).

## Reference

* [Composer Installation](https://getcomposer.org/doc/00-intro.md#installation-linux-unix-osx)
* [CodeIgniter](https://github.com/bcit-ci/CodeIgniter)
* [CodeIgniter Composer Installer - Kenji](https://packagist.org/packages/kenjis/codeigniter-composer-installer)
* [Translations for CodeIgniter System](https://github.com/bcit-ci/codeigniter3-translations)

## Related Projects for CodeIgniter 3.0

* [Cli for CodeIgniter 3.0](https://github.com/kenjis/codeigniter-cli)
* [ci-phpunit-test](https://github.com/kenjis/ci-phpunit-test)
* [CodeIgniter Simple and Secure Twig](https://github.com/kenjis/codeigniter-ss-twig)
* [CodeIgniter Doctrine](https://github.com/kenjis/codeigniter-doctrine)
* [CodeIgniter Deployer](https://github.com/kenjis/codeigniter-deployer)
* [CodeIgniter3 Filename Checker](https://github.com/kenjis/codeigniter3-filename-checker)
* [CodeIgniter Widget (View Partial) Sample](https://github.com/kenjis/codeigniter-widgets)

## Web App Example included

### ASK AWAY

#### USER STORIES

```
View a list of questions
View a single question
Answer a question
Ask a question when logged in
login
register
```

#### CONTROLLERS/ACTIONS

```
questions/add
questions/detail
questions/listing

users/register
users/login
```
