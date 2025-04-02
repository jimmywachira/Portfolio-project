<?php

namespace Core;

class App{

    protected static $container; 
    //Sets the application's dependency injection container.
    public static function setContainer($container){
        static::$container = $container;
    }
    //Retrieves the application's dependency injection container.

    public static function Container(){
        return static::$container;
    }
    //Binds a key to a resolver in the application's container.

    public static function bind($key,$resolver){
        static::container()->bind($key, $resolver);
    }
    //Resolves a key in the application's container.

    public static function resolve($key){
        return static::container()->resolve($key);
    }
}