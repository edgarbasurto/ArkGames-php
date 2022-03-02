<?php
// echo var_dump($_REQUEST);
    // if (isset($_REQUEST['g'])) {
        require_once '../../controller/ProductosController.php';
        
        $cont = new ProductosController();
    //     $cont->guardar();
    //     require_once '../Catalogo/listar.tabla.php';
        
    // } else {
    //     echo 'error';
    // }
    

    if (isset($_GET['accion'])) {
        $metodo =   $_GET['accion'];
    
        switch ($metodo) {
            // case "shw":
            //     $id =   $_GET['id'];
            //     $cont->show($id);
            //     break;
            // case "upd":
            //     $id =   $_GET['id'];
            //     $cont->edit($id);
            //     break;
            // case "del":
            //     $id =   $_GET['id'];
            //     $cont->del($id);
            //     break;
            case "g":
                $id =   $_GET['id'];
                $post = $_POST;
                $cont->guardar();
               
                break;
            default:
                $cont->index();
                break;
        }
    } else {
        $cont->index();
    }
    
       
   
    
    


