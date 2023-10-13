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
        $ejec = $this->execute("");
        return $ejec;
    }

    function list($request)
    {
        $ejec = $this->execute("SELECT * FROM t_client WHERE entry_status='0'");
        return $ejec;
    }

    function update($request)
    {
        $ejec = $this->execute("");
        return $ejec;
    }

    function delete($request)
    {
        $ejec = $this->execute("UPDATE t_client SET ENTRY_STATUS='1', UPDATE_DATE=NOW() WHERE T_CLIENT = '$request[id]'");
        return $ejec;
    }

}
