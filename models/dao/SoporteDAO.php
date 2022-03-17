<?php

require_once ROOT_PATH . 'config/conexion.php';
require_once DTO_PATH . 'Soporte.php';

class SoporteDAO
{
  private $con;

  public function __construct()
  {
    $this->con = Conexion::getConexion();
  }

  public function listar()
  {
    // sql de la sentencia
    $sql = "SELECT * FROM soporte";
    //preparacion de la sentencia
    $stmt = $this->con->prepare($sql);
    //ejecucion de la sentencia
    $stmt->execute();
    //recuperacion de resultados
    $solicitudes = $stmt->fetchAll(PDO::FETCH_ASSOC);

    //retorna datos para el controlador
    $ObjReturn = array();
    foreach ($solicitudes  as $soporte) {
      $obj = new Soporte();
      $obj->Set($soporte);
      $ObjReturn[] = $obj;
    }
    return $ObjReturn;
  }


  public function actualizar($data)
  {
    try {
      $sql = "UPDATE soporte SET usuario = ?, email = ?, telefono = ?, servicio = ?, producto = ?, descripcion_problema = ? WHERE id_solicitud = ?";

      $stmt = $this->con->prepare($sql);
      $datos = array(
        $data['usuario'],
        $data['email'],
        $data['telefono'],
        $data['servicio'],
        $data['producto'],
        $data['descripcion_problema'],
        $data['id_solicitud']
      );

      $stmt->execute($datos);
    } catch (Exception $e) {
      die($e->getMessage());
    }
  }


  public function insertar($data)
  {
    try {
      $sql = "INSERT INTO soporte(usuario, email, telefono, servicio, producto, descripcion_problema) 
       VALUES (?, ?, ?, ?, ?, ?)";


      $stmt = $this->con->prepare($sql);
      $datos = array(
        $data['usuario'],
        $data['email'],
        $data['telefono'],
        $data['servicio'],
        $data['producto'],
        $data['descripcion_problema']
      );
      $stmt->execute($datos);
    } catch (Exception $e) {
      die($e->getMessage());
    }
  }

  public function eliminar(int $id)
  {

    try {
      $sql = "DELETE from soporte WHERE id_solicitud=" . $id;
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
      $sql = "SELECT * FROM soporte WHERE id_solicitud" . $id;
      // echo var_dump($sql);
      $stmt = $this->con->prepare($sql);
      //ejecucion de la sentencia
      $stmt->execute();
      //recuperacion de resultados
      $solicitudes = $stmt->fetchAll(PDO::FETCH_ASSOC);

      //retorna datos para el controlador
      $ObjReturn = array();
      foreach ($solicitudes as $soporte) {
        $obj = new Soporte();
        $obj->Set($soporte);
        $ObjReturn[] = $obj;
      }
      return $ObjReturn;
    } catch (Exception $e) {
      die($e->getMessage());
    }
  }
}

