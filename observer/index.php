<?php
/**
 * Observer Pattern
 */

class Event
{
    protected $listeners = [];

    public function listen($event, $callback)
    {
        $this->listeners[$event][] = $callback;
    }

    public function fire($event, $params)
    {
        foreach ($this->listeners[$event] as $callback) {
            $callback($params);
        }
    }
}

$event = new Event;

$event->listen('user-joined', function ($name) {
    var_dump("Welcome $name!");
});

$event->fire('user-joined', 'Bob');
