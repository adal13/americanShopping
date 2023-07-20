<?php
session_start();

require_once "db.config.php"; // Asegúrate de incluir el archivo que contiene la definición de la clase db
require_once "../layout/head.php";
// Crear una instancia de la clase db
$database = new db();

// Establecer la conexión a la base de datos
$connection = $database->conexion();

// Verificar si la conexión se realizó con éxito
if ($connection instanceof PDO) {
    $usuario = $_POST['usuario'];
    $password = $_POST['password'];
    $_SESSION['existe'] = "NO";

    $sql = "SELECT * FROM users INNER JOIN tipo_usuario
            ON users.id_tipo_usuario = tipo_usuario.id_tipo_usuario
            WHERE users.username = :usuario
            AND users.password = :password";

    $statement = $connection->prepare($sql);
    $statement->bindParam(':usuario', $usuario);
    $statement->bindParam(':password', $password);
    $statement->execute();

    if ($statement->rowCount() == 1) {
        $_SESSION['loggedin'] = true;
        $row = $statement->fetch(PDO::FETCH_ASSOC);
        $uid = $row['id_usuario'];
        $catusr = $row['id_tipo_usuario'];
        $nombre = $row['nombre'];
        $usuario = $row['username'];
        $status = $row['status'];

        $_SESSION['existe'] = 'SI';
        $_SESSION['id_usuario'] = $uid;
        $_SESSION['id_tipo_usuario'] = $catusr;
        $_SESSION['nombre'] = $nombre;
        $_SESSION['username'] = $usuario;
        $_SESSION['status'] = $status;

        if ($status == 1){
            if ($catusr == 1) {
                $pagina = URL_RUTA.'/index.php';
    
                $_SESSION['id_usuario'] = $uid;
                $_SESSION['id_tipo_usuario'] = $catusr;
                $_SESSION['nombre'] = $nombre;
                $_SESSION['username'] = $usuario;
    
                echo "<script>location.replace('" . $pagina . "');</script>";
            } elseif ($catusr == 2) {
                $pagina = URL_RUTA.'/index.php';
        
                $_SESSION['id_usuario'] = $uid;
                $_SESSION['id_tipo_usuario'] = $catusr;
                $_SESSION['nombre'] = $nombre;
                $_SESSION['username'] = $usuario;
    
                echo "<script>location.replace('" . $pagina . "');</script>";
            }
        }else{
            echo "<script>alert('Usuario no encontrado...');</script>";
            echo "<script>location.replace('http://localhost/americanShoping/view/login.php');</script>";
        }


    } else {
        echo "<script>alert('Usuario no encontrado...');</script>";
        echo "<script>location.replace('http://localhost/americanShoping/view/login.php');</script>";
    }
} else {
    echo "Error de conexión";
}
?>
