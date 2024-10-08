<?php
// CONFIG LOCAL

define('CSS','/public_html/css/');
define('JS','/public_html/js/');
define('IMG','/public_html/img/');


// CONFIG PRODUÇÃO

// define('CSS','/css/');
// define('JS','/js/');
// define('IMG','/img/');

// Regex utilizada nas definições de rotas e parâmetros
define('REGEX_ROUTE','/^\/[a-z]+\/[a-z]+/i');
define('REGEX_PARAMETERS','/\/[a-z]+\/[a-zA-Zà-ü0-9. ]+/i');

// Diretório dos controllers
define('CONTROLLERS','app\\controllers\\');

// D E B U G 

// Vardump com interrupção de script
function sdump($item)
{
    echo "<pre>";
    var_dump($item);
    echo "</pre>";
    die();
}

// Vardump sem interrupção de script
function dump($item)
{
    echo "<pre>";
    var_dump($item);
    echo "</pre>";
}