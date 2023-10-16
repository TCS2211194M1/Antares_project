<?php

require_once("connection.lib.php");

class Product extends Connection{

    function __construct(){
        $this->open();
    }

    function consult($id){
        $ejec = $this->execute("SELECT * FROM t_product WHERE T_PRODUCT=$id");
        return $ejec;
    }

    function service(){
        $ejec = $this->execute("SELECT * FROM t_service");
        return $ejec;
    }
}

