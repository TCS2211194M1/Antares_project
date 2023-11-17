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
            case 'login':
                echo $login->login($_POST);
                break;
            default:
                echo "<div class='alert alert-danger' role='alert'>No seleccionaste una acción para login</div>";
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
                echo "<div class='alert alert-danger' role='alert'>No seleccionaste una acción para clientes</div>";
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
                echo "<div class='alert alert-danger' role='alert'>No seleccionaste una acción para taxid</div>";
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
                echo "<div class='alert alert-danger' role='alert'>No seleccionaste una acción para roles</div>";
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
                echo "<div class='alert alert-danger' role='alert'>No seleccionaste una acción para privilegios</div>";
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
                echo "<div class='alert alert-danger' role='alert'>No seleccionaste una acción para productos</div>";
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
                echo "<div class='alert alert-danger' role='alert'>No seleccionaste una acción para servicios</div>";
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
                echo "<div class='alert alert-danger' role='alert'>No seleccionaste una acción para almacenamiento</div>";
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
                echo "<div class='alert alert-danger' role='alert'>No seleccionaste una acción para particiones</div>";
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
                echo "<div class='alert alert-danger' role='alert'>No seleccionaste una acción para órdenes de trabajo</div>";
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
                echo "<div class='alert alert-danger' role='alert'>No seleccionaste una acción para bandera de órdenes de trabajo</div>";
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
                echo "<div class='alert alert-danger' role='alert'>No seleccionaste una acción para regiones</div>";
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
                echo "<div class='alert alert-danger' role='alert'>No seleccionaste una acción para subregiones</div>";
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
                echo "<div class='alert alert-danger' role='alert'>No seleccionaste una acción para países</div>";
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
                echo "<div class='alert alert-danger' role='alert'>No seleccionaste una acción para estados</div>";
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
                echo "<div class='alert alert-danger' role='alert'>No seleccionaste una acción para ciudades</div>";
                break;
        }
        break;            
    
    default:
        echo "<div class='alert alert-danger' role='alert'>Error (Process): No seleccionaste una opción</div>";
        break;
}