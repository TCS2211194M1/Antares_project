<?php

session_start();

$username = $_SESSION['username'];
$ip = $_SERVER['REMOTE_ADDR'];

if (isset($_POST["close"])) {
    session_destroy();
    header("Location: ../login.php");
}

spl_autoload_register(function ($class) {
    require_once($class . ".lib.php");
});

switch ($_POST["opc"]) {
    //INTERFACES DE DOMINIOS
    case 'dominios':
        $dominio = new Dominio();
        switch ($_POST["acc"]) {
            case 'list':
                $consult = $dominio->consultActivos($username);
                $consult2 = $dominio->consultInactivos($username);
                if ($consult->num_rows > 0 || $consult2->num_rows > 0) {
                    if ($consult->num_rows > 0) {
                        echo "<h1>Dominios Activos</h1>
                        <br>
                        <div class='table-responsive' style='height:200px;'>
                            <table class='table text-center' id='table-data'>
                                <tr class='table-dark fw-bold'>
                                    <td>Cliente</td>
                                    <td>Producto</td>
                                    <td>Precio</td>
                                    <td>Dominio</td>
                                    <td>Fecha de Inicio</td>
                                    <td>Fecha de Vigencia</td>
                                </tr>";
                        while ($ren = $consult->fetch_array(MYSQLI_ASSOC)) {
                            echo "<tr>
                                <td>$ren[T_CLIENT]</td>
                                <td>$ren[LONG_DESCRIPTION]</td>
                                <td>$$ren[importe_com]</td>
                                <td>$ren[REGISTERED_DOMAIN]</td>
                                <td>$ren[FECHA_INICIO_DE_VIGENCIA]</td>
                                <td>$ren[FECHA_FIN_DE_VIGENCIA]</td>
                            </tr>";
                        }
                        echo "</table></div>";
                    } else{
                        echo "<h1>No tienes dominios activos</h1>";
                    }
                    if ($consult2->num_rows > 0) {
                        echo "<br>
                        <h1>Dominios Inactivos</h1>
                        <br>
                        <div class='table-responsive' style='height:200px;'>
                            <table class='table text-center' id='table-data'>
                                <tr class='table-dark fw-bold'>
                                    <td>Cliente</td>
                                    <td>Producto</td>
                                    <td>Precio</td>
                                    <td>Dominio</td>
                                    <td>Fecha de Inicio</td>
                                    <td>Fecha Límte de Pago</td>
                                </tr>";
                        while ($ren = $consult2->fetch_array(MYSQLI_ASSOC)) {
                            echo "<tr>
                                <td>$ren[T_CLIENT]</td>
                                <td>$ren[LONG_DESCRIPTION]</td>
                                <td>$$ren[importe_com]</td>
                                <td>$ren[REGISTERED_DOMAIN]</td>
                                <td>$ren[FECHA_INICIO_DE_VIGENCIA]</td>
                                <td>$ren[fechaLimite_com]</td>
                            </tr>";
                        }
                        echo "</table></div>";
                    } else{
                        echo "<h1>No tienes dominios pendientes</h1>";
                    }
                } else{
                    echo "<div class='container mt-4 p-3 text-center shadow rounded-5' id='container-view'>
                        <div class='m-5 p-3'>
                            <img src='../image/dominio.png' class='rounded' style='height: 250px;'>
                            <h3 class='mt-5 mb-3'>No tienes ningún dominio</h3>
                            <a class='btn btn-primary' href='../shop/catalog.php'>Adquirir Dominio</a>
                        </div>
                    </div>";
                }
                break;
            default:
                echo "Error: No seleccionaste alguna operación (Agregar, Listar, Modificar, Eliminar)";
                break;
        }
        break;    

    case 'tickets':
        $ticket = new Ticket();
        switch ($_POST["acc"]) {
            case 'add':
                $consult = $ticket->consultClient($username);
                $consultD = $ticket->consultDominios($username);
                $ren = $consult->fetch_array(MYSQLI_ASSOC);
                echo "<h2 class='text-center'>Abrir Nuevo Ticket</h2>
                <form id='form-ticket'>
                    <div class='container mt-5 p-3 rounded-4 shadow' id='container-view'>
                        <h4 class='mb-4'>Información del Ticket</h4>    
                        <div class='row'>
                            <div class='col-lg-6 col-md-6 col-sm-12'>
                                <div class='m-2'>
                                    <label for='USERNAME'>Nombre</label>
                                    <input type='text' class='form-control' id='USERNAME' value='$ren[USERNAME]' disabled/>
                                </div>
                            </div>
                            <div class='col-lg-6 col-md-6 col-sm-12'>
                                <div class='m-2'>
                                    <label for='EMAIL'>Email</label>
                                    <input type='email' class='form-control' id='EMAIL' value='$ren[EMAIL]' disabled/>
                                </div>
                            </div>
                        </div>
                        <div class='row'>
                            <div class='col-lg-4 col-md-4 col-sm-12'>
                                <div class='m-2'>
                                    <label for='DEPARTAMENT'>Departamento</label>
                                    <input type='text' class='form-control' id='DEPARTAMENT' value='Soporte Técnico' />
                                </div>
                            </div>
                            <div class='col-lg-4 col-md-4 col-sm-12'>
                                <div class='m-2'>
                                    <label for='DOMAIN'>Dominios Existentes</label>
                                    <select class='form-select' id='DOMAIN'>
                                        <option>Selecciona una opción</option>";
                                        while ($renD = $consultD->fetch_array(MYSQLI_ASSOC)) {
                                            echo "<option value='$renD[T_WORKORDER]'>$renD[REGISTERED_DOMAIN]</option>";
                                        }
                                    echo "</select>
                                </div>
                            </div>
                            <div class='col-lg-4 col-md-4 col-sm-12'>
                                <div class='m-2'>
                                    <label for='PRIORITY'>Prioridad</label>
                                    <select class='form-select' id='PRIORITY'>
                                        <option>Selecciona una opción</option>
                                        <option class='text-success'>Baja</option>
                                        <option class='text-warning'>Media</option>
                                        <option class='text-danger'>Alta</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class='container mt-5 p-3 rounded-4 shadow' id='container-view'>
                        <h4 class='mb-4'>Mensaje</h4>    
                        <div class='row'>
                            <div class='col-lg-12 col-md-12 col-sm-12'>
                                <div class='m-2'>
                                    <label for='SUBJECT'>Asunto</label>
                                    <input type='text' class='form-control' id='SUBJECT' placeholder='Escribe el asunto'/>
                                </div>
                            </div>
                        </div>
                        <div class='row'>
                            <div class='col-lg-12 col-md-12 col-sm-12'>
                                <div class='m-2'>
                                    <label for='MESSAGE'>Mensaje</label>
                                    <textarea class='form-control' id='MESSAGE' placeholder='Escribe tu mensaje' style='height: 200px'></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                
                <div class='container mt-3 p-3'>
                    <div class='row'>
                        <div class='col-lg-3'></div>
                        <div class='col-lg-6 text-center'>
                            <button class='btn btn-primary p-2 me-5 shadow' onclick='javascript:addTicket();'>Subir</button>
                            <button class='btn btn-danger p-2 shadow' onclick='javascript:cargarModulo(\"tickets\", \"list\");'>Cancelar</button>
                        </div>
                        <div class='col-lg-3'></div>
                    </div>            
                </div>";
                break;
            case 'list':
                $consult = $ticket->consult($username);
                if ($consult->num_rows > 0) {
                    echo "<button class='btn btn-primary mb-3 p-2' onclick='javascript:cargarModulo(\"tickets\",\"add\");'>Añadir otro ticket</button>";
                    while ($ren = $consult->fetch_array(MYSQLI_ASSOC)) {
                        echo "<div class='px-5'>
                        <h5>Información del Ticket: #$ren[id_tic]</h5>
                        <div class='row'>
                            <div class='col-lg-3 me-5 p-2 mb-1'>
                                <div class='row rounded-4 shadow' id='container-view'>
                                    <div class='col-lg-12 p-3 border-bottom'>
                                        <label for=''>Solicitante</label>
                                        <h5>$username</h5>
                                    </div>
                                    <div class='col-lg-12 p-3 border-bottom'>
                                        <label for=''>Departamento</label>
                                        <h5>$ren[dpto_tic]</h5>
                                    </div>
                                    <div class='col-lg-12 p-3 border-bottom'>
                                        <label for=''>Reportado</label>
                                        <h5>$ren[create_date]</h5>
                                    </div>
                                    <div class='col-lg-12 p-3 border-bottom'>
                                        <label for=''>Prioridad</label>
                                        <h5 class='text-danger'>$ren[prioridad_tic]</h5>
                                    </div>
    
                                    <div class='col-lg-12 p-3'>
                                        <label for=''>Estatus</label>";
                                        if ($ren["entry_status"] == 1) {
                                            echo "<h5 class='text-danger'>Pendiente</h5>";
                                        } else{
                                            echo "<h5 class='text-success'>Resuelto</h5>";
                                        }
                                    echo "</div>
                                </div>
                            </div>
    
                            <div class='col-lg-8 p-2'>
                                <div class='row shadow rounded-4' id='container-view''>
                                    <div class='col-lg-12 p-3 border-bottom'>
                                        <h5>$username</h5>
                                        <p class='text-end' for=''>Fecha: $ren[create_date]</p>
                                    </div>
                                    <div class='col-lg-12 p-3 border-bottom'>
                                        <div class='d-flex'>
                                            <p class='fw-bold'> Asunto: <p class='ms-1'> $ren[asunto_tic]</p></p>
                                        </div>
                                        <p class='mb-3'>$ren[mensaje_tic]</p>
                                        <p>IP: $ip</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>";
                    }
                } else{
                    echo "<div class='container mt-5 p-3 text-center shadow rounded-5' id='container-view'>
                    <div class='m-5 p-5'>
                        <img src='../image/cloud.png' alt='' style='width: 64px; height: 64px;'>
                        <h3 class='mt-5 mb-4'>No tienes tickets pendietes</h3>
                        <button class='btn btn-primary' onclick='javascript:cargarModulo(\"tickets\",\"add\");'>Agregar ticket</button>
                    </div>
                </div>";
                }
                break;
            default:
                echo "Error: No seleccionaste alguna operación (Agregar, Listar)";
                break;
        }
        break;

    case 'usuario':
        $dominio = new Dominio();
        switch ($_POST["acc"]) {
            case 'details':
                $consult = $dominio->consultClient($username);
                $ren = $consult->fetch_array(MYSQLI_ASSOC);
                $consultA = $dominio->consultActivos($username);
                $consultI = $dominio->consultInactivos($username);
                echo "<div class='container p-3 shadow rounded-3' id='table-data'>
                    <div class='row'>
                        <div class='col-lg-6 d-flex'>
                            <table class='table table-borderless fs-4'>
                                <thead>
                                    <tr>
                                        <th>Nombre de Usuario:</th>
                                        <th class='fw-normal'>$ren[USERNAME]</th>
                                    </tr>
                                    <tr>
                                        <th>Nombre:</th>
                                        <th class='fw-normal'>$ren[LOGIN_NAME]</th>
                                    </tr>
                                    <tr>
                                        <th>Apellidos:</th>
                                        <th class='fw-normal'>$ren[LOGIN_LAST_NAME]</th>
                                    </tr>
                                    <tr>
                                        <th>Email:</th>
                                        <th class='fw-normal'>$ren[EMAIL]</th>
                                    </tr>
                                    <tr>
                                        <th>Contraseña:</th>
                                        <th class='fw-normal'>$ren[PASSWORD]</th>
                                    </tr>
                                    <tr>
                                        <th>Celular:</th>
                                        <th class='fw-normal'>$ren[CELLPHONE]</th>
                                    </tr>
                                    <tr>
                                        <th class='text-center table-borderless'>
                                            <button class='btn btn-outline-primary' onclick='javascript:cargarModulo(\"usuario\", \"mod\");'><i class='bi bi-pencil-square me-2'></i>Modificar Datos</button>
                                        </th>
                                        <th class='text-center table-borderless'>
                                            <form method='POST'>
                                                <button class='btn btn-outline-danger' name='close'><i class='bi bi-box-arrow-left me-2'></i>Cerrar Sesión</button>
                                            </form>
                                        </th>
                                    </tr>
                                </thead>
                            </table>  
                        </div>
                        <div class='col-lg-6 table-responsive'>
                            <table class='table table-borderless table-responsive fs-4'>
                                <thead>
                                    <tr>
                                        <th>Dominios activos:</th>";
                                        if ($consultA->num_rows > 0) {
                                            while ($renA = $consultA->fetch_array(MYSQLI_ASSOC)) {
                                                echo "<th class='fw-normal'>'$renA[REGISTERED_DOMAIN]'</th>";
                                            }
                                        } else{
                                            echo "<th class='fw-normal'>0</th>";
                                        }
                                    echo "</tr>
                                    <tr>
                                        <th>Dominios Inactivos: </th>";
                                        if ($consultI->num_rows > 0) {
                                            while ($renI = $consultI->fetch_array(MYSQLI_ASSOC)) {
                                                echo "<th class='fw-normal'>'$renI[REGISTERED_DOMAIN]'</th>";
                                            }
                                        } else{
                                            echo "<th class='fw-normal'>0</th>";
                                        }
                                    echo "</tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                    
                </div>";
                break;

            case 'mod':
                $consult = $dominio->consultClient($username);
                $ren = $consult->fetch_array(MYSQLI_ASSOC);
                echo "<div class='container shadow rounded-5 p-5' id='mod-user'>
                <form id='form-mod'>
                    <input type='hidden' value='$ren[T_CLIENT]' id='T_CLIENT'></input>
                    <div class='d-flex justify-content-center mb-4'>
                        <div class='col-lg-1 col-md-2 col-sm-2'>
                            <h5>Nombre</h5>
                        </div>
                        <div class='col-lg-3 col-md-3 col-sm-5'>
                            <input type='text' class='form-control ms-3' id='NAME' value='$ren[LOGIN_NAME]'></input>
                        </div>
                    </div>
                    <div class='d-flex justify-content-center mb-4'>
                        <div class='col-lg-1 col-md-2 col-sm-2'>
                            <h5>Apellido</h5>
                        </div>
                        <div class='col-lg-3 col-md-3 col-sm-5'>
                            <input type='text' class='form-control ms-3' id='LAST_NAME' value='$ren[LOGIN_LAST_NAME]'></input>
                        </div>
                    </div>
                    <div class='d-flex justify-content-center mb-4'>
                        <div class='col-lg-1 col-md-2 col-sm-2'>
                            <h5>Email</h5>
                        </div>
                        <div class='col-lg-3 col-md-3 col-sm-5'>
                            <input type='text' class='form-control ms-3' id='EMAIL' value='$ren[EMAIL]'></input>
                        </div>
                    </div>
                    <div class='d-flex justify-content-center mb-4'>
                        <div class='col-lg-1 col-md-2 col-sm-2'>
                            <h5>Contraseña</h5>
                        </div>
                        <div class='col-lg-3 col-md-3 col-sm-5'>
                            <input type='text' class='form-control ms-3' id='PASSWORD' value='$ren[PASSWORD]'></input>
                        </div>
                    </div>
                    <div class='d-flex justify-content-center mb-4'>
                        <div class='col-lg-1 col-md-2 col-sm-2'>
                            <h5>Teléfono</h5>
                        </div>
                        <div class='col-lg-3 col-md-3 col-sm-5'>
                            <input type='text' class='form-control ms-3' id='CELLPHONE' value='$ren[CELLPHONE]'></input>
                        </div>
                    </div>
                    </form>
                    <div class='d-flex justify-content-center mb-4'>
                        <div class='col-lg-1 col-md-1 col-sm-1'></div>
                        <div class='col-lg-2'>
                            <button class='btn btn-outline-success' onclick='javascript:modUser();'>Modificar Datos</button>
                        </div>
                        <div class='col-lg-2'>
                            <button class='btn btn-outline-danger ms-2' onclick='javascript:cargarModulo(\"usuario\", \"details\");'>Cancelar</button>
                        </div>
                    </div>
                </div>";
                break;    
            default:
                echo "Error: No seleccionaste alguna operación (Listar, Modificar)";
                break;
        }
        break; 
    default:
        echo "Error, No seleccionaste ninguna opción parael cliente";
        break;
}