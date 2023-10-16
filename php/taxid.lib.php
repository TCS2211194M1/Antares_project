<?php

require_once("connection.lib.php");

class Taxid extends Connection{

    function __construct(){
        $this->open();
    }

    function add($request){
        $ejec = $this->execute("INSERT INTO t_taxid VALUES('$request[t_taxid]')");
        return $ejec;
    }

    function consult($id){
        $ejec = $this->execute("SELECT * FROM t_taxid WHERE T_TAXID = $id");
        return $ejec;
    }

    function mod($request){
        $ejec = $this->execute();
        return $ejec;
    }

    function delete($request){
        $ejec = $this->execute("UPDATE t_taxid SET ENTRE_STATUS='1', UPDATE_DATE=NOW() WHERE T_TAXID = '$request[id]'");
        return $ejec;
    }

    function pais(){
        $ejec = $this->execute("SELECT * FROM c_pais");
        return $ejec;
    }

    function estado(){
        $ejec = $this->execute("SELECT * FROM c_estado");
        return $ejec;
    }

}


?>