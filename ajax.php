<?php
    require_once("php/connection.lib.php");
    require_once("php/functions.php");

    Class Ajax extends Connection{

        function __construct(){
            $this->open();
        }

        function consultEstado($id){
            $ejec = $this->execute("SELECT * FROM c_estado WHERE C_PAIS = '$id' AND ENTRY_STATUS='0'");
            return $ejec;
        }

        function consultMunicipio($id){
            $ejec = $this->execute("SELECT * FROM c_municipio WHERE C_ESTADO = '$id' AND ENTRY_STATUS='0'");
            return $ejec;
        }

        function consultLocalidad($id){
            $ejec = $this->execute("SELECT * FROM c_localidad WHERE C_ESTADO = '$id' AND ENTRY_STATUS='0'");
            return $ejec;
        }

        //Consulta para filtrar al mostrar la lista de estados
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
            echo "<select class='form-select' id='C_ESTADO' onchange='javascript:ajax(\"municipio\");'>
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
            echo "<select class='form-select' id='C_MUNICIPIO' onchange='javascript:ajax(\"localidad\");'>
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
            echo "<select class='form-select' id='C_LOCALIDAD' onchange='javascript:ajax(\"codigopostal\");'>
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

        default:
            echo "Error: No se seleccionaste ninguna opción";
            break;
    }

?>