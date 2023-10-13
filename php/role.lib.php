<?php

require_once("connection.lib.php");

class Role extends Connection{

    function __construct(){
        $this->open();
    }

    function list($opc){
        if ($opc == null) {
            $consult = $this->execute("SELECT * FROM t_role where entry_status='0'");
        } else{
            $consult = $this->execute("SELECT * FROM t_role where entry_status='0' and T_PRODUCT='$opc'");
        }
        return $consult;
    }
}
