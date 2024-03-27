//Función para agregar un ticket
function addTicket(){
    // Obtener los valores de los campos del formulario
    var username = document.getElementById("USERNAME").value;
    var email = document.getElementById("EMAIL").value;
    var departamento = document.getElementById("DEPARTAMENT").value;
    var dominio = document.getElementById("DOMAIN").value;
    var prioridad = document.getElementById("PRIORITY").value;
    var asunto = document.getElementById("SUBJECT").value;
    var mensaje = document.getElementById("MESSAGE").value;

    // Validar que todos los campos obligatorios estén llenos
    if (username === "" || email === "" || departamento === "" || dominio === "" || prioridad === "" || asunto === "" || mensaje === "") {
        // Mostrar un mensaje de error con SweetAlert si algún campo está vacío
        swal("Error", "Por favor, completa todos los campos.", "error");
        return; // Detener la ejecución de la función si hay campos vacíos
    }

    // Si todos los campos están llenos, proceder con el envío del formulario
    var datos = new FormData();
    var f = document.querySelector("#form-ticket");

    datos.append("opc", "ticket");
    datos.append("acc", "add");
    datos.append("username", username);
    datos.append("email", email);
    datos.append("depto", departamento);
    datos.append("dominio", dominio);
    datos.append("prioridad", prioridad);
    datos.append("asunto", asunto);
    datos.append("mensaje", mensaje);

    var sol = new XMLHttpRequest();

    sol.addEventListener("load", function(e){
        if (e.target.responseText > 0) {
            swal("Success", "El ticket se ha registrado con éxito", "success");
            cargarModulo("tickets", "list");
        } else{
            swal("Error", "Ocurrió un error al registrar el ticket", "error");
            cargarModulo("tickets", "list");
        }
    });

    sol.open("POST", "../php/process.php");
    sol.send(datos);
}

// Convertir texto en Mayusculas en los campos DEPARTAMENTO, ASUNTO Y MENSAJE
function convertirMayusculas(input) {
    if (input.value) {
        input.value = input.value.toUpperCase();
    }
}

// Longitud para los campos que lo necesiten (Asunto y Mensaje)
function validarLongitudMensaje(input, maxLength) {
    var mensaje = input.value.trim();
    if (mensaje.length > maxLength) {
        swal({
            title: "Error",
            text: "El mensaje no puede exceder los " + maxLength + " caracteres.",
            icon: "error",
            button: "Aceptar"
        }).then((value) => {
            input.value = mensaje.substring(0, maxLength); // Truncar el mensaje al máximo permitido
        });
    }
}

