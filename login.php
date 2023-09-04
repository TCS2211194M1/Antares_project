<?php

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="js/functions.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <title>Login Samava</title>
</head>

<body>
    <div class="container w-25 p-5 border rounded-4 position-absolute top-50 start-50 translate-middle bg-white shadow-lg mb-5 bg-body rounded">
        <h1 class="mb-5 text-center text-success">Login</h1>

        <i class="bi bi-person-circle d-inline fs-3 me-2"></i>
        <h4 class="h4 d-inline">Username</h4>
        <input type="text" class="form-control mb-3" required>

        <i class="bi bi-key d-inline fs-3 me-2"></i>
        <h4 class="h4 d-inline">Password</h4>
        <input type="text" class="form-control" required>
        <p class="text-end"><a href="" class="text-decoration-none text-danger">Forgot password?</a></p>

        <div class="text-center mt-4">
            <button class="btn btn-outline-success w-50 fw-bold">Sign up</button>
        </div>

        <div class=" bg-secondary bg-opacity-25 mt-4 rounded-4 p-1 text-center">
            <p class="my-2">Don't have an account? <a href="" class="text-decoration-none text-success">Create account</a></p>
        </div>
    </div>
</body>

</html>