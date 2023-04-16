# Icarus framework

Icarus was built with the intention of producing a lightweight, user-friendly framework to aid in the building of websites.
The idea is that when starting a fresh client project, we can simply install the tested code for the essential functionalities and then build on that. 

![Kingston Enterprises Icarus FrameWork Graphic](https://user-images.githubusercontent.com/67066977/215330853-7be454cf-66ed-4db3-b106-547f7c83bb2d.jpg)

## Getting Started

### Composer require
- to get started using icarus you can require it from composer.
- you can install it along with your other composer packages

```sh
composer require kingston/icarus
```

## Base Application

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

## Contributing

Any form of contributions are fully accepted, just Future versions of this framework are planned, with massive extensions to the logic side of things. we welcome any and all contributions, so please feel free to contribute. If you have ideas for the direction that the framework should take, please don't hesitate to open a github issue [here](https://github.com/kingston-enterprises/icarus-framework/issues) or just directy get in touch with the creatr [here](mailto:qhawem54@gmail.com).


## Licence

This code is relased under the MIT License. Please see the LICENSE file for more information on what this means and how to make attributions.

## Documentation
For more details read the docs [here](https://kingston-enterprises-icarus-framework.readthedocs.io/en/latest/)
