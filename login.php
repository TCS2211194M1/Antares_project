<?php

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
    <title>Login Samava</title>
</head>

<body id="body-login">
    <div class="container w-25 p-5 border rounded-4 position-absolute top-50 start-50 translate-middle bg-white shadow-lg mb-5 bg-body rounded" id="container-login">
        <h1 class="mb-5 text-center text-primary">Login</h1>

        <form action="" id='form-login'>
            <i class="bi bi-person-circle d-inline fs-3 me-2"></i>
            <h4 class="h4 d-inline">Nombre de Usuario</h4>
            <input type="text" class="form-control shadow mb-3" id='USERNAME' required>

            <i class="bi bi-key d-inline fs-3 me-2"></i>
            <h4 class="h4 d-inline">Contraseña</h4>
            <input type="password" class="form-control shadow" id='PASSWORD' required>

            <p class="text-end"><a href="" class="text-decoration-none text-danger">¿Olvidaste tu contraseña?</a></p>

            <div class="text-center mt-4">
                <button class="btn btn-outline-primary w-50 fw-bold shadow" onclick="javascript:login();">Ingresar</button>
            </div>

            <div class=" bg-secondary bg-opacity-25 mt-4 rounded-4 p-2 shadow text-center">
                <p class="my-2">¿No tienes cuenta? <a href="" class="text-decoration-none text-primary">Crear cuenta</a></p>
            </div>
        </form>
    </div>
    
    <script src="js/functions.js"></script>
</body>

</html>