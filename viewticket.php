<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Ticket</title>
    <style>
        /* Estilos CSS para centrar el formulario */
            body, html {
            height: 100%;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            background: rgb(44,156,236);
background: linear-gradient(180deg, rgba(44,156,236,1) 0%, rgba(192,255,255,1) 100%);
        }

        .form-container {
            width: 90%; /* Ancho del contenedor del formulario */
            max-width: 600px; /* Ancho máximo del formulario */
            padding: 20px; /* Espaciado interno del contenedor */
            border-radius: 10px; /* Bordes redondeados del contenedor */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Sombra del contenedor */
        }

        /* Aquí puedes pegar tus estilos CSS */
        .rounded-lg { border-radius: 0.5rem; }
        .border { border-width: 1px; border-style: solid; }
        .bg-card { background-color: #fff; }
        .text-card-foreground { color: #000; }
        .shadow-sm { box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05); }
        .p-6 { padding: 1.5rem; }
        .border-b { border-bottom-width: 1px; border-bottom-style: solid; }
        .pb-6 { padding-bottom: 1.5rem; }
        .font-bold { font-weight: 700; }
        .text-2xl { font-size: 1.5rem; line-height: 2rem; }
        /* Agrega más estilos según sea necesario */
      
        button {
    font-family: Arial, Helvetica, sans-serif;
    font-weight: bold;
    color: white;
    background-color: #171717;
    padding: 0.5em 1em; /* Tamaño de padding ajustado */
    border: none;
    border-radius: .4rem;
    position: relative;
    cursor: pointer;
    overflow: hidden;
    margin-top: 10px; /* Agrega espacio entre los botones y los elementos anteriores */
}

#cancelButton {
    margin-top: 50px; /* Agrega espacio entre los botones y los elementos anteriores */
}



        button span:not(:nth-child(6)) {
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            height: 20px; /* Reducción del tamaño de los puntos */
            width: 20px; /* Reducción del tamaño de los puntos */
            background-color: #0c66ed;
            border-radius: 50%;
            transition: .6s ease;
        }

        button span:nth-child(6) {
            position: relative;
        }

        button span:nth-child(1) {
            transform: translate(-2.2em, -2.8em); /* Ajuste de la posición */
        }

        button span:nth-child(2) {
            transform: translate(-4em, 1em); /* Ajuste de la posición */
        }

        button span:nth-child(3) {
            transform: translate(-.1em, 1.4em); /* Ajuste de la posición */
        }

        button span:nth-child(4) {
            transform: translate(2.8em, 1em); /* Ajuste de la posición */
        }

        button span:nth-child(5) {
            transform: translate(2.8em, -3em); /* Ajuste de la posición */
        }

        button:hover > span:not(:nth-child(6)) {
            transform: translate(-50%, -50%) scale(4);
        }

        /* Estilos para los campos del formulario */
        label {
        margin-bottom: 10px; /* Agrega espacio entre los campos del formulario */
        }

        input, select, textarea {
        margin-bottom: 15px; /* Agrega espacio entre los campos del formulario */
        }

        /* Estilos para los campos de asunto y mensaje */
#subject,
#message {
    width: calc(100% - 20px); /* Ancho del 100% menos 20px de espacio para mantener uniformidad con los otros campos */
    margin-bottom: 15px; /* Agrega espacio entre los campos */
}

    </style>
</head>
<body>

<div class="rounded-lg border bg-card text-card-foreground shadow-sm" data-v0-t="card">
    <div class="p-6">
        <div class="border-b pb-6">
            <h2 class="font-bold text-2xl">Informacion del ticket</h2>
            <div class="flex items-center gap-4 mt-4">
                <img src="image/A113.png" width="80" height="80" alt="Logo" class="aspect-square rounded-md overflow-hidden object-cover">
                <div class="text-right">
                    <h1 class="font-bold text-2xl">SAMAVA </h1>
                    <p class="text-sm text-gray-500 dark:text-gray-400">
                        <?php echo "San juan del rio, Qro."; ?><br>
                        <?php echo "SAMAVA SAS de CV"; ?><br>
                        <?php echo "samava@gmail.com"; ?><br>
                        <?php echo "123-456-7890"; ?>
                    </p>
                </div>
            </div>
        </div>
        <div class="border-t border-b py-6 mt-6">
            <h2 class="font-bold text-2xl">Detalles</h2>
            <div class="grid grid-cols-2 gap-4 mt-4">
                <div>
                    <label class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70" for="customer-name">Nombre</label>
                    <input class="flex h-10 w-full rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50" id="customer-name" placeholder="Enter customer name" value="Nombre del cliente" readonly>
                </div>
                <div>
                    <label class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70" for="customer-email"> Email</label>
                    <input class="flex h-10 w-full rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50" id="customer-email" placeholder="Enter customer email" type="email" value="correo@cliente.com" readonly>
                </div>
                <div>
                    <label class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70" for="department">Departamento</label>
                    <select id="department" class="flex h-10 w-full rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50" disabled>
                        <option value="sales">Ventas</option>
                        <option value="support" selected>Soporte</option>
                        <option value="billing">Publicidad</option>
                    </select>
                </div>
                <div>
                    <label class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70" for="domain">Dominio</label>
                    <select id="domain" class="flex h-10 w-full rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50" disabled>
                        <option value="domain1" selected>Dominio 1</option>
                        <option value="domain2">Dominio 2</option>
                        <option value="domain3">Dominio 3</option>
                    </select>
                </div>
                <div>
                    <label class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70" for="priority">Prioridad</label>
                    <select id="priority" class="flex h-10 w-full rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50" disabled>
                        <option value="low">Low</option>
                        <option value="medium">Medium</option>
                        <option value="high" selected>High</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="border-t border-b py-6 mt-6">
            <h2 class="font-bold text-2xl">Detalles</h2>
            <div class="grid grid-cols-2 gap-4 mt-4">
                <div>
                    <label class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70" for="subject">Asunto</label>
                    <input class="flex h-10 w-full rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50" id="subject" placeholder="Enter ticket subject" value="Asunto del ticket" readonly>
                </div>
                <div>
                    <label class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70" for="message">Mensaje</label>
                    <textarea class="flex w-full rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50 min-h-[100px]" id="message" placeholder="Enter your message" readonly>Escriba aquí el mensaje del ticket</textarea>
                </div>
            </div>
        </div>
        <div class="flex items-center justify-end p-6">
            <button>Print</button> <!-- Cambiar este botón por el de Regresar si lo prefieres -->
        </div>
    </div>
</div>

</body>
</html>
