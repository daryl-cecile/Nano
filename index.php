<?php
/**
 * Created by PhpStorm.
 * User: darylcecile
 * Date: 06/06/2020
 * Time: 12:50
 */

use Nano\Router;

require_once "Router.php";

$router = new Nano\Router();

$router->onGET("/*", function($req, $res, $next){

    $next(); // calling this will pass on to the next matching handler

});

$router->onGET("/repeat/{word}", function($req, $res, $next){

    echo str_repeat($req["params"]["word"], 5);

});

$router->mount("/home", function(Router $router){

    $router->onGET("/welcome", function($req, $res, $next){

        // will run when user navigates to /home/welcome

        echo "Hello\n";

    });

});

$router->listen();