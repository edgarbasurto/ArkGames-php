<?php
require_once ROOT_PATH . 'config/conexion.php';
require_once DTO_PATH . 'Vacante.php';
class VacanteDAO {
    private $con;
    
    public function __construct() {
        $this->con= Conexion::getConexion();
    }
            
    public function listar(){
        // sql de la sentencia
        $sql = "SELECT * FROM vacante";
       //preparacion de la sentencia
        $stmt = $this->con->prepare($sql);
        //ejecucion de la sentencia
        $stmt->execute();
        //recuperacion de resultados
        $vacantes = $stmt->fetchAll(PDO::FETCH_ASSOC);
        // retorna datos para el controlador
        $ObjReturn = array();
        foreach ($vacantes  as $vacante) {
            $id_vacante = $vacante['id_vacante'];
            $nom_vacante  = $vacante['nombre_vacante'];
          $ObjReturn[] = new Vacante($id_vacante,$nom_vacante);
        }
        return $ObjReturn;
        
    }   
    
    public function insertar(){
        
    }
    
     public function actualizar(){
        
    }
    
      public function eliminar(){
        
    }
    
      public function buscar($id){
        // sql de la sentencia
        $sql = "SELECT * FROM vacante WHERE id_vacante = ".$id;
       //preparacion de la sentencia
        $stmt = $this->con->prepare($sql);
        //ejecucion de la sentencia
        $stmt->execute();
        //recuperacion de resultados
        $vacantes = $stmt->fetchAll(PDO::FETCH_ASSOC);
        // retorna datos para el controlador
        $ObjReturn = array();
        foreach ($vacantes  as $vacante) {
            $id_vacante = $vacante['id_vacante'];
            $nom_vacante = $vacante['nombre_vacante'];
          $ObjReturn[] = new Vacante($id_vacante, $nom_vacante);
        }
        return $ObjReturn;
    }
}