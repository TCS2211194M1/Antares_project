<?php

spl_autoload_register(function ($class) {
    require_once($class . ".lib.php");
});

switch ($_POST["opc"]) {
    //Procesos de los Usuarios
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
                echo "No seleccionaste una acción para login";
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
            case 'addClient':
                echo $client->addClient($_POST);
                break;    
            default:
                echo "No seleccionaste una acción para clientes";
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
                echo "No seleccionaste una acción para taxid";
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
                echo "No seleccionaste una acción para roles";
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
                echo "No seleccionaste una acción para privilegios";
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
                echo "No seleccionaste una acción para productos";
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
                echo "No seleccionaste una acción para servicios";
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
                echo "No seleccionaste una acción para almacenamiento";
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
                echo "No seleccionaste una acción para particiones";
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
                echo "No seleccionaste una acción para órdenes de trabajo";
                break;
        }
        break;
    case 'workorder_flag':
        $workorderflag = new Workorder_Flag();
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
                echo "No seleccionaste una acción para bandera de órdenes de trabajo";
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
                echo "No seleccionaste una acción para regiones";
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
                echo "No seleccionaste una acción para subregiones";
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
                echo "No seleccionaste una acción para países";
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
                echo "No seleccionaste una acción para estados";
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
                echo "No seleccionaste una acción para ciudades";
                break;
        }
        break; 
    //Procesos para las tablas C_TABLE
    case 'pais':
        $pais = new Pais();
        switch ($_POST["acc"]) {
            case 'add':
                echo $pais->add($_POST);
                break;
            case 'mod':
                echo $pais->mod($_POST);
                break;
            case 'delete':
                echo $pais->delete($_POST);
                break;
            default:
                echo "No seleccionaste una acción para ciudades";
                break;
        }
        break;

    case 'estado':
        $estado = new Estado();
        switch ($_POST["acc"]) {
            case 'add':
                echo $estado->add($_POST);
                break;
            case 'mod':
                echo $estado->mod($_POST);
                break;
            case 'delete':
                echo $estado->delete($_POST);
                break;
            default:
                echo "No seleccionaste una acción para ciudades";
                break;
        }
        break;      
    case 'municipio':
        $municipio = new Municipio();
        switch ($_POST["acc"]) {
            case 'add':
                echo $municipio->add($_POST);
                break;
            case 'mod':
                echo $municipio->mod($_POST);
                break;
            case 'delete':
                echo $municipio->delete($_POST);
                break;
            default:
                echo "No seleccionaste una acción para municipio";
                break;
        }
        break;
    case 'localidad':
        $localidad = new Localidad();
        switch ($_POST["acc"]) {
            case 'add':
                echo $localidad->add($_POST);
                break;
            case 'mod':
                echo $localidad->mod($_POST);
                break;
            case 'delete':
                echo $localidad->delete($_POST);
                break;
            default:
                echo "No seleccionaste una acción para localidad";
                break;
        }
        break;  
    case 'colonia':
        $colonia = new Colonia();
        switch ($_POST["acc"]) {
            case 'add':
                echo $colonia->add($_POST);
                break;
            case 'mod':
                echo $colonia->mod($_POST);
                break;
            case 'delete':
                echo $colonia->delete($_POST);
                break;
            default:
                echo "No seleccionaste una acción para localidad";
                break;
        }
        break;    
    case 'meses':
        $meses = new Meses();
        switch ($_POST["acc"]) {
            case 'add':
                echo $meses->add($_POST);
                break;
            case 'mod':
                echo $meses->mod($_POST);
                break;
            case 'delete':
                echo $meses->delete($_POST);
                break;
            default:
                echo "No seleccionaste una acción para meses";
                break;
        }
        break;
    case 'moneda':
        $moneda = new Moneda();
        switch ($_POST["acc"]) {
            case 'add':
                echo $moneda->add($_POST);
                break;
            case 'mod':
                echo $moneda->mod($_POST);
                break;
            case 'delete':
                echo $moneda->delete($_POST);
                break;
            default:
                echo "No seleccionaste una acción para moneda";
                break;
        }
        break;
    case 'metodopago':
        $metodoPago = new MetodoPago();
        switch ($_POST["acc"]) {
            case 'add':
                echo $metodoPago->add($_POST);
                break;
            case 'mod':
                echo $metodoPago->mod($_POST);
                break;
            case 'delete':
                echo $metodoPago->delete($_POST);
                break;
            default:
                echo "No seleccionaste una acción para método de pago";
                break;
        }
        break;
    case 'formapago':
        $formapago = new FormaPago();
        switch ($_POST["acc"]) {
            case 'add':
                echo $formapago->add($_POST);
                break;
            case 'mod':
                echo $formapago->mod($_POST);
                break;
            case 'delete':
                echo $formapago->delete($_POST);
                break;
            default:
                echo "No seleccionaste una acción para forma de pago";
                break;
        }
        break;    
    case 'impuesto':
        $impuesto = new Impuesto();
        switch ($_POST["acc"]) {
            case 'add':
                echo $impuesto->add($_POST);
                break;
            case 'mod':
                echo $impuesto->mod($_POST);
                break;
            case 'delete':
                echo $impuesto->delete($_POST);
                break;
            default:
                echo "No seleccionaste una acción para impuesto";
                break;
        }
        break;
    case 'objetoimp':
        $objetoimpuesto = new ObjetoImp();
        switch ($_POST["acc"]) {
            case 'add':
                echo $objetoimpuesto->add($_POST);
                break;
            case 'mod':
                echo $objetoimpuesto->mod($_POST);
                break;
            case 'delete':
                echo $objetoimpuesto->delete($_POST);
                break;
            default:
                echo "No seleccionaste una acción para objeto impuesto";
                break;
        }
        break;
    case 'exportacion':
        $exportacion = new Exportacion();
        switch ($_POST["acc"]) {
            case 'add':
                echo $exportacion->add($_POST);
                break;
            case 'mod':
                echo $exportacion->mod($_POST);
                break;
            case 'delete':
                echo $exportacion->delete($_POST);
                break;
            default:
                echo "No seleccionaste una acción para exportacion";
                break;
        }
        break;
    case 'tiporelacion':
        $tiporelacion = new TipoRelacion();
        switch ($_POST["acc"]) {
            case 'add':
                echo $tiporelacion->add($_POST);
                break;
            case 'mod':
                echo $tiporelacion->mod($_POST);
                break;
            case 'delete':
                echo $tiporelacion->delete($_POST);
                break;
            default:
                echo "No seleccionaste una acción para tipo de relacion";
                break;
        }
        break;
    case 'tipofactor':
        $tipofactor = new TipoFactor();
        switch ($_POST["acc"]) {
            case 'add':
                echo $tipofactor->add($_POST);
                break;
            case 'mod':
                echo $tipofactor->mod($_POST);
                break;
            case 'delete':
                echo $tipofactor->delete($_POST);
                break;
            default:
                echo "No seleccionaste una acción para tipo de factor";
                break;
        }
        break;
    case 'tipodecomprobante':
        $tipocomprobante = new TipodeComprobante();
        switch ($_POST["acc"]) {
            case 'add':
                echo $tipocomprobante->add($_POST);
                break;
            case 'mod':
                echo $tipocomprobante->mod($_POST);
                break;
            case 'delete':
                echo $tipocomprobante->delete($_POST);
                break;
            default:
                echo "No seleccionaste una acción para tipo de comprobante";
                break;
        }
        break;    
    case 'regimenfiscal':
        $regimenfiscal = new RegimenFiscal();
        switch ($_POST["acc"]) {
            case 'add':
                echo $regimenfiscal->add($_POST);
                break;
            case 'mod':
                echo $regimenfiscal->mod($_POST);
                break;
            case 'delete':
                echo $regimenfiscal->delete($_POST);
                break;
            default:
                echo "No seleccionaste una acción para regimen fiscal";
                break;
        }
        break;    
    case 'claveprodserv':
        $claveprodserv = new Claveprodserv();
        switch ($_POST["acc"]) {
            case 'add':
                echo $claveprodserv->add($_POST);
                break;
            case 'mod':
                echo $claveprodserv->mod($_POST);
                break;
            case 'delete':
                echo $claveprodserv->delete($_POST);
                break;
            default:
                echo "No seleccionaste una acción para clave producto servicio";
                break;
        }
        break;
    case 'claveunidad':
        $claveunidad = new ClaveUnidad();
        switch ($_POST["acc"]) {
            case 'add':
                echo $claveunidad->add($_POST);
                break;
            case 'mod':
                echo $claveunidad->mod($_POST);
                break;
            case 'delete':
                echo $claveunidad->delete($_POST);
                break;
            default:
                echo "No seleccionaste una acción para clave unidad";
                break;
        }
        break;
    case 'periodicidad':
        $periodicidad = new Periodicidad();
        switch ($_POST["acc"]) {
            case 'add':
                echo $periodicidad->add($_POST);
                break;
            case 'mod':
                echo $periodicidad->mod($_POST);
                break;
            case 'delete':
                echo $periodicidad->delete($_POST);
                break;
            default:
                echo "No seleccionaste una acción para periodicidad";
                break;
        }
        break;
        
    //Procesos para SHOP
    case 'dominio':
        $dominio = new Dominio();
        switch ($_POST["acc"]) {
            case 'add':
                echo $dominio->add($_POST);
                break;
            case 'valida':
                echo $dominio->valida($_POST);
                break;
            case 'activar':
                echo $dominio->activar($_POST);    
                break;
            case 'desactivar':
                echo $dominio->desactivar($_POST);
                break;  
            case 'actualizar':
                echo $dominio->actualizar($_POST);
                break;      
            default:
                echo "No seleccionaste una acción para dominios";
                break;
        }
        break;
    case 'ticket':
        $ticket = new Ticket();
        switch ($_POST["acc"]) {
            case 'add':
                echo $ticket->add($_POST);
                break;
            case 'activar':
                echo $ticket->activar($_POST);
                break;
            case 'desactivar':
                echo $ticket->desactivar($_POST);
                break;
            default:
                echo "No seleccionaste una acción para tickets";
                break;
        }
        break;   
    case 'usuario':
        $client = new Client();
        switch ($_POST["acc"]) {
            case 'mod':
                echo $client->modUser($_POST);
                break;
            default:
                echo "No seleccionaste una acción para usuario";
                break;
        }
        break;          
    //Default
    default:
        echo "Error: No seleccionaste una opción";
    break;
}