<?php
    require __DIR__ . "/include/header.control.php";
    session_name('facultatem');
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 36000, $params['path'], $params['domain'], $params['secure'], isset($params['httponly']));
    session_destroy();
    echo '<body>Sesión cerrada correctatmente. Redirigiendo a página principal</body>';
    header("Location: /");

?>