<?php

require_once("connection.lib.php");

class Dominio extends Connection{

    function __construct(){
        $this->open();
    }

    function add($request){
        $consult = $this->execute("SELECT PERIODICIDAD as per FROM t_product where T_PRODUCT='$request[id]'");
        $fechaActual = date("Y-m-d");
        $fechaLimite = date("Y-m-d");
        $fechaPago = date("Y-m-d", strtotime($fechaLimite . " +5 days"));
        if ($consult->num_rows>0) {
            $periodo = $consult->fetch_array(MYSQLI_ASSOC);
            if ($periodo['per'] == 'Mensual') {
                $fechaFin = date('Y-m-d', strtotime($fechaActual . " +1 month"));
            } else if ($periodo['per'] == 'Cuatrimestral') {
                $fechaFin = date('Y-m-d', strtotime($fechaActual . " +4 month"));
            } else if ($periodo['per'] == 'Semestral') {
                $fechaFin = date('Y-m-d', strtotime($fechaActual . " +6 month"));
            } else if ($periodo['per'] == 'Anual'){
                $fechaFin = date('Y-m-d', strtotime($fechaActual . " +12 month"));
            }
            $ejec = $this->execute("INSERT INTO t_workorder VALUES(10, '$request[username]', '$request[id]', '$request[domain]', 'xvda1', 
            NOW(), '$fechaFin', 1, '1', NOW(), '2309150001', NOW(), '2309150001')");
            if ($ejec !== false) {
                $consult = $this->execute("SELECT MAX(T_WORKORDER) as id FROM T_WORKORDER");
                $ren = $consult->fetch_array(MYSQLI_ASSOC);
                $ejec2 = $this->execute("INSERT INTO t_compra VALUES(10, '$ren[id]', '$request[pago]', '$request[importe]', 1, '$request[referencia]', 0, NOW(), NOW(), '$fechaPago')");
                return $ejec2;
            } else{
                return 0;
            }
            
        } else{
            return 0;
        }
    }

    function consultPdf($client){
        $consult = $this->execute("SELECT MAX(t_workorder.T_WORKORDER) as id FROM t_workorder"); 
        $ren = $consult->fetch_array(MYSQLI_ASSOC);
        $ejec = $this->execute("SELECT * FROM t_workorder INNER JOIN t_product on t_workorder.t_product = t_product.t_product 
        INNER JOIN t_compra on t_workorder.t_workorder = t_compra.t_workorder WHERE T_CLIENT = '$client' AND t_compra.T_WORKORDER='$ren[id]' ");
        return $ejec;
    }

    function consultActivos($client){
        $ejec = $this->execute("SELECT * FROM t_workorder INNER JOIN t_product on t_workorder.t_product = t_product.t_product 
        INNER JOIN t_compra on t_workorder.t_workorder = t_compra.t_workorder WHERE T_CLIENT = '$client' AND t_workorder.ENTRY_STATUS='0'");
        return $ejec;
    }

    function consultInactivos($client){
        $ejec = $this->execute("SELECT * FROM t_workorder INNER JOIN t_product on t_workorder.t_product = t_product.t_product 
         INNER JOIN t_compra on t_workorder.t_workorder = t_compra.t_workorder WHERE T_CLIENT = '$client' AND t_workorder.ENTRY_STATUS='1'");
        return $ejec;
    }

    function consultClient($client){
        $ejec = $this->execute("SELECT * FROM t_client WHERE USERNAME = '$client'");
        return $ejec;
    }

    function valida($request){
        $ejec = $this->execute("SELECT * FROM t_workorder WHERE REGISTERED_DOMAIN = '$request[name_domain]$request[dns]'");
        if ($ejec->num_rows>0) {
            return 0;
        } else{
            return 1;
        }
    }

    function activar($request){
        $ejec = $this->execute("UPDATE t_workorder SET ENTRY_STATUS=0, WORKORDER_FLAG=2, UPDATE_DATE=NOW() WHERE T_WORKORDER = '$request[id]'");
        return $ejec;
    }

    function desactivar($request){
        $ejec = $this->execute("UPDATE t_workorder SET ENTRY_STATUS=1, WORKORDER_FLAG=3, UPDATE_DATE=NOW() WHERE T_WORKORDER = '$request[id]'");
        return $ejec;
    }

    function actualizar(){
        $today = date('Y-m-d');
        $ejec = $this->execute("SELECT * FROM t_compra INNER JOIN t_workorder on t_compra.t_workorder = t_workorder.t_workorder WHERE t_workorder.workorder_flag = 1");
        while ($ren = $ejec->fetch_array(MYSQLI_ASSOC)) {
            if ($today > $ren['fechaLimite_com']) {
                $this->execute("UPDATE t_workorder SET ENTRY_STATUS=1, WORKORDER_FLAG=3, UPDATE_DATE=NOW() WHERE T_WORKORDER = '$ren[t_workorder]'");
                $this->execute("UPDATE t_compra SET UPDATE_DATE=NOW() WHERE id_com = '$ren[id_com]'");
            }
        }
    }
}
