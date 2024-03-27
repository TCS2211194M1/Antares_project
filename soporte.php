<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Formulario de Retroalimentación</title>
  <style>
    body {
      background: #3399ff; /* Cambio de gradiente a color sólido */
      margin: 0;
      padding: 0;
      font-family: Arial, sans-serif;
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
    }

    .container {
      max-width: 800px;
      width: 100%;
      padding: 20px;
      background-color: #fff;
      border-radius: 20px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .form-group {
      margin-bottom: 20px;
    }

    label {
      font-size: 16px;
      font-weight: bold;
    }

    input[type="text"],
    input[type="email"],
    textarea {
      width: 100%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 5px;
      font-size: 16px;
    }

    textarea {
      height: 150px; /* Aumento de la altura del textarea */
    }

    button {
      background-color: #007bff;
      color: #fff;
      border: none;
      border-radius: 5px;
      padding: 10px 20px;
      font-size: 16px;
      cursor: pointer;
      transition: background-color 0.3s; /* Añadido de transición */
    }

    button:hover {
      background-color: #0056b3;
    }

    .logo {
      margin-bottom: 20px;
      max-width: 200px;
      height: auto;
      display: block;
      margin-left: auto;
      margin-right: auto;
    }

    .max-w-sm {
      max-width: 600px; /* Ajuste de ancho máximo */
      margin: 0 auto;
    }
    
    h2 {
      color: #007bff; /* Cambio de color del título */
    }

    p {
      color: #333; /* Cambio de color del texto */
    }
  </style>
</head>
<body>

<div class="container">
  <img src="image/A113.png" alt="Logo de la empresa" class="logo">
  <div class="flex flex-col items-center justify-center space-y-4 text-center">
    <div class="space-y-2">
      <h2 class="text-3xl font-bold">¿Cómo podemos ayudarte?</h2>
      <p class="text-gray-500 dark:text-gray-400">
        Nos encantaría escuchar tu retroalimentación. Completa el formulario a continuación para ponerte en contacto con nuestro equipo de soporte.
      </p>
    </div>
    <div class="w-full max-w-sm space-y-4">
      <form action="submit_feedback.php" method="post">
        <div class="form-group">
          <label for="name">Nombre</label>
          <input id="name" name="name" type="text" placeholder="Ingresa tu nombre" required>
        </div>
        <div class="form-group">
          <label for="email">Correo Electrónico</label>
          <input id="email" name="email" type="email" placeholder="Ingresa tu correo electrónico" required>
        </div>
        <div class="form-group">
          <label for="feedback">Retroalimentación</label>
          <textarea id="feedback" name="feedback" placeholder="Ingresa tu retroalimentación" required></textarea>
        </div>
        <button type="submit">Enviar retroalimentación</button>
      </form>
    </div>
  </div>
</div>

</body>
</html>




