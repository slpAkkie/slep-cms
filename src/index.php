<?php

/**
 * Этот файл является компонентном slepCMS.
 *
 * @author Shamanin Alexander
 * @version 0.0.1
 */

require_once('./vendor/autoload.php');

use App\Core\Router;

echo('<pre>');
$router = new Router($_SERVER['REQUEST_URI']);
