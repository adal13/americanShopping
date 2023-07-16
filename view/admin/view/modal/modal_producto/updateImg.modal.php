<div class="modal fade" id="updateImagen<?php echo $shopping['id_producto']; ?>" data-bs-backdrop="static"
    data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">
                    <?php echo $shopping['marca']; ?>
                </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <div class="mb-3 text-center">
                    <!-- <label for="recipient-name" class="col-form-label">Imagen Actual</label> -->
                    <img src="<?php echo URL_IMG . $shopping['path_img'] ?>" alt="Imagen actual" class="img-thumbnail">
                </div>
            </div>

        </div>
    </div>
</div>