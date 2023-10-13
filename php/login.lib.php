<?php
require_once("connection.lib.php");

class Login extends Connection {
    
    function __construct(){
        $this->open();
    }

    function add($request){
        $ejec = $this->execute("INSERT INTO t_login VALUES('$request[T_LOGIN]', '$request[LOGIN_ROLE]', '0', NOW(), '2309150001', NOW(), '2309150001')");
        return $ejec;
    }

    function consult($id){
        $ejec = $this->execute("SELECT * FROM t_login WHERE T_LOGIN = $id");
        return $ejec;
    }

    function delete($request){
        $ejec = $this->execute("UPDATE t_login SET ENTRY_STATUS='1', UPDATE_DATE=NOW() WHERE T_LOGIN = '$request[id]'");
        return $ejec;
    }

    //Obtener los Selects para los registros
    function roles(){
        $ejec = $this->execute("SELECT * FROM t_role");
        return $ejec;
    }
}

?>