<?php

use Symfony\Component\VarDumper\VarDumper;

require_once DAO_PATH . 'CarritoDAO.php';
require_once DAO_PATH . 'ProductosDAO.php';
require_once DAO_PATH . 'OrdenDAO.php';


class CarritoController
{
    private $cart;
    private $modelo;

    public function __construct()
    {
        $this->cart = new CarritoDAO();
        $this->modelo = new ProductosDAO();
    }

    public function index()
    {
        $cart = $this->cart;
        require_once VIEW_PATH . 'Carrito/listar.carrito.php';
    }

    public function addToCart()
    {

        if (!empty($_REQUEST['id'])) {
            $productID = $_REQUEST['id'];
            // get product details
            $productos = $this->modelo->obtener($productID);
            $producto = $productos[0];
            $itemData = array(
                'id' => $producto->id_producto,
                'name' => $producto->nombre,
                'price' => $producto->precio,
                'qty' => 1
            );

            // echo var_dump($itemData);
            $insertItem = $this->cart->insert($itemData);
            $redirectLoc = $insertItem ?
                'index.php?c=carrito' :
                'index.php?c=productos&a=index_cuadricula';
            header("Location: " . $redirectLoc);
        }
    }


    public function updateCartItem()
    {
        if (!empty($_GET['id'])) {
            $itemData = array(
                'rowid' => $_GET['id'],
                'qty' => $_GET['qty']
            );
            
            $updateItem = $this->cart->update($itemData);
           

            echo json_encode($itemData);
        }
    }

    public function removeCartItem()
    {
        if (!empty($_REQUEST['id'])) {
            $deleteItem = $this->cart->remove($_REQUEST['id']);
            header("Location: index.php?c=carrito");
        }
    }


    
}
