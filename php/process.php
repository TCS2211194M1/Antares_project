<?php

spl_autoload_register(function ($class) {
    require_once($class . ".lib.php");
});

switch ($_POST["opc"]) {
    //Procesos de los Clientes
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

    //Procesos de los Productos
    case 'product':
        $product = new Product();
        switch ($_POST["acc"]) {
            case 'add':
                echo $product->add($_POST);
                break;
            case 'mod':
                echo $product->mod($_POST);
                break;
            case 'delete':
                echo $product->delete($_POST);
                break;
            default:
                echo "Error, no seleccionaste una acción para product";
                break;
        }
        break;
    case 'service':
        $service = new Service();
        switch ($_POST["acc"]) {
            case 'add':
                echo $service->add($_POST);
                break;
            case 'mod':
                echo $service->mod($_POST);
                break;
            case 'delete':
                echo $service->delete($_POST);
                break;
            default:
                echo "Error, no seleccionaste una acción para service";
                break;
        }
        break;
    
    case 'storage':
        $storage = new Storage();
        switch ($_POST["acc"]) {
            case 'add':
                echo $storage->add($_POST);
                break;
            case 'mod':
                echo $storage->mod($_POST);
                break;
            case 'delete':
                echo $storage->delete($_POST);
                break;
            default:
                echo "Error, no seleccionaste una acción para storage";
                break;
        }
        break;
    case 'partition':
        $partition = new Partition();
        switch ($_POST["acc"]) {
            case 'add':
                echo $partition->add($_POST);
                break;
            case 'mod':
                echo $partition->mod($_POST);
                break;
            case 'delete':
                echo $partition->delete($_POST);
                break;
            default:
                echo "Error, no seleccionaste una acción para partition";
                break;
        }
        break;    
    //Procesos para los Work Order
    case 'workorder':
        $workorder = new Workorder();
        switch ($_POST["acc"]) {
            case 'add':
                echo $workorder->add($_POST);
                break;
            case 'mod':
                echo $workorder->mod($_POST);
                break;
            case 'delete':
                echo $workorder->delete($_POST);
                break;
            default:
                echo "Error, no seleccionaste una acción para workorder";
                break;
        }
        break;
    case 'workorderflag':
        $workorderflag = new Workorderflag();
        switch ($_POST["acc"]) {
            case 'add':
                echo $workorderflag->add($_POST);
                break;
            case 'mod':
                echo $workorderflag->mod($_POST);
                break;
            case 'delete':
                echo $workorderflag->delete($_POST);
                break;
            default:
                echo "Error, no seleccionaste una acción para workorderflag";
                break;
        }
        break;           
    //Procesos para las localizaciones
    case 'region':
        $region = new region();
        switch ($_POST["acc"]) {
            case 'add':
                echo $region->add($_POST);
                break;
            case 'mod':
                echo $region->mod($_POST);
                break;
            case 'delete':
                echo $region->delete($_POST);
                break;
            default:
                echo "Error, no seleccionaste una acción para region";
                break;
        }
        break;
    case 'subregion':
        $subregion = new Subregion();
        switch ($_POST["acc"]) {
            case 'add':
                echo $subregion->add($_POST);
                break;
            case 'mod':
                echo $subregion->mod($_POST);
                break;
            case 'delete':
                echo $subregion->delete($_POST);
                break;
            default:
                echo "Error, no seleccionaste una acción para subregion";
                break;
        }
        break;
    case 'country':
        $country = new Country();
        switch ($_POST["acc"]) {
            case 'add':
                echo $country->add($_POST);
                break;
            case 'mod':
                echo $country->mod($_POST);
                break;
            case 'delete':
                echo $country->delete($_POST);
                break;
            default:
                echo "Error, no seleccionaste una acción para country";
                break;
        }
        break;
    case 'state':
        $state = new State();
        switch ($_POST["acc"]) {
            case 'add':
                echo $state->add($_POST);
                break;
            case 'mod':
                echo $state->mod($_POST);
                break;
            case 'delete':
                echo $state->delete($_POST);
                break;
            default:
                echo "Error, no seleccionaste una acción para state";
                break;
        }
        break;
    case 'city':
        $city = new City();
        switch ($_POST["acc"]) {
            case 'add':
                echo $city->add($_POST);
                break;
            case 'mod':
                echo $city->mod($_POST);
                break;
            case 'delete':
                echo $city->delete($_POST);
                break;
            default:
                echo "Error, no seleccionaste una acción para city";
                break;
        }
        break;            
    
    default:
        echo "Error (Process): No seleccionaste ninguna opción";
        break;
}