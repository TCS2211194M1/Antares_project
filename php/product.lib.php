<?php

require_once("connection.lib.php");

class Product extends Connection{

    function __construct(){
        $this->open();
    }

    function add($request){
        $ejec = $this->execute("INSERT INTO t_product VALUES('999', '$request[short_description]', '$request[long_description]', '$request[t_service]', '$request[hosted_domains]', 
        '$request[required_size]', '$request[c_claveunidad]', '$request[nombre]', '$request[product_value]', '$request[c_moneda]', '$request[periodicidad]', '$request[c_objetoimp]', 
        '$request[c_impuesto]', '$request[c_tipofactor]', '$request[c_tasa]', '$request[retencion]', '$request[product_tax]', '$request[contract_fee]', '$request[inicio_vigencia]',
        '$request[fin_vigencia]', '0', NOW(), '2309150001', NOW(), '2309150001')");
        return $ejec;
    }

    function delete($request){
        $ejec = $this->execute("UPDATE t_product SET ENTRY_STATUS='1', UPDATE_DATE=NOW() WHERE T_PRODUCT = '$request[id]'");
        return $ejec;
    }

    function consult(){
        $ejec = $this->execute("SELECT * FROM t_product WHERE ENTRY_STATUS='0'");
        return $ejec;
    }

    function consultProduct($id){
        $ejec = $this->execute("SELECT * FROM t_product WHERE T_PRODUCT = $id AND ENTRY_STATUS='0'");
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

