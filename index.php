<?php
$uri = $_SERVER['REQUEST_URI'];
var_dump ($uri);

switch ($uri){
    case '/projet_data/babar/';
    echo 'babar';
    // include....
    break;

    case '/projet_data/bonjour/';
    echo 'bonjour';
    // include....
    break;
}