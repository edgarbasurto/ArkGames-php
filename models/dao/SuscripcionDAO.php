<?php

require_once '../../config/conexion.php';
require_once '../../models/dto/Suscripcion.php';

class SuscripcionDAO
{
  private $con;

  public function __construct()
  {
    $this->con = Conexion::getConexion();
  }

  public function listar()
  {
    // sql de la sentencia
    $sql = "select * from suscripcion where susp_estado=1";
    //preparacion de la sentencia
    $stmt = $this->con->prepare($sql);
    //ejecucion de la sentencia
    $stmt->execute();
    //recuperacion de resultados
    $suscripciones = $stmt->fetchAll(PDO::FETCH_ASSOC);

    //retorna datos para el controlador
    $ObjReturn = array();
    foreach ($suscripciones as $suscripcion) {
      $obj = new Suscripcion();
      $obj->Set($suscripcion);
      $ObjReturn[] = $obj;
    }
    return $ObjReturn;
  }

  public function editar($data)
  {
    try {
      $sql = "update suscripcion set email = ?, temas = ?, dispositivos = ?, frecuencia=?, discord=?
        where id_suscripcion=?";

      $stmt = $this->con->prepare($sql);
      $datos = array(
        $data['id'],
        $data['email'],
        $data['temas'],
        $data['dispositivos'],
        $data['frecuencia'],
        $data['discord']
      );


      $stmt->execute($datos);
    } catch (Exception $e) {
      die($e->getMessage());
    }
  }

  public function insertar($data)
  {
    try {
      $sql = "insert into suscripcion(email, temas, dispositivos, frecuencia, discord) values(?, ?, ?, ?, ?)";

      $stmt = $this->con->prepare($sql);
      $datos = array(
        $data['email'],
        $data['temas'],
        $data['dispositivos'],
        $data['frecuencia'],
        $data['discord']
      );

      $stmt->execute($datos);
    } catch (Exception $e) {
      die($e->getMessage());
    }
  }

  public function eliminar(int $id)
  {

    try {
      $sql = "UPDATE suscripcion set susp_estado=0 where id_suscripcion=" . $id;
      //preparacion de la sentencia
      $stmt = $this->con->prepare($sql);
      //ejecucion de la sentencia
      $stmt->execute();
    } catch (Exception $e) {
      die($e->getMessage());
    }
  }

  public function obtenerId($id)
  {
    try {
      $sql = "select * from suscripcion where susp_estado=1 AND id_suscripcion =" . $id;
      // echo var_dump($sql);
      $stmt = $this->con->prepare($sql);
      //ejecucion de la sentencia
      $stmt->execute();
      //recuperacion de resultados
      $suscripciones = $stmt->fetchAll(PDO::FETCH_ASSOC);

      //retorna datos para el controlador
      $ObjReturn = array();
      foreach ($suscripciones as $suscripcion) {
        $obj = new Suscripcion();
        $obj->Set($suscripcion);
        $ObjReturn[] = $obj;
      }
      return $ObjReturn;
    } catch (Exception $e) {
      die($e->getMessage());
    }
  }
}
