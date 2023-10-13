<?php

spl_autoload_register(function ($class) {
    require_once($class . ".lib.php");
});

switch ($_POST["opc"]) {
    case 'login':
        $login = new Login();
        switch ($_POST["acc"]) {
            case 'add':
                echo $login->add($_POST);
                break;

            case 'mod':

                break;

            case 'delete':
                echo $login->delete($_POST);
                break;

            default:
                echo "Error, no seleccionaste una acción para login";
                break;
        }
        break;

    case 'client':
        $client = new Client();
        switch ($_POST["acc"]) {
            case 'add':
                echo $client->add($_POST);
                break;

            case 'mod':
                break;

            case 'delete':
                echo $client->delete($_POST);
                break;
            default:
                echo "Error, no seleccionaste una acción para client";
                break;
        }
        break;

    default:
        echo "Error (Process): No seleccionaste ninguna opción";
        break;
}
