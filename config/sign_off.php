<?php

require_once("../layout/head.php");

//reanudamos la sesion
session_start();
//literalmente la destruimos
session_destroy();
//redireccionamos a index.php (al inicio de sesion)
$salir = URL_RUTA.'/index.php';
header("location: $salir");
?>