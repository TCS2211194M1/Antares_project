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

#echo date($year . $month . "150");

class Functions extends Connection
{
    function __construct()
    {
        $this->open();
    }

    function lastUsername()
    {
        $consult = $this->execute("SELECT MAX(username) as ultimo FROM t_login");
        return $consult;
    }
}

$functions = new Functions();
#Funcionalidad para el análisis de requerimiento
$consult = $functions->lastUsername();
if ($consult->num_rows > 0) {
    $country = 1;
    $ren = $consult->fetch_array(MYSQLI_ASSOC);
    $usernameActual = substr($ren["ultimo"], 7, 9);
    if ($year == substr($ren["ultimo"], 0, 2) | $month == substr($ren["ultimo"], 2, 2) | $country == substr($ren["ultimo"], 4, 3)) {
        $username = $year . $month . sprintf("%03d", $country) . sprintf("%03d", $usernameActual + 1);
        echo $username;
    } else {
        echo "año";
    }
} else {
    echo "Error no hay registros";
}
