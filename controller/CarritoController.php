<?php
require_once DAO_PATH . 'CarritoDAO.php';
require_once DAO_PATH . 'ProductosDAO.php';


class CarritoController
{
    private $cart;
    private $modelo;

    public function __construct()
    {
        if (isset($_SESSION)) {
            session_start();
        };
        $this->cart = new CarritoDAO();
        $this->modelo = new ProductosDAO();
    }

    public function index() {

        // llamar al modelo
        // $resultados = $this->modelo->Listar();
        //llamo a la vista
        require_once VIEW_PATH . 'Carrito/listar.carrito.php';
    }

    public function addToCart() {

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
            $redirectLoc = $insertItem ? 'index.php?c=carrito' : 'index.php?c=productos&a=index_cuadricula';
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
        if ($_REQUEST['action'] == 'removeCartItem' && !empty($_REQUEST['id'])) {
            $deleteItem = $this->cart->remove($_REQUEST['id']);
            header("Location: VerCarta.php");
        }
    }


    public function placeOrder()
    {
        if ($this->cart->total_items() > 0 && !empty($_SESSION['sessCustomerID'])) {
            // insert order details into database
            $insertOrder = $db->query("INSERT INTO orden (customer_id, total_price, created, modified) VALUES ('" . $_SESSION['sessCustomerID'] . "', '" . $cart->total() . "', '" . date("Y-m-d H:i:s") . "', '" . date("Y-m-d H:i:s") . "')");

            if ($insertOrder) {
                $orderID = $db->insert_id;
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






    // funciones del controlador
    // if(isset($_REQUEST['action']) && !empty($_REQUEST['action'])){
    //     if($_REQUEST['action'] == 'addToCart' && !empty($_REQUEST['id'])){
    //         $productID = $_REQUEST['id'];
    //         // get product details
    //         $query = $db->query("SELECT * FROM productos WHERE id_ = ".$productID);
    //         $row = $query->fetch_assoc();
    //         $itemData = array(
    //             'id' => $row['id'],
    //             'name' => $row['name'],
    //             'price' => $row['price'],
    //             'qty' => 1
    //         );
            
    //         $insertItem = $cart->insert($itemData);
    //         $redirectLoc = $insertItem?'VerCarta.php':'index.php';
    //         header("Location: ".$redirectLoc);
    //     }elseif($_REQUEST['action'] == 'updateCartItem' && !empty($_REQUEST['id'])){
    //         $itemData = array(
    //             'rowid' => $_REQUEST['id'],
    //             'qty' => $_REQUEST['qty']
    //         );
    //         $updateItem = $cart->update($itemData);
    //         echo $updateItem?'ok':'err';die;
    //     }elseif($_REQUEST['action'] == 'removeCartItem' && !empty($_REQUEST['id'])){
    //         $deleteItem = $cart->remove($_REQUEST['id']);
    //         header("Location: VerCarta.php");
    //     }elseif($_REQUEST['action'] == 'placeOrder' && $cart->total_items() > 0 && !empty($_SESSION['sessCustomerID'])){
    //         // insert order details into database
    //         $insertOrder = $db->query("INSERT INTO orden (customer_id, total_price, created, modified) VALUES ('".$_SESSION['sessCustomerID']."', '".$cart->total()."', '".date("Y-m-d H:i:s")."', '".date("Y-m-d H:i:s")."')");
            
    //         if($insertOrder){
    //             $orderID = $db->insert_id;
    //             $sql = '';
    //             // get cart items
    //             $cartItems = $cart->contents();
    //             foreach($cartItems as $item){
    //                 $sql .= "INSERT INTO orden_articulos (order_id, product_id, quantity) VALUES ('".$orderID."', '".$item['id']."', '".$item['qty']."');";
    //             }
    //             // insert order items into database
    //             $insertOrderItems = $db->multi_query($sql);
                
    //             if($insertOrderItems){
    //                 $cart->destroy();
    //                 header("Location: OrdenExito.php?id=$orderID");
    //             }else{
    //                 header("Location: Pagos.php");
    //             }
    //         }else{
    //             header("Location: Pagos.php");
    //         }
    //     }else{
    //         header("Location: index.php");
    //     }
    // }else{
    //     header("Location: index.php");
    // }
