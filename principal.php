<?php
session_start();

if ($_SESSION["username"] == '' || $_SESSION == null) {
    header("Location: ../Antares_project/login.php");
    exit; // Termina la ejecución del script después de la redirección
} else {
    $username = $_SESSION["username"];
    $account = $_SESSION["account"];
}

if (isset($_POST["close"])) {
    session_destroy();
    header("Location: ../Antares_project/login.php");
    exit; // Termina la ejecución del script después de la redirección
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/stylesPrincipal.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
    <link rel="icon" href="image/A113.png">
    <title>Samava</title>
</head>
<body>
    <header>
        <div class="banner">¡Aprovecha nuestros excelentes precios y disfruta de grandes ahorros!</div>
        <nav>
            <div id="logo">
                Tecnología Comercial y Servicios <br> Integrales Samava SAS de CV
            </div>
            <ul class="navigation-menu">
                <li><a href="principal.php">Home</a></li>
                <li><a href="../Antares_project/shop/catalog.php">Catálogo</a></li>
                <li><a href="#contacto">Contacto</a></li>
                <li><a href="../Antares_project/html/viewuserN.php">Usuario</a></li>
                <li>
                    <form method="POST" class='d-flex'>
                        <button type="submit" name="close" class="nav-link text-danger">Cerrar Sesión</button>
                    </form>
                </li>
            </ul>
        </nav>
    </header>

    <section class="hero" id="hero-section">
        <h1 id="hero-message">Haz brillar tus dominios en la nube con nosotros</h1>
        <div class="btn-group">
            <a href="../Antares_project/shop/catalog.php" style="text-decoration: none;">
                <button class="btn-filled-dark">
                    <span class="material-icons-outlined">shopping_cart</span>Explora Todos los Productos
                </button>
            </a>
            <a href="#locate" style="text-decoration: none;">
                <button class="btn-outline-dark btn-hover-color">
                    <span class="material-icons-outlined">info</span> Conócenos
                </button>
            </a>
        </div>
    </section>

    <section>
        <h2>Explora nuestros dominios Estándar y Premium</h2>
        <ul class="services">
            <li class="card-large card-dark card-wide" id="serv-groom">
                <div class="card-image"><img src="https://cdn-icons-png.flaticon.com/512/3470/3470445.png"></div>
                <ul>
                    <li>Gigabyte: WP01GB01 <span class="subtitle"> Web Hosting, 1 HOSTED_DOMAINS, 5 GB HDD_SPACE, Mensual</span></li>
                    <li><a href="#">Precio:</a><span>$16.95 MXN</span></li>
                    <li><a href="#">Periocidad:</a><span>Mensual</span></li>
                    <li><a href="#">Hosted Domains:</a><span>1</span></li>
                    <button class="btn-filled-dark"><span class="material-icons-outlined">attach_money</span> Comprar</button>
                </ul>
            </li>
            <li class="card-large card-dark card-wide" id="serv-board">
                <div class="card-image"><img src="https://cdn-icons-png.flaticon.com/512/2345/2345350.png"></div>
                <ul>
                    <li>Gigabyte: WP20GB12<span class="subtitle">Web Hosting, 1 HOSTED_DOMAINS, 15 GB HDD_SPACE, Annual</span></li>
                    <li><a href="#">Precio:</a><span>$711.77 MXN</span></li>
                    <li><a href="#">Periocidad:</a><span>Anual</span></li>
                    <li><a href="#">Hosted Domains:</a><span>1</span></li>
                    <button class="btn-filled-dark"><span class="material-icons-outlined">attach_money</span> Comprar</button>
                </ul>
            </li>
        </ul>
    </section>

    <section id="locate">
        <div>
            <h2>Domina tu éxito en línea</h2>
            <p>Aprovecha al máximo tu presencia en línea: Con nuestros dominios, accede a una plataforma confiable y segura para potenciar tu negocio en la web con la mejor tecnología y soporte.</p>
            <div class="btn-group">
                <button class="btn-filled-dark"><span class="material-icons-outlined">view_module</span> Explora el catálogo</button>
                <button class="btn-outline-dark btn-hover-color"><span class="material-icons-outlined">info</span> Descubre más</button>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <div class="bg-dark p-3" id='contacto'>
        <footer class='pt-5'>
            <div class='row text-white'>
                <div class='col-lg-4 col-md-6 col-sm-12 text-center mb-4'>
                    <div>
                        <img src="image/A113.png" alt="" class='mb-4 rounded-circle' style='max-width: 100px;'>
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
    <!-- Fin del Footer -->

    <!-- Scripts al final del cuerpo -->
    <script src="js/carrusel.js"></script>
</body>
</html>