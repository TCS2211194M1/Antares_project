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
        function consultCity($id){
            $ejec = $this->execute("SELECT * FROM t_city WHERE COUNTRY_ID = '$id' AND ENTRY_STATUS='0' LIMIT 1000");
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

                <div class='table-responsive' style='height: 500px;'>
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
 
        case $_POST["opc"] == 'city':
            $functions = new Functions();
            $id = $_POST["id"];
            $consult = $ajax->consultCity($id);
            $table = 't_city';
            $encabezado = $functions->descTable("t_city");
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

                <div class='table-responsive' style='height: 500px;'>
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

        case $_POST["opc"] == 'consult':
            $columns = array();
            $cont = 0;
            $opc = substr($_POST["table"], 2);


            $columnas = $ajax->execute("DESC " . $_POST["table"]);
            while($colFiltro = $columnas->fetch_array(MYSQLI_ASSOC)){
                $columns[$cont] = $colFiltro['Field'];
                $cont++;
            }
            $columnas2 = $ajax->execute("DESC " . $_POST["table"]);
            if ($_POST["table"] != '' || $_POST["table"] != null) {
                $consult1 = $ajax->execute("SELECT * FROM ". $_POST['table'] ." WHERE ". $columns[0] ." LIKE '$_POST[cadena]%'" );
                $consult2 = $ajax->execute("SELECT * FROM ". $_POST['table'] ." WHERE ". $columns[1] ." LIKE '$_POST[cadena]%'" );
                echo "<div class='mt-3'> <button class='btn btn-danger' onclick='javascript:cargarInterfaz(\"$opc\",\"list\")'><i class='bi bi-arrow-left-square me-2'></i>Regresar</button>
                <h5 class='text-center mt-5'>". strtoupper($opc) ."</h5>";
                if ($consult1->num_rows > 0) {
                    echo "<div class='table-responsive my-2' style='height: 500px;'>
                            <table class='table table-striped-columns text-center rounded-pill'>
                                <tr>";
                                    while ($ren = $columnas2->fetch_array(MYSQLI_ASSOC)) {
                                        echo "<td class='table-dark'>$ren[Field]</td>";
                                    }
                                    echo "<td class='table-dark'>Actions</td>";
                                echo "</tr>";
                                while ($ren = $consult1->fetch_array(MYSQLI_ASSOC)) {
                                    echo "<tr>";
                                        foreach ($columns as $pos => $value){
                                            if ($pos == 0) {
                                                echo "<td style='cursor:pointer;' ondblclick='javascirpt:interfaceMod(\"$opc\", \"$ren[$value]\");'>$ren[$value]</td>";
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
                    echo"</table></div>"; 
                } elseif ($consult2->num_rows > 0) {
                    echo "<div class='table-responsive my-5' style='height: 500px;'>
                            <table class='table table-striped-columns my-5 text-center rounded-pill'>
                                <tr>";
                                    while ($ren = $columnas2->fetch_array(MYSQLI_ASSOC)) {
                                        echo "<td class='table-dark'>$ren[Field]</td>";
                                    }
                                    echo "<td class='table-dark'>Actions</td>";
                                echo "</tr>";
                                while ($ren = $consult2->fetch_array(MYSQLI_ASSOC)) {
                                    echo "<tr>";
                                        foreach ($columns as $pos => $value){
                                            if ($pos == 0) {
                                                echo "<td style='cursor:pointer;' ondblclick='javascirpt:interfaceMod(\"$opc\", \"$ren[$value]\");'>$ren[$value]</td>";
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
                    echo"</table></div>";
                } else{
                    echo "Error: Se desconoce esa columna";
                }
            } else {
                echo "Error: No existe la tabla";
            }
        break;

        default:
            echo "Error: No se seleccionaste ninguna opción";
            break;
    }

?>