<?php

session_start();

$username = $_SESSION['username'];

require_once("../php/dominio.lib.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bsp/vendor/twbs/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js" integrity="sha512-GsLlZN/3F2ErC5ifS5QtgpiJtWd43JWSuIgh7mbzZ8zBps+dvLusV+eNQATqgA/HdeKFVgA5v3S/cIrLF7QnIg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="../js/functions.js"></script>
    <title>Samava - PDF</title>
</head>

<body>
    <button class='btn btn-primary m-2' id='btn-pago' onclick="javascript:pdf();"><i class="bi bi-file-earmark-ppt me-2"></i>Imprimir información de compra</button>
    <?php
        $dominio = new Dominio();
        $consult = $dominio->consultPdf($username);
        $ren = $consult->fetch_array(MYSQLI_ASSOC);
        echo "<div class='container my-5 p-5 text-center border border-3' id='transferencia'>
        <div class=''>
            <img src='../image/dominio.png' alt='' style='height: 15%; width: 15%;'>
            <h5 class='my-3'>DATOS DE LA COMPRA</h5>
            <div class='d-flex justify-content-center'>
                <h4 class='border-bottom border-3 border-black w-50 p-1'>Cantidad a pagar: $ren[importe_com] MXN</h4>
            </div>
            <div class='d-flex justify-content-center'>
                <h4 class='border-bottom border-3 border-black w-50 p-1'>Fecha límite de Pago: $ren[fechaLimite_com]</h4>
            </div>
            <p class='fw-bold'>Instrucciones de Pago</p>
        </div>

        <br>
        
        <div class='row p-3 shadow border border-5 border-dark text-start'>
            <div class='col-lg-5'>
                <div class='row text-start'>
                    <p>Empresa: Samava</p>
                </div>
                <div class='row'>
                    <p>Dirección: Castillo de Chapultepec #61, San Juan del Río, Querétaro, México</p>
                </div>
                <div class='row'>
                    <p>Teléfono: 4271196134</p>
                </div>
                <div class='row'></div>
            </div>
            <div class='col-lg-2'></div>
            <div class='col-lg-5'>
                <div class='row'>
                    <img src='../image/A113.png' style='height:25%; width:25%;'></img>
                </div>
                <div class='row text-start'>
                    <p>Fecha: $ren[create_date]</p>
                </div>
                <div class='row'>
                    <p>Recibo: #$ren[t_workorder]</p>
                </div>
            </div>
        </div>

        <br>
        
        <div class='row p-3 shadow border border-5 border-dark text-start'>
            <div class='col-lg-5'>
                <div class='row text-start'>
                    <p>Cliente: $username</p>
                </div>
                <div class='row'>
                    <p>Dominio: $ren[REGISTERED_DOMAIN]</p>
                </div>
                <div class='row'>
                    <p>Referencia: $ren[referencia_com]</p>
                </div>
                <div class='row'></div>
            </div>
            <div class='col-lg-2'></div>
            <div class='col-lg-5'>
                <div class='row text-start'>
                    <p>Producto: $ren[LONG_DESCRIPTION]</p>
                </div>
                <div class='row text-start'>
                    <p>Método de Pago: $ren[metodoPago_com]</p>
                </div>
                <div class='row'>
                    <p>Precio: $ren[importe_com] MXN</p>
                </div>
            </div>
        </div>
        <div class='text-start p-2'>
            <span>1. Tus servicios se activarán una vez que se valide el pago</span>
            <br>
            <span>2. Si tienes alguna pregunta sobre tu pago o necesitas ayuda, visita nuestro centro de ayuda</span>
        </div>
        <br>
        <div class='mb-3'>
            <a href='../html/viewuser.php' class='btn btn-outline-primary' id='btn-menu'>Ir al menú</a>
        </div>
    </div>";

    ?>

    <script src="../bsp/vendor/twbs/bootstrap/dist/js/bootstrap.min.js"></script>
</body>

</html>