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


        //$id = $this->model->insertar($nombre);
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
        
        // print_r($res);
        
        // if (isset($_SESSION['loggedin']) && is_array($_SESSION['loggedin'])) {
            
            // if (!isset($_SESSION['existe']) || $_SESSION['existe'] != 'SI') {
                $res = $this->model->showAmericanShopping();
                
                $_SESSION['data'] = $res;
                
                print_r($res);

                header('Location: ../view/admin/view/user.php');
                //exit(0);
                //echo $res;
            // }

        // }else{
        //     echo "Error: No se encontraron datos";
        // }
    }

    // public function eliminateBook()
    // {
    //     $res = $this->model->showP();
    //     $_SESSION['data'] = $res;

    //     header("Location:../view/removed.php");
    // }

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
    // public function index()
    // {
    //     return ($this->model->index()) ? $this->model->index() : false;
    // }

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

    // public function delete($id)
    // {
    //     return ($this->model->delete($id)) ? header("Location:index.php") : header("Location:show.php?id=" . $id);
    // }
}

?>