<?php

namespace Core;

class Container{ 

    //An associative array to store the bindings (key-resolver pairs) for the container.
    public $bindings = [];

    //Binds a key to a resolver in the container.
    public function bind($key, $resolver){
        $this->bindings[$key] = $resolver;
    }

    //Resolves a key in the container.
    public function resolve($key){
        //Check if a binding exists for the given key.
        if(!array_key_exists($key, $this->bindings)){
            throw new \Exception("no matching binding found for :{$key}");
        }
    //Retrieve the resolver associated with the key and call it to resolve the dependency.
        $resolver = $this->bindings[$key];
        return call_user_func($resolver);
    }
}