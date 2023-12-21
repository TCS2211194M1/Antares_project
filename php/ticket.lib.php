<?php

require_once("connection.lib.php");

class Ticket extends Connection{

    function __construct(){
        $this->open();
    }

    function add($request){
        $ejec = $this->execute("INSERT INTO t_ticket VALUES(null, '$request[username]', '$request[email]', '$request[depto]', '$request[dominio]', 
        '$request[prioridad]', '$request[asunto]', '$request[mensaje]', 0, NOW(), NOW())");
        return $ejec;
    }

    function consult($request){
        $ejec = $this->execute("SELECT * FROM t_ticket WHERE T_CLIENT='$request'");
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

    function consultClient($client){
        $ejec = $this->execute("SELECT * FROM t_client WHERE USERNAME = '$client'");
        return $ejec;
    }

    function consultDominios($client){
        $ejec = $this->execute("SELECT * FROM t_workorder WHERE T_CLIENT = '$client'");
        return $ejec;
    }

    function consultActivos(){
        $ejec = $this->execute("SELECT * FROM t_ticket INNER JOIN t_workorder on t_ticket.t_workorder = t_workorder.t_workorder WHERE t_ticket.ENTRY_STATUS='1'");
        return $ejec;
    }

    function consultInactivos(){
        $ejec = $this->execute("SELECT * FROM t_ticket INNER JOIN t_workorder on t_ticket.t_workorder = t_workorder.t_workorder WHERE t_ticket.ENTRY_STATUS='0'");
        return $ejec;
    }

    function activar($request){
        $ejec = $this->execute("UPDATE t_ticket SET ENTRY_STATUS=1, UPDATE_DATE=NOW() WHERE id_tic = '$request[id]'");
        return $ejec;
    }

    function desactivar($request){
        $ejec = $this->execute("UPDATE t_ticket SET ENTRY_STATUS=0, UPDATE_DATE=NOW() WHERE id_tic = '$request[id]'");
        return $ejec;
    }
}


