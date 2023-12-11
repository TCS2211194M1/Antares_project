<?php

require_once("connection.lib.php");

class Workorder_Flag extends Connection{

    function __construct(){
        $this->open();
    }

    function add($request){
        $ejec = $this->execute("INSERT INTO t_workorder_flag VALUES(NULL, '$request[description]', '0', NOW(), '2309150001', NOW(), '2309150001')");
        return $ejec;
    }

    function consult($id){
        $ejec = $this->execute("SELECT * FROM t_workorder_flag WHERE T_WORKORDER_FLAG = $id AND ENTRY_STATUS='0'");
        return $ejec;
    }

    function mod($request)
    {
        $ejec = $this->execute("UPDATE t_workorder_flag SET DESCRIPTION='$request[description]', UPDATE_DATE=NOW() WHERE T_WORKORDER_FLAG = '$request[t_workorder_flag]'");
        return $ejec;
        
    }

    function delete($request){
        $ejec = $this->execute("UPDATE t_workorder_flag SET ENTRY_STATUS='1', UPDATE_DATE=NOW() WHERE T_WORKORDER_FLAG = '$request[id]'");
        return $ejec;
    }
}
