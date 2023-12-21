<?php

require_once("connection.lib.php");

class Product extends Connection{

    function __construct(){
        $this->open();
    }

    function add($request){
        $ejec = $this->execute("INSERT INTO t_product VALUES(null, '$request[short_description]', '$request[long_description]', '$request[t_service]', '$request[hosted_domains]', 
        '$request[required_size]', '$request[c_claveunidad]', '$request[nombre]', '$request[product_value]', '$request[c_moneda]', '$request[periodicidad]', '$request[c_objetoimp]', 
        '$request[c_impuesto]', '$request[c_tipofactor]', '$request[c_tasa]', '$request[retencion]', '$request[product_tax]', '$request[contract_fee]', '$request[inicio_vigencia]',
        '$request[fin_vigencia]', '0', NOW(), '2309150001', NOW(), '2309150001')");
        return $ejec;
    }

    function consult($id){
        $ejec = $this->execute("SELECT * FROM t_product WHERE T_PRODUCT = $id AND ENTRY_STATUS='0'");
        return $ejec;
    }

    function mod($request){
        $ejec = $this->execute("UPDATE t_product SET SHORT_DESCRIPTION='$request[short_description]', LONG_DESCRIPTION='$request[long_description]', T_SERVICE='$request[t_service]', 
        HOSTED_DOMAINS='$request[hosted_domains]', REQUIRED_SIZE='$request[required_size]', C_CLAVEUNIDAD='$request[c_claveunidad]', NOMBRE='$request[nombre]', 
        PRODUCT_VALUE='$request[product_value]', C_MONEDA='$request[c_moneda]', PERIODICIDAD='$request[periodicidad]', C_OBJETOIMP='$request[c_objetoimp]', C_IMPUESTO='$request[c_impuesto]', 
        C_TIPOFACTOR='$request[c_tipofactor]', C_TASA='$request[c_tasa]', RETENCION='$request[retencion]', PRODUCT_TAX='$request[product_tax]', CONTRACT_FEE='$request[contract_fee]', 
        FECHA_DE_INICIO_DE_VIGENCIA='$request[inicio_vigencia]', FECHA_DE_FIN_DE_VIGENCIA='$request[fin_vigencia]', UPDATE_DATE=NOW() WHERE T_PRODUCT='$request[t_product]'");
        return $ejec;
    }

    function delete($request){
        $ejec = $this->execute("UPDATE t_product SET ENTRY_STATUS='1', UPDATE_DATE=NOW() WHERE T_PRODUCT = '$request[id]'");
        return $ejec;
    }

    function consultProductCatalog(){
        $ejec = $this->execute("SELECT * FROM t_product WHERE ENTRY_STATUS='0'");
        return $ejec;
    }

    function service(){
        $ejec = $this->execute("SELECT * FROM t_service WHERE ENTRY_STATUS='0'");
        return $ejec;
    }

    function claveUnidad(){
        $ejec = $this->execute("SELECT * FROM c_claveunidad WHERE ENTRY_STATUS='0'");
        return $ejec;
    }

    function moneda(){
        $ejec = $this->execute("SELECT * FROM c_moneda WHERE ENTRY_STATUS='0'");
        return $ejec;
    }

    function periodicidad(){
        $ejec = $this->execute("SELECT * FROM c_periodicidad WHERE ENTRY_STATUS='0'");
        return $ejec;
    }

    function objetoImpuesto(){
        $ejec = $this->execute("SELECT * FROM c_objetoimp WHERE ENTRY_STATUS='0'");
        return $ejec;
    }

    function impuesto(){
        $ejec = $this->execute("SELECT * FROM c_impuesto WHERE ENTRY_STATUS='0'");
        return $ejec;
    }

    function tipoFactor(){
        $ejec = $this->execute("SELECT * FROM c_tipofactor WHERE ENTRY_STATUS='0'");
        return $ejec;
    }

    function tasa(){
        $ejec = $this->execute("SELECT C_TASA FROM c_impuesto WHERE ENTRY_STATUS='0'");
        return $ejec;
    }

    function formaPago(){
        $ejec = $this->execute("SELECT * FROM c_formapago WHERE ENTRY_STATUS='0'");
        return $ejec;
    }
}

