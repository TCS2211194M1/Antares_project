<?php
require_once("connection.lib.php");

class RegimenFiscal extends Connection {
    
    function __construct(){
        $this->open();
    }

    function add($request){
        $ejec = $this->execute("INSERT INTO c_regimenfiscal VALUES(NULL, '$request[descripcion]', '$request[persona_fisica]', '$request[persona_moral]',
        '$request[fiv]', '$request[ffv]', '0', NOW(), '2309150001', NOW(), '2309150001')");
        return $ejec;
    }

    function consult($id){
        $ejec = $this->execute("SELECT * FROM c_regimenfiscal WHERE C_REGIMENFISCAL = $id AND ENTRY_STATUS='0'");
        return $ejec;
    }

    function mod($request){
        $ejec = $this->execute("UPDATE c_regimenfiscal SET DESCRIPCION='$request[descirpcion]', PERSONA_FISICA='$request[persona_fisica]', 
        PERSONA_MORAL='$request[persona_moral]', FECHA_DE_INICIO_DE_VIGENCIA='$request[fiv]', FECHA_DE_FIN_DE_VIGENCIA='$request[ffv]', 
        UPDATE_DATE=NOW() WHERE C_REGIMENFISCAL = '$request[c_regimenfiscal]'");
        return $ejec;
    }

    function delete($request){
        $ejec = $this->execute("UPDATE c_regimenfiscal SET ENTRY_STATUS='1', UPDATE_DATE=NOW() WHERE C_REGIMENFISCAL = '$request[id]'");
        return $ejec;
    }
    
}

?>