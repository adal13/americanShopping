<?php include "../layout/head.php" ?>

<main>
    <div class="container d-flex align-content-end flex-wrap" >
        <div class="card card-body mt-5 mb-5" >
            <div class="modal-header" >
                <h1 class="text-center">Crear Cuenta</h1>
                <a type="button" class="btn-close" href="<?php echo URL_RUTA?>/index.php"></a>
            </div>
            <form action="../controllers/shopping.controller.php?request=insertar" method="post" class="mt-5">
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
                    <input type="email" class="form-control" name="email" required>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Nombre de Usuario</label>
                    <input type="text" class="form-control" name="username" id="username" required>
                </div>

                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Contraseña</label>
                    <input type="password" class="form-control" name="password" id="password" pattern="^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$"  required>
                </div>
                <span id="passwordMessage" class="message"></span>
                
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Escribe nuevamente tu contraseña</label>
                    <input type="password" class="form-control" name="validate_password" id="validate_password" required>
                </div>
                <span id="validatePasswordMessage" class="message"></span>
                
                <button type="submit" class="btn btn-primary">Iniciar</button>
                
                <!-- <form action="../config/validate.php" method="post">
                    <input class="input-line" id="inp1" maxlength="30" name="username" type="hidden" value="<?php echo $_SESSION['username'] ?>" required>
                    <input class="input-line" id="inp3" maxlength="10" name="password" type="hidden" value="<?php echo $_SESSION['password'] ?>" required>
                    <button type="submit" class="btn btn-primary">Iniciar</button>
                </form> -->


            </form>
        </div>
    </div>
</main>


<?php include "../layout/footer.php" ?>