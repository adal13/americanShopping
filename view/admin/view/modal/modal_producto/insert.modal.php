<div class="modal fade" id="insertProduct" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Registrar Libro</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            
            <div class="modal-body">
                <form action="../../../../../controllers/shopping.controller.php?request=insertImg" method="post" enctype="multipart/form-data">

                    <select class="form-select" name="id_categoria" aria-label="Default select example">
                        <option selected>Categoria</option>
                        <option value="1">Jeans</option>
                        <option value="2">Lenceria</option>
                        <option value="3">Deportiva</option>
                        <option value="4">Blusa</option>
                    </select>

                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Marca</label>
                        <input type="text" name="marca" class="form-control" id="recipient-name" required>
                    </div>

                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Precio</label>
                        <input type="text" name="precio" class="form-control" id="recipient-name" required>
                    </div>

                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Cantidad</label>
                        <input type="text" name="cantidad" class="form-control" id="recipient-name" required>
                    </div>

                    <select class="form-select" name="talla" aria-label="Default select example">
                        <option selected>Talla</option>
                        <option value="1">CH</option>
                        <option value="2">M</option>
                        <option value="3">G</option>
                        <option value="4">EG</option>
                    </select>

                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Imagen</label>
                        <input type="file" name="path_img" class="form-control" id="recipient-name" required>
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

