<?php
require_once DAO_PATH .'SuscripcionDAO.php';


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
        require_once VIEW_PATH .'Suscripcion/listar_suscripcion.php';
    }

    public function guardar()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && 
        !empty($_POST['txtemail']) && isset($_POST['chkbtema'])  &&
        isset($_POST['chkbdispositivo']) && isset($_POST['rdbfrecuencia']) && isset($_POST['rdbdiscord'])) {
    
            $email = htmlentities($_POST['txtemail']);
            $temas = implode(', ', $_POST['chkbtema']);
            $dispositivos = implode(', ', $_POST['chkbdispositivo']);
            $frecuencia = htmlentities($_POST['rdbfrecuencia']);
            $discord = htmlentities($_POST['rdbdiscord']);
            $datos = [
                    "id_suscripcion" => $_GET['id'],
                    "email" => $email,
                    "temas" => $temas,
                    "dispositivos" => $dispositivos,
                    "frecuencia" => $frecuencia,
                    "discord" => $discord,
                    /*$usu = 'usuario'*/ //$_SESSION['usuario'];
            ];
            $datos['id_suscripcion'] > 0
                    ? $this->modelo->actualizar($datos)
                    : $this->modelo->insertar($datos);

            /*$exito = $this->modelo->insertar($datos);
            $msj = 'Producto guardado exitosamente';
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
            
        }else{
            if($_GET['id']){
                require_once VIEW_PATH . 'Suscripcion/editar_suscripcion.php';
            }else{
                require_once VIEW_PATH . 'Suscripcion/registrar_suscripcion.php';
            } 
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
            require_once VIEW_PATH . 'Suscripcion/editar_suscripcion.php';
        } else {
            require_once VIEW_PATH . 'Suscripcion/registrar_suscripcion.php';
        }
        
    }

}
