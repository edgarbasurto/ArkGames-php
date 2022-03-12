<?php
require_once DAO_PATH . 'UsuarioDAO.php';
class UsuariosController
{
   private $modelo;

   public function __construct()
   {
      $this->modelo = new UsuarioDAO();
   }

   // funciones del controlador
   public function index()
   {
      if (!isset($_SESSION)) {
         session_start();
      };

      $lista =  $this->modelo->All();
      echo VIEW_PATH .  "Usuarios/listar.php";

      require_once(VIEW_PATH .  "Usuarios/listar.php");
      if (isset($_SESSION['notificar'])) {
         if ($_SESSION['notificar'] == 1) {
            echo "<script>notificarMensaje();</script>";
            unset($_SESSION['mensaje'], $_SESSION['color'], $_SESSION['notificar']);
         }
      }
   }

   public function show()
   {
      $Id = $_REQUEST['id'];
      $registros = $this->modelo->GetById($Id);
      if (empty($registros[0]) == false) {
         $registro = $registros[0];
         require_once '../../models/dto/Enumeradores.php';
         require_once("../../views/Usuarios/mostrar.php");
      } else {
         header('Location:index.php?c=Usuarios&f=index');
      }
   }

   public function new()
   {
      require_once("../../views/Usuarios/nuevo.php");
   }


   public function edit()
   {
      $Id = $_REQUEST['id'];
      $registros = $this->modelo->GetById($Id);
      if (empty($registros[0]) == false) {
         $registro = $registros[0];
         require_once("../../views/Usuarios/editar.php");
      } else {
         header('Location:index.php?c=Usuarios&f=index');
      }
   }

   public function delete()
   {
      $Id = $_REQUEST['id'];

      if ($this->modelo->Delete($Id)) {
         $msj = 'Usuario eliminado!';
         $color = 'bg-info';
      } else {
         $msj = "No se pudo realizar la eliminación del usuario!";
         $color = "bg-warning";
      }

      if (!isset($_SESSION)) {
         session_start();
      };
      $_SESSION['mensaje'] = $msj;
      $_SESSION['color'] = $color;
      $_SESSION['notificar'] = 1;
      header('Location:index.php?c=Usuarios&f=index');
   }

   public function save()
   {
      $Id =   $_GET['id'];
      $post = $_POST;


      if (isset($Id, $post)) {

         $usuario = new Usuario();
         $usuario->Id = $Id;
         $usuario->IdRol = $post['IdRol'];
         $usuario->IdServidor = 1;
         $usuario->Email = $post['Email'];
         $usuario->Genero = $post['Genero'];
         $usuario->FechaNacimiento = $post['FechaNacimiento'];
         $usuario->NombreCompleto = $post['Nombre'];
         $usuario->Activo = true;
         $usuario->UsuarioActualizacion = 0;

         $msj = 'Usuario <strong>' . $post['Nombre'] . '</strong>';
         $color = 'bg-info';

         if ($Id == -1) {
            $usuario->NickName = $post['Usuario'];
            $usuario->setPassword($post['Password']);

            //crear nuevo registro  
            if ($this->modelo->Insert($usuario)) {
               $msj = $msj . ' creado con éxito!';
            } else {
               $msj =    $msj . ' no se pudo crear';
               $color = "bg-warning";
            }
         } else {
            $usuario->IdServidor = $post['Servidor'];

            //actualiza registro;
            if ($this->modelo->Update($usuario)) {
               $msj = $msj . ' actualizado con éxito!';
            } else {
               $msj =    $msj . ' no se pudo actualizar';
               $color = "bg-warning";
            }
         }

         if (!isset($_SESSION)) {
            session_start();
         };

         $_SESSION['mensaje'] = $msj;
         $_SESSION['color'] = $color;
         $_SESSION['notificar'] = 1;
      }
      header('Location:index.php?c=Usuarios&f=index');
   }
}
