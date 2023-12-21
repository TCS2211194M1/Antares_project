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
            <h5 class='my-3'>DATOS DE LA COMPRA:$username</h5>
            <div class='d-flex justify-content-center'>
                <h4 class='border-bottom border-3 border-black w-50 p-1'>Cantidad a pagar: $ren[importe_com] MXN</h4>
            </div>
            <div class='d-flex justify-content-center'>
                <h4 class='border-bottom border-3 border-black w-50 p-1'>Fecha límite de Transferencia: $ren[fechaLimite_com]</h4>
            </div>
            <p class='fw-bold'>Instrucciones de Pago</p>
        </div>
        <div class='text-start p-2 border border-2 border-black my-2'>
            <h5 class='text-primary'>Desde BBVA</h5>
            <p>En el menú ingresas a tu cuenta con la que deseas pagar, una vez dentro seleccionas la opción de 'TRANSFERIR' y seleccionas la opción de 'Nuevo'</p>
            <p>Ingresa los siguientes datos cuando te los soliciten:</p>
            <div class='d-flex'>
                <p class='fw-bold'>Cuenta CLABE: <p>012180015374160294</p></p>
            </div>
            <div class='d-flex'>
                <p class='fw-bold'>Titular:<p>ALONDRA MARTINEZ</p></p>
            </div>
            <div class='d-flex'>
                <p class='fw-bold'>Importe:<p> $ren[importe_com] MXN</p></p>
            </div>
            <div class='d-flex'>
                <p class='fw-bold'>Referencia/Concepto: <p>$ren[referencia_com]</p></p>
            </div>
        </div>
        <div class='text-start p-2 border border-2 border-black'>
            <h5 class='text-primary'>Desde cualquier otro banco</h5>
            <p>Ingresa a la sección de transferencias o pagos a otros bancos y proporciona los siguientes datos</p>
            <div class='d-flex'>
                <p class='fw-bold'>Banco destino: <p>BBVA Bancomer</p></p>
            </div>
            <div class='d-flex'>
                <p class='fw-bold'>CLABE: <p>012180015374160294</p></p>
            </div>
            <div class='d-flex'>
                <p class='fw-bold'>Concepto de Pago: <p>$ren[SHORT_DESCRIPTION]</p></p>
            </div>
            <div class='d-flex'>
                <p class='fw-bold'>Referencia: <p>$ren[referencia_com]</p></p>
            </div>
            <div class='d-flex'>
                <p class='fw-bold'>Importe: <p>$ren[importe_com] MXN</p></p>
            </div>
        </div>

        <div class='text-start p-2'>
            <span>1. Una vez que hayas completado el pago, haz clic en 'Ir al menú' y serás redirigido al panel de control.</span>
            <br>
            <span>2. Tus servicios se activarán una vez que se valide el pago</span>
            <br>
            <span>3. Si tienes alguna pregunta sobre tu pago o necesitas ayuda, visita nuestro centro de ayuda</span>
        </div>
        <br>
        <div class='mb-3'>
            <a href='../html/viewuser.php' class='btn btn-outline-primary'>Ir al menú</a>
        </div>
    </div>";

    ?>

    <script src="../bsp/vendor/twbs/bootstrap/dist/js/bootstrap.min.js"></script>
</body>

</html>