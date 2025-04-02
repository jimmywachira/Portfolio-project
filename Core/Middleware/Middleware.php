<?php

namespace Core\Middleware;

class Middleware
{
    /**
     * @var array A map of middleware keys to their corresponding class names.
     */
    public const MAP = [
        'guest' => Guest::class,
        'auth' => Auth::class
    ];

    /**
     * Resolves and executes the specified middleware.
     *
     * This method takes a middleware key, looks up the corresponding middleware
     * class in the `MAP`, instantiates it, and then calls its `handle()` method.
     *
     * @param string|null $key The middleware key to resolve (e.g., 'guest', 'auth').
     * @return void
     * @throws \Exception If no matching middleware is found for the given key.
     */
    public static function resolve($key)
    {
        // If no key is provided, there's no middleware to resolve.
        if (!$key) {
            return;
        }

        // Look up the middleware class name in the MAP.
        $middleware = static::MAP[$key] ?? false;

        // If no matching middleware is found, throw an exception.
        if (!$middleware) {
            throw new \Exception("no matching middleware found for key '{$key}'.");
        }

        // Create a new instance of the middleware class and call its handle() method.
        (new $middleware)->handle();
    }
}
