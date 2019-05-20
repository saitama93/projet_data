<?php
$uri = $_SERVER['REQUEST_URI'];
var_dump ($uri);

switch ($uri){
    case '';
    echo 'babar';
    // include....
    break;
}