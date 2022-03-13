<?php

require_once '../../config/conexion.php';
require_once '../../models/dto/Noticias.php';

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

  /*public function buscar($parametro) {
    // sql de la sentencia
    $sql = "SELECT * FROM productos, categoria  where prod_idCategoria = cat_id and prod_estado=1  and 
    (prod_nombre like :b1 or cat_nombre like :b2)";
    $stmt = $this->con->prepare($sql);
    // preparar la sentencia
    $conlike = '%' . $parametro . '%';
    $data = ['b1' => $conlike, 'b2' => $conlike];
    // ejecutar la sentencia
    $stmt->execute($data);
    //obtener  resultados
    $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
    //retornar resultados
    return $resultados;
  }*/
}
