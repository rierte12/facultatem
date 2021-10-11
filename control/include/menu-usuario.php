<body>
    <ul id="barra-user">
        <li id="logout"><a href="/control/logout.php">Cerrar Session</a></li>
        <li class="nom-usuario"><?php $_SESSION["nombre"] ?></li>
        <li id="hora"class="hora"></li>
    </ul>
    <div id="barra-navegacion">
        <a href="/control/">Inicio</a>
        <a href="/control/comunidades.php">Mis comunidades</a>
        <a href="/control/perfil.php">Mi perfil</a>
    </div>
    <div id="barra-user-movil">
        <button id="mostrar-menu" class="nobtn"><i class="fas fa-bars"></i></button>
        <div id="submenu-normal"  style="display: none">
            <a href="/control/">Página Principal</a>
            <a href="/control/comunidades.php">Mis comunidades</a>
            <a href="/control/perfil.php"><?php echo $_SESSION["nombre"] ?></a>
        </div>
        <?php
        if($_SESSION["su"]) {
            echo '
                <button id="mostrar-menu-su" class="nobtn"><i class="fas fa-user-shield" style="float: left;"></i></button>
                <div id="submenu-su"  style="display: none">
                <a href="/control/">Página Principal</a>
                <a href="/control/usuarios.php">Gestionar usuarios</a>
                <a href="/control/comunidades.php">Gestionar Comunidades</a>
                </div>
            ';
        }
        ?>
    </div>