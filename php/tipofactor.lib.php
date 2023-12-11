<?php
require_once("connection.lib.php");

class TipoFactor extends Connection {
    
    function __construct(){
        $this->open();
    }

    function add($request){
        $ejec = $this->execute("INSERT INTO c_tipofactor VALUES(NULL, '$request[descripcion]', '$request[fiv]', '$request[ffv]', '0', NOW(), '2309150001', NOW(), '2309150001')");
        return $ejec;
    }

    function consult($id){
        $ejec = $this->execute("SELECT * FROM c_tipofactor WHERE C_TIPOFACTOR = $id AND ENTRY_STATUS='0'");
        return $ejec;
    }

    function mod($request)
    {
        $ejec = $this->execute("UPDATE c_tipofactor SET DESCRIPCION='$request[descripcion]', FECHA_INICIO_DE_VIGENCIA='$request[fiv]', FECHA_FIN_DE_VIGENCIA='$request[ffv]', 
        UPDATE_DATE=NOW() WHERE C_TIPOFACTOR = '$request[c_tipofactor]'");
        return $ejec;
    }

    function delete($request){
        $ejec = $this->execute("UPDATE c_tipofactor SET ENTRY_STATUS='1', UPDATE_DATE=NOW() WHERE C_TIPOFACTOR = '$request[id]'");
        return $ejec;
    }
    
}

?>