<div class="modal fade" id="update<?php echo $shopping['id_usuario']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Actualizar</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            
            <div class="modal-body">
                <form action="../../../controllers/shopping.controller.php?request=update" method="POST">

                    <input type="hidden" class="form-control" name="id_usuario" value="<?php echo $shopping['id_usuario'];?>">

                    <div class="row-cols-sm-1 mb-3">
                        <label class="form-label">Nombre</label>
                        <input type="text" class="form-control" name="nombre" value="<?php echo $shopping['nombre'];?>">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">apellido</label>
                        <input type="text" class="form-control" name="apellido" value="<?php echo $shopping['apellido'];?>">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Correo Electronico</label>
                        <input type="text" class="form-control" name="email" value="<?php echo $shopping['email'];?>">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Tipo usuario</label>
                        <input type="text" class="form-control" name="id_tipo_usuario" value="<?php echo $shopping['id_tipo_usuario'];?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nombre de Usuario</label>
                        <input type="text" class="form-control" name="username" value="<?php echo $shopping['username'];?>">
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