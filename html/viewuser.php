<?php
    session_start();
    error_reporting(0);
    $login = $_SESSION["account"];
    

    if (isset($_POST["close"])) {
        session_destroy();
        header("Location: ../login.php");
    } else if (isset($_POST["main"])) {
        header("Location: ../main.php");
    } else if (isset($_POST["logueo"])) {
        header("Location: ../login.php");
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>  
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link rel="stylesheet" href="/Project_Samava/bsp/vendor/twbs/bootstrap/dist/css/bootstrap.min.css">
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css'>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="icon" href="../image/A113.png">
    <title>Web Hosting</title>
</head>

<body id="body-user" onload="cargarModulo('dominios', 'list');">

   <!-- MENU -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <!-- NAV CONTAINER -->
        <div class="container-fluid">
            <a href="" class="navbar-brand text-info fw-semibold">Web Hosting</a>
        
        <!-- BUTTON OF ICON -->
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#menuLateral">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- OFF CANVAS MAIN CONTAINER -->
        <section class="offcanvas offcanvas-start bg-black" id="menuLateral">
            <div class="offcanvas-header" data-bs-theme="dark">
                <h5 class="offcanvas-title text-info">Samava</h5>
                <button class="btn-close" type="button" aria-label="Close" data-bs-dismiss="offcanvas"></button>
            </div>
            <div class="offcanvas-body d-flex flex-column justify-content-between px-0">
                <ul class="navbar-nav fs-5 justify-content-evenly">
                    <li class="nav-item p-3 py-md-1"><a href="../shop/catalog.php" class="nav-link btn"><i class="bi bi-house me-2"></i>Tienda</a></li>
                    <li class="nav-item p-3 py-md-1"><a href="#domains" data-bs-dismiss="offcanvas" class="nav-link btn" onclick="javascript:cargarModulo('dominios', 'list');"><i class="bi bi-globe me-2"></i>Dominios</a></li>
                    <li class="nav-item p-3 py-md-1"><a href="#tickets" data-bs-dismiss="offcanvas" class="nav-link btn" onclick="javascript:cargarModulo('tickets', 'list');"><i class="bi bi-info-circle-fill me-2"></i>Tickets</a></li>
                    <li class="nav-item p-3 py-md-1"><a href="#usuario" data-bs-dismiss="offcanvas" class="nav-link btn" onclick="javascript:cargarModulo('usuario', 'details');"><i class="bi bi-person-vcard me-2"></i>Usuario</a></li>
                </ul>
            </div>
        </section>

        <!-- OFF CANVAS MAIN CONTAINER END-->

        </div>
    </nav> 

    <div class="mx-3 p-2 mt-3">
        <div id="container-general"></div>
    </div>

    <br>

    <div class="bg-dark p-3" id='contacto'>
        <footer class='pt-5'>
            <div class='row text-white'>
                <div class='col-lg-4 col-md-6 col-sm-12 text-center mb-4'>
                    <div>
                        <img src="../image/A113.png" alt="" class='mb-4 rounded w-25'>
                        <h5 class=' px-5 text-center'>Tecnología Comercial y Servicios Integrales Samava Sas de CV</h5>
                    </div>
                </div>
                <div class='col-lg-4 col-md-6 col-sm-12 text-center mb-5'>
                    <div>
                        <i class="bi bi-geo-alt fs-3 me-3"></i>
                        <h5 class='d-inline'>Castillo de Chapultepec #61, San Juan del Río, Querétaro, México</h5>
                    </div>
                    <div>
                        <i class="bi bi-telephone fs-3 me-3"></i>
                        <h5 class='d-inline'>4271196134</h5>
                    </div>
                    <div>
                        <i class="bi bi-envelope fs-3 me-3"></i>
                        <h5 class='d-inline text-info'>samavaservicios@gmail.com</h5>
                    </div>
                </div>
                <div class='col-lg-4 col-md-6 col-sm-12 text-center'>
                    <h5>Todos los derechos son reservados</h5>
                    <p class='fs-5'>Copyright © 2023</p>
                </div>
            </div>
        </footer>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="../js/functions.js"></script>
</body>

</html>