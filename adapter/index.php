<?php
/**
 * Adapter Pattern
 *
 * Classes that creates a common interface to a variety of different interfaces.
 * Often useful when wanting to use the strategy pattern with various vendor
 * libraries.
 */

class FancyWebService
{
    public function new($name, $color)
    {
        var_dump("I'm creating a new fancy $color object named $name");
    }
}

class ugly_webService
{
    public function create_newObject($color, $name)
    {
        var_dump("I'm creating a new ugly $color object named $name");
    }
}

interface WebService
{
    public function create(string $name, string $color);
}

class FancyAdapter implements WebService
{
    protected $fancy;

    public function __construct(FancyWebService $fancy)
    {
        $this->fancy = $fancy;
    }

    public function create(string $name, string $color)
    {
        $this->fancy->new($name, $color);
    }
}

class UglyAdapter implements WebService
{
    protected $ugly;

    public function __construct(ugly_webService $ugly)
    {
        $this->ugly = $ugly;
    }

    public function create(string $name, string $color)
    {
        $this->ugly->create_newObject($color, $name);
    }
}

class MyApp
{
    protected $webService;

    public function __construct(WebService $webService)
    {
        $this->webService = $webService;
    }

    public function create(string $name, string $color)
    {
        $this->webService->create($name, $color);
    }
}

$myApp1 = new MyApp(new FancyAdapter(new FancyWebService));
$myApp1->create('Bob', 'red');

$myApp2 = new MyApp(new UglyAdapter(new ugly_webService));
$myApp2->create('Bob', 'red');
