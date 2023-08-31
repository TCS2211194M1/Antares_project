<?php
require_once("funciones.php");

spl_autoload_register(function ($class) {
    require_once($class . ".lib.php");
});

switch ($_POST["opc"]) {
    case 'client':
        echo "En construcción...";

        break;

    case 'user':

        break;

    case '':

        break;

    default:
        # code...
        break;
}
