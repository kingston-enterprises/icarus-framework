# Icarus framework

The intention of icarus was to build a light weight, beginner friendly framework help fastrack development of our clients websites.
the idea is that when starting a new client project we can just install the tried and tested code for the basic features and then just build on that

Basic features include:
- Custom Routing
- Vitisor Counter
- User Authentication

Other notable feautures include:
- Datatabse migrations
- MVC Architecture
- Form Templates
 

![Kingston Enterprises Icarus FrameWork Graphic](https://user-images.githubusercontent.com/67066977/215330853-7be454cf-66ed-4db3-b106-547f7c83bb2d.jpg)

## Getting Started

### Composer require
- to get started using icarus you can require it from composer.
- you can install it along with you

```sh
$ composer require kingston/icarus
```

### Base Application
- The base application is our own template for getting started building icarus applications. to get started 
just clone the repository from here and then run composer install

```sh
$ composer install
```

-then open the env.example file, enter your database credentials and then save it as env.
- Next just cd into your scripts directory and run the database migrations.

```sh
$ cd scripts
$ php migrations.php
```

- Next move into your public folder and start your php server.

```sh
$ cd public
$ php -S localhost:5050
```

- then just open your localhost in your browser and you should see something like this and you will be good to go.

## Dependencies
- apart from the icarus framework the only dependency is Vlucas` phpdotenv library see their repo here