<div>
    <table class="table table-striped table-dark table-bordered table-hover" width="100%" cellspacing="0">

        <thead class="table-light">
            <th scope="col">Id</th>
            <th scope="col">Imagen</th>
            <th scope="col">Producto</th>
            <th scope="col">Precio</th>
            <th scope="col">Categoría</th>
            <th scope="col">-</th>
        </thead>
        <tbody>
            <?php
            require_once '../../controller/ProductosControlador.php';

            $cont = new ProductosControlador();
            $lista = $cont->index();

            foreach ($lista as $producto) {
            ?>

                <tr>
                    <th scope="row"><?php echo $producto->Id_producto ?></th>
                    <td><img style="height:50px" src="<?php echo $producto->Url_imagen ?>" alt="<?php echo $producto->Nombre ?>"></td>
                    <td><?php echo $producto->Nombre ?></td>
                    <td><?php echo $producto->Precio ?></td>
                    <td><?php echo $producto->Categoria->Nombre_categoria ?></td>
                    <td><a href="editar.php?id=<?php echo $producto->Id_producto ?>"class="btn btn-primary"><i class="fa-solid fa-pen-to-square"></i></a>
                        <a href="eliminar.php?id=<?php echo $producto->Id_producto ?>" class="btn btn-danger"><i class="fa-solid fa-trash-can"></i></a>
                    </td>

                </tr>
            <?php } ?>
        </tbody>
    </table>
    <script src="https://kit.fontawesome.com/2008d37923.js" crossorigin="anonymous"></script>
</div>