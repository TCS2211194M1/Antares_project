<?php
require_once("connection.lib.php");

class Impuesto extends Connection {
    
    function __construct(){
        $this->open();
    }

    function add($request){
        $ejec = $this->execute("INSERT INTO c_impuesto VALUES(NULL, '$request[descripcion]', '$request[c_tipofactor]', '$request[c_tasa]', '$request[retencion]', '$request[traslado]',
        '$request[localofederal]', '$request[fiv]', '$request[ffv]', '0', NOW(), '2309150001', NOW(), '2309150001')");
        return $ejec;
    }

    function consult($id){
        $ejec = $this->execute("SELECT * FROM c_impuesto WHERE C_IMPUESTO = $id AND ENTRY_STATUS='0'");
        return $ejec;
    }

    function mod($request)
    {
        $ejec = $this->execute("UPDATE c_impuesto SET DESCRIPCION='$request[descripcion]', C_TIPOFACTOR='$request[c_tipofactor]', C_TASA='$request[c_tasa]', 
        RETENCION='$request[retencion]', TRASLADO='$request[traslado]', LOCAL_O_FEDERAL='$request[localofederal]', FECHA_INICIO_DE_VIGENCIA='$request[fiv]', 
        FECHA_FIN_DE_VIGENCIA='$request[ffv]', UPDATE_DATE=NOW() WHERE C_IMPUESTO = '$request[c_impuesto]'");
        return $ejec;
    }

    function delete($request){
        $ejec = $this->execute("UPDATE c_impuesto SET ENTRY_STATUS='1', UPDATE_DATE=NOW() WHERE C_IMPUESTO = '$request[id]'");
        return $ejec;
    }

    function consultTipofactor(){
        $ejec = $this->execute("SELECT * FROM c_tipofactor WHERE ENTRY_STATUS='0'");
        return $ejec;
    }
    
}

?>