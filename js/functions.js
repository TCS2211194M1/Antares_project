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

//Función para agregar un registro de la tabla Login
function addLogin(){
    var datos = new FormData();
    var sol = new XMLHttpRequest();
    var f = document.querySelector("#form-add-login");

    datos.append("opc", "login");
    datos.append("acc", "add");
    datos.append("t_login", f.T_LOGIN.value);
    datos.append("login_role", f.LOGIN_ROLE.value);

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

//Función para agregar un registro de la tabla Client
function addClient(){
    var datos = new FormData();
    var sol = new XMLHttpRequest();
    var f = document.querySelector("#form-add-client");

    datos.append("opc", "client");
    datos.append("acc", "add");
    datos.append("t_client", f.T_CLIENT.value);
    datos.append("short_description", f.SHORT_DESCRIPTION.value);
    datos.append("login_name", f.LOGIN_NAME.value);
    datos.append("login_last_name", f.LOGIN_LAST_NAME.value);
    datos.append("email", f.EMAIL.value);
    datos.append("cellphone", f.CELLPHONE.value);
    datos.append("phone", f.PHONE.value);
    datos.append("t_login", f.T_LOGIN.value);
    datos.append("t_taxid", f.T_TAXID.value);
    datos.append("t_workorder", f.T_WORKORDER.value);

    sol.addEventListener("load", function(e){

        if (e.target.responseText > 0) {
            alert("Client registrado con éxito");
            cargarInterfaz("client", "list", null);
        } else {
            alert("Ocurrió un error al registrar los datos :(" + e.target.responseText);
        }
    });

    sol.open("POST", "php/process.php");
    sol.send(datos);
}

//Función para agregar un registro a la tabla Role
function addRole() {
    var datos = new FormData();
    var sol = new XMLHttpRequest();
    var f = document.querySelector("#form-add-role");

    datos.append("opc", "role");
    datos.append("acc", "add");
    datos.append("t_role", f.T_ROLE.value);
    datos.append("short_description", f.SHORT_DESCRIPTION.value);
    datos.append("long_description", f.LONG_DESCRIPTION.value);
    datos.append("t_privilege", f.T_PRIVILEGE.value);

    sol.addEventListener("load", function(e){

        if (e.target.responseText > 0) {
            alert("Role registrado con éxito");
            cargarInterfaz("role", "list", null);
        } else {
            alert("Ocurrió un error al registrar los datos :(" + e.target.responseText);
        }
    });

    sol.open("POST", "php/process.php");
    sol.send(datos);
}

function addPrivilege() {
    var datos = new FormData();
    var sol = new XMLHttpRequest();
    var f = document.querySelector("#form-add-privilege");

    datos.append("opc", "privilege");
    datos.append("acc", "add");
    datos.append("t_privilege", f.T_PRIVILEGE.value);
    datos.append("short_description", f.SHORT_DESCRIPTION.value);
    datos.append("grant_table_column", f.GRANT_TABLE_COLUMN.value);
    datos.append("context", f.CONTEXT.value);

    sol.addEventListener("load", function(e){

        if (e.target.responseText > 0) {
            alert("Privilege registrado con éxito");
            cargarInterfaz("privilege", "list", null);
        } else {
            alert("Ocurrió un error al registrar los datos :(" + e.target.responseText);
        }
    });

    sol.open("POST", "php/process.php");
    sol.send(datos);
}

//Función para cargar interface para modificar
function interfaceMod(opc, id){
    var datos = new FormData();
    var sol = new XMLHttpRequest();
    var contenido = document.getElementById("form");

    datos.append("opc", opc);
    datos.append("acc", "mod");
    datos.append("id", id);
    datos.append("param", null);

    sol.addEventListener("load", function(e){
        contenido.innerHTML = e.target.responseText;
    });

    sol.open("POST", "php/interfaz.php");
    sol.send(datos);
}

//Función para modificar cualquier tabla
function mod(opc) {
    var datos = new FormData();
    var sol = new XMLHttpRequest();
    var f =  document.querySelector("#form-mod-"+opc);
    
    datos.append("opc", opc);
    datos.append("acc", "mod");

    switch (true) {
        case opc == 'login':
            datos.append("t_login", f.T_LOGIN.value);
            datos.append("login_role", f.LOGIN_ROLE.value);
                
            sol.addEventListener("load", function(e){
                if (e.target.responseText > 0) {
                    alert("Registro modificado con éxito");
                } else{
                    alert("Ocurrió un error en: " + e.target.responseText);
                }
            });

            sol.open("POST", "php/process.php");
            sol.send(datos);
        break;

        case opc == 'client':
            datos.append("t_client", f.T_CLIENT.value);
            datos.append("short_description", f.SHORT_DESCRIPTION.value);
            datos.append("login_name", f.LOGIN_NAME.value);
            datos.append("login_last_name", f.LOGIN_LAST_NAME.value);
            datos.append("email", f.EMAIL.value);
            datos.append("cellphone", f.CELLPHONE.value);
            datos.append("phone", f.PHONE.value);
            datos.append("t_login", f.T_LOGIN.value);
            datos.append("t_taxid", f.T_TAXID.value);
            datos.append("t_workorder", f.T_WORKORDER.value);

            sol.addEventListener("load", function(e){
                if (e.target.responseText > 0) {
                    alert("Registro modificado con éxito");
                } else{
                    alert("Ocurrió un error en: " + e.target.responseText);
                }
            });
            
            sol.open("POST", "php/process.php");
            sol.send(datos);
        break;
        //Pendiente por hacer
        case opc == 'taxid':
            datos.append("t_taxid", f.T_CLIENT.value);
            datos.append("rfc", f.SHORT_DESCRIPTION.value);
            datos.append("address", f.LOGIN_NAME.value);
            datos.append("pais", f.LOGIN_LAST_NAME.value);
            datos.append("email", f.EMAIL.value);
            datos.append("cellphone", f.CELLPHONE.value);
            datos.append("phone", f.PHONE.value);
            datos.append("t_login", f.T_LOGIN.value);
            datos.append("t_taxid", f.T_TAXID.value);
            datos.append("t_workorder", f.T_WORKORDER.value);

            sol.addEventListener("load", function(e){
                if (e.target.responseText > 0) {
                    alert("Registro modificado con éxito");
                } else{
                    alert("Ocurrió un error en: " + e.target.responseText);
                }
            });
            
            sol.open("POST", "php/process.php");
            sol.send(datos);
        break;

        case opc == 'role':

            datos.append("t_role", f.T_ROLE.value);
            datos.append("short_description", f.SHORT_DESCRIPTION.value);
            datos.append("long_description", f.LONG_DESCRIPTION.value);
            datos.append("t_privilege", f.T_PRIVILEGE.value);

            sol.addEventListener("load", function(e){
                if (e.target.responseText > 0) {
                    alert("Registro modificado con éxito");
                } else{
                    alert("Ocurrió un error en: " + e.target.responseText);
                }
            });
            
            sol.open("POST", "php/process.php");
            sol.send(datos);
        break;

        case opc == 'privilege':

            datos.append("t_privilege", f.T_PRIVILEGE.value);
            datos.append("short_description", f.SHORT_DESCRIPTION.value);
            datos.append("grant_table_column", f.GRANT_TABLE_COLUMN.value);
            datos.append("context", f.CONTEXT.value);

            sol.addEventListener("load", function(e){
                if (e.target.responseText > 0) {
                    alert("Registro modificado con éxito");
                } else{
                    alert("Ocurrió un error en: " + e.target.responseText);
                }
            });
            
            sol.open("POST", "php/process.php");
            sol.send(datos);
        break;

        default:
            alert("No seleccionaste una opción");
        break;
    }
    
}

//Función para eliminar los registros de cualquier tabla
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