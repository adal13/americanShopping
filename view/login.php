<?php include "../layout/head.php" ?>

<main>
    <div class="container d-flex align-content-end flex-wrap" >
        <div class="card card-body mt-5 mb-5" >
            <div class="modal-header" >
                <h1 class="text-center">Login</h1>
                <a type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" href="<?php echo URL_RUTA?>/index.php"></a>
            </div>
            <form action="<?php echo URL_RUTA?>/config/validate.php" method="post" class="mt-5">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Nombre de Usuario</label>
                    <input type="text" class="form-control" name="usuario" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Contraseña</label>
                    <input type="password" class="form-control" name="password" id="exampleInputPassword1" required>
                </div>
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Recuerdame</label>
                </div>
                <button type="submit" class="btn btn-primary">Iniciar</button>
            </form>
        </div>
    </div>
</main>


<?php include "../layout/footer.php" ?>