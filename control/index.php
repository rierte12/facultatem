<?php
require __DIR__ . "/include/header.control.php";
echo $_SESSION["nombre"];
if($_SESSION["su"])
    echo '<br>Cocoloclo';
?> 
