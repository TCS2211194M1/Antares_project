<?php
require_once("connection.lib.php");

class Estado extends Connection {
    
    function __construct(){
        $this->open();
    }

    function add($request){
        $ejec = $this->execute("INSERT INTO c_estado VALUES(NULL, '$request[descripcion]', '$request[nombre_del_estado]', '$request[c_pais]', '$request[fiv]', '$request[ffv]', 
        '0', NOW(), '2309150001', NOW(), '2309150001')");
        return $ejec;
    }

    function list(){
        $ejec = $this->execute("SELECT * FROM c_estado WHERE ENTRY_STATUS='0'");
        return $ejec;
    }

    function consult($id){
        $ejec = $this->execute("SELECT * FROM c_estado WHERE C_ESTADO = $id AND ENTRY_STATUS='0'");
        return $ejec;
    }

    function mod($request){
        $ejec = $this->execute("UPDATE c_estado SET DESCRIPCION='$request[descripcion]', NOMBRE_DEL_ESTADO='$request[nombreEstado]', C_PAIS='$request[pais]',
        FECHA_INICIO_DE_VIGENCIA='$request[fiv]', FECHA_FIN_DE_VIGENCIA='$request[ffv]', UPDATE_DATE=NOW() WHERE C_ESTADO = '$request[c_estado]'");
        return $ejec;
    }

    function delete($request){
        $ejec = $this->execute("UPDATE c_estado SET ENTRY_STATUS='1', UPDATE_DATE=NOW() WHERE C_ESTADO = '$request[id]'");
        return $ejec;
    }

}

?>