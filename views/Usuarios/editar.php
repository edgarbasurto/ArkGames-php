 <?php
    foreach (TipoRol::toArray() as $value) {
        if ($value != 1) {
            echo '<option>' . TipoRol::getName($value) . '</option>';
        }
    }  ?>