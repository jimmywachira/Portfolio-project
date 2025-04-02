<?php

// Define the application's routes using the Router instance.

// GET route for the home page.
$router->get('/', 'index.php');

// GET route for the about page.
$router->get('/about', 'about.php');

// GET route for the products listing page.
$router->get('/products', 'products/index.php');

// GET route for a single product's details page.
// The 'auth' middleware ensures that only authenticated users can access this route.
$router->get('/product', 'products/show.php')->only('auth');

// DELETE route for deleting a product.
// The 'auth' middleware ensures that only authenticated users can access this route.
$router->delete('/product', 'products/destroy.php')->only('auth');

// GET route for the product edit page.
$router->get('/product/edit', 'products/edit.php');

// PATCH route for updating a product.
$router->patch('/product', 'products/update.php');

// GET route for the product creation page.
// The 'auth' middleware ensures that only authenticated users can access this route.
$router->get('/products/create', 'products/create.php')->only('auth');

// POST route for storing a new product.
// The 'auth' middleware ensures that only authenticated users can access this route.
$router->post('/products', 'products/store.php')->only('auth');

// GET route for the registration page.
// The 'guest' middleware ensures that only unauthenticated users can access this route.
$router->get('/register', 'registration/create.php')->only('guest');

// POST route for handling user registration.
// The 'guest' middleware ensures that only unauthenticated users can access this route.
$router->post('/register', 'registration/store.php')->only('guest');

// GET route for the login page.
// The 'guest' middleware ensures that only unauthenticated users can access this route.
$router->get('/login', 'session/create.php')->only('guest');

// POST route for handling user login.
$router->post('/session', 'session/store.php');

// DELETE route for handling user logout.
// The 'auth' middleware ensures that only authenticated users can access this route.
$router->delete('/session', 'session/destroy.php')->only('auth');
