function cargarInterfaz(opc, acc){

    var datos = new FormData();
    var sol = new XMLHttpRequest();
    var contenido = document.getElementById("container");

    datos.append("opc", opc);
    datos.append("acc", acc);

    sol.addEventListener("load", function(e){
        contenido.innerHTML = e.target.responseText;
    });

    sol.open("POST", "php/interface.php");
    sol.send(datos);
}

function cargarState(country) {
    
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
            swal("Éxito", "El login se ha registrado con éxito", "success");
            cargarInterfaz("login", "list");
        } else {
            swal("Error", "Ocurrió un error en: " + e.target.responseText, "error");
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
            swal("Éxito", "El cliente se ha registrado con éxito", "success");
            cargarInterfaz("client", "list");
        } else {
            swal("Error", "Ocurrió un error en: " + e.target.responseText, "error");
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
    datos.append("short_description", f.SHORT_DESCRIPTION.value);
    datos.append("long_description", f.LONG_DESCRIPTION.value);
    datos.append("t_privilege", f.T_PRIVILEGE.value);

    sol.addEventListener("load", function(e){
        if (e.target.responseText > 0) {
            swal("Éxito", "El rol se ha registrado con éxito", "success");
            cargarInterfaz("role", "list");
        } else {
            swal("Error", "Ocurrió un error en: " + e.target.responseText, "error");
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
            swal("Éxito", "El privilegio se ha registrado con éxito", "success");
            cargarInterfaz("privilege", "list");
        } else {
            swal("Error", "Ocurrió un error en: " + e.target.responseText, "error");
        }
    });

    sol.open("POST", "php/process.php");
    sol.send(datos);
}

//Productos
//Función para  agregar un registro a la tabla producto
function addProduct() {
    var datos = new FormData();
    var sol = new XMLHttpRequest();
    var f = document.querySelector("#form-add-product");

    datos.append("opc", "product");
    datos.append("acc", "add");
    datos.append("short_description", f.SHORT_DESCRIPTION.value);
    datos.append("long_description", f.LONG_DESCRIPTION.value);
    datos.append("t_service", f.T_SERVICE.value);
    datos.append("hosted_domains", f.HOSTED_DOMAINS.value);
    datos.append("required_size", f.REQUIRED_SIZE.value);
    datos.append("c_claveunidad", f.C_CLAVEUNIDAD.value);
    datos.append("nombre", f.NOMBRE.value);
    datos.append("product_value", f.PRODUCT_VALUE.value);
    datos.append("c_moneda", f.C_MONEDA.value);
    datos.append("periodicidad", f.PERIODICIDAD.value);
    datos.append("c_objetoimp", f.C_OBJETOIMP.value);
    datos.append("c_impuesto", f.C_IMPUESTO.value);
    datos.append("c_tipofactor", f.C_TIPOFACTOR.value);
    datos.append("c_tasa", f.C_TASA.value);
    datos.append("retencion", f.RETENCION.value);
    datos.append("product_tax", f.PRODUCT_TAX.value);
    datos.append("contract_fee", f.CONTRACT_FEE.value);
    datos.append("inicio_vigencia", f.FECHA_DE_INICIO_DE_VIGENCIA.value);
    datos.append("fin_vigencia", f.FECHA_DE_FIN_DE_VIGENCIA.value);

    sol.addEventListener("load", function(e){
        if (e.target.responseText > 0) {
            swal("Éxito", "El producto se ha registrado con éxito", "success");
            cargarInterfaz("product", "list");
        } else {
            swal("Error", "Ocurrió un error en: " + e.target.responseText, "error");
        }
    });

    sol.open("POST", "php/process.php");
    sol.send(datos);
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
            swal("Éxito", "El servicio se ha registrado con éxito", "success");
            cargarInterfaz("service", "list");
        } else {
            swal("Error", "Ocurrió un error en: " + e.target.responseText, "error");
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
    datos.append("intance_attachment", f.INTANCE_ATTACHMENT_POINT.value);
    datos.append("volumen_size", f.VOLUME_SIZE.value);
    datos.append("committed_size", f.COMMITTED_SIZE.value);
    datos.append("volumen_type", f.VOLUME_TYPE.value);
    datos.append("iops", f.IOPS.value);
    datos.append("encrypted", f.ENCRYPTED.value);
    datos.append("delete_on_termination", f.DELETE_ON_TERMINATION.value);
    datos.append("instance", f.INSTANCE.value);
    datos.append("storage_flag", f.STORAGE_FLAG.value);

    sol.addEventListener("load", function(e){
        if (e.target.responseText > 0) {
            swal("Éxito", "El almacenamiento se ha registrado con éxito", "success");
            cargarInterfaz("storage", "list");
        } else {
            swal("Error", "Ocurrió un error en: " + e.target.responseText, "error");
        }
    });

    sol.open("POST", "php/process.php");
    sol.send(datos);
}

