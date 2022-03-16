<?php
require_once DAO_PATH . 'UsuarioDAO.php';
require_once  CONTROLLER_PATH . 'Genericos.php';
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
      if (TIENE_PERMISO(PERMISOS::PUEDE_VISUALIZAR_USUARIOS)) {
         $lista =  $this->modelo->All();
         echo VIEW_PATH .  "Usuarios/listar.php";

         require_once(VIEW_PATH .  "Usuarios/listar.php");
         if (isset($_SESSION['notificar'])) {
            if ($_SESSION['notificar'] == 1) {
               echo "<script>notificarMensaje();</script>";
               unset($_SESSION['mensaje'], $_SESSION['color'], $_SESSION['notificar']);
            }
         }
      } else {
         header('Location:index.php?c=session&a=dash');
      }
   }

   public function show()
   {
      if (TIENE_PERMISO(PERMISOS::PUEDE_VISUALIZAR_USUARIOS)) {
         $Id = $_REQUEST['id'];
         $registros = $this->modelo->GetById($Id);
         if (empty($registros[0]) == false) {
            $registro = $registros[0];
            require_once(DTO_PATH . 'Enumeradores.php');
            require_once(VIEW_PATH .  "Usuarios/mostrar.php");
         } else {
            header('Location:index.php?c=usuarios&f=index');
         }
      } else {
         header('Location:index.php?c=session&a=dash');
      }
   }

   public function new()
   {
      if (TIENE_PERMISO(PERMISOS::PUEDE_VISUALIZAR_USUARIOS)) {
         require_once(VIEW_PATH .  "Usuarios/nuevo.php");
      } else {
         header('Location:index.php?c=session&a=dash');
      }
   }

   public function changepwd()
   {
      header('Location:index.php');
   }

   public function edit()
   {
      if (TIENE_PERMISO(PERMISOS::PUEDE_VISUALIZAR_USUARIOS)) {
         $Id = $_REQUEST['id'];
         $registros = $this->modelo->GetById($Id);
         if (empty($registros[0]) == false) {
            $registro = $registros[0];
            require_once(VIEW_PATH .  "Usuarios/editar.php");
         } else {
            header('Location:index.php?c=Usuarios&f=index');
         }
      } else {
         header('Location:index.php&a=dash');
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

   public function savefile()
   {
      require_once CONTROLLER_PATH . 'Genericos.php';
      $respuesta = Genericos::SaveFileServidor($_FILES["archivo"]);
      if ($respuesta != null) {
         echo  $respuesta;
      } else {
         echo "No se guradó la imagen!!\n";
      }
   }
}
