<?php
session_start();

if (isset($_GET['index'])) {
    $index = $_GET['index'];
    
    if (isset($_SESSION['carrito'][$index])) {
        unset($_SESSION['carrito'][$index]);
    }
}

$option = $_SESSION['viewAdmin'];

if ($option == 'nuevas_colecciones') {
    header('Location: ../view/admin/view/product/category/nuevasColecciones.php');
} elseif ($option == 'deportiva') {
    header('Location: ../view/admin/view/product/category/deportiva.php');
} elseif ($option == 'blusas') {
    header('Location: ../view/admin/view/product/category/blusa.php');
} elseif ($option == 'lenceria') {
    header('Location: ../view/admin/view/product/category/lenceria.php');
} elseif ($option == 'pantalones') {
    header('Location: ../view/admin/view/product/category/pantalones.php');
}


$options = $_SESSION['viewUser'];

if ($options == 'nuevas_colecciones') {
    header('Location: ../view/user/view/product/category/nuevasColecciones.php');
} elseif ($options == 'deportiva') {
    header('Location: ../view/user/view/product/category/deportiva.php');
} elseif ($options == 'blusas') {
    header('Location: ../view/user/view/product/category/blusa.php');
} elseif ($options == 'lenceria') {
    header('Location: ../view/user/view/product/category/lenceria.php');
} elseif ($options == 'pantalones') {
    header('Location: ../view/user/view/product/category/pantalones.php');
}

// header("Location: admin/view/product/category/deportiva.php");

?>
