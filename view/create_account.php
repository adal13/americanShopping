<?php include "../layout/head.php" ?>

<main>
    <div class="container d-flex align-content-end flex-wrap" >
        <div class="card card-body mt-5 mb-5" >
            <div class="modal-header" >
                <h1 class="text-center">Login</h1>
                <a type="button" class="btn-close" href="<?php echo URL_RUTA?>/index.php"></a>
            </div>
            <form action="../controllers/shopping.controller.php?request=insert" method="post" class="mt-5">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Nombre</label>
                    <input type="text" class="form-control" name="nombre" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Apellido</label>
                    <input type="text" class="form-control" name="apellido" required>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Correo Electronico</label>
                    <input type="text" class="form-control" name="email" required>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Nombre de Usuario</label>
                    <input type="text" class="form-control" name="username" required>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Contraseña</label>
                    <input type="password" class="form-control" name="password" required>
                </div>
                <button type="submit" class="btn btn-primary">Iniciar</button>
            </form>
        </div>
    </div>
</main>


<?php include "../layout/footer.php" ?>