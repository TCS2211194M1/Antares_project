<?php
    session_start();

    if (!isset($_SESSION["username"]) || empty($_SESSION["username"])) {
        header("Location: ../login.php");
        exit; // Termina la ejecución del script después de la redirección
    }

    if (isset($_POST["close"])) {
        session_destroy();
        header("Location: ../login.php");
        exit; // Termina la ejecución del script después de la redirección
    } else if (isset($_POST["main"])) {
        header("Location: ../main.php");
        exit; // Termina la ejecución del script después de la redirección
    } else if (isset($_POST["logueo"])) {
        header("Location: ../login.php");
        exit; // Termina la ejecución del script después de la redirección
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web Hosting</title>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"> <!-- Enlace a Font Awesome -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/stylesViewuser.css"> <!-- Enlace estilos vista general -->
    <link rel="stylesheet" href="../css/stylesViewuserContenedor.css"> <!-- Enlace diferentes opciones -->
    <link rel="icon" href="../image/A113.png">
</head>
<body>


<div class="page-wrapper">
    <div class="nav-wrapper">
        <div class="grad-bar"></div>
        <nav class="navbar">
            <span class="web-hosting">WEB HOSTING</span> 
            <div class="menu-toggle" id="mobile-menu">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </div>
            <ul class="nav no-search">
                <li class="nav-item"><a href="../principal.php"><i class="fas fa-home"></i> Home</a></li>
                <li class="nav-item"><a href="../shop/catalog.php"><i class="fas fa-shopping-cart"></i> Tienda</a></li>
                <li class="nav-item"><a href="#" onclick="cargarModulo('dominios', 'list')"><i class="fas fa-globe"></i> Dominios</a></li>
                <li class="nav-item"><a href="#" onclick="cargarModulo('tickets', 'list')"><i class="fas fa-ticket-alt"></i> Tickets</a></li>
                <li class="nav-item"><a href="#" onclick="cargarModulo('usuario', 'details')"><i class="fas fa-user"></i> Usuario</a></li>
            </ul>
        </nav>
    </div>

    <div class="mx-3 p-2 mt-3">
        <div id="container-general"><br>
        <h1 id="hero-message">Haz brillar tus dominios en la nube con nosotros</h1>
            <h1>Bienvenido</h1><br>
            <h1>Para comenzar selecciona una opción</h1>
            
        </div>
    </div>

    <!-- Footer -->
    <div class="bg-dark p-3" id='contacto'>
        <footer class='pt-5'>
            <div class='row text-white'>
                <div class='col-lg-4 col-md-6 col-sm-12 text-center mb-4'>
                    <div>
                        <img src="../image/A113.png" alt="" class='mb-4 rounded-circle' style='max-width: 100px;'>
                        <h5 class='px-5 text-center'>Tecnología Comercial y Servicios Integrales Samava Sas de CV</h5>
                    </div>
                </div>
                
                <div class='col-lg-4 col-md-6 col-sm-12 text-center mb-5'>
                    <div>
                        <h5 class='d-inline'><i class="bi bi-geo-alt fs-3 me-1"></i> Castillo de Chapultepec #61, San Juan del Río, Querétaro, México</h5>
                    </div>
                    <div>
                        <h5 class='d-inline'><i class="bi bi-telephone fs-3 me-1"></i> 4271196134</h5>
                    </div>
                    <div>
                        <h5 class='d-inline text-blue'><i class="bi bi-envelope fs-3 me-1"></i> samavaservicios@gmail.com</h5>
                    </div>
                </div>

                <div class='col-lg-4 col-md-6 col-sm-12 text-right'>
                    <h5>Todos los derechos son reservados</h5>
                    <p class='fs-5'>Copyright © 2023</p>
                </div>
            </div>
        </footer>
    </div>
    <!-- Footer End -->
</div>

    
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="../js/functions.js"></script>
</body>
</html>