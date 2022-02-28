<?php
require_once '../../config/conexion.php';
require_once '../../models/dto/Categoria.php';
class CategoriasDAO {
    private $con;
    
    public function __construct() {
        $this->con= Conexion::getConexion();
    }
            
    public function listar(){
        // sql de la sentencia
        $sql = "SELECT * FROM categorias";
       //preparacion de la sentencia
        $stmt = $this->con->prepare($sql);
        //ejecucion de la sentencia
        $stmt->execute();
        //recuperacion de resultados
        $categorias = $stmt->fetchAll(PDO::FETCH_ASSOC);
        // retorna datos para el controlador
        $ObjReturn = array();
        foreach ($categorias  as $categoria) {
            $id_cat = $categoria['id_categoria'];
            $nom_cat = $categoria['nombre_categoria'];
          $ObjReturn[] = new Categoria($id_cat,$nom_cat);
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
