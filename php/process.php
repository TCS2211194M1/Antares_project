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

                break;

            default:
                # code...
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
