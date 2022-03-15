<?php

require_once ROOT_PATH . 'config/conexion.php';


class ContactosDAO
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
        $contactos = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $contactos;
    }


    public function actualizar($data)
    {
    }


    public function registrar($data)
    {
    }

    public function eliminar(int $Id)
    {
    }

    public function obtener($id)
    {
    }
}
