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
    echo '
        <body>
        <ul id="barra-user">
            <li id="logout"><a href="/control/logout.php">Cerrar Session</a></li>
            <li class="nom-usuario">'.$_SESSION["nombre"].'</li>
            <li id="hora"class="hora"></li>
        </ul>
    ';
}
?>