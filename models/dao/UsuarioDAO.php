<?php

require_once ROOT_PATH . 'config/conexion.php';
require_once DTO_PATH . 'Usuario.php';
class UsuarioDAO
{
  private $con;

  public function __construct()
  {
    $this->con = Conexion::getConexion();
  }

  public function ValidarPWD_PorID($IdUsuario,  $password)
  {
    $Usuario = $this->GetById($IdUsuario);

    if (is_null($Usuario) == false) {
      $hash = $Usuario[0]->getPassword();

      return password_verify($password, $hash);
    }
    return false;
  }
  public function ValidarPWD_PorUsuario($usuario,  $password)
  {
    $conversion = strtoupper($usuario);
    $lst = $this->GetByNickName($conversion);

    foreach ($lst as $ObjUser) {

      $hash = $ObjUser->getPassword();

      if (password_verify($password, $hash)) {

        return  get_object_vars($ObjUser);
      }
    }

    return null;
  }


  /*
      */

  public function All()
  {
    return $this->sqlQuery("SELECT * FROM usuarios WHERE Activo=1");
  }

  public function GetById(int $Value)
  {
    return
      $this->sqlQuery("SELECT * FROM usuarios WHERE Activo=1 AND Id=" . $Value);
  }

  public function GetByNickName(?String $Value)
  {

    return
      $this->sqlQuery("SELECT * FROM usuarios WHERE Activo=1 AND UPPER(NickName) LIKE '%" . $Value . "%'");
  }

  public function Delete(int $Id)
  {
    $sql = "UPDATE usuarios SET Activo=0 WHERE Id=" . $Id;
    //preparacion de la sentencia
    $stmt = $this->con->prepare($sql);
    //ejecucion de la sentencia
    if ($stmt->execute()) {
      return true;
    } else {
      return false;
    }
  }

  public function Insert(Usuario $Obj)
  {
    $pwd = $Obj->getPassword();
    $sql = "INSERT INTO usuarios (IdRol, IdServidor, NickName, Email, NombreCompleto, Genero, FechaNacimiento, PasswordHASH, Activo, UsuarioActualizacion, FechaCreacion, FechaActualizacion) VALUES
            ('$Obj->IdRol',$Obj->IdServidor,'$Obj->NickName','$Obj->Email','$Obj->NombreCompleto','$Obj->Genero','$Obj->FechaNacimiento', _binary '$pwd', 1, 0, NOW(), NOW())";

    //preparacion de la sentencia
    $stmt = $this->con->prepare($sql);
    //ejecucion de la sentencia
    if ($stmt->execute()) {
      return true;
    } else {
      return false;
    }
  }


  public function Update(Usuario $Obj)
  {
    $sql = "UPDATE usuarios SET IdRol='$Obj->IdRol', IdServidor=$Obj->IdServidor, Email='$Obj->Email', NombreCompleto='$Obj->NombreCompleto', Genero='$Obj->Genero', FechaNacimiento ='$Obj->FechaNacimiento', UsuarioActualizacion=0, FechaActualizacion=NOW() WHERE Id=$Obj->Id";


    //preparacion de la sentencia
    $stmt = $this->con->prepare($sql);
    //ejecucion de la sentencia
    if ($stmt->execute()) {
      return true;
    } else {
      return false;
    }
  }

  public function Update_pwd(Usuario $Obj)
  {

    $newHASH = $Obj->getPassword();

    $sql = "UPDATE usuarios SET PasswordHASH='$newHASH' WHERE Id=$Obj->Id";


    //preparacion de la sentencia
    $stmt = $this->con->prepare($sql);
    //ejecucion de la sentencia
    if ($stmt->execute()) {
      return true;
    } else {
      return false;
    }
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
      $ObjUsuario = new Usuario();
      $ObjUsuario->SetValorDTO($usuario);
      $ObjReturn[] = $ObjUsuario;
    }
    return $ObjReturn;
  }
}
