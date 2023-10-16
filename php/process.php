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
                echo $login->mod($_POST);
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
                echo $client->mod($_POST);
                break;

            case 'delete':
                echo $client->delete($_POST);
                break;
            default:
                echo "Error, no seleccionaste una acción para client";
                break;
        }
        break;

    case 'taxid':
        $taxid = new Taxid();
        switch ($_POST["acc"]) {
            case 'add':
                echo $taxid->add($_POST);
                break;
            case 'mod':
                echo $taxid->mod($_POST);
                break;
            case 'delete':
                echo $taxid->delete($_POST);
                break;
            default:
                echo "Error, no seleccionaste una acción para taxid";
                break;
        }
        break;
    case 'role':
        $role = new Role();
        switch ($_POST["acc"]) {
            case 'add':
                echo $role->add($_POST);
                break;
            case 'mod':
                echo $role->mod($_POST);
                break;
            case 'delete':
                echo $role->delete($_POST);
                break;
            default:
                echo "Error, no seleccionaste una acción para role";
                break;
        }
        break;
    case 'privilege':
        $privilege = new Privilege();
        switch ($_POST["acc"]) {
            case 'add':
                echo $privilege->add($_POST);
                break;
            case 'mod':
                echo $privilege->mod($_POST);
                break;
            case 'delete':
                echo $privilege->delete($_POST);
                break;
            default:
                echo "Error, no seleccionaste una acción para privilege";
                break;
        }
        break;

    default:
        echo "Error (Process): No seleccionaste ninguna opción";
        break;
}
