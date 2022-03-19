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
            header('Location:index.php?c=usuarios');
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
      if (TIENE_PERMISO(PERMISOS::PUEDE_CAMBIAR_PASSWORD)) {
         $Id = $_REQUEST['id'];
         $registros = $this->modelo->GetById($Id);
         if (empty($registros[0]) == false) {
            $registro = $registros[0];
            require_once(VIEW_PATH .  "Usuarios/changepassword.php");
         } else {
            header('Location:index.php?c=Usuarios');
         }
      } else {
         header('Location:index.php');
      }
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
            header('Location:index.php?c=Usuarios');
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
      header('Location:index.php?c=Usuarios');
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
      header('Location:index.php?c=Usuarios');
   }

   public function savepwd()
   {
      $Id =   $_GET['id'];
      $post = $_POST;
      $msj =   'Ocurrio un error en el cambio de contraseña! ';
      $color = "bg-warning";
      if (isset($Id, $post)) {
         $passwordANT = htmlentities($post['PasswordAnt']);
         if ($this->modelo->ValidarPWD_PorID($Id,  $passwordANT)) //valida si el password anterior es válido 
         {
            $usuario = new Usuario();
            $usuario->Id =  $Id;

            $usuario->setPassword(htmlentities($post['Password']));

            if ($this->modelo->Update_pwd($usuario)) {
               // //Actualiza Password  
               $msj = 'Cambio de contraseña realizado correctamente! ';
               $color = 'bg-info';
            }
         }
      }
      if (!isset($_SESSION)) {
         session_start();
      };


      $_SESSION['mensaje'] = $msj;
      $_SESSION['color'] = $color;
      $_SESSION['notificar'] = 1;
      header('Location:index.php?c=Usuarios');
   }


   public function validar()
   {
      if (isset($_POST['txtingreso'], $_POST['txtpassword'])) {

         $txtingreso = htmlentities($_POST['txtingreso']);
         $txtpassword = htmlentities($_POST['txtpassword']);

         $ObRepuestajUsuario = $this->modelo->ValidarPWD_PorUsuario($txtingreso, $txtpassword);

         if (is_null($ObRepuestajUsuario) == false) {

            require_once DAO_PATH . 'AccesoDAO.php';
            require_once  DTO_PATH . 'Acceso.php';
            $modelo_acceso = new AccesoDAO();

            $ObjAcceso = new  Acceso();
            $ObjAcceso->Id = GUID();
            $ObjAcceso->IdUsuario = $ObRepuestajUsuario['Id'];
            $ObjAcceso->NombreNavegador = getBrowser($_SERVER['HTTP_USER_AGENT']);
            $ObjAcceso->IP = $_SERVER['REMOTE_ADDR'];

            $insertar = $modelo_acceso->Insert($ObjAcceso);

            if ($insertar == true) {

               setcookie("mySession", $ObjAcceso->Id, time() - 3600, "/");
               setcookie("mySession", $ObjAcceso->Id, time() + 3600, "/");

               echo '<script> alert("Bienvenido.\n ' . $ObRepuestajUsuario['NombreCompleto'] . '") </script> ';
               header('Location:index.php');
            } else {
               $this->errorLogin();
            }
         } else {
            $this->errorLogin();
         }
      } else {
         $this->errorLogin();
      }
   }
   public function errorLogin()
   {
      if (!isset($_SESSION)) {
         session_start();
      };

      $_SESSION['mensaje_pwd'] =  'No se pudo verificar las credenciales';
      $_SESSION['color_pwd'] = 'bg-warning';
      $_SESSION['notificar_pwd'] = 1;

      header('Location:index.php?c=session');
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
