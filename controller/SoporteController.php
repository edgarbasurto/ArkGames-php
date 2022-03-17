<?php
require_once DAO_PATH . 'SoporteDAO.php'; 


class SoporteController
{

    private $modelo;

    public function __construct()
    {
        $this->modelo = new SoporteDAO();
    }

    // funciones del controlador
    public function index()
    {
        // llamar al modelo
        $resultados = $this->modelo->listar();
        //llamo a la vista
        require_once VIEW_PATH . 'Soporte/listar_solicitud.php';

    }   

    public function guardar()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && 
        !empty($_POST['txtusuario']) && !empty($_POST['txtemail'])  &&
        !empty($_POST['telefono']) && !empty($_POST['servicio'])&& 
        !empty($_POST['producto']) && !empty($_POST['txtdescripcion']))
        {
                
            $datos = [
                "usuario" => $_REQUEST['txtusuario'],
                "email" => $_POST['txtemail'],
                "telefono" => $_POST['telefono'],
                "servicio" => $_POST['servicio'],
                "producto" => $_POST['producto'],
                "descripcion_problema" => $_POST['txtdescripcion']
            ];
            // echo 'ENTRO AL ELSE';
            // echo var_dump($datos);
            $this->modelo->insertar($datos);

            header('Location: index.php?c=soporte');
            echo '<script>alert("Registro guardado con exito")</script>';
            
                if(isset($_GET['id'])){
                    $datos = [
                    "id_solicitud" => $_GET['id'] ? $_GET['id'] : "",
                    "usuario" => $_REQUEST['txtusuario'],
                    "email" => $_POST['txtemail'],
                    "telefono" => $_POST['telefono'],
                    "servicio" => $_POST['servicio'],
                    "producto" => $_POST['producto'],
                    "descripcion_problema" => $_POST['txtdescripcion']
                    ];
                    $this->modelo->actualizar($datos);
        
                    header('Location: index.php?c=soporte');
                    echo '<script>alert("Registro guardado con exito")</script>';
                }          
        }else {
            if (isset($_REQUEST['id'])) {
            $solicitudes = $this->modelo->obtener($_REQUEST['id']);
            $soporte = $solicitudes[0];
            require_once DAO_PATH . 'SoporteDAO.php';
            $con = new SoporteDAO();
            $lista = $con->listar();

            require_once VIEW_PATH . 'Soporte/editar_solicitud2.php';
            }
        
        }
    }


    public function delete()
    {
        $this->modelo->eliminar($_REQUEST['id']);
        echo "<script>alert('Registro guardado con exito')</script>";
        header('Location: index.php?c=soporte');
    }


    public function nuevo()
    {

        if (isset($_REQUEST['id'])) {
            $solicitudes = $this->modelo->obtener($_REQUEST['id']);
            $soporte = $solicitudes[0];
            require_once DAO_PATH . 'SoporteDAO.php';
            $con = new SoporteDAO();
            $lista = $con->listar();

            require_once VIEW_PATH . 'Soporte/editar_solicitud.php';
            
        } else {
            require_once DAO_PATH . 'SoporteDAO.php';
            $con = new SoporteDAO();
            $lista = $con->listar();

            require_once VIEW_PATH . 'Soporte/agregar_solicitud.php';
        }
    }
}

