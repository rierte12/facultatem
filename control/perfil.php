<?php
    require __DIR__ . "/include/header.control.php";
    echo "uwu";
?>
<div class="foto-perfil"></div>
<divclass="mis-datos">
    <li>Id de empleado: <?php echo $_SESSION["userid"] ?></li>
    <li>Nombre: <?php echo $_SESSION["nombre"] ?></li>
    <li>Apellido: <?php echo $_SESSION["apellido"] ?></li>
    <li>Email: <?php echo $_SESSION["email"] ?></li>
    <li>Telefono: <?php echo $_SESSION["telefono"] ?></li>
    <p>Si existe algún error comuniquelo al adminstrador</p>
<?php
    require __DIR__ . "/include/footer.control.php";
?>