<?php
require_once("connection.lib.php");

class Login extends Connection {
    
    function __construct(){
        $this->open();
    }

    function add($request){
        $ejec = $this->execute("INSERT INTO t_login VALUES('999', '$request[login_role]', '0', NOW(), '2309150001', NOW(), '2309150001')");
        return $ejec;
    }

    function consult($id){
        $ejec = $this->execute("SELECT * FROM t_login WHERE T_LOGIN = $id AND ENTRY_STATUS='0'");
        return $ejec;
    }

    function mod($request)
    {
        $ejec = $this->execute("UPDATE t_login SET LOGIN_ROLE='$request[login_role]', ENTRY_STATUS='0', UPDATE_DATE=NOW() WHERE T_LOGIN = '$request[t_login]'");
        return $ejec;
    }

    function delete($request){
        $ejec = $this->execute("UPDATE t_login SET ENTRY_STATUS='1', UPDATE_DATE=NOW() WHERE T_LOGIN = '$request[id]'");
        return $ejec;
    }

    //Consultas para los campos que requieren de otras tablas
    function roles(){
        $ejec = $this->execute("SELECT * FROM t_role");
        return $ejec;
    }
}

?>