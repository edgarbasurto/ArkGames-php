<?php
require_once ROOT_PATH . 'config/conexion.php';
require_once DTO_PATH . 'Dispositivo.php';
class DispositivoDAO {
    private $con;
    
    public function __construct() {
        $this->con= Conexion::getConexion();
    }
            
    public function listar(){
        // sql de la sentencia
        $sql = "SELECT * FROM dispositivo";
       //preparacion de la sentencia
        $stmt = $this->con->prepare($sql);
        //ejecucion de la sentencia
        $stmt->execute();
        //recuperacion de resultados
        $dispositivos = $stmt->fetchAll(PDO::FETCH_ASSOC);
        // retorna datos para el controlador
        $ObjReturn = array();
        foreach ($dispositivos  as $dispositivo) {
            $id_dispositivo = $dispositivo['id_dispositivo'];
            $nom_dispositivo = $dispositivo['nombre_dispositivo'];
          $ObjReturn[] = new Dispositivo($id_dispositivo,$nom_dispositivo);
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
        $sql = "SELECT * FROM dispositivo WHERE id_dispositivo = ".$id;
       //preparacion de la sentencia
        $stmt = $this->con->prepare($sql);
        //ejecucion de la sentencia
        $stmt->execute();
        //recuperacion de resultados
        $dispositivos = $stmt->fetchAll(PDO::FETCH_ASSOC);
        // retorna datos para el controlador
        $ObjReturn = array();
        foreach ($dispositivos  as $dispositivo) {
            $id_dispositivo = $dispositivo['id_dispositivo'];
            $nom_dispositivo = $dispositivo['nombre_dispositivo'];
          $ObjReturn[] = new Tema($id_dispositivo,$nom_dispositivo);
        }
        return $ObjReturn;
    }
}
