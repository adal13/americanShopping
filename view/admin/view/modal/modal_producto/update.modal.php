<div class="modal fade" id="updateProduct<?php echo $shopping['id_producto'];?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Actualizar Producto</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            
            <div class="modal-body">
                <form action="../../../../../controllers/shopping.controller.php?request=updatetProduct" method="post" enctype="multipart/form-data">
                    <input hidden class="form-control" name="id_producto" value="<?php echo $shopping['id_producto'];?>">
                    <!-- <div class="text-center">
                        <img src="<?php echo URL_IMG.$shopping['path_img']?>" height="50px" alt="Producto">
                    </div> -->

                    <div class="mb-3 text-center">
                        <!-- <label for="recipient-name" class="col-form-label">Imagen Actual</label> -->
                        <img src="<?php echo URL_IMG.$shopping['path_img']?>" alt="Imagen actual" class="img-thumbnail">
                    </div>
                    
                    <div class="row-cols-sm-1 mb-3">
                        <label class="form-label">Tipo</label>
                        <select class="form-select" name="id_categoria" aria-label="Default select example">
                            <?php $id_categoria = $shopping['id_categoria']; ?>
                            <?php if($id_categoria == 1) {?>
                                <option value="1">Jeans</option>
                                <option value="2">Lenceria</option>
                                <option value="3">Deportiva</option>
                                <option value="4">Blusa</option>
                            <?php }elseif ($id_categoria == 2) {?>
                                <option value="2">Lenceria</option>
                                <option value="1">Jeans</option>
                                <option value="3">Deportiva</option>
                                <option value="4">Blusa</option>
                            <?php }elseif ($id_categoria == 3) {?>
                                <option value="3">Deportiva</option>
                                <option value="1">Jeans</option>
                                <option value="2">Lenceria</option>
                                <option value="4">Blusa</option>
                            <?php }elseif ($id_categoria == 4){?>
                                <option value="4">Blusa</option>
                                <option value="1">Jeans</option>
                                <option value="2">Lenceria</option>
                                <option value="3">Deportiva</option>
                            <?php }else{?>
                            <?php }?>
                        </select>
                    </div>
<!-- 
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Recipient:</label>
                        <input type="text" class="form-control" id="recipient-name">
                    </div> -->

                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Marca</label>
                        <input type="text" name="marca" class="form-control" id="recipient-name" value="<?php echo $shopping['marca'];?>" required>
                    </div>

                    <!-- <div class="mb-3">
                        <input type="text" name="precio" class="form-control" id="recipient-name" value="<?php echo $shopping['precio'];?>" required>
                    </div> -->
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Precio</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">$</span>
                            </div>
                            <input type="number" name="precio" class="form-control" value="<?php echo $shopping['precio'] ?>" required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Cantidad</label>
                        <input type="text" name="cantidad" class="form-control" id="recipient-name" value="<?php echo $shopping['cantidad'];?>" required>
                    </div>
                    
                    <div class="row-cols-sm-1 mb-3">
                        <label class="form-label">talla</label>
                        <select class="form-select" name="talla" aria-label="Default select example">
                            <?php $talla = $shopping['talla']; ?>
                            <?php if($talla == 1) {?>
                                <option value="1">CH</option>
                                <option value="2">M</option>
                                <option value="3">G</option>
                                <option value="4">EG</option>
                            <?php }elseif ($talla == 2) {?>
                                <option value="2">M</option>
                                <option value="1">CH</option>
                                <option value="3">G</option>
                                <option value="4">EG</option>
                            <?php }elseif ($talla == 3) {?>
                                <option value="3">G</option>
                                <option value="1">CH</option>
                                <option value="2">M</option>
                                <option value="4">EG</option>
                            <?php }elseif ($talla == 4){?>
                                <option value="4">EG</option>
                                <option value="1">CH</option>
                                <option value="2">M</option>
                                <option value="3">G</option>
                            <?php }else{?>
                            <?php }?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Imagen</label>
                        <input type="file" name="path_img" value="<?php echo $shopping['path_img']?>" class="form-control" id="recipient-name">
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

