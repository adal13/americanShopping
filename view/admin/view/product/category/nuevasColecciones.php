<?php include "../../../../../layout/head.php" ?>
<?php include "../../../../../layout/navigation_admin.php" ?>
<div class="container mt-5">
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#insertProduct">Insertar Producto</button>
</div>
<?php

if (isset($_SESSION['data']) && is_array($_SESSION['data'])) {
    $counter = 0; ?>
    <div class="container">
        <div class="row mb-3">
            <?php
            foreach ($_SESSION['data'] as $shopping) {
                $status = $shopping['status'];
                $talla = $shopping['talla'];
                $categoria = $shopping['id_categoria'];
                $path = $shopping['path_img'];
                $fecha_producto = $shopping['fecha_registro'];
                
                date_default_timezone_set('America/Mexico_City');
                $currentDate = date("Y-m-d");
                $currentDateTime = date("Y-m-d H:i:s");
                $oneWeekAgo = date("Y-m-d", strtotime("-1 week"));

                if($fecha_producto >= $oneWeekAgo){
                    if ($status != 0) {
                        ?>
                        <div class="col-lg-2 col-md-3 col-sm-4 col-6 text-center mt-5">
                            <div class="card border-primary">
                                <div class="image-container">
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#updateImagen<?php echo $shopping['id_producto']; ?>"><img class="mt-3" src="<?php echo URL_IMG.$shopping['path_img']?>" style="width: 50%;" height="50px" alt="Producto"></a>
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">
                                    <?php
                                        if ($categoria == 1) { echo 'Jeans'; } 
                                        elseif ($categoria == 2) { echo 'Lenceria'; } 
                                        elseif ($categoria == 3) { echo 'Deportiva'; } 
                                        elseif ($categoria == 4){ echo 'Blusa'; }
                                        else { echo 'Talla: Desconocida'; }
                                    ?>    
                                    </h5>
                                    <p class="card-text">     
                                        <?php echo $shopping['marca'] ?>
                                    </p>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">$</span>
                                        </div>
                                        <input type="number" name="precio" class="form-control text-center" value="<?php echo $shopping['precio'] ?>" readonly required>
                                    </div>

                                    <div class="box">
                                        <p class="d-inline text-nowrap">
                                            <?php
                                                if ($talla == 1) { echo 'Talla: CH'; } 
                                                elseif ($talla == 2) { echo 'Talla: M'; } 
                                                elseif ($talla == 3) { echo 'Talla: G'; } 
                                                elseif ($talla == 4){ echo 'Talla: EG'; }
                                                else { echo 'Talla: Desconocida'; }
                                            ?>
                                        </p>
                                    </div>
                                    <div>
                                        <td><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#updateProduct<?php echo $shopping['id_producto'];?>">Editar</button></td>
                                    </div>
                                    <div>
                                        <td><button type="button" class="btn btn-danger mt-3" data-bs-toggle="modal"
                                        data-bs-target="#deleteProducto<?php echo $shopping['id_producto']; ?>">Eliminar</button></td>
                                    </div>
                                    <div>
                                        <a href="#" class="btn btn-primary mt-3">Comprar</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php include '../../modal/modal_producto/update.modal.php' ?>
                        <?php include '../../modal/modal_producto/delete.modal.php' ?>

                        <?php include '../../modal/modal_producto/updateImg.modal.php' ?>
                        <?php
                        $counter++;
                        if ($counter % 6 == 6) { ?>
                            </div>
                            <div class="row mb-3">
                        <?php
                        } ?>

                    <?php
                    }
                }?>
            <?php   
            }
            ?>

        </div>
        </div>

        <?php include '../../modal/modal_producto/insert.modal.php' ?>
        
<?php
}
?>
<?php include "../../../../../layout/footer.php" ?>