<?php

require_once ROOT_PATH . 'config/conexion.php';
require_once DTO_PATH . 'Noticias.php';

class NoticiasDAO
{
  private $con;

  public function __construct()
  {
    $this->con = Conexion::getConexion();
  }

  public function listar()
  {
    // sql de la sentencia
    $formato = "%d-%m-%Y";
    $sql = "SELECT * 
    FROM noticia n, tema t, dispositivo d 
    WHERE n.id_tema = t.id_tema AND n.id_dispositivo = d.id_dispositivo 
    AND noti_estado=1 ORDER BY n.id_noticia";

    //preparacion de la sentencia
    $stmt = $this->con->prepare($sql);
    //ejecucion de la sentencia
    $stmt->execute();
    //recuperacion de resultados
    $noticias = $stmt->fetchAll(PDO::FETCH_ASSOC);

    //retorna datos para el controlador
    $ObjReturn = array();
    foreach ($noticias  as $noticia) {
      $obj = new Noticias();
      $obj->Set($noticia);
      $ObjReturn[] = $obj;
    }
    return $ObjReturn;
  }

  public function actualizar($data)
  {
    try {
      $sql = "UPDATE noticia SET 
						titulo_noticia       = ?, 
						descripcion_noticia  = ?,
            imagen_noticia       = ?,
						id_tema              = ?, 
            id_dispositivo       = ? 
				    WHERE id_noticia     = ?";

      $stmt = $this->con->prepare($sql);
      $datos = array(
        $data['titulo'],
        $data['descripcion'],
        $data['url_imagen'],
        $data['id_tema'],
        $data['id_dispositivo'],
        $data['id_noticia']
      );


      $stmt->execute($datos);
    } catch (Exception $e) {
      die($e->getMessage());
    }
  }

  public function actualizarSinImagen($data)
  {
    try {
      $sql = "UPDATE noticia SET titulo_noticia = ?, descripcion_noticia = ?, id_tema = ?, 
      id_dispositivo = ? WHERE id_noticia = ?";

      $stmt = $this->con->prepare($sql);
      $datos = array(
        $data['titulo'],
        $data['descripcion'],
        $data['id_tema'],
        $data['id_dispositivo'],
        $data['id_noticia']
      );


      $stmt->execute($datos);
    } catch (Exception $e) {
      die($e->getMessage());
    }
  }

  public function insertar($data)
  {
    try {
      $sql = "INSERT INTO noticia(titulo_noticia, descripcion_noticia, imagen_noticia, id_tema, id_dispositivo) 
       VALUES (?, ?, ?, ?, ?)";

      // $data['url_imagen'] = $this->con->quote($data['url_imagen']);

      $stmt = $this->con->prepare($sql);
      $datos = array(
        $data['titulo'],
        $data['descripcion'],
        $data['url_imagen'],
        $data['id_tema'],
        $data['id_dispositivo']
      );


      $stmt->execute($datos);
    } catch (Exception $e) {
      die($e->getMessage());
    }
  }

  public function eliminar(int $id)
  {

    try {
      $sql = "UPDATE noticia set noti_estado=0 where id_noticia=" . $id;
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
      $sql = "SELECT * FROM noticia n, tema t, dispositivo d WHERE n.id_tema = t.id_tema 
      AND n.id_dispositivo = d.id_dispositivo AND noti_estado=1 AND id_noticia =" . $id;
      // echo var_dump($sql);
      $stmt = $this->con->prepare($sql);
      //ejecucion de la sentencia
      $stmt->execute();
      //recuperacion de resultados
      $noticias = $stmt->fetchAll(PDO::FETCH_ASSOC);

      //retorna datos para el controlador
      $ObjReturn = array();
      foreach ($noticias as $noticia) {
        $obj = new Noticias();
        $obj->Set($noticia);
        $ObjReturn[] = $obj;
      }
      return $ObjReturn;
    } catch (Exception $e) {
      die($e->getMessage());
    }
  }

  public function buscar($parametro, $op) {
    // sql de la sentencia
    $sql = "SELECT *
    FROM noticia n
    inner join tema t on n.id_tema = t.id_tema
    inner join dispositivo d on n.id_dispositivo = d.id_dispositivo
    where n.noti_estado=1 and ";
    if($op == 1){
      $sql = $sql . "n.id_tema = $parametro";
    }else if($op == 2){
      $sql =  $sql . "n.id_dispositivo = $parametro";
    }
    // preparar la sentencia
    $stmt = $this->con->prepare($sql);
    // ejecutar la sentencia
    $stmt->execute();
    //obtener  resultados
    $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
    //retorna datos para el controlador
    $ObjReturn = array();
    foreach ($resultados  as $noticia) {
      $obj = new Noticias();
      $obj->Set($noticia);
      $ObjReturn[] = $obj;
    }
    //retornar resultados
    return $ObjReturn;
  }
}
