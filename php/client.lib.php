<?php
require_once("connection.lib.php");

class Client extends Connection
{

    function __construct()
    {
        $this->open();
    }

    function add($request)
    {
        // Obtener el año y el mes actual
        $year = date("y");
        $month = date("m");
    
        // Generar el valor para el campo
        $value = $year . $month . "151" . "001"; // Año + Mes + Código de país + Números incrementales
        
    
        $ejec = $this->execute("INSERT INTO t_client VALUES(7, '$request[username]', '$request[login_name]', '$request[login_last_name]', '$request[email]', '$request[password]',
            '$request[cellphone]', '$request[phone]', '$value', '$request[t_taxid]', '$request[t_workorder]', '0', NOW(), '2309150001', NOW(), '2309150001')");
        return $ejec;
    }
    
    function consult($id){
        $ejec = $this->execute("SELECT * FROM t_client WHERE T_CLIENT = $id AND ENTRY_STATUS='0'");
        return $ejec;
    }

    // SE CAMBIO USERNAME = LOGIN_NAME 
    function mod($request)
    {


        $ejec = $this->execute("UPDATE t_client SET USERNAME='$request[username]', LOGIN_NAME='$request[login_name]', LOGIN_LAST_NAME='$request[login_last_name]',
        EMAIL='$request[email]', PASSWORD='$request[password]', CELLPHONE='$request[cellphone]', PHONE='$request[phone]', T_LOGIN='$request[t_login]', T_TAXID='$request[t_taxid]', 
        T_WORKORDER='$request[t_workorder]', UPDATE_DATE=NOW() WHERE T_CLIENT='$request[t_client]'");
        return $ejec;
    }

    function delete($request)
    {
        $ejec = $this->execute("UPDATE t_client SET ENTRY_STATUS='1', UPDATE_DATE=NOW() WHERE T_CLIENT = '$request[id]'");
        return $ejec;
    }

    // SE CAMBIO USERNAME = LOGIN_NAME Y SE MODIFICO EL ORDEN DE LOS REQUEST
    function addClient($request)
    {
        // Obtener el año y el mes actuales en formato de dos dígitos
        $yearMonth = date('ym');
    
        // Obtener el último valor incremental utilizado para T_LOGIN
        $incremental = $this->getIncremental();
    
        // Generar el valor para T_LOGIN combinando el año, el mes, el código de país y el valor incremental
        $t_login_value = $yearMonth . '151' . sprintf('%03d', $incremental); 
    
        // Obtener el país seleccionado del formulario
        $country = $request["t_pais"];
        $username = $request["username"];
    
        // Verificar si el nombre de usuario ya existe
        $ejec = $this->execute("SELECT * FROM t_client WHERE LOGIN_NAME = '$request[username]'");
        if ($ejec && $ejec->num_rows > 0) {
            return 0; // Nombre de usuario duplicado
        } else {
            // Insertar el nuevo registro en la tabla t_client, incluyendo el país
            $ejec = $this->execute("INSERT INTO t_client VALUES (NULL, '$request[username]', '$request[name]', '$request[last_name]', '$request[email]', '$request[cellphone]', '$request[cellphone]',
                '$t_login_value', 'XAXX010101000', '0', '0', NOW(), '2309150001', NOW(), '2309150001', '$request[password]', '$country', '$username' )");
    
            // Aplicar el método updateShortDescription después de agregar el usuario
            $this->updateShortDescription();
    
            return $ejec;
        }
    }
    
    function getIncremental() {
        $result = $this->execute("SELECT MAX(SUBSTRING(T_LOGIN, 11, 3)) AS max_incremental FROM t_client WHERE SUBSTRING(T_LOGIN, 1, 4) = DATE_FORMAT(NOW(), '%y%m')");
        $max_incremental = 0;
        if ($result && $result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $max_incremental = intval($row['max_incremental']);
        }
        $incremental = $max_incremental + 3;
        return $incremental;
    }
    
    function modUser($request)
    {
        $ejec = $this->execute("UPDATE t_client SET LOGIN_NAME='$request[name]', LOGIN_LAST_NAME='$request[last_name]',
        EMAIL='$request[email]', PASSWORD='$request[password]', CELLPHONE='$request[cellphone]', UPDATE_DATE=NOW() WHERE T_CLIENT='$request[t_client]'");
        return $ejec;
    }

    function updateShortDescription()
    {
        // Desactivar el modo seguro de actualización
        $this->execute("SET SQL_SAFE_UPDATES = 0");
    
        // Ejecutar la actualización de la columna SHORT_DESCRIPTION
        $this->execute("UPDATE t_client 
                        SET SHORT_DESCRIPTION = 
                         CASE
                            WHEN LOGIN_LAST_NAME LIKE 'DE LA %' THEN CONCAT(SUBSTRING_INDEX(LOGIN_NAME, ' ', 1), '.DELA', SUBSTRING_INDEX(SUBSTRING_INDEX(LOGIN_LAST_NAME, ' ', 3), ' ', -1))
                            WHEN LOGIN_LAST_NAME LIKE 'DE %' THEN CONCAT(SUBSTRING_INDEX(LOGIN_NAME, ' ', 1), '.DE', SUBSTRING_INDEX(SUBSTRING_INDEX(LOGIN_LAST_NAME, ' ', 3), ' ', -1))
                            ELSE CONCAT(SUBSTRING_INDEX(LOGIN_NAME, ' ', 1), '.', SUBSTRING_INDEX(SUBSTRING_INDEX(LOGIN_LAST_NAME, ' ', 3), ' ', -1))
                        END");
    
        // Restaurar el modo seguro de actualización
        $this->execute("SET SQL_SAFE_UPDATES = 1");
    }

    //Consultas para los campos que requieren de otras tablas
    function login(){
        $ejec = $this->execute("SELECT * FROM t_login WHERE ENTRY_STATUS='0'");
        return $ejec;
    }

    function taxid(){
        $ejec = $this->execute("SELECT * FROM t_taxid WHERE ENTRY_STATUS='0'");
        return $ejec;
    }

    function workorder(){
        $ejec = $this->execute("SELECT * FROM t_workorder WHERE ENTRY_STATUS='0'");
        return $ejec;
    }

}
?>