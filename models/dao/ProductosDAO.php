<?php

require_once '../../config/conexion.php';
require_once '../../models/dto/Producto.php';
require_once '../../models/dto/Categoria.php';

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

  public function actualizar($data)
  {
    try {
      $sql = "UPDATE productos SET 
						nombre          = ?, 
						precio        = ?,
            url_imagen        = ?,
						id_categoria            = ?, 
						prod_estado = ?,
				    WHERE id = ?";

      $this->con->prepare($sql)->execute(
        array(
          $data->nombre,
          $data->precio,
          $data->url_imagen,
          $data->categoria->id_categoria,
          $data->prod_estado,
          $data->id_producto
        )
      );
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
        $data['prod_estado']);


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
      $sql = "SELECT * FROM productos p, categorias c WHERE p.id_categoria = c.id_categoria AND prod_estado=1 AND id_producto = ?";
      $stm = $this->con->prepare($sql);

      $stm->execute(array($id));
      return $stm->fetch(PDO::FETCH_OBJ);
    } catch (Exception $e) {
      die($e->getMessage());
    }
  }
}
