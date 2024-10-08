<?php
require_once '../vendor/autoload.php';

use app\core\Router;

// Inicia uma rota. Verifica se a rota é válida e se existem parâmetros válidos.
$route = new Router();

// Controller e método que serão executados.
$controller = new (CONTROLLERS . $route->getController())();
$method = $route->getMethod();

// Verifica se existem parâmetros vindos da uri e executa o controller.
$controller->setParameters($route->getParameters());
$controller->$method();