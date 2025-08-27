<?php
namespace Core;
class App {
    protected static $container;
    public static function setContainer($container) {
        static::$container = $container;
    }
    public static function getContainer() {
        return static::$container;
    }

}