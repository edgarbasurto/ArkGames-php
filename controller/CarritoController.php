<?php
require_once DAO_PATH . 'CarritoDAO.php';
require_once DAO_PATH . 'ProductosDAO.php';
require_once DAO_PATH . 'OrdenDAO.php';


class CarritoController
{
    private $cart;
    private $orden;
    private $modelo;

    public function __construct()
    {
        if (isset($_SESSION)) {
            session_start();
        };
        $this->cart = new CarritoDAO();
        $this->orden = new OrdenDAO();
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
        if (!empty($_REQUEST['id'])) {
            $itemData = array(
                'rowid' => $_REQUEST['id'],
                'qty' => $_REQUEST['qty']
            );
            $updateItem = $this->cart->update($itemData);
            echo $updateItem ? 'ok' : 'err';
            die;
        }
    }

    public function removeCartItem()
    {
        if (!empty($_REQUEST['id'])) {
            $deleteItem = $this->cart->remove($_REQUEST['id']);
            header("Location: index.php?c=carrito");
        }
    }


    public function placeOrder()
    {
        if ($this->cart->total_items() > 0 && !empty($_SESSION['sessCustomerID'])) {
            // insert order details into database
            $insertOrder = $this->orden->insertarOrden();

            if ($insertOrder) {
                $orderID = $this->orden->lastOrdenID();
                $sql = '';
                // get cart items
                $cartItems = $this->cart->contents();
                foreach ($cartItems as $item) {
                    $sql .= "INSERT INTO orden_articulos (order_id, product_id, quantity) VALUES ('" . $orderID . "', '" . $item['id'] . "', '" . $item['qty'] . "');";
                }
                // insert order items into database
                $insertOrderItems = $db->multi_query($sql);

                if ($insertOrderItems) {
                    $this->cart->destroy();
                    header("Location: OrdenExito.php?id=$orderID");
                } else {
                    header("Location: Pagos.php");
                }
            } else {
                header("Location: Pagos.php");
            }
        } else {
            header("Location: index.php");
        }
    }
}
