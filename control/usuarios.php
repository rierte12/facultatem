<?php
require __DIR__ . "/include/header.control.php";
if(!$_SESSION["su"]) {
    paginaError("12", "No tienes permiso para acceder a esta página");
    exit;
}
if(($_SERVER["REQUEST_METHOD"] == "POST") && isset($_POST["borrar-usuario"]) && ($_SESSION["su"])){
    $con = conectarBD();
    $sql = "DELETE FROM usuarios WHERE id = ".$_POST["id"].";";
    if(mysqli_query($con, $sql))
        $msg = 'Usuario borrado correctamente';
    else
        $msg = 'Se ha producido un error';
    mysqli_close($con);
}

if(($_SERVER["REQUEST_METHOD"] == "POST") && isset($_POST["crear-usuario"]) && ($_SESSION["su"])){
    require __DIR__ . "/include/header.control.php";
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $email = $_POST["email"];
    $contra = password_hash($_POST["contra"], PASSWORD_DEFAULT);
    $telefono = $_POST["telefono"];
    if(!isset($_POST["su"])) 
        $su = 1;
    $con = conectarBD();
    $sql = "INSERT INTO `usuarios` (`id`, `nombre`, `apellido`, `telefono`, `email`, `contra`, `comunidades`, `su`) VALUES (NULL,'".$nombre."', '".$apellido."', '".$telefono."', '".$email."', '".$contra."', '', '".$su."');";
    if(mysqli_query($con, $sql))
        $msg = 'Usuario creado correctamente';
    else
        $msg = 'Se ha producido un error';
    mysqli_close($con);
}
function ensenaUsuario() {
    $con = conectarBD();
    $sql = "SELECT * FROM usuarios";
    $resultado = mysqli_query($con, $sql);
    echo '<table class="tabla-usuarios">';
    echo '<tr>';
    echo '<th>Id</th>';
    echo '<th>Nombre</th>';
    echo '<th>Apellido</th>';
    echo '<th>Email</th>';
    echo '<th>Telefono</th>';
    echo '<th>Admin</th>';
    echo '<th>Borrar</th>';
    echo '</tr>';
    while ($row = mysqli_fetch_assoc($resultado)) {
        echo '<tr>';
        echo '<td>'.$row["id"].'</td>';
        echo '<td>'.$row["nombre"].'</td>';
        echo '<td>'.$row["apellido"].'</td>';
        echo '<td><a href="mailto:'.$row["email"].'"</a>'.$row["email"].'</td>';
        echo '<td><a href="tel:'.$row["telefono"].'"</a>'.$row["telefono"].'</td>';
        echo '<td>';
        echo ($row["su"]) ? "Si" : "No";
        echo '</td>';
        echo ($row["su"]) ? '<td>No es posible borrar</td>' : '<td><form method="post" action=""><input type="hidden" name="id" value="'.$row["id"].'"><button type="submit" name="borrar-usuario" class="btn btn-danger">Borrar</button></form>';
        echo '</tr>';
    }
    echo '</table>';
    mysqli_free_result($resultado);
    mysqli_close($con);
}

function editaUsuario() {
    if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["edita-usuario"]) &&($_SESSION["su"])) {

    }
}
?>
<head>
    <title> Usuarios | Facultatem</title>
</head>
<h2> Centro de usuarios</h2>;

<div class="usuarios actual">
    <?php ensenaUsuario()?>
    <?php editaUsuario() ?>
</div>
<div class="opcion">
    
</div>
<div class="accion">
    <button id="anadir-usuario">Añadir usuario</button>
</div>
<!-- <div id="formulario-nuevo-usuario"> -->
    <form id="formulario-nuevo-usuario" action="" method="POST">
        <i id="cancelar-formulario-nuevo-usuario" class="fas fa-times"></i>
        <label>Nombre</label>
        <br>
        <input type="text" name="nombre" required></input>
        <br>
        <label>Apellido</label>
        <br>
        <input type="text" name="apellido" required></input>
        <br>
        <label>Email</label>
        <br>
        <input type="email" name="email" required></input>
        <br>
        <label>Contraseña</label>
        <br>
        <input type="text" name="contra" required></input>
        <br>
        <label>Telefono</label>
        <br>
        <input type="tel" name="telefono" size="9" required></input>
        <br>
        <label>Administrador</label>
        <input name="su" type="checkbox" value="1">
        <br>
        <button type="submit" name="crear-usuario" class="btn btn-danger">Crear usuario</button>
        <?php echo (isset($msg)) ? $msg : ""?>
    </form>
<!--</div> -->
<footer>
    <script src="/control/js/usuarios.js"></script>
</footer>
