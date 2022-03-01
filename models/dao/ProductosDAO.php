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
        $sql = "SELECT * FROM productos p, categorias c WHERE p.id_categoria = c.id_categoria AND prod_estado=1";
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
    
    public function insertar(Producto $prod){
     
         // sql de la sentencia
         $sql = "INSERT INTO productos(nombre, precio, url_imagen, id_categoria, prod_estado) VALUES ($prod->Nombre, $prod->Precio, $prod->Url_imagen, $prod->Categoria, $prod->Prod_estado) ";
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
    
     public function actualizar(){
        
    }
    
    public function eliminar(int $Id)
    {
      $sql = "UPDATE productos set prod_estado=0 where Id=" . $Id;
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
      require_once '../../views/Catalogo/BasurtoEdgar.php';
    }
    
      public function buscar($parametro){
        
    }
}
