<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8" />

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>
    <div id="reporte">
        <div class=" px-4 py-5">

            <h2 class="text-uppercase">ORDEN# <?php echo $ObjOda->Id; ?></h5>
                <br>
                <br>
                <p>
                <h3 class="text-uppercase">CLIENTE </h5>
                    <h5 class="text-uppercase"><?php echo $ObjOda->NombreUsuario; ?></h5>
                    </p> <br>
                    <p>
                    <h4 class="text-uppercase">Fecha </h5>
                        <h5 class="text-uppercase"><?php echo $ObjOda->created; ?></h5>
                        </p> <br>
                        <div class="mb-3">
                            <hr class="new1">
                        </div>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th style="width: 5%;" class=" text-center" scope="col">Cantidad</th>
                                    <th style="width: 75%;" class=" text-center" scope="col">Producto</th>
                                    <th style="width: 10%;" class=" text-center" scope="col">Precio</th>
                                    <th style="width: 10%;" class=" text-end" scope="col">Sub total</th>
                                </tr>
                            </thead>
                            <tbody>

                                <tr>
                                    <?php foreach ($lstDt as $ObjDetalleODA) { ?>
                                        <td class="text-center" style="width: 5%; "><?php echo $ObjDetalleODA->Id; ?></td>
                                        <td style="width: 75%; "><?php echo $ObjDetalleODA->Id; ?></td>
                                        <td style="width: 10%; " class="text-center">$ <?php echo $ObjDetalleODA->Id; ?></td>

                                        <td style="width: 10%; " class="text-end">$ <?php echo $ObjDetalleODA->Id; ?></td>
                                    <?php } ?>
                                </tr>

                            </tbody>
                        </table>
                        <div class="mb-3">
                            <hr class="new1 ">
                        </div>
                        <div class="d-flex justify-content-between mt-3"> <span class="font-weight-bold">Total</span> <span class="font-weight-bold theme-color">$ <?php echo $ObjOda->total_price;  ?></span> </div>
                        <br><br>
                        <div class="text-center mt-5">
                            <h4 class="mt-5 theme-color mb-5 text-end">Gracias por su Orden</span>
                        </div>
        </div>
    </div>
    <script src="../../assets/js/jquery.js"></script>
    <script src="../../assets/js/jspdf.js"></script>
    <script>
        DescargarPDF('reporte', 'Archivo');

        function DescargarPDF(ContenidoID, nombre) {

            var pdf = new jsPDF('p', 'pt', 'letter');

            html = $('#' + ContenidoID).html();

            specialElementHandlers = {};

            margins = {
                top: 60,
                bottom: 20,
                left: 40,
                width: 522
            };

            pdf.setFontSize(20);

            pdf.fromHTML(html, margins.left, margins.top, {
                'width': margins.width
            }, function(dispose) {
                pdf.save(nombre + '.pdf');
            }, margins);

        }
    </script>
</body>

</html>