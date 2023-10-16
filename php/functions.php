<?php

spl_autoload_register(function ($class) {
    require_once($class . ".lib.php");
});

class Functions extends Connection
{
    function __construct()
    {
        $this->open();
    }

    //Leé un archivo con cierta nomemclatura
    function readFile($file){
        $url = "../db/";
        $file = $url.$file;
        $arch = fopen($file, "r");
        $enc = null;
        $tamanoEnc = 0;

        $contenido = array();
        $cont = 0;

        if($arch){
            $contenido = array();
            $atributos = array();
            while(!feof($arch)){
                if ($cont == 0) {
                    $cont ++;
                    $enc = explode(" ", fgets($arch));
                    $enc = $enc[2];           
                } else{
                    $contenido[$cont] = explode(" ", fgets($arch));
                    if ($contenido[$cont][0]!=')' & $contenido[$cont][0] != 'PRIMARY' & $contenido[$cont][0] != '') {    
                        $atributos[$cont] = $contenido[$cont][0];
                    }
                    $cont++;
                }
            }
            return $atributos;
        } else{
            return array("Error" => "No se encuentra el file");
        }
    }

    //Función para saber la estrctura de cualquier tabla
    function descTable($table){
        $ejec = $this->execute("DESC " . $table);
        return $ejec;
    }

    //Función para consultar los datos de cualquier tabla
    function list($table){
        $ejec = $this->execute("SELECT * FROM " . $table ." WHERE ENTRY_STATUS='0'");
        return $ejec;
    }

    //Función para crear una tabla y mostrar todos los registros de una tabla cualquiera
    function createTable($opc, $table){
        $encabezado = $this->descTable($table);
        $columns = array();
        $cont = 0;
        $consult = $this->list($table);
        $opc = substr($table, 2);

        echo "<h3 class='text-center mb-3'>". strtoupper($table)."</h3>
        <div class='text-end'>
            <button class='btn btn-sm btn-success rounded-pill d-inline text-end' onclick='javascript:cargarInterfaz(\"$opc\", \"add\", \"null\");'><i class='bi bi-plus-circle'></i> Add new $opc</button>
        </div>
        <div class='mb-3'>
            <input type='text' class='form-control me-3 shadow-lg d-inline w-50' placeholder='Buscar por id, descripción, fecha de creación'/>
            <button class='btn btn-sm btn-primary rounded-pill d-inline' onclick='javascript:prueba(\"Hola\");'><i class='bi bi-search'></i></button>
        </div>";

        //Div del formulairo para modificar datos
        echo "<div id='form'></div>
        
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
                            <button class='btn btn-info my-2' id='".$ren[$columns[0]]."' onclick='javascript:interfaceMod(\"$opc\", ".$ren[$columns[0]].");'><i class='bi bi-pencil-square'></i></button>
                            <button class='btn btn-danger' id='".$ren[$columns[0]]."' onclick='javascript:delete_row(\"$opc\", ". $ren[$columns[0]] .");'><i class='bi bi-trash'></i></button>
                        </td>
                    </tr>";
                }
            echo "</table>
        </div>";
    }

    //Función para generar un formulario para modificar los datos de los registros de una tabla cualquiera
    function createForm($table, $id){
        $opc = substr($table, 2);
        $claseTable = mb_convert_case($opc, MB_CASE_TITLE, "UTF-8");
        $clase = new $claseTable();
        $encabezado = $this->descTable($table);
        $columns = array();
        $cont = 0;
        $consult = $clase->consult($id);
        

        if ($consult->num_rows > 0) {
            $row = $consult->fetch_array(MYSQLI_ASSOC);
            echo "<center><div class='p-1 mb-5 w-50 border border-4 rounded'><form id='form-mod-$opc' class='my-5'>";
            while ($ren = $encabezado->fetch_array(MYSQLI_ASSOC)) {
                echo "<div class='row mb-4'>
                    <div class='col-lg-5 col-sm-12 text-center'>
                        <h5>$ren[Field]</h5>
                    </div>
                    <div class='col-lg-5 col-sm-12'>
                        <input type='text' id='$ren[Field]' class='form-control' value='".$row[$ren['Field']]."'/>
                    </div>
                </div>";
            }
            echo "
            <div class='text-center mt-5'>
                <button class='btn bg-success bg-gradient text-white rounded-pill w-25 p-2 m-3' onclick='javascript:mod(\"$opc\");'>Modify <i class='bi bi-arrow-up-square me-2'></i></button>
                <button class='btn bg-danger bg-gradient text-white rounded-pill w-25 p-2 m-3' onclick='javascript:cargarInterfaz(\"$opc\", \"list\", \"null\");'>Cancel <i class='bi bi-x-square me-2'></i></button>
            </div></form></div></center>";
        } else {
            echo "ocurrió un error";
        }
    }

    //Función para consultar un registro de cualquier tabla
    function consultRow($table, $id){

    }

}