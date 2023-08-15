<?php
    $carrito_mio = $_SESSION['carrito'] ?? [];
    $_SESSION['carrito'] = $carrito_mio;

    $carrito_mio = isset($_SESSION['carrito']) ? $_SESSION['carrito'] : [];

    // contamos nuestro carrito
    $total = 0;
    $totalcantidad = 0;
    foreach ($carrito_mio as $producto) {
        if (!empty($producto)) {
            $total_cantidad = $producto['cantidad'];
        }
    }
?>

<!-- MODAL CARRITO -->
<div class="modal fade" id="modal_cart" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <form action="#" method="post">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="modal-body">
                        <div>
                            <div class="p-2">
                                <ul class="list-group mb-3">

                                    <?php
                                    if (isset($_SESSION['carrito'])) {
                                        $total = 0;
                                        // $index = 0;
                                        foreach ($_SESSION['carrito'] as $index => $producto) {
                                            if (!empty($producto)) {
                                                //$productoDB = obtenerProductoPorIDController($producto['id']); // Obtener el producto directamente de la base de datos
                                                $cantidad = 1; // Establecer la cantidad deseada

                                                ?>
                                                <li class="list-group-item d-flex justify-content-between lh-condensed">
                                                    <div class="row col-12">
                                                        <div class="col-6 p-0" style="text-align: left; color: #000000;">
                                                            <h6 class="my-0">Cantidad:
                                                                <?php echo $cantidad; ?> :
                                                                <?php $producto['id_producto']; ?>
                                                                <?php echo $producto['marca']; ?>
                                                            </h6>
                                                        </div>
                                                        <div class="col-6 p-0" style="text-align: right; color: #000000;">
                                                            <span style="text-align: right; color: #000000;">
                                                                <?php echo $producto['precio'] * $cantidad; ?>$
                                                            </span>
                                                            <!-- <div class="col-6 p-0" style="text-align: right;"> -->
                                                                <a href="<?php echo URL_RUTA?>/view/eliminar_producto.php?index=<?php echo $index; ?>" class="btn btn-close btn-sm"></a>
                                                                <!-- <a href="#" class="btn btn-danger btn-sm btn-eliminar" data-index="<?php echo $index; ?>">Eliminar</a> -->
                                                                <!-- <a href="javascript:void(0);" class="btn btn-close btn-sm" onclick="eliminarProducto(<?php echo $index; ?>);"></a> -->


                                                            <!-- </div> -->
                                                        </div>
                                                    </div>
                                                </li>
                                            <?php
                                            $index++;
                                            }?>
                                        <?php } ?>
                                    <?php }
                                    ?>
                                    <li class="list-group-item d-flex justify-content-between">
                                        <span style="text-align: left; color: #000000;">Total (MX)</span>
                                        <strong style="text-align: left; color: #000000;">
                                            <?php
                                            if (isset($_SESSION['carrito'])) {
                                                $total = 0;
                                                foreach ($_SESSION['carrito'] as $producto) {
                                                    if (!empty($producto)) {
                                                    $cantidad = 1; 
                                            
                                                    $total = $total + ($producto['precio'] * $cantidad);
                                                    // $TotalPrecio = $total;
                                                    }
                                                }
                                            }
                                            echo $total."$";
                                            ?>
                                        </strong>
                                    </li>

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <a type="button" class="btn btn-primary" href="../../../../../controllers/shopping.controller.php?request=borrarCarro">Vaciar carrito</a>

                    <form action="../../../../../controllers/shopping.controller.php?request=savedata" method="post">
                        <a class="btn btn-primary" href="../../../../../controllers/shopping.controller.php?request=savedata">Comprar</a>
                    </form>
                </div>
            </div>
        </form>
    </div>
</div>


<script>

    // document.addEventListener("DOMContentLoaded", function () {
    //     // Obtener todos los enlaces de eliminación en el carrito
    //     var deleteLinks = document.querySelectorAll(".btn-close");

    //     // Agregar un controlador de clic a cada enlace
    //     deleteLinks.forEach(function (link) {
    //         link.addEventListener("click", function (event) {
    //             event.preventDefault();

    //             // Obtener la URL del enlace
    //             var url = this.getAttribute("href");

    //             // Fetch para cargar el contenido actualizado desde el servidor
    //             fetch(url)
    //                 .then(function (response) {
    //                     return response.text();
    //                 })
    //                 .then(function (data) {
    //                     // Actualizar el contenido de la ventana modal
    //                     document.getElementById("modal-cart").innerHTML = data;
    //                 })
    //                 .catch(function (error) {
    //                     console.error("Error al cargar el contenido: ", error);
    //                 });
    //         });
    //     });
    // });


    //     document.addEventListener("DOMContentLoaded", function () {
    //     var deleteLinks = document.querySelectorAll(".btn-close");

    //     deleteLinks.forEach(function (link) {
    //         link.addEventListener("click", function (event) {
    //             event.preventDefault();

    //             var url = this.getAttribute("href");
    //             var modalContent = document.getElementById("modal_cart");

    //             // Fetch para cargar el contenido actualizado desde el servidor
    //             fetch(url)
    //                 .then(function (response) {
    //                     return response.text();
    //                 })
    //                 .then(function (data) {
    //                     // Actualizar el contenido de la ventana modal
    //                     modalContent.innerHTML = data;
    //                 })
    //                 .catch(function (error) {
    //                     console.error("Error al cargar el contenido: ", error);
    //                 });
    //         });
    //     });
    // });

    function eliminarProducto(index) {
    var modalContent = document.getElementById("modal_cart");
    
    fetch("<?php echo URL_RUTA ?>/view/eliminar_producto.php?index=" + index)
        .then(function(response) {
            return response.text();
        })
        .then(function(data) {
            // Actualizar el contenido de la ventana modal
            modalContent.innerHTML = data;
        })
        .catch(function(error) {
            console.error("Error al cargar el contenido: ", error);
        });
}


</script>