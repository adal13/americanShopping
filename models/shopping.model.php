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
}

?>