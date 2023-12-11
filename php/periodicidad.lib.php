<?php
require_once("connection.lib.php");

class Periodicidad extends Connection {
    
    function __construct(){
        $this->open();
    }

    function add($request){
        $ejec = $this->execute("INSERT INTO c_periodicidad VALUES(NULL, '$request[descripcion]', '$request[valor_diario]', '$request[valor_semanal]', '$request[valor_quincenal]', 
        '$request[valor_mensual]', '$request[valor_bimestral]', '$request[valor_trimestral]', '$request[valor_cuatrimestral]', '$request[valor_semestral]', '$request[valor_anual]',
        '$request[valor_catorcenal]', '$request[fiv]', '$request[ffv]', '0', NOW(), '2309150001', NOW(), '2309150001')");
        return $ejec;
    }

    function consult($id){
        $ejec = $this->execute("SELECT * FROM c_periodicidad WHERE C_PERIODICIDAD = $id AND ENTRY_STATUS='0'");
        return $ejec;
    }

    function mod($request)
    {
        $ejec = $this->execute("UPDATE c_periodicidad SET DESCRIPCION='$request[descripcion]', VALOR_DIARIO='$request[valor_diario]', VALOR_SEMANAL='$request[valor_semanal]', 
        VALOR_QUINCENAL='$request[valor_quincenal]', VALOR_MENSUAL='$request[valor_mensual]', VALOR_BIMESTRAL='$request[valor_bimestral]', VALOR_TRIMESTRAL='$request[valor_trimestral]',
        VALOR_CUATRIMESTRAL='$request[valor_cuatrimestral]', VALOR_SEMESTRAL='$request[valor_semestral]', VALOR_ANUAL='$request[valor_anual]', 
        VALOR_CATORCENAL='$request[valor_catorcenal]', FECHA_INICIO_DE_VIGENCIA='$request[fiv]', FECHA_FIN_DE_VIGENCIA='$request[ffv]', 
        UPDATE_DATE=NOW() WHERE C_PERIODICIDAD = '$request[c_periodicidad]'");
        return $ejec;
    }

    function delete($request){
        $ejec = $this->execute("UPDATE c_periodicidad SET ENTRY_STATUS='1', UPDATE_DATE=NOW() WHERE C_PERIODICIDAD = '$request[id]'");
        return $ejec;
    }
    
}

?>