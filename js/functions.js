function cargarInterfaz(opc, acc, param){
    var datos = new FormData();
    var sol = new XMLHttpRequest();
    var contenido = document.getElementById("container");

    datos.append("opc", opc);
    datos.append("acc", acc);
    datos.append("param", param);

    sol.addEventListener("load", function(e){
        contenido.innerHTML = e.target.responseText;
    });

    sol.open("POST", "php/interfaz.php");
    sol.send(datos);
}

function addClient(){
    var datos = new FormData();
    var sol = new XMLHttpRequest();
    var f = document.querySelector("#form-add-client");

    datos.append("opc", "client");
    datos.append("acc", "add");
    datos.append("name", f.name.value);
    datos.append("lastName", f.lastName.value);
    datos.append("genere", f.genere.value);
    datos.append("birthdate", f.birthdate.value);
    datos.append("email", f.email.value);
    datos.append("emailOp", f.emailOp.value);
    datos.append("phone", f.phone.value);
    datos.append("phoneOp", f.phoneOp.value);
    datos.append("country", f.country.value);
    

    sol.addEventListener("load", function(e){
        if (e.target.responseText > 0) {
            alert("Success");
        } else{
            alert("Error");
        }
    });

    sol.open("POST", "php/procesos.php");
    sol.send(datos);
}

function eliminarAlumno(username){
    var datos = new FormData();
    var sol = new XMLHttpRequest();
    var name = document.getElementById("name").value;

    datos.append("opc", "client");
    datos.append("acc", "delete");
    datos.append("username", username);

    if (confirm("Estás seguro de eliminar al cliente: " + name + "?")) {
        sol.addEventListener("load", function(e){
            if (e.target.responseText > 0) {
                alert("Client eliminado con éxito");
                cargarInterfaz("client", "list", null);
            } else{
                alert("Error al eliminar al client");
            }
        });
        
        sol.open("POST", "php/procesos.php");
        sol.send(datos);
    }
}

function listState(){
    var country = document.getElementById("country");
    var id = country.value;
}

function activarCajas() {
    document.getElementById('name').disabled=false;
    document.getElementById('lastName').disabled=false;
    document.getElementById('gender').disabled=false;
    document.getElementById('birthdate').disabled=false;
    document.getElementById('email').disabled=false;
    document.getElementById('emailOp').disabled=false;
    document.getElementById('phone').disabled=false;
    document.getElementById('phoneOp').disabled=false;
    document.getElementById('password').disabled=false;
    document.getElementById('save').hidden=false;
    document.getElementById('cancel').hidden=false;

}