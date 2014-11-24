<?php

namespace SolarSystem\Controller\Decorator;

require 'decorator.class.php';

use Beahoo\Controller\Request;
use Beahoo\Controller\Response;

class EarthDecorator extends \Beahoo\Controller\Decorator
{
    protected $decorators = array(
        'SolarSystem\Controller\Decorator\Earth\MoonDecorator',
    );

    public function execute(Request $request, Response $response)
    {
        // ...
    }
}