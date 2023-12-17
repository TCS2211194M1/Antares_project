<?php
    require_once("../Project_Samava/php/client.lib.php");

    if (isset($_POST["create"])) {
        session_start();
        $client = new Client();
        $consult = $client->addClient($_POST);
        if ($consult == 0) {
            echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                <strong>Error: </strong>No se pudo crear la cuenta
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>";
        } else if ($consult == 1) {
            $_SESSION["account"] = 1;
            $_SESSION["username"] = htmlentities($_POST["username"]);
            $_SESSION["name"] = htmlentities($_POST["name"]);
            $_SESSION["last_name"] = htmlentities($_POST["last_name"]);
            $_SESSION["email"] = htmlentities($_POST["email"]);
            $_SESSION["password"] = htmlentities($_POST["password"]);
            $_SESSION["cellphone"] = htmlentities($_POST["cellphone"]);
            $_SESSION["account"] = 1;

            header("Location: ../Project_Samava/shop/catalog.php");
        }
    }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link rel="icon" href="image/cloud.png">
    <title>Create Account</title>
</head>

<body id="body-account">
    <div class="container w-75 bg-gradient bg-info my-4 rounded-3 shadow">
        <div class="row align-items-stretch">
            <div class="col d-none d-lg-block col-md-5 col-lg-5 col-xl-6 rounded-start" id="container-image">
            </div>
            <div class="col bg-white p-3 rounded-end">
                <div class="text-end">
                    <img src="image/Logo Samava.png" width="100px" class="rounded-3" id="logo-samava">
                </div>

                <h2 class="fw-bold text-center py-3">Bienvenido</h2>
            
                <!-- LOGIN -->
                <form method="POST">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12 mb-4">
                            <label for="name" class="form-label">Nombre</label>
                            <input type="text" class="form-control" name="name" placeholder="Ingresa tu nombre" id="NAME" required>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 mb-4">
                            <label for="last_name" class="form-label">Apellidos</label>
                            <input type="text" class="form-control" name="last_name" placeholder="Ingresa tus Apellidos" id="LAST_NAME" required>
                        </div>
                    </div>
                    <div class="mb-4">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" placeholder="Ingresa tu Email" id="EMAIL" required>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12 mb-4">
                            <label for="username" class="form-label">Nombre de Usuario</label>
                            <input type="text" class="form-control" name="username" placeholder="Ingresa el nombre de usuario" id="USERNAME" required>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 mb-4">
                            <label for="password" class="form-label">Contraseña</label>
                            <input type="password" class="form-control" name="password" placeholder="Ingresa la contraseña" id="PASSWORD" required>
                        </div>
                    </div>
                    <div class="mb-4">
                        <label for="phone" class="form-label">Número de Teléfono</label>
                        <input type="number" class="form-control" name="cellphone" placeholder="Ingresa tu Número de Teléfono" id="CELLPHONE" required>
                    </div>
                    <div class="d-flex justify-content-center">
                        <button class="btn btn-outline-success" name="create">Registrarse</button>
                    </div>
                </form>
                <div class="my-3 text-center">
                    <span>¿Ya tienes cuenta? <a href="login.php">Inicia Sesión</a></span>
                </div>
            </div>
        </div>
    </div>
    
    <script src="js/functions.js"></script>
    
</body>

</html>