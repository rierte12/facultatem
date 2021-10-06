<footer>
    <?php
        if($_SESSION["logeado"])
            echo '
                 <script src="/control/js/usuarios.js"></script>
                 <script src="/control/js/main.js"></script>
            ';
            ?>
    <div class="copy">Copyright <?php echo date("Y"); ?> Facultatem</div>
</footer>
</body>