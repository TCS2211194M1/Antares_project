<?php
require_once("../Antares_project/php/client.lib.php");

// Obtener la lista de países de la base de datos
function getCountries() {
    $connection = new Connection();
    $connection->open();

    $query = "SELECT * FROM t_country";
    $result = $connection->execute($query);

    $countries = array();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $countries[] = $row;
        }
    }

    return $countries;
}

// Definir la variable $countries
$countries = getCountries();

if (isset($_POST["create"])) {
    session_start();
    $client = new Client();

    // Obtener el nombre del país seleccionado
    $selectedCountryName = $_POST["t_pais"];
    $selectedCountryCode = "";

    // Buscar el código del país correspondiente al nombre seleccionado
    foreach ($countries as $country) {
        if ($country['NAME'] === $selectedCountryName) {
            $selectedCountryCode = $country['T_COUNTRY']; // Ajusta el nombre de la columna según tu base de datos
            break;
        }
    }

    // Agregar el campo de país al array $_POST
    $_POST["t_pais"] = $selectedCountryCode;
    // Asignar el código del país a la columna c_pais
    $_POST["c_pais"] = $selectedCountryCode;

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

       // header("Location: ../Antares_project/shop/catalog.php");
        // Redirigir al usuario a la página de registro exitoso
        header("Location: registroExitoso.php");
        exit(); // Asegurar que el script se detenga después de la redirección
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
    <link rel="stylesheet" href="css/stylesAccount.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link rel="icon" href="image/cloud.png">
    <title>Create Account</title>
</head>

<body id="body-account">
    <div class="container w-75 bg-gradient bg-info my-4 rounded-3 shadow">
        <div class="row align-items-stretch">
            <div class="col d-none d-lg-block col-md-5 col-lg-5 col-xl-6 rounded-start" id="container-image">
                <img src="image/nube4.jpg" width="100%" height="100%" >
            </div>
            <div class="col bg-white p-3 rounded-end">
                <div class="text-end">
                    <img src="image/A113.png" width="90px" class="rounded-3" id="logo-samava">
                </div>

                <h2 class="fw-bold text-center py-3">Bienvenido</h2>
            
                <!-- LOGIN -->
                <form method="POST" onsubmit="return validatePasswords()">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12 mb-4">
                            <label for="name" class="form-label">Nombre</label>
                            <input type="text" class="form-control" name="name" placeholder="Ingresa tu nombre" id="NAME" required oninput="convertirAMayusculas(this)">
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 mb-4">
                            <label for="last_name" class="form-label">Apellidos</label>
                            <input type="text" class="form-control" name="last_name" placeholder="Ingresa tus Apellidos" id="LAST_NAME" required oninput="convertirAMayusculas(this)">
                        </div>
                    </div>
                    <div class="mb-4">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" placeholder="Ingresa tu Email" id="EMAIL" required>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12 mb-4">
                            <label for="password" class="form-label">Contraseña</label>
                            <input type="password" class="form-control" name="password" placeholder="Ingresa la contraseña" id="PASSWORD" required>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 mb-4">
                            <label for="confirm_password" class="form-label">Confirmar Contraseña</label>
                            <input type="password" class="form-control" name="confirm_password" placeholder="Confirma la contraseña" id="CONFIRM_PASSWORD" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12 mb-4">
                            <label for="username" class="form-label">Nombre de Usuario</label>
                            <input type="text" class="form-control" name="username" placeholder="Ingresa el nombre de usuario" id="USERNAME" required>
                        </div>
                    </div>
                    
                    <div class="mb-4">
                        <label for="phone" class="form-label">Número de Teléfono</label>
                        <input type="text" class="form-control" name="cellphone" placeholder="Ingresa tu Número de Teléfono (solo 10 números)" id="CELLPHONE" required oninput="validarTelefono(this)">
                    </div>
                  
                    
                    <div class="mb-4">
                        <label for="country" class="form-label">País</label>
                        <select class="form-select" name="t_pais" id="t_pais">
                            <option value="" selected>Selecciona tu país</option>
                            <?php
                            foreach ($countries as $country) {
                                echo "<option value='" . $country['NAME'] . "'>" . $country['NAME'] . "</option>";
                            }
                            ?>
                        </select>
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
    <script>
        
        function convertirAMayusculas(elemento) {
            elemento.value = elemento.value.toUpperCase();
        }

        function validarTelefono(elemento) {
            // Remover caracteres no numéricos del valor del input
            let telefono = elemento.value.replace(/\D/g, '');

            // Limitar la longitud del número de teléfono a 10 dígitos
            telefono = telefono.slice(0, 10);

            // Actualizar el valor del input con el número de teléfono validado
            elemento.value = telefono;
        }

        function validatePasswords() {
            var password = document.getElementById("PASSWORD").value;
            var confirm_password = document.getElementById("CONFIRM_PASSWORD").value;

            if (password != confirm_password) {
                alert("¡Las contraseñas no coinciden, vuelve a intentarlo!");
                return false;
            }

            return true;
        }
    </script>
</body>

</html>
