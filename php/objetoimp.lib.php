<?php
require_once("connection.lib.php");

class ObjetoImp extends Connection {
    
    function __construct(){
        $this->open();
    }

    function add($request){
        $ejec = $this->execute("INSERT INTO c_objetoimp VALUES(NULL, '$request[descripcion]', '$request[c_impuesto]', '$request[fiv]', '$request[ffv]', '0',
        NOW(), '2309150001', NOW(), '2309150001')");
        return $ejec;
    }

    function consult($id){
        $ejec = $this->execute("SELECT * FROM c_objetoimp WHERE C_OBJETOIMP = $id AND ENTRY_STATUS='0'");
        return $ejec;
    }

    function mod($request)
    {
        $ejec = $this->execute("UPDATE c_objetoimp SET DESCRIPCION='$request[descripcion]', C_IMPUESTO='$request[c_impuesto]', FECHA_INICIO_DE_VIGENCIA='$request[fiv]', 
        FECHA_FIN_DE_VIGENCIA='$request[ffv]', UPDATE_DATE=NOW() WHERE C_OBJETOIMP = '$request[c_objetoimp]'");
        return $ejec;
    }

    function delete($request){
        $ejec = $this->execute("UPDATE c_objetoimp SET ENTRY_STATUS='1', UPDATE_DATE=NOW() WHERE C_OBJETOIMP = '$request[id]'");
        return $ejec;
    }

    function consultImpuesto(){
        $ejec = $this->execute("SELECT * FROM c_impuesto WHERE ENTRY_STATUS='0'");
        return $ejec;
    }
    
}

?>