<?php session_start(); ?>

<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand fw-bold" href="#"> </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="<?php echo URL_RUTA?>/index.php">Inicio</a>
                </li>
                
                <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) { ?>
                    <?php if ($_SESSION['id_tipo_usuario'] == 1) { ?>
                        
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="<?php echo URL_RUTA?>/controllers/shopping.controller.php?request=listUser">Usuarios</a>
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
                                        <li><a class="dropdown-item" href="<?php echo URL_RUTA_ADMIN?>/view/product/category/nuevasColecciones.php">Nuevas Colecciones</a></li>
                                        <li><a class="dropdown-item" href="<?php echo URL_RUTA_ADMIN?>/view/product/category/deportiva.php">Deportiva</a></li>
                                        <li><a class="dropdown-item" href="<?php echo URL_RUTA_ADMIN?>/view/product/category/blusa.php">Blusas</a></li>
                                        <li><a class="dropdown-item" href="<?php echo URL_RUTA_ADMIN?>/view/product/category/lenceria.php">Lenceria</a></li>
                                        <li><a class="dropdown-item" href="<?php echo URL_RUTA_ADMIN?>/view/product/category/pantalones.php">Pantalones</a></li>
                                    </ul>
                                </li>
        
                                <li class="nav-item dropend">
                                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                        aria-expanded="false">
                                        Marca
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="<?php echo URL_RUTA_ADMIN?>/view/product/marca/disney.php">Disney</a></li>
                                        <li><a class="dropdown-item" href="<?php echo URL_RUTA_ADMIN?>/view/product/marca/adidas.php">Adidas</a></li>
                                        <li>
                                            <hr class="dropdown-divider">
                                        </li>
                                        <li class="nav-item dropend">
                                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                                aria-expanded="false">
                                                Dropdown
                                            </a>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href="#">Action</a></li>
                                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                            </ul>
                                        </li>
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
                                            <li><a class="dropdown-item" href="<?php echo URL_RUTA_ADMIN?>/view/product/category/nuevasColecciones.php">Nuevas Colecciones</a></li>
                                            <li><a class="dropdown-item" href="<?php echo URL_RUTA_ADMIN?>/view/product/category/deportiva.php">Deportiva</a></li>
                                            <li><a class="dropdown-item" href="<?php echo URL_RUTA_ADMIN?>/view/product/category/blusa.php">Blusas</a></li>
                                            <li><a class="dropdown-item" href="<?php echo URL_RUTA_ADMIN?>/view/product/category/lenceria.php">Lenceria</a></li>
                                            <li><a class="dropdown-item" href="<?php echo URL_RUTA_ADMIN?>/view/product/category/pantalones.php">Pantalones</a></li>
                                        </ul>
                                    </li>
            
                                    <li class="nav-item dropend">
                                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                            aria-expanded="false">
                                            Marca
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="<?php echo URL_RUTA_ADMIN?>/view/product/marca/disney.php">Disney</a></li>
                                            <li><a class="dropdown-item" href="<?php echo URL_RUTA_ADMIN?>/view/product/marca/adidas.php">Adidas</a></li>
                                            <li>
                                                <hr class="dropdown-divider">
                                            </li>
                                            <li class="nav-item dropend">
                                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                                    aria-expanded="false">
                                                    Dropdown
                                                </a>
                                                <ul class="dropdown-menu">
                                                    <li><a class="dropdown-item" href="#">Action</a></li>
                                                    <li><a class="dropdown-item" href="#">Another action</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                    <?php } ?>
                <?php } else {?>
                    
                <?php }?>

                <li class="nav-item">
                    <a class="nav-link" onclick="know_us()" href="<?php echo URL_RUTA_ADMIN?>/view/know_us.php">Quienes Somos</a>
                </li>

                <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) { ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo URL_RUTA?>/config/sign_off.php">Cerrar Sesion</a>
                    </li>
                    
                <?php } else {?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo URL_RUTA?>/view/login.php">Iniciar Sesion</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo URL_RUTA?>/view/create_account.php">Crear Una Cuenta</a>
                    </li>
                <?php }?>

            </ul>
            <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
        </div>
    </div>
</nav>