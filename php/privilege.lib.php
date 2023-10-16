<?php
require_once("connection.lib.php");

class Privilege extends Connection {
    
    function __construct(){
        $this->open();
    }

    function add($request){
        $ejec = $this->execute("INSERT INTO t_privilege VALUES('$request[t_privilege]', '$request[short_description]', '$request[grant_table_column]', '$request[context]',
        '0', NOW(), '2309150001', NOW(), '2309150001')");
        return $ejec;
    }

    function consult($id){
        $ejec = $this->execute("SELECT * FROM t_privilege WHERE t_privilege = $id");
        return $ejec;
    }

    function mod($request)
    {
        $ejec = $this->execute("UPDATE t_privilege SET SHORT_DESCRIPTION='$request[short_description]', GRANT_TABLE_COLUMN='$request[grant_table_column]', CONTEXT='$request[context]',
        ENTRY_STATUS='0', UPDATE_DATE=NOW() WHERE t_privilege = '$request[t_privilege]'");
        return $ejec;
    }

    function delete($request){
        $ejec = $this->execute("UPDATE t_privilege SET ENTRY_STATUS='1', UPDATE_DATE=NOW() WHERE t_privilege = '$request[id]'");
        return $ejec;
    }
}

?>