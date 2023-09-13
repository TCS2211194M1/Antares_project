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
        $ejec = $this->execute("INSERT INTO client VALUES('$request[a]', '1', NOW(), NOW())");
        return $ejec;
    }

    function list($opc)
    {
        if ($opc == null) {
            $consult = $this->execute("SELECT * FROM t_login");
        } else {
            $consult = $this->execute("SELECT * FROM t_login where status_log= '1' and id='$opc'");
        }
        return $consult;
    }

    function update($request)
    {
        $ejec = $this->execute("MOD");
        return $ejec;
    }

    function delete($request)
    {
        $ejec = $this->execute("");
        return $ejec;
    }

    function listCountry($opc)
    {
        if ($opc == null) {
            $consult = $this->execute("SELECT * FROM country");
        } else {
            $consult = $this->execute("SELECT * FROM country where entry_status= '1'");
        }
        return $consult;
    }

    function listState($opc)
    {
        if ($opc == 142) {
            $consult = $this->execute("SELECT * FROM estado WHERE entry_status= '1'");
        } else {
            $consult = $this->execute("SELECT * FROM estado WHERE entry_status= '0'");
        }
        return $consult;
    }
}
