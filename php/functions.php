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

    //Read file
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

    function descTable($table){
        $ejec = $this->execute("DESC " . $table);
        return $ejec;
    }

    function list($table){
        $ejec = $this->execute("SELECT * FROM " . $table ." WHERE ENTRY_STATUS='0'");
        return $ejec;
    }

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
        <div class='mb-3 '>
            <input type='text' class='form-control w-25 me-3 shadow-lg d-inline' placeholder='Buscar por'/>
            <button class='btn btn-sm btn-primary rounded-pill d-inline' onclick='javascript:prueba(\"Hola\");'><i class='bi bi-search'></i></button>
        </div>
        <div id='form'></div>
        <table class='table table-striped-columnsk text-center shadow-lg'>
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
                        <button class='btn btn-info' id='".$ren[$columns[0]]."' onclick='javascript:prueba(\"$opc\", ".$ren[$columns[0]].");'><i class='bi bi-pencil-square'></i></button>
                        <button class='btn btn-danger' id='".$ren[$columns[0]]."' onclick='javascript:delete_row(\"$opc\", ". $ren[$columns[0]] .");'><i class='bi bi-trash'></i></button>
                    </td>
                </tr>";
            }
        echo "</table>";  
    }

    //No jala
    function createForm($table, $id){
        $login = new Login();
        $encabezado = $this->descTable($table);
        $columns = array();
        $cont = 0;
        $consult = $login->consult($id);

        if ($consult->num_rows > 0) {
            echo "<form id='form-add-$table' class='my-5'>";
            while ($ren = $encabezado->fetch_array(MYSQLI_ASSOC)) {
                echo "<div class='row mb-4'>
                    <div class='col-lg-5 col-sm-12 text-center'>
                        <h5>$ren[Field]</h5>
                    </div>
                    <div class='col-lg-5 col-sm-12'>
                        <input type='text' id='$ren[Field]' class='form-control' value='$id'/>
                    </div>
                </div>";
            }
            echo "<div class='text-center mt-5'>
                <button class='btn bg-success bg-gradient text-white rounded-pill w-25 p-2 m-3' onclick='javascript:prueba(\"$table\", \"$id\");'>Add</button>
                <button class='btn bg-danger bg-gradient text-white rounded-pill w-25 p-2 m-3' onclick='javascript:cargarInterfaz(\"login\", \"list\", \"null\");'>Return</button>
            </div></form>";
        } else {
            echo "ocurrió un error";
        }
    }

}