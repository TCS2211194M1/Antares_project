<?php
require_once("connection.lib.php");

class Region extends Connection {
    
    function __construct(){
        $this->open();
    }

    function add($request){
        $ejec = $this->execute("INSERT INTO t_region VALUES('999', '$request[region_name]', '0', NOW(), '2309150001', NOW(), '2309150001')");
        return $ejec;
    }

    function consult($id){
        $ejec = $this->execute("SELECT * FROM t_region WHERE t_region = $id AND ENTRY_STATUS='0'");
        return $ejec;
    }

    function mod($request)
    {
        $ejec = $this->execute("UPDATE t_region SET REGION_NAME='$request[region_name]', ENTRY_STATUS='0', UPDATE_DATE=NOW() WHERE T_REGION = '$request[t_region]'");
        return $ejec;
    }

    function delete($request){
        $ejec = $this->execute("UPDATE t_region SET ENTRY_STATUS='1', UPDATE_DATE=NOW() WHERE t_region = '$request[id]'");
        return $ejec;
    }
}

?>