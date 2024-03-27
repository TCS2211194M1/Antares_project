<?php
    session_start();
    error_reporting(0);
    $login = $_SESSION["account"];

    // Inicializar las variables
    $username = "";
    $name = "";
    $last_name = "";
    $email = "";
    $cellphone = "";

    if ($login == null || $login == '') {
        session_destroy();
    } else {
        if ($_SESSION["account"] == 1) {
            require_once("php/client.lib.php"); // Incluye el archivo que contiene la definición de la clase Client
            $username = $_SESSION["username"];
            $client = new Client();
            $result = $client->consultByUsername($username);
            if ($result->num_rows > 0) {
                $userData = $result->fetch_assoc();
                $name = $userData["name"];
                $last_name = $userData["last_name"];
                $email = $userData["email"];
                $password = $userData["password"];
                $cellphone = $userData["cellphone"];
            }
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
    } else if (isset($_POST["update"])) {
        // Aquí deberías realizar las operaciones necesarias para actualizar los datos en la base de datos
        
        // Redirigir a otra página después de actualizar los datos
        header("Location: ../Antares_project/shop/catalog.php");
        exit(); // Asegurarse de que el script se detenga después de la redirección
    }
?>




<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver y Editar Mis Datos</title>
    <link rel="stylesheet" href="CSS/estilo_perfilusr.css">
    <style>
        /* Estilo adicional para la disposición */
        .container {
            display: flex;
            justify-content: space-between;
        }
        .data-section {
            width: 35%;
            height: 39%;
            padding: 10px; /* Reducir el espacio de relleno */
            border: 12px solid #ccc; /* Aumentar el grosor del borde */
            border-radius: 10px; /* Redondear los bordes */
            text-align: center; /* Alinear los datos a la derecha */
            font-family: Arial, sans-serif; /* Cambiar el estilo de la fuente */
        }
        .form-section {
            width: 55%;
        }
    </style>
</head>

<body>
    <h1>Mis Datos</h1>
    <div class="container">
        <div class="data-section">
            <h2>Datos Actuales</h2>
            <p><strong>Nombre de Usuario:</strong> <?php echo $username; ?></p>
            <p><strong>Nombre:</strong> <?php echo $name; ?></p>
            <p><strong>Apellidos:</strong> <?php echo $last_name; ?></p>
            <p><strong>Correo Electrónico:</strong> <?php echo $email; ?></p>
            <p><strong>Número de Teléfono:</strong> <?php echo $cellphone; ?></p>
            <!-- Puedes ocultar la contraseña aquí si lo deseas -->
        </div>
        <div class="form-section">
  
    <form id="userDataForm" method="post">
        
        <!-- Aquí va el formulario de edición -->
        <label for="name">Nombre:</label><br>
        <input type="text" id="name" name="name" class="input" value="<?php echo isset($_POST['name']) ? $_POST['name'] : ''; ?>"><br>

        <label for="lastname">Apellidos:</label><br>
        <input type="text" id="lastname" name="lastname" class="input" value="<?php echo isset($_POST['lastname']) ? $_POST['lastname'] : ''; ?>"><br>

        <label for="email">Correo Electrónico:</label><br>
        <input type="email" id="email" name="email" class="input" value="<?php echo isset($_POST['email']) ? $_POST['email'] : ''; ?>"><br>

        <label for="phone">Número de Teléfono:</label><br>
        <input type="tel" id="phone" name="phone" class="input"  value="<?php echo isset($_POST['phone']) ? $_POST['phone'] : ''; ?>"><br>

        <label for="password">Contraseña:</label><br>
        <input type="password" id="password" name="password" class="input" value="<?php echo isset($_POST['password']) ? $_POST['password'] : ''; ?>"><br>
        
        <label for="confirmPassword">Confirmar Contraseña:</label><br>
        <input type="password" id="confirmPassword" class="input"  name="confirmPassword"><br>

        <!-- Checkbox para mostrar/ocultar la contraseña -->
        <input type="checkbox" id="verPassword" class="switch">
        <label for="verPassword">Mostrar Contraseña</label><br>

        <input type="submit" name="update" value="Actualizar">
    </form>
</div>

    <script>
        // Mostrar u ocultar la contraseña
        document.getElementById("verPassword").addEventListener("change", function() {
            var passwordField = document.getElementById("password");
            var confirmPasswordField = document.getElementById("confirmPassword");
            if (this.checked) {
                passwordField.type = "text";
                confirmPasswordField.type = "text";
            } else {
                passwordField.type = "password";
                confirmPasswordField.type = "password";
            }
        });
    </script>
</body>
</html>



