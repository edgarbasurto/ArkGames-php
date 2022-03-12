<?php
require_once '../../config/conexion.php';
require_once '../../models/dto/Tema.php';
class TemaDAO {
    private $con;
    
    public function __construct() {
        $this->con= Conexion::getConexion();
    }
            
    public function listar(){
        // sql de la sentencia
        $sql = "SELECT * FROM tema";
       //preparacion de la sentencia
        $stmt = $this->con->prepare($sql);
        //ejecucion de la sentencia
        $stmt->execute();
        //recuperacion de resultados
        $temas = $stmt->fetchAll(PDO::FETCH_ASSOC);
        // retorna datos para el controlador
        $ObjReturn = array();
        foreach ($temas  as $tema) {
            $id_tema = $tema['id_tema'];
            $nom_tema = $tema['nombre_tema'];
          $ObjReturn[] = new Tema($id_tema,$nom_tema);
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
        $sql = "SELECT * FROM tema WHERE id_tema = ".$id;
       //preparacion de la sentencia
        $stmt = $this->con->prepare($sql);
        //ejecucion de la sentencia
        $stmt->execute();
        //recuperacion de resultados
        $temas = $stmt->fetchAll(PDO::FETCH_ASSOC);
        // retorna datos para el controlador
        $ObjReturn = array();
        foreach ($temas  as $tema) {
            $id_tema = $tema['id_tema'];
            $nom_tema = $tema['nombre_tema'];
          $ObjReturn[] = new Tema($id_tema,$nom_tema);
        }
        return $ObjReturn;
    }
}
