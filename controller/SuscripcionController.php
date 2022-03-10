<?php
require_once '../../models/dao/SuscripcionDAO.php';


class SuscripcionController
{

    private $modelo;

    public function __construct()
    {
        $this->modelo = new SuscripcionDAO();
    }

    // funciones del controlador
    public function index()
    {
        // llamar al modelo
        $resultados = $this->modelo->listar();

        //llamo a la vista
        require_once '../../views/Noticias/listar_suscripcion.php';
    }

    public function guardar()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $datos = [
                    "id_suscripcion" => $_REQUEST['id_suscripcion'],
                    "email" => $_POST['txtemail'],
                    "temas" => $_POST['txtPrecio'],
                    "dispositivos" => $_POST['dispositivos'],
                    "frecuencia" => $_POST['frecuencia'],
                    "discord" => $_POST['discord'],
                    /*$usu = 'usuario'*/ //$_SESSION['usuario'];
            ];

            $exito = $this->modelo->insertar($datos);
            /*$msj = 'Producto guardado exitosamente';
            $color = 'primary';
            if (!$exito) {
                $msj = "No se pudo realizar el guardado";
                $color = "danger";
            }
            if(!isset($_SESSION)){ session_start();};
            $_SESSION['mensaje'] = $msj;
            $_SESSION['color'] = $color;*/
            //llamar a la vista
            //  $this->index();
            //header('Location:index.php?c=Productos&f=index');
           
            header('Location: index.php');
            echo '<script>alert("Registro guardado con exito")</script>';
            
        }
    }

    public function edit()
    {
      $id = $_REQUEST['id'];
      $registros = $this->modelo->obtenerId($id);
      if (empty($registros[0]) == false) {
         $registro = $registros[0];
         require_once("../../views/Noticias/editar_noticias.php");
      } else {
         header('Location:index.php?c=Noticias&f=index');
      }
    }

    public function delete()
    {
        $this->modelo->eliminar($_REQUEST['id']);
        echo "<script>alert('Registro guardado con exito')</script>";
        header('Location: index.php');
    }

    public function nuevo()
    {
        if (isset($_REQUEST['id'])) {
            $suscripciones = $this->modelo->obtenerId($_REQUEST['id']);
            $suscripcion = $suscripciones[0];
            require_once '../../models/dao/SuscripcionsDAO.php';
            $con = new SuscripcionDAO();
            $lista = $con->listar();

            require_once '../../views/Noticias/frm_BernalHelen.php';
        } else {
            require_once '../../models/dao/SuscripcionDAO.php';
            $con = new SuscripcionDAO();
            $lista = $con->listar();
    
            require_once '../../views/Noticias/frm_BernalHelen.php';
        }
        
    }
}
