<?php

session_start();

$username = $_SESSION['username'];
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
    <button class='btn btn-primary' id='btn-pago' onclick="javascript:pdf();">Imprimir información de pago</button>
    <div class="container my-5 p-5 text-center border border-3" id="transferencia">
        <div class="">
            <img src="../image/dominio.png" alt="" style="height: 200px;">
            <h5 class="my-3">DATOS DE LA COMPRA: <?php echo $username ?></h5>
            <div class="d-flex justify-content-center">
                <h4 class="border-bottom border-3 border-black w-50 p-1">Cantidad a pagar:</h4>
            </div>
            <div class="mt-3 d-flex justify-content-center">
                <h4 class="border-bottom border-3 border-black w-50 p-1">Fecha límite de pago:</h4>
            </div>
            <p class="fw-bold">Instrucciones de Pago</p>
        </div>
        <div class="text-start p-2 border border-2 my-2">
            <h5 class="text-primary">Desde BBVA</h5>
            <p>En el menú "Pagar" selecciona la opción "De servicios" e ingrea el siguiente "Número de convenio CIE"</p>
            <div class="d-flex">
                <p class="fw-bold">Número de convenio CIE: <p>123456</p></p>
            </div>
            <p>Ingresa los siguientes datos cuando te los soliciten:</p>
            <div class="d-flex">
                <p class="fw-bold">Referencia: <p>123456</p></p>
            </div>
            <div class="d-flex">
                <p class="fw-bold">Importe:<p>USD 4</p></p>
            </div>
        </div>
        <div class="text-start p-2 border border-2">
            <h5 class="text-primary">Desde cualquier otro banco</h5>
            <p>Ingresa a la sección de transferencias o pagos a otros bancos y proporciona los siguientes datos</p>
            <div class="d-flex">
                <p class="fw-bold">Banco destino: <p>BBVA Bancomer</p></p>
            </div>
            <div class="d-flex">
                <p class="fw-bold">CLABE: <p>454545</p></p>
            </div>
            <div class="d-flex">
                <p class="fw-bold">Concepto de Pago: <p>132456</p></p>
            </div>
            <div class="d-flex">
                <p class="fw-bold">Referencia: <p>123456</p></p>
            </div>
            <div class="d-flex">
                <p class="fw-bold">Importe: <p>USD 4</p></p>
            </div>
        </div>

        <div class="text-start p-2">
            <span>1. Una vez que hayas completado el pago, haz clic en "Continuar" y serás redirigido al panel de control.</span>
            <br>
            <span>2. Tus servicios se activarán una vez que se valide el pago</span>
            <br>
            <span>3. Si tienes alguna pregunta sobre tu pago o necesitas ayuda, visita nuestro centro de ayuda</span>
        </div>
        <br>
        <div class="mb-3">
            <a href="../html/viewuser.php" class='btn btn-outline-primary'>Ir al menú</a>
        </div>
    </div>

    <script src="../bsp/vendor/twbs/bootstrap/dist/js/bootstrap.min.js"></script>
</body>

</html>