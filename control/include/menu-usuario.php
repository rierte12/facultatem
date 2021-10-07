<body>
    <ul id="barra-user">
        <li id="logout"><a href="/control/logout.php">Cerrar Session</a></li>
        <li class="nom-usuario"><?php $_SESSION["nombre"] ?></li>
        <li id="hora"class="hora"></li>
    </ul>
    <div id="barra-user-movil" align="right">
        <button id="mostrar-menu" class="nobtn"><i class="fas fa-bars"></i></button>
        <div id="submenu-normal"  style="display: none">
            <a href="/control/">Página Principal</a>
            <a href="/control/comunidades.php">Mis comunidades</a>
            <a href="/control/perfil.php"><?php $_SESSION["nombre"] ?></a>
        </div>
    </div>