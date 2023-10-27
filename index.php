<?php

// contante para controle de fluxo da aplicação
define('CONTROL', true);

// importar arquivo de rotas para a variavel
$rotas = require_once('rotas/routes.php');
// importar arquivo de funções para consumir a api
require_once('api/consumer.php');

// definir a rota que existe a URL do navegador
$rota = $_GET['route'] ?? 'home';

if (!in_array($rota, $rotas)) {
    $rota = '404';
}


// fluxo das rotas validas para acesso
switch ($rota) {
    case 'home':
        require_once 'layout/header.php';
        require_once 'pages/home.php';
        require_once 'layout/footer.php';
        break;
    case 'pais':
        require_once 'layout/header.php';
        require_once 'pages/pais.php';
        require_once 'layout/footer.php';
        break;
    case '404':
        require_once 'layout/header.php';
        require_once 'pages/404.php';
        require_once 'layout/footer.php';
        break;

};
