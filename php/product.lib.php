<?php

require_once("connection.lib.php");

class Product extends Connection{

    function __construct(){
        $this->open();
    }

    function list($opc){
        if ($opc == null) {
            $consult = $this->execute("SELECT * FROM t_product where entry_status='0'");
        } else{
            $consult = $this->execute("SELECT * FROM t_product where entry_status='0' and T_PRODUCT='$opc'");
        }
        return $consult;
    }

    function listServices(){
        $consult = $this->execute("SELECT * FROM t_service where entry_status='0'");
        return $consult;
    }

    function listMonedas(){
        $consult = $this->execute("SELECT * FROM c_moneda where entry_status='0'");
        return $consult;
    }

    function listImpuesto(){
        $consult = $this->execute("SELECT * FROM c_impuesto where entry_status='0'");
        return $consult;
    }
}

