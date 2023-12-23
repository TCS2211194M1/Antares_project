<?php
require_once("connection.lib.php");

class City extends Connection {
    
    function __construct(){
        $this->open();
    }

    function add($request){
        $ejec = $this->execute("INSERT INTO t_city VALUES(null, '$request[name]', '$request[state_id]', '$request[state_code]', '$request[state_name]',
        '$request[ci]', '$request[cc]', '$request[cn]', '$request[latitude]', '$request[longitude]', '$request[wikidata]', '0', NOW(), '2309150001', NOW(), '2309150001')");
        return $ejec;
    }

    function list(){
        $ejec = $this->execute("SELECT * FROM t_city WHERE ENTRY_STATUS='0'");
        return $ejec;
    }

    function consult($id){
        $ejec = $this->execute("SELECT * FROM t_city WHERE T_CITY = $id AND ENTRY_STATUS='0'");
        return $ejec;
    }

    function mod($request)
    {
        $ejec = $this->execute("UPDATE t_city SET STATE_NAME='$request[state_name]', COUNTRY_ID='$request[ci]', COUNTRY_CODE='$request[cc]', COUNTRY_NAME='$request[cn]', 
        REGION_NAME='$request[region_name]', STATE_CODE='$request[state_code]', TYPE='$request[type]', LATITUDE='$request[latitude]', LONGITUDE='$request[longitude]',
        UPDATE_DATE=NOW() WHERE T_CITY = '$request[t_city]'");
        return $ejec;
    }

    function delete($request){
        $ejec = $this->execute("UPDATE t_city SET ENTRY_STATUS='1', UPDATE_DATE=NOW() WHERE T_CITY = '$request[id]'");
        return $ejec;
    }
}

?>