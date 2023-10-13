<?php
spl_autoload_register(function ($class) {
    require_once($class . ".lib.php");
});

switch ($_POST["opc"]) {
    case 'client':
        $client = new Client();
        switch ($_POST["acc"]) {
            case 'add':
                echo "<div class='container'>
                        <h3 class='text-center text-secondary m-3'>Registro de Usuarios</h3>
                        <div class='row'>
                            <div class='col-lg-6 col-md-6 col-sm-12'>
                                <div class='form-floating m-2 shadow-sm'>
                                    <input type='text' class='form-control' id='name' placeholder='Name' required>
                                    <label for='floatingInput' class='text-dark'>Name</label>
                                </div>
                            </div>
                            <div class='col-lg-6 col-md-6 col-sm-12'>
                                <div class='form-floating m-2 shadow-sm'>
                                    <input type='text' class='form-control' id='floatingInput' placeholder='Last Name' required>
                                    <label for='floatingInput' class='text-dark'>Last Name</label>
                                </div>
                            </div>
                        </div>
                        <div class='row'>
                            <div class='col-lg-4 col-md-4 col-sm-12'>
                                <div class='form-floating m-2 shadow-sm'>
                                    <input type='text' class='form-control' id='floatingInput' placeholder='Email' required>
                                    <label for='floatingInput' class='text-dark'>Email</label>
                                </div>
                            </div>

                            <div class='col-lg-4 col-md-4 col-sm-12'>
                                <div class='form-floating m-2 shadow-sm'>
                                    <input type='number' class='form-control' id='floatingInput' placeholder='Cellphone' required>
                                    <label for='floatingInput' class='text-dark'>Cellphone</label>
                                </div>
                            </div>
                            <div class='col-lg-4 col-md-4 col-sm-12'>
                                <div class='form-floating m-2 shadow-sm'>
                                    <input type='number' class='form-control' id='floatingInput' placeholder='Phone' required>
                                    <label for='floatingInput' class='text-dark'>Phone</label
                                </div>
                            </div>
                        </div>
                        
                        <div class='text-center mt-5'>
                            <button class='btn bg-success bg-gradient text-white rounded-pill w-25 p-2 m-3' onclick='javascript:prueba();'>Add</button>
                            <button class='btn bg-danger bg-gradient text-white rounded-pill w-25 p-2 m-3'>Return</button>
                        </div>
                    </div>";
                break;

            case 'list':
                echo "<h3>List of Users</h3>
                    <div class='text-end mb-4'>
                        <button class='btn btn-primary' onclick='javascript:cargarInterfaz(\"client\", \"add\", \"null\");'><i class='bi bi-plus-circle pe-2 text-white'></i>Add</button>
                    </div>";
                $consult = $client->list(null);
                if ($consult->num_rows > 0) {
                    echo "<table class='table table-secondary table-hover table-sm'>
                        <tr>
                            <td>ID</td>
                            <td>Name</td>
                            <td>Username</td>
                            <td class='text-center'>Actions</td>
                        </tr>";
                    while ($ren = $consult->fetch_array(MYSQLI_ASSOC)) {
                        echo "<tr>
                                <td>$ren[login_Name]</td>
                                <td>$ren[login_Name] $ren[login_Last_name] <input type='hidden' value='$ren[login_Name]' id='name$ren[login_Name]'></td>
                                <td>$ren[short_description]</td>
                                <td class='text-center'>
                                    <button class='btn btn-info mb-2' onclick='javascript:cargarInterfaz(\"client\", \"details\", \"$ren[login_Name]\");'><i class='bi bi-list'></i></button>
                                    <button class='btn btn-warning mb-2'><i class='bi bi-pencil-square'></i></button>
                                    <button class='btn btn-danger mb-2' onclick='javascript:deleteClient($ren[T_TAXID]);'><i class='bi bi-trash'></i></button>
                                </td>
                            </tr>";
                    }
                    echo "</table>";
                } else {
                    echo "No records";
                }
                break;

            case 'details':
                $consult = $client->list($_POST["param"]);
                if ($consult->num_rows > 0) {
                    $ren = $consult->fetch_array(MYSQLI_ASSOC);
                    echo "<h3 class='text-center text-secondary m-3'>Usuario: $ren[T_LOGIN]</h3>
                    <div class='container p-5 rounded-5 shadow'>
                    
                        <div class='d-grid d-flex justify-content-end mb-3'>
                            <button class='btn btn-primary rounded-3' onclick='javascript:activarCajas();'>Modify</button>
                        </div>
                
                        <div class='row mb-3'>
                            <div class='col-lg-3 col-md-3 col-sm-12 mb-3'>
                                <label for=''>Name</label>
                                <input type='text' class='form-control shadow-sm' value='$ren[name]' id='name' disabled=''>
                            </div>
                            <div class='col-lg-3 col-md-3 col-sm-12 mb-3'>
                                <label for=''>Input</label>
                                <input type='text' class='form-control shadow-sm' value='$ren[Input]' id='Input' disabled=''>
                            </div>
                            <div class='col-lg-3 col-md-2 col-sm-12 mb-3'>
                                <label for=''>Gender</label>
                                <input type='text' class='form-control shadow-sm' value='$ren[gender]' id='gender' disabled=''>
                            </div>
                            <div class='col-lg-3 col-md-4 col-sm-12'>
                                <label for=''>Birthdate</label>
                                <input type='date' class='form-control shadow-sm' value='$ren[birthdate]' id='birthdate' disabled=''>
                            </div>
                        </div>
                
                        <div class='row mb-3'>
                            <div class='col-lg-6 col-md-6 col-sm-12 mb-3'>
                                <label for=''>Email</label>
                                <input type='text' class='form-control shadow-sm' value='$ren[email]' id='email' disabled=''>
                            </div>
                            <div class='col-lg-6 col-md-6 col-sm-12'>
                                <label for=''>Optional Email</label>
                                <input type='text' class='form-control shadow-sm' value='$ren[emailOp]' id='emailOp' disabled=''>
                            </div>
                        </div>
                
                        <div class='row mb-3'>
                            <div class='col-lg-4 col-md-4 col-sm-12 mb-3'>
                                <label for=''>Phone</label>
                                <input type='number' class='form-control shadow-sm' value='$ren[phone]' id='phone' disabled=''>
                            </div>
                            <div class='col-lg-4 col-md-4 col-sm-12 mb-3'>
                                <label for=''>Optional Phone</label>
                                <input type='text' class='form-control shadow-sm' value='$ren[phoneOp]' id='phoneOp' disabled=''>
                            </div>
                            <div class='col-lg-4 col-md-4 col-sm-12 mb-3'>
                                <label for=''>Password</label>
                                <input type='password' class='form-control shadow-sm' value='$ren[password]' id='password' disabled=''>
                            </div>
                        </div>
                
                        <div class='row mb-3'>
                            <div class='col-lg-4 col-md-4 col-sm-12 mb-3'>
                                <label for=''>Status</label>
                                <input type='text' class='form-control' value='$ren[status_log]' disabled=''>
                            </div>
                            <div class='col-lg-4 col-md-4 col-sm-12 mb-3'>
                                <label for=''>create at</label>
                                <input type='text' class='form-control' value='$ren[create_at]' disabled=''>
                            </div>
                            <div class='col-lg-4 col-md-4 col-sm-12'>
                                <label for=''>Update at</label>
                                <input type='text' class='form-control' value='$ren[update_at]' disabled=''>
                            </div>
                        </div>
                
                        <div class='d-grid d-flex justify-content-center mt-5'>
                            <button class='btn btn-success w-25 fs-5 rounded-5 shadow me-5' id='save' hidden=''>Save</button>
                            <button class='btn btn-danger w-25 fs-5 rounded-5 shadow' id='cancel' hidden=''>Exit</button>
                        </div>
                    </div>";
                } else {
                    echo "No existe";
                }
                break;
            default:
                echo "Error, No seleccionaste una acción para clientes";
                break;
        }

        break;

    case 'product':
        $product = new Product();
        switch ($_POST["acc"]) {
            case 'add':
                $consultServices = $product->listServices();
                $consultMoneda = $product->listMonedas();
                $consultImpuesto = $product->listImpuesto();
                echo "<div class='container mt-3 p-3 shadow shadow-lg'>
                <h1 class='mb-3 text-center'>Register Product</h1>
                <div class='row mb-4'>
                    <div class='col-lg-2 col-md-2 col-sm-12'>
                        <h5>ID Producto</h5>
                    </div>
                    <div class='col-lg-4 col-md-4 col-sm-12'>
                        <input type='text' class='form-control shadow mb-4'>
                    </div>
                    <div class='col-lg-2 col-md-2 col-sm-12'>
                        <h5>Description</h5>
                    </div>
                    <div class='col-lg-4 col-md-4 col-sm-12'>
                        <input type='text' class='form-control shadow'>
                    </div>
                </div>
                <div class='row mb-4'>
                    <div class='col-lg-1 col-md-2 col-sm-12'>
                        <h5>Servicio</h5>
                    </div>
                    <div class='col-lg-3 col-md-2 col-sm-12'>
                        <select name='' id='' class='form-select shadow mb-4'>";
                        while($ren = $consultServices->fetch_array(MYSQLI_ASSOC)){
                            echo "<option value='T_SERVICE'>$ren[SHORT_DESCRIPTION]</option>";
                        }
                        echo "</select>
                    </div>
                    <div class='col-lg-2 col-md-2 col-sm-12'>
                        <h5>Hosted Domain</h5>
                    </div>
                    <div class='col-lg-2 col-md-2 col-sm-12'>
                        <input type='number' class='form-control shadow mb-4'>
                    </div>
                    <div class='col-lg-2 col-md-2 col-sm-12'>
                        <h5>HDD Space</h5>
                    </div>
                    <div class='col-lg-2 col-md-2 col-sm-12'>
                        <input type='text' class='form-control shadow'>
                    </div>
                </div>
                <div class='row mb-4'>
                    <div class='col-lg-2 col-md-2 col-sm-12'>
                        <h5 class=''>Product Value</h5>
                    </div>
                    <div class='col-lg-2 col-md-2 col-sm-12'>
                        <input type='text' class='form-control shadow mb-4'>
                    </div>
                    <div class='col-lg-1 col-md-1 col-sm-12'>
                        <h5>Moneda</h5>
                    </div>
                    <div class='col-lg-3 col-md-3 col-sm-12'>
                        <select name='' id='' class='form-select shadow mb-4'>";
                        while($ren = $consultMoneda->fetch_array(MYSQLI_ASSOC)){
                            echo "<option value='$ren[C_MONEDA]'>$ren[DESCRIPCION]</option>";
                        }
                        echo "</select>
                    </div>
                    <div class='col-lg-2 col-md-2 col-sm-12'>
                        <h5>Periocidad</h5>
                    </div>
                    <div class='col-lg-2 col-md-2 col-sm-12'>
                        <select name='' id='' class='form-select shadow'>
                            <option value='1'>Mensual</option>
                            <option value='2'>Cuatrimestral</option>
                            <option value='3'>Semestral</option>
                            <option value='4'>Anual</option>
                        </select>
                    </div>
                </div>
                <div class='row mb-4'>
                    <div class='col-lg-2 col-md-2 col-sm-12'>
                        <h5>Impuesto</h5>
                    </div>
                    <div class='col-lg-4 col-md-2 col-sm-12'>
                        <select name='' id='' class='form-select shadow mb-4'>";
                        while($ren = $consultImpuesto->fetch_array(MYSQLI_ASSOC)){
                            echo "<option value='$ren[C_IMPUESTO]'>$ren[DESCRIPCION]</option>";
                        }
                        echo "</select>
                    </div>
                    <div class='col-lg-1 col-md-2 col-sm-12'>
                        <h5>Total</h5>
                    </div>
                    <div class='col-lg-5 col-md-2 col-sm-12'>
                        <input type='text' class='form-control shadow'>
                    </div>
                </div>
                <div class='text-center'>
                    <button class='btn bg-success bg-gradient text-white rounded-pill w-25 p-2 m-3'>Add</button>
                    <button class='btn bg-danger bg-gradient text-white rounded-pill w-25 p-2 m-3'>Return</button>
                </div>
            </div>";
                break;
            
            case 'list':
                echo "<h3>Product List</h3>
                    <div class='text-end mb-4'>
                        <button class='btn btn-primary' onclick='javascript:cargarInterfaz(\"product\", \"add\", \"null\");'><i class='bi bi-plus-circle pe-2 text-white'></i>Add</button>
                    </div>";
                    $consult = $product->list(null);
                    if ($consult->num_rows > 0) {
                        echo "<table class='table table-secondary table-hover table-sm'>
                            <tr>
                                <td>ID Product</td>
                                <td>Description</td>
                                <td>HDD Space</td>
                                <td class='text-center'>Actions</td>
                            </tr>";
                            while($ren = $consult->fetch_array(MYSQLI_ASSOC)){
                                echo "<tr>
                                    <td>$ren[T_PRODUCT]</td>
                                    <td>$ren[DESCRIPTION]</td>
                                    <td>$ren[STORAGE_SIZE]</td>
                                    <td class='text-center'>
                                        <button class='btn btn-info btn-sm mb-2' onclick='javascript:cargarInterfaz(\"product\", \"details\", $ren[T_PRODUCT]);'><i class='bi bi-list'></i></button>
                                        <button class='btn btn-warning btn-sm mb-2'><i class='bi bi-pencil-square'></i></button>
                                        <button class='btn btn-danger btn-sm mb-2' onclick='javascript:deleteClient($ren[T_PRODUCT]);'><i class='bi bi-trash'></i></button>
                                    </td>
                                </tr>";
                            }
                            echo "</table>";
                    } else{
                        echo "No records";
                    }
                break;
            default:
                echo "No seleccionaste una acción para product";
                break;
        }
        break;

    case 'role':
        $role = new Role();
        switch ($_POST["acc"]) {
            case 'add':
                echo "<h3 class='text-center'>Registro de Roles</h3>
                <div class='p-3 shadow-lg'>
                    <div class='row'>
                        <div class='col-lg-3 col-md-3 col-sm-12'>
                            <div class='form-floating m-2 shadow'>
                                <input type='text' class='form-control' id='floatingInput' placeholder='Role' required>
                                <label for='floatingInput'>Role</label>
                            </div>
                        </div>
                        <div class='col-lg-9 col-md-9 col-sm-12'>
                            <div class='form-floating m-2 shadow'>
                                <input type='text' class='form-control' id='floatingInput' placeholder='Description' required>
                                <label for='floatingInput'>Description</label>
                            </div>
                        </div>
                    </div>
            
                    <div class='row'>
                        <div class='col-lg-3 col-md-4 col-sm-12'>
                            <div class='form-floating m-2 shadow'>
                                <input type='number' class='form-control' id='floatingInput' placeholder='Role Permissions' required>
                                <label for='floatingInput'>Role Permissions</label>
                            </div>
                        </div>
                    </div>

                    <div class='text-center'>
                        <button class='btn bg-success bg-gradient text-white rounded-pill w-25 p-2 m-3 shadow'>Add</button>
                        <button class='btn bg-danger bg-gradient text-white rounded-pill w-25 p-2 m-3 shadow'>Return</button>
                    </div>
                </div>";
                break;
            case 'list':
                echo "<h3>List of Roles</h3>
                <div class='text-end mb-4'>
                    <button class='btn btn-primary' onclick='javascript:cargarInterfaz(\"role\", \"add\", \"null\");'><i class='bi bi-plus-circle pe-2 text-white'></i>Add</button>
                </div>";
                $consult = $role->list(null);
                if ($consult->num_rows > 0) {
                    echo "<table class='table table-secondary table-hover table-sm'>
                        <tr>
                            <td>Role</td>
                            <td>Description</td>
                            <td class='text-center'>Actions</td>
                        </tr>";
                        while($ren = $consult->fetch_array(MYSQLI_ASSOC)){
                            echo "<tr>
                                <td>$ren[T_ROLE]</td>
                                <td class='w-75'>$ren[DESCRIPTION]</td>
                                <td class='text-center'>
                                    <button class='btn btn-info btn-sm mb-2' onclick='javascript:cargarInterfaz(\"role\", \"details\", $ren[T_ROLE]);'><i class='bi bi-list'></i></button>
                                    <button class='btn btn-warning btn-sm mb-2'><i class='bi bi-pencil-square'></i></button>
                                    <button class='btn btn-danger btn-sm mb-2' onclick='javascript:deleteClient($ren[T_ROLE]);'><i class='bi bi-trash'></i></button>
                                </td>
                            </tr>";
                        }
                    echo "</table>";
                } else{
                    echo "No hay registros";
                }
                break;
            default:
                echo "No seleccionaste una acción para Roles";
                break;
        }
        break;

    default:
        echo "No seleccionaste ninguna opción (clientes, usuarios, etc..)";
        break;
}
