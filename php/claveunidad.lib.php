<?php
require_once("connection.lib.php");

class ClaveUnidad extends Connection {
    
    function __construct(){
        $this->open();
    }

    function add($request){
        $ejec = $this->execute("INSERT INTO c_claveunidad VALUES(NULL, '$request[short_description]', '$request[long_description]', '$request[descripcion]', '$request[nota]', 
        '$request[fiv]', '$request[ffv]', '$request[simbolo]', '0', NOW(), '2309150001', NOW(), '2309150001')");
        return $ejec;
    }

    function consult($id){
        $ejec = $this->execute("SELECT * FROM c_claveunidad WHERE C_CLAVEUNIDAD = $id AND ENTRY_STATUS='0'");
        return $ejec;
    }

    function mod($request)
    {
        $ejec = $this->execute("UPDATE c_claveunidad SET SHORT_DESCRIPTION='$request[short_description]', LONG_DESCRIPTION='$request[long_description]', 
        DESCRIPCION='$request[descripcion]', NOTA='$request[nota]', SIMBOLO='$request[simbolo]', FECHA_DE_INICIO_DE_VIGENCIA='$request[fiv]', FECHA_DE_FIN_DE_VIGENCIA='$request[ffv]', 
        UPDATE_DATE=NOW() WHERE C_CLAVEUNIDAD = '$request[c_claveunidad]'");
        return $ejec;
    }

    function delete($request){
        $ejec = $this->execute("UPDATE c_claveunidad SET ENTRY_STATUS='1', UPDATE_DATE=NOW() WHERE C_CLAVEUNIDAD = '$request[id]'");
        return $ejec;
    }
    
}

?>