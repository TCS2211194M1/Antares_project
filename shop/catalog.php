<?php
    session_start();
    error_reporting(0);
    $login = $_SESSION["account"];

    if ($login==null || $login=='') {
        session_destroy();
    } else{
        if ($_SESSION["account"] == 1) {
            $username = $_SESSION["username"];
            $name = $_SESSION["name"];
            $last_name = $_SESSION["last_name"];
            $email = $_SESSION["email"];
            $password = $_SESSION["password"];
            $cellphone = $_SESSION["cellphone"];
        } else if ($_SESSION["account"] != 1) {
            $username = $_SESSION["username"];
            $new = 1;
        }
    }

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
    <link rel="stylesheet" href="../bsp/vendor/twbs/bootstrap/dist/css/bootstrap.min.css">
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css'>
    <script src="../js/functions.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js" integrity="sha512-GsLlZN/3F2ErC5ifS5QtgpiJtWd43JWSuIgh7mbzZ8zBps+dvLusV+eNQATqgA/HdeKFVgA5v3S/cIrLF7QnIg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <link rel="icon" href="../image/cloudshop.png">
    <link rel="stylesheet" href="../css/style.css">
    <title>Samava Tienda</title>
</head>

<body onload="javascript:cargarCatalog('list', 1);">
    <header data-bs-theme="dark" id='header'>
        <nav class="navbar navbar-expand-lg bg-body-tertiary" id='menu_nav'>
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Shop Samava</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navBarItems" aria-controls="navBarItems" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navBarItems">
                    <div class="navbar-nav text-center">
                        <a href="../shop/catalog.php" class="nav-link active" aria-current="page" >Catálogo</a>
                        <a href="#contacto" class="nav-link" >Contacto</a>
                        <a href="../html/viewuser.php" class="nav-link">Usuario</a>
                        <form method="POST">
                            <?php  if ($login==null || $login=='') {
                                echo "<button name='logueo' class='nav-link text-success'>Iniciar Sesión</button>";
                            } else if ($login==3){
                                echo "<button name='main' class='nav-link'>Main</button>";
                                echo "<button name='close' class='nav-link text-danger' id='btn-sesion'><i class='bi bi-box-arrow-in-left'></i>Cerrar Sesión</button>";
                            } else if ($login == 1 || $login == 2 || $login == 3) {
                               echo "<button name='close' class='nav-link text-danger' id='btn-sesion'><i class='bi bi-box-arrow-in-left'></i>Cerrar Sesión</button>";
                            }?>
                            
                        </form>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <main>
        <input type="hidden" id='USERNAME' value='<?php echo $username ?>'>
        <div class='container' id='container'></div>    
    </main>

    <div class="bg-dark p-3" id='contacto'>
        <footer class='pt-5'>
            <div class='row text-white'>
                <div class='col-lg-4 col-md-6 col-sm-12 text-center mb-4'>
                    <div>
                        <img src="../image/Logo Samava.png" alt="" class='mb-4 w-75'>
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
                        <h5 class='d-inline'>4465465465</h5>
                    </div>
                    <div>
                        <i class="bi bi-envelope fs-3 me-3"></i>
                        <h5 class='d-inline text-info'>samava@creativeering.com</h5>
                    </div>
                </div>
                <div class='col-lg-4 col-md-6 col-sm-12 text-center'>
                    <h5>Todos los derechos son reservados</h5>
                </div>
            </div>
        </footer>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
</body>

</html>