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
                        <button class='btn bg-danger bg-gradient text-white rounded-pill w-25 p-2 m-3'  onclick='javascript:cargarInterfaz(\"login\",\"list\",\"null\");'>Return</button>
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
                $consultLogin = $client->login();
                $consultTaxid = $client->taxid();
                $consultWork = $client->workorder();
                echo "<h3 class='text-center text-secondary m-3'>Alta Client</h3>
                <form id='form-add-client'>
                    <div class='row'>
                        <div class='col-lg-3 col-md-3 col-sm-12'>
                            <div class='form-floating m-2 shadow'>
                                <input type='text' class='form-control' id='T_CLIENT' placeholder='T_CLIENT' required/>
                                <label for='floatingInput'>T_CLIENT</label>
                            </div>
                        </div>
                        <div class='col-lg-3 col-md-3 col-sm-12'>
                            <div class='form-floating m-2 shadow'>
                                <input type='text' class='form-control' id='SHORT_DESCRIPTION' placeholder='SHORT_DESCRIPTION' required/>
                                <label for='floatingInput'>SHORT_DESCRIPTION</label>
                            </div>
                        </div>
                        <div class='col-lg-3 col-md-3 col-sm-12'>
                            <div class='form-floating m-2 shadow'>
                                <input type='text' class='form-control' id='LOGIN_NAME' placeholder='LOGIN_NAME' required/>
                                <label for='floatingInput'>LOGIN_NAME</label>
                            </div>
                        </div>
                        <div class='col-lg-3 col-md-3 col-sm-12'>
                            <div class='form-floating m-2 shadow'>
                                <input type='text' class='form-control' id='LOGIN_LAST_NAME' placeholder='LOGIN_LAST_NAME' required/>
                                <label for='floatingInput'>LOGIN_LAST_NAME</label>
                            </div>
                        </div>
                    </div>

                    <div class='row'>
                        <div class='col-lg-4 col-md-4 col-sm-12'>
                            <div class='form-floating m-2 shadow'>
                                <input type='email' class='form-control' id='EMAIL' placeholder='EMAIL' required/>
                                <label for='floatingInput'>EMAIL</label>
                            </div>
                        </div>
                        <div class='col-lg-4 col-md-4 col-sm-12'>
                            <div class='form-floating m-2 shadow'>
                                <input type='number' class='form-control' id='CELLPHONE' placeholder='CELLPHONE' required/>
                                <label for='floatingInput'>CELLPHONE</label>
                            </div>
                        </div>
                        <div class='col-lg-4 col-md-4 col-sm-12'>
                            <div class='form-floating m-2 shadow'>
                                <input type='number' class='form-control' id='PHONE' placeholder='PHONE' required/>
                                <label for='floatingInput'>PHONE</label>
                            </div>
                        </div>
                    </div>

                    <div class='row'>
                        <div class='col-lg-4 col-md-4 col-sm-12'>
                            <div class='form-floating m-2 shadow'>
                                <select class='form-select' id='T_LOGIN'>";
                                while ($ren = $consultLogin->fetch_array(MYSQLI_ASSOC)) {
                                    echo "<option value='$ren[T_LOGIN]'>$ren[LOGIN_ROLE]</option>";
                                }
                                echo "</select>
                                <label for='floatingInput'>Login</label>
                            </div>
                        </div>
                        <div class='col-lg-4 col-md-4 col-sm-12'>
                            <div class='form-floating m-2 shadow'>
                                <select class='form-select' id='T_TAXID'>";
                                while ($ren = $consultTaxid->fetch_array(MYSQLI_ASSOC)) {
                                    echo "<option value='$ren[T_TAXID]'>$ren[RFC]</option>";
                                }
                                echo "</select>
                                <label for='floatingInput'>Login</label>
                            </div>
                        </div>
                        <div class='col-lg-4 col-md-4 col-sm-12'>
                            <div class='form-floating m-2 shadow'>
                                <select class='form-select' id='T_WORKORDER'>";
                                while ($ren = $consultWork->fetch_array(MYSQLI_ASSOC)) {
                                    echo "<option value='$ren[T_WORKORDER]'>$ren[REGISTERED_DOMAIN]</option>";
                                }
                                echo "</select>
                                <label for='floatingInput'>Login</label>
                            </div>
                        </div>
                    </div>

                    <div class='text-center mt-5'>
                        <button class='btn bg-success bg-gradient text-white rounded-pill w-25 p-2 m-3' onclick='javascript:addClient();'>Add</button>
                        <button class='btn bg-danger bg-gradient text-white rounded-pill w-25 p-2 m-3' onclick='javascript:cargarInterfaz(\"client\",\"list\",\"null\");'>Return</button>
                    </div>
                </form>";
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
        $taxid = new Taxid();
        switch ($_POST["acc"]) {
            case 'add':
                $consultPais = $taxid->pais();
                $consultEstado = $taxid->estado();
                echo "<h3 class='text-center text-secondary m-3'>Alta Taxid</h3>
                <form id='form-add-taxid'>
                    <div class='row'>
                        <div class='col-lg-4 col-md-4 col-sm-12'>
                            <div class='form-floating m-2 shadow'>
                                <input type='text' class='form-control' id='C_PAIS' placeholder='C_PAIS' required/>
                                <label for='floatingInput'>C_PAIS</label>
                            </div>
                        </div>
                        <div class='col-lg-4 col-md-4 col-sm-12'>
                            <div class='form-floating m-2 shadow'>
                                <input type='text' class='form-control' id='RFC' placeholder='RFC' required/>
                                <label for='floatingInput'>RFC</label>
                            </div>
                        </div>
                        <div class='col-lg-4 col-md-4 col-sm-12'>
                            <div class='form-floating m-2 shadow'>
                                <input type='text' class='form-control' id='ADDRESS' placeholder='ADDRESS' required/>
                                <label for='floatingInput'>ADDRESS</label>
                            </div>
                        </div>
                    </div>

                    <div class='row'>
                        <div class='col-lg-4 col-md-4 col-sm-12'>
                            <div class='form-floating m-2 shadow'>
                                <select class='form-select' id='C_PAIS'>";
                                while ($ren = $consultPais->fetch_array(MYSQLI_ASSOC)) {
                                    echo "<option value='$ren[C_PAIS]'>$ren[DESCRIPCION]</option>";
                                }
                                echo "</select>
                                <label for='floatingInput'>Pais</label>
                            </div>
                        </div>
                        <div class='col-lg-4 col-md-4 col-sm-12'>
                            <div class='form-floating m-2 shadow'>
                                <select class='form-select' id='C_ESTADO'>";
                                while ($ren = $consultEstado->fetch_array(MYSQLI_ASSOC)) {
                                    echo "<option value='$ren[C_ESTADO]'>$ren[NOMBRE_DEL_ESTADO]</option>";
                                }
                                echo "</select>
                                <label for='floatingInput'>Login</label>
                            </div>
                        </div>
                        <div class='col-lg-4 col-md-4 col-sm-12'>
                            <div class='form-floating m-2 shadow'>
                                <select class='form-select' id='T_WORKORDER'>";
                                while ($ren = $consultWork->fetch_array(MYSQLI_ASSOC)) {
                                    echo "<option value='$ren[T_WORKORDER]'>$ren[REGISTERED_DOMAIN]</option>";
                                }
                                echo "</select>
                                <label for='floatingInput'>Login</label>
                            </div>
                        </div>
                    </div>

                    <div class='row'>
                        <div class='col-lg-4 col-md-4 col-sm-12'>
                            <div class='form-floating m-2 shadow'>
                                <input type='email' class='form-control' id='EMAIL' placeholder='EMAIL' required/>
                                <label for='floatingInput'>EMAIL</label>
                            </div>
                        </div>
                        <div class='col-lg-4 col-md-4 col-sm-12'>
                            <div class='form-floating m-2 shadow'>
                                <input type='number' class='form-control' id='CELLPHONE' placeholder='CELLPHONE' required/>
                                <label for='floatingInput'>CELLPHONE</label>
                            </div>
                        </div>
                        <div class='col-lg-4 col-md-4 col-sm-12'>
                            <div class='form-floating m-2 shadow'>
                                <input type='number' class='form-control' id='PHONE' placeholder='PHONE' required/>
                                <label for='floatingInput'>PHONE</label>
                            </div>
                        </div>
                    </div>

                    <div class='text-center mt-5'>
                        <button class='btn bg-success bg-gradient text-white rounded-pill w-25 p-2 m-3' onclick='javascript:addTaxid();'>Add</button>
                        <button class='btn bg-danger bg-gradient text-white rounded-pill w-25 p-2 m-3' onclick='javascript:cargarInterfaz(\"taxid\",\"list\",\"null\");'>Return</button>
                    </div>
                </form>";
                break;
            case 'list':
                $functions->createTable($_POST["opc"], "t_taxid");
                break;
            case 'mod':
                $functions->createForm("t_taxid", $_POST["id"]);
                break;
            case 'delete':
                $functions->createForm("t_taxid", $_POST["id"]);
                break;    
            default:
                echo "Error, You did not select any operation (Add, List, Modify or Delete)";
                break;
            }
            break;
    case 'role':
        $role = new Role();
        switch ($_POST["acc"]) {
            case 'add':
                $consultPrivilege = $role->privilege();
                echo "<h3 class='text-center text-secondary m-3'>Alta Role</h3>
                <form id='form-add-role'>
                    <div class='row'>
                        <div class='col-lg-3 col-md-3 col-sm-12'>
                            <div class='form-floating m-2 shadow'>
                                <input type='text' class='form-control' id='T_ROLE' placeholder='T_ROLE' required/>
                                <label for='floatingInput'>T_ROLE</label>
                            </div>
                        </div>
                        <div class='col-lg-3 col-md-3 col-sm-12'>
                            <div class='form-floating m-2 shadow'>
                                <input type='text' class='form-control' id='SHORT_DESCRIPTION' placeholder='SHORT_DESCRIPTION' required/>
                                <label for='floatingInput'>SHORT_DESCRIPTION</label>
                            </div>
                        </div>
                        <div class='col-lg-6 col-md-6 col-sm-12'>
                            <div class='form-floating m-2 shadow'>
                                <input type='text' class='form-control' id='LONG_DESCRIPTION' placeholder='LONG_DESCRIPTION' required/>
                                <label for='floatingInput'>LONG_DESCRIPTION</label>
                            </div>
                        </div>
                    </div>

                    <div class='row'>
                        <div class='col-lg-5 col-md-5 col-sm-12'>
                            <div class='form-floating m-2 shadow'>
                                <select class='form-select' id='T_PRIVILEGE'>";
                                while ($ren = $consultPrivilege->fetch_array(MYSQLI_ASSOC)) {
                                    echo "<option value='$ren[T_PRIVILEGE]'>$ren[SHORT_DESCRIPTION]</option>";
                                }
                                echo "</select>
                                <label for='floatingInput'>Privilege</label>
                            </div>
                        </div>
                    </div>

                    <div class='text-center mt-5'>
                        <button class='btn bg-success bg-gradient text-white rounded-pill w-25 p-2 m-3' onclick='javascript:addRole();'>Add</button>
                        <button class='btn bg-danger bg-gradient text-white rounded-pill w-25 p-2 m-3' onclick='javascript:cargarInterfaz(\"role\",\"list\",\"null\");'>Return</button>
                    </div>
                </form>";    
                break;
    
            case 'list':
                $functions->createTable($_POST["opc"], "t_role");
                break;
            case 'mod':
                $functions->createForm("t_role", $_POST["id"]);
                break;
            case 'delete':
                $functions->createForm("t_role", $_POST["id"]);
                break;

            default:
                echo "Error, You did not select any operation (Add, List, Modify or Delete)";
                break;
            }
            break;
    case 'privilege':
        switch ($_POST["acc"]) {
            case 'add':
                echo "<h3 class='text-center text-secondary m-3'>Alta Role</h3>
                <form id='form-add-privilege'>
                    <div class='row'>
                        <div class='col-lg-3 col-md-3 col-sm-12'>
                            <div class='form-floating m-2 shadow'>
                                <input type='text' class='form-control' id='T_PRIVILEGE' placeholder='T_PRIVILEGE' required/>
                                <label for='floatingInput'>T_PRIVILEGE</label>
                            </div>
                        </div>
                        <div class='col-lg-3 col-md-3 col-sm-12'>
                            <div class='form-floating m-2 shadow'>
                                <input type='text' class='form-control' id='SHORT_DESCRIPTION' placeholder='SHORT_DESCRIPTION' required/>
                                <label for='floatingInput'>SHORT_DESCRIPTION</label>
                            </div>
                        </div>
                        <div class='col-lg-3 col-md-3 col-sm-12'>
                            <div class='form-floating m-2 shadow'>
                                <input type='text' class='form-control' id='GRANT_TABLE_COLUMN' placeholder='GRANT_TABLE_COLUMN' required/>
                                <label for='floatingInput'>GRANT_TABLE_COLUMN</label>
                            </div>
                        </div>
                        <div class='col-lg-3 col-md-3 col-sm-12'>
                            <div class='form-floating m-2 shadow'>
                                <input type='text' class='form-control' id='CONTEXT' placeholder='CONTEXT' required/>
                                <label for='floatingInput'>CONTEXT</label>
                            </div>
                        </div>
                    </div>

                    <div class='text-center mt-5'>
                        <button class='btn bg-success bg-gradient text-white rounded-pill w-25 p-2 m-3' onclick='javascript:addPrivilege();'>Add</button>
                        <button class='btn bg-danger bg-gradient text-white rounded-pill w-25 p-2 m-3' onclick='javascript:cargarInterfaz(\"privilege\",\"list\",\"null\");'>Return</button>
                    </div>
                </form>";    
                break;
                break;
            case 'list':
                $functions->createTable($_POST["opc"], "t_privilege");
                break;
            case 'mod':
                $functions->createForm("t_privilege", $_POST["id"]);
                break;
            case 'delete':
                $functions->createForm("t_privilege", $_POST["id"]);
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
                $consultService = $product->service();
                echo "<h3 class='text-center text-secondary m-3'>Alta Product</h3>
                <form id='form-add-client'>
                    <div class='row'>
                        <div class='col-lg-3 col-md-3 col-sm-12'>
                            <div class='form-floating m-2 shadow'>
                                <input type='text' class='form-control' id='T_PRODUCT' placeholder='T_PRODUCT' required/>
                                <label for='floatingInput'>T_PRODUCT</label>
                            </div>
                        </div>
                        <div class='col-lg-3 col-md-3 col-sm-12'>
                            <div class='form-floating m-2 shadow'>
                                <input type='text' class='form-control' id='SHORT_DESCRIPTION' placeholder='SHORT_DESCRIPTION' required/>
                                <label for='floatingInput'>SHORT_DESCRIPTION</label>
                            </div>
                        </div>
                        <div class='col-lg-3 col-md-3 col-sm-12'>
                            <div class='form-floating m-2 shadow'>
                                <input type='text' class='form-control' id='LONG_DESCRIPTION' placeholder='LONG_DESCRIPTION' required/>
                                <label for='floatingInput'>LONG_DESCRIPTION</label>
                            </div>
                        </div>
                        <div class='col-lg-4 col-md-4 col-sm-12'>
                            <div class='form-floating m-2 shadow'>
                                <select class='form-select' id='T_LOGIN'>";
                                while ($ren = $consultLogin->fetch_array(MYSQLI_ASSOC)) {
                                    echo "<option value='$ren[T_LOGIN]'>$ren[LOGIN_ROLE]</option>";
                                }
                                echo "</select>
                                <label for='floatingInput'>Login</label>
                            </div>
                        </div>
                    </div>

                    <div class='row'>
                        <div class='col-lg-4 col-md-4 col-sm-12'>
                            <div class='form-floating m-2 shadow'>
                                <input type='email' class='form-control' id='EMAIL' placeholder='EMAIL' required/>
                                <label for='floatingInput'>EMAIL</label>
                            </div>
                        </div>
                        <div class='col-lg-4 col-md-4 col-sm-12'>
                            <div class='form-floating m-2 shadow'>
                                <input type='number' class='form-control' id='CELLPHONE' placeholder='CELLPHONE' required/>
                                <label for='floatingInput'>CELLPHONE</label>
                            </div>
                        </div>
                        <div class='col-lg-4 col-md-4 col-sm-12'>
                            <div class='form-floating m-2 shadow'>
                                <input type='number' class='form-control' id='PHONE' placeholder='PHONE' required/>
                                <label for='floatingInput'>PHONE</label>
                            </div>
                        </div>
                    </div>

                    <div class='row'>
                        <div class='col-lg-4 col-md-4 col-sm-12'>
                            <div class='form-floating m-2 shadow'>
                                <select class='form-select' id='T_LOGIN'>";
                                while ($ren = $consultLogin->fetch_array(MYSQLI_ASSOC)) {
                                    echo "<option value='$ren[T_LOGIN]'>$ren[LOGIN_ROLE]</option>";
                                }
                                echo "</select>
                                <label for='floatingInput'>Login</label>
                            </div>
                        </div>
                        <div class='col-lg-4 col-md-4 col-sm-12'>
                            <div class='form-floating m-2 shadow'>
                                <select class='form-select' id='T_TAXID'>";
                                while ($ren = $consultTaxid->fetch_array(MYSQLI_ASSOC)) {
                                    echo "<option value='$ren[T_TAXID]'>$ren[RFC]</option>";
                                }
                                echo "</select>
                                <label for='floatingInput'>Login</label>
                            </div>
                        </div>
                        <div class='col-lg-4 col-md-4 col-sm-12'>
                            <div class='form-floating m-2 shadow'>
                                <select class='form-select' id='T_WORKORDER'>";
                                while ($ren = $consultWork->fetch_array(MYSQLI_ASSOC)) {
                                    echo "<option value='$ren[T_WORKORDER]'>$ren[REGISTERED_DOMAIN]</option>";
                                }
                                echo "</select>
                                <label for='floatingInput'>Login</label>
                            </div>
                        </div>
                    </div>

                    <div class='text-center mt-5'>
                        <button class='btn bg-success bg-gradient text-white rounded-pill w-25 p-2 m-3' onclick='javascript:addClient();'>Add</button>
                        <button class='btn bg-danger bg-gradient text-white rounded-pill w-25 p-2 m-3' onclick='javascript:cargarInterfaz(\"client\",\"list\",\"null\");'>Return</button>
                    </div>
                </form>";
                
                break;

            case 'list':
                $functions->createTable($_POST["opc"], "t_product");
                break;
            case 'mod':
                $functions->createForm("t_product", $_POST["id"]);
                break;
            case 'delete':
                $functions->createForm("t_product", $_POST["id"]);
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
                $functions->createTable($_POST["opc"], "t_service");
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
                    $functions->createTable($_POST["opc"], "t_storage");
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
                $functions->createTable($_POST["opc"], "t_partition");
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
                $functions->createTable($_POST["opc"], "t_subregion");
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
                $functions->createTable($_POST["opc"], "t_country");
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
                $functions->createTable($_POST["opc"], "t_state");
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
                $functions->createTable($_POST["opc"], "t_city");
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