# Random Numbers API Documentation

## Overview
This API provides two endpoints for generating and retrieving random numbers.

## Endpoints

### Generate Random Number

- URL: /api/generate
- Method: GET
- Description: Generates a random number and stores it in the database. Returns the ID and the generated number.

Response

- Status Code: 200 OK
- Body:
{
    "id": "1",
    "number": "123456789"
}

### Retrieve Random Number

- URL: /api/retrieve/{id}
- Method: GET
- URL Parameters: id=[integer] where id is the ID of the random number in the database.
- Description: Retrieves the random number with the given ID from the database.

Response

- Status Code: 200 OK if the random number with the given ID exists, 404 Not Found if it does not.
- Body:
{
    "id": "1",
    "number": "123456789"
}

## Error Handling

If an error occurs, the API will return a JSON response with an error key and a string value describing the error. For example:

{
    "error": "Invalid ID"
}

## Testing

Unit tests for the API are located in the tests/Feature/RandomNumberTest.php file. You can run the tests using the - php artisan test command.  

## Development

This project is built with PHP using the Laravel framework. It uses the following technologies:  

- PHP
- Laravel
- PHPUnit for testing

The main logic of the application is located in the app/Http/Controllers/RandomNumbersController.php file. 

The RandomNumber model is defined in the app/Models/RandomNumber.php file. 

The routes for the application are defined in the routes/api.php file.