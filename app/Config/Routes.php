<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */
$routes->get('/', 'Home::index');

$routes->get('api/books', 'BookController::index'); // This route will handle GET requests to fetch all books
$routes->post('api/books', 'BookController::create'); // This route will handle POST requests to create a new book
$routes->delete('api/books/(:num)', 'BookController::delete/$1'); // This route will handle DELETE requests to delete a book by its ID