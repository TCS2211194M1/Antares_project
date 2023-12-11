<?php

require_once("connection.lib.php");

class Role extends Connection{

    function __construct(){
        $this->open();
    }

    function add($request){
        $ejec = $this->execute("INSERT INTO t_role VALUES(NULL, '$request[short_description]', '$request[long_description]', '$request[t_privilege]', '0', NOW(), 
        '2309150001', NOW(), '2309150001')");
        return $ejec;
    }

    function consult($id){
        $ejec = $this->execute("SELECT * FROM t_role WHERE t_role = $id AND ENTRY_STATUS='0'");
        return $ejec;
    }

    function mod($request)
    {
        $ejec = $this->execute("UPDATE t_role SET SHORT_DESCRIPTION='$request[short_description]', LONG_DESCRIPTION='$request[long_description]', T_PRIVILEGE='$request[t_privilege]',
        UPDATE_DATE=NOW() WHERE t_role = '$request[t_role]'");
        return $ejec;
        
    }

    function delete($request){
        $ejec = $this->execute("UPDATE t_role SET ENTRY_STATUS='1', UPDATE_DATE=NOW() WHERE t_role = '$request[id]'");
        return $ejec;
    }

    //Consultas para los campos que requieren de otras tablas
    function privilege(){
        $ejec = $this->execute("SELECT * FROM t_privilege WHERE ENTRY_STATUS='0'");
        return $ejec;
    }
}
