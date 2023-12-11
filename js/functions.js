const datos = new FormData();

function cargarInterfaz(opc, acc){
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

// -------------------- Usuarios -------------------- \\
//Función para agregar un registro de la tabla Login
function addLogin(){
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
    var sol = new XMLHttpRequest();
    var f = document.querySelector("#form-add-client");

    datos.append("opc", "client");
    datos.append("acc", "add");
    datos.append("username", f.USERNAME.value);
    datos.append("login_name", f.LOGIN_NAME.value);
    datos.append("login_last_name", f.LOGIN_LAST_NAME.value);
    datos.append("email", f.EMAIL.value);
    datos.append("password", f.PASSWORD.value);
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

// -------------------- Productos -------------------- \\
//Función para  agregar un registro a la tabla producto
function addProduct() {
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

// -------------------- Work Order -------------------- \\
//Función para agregar un registro a la tabla workorder
function addWorkOrder() {
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
    var sol = new XMLHttpRequest();
    var f = document.querySelector("#form-add-workorderflag");

    datos.append("opc", "workorder_flag");
    datos.append("acc", "add");
    datos.append("description", f.DESCRIPTION.value);

    sol.addEventListener("load", function(e){
        if (e.target.responseText > 0) {
            swal("Éxito", "La bandera de orden de trabajo se ha registrado con éxito", "success");
            cargarInterfaz("workorder_flag", "list");
        } else {
            swal("Error", "Ocurrió un error en: " + e.target.responseText, "error");
        }
    });

    sol.open("POST", "php/process.php");
    sol.send(datos);
}


// -------------------- Locations -------------------- \\
//Función para agregar un registro a la tabla region
function addRegion(){
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


// -------------------- Tablas C_Tablas -------------------- \\
//Función para agregar un registro a la tabla pais
function addPais() {
    var sol = new XMLHttpRequest();
    var f = document.querySelector("#form-add-pais");

    datos.append("opc", "pais");
    datos.append("acc", "add");
    datos.append("descripcion", f.DESCRIPCION.value);
    datos.append("code", f.CODE.value);
    datos.append("fcp", f.FCP.value);
    datos.append("frit", f.FRIT.value);
    datos.append("vritr", f.VRITR.value);
    datos.append("agrupaciones", f.AGRUPACIONES.value);

    sol.addEventListener("load", function(e){
        if (e.target.responseText > 0) {
            swal("Éxito", "El país se ha registrado con éxito", "success");
            cargarInterfaz("pais", "list");
        } else {
            swal("Error", "Ocurrió un error en: " + e.target.responseText, "error");
        }
    });

    sol.open("POST", "php/process.php");
    sol.send(datos);
}

//Función para agregar un registro a la tabla estado
function addEstado() {
    var sol = new XMLHttpRequest();
    var f = document.querySelector("#form-add-estado");

    datos.append("opc", "estado");
    datos.append("acc", "add");
    datos.append("descripcion", f.DESCRIPCION.value);
    datos.append("nombre_del_estado", f.NOMBRE_DEL_ESTADO.value);
    datos.append("c_pais", f.C_PAIS.value);
    datos.append("fiv", f.FIV.value);
    datos.append("ffv", f.FFV.value);

    sol.addEventListener("load", function(e){
        if (e.target.responseText > 0) {
            swal("Éxito", "El estado se ha registrado con éxito", "success");
            cargarInterfaz("estado", "list");
        } else {
            swal("Error", "Ocurrió un error en: " + e.target.responseText, "error");
        }
    });

    sol.open("POST", "php/process.php");
    sol.send(datos);
}

//Función para agregar un registro a la tabla municipio
function addMunicipio() {
    var sol = new XMLHttpRequest();
    var f = document.querySelector("#form-add-municipio");

    datos.append("opc", "municipio");
    datos.append("acc", "add");
    datos.append("c_estado", f.C_ESTADO.value);
    datos.append("descripcion", f.DESCRIPCION.value);
    datos.append("fiv", f.FECHA_DE_INICIO_DE_VIGENCIA.value);
    datos.append("ffv", f.FECHA_DE_FIN_DE_VIGENCIA.value);

    sol.addEventListener("load", function(e){
        if (e.target.responseText > 0) {
            swal("Éxito", "El municipio se ha registrado con éxito", "success");
            cargarInterfaz("municipio", "list");
        } else {
            swal("Error", "Ocurrió un error en: " + e.target.responseText, "error");
        }
    });

    sol.open("POST", "php/process.php");
    sol.send(datos);
}

//Función para agregar un registro a la tabla moneda
function addMeses() {
    var sol = new XMLHttpRequest();
    var f = document.querySelector("#form-add-meses");

    datos.append("opc", "meses");
    datos.append("acc", "add");
    datos.append("descripcion", f.DESCRIPCION.value);
    datos.append("fiv", f.FECHA_INICIO_DE_VIGENCIA.value);
    datos.append("ffv", f.FECHA_FIN_DE_VIGENCIA.value);

    sol.addEventListener("load", function(e){
        if (e.target.responseText > 0) {
            swal("Éxito", "El mes se ha registrado con éxito", "success");
            cargarInterfaz("mes", "list");
        } else {
            swal("Error", "Ocurrió un error en: " + e.target.responseText, "error");
            cargarInterfaz("mes", "list");
        }
    });

    sol.open("POST", "php/process.php");
    sol.send(datos);
}

//Función para agregar un registro a la tabla moneda
function addMoneda() {
    var sol = new XMLHttpRequest();
    var f = document.querySelector("#form-add-moneda");

    datos.append("opc", "moneda");
    datos.append("acc", "add");
    datos.append("short_description", f.SHORT_DESCRIPTION.value);
    datos.append("long_description", f.LONG_DESCRIPTION.value);
    datos.append("symbol", f.CURRENCY_SYMBOL.value);
    datos.append("decimales", f.DECIMALES.value);
    datos.append("porcentaje_variacion", f.PORCENTAJE_VARIACION.value);
    datos.append("fiv", f.FECHA_INICIO_DE_VIGENCIA.value);
    datos.append("ffv", f.FECHA_FIN_DE_VIGENCIA.value);

    sol.addEventListener("load", function(e){
        if (e.target.responseText > 0) {
            swal("Éxito", "La moneda se ha registrado con éxito", "success");
            cargarInterfaz("moneda", "list");
        } else {
            swal("Error", "Ocurrió un error en: " + e.target.responseText, "error");
            cargarInterfaz("moneda", "list");
        }
    });

    sol.open("POST", "php/process.php");
    sol.send(datos);
}

//Función para agregar un registro a la tabla Método de Pago
function addMetodoPago() {
    var sol = new XMLHttpRequest();
    var f = document.querySelector("#form-add-metodopago");

    datos.append("opc", "metodoPago");
    datos.append("acc", "add");
    datos.append("short_description", f.SHORT_DESCRIPTION.value);
    datos.append("long_description", f.LONG_DESCRIPTION.value);
    datos.append("fiv", f.FECHA_INICIO_DE_VIGENCIA.value);
    datos.append("ffv", f.FECHA_FIN_DE_VIGENCIA.value);

    sol.addEventListener("load", function(e){
        if (e.target.responseText > 0) {
            swal("Éxito", "El método de pago se ha registrado con éxito", "success");
            cargarInterfaz("metodopago", "list");
        } else {
            swal("Error", "Ocurrió un error en: " + e.target.responseText, "error");
            cargarInterfaz("metodopago", "list");
        }
    });

    sol.open("POST", "php/process.php");
    sol.send(datos);
}

//Función para agregar un registro a la tabla Forma de Pago
function addFormaPago() {
    var sol = new XMLHttpRequest();
    var f = document.querySelector("#form-add-formapago");

    datos.append("opc", "formapago");
    datos.append("acc", "add");
    datos.append("descripcion", f.DESCRIPCION.value);
    datos.append("bancarizado", f.BANCARIZADO.value);
    datos.append("numerooperacion", f.NUMEROOPERACION.value);
    datos.append("rfco", f.RFCO.value);
    datos.append("cuentaordenante", f.CUENTAORDENANTE.value);
    datos.append("rfcb", f.RFCB.value);
    datos.append("cuentabeneficiario", f.CUENTABENEFICIARIO.value);
    datos.append("tipocadena", f.TIPOCADENA.value);
    datos.append("bancoemisor", f.BANCOEMISOR.value);
    datos.append("fiv", f.FECHA_INICIO_DE_VIGENCIA.value);
    datos.append("ffv", f.FECHA_FIN_DE_VIGENCIA.value);

    sol.addEventListener("load", function(e){
        if (e.target.responseText > 0) {
            swal("Éxito", "La forma de pago se ha registrado con éxito", "success");
            cargarInterfaz("formapago", "list");
        } else {
            swal("Error", "Ocurrió un error en: " + e.target.responseText, "error");
            cargarInterfaz("formapago", "list");
        }
    });

    sol.open("POST", "php/process.php");
    sol.send(datos);
}

//Función para agregar un registro a la tabla impuesto
function addImpuesto() {
    var sol = new XMLHttpRequest();
    var f = document.querySelector("#form-add-impuesto");

    datos.append("opc", "impuesto");
    datos.append("acc", "add");
    datos.append("descripcion", f.DESCRIPCION.value);
    datos.append("c_tipofactor", f.C_TIPOFACTOR.value);
    datos.append("c_tasa", f.C_TASA.value);
    datos.append("retencion", f.RETENCION.value);
    datos.append("traslado", f.TRASLADO.value);
    datos.append("localofederal", f.LOCAL_O_FEDERAL.value);
    datos.append("fiv", f.FECHA_INICIO_DE_VIGENCIA.value);
    datos.append("ffv", f.FECHA_FIN_DE_VIGENCIA.value);

    sol.addEventListener("load", function(e){
        if (e.target.responseText > 0) {
            swal("Éxito", "El impuesto se ha registrado con éxito", "success");
            cargarInterfaz("impuesto", "list");
        } else {
            swal("Error", "Ocurrió un error en: " + e.target.responseText, "error");
            cargarInterfaz("impuesto", "list");
        }
    });

    sol.open("POST", "php/process.php");
    sol.send(datos);
}

//Función para agregar un registro a la tabla impuesto
function addObjetoImp() {
    var sol = new XMLHttpRequest();
    var f = document.querySelector("#form-add-objetoimp");

    datos.append("opc", "objetoimp");
    datos.append("acc", "add");
    datos.append("descripcion", f.DESCRIPCION.value);
    datos.append("c_impuesto", f.C_IMPUESTO.value);
    datos.append("fiv", f.FECHA_INICIO_DE_VIGENCIA.value);
    datos.append("ffv", f.FECHA_FIN_DE_VIGENCIA.value);

    sol.addEventListener("load", function(e){
        if (e.target.responseText > 0) {
            swal("Éxito", "El objeto impuesto se ha registrado con éxito", "success");
            cargarInterfaz("objetoimp", "list");
        } else {
            swal("Error", "Ocurrió un error en: " + e.target.responseText, "error");
            cargarInterfaz("objetoimp", "list");
        }
    });

    sol.open("POST", "php/process.php");
    sol.send(datos);
}

//Función para agregar un registro a la tabla exportación
function addExportacion() {
    var sol = new XMLHttpRequest();
    var f = document.querySelector("#form-add-exportacion");

    datos.append("opc", "exportacion");
    datos.append("acc", "add");
    datos.append("descripcion", f.DESCRIPCION.value);
    datos.append("fiv", f.FECHA_INICIO_DE_VIGENCIA.value);
    datos.append("ffv", f.FECHA_FIN_DE_VIGENCIA.value);

    sol.addEventListener("load", function(e){
        if (e.target.responseText > 0) {
            swal("Éxito", "La exportación se ha registrado con éxito", "success");
            cargarInterfaz("exportacion", "list");
        } else {
            swal("Error", "Ocurrió un error en: " + e.target.responseText, "error");
            cargarInterfaz("exportacion", "list");
        }
    });

    sol.open("POST", "php/process.php");
    sol.send(datos);
}

//Función para agregar un registro a la tabla TipoRelación
function addTipoRelacion() {
    var sol = new XMLHttpRequest();
    var f = document.querySelector("#form-add-tiporelacion");

    datos.append("opc", "tiporelacion");
    datos.append("acc", "add");
    datos.append("descripcion", f.DESCRIPCION.value);
    datos.append("fiv", f.FECHA_INICIO_DE_VIGENCIA.value);
    datos.append("ffv", f.FECHA_FIN_DE_VIGENCIA.value);

    sol.addEventListener("load", function(e){
        if (e.target.responseText > 0) {
            swal("Éxito", "El tipo de relación se ha registrado con éxito", "success");
            cargarInterfaz("tiporelacion", "list");
        } else {
            swal("Error", "Ocurrió un error en: " + e.target.responseText, "error");
            cargarInterfaz("tiporelacion", "list");
        }
    });

    sol.open("POST", "php/process.php");
    sol.send(datos);
}

//Función para agregar un registro a la tabla TipoFactor
function addTipoFactor() {
    var sol = new XMLHttpRequest();
    var f = document.querySelector("#form-add-tipofactor");

    datos.append("opc", "tipofactor");
    datos.append("acc", "add");
    datos.append("descripcion", f.DESCRIPCION.value);
    datos.append("fiv", f.FECHA_INICIO_DE_VIGENCIA.value);
    datos.append("ffv", f.FECHA_FIN_DE_VIGENCIA.value);

    sol.addEventListener("load", function(e){
        if (e.target.responseText > 0) {
            swal("Éxito", "El tipo factor se ha registrado con éxito", "success");
            cargarInterfaz("tipofactor", "list");
        } else {
            swal("Error", "Ocurrió un error en: " + e.target.responseText, "error");
            cargarInterfaz("tipofactor", "list");
        }
    });

    sol.open("POST", "php/process.php");
    sol.send(datos);
}

//Función para agregar un registro a la tabla Tipodecomprobante
function addTipoComprobante() {
    var sol = new XMLHttpRequest();
    var f = document.querySelector("#form-add-tipocomprobante");

    datos.append("opc", "tipodecomprobante");
    datos.append("acc", "add");
    datos.append("short_description", f.SHORT_DESCRIPTION.value);
    datos.append("long_description", f.LONG_DESCRIPTION.value);
    datos.append("valor_maximo", f.VALOR_MAXIMO.value);
    datos.append("fiv", f.FECHA_INICIO_DE_VIGENCIA.value);
    datos.append("ffv", f.FECHA_FIN_DE_VIGENCIA.value);

    sol.addEventListener("load", function(e){
        if (e.target.responseText > 0) {
            swal("Éxito", "El tipo de comprobante se ha registrado con éxito", "success");
            cargarInterfaz("tipodecomprobante", "list");
        } else {
            swal("Error", "Ocurrió un error en: " + e.target.responseText, "error");
            cargarInterfaz("tipodecomprobante", "list");
        }
    });

    sol.open("POST", "php/process.php");
    sol.send(datos);
}

//Función para agregar un registro a la tabla RegimenFiscal
function addRegimenFiscal() {
    var sol = new XMLHttpRequest();
    var f = document.querySelector("#form-add-regimenfiscal");

    datos.append("opc", "regimenfiscal");
    datos.append("acc", "add");
    datos.append("descripcion", f.DESCRIPCION.value);
    datos.append("persona_fisica", f.PERSONA_FISICA.value);
    datos.append("persona_moral", f.PERSONA_MORAL.value);
    datos.append("fiv", f.FECHA_INICIO_DE_VIGENCIA.value);
    datos.append("ffv", f.FECHA_FIN_DE_VIGENCIA.value);

    sol.addEventListener("load", function(e){
        if (e.target.responseText > 0) {
            swal("Éxito", "El regimen fiscal se ha registrado con éxito", "success");
            cargarInterfaz("regimenfiscal", "list");
        } else {
            swal("Error", "Ocurrió un error en: " + e.target.responseText, "error");
            cargarInterfaz("regimenfiscal", "list");
        }
    });

    sol.open("POST", "php/process.php");
    sol.send(datos);
}

function addClaveUnidad() {
    var sol = new XMLHttpRequest();
    var f = document.querySelector("#form-add-claveunidad");

    datos.append("opc", "claveunidad");
    datos.append("acc", "add");
    datos.append("short_description", f.SHORT_DESCRIPTION.value);
    datos.append("long_description", f.LONG_DESCRIPTION.value);
    datos.append("descripcion", f.DESCRIPCION.value);
    datos.append("nota", f.NOTA.value);
    datos.append("fiv", f.FECHA_DE_INICIO_DE_VIGENCIA.value);
    datos.append("ffv", f.FECHA_DE_FIN_DE_VIGENCIA.value);
    datos.append("simbolo", f.SIMBOLO.value);

    sol.addEventListener("load", function(e){
        if (e.target.responseText > 0) {
            swal("Éxito", "La clave unidad se ha registrado con éxito", "success");
            cargarInterfaz("claveunidad", "list");
        } else {
            swal("Error", "Ocurrió un error en: " + e.target.responseText, "error");
            cargarInterfaz("claveunidad", "list");
        }
    });

    sol.open("POST", "php/process.php");
    sol.send(datos);
}

function addPeriodicidad() {
    var sol = new XMLHttpRequest();
    var f = document.querySelector("#form-add-periodicidad");

    datos.append("opc", "periodicidad");
    datos.append("acc", "add");
    datos.append("descripcion", f.DESCRIPCION.value);
    datos.append("valor_diario", f.VALOR_DIARIO.value);
    datos.append("valor_semanal", f.VALOR_SEMANAL.value);
    datos.append("valor_quincenal", f.VALOR_QUINCENAL.value);
    datos.append("valor_mensual", f.VALOR_MENSUAL.value);
    datos.append("valor_bimestral", f.VALOR_BIMESTRAL.value);
    datos.append("valor_trimestral", f.VALOR_TRIMESTRAL.value);
    datos.append("valor_cuatrimestral", f.VALOR_CUATRIMESTRAL.value);
    datos.append("valor_semestral", f.VALOR_SEMESTRAL.value);
    datos.append("valor_anual", f.VALOR_ANUAL.value);
    datos.append("valor_catorcenal", f.VALOR_CATORCENAL.value);
    datos.append("fiv", f.FECHA_INICIO_DE_VIGENCIA.value);
    datos.append("ffv", f.FECHA_FIN_DE_VIGENCIA.value);

    sol.addEventListener("load", function(e){
        if (e.target.responseText > 0) {
            swal("Éxito", "La periodicidad se ha registrado con éxito", "success");
            cargarInterfaz("periodicidad", "list");
        } else {
            swal("Error", "Ocurrió un error en: " + e.target.responseText, "error");
            cargarInterfaz("periodicidad", "list");
        }
    });

    sol.open("POST", "php/process.php");
    sol.send(datos);
}

// -------------------- Funciones -------------------- \\
//Función para cargar interfaz para modificar
function interfaceMod(opc, id){
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
    var sol = new XMLHttpRequest();
    var f =  document.querySelector("#form-mod-"+opc);
    
    datos.append("opc", opc);
    datos.append("acc", "mod");

    switch (true) {
        //Usuarios
        case opc == 'login':
            datos.append("t_login", f.T_LOGIN.value);
            datos.append("login_role", f.LOGIN_ROLE.value);
                
            sol.addEventListener("load", function(e){
                if (e.target.responseText > 0) {
                    swal("Éxito", "El login se ha modificado con éxito", "success");
                    cargarInterfaz("login", "list");
                } else{
                    swal("Error", "Ocurrió un error en: " + e.target.responseText, "error");
                    cargarInterfaz("login", "list");
                }
            });

            sol.open("POST", "php/process.php");
            sol.send(datos);
        break;

        case opc == 'client':
            datos.append("t_client", f.T_CLIENT.value);
            datos.append("username", f.USERNAME.value);
            datos.append("login_name", f.LOGIN_NAME.value);
            datos.append("login_last_name", f.LOGIN_LAST_NAME.value);
            datos.append("email", f.EMAIL.value);
            datos.append("password", f.PASSWORD.value);
            datos.append("cellphone", f.CELLPHONE.value);
            datos.append("phone", f.PHONE.value);
            datos.append("t_login", f.T_LOGIN.value);
            datos.append("t_taxid", f.T_TAXID.value);
            datos.append("t_workorder", f.T_WORKORDER.value);

            sol.addEventListener("load", function(e){
                if (e.target.responseText > 0) {
                    swal("Éxito", "El cliente se ha modificado con éxito", "success");
                    cargarInterfaz("client", "list");
                } else{
                    swal("Error", "Ocurrió un error en: " + e.target.responseText, "error");
                    cargarInterfaz("client", "list");
                }
            });
            
            sol.open("POST", "php/process.php");
            sol.send(datos);
        break;
        
        case opc == 'taxid':
            datos.append("t_taxid", f.T_TAXID.value);
            datos.append("rfc", f.RFC.value);
            datos.append("address", f.ADDRESS.value);
            datos.append("c_pais", f.C_PAIS.value);
            datos.append("c_estado", f.C_ESTADO.value);
            datos.append("c_municipio", f.C_MUNICIPIO.value);
            datos.append("c_localidad", f.C_LOCALIDAD.value);
            datos.append("c_codigopostal", f.C_CODIGOPOSTAL.value);
            datos.append("c_colonia", f.C_COLONIA.value);
            datos.append("c_regimenfiscal", f.C_REGIMENFISCAL.value);
            datos.append("c_usocfdi", f.C_USOCFDI.value);

            sol.addEventListener("load", function(e){
                if (e.target.responseText > 0) {
                    swal("Éxito", "El taxid se ha modificado con éxito", "success");
                    cargarInterfaz("taxid", "list");
                } else{
                    swal("Error", "Ocurrió un error en: " + e.target.responseText, "error");
                    cargarInterfaz("taxid", "list");
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
                    cargarInterfaz("role", "list");
                } else{
                    swal("Error", "Ocurrió un error en: " + e.target.responseText, "error");
                    cargarInterfaz("role", "list");
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
                    cargarInterfaz("privilege", "list");
                } else{
                    swal("Error", "Ocurrió un error en: " + e.target.responseText, "error");
                    cargarInterfaz("privilege", "list");
                }
            });
            
            sol.open("POST", "php/process.php");
            sol.send(datos);
        break;
        
        //Productos
        case opc == 'product':
            datos.append("t_product", f.T_PRODUCT.value);
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
                    cargarInterfaz("product", "list");
                } else{
                    swal("Error", "Ocurrió un error en: " + e.target.responseText, "error");
                    cargarInterfaz("product", "list");
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
                    cargarInterfaz("service", "list");
                } else{
                    swal("Error", "Ocurrió un error en: " + e.target.responseText, "error");
                    cargarInterfaz("service", "list");
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
                    cargarInterfaz("storage", "list");
                } else{
                    swal("Error", "Ocurrió un error en: " + e.target.responseText, "error");
                    cargarInterfaz("storage", "list");
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
                    cargarInterfaz("partition", "list");
                } else{
                    swal("Error", "Ocurrió un error en: " + e.target.responseText, "error");
                    cargarInterfaz("partition", "list");
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
                    cargarInterfaz("workorder", "list");
                } else{
                    swal("Error", "Ocurrió un error en: " + e.target.responseText, "error");
                    cargarInterfaz("workorder", "list");
                }
            });
            
            sol.open("POST", "php/process.php");
            sol.send(datos);
        break;
        
        case opc == 'workorder_flag':
            datos.append("t_workorder_flag", f.T_WORKORDER_FLAG.value);
            datos.append("description", f.DESCRIPTION.value);

            sol.addEventListener("load", function(e){
                if (e.target.responseText > 0) {
                    swal("Éxito", "La bandera de orden de trabajo se ha modificado con éxito", "success");
                    cargarInterfaz("workorder_flag", "list");
                } else{
                    swal("Error", "Ocurrió un error en: " + e.target.responseText, "error");
                    cargarInterfaz("workorder_flag", "list");
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
                    cargarInterfaz("region", "list");
                } else{
                    swal("Error", "Ocurrió un error en: " + e.target.responseText, "error");
                    cargarInterfaz("region", "list");
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
                    cargarInterfaz("subregion", "list");
                } else{
                    swal("Error", "Ocurrió un error en: " + e.target.responseText, "error");
                    cargarInterfaz("subregion", "list");
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
                    cargarInterfaz("country", "list");
                } else{
                    swal("Error", "Ocurrió un error en: " + e.target.responseText, "error");
                    cargarInterfaz("country", "list");
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
                    cargarInterfaz("state", "list");
                } else{
                    swal("Error", "Ocurrió un error en: " + e.target.responseText, "error");
                    cargarInterfaz("state", "list");
                }
            });
            
            sol.open("POST", "php/process.php");
            sol.send(datos);
            break;
        
        //TABLAS SECUNDARIAS
        case opc == 'pais':
            datos.append("descripcion", f.DESCRIPCION.value);
            datos.append("code", f.CODE.value);
            datos.append("fcp", f.FORMATO_DE_CODIGO_POSTAL.value);
            datos.append("frit", f.FORMATO_DE_REGISTRO_DE_IDENTIDAD_TRIBUTARIA.value);
            datos.append("vritr", f.VALIDACION_DEL_REGISTRO_DE_IDENTIDAD_TRIBUTARIA.value);
            datos.append("agrupaciones", f.AGRUPACIONES.value);

            sol.addEventListener("load", function(e){
                if (e.target.responseText > 0) {
                    swal("Éxito", "El país se ha modificado con éxito", "success");
                    cargarInterfaz("pais", "list");
                } else{
                    swal("Error", "Ocurrió un error en: " + e.target.responseText, "error");
                    cargarInterfaz("pais", "list");
                }
            });
            
            sol.open("POST", "php/process.php");
            sol.send(datos);
            break;    
        
        case opc == 'estado':
            console.log("hola");
            break;    
        
        case opc == 'meses':
            datos.append("c_meses", f.C_MESES.value);
            datos.append("descripcion", f.DESCRIPCION.value);
            datos.append("fiv", f.FECHA_INICIO_DE_VIGENCIA.value);
            datos.append("ffv", f.FECHA_FIN_DE_VIGENCIA.value);

            sol.addEventListener("load", function(e){
                if (e.target.responseText > 0) {
                    swal("Éxito", "El mes se ha modificado con éxito", "success");
                    cargarInterfaz("meses", "list");
                } else{
                    swal("Error", "Ocurrió un error en: " + e.target.responseText, "error");
                    cargarInterfaz("meses", "list");
                }
            });
            
            sol.open("POST", "php/process.php");
            sol.send(datos);
        break;
        
        case opc == 'moneda':
            datos.append("c_moneda", f.C_MONEDA.value);
            datos.append("short_description", f.SHORT_DESCRIPTION.value);
            datos.append("long_description", f.LONG_DESCRIPTION.value);
            datos.append("symbol", f.CURRENCY_SYMBOL.value);
            datos.append("decimales", f.DECIMALES.value);
            datos.append("porcentaje_variacion", f.PORCENTAJE_VARIACION.value);
            datos.append("fiv", f.FECHA_INICIO_DE_VIGENCIA.value);
            datos.append("ffv", f.FECHA_FIN_DE_VIGENCIA.value);

            sol.addEventListener("load", function(e){
                if (e.target.responseText > 0) {
                    swal("Éxito", "La moneda se ha modificado con éxito", "success");
                    cargarInterfaz("moneda", "list");
                } else{
                    swal("Error", "Ocurrió un error en: " + e.target.responseText, "error");
                    cargarInterfaz("moneda", "list");
                }
            });
            
            sol.open("POST", "php/process.php");
            sol.send(datos);
        break;
        
        case opc == 'metodopago':
            datos.append("c_metodopago", f.C_METODOPAGO.value);
            datos.append("short_description", f.SHORT_DESCRIPTION.value);
            datos.append("long_description", f.LONG_DESCRIPTION.value);
            datos.append("fiv", f.FECHA_INICIO_DE_VIGENCIA.value);
            datos.append("ffv", f.FECHA_FIN_DE_VIGENCIA.value);

            sol.addEventListener("load", function(e){
                if (e.target.responseText > 0) {
                    swal("Éxito", "El método de pago se ha modificado con éxito", "success");
                    cargarInterfaz("metodopago", "list");
                } else{
                    swal("Error", "Ocurrió un error en: " + e.target.responseText, "error");
                    cargarInterfaz("metodopago", "list");
                }
            });
            
            sol.open("POST", "php/process.php");
            sol.send(datos);
        break;

        case opc == 'formapago':
            datos.append("c_formapago", f.C_FORMAPAGO.value);
            datos.append("descripcion", f.DESCRIPCION.value);
            datos.append("bancarizado", f.BANCARIZADO.value);
            datos.append("numerooperacion", f.NUMERO_DE_OPERACION.value);
            datos.append("rfco", f.RFC_DEL_EMISOR_DE_LA_CUENTA_ORDENANTE.value);
            datos.append("cuentaordenante", f.CUENTA_ORDENANTE.value);
            datos.append("rfcb", f.RFC_DEL_EMISOR_CUENTA_DE_BENEFICIARIO.value);
            datos.append("cuentabeneficiario", f.CUENTA_DE_BENENFICIARIO.value);
            datos.append("tipocadena", f.TIPO_CADENA_PAGO.value);
            datos.append("bancoemisor", f.BANCO_EMISOR_CUENTA_ORDENANTE_EXT.value);
            datos.append("fiv", f.FECHA_INICIO_DE_VIGENCIA.value);
            datos.append("ffv", f.FECHA_FIN_DE_VIGENCIA.value);

            sol.addEventListener("load", function(e){
                if (e.target.responseText > 0) {
                    swal("Éxito", "La forma de pago se ha modificado con éxito", "success");
                    cargarInterfaz("formapago", "list");
                } else{
                    swal("Error", "Ocurrió un error en: " + e.target.responseText, "error");
                    cargarInterfaz("formapago", "list");
                }
            });
            
            sol.open("POST", "php/process.php");
            sol.send(datos);
        break;
        
        case opc == 'impuesto':
            datos.append("c_impuesto", f.C_IMPUESTO.value);
            datos.append("descripcion", f.DESCRIPCION.value);
            datos.append("c_tipofactor", f.C_TIPOFACTOR.value);
            datos.append("c_tasa", f.C_TASA.value);
            datos.append("retencion", f.RETENCION.value);
            datos.append("traslado", f.TRASLADO.value);
            datos.append("localofederal", f.LOCAL_O_FEDERAL.value);
            datos.append("fiv", f.FECHA_INICIO_DE_VIGENCIA.value);
            datos.append("ffv", f.FECHA_FIN_DE_VIGENCIA.value);

            sol.addEventListener("load", function(e){
                if (e.target.responseText > 0) {
                    swal("Éxito", "El impuesto se ha modificado con éxito", "success");
                    cargarInterfaz("impuesto", "list");
                } else{
                    swal("Error", "Ocurrió un error en: " + e.target.responseText, "error");
                    cargarInterfaz("impuesto", "list");
                }
            });
            
            sol.open("POST", "php/process.php");
            sol.send(datos);
        break;
        
        case opc == 'objetoimp':
            datos.append("c_objetoimp", f.C_OBJETOIMP.value);
            datos.append("descripcion", f.DESCRIPCION.value);
            datos.append("c_impuesto", f.C_IMPUESTO.value);
            datos.append("fiv", f.FECHA_INICIO_DE_VIGENCIA.value);
            datos.append("ffv", f.FECHA_FIN_DE_VIGENCIA.value);

            sol.addEventListener("load", function(e){
                if (e.target.responseText > 0) {
                    swal("Éxito", "El objeto impuesto se ha modificado con éxito", "success");
                    cargarInterfaz("objetoimp", "list");
                } else{
                    swal("Error", "Ocurrió un error en: " + e.target.responseText, "error");
                    cargarInterfaz("objetoimp", "list");
                }
            });
            
            sol.open("POST", "php/process.php");
            sol.send(datos);
        break;
      
        case opc == 'exportacion':
            datos.append("c_exportacion", f.C_EXPORTACION.value);
            datos.append("descripcion", f.DESCRIPCION.value);
            datos.append("fiv", f.FECHA_INICIO_DE_VIGENCIA.value);
            datos.append("ffv", f.FECHA_FIN_DE_VIGENCIA.value);

            sol.addEventListener("load", function(e){
                if (e.target.responseText > 0) {
                    swal("Éxito", "La exportación se ha modificado con éxito", "success");
                    cargarInterfaz("exportacion", "list");
                } else{
                    swal("Error", "Ocurrió un error en: " + e.target.responseText, "error");
                    cargarInterfaz("exportacion", "list");
                }
            });
            
            sol.open("POST", "php/process.php");
            sol.send(datos);
        break;

        case opc == 'tiporelacion':
            datos.append("c_tiporelacion", f.C_TIPORELACION.value);
            datos.append("descripcion", f.DESCRIPCION.value);
            datos.append("fiv", f.FECHA_INICIO_DE_VIGENCIA.value);
            datos.append("ffv", f.FECHA_FIN_DE_VIGENCIA.value);

            sol.addEventListener("load", function(e){
                if (e.target.responseText > 0) {
                    swal("Éxito", "El tipo de relación se ha modificado con éxito", "success");
                    cargarInterfaz("tiporelacion", "list");
                } else{
                    swal("Error", "Ocurrió un error en: " + e.target.responseText, "error");
                    cargarInterfaz("tiporelacion", "list");
                }
            });
            
            sol.open("POST", "php/process.php");
            sol.send(datos);
            break;
        
        case opc == 'tipofactor':
            datos.append("c_tipofactor", f.C_TIPOFACTOR.value);
            datos.append("descripcion", f.DESCRIPCION.value);
            datos.append("fiv", f.FECHA_INICIO_DE_VIGENCIA.value);
            datos.append("ffv", f.FECHA_FIN_DE_VIGENCIA.value);

            sol.addEventListener("load", function(e){
                if (e.target.responseText > 0) {
                    swal("Éxito", "El tipo factor se ha modificado con éxito", "success");
                    cargarInterfaz("tipofactor", "list");
                } else{
                    swal("Error", "Ocurrió un error en: " + e.target.responseText, "error");
                    cargarInterfaz("tipofactor", "list");
                }
            });
            
            sol.open("POST", "php/process.php");
            sol.send(datos);
            break;
        
        case opc == 'tipodecomprobante':
            datos.append("c_tipodecomprobante", f.C_TIPODECOMPROBANTE.value);
            datos.append("short_description", f.SHORT_DESCRIPTION.value);
            datos.append("long_description", f.LONG_DESCRIPTION.value);
            datos.append("valor_maximo", f.VALOR_MAXIMO.value);
            datos.append("fiv", f.FECHA_INICIO_DE_VIGENCIA.value);
            datos.append("ffv", f.FECHA_FIN_DE_VIGENCIA.value);

            sol.addEventListener("load", function(e){
                if (e.target.responseText > 0) {
                    swal("Éxito", "El tipo de comprobante se ha modificado con éxito", "success");
                    cargarInterfaz("tipodecomprobante", "list");
                } else{
                    swal("Error", "Ocurrió un error en: " + e.target.responseText, "error");
                    cargarInterfaz("tipodecomprobante", "list");
                }
            });
            
            sol.open("POST", "php/process.php");
            sol.send(datos);
            break;

        case opc == 'regimenfiscal':
            datos.append("c_regimenfiscal", f.C_REGIMENFISCAL.value);
            datos.append("descirpcion", f.DESCRIPCION.value);
            datos.append("persona_fisica", f.PERSONA_FISICA.value);
            datos.append("persona_moral", f.PERSONA_MORAL.value);
            datos.append("fiv", f.FECHA_DE_INICIO_DE_VIGENCIA.value);
            datos.append("ffv", f.FECHA_DE_FIN_DE_VIGENCIA.value);

            sol.addEventListener("load", function(e){
                if (e.target.responseText > 0) {
                    swal("Éxito", "El régimen fiscal se ha modificado con éxito", "success");
                    cargarInterfaz("regimenfiscal", "list");
                } else{
                    swal("Error", "Ocurrió un error en: " + e.target.responseText, "error");
                    cargarInterfaz("regimenfiscal", "list");
                }
            });
            
            sol.open("POST", "php/process.php");
            sol.send(datos);
            break;

        case opc == 'claveunidad':
            datos.append("c_claveunidad", f.C_CLAVEUNIDAD.value);
            datos.append("short_description", f.SHORT_DESCRIPTION.value);
            datos.append("long_description", f.LONG_DESCRIPTION.value);
            datos.append("descripcion", f.DESCRIPCION.value);
            datos.append("nota", f.NOTA.value);
            datos.append("fiv", f.FECHA_DE_INICIO_DE_VIGENCIA.value);
            datos.append("ffv", f.FECHA_DE_FIN_DE_VIGENCIA.value);
            datos.append("simbolo", f.SIMBOLO.value);

            sol.addEventListener("load", function(e){
                if (e.target.responseText > 0) {
                    swal("Éxito", "La clave unidad se ha modificado con éxito", "success");
                    cargarInterfaz("claveunidad", "list");
                } else{
                    swal("Error", "Ocurrió un error en: " + e.target.responseText, "error");
                    cargarInterfaz("claveunidad", "list");
                }
            });
            
        case opc == 'periodicidad':
            datos.append("c_periodicidad", f.C_PERIODICIDAD.value);
            datos.append("descripcion", f.DESCRIPCION.value);
            datos.append("valor_diario", f.VALOR_DIARIO.value);
            datos.append("valor_semanal", f.VALOR_SEMANAL.value);
            datos.append("valor_quincenal", f.VALOR_QUINCENAL.value);
            datos.append("valor_mensual", f.VALOR_MENSUAL.value);
            datos.append("valor_bimestral", f.VALOR_BIMESTRAL.value);
            datos.append("valor_trimestral", f.VALOR_TRIMESTRAL.value);
            datos.append("valor_cuatrimestral", f.VALOR_CUATRIMESTRAL.value);
            datos.append("valor_semestral", f.VALOR_SEMESTRAL.value);
            datos.append("valor_anual", f.VALOR_ANUAL.value);
            datos.append("valor_catorcenal", f.VALOR_CATORCENAL.value);
            datos.append("fiv", f.FECHA_INICIO_DE_VIGENCIA.value);
            datos.append("ffv", f.FECHA_FIN_DE_VIGENCIA.value);

            sol.addEventListener("load", function(e){
                if (e.target.responseText > 0) {
                    swal("Éxito", "La periodicidad se ha modificado con éxito", "success");
                    cargarInterfaz("periodicidad", "list");
                } else{
                    swal("Error", "Ocurrió un error en: " + e.target.responseText, "error");
                    cargarInterfaz("periodicidad", "list");
                }
            });
            
            sol.open("POST", "php/process.php");
            sol.send(datos);
            break;
 

        default:
            swal("Error", "No seleccionaste ninguna opción en js", "error");
        break;
    }
    
}

//Función para eliminar cualquier registro de una tabla
function deleteRow(opc, id){
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

// -------------------- Login -------------------- \\
//Función para login del sistema
function login() {
    var sol = new XMLHttpRequest();
    var f = document.querySelector("#form-login");

    datos.append("opc", "login");
    datos.append("acc", "login");

    var username=f.USERNAME.value;
    var password=f.PASSWORD.value;
    
    if (username!='' && password!='') {
        datos.append("username", username);
        datos.append("password", password);
    } else{
        swal("Error", "Usuario o contraseña vacíos", "error");
    }

    sol.addEventListener("load", function(e){
        if (e.target.responseText == 1) {
            window.location.href = "/Project_Samava/main.html"
        } else if(e.target.responseText == 2){
            window.location.href = "/Project_Samava/shop/catalog.php";
        }else{
            swal("Error", "Usuario o contraseña incorrectos", "error");
        }
    });

    sol.open("POST", "php/process.php");
    sol.send(datos);
}

// -------------------- Tienda Samava -------------------- \\
function cargarCatalog(acc, id){
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
    datos.innerHTML = "<h3 class='text-center mb-3'>Detalles del Pago</h3>";
    if (formaPago==3) {
        datos.style.display="block";
        let referencia = parseInt(Math.random() * 10000000); 
        datos.innerHTML += "<div class='row'><div class='col-lg-12'><label class='mb-1 fw-bold'>Banco Destino: BBVA Bancomer</label></div>"+
        "<div class='col-lg-12'><label class='mb-1'>CLABE: XXXXXXXXXXXX</label></div>"+
        "<div class='col-lg-12'><label class='mb-1'>Referencia: " + referencia + "</label></div>"+
        "<div class='col-lg-12'><label class='mb-1'>Importe: USD " + importe + "</label></div></div>";
    }else if(formaPago == 1){
        datos.style.display = "block";
        let referencia = parseInt(Math.random() * 10000000); 
        datos.innerHTML += "<div class='row'><div class='col-lg-12'><label class='mb-1 fw-bold'>Favor de realizar su pago en:</label></div>"+
        "<div class='col-lg-12'><label class='mb-1'>Domicilio: San Juan del Río #00, colonia 'San juan'</label></div>"+
        "<div class='col-lg-12'><label class='mb-1'>Referencia: " + referencia + "</label></div>"+
        "<div class='col-lg-12'><label class='mb-1'>Importe a pagar: USD " + importe + "</label></div></div>";
    } else if (formaPago == 4 || formaPago == 28){
        datos.style.display="block";
        datos.innerHTML += "<div class='row'><div class='col-lg-6'><label class='mb-1'>Número de la tarjeta</label>" +
        "<input type='number' class='form-control' placeholder='Número de la Tarjeta'/></div></div>" +
        "<div class='row mt-3'><div class='col-lg-6'><label class='mb-1'>Fecha de Expiración</label><input type='number' class='form-control' placeholder='MM/YY'/></div>"+
        "<div class='col-lg-6'><label class='mb-1'>CVV/CVC</label><input type='number' class='form-control' placeholder='CVV/CVC'/></div></div>"+
        "<div class='row mt-3'><div class='col-lg-6'><label class='mb-1'>Nombre para esta tarjeta</label>"+
        "<input type='number' class='form-control' placeholder='Nombre para esta Tarjeta'/></div></div>";
    } else{
        swal("Error", "No seleccionaste una forma de pago", "error");
    }
}

let dominio = "";

function validar() {
    var sol = new XMLHttpRequest();
    var f = document.querySelector("#form-domain");

    datos.append("opc", "dominio");
    datos.append("acc", "valida");
    datos.append("name_domain", f.NAME_DOMAIN.value);
    datos.append("com", f.DOMAIN_NAME.value);
    dominio=f.NAME_DOMAIN.value+f.DOMAIN_NAME.value;

    if (f.NAME_DOMAIN.value != '') {
        sol.addEventListener("load", function(e){
            var buttons = document.getElementById("buttons-pay");
            if (e.target.responseText == 1) {
                swal("Validado", "El nombre del dominio ingresado es correcto", "success");
                buttons.style.display = "block";
                buttons.innerHTML="<button class='btn btn-success p-2 me-5' onclick='javascript:ajax(\"comprar\")'>Confirmar Compra</button>" +
                "<button class='btn btn-danger p-2' onclick='javascript:cargarCatalog(\"list\", null);'><i class='bi bi-x-circle-fill me-2'></i>Cancelar Compra</button>";
            } else {
                buttons.style.display = "none";
                swal("Error", "Ingresa un nombre diferente", "error");
            }
        });
    } else{
        swal("Error", "El campo está vacío", "error");
    }

    sol.open("POST", "../php/process.php");
    sol.send(datos);
}

// ------------------- Peticiones Ajax -------------------- \\
function loadPage() {
    location.href="main.html";
}

function ajax(opc) {
    const http = new XMLHttpRequest();
    const url = 'http://localhost/Project_Samava/php/ajax.php';

    switch (true) {
        case opc == "estado":
            var id = document.querySelector("#C_PAIS").value;
        
            datos.append("id", id);
            datos.append("opc", opc);

            http.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("selectEstado").innerHTML = this.responseText;
                }
            }
        break;

        case opc == "municipio":
            var id = document.querySelector("#C_ESTADO").value;

            datos.append("id", id);
            datos.append("opc", opc);

            http.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("selectMunicipio").innerHTML = this.responseText;
                }
            }
        break;

        case opc == "localidad":
            var id = document.querySelector("#C_MUNICIPIO").value;

            datos.append("id", id);
            datos.append("opc", opc);

            http.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("selectLocalidad").innerHTML = this.responseText;
                }
            }
        break;
        
        case opc == "state":
            var id = document.querySelector("#T_COUNTRY").value;

            datos.append("id", id);
            datos.append("opc", opc);

            http.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("container").innerHTML = this.responseText;
                }
            }
        break;
        
        case opc == "consult":
            var valor = document.querySelector("#consulta").value;

            datos.append("valor", valor);
            datos.append("opc", opc);

            http.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("container").innerHTML = this.responseText;
                }
            }
            break;
        
        case opc == "comprar":
            var f = document.querySelector("#form-comprar");
            var formaPago = '';
                
            datos.append("opc", opc);
            console.log(f.NOMBRE.value);
            //datos.append("forma_pago", f.FORMA_PAGO.value);

            if (document.getElementById('1').checked) {
                formaPago = 'Efectivo';
            } else if(document.getElementById('3').checked){
                formaPago = 'Transferencia';
            } else if(document.getElementById('4').checked || document.getElementById('28').checked){
                formaPago = 'Tarjeta de credito';
            }

            if (formaPago!='') {
                datos.append("pago", formaPago);
        
                http.onreadystatechange = function () {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("container").innerHTML = this.responseText;
                    }
                }
            
                http.open("POST", url);
                http.send(datos);
            } else{
                swal("Error", "Selecciona una forma de pago", "error");
            }
            break;

        default:
            swal("Error", "No seleccionaste ninguna opción", "error");
        break;
    }

    http.open("POST", url);
    http.send(datos);
}

// -------------------- ViewUser -------------------- \\

function cargarModulo(opc, acc){
    var sol = new XMLHttpRequest();
    var contenido = document.getElementById("container-general");

    datos.append("opc", opc);
    datos.append("acc", acc);

    sol.addEventListener("load", function(e){
        contenido.innerHTML = e.target.responseText;
    });

    sol.open("POST", "../php/viewuser.php");
    sol.send(datos);
}