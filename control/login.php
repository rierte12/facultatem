<?php
require __DIR__ . "/include/header.control.php";
if($_SERVER["REQUEST_METHOD"] == "GET") {
    if($_SESSION["logeado"]){
            echo '<script>
            window.onload = window.history.back()
            </script>';
    }
}
if(($_SERVER["REQUEST_METHOD"] == "POST") && isset($_POST["iniciar-sesion"])){
    $con = conectarBD(); 
    $contra =  $_POST["contra"]; 
    $usuario = $_POST["usuario"]; 
    $stmt = $con->prepare("SELECT * FROM usuarios WHERE email = ?");
    $stmt->bind_param("s", $usuario);
    $stmt->execute();
    $row = $stmt->get_result();
    $user = $row->fetch_assoc();
    $con->close();
    if(!$user)
        $error = "Usuario no encontrado";
    else {
        if(password_verify($contra, $user["contra"])) {
            $_SESSION["userid"] = $user["id"];
            $_SESSION["nombre"] = $user["nombre"];
            $_SESSION["apellido"] = $user["apellido"];
            $_SESSION["email"] = $user["email"];
            $_SESSION["telefono"] = $user["telefono"];
            $_SESSION["comunidades"] = $user["comunidades"];
            $_SESSION["su"] = $user["su"];
            $_SESSION["logeado"] = 1;
            if(!isset($_GET["url"]))
                header("Location: /control/");
            else
                header("Location: ".$_GET["url"]);
        }
        else
            $msg = "Contraseña incorrecta";
    }
}
?>
<head>
    <title>Iniciar Sesión</title>
</head>
<body id="login">
    <div class="login">
        <h3>Inicar Sesión</h3>
        <form class="login-form" action="" method="POST">
            <label><i class="fa fa-at"></i></label>
            <input type="email" name="usuario" placeholder="Correo electrónico" required></input>
            <br>
            <label><i class="fa fa-key"></i></label>
            <input type="password" name="contra" placeholder="Contraseña" required></input>
            <br>
            <button type="submit" name="iniciar-sesion">Submit</button>
        </form>
    </div>
    <?php require __DIR__ . "/include/footer.control.php"; ?>
</body>