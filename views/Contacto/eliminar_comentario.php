<?php require_once '../../views/Templates/HeadBootstrap.php' ?>


<meta name="description" content="Página de contactos-comentarios ArkGames" />
<meta name="keywords" content="formulario,contacto,comentario" />

<title>CRUD Comentarios</title>

    <body id="bodyTemp">
        <header>
            <?php
            require_once '../Templates/navBarBootstrap.php'
            ?>
        </header>

        <?php
        require_once '../../config/conexionPDO.php';
        if (!empty($_GET['id'])) {
            $data = ['id' => htmlentities($_GET['id'])];
            $sql = "select * from comentario where id_comentario = :id";
            $stmt = $pdo->prepare($sql);
            $stmt->execute($data);

            $filas = $stmt->fetchAll(PDO::FETCH_ASSOC);
            foreach ($filas as $fila) {
        ?>



        <!-------------------------------------------------FOOTER---------------------------------------->
        <?php
            require_once '../Templates/footerBootstrap.php'
            ?>

    </body>

</html>