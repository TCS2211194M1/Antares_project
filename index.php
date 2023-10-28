<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Project_Samava/bsp/vendor/twbs/bootstrap/dist/css/bootstrap.min.css">
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css'><script src="js/functions.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <link rel="icon" href="image/Logo Samava.png">
    <title>Samava</title>
</head>

<body onload="javascript:cargarInterfaz('product', 'list', null);">
    <nav class="navbar bg-body-tertiary fixed-top">
        <div class="container-fluid">
            <h3 class="navbar-brand"> Antares Project Samava</h3>
            <!--
            <form action="" method="post">
                <input type="submit" name='btn_cerrar' class="btn btn-danger" value='Cerrar Sesión de <#?php echo $_SESSION["usuario"] ?>'>
            </form>
            -->
            <button class=" navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#nav" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="offcanvas offcanvas-end" tabindex="-1" id="nav" aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Options of System</h5>
                    <button type="button" class="btn-close text-end" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav justify-content-end flex-grow-1 pe-3 text-center">
                        <li class="nav-item dropdown text-center mb-3">
                            <a class='nav-link dropdown-toggle text-success' href="#" role='button' data-bs-toggle='dropdown'><i class="bi bi-people me-3"></i>Users</a>
                            <ul class='dropdown-menu text-center border border-0'>
                                <li><button class='btn btn-outline-success mb-3 w-75' onclick="javascript:cargarInterfaz('login', 'list', null);" data-bs-dismiss="offcanvas"><i class="bi bi-person-circle me-2"></i>Login</button></li>
                                <li><button class='btn btn-outline-success mb-3 w-75' onclick="javascript:cargarInterfaz('client', 'list', null);" data-bs-dismiss="offcanvas"><i class="bi bi-person-bounding-box me-2"></i>Client</button></li>
                                <li><button class='btn btn-outline-success mb-3 w-75' onclick="javascript:cargarInterfaz('taxid', 'list', null);" data-bs-dismiss="offcanvas"><i class="bi bi-person-vcard me-2"></i>Taxid</button></li>
                                <li><button class='btn btn-outline-success mb-3 w-75' onclick="javascript:cargarInterfaz('role', 'list', null);" data-bs-dismiss="offcanvas"><i class="bi bi-person-workspace me-2"></i>Role</button></li>
                                <li><button class='btn btn-outline-success mb-3 w-75' onclick="javascript:cargarInterfaz('privilege', 'list', null);" data-bs-dismiss="offcanvas"><i class="bi bi-person-fill-lock me-2"></i>Privilege</button></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown text-center mb-3">
                            <a class='nav-link dropdown-toggle text-danger' href="#" role='button' data-bs-toggle='dropdown'><i class="bi bi-box-seam me-3"></i>Product</a>
                            <ul class='dropdown-menu text-center border border-0'>
                                <li><button class='btn btn-outline-danger mb-3 w-75' onclick="javascript:cargarInterfaz('product', 'list', null);" data-bs-dismiss="offcanvas"><i class="bi bi-cloud-arrow-up me-2"></i>Product</button></li>
                                <li><button class='btn btn-outline-danger mb-3 w-75' onclick="javascript:cargarInterfaz('service', 'list', null);" data-bs-dismiss="offcanvas"><i class="bi bi-device-ssd me-2"></i>Service</button></li>
                                <li><button class='btn btn-outline-danger mb-3 w-75' onclick="javascript:cargarInterfaz('storage', 'list', null);" data-bs-dismiss="offcanvas"><i class="bi bi-sd-card me-2"></i>Storage</button></li>
                                <li><button class='btn btn-outline-danger mb-3 w-75' onclick="javascript:cargarInterfaz('partition', 'list', null);" data-bs-dismiss="offcanvas"><i class="bi bi-layers-half me-2"></i>Partition</button></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown text-center mb-3">
                            <a class='nav-link dropdown-toggle text-secondary' href="#" role='button' data-bs-toggle='dropdown'><i class="bi bi-box-seam me-3"></i>Work Order</a>
                            <ul class='dropdown-menu text-center border border-0'>
                                <li><button class='btn btn-outline-secondary mb-3 w-75' onclick="javascript:cargarInterfaz('workorder', 'list', null);" data-bs-dismiss="offcanvas"><i class="bi bi-cloud-arrow-up me-2"></i>Work Order</button></li>
                                <li><button class='btn btn-outline-secondary mb-3 w-75' onclick="javascript:cargarInterfaz('workorderfalg', 'list', null);" data-bs-dismiss="offcanvas"><i class="bi bi-device-ssd me-2"></i>Work Order Flag</button></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown text-center mb-3">
                            <a class='nav-link dropdown-toggle text-primary' href="#" role='button' data-bs-toggle='dropdown'><i class="bi bi-pin-map me-3"></i>Locations</a>
                            <ul class='dropdown-menu text-center border border-0'>
                                <li><button class='btn btn-outline-primary mb-3 w-75' onclick="javascript:cargarInterfaz('region', 'list', null);" data-bs-dismiss="offcanvas"><i class="bi bi-compass me-2"></i>Region</button></li>
                                <li><button class='btn btn-outline-primary mb-3 w-75' onclick="javascript:cargarInterfaz('subregion', 'list', null);" data-bs-dismiss="offcanvas"><i class="bi bi-globe me-2"></i>Subregion</button></li>
                                <li><button class='btn btn-outline-primary mb-3 w-75' onclick="javascript:cargarInterfaz('country', 'list', null);" data-bs-dismiss="offcanvas"><i class="bi bi-globe-americas me-2"></i>Country</button></li>
                                <li><button class='btn btn-outline-primary mb-3 w-75' onclick="javascript:cargarInterfaz('state', 'list', null);" data-bs-dismiss="offcanvas"><i class="bi bi-map me-2"></i>State</button></li>
                                <li><button class='btn btn-outline-primary mb-3 w-75' onclick="javascript:cargarInterfaz('city', 'list', null);" data-bs-dismiss="offcanvas"><i class="bi bi-mailbox me-2"></i>City</button></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <br><br><br>
    <div class="p-3" id="container"></div>

    <div class="bg-dark p-3">
        <footer class='pt-5'>
            <div class='row text-white'>
                <div class='col-lg-4 col-md-6 col-sm-12 text-center mb-4'>
                    <div>
                        <img src="../Project_samava/image/Logo Samava.png" alt="" class='mb-4 w-75'>
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
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>

</body>

</html>