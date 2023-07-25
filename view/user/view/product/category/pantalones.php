<?php include "../../../../../layout/head.php" ?>
<?php include "../../../../../layout/navigation_admin.php" ?>

<?php
if (isset($_SESSION['showAmerican']) && is_array($_SESSION['showAmerican'])) {
    $counter = 0; ?>
    <div class="container">
        <div class="row mb-3">
            <?php
            foreach ($_SESSION['showAmerican'] as $shopping) {
                $status = $shopping['status'];
                $talla = $shopping['talla'];
                $categoria = $shopping['id_categoria'];
                $path = $shopping['path_img'];
                if($categoria == 1){
                    if ($status != 0) {
                        ?>
                        <div class="col-lg-2 col-md-3 col-sm-4 col-6 text-center mt-5">
                        <form action="../../../../../controllers/shopping.controller.php?request=shopping_car" method="post">
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
                                    <input hidden name="id_producto" class="form-control border-0 bg-transparent text-center" value="<?php echo $shopping['id_producto'] ?>" readonly>
                                    
                                    <input name="marca" class="form-control border-0 bg-transparent text-center" value="<?php echo $shopping['marca'] ?>" readonly>

                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">$</span>
                                        </div>
                                        <input type="number" name="precio" class="form-control text-center" value="<?php echo $shopping['precio'] ?>" readonly required>
                                    </div>

                                    <input hidden type="number" name="cantidad" class="form-control text-center" value="<?php echo $shopping['cantidad']?>" readonly required>

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
                                        <button type="submit" class="btn btn-primary mt-3">Comprar</button>
                                    </div>
                                </div>
                            </div>
                            </form>
                        </div>

                        <?php include '../../modal/updateImg.modal.php' ?>                        

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
<?php
}
?>

<?php include "../../../../../layout/footer.php" ?>