<div class="cuadricula-juegos">

    <?php
    require_once '../../controller/ProductosControlador.php';

    $cont = new ProductosControlador();
    $lista = $cont->index();

    foreach ($lista as $producto) {
    ?>

        <div class="cuadricula" id="<?php echo $producto->Id_producto ?>">
            <div class="imagen-card">
                <img class="img-cuadricula" src="<?php echo $producto->Url_imagen ?>" alt="<?php echo $producto->Nombre ?>">
            </div>

            <div class="informacion">
                <h2><?php echo $producto->Nombre ?></h2>
                <p class="descripcion"><?php echo $producto->Categoria->Nombre_categoria ?></p>
            </div>
            <div class="footer-box">
                <div class="box-precio">

                    <span class="precio2"><b><?php echo $producto->Precio ?></b></span>
                </div>
                <a class="icon-buy" href="#"><img class="icon-buy" src="../../assets/img/cart_icon.svg" alt="icono de compra"></a>
                <a href="editar.php?id=<?php echo $producto->Id_producto ?>">Editar</a>
                <a href="eliminar.php?id=<?php echo $producto->Id_producto ?>">Eliminar</a>
            </div>
        </div>


    <?php } ?>

    <div class="paginador" id="paginador">
        <label>Registros por pagina:</label>
        <select name="regitrospagina" class="cantreg" id="cantreg">
            <option value="0">Todos</option>
            <option value="3">3</option>
            <option value="6">6</option>
            <option value="9">9</option>
        </select>
        <a href="javascript:void(0)" class="firstPage" id="firstPage">«</a>
        <a href="javascript:void(0)" class="previousPage" id="previousPage">❮</a>
        <select name="numpagina" class="numpagina" id="numpagina">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
        </select>
        <a href="javascript:void(0)" class="nextPage" id="nextPage">❯</a>
        <a href="javascript:void(0)" class="lastPage" id="lastPage">»</a>
    </div>
</div>

<script type="text/javascript" src="../../assets/js/BasurtoEdgar.js"></script>