//Función para agregar un registro a la tabla Partition
function addPartition() {
    var datos = new FormData();
    var sol = new XMLHttpRequest();
    var f = document.querySelector("#form-add-partition");

    datos.append("opc", "partition");
    datos.append("acc", "add");
    datos.append("short_description", f.SHORT_DESCRIPTION.value);
    datos.append("device_name", f.DEVICE_NAME.value);
    datos.append("attachment_point", f.ATTACHMENT_POINT.value);
    datos.append("partition_size", f.PARTITION_SIZE.value);

    sol.addEventListener("load", function(e){
        if (e.target.responseText > 0) {
            swal("Éxito", "La partición se ha registrado con éxito", "success");
            cargarInterfaz("partition", "list");
        } else {
            swal("Error", "Ocurrió un error en: " + e.target.responseText, "error");
        }
    });

    sol.open("POST", "php/process.php");
    sol.send(datos);
}

//Work Order
//Función para agregar un registro a la tabla workorder
function addWorkOrder() {
    var datos = new FormData();
    var sol = new XMLHttpRequest();
    var f = document.querySelector("#form-add-workorder");

    datos.append("opc", "workorder");
    datos.append("acc", "add");
    datos.append("description", f.DESCRIPTION.value);
    datos.append("t_product", f.T_PRODUCT.value);
    datos.append("registered_domain", f.REGISTERED_DOMAIN.value);
    datos.append("t_partition", f.T_PARTITION.value);
    datos.append("fecha_inicio", f.FECHA_INICIO.value);
    datos.append("fecha_fin", f.FECHA_FIN.value);
    datos.append("workorder_flag", f.WORKORDER_FLAG.value);

    sol.addEventListener("load", function(e){
        if (e.target.responseText > 0) {
            swal("Éxito", "El orden de trabajo se ha registrado con éxito", "success");
            cargarInterfaz("workorder", "list");
        } else {
            swal("Error", "Ocurrió un error en: " + e.target.responseText, "error");
        }
    });

    sol.open("POST", "php/process.php");
    sol.send(datos);
}

function addWorkOrderFlag() {
    var datos = new FormData();
    var sol = new XMLHttpRequest();
    var f = document.querySelector("#form-add-workorderflag");

    datos.append("opc", "workorder");
    datos.append("acc", "add");
    datos.append("description", f.DESCRIPTION.value);
    datos.append("t_product", f.T_PRODUCT.value);
    datos.append("registered_domain", f.REGISTERED_DOMAIN.value);
    datos.append("t_partition", f.T_PARTITION.value);
    datos.append("fecha_inicio", f.FECHA_INICIO.value);
    datos.append("fecha_fin", f.FECHA_FIN.value);
    datos.append("workorder_flag", f.WORKORDER_FLAG.value);

    sol.addEventListener("load", function(e){
        if (e.target.responseText > 0) {
            swal("Éxito", "La bandera de orden de trabajo se ha registrado con éxito", "success");
            cargarInterfaz("workorder", "list");
        } else {
            swal("Error", "Ocurrió un error en: " + e.target.responseText, "error");
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
            swal("Éxito", "La región se ha registrado con éxito", "success");
            cargarInterfaz("region", "list");
        } else {
            swal("Error", "Ocurrió un error en: " + e.target.responseText, "error");
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
            swal("Éxito", "La subregión se ha registrado con éxito", "success");
            cargarInterfaz("subregion", "list");
        } else {
            swal("Error", "Ocurrió un error en: " + e.target.responseText, "error");
        }
    });

    sol.open("POST", "php/process.php");
    sol.send(datos);
}

