<?php

use Core\App;
use Core\Container;
use Core\Database;

// Create a new instance of the dependency injection container.
$container = new Container();

// Bind the 'Core\Database' key to a resolver function.
// This means that whenever 'Core\Database' is requested, this function will be executed.
$container->bind('Core\Database', function(){
    // Load the database configuration from the config.php file.
    $config = require base_path('config.php');
    // Create a new Database instance using the loaded configuration.
    return new Database($config['database']);
});

// Set the application's container to the newly created container instance.
// This makes the container accessible throughout the application via the App class.
App::setContainer($container);

// The following lines are commented out and were likely used for testing/debugging.
//$db = $container->resolve('Core\Database');
//$db = App::container()->resolve(Database::class);
