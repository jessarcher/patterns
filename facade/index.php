<?php
/**
 * Facade Pattern
 */

class Twitter
{
    public function tweet($message)
    {
        var_dump("Tweeting '$message'");
    }
}

class Facebook
{
    public function post($message)
    {
        var_dump("Posting '$message' to Facebook");
    }
}

class Sharer
{
    public function __construct(Twitter $twitter, Facebook $facebook)
    {
        $this->twitter = $twitter;
        $this->facebook = $facebook;
    }

    public function share($message)
    {
        $this->twitter->tweet($message);
        $this->facebook->post($message);
    }
}

$sharer = new Sharer(new Twitter, new Facebook);

$sharer->share("I'm hungry");
