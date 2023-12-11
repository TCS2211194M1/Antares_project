<?php
require_once("connection.lib.php");

class Meses extends Connection {
    
    function __construct(){
        $this->open();
    }

    function add($request){
        $ejec = $this->execute("INSERT INTO c_meses VALUES(NULL, '$request[descripcion]', '$request[fiv]', '$request[ffv]', '0', NOW(), '2309150001', NOW(), '2309150001')");
        return $ejec;
    }

    function consult($id){
        $ejec = $this->execute("SELECT * FROM c_meses WHERE C_MESES = $id AND ENTRY_STATUS='0'");
        return $ejec;
    }

    function mod($request)
    {
        $ejec = $this->execute("UPDATE c_meses SET DESCRIPCION='$request[descripcion]', FECHA_INICIO_DE_VIGENCIA='$request[fiv]', FECHA_FIN_DE_VIGENCIA='$request[ffv]',
        UPDATE_DATE=NOW() WHERE C_MESES = '$request[c_meses]'");
        return $ejec;
    }

    function delete($request){
        $ejec = $this->execute("UPDATE c_meses SET ENTRY_STATUS='1', UPDATE_DATE=NOW() WHERE C_MESES = '$request[id]'");
        return $ejec;
    }
}

?>