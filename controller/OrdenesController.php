<?php

use function PHPSTORM_META\elementType;

require_once DAO_PATH . 'OrdenDAO.php';
require_once  CONTROLLER_PATH . 'Genericos.php';
require_once DAO_PATH . 'CarritoDAO.php';
require_once DAO_PATH . 'UsuarioDAO.php';

class OrdenesController
{
   private $cart;
   private $modelo;
   private $user;

   public function __construct()
   {
      $this->modelo = new OrdenDAO();
      $this->cart = new CarritoDAO();
      $this->user = new UsuarioDAO();
   }

   // funciones del controlador
   public function index()
   {
      $modulo = 'my';
      $titleOrdenes = 'Mis Ordenes';
      if (isset($_GET, $_GET['vista'])) {
         $modulo = $_GET['vista'];
      }

      if ($modulo == 'store') //&&  TIENE_PERMISO(PERMISOS::PUEDE_VISUALIZAR_VENTAS)) 
      {
         $mysession = getSessionActual();
         $lista = $this->modelo->GetByIdUsuario($mysession->Usuario);
         $titleOrdenes = 'Ventas';
      } else {
         $lista = $this->modelo->GetVentas();
      }
      require_once VIEW_PATH .  "Carrito/listar.ordenes.php";
   }

   public function show()
   {

      $Id = $_REQUEST['id'];
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

   public function pagar()
   {
      if (TIENE_PERMISO(PERMISOS::PUEDE_FINALIZAR_COMPRAR)) {
         // llamar al modelo
         $mysession = getSessionActual();
         $cart = $this->cart;
         $custRow = $this->user->GetById($mysession->Usuario);

         //llamo a la vista
         require_once VIEW_PATH . 'Carrito/pago.orden.php';
      } else {
         header('Location:index.php?c=session&a=dash');
      }
   }

   public function placeOrder()
   {
      $mysession = getSessionActual();
      echo var_dump($mysession);
      if ($this->cart->total_items() > 0 && !empty($mysession)) {
         // insert order details into database
         $ordenTemp = array(
            'usuario' => $mysession->Usuario,
            'precio_total' => $_SESSION['cart_contents']['cart_total']
         );
         $insertOrder = $this->modelo->insertarOrden($ordenTemp);



         if ($insertOrder) {
            $orderID = $this->modelo->lastOrdenID();


            // get cart items
            $cartItems = $this->cart->contents();

            // insert order items into database
            $insertOrderItems = $this->modelo->insertarDetalleOrden($cartItems, $orderID);

            if ($insertOrderItems) {
               $this->cart->destroy();
               header("Location: index.php?c=ordenes");
            } else {
               header("Location: Pagos.php");
            }
         } else {
            header("Location: Pagos.php");
         }
      } else {
         header("Location: index.php");
      }
   }
}
