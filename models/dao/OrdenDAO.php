<?php
require_once ROOT_PATH . 'config/conexion.php';
require_once DTO_PATH . 'Orden.php';
class OrdenDAO
{
	private $con;

	public function __construct()
	{
		$this->con = Conexion::getConexion();
	}

	public function insertarOrden($ordenTemp)
	{
		try {
			// sql de la sentencia
			$sql = "INSERT INTO orden (user_id, total_price, created, modified) VALUES ('" . $ordenTemp['usuario'] . "', '" . $ordenTemp['precio_total'] . "', '" . date("Y-m-d H:i:s") . "', '" . date("Y-m-d H:i:s") . "')";
			//preparacion de la sentencia
			$stmt = $this->con->prepare($sql);

			//ejecucion de la sentencia
			$stmt->execute();
			return true;
		} catch (Exception $e) {
			die($e->getMessage());
			return false;
		}
	}

	public function insertarDetalleOrden($cartItems, $orderID)
	{
		try {
			// sql de la sentencia
			$sql = '';
			foreach ($cartItems as $item) {
				$sql .= "INSERT INTO orden_articulos (order_id, product_id, quantity) VALUES ('" . $orderID . "', '" . $item['id'] . "', '" . $item['qty'] . "');";
			}
			//preparacion de la sentencia
			$stmt = $this->con->prepare($sql);

			//ejecucion de la sentencia
			$stmt->execute();
			return true;
		} catch (Exception $e) {
			die($e->getMessage());
			return false;
		}
	}

	public function lastOrdenID()
	{
		return $this->con->lastInsertId();
	}

	public function	GetById($Id)
	{
		return $this->sqlQuery("SELECT * FROM orden  WHERE id=" . $Id);
	}

	public function GetByIdUsuario($IdUsuario)
	{
		return $this->sqlQuery("SELECT O.id  ,U.NombreCompleto, O.total_price ,O.created  , O.status , O.modified FROM orden AS O INNER JOIN usuarios AS U ON O.USER_ID=U.Id WHERE O.USER_ID=" . $IdUsuario);
	}

	public function GetVentas()
	{
		return $this->sqlQuery("SELECT O.id  ,U.NombreCompleto, O.total_price ,O.created  , O.status , O.modified  FROM orden AS O INNER JOIN usuarios AS U ON O.USER_ID=U.Id  ");
	}


	function sqlQuery(?String $sql)
	{
		//preparacion de la sentencia
		$stmt = $this->con->prepare($sql);
		//ejecucion de la sentencia
		$stmt->execute();
		//recuperacion de resultados
		$Ordenes = $stmt->fetchAll(PDO::FETCH_ASSOC);

		// retorna datos para el controlador
		$ObjReturn = array();

		foreach ($Ordenes  as $Orden) {
			$ObjOrden = new Orden();
			$ObjOrden->SetValorDTO($Orden);

			if (isset($Orden['NombreCompleto'])) {
				$ObjOrden->NombreUsuario = $Orden['NombreCompleto'];
			}

			$ObjReturn[] = $ObjOrden;
		}

		return $ObjReturn;
	}
}
