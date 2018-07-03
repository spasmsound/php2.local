<?php

require __DIR__ . '/autoload.php';

$uri = $_SERVER['REQUEST_URI'];
$parts = explode('/', $uri);

$ctrl = $parts[1] ? ucfirst($parts[1]) : 'News';
$class = '\App\Controllers\\' . $ctrl;

$action = $parts[2] ? ucfirst($parts[2]): 'Default';

$ctrl = new $class;
$ctrl->action($action);