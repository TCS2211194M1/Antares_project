<?php
require_once("connection.lib.php");

class Service extends Connection {
    
    function __construct(){
        $this->open();
    }

    function add($request){
        $ejec = $this->execute("INSERT INTO t_service VALUES('99', '$request[short_description]', '$request[long_description]', '0', NOW(), '2309150001', NOW(), '2309150001')");
        return $ejec;
    }

    function consult($id){
        $ejec = $this->execute("SELECT * FROM t_service WHERE T_SERVICE = $id AND ENTRY_STATUS='0'");
        return $ejec;
    }

    function mod($request)
    {
        $ejec = $this->execute("UPDATE t_service SET SHORT_DESCRIPTION='$request[short_description]', LONG_DESCRIPTION='$request[long_description]', ENTRY_STATUS='0', 
        UPDATE_DATE=NOW() WHERE T_SERVICE = '$request[t_service]'");
        return $ejec;
    }

    function delete($request){
        $ejec = $this->execute("UPDATE t_service SET ENTRY_STATUS='1', UPDATE_DATE=NOW() WHERE T_SERVICE = '$request[id]'");
        return $ejec;
    }
}

?>