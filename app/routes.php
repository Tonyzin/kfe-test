<?php

use CoffeeCode\Router\Router;
use Core\Engine;

// initializing routes component
$router = new Router(APP['url']);

// namespace with controller classes
$router->namespace('App\\Controllers');

// route with verb get on /
$router->get('/', 'UserController:index');
$router->get('/create', 'UserController:create');
$router->get('/update/{id}', 'UserController:show');

$router->post("/create", "UserController:store");
$router->post('/update', 'UserController:update');
$router->post('/delete', 'UserController:destroy');

/**
 * this method executes the routes
 */
$router->dispatch();

/*
 * catch router error
 */
if ($router->error()) {
    die($router->error());
}
