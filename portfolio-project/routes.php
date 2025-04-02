<?php

$router->get('/', 'index.php');
$router->get('/about', 'about.php');

$router->get('/products', 'products/index.php');
$router->get('/product', 'products/show.php')->only('auth');
$router->delete('/product', 'products/destroy.php')->only('auth');

$router->get('/product/edit', 'products/edit.php');
$router->patch('/product', 'products/update.php');

$router->get('/products/create', 'products/create.php')->only('auth');
$router->post('/products', 'products/store.php')->only('auth');

$router->get('/register', 'registration/create.php')->only('guest');
$router->post('/register', 'registration/store.php')->only('guest');

$router->get('/login', 'session/create.php')->only('guest');
$router->post('/session', 'session/store.php');
$router->delete('/session', 'session/destroy.php')->only('auth');