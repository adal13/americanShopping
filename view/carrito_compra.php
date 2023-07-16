<?php include "../layout/head.php" ?>
<?php include "../layout/navigation_admin.php" ?>
<div class="container mt-5 text-center">
    <!-- Contenedor principal del carrito de compras -->
    <div class="cart-container">
        <!-- Encabezado del carrito de compras -->
        <div class="cart-header">
            <h2>Carrito de Compras</h2>
        </div>
    
        <!-- Contenido del carrito de compras -->
        <div class="cart-content">
            <!-- Lista de productos en el carrito -->
            <ul class="product-list">
                <li>
                    <div class="product">
                        <div class="product-image">
                            <img src="ruta_imagen.jpg" alt="Producto">
                        </div>
                        <div class="product-details">
                            <h3>Nombre del Producto</h3>
                            <p>Precio: $99.99</p>
                            <div class="quantity">
                                <button class="btn btn-sm btn-secondary">-</button>
                                <input type="number" value="1" min="1">
                                <button class="btn btn-sm btn-secondary">+</button>
                            </div>
                        </div>
                        <div class="product-actions">
                            <button class="btn btn-danger">Eliminar</button>
                        </div>
                    </div>
                </li>
                <!-- Agregar más elementos de la lista de productos -->
            </ul>
    
            <!-- Total y botones de acción -->
            <div class="cart-footer">
                <div class="total">
                    <h4>Total: $199.98</h4>
                </div>
                <div class="actions">
                    <button class="btn btn-outline-danger">Vaciar Carrito</button>
                    <button class="btn btn-primary">Realizar Pago</button>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include "../layout/footer.php" ?>