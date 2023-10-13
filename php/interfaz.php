<?php
spl_autoload_register(function ($class) {
    require_once($class . ".lib.php");
});

require_once("../php/functions.php");

$functions = new Functions();

switch ($_POST["opc"]) {
    //INTERFACES DE CLIENTES
    case 'login':
        $login = new Login();
        switch ($_POST["acc"]) {
            case 'add':
                $consultRole = $login->roles();
                echo "<h3 class='text-center text-secondary m-3'>Alta de Login</h3>
                <form id='form-add-login'>
                    <div class='row'>
                        <div class='col-lg-6 col-md-6 col-sm-12'>
                            <div class='form-floating m-2 shadow'>
                                <input type='text' class='form-control' id='T_LOGIN' placeholder='T_LOGIN' required/>
                                <label for='floatingInput'>T_LOGIN</label>
                            </div>
                        </div>
                        <div class='col-lg-6 col-md-6 col-sm-12'>
                            <div class='form-floating m-2 shadow'>
                                <select class='form-select' id='LOGIN_ROLE'>";
                                while ($ren = $consultRole->fetch_array(MYSQLI_ASSOC)) {
                                    echo "<option value='$ren[SHORT_DESCRIPTION]'>$ren[SHORT_DESCRIPTION]</option>";
                                }
                                echo "</select>
                                <label for='floatingInput'>Role</label>
                            </div>
                        </div>
                    </div>

                    <div class='text-center mt-5'>
                        <button class='btn bg-success bg-gradient text-white rounded-pill w-25 p-2 m-3' onclick='javascript:addLogin();'>Add</button>
                        <button class='btn bg-danger bg-gradient text-white rounded-pill w-25 p-2 m-3'>Return</button>
                    </div>
                </form>";

                break;

            case 'list':
                $functions->createTable($_POST["opc"], "t_login");
                break;
            case 'mod':
                $functions->createForm("t_login", $_POST["id"]);
                break;
            case 'delete':
                $functions->createForm("t_login", $_POST["id"]);
                break;
            default:
                echo "Error, You did not select any operation (Add, List, Modify or Delete)";
                break;
        }
        break;
    case 'client':
        $client = new Client();
        switch ($_POST["acc"]) {
            case 'add':
                echo "En construcción";
                break;
    
            case 'list':
                $functions->createTable($_POST["opc"], "t_client");
                break;

            case 'mod':
                $functions->createForm("t_client", $_POST["id"]);
                break;
            case 'delete':
                $functions->createForm("t_client", $_POST["id"]);
                break;     
            default:
                echo "Error, You did not select any operation (Add, List, Modify or Delete)";
                break;
            }
            break;
    case 'taxid':
        //$taxid = new Taxid();
        switch ($_POST["acc"]) {
            case 'add':
                    
                break;
    
            case 'list':
                $functions->createTable("t_taxid");
                break;
    
                
            default:
                echo "Error, You did not select any operation (Add, List, Modify or Delete)";
                break;
            }
            break;
    case 'role':
        //$taxid = new Taxid();
        switch ($_POST["acc"]) {
            case 'add':
                    
                break;
    
            case 'list':
                $functions->createTable("t_role");
                break;
    
                
            default:
                echo "Error, You did not select any operation (Add, List, Modify or Delete)";
                break;
            }
            break;
    case 'privilege':
        //$taxid = new Taxid();
        switch ($_POST["acc"]) {
            case 'add':
                    
                break;
    
            case 'list':
                $functions->createTable("t_privilege");
                break;
    
                
            default:
                echo "Error, You did not select any operation (Add, List, Modify or Delete)";
                break;
            }
            break;

    //INTERFACES DE PRODUCTOS        
    case 'product':
        $product = new Product();
        switch ($_POST["acc"]) {
            case 'add':
                
                break;

            case 'list':
                $functions->createTable("t_product");
                break;
            
            default:
                echo "Error, You did not select any operation (Add, List, Modify or Delete)";
                break;
        }
        break;
    case 'service':
        $product = new Product();
        switch ($_POST["acc"]) {
            case 'add':
                
                break;

            case 'list':
                $functions->createTable("t_service");
                break;
            
            default:
                echo "Error, You did not select any operation (Add, List, Modify or Delete)";
                break;
        }
        break;
    case 'storage':
            $product = new Product();
            switch ($_POST["acc"]) {
                case 'add':
                    
                    break;
    
                case 'list':
                    $functions->createTable("t_storage");
                    break;
                
                default:
                    echo "Error, You did not select any operation (Add, List, Modify or Delete)";
                    break;
            }
            break;  
    case 'partition':
        $product = new Product();
        switch ($_POST["acc"]) {
            case 'add':
                    
                break;
    
            case 'list':
                $functions->createTable("t_partition");
                break;
                
            default:
                echo "Error, You did not select any operation (Add, List, Modify or Delete)";
                break;
            }
            break;          
    //INTERFACES DE LUGARES        
    case 'subregion':
        //$role = new Role();
        switch ($_POST["acc"]) {
            case 'add':
                
                break;
            
            case 'list':
                $functions->createTable("t_subregion");
                break;

            default:
                echo "Error, You did not select any operation (Add, List, Modify or Delete)";
                break;
        }
        break;    
    case 'country':
        //$role = new Role();
        switch ($_POST["acc"]) {
            case 'add':
                
                break;
            
            case 'list':
                $functions->createTable("t_country");
                break;

            default:
                echo "Error, You did not select any operation (Add, List, Modify or Delete)";
                break;
        }
        break;  
    case 'state':
        //$role = new Role();
        switch ($_POST["acc"]) {
            case 'add':
                
                break;
            
            case 'list':
                $functions->createTable("t_state");
                break;

            default:
                echo "Error, You did not select any operation (Add, List, Modify or Delete)";
                break;
        }
        break;
    case 'city':
        //$role = new Role();
        switch ($_POST["acc"]) {
            case 'add':
                
                break;
            
            case 'list':
                $functions->createTable("");
                break;

            default:
                echo "Error, You did not select any operation (Add, List, Modify or Delete)";
                break;
        }
        break;                
    default:
        echo "Error, You did not select any option (Login, Client, Role, Product, Service, Storage, Country)";
        break;
}