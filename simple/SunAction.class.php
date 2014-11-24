<?php

namespace SolarSystem\Controller\Action;
require 'init.php';

use Beahoo\Controller\Request;
use Beahoo\Controller\Response;

class SunAction extends \Beahoo\Controller\Action
{
    protected $decorators = array(
        'SolarSystem\Controller\Decorator\NeptuneDecorator',
        'SolarSystem\Controller\Decorator\UranusDecorator',
        'SolarSystem\Controller\Decorator\SaturnDecorator',
        'SolarSystem\Controller\Decorator\JupiterDecorator',
        'SolarSystem\Controller\Decorator\MarsDecorator',
        'SolarSystem\Controller\Decorator\EarthDecorator',
        'SolarSystem\Controller\Decorator\VenusDecorator',
        'SolarSystem\Controller\Decorator\MercuryDecorator',
    );

    public function execute($request, $response)
    {
        // ...
    }
}