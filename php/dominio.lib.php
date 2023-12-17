<?php

require_once("connection.lib.php");

class Dominio extends Connection{

    function __construct(){
        $this->open();
    }

    function add($request){
        $ejec = $this->execute("INSERT INTO t_workorder VALUES(6, '$request[username]', '$request[id]', '$request[domain]', 'xvda1', 
        NOW(), NOW(), 1, '1', NOW(), '2309150001', NOW(), '2309150001')");
        if ($ejec !== false) {
            $consult = $this->execute("SELECT MAX(T_WORKORDER) as id FROM T_WORKORDER");
            $ren = $consult->fetch_array(MYSQLI_ASSOC);
            $ejec2 = $this->execute("INSERT INTO t_compra VALUES(6, '$ren[id]', '$request[pago]', '$request[importe]', 1, '$request[referencia]', 0, NOW(), NOW())");
            return $ejec2;
        } else{
            return 0;
        }
    }

    function consultActivos($request){
        $ejec = $this->execute("SELECT * FROM t_workorder WHERE T_CLIENT = '$request' AND ENTRY_STATUS='0'");
        return $ejec;
    }

    function consultInactivos($request){
        $ejec = $this->execute("SELECT * FROM t_workorder WHERE T_CLIENT = '$request' AND ENTRY_STATUS='1'");
        return $ejec;
    }

    function mod($request)
    {
        $ejec = $this->execute("UPDATE t_workorder SET DESCRIPTION='$request[description]', T_PRODUCT='$request[t_product]', REGISTERED_DOMAIN='$request[registered_domain]', 
        T_PARTITION='$request[t_partition]', FECHA_INICIO_DE_VIGENCIA='$request[fecha_inicio]', FECHA_FIN_DE_VIGENCIA='$request[fecha_fin]', WORKORDER_FLAG='$request[workorder_flag]', 
        UPDATE_DATE=NOW() WHERE T_WORKORDER = '$request[t_workorder]'");
        return $ejec;
        
    }

    function valida($request){
        $ejec = $this->execute("SELECT * FROM t_workorder WHERE REGISTERED_DOMAIN = '$request[name_domain]$request[com]'");
        if ($ejec->num_rows>0) {
            return 0;
        } else{
            return 1;
        }
    }
}
