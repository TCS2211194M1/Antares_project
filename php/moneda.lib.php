<?php
require_once("connection.lib.php");

class Moneda extends Connection {
    
    function __construct(){
        $this->open();
    }

    function add($request){
        $ejec = $this->execute("INSERT INTO c_moneda VALUES(NULL, '$request[short_description]', '$request[long_description]', '$request[symbol]', '$request[decimales]',
        '$request[porcentaje_variacion]', '$request[fiv]', '$request[ffv]', '0', NOW(), '2309150001', NOW(), '2309150001')");
        return $ejec;
    }

    function consult($id){
        $ejec = $this->execute("SELECT * FROM c_moneda WHERE C_MONEDA = $id AND ENTRY_STATUS='0'");
        return $ejec;
    }

    function mod($request)
    {
        $ejec = $this->execute("UPDATE c_moneda SET SHORT_DESCRIPTION='$request[short_description]', LONG_DESCRIPTION='$request[long_description]', 
        CURRENCY_SYMBOL='$request[symbol]', DECIMALES='$request[decimales]', PORCENTAJE_VARIACION='$request[porcentaje_variacion]', FECHA_INICIO_DE_VIGENCIA='$request[fiv]', 
        FECHA_FIN_DE_VIGENCIA='$request[ffv]', UPDATE_DATE=NOW() WHERE C_MONEDA = '$request[c_moneda]'");
        return $ejec;
    }

    function delete($request){
        $ejec = $this->execute("UPDATE c_moneda SET ENTRY_STATUS='1', UPDATE_DATE=NOW() WHERE C_MONEDA = '$request[id]'");
        return $ejec;
    }
}

?>