//Función para agregar un registro a la tabla country
function addCountry() {
    var datos = new FormData();
    var sol = new XMLHttpRequest();
    var f = document.querySelector("#form-add-country");

    datos.append("opc", "country");
    datos.append("acc", "add");
    datos.append("name", f.NAME.value);
    datos.append("iso3", f.ISO3.value);
    datos.append("iso2", f.ISO2.value);
    datos.append("numeric_code", f.NUMERIC_CODE.value);
    datos.append("phone_code", f.PHONE_CODE.value);
    datos.append("capital", f.CAPITAL.value);
    datos.append("c_moneda", f.C_MONEDA.value);
    datos.append("tld", f.TLD.value);
    datos.append("region_name", f.REGION_NAME.value);
    datos.append("subregion", f.SUBREGION.value);
    datos.append("nationality", f.NATIONALITY.value);
    datos.append("time_zone_name", f.TIME_ZONE_NAME.value);
    datos.append("latitude", f.LATITUDE.value);
    datos.append("longitude", f.LONGITUDE.value);

    sol.addEventListener("load", function(e){

        if (e.target.responseText > 0) {
            swal("Éxito", "El país se ha registrado con éxito", "success");
            cargarInterfaz("country", "list");
        } else {
            swal("Error", "Ocurrió un error en: " + e.target.responseText, "error");
        }
    });

    sol.open("POST", "php/process.php");
    sol.send(datos);
}



//Tablas C_Tablas
//Función para agregar un registro a la tabla moneda
function addCurrency() {
    var datos = new FormData();
    var sol = new XMLHttpRequest();
    var f = document.querySelector("#form-add-currency");

    datos.append("opc", "currency");
    datos.append("acc", "add");
    datos.append("short_description", f.SHORT_DESCRIPTION.value);
    datos.append("long_description", f.LONG_DESCRIPTION.value);

    sol.addEventListener("load", function(e){
        if (e.target.responseText > 0) {
            swal("Éxito", "La moneda se ha registrado con éxito", "success");
            cargarInterfaz("currency", "list");
        } else {
            swal("Error", "Ocurrió un error en: " + e.target.responseText, "error");
        }
    });

    sol.open("POST", "php/process.php");
    sol.send(datos);
}


//Función para cargar interfaz para modificar
function interfaceMod(opc, id){
    var datos = new FormData();
    var sol = new XMLHttpRequest();
    var contenido = document.getElementById("container");

    datos.append("opc", opc);
    datos.append("acc", "mod");
    datos.append("id", id);
    datos.append("param", null);

    sol.addEventListener("load", function(e){
        swal("Atención", "Asegúrate de escribir correctamente los datos a modificar", "info");
        contenido.innerHTML = e.target.responseText;
    });

    sol.open("POST", "php/interface.php");
    sol.send(datos);
}

