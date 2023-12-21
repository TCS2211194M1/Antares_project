<?php
require_once("connection.lib.php");

class State extends Connection {
    
    function __construct(){
        $this->open();
    }

    function add($request){
        $ejec = $this->execute("INSERT INTO t_state VALUES(null, '$request[state_name]', '$request[ci]', '$request[cc]', '$request[cn]', '$request[region_name]', 
        '$request[state_code]', '$request[type]', '$request[latitude]', '$request[longitude]', '0', NOW(), '2309150001', NOW(), '2309150001')");
        return $ejec;
    }

    function list(){
        $ejec = $this->execute("SELECT * FROM t_country WHERE ENTRY_STATUS='0'");
        return $ejec;
    }

    function consult($id){
        $ejec = $this->execute("SELECT * FROM t_state WHERE T_STATE = $id AND ENTRY_STATUS='0'");
        return $ejec;
    }

    function mod($request)
    {
        $ejec = $this->execute("UPDATE t_state SET STATE_NAME='$request[state_name]', COUNTRY_ID='$request[ci]', COUNTRY_CODE='$request[cc]', COUNTRY_NAME='$request[cn]', 
        REGION_NAME='$request[region_name]', STATE_CODE='$request[state_code]', TYPE='$request[type]', LATITUDE='$request[latitude]', LONGITUDE='$request[longitude]',
        UPDATE_DATE=NOW() WHERE T_STATE = '$request[t_state]'");
        return $ejec;
    }

    function delete($request){
        $ejec = $this->execute("UPDATE t_state SET ENTRY_STATUS='1', UPDATE_DATE=NOW() WHERE T_STATE = '$request[id]'");
        return $ejec;
    }
}

?>