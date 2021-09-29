 <?php
require __DIR__ . "/include/header.control.php";
if(($_SERVER["REQUEST_METHOD"] == "POST") && isset($_POST["iniciar-sesion"])){
    $con = conectarBD(); 
    $contra =  noSQLInj($_POST["contra"]); 
    $usuario =  noSQLInj($_POST["usuario"]); 
    $sql = "SELECT *  FROM `usuarios` WHERE `email`='".$usuario."';";
    $resultado = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($resultado);
    mysqli_close($con);
    if(!$row)
        $error = "Usuario no encontrado";
    else {
        if(password_verify($contra, $row["contra"])) {
            $_SESSION["userid"] = $row["id"];
            $_SESSION["nombre"] = $row["nombre"];
            $_SESSION["apellido"] = $row["apellido"];
            $_SESSION["email"] = $row["email"];
            $_SESSION["telefono"] = $row["telefono"];
            $_SESSION["comunidades"] = $row["comunidades"];
            $_SESSION["su"] = $row["su"];
            $_SESSION["iniciado"] = "si";
            if(!isset($_GET["url"]))
                header("Location: /control/");
            else
                header("Location: ".$_GET["url"]);
        }
        else
            $error = "Contraseña incorrecta";
    }
}
?>
<head>
    <title>Iniciar Sesión</title>
</head>
<body id="login">
    <div class="login">
        <h2>Inicar Sesión</h2>
        <form class="login-form" action="" method="POST">
            <label><i class="fa fa-at"></i></label>
            <input type="email" name="usuario" placeholder="Correo electrónico" required></input>
            <br>
            <label><i class="fa fa-key"></i></label>
            <input type="password" name="contra" placeholder="Contraseña" required></input>
            <br>
            <?php 
            if(!empty($error))
                echo '<div class="login-error">'.$error.'</div>';
            ?>
            <button type="submit" name="iniciar-sesion">Submit</button>
        </form>
    </div>
</body>