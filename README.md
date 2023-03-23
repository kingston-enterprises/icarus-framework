# Icarus framework

Icarus was created with the goal of creating a lightweight, user-friendly framework to help accelerate the development websites.
The idea is that we can simply install the tested code for the fundamental features when beginning a new client project and then simply build on that. 

Basic features include:
- Custom Routing
- Vitisor Counter
- User Authentication

Other notable feautures include:
- Datatabase migrations
- MVC Architecture
- Form Templates
 

![Kingston Enterprises Icarus FrameWork Graphic](https://user-images.githubusercontent.com/67066977/215330853-7be454cf-66ed-4db3-b106-547f7c83bb2d.jpg)

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

