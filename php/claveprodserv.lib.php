<?php
require_once("connection.lib.php");

class Claveprodserv extends Connection {
    
    function __construct(){
        $this->open();
    }

    function add($request){
        $ejec = $this->execute("INSERT INTO c_claveprodserv VALUES(NULL, '$request[descripcion]', '$request[iit]', '$request[iiet]',
        '$request[fiv]', '$request[ffv]', 0, '$request[palabras_similares]', 0, 0, 0, 0, 0, '0', NOW(), '2309150001', NOW(), '2309150001')");
        return $ejec;
    }

    function consult($id){
        $ejec = $this->execute("SELECT * FROM c_claveprodserv WHERE C_CLAVEPRODSERV = $id AND ENTRY_STATUS='0'");
        return $ejec;
    }

    function mod($request)
    {
        $ejec = $this->execute("UPDATE c_claveprodserv SET DESCRIPCION='$request[descripcion]', INCLUIR_IVA_TRASLADADO='$request[iit]', 
        INCLUIR_IEPS_TRASLADADO='$request[iiet]', FECHA_INICIO_DE_VIGENCIA='$request[fiv]', FECHA_FIN_DE_VIGENCIA='$request[ffv]',
        ESTIMULO_FRANJA_FRONTERIZA='$request[eff]', PALABRAS_SIMILARES='$request[palabras_similares]', TIPO='$request[tipo]', SUBTIPO='$request[subtipo]', 
        DIVISION='$request[division]', GRUPO='$request[grupo]', CLASE='$request[clase]', UPDATE_DATE=NOW() WHERE C_CLAVEPRODSERV = '$request[c_claveprodserv]'");
        return $ejec;
    }

    function delete($request){
        $ejec = $this->execute("UPDATE c_claveprodserv SET ENTRY_STATUS='1', UPDATE_DATE=NOW() WHERE C_CLAVEPRODSERV = '$request[id]'");
        return $ejec;
    }
    
}

?>