<?php
require_once("connection.lib.php");

class Pais extends Connection {
    
    function __construct(){
        $this->open();
    }

    function add($request){
        $ejec = $this->execute("INSERT INTO c_pais VALUES(NULL, '$request[descripcion]', '$request[code]', '$request[fcp]', '$request[frit]', '$request[vritr]', 
        '$request[agrupaciones]', '0', NOW(), '2309150001', NOW(), '2309150001')");
        return $ejec;
    }

    function list(){
        $ejec = $this->execute("SELECT * FROM c_pais WHERE ENTRY_STATUS='0'");
        return $ejec;
    }

    function consult($id){
        $ejec = $this->execute("SELECT * FROM c_pais WHERE C_PAIS = $id AND ENTRY_STATUS='0'");
        return $ejec;
    }

    function mod($request)
    {
        $ejec = $this->execute("UPDATE c_pais SET DESCRIPCION='$request[descripcion]', CODE='$request[code]', FORMATO_DE_CODIGO_POSTAL='$request[fcp]', 
        FORMATO_DE_REGISTRO_DE_IDENTIDAD_TRIBUTARIA='$request[frit]', VALIDACION_DEL_REGISTRO_DE_IDENTIDAD_TRIBUTARIA='$request[vritr]', AGRUPACIONES='$request[agrupaciones]', 
        UPDATE_DATE=NOW() WHERE C_PAIS = '$request[c_pais]'");
        return $ejec;
    }

    function delete($request){
        $ejec = $this->execute("UPDATE c_pais SET ENTRY_STATUS='1', UPDATE_DATE=NOW() WHERE C_PAIS = '$request[id]'");
        return $ejec;
    }

}

?>