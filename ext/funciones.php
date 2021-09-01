<?php
    function paginaError($errnmbr, $errmsg) {
        echo <<<HTML
            <body>
                <div id="errorpag">
                <div class="error">
                    <div class="error-x">
                        <h1>E$errnmbr</h1>
                    </div>
                    <h2>$errmsg</h2>
                    <button onclick="window.history.back();" class="home">Atrás</button>
                    <a href="/contacto" class="btn-contact">Contact us</a>
                </div>
                </div>
            </body>
        HTML;
    }
    function conectarBD() {
        $conexion = mysqli_connect('localhost', 'facultatem', 'c91prwu7', 'facultatem');
        if(!$conexion)
            die(paginaError("25", "Conexion fallida a la base de datos"));
        else
            return $conexion;
    }

?>