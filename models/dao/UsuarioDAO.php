<?php

require_once '../../config/conexion.php';
require_once '../../models/dto/Usuario.php';
class UsuarioDAO {
    private $con;
    
    public function __construct() {
       $this->con= Conexion::getConexion();
    }
            
    public function listar(){
 
        // sql de la sentencia
        $sql = "select * from usuarios where Activo=1";
       //preparacion de la sentencia
       $stmt = $this->con->prepare($sql);
        //ejecucion de la sentencia
        $stmt->execute();
        //recuperacion de resultados
        $usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        
        // retorna datos para el controlador
        $ObjReturn = Array();
        foreach($usuarios  as $usuario)
        {
          $ObjReturn[] = new Usuario($usuario);
      }
      return $ObjReturn;
        
    }   
    
    public function insertar(){
        
    }
    
     public function actualizar(){
        
    }
    
      public function eliminar(){
        
    }
    
      public function buscar($parametro){
        
    }
}
