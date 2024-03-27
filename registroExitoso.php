<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro Exitoso</title> 
    <link rel="icon" href="image/cloud.png"> 
    <link rel="stylesheet" href="css/estilos_registroExitoso.css"> 
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col">
                <h2 class="text-success">REGISTRO EXITOSO, TU USUARIO ES:</h2>
                <?php
                    session_start(); // Inicia la sesión
                    if(isset($_SESSION['name'])){ // Verifica si existe una variable de sesión llamada 'name'
                        // Imprimir el nombre del usuario con el efecto de letra
                        echo '
                        <svg>
                            <symbol id="text">
                                <text text-anchor="middle" x="50%" y="50%">' . $_SESSION['name'] . '</text>
                            </symbol>
                            <use xlink:href="#text"></use>
                        </svg>';
                    }
                ?>
                <button onclick="window.location.href='login.php'" class="button">REGRESAR</button> 
            </div>
        </div>
    </div>
</body>
</html>