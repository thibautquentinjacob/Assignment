# Assignment

## Tech used

PHP 7, Angular 5

## API

This folder has to be placed in the served directory.

### model

Contains both data models used in the API:

- Ingredient: which represent an individual ingredient (name, calories, type, etc.)
- Dish: which is a combination of ingredients (list of ingredients, price, rating, description, etc.)

### menu/read

- .htaccess: rewrite the URL to remove .php extension
- read.php: Defines the list of ingredients and then the list of dishes based on these ingredients. Returns the list of dishes

## Client

Polls the API, display dishes and let users add them to the cart.

### Installing dependencies
`npm install`

### Testing
`ng --serve`

### Deployment
`ng build --prod`