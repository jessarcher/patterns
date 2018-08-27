<?php
/**
 * Strategy Pattern
 *
 * Create multiple concrete implementations that can be switched out as needed
 * without the client code needing to be aware of how the implementation works,
 * as long as they adhere to the contract.
 */

interface Logger
{
    public function log(string $message);
}

class FileLogger implements Logger
{
    public function log(string $message)
    {
        var_dump("I'm logging to a file: $message");
    }
}

class DatabaseLogger implements Logger
{
    public function log(string $message)
    {
        var_dump("I'm logging to a database: $message");
    }
}

class MyApp
{
    protected $logger;

    public function __construct(Logger $logger)
    {
        $this->logger = $logger;
    }

    public function myAction()
    {
        $this->logger->log("I'm doing my action");
    }
}

$myApp1 = new MyApp(new FileLogger);
$myApp1->myAction();

$myApp2 = new MyApp(new DatabaseLogger);
$myApp2->myAction();
