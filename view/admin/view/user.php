<?php include "../../../layout/head.php" ?>
<?php include "../../../layout/navigation_admin.php" ?>

<div class="container mt-5">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Nombre</th>
                <th scope="col">Apellido</th>
                <th scope="col">Correo</th>
                <th scope="col">Tipo de Usuario</th>
                <th scope="col">Usuario</th>
                <th scope="col">Status</th>
                <th scope="col" colspan="2"></th>
            </tr>

        </thead>

        <?php 

        // if (isset($_SESSION['loggedin']) && is_array($_SESSION['loggedin'])) {
            if (isset($_SESSION['data']) && is_array($_SESSION['data'])) {
            foreach ($_SESSION['data'] as $shopping) {
            $status = $shopping['status']; 
            if ($status != 0) {
                ?>
                <tbody>
                    <tr class="text-center">
                        <td><?php echo $shopping['id_usuario']; ?></td>
                        <td><?php echo $shopping['nombre']; ?></td>
                        <td><?php echo $shopping['apellido']; ?></td>
                        <td><?php echo $shopping['email']; ?></td>
                        <td><?php echo $shopping['id_tipo_usuario']; ?></td>
                        <td><?php echo $shopping['username']; ?></td>
                        <td><?php echo $shopping['status']; ?></td>
                        <div class="m-auto">
                            <td><button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#update<?php echo $shopping['id_usuario'];?>">Editar</button></td>

                            <td><button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#delete<?php echo $shopping['id_usuario']; ?>">Eliminar</button></td>
                        </div>
                    </tr>
                </tbody>
                
                <?php include "modal/modal_user/edit.modal.php" ?>
                <?php include "modal/modal_user/delete.modal.php" ?>

            <?php }?>
            <?php }?>
        <?php } ?>
    </table>

    <a type="button" class="btn btn-primary" href="<?php echo URL_RUTA_ADMIN?>/view/restore.user.php">Reestablecer Usuario</a>

</div>


<?php include "../../../layout/footer.php" ?>