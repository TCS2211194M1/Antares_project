<?php
require_once("connection.lib.php");

class Colonia extends Connection {
    
    function __construct(){
        $this->open();
    }

    function add($request){
        $ejec = $this->execute("INSERT INTO c_colonia VALUES(NULL, '$request[cp]', '$request[na]', '0', NOW(), '2309150001', NOW(), '2309150001')");
        return $ejec;
    }

    function list(){
        $ejec = $this->execute("SELECT * FROM c_colonia WHERE ENTRY_STATUS='0'");
        return $ejec;
    }

    function consult($id){
        $ejec = $this->execute("SELECT * FROM c_colonia WHERE C_COLONIA = $id AND ENTRY_STATUS='0'");
        return $ejec;
    }

    function mod($request){
        $ejec = $this->execute("UPDATE c_colonia SET  C_CODIGOPOSTAL='$request[cp]', NOMBRE_DEL_ASENTAMIENTO='$request[na]', UPDATE_DATE=NOW() WHERE C_COLONIA = '$request[c_colonia]'");
        return $ejec;
    }

    function delete($request){
        $ejec = $this->execute("UPDATE c_colonia SET ENTRY_STATUS='1', UPDATE_DATE=NOW() WHERE C_COLONIA = '$request[id]'");
        return $ejec;
    }

}