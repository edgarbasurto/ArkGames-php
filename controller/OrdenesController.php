<?php
require_once DAO_PATH . 'OrdenDAO.php';
require_once  CONTROLLER_PATH . 'Genericos.php';
class OrdenesController
{
   private $modelo;

   public function __construct()
   {
      $this->modelo = new OrdenDAO();
   }

   // funciones del controlador
   public function index()
   {
      // if (TIENE_PERMISO(PERMISOS::PUEDE_VISUALIZAR_USUARIOS)) {
      //    $lista =  $this->modelo->All();
      //    echo VIEW_PATH .  "Usuarios/listar.php";

      //    require_once(VIEW_PATH .  "Usuarios/listar.php");
      //    if (isset($_SESSION['notificar'])) {
      //       if ($_SESSION['notificar'] == 1) {
      //          echo "<script>notificarMensaje();</script>";
      //          unset($_SESSION['mensaje'], $_SESSION['color'], $_SESSION['notificar']);
      //       }
      //    }
      // } else {
      //    header('Location:index.php?c=session&a=dash');
      // }
   }

   public function show()
   {
      // if (TIENE_PERMISO(PERMISOS::PUEDE_VISUALIZAR_USUARIOS)) {
      //    $Id = $_REQUEST['id'];
      //    $registros = $this->modelo->GetById($Id);
      //    if (empty($registros[0]) == false) {
      //       $registro = $registros[0];
      //       require_once(DTO_PATH . 'Enumeradores.php');
      //       require_once(VIEW_PATH .  "Usuarios/mostrar.php");
      //    } else {
      //       header('Location:index.php?c=usuarios');
      //    }
      // } else {
      //    header('Location:index.php?c=session&a=dash');
      // }
   }

   public function new()
   {
      // if (TIENE_PERMISO(PERMISOS::PUEDE_VISUALIZAR_USUARIOS)) {
      //    require_once(VIEW_PATH .  "Usuarios/nuevo.php");
      // } else {
      //    header('Location:index.php?c=session&a=dash');
      // }
   }
}
