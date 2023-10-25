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

    function claveUnidad(){
        $ejec = $this->execute("SELECT * FROM c_claveunidad");
        return $ejec;
    }

    function moneda(){
        $ejec = $this->execute("SELECT * FROM c_moneda");
        return $ejec;
    }

    function periodicidad(){
        $ejec = $this->execute("SELECT * FROM c_periodicidad");
        return $ejec;
    }

    function objetoImpuesto(){
        $ejec = $this->execute("SELECT * FROM c_objetoimp");
        return $ejec;
    }

    function impuesto(){
        $ejec = $this->execute("SELECT * FROM c_impuesto");
        return $ejec;
    }

    function tipoFactor(){
        $ejec = $this->execute("SELECT * FROM c_tipofactor");
        return $ejec;
    }
}

