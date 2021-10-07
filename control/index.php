<?php
require __DIR__ . "/include/header.control.php";
?>
<div class="bienvenida-usuario">Hola <?php echo $_SESSION["nombre"] ?></div>
<div id="menu-index">
    <div id="submenu-bar">
        <a class="box" style="color: lightblue" href="/control/comunidades.php" id="comunidades">
            <i class="fas fa-building"></i>
            <div class="menu-index-nombre">Mis Comunidades</div>
        </a>
        <a class="box" style="color: lightgreen" href="/control/perfil.php" id="perifl">
            <i class="fas fa-user"></i>
            <div class="menu-index-nombre">Mi perfil</div>
        </a>    
        <a class="box" style="color: lightcoral" href="/control/logout.php" id="cerrar-sesion">
            <i class="fas fa-sign-out-alt"></i>
            <div class="menu-index-nombre">Cerrar Sesión</div>
        </a>
    </div>
</div>
<?php
require __DIR__ . "/include/footer.control.php";
?> 
