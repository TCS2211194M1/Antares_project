<?php

spl_autoload_register(function ($class) {
    require_once($class . ".lib.php");
});

switch ($_POST["opc"]) {
    case 'client':
        $client = new Client();
        switch ($_POST["acc"]) {
            case 'add':
                echo "<div class='container p-3'>
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
                
                        <div class='row'>
                            <div class='col-lg-12 col-md-12 col-sm-12'>
                                <div class='form-floating m-2 shadow-sm'>
                                    <input type='email' class='form-control' id='floatingEmail'>
                                    <label for='floatingEmail' class='text-dark'>Email</label>
                                </div>
                            </div>
                        </div>
                        
                        <div class='row'>
                            <div class='col-lg-6 col-md-6 col-sm-12'>
                                <div class='form-floating m-2 shadow-sm'>
                                    <input type='password' class='form-control' id='floatingPassword'>
                                    <label for='floatingPassword' class='text-dark'>Password</label>
                                </div>
                            </div>
                            <div class='col-lg-6 col-md-6 col-sm-12'>
                                <div class='form-floating m-2 shadow-sm'>
                                    <input type='password' class='form-control' id='floatingPassword2'>
                                    <label for='floatingPassword2' class='text-dark'>ConfirmPassword</label>
                                </div>
                            </div>
                        </div>

                        <div class='row'>
                            <div class='col-lg-12 col-md-12 col-sm-12'>
                                <div class='form-floating m-2 shadow-sm'>
                                    <input type='email' class='form-control' id='floatingEmail2'>
                                    <label for='floatingEmail2' class='text-dark'>Optional Email</label>
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
                            <div class='col-lg-6 col-lg-6 col-sm-12 d-flex'>
                                <div class='form-check fs-5 mt-3 ms-2'>
                                    <input class='form-check-input' type='radio' name='flexRadioDefault' id='flexRadioDefault1'>
                                    <label class='form-check-label' for='flexRadioDefault1'>Mexicano</label>
                                </div>
                                <div class='form-check fs-5 mt-3 ms-4'>
                                    <input class='form-check-input' type='radio' name='flexRadioDefault' id='flexRadioDefault2' checked>
                                    <label class='form-check-label' for='flexRadioDefault2'>Extranjero</label>
                                </div>
                            </div>
                            <div class='col-lg-6 col-lg-6 col-sm-12'>
                                <select class='form-select ms-2 mt-3 w-75 shadow-sm'>
                                    <option selected>Select your state</option>
                                    <option value='1'>Michoacán</option>
                                    <option value='2'>Querétaro</option>
                                  </select>
                            </div>
                        </div> 
                        <div class='form-floating mt-3 m-2 shadow-sm'>
                            <input type='text' class='form-control' id='floatingStreet'>
                            <label for='floatingStreet' class='text-dark'>City, CP, Colony, Street and Number</label>
                        </div>
                        <div class='text-center mt-5'>
                            <button class='btn bg-success bg-gradient text-white rounded-pill w-25 p-2 m-3'>Add</button>
                            <button class='btn bg-danger bg-gradient text-white rounded-pill w-25 p-2 m-3'>Return</button>
                        </div>
                    </div>
                </body>";
                break;

            case 'list':
                echo "<h3>Clients List</h3>
                    <div class='text-end'>
                        <button class='btn btn-primary' onclick='javascript:cargarInterfaz(\"client\", \"add\", \"null\");'><i class='bi bi-plus-circle pe-2 text-white'></i>Add</button>
                    </div>";
                $consult = $client->list(null);
                if ($consult->num_rows > 0) {
                    echo "<table class='table'>
                        <tr>
                            <td>Name</td>
                            <td>Email</td>
                            <td>Phone</td>
                            <td>Username</td>
                            <td>Actions</td>
                        </tr>";
                    while ($ren = $consult->fetch_array(MYSQLI_ASSOC)) {
                        echo "<tr>
                                <td>$ren[name] $ren[lastName]</td>
                                <td>$ren[email]</td>
                                <td>$ren[phone]</td>
                                <td>$ren[username]</td>
                                <td>
                                    <button class='btn btn-info'><i class='bi bi-list pe-2'></i>Details</button>
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
