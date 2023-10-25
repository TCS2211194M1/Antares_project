<?php
require_once("connection.lib.php");

class Subregion extends Connection {
    
    function __construct(){
        $this->open();
    }

    function add($request){
        $ejec = $this->execute("INSERT INTO t_subregion VALUES('999', '$request[short_description]', '$request[t_region]', '0', NOW(), '2309150001', NOW(), '2309150001')");
        return $ejec;
    }

    function consult($id){
        $ejec = $this->execute("SELECT * FROM t_subregion WHERE t_subregion = $id AND ENTRY_STATUS='0'");
        return $ejec;
    }

    function mod($request)
    {
        $ejec = $this->execute("UPDATE t_subregion SET SHORT_DESCRIPTION='$request[short_description]', T_REGION='$request[t_region]', ENTRY_STATUS='0', UPDATE_DATE=NOW() WHERE T_SUBREGION = '$request[t_subregion]'");
        return $ejec;
    }

    function delete($request){
        $ejec = $this->execute("UPDATE t_subregion SET ENTRY_STATUS='1', UPDATE_DATE=NOW() WHERE T_SUBREGION = '$request[id]'");
        return $ejec;
    }

    //Consultas para los campos que requieren de otras tablas
    function region(){
        $ejec = $this->execute("SELECT * FROM t_region");
        return $ejec;
    }
}

?>