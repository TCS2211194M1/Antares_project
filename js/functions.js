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

//Login

function addLogin(){
    var datos = new FormData();
    var sol = new XMLHttpRequest();
    var f = document.querySelector("#form-add-login");

    datos.append("opc", "login");
    datos.append("acc", "add");
    datos.append("T_LOGIN", f.T_LOGIN.value);
    datos.append("LOGIN_ROLE", f.LOGIN_ROLE.value);

    sol.addEventListener("load", function(e){
        if (e.target.responseText > 0) {
            alert("Login registrado con éxito");
            cargarInterfaz("login", "list", null);
        } else {
            alert("Ocurrió un error al registrar los datos :(");
        }
    });

    sol.open("POST", "php/process.php");
    sol.send(datos);
}

//Pendiente por resolver
function prueba(opc, id){
    var datos = new FormData();
    var sol = new XMLHttpRequest();
    var contenido = document.getElementById("form");

    datos.append("opc", opc);
    datos.append("acc", "mod");
    datos.append("id", id);
    datos.append("param", null);

    sol.addEventListener("load", function(e){
        contenido.innerHTML = e.target.responseText;
        alert(contenido.innerHTML);
    });

    sol.open("POST", "php/interfaz.php");
    sol.send(datos);
}

function delete_row(opc, id){
    var datos = new FormData();
    var sol = new XMLHttpRequest();

    datos.append("opc", opc);
    datos.append("acc", "delete");
    datos.append("id", id);

    if (confirm("Estás seguro de eliminar el registro: " + id + "?")) {
        sol.addEventListener("load", function(e){
            if (e.target.responseText > 0) {
                alert("Registro eliminado con éxito");
                cargarInterfaz(opc, "list", null);
            } else{
                alert("Error al eliminar el registro" + e.target.responseText);
            }
        });
        
        sol.open("POST", "php/process.php");
        sol.send(datos);
    }
}

//Product

//Role

//Work Order


//Functions
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