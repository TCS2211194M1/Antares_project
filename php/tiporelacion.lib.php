<?php
require_once("connection.lib.php");

class TipoRelacion extends Connection {
    
    function __construct(){
        $this->open();
    }

    function add($request){
        $ejec = $this->execute("INSERT INTO c_tiporelacion VALUES(NULL, '$request[descripcion]', '$request[fiv]', '$request[ffv]', '0', NOW(), '2309150001', NOW(), '2309150001')");
        return $ejec;
    }

    function consult($id){
        $ejec = $this->execute("SELECT * FROM c_tiporelacion WHERE C_TIPORELACION = $id AND ENTRY_STATUS='0'");
        return $ejec;
    }

    function mod($request)
    {
        $ejec = $this->execute("UPDATE c_tiporelacion SET DESCRIPCION='$request[descripcion]', FECHA_INICIO_DE_VIGENCIA='$request[fiv]', FECHA_FIN_DE_VIGENCIA='$request[ffv]', 
        UPDATE_DATE=NOW() WHERE C_TIPORELACION = '$request[c_tiporelacion]'");
        return $ejec;
    }

    function delete($request){
        $ejec = $this->execute("UPDATE c_tiporelacion SET ENTRY_STATUS='1', UPDATE_DATE=NOW() WHERE C_TIPORELACION = '$request[id]'");
        return $ejec;
    }
    
}

?>