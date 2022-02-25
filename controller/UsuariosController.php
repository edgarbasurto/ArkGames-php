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
}
