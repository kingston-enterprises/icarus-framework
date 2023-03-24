# Icarus framework

Icarus was built with the intention of producing a lightweight, user-friendly framework to aid in the building of websites.
The idea is that when starting a fresh c project, we can simply install the tested code for the essential functionalities and then build on that. 

## Inspiration
A big thank you to the `codeholic <https://github.com/thecodeholic/php-mvc-framework>_` on GitHub for inspiring and guiding the creation of this project with his youtube `tutorials <https://www.youtube.com/playlist?list=PLLQuc_7jk__Uk_QnJMPndbdKECcTEwTA1>_` 


##

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

### Contributing
Any form of contributions are fully accepted, just open a github issue [here](https://github.com/kingston-enterprises/icarus-framework/issues)

### Licence
MIT

### Contact
contact us at:
   - info@kingston-enterprises.net
   - qhawe@kingston-enterprises.net

### Documentation
For more details read the docs [here](https://kingston-enterprises-icarus-framework.readthedocs.io/en/latest/)
