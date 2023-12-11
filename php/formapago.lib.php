<?php
require_once("connection.lib.php");

class FormaPago extends Connection {
    
    function __construct(){
        $this->open();
    }

    function add($request){
        $ejec = $this->execute("INSERT INTO c_formapago VALUES(NULL, '$request[descripcion]', '$request[bancarizado]', '$request[numerooperacion]',
        '$request[rfco]', '$request[cuentaordenante]', '$request[rfcb]', '$request[cuentabeneficiario]', '$request[tipocadena]', '$request[bancoemisor]',
        '$request[fiv]', '$request[ffv]', '0', NOW(), '2309150001', NOW(), '2309150001')");
        return $ejec;
    }

    function consult($id){
        $ejec = $this->execute("SELECT * FROM c_formapago WHERE C_FORMAPAGO = $id AND ENTRY_STATUS='0'");
        return $ejec;
    }

    function mod($request)
    {
        $ejec = $this->execute("UPDATE c_formapago SET DESCRIPCION='$request[descripcion]', BANCARIZADO='$request[bancarizado]', NUMERO_DE_OPERACION='$request[numerooperacion]',
        RFC_DEL_EMISOR_DE_LA_CUENTA_ORDENANTE='$request[rfco]', CUENTA_ORDENANTE='$request[cuentaordenante]', RFC_DEL_EMISOR_CUENTA_DE_BENEFICIARIO='$request[rfcb]', 
        CUENTA_DE_BENENFICIARIO='$request[cuentabeneficiario]', TIPO_CADENA_PAGO='$request[tipocadena]', BANCO_EMISOR_CUENTA_ORDENANTE_EXT='$request[bancoemisor]',
        FECHA_INICIO_DE_VIGENCIA='$request[fiv]', FECHA_FIN_DE_VIGENCIA='$request[ffv]', UPDATE_DATE=NOW() WHERE C_FORMAPAGO = '$request[c_formapago]'");
        return $ejec;
    }

    function delete($request){
        $ejec = $this->execute("UPDATE c_formapago SET ENTRY_STATUS='1', UPDATE_DATE=NOW() WHERE C_FORMAPAGO = '$request[id]'");
        return $ejec;
    }
}

?>