Introduction
============

This framework offers a lightweight solution to kickstart php applications while also preparing them for faster and cleaner development.

The project consists primarily of a custom MVC core and a base application template.
The template already has all of the basic features constructed and tested, in addition to the core, which is fully built and tested. 
Together, they form a light foundation for any of our customer projects.

Project Scope

- Base application
   - Secured migration based database
   - Secured user login and registration
   - simple user profile dashboard
   - simple user profile settings and controls
   - site visitor counter 

Core
   - mvc architecture
   - `.env` database connection
   - custom routing
   - form templates
   
Installation
============

The suggested installation method is via `composer`_:

.. code-block:: console

   $ composer require kingston/icarus

## Getting Started

### Composer require
- to get started using icarus you can require it from composer.
- you can install it along with your other composer packages

```sh
composer require kingston/icarus
```

### Base Application
- The base application is our own template for getting started building icarus applications. to get started 
just clone the repository from [here](https://github.com/kingston-enterprises/base-application) and then run composer install

```sh
composer install
```

-then open the `env.example` file, enter your database credentials and then save it as `env.`
- Next just cd into your scripts directory and run the database migrations.

```sh
cd scripts
php migrations.php
```

- Next move into your public folder and start your php server.

```sh
cd public
php -S localhost:5050
```

- then just open your localhost in your browser and you should see something like this and you will be good to go.
![Kingston Enterprises Icarus FrameWork Welcome Screen](https://user-images.githubusercontent.com/67066977/218307804-52990155-c354-4704-95f4-d87d526a7f7d.png)

