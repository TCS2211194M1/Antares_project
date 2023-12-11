<?php
spl_autoload_register(function ($class) {
    require_once($class . ".lib.php");
});

switch ($_POST["opc"]) {
    //INTERFACES DE DOMINIOS
    case 'dominios':
        switch ($_POST["acc"]) {
            case 'add':
                echo "En construcción add domain";
                break;

            case 'list':
                    echo "<div class='container mt-4 p-3 text-center shadow rounded-5' id='container-view'>
                        <div class='m-5 p-3'>
                            <img src='../image/dominio.png' class='rounded' style='height: 250px;'>
                            <h3 class='mt-5 mb-3'>No tienes ningún dominio</h3>
                            <button class='btn btn-primary' onclick='javascript:cargarModulo(\"dominios\",\"add\");'>Adquirir Dominio</button>
                        </div>
                    </div>";
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

    case 'tickets':
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
                $ticket = 1;
                if ($ticket == 0) {
                    echo "<div class='container mt-5 p-3 text-center shadow rounded-5' id='container-view'>
                        <div class='m-5 p-5'>
                            <label>Imagen</label>
                            <h3 class='mt-5 mb-4'>No tienes tickets pendietes</h3>
                            <button class='btn btn-primary' onclick='javascript:cargarModulo(\"tickets\",\"add\");'>Agregar ticket</button>
                        </div>
                    </div>";
                } else{
                    echo "<div class='px-5'>
                        <button class='btn btn-primary mb-3 p-2' onclick='javascript:cargarModulo(\"tickets\",\"add\");'>Añadir otro ticket</button>
                        <h5>Información del Ticket: #123456</h5>
                        <div class='row'>
                            <div class='col-lg-3 me-5 p-2 mb-1'>
                                <div class='row rounded-4 shadow' id='container-view'>
                                    <div class='col-lg-12 p-3 border-bottom'>
                                        <label for=''>Solicitante</label>
                                        <h5>Luis Jimenez</h5>
                                    </div>
                                    <div class='col-lg-12 p-3 border-bottom'>
                                        <label for=''>Departamento</label>
                                        <h5>Soporte Técnico</h5>
                                    </div>
                                    <div class='col-lg-12 p-3 border-bottom'>
                                        <label for=''>Reportado</label>
                                        <h5>30 de Noviembre del 2023</h5>
                                    </div>
                                    <div class='col-lg-12 p-3 border-bottom'>
                                        <label for=''>Prioridad</label>
                                        <h5 class='text-danger'>Alta</h5>
                                    </div>

                                    <div class='col-lg-12 p-3'>
                                        <label for=''>Estatus</label>
                                        <h5 class='text-danger'>Pendiente</h5>
                                    </div>
                                </div>
                            </div>

                            <div class='col-lg-8 p-2'>
                                <div class='row shadow rounded-4' id='container-view''>
                                    <div class='col-lg-12 p-3 border-bottom'>
                                        <h5>Luis Jiménez</h5>
                                        <p class='text-end' for=''>Fecha: 17/07/2023</p>
                                    </div>
                                    <div class='col-lg-12 p-3 border-bottom'>
                                        <p class='mb-3'>Mensaje que se escribió</p>
                                        <p>IP: 192.168.1.1</p>
                                    </div>
                                    <div class='col-lg-12 p-3'>
                                        <lable for=''>Evidencias</lable>
                                        <p class='text-primary'>Image.png</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>";
                }
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