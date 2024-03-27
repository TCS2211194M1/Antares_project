<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar mis datos</title>

    <style>
        .bg-blue-500 {
            background: rgb(44,156,236);
            background: linear-gradient(180deg, rgba(44,156,236,1) 0%, rgba(192,255,255,1) 100%);
        }

        .min-h-screen {
            min-height: 100vh;
        }

        .flex {
            display: flex;
        }

        .items-center {
            align-items: center;
        }

        .justify-center {
            justify-content: center;
        }

        .p-4 {
            padding: 1rem;
        }

        .max-w-4xl {
            max-width: 64rem;
        }

        .w-full {
            width: 100%;
        }

        .bg-white {
            background-color: #ffffff;
        }

        .rounded-lg {
            border-radius: 0.9rem;
        }

        .shadow-xl {
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
        }

        .overflow-hidden {
            overflow: hidden;
        }

        .space-y-4 > * + * {
            margin-top: 3rem;
        }

        .text-2xl {
            font-size: 1.5rem;
            line-height: 2rem;
        }

        .font-semibold {
            font-weight: 600;
        }

        .mb-6 {
            margin-bottom: 1.5rem;
        }

        .p-8 {
            padding: 2rem;
        }

        .space-x-2 > * + * {
            margin-left: 0.5rem;
        }

        .inline-flex {
            display: inline-flex;
        }

        .h-[24px] {
            height: 1.5rem;
        }

        .w-[44px] {
            width: 2.75rem;
        }

        .cursor-pointer {
            cursor: pointer;
        }

        .ml-4 {
            margin-left: 12rem; /* Puedes ajustar este valor según tus preferencias */
        }

        /* Nuevo estilo para los campos de formulario */
        .form-input {
            border: 2px solid #ccc;
            border-radius: 5px;
            padding: 8px;
            margin-bottom: 10px;
            width: 100%;
            box-sizing: border-box;
            transition: border-color 0.3s ease;
        }

        .form-input:focus {
            outline: none;
            border-color: #3b82f6;
        }

        .form-submit {
            background-color: #3b82f6;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .form-submit:hover {
            background-color: #2563eb;
        }

        /* Aumentar el tamaño de la letra en "Datos Actuales" */
        .datos-actuales p {
            margin-bottom: 10px; /* Reducir el espacio entre párrafos */
            color: #333; /* Color de texto oscuro */
            font-family: 'Poppins', sans-serif;
        }

        .datos-actuales p span {
            font-size: 3.2rem; /* Tamaño de fuente más grande para los nombres de campo */
        }

        .datos-actuales .font-semibold {
            color: #555; /* Cambiar el color de texto de los nombres de campo */
        }

        .datos-actuales {
            font-size: 2.2rem; /* Tamaño de letra ajustado */
            font-family: 'Poppins', sans-serif;
        }

        /* Cambio de color de fondo para la sección de Modificar Datos */
        .bg-modificar-datos {
            background: rgb(201,155,132);
            background: linear-gradient(12deg, rgba(201,155,132,1) 0%, rgba(77,100,141,1) 100%); /* Degradado de azul */
            font-size: 2.2rem; 
        }
        
        h3 {
             font-size: 1.2rem;
        }


        /* Customize the label (the checkbox-btn) */
        .checkbox-btn {
            display: block;
            position: relative;
            padding-left: 40px;
            margin-bottom: -60px;
            cursor: pointer;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        /* Hide the browser's default checkbox */
        .checkbox-btn input {
            position: absolute;
            opacity: 0;
            cursor: pointer;
            height: 0;
            width: 0;
        }

        .checkbox-btn label {
            cursor: pointer;
            font-size: 10px;
        }

        /* Create a custom checkbox */
        .checkmark {
            position: absolute;
            top: 0;
            left: 0;
            height: 20px;
            width: 20px;
            border: 2.5px solid #ffffff;
            transition: .2s linear;
        }

        .checkbox-btn input:checked ~ .checkmark {
            background-color: transparent;
        }

        /* Create the checkmark/indicator (hidden when not checked) */
        .checkmark:after {
            content: "";
            position: absolute;
            visibility: hidden;
            opacity: 0;
            left: 50%;
            top: 40%;
            width: 10px;
            height: 14px;
            border: 2px solid #0ea021;
            filter: drop-shadow(0px 0px 10px #0ea021);
            border-width: 0 2.5px 2.5px 0;
            transition: .2s linear;
            transform: translate(-50%, -50%) rotate(-90deg) scale(0.2);
        }

        /* Show the checkmark when checked */
        .checkbox-btn input:checked ~ .checkmark:after {
            visibility: visible;
            opacity: 1;
            transform: translate(-50%, -50%) rotate(0deg) scale(1);
            animation: pulse 2s ease-in;
        }

        .checkbox-btn input:checked ~ .checkmark {
            transform: rotate(45deg);
            border: none;
        }

        @keyframes pulse {
            0%, 100% {
                transform: translate(-50%, -50%) rotate(0deg) scale(1);
            }
            50% {
                transform: translate(-50%, -50%) rotate(0deg) scale(1.6);
            }
        }
    </style>
</head>
<body>

<div class="bg-blue-500 min-h-screen flex items-center justify-center p-4">
    <div class="max-w-4xl w-full bg-white rounded-lg shadow-xl overflow-hidden flex">
        <div class="w-1/2 p-8">
            <h2 class="text-2xl font-semibold mb-6 datos-actuales">Datos Actuales</h2>
            <div class="space-y-4">
                <p>
                    <span class="font-semibold">Nombre de Usuario:</span> JESUS ARMANDO
                </p>
                <p>
                    <span class="font-semibold">Nombre:</span> Jesus
                </p>
                <p>
                    <span class="font-semibold">Apellidos:</span> Armando
                </p>
                <p>
                    <span class="font-semibold">Correo Electrónico:</span> jesus@example.com
                </p>
                <p>
                    <span class="font-semibold">Número de Teléfono:</span> +1234567890
                </p>
            </div>
        </div>
        <div class="w-1/2 bg-modificar-datos p-8 ml-4">
            <h2 class="text-2xl font-semibold mb-6">Modificar Datos</h2>
            <form class="space-y-4">
                <input id="name" name="name"  class="form-input" placeholder="Nombre">
                <input id="lastname" name="lastname"class="form-input" placeholder="Apellidos">
                <input id="email" name="email"class="form-input" placeholder="Correo Electrónico" type="email">
                <input id="phone" name="phone"class="form-input" placeholder="Número de Teléfono">

                <label class="checkbox-btn">
                    <label for="checkbox"></label><h3>Mostrar Contraseña</h3>
                    <input id="checkbox" type="checkbox">
                    <span class="checkmark"></span>
                </label>

                <input  id="password" name="password"class="form-input" placeholder="Contraseña" type="password">
                <input  id="confirmPassword"name="confirmPassword"class="form-input" placeholder="Confirmar Contraseña" type="password">

                <button class="form-submit">Actualizar</button>
                <button class="form-submit">Limpiar</button>
                <a href="../Antares_project/shop/catalog.php"><button id="botonRegresar" class="form-submit">Regresar</button></a>
               
            </form>
        </div>
    </div>
</div>

<script>
    // Agregar un event listener al botón de regreso
    document.getElementById("botonRegresar").addEventListener("click", function() {
        // Redirigir a la página anterior
        window.location.href = "../Antares_project/shop/catalog.php";
    });
</script>

</body>
</html>
