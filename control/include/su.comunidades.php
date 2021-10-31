<?php
function ensenaComunidad() {
    $con = conectarBD();
    $sql = "SELECT * FROM comunidades";
    $resultado = mysqli_query($con, $sql);
    echo '<table class="tabla-usuarios">';
    echo '<tr>';
    echo '<th>Id</th>';
    echo '<th>Nombre</th>';
    echo '<th>Dieccion</th>';
    echo '<th>Administrador</th>';
    echo '<th>Email Administración</th>';
    echo '<th>Telefono Administracion</th>';
    echo '<th>Portero</th>';
    echo '<th>Telefono Portero</th>';
    echo '</tr>';
    while ($row = mysqli_fetch_assoc($resultado)) {
        echo '<tr>';
        echo '<td id="id-'.$row["id"].'">'.$row["id"].'</td>';
        echo '<td id="nombre-'.$row["id"].'">'.$row["nombre"].'</td>';
        echo '<td id="direccion-'.$row["id"].'">'.$row["direccion"].'</td>';
        echo '<td id="administrador-'.$row["id"].'">'.$row["administrador"].'</td>';
        echo '<td id="emailadmin-'.$row["id"].'"><a href="mailto:'.$row["email_admin"].'"</a>'.$row["email_admin"].'</td>';
        echo '<td id="teladmin-'.$row["id"].'"><a href="tel:'.$row["tel_admin"].'"</a>'.$row["tel_admin"].'</td>';
        echo '<td id="nomport-'.$row["id"].'">'.$row["nom_port"].'</td>';
        echo '<td id="telport-'.$row["id"].'"><a href="tel:'.$row["tel_port"].'"</a>'.$row["tel_port"].'</td>';
        echo '<td><form method="post" action=""><input type="hidden" name="id" value="'.$row["id"].'"><button type="submit" name="borrar-comunidad" class="btn btn-danger">Borrar</button></form>';
        echo '<td><button class="nobtn" onclick="editarComunidad('.$row["id"].')"><i class="fas fa-edit"></i></button></td>';
    }
    echo '</table>';
    mysqli_free_result($resultado);
    mysqli_close($con);
}
if(($_SERVER["REQUEST_METHOD"] == "POST") && isset($_POST["borrar-comunidad"]) && ($_SESSION["su"])){
    $con = conectarBD();
    $sql = "DELETE FROM comunidades WHERE id = ".$_POST["id"].";";
    if(mysqli_query($con, $sql))
        $msg = 'Comunidad creada correctamente';
    else {
        $msg = 'Error 30: No se ha podido crear la comunidad';
    }
    mysqli_close($con);
    header("Location: /control/redir.php?ruta=".urlencode($_SERVER['REQUEST_URI']));
}
if(($_SERVER["REQUEST_METHOD"] == "POST") && isset($_POST["crear-comunidad"]) && ($_SESSION["su"])){
    $con = conectarBD();
    $sql = "INSERT INTO comunidades (nombre, direccion, administrador, email_admin, tel_admin, nom_port, tel_port) VALUES ('".$_POST["nombre"]."', '".$_POST["direccion"]."', '".$_POST["administradores"]."', '".$_POST["email-admin"]."', '".$_POST["tel-admin"]."', '".$_POST["nom-port"]."', '".$_POST["tel-port"]."');";
    if(mysqli_query($con, $sql))
        $msg = 'Comunidad creada correctamente';
    else
        $msg = 'Error 30: No se ha podido crear la comunidad';
    mysqli_close($con);
    header("Location: /control/redir.php?ruta=".urlencode($_SERVER['REQUEST_URI']));
    
}
if(($_SERVER["REQUEST_METHOD"] == "POST") && isset($_POST["editar-comunidad"]) && ($_SESSION["su"])){
    $con = conectarBD();
    $sql = "UPDATE comunidades SET nombre = '".$_POST["nombre"]."', administrador = '".$_POST["administrador"]."',  direccion = '".$_POST["direccion"]."', email_admin = '".$_POST["email-admin"]."', tel_admin = ".$_POST["tel-admin"].", nom_port = '".$_POST["nom-port"]."', tel_port = '".$_POST["tel-port"]."' WHERE id = '".$_POST["id"]."';";
    if(mysqli_query($con, $sql)) 
        $msg = "Comunidad editada correctamente";
    else
        $msg = 'Error 31: No se ha podido editar la comunidad';
    mysqli_close($con);
    header("Location: /control/redir.php?ruta=".urlencode($_SERVER['REQUEST_URI']));
}


?>
<h2>Centro de Comunidades</h2>
<div class="usuarios actual">
    <?php ensenaComunidad() ?>
</div>
<div id="accion">
    <button id="anadir-comunidad">Añadir comunidad</button>
</div>
<div id="pantalla-completa" style="display:none">
    <form class="form-general" id="formulario-nueva-comunidad" style="display:none" action="" method="POST">
        <div align="right"><i id="cancelar-formulario-nueva-comunidad" class="fas fa-times"></i></div>
        <label>Nombre*</label>
        <br>
        <input type="text" name="nombre" required></input>
        <br>
        <label>Dirección*</label>
        <br>
        <input type="text" name="direccion" required></input>
        <br>
        <label>Administradores*</label>
        </br>
        <input type="text" name="administradores" required></input>
        <br>
        <label>Email Administrador*</label>
        <br>
        <input type="email" name="email-admin" required></input>
        <br>
        <label>Telefono Admistrador*</label>
        <br>
        <input type="tel" name="tel-admin" size="9" required></input>
        <br>
        <label>Nombre Portero</label>
        <br>
        <input type="text" name="nom-port"></input>
        <br>
        <label>Telefono Portero</label>
        <br>
        <input type="tel" name="tel-port" size="9" required></input>
        <br>
        <button id="form-but-env" type="submit" name="crear-comunidad" class="btn btn-danger">Añadir comunidad</button>
        <?php echo (isset($msg)) ? $msg : ""?>
    </form>
    <form class="form-general" id="formulario-editar-comunidad" style="display:none" action="" method="POST">
        <div align="right"><i id="cancelar-formulario-editar-comunidad" class="fas fa-times"></i></div>
        <label>Nombre Comunidad</label>
        <br>
        <input id="editar-nombre" type="text" name="nombre" value="" required></input>
        <br>
        <label>Direccion</label>
        <br>
        <input id="editar-direccion" type="text" name="direccion" required></input>
        <br>
        <label>Administrador</label>
        <br>
        <input id="editar-administrador" type="text" name="administrador" value="" required></input>
        <br>
        <label>Email Administrador</label>
        <br>
        <input id="editar-mail-admin" type="email" name="email-admin" value="" required></input>
        <br>
        <label>Telefono Administrador</label>
        <br>
        <input id="editar-tel-admin" type="tel" name="tel-admin" size="9" required></input>
        <br>
        <label>Nombre Portero</label>
        <br>
        <input id="editar-nombre-portero" type="text" name="nom-port" value="" required></input>
        <br>
        <label>Teléfono portero</label>
        <input id="editar-tel-port" type="tel" name="tel-port" size="9" required></input>
        <input id="id" type="number" name="id" value="" required hidden></input>
        <button id="form-but-env" type="submit" name="editar-comunidad" class="btn btn-danger">Editar usuario</button>
    </form>
</div>
