<?php
require_once dirname(__DIR__). "/vendor/autoload.php";
require_once __DIR__."/routes.php";

use App\Router;

$url = rtrim(urldecode($_SERVER['REQUEST_URI']), '/');
var_dump($url);
Router::dispatch($url, $_SERVER['REQUEST_METHOD']);









