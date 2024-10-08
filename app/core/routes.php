<?php
define('ROUTES',
[
    'GET' =>
    [
        '/' => 'Home@viewHomepage@Página Inicial',
        '/usuario/home' => 'User@userHomepage@Página Inicial do Usuário'
    ],
    'POST' =>
    [
        '/' => 'Home@viewHomePage@Página Inicial'
    ]
]);