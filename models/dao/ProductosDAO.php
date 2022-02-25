<?php
require_once '../../config/conexion.php';
require_once '../../models/dto/Producto.php';
class ProductosDAO {
    private $con;
    
    public function __construct() {
        $this->con= Conexion::getConexion();
    }
            
    public function listar(){
        // sql de la sentencia
        $sql = "select * from productos p, categorias c where p.id_categoria = c.id_categoria and prod_estado=1";
       //preparacion de la sentencia
        $stmt = $this->con->prepare($sql);
        //ejecucion de la sentencia
        $stmt->execute();
        //recuperacion de resultados
        $productos = $stmt->fetchAll(PDO::FETCH_ASSOC);
        // retorna datos para el controlador
        $ObjReturn = array();
        foreach ($productos  as $producto) {
          $ObjReturn[] = new Producto($producto);
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
