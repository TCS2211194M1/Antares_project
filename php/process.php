<?php

spl_autoload_register(function ($class) {
    require_once($class . ".lib.php");
});

switch ($_POST["opc"]) {
    case 'client':
        $client = new Client();
        switch ($_POST["acc"]) {
            case 'add':
                echo $client->add($_POST);
                break;

            case 'update':

                break;

            case 'delete':
                echo $client->delete($_POST);
                break;

            default:
                echo "Error, no seleccionaste una opción para clientes";
                break;
        }
        break;

    case 'user':
        # code...
        break;

    default:
        # code...
        break;
}
