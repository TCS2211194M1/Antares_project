<?php
    require_once("connection.lib.php");
    require_once("functions.php");

    Class Ajax extends Connection{

        function __construct(){
            $this->open();
        }

        //Consulta para filtrar al mostrar la lista de estados
        function consultEstado($id){
            $ejec = $this->execute("SELECT * FROM c_estado WHERE C_PAIS = '$id' AND ENTRY_STATUS='0'");
            return $ejec;
        }

        //Consulta para filtrar al mostrar la lista de municipios
        function consultMunicipio($id){
            $ejec = $this->execute("SELECT * FROM c_municipio WHERE C_ESTADO = '$id' AND ENTRY_STATUS='0'");
            return $ejec;
        }

        //Consulta para filtrar al mostrar la lista de localidades
        function consultLocalidad($id){
            $ejec = $this->execute("SELECT * FROM c_localidad WHERE C_ESTADO = '$id' AND ENTRY_STATUS='0'");
            return $ejec;
        }

        //Consulta para filtrar al mostrar la lista de estados para agregar un...
        function consultState($id){
            $ejec = $this->execute("SELECT * FROM t_state WHERE COUNTRY_ID = '$id' AND ENTRY_STATUS='0'");
            return $ejec;
        }
    }

    $ajax = new Ajax();

    switch (true) {
        case $_POST["opc"] == 'estado':
            $id = $_POST["id"];
            $consult = $ajax->consultEstado($id);
            echo "<select class='form-select' id='C_ESTADO' onchange='javascript:ajax(\"municipio\", \"null\");'>
                <option>Selecciona una opción</option>";
                while ($ren = $consult->fetch_array(MYSQLI_ASSOC)) {
                    echo "<option value='$ren[DESCRIPCION]'>$ren[NOMBRE_DEL_ESTADO]</option>";
                }
            echo "</select>
            <label for='floatingInput'>Estado</label>";
        break;
        
        case $_POST["opc"] == 'municipio':
            $id = $_POST["id"];
            $consult = $ajax->consultMunicipio($id);
            echo "<select class='form-select' id='C_MUNICIPIO' onchange='javascript:ajax(\"localidad\", \"null\");'>
                <option>Selecciona una opción</option>";
                while ($ren = $consult->fetch_array(MYSQLI_ASSOC)) {
                    echo "<option value='$ren[C_ESTADO]'>$ren[DESCRIPCION]</option>";
                }
            echo "</select>
            <label for='floatingInput'>Municipio</label>";
        break;

        case $_POST["opc"] == 'localidad':
            $id = $_POST["id"];
            $consult = $ajax->consultLocalidad($id);
            echo "<select class='form-select' id='C_LOCALIDAD' onchange='javascript:ajax(\"codigopostal\", \"null\");'>
                <option>Selecciona una opción</option>";
                while ($ren = $consult->fetch_array(MYSQLI_ASSOC)) {
                    echo "<option value='$ren[C_LOCALIDAD]'>$ren[DESCRIPCION]</option>";
                }
            echo "</select>
            <label for='floatingInput'>Localidad</label>";
        break;

        case $_POST["opc"] == 'state':
            $functions = new Functions();
            $id = $_POST["id"];
            $consult = $ajax->consultState($id);
            $table = 't_state';
            $encabezado = $functions->descTable("t_state");
            $columns = array();
            $cont = 0;
            $opc = substr($table, 2);

            echo "<div class='mt-5'> <button class='btn btn-danger' onclick='javascript:loadPage()'><i class='bi bi-arrow-left-square me-2'></i>Regresar</button>
                <center>
                    <h3 class='mb-3 shadow rounded-pill bg-dark text-white w-25 p-2 mt-3'>". strtoupper($table)."
                </center>
                <div class='text-end'>
                    <button class='btn btn-sm btn-success rounded d-inline text-end' onclick='javascript:cargarInterfaz(\"$opc\", \"add\");'><i class='bi bi-plus-circle me-1'></i> Agregar nuevo</button>
                </div>

                <div class='mb-3'>
                    <input type='text' class='form-control me-3 shadow-lg d-inline w-25' placeholder='Buscar por id, descripción, fecha de creación'/>
                    <button class='btn btn-sm btn-primary rounded-pill d-inline' onclick='javascript:prueba(\"Hola\");'><i class='bi bi-search'></i></button>
                </div>

                <div class='table-responsive'>
                    <table class='table table-striped-columns text-center rounded-pill'>
                        <tr>";
                            while ($ren = $encabezado->fetch_array(MYSQLI_ASSOC)) {
                                echo "<td class='table-dark'>$ren[Field]</td>";
                                $columns[$cont] = $ren['Field'];
                                $cont++;
                            }
                            echo "<td class='table-dark'>Actions</td>
                        </tr>";
                        while ($ren = $consult->fetch_array(MYSQLI_ASSOC)) {
                            echo "<tr>";
                                foreach ($columns as $pos => $value){
                                    if ($pos == 0) {
                                        echo "<td onclick='javascirpt:prueba(\"$ren[$value]\");'>$ren[$value]</td>";
                                    } else{
                                        echo "<td>$ren[$value]</td>";
                                    }
                                }
                                echo "<td>
                                    <button class='btn btn-info mb-2 d-inline' onclick='javascript:interfaceMod(\"$opc\", ".$ren[$columns[0]].");'><i class='bi bi-pencil-square'></i></button>
                                    <button class='btn btn-danger d-inline' id='".$ren[$columns[0]]."' onclick='javascript:deleteRow(\"$opc\", ". $ren[$columns[0]] .");'><i class='bi bi-trash'></i></button>
                                </td>
                            </tr>";
                        }
                    echo "</table>
                </div>
            </div>";
        break; 

        case $_POST["opc"] == 'comprar':
            switch ($_POST["pago"] != 0) {
                case $_POST["pago"] == 'Efectivo':
                    echo "En construcción efectivo";
                    break;
                case $_POST["pago"] == 'paypal':
                    echo "En construcción paypal";
                    break;
                case $_POST["pago"] == 'Transferencia':
                    echo "<div class='container my-5 p-5 text-center border border-3' id='transferencia'>
                    <div>
                        <img src='../image/dominio.png' alt='' style='height: 200px;'>
                        <h5 class='my-3'>DATOS DE LA COMPRA</h5>
                        <div class='d-flex justify-content-center'>
                            <h4 class='border-bottom border-3 border-black w-50 p-1'>Cantidad a pagar:</h4>
                        </div>
                        <div class='mt-3 d-flex justify-content-center'>
                            <h4 class='border-bottom border-3 border-black w-50 p-1'>Fecha límite de pago:</h4>
                        </div>
                        <p class='fw-bold'>Instrucciones de Pago</p>
                    </div>
                    <div class='text-start p-2 border border-2 my-2'>
                        <h5 class='text-primary'>Desde BBVA</h5>
                        <p>En el menú 'Pagar' selecciona la opción 'De servicios' e ingrea el siguiente 'Número de convenio CIE'</p>
                        <div class='d-flex'>
                            <p class='fw-bold'>Número de convenio CIE: <p>123456</p></p>
                        </div>
                        <p>Ingresa los siguientes datos cuando te los soliciten:</p>
                        <div class='d-flex'>
                            <p class='fw-bold'>Referencia: <p>123456</p></p>
                        </div>
                        <div class='d-flex'>
                            <p class='fw-bold'>Importe:<p>USD 4</p></p>
                        </div>
                    </div>
                    <div class='text-start p-2 border border-2'>
                        <h5 class='text-primary'>Desde cualquier otro banco</h5>
                        <p>Ingresa a la sección de transferencias o pagos a otros bancos y proporciona los siguientes datos</p>
                        <div class='d-flex'>
                            <p class='fw-bold'>Banco destino: <p>BBVA Bancomer</p></p>
                        </div>
                        <div class='d-flex'>
                            <p class='fw-bold'>CLABE: <p>454545</p></p>
                        </div>
                        <div class='d-flex'>
                            <p class='fw-bold'>Concepto de Pago: <p>132456</p></p>
                        </div>
                        <div class='d-flex'>
                            <p class='fw-bold'>Referencia: <p>123456</p></p>
                        </div>
                        <div class='d-flex'>
                            <p class='fw-bold'>Importe: <p>USD 4</p></p>
                        </div>
                    </div>
            
                    <div class='text-start p-2'>
                        <span>1. Una vez que hayas completado el pago, haz clic en 'Continuar' y serás redirigido al panel de control.</span>
                        <br>
                        <span>2. Tus servicios se activarán una vez que se valide el pago</span>
                        <br>
                        <span>3. Si tienes alguna pregunta sobre tu pago o necesitas ayuda, visita nuestro centro de ayuda</span>
                    </div>
                    <br>
                    <div class='mb-3'>
                        <button class='btn btn-success w-50'>Completado</button>
                    </div>
            
                    <a href=''>Imprimir información de pago</a>
                </div>";
                    break;
                case $_POST["pago"] == 'Tarjeta de credito':
                    echo "En construcción tarjeta";
                    break;
                default:
                    echo "Error: No seleccionaste ninguna forma de pago";
                    break;
            }
        break;

        default:
            echo "Error: No se seleccionaste ninguna opción";
            break;
    }

?>