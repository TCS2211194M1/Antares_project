<?php

require_once("connection.lib.php");

class Domain extends Connection{

    function __construct(){
        $this->open();
    }

    function consultActivos(){
        $ejec = $this->execute("SELECT * FROM t_workorder INNER JOIN t_product on t_workorder.t_product = t_product.t_product 
        INNER JOIN t_compra on t_workorder.t_workorder = t_compra.t_workorder INNER JOIN t_workorder_flag on t_workorder.workorder_flag = t_workorder_flag.t_workorder_flag
         WHERE t_workorder.ENTRY_STATUS='0'");
        return $ejec;
    }

    function consultInactivos(){
        $ejec = $this->execute("SELECT * FROM t_workorder INNER JOIN t_product on t_workorder.t_product = t_product.t_product 
         INNER JOIN t_compra on t_workorder.t_workorder = t_compra.t_workorder INNER JOIN t_workorder_flag on t_workorder.workorder_flag = t_workorder_flag.t_workorder_flag
          WHERE t_workorder.ENTRY_STATUS='1'");
        return $ejec;
    }


    function activar($request)
    {
        $ejec = $this->execute("UPDATE t_workorder SET ENTRY_STATUS='1',  UPDATE_DATE=NOW() WHERE T_WORKORDER = '$request[t_workorder]'");
        return $ejec;
        
    }
}
