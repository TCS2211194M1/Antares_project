<?php
require_once("connection.lib.php");

class MetodoPago extends Connection {
    
    function __construct(){
        $this->open();
    }

    function add($request){
        $ejec = $this->execute("INSERT INTO c_metodopago VALUES(NULL, '$request[short_description]', '$request[long_description]', '$request[fiv]', '$request[ffv]', '0', 
        NOW(), '2309150001', NOW(), '2309150001')");
        return $ejec;
    }

    function consult($id){
        $ejec = $this->execute("SELECT * FROM c_metodopago WHERE C_METODOPAGO = $id AND ENTRY_STATUS='0'");
        return $ejec;
    }

    function mod($request)
    {
        $ejec = $this->execute("UPDATE c_metodopago SET SHORT_DESCRIPTION='$request[short_description]', LONG_DESCRIPTION='$request[long_description]', 
        FECHA_INICIO_DE_VIGENCIA='$request[fiv]', FECHA_FIN_DE_VIGENCIA='$request[ffv]', UPDATE_DATE=NOW() WHERE C_METODOPAGO = '$request[c_metodopago]'");
        return $ejec;
    }

    function delete($request){
        $ejec = $this->execute("UPDATE c_metodopago SET ENTRY_STATUS='1', UPDATE_DATE=NOW() WHERE C_METODOPAGO = '$request[id]'");
        return $ejec;
    }
}

?>