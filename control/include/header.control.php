<?php
session_name('facultatem');
session_start();
require_once __DIR__ . '/../../ext/funciones.php';
echo <<<HTML
    <link rel="stylesheet" href="/control/styles/font-awesome/css/all.css">
    <link rel="stylesheet" href="/control/styles/all.css">
HTML;
if((substr($_SERVER['REQUEST_URI'], 0, 18) != "/control/login.php") && substr($_SERVER['REQUEST_URI'], 0, 15) != "/control/login"){
    if(!isset($_SESSION["iniciado"]))
        header("location: /control/login.php?url=".urlencode($_SERVER['REQUEST_URI']));
}
?>