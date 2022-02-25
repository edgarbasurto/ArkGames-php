<?php

require_once '../../config/conexion.php';
require_once '../../models/dto/Usuario.php';
class UsuarioDAO
{
  private $con;

  public function __construct()
  {
    $this->con = Conexion::getConexion();
  }


  public function All()
  {
    return $this->sqlQuery("select * from usuarios where Activo=1");
  }

  public function GetById(int $Value)
  {
    return
      $this->sqlQuery("select * from usuarios where Activo=1 and Id=" . $Value);
  }

  public function GetByNickName(?String $Value)
  {

    return
      $this->sqlQuery("select * from usuarios where Activo=1 & NickName like '%" . $Value . "'%");
  }

  public function Delete(int $Id)
  {
    $sql = "update usuarios set Activo=0 where Id=" . $Id;
    //preparacion de la sentencia
    $stmt = $this->con->prepare($sql);
    //ejecucion de la sentencia
    $stmt->execute();
    //recuperacion de resultados
    $usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // retorna datos para el controlador
    $ObjReturn = array();
    foreach ($usuarios  as $usuario) {
      $ObjReturn[] = new Usuario($usuario);
    }
    return $ObjReturn;
  }

  function sqlQuery(?String $sql)
  {
    //preparacion de la sentencia
    $stmt = $this->con->prepare($sql);
    //ejecucion de la sentencia
    $stmt->execute();
    //recuperacion de resultados
    $usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // retorna datos para el controlador
    $ObjReturn = array();
    foreach ($usuarios  as $usuario) {
      $ObjReturn[] = new Usuario($usuario);
    }
    return $ObjReturn;
  }
}
