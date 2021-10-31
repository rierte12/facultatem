<?php
    if(!empty($msg)) {
        echo '<div id="mensaje">'.$msg.'<i id="cerrar-mensaje" class="fas fa-times"></i></div>';
        echo '<div id="msg-count"></div>';
        $msg = "";
    }
?>
<footer>
    <?php
        if($_SESSION["logeado"])
            echo '
                 <script src="/control/js/usuarios.js"></script>
                 <script src="/control/js/comunidades.js"></script>
                 <script src="/control/js/main.js"></script>
            ';
            ?>
    <div class="copy">Copyright <?php echo date("Y"); ?> Facultatem</div>
</footer>
</body>