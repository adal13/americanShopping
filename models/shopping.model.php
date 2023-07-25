<?php
class americanShopping
{
    private $PDO;

    public function __construct()
    {
        require_once("C:/xampp/htdocs/americanShoping/config/db.config.php");
        $con = new db();
        $this->PDO = $con->conexion();
    }

    public function insertar($nombre, $apellido, $email, $username, $password)
    {
        $stament = $this->PDO->prepare("INSERT INTO users VALUES(0,:nombre, :apellido, 2, :email, :username, :password, 1, now())");
        $stament->bindParam(":nombre", $nombre);
        $stament->bindParam(":apellido", $apellido);
        $stament->bindParam(":email", $email);
        $stament->bindParam(":username", $username);
        $stament->bindParam(":password", $password);
        return ($stament->execute()) ? $this->PDO->lastInsertId() : false;
    }

    public function showAmericanShopping()
    {
        $stament = $this->PDO->prepare("SELECT * FROM users");
        return ($stament->execute()) ? $stament->fetchAll() : false;
    }

    public function update($id_usuario, $nombre, $apellido, $email, $id_tipo_usuario, $username)
    {
        $stament = $this->PDO->prepare("UPDATE users SET 
                                                    nombre = :nombre, 
                                                    apellido = :apellido,
                                                    email = :email,
                                                    id_tipo_usuario = :id_tipo_usuario,
                                                    username = :username
                                                    /* fecha_creacion = now(), */
                                                    WHERE id_usuario = :id_usuario");

        $stament->bindParam(":id_usuario", $id_usuario);
        $stament->bindParam(":nombre", $nombre);
        $stament->bindParam(":apellido", $apellido);
        $stament->bindParam(":email", $email);
        $stament->bindParam(":id_tipo_usuario", $id_tipo_usuario);
        $stament->bindParam(":username", $username);

        return ($stament->execute());
    }

    public function desactive($id_usuario)
    {
        $stament = $this->PDO->prepare("UPDATE users set status = 0 WHERE id_usuario = :id_usuario");
        $stament->bindParam(":id_usuario", $id_usuario);
        return ($stament->execute()) ? true : false;
    }

    public function active($id_usuario)
    {
        $stament = $this->PDO->prepare("UPDATE users set status = 1 WHERE id_usuario = :id_usuario");
        $stament->bindParam(":id_usuario", $id_usuario);
        return ($stament->execute()) ? true : false;
    }
//---------------------------------------------------------------------------------------------------------------------------
    // Models product
    public function showProductAmericanShopping()
    {
        $stament = $this->PDO->prepare("SELECT * FROM producto");
        return ($stament->execute()) ? $stament->fetchAll() : false;
    }

    public function insertarProduct($id_categoria, $marca, $precio, $cantidad, $talla, $path_img)
    {
        $stament = $this->PDO->prepare("INSERT INTO producto VALUES(0, :id_categoria, :marca, :precio, :cantidad, :talla, 1, :path_img, now())");
        $stament->bindParam(":id_categoria", $id_categoria);
        $stament->bindParam(":marca", $marca);
        $stament->bindParam(":precio", $precio);
        $stament->bindParam(":cantidad", $cantidad);
        $stament->bindParam(":talla", $talla);
        $stament->bindParam(":path_img", $path_img);
        return ($stament->execute()) ? $this->PDO->lastInsertId() : false;
    }

    public function updateProduct($id_producto, $id_categoria, $marca, $precio, $talla, $path_img)
    {
        $stament = $this->PDO->prepare("UPDATE producto SET 
                                                    id_categoria = :id_categoria, 
                                                    marca = :marca,
                                                    precio = :precio,
                                                    talla = :talla,
                                                    path_img = :path_img
                                                    /* fecha_creacion = now(), */
                                                    WHERE id_producto = :id_producto");

        $stament->bindParam(":id_producto", $id_producto);
        $stament->bindParam(":id_categoria", $id_categoria);
        $stament->bindParam(":marca", $marca);
        $stament->bindParam(":precio", $precio);
        $stament->bindParam(":talla", $talla);
        $stament->bindParam(":path_img", $path_img);

        return ($stament->execute());
    }

    public function updateProducts($id_producto, $id_categoria, $marca, $precio, $cantidad,$talla)
    {
        $stament = $this->PDO->prepare("UPDATE producto SET 
                                                    id_categoria = :id_categoria, 
                                                    marca = :marca,
                                                    precio = :precio,
                                                    cantidad = :cantidad,
                                                    talla = :talla
                                                    WHERE id_producto = :id_producto");

        $stament->bindParam(":id_producto", $id_producto);
        $stament->bindParam(":id_categoria", $id_categoria);
        $stament->bindParam(":marca", $marca);
        $stament->bindParam(":precio", $precio);
        $stament->bindParam(":cantidad", $cantidad);
        $stament->bindParam(":talla", $talla);

        return ($stament->execute());
    }

    public function desactiveProduct($id_producto)
    {
        $stament = $this->PDO->prepare("UPDATE producto set status = 0 WHERE id_producto = :id_producto");
        $stament->bindParam(":id_producto", $id_producto);
        return ($stament->execute()) ? true : false;
    }

    public function obtenerProductosCarrito($id_producto) {
        $consulta = $this->PDO->query("SELECT * FROM producto WHERE id_producto = :id_producto");
        // $productos = $consulta->fetchAll(PDO::FETCH_ASSOC);
        $consulta->bindParam(":id_producto", $id_producto);
        return ($consulta->execute()) ? true : false;
        // $consulta->execute();

        // return $productos;
    }

    // Carrito Restar un valor al producto
    public function obtenerValorOriginal($id_producto)
    {
        // Realiza la consulta SQL para obtener el valor original desde la base de datos
        $stmt = $this->PDO->prepare("SELECT cantidad FROM producto WHERE id_producto = :id_producto");
        $stmt->bindParam(":id_producto", $id_producto);
        $stmt->execute();
        $row = $stmt->fetch();
        
        return $row['cantidad'];
    }
    
    public function restarValor($id_producto)
    {
        // Obtiene el valor original
        $valorOriginal = $this->obtenerValorOriginal($id_producto);
        
        // Resta 1 al valor original
        $valorRestado = $valorOriginal - 1;
        
        // Actualiza el valor restado en la base de datos
        $stmt = $this->PDO->prepare("UPDATE producto SET cantidad = :cantidad WHERE id_producto = :id_producto");
        $stmt->bindParam(":cantidad", $valorRestado);
        $stmt->bindParam(":id_producto", $id_producto);
        $stmt->execute();
        
        return $valorRestado;
    }
// ----------------------------------------------------------------------------------------------------
    public function obtenerCantidadProducto($id)
    {
        $stmt = $this->PDO->prepare("SELECT cantidad FROM producto WHERE id = :id LIMIT 1");
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        $row = $stmt->fetch();
        $cantidad = $row['cantidad'];

        return $cantidad;
    }

// ----------------------------------------------------------------------------------------------------
    public function showCar()
    {
        $stament = $this->PDO->prepare("SELECT * FROM users");
        return ($stament->execute()) ? $stament->fetchAll() : false;
    }
    
    public function insertCar($id_usuario, $id_producto, $cantidad, $total){
        $insertCar = $this->PDO->prepare("INSERT INTO venta VALUES(0, :id_usuario, :id_producto, :cantidad, :total, now())");
        $insertCar->bindParam(":id_usuario", $id_usuario);
        $insertCar->bindParam(":id_producto", $id_producto);
        $insertCar->bindParam(":cantidad", $cantidad);
        $insertCar->bindParam(":total", $total);
        return ($insertCar->execute()) ? $this->PDO->lastInsertId() : false;
    }
    
    public function filterReport($fromDate, $toDate){
        
        $stament = $this->PDO->prepare("SELECT users.nombre, tipo_usuario.tx_tipo_usuario, producto.marca, categoria.tx_categoria, venta.cantida, venta.total, venta.fecha_venta FROM venta 
        INNER JOIN users ON venta.id_usuario = users.id_usuario
        INNER JOIN tipo_usuario ON tipo_usuario.id_tipo_usuario = users.id_tipo_usuario
        INNER JOIN producto ON venta.id_producto = producto.id_producto
        INNER JOIN categoria ON producto.id_categoria = categoria.id_categoria 
        WHERE fecha_venta BETWEEN :from_date AND :to_date
        ORDER BY venta.id_venta DESC");

        // $stmt = $this->PDO->prepare($stament);
        $stament->bindParam(':from_date', $fromDate);
        $stament->bindParam(':to_date', $toDate);
        $stament->execute();
        return $stament->fetchAll(PDO::FETCH_ASSOC);
        // return ($stament->execute()) ? $stament->fetchAll() : false;
    }

}
?>