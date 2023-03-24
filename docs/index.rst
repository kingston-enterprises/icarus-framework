Introduction
============

This framework offers a lightweight solution to kickstart php applications while also preparing them for faster and cleaner development.

The project consists primarily of a custom MVC core and a base application template.
The template already has all of the basic features constructed and tested, in addition to the core, which is fully built and tested. 
Together, they form a light foundation for any of our customer projects.

Inspiration
===========
A big thank you to the `Codeholic <https://github.com/thecodeholic/php-mvc-framework>`_ on GitHub for inspiring and guiding the creation of this project with his youtube `tutorials <https://www.youtube.com/playlist?list=PLLQuc_7jk__Uk_QnJMPndbdKECcTEwTA1>_` 

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

.. image:: https://user-images.githubusercontent.com/67066977/215330853-7be454cf-66ed-4db3-b106-547f7c83bb2d.jpg
   :alt: Kingston Enterprises Icarus FrameWork Graphic

Prerequisites
=============
The whole idea behind the project is to have a framework with very few dependencies. 
So all you will need is a php installation and composer

dependencies
------------
   - `vlucas/phpdotenv`
   
Installation
============

The suggested installation method is via `composer`_:

.. code-block:: console

   composer require kingston/icarus

Getting Started
===============

Composer require
----------------

- to get started using icarus you can require it from composer.
- you can install it along with your other composer packages

.. code-block:: console
   composer require kingston/icarus


Base Application
----------------
- The base application is our own template for getting started building icarus applications. to get started 
just clone the repository or use it as a template from `here <https://github.com/kingston-enterprises/base-application>` and then run composer install

.. code-block:: console
   composer install

-then open the `env.example` file, enter your database credentials and then save it as `env.`
- Next just cd into your scripts directory and run the database migrations.

.. code-block:: console
   cd scripts
   php migrations.php


- Next move into your public folder and start your php server.

.. code-block:: console
   cd public
   php -S localhost:5050


- then just open your localhost in your browser and you should see something like this and you will be good to go.
.. image:: https://user-images.githubusercontent.com/67066977/218307804-52990155-c354-4704-95f4-d87d526a7f7d.png
   :alt: Kingston Enterprises Icarus FrameWork Welcome Screen

Licence
=======
MIT

Contributing
============
any form of contributions are fully accepted, just open a github issue `here <https://github.com/kingston-enterprises/icarus-framework/issues>`_

Contact
=======
contact us at:
   - info@kingston-enterprises.net
   - qhawe@kingston-enterprises.net

