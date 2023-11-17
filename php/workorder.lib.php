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
        $ejec = $this->execute("UPDATE t_workorder SET DESCRIPTION='$request[description]', T_PRODUCT='$request[t_product]', REGISTERED_DOMAIN='$request[registered_domain]', 
        T_PARTITION='$request[t_partition]', FECHA_INICIO_DE_VIGENCIA='$request[fecha_inicio]', FECHA_FIN_DE_VIGENCIA='$request[fecha_fin]', WORKORDER_FLAG='$request[workorder_flag]', 
        ENTRY_STATUS='0', UPDATE_DATE=NOW() WHERE T_WORKORDER = '$request[t_workorder]'");
        return $ejec;
        
    }

    function delete($request){
        $ejec = $this->execute("UPDATE t_workorder SET ENTRY_STATUS='1', UPDATE_DATE=NOW() WHERE T_WORKORDER = '$request[id]'");
        return $ejec;
    }

    //Consultas para los campos que requieren de otras tablas
    function product(){
        $ejec = $this->execute("SELECT * FROM t_product WHERE ENTRY_STATUS='0'");
        return $ejec;
    }

    function partition(){
        $ejec = $this->execute("SELECT * FROM t_partition WHERE ENTRY_STATUS='0'");
        return $ejec;
    }

    function workorderFlag(){
        $ejec = $this->execute("SELECT * FROM t_workorder_flag WHERE ENTRY_STATUS='0'");
        return $ejec;
    }
}
