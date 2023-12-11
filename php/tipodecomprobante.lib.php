<?php
require_once("connection.lib.php");

class TipodeComprobante extends Connection {
    
    function __construct(){
        $this->open();
    }

    function add($request){
        $ejec = $this->execute("INSERT INTO c_tipodecomprobante VALUES(NULL, '$request[short_description]', '$request[long_description]', '$request[valor_maximo]',
        '$request[fiv]', '$request[ffv]', '0', NOW(), '2309150001', NOW(), '2309150001')");
        return $ejec;
    }

    function consult($id){
        $ejec = $this->execute("SELECT * FROM c_tipodecomprobante WHERE C_TIPODECOMPROBANTE = $id AND ENTRY_STATUS='0'");
        return $ejec;
    }

    function mod($request){
        $ejec = $this->execute("UPDATE c_tipodecomprobante SET SHORT_DESCRIPTION='$request[short_description]', LONG_DESCRIPTION='$request[long_description]', 
        VALOR_MAXIMO='$request[valor_maximo]', FECHA_INICIO_DE_VIGENCIA='$request[fiv]', FECHA_FIN_DE_VIGENCIA='$request[ffv]', 
        UPDATE_DATE=NOW() WHERE C_TIPODECOMPROBANTE = '$request[c_tipodecomprobante]'");
        return $ejec;
    }

    function delete($request){
        $ejec = $this->execute("UPDATE c_tipodecomprobante SET ENTRY_STATUS='1', UPDATE_DATE=NOW() WHERE C_TIPODECOMPROBANTE = '$request[id]'");
        return $ejec;
    }
    
}

?>