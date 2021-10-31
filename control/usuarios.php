<?php
require __DIR__ . "/include/header.control.php";
if($_SESSION["logeado"]) {
    if(!$_SESSION["su"]) {
        paginaError("12", "No tienes permiso para acceder a esta página", 403);
        exit;
    }
}
if(($_SERVER["REQUEST_METHOD"] == "POST") && isset($_POST["borrar-usuario"]) && ($_SESSION["su"])){
    $con = conectarBD();
    $sql = "DELETE FROM usuarios WHERE id = ".$_POST["id"].";";
    if(mysqli_query($con, $sql))
        $msg = 'Usuario borrado correctamente';
    else
        $msg = 'Error 24: No se ha podido borrar el usuario';
    mysqli_close($con);
    header("Location: /control/redir.php?ruta=".urlencode($_SERVER['REQUEST_URI']));
}

if(($_SERVER["REQUEST_METHOD"] == "POST") && isset($_POST["crear-usuario"]) && ($_SESSION["su"])){
    require __DIR__ . "/include/header.control.php";
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $email = $_POST["email"];
    $contra = password_hash($_POST["contra"], PASSWORD_DEFAULT);
    $telefono = $_POST["telefono"];
    if(!isset($_POST["su"])) 
        $su = 0;
    else
        $su = 1;
    $con = conectarBD();
    $sql = "INSERT INTO `usuarios` (`nombre`, `apellido`, `telefono`, `email`, `contra`, `su`) VALUES ('".$nombre."', '".$apellido."', '".$telefono."', '".$email."', '".$contra."', '".$su."');";
    if(mysqli_query($con, $sql)) {
        $msg = 'Usuario creado correctamente';
    }
    else {
        $msg = 'Error 23: No se ha podido crear el usuarios';
        echo mysqli_error($con);
    }
    mysqli_close($con);
    header("Location: /control/redir.php?ruta=".urlencode($_SERVER['REQUEST_URI']));
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
        echo '<td id="id-'.$row["id"].'">'.$row["id"].'</td>';
        echo '<td id="nombre-'.$row["id"].'">'.$row["nombre"].'</td>';
        echo '<td id="apellido-'.$row["id"].'">'.$row["apellido"].'</td>';
        echo '<td id="email-'.$row["id"].'"><a href="mailto:'.$row["email"].'"</a>'.$row["email"].'</td>';
        echo '<td id="telefono-'.$row["id"].'"><a href="tel:'.$row["telefono"].'"</a>'.$row["telefono"].'</td>';
        echo '<td id="su-'.$row["id"].'">';
        echo ($row["su"]) ? "Si" : "No";
        echo '</td>';
        echo ($row["su"]) ? '<td>No es posible borrar</td>' : '<td><form method="post" action=""><input type="hidden" name="id" value="'.$row["id"].'"><button type="submit" name="borrar-usuario" class="btn btn-danger">Borrar</button></form>';
        echo '<td><button class="nobtn" onclick="editarUsuario('.$row["id"].')"><i class="fas fa-user-edit"></i></button></td>';
        echo '</tr>';
    }
    echo '</table>';
    mysqli_free_result($resultado);
    mysqli_close($con);
}

if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["editar-usuario"]) && ($_SESSION["su"])) {
    $con = conectarBD();
    if(!isset($_POST["su"])) 
            $su = 0;
        else
            $su = 1;
    if($_POST["contra"] != "")   
        $sql = "UPDATE usuarios SET nombre = '".$_POST["nombre"]."', apellido = '".$_POST["apellido"]."', email= '".$_POST["email"]."', telefono = ".$_POST["telefono"].", su = ".$su.", contra='".password_hash($_POST["contra"], PASSWORD_DEFAULT)."' WHERE id = ".$_POST["id"]."";
    else
        $sql = "UPDATE usuarios SET nombre = '".$_POST["nombre"]."', apellido = '".$_POST["apellido"]."', email= '".$_POST["email"]."', telefono = ".$_POST["telefono"].", su = ".$su." WHERE id = ".$_POST["id"]."";
    if(mysqli_query($con, $sql))
        $msg = 'Usuario editado correctamente';
    else
        $msg = 'Error 25: No se ha podido editar el usuario';
    echo mysqli_error($con);
    mysqli_close($con);
    header("Location: /control/redir.php?ruta=".urlencode($_SERVER['REQUEST_URI']));
    

}
    
?>
<head>
    <title> Usuarios | Facultatem</title>
</head>
<body id="usuarios">
<h2> Centro de usuarios</h2>

<div class="usuarios actual">
    <?php ensenaUsuario()?>
</div>
<div class="opcion">
    
</div>
<div id="accion">
    <button id="anadir-usuario">Añadir usuario</button>
</div>
<div id="pantalla-completa" style="display:none">
    <form class="form-general" id="formulario-nuevo-usuario" style="display:none" action="" method="POST">
        <div align="right"><i id="cancelar-formulario-nuevo-usuario" class="fas fa-times"></i></div>
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
        <input name="su" type="checkbox" value="1">
        <label>Administrador</label>
        <br>
        <button id="form-but-env" type="submit" name="crear-usuario" class="btn btn-danger">Crear usuario</button>
        <?php echo (isset($msg)) ? $msg : ""?>
    </form>
    <form class="form-general" id="formulario-editar-usuario" style="display:none" action="" method="POST">
        <div align="right"><i id="cancelar-formulario-editar-usuario" class="fas fa-times"></i></div>
        <label>Nombre</label>
        <br>
        <input id="editar-nombre" type="text" name="nombre" value="" required></input>
        <br>
        <label>Apellido</label>
        <br>
        <input id="editar-apellido" type="text" name="apellido" required></input>
        <br>
        <label>Email</label>
        <br>
        <input id="editar-email"type="email" name="email" required></input>
        <br>
        <label>Contraseña</label>
        <br>
        <input name="contra" type="password" placeholder="(Sin modificar)"></input>
        <br>
        <label>Telefono</label>
        <br>
        <input id="editar-telefono" type="tel" name="telefono" size="9" required></input>
        <br>
        <input id="id" type="number" name="id" hidden required></input>
        <button id="form-but-env" type="submit" name="editar-usuario" class="btn btn-danger">Editar Usuario</button>
        <?php echo (isset($msg)) ? $msg : ""?>
    </form>
</div>
<?php require __DIR__ . "/include/footer.control.php"; ?>

