 


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content=" " />
    <meta name="keywords" content=" " />
    <link rel="shortcut icon" href="../../assets/img/logo.svg">

    <link rel="stylesheet" href="../../assets/css/master2.css" />
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <title>Demostración Métodos CRUD - USUARIO</title>
</head>

<body>
    <!-------------------------------------------------Menu---------------------------------------->
    <?php
    include_once '../Templates/menu.php'
    ?>
    <!------------------------------------------------------------------------------------------>

    <div class=" card shadow mb-4">
    <div class="card-header py-3">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h6 class="m-0 font-weight-bold text-primary">Categorías</h6>
            <a class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" id="mediumButton" data-target="#mediumModal" data-attr="categorias/create" title="Crear Nueva Categoría"><i class="fas fa-plus-circle fa-sm text-white-50"></i> Nueva Categoría</a>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table   class="table table-striped table-bordered table-hover" width="100%" cellspacing="0">
               
  <thead class="table-light">
  <th scope="col">Id</th>
      <th scope="col">Usuario</th>
      <th scope="col">Nombre</th>
      <th scope="col">Email</th>
  </thead>
  <tbody>
  <?php
require_once '../../controller/UsuariosController.php';

$cont = new UsuarioController();
$lista=$cont->index();

foreach($lista as $registro)
{
    ?>
    <tr>
<th scope="row"><?php echo $registro->Id?></th>
<td><?php echo $registro->NickName?></td>
<td><?php echo $registro->NombreCompleto?></td>
<td><?php echo $registro->Email?></td>
</tr>
<?php
}
?>
  </tbody>
</table>

        </div>
    </div>
</div>



    <!-------------------------------------------------Footer---------------------------------------->
    <?php
    include_once '../Templates/footer.php'
    ?>
    <!------------------------------------------------------------------------------------------>
</body>

</html>
