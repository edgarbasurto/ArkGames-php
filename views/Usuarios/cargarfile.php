    <form method="post" action="index.php?c=usuarios&a=savefile" enctype="multipart/form-data">

        <div>
            <label>Añadir imagen:</label>
            <div class="col-sm-9">
                <input name="archivo" id="seleccionArchivos" type="file" />
            </div>

        </div>

        <div style="margin: 25px;">
            <button type="submit" value="guardar"> cargar</button>
        </div>
    </form>