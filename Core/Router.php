<?php

namespace Core;

use Core\Middleware\Middleware;

class Router
{
    /**
     * @var array An array to store the defined routes.
     */
    protected $routes = [];

    /**
     * Adds a new route to the router.
     *
     * This method adds a new route to the `$routes` array, specifying the HTTP
     * method, URI, controller, and an optional middleware.
     *
     * @param string $method The HTTP method (e.g., 'GET', 'POST').
     * @param string $uri The URI path (e.g., '/users', '/posts/create').
     * @param string $controller The controller to handle the request (e.g., 'UsersController.php').
     * @return $this Returns the current Router instance for method chaining.
     */
    public function add($method, $uri, $controller)
    {
        // Add the route to the routes array.
        $this->routes[] = [
            'method' => $method,
            'uri' => $uri,
            'controller' => $controller,
            'middleware' => null // Initially, no middleware is assigned.
        ];

        // Return the Router instance for method chaining.
        return $this;
    }

    /**
     * Adds a GET route.
     *
     * @param string $uri The URI path.
     * @param string $controller The controller to handle the request.
     * @return $this Returns the current Router instance for method chaining.
     */
    public function get($uri, $controller)
    {
        return $this->add('GET', $uri, $controller);
    }

    /**
     * Adds a POST route.
     *
     * @param string $uri The URI path.
     * @param string $controller The controller to handle the request.
     * @return $this Returns the current Router instance for method chaining.
     */
    public function post($uri, $controller)
    {
        return $this->add('POST', $uri, $controller);
    }

    /**
     * Adds a DELETE route.
     *
     * @param string $uri The URI path.
     * @param string $controller The controller to handle the request.
     * @return $this Returns the current Router instance for method chaining.
     */
    public function delete($uri, $controller)
    {
        return $this->add('DELETE', $uri, $controller);
    }

    /**
     * Adds a PATCH route.
     *
     * @param string $uri The URI path.
     * @param string $controller The controller to handle the request.
     * @return $this Returns the current Router instance for method chaining.
     */
    public function patch($uri, $controller)
    {
        return $this->add('PATCH', $uri, $controller);
    }

    /**
     * Adds a PUT route.
     *
     * @param string $uri The URI path.
     * @param string $controller The controller to handle the request.
     * @return $this Returns the current Router instance for method chaining.
     */
    public function put($uri, $controller)
    {
        return $this->add('PUT', $uri, $controller);
    }

    /**
     * Assigns a middleware to the last added route.
     *
     * @param string $key The middleware key (e.g., 'auth', 'guest').
     * @return $this Returns the current Router instance for method chaining.
     */
    public function only($key)
    {
        // Get the index of the last added route.
        $lastRouteIndex = array_key_last($this->routes);

        // Assign the middleware key to the 'middleware' property of the last route.
        $this->routes[$lastRouteIndex]['middleware'] = $key;

        // Return the Router instance for method chaining.
        return $this;
    }

    /**
     * Routes the request to the appropriate controller.
     *
     * This method iterates through the defined routes, checks if the requested
     * URI and method match, and then executes the corresponding controller.
     *
     * @param string $uri The requested URI.
     * @param string $method The HTTP method of the request.
     * @return mixed The result of the controller execution.
     */
    public function route($uri, $method)
    {
        // Iterate through the defined routes.
        foreach ($this->routes as $route) {
            // Check if the requested URI and method match the current route.
            if ($route['uri'] === $uri && $route['method'] === strtoupper($method)) {

                // If a middleware is defined for this route...
                if ($route['middleware']) {
                    // ...resolve the middleware.
                    Middleware::resolve($route['middleware']);
                }

                // Require and execute the controller.
                return require base_path('Http/Controllers/' . $route['controller']);
            }
        }

        // If no matching route is found, abort with a 404 error.
        $this->abort();
    }

    /**
     * Aborts the script with the given HTTP status code.
     *
     * This method sets the HTTP response code, includes the corresponding view
     * file (e.g., "404.php"), and then terminates the script.
     *
     * @param int $code The HTTP status code (default: 404 Not Found).
     * @return void
     */
    public function abort($code = 404)
    {
        // Set the HTTP response code.
        http_response_code($code);

        // Include the corresponding view file.
        require base_path("views/{$code}.php");

        // Terminate the script.
        die();
    }
}

/*
#routing with a function(uri, routes(ass. array))
function routeToController($uri,$routes){
    if(array_key_exists($uri,$routes)){
        require base_path($routes[$uri]);
    } else{
        abort();
    }
}

$routes = require base_path('routes.php');
$uri = parse_url($_SERVER["REQUEST_URI"])['path'];
routeToController($uri,$routes);
*/
