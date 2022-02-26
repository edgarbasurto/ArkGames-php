<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../../assets/css/master2.css" />
        <title>CRUD</title>
    </head>
    <body>
          <?php
        include_once '../templates/header.php';
        ?>
        <div>
            <form method="post">
                <label>ID</label>
                <input type="number" name="txtid">
                <label>USUARIO:</label>
                <input type="text" name="txtusuario">
                <label>PASSWORD:</label>
                <input type="password" name="txtpassword">
                <label>NOMBRE:</label>
                <input type="text" name="txtnombre">
                 <label>APELLIDOS:</label>
                <input type="text" name="txtapellidos">
                 <label>EMAIL:</label>
                <input type="text" name="txtemail">
                <input type="submit" value="Agregar">
            </form>
        </div>
        <?php
         require_once '../conexion.php';

        if (!empty($_POST['txtid']) && !empty($_POST['txtusuario']) && 
                !empty($_POST['txtpassword']) && !empty($_POST['txtnombre'])) {
          
            $id = htmlentities($_POST['txtid']);
            $usuario = htmlentities($_POST['txtusuario']);
            $password = htmlentities($_POST['txtpassword']);
            $nombre = htmlentities($_POST['txtnombre']);
            $apellidos = htmlentities($_POST['txtapellidos']);
            $email = isset($_POST['txtemail'])? htmlentities($_POST['txtemail']):'';
            
            $data = [
                'id' =>htmlentities($_POST['txtid']),
                'user' => htmlentities($_POST['txtusuario']),
                'nom' => $nombre,
                'apell'=>$apellidos,
                'email' => $email,
                 'pass' =>$password
            ];
 $sql = "insert into usuarios(id, username, password, nombre, apellidos, email) values(:id, :user, :pass,:nom,:apell,:email)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute($data);
            
            if ($stmt->rowCount() > 0) {// rowCount() permite conocer el numero de filas afectadas
                header("location:presentar.php");
            }else{
                
            }
        }
        ?>


    </body>
</html>