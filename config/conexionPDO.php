<?php

$pdo = new PDO('mysql:host=localhost;port=3306;dbname=ArkgamesBD', 'root', 'DBA#2021ug');
// See the "errors" folder for details...
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
