<?php
require_once("connection.lib.php");

class Client extends Connection
{

    function __construct()
    {
        $this->open();
    }

    function add($request)
    {
        $ejec = $this->execute("INSERT INTO t_client VALUES('999', '$request[short_description]', '$request[login_name]', '$request[login_last_name]', '$request[email]',
        '$request[cellphone]', '$request[phone]', '2309150004', '$request[t_taxid]', '$request[t_workorder]', '0', NOW(), '2309150001', NOW(), '2309150001')");
        return $ejec;
    }

    function consult($id){
        $ejec = $this->execute("SELECT * FROM t_client WHERE T_CLIENT = $id AND ENTRY_STATUS='0'");
        return $ejec;
    }

    function mod($request)
    {
        $ejec = $this->execute("UPDATE t_client SET SHORT_DESCRIPTION='$request[short_description]', LOGIN_NAME='$request[login_name]', LOGIN_LAST_NAME='$request[login_last_name]',
        EMAIL='$request[email]', CELLPHONE='$request[cellphone]', PHONE='$request[phone]', T_LOGIN='$request[t_login]', T_TAXID='$request[t_taxid]', T_WORKORDER='$request[t_workorder]',
        ENTRY_STATUS='0', UPDATE_DATE=NOW() WHERE T_CLIENT='$request[t_client]'");
        return $ejec;
    }

    function delete($request)
    {
        $ejec = $this->execute("UPDATE t_client SET ENTRY_STATUS='1', UPDATE_DATE=NOW() WHERE T_CLIENT = '$request[id]'");
        return $ejec;
    }


    //Consultas para los campos que requieren de otras tablas
    function login(){
        $ejec = $this->execute("SELECT * FROM t_login");
        return $ejec;
    }

    function taxid(){
        $ejec = $this->execute("SELECT * FROM t_taxid");
        return $ejec;
    }

    function workorder(){
        $ejec = $this->execute("SELECT * FROM t_workorder");
        return $ejec;
    }

}
