<?php

require_once ROOT_PATH . 'config/conexion.php';
require_once DTO_PATH . 'Producto.php';

class ProductosDAO
{
  private $con;

  public function __construct()
  {
    $this->con = Conexion::getConexion();
  }

  public function listar()
  {
    // sql de la sentencia
    $sql = "SELECT * FROM productos p, categorias c WHERE p.id_categoria = c.id_categoria AND prod_estado=1 ORDER BY p.id_producto";
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

  public function actualizar($data)
  {
    try {
      $sql = "UPDATE productos SET 
						nombre          = ?, 
						precio        = ?,
            url_imagen        = ?,
						id_categoria            = ?, 
						prod_estado = ?
				    WHERE id_producto = ?";

      $stmt = $this->con->prepare($sql);
      $datos = array(
        $data['nombre'],
        $data['precio'],
        $data['url_imagen'],
        $data['id_categoria'],
        $data['prod_estado'],
        $data['id_producto']
      );


      $stmt->execute($datos);
    } catch (Exception $e) {
      die($e->getMessage());
    }
  }

  public function actualizarSinImagen($data)
  {
    try {
      $sql = "UPDATE productos SET nombre = ?, precio = ?, id_categoria = ?, prod_estado = ? WHERE id_producto = ?";

      $stmt = $this->con->prepare($sql);
      $datos = array(
        $data['nombre'],
        $data['precio'],
        $data['id_categoria'],
        $data['prod_estado'],
        $data['id_producto']
      );


      $stmt->execute($datos);
    } catch (Exception $e) {
      die($e->getMessage());
    }
  }

  public function registrar($data)
  {
    try {
      $sql = "INSERT INTO productos(nombre, precio, url_imagen, id_categoria, prod_estado) 
       VALUES (?, ?, ?, ?, ?)";

      // $data['url_imagen'] = $this->con->quote($data['url_imagen']);

      $stmt = $this->con->prepare($sql);
      $datos = array(
        $data['nombre'],
        $data['precio'],
        $data['url_imagen'],
        $data['id_categoria'],
        $data['prod_estado']
      );


      $stmt->execute($datos);
    } catch (Exception $e) {
      die($e->getMessage());
    }
  }

  public function eliminar(int $Id)
  {

    try {
      $sql = "UPDATE productos set prod_estado=0 where id_producto=" . $Id;
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
      $sql = "SELECT * FROM productos p, categorias c WHERE p.id_categoria = c.id_categoria AND prod_estado=1 AND id_producto =" . $id;
      // echo var_dump($sql);
      $stmt = $this->con->prepare($sql);
      //ejecucion de la sentencia
      $stmt->execute();
      //recuperacion de resultados
      $productos = $stmt->fetchAll(PDO::FETCH_ASSOC);

      //retorna datos para el controlador
      $ObjReturn = array();
      foreach ($productos as $producto) {
        $obj = new Producto();
        $obj->Set($producto);
        $ObjReturn[] = $obj;
      }
      return $ObjReturn;
    } catch (Exception $e) {
      die($e->getMessage());
    }
  }
}
