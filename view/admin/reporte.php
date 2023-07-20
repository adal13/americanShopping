<?php include "../../layout/head.php" ?>
<?php include "../../layout/navigation_admin.php" ?>

<div class="container">
    <form action="<?php echo URL_RUTA;?>/controllers/shopping.controller.php" method="GET">
    <input type="hidden" name="request" value="filter">
        <div class="row mt-3">

            <div class="col-md-4">

                <div class="form-group">
                    <label><b>Del Dia</b></label>
                    <input type="date" name="from_date"
                        value="<?php if (isset($_GET['from_date'])) {
                            echo $_GET['from_date'];
                        } ?>"
                        class="form-control">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label><b> Hasta el Dia</b></label>
                    <input type="date" name="to_date"
                        value="<?php if (isset($_GET['to_date'])) {
                            echo $_GET['to_date'];
                        } ?>"
                        class="form-control">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label><b></b></label> <br>
                    <button type="submit" class="btn btn-primary">Buscar</button>
                    <a class="btn btn-primary" href="<?php echo URL_RUTA_ADMIN?>/fpdf/reporte.php" target="_black" >Reporte</a>
                </div>
            </div>
        </div>
        <br>
    </form>
    
    <div class="container mt-1 text-center">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Cliente</th>
                    <th scope="col">Tipo de Usuario</th>
                    <th scope="col">Marca</th>
                    <th scope="col">Categoria</th>
                    <th scope="col">Cantidad</th>
                    <th scope="col">Total</th>
                    <th scope="col">Fecha</th>
                </tr>
    
            </thead>
    
            <?php 

            // if (isset($_SESSION['loggedin']) && is_array($_SESSION['loggedin'])) {
                if (isset($_SESSION['filter']) && is_array($_SESSION['filter'])) {
                foreach ($_SESSION['filter'] as $shopping) {
                //$status = $shopping['status']; 
                //if ($status != 0) {
                    ?>
                    <tbody>
                        <tr class="text-center">
                            <td><?php echo $shopping['nombre']; ?></td>
                            <td><?php echo $shopping['tx_tipo_usuario']; ?></td>
                            <td><?php echo $shopping['marca']; ?></td>
                            <td><?php echo $shopping['tx_categoria']; ?></td>
                            <td><?php echo $shopping['cantida']; ?></td>
                            <td><?php echo $shopping['total']; ?></td>
                            <td><?php echo $shopping['fecha_venta']; ?></td>
                        </tr>
                    </tbody>
    
                <?php //}?>
                <?php }?>
            <?php } ?>
        </table>
    </div>
</div>



<?php include "../../layout/footer.php" ?>