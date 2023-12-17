<?php

session_start();

$username = $_SESSION['username'];
$ip = $_SERVER['REMOTE_ADDR'];

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
                        echo "<h1>Dominios Activos:</h1>";
                        while ($ren = $consult->fetch_array(MYSQLI_ASSOC)) {
                            echo "<div class='p-3 shadow rounded-3'>
                                <div>
                                    <h4 class='d-flex'>Nombre del Dominio:<p class='d-flex ms-2'>$ren[REGISTERED_DOMAIN]</p></h4>
                                </div>
                                <div class='d-flex'>
                                    <p>Fecha de Inicio: $ren[FECHA_INICIO_DE_VIGENCIA]</p>
                                    <p class='ms-3'>Fecha de Vigencia: $ren[FECHA_FIN_DE_VIGENCIA]</p>
                                </div>
                                <button class='btn btn-danger'>No renovar suscripción</button>
                            </div>";
                        }
                    } else{
                        echo "<h1>No tienes dominios activos</h1>";
                    }
                    if ($consult2->num_rows > 0) {
                        echo "<h1 class='mt-5'>Dominios Inactivos:</h1>";
                        while ($ren = $consult2->fetch_array(MYSQLI_ASSOC)) {
                            echo "<div class='p-3 shadow rounded-3'>
                            <div>
                                <h4 class='d-flex'>Nombre del Dominio:<p class='d-flex ms-2'>$ren[REGISTERED_DOMAIN]</p></h4>
                            </div>
                            <div class='d-flex'>
                                <p>Fecha de Inicio: Pendiente</p>
                                <p class='ms-3'>Fecha de Vigencia: Pendiente</p>
                            </div>
                        </div>";
                        }
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
                echo "<h2 class='text-center'>Abrir Nuevo Ticket</h2>
                <form>
                    <div class='container mt-5 p-3 rounded-4 shadow' id='container-view'>
                        <h4 class='mb-4'>Información del Ticket</h4>    
                        <div class='row'>
                            <div class='col-lg-6 col-md-6 col-sm-12'>
                                <div class='m-2'>
                                    <label for='NAME'>Nombre</label>
                                    <input type='text' class='form-control' id='NAME' value='Luis Jimenez' disabled/>
                                </div>
                            </div>
                            <div class='col-lg-6 col-md-6 col-sm-12'>
                                <div class='m-2'>
                                    <label for='EMAIL'>Email</label>
                                    <input type='email' class='form-control' id='EMAIL' value='luis@creativeering.com' disabled/>
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
                                    <label for='DOMAIN'>Servicios Relacionados</label>
                                    <select class='form-select' id='DOMAIN'>
                                        <option>Selecciona una opción</option>
                                        <option>Domain 4k full hd (pending)</option>
                                    </select>
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
                            <button class='btn btn-primary p-2 me-5 shadow' onclick='javascript:cargarModulo(\"tickets\", \"list\");'>Subir</button>
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
                        <h5>Información del Ticket: $ren[id_tic]</h5>
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
                                        if ($ren["entry_status"] == 0) {
                                            echo "<h5 class='text-danger'>Pendiente</h5>";
                                        } else{
                                            echo "<h5 class='text-danger'>Resuelto</h5>";
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
            case 'delete':
                echo "En construcción del";
                break;
            default:
                echo "Error: No seleccionaste alguna operación (Agregar, Listar, Modificar, Eliminar)";
                break;
        }
        break;

    case 'usuario':
        switch ($_POST["acc"]) {
            case 'add':
                echo "En construcción add";
                break;

            case 'list':
                echo "En construcción list";
                break;
            case 'mod':
                echo "En construcción mod";
                break;
            case 'delete':
                echo "En construcción del";
                break;
            default:
                echo "Error: No seleccionaste alguna operación (Agregar, Listar, Modificar, Eliminar)";
                break;
        }
        break; 
    default:
        echo "Error, No seleccionaste ninguna opción";
        break;
}