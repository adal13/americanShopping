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
        $stament = $this->PDO->prepare("INSERT INTO users VALUES(0,:nombre, :apellido, 2, :email, :username, :password, 1)");
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

    public function updateProducts($id_producto, $id_categoria, $marca, $precio, $talla)
    {
        $stament = $this->PDO->prepare("UPDATE producto SET 
                                                    id_categoria = :id_categoria, 
                                                    marca = :marca,
                                                    precio = :precio,
                                                    talla = :talla
                                                    WHERE id_producto = :id_producto");

        $stament->bindParam(":id_producto", $id_producto);
        $stament->bindParam(":id_categoria", $id_categoria);
        $stament->bindParam(":marca", $marca);
        $stament->bindParam(":precio", $precio);
        $stament->bindParam(":talla", $talla);

        return ($stament->execute());
    }

    public function desactiveProduct($id_producto)
    {
        $stament = $this->PDO->prepare("UPDATE producto set status = 0 WHERE id_producto = :id_producto");
        $stament->bindParam(":id_producto", $id_producto);
        return ($stament->execute()) ? true : false;
    }
}
?>