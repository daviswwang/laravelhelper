<?php

namespace Daviswwang\LaravelHelper;
use Psr\Container\ContainerInterface;
use Illuminate\Http\Request;

/**
 * Class JWT
 * @package Daviswwang\JWT
 */
class LaravelHelper extends AbstractHelper
{
    /**
     * @var RequestInterface
     */
    public $request;


    public function __construct(ContainerInterface $container)
    {
        parent::__construct($container);
        $this->request = $this->getContainer()->get(Request::class);
    }

}
