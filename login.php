<?php
    require_once("../Project_Samava/php/login.lib.php");

    if (isset($_POST["login"])) {
        session_start();
        $login = new Login();
        $consult = $login->login($_POST);
        if ($consult == 1) {
            $_SESSION["username"] = htmlentities($_POST["username"]);
            $_SESSION["password"] = htmlentities($_POST["password"]);
            $_SESSION["account"] = 3;

            header("Location: main.php");
        } else if ($consult == 2) {
            $_SESSION["username"] = htmlentities($_POST["username"]);
            $_SESSION["password"] = htmlentities($_POST["password"]);
            $_SESSION["account"] = 2;

            header("Location: ../Project_Samava/shop/catalog.php");
        } else{
            echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                <strong>Error: </strong>Usuario o Contraseña incorrectos
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>";
        }

    }

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="/Project_Samava/js/functions.js"></script>
    <link rel="icon" href="image/cloud.png">
    <title>Login</title>
</head>

<body id="body-login">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-12 mx-auto">
                <div id="container-login">
                    <div class="d-flex justify-content-center mb-3 rounded-5">
                        <img src="image/login2.png" alt="" height="150px">
                    </div>
                    <h2 class="text-center mb-4">Iniciar Sesión</h2>
                    <form method="POST">
                        <div class="mb-3">
                            <label for="username" class="form-label">Nombre de usuario</label>
                            <div class="input-group">
                                <span class="input-group-text shadow" id="username"><i class="bi bi-person-circle"></i></span>
                                <input type="text" class="form-control shadow" id="username" name="username" placeholder="Ingrese su nombre de usuario">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Contraseña</label>
                            <div class="input-group">
                                <span class="input-group-text shadow" id="password"><i class="bi bi-key"></i></span>
                                <input type="password" class="form-control shadow" id="password" name="password" placeholder="Ingrese su contraseña">
                            </div>
                            <label class="form-label d-flex justify-content-end text-danger"><a href="" id="forget_pass">¿Olvidaste tu contraseña?</a></label>
                        </div>
                        <div class="d-flex justify-content-center">
                            <button class="btn btn-outline-primary my-3" name="login">Iniciar Sesión</button>
                        </div>
                    </form>
                    <div class="my-3 text-center">
                        <span>¿No tienes cuenta? <a href="account.php" id="create_account">Crea tu cuenta</a></span>
                    </div>
                </div>
            </div>
        </div>
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
