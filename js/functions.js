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

//Clientes
//Función para agregar un registro de la tabla Login
function addLogin(){
    var datos = new FormData();
    var sol = new XMLHttpRequest();
    var f = document.querySelector("#form-add-login");

    datos.append("opc", "login");
    datos.append("acc", "add");
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

//Pendiente por hacer
function addTaxid() {
    
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

//Función para agregar un registro a la tabla Privilege
function addPrivilege() {
    var datos = new FormData();
    var sol = new XMLHttpRequest();
    var f = document.querySelector("#form-add-privilege");

    datos.append("opc", "privilege");
    datos.append("acc", "add");
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

//Productos
//Pendiente por hacer
function addProduct() {
    
}

//Función para agregar un registro a la tabla Service
function addService() {
    var datos = new FormData();
    var sol = new XMLHttpRequest();
    var f = document.querySelector("#form-add-service");

    datos.append("opc", "service");
    datos.append("acc", "add");
    datos.append("short_description", f.SHORT_DESCRIPTION.value);
    datos.append("long_description", f.LONG_DESCRIPTION.value);

    sol.addEventListener("load", function(e){

        if (e.target.responseText > 0) {
            alert("Service registrado con éxito");
            cargarInterfaz("service", "list", null);
        } else {
            alert("Ocurrió un error al registrar los datos :(" + e.target.responseText);
        }
    });

    sol.open("POST", "php/process.php");
    sol.send(datos);
}

//Función para agregar un registro a la tabla Storage
function addStorage() {
    var datos = new FormData();
    var sol = new XMLHttpRequest();
    var f = document.querySelector("#form-add-storage");

    datos.append("opc", "storage");
    datos.append("acc", "add");
    datos.append("short_description", f.SHORT_DESCRIPTION.value);
    datos.append("device_name", f.DEVICE_NAME.value);
    datos.append("intance_attachment", f.INTANCE_ATTACHMENT.value);
    datos.append("volumen_size", f.VOLUME_SIZE.value);
    datos.append("volumen_type", f.VOLUME_TYPE.value);
    datos.append("iops", f.IOPS.value);
    datos.append("encrypted", f.ENCRYPTED.value);
    datos.append("delete_on_termination", f.DELETE_ON_TERMINATION.value);
    datos.append("instance", f.INSTANCE.value);

    sol.addEventListener("load", function(e){

        if (e.target.responseText > 0) {
            alert("Storage registrado con éxito");
            cargarInterfaz("storage", "list", null);
        } else {
            alert("Ocurrió un error al registrar los datos :(" + e.target.responseText);
        }
    });

    sol.open("POST", "php/process.php");
    sol.send(datos);
}

//Pendiente por hacer
function addPartition() {
    var datos = new FormData();
    var sol = new XMLHttpRequest();
    var f = document.querySelector("#form-add-partition");

    datos.append("opc", "partition");
    datos.append("acc", "add");
    datos.append("short_description", f.SHORT_DESCRIPTION.value);
    datos.append("device_name", f.DEVICE_NAME_.value);
    datos.append("intance_attachment", f.ATTACHMENT_POINT.value);

    sol.addEventListener("load", function(e){

        if (e.target.responseText > 0) {
            alert("Partition registrado con éxito");
            cargarInterfaz("partition", "list", null);
        } else {
            alert("Ocurrió un error al registrar los datos :(" + e.target.responseText);
        }
    });

    sol.open("POST", "php/process.php");
    sol.send(datos);
}

//Locations
//Función para agregar un registro a la tabla region
function addRegion(){
    var datos = new FormData();
    var sol = new XMLHttpRequest();
    var f = document.querySelector("#form-add-region");

    datos.append("opc", "region");
    datos.append("acc", "add");
    datos.append("region_name", f.REGION_NAME.value);

    sol.addEventListener("load", function(e){

        if (e.target.responseText > 0) {
            alert("Region registrado con éxito");
            cargarInterfaz("region", "list", null);
        } else {
            alert("Ocurrió un error al registrar los datos :(" + e.target.responseText);
        }
    });

    sol.open("POST", "php/process.php");
    sol.send(datos);
}

//Función para agregar un registro a la tabla subregion
function addSubregion(){
    var datos = new FormData();
    var sol = new XMLHttpRequest();
    var f = document.querySelector("#form-add-subregion");

    datos.append("opc", "subregion");
    datos.append("acc", "add");
    datos.append("short_description", f.SHORT_DESCRIPTION.value);
    datos.append("t_region", f.T_REGION.value);

    sol.addEventListener("load", function(e){

        if (e.target.responseText > 0) {
            alert("Subregion registrado con éxito");
            cargarInterfaz("subregion", "list", null);
        } else {
            alert("Ocurrió un error al registrar los datos :(" + e.target.responseText);
        }
    });

    sol.open("POST", "php/process.php");
    sol.send(datos);
}


//Work Order

//Locations

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
        //Pendiente por hacer
        case opc == 'product':
            alert("En construcción");
            break;

        case opc == 'service':
            datos.append("t_service", f.T_SERVICE.value);
            datos.append("short_description", f.SHORT_DESCRIPTION.value);
            datos.append("long_description", f.LONG_DESCRIPTION.value);

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
        
        case opc == 'storage':
            datos.append("t_storage", f.T_STORAGE.value);
            datos.append("short_description", f.SHORT_DESCRIPTION.value);
            datos.append("device_name", f.DEVICE_NAME.value);
            datos.append("intance_attachment", f.INTANCE_ATTACHMENT_POINT.value);
            datos.append("volume_size", f.VOLUME_SIZE.value);
            datos.append("volume_type", f.VOLUME_TYPE.value);

            datos.append("iops", f.IOPS.value);
            datos.append("encrypted", f.ENCRYPTED.value);
            datos.append("delete_on_termination", f.DELETE_ON_TERMINATION.value);
            datos.append("instance", f.INSTANCE.value);

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

        case opc == 'region':
            datos.append("t_region", f.T_REGION.value);
            datos.append("region_name", f.REGION_NAME.value);

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

        case opc == 'subregion':
            datos.append("t_subregion", f.T_SUBREGION.value);
            datos.append("short_description", f.SHORT_DESCRIPTION.value);
            datos.append("t_region", f.T_REGION.value);

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
        //Pendiente
        case opc == 'country':
            datos.append("t_country", f.T_COUNTRY.value);
            datos.append("name", f.NAME.value);
            datos.append("iso3", f.ISO3.value);

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