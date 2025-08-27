<?php

namespace Core;

class Container
{
    protected $bindings = [];

    public function bind($abstract, $resolver)
    {
        $this->bindings[$abstract] = $resolver;
    }

    public function resolve($key)
    {
        if(!array_key_exists($key, $this->bindings)) {
            throw new \Exception("No binding found for {$key}");
        }
        return call_user_func($this->bindings[$key]);
    }
}