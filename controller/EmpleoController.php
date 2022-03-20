<?php
require_once DAO_PATH . 'EmpleoDAO.php';


class EmpleoController
{

    private $modelo;

    public function __construct()
    {
        $this->modelo = new EmpleoDAO();
    }

    // funciones del controlador
    public function index()
    {
        // llamar al modelo
        $resultados = $this->modelo->listar();
        //llamo a la vista
        require_once VIEW_PATH . 'Contacto/listar_empleo.php';
      //AQUI DEBES LLAMAR POR MEDIO DE LA RUTA A LA TABLA GENERAL
    }

     // funciones del controlador
     public function index_contacto()
     {
         // llamar al modelo
         //$resultados = $this->modelo->listar();
         //llamo a la vista
         require_once VIEW_PATH . 'Contacto/GualeEvelyn.php';
       //AQUI DEBES LLAMAR POR MEDIO DE LA RUTA A LA TABLA GENERAL
     }
    public function guardar()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && 
        !empty($_POST['txtnombre']) && !empty($_POST['txtapellido'])  &&
        !empty($_POST['txtedad']) && !empty($_POST['txtTelefono'])&& 
        !empty($_POST['txtemail']) && !empty($_POST['selectVacante'])&& 
        !empty($_POST['txtExperiencia']))
        {
                
            $datos = [
                "id_solictudEmpleo" => $_GET['id'] ? $_GET['id'] : "",
                "nombre" => $_POST['txtnombre'],
                "apellido" => $_POST['txtapellido'],
                "edad" => $_POST['txtedad'],
                "telefono" => $_POST['txtTelefono'],
                "correo" => $_POST['txtemail'],
                "id_vacante" => $_POST['selectVacante'],
                "experiencia" => $_POST['txtExperiencia']
            ];
            // echo 'ENTRO AL ELSE';
            // echo var_dump($datos);
            $datos['id_solictudEmpleo'] > 0
                        ? $this->modelo->actualizar($datos)
                        : $this->modelo->insertar($datos);

            header('Location: index.php?c=empleo');
            echo '<script>alert("Registro guardado con exito")</script>';
            
            if(isset($_GET['id'])){
                $datos = [
                "id_solictudEmpleo" => $_GET['id'] ? $_GET['id'] : "",
                "nombre" => $_POST['txtnombre'],
                "apellido" => $_POST['txtapellido'],
                "edad" => $_POST['txtedad'],
                "telefono" => $_POST['txtTelefono'],
                "correo" => $_POST['txtemail'],
                "id_vacante" => $_POST['selectVacante'],
                "experiencia" => $_POST['txtExperiencia']
                ];
                $this->modelo->actualizar($datos);
    
                header('Location: index.php?c=empleo');
                echo '<script>alert("Registro guardado con exito")</script>';
            }          
                   
        }else {
            if (isset($_REQUEST['id'])) {
            $empleos = $this->modelo->obtener($_REQUEST['id']);
            $empleo = $empleos[0];
            require_once DAO_PATH . 'VacanteDAO.php';
            $con = new VacanteDAO();
            $lista = $con->listar();

            require_once VIEW_PATH . 'Contacto/editar_empleo.php';
            }
        
        }
       
      
    }


    public function delete()
    {
        $this->modelo->eliminar($_REQUEST['id']);
        echo "<script>alert('Registro guardado con exito')</script>";
        header('Location: index.php?c=empleo');
    }

    public function nuevo()
    {

        if (isset($_REQUEST['id'])) {
            $empleos = $this->modelo->obtener($_REQUEST['id']);
            $empleo = $empleos[0];
            require_once DAO_PATH . 'VacanteDAO.php';
            $con = new VacanteDAO();
            $lista = $con->listar();

            require_once VIEW_PATH . 'Contacto/editar_empleo.php';
            
        } else {
            require_once DAO_PATH . 'VacanteDAO.php';
            $con = new VacanteDAO();
            $lista = $con->listar();

            require_once VIEW_PATH . 'Contacto/agregar_empleo.php';
        }
    }

   
}
