# Laravel E-Commerce Application

  

## Requirements

  

Please ensure the following are installed:

* Docker desktop

  

## Setup

Run the following commands in the ROOT FOLDER of this project to get the project up and running:

  

1.  `docker compose up -d --build site` : this builds and runs the necessary containers.

2.  `docker compose run --rm composer install` : this installs the PHP packages (into `src/vendor`) required for the laravel project.

3.  `docker compose run --rm artisan migrate` : this creates the database and database tables

4.  `docker compose run --rm artisan db:seed` : this seeds the database with dummy data

On linux, use `docker-compose`

  

When the above steps have been completed, then you should be able to access the web application via http://localhost/ in a browser

  

## How to run Cypress e2e tests:

  

# Prerequisites

Install Node.js on your machine

Install Cypress version 10. https://docs.cypress.io/guides/getting-started/installing-cypress

  
# How to run the tests

Run the following command from the root directory

`npx cypress run`
