<?php
require_once("connection.lib.php");

class Country extends Connection {
    
    function __construct(){
        $this->open();
    }

    function add($request){
        $ejec = $this->execute("INSERT INTO t_country VALUES('999', '$request[name]', '$request[iso3]', '$request[iso2]', '$request[numeric_code]', '$request[phone_code]', 
        '$request[capital]', '$request[c_moneda]', '$request[tld]', '$request[region_name]', '$request[subregion]', '$request[nationality]', '$request[time_zone_name]', 
        '$request[latitude]', '$request[longitude]', '0', NOW(), '2309150001', NOW(), '2309150001')");
        return $ejec;
    }

    function list(){
        $ejec = $this->execute("SELECT * FROM t_country WHERE ENTRY_STATUS='0'");
        return $ejec;
    }

    function consult($id){
        $ejec = $this->execute("SELECT * FROM t_country WHERE T_COUNTRY = $id AND ENTRY_STATUS='0'");
        return $ejec;
    }

    function mod($request)
    {
        $ejec = $this->execute("UPDATE t_country SET NAME='$request[name]', ISO3='$request[iso3]', ISO2='$request[iso2]', NUMERIC_CODE='$request[numeric_code]', 
        PHONE_CODE='$request[phone_code]', CAPITAL='$request[capital]', C_MONEDA='$request[c_moneda]', TLD='$request[tld]', REGION_NAME='$request[region_name]', 
        SUBREGION='$request[subregion]', NATIONALITY='$request[nationality]', TIME_ZONE_NAME='$request[time_zone_name]', LATITUDE='$request[latitude]', LONGITUDE='$request[longitude]',
        ENTRY_STATUS='0', UPDATE_DATE=NOW() WHERE T_COUNTRY = '$request[t_country]'");
        return $ejec;
    }

    function delete($request){
        $ejec = $this->execute("UPDATE t_country SET ENTRY_STATUS='1', UPDATE_DATE=NOW() WHERE T_COUNTRY = '$request[id]'");
        return $ejec;
    }

    //Consultas para los campos que requieren de otras tablas
    function moneda(){
        $ejec = $this->execute("SELECT * FROM c_moneda WHERE ENTRY_STATUS='0'");
        return $ejec;
    }
}

?>