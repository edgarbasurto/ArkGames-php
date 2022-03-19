<?php

require_once ROOT_PATH . 'config/conexion.php';
require_once DTO_PATH . 'Empleo.php';

class EmpleoDAO
{
  private $con;

  public function __construct()
  {
    $this->con = Conexion::getConexion();
  }


  public function listar()
  {
    // sql de la sentencia
    $sql = "SELECT * 
        FROM empleo e, vacante v 
        WHERE e.id_vacante = v.id_vacante";

    //preparacion de la sentencia
    $stmt = $this->con->prepare($sql);
    //ejecucion de la sentencia
    $stmt->execute();
    //recuperacion de resultados
    $empleos = $stmt->fetchAll(PDO::FETCH_ASSOC);
    // retorna datos para el controlador
    $ObjReturn = array();
    foreach ($empleos  as $empleo) {
      $obj = new Empleo();
      $obj->Set($empleo);
      $ObjReturn[] = $obj;
    }
    return $ObjReturn;
  }

  public function insertar($data)
  {
    try {
      $sql = "INSERT INTO empleo(nombre, apellido, edad, telefono, correo, id_vacante, experiencia) 
             VALUES (?, ?, ?, ?, ?, ?, ?)";


      $stmt = $this->con->prepare($sql);
      $datos = array(
        $data['nombre'],
        $data['apellido'],
        $data['edad'],
        $data['telefono'],
        $data['correo'],
        $data['id_vacante'],
        $data['experiencia']
      );

      $stmt->execute($datos);
    } catch (Exception $e) {
      die($e->getMessage());
    }
  }


  public function actualizar($data)
  {
    try {
      $sql = "UPDATE empleo SET 
            nombre = ?, 
            apellido = ?, 
            edad = ?, 
            telefono = ?, 
            correo = ?,
            id_vacante = ?, 
            experiencia = ? 
            WHERE id_solictudEmpleo = ?";

      $stmt = $this->con->prepare($sql);
      $datos = array(
        $data['nombre'],
        $data['apellido'],
        $data['edad'],
        $data['telefono'],
        $data['correo'],
        $data['id_vacante'],
        $data['experiencia'],
        $data['id_solictudEmpleo']
      );

      $stmt->execute($datos);
    } catch (Exception $e) {
      die($e->getMessage());
    }
  }




  public function eliminar(int $id)
  {
    try {
      $sql = "UPDATE empleo WHERE id_solictudEmpleo=" . $id;
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
      $sql = "SELECT * FROM empleo e, vacante v WHERE e.id_vacante = v.id_vacante";

      $sql = "SELECT * FROM empleo e, vacante v WHERE e.id_vacante = v.id_vacante AND id_solicitud=" . $id;
      // echo var_dump($sql);
      $stmt = $this->con->prepare($sql);
      //ejecucion de la sentencia
      $stmt->execute();
      //recuperacion de resultados
      $empleos = $stmt->fetchAll(PDO::FETCH_ASSOC);

      //retorna datos para el controlador
      $ObjReturn = array();
      foreach ($empleos as $empleo) {
        $obj = new Empleo();
        $obj->Set($empleo);
        $ObjReturn[] = $obj;
      }
      return $ObjReturn;
    } catch (Exception $e) {
      die($e->getMessage());
    }
  }
}
