<?php

namespace Core;

use CoffeeCode\Router\Router;

abstract class Controller
{
    public $router;

    /**
     * base controller's class constructor
     * 
     * @return void
     */
    public function __construct()
    {
        if($this->router == null){
            $this->router = (new Router(APP['url']));
        }

        return $this->router;
    }

    /**
     * @param array $data
     * @return void
     */
    public function json(array $data): void
    {
        header('Content-Type: application/json');
        die(json_encode($data));
    }

    /**
     * @param string $path
     * @return void
     */
    public function view(string $file, array $data = []): void
    {
        echo (new Engine())->render($file,$data);
    }
}
