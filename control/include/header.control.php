<?php
require_once __DIR__ . '/../../ext/funciones.php';
if(!isset($_SESSION)){
    session_name('facultatem');
    session_start();
}
echo <<<HTML
    <head>
        <link rel="stylesheet" href="/control/styles/font-awesome/css/all.css">
        <link rel="stylesheet" href="/control/styles/all.css">
    </head>
    HTML;
if(!isset($_SESSION["logeado"]) && (substr($_SERVER['REQUEST_URI'], 0, 14) != "/control/login"))
        header("Location: /control/login.php?url=".urlencode($_SERVER['REQUEST_URI']));
if(isset($_SESSION["logeado"])) {
    include_once __DIR__ . '/menu-usuario.php';
}
?>