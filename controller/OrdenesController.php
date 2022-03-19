<?php

use function PHPSTORM_META\elementType;

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
      $modulo = 'my';
      $titleOrdenes = 'Mis Ordenes';
      if (isset($_GET, $_GET['vista'])) {
         $modulo = $_GET['vista'];
      }
      echo var_dump($modulo);
      $lista = array();

      if ($modulo == 'store' &&  TIENE_PERMISO(PERMISOS::PUEDE_VISUALIZAR_VENTAS)) {
         $mysession = getSessionActual();
         $lista = $this->modelo->GetByIdUsuario($mysession->Usuario);
         $titleOrdenes = 'Ventas';
      } else {
         $lista = $this->modelo->GetVentas();
      }

      echo VIEW_PATH .  "Carrito/listar.ordenes.php";
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
