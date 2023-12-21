<?php
require_once("connection.lib.php");

class Taxid extends Connection{

    function __construct(){
        $this->open();
    }

    function add($request){
        $ejec = $this->execute("INSERT INTO t_taxid VALUES(2, '$request[rfc]', '$request[direccion]', '$request[pais]', '$request[estado]', '$request[municipio]',
        '$request[localidad]', '$request[codigopostal]', '$request[colonia]', '$request[regimenfiscal]', '$request[usocfdi]', '0', NOW(), '2309150001', NOW(), '2309150001')");
        return $ejec;
    }

    function consult($id){
        $ejec = $this->execute("SELECT * FROM t_taxid WHERE T_TAXID = $id");
        return $ejec;
    }

    function mod($request){
        $ejec = $this->execute("UPDATE t_taxid SET RFC='$request[rfc]', ADDRESS='$request[address]', C_PAIS='$request[c_pais]', C_ESTADO='$request[c_estado]', 
        C_MUNICIPIO='$request[c_municipio]', C_LOCALIDAD='$request[c_localidad]', C_CODIGOPOSTAL='$request[c_codigopostal]', C_COLONIA='$request[c_colonia]', 
        C_REGIMENFISCAL='$request[c_regimenfiscal]', C_USOCFDI='$request[c_usocfdi]', UPDATE_DATE=NOW() WHERE T_TAXID='$request[t_taxid]'");
        return $ejec;
    }

    function delete($request){
        $ejec = $this->execute("UPDATE t_taxid SET ENTRY_STATUS='1', UPDATE_DATE=NOW() WHERE T_TAXID = '$request[id]'");
        return $ejec;
    }
}


?>