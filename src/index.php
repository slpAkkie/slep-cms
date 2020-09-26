<?php

/**
 * Этот файл является компонентном slepCMS.
 *
 * @author Shamanin Alexander
 * @version 0.0.1
 */

require_once('./vendor/autoload.php');

use Core\Router;
use Helper\DI;


echo '<pre>';


$di = new DI();

$router = new Router($di);
$router->dissasemble();
