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

    function list($opc)
    {
        if ($opc != null) {
            $consult = $this->execute("CONSULTA GENERAL");
        } else {
            $consult = $this->execute("CONSULTA ESPECÍFICA");
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
}
