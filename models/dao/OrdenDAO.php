<?php

require_once ROOT_PATH . 'config/conexion.php';



class OrdenDAO
{
    private $con;

    public function __construct()
    {
        $this->con = Conexion::getConexion();
    }

    public function insertarOrden()
	{
		try {
			// sql de la sentencia
			$sql = "INSERT INTO orden (user_id, total_price, created, modified) VALUES ('" . $_SESSION['sessCustomerID'] . "', '" . $this->total() . "', '" . date("Y-m-d H:i:s") . "', '" . date("Y-m-d H:i:s") . "')";
			//preparacion de la sentencia
			$stmt = $this->con->prepare($sql);

			//ejecucion de la sentencia
			$stmt->execute();
			return true;
		}  catch (Exception $e) {
			die($e->getMessage());
			return false;
		  }
	}

}