<?php

spl_autoload_register(function ($class) {
    require_once($class . ".lib.php");
});

switch ($_POST["opc"]) {
    case 'client':
        $client = new Client();
        switch ($_POST["acc"]) {
            case 'add':
                $consult = $client->listCountry(null);
                echo "<div class='container'>
                        <h3 class='text-center text-secondary m-3'>Registro de Clientes</h3>
                        <div class='row'>
                            <div class='col-lg-6 col-md-6 col-sm-12'>
                                <div class='form-floating m-2 shadow-sm'>
                                    <input type='text' class='form-control' id='floatingName' required>
                                    <label for='floatingName' class='text-dark'>Name</label>
                                </div>
                            </div>
                            <div class='col-lg-6 col-md-6 col-sm-12'>
                                <div class='form-floating m-2 shadow-sm'>
                                    <input type='text' class='form-control' id='floatingLastName'>
                                    <label for='floatingLastName' class='text-dark'>Last Name</label>
                                </div>
                            </div>
                        </div>

                    <div class='row'>
                        <div class='col-lg-4 col-md-6 col-sm-12'>
                           <div class='form-floating m-2 shadow-sm'>
                                <input type='text' class='form-control' id='floatingGenere'>
                                <label for='floatingGenere' class='text-dark'>Genere</label>
                            </div>
                        </div>
                        <div class='col-lg-4 col-md-6 col-sm-12'>
                            <div class='form-floating m-2 shadow-sm'>
                                <input type='date' class='form-control' id='floatingBirthDate'>
                                <label for='floatingBirthDate' class='text-dark'>Birthdate</label>
                            </div>
                        </div>
                    </div>

                    <div class='row w-75'>
                        <div class='col-lg-12 col-md-12 col-sm-12'>
                            <div class='form-floating m-2 shadow-sm'>
                                <input type='email' class='form-control' id='floatingEmail'>
                                <label for='floatingEmail' class='text-dark'>Email</label>
                            </div>
                        </div>
                    </div>

                    <div class='row w-75'>
                        <div class='col-lg-12 col-md-12 col-sm-12'>
                            <div class='form-floating m-2 shadow-sm'>
                                <input type='email' class='form-control' id='floatingEmail2'>
                                <label for='floatingEmail2' class='text-dark'>Optional Email</label>
                            </div>
                        </div>
                    </div>

                    <div class='row'>
                        <div class='col-lg-4 col-md-4 col-sm-12'>
                            <div class='form-floating m-2 shadow-sm'>
                                <input type='text' class='form-control' id='floatingUsername'>
                                <label for='floatingUsername' class='text-dark'>Username</label>
                            </div>
                        </div>
                        <div class='col-lg-4 col-md-4 col-sm-12'>
                            <div class='form-floating m-2 shadow-sm'>
                                <input type='password' class='form-control' id='floatingPassword'>
                                <label for='floatingPassword' class='text-dark'>Password</label>
                            </div>
                        </div>
                        <div class='col-lg-4 col-md-4 col-sm-12'>
                            <div class='form-floating m-2 shadow-sm'>
                                <input type='password' class='form-control' id='floatingPassword2'>
                                <label for='floatingPassword2' class='text-dark'>Confirm Password</label>
                            </div>
                        </div>
                    </div>

                    <div class='row'>
                        <div class='col-lg-6 col-md-6 col-sm-12'>
                            <div class='form-floating m-2 shadow-sm'>
                                <input type='number' class='form-control' id='floatingPhone'>
                                <label for='floatingPhone' class='text-dark'>Phone</label>
                            </div>
                        </div>
                        <div class='col-lg-6 col-md-6 col-sm-12'>
                            <div class='form-floating m-2 shadow-sm'>
                                <input type='number' class='form-control' id='floatingPhone2'>
                                <label for='floatingPhone2' class='text-dark'>Optional Phone</label>
                            </div>
                        </div>
                    </div>

                    <div class='row'>
                        <div class='col-lg-4 col-md-4 col-sm-12'>
                            <select class='form-select ms-2 mt-3 w-75 shadow-sm' id='country' name='country' onchange='listState();'>";
                while ($ren = $consult->fetch_array(MYSQLI_ASSOC)) {
                    echo "<option value='$ren[id]'>$ren[name]</option>";
                }
                echo "<select></div>

            <div class='col-lg-4 col-lg-4 col-sm-12' id='states'>";
                $consultStates = $client->listState(null);
                echo "<select class='form-select ms-2 mt-3 w-75 shadow-sm'>";
                while ($ren = $consultStates->fetch_array(MYSQLI_ASSOC)) {
                    echo "<option value='$ren[id]'>$ren[nombre]</option>";
                }
                echo "</select></div>
            <div class='col-lg-4 col-lg-4 col-sm-12'>
                <select class='form-select ms-2 mt-3 w-75 shadow-sm'>
                    <option selected>Select your city</option>
                    <option value='1'>Zitacuaro</option>
                    <option value='2'>Querétaro</option>
                  </select>
            </div>
        </div> 
        
        
        <div class='form-floating mt-3 m-2 shadow-sm'>
            <input type='text' class='form-control' id='floatingStreet'>
            <label for='floatingStreet' class='text-dark'>CP, Colony, Street and Number</label>
        </div>
        <div class='text-center mt-5'>
            <button class='btn bg-success bg-gradient text-white rounded-pill w-25 p-2 m-3'>Add</button>
            <button class='btn bg-danger bg-gradient text-white rounded-pill w-25 p-2 m-3'>Return</button>
        </div>
    </div></body>";
                break;

            case 'list':
                echo "<h3>Clients List</h3>
                    <div class='text-end'>
                        <button class='btn btn-primary' onclick='javascript:cargarInterfaz(\"client\", \"add\", \"142\");'><i class='bi bi-plus-circle pe-2 text-white'></i>Add</button>
                    </div>";
                $consult = $client->list(null);
                if ($consult->num_rows > 0) {
                    echo "<table class='table'>
                        <tr>
                            <td>Username</td>
                            <td>Name</td>
                            <td>Email</td>
                            <td>Phone</td>
                            <td>Actions</td>
                        </tr>";
                    while ($ren = $consult->fetch_array(MYSQLI_ASSOC)) {
                        echo "<tr>
                                <td>$ren[username]</td>
                                <td>$ren[name] $ren[lastName]</td>
                                <td>$ren[email]</td>
                                <td>$ren[phone]</td>
                                <td>
                                    <button class='btn btn-info' onclick='javascript:cargarInterfaz(\"client\", \"details\", $ren[id]);'><i class='bi bi-list pe-2'></i>Details</button>
                                    <button class='btn btn-warning'><i class='bi bi-pencil-square pe-2'></i>Modify</button>
                                    <button class='btn btn-danger'><i class='bi bi-trash pe-2'></i>Delete</button>
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
                    echo "<h3 class='text-center text-secondary m-3'>Cliente: $ren[username]</h3>
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
                                <label for=''>Lastname</label>
                                <input type='text' class='form-control shadow-sm' value='$ren[lastName]' id='lastName' disabled=''>
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

    case 'user':

        break;

    case '':

        break;

    default:
        echo "No seleccionaste ninguna opción (clientes, usuarios, etc..)";
        break;
}
