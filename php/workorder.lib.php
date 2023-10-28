<?php

require_once("connection.lib.php");

class WorkOrder extends Connection{

    function __construct(){
        $this->open();
    }

    function add($request){
        $ejec = $this->execute("INSERT INTO t_workorder VALUES('999', '$request[description]', '$request[t_product]', '$request[registered_domain]', '$request[t_partition]', 
        '$request[fecha_inicio]', '$request[fecha_fin]', '$request[workorder_flag]', '0', NOW(), '2309150001', NOW(), '2309150001')");
        return $ejec;
    }

    function consult($id){
        $ejec = $this->execute("SELECT * FROM t_workorder WHERE T_WORKORDER = $id AND ENTRY_STATUS='0'");
        return $ejec;
    }

    function mod($request)
    {
        $ejec = $this->execute("UPDATE t_workorder SET SHORT_DESCRIPTION='$request[short_description]', LONG_DESCRIPTION='$request[long_description]', T_PRIVILEGE='$request[t_privilege]',
        ENTRY_STATUS='0', UPDATE_DATE=NOW() WHERE T_WORKORDER = '$request[t_workorder]'");
        return $ejec;
        
    }

    function delete($request){
        $ejec = $this->execute("UPDATE t_workorder SET ENTRY_STATUS='1', UPDATE_DATE=NOW() WHERE T_WORKORDER = '$request[id]'");
        return $ejec;
    }

    //Consultas para los campos que requieren de otras tablas
    function product(){
        $ejec = $this->execute("SELECT * FROM t_product");
        return $ejec;
    }

    function partition(){
        $ejec = $this->execute("SELECT * FROM t_partition");
        return $ejec;
    }
}
