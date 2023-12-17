<?php
    session_start();

    $username = $_SESSION["username"];
    $account = $_SESSION["account"];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link rel="stylesheet" href="../Project_Samava/bsp/vendor/twbs/bootstrap/dist/css/bootstrap.min.css">
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css'>
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" href="image/cloud.png">
    <title>Admin Samava</title>
</head>

<body id="body-main">
    <nav class="navbar bg-dark" id="nav-bar">
        <div class="container-fluid">
            <a class="navbar-brand text-white">Antares Project</a>
            <div class="d-flex">
                <a href="../Project_Samava/shop/catalog.php" class="btn btn-outline-warning me-2"><i class="bi bi-gear me-2"></i>Vista Cliente</a>
                <a href="login.php" class="btn btn-outline-danger"><i class="bi bi-box-arrow-in-left me-2"></i><?php echo $username ?> Cerrar Sesión</a>
            </div>
        </div>
    </nav>

    <div class="container" id="container">
        <div class="row mt-3">
            <div class="d-flex justify-content-center">
                <h3 class="text-center p-2 rounded-pill shadow" id="row-card">Usuarios</h3>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 mt-3 d-flex justify-content-center">
                <div class="card shadow rounded-4" style="width: 18rem;">
                    <img src="image/login.png" class="card-img-top" id="img-card">
                    <div class="card-body text-center rounded-bottom-4" id="card-body">
                        <h5 class="card-title"><i class="bi bi-person-circle me-2"></i>Login</h5>
                        <a class="btn btn-outline-dark d-flex justify-content-center" onclick="javascript:cargarInterfaz('login', 'list')"><i class="bi bi-card-text me-2"></i>Gestionar</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 mt-3 d-flex justify-content-center">
                <div class="card shadow rounded-4" style="width: 18rem;">
                    <img src="image/client.png" class="card-img-top" id="img-card">
                    <div class="card-body text-center rounded-bottom-4" id="card-body">
                        <h5 class="card-title"><i class="bi bi-person-badge me-2"></i>Cliente</h5>
                        <a class="btn btn-outline-dark d-flex justify-content-center" onclick="javascript:cargarInterfaz('client', 'list')"><i class="bi bi-card-text me-2"></i>Gestionar</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 mt-3 d-flex justify-content-center">
                <div class="card shadow rounded-4" style="width: 18rem;">
                    <img src="image/Taxid.png" class="card-img-top" id="img-card">
                    <div class="card-body text-center rounded-bottom-4" id="card-body">
                        <h5 class="card-title"><i class="bi bi-person-vcard me-2"></i>Taxid</h5>
                        <a class="btn btn-outline-dark d-flex justify-content-center" onclick="javascript:cargarInterfaz('taxid', 'list')"><i class="bi bi-card-text me-2"></i>Gestionar</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 mt-3 d-flex justify-content-center">
                <div class="card shadow rounded-4" style="width: 18rem;">
                    <img src="image/role.png" class="card-img-top" id="img-card">
                    <div class="card-body text-center rounded-bottom-4" id="card-body">
                        <h5 class="card-title"><i class="bi bi-person-lines-fill me-2"></i>Roles</h5>
                        <a class="btn btn-outline-dark d-flex justify-content-center" onclick="javascript:cargarInterfaz('role', 'list')"><i class="bi bi-card-text me-2"></i>Gestionar</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 mt-3 d-flex justify-content-center">
                <div class="card shadow rounded-4" style="width: 18rem;">
                    <img src="image/privilegio.png" class="card-img-top" id="img-card">
                    <div class="card-body text-center rounded-bottom-4" id="card-body">
                        <h5 class="card-title"><i class="bi bi-person-video3 me-2"></i>Privilegios</h5>
                        <a class="btn btn-outline-dark d-flex justify-content-center" onclick="javascript:cargarInterfaz('privilege', 'list')"><i class="bi bi-card-text me-2"></i>Gestionar</a>
                    </div>
                </div>
            </div>
        </div>
        
        <hr class="border border-white border-2 opacity-50 my-5" id="">
        
        <div class="row mt-3">
            <div class="d-flex justify-content-center">
                <h3 class="p-2 text-center rounded-pill shadow" id="row-card">Productos</h3>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 mt-3 d-flex justify-content-center">
                <div class="card shadow rounded-4" style="width: 18rem;">
                    <img src="image/product.png" class="card-img-top" id="img-card">
                    <div class="card-body text-center rounded-bottom-4" id="card-body">
                        <h5 class="card-title"><i class="bi bi-cloud-arrow-up me-2"></i>Productos</h5>
                        <a class="btn btn-outline-dark d-flex justify-content-center" onclick="javascript:cargarInterfaz('product', 'list')"><i class="bi bi-card-text me-2"></i>Gestionar</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 mt-3 d-flex justify-content-center">
                <div class="card shadow rounded-4" style="width: 18rem;">
                    <img src="image/service.png" class="card-img-top" id="img-card">
                    <div class="card-body text-center rounded-bottom-4" id="card-body">
                        <h5 class="card-title"><i class="bi bi-device-ssd me-2"></i>Servicios</h5>
                        <a class="btn btn-outline-dark d-flex justify-content-center" onclick="javascript:cargarInterfaz('service', 'list')"><i class="bi bi-card-text me-2"></i>Gestionar</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 mt-3 d-flex justify-content-center">
                <div class="card shadow rounded-4" style="width: 18rem;">
                    <img src="image/storage.png" class="card-img-top" id="img-card">
                    <div class="card-body text-center rounded-bottom-4" id="card-body">
                        <h5 class="card-title"><i class="bi bi-sd-card me-2"></i>Almacenamiento</h5>
                        <a class="btn btn-outline-dark d-flex justify-content-center" onclick="javascript:cargarInterfaz('storage', 'list')"><i class="bi bi-card-text me-2"></i>Gestionar</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 mt-3 d-flex justify-content-center">
                <div class="card shadow rounded-4" style="width: 18rem;">
                    <img src="image/partition.png" class="card-img-top" id="img-card">
                    <div class="card-body text-center rounded-bottom-4" id="card-body">
                        <h5 class="card-title"><i class="bi bi-layers-half me-2"></i>Particiones</h5>
                        <a class="btn btn-outline-dark d-flex justify-content-center" onclick="javascript:cargarInterfaz('partition', 'list')"><i class="bi bi-card-text me-2"></i>Gestionar</a>
                    </div>
                </div>
            </div>
        </div>
        
        <hr class="border border-white border-2 opacity-50 my-5">

        <div class="row mt-3">
            <div class="d-flex justify-content-center">
                <h3 class="p-2 text-center rounded-pill shadow" id="row-card">Orden de Trabajo</h3>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 mt-3 d-flex justify-content-center">
                <div class="card shadow rounded-4" style="width: 18rem;">
                    <img src="image/workorder.png" class="card-img-top" id="img-card">
                    <div class="card-body text-center rounded-bottom-4" id="card-body">
                        <h5 class="card-title"><i class="bi bi-cloud-arrow-up me-2"></i>Orden de Trabajo</h5>
                        <a class="btn btn-outline-dark d-flex justify-content-center" href="#nav-bar" onclick="javascript:cargarInterfaz('workorder', 'list', null)"><i class="bi bi-card-text me-2"></i>Gestionar</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 mt-3 d-flex justify-content-center">
                <div class="card shadow rounded-4" style="width: 18rem;">
                    <img src="image/workorderflag.png" class="card-img-top" id="img-card">
                    <div class="card-body text-center rounded-bottom-4" id="card-body">
                        <h5 class="card-title"><i class="bi bi-device-ssd me-2"></i>Bandera de Orden de Trabajo</h5>
                        <a class="btn btn-outline-dark d-flex justify-content-center" href="#nav-bar" onclick="javascript:cargarInterfaz('workorder_flag', 'list', null)"><i class="bi bi-card-text me-2"></i>Gestionar</a>
                    </div>
                </div>
            </div>
        </div>
        
        <hr class="border border-white border-2 opacity-50 my-5">

        <div class="row mt-3">
            <div class="d-flex justify-content-center">
                <h3 class="p-2 text-center rounded-pill shadow" id="row-card">Localizaciones</h3>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 mt-3 d-flex justify-content-center">
                <div class="card shadow rounded-4" style="width: 18rem;">
                    <img src="image/region.png" class="card-img-top" id="img-card">
                    <div class="card-body text-center rounded-bottom-4" id="card-body">
                        <h5 class="card-title"><i class="bi bi-compass me-2"></i>Región</h5>
                        <a class="btn btn-outline-dark d-flex justify-content-center" href="#nav-bar" onclick="javascript:cargarInterfaz('region', 'list')"><i class="bi bi-card-text me-2"></i>Gestionar</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 mt-3 d-flex justify-content-center">
                <div class="card shadow rounded-4" style="width: 18rem;">
                    <img src="image/subregiones.png" class="card-img-top" id="img-card">
                    <div class="card-body text-center rounded-bottom-4" id="card-body">
                        <h5 class="card-title"><i class="bi bi-globe me-2"></i>Subregión</h5>
                        <a class="btn btn-outline-dark d-flex justify-content-center" onclick="javascript:cargarInterfaz('subregion', 'list')"><i class="bi bi-card-text me-2"></i>Gestionar</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 mt-3 d-flex justify-content-center">
                <div class="card shadow rounded-4" style="width: 18rem;">
                    <img src="image/pais.png" class="card-img-top" id="img-card">
                    <div class="card-body text-center rounded-bottom-4" id="card-body">
                        <h5 class="card-title"><i class="bi bi-globe-americas me-2"></i>País</h5>
                        <a class="btn btn-outline-dark d-flex justify-content-center" onclick="javascript:cargarInterfaz('country', 'list')"><i class="bi bi-card-text me-2"></i>Gestionar</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 mt-3 d-flex justify-content-center">
                <div class="card shadow rounded-4" style="width: 18rem;">
                    <img src="image/estados.png" class="card-img-top" id="img-card">
                    <div class="card-body text-center rounded-bottom-4" id="card-body">
                        <h5 class="card-title"><i class="bi bi-map me-2"></i>Estado</h5>
                        <a class="btn btn-outline-dark d-flex justify-content-center" onclick="javascript:cargarInterfaz('state', 'list')"><i class="bi bi-card-text me-2"></i>Gestionar</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 mt-3 d-flex justify-content-center">
                <div class="card shadow rounded-4" style="width: 18rem;">
                    <img src="image/ciudad.png" class="card-img-top" id="img-card">
                    <div class="card-body text-center rounded-bottom-4" id="card-body">
                        <h5 class="card-title"><i class="bi bi-mailbox me-2"></i>Ciudad</h5>
                        <a class="btn btn-outline-dark d-flex justify-content-center" onclick="javascript:cargarInterfaz('city', 'list')"><i class="bi bi-card-text me-2"></i>Gestionar</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 mt-3 d-flex justify-content-center">
                <div class="card shadow rounded-4" style="width: 18rem;">
                    <img src="image/cp.png" class="card-img-top" id="img-card">
                    <div class="card-body text-center rounded-bottom-4" id="card-body">
                        <h5 class="card-title"><i class="bi bi-mailbox-flag me-2"></i>Código Postal</h5>
                        <a class="btn btn-outline-dark d-flex justify-content-center" onclick="javascript:cargarInterfaz('city', 'list')"><i class="bi bi-card-text me-2"></i>Gestionar</a>
                    </div>
                </div>
            </div>
        </div>
        
        <hr class="border border-white border-2 opacity-50 my-5">

        <div class="d-flex justify-content-center mb-3">
            <h3 class="p-2 text-center rounded-pill shadow p-1" id="row-card">Tablas Secundarias</h3>
        </div>

        <div class="table-responsive">
            <table class="table">
                <tr>
                    <td>
                        <a class="btn btn-outline-dark btn-lg rounded-3 shadow" href="#nav-bar" onclick="javascript:cargarInterfaz('pais', 'list')"><i class="bi bi-flag-fill me-2"></i>Pais</a>
                    </td>
                    <td>
                        <a class="btn btn-outline-dark btn-lg rounded-3 shadow" href="#nav-bar" onclick="javascript:cargarInterfaz('estado', 'list')"><i class="bi bi-buildings-fill me-2"></i>Estado</a>
                    </td>
                    <td>
                        <a class="btn btn-outline-dark btn-lg rounded-3 shadow-lg" href="#nav-bar" onclick="javascript:cargarInterfaz('municipio', 'list')"><i class="bi bi-building me-2"></i>Municipio</a>
                    </td>
                    <td>
                        <a class="btn btn-outline-dark btn-lg rounded-3 shadow" href="#nav-bar" onclick="javascript:cargarInterfaz('localidad', 'list')"><i class="bi bi-geo-alt-fill me-2"></i>Localidad</a>
                    </td>
                    <td>
                        <a class="btn btn-outline-dark btn-lg rounded-3 shadow-lg" href="#nav-bar" onclick="javascript:cargarInterfaz('colonia', 'list')"><i class="bi bi-house-door me-2"></i>Colonia</a>
                    </td>
                </tr>
                <tr>
                    <td>
                        <a class="btn btn-outline-dark btn-lg rounded-3 shadow-lg" href="#nav-bar" onclick="javascript:cargarInterfaz('meses', 'list')"><i class="bi bi-calendar-month me-2"></i>Meses</a>
                    </td>
                    <td>
                        <a class="btn btn-outline-dark btn-lg rounded-3 shadow" href="#nav-bar" onclick="javascript:cargarInterfaz('moneda', 'list')"><i class="bi bi-currency-exchange me-2"></i>Moneda</a>
                    </td>
                    <td>
                        <a class="btn btn-outline-dark btn-lg rounded-3 shadow" href="#nav-bar" onclick="javascript:cargarInterfaz('metodopago', 'list')"><i class="bi bi-credit-card-2-front me-2"></i>Metodo de Pago</a>
                    </td>
                    <td>
                        <a class="btn btn-outline-dark btn-lg rounded-3 shadow-lg" href="#nav-bar" onclick="javascript:cargarInterfaz('formapago', 'list')"><i class="bi bi-credit-card-fill me-2"></i>Forma de Pago</a>
                    </td>
                    <td>
                        <a class="btn btn-outline-dark btn-lg rounded-3 shadow" href="#nav-bar" onclick="javascript:cargarInterfaz('impuesto', 'list')"><i class="bi bi-file-earmark-binary-fill me-2"></i>Impuesto</a>
                    </td>
                </tr>
                <tr>
                    <td>
                        <a class="btn btn-outline-dark btn-lg rounded-3 shadow-lg" href="#nav-bar" onclick="javascript:cargarInterfaz('objetoimp', 'list')"><i class="bi bi-motherboard-fill me-2"></i>Objeto Impuesto</a>
                    </td>
                    <td>
                        <a class="btn btn-outline-dark btn-lg rounded-3 shadow-lg" href="#nav-bar" onclick="javascript:cargarInterfaz('exportacion', 'list')"><i class="bi bi-box-arrow-up-left me-2"></i>Exportación</a>
                    </td>
                    <td>
                        <a class="btn btn-outline-dark btn-lg rounded-3 shadow" href="#nav-bar" onclick="javascript:cargarInterfaz('tiporelacion', 'list')"><i class="bi bi-flag-fill me-2"></i>Tipo de Relación</a>
                    </td>
                    <td>
                        <a class="btn btn-outline-dark btn-lg rounded-3 shadow" href="#nav-bar" onclick="javascript:cargarInterfaz('tipofactor', 'list')"><i class="bi bi-asterisk me-2"></i>Tipo Factor</a>
                    </td>
                    <td>
                        <a class="btn btn-outline-dark btn-lg rounded-3 shadow-lg" href="#nav-bar" onclick="javascript:cargarInterfaz('tipodecomprobante', 'list')"><i class="bi bi-newspaper me-2"></i>Tipo de Comprobante</a>
                    </td>
                </tr>
                <tr>
                    <td>
                        <a class="btn btn-outline-dark btn-lg rounded-3 shadow" href="#nav-bar" onclick="javascript:cargarInterfaz('regimenfiscal', 'list')"><i class="bi bi-geo-alt-fill me-2"></i>Régimen Fiscal</a>
                    </td>
                    <td colspan="2">
                        <a class="btn btn-outline-dark btn-lg rounded-3 shadow" href="#nav-bar" onclick="javascript:cargarInterfaz('claveprodserv', 'list')"><i class="bi bi-flag-fill me-2"></i>Clave Producto Servicio</a>
                    </td>
                    <td>
                        <a class="btn btn-outline-dark btn-lg rounded-3 shadow" href="#nav-bar" onclick="javascript:cargarInterfaz('claveunidad', 'list')"><i class="bi bi-buildings-fill me-2"></i>Clave Unidad</a>
                    </td>
                    <td>
                        <a class="btn btn-outline-dark btn-lg rounded-3 shadow" href="#nav-bar" onclick="javascript:cargarInterfaz('periodicidad', 'list')"><i class="bi bi-clock-fill me-2"></i>Periodicidad</a>
                    </td>
                </tr>
            </table>
        </div>

        <br>
    </div>

    <footer class='bg-dark p-3 align-items-end'>
        <div class='row text-white pt-4'>
            <div class='col-lg-4 col-md-6 col-sm-12 text-center mb-4'>
                <div>
                    <img src="../Project_samava/image/Logo Samava.png" class='mb-4 w-50 rounded-4'>
                    <h5 class=' px-5 text-center'>Tecnología Comercial y Servicios Integrales Samava Sas de CV</h5>
                </div>
            </div>
            <div class='col-lg-4 col-md-6 col-sm-12 text-center mb-5'>
                <div>
                    <i class="bi bi-geo-alt fs-3 me-3"></i>
                    <h5 class='d-inline'>Castiilo de Chapultepec #61, San Juan del Río, Querétaro, México</h5>
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

    <script src="js/functions.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>

</body>

</html>