//Función para modificar cualquier registro de una tabla
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
                    swal("Éxito", "El login se ha modificado con éxito", "success");
                } else{
                    swal("Error", "Ocurrió un error en: " + e.target.responseText, "error");
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
                    swal("Éxito", "El cliente se ha modificado con éxito", "success");
                } else{
                    swal("Error", "Ocurrió un error en: " + e.target.responseText, "error");
                }
            });
            
            sol.open("POST", "php/process.php");
            sol.send(datos);
        break;
        
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
                    swal("Éxito", "El taxid se ha modificado con éxito", "success");
                } else{
                    swal("Error", "Ocurrió un error en: " + e.target.responseText, "error");
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
                    swal("Éxito", "El rol se ha modificado con éxito", "success");
                } else{
                    swal("Error", "Ocurrió un error en: " + e.target.responseText, "error");
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
                    swal("Éxito", "El privilegio se ha modificado con éxito", "success");
                } else{
                    swal("Error", "Ocurrió un error en: " + e.target.responseText, "error");
                }
            });
            
            sol.open("POST", "php/process.php");
            sol.send(datos);
        break;
        //Productos
        //Pendiente por hacer
        case opc == 'product':
            datos.append("short_description", f.SHORT_DESCRIPTION.value);
            datos.append("long_description", f.LONG_DESCRIPTION.value);
            datos.append("t_service", f.T_SERVICE.value);
            datos.append("hosted_domains", f.HOSTED_DOMAINS.value);
            datos.append("required_size", f.REQUIRED_SIZE.value);
            datos.append("c_claveunidad", f.C_CLAVEUNIDAD.value);
            datos.append("nombre", f.NOMBRE.value);
            datos.append("product_value", f.PRODUCT_VALUE.value);
            datos.append("c_moneda", f.C_MONEDA.value);
            datos.append("periodicidad", f.PERIODICIDAD.value);
            datos.append("c_objetoimp", f.C_OBJETOIMP.value);
            datos.append("c_impuesto", f.C_IMPUESTO.value);
            datos.append("c_tipofactor", f.C_TIPOFACTOR.value);
            datos.append("c_tasa", f.C_TASA.value);
            datos.append("retencion", f.RETENCION.value);
            datos.append("product_tax", f.PRODUCT_TAX.value);
            datos.append("contract_fee", f.CONTRACT_FEE.value);
            datos.append("inicio_vigencia", f.FECHA_DE_INICIO_DE_VIGENCIA.value);
            datos.append("fin_vigencia", f.FECHA_DE_FIN_DE_VIGENCIA.value);

            sol.addEventListener("load", function(e){
                if (e.target.responseText > 0) {
                    swal("Éxito", "El producto se ha modificado con éxito", "success");
                } else{
                    swal("Error", "Ocurrió un error en: " + e.target.responseText, "error");
                }
            });
            
            sol.open("POST", "php/process.php");
            sol.send(datos);
            break;

        case opc == 'service':
            datos.append("t_service", f.T_SERVICE.value);
            datos.append("short_description", f.SHORT_DESCRIPTION.value);
            datos.append("long_description", f.LONG_DESCRIPTION.value);

            sol.addEventListener("load", function(e){
                if (e.target.responseText > 0) {
                    swal("Éxito", "El servicio se ha modificado con éxito", "success");
                } else{
                    swal("Error", "Ocurrió un error en: " + e.target.responseText, "error");
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
            datos.append("committed_size", f.COMMITTED_SIZE.value);
            datos.append("volume_type", f.VOLUME_TYPE.value);
            datos.append("iops", f.IOPS.value);
            datos.append("encrypted", f.ENCRYPTED.value);
            datos.append("delete_on_termination", f.DELETE_ON_TERMINATION.value);
            datos.append("instance", f.INSTANCE.value);
            datos.append("storage_flag", f.STORAGE_FLAG.value);

            sol.addEventListener("load", function(e){
                if (e.target.responseText > 0) {
                    swal("Éxito", "El almacenamiento se ha modificado con éxito", "success");
                } else{
                    swal("Error", "Ocurrió un error en: " + e.target.responseText, "error");
                }
            });
            
            sol.open("POST", "php/process.php");
            sol.send(datos);
        break;

        case opc== 'partition':
            datos.append("t_partition", f.T_PARTITION.value);
            datos.append("short_description", f.SHORT_DESCRIPTION.value);
            datos.append("device_name", f.DEVICE_NAME.value);
            datos.append("attachment_point", f.ATTACHMENT_POINT.value);
            datos.append("partition_size", f.PARTITION_SIZE.value);
            
            sol.addEventListener("load", function(e){
                if (e.target.responseText > 0) {
                    swal("Éxito", "La partición se ha modificado con éxito", "success");
                } else{
                    swal("Error", "Ocurrió un error en: " + e.target.responseText, "error");
                }
            });
            
            sol.open("POST", "php/process.php");
            sol.send(datos);
        break;
        
        //WORKORDER
        case opc == 'workorder':
            datos.append("t_workorder", f.T_WORKORDER.value);
            datos.append("description", f.DESCRIPTION.value);
            datos.append("t_product", f.T_PRODUCT.value);
            datos.append("registered_domain", f.REGISTERED_DOMAIN.value);
            datos.append("t_partition", f.T_PARTITION.value);
            datos.append("fecha_inicio", f.FECHA_INICIO_DE_VIGENCIA.value);
            datos.append("fecha_fin", f.FECHA_FIN_DE_VIGENCIA.value);
            datos.append("workorder_flag", f.WORKORDER_FLAG.value);

            sol.addEventListener("load", function(e){
                if (e.target.responseText > 0) {
                    swal("Éxito", "La orden de trabajo se ha modificado con éxito", "success");
                } else{
                    swal("Error", "Ocurrió un error en: " + e.target.responseText, "error");
                }
            });
            
            sol.open("POST", "php/process.php");
            sol.send(datos);
        break;
        
        case opc == 'workorder_flag':
            datos.append("t_workorder", f.T_WORKORDER.value);
            datos.append("description", f.DESCRIPTION.value);
            datos.append("t_product", f.T_PRODUCT.value);
            datos.append("registered_domain", f.REGISTERED_DOMAIN.value);
            datos.append("t_partition", f.T_PARTITION.value);
            datos.append("fecha_inicio", f.FECHA_INICIO_DE_VIGENCIA.value);
            datos.append("fecha_fin", f.FECHA_FIN_DE_VIGENCIA.value);
            datos.append("workorder_flag", f.WORKORDER_FLAG.value);

            sol.addEventListener("load", function(e){
                if (e.target.responseText > 0) {
                    swal("Éxito", "La bandera de orden de trabajo se ha modificado con éxito", "success");
                } else{
                    swal("Error", "Ocurrió un error en: " + e.target.responseText, "error");
                }
            });
            
            sol.open("POST", "php/process.php");
            sol.send(datos);
        break;

        //Localizaciones
        case opc == 'region':
            datos.append("t_region", f.T_REGION.value);
            datos.append("region_name", f.REGION_NAME.value);

            sol.addEventListener("load", function(e){
                if (e.target.responseText > 0) {
                    swal("Éxito", "La región se ha modificado con éxito", "success");
                } else{
                    swal("Error", "Ocurrió un error en: " + e.target.responseText, "error");
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
                    swal("Éxito", "La subregión se ha modificado con éxito", "success");
                } else{
                    swal("Error", "Ocurrió un error en: " + e.target.responseText, "error");
                }
            });
            
            sol.open("POST", "php/process.php");
            sol.send(datos);
            break;

        case opc == 'country':
            datos.append("t_country", f.T_COUNTRY.value);
            datos.append("name", f.NAME.value);
            datos.append("iso3", f.ISO3.value);
            datos.append("iso2", f.ISO2.value);
            datos.append("numeric_code", f.NUMERIC_CODE.value);
            datos.append("phone_code", f.PHONE_CODE.value);
            datos.append("capital", f.CAPITAL.value);
            datos.append("c_moneda", f.C_MONEDA.value);
            datos.append("tld", f.TLD.value);
            datos.append("region_name", f.REGION_NAME.value);
            datos.append("subregion", f.SUBREGION.value);
            datos.append("nationality", f.NATIONALITY.value);
            datos.append("time_zone_name", f.TIME_ZONE_NAME.value);
            datos.append("latitude", f.LATITUDE.value);
            datos.append("longitude", f.LONGITUDE.value);;

            sol.addEventListener("load", function(e){
                if (e.target.responseText > 0) {
                    swal("Éxito", "EL país se ha modificado con éxito", "success");
                } else{
                    swal("Error", "Ocurrió un error en: " + e.target.responseText, "error");
                }
            });
            
            sol.open("POST", "php/process.php");
            sol.send(datos);
            break;
        
        case opc == 'state':
            datos.append("t_state", f.T_STATE.value);
            datos.append("name", f.NAME.value);
            datos.append("iso3", f.ISO3.value);
            datos.append("iso2", f.ISO2.value);
            datos.append("numeric_code", f.NUMERIC_CODE.value);
            datos.append("phone_code", f.PHONE_CODE.value);
            datos.append("capital", f.CAPITAL.value);
            datos.append("c_moneda", f.C_MONEDA.value);
            datos.append("tld", f.TLD.value);
            datos.append("region_name", f.REGION_NAME.value);
            datos.append("subregion", f.SUBREGION.value);
            datos.append("nationality", f.NATIONALITY.value);
            datos.append("time_zone_name", f.TIME_ZONE_NAME.value);
            datos.append("latitude", f.LATITUDE.value);
            datos.append("longitude", f.LONGITUDE.value);;

            sol.addEventListener("load", function(e){
                if (e.target.responseText > 0) {
                    swal("Éxito", "El estado se ha modificado con éxito", "success");
                } else{
                    swal("Error", "Ocurrió un error en: " + e.target.responseText, "error");
                }
            });
            
            sol.open("POST", "php/process.php");
            sol.send(datos);
            break;
        
        default:
            swal("Error", "No seleccionaste ninguna opción", "error");
        break;
    }
    
}

//Función para eliminar cualquier registro de una tabla
function deleteRow(opc, id){
    var datos = new FormData();
    var sol = new XMLHttpRequest();

    datos.append("opc", opc);
    datos.append("acc", "delete");
    datos.append("id", id);
    
    swal({
        title: "Estás seguro de eliminar a: " + id + "?",
        text: "Una vez eliminado, no podrás recuperar el registro!",
        icon: "warning",
        buttons: true, 
        dangerMode: true,
        }).then((a) => {
        if (a) {
            sol.addEventListener("load", function(e){
                if (e.target.responseText > 0) {
                    cargarInterfaz(opc, "list", null);
                    swal("Éxito", "Se eliminó correctamente el registro", "success");
                } else{
                    swal("Error", "Ocurrió un error al intentar eliminar el registro en: " + e.target.responseText, "error");
                }
            });
            sol.open("POST", "php/process.php");
            sol.send(datos);
        } else {
          swal("Atención", "El registro no se ha eliminado", "info");
        }
    });
    

}

//Función para login del sistema
function login() {
    var datos = new FormData();
    var sol = new XMLHttpRequest();
    var f = document.querySelector("#form-login");

    datos.append("opc", "login");
    datos.append("acc", "login");
    datos.append("username", f.USERNAME.value);
    datos.append("password", f.PASSWORD.value);

    sol.addEventListener("load", function(e){
        if (e.target.responseText > 0) {
            swal("Bienvenido", "Ahora puedes gestionar el sistema", "success");
            setTimeout(() => {
                location.href="main.html";
            }, 2000);
        } else{
            alert("Error, nombre de usuario o contraseña incorrectos");
        }
    });

    sol.open("POST", "php/process.php");
    sol.send(datos);
}

//Tienda Samava
function cargarCatalog(acc, id){
    var datos = new FormData();
    var sol = new XMLHttpRequest();
    var contenido = document.getElementById("container");

    datos.append("acc", acc);
    datos.append("id", id);

    sol.addEventListener("load", function(e){
        contenido.innerHTML = e.target.responseText;
    });

    sol.open("POST", "../shop/product.php");
    sol.send(datos);
}

function formaPago(formaPago, importe) {
    let datos = document.getElementById("data-pay");
    if (formaPago==1) {
        datos.style.display="block";
        let referencia = parseInt(Math.random() * 10000000); 
        datos.innerHTML = "<h3 class='text-center mb-3'>Detalles del Pago</h3><div class='row'>"+
        "<div class='col-lg-12'><label class='mb-1 fw-bold'>Banco Destino: BBVA Bancomer</label></div>"+
        "<div class='col-lg-12'><label class='mb-1'>CLABE: XXXXXXXXXXXX</label></div>"+
        "<div class='col-lg-12'><label class='mb-1'>Referencia: " + referencia + "</label></div>"+
        "<div class='col-lg-12'><label class='mb-1'>Importe: USD " + importe + "</label></div></div>";
    } else if (formaPago == 4 || formaPago == 3 || formaPago == 28){
        datos.style.display="block";
        datos.innerHTML = "<h3 class='text-center mb-3'>Detalles del Pago</h3><div class='row'><div class='col-lg-6'><label class='mb-1'>Número de la tarjeta</label>" +
        "<input type='number' class='form-control' placeholder='Número de la Tarjeta'/></div></div>" +
        "<div class='row mt-3'><div class='col-lg-6'><label class='mb-1'>Fecha de Expiración</label><input type='number' class='form-control' placeholder='MM/YY'/></div>"+
        "<div class='col-lg-6'><label class='mb-1'>CVV/CVC</label><input type='number' class='form-control' placeholder='CVV/CVC'/></div></div>"+
        "<div class='row mt-3'><div class='col-lg-6'><label class='mb-1'>Nombre para esta tarjeta</label>"+
        "<input type='number' class='form-control' placeholder='Nombre para esta Tarjeta'/></div></div>";
    } else{
        swal("Error", "No seleccionaste una forma de pago", "error");
    }
}

function loadPage() {
    location.href="main.html";
}

function ajax(opc) {
    var datos = new FormData();
    const http = new XMLHttpRequest();
    const url = 'http://localhost/Project_Samava/ajax.php';

    switch (true) {
        case opc=="estado":
            var id = document.querySelector("#C_PAIS").value;
            
            datos.append("id", id);
            datos.append("opc", opc);

            http.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("selectEstado").innerHTML = this.responseText;
                }
            }
        break;

        case opc=="municipio":
            var id = document.querySelector("#C_ESTADO").value;

            datos.append("id", id);
            datos.append("opc", opc);

            http.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("selectMunicipio").innerHTML = this.responseText;
                }
            }
        break;

        case opc=="localidad":
            var id = document.querySelector("#C_MUNICIPIO").value;

            datos.append("id", id);
            datos.append("opc", opc);

            http.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("selectLocalidad").innerHTML = this.responseText;
                }
            }
        break;
        
        case opc=="state":
            var id = document.querySelector("#T_COUNTRY").value;

            datos.append("id", id);
            datos.append("opc", opc);

            http.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("container").innerHTML = this.responseText;
                }
            }
        break;
        
        default:
            swal("Error", "No seleccionaste ninguna opción", "error");
        break;
    }

    http.open("POST", url);
    http.send(datos);
}



//Estructura de datos para los métodos de pago