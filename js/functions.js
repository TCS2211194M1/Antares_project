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

function createUser(){
    
}