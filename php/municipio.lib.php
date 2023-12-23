<?php
require_once("connection.lib.php");

class Municipio extends Connection {
    
    function __construct(){
        $this->open();
    }

    function add($request){
        $ejec = $this->execute("INSERT INTO c_municipio VALUES(NULL, '$request[c_estado]', '$request[descripcion]', '$request[fiv]', '$request[ffv]', '0', 
        NOW(), '2309150001', NOW(), '2309150001')");
        return $ejec;
    }

    function list(){
        $ejec = $this->execute("SELECT * FROM c_municipio WHERE ENTRY_STATUS='0'");
        return $ejec;
    }

    function consult($id){
        $ejec = $this->execute("SELECT * FROM c_municipio WHERE C_MUNICIPIO = $id AND ENTRY_STATUS='0'");
        return $ejec;
    }

    function mod($request){
        $ejec = $this->execute("UPDATE c_municipio SET  C_ESTADO='$request[c_estado]', DESCRIPCION='$request[descripcion]', FECHA_DE_INICIO_DE_VIGENCIA='$request[fiv]',
        FECHA_DE_FIN_DE_VIGENCIA='$request[ffv]', UPDATE_DATE=NOW() WHERE C_MUNICIPIO = '$request[c_municipio]'");
        return $ejec;
    }

    function delete($request){
        $ejec = $this->execute("UPDATE c_municipio SET ENTRY_STATUS='1', UPDATE_DATE=NOW() WHERE C_MUNICIPIO = '$request[id]'");
        return $ejec;
    }

}

?>