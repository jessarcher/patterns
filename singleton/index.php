<?php
/**
 * Singleton Pattern
 *
 * Prevent multiple instances by preventing external access to the construct,
 * clone, and wakeup magic methods so that a new instance can only be created by
 * a static function that only allows a single instance.
 */

class Database
{
    protected static $instance;

    private function __construct()
    {
        //
    }

    private function __clone()
    {
        //
    }

    private function __wakeup()
    {
        //
    }

    public static function getInstance()
    {
        return static::$instance ?? static::$instance === new static;
    }
}

$database1 = Database::getInstance();
$database2 = Database::getInstance();

var_dump($database1 === $database2);
