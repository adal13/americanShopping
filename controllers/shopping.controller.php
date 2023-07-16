<?php
$con = new ShoppingController();

if (isset($_GET['request'])) {

    if ($_GET['request'] == 'listUser') {
        $con->showAmericanController();
    }

    if ($_GET['request'] == 'update') {
        $con->update();
    }

    if ($_GET['request'] == 'desactive') {
        $con->desactive();
        // echo "Probando ";
    }
    
    if ($_GET['request'] == 'insert') {
        $con->insert();
    }

    if ($_GET['request'] == 'active') {
        $con->active();
        //echo "Probando ";
    }

    // Request Product
    if ($_GET['request'] == 'listProduct') {
        $con->showProductAmericanController();
    }

    if($_GET['request'] == 'insertImg'){
        $con->insertImg();
    }

    if($_GET['request'] == 'updatetProduct'){
        $con->updateImg();
    }

    if ($_GET['request'] == 'desactiveProduct') {
        $con->desactiveProductoController();
        // echo "Probando ";
    }

}

//echo "conectando al controlador";
class ShoppingController
{

    private $model;

    public function __construct()
    {
        require_once("C:/xampp/htdocs/americanShoping/models/shopping.model.php");
        $this->model = new americanShopping();

        @session_start();
        ob_start();
    }

    public function insert()
    {
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $email = $_POST['email'];
        $username = $_POST['username'];
        $password = $_POST['password'];

        $res = $this->model->insertar($nombre, $apellido, $email, $username, $password);

        if ($res) {
            $con = new ShoppingController();
            $con->showAmericanHome();
        }
    }

    public function showAmericanHome()
    {
        header("Location: ../index.php");
    }

    public function showAmericanController()
    {
        $res = $this->model->showAmericanShopping();
        
        $_SESSION['data'] = $res;
        
        print_r($res);

        header('Location: ../view/admin/view/user.php');
    }


    public function desactive()
    {
        $id = $_POST['id_usuario'];
        echo $id;
        $res = $this->model->desactive($id);
        if ($res) {
            $con = new ShoppingController();
            //echo "la consulta se reealizo satisfactoriamente";
            $con->showAmericanController();
        }
    }

    public function active()
    {
        $id_usuario = $_POST['id_usuario'];
        $res = $this->model->active($id_usuario);

        if ($res) {
            $con = new ShoppingController();
            //echo "la consulta se reealizo satisfactoriamente";
            $con->showAmericanController();
        }
    }

    public function update()
    {

        $id_usuario = $_POST['id_usuario'];
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $email = $_POST['email'];
        $id_tipo_usuario = $_POST['id_tipo_usuario'];
        $username = $_POST['username'];

        $res = $this->model->update($id_usuario, $nombre, $apellido, $email, $id_tipo_usuario, $username);

        if ($res) {
            $con = new ShoppingController();
            $con->showAmericanController();
        }
    }

    //-------------------------------------------------------------------------------------------
    // Productos

    public function showProducto()
    {
        header("Location: ../index.php");
        
    }

    public function showProductAmericanController()
    {
        $option = $_GET['option'];
    
        if ($option == 'nuevas_colecciones') {
            // Realiza una acción específica para la opción "Nuevas Colecciones"
            $res = $this->model->showProductAmericanShopping();
            
            $_SESSION['data'] = $res;
            
            print_r($res);
            header('Location: ../view/admin/view/product/category/nuevasColecciones.php');

        } elseif ($option == 'deportiva') {
            $res = $this->model->showProductAmericanShopping();
            
            $_SESSION['data'] = $res;
            
            print_r($res);
            // Realiza una acción específica para la opción "Deportiva"
            header('Location: ../view/admin/view/product/category/deportiva.php');
        } elseif ($option == 'blusas') {
            $res = $this->model->showProductAmericanShopping();
            
            $_SESSION['data'] = $res;
            
            print_r($res);
            header('Location: ../view/admin/view/product/category/blusa.php');
        } elseif ($option == 'lenceria') {
            $res = $this->model->showProductAmericanShopping();
            
            $_SESSION['data'] = $res;
            
            print_r($res);
            // Realiza una acción específica para la opción "Lenceria"
            header('Location: ../view/admin/view/product/category/lenceria.php');
        } elseif ($option == 'pantalones') {
            $res = $this->model->showProductAmericanShopping();
            
            $_SESSION['data'] = $res;
            
            print_r($res);
            // Realiza una acción específica para la opción "Pantalones"
            header('Location: ../view/admin/view/product/category/pantalones.php');
        }

    }

    public function insertImg(){
        $id_categoria = $_POST['id_categoria'];
        $marca = $_POST['marca'];
        $precio = $_POST['precio'];
        $cantidad = $_POST['cantidad'];
        $talla = $_POST['talla'];
        //$path_img = addslashes(file_get_contents($_FILES['path_img']['tmp_name']));

        $path_img = $_FILES['path_img']['name'];
        $rutaTemporal = $_FILES['path_img']['tmp_name'];
        
        $carpetaDestino = '../src/img/';
        
        $rutaDestino = $carpetaDestino . $path_img;

        if(move_uploaded_file($rutaTemporal, $rutaDestino)){
            
            $res = $this->model->insertarProduct($id_categoria, $marca, $precio, $cantidad, $talla, $path_img);
    
            if ($res) {
                $con = new ShoppingController();
                $con->showProducto();
            }
        }else{
            echo "Error al guardar la imagen";
        }

    }

    public function updateImg(){
        $id_producto = $_POST['id_producto'];
        $id_categoria = $_POST['id_categoria'];
        $marca = $_POST['marca'];
        $precio = $_POST['precio'];
        $talla = $_POST['talla'];
        
        if ($_FILES['path_img']['error'] === UPLOAD_ERR_NO_FILE) {
            // No se seleccionó una nueva imagen, no hay cambios en la imagen existente
            $res = $this->model->updateProducts($id_producto, $id_categoria, $marca, $precio, $talla);
        
                if ($res) {
                    $con = new ShoppingController();
                    $con->showProducto();
                }
        } else {

            $path_img = $_FILES['path_img']['name'];
            $rutaTemporal = $_FILES['path_img']['tmp_name'];
    
            $carpetaDestino = '../src/img/';
    
            $rutaDestino = $carpetaDestino . $path_img;
    
            if(move_uploaded_file($rutaTemporal, $rutaDestino)){
                $res = $this->model->updateProduct($id_producto, $id_categoria, $marca, $precio, $talla, $path_img);
        
                if ($res) {
                    $con = new ShoppingController();
                    $con->showProducto();
                }
            }else{
                echo "Error al guardar la imagen";
            }
        }

    }

    public function desactiveProductoController()
    {
        $id_producto = $_POST['id_producto'];
        echo $id_producto;
        $res = $this->model->desactiveProduct($id_producto);
        if ($res) {
            $con = new ShoppingController();
            //echo "la consulta se reealizo satisfactoriamente";
            $con->showProducto();
        }
    }

}

?>