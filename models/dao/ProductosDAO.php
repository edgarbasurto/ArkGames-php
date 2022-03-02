<?php

use JetBrains\PhpStorm\Internal\ReturnTypeContract;

require_once '../../config/conexion.php';
require_once '../../models/dto/Producto.php';

class ProductosDAO
{
  private $con;

  public function __construct()
  {
    $this->con = Conexion::getConexion();
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

    //retorna datos para el controlador
    $ObjReturn = array();
    foreach ($productos  as $producto) {
      $obj = new Producto();
      $obj->Set($producto);
      $ObjReturn[] = $obj;
    }
    return $ObjReturn;
    
  }

  // public function insertar(Producto $prod)
  // {

  //   // sql de la sentencia
  //   $sql = "INSERT INTO productos(nombre, precio, url_imagen, id_categoria, prod_estado) VALUES ($prod->Nombre, $prod->Precio, $prod->Url_imagen, $prod->Categoria, $prod->Prod_estado) ";
  //   //preparacion de la sentencia
  //   $stmt = $this->con->prepare($sql);
  //   //ejecucion de la sentencia
  //   $stmt->execute();
  //   //recuperacion de resultados
  //   $productos = $stmt->fetchAll(PDO::FETCH_ASSOC);
  //   // retorna datos para el controlador
  //   $ObjReturn = array();
  //   foreach ($productos  as $producto) {
  //     $ObjReturn[] = new Producto($producto);
  //   }
  //   return $ObjReturn;
  // }

  public function actualizar(Producto $data)
  {
    try {
      $sql = "UPDATE productos SET 
						nombre          = ?, 
						precio        = ?,
            url_imagen        = ?,
						id_categoria            = ?, 
						prod_estado = ?,
				    WHERE id = ?";

      $this->pdo->prepare($sql)
        ->execute(
          array(
            $data->Nombre,
            $data->Precio,
            $data->Url_imagen,
            $data->Categoria->Id_categoria,
            $data->Prod_estado,
          )
        );
    } catch (Exception $e) {
      die($e->getMessage());
    }
  }



  public function registrar(Producto $data)
  {
    try {
      $sql = "INSERT INTO productos(nombre, precio, url_imagen, id_categoria, prod_estado) 
       VALUES (?, ?, ?, ?, ?, ?)";

      $this->pdo->prepare($sql)
        ->execute(
          array(
            $data->Nombre,
            $data->Precio,
            $data->Url_imagen,
            $data->Categoria->Id_categoria,
            $data->Prod_estado,
          )
        );
    } catch (Exception $e) {
      die($e->getMessage());
    }
  }

  public function eliminar(int $Id)
  {

    try {
      $sql = "UPDATE productos set prod_estado=0 where Id=" . $Id;
      //preparacion de la sentencia
      $stmt = $this->con->prepare($sql);
      //ejecucion de la sentencia
      $stmt->execute();
    } catch (Exception $e) {
      die($e->getMessage());
    }
  }

  public function obtener($id)
  {
    try {
      $sql = "SELECT * FROM productos p, categorias c WHERE p.id_categoria = c.id_categoria AND prod_estado=1 AND id_producto = ?";
      $stm = $this->pdo->prepare($sql);

      $stm->execute(array($id));
      return $stm->fetch(PDO::FETCH_OBJ);
    } catch (Exception $e) {
      die($e->getMessage());
    }
  }
}
