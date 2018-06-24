<?php

function __autoload($class) {
    $file = str_replace('\\', '/', __DIR__ . '/' . $class . '.php');
    require $file;
}
