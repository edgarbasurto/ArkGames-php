<link rel="stylesheet" href="../../assets/css/master2.css" />
<?php
include_once '../templates/header.php';

 require_once '../conexion.php';

if (isset($_GET['id'])) {

    $data = ['id' => htmlentities($_GET['id'])];
    $sql = "select * from usuarios where id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute($data);
    $filas = $stmt->fetchAll(PDO::FETCH_ASSOC);
    foreach ($filas as $fila) {
        ?>
        <div>
            <form method="post">
                <input type="hidden" name="txtid2" value="<?php echo $fila['id'] ?>">
                <label>Id:</label><input type="text" name="txtid" readonly value="<?php echo $fila['id'] ?> ">
                <label>Usuario:</label><input type="text" name="txtusuario" value="<?php echo $fila['username'] ?>">
                <label>Passwd:</label><input type="text" name="txtpasswd" value="<?php echo $fila['password'] ?>">
                <label>Nombre:</label><input type="text" name="txtnombre" value="<?php echo $fila['nombre'] ?>">
                <label>Apellidos:</label><input type="text" name="txtapellidos" 
                                                value="<?php echo $fila['apellidos'] ?>">
                <label>Email:</label><input type="text" name="txtEmail" 
                                            value="<?php echo $fila['email'] ?>">
                
                <input type="checkbox" name="ckActivo" value="<?php echo $fila['estado'] ?>" 
                       checked="<?php echo ($fila['estado']==1)?'checked':'' ?>" >Activo
                
                
                <input type="submit" value="Actualizar">
            </form>
        </div>
        <?php
    }
}
?>


<?php
if (!empty($_POST['txtid']) && !empty($_POST['txtusuario']) && !empty($_POST['txtpasswd']) && !empty($_POST['txtnombre'])) {

    $data = [
        'id' => htmlentities($_POST['txtid']),
        'usuario' => htmlentities($_POST['txtusuario']),
        'pass' => htmlentities($_POST['txtpassword']),
        'nom' => htmlentities($_POST['txtnombre']),
        'apell' => htmlentities($_POST['txtapellidos']),
        'email' => htmlentities($_POST['txtEmail'])
        
    ];
    $sql = "update usuarios set username =:usuario, password = :pass, nombre = :nom, apellidos=:apell,  email=:email"
            . " where id=:id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute($data);

    if ($stmt->rowCount() > 0) {// rowCount permite obtener el numero de filas afectadas
        header("location:presentar.php");
    }
}
?>