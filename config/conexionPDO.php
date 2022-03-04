<?php

$pdo = new PDO('mysql:host=localhost;port=3306;dbname=ArkgamesBD', 'root', ''); //agregar contraseña de la base de datos
// See the "errors" folder for details...
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
