<?php

use Core\Session;

// Start the PHP session. This is necessary to use session variables.
session_start();

// Define a constant for the base path of the application.
// __DIR__ represents the current directory (public), and /../ moves up one level to the project root.
const BASE_PATH = __DIR__ . '/../';

// Include the functions.php file, which contains helper functions.
require BASE_PATH . 'Core/functions.php';

// Autoload classes: This function will be called when a class is used that hasn't been included yet.
spl_autoload_register(function($class){ 
    // Replace double slashes with the directory separator for cross-platform compatibility.
    $class = str_replace('//', DIRECTORY_SEPARATOR , $class);
    // Require the class file based on the namespace and class name.
    require base_path("{$class}.php");
}); 

// Include the bootstrap.php file, which sets up the application (e.g., database connection, container).
require base_path('bootstrap.php');

// Initialize the Router.
$router = new \Core\Router();

// Include the routes.php file, which defines the application's routes.
$routes = require base_path('routes.php');

// Parse the request URI to get the path.
$uri = parse_url($_SERVER["REQUEST_URI"])['path'];

// Determine the HTTP method of the request.
// If '_method' is set in POST, use it (for method spoofing), otherwise use the server's REQUEST_METHOD.
$method = $_POST['_method'] ?? $_SERVER["REQUEST_METHOD"];

// Route the request to the appropriate controller based on the URI and method.
$router->route($uri,$method);

// Remove any flashed session data after the request is handled.
Session::unflash();
