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
                        <div class='col-lg-4 col-md-6 col-sm-12'></div>
                        <div class='col-lg-4 col-md-6 col-sm-12'>
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
                </form> 
                <div class='row text-center my-5'>
                    <div class='col-lg-3'></div>    
                    <div class='col-lg-3 mt-3'>
                        <button class='btn bg-success bg-gradient text-white rounded-pill shadow w-50' onclick='javascript:addLogin();'><i class='bi bi-person-plus-fill me-2'></i>Agregar</button>
                    </div>
                    <div class='col-lg-3 mt-3'>
                        <button class='btn bg-danger bg-gradient text-white rounded-pill shadow w-50' onclick='javascript:cargarInterfaz(\"login\",\"list\",\"null\");'><i class='bi bi-box-arrow-in-left me-2'></i>Regresar</button>
                    </div>
                    <div class='col-lg-3'></div>  
                </div>";
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
                        <div class='col-lg-4 col-md-4 col-sm-12'>
                            <div class='form-floating m-2 shadow'>
                                <input type='text' class='form-control' id='SHORT_DESCRIPTION' placeholder='SHORT_DESCRIPTION' required/>
                                <label for='floatingInput'>SHORT_DESCRIPTION</label>
                            </div>
                        </div>
                        <div class='col-lg-4 col-md-4 col-sm-12'>
                            <div class='form-floating m-2 shadow'>
                                <input type='text' class='form-control' id='LOGIN_NAME' placeholder='LOGIN_NAME' required/>
                                <label for='floatingInput'>LOGIN_NAME</label>
                            </div>
                        </div>
                        <div class='col-lg-4 col-md-4 col-sm-12'>
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
                </form>
                <div class='row text-center my-5'>
                    <div class='col-lg-3'></div>    
                    <div class='col-lg-3 mt-3'>
                        <button class='btn bg-success bg-gradient text-white rounded-pill shadow w-50' onclick='javascript:addClient();'>Add</button>
                    </div>
                    <div class='col-lg-3 mt-3'>
                        <button class='btn bg-danger bg-gradient text-white rounded-pill shadow w-50' onclick='javascript:cargarInterfaz(\"client\",\"list\",\"null\");'>Return</button>
                    </div>
                    <div class='col-lg-3'></div>  
                </div>";
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
                echo "<h3 class='text-center text-secondary m-3'>Alta Taxid</h3>
                <form id='form-add-taxid'>
                    <div class='row'>
                        <div class='col-lg-4 col-md-4 col-sm-12'>
                            <div class='form-floating m-2 shadow'>
                                <input type='text' class='form-control' id='RFC' placeholder='RFC' required/>
                                <label for='floatingInput'>RFC</label>
                            </div>
                        </div>
                        <div class='col-lg-4 col-md-4 col-sm-12'>
                            <div class='form-floating m-2 shadow'>
                                <input type='text' class='form-control' id='DIRECCION' placeholder='Dirección' required/>
                                <label for='floatingInput'>Dirección</label>
                            </div>
                        </div>
                        <div class='col-lg-4 col-md-4 col-sm-12'>
                            <div class='form-floating m-2 shadow'>
                                <select class='form-select' id='C_PAIS' onchange='javascript:ajax(\"estado\");'>
                                    <option>Selecciona una opción</option>";
                                while ($ren = $consultPais->fetch_array(MYSQLI_ASSOC)) {
                                    echo "<option value='$ren[CODE]'>$ren[DESCRIPCION]</option>";
                                }
                                echo "</select>
                                <label for='floatingInput'>Pais</label>
                            </div>
                        </div>
                    </div>
                    <div class='row'>
                        <div class='col-lg-3 col-md-3 col-sm-12'>
                            <div class='form-floating m-2 shadow' id='selectEstado'></div>
                        </div>
                        <div class='col-lg-3 col-md-3 col-sm-12'>
                            <div class='form-floating m-2 shadow' id='selectMunicipio'></div>
                        </div>
                        <div class='col-lg-3 col-md-3 col-sm-12'>
                            <div class='form-floating m-2 shadow' id='selectLocalidad'></div>
                        </div>   
                    </div>

                    <div class='text-center my-5'>
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
                        <div class='col-lg-3 col-md-5 col-sm-12'>
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
                </form>
                <div class='row text-center my-5'>
                    <div class='col-lg-3'></div>    
                    <div class='col-lg-3 mt-3'>
                        <button class='btn bg-success bg-gradient text-white rounded-pill shadow w-50' onclick='javascript:addRole();'>Add</button>
                    </div>
                    <div class='col-lg-3 mt-3'>
                        <button class='btn bg-danger bg-gradient text-white rounded-pill shadow w-50' onclick='javascript:cargarInterfaz(\"role\",\"list\",\"null\");'>Return</button>
                    </div>
                    <div class='col-lg-3'></div>  
                </div>";    
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
                        <div class='col-lg-4 col-md-3 col-sm-12'>
                            <div class='form-floating m-2 shadow'>
                                <input type='text' class='form-control' id='SHORT_DESCRIPTION' placeholder='SHORT_DESCRIPTION' required/>
                                <label for='floatingInput'>SHORT_DESCRIPTION</label>
                            </div>
                        </div>
                        <div class='col-lg-4 col-md-3 col-sm-12'>
                            <div class='form-floating m-2 shadow'>
                                <input type='text' class='form-control' id='GRANT_TABLE_COLUMN' placeholder='GRANT_TABLE_COLUMN' required/>
                                <label for='floatingInput'>GRANT_TABLE_COLUMN</label>
                            </div>
                        </div>
                        <div class='col-lg-4 col-md-3 col-sm-12'>
                            <div class='form-floating m-2 shadow'>
                                <input type='text' class='form-control' id='CONTEXT' placeholder='CONTEXT' required/>
                                <label for='floatingInput'>CONTEXT</label>
                            </div>
                        </div>
                    </div>
                </form>
                <div class='row text-center mt-4'>
                    <div class='col-lg-3'></div>    
                    <div class='col-lg-3 mt-3'>
                        <button class='btn bg-success bg-gradient text-white rounded-pill shadow w-50' onclick='javascript:addPrivilege();'>Add</button>
                    </div>
                    <div class='col-lg-3 mt-3'>
                        <button class='btn bg-danger bg-gradient text-white rounded-pill shadow w-50' onclick='javascript:cargarInterfaz(\"privilege\",\"list\",\"null\");'>Return</button>
                    </div>
                    <div class='col-lg-3'></div>  
                </div>"; 
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
                $consultClaveUnidad = $product->claveUnidad();
                $consultMoneda = $product->moneda();
                $consultPeriodicidad = $product->periodicidad();
                $consultObjetoImp = $product->objetoImpuesto();
                $consultImpuesto = $product->impuesto();
                $consultTipoFactor = $product->tipoFactor();
                $consultTasa = $product->tasa();
                echo "<h3 class='text-center text-secondary m-3'>Alta Product</h3>
                <form id='form-add-product'>
                    <div class='row'>
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
                        <div class='col-lg-3 col-md-3 col-sm-12'>
                            <div class='form-floating m-2 shadow'>
                                <select class='form-select' id='T_SERVICE'>";
                                while ($ren = $consultService->fetch_array(MYSQLI_ASSOC)) {
                                    echo "<option value='$ren[T_SERVICE]'>$ren[SHORT_DESCRIPTION]</option>";
                                }
                                echo "</select>
                                <label for='floatingInput'>Service</label>
                            </div>
                        </div>
                    </div>

                    <div class='row'>
                        <div class='col-lg-2 col-md-2 col-sm-12'>
                            <div class='form-floating m-2 shadow'>
                                <input type='text' class='form-control' id='HOSTED_DOMAINS' placeholder='HOSTED_DOMAINS' required/>
                                <label for='floatingInput'>HOSTED_DOMAINS</label>
                            </div>
                        </div>
                        <div class='col-lg-3 col-md-3 col-sm-12'>
                            <div class='form-floating m-2 shadow'>
                                <input type='number' class='form-control' id='REQUIRED_SIZE' placeholder='REQUIRED_SIZE' required/>
                                <label for='floatingInput'>REQUIRED_SIZE</label>
                            </div>
                        </div>
                        <div class='col-lg-2 col-md-2 col-sm-12'>
                            <div class='form-floating m-2 shadow'>
                                <select class='form-select' id='C_CLAVEUNIDAD'>";
                                while ($ren = $consultClaveUnidad->fetch_array(MYSQLI_ASSOC)) {
                                    echo "<option value='$ren[C_CLAVEUNIDAD]'>$ren[LONG_DESCRIPTION]</option>";
                                }
                                echo "</select>
                                <label for='floatingInput'>Clave Unidad</label>
                            </div>
                        </div>
                        <div class='col-lg-3 col-md-3 col-sm-12'>
                            <div class='form-floating m-2 shadow'>
                                <input type='text' class='form-control' id='NOMBRE' placeholder='NOMBRE' required/>
                                <label for='floatingInput'>NOMBRE</label>
                            </div>
                        </div>
                        <div class='col-lg-2 col-md-2 col-sm-12'>
                            <div class='form-floating m-2 shadow'>
                                <input type='text' class='form-control' id='PRODUCT_VALUE' placeholder='PRODUCT_VALUE' required/>
                                <label for='floatingInput'>PRODUCT_VALUE</label>
                            </div>
                        </div>
                    </div>

                    <div class='row'>
                        <div class='col-lg-2 col-md-2 col-sm-12'>
                            <div class='form-floating m-2 shadow'>
                                <select class='form-select' id='C_MONEDA'>";
                                while ($ren = $consultMoneda->fetch_array(MYSQLI_ASSOC)) {
                                    echo "<option value='$ren[C_MONEDA]'>$ren[LONG_DESCRIPTION]</option>";
                                }
                                echo "</select>
                                <label for='floatingInput'>Moneda</label>
                            </div>
                        </div>
                        <div class='col-lg-2 col-md-2 col-sm-12'>
                            <div class='form-floating m-2 shadow'>
                                <input type='number' class='form-control' id='CONTRACT_FEE' placeholder='CONTRACT_FEE' required/>
                                <label for='floatingInput'>CONTRACT_FEE</label>
                            </div>
                        </div>
                        <div class='col-lg-2 col-md-2 col-sm-12'>
                            <div class='form-floating m-2 shadow'>
                                <select class='form-select' id='PERIODICIDAD'>";
                                while($ren = $consultPeriodicidad->fetch_array(MYSQLI_ASSOC)){
                                    echo "<option value='$ren[C_PERIODICIDAD]'>$ren[DESCRIPCION]</option>";
                                }
                                echo "</select>
                                <label for='floatingInput'>Periodicidad</label>
                            </div>
                        </div>
                        <div class='col-lg-3 col-md-3 col-sm-12'>
                            <div class='form-floating m-2 shadow'>
                                <select class='form-select' id='C_OBJETOIMP'>";
                                while ($ren = $consultObjetoImp->fetch_array(MYSQLI_ASSOC)) {
                                    echo "<option value='$ren[C_OBJETOIMP]'>$ren[DESCRIPCION]</option>";
                                }
                                echo "</select>
                                <label for='floatingInput'>Objeto Impuesto</label>
                            </div>
                        </div>
                        <div class='col-lg-1 col-md-1 col-sm-12'>
                            <div class='form-floating m-2 shadow'>
                                <select class='form-select' id='C_IMPUESTO'>";
                                while ($ren = $consultImpuesto->fetch_array(MYSQLI_ASSOC)) {
                                    echo "<option value='$ren[C_IMPUESTO]'>$ren[DESCRIPCION]</option>";
                                }
                                echo "</select>
                                <label for='floatingInput'>Impuesto</label>
                            </div>
                        </div>
                        <div class='col-lg-2 col-md-2 col-sm-12'>
                            <div class='form-floating m-2 shadow'>
                                <select class='form-select' id='C_TIPOFACTOR'>";
                                while ($ren = $consultTipoFactor->fetch_array(MYSQLI_ASSOC)) {
                                    echo "<option value='$ren[C_TIPOFACTOR]'>$ren[DESCRIPCION]</option>";
                                }
                                echo "</select>
                                <label for='floatingInput'>Tipo Factor</label>
                            </div>
                        </div>
                    </div>

                    <div class='row'>
                        <div class='col-lg-2 col-md-2 col-sm-12'>
                            <div class='form-floating m-2 shadow'>
                                <select class='form-select' id='C_TASA'>";
                                while ($ren = $consultTasa->fetch_array(MYSQLI_ASSOC)) {
                                    echo "<option value='$ren[C_IMPUESTO]'>$ren[C_TASA]</option>";
                                }
                                echo "</select>
                                <label for='floatingInput'>Tasa</label>
                            </div>
                        </div>
                        <div class='col-lg-2 col-md-2 col-sm-12'>
                            <div class='form-floating m-2 shadow'>
                                <input type='number' class='form-control' id='RETENCION' placeholder='RETENCIÓN' required/>
                                <label for='floatingInput'>RETENCIÓN</label>
                            </div>
                        </div>
                        <div class='col-lg-2 col-md-2 col-sm-12'>
                            <div class='form-floating m-2 shadow'>
                                <input type='number' class='form-control' id='PRODUCT_TAX' placeholder='PRODUCT_TAX' required/>
                                <label for='floatingInput'>PRODUCT_TAX</label>
                            </div>
                        </div>
                        <div class='col-lg-3 col-md-3 col-sm-12'>
                            <div class='form-floating m-2 shadow'>
                                <input type='date' class='form-control' id='FECHA_DE_INICIO_DE_VIGENCIA' placeholder='FECHA_DE_INICIO_DE_VIGENCIA' required/>
                                <label for='floatingInput'>FECHA_DE_INICIO_DE_VIGENCIA</label>
                            </div>
                        </div>
                        <div class='col-lg-3 col-md-3 col-sm-12'>
                            <div class='form-floating m-2 shadow'>
                                <input type='date' class='form-control' id='FECHA_DE_FIN_DE_VIGENCIA' placeholder='FECHA_DE_FIN_DE_VIGENCIA' required/>
                                <label for='floatingInput'>FECHA_DE_FIN_DE_VIGENCIA</label>
                            </div>
                        </div>
                    </div>

                    <div class='text-center my-5'>
                        <button class='btn bg-success bg-gradient text-white rounded-pill w-25 p-2 m-3' onclick='javascript:addProduct();'>Add</button>
                        <button class='btn bg-danger bg-gradient text-white rounded-pill w-25 p-2 m-3' onclick='javascript:cargarInterfaz(\"product\",\"list\",\"null\");'>Return</button>
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
        $service = new Service();
        switch ($_POST["acc"]) {
            case 'add':
                echo "<h3 class='text-center text-secondary m-3'>Alta Service</h3>
                <form id='form-add-service'>
                    <div class='row'>
                        <div class='col-lg-2 col-md-3'></div>
                        <div class='col-lg-4 col-md-3 col-sm-12'>
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
                </form>
                <div class='row text-center my-5'>
                    <div class='col-lg-3'></div>    
                    <div class='col-lg-3 mt-3'>
                        <button class='btn bg-success bg-gradient text-white rounded-pill shadow w-50' onclick='javascript:addService();'>Add</button>
                    </div>
                    <div class='col-lg-3 mt-3'>
                        <button class='btn bg-danger bg-gradient text-white rounded-pill shadow w-50' onclick='javascript:cargarInterfaz(\"service\",\"list\",\"null\");'>Return</button>
                    </div>
                    <div class='col-lg-3'></div>  
                </div>";  
                break;

            case 'list':
                $functions->createTable($_POST["opc"], "t_service");
                break;
            case 'mod':
                $functions->createForm("t_service", $_POST["id"]);
                break;
            case 'delete':
                $functions->createForm("t_service", $_POST["id"]);
                break;
            
            default:
                echo "Error, You did not select any operation (Add, List, Modify or Delete)";
                break;
        }
        break;
    case 'storage':
        $storage = new Storage();
        switch ($_POST["acc"]) {
            case 'add':
                echo "<h3 class='text-center text-secondary m-3'>Alta Storage</h3>
                <form id='form-add-storage'>
                    <div class='row'>
                        <div class='col-lg-4 col-md-4 col-sm-12'>
                            <div class='form-floating m-2 shadow'>
                                <input type='text' class='form-control' id='SHORT_DESCRIPTION' placeholder='SHORT_DESCRIPTION' required/>
                                <label for='floatingInput'>SHORT_DESCRIPTION</label>
                            </div>
                        </div>
                        <div class='col-lg-4 col-md-4 col-sm-12'>
                            <div class='form-floating m-2 shadow'>
                                <input type='text' class='form-control' id='DEVICE_NAME' placeholder='DEVICE_NAME' required/>
                                <label for='floatingInput'>DEVICE_NAME</label>
                            </div>
                        </div>
                        <div class='col-lg-4 col-md-4 col-sm-12'>
                            <div class='form-floating m-2 shadow'>
                                <input type='text' class='form-control' id='INTANCE_ATTACHMENT_POINT' placeholder='INTANCE_ATTACHMENT' required/>
                                <label for='floatingInput'>INTANCE_ATTACHMENT</label>
                            </div>
                        </div>
                    </div>
                    <div class='row'>    
                        <div class='col-lg-3 col-md-3 col-sm-12'>
                            <div class='form-floating m-2 shadow'>
                                <input type='number' class='form-control' id='VOLUME_SIZE' placeholder='VOLUME_SIZE' required/>
                                <label for='floatingInput'>VOLUME_SIZE</label>
                            </div>
                        </div>
                        <div class='col-lg-3 col-md-3 col-sm-12'>
                            <div class='form-floating m-2 shadow'>
                                <input type='number' class='form-control' id='COMMITTED_SIZE' placeholder='COMMITTED_SIZE' required/>
                                <label for='floatingInput'>COMMITTED_SIZE</label>
                            </div>
                        </div>
                        <div class='col-lg-3 col-md-3 col-sm-12'>
                            <div class='form-floating m-2 shadow'>
                                <input type='text' class='form-control' id='VOLUME_TYPE' placeholder='VOLUME_TYPE' required/>
                                <label for='floatingInput'>VOLUME_TYPE</label>
                            </div>
                        </div>
                        <div class='col-lg-2 col-md-2 col-sm-12'>
                            <div class='form-floating m-2 shadow'>
                                <input type='number' class='form-control' id='IOPS' placeholder='IOPS' required/>
                                <label for='floatingInput'>IOPS</label>
                            </div>
                        </div>  
                    </div>
                    <div class='row'>
                        <div class='col-lg-2 col-md-2 col-sm-12'>
                            <div class='form-floating m-2 shadow'>
                                <input type='text' class='form-control' id='ENCRYPTED' placeholder='ENCRYPTED' required/>
                                <label for='floatingInput'>ENCRYPTED</label>
                            </div>
                        </div>
                        <div class='col-lg-3 col-md-3 col-sm-12'>
                            <div class='form-floating m-2 shadow'>
                                <input type='text' class='form-control' id='DELETE_ON_TERMINATION' placeholder='DELETE_ON_TERMINATION' required/>
                                <label for='floatingInput'>DELETE_ON_TERMINATION</label>
                            </div>
                        </div>
                        <div class='col-lg-2 col-md-2 col-sm-12'>
                            <div class='form-floating m-2 shadow'>
                                <input type='text' class='form-control' id='INSTANCE' placeholder='INSTANCE' required/>
                                <label for='floatingInput'>INSTANCE</label>
                            </div>
                        </div>
                        <div class='col-lg-2 col-md-2 col-sm-12'>
                            <div class='form-floating m-2 shadow'>
                                <input type='text' class='form-control' id='STORAGE_FLAG' placeholder='STORAGE_FLAG' required/>
                                <label for='floatingInput'>STORAGE_FLAG</label>
                            </div>
                        </div>
                    </div>
                </form>
                <div class='row text-center my-5'>
                    <div class='col-lg-3'></div>
                    <div class='col-lg-3 mt-3'>
                        <button class='btn bg-success bg-gradient text-white rounded-pill shadow w-50' onclick='javascript:addStorage();'>Add</button>
                    </div>
                    <div class='col-lg-3 mt-3'>
                        <button class='btn bg-danger bg-gradient text-white rounded-pill shadow w-50' onclick='javascript:cargarInterfaz(\"storage\",\"list\",\"null\");'>Return</button>
                    </div>
                    <div class='col-lg-3'></div>  
                </div>"; 
                break;
    
            case 'list':
                $functions->createTable($_POST["opc"], "t_storage");
                break;
            case 'mod':
                $functions->createForm("t_storage", $_POST["id"]);
                break;
            case 'delete':
                $functions->createForm("t_storage", $_POST["id"]);
                break;    
            default:
                echo "Error, You did not select any operation (Add, List, Modify or Delete)";
                break;
        }
        break;  
    case 'partition':
        $partition = new Partition();
        switch ($_POST["acc"]) {
            case 'add':
                echo "<h3 class='text-center text-secondary m-3'>Alta Partition</h3>
                <form id='form-add-partition'>
                    <div class='row'>
                        <div class='col-lg-3 col-md-3 col-sm-12'>
                            <div class='form-floating m-2 shadow'>
                                <input type='text' class='form-control' id='SHORT_DESCRIPTION' placeholder='SHORT_DESCRIPTION' required/>
                                <label for='floatingInput'>SHORT_DESCRIPTION</label>
                            </div>
                        </div>
                        <div class='col-lg-3 col-md-3 col-sm-12'>
                            <div class='form-floating m-2 shadow'>
                                <input type='text' class='form-control' id='DEVICE_NAME' placeholder='DEVICE_NAME' required/>
                                <label for='floatingInput'>DEVICE_NAME</label>
                            </div>
                        </div>
                        <div class='col-lg-3 col-md-3 col-sm-12'>
                            <div class='form-floating m-2 shadow'>
                                <input type='text' class='form-control' id='ATTACHMENT_POINT' placeholder='ATTACHMENT_POINT' required/>
                                <label for='floatingInput'>ATTACHMENT_POINT</label>
                            </div>
                        </div>
                        <div class='col-lg-3 col-md-3 col-sm-12'>
                            <div class='form-floating m-2 shadow'>
                                <input type='text' class='form-control' id='PARTITION_SIZE' placeholder='PARTITION_SIZE' required/>
                                <label for='floatingInput'>PARTITION_SIZE</label>
                            </div>
                        </div>
                    </div>
                </form>
                <div class='row text-center my-5'>
                    <div class='col-lg-3'></div>    
                    <div class='col-lg-3 mt-3'>
                        <button class='btn bg-success bg-gradient text-white rounded-pill shadow w-50' onclick='javascript:addPartition();'>Add</button>
                    </div>
                    <div class='col-lg-3 mt-3'>
                        <button class='btn bg-danger bg-gradient text-white rounded-pill shadow w-50' onclick='javascript:cargarInterfaz(\"partition\",\"list\",\"null\");'>Return</button>
                    </div>
                    <div class='col-lg-3'></div>  
                </div>";                     
                break;
    
            case 'list':
                $functions->createTable($_POST["opc"], "t_partition");
                break;
            case 'mod':
                $functions->createForm("t_partition", $_POST["id"]);
                break;
            case 'delete':
                $functions->createForm("t_partition", $_POST["id"]);
                break;      
            default:
                echo "Error, You did not select any operation (Add, List, Modify or Delete)";
                break;
            }
            break;
    //Interfaces de Work Order                
    case  'workorder':
        $workorder = new WorkOrder();
        switch ($_POST["acc"]) {
            case 'add':
                $consultProduct = $workorder->product();
                $consultPartition = $workorder->partition();
                $consultWorkorderFlag = $workorder->workorderFlag();
                echo "<h3 class='text-center text-secondary m-3'>Alta Workorder</h3>
                <form id='form-add-workorder'>
                    <div class='row'>
                        <div class='col-lg-4 col-md-4 col-sm-12'>
                            <div class='form-floating m-2 shadow'>
                                <input type='text' class='form-control' id='DESCRIPTION' placeholder='DESCRIPTION' required/>
                                <label for='floatingInput'>DESCRIPTION</label>
                            </div>
                        </div>
                        <div class='col-lg-4 col-md-4 col-sm-12'>
                            <div class='form-floating m-2 shadow'>
                                <select class='form-select' id='T_PRODUCT'>";
                                while ($ren = $consultProduct->fetch_array(MYSQLI_ASSOC)) {
                                    echo "<option value='$ren[T_PRODUCT]'>$ren[SHORT_DESCRIPTION]</option>";
                                }
                                echo "</select>
                                <label for='floatingInput'>Product</label>
                            </div>
                        </div>
                        <div class='col-lg-4 col-md-4 col-sm-12'>
                            <div class='form-floating m-2 shadow'>
                                <input type='text' class='form-control' id='REGISTERED_DOMAIN' placeholder='REGISTERED_DOMAIN' required/>
                                <label for='floatingInput'>REGISTERED_DOMAIN</label>
                            </div>
                        </div>
                    </div>
                    <div class='row'>
                        <div class='col-lg-3 col-md-3 col-sm-12'>
                            <div class='form-floating m-2 shadow'>
                                <select class='form-select' id='T_PARTITION'>";
                                while ($ren = $consultPartition->fetch_array(MYSQLI_ASSOC)) {
                                    echo "<option value='$ren[T_PARTITION]'>$ren[SHORT_DESCRIPTION]</option>";
                                }
                                echo "</select>
                                <label for='floatingInput'>Partition</label>
                            </div>
                        </div>
                        <div class='col-lg-3 col-md-3 col-sm-12'>
                            <div class='form-floating m-2 shadow'>
                                <input type='date' class='form-control' id='FECHA_INICIO' placeholder='FECHA_INICIO' required/>
                                <label for='floatingInput'>FECHA_INICIO</label>
                            </div>
                        </div>
                        <div class='col-lg-3 col-md-3 col-sm-12'>
                            <div class='form-floating m-2 shadow'>
                                <input type='date' class='form-control' id='FECHA_FIN' placeholder='FECHA_FIN' required/>
                                <label for='floatingInput'>FECHA_FIN</label>
                            </div>
                        </div>
                        <div class='col-lg-3 col-md-3 col-sm-12'>
                            <div class='form-floating m-2 shadow'>
                                <select class='form-select' id='WORKORDER_FLAG'>";
                                while ($ren = $consultWorkorderFlag->fetch_array(MYSQLI_ASSOC)) {
                                    echo "<option value='$ren[T_WORKORDER_FLAG]'>$ren[DESCRIPTION]</option>";
                                }
                                echo "</select>
                                <label for='floatingInput'>Work Order Flag</label>
                            </div>
                        </div>
                    </div>
                </form>
                <div class='row text-center my-5'>
                    <div class='col-lg-3'></div>    
                    <div class='col-lg-3 mt-3'>
                        <button class='btn bg-success bg-gradient text-white rounded-pill shadow w-50' onclick='javascript:addWorkOrder();'>Add</button>
                    </div>
                    <div class='col-lg-3 mt-3'>
                        <button class='btn bg-danger bg-gradient text-white rounded-pill shadow w-50' onclick='javascript:cargarInterfaz(\"workorder\",\"list\",\"null\");'>Return</button>
                    </div>
                    <div class='col-lg-3'></div>  
                </div>"; 
                break;
            case 'list':
                $functions->createTable($_POST["opc"], "t_workorder");
                break;
            case 'mod':
                $functions->createForm("t_workorder", $_POST["id"]);
                break;
            case 'delete':
                $functions->createForm("t_workorder", $_POST["id"]);
                break;   
            default:
                echo "Error, You did not select any operation (Add, List, Modify or Delete)";
                break;
        }
        break;
    case  'workorderflag':
        $workorderflag = new Workorderflag();
        switch ($_POST["acc"]) {
            case 'add':
                echo "<h3 class=''>Alta WorkOrder Flag</h3>
                <form id='form-add-workorderflag'>
                    <div class='row'>
                        <div class='col-lg-4 col-md-4 col-sm-12'>
                            <div class='form-floating m-2 shadow'>
                                <select class='form-select' id='T_WORKORDER_FLAG'>";
                                while ($ren = $consultProduct->fetch_array(MYSQLI_ASSOC)) {
                                    echo "<option value='$ren[T_WORKORDER_FLAG]'>$ren[DESCRIPTION]</option>";
                                }
                                echo "</select>
                                <label for='floatingInput'>Worl Order Flag</label>
                            </div>
                        </div>
                    </div>
                </form>
                ";
                break;
            case 'list':
                $functions->createTable($_POST["opc"], "t_workorder_flag");
                break;
            case 'mod':
                $functions->createForm("t_workorder_flag", $_POST["id"]);
                break;
            case 'delete':
                $functions->createForm("t_workorder_flag", $_POST["id"]);
                break;   
            default:
                echo "Error, You did not select any operation (Add, List, Modify or Delete)";
                break;
        }
        break;

    //INTERFACES DE LUGARES        
    case 'region':
        //$role = new Role();
        switch ($_POST["acc"]) {
            case 'add':
                echo "<h3 class='text-center text-secondary m-3'>Alta Region</h3>
                <form id='form-add-region'>
                    <div class='row'>
                        <div class='col-lg-4 col-md-3 col-sm-12'>
                            <div class='form-floating m-2 shadow'>
                                <input type='text' class='form-control' id='REGION_NAME' placeholder='REGION_NAME' required/>
                                <label for='floatingInput'>REGION_NAME</label>
                            </div>
                        </div>
                    </div>
                </form>
                <div class='row text-center my-5'>
                    <div class='col-lg-3'></div>    
                    <div class='col-lg-3 mt-3'>
                        <button class='btn bg-success bg-gradient text-white rounded-pill shadow w-50' onclick='javascript:addRegion();'>Add</button>
                    </div>
                    <div class='col-lg-3 mt-3'>
                        <button class='btn bg-danger bg-gradient text-white rounded-pill shadow w-50' onclick='javascript:cargarInterfaz(\"region\",\"list\",\"null\");'>Return</button>
                    </div>
                    <div class='col-lg-3'></div>  
                </div>";  
                break;
            
            case 'list':
                $functions->createTable($_POST["opc"], "t_region");
                break;
            case 'mod':
                $functions->createForm("t_region", $_POST["id"]);
                break;
            case 'delete':
                $functions->createForm("t_region", $_POST["id"]);
                break;    
            default:
                echo "Error, You did not select any operation (Add, List, Modify or Delete)";
                break;
        }
        break;    
    
    case 'subregion':
        $subregion = new Subregion();
        switch ($_POST["acc"]) {
            case 'add':
                $consultRegion = $subregion->region();
                echo "<h3 class='text-center text-secondary m-3'>Alta Subregion</h3>
                <form id='form-add-subregion'>
                    <div class='row'>
                        <div class='col-lg-3 col-md-3 col-sm-12'>
                            <div class='form-floating m-2 shadow'>
                                <input type='text' class='form-control' id='SHORT_DESCRIPTION' placeholder='SHORT_DESCRIPTION' required/>
                                <label for='floatingInput'>SHORT_DESCRIPTION</label>
                            </div>
                        </div>
                        <div class='col-lg-3 col-md-5 col-sm-12'>
                            <div class='form-floating m-2 shadow'>
                                <select class='form-select' id='T_REGION'>";
                                while ($ren = $consultRegion->fetch_array(MYSQLI_ASSOC)) {
                                    echo "<option value='$ren[T_REGION]'>$ren[REGION_NAME]</option>";
                                }
                                echo "</select>
                                <label for='floatingInput'>REGION</label>
                            </div>
                        </div>
                    </div>
                </form>
                <div class='row text-center my-5'>
                    <div class='col-lg-3'></div>    
                    <div class='col-lg-3 mt-3'>
                        <button class='btn bg-success bg-gradient text-white rounded-pill shadow w-50' onclick='javascript:addSubregion();'>Add</button>
                    </div>
                    <div class='col-lg-3 mt-3'>
                        <button class='btn bg-danger bg-gradient text-white rounded-pill shadow w-50' onclick='javascript:cargarInterfaz(\"subregion\",\"list\",\"null\");'>Return</button>
                    </div>
                    <div class='col-lg-3'></div>  
                </div>";                    
                break;
            case 'list':
                $functions->createTable($_POST["opc"], "t_subregion");
                break;
            case 'mod':
                $functions->createForm("t_subregion", $_POST["id"]);
                break;
            case 'delete':
                $functions->createForm("t_subregion", $_POST["id"]);
                break;   
            default:
                echo "Error, You did not select any operation (Add, List, Modify or Delete)";
                break;
        }
        break;    
    case 'country':
        $country = new Country();
        switch ($_POST["acc"]) {
            case 'add':
                $consultMoneda = $country->moneda();
                echo "<h3 class='text-center text-secondary m-3'>Alta Country</h3>
                <form id='form-add-country'>
                    <div class='row'>
                        <div class='col-lg-3 col-md-2 col-sm-12'>
                            <div class='form-floating m-2 shadow'>
                                <input type='text' class='form-control' id='NAME' placeholder='NAME' required/>
                                <label for='floatingInput'>NAME</label>
                            </div>
                        </div>
                        <div class='col-lg-1 col-md-1 col-sm-12'>
                            <div class='form-floating m-2 shadow'>
                                <input type='text' class='form-control' id='ISO3' placeholder='ISO3' required/>
                                <label for='floatingInput'>ISO3</label>
                            </div>
                        </div>
                        <div class='col-lg-1 col-md-1 col-sm-12'>
                            <div class='form-floating m-2 shadow'>
                                <input type='text' class='form-control' id='ISO2' placeholder='ISO2' required/>
                                <label for='floatingInput'>ISO2</label>
                            </div>
                        </div>
                        <div class='col-lg-2 col-md-2 col-sm-12'>
                            <div class='form-floating m-2 shadow'>
                                <input type='text' class='form-control' id='NUMERIC_CODE' placeholder='NUMERIC_CODE' required/>
                                <label for='floatingInput'>NUMERIC_CODE</label>
                            </div>
                        </div>
                        <div class='col-lg-2 col-md-2 col-sm-12'>
                            <div class='form-floating m-2 shadow'>
                                <input type='text' class='form-control' id='PHONE_CODE' placeholder='PHONE_CODE' required/>
                                <label for='floatingInput'>PHONE_CODE</label>
                            </div>
                        </div>
                        <div class='col-lg-3 col-md-2 col-sm-12'>
                            <div class='form-floating m-2 shadow'>
                                <input type='text' class='form-control' id='CAPITAL' placeholder='CAPITAL' required/>
                                <label for='floatingInput'>CAPITAL</label>
                            </div>
                        </div>
                    </div>
                    <div class='row'>
                        <div class='col-lg-2 col-md-2 col-sm-12'>
                            <div class='form-floating m-2 shadow'>
                                <select class='form-select' id='C_MONEDA'>";
                                while ($ren = $consultMoneda->fetch_array(MYSQLI_ASSOC)) {
                                    echo "<option value='$ren[C_MONEDA]'>$ren[LONG_DESCRIPTION]</option>";
                                }
                                echo "</select>
                                <label for='floatingInput'>MONEDA</label>
                            </div>
                        </div>
                        <div class='col-lg-1 col-md-1 col-sm-12'>
                            <div class='form-floating m-2 shadow'>
                                <input type='text' class='form-control' id='TLD' placeholder='TLD' required/>
                                <label for='floatingInput'>TLD</label>
                            </div>
                        </div>
                        <div class='col-lg-2 col-md-2 col-sm-12'>
                            <div class='form-floating m-2 shadow'>
                                <input type='text' class='form-control' id='REGION_NAME' placeholder='REGION_NAME' required/>
                                <label for='floatingInput'>REGION_NAME</label>
                            </div>
                        </div>
                        <div class='col-lg-3 col-md-3 col-sm-12'>
                            <div class='form-floating m-2 shadow'>
                                <input type='text' class='form-control' id='SUBREGION' placeholder='SUBREGION' required/>
                                <label for='floatingInput'>SUBREGION</label>
                            </div>
                        </div>
                        <div class='col-lg-3 col-md-3 col-sm-12'>
                            <div class='form-floating m-2 shadow'>
                                <input type='text' class='form-control' id='NATIONALITY' placeholder='NATIONALITY' required/>
                                <label for='floatingInput'>NATIONALITY</label>
                            </div>
                        </div>
                    </div>
                    <div class='row'>
                        <div class='col-lg-3 col-md-2 col-sm-12'>
                            <div class='form-floating m-2 shadow'>
                                <input type='text' class='form-control' id='TIME_ZONE_NAME' placeholder='TIME_ZONE_NAME' required/>
                                <label for='floatingInput'>TIME_ZONE_NAME</label>
                            </div>
                        </div>
                        <div class='col-lg-2 col-md-2 col-sm-12'>
                            <div class='form-floating m-2 shadow'>
                                <input type='text' class='form-control' id='LATITUDE' placeholder='LATITUDE' required/>
                                <label for='floatingInput'>LATITUDE</label>
                            </div>
                        </div>
                        <div class='col-lg-2 col-md-2 col-sm-12'>
                            <div class='form-floating m-2 shadow'>
                                <input type='text' class='form-control' id='LONGITUDE' placeholder='LONGITUDE' required/>
                                <label for='floatingInput'>LONGITUDE</label>
                            </div>
                        </div>
                    </div>
                </form>
                <div class='row text-center my-5'>
                    <div class='col-lg-3'></div>    
                    <div class='col-lg-3 mt-3'>
                        <button class='btn bg-success bg-gradient text-white rounded-pill shadow w-50' onclick='javascript:addCountry();'>Add</button>
                    </div>
                    <div class='col-lg-3 mt-3'>
                        <button class='btn bg-danger bg-gradient text-white rounded-pill shadow w-50' onclick='javascript:cargarInterfaz(\"country\",\"list\",\"null\");'>Return</button>
                    </div>
                    <div class='col-lg-3'></div>  
                </div>"; 
                break;
            
            case 'list':
                $functions->createTable($_POST["opc"], "t_country");
                break;
            case 'mod':
                $functions->createForm("t_country", $_POST["id"]);
                break;
            case 'delete':
                $functions->createForm("t_country", $_POST["id"]);
                break;  
            default:
                echo "Error, You did not select any operation (Add, List, Modify or Delete)";
                break;
        }
        break;  
    //Pendiente por hacer
    case 'state':
        $country = new Country();
        //$state = new State();
        switch ($_POST["acc"]) {
            case 'add':

                break;
            
            case 'list':
                $consult = $country->list();
                if ($consult->num_rows > 0) {
                    echo "<div class='mt-5'>
                    <h3>Escoge el país para agregar el estado</h3>
                    <div class='form-floating m-2 shadow w-25 text-center mt-3'>
                        <select class='form-select' id='T_COUNTRY' onchange='javascript:ajax(\"state\");'>
                            <option>Selecciona una opción</option>";
                        while ($ren = $consult->fetch_array(MYSQLI_ASSOC)) {
                            echo "<option value='$ren[T_COUNTRY]'>$ren[NAME]</option>";
                        }
                        echo "</select>
                        <label for='floatingInput'>Country</label>
                    </div>
                </div>";
                } else{
                    echo "Error, no hay registros";
                }
                break;
            case 'mod':
                $functions->createForm("t_subregion", $_POST["id"]);
                break;
            case 'delete':
                $functions->createForm("t_subregion", $_POST["id"]);
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
            case 'mod':
                $functions->createForm("t_subregion", $_POST["id"]);
                break;
            case 'delete':
                $functions->createForm("t_subregion", $_POST["id"]);
                break;  
            default:
                echo "Error, You did not select any operation (Add, List, Modify or Delete)";
                break;
        }
        break;
    
    //Tablas C_
    
    case 'pais':
        //$role = new Role();
        switch ($_POST["acc"]) {
            case 'add':
                echo "<h3 class='text-center text-secondary m-3'>Alta Country</h3>
                <form id='form-add-country'>
                    <div class='row'>
                        <div class='col-lg-3 col-md-2 col-sm-12'>
                            <div class='form-floating m-2 shadow'>
                                <input type='text' class='form-control' id='DESCRIPTION' placeholder='DESCRIPTION' required/>
                                <label for='floatingInput'>DESCRIPCION</label>
                            </div>
                        </div>
                        <div class='col-lg-1 col-md-1 col-sm-12'>
                            <div class='form-floating m-2 shadow'>
                                <input type='text' class='form-control' id='CODE' placeholder='CODE' required/>
                                <label for='floatingInput'>CODE</label>
                            </div>
                        </div>
                        <div class='col-lg-1 col-md-1 col-sm-12'>
                            <div class='form-floating m-2 shadow'>
                                <input type='text' class='form-control' id='FORMATO_DE_CODIGO_POSTAL' placeholder='FORMATO_DE_CODIGO_POSTAL' required/>
                                <label for='floatingInput'>FORMATO DE CODIGO POSTAL</label>
                            </div>
                        </div>
                        <div class='col-lg-2 col-md-2 col-sm-12'>
                            <div class='form-floating m-2 shadow'>
                                <input type='text' class='form-control' id='NUMERIC_CODE' placeholder='NUMERIC_CODE' required/>
                                <label for='floatingInput'>NUMERIC_CODE</label>
                            </div>
                        </div>
                        <div class='col-lg-2 col-md-2 col-sm-12'>
                            <div class='form-floating m-2 shadow'>
                                <input type='text' class='form-control' id='PHONE_CODE' placeholder='PHONE_CODE' required/>
                                <label for='floatingInput'>PHONE_CODE</label>
                            </div>
                        </div>
                        <div class='col-lg-3 col-md-2 col-sm-12'>
                            <div class='form-floating m-2 shadow'>
                                <input type='text' class='form-control' id='CAPITAL' placeholder='CAPITAL' required/>
                                <label for='floatingInput'>CAPITAL</label>
                            </div>
                        </div>
                    </div>
                    <div class='row'>
                        <div class='col-lg-2 col-md-2 col-sm-12'>
                            <div class='form-floating m-2 shadow'>
                                <label for='floatingInput'>MONEDA</label>
                            </div>
                        </div>
                        <div class='col-lg-1 col-md-1 col-sm-12'>
                            <div class='form-floating m-2 shadow'>
                                <input type='text' class='form-control' id='TLD' placeholder='TLD' required/>
                                <label for='floatingInput'>TLD</label>
                            </div>
                        </div>
                        <div class='col-lg-2 col-md-2 col-sm-12'>
                            <div class='form-floating m-2 shadow'>
                                <input type='text' class='form-control' id='REGION_NAME' placeholder='REGION_NAME' required/>
                                <label for='floatingInput'>REGION_NAME</label>
                            </div>
                        </div>
                        <div class='col-lg-3 col-md-3 col-sm-12'>
                            <div class='form-floating m-2 shadow'>
                                <input type='text' class='form-control' id='SUBREGION' placeholder='SUBREGION' required/>
                                <label for='floatingInput'>SUBREGION</label>
                            </div>
                        </div>
                        <div class='col-lg-3 col-md-3 col-sm-12'>
                            <div class='form-floating m-2 shadow'>
                                <input type='text' class='form-control' id='NATIONALITY' placeholder='NATIONALITY' required/>
                                <label for='floatingInput'>NATIONALITY</label>
                            </div>
                        </div>
                    </div>
                    <div class='row'>
                        <div class='col-lg-3 col-md-2 col-sm-12'>
                            <div class='form-floating m-2 shadow'>
                                <input type='text' class='form-control' id='TIME_ZONE_NAME' placeholder='TIME_ZONE_NAME' required/>
                                <label for='floatingInput'>TIME_ZONE_NAME</label>
                            </div>
                        </div>
                        <div class='col-lg-2 col-md-2 col-sm-12'>
                            <div class='form-floating m-2 shadow'>
                                <input type='text' class='form-control' id='LATITUDE' placeholder='LATITUDE' required/>
                                <label for='floatingInput'>LATITUDE</label>
                            </div>
                        </div>
                        <div class='col-lg-2 col-md-2 col-sm-12'>
                            <div class='form-floating m-2 shadow'>
                                <input type='text' class='form-control' id='LONGITUDE' placeholder='LONGITUDE' required/>
                                <label for='floatingInput'>LONGITUDE</label>
                            </div>
                        </div>
                    </div>
                </form>
                <div class='row text-center my-5'>
                    <div class='col-lg-3'></div>    
                    <div class='col-lg-3 mt-3'>
                        <button class='btn bg-success bg-gradient text-white rounded-pill shadow w-50' onclick='javascript:addCountry();'>Add</button>
                    </div>
                    <div class='col-lg-3 mt-3'>
                        <button class='btn bg-danger bg-gradient text-white rounded-pill shadow w-50' onclick='javascript:cargarInterfaz(\"country\",\"list\",\"null\");'>Return</button>
                    </div>
                    <div class='col-lg-3'></div>  
                </div>"; 
                break;
            
            case 'list':
                $functions->createTable($_POST["opc"], "c_pais");
                break;
            case 'mod':
                $functions->createForm("c_pais", $_POST["id"]);
                break;
            case 'delete':
                $functions->createForm("c_pais", $_POST["id"]);
                break;  
            default:
                echo "Error, You did not select any operation (Add, List, Modify or Delete)";
                break;
        }
        break;        

        case 'estado':
        //$role = new Role();
        switch ($_POST["acc"]) {
            case 'add':
                echo "<h3 class='text-center text-secondary m-3'>Alta Country</h3>
                <form id='form-add-country'>
                    <div class='row'>
                        <div class='col-lg-3 col-md-2 col-sm-12'>
                            <div class='form-floating m-2 shadow'>
                                <input type='text' class='form-control' id='DESCRIPTION' placeholder='DESCRIPTION' required/>
                                <label for='floatingInput'>DESCRIPCION</label>
                            </div>
                        </div>
                        <div class='col-lg-1 col-md-1 col-sm-12'>
                            <div class='form-floating m-2 shadow'>
                                <input type='text' class='form-control' id='CODE' placeholder='CODE' required/>
                                <label for='floatingInput'>CODE</label>
                            </div>
                        </div>
                        <div class='col-lg-1 col-md-1 col-sm-12'>
                            <div class='form-floating m-2 shadow'>
                                <input type='text' class='form-control' id='FORMATO_DE_CODIGO_POSTAL' placeholder='FORMATO_DE_CODIGO_POSTAL' required/>
                                <label for='floatingInput'>FORMATO DE CODIGO POSTAL</label>
                            </div>
                        </div>
                        <div class='col-lg-2 col-md-2 col-sm-12'>
                            <div class='form-floating m-2 shadow'>
                                <input type='text' class='form-control' id='NUMERIC_CODE' placeholder='NUMERIC_CODE' required/>
                                <label for='floatingInput'>NUMERIC_CODE</label>
                            </div>
                        </div>
                        <div class='col-lg-2 col-md-2 col-sm-12'>
                            <div class='form-floating m-2 shadow'>
                                <input type='text' class='form-control' id='PHONE_CODE' placeholder='PHONE_CODE' required/>
                                <label for='floatingInput'>PHONE_CODE</label>
                            </div>
                        </div>
                        <div class='col-lg-3 col-md-2 col-sm-12'>
                            <div class='form-floating m-2 shadow'>
                                <input type='text' class='form-control' id='CAPITAL' placeholder='CAPITAL' required/>
                                <label for='floatingInput'>CAPITAL</label>
                            </div>
                        </div>
                    </div>
                    <div class='row'>
                        <div class='col-lg-2 col-md-2 col-sm-12'>
                            <div class='form-floating m-2 shadow'>
                                <label for='floatingInput'>MONEDA</label>
                            </div>
                        </div>
                        <div class='col-lg-1 col-md-1 col-sm-12'>
                            <div class='form-floating m-2 shadow'>
                                <input type='text' class='form-control' id='TLD' placeholder='TLD' required/>
                                <label for='floatingInput'>TLD</label>
                            </div>
                        </div>
                        <div class='col-lg-2 col-md-2 col-sm-12'>
                            <div class='form-floating m-2 shadow'>
                                <input type='text' class='form-control' id='REGION_NAME' placeholder='REGION_NAME' required/>
                                <label for='floatingInput'>REGION_NAME</label>
                            </div>
                        </div>
                        <div class='col-lg-3 col-md-3 col-sm-12'>
                            <div class='form-floating m-2 shadow'>
                                <input type='text' class='form-control' id='SUBREGION' placeholder='SUBREGION' required/>
                                <label for='floatingInput'>SUBREGION</label>
                            </div>
                        </div>
                        <div class='col-lg-3 col-md-3 col-sm-12'>
                            <div class='form-floating m-2 shadow'>
                                <input type='text' class='form-control' id='NATIONALITY' placeholder='NATIONALITY' required/>
                                <label for='floatingInput'>NATIONALITY</label>
                            </div>
                        </div>
                    </div>
                    <div class='row'>
                        <div class='col-lg-3 col-md-2 col-sm-12'>
                            <div class='form-floating m-2 shadow'>
                                <input type='text' class='form-control' id='TIME_ZONE_NAME' placeholder='TIME_ZONE_NAME' required/>
                                <label for='floatingInput'>TIME_ZONE_NAME</label>
                            </div>
                        </div>
                        <div class='col-lg-2 col-md-2 col-sm-12'>
                            <div class='form-floating m-2 shadow'>
                                <input type='text' class='form-control' id='LATITUDE' placeholder='LATITUDE' required/>
                                <label for='floatingInput'>LATITUDE</label>
                            </div>
                        </div>
                        <div class='col-lg-2 col-md-2 col-sm-12'>
                            <div class='form-floating m-2 shadow'>
                                <input type='text' class='form-control' id='LONGITUDE' placeholder='LONGITUDE' required/>
                                <label for='floatingInput'>LONGITUDE</label>
                            </div>
                        </div>
                    </div>
                </form>
                <div class='row text-center my-5'>
                    <div class='col-lg-3'></div>    
                    <div class='col-lg-3 mt-3'>
                        <button class='btn bg-success bg-gradient text-white rounded-pill shadow w-50' onclick='javascript:addCountry();'>Add</button>
                    </div>
                    <div class='col-lg-3 mt-3'>
                        <button class='btn bg-danger bg-gradient text-white rounded-pill shadow w-50' onclick='javascript:cargarInterfaz(\"country\",\"list\",\"null\");'>Return</button>
                    </div>
                    <div class='col-lg-3'></div>  
                </div>"; 
                break;
            
            case 'list':
                $functions->createTable($_POST["opc"], "c_estado");
                break;
            case 'mod':
                $functions->createForm("c_estado", $_POST["id"]);
                break;
            case 'delete':
                $functions->createForm("c_estado", $_POST["id"]);
                break;  
            default:
                echo "Error, You did not select any operation (Add, List, Modify or Delete)";
                break;
        }
        break;        


    default:
        echo "Error, You did not select any option";
        break;
}