<?php
require __DIR__ . "/include/header.control.php";

if($_SESSION["su"])
    require __DIR__ . "/include/su.comunidades.php";
require __DIR__ . "/include/footer.control.php";
?>
