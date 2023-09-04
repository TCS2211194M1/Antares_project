<?php

spl_autoload_register(function ($class) {
    require_once($class . ".lib.php");
});

function username()
{
    date_default_timezone_set("America/Mexico_City");
    return date("y" . "n" . "150");
}

$year = date("y");
$month = date("m");

echo date($year . $month . "150");

class Functions extends Conexion
{
    function __construct()
    {
        $this->open();
    }
}
