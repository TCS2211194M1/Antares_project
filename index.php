<?php

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65' crossorigin='anonymous'>
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css'>
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9' crossorigin='anonymous'>
    <script src="js/functions.js"></script>
    <title>Samava</title>
</head>

<body onload="javascript:cargarInterfaz('client', 'list', null);">
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
                    <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Options</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                        <li class="nav-item">
                            <input type="button" value="Client" class="btn btn-outline-secondary my-3 w-100" onclick="javascript:cargarInterfaz('client', 'add', null);">
                        </li>
                        <li class="nav-item">
                            <input type="button" value="OTHER" class="btn btn-outline-secondary my-3 w-100" onclick="javascript:cargarInterfaz('', '', null);">
                        </li>
                        <li class="nav-item dropdown">
                            <input type="button" value="OTHER" class="btn btn-outline-secondary mb-3 w-100" onclick="javascript:cargarInterfaz('', '', null);">
                        </li>
                        <li class="nav-item dropdown">
                            <input type="button" value="OTHER" class="btn btn-outline-secondary mb-3 w-100" onclick="javascript:cargarInterfaz('', '', null);">
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <br><br><br>
    <div class="container" id="container"></div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>

</body>

</html>