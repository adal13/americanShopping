<?php session_start(); ?>

<?php 
$cantidadProductosCarrito = 0;
if(isset($_SESSION['carrito'])) {
    foreach ($_SESSION['carrito'] as $producto) {
        if (!empty($producto)) {
            $cantidadProductosCarrito += 1;
        }
    }
}
?>

<nav class="navbar navbar-expand-lg navbar-light">
    <div class="container-fluid">
        <a class="navbar-brand fw-bold" href="#">American Shopping</a>
        
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="<?php echo URL_RUTA?>/index.php">Inicio</a>
                </li>
                
                <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) { ?>
                    <?php if ($_SESSION['id_tipo_usuario'] == 1) { ?>
                        
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="<?php echo URL_RUTA?>/controllers/shopping.controller.php?request=listUser">Usuarios</a>
                        </li>
                        
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                Producto
                            </a>
                            <ul class="dropdown-menu">
                                <li class="nav-item dropend">
                                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                        aria-expanded="false">
                                        Categoria
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="<?php echo URL_RUTA?>/controllers/shopping.controller.php?request=listProduct&option=nuevas_colecciones">Nuevas Colecciones</a></li>
                                        <li><a class="dropdown-item" href="<?php echo URL_RUTA?>/controllers/shopping.controller.php?request=listProduct&option=deportiva">Deportiva</a></li>
                                        <li><a class="dropdown-item" href="<?php echo URL_RUTA?>/controllers/shopping.controller.php?request=listProduct&option=blusas">Blusas</a></li>
                                        <li><a class="dropdown-item" href="<?php echo URL_RUTA?>/controllers/shopping.controller.php?request=listProduct&option=lenceria">Lenceria</a></li>
                                        <li><a class="dropdown-item" href="<?php echo URL_RUTA?>/controllers/shopping.controller.php?request=listProduct&option=pantalones">Pantalones</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        
                        <?php } elseif ($_SESSION['id_tipo_usuario'] == 2) { ?>                            
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                    Producto
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="nav-item dropend">
                                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                            aria-expanded="false">
                                            Categoria
                                        </a>
                                        <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="<?php echo URL_RUTA?>/controllers/shopping.controller.php?request=listProductUser&option=nuevas_colecciones">Nuevas Colecciones</a></li>
                                        <li><a class="dropdown-item" href="<?php echo URL_RUTA?>/controllers/shopping.controller.php?request=listProductUser&option=deportiva">Deportiva</a></li>
                                        <li><a class="dropdown-item" href="<?php echo URL_RUTA?>/controllers/shopping.controller.php?request=listProductUser&option=blusas">Blusas</a></li>
                                        <li><a class="dropdown-item" href="<?php echo URL_RUTA?>/controllers/shopping.controller.php?request=listProductUser&option=lenceria">Lenceria</a></li>
                                        <li><a class="dropdown-item" href="<?php echo URL_RUTA?>/controllers/shopping.controller.php?request=listProductUser&option=pantalones">Pantalones</a></li>
                                    </ul>
                                    </li>
                                </ul>
                            </li>
                    <?php } ?>
                <?php } else {?>
                    
                <?php }?>

                <li class="nav-item">
                    <a class="nav-link" href="<?php echo URL_RUTA_ADMIN?>/view/know_us.php">Quienes Somos</a>
                </li>

                
                <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) { ?>
                    <?php if ($_SESSION['id_tipo_usuario'] == 1) { ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo URL_RUTA_ADMIN?>/reporte.php">Reporte</a>
                        </li>
                    <?php }?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo URL_RUTA?>/config/sign_off.php">Cerrar Sesion</a>
                    </li>
                    
                <?php } else {?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo URL_RUTA?>/view/login.php">Iniciar Sesion</a>
                    </li>
                <?php }?>

                
            </ul>

            <!-- <div>
                <a class="nav-link active d-flex align-items-center" aria-current="page" data-bs-toggle="modal" data-bs-target="#modal_cart">
                    <img src="<?php echo URL_IMG?>/logo/carrito_compra.png" class="navbar-logo" alt="Logo Carrito de Compras">
                </a>
            </div> -->

            <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) { ?>
                    <?php if ($_SESSION['id_tipo_usuario'] == 1) { ?>
                        <div>
                            <button type="button" class="nav-link active d-flex align-items-center" aria-current="page" data-bs-toggle="modal" data-bs-target="#modal_cart">
                                <?php echo $cantidadProductosCarrito; ?>
                                <img src="<?php echo URL_IMG?>/logo/carrito_compra.png" class="navbar-logo" alt="Logo Carrito de Compras">
                            </button>
                        </div>
            
                    <?php } elseif ($_SESSION['id_tipo_usuario'] == 2) { ?>
                        
                        <div>
                            <button type="button" class="nav-link active d-flex align-items-center" aria-current="page" data-bs-toggle="modal" data-bs-target="#modal_cart">
                                <?php echo $cantidadProductosCarrito; ?>
                                <img src="<?php echo URL_IMG?>/logo/carrito_compra.png" class="navbar-logo" alt="Logo Carrito de Compras">
                            </button>
                        </div>
                    <?php } else{ 
                        echo "No puedes guardar este producto";
                    }?>
            <?php }?>

            <?php // include "../view/carrito_compra.php" ?>
            <?php include "C:/xampp/htdocs/americanShoping/view/carrito_compra.php"; ?>
            
            <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
        </div>
    </div>
</nav>