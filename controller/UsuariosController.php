<?php
require_once '../../models/dao/UsuarioDAO.php';
class UsuarioController
{
   private $modelo;

   public function __construct()
   {
      $this->modelo = new UsuarioDAO();
   }

   // funciones del controlador
   public function index()
   {
      $lista =  $this->modelo->All();
      require_once '../../models/dto/Enumeradores.php';
      require_once("../../views/Usuarios/listar.php");
   }

   public function show(int $Id)
   {
      $registros = $this->modelo->GetById($Id);
      if (empty($registros[0]) == false) {
         $registro = $registros[0];
         require_once '../../models/dto/Enumeradores.php';
         require_once("../../views/Usuarios/mostrar.php");
      } else {
         $this->index();
      }
   }

   public function edit(int $Id)
   {
      $registros = $this->modelo->GetById($Id);
      if (empty($registros[0]) == false) {
         $registro = $registros[0];
         require_once '../../models/dto/Enumeradores.php';
         require_once("../../views/Usuarios/editar.php");
      } else {
         $this->index();
      }
   }

   public function del(int $Id)
   {
      $this->modelo->Delete($Id);
      $this->index();
   }

   public function save(int $Id, $post)
   {
      if (isset($Id, $post)) {

         $usuario = new Usuario();
         $usuario->Id = $Id;
         $usuario->IdRol = $post['IdRol'];
         $usuario->IdServidor = 1;
         $usuario->NickName = $post['Usuario'];
         $usuario->Email = $post['Email'];
         $usuario->Genero = $post['Genero'];
         $usuario->FechaNacimiento = $post['FechaNacimiento'];
         $usuario->NombreCompleto = $post['Nombre'];
         $usuario->setPassword($post['Password']);
         $usuario->Activo = true;
         $usuario->UsuarioActualizacion = 0;

         if ($Id == -1) {
            //crear nuevo registro;
            $this->modelo->Insert($usuario);
            $this->index();
         } else {
            //actualiza registro;
            $this->modelo->Update($usuario);
            $this->index();
         }
      } else {
         $this->index();
      }
   }
}
