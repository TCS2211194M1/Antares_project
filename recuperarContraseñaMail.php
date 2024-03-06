<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recuperar Contraseña Email</title> 
    <link rel="icon" href="image/cloud.png"> 
    <link rel="stylesheet" href="css/stylesContraseña.css"> 
</head>
<body>

<div class="container">
    <div class="col-lg-6 login-form">
        <img class="image-logo" src="image/A113.png" />
        <h5>RECUPERAR CONTRASEÑA POR MEDIO DE EMAIL</h5>
        <p>Ingresa tu correo electronico y recibirás un código de verificación para restablecer tu contraseña.
            ¡Gracias por confiar en nosotros!</p>
            <div class="input-form">
                <input class="input" type="email" placeholder="Escribe tu Email" required>
                <span class="focus-border"></span>
            </div>
        <button type="button" class="button">Enviar</button>
        <button type="button" class="button green-button" onclick="window.location.href = 'recuperarContraseña.php';">Regresar</button>
        
    </div>
</div>

</body>
</html>
