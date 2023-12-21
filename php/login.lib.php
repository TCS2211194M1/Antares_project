<?php
require_once("connection.lib.php");

class Login extends Connection {
    
    function __construct(){
        $this->open();
    }

    function add($request){
        $consult = $this->execute("SELECT MAX(T_LOGIN) as id FROM T_LOGIN");
        $ren = $consult->fetch_array(MYSQLI_ASSOC);
        $ren['id'] = $ren['id']+1;
        $ejec = $this->execute("INSERT INTO t_login VALUES('$ren[id]', '$request[login_role]', '0', NOW(), '2309150001', NOW(), '2309150001')");
        return $ejec;
    }

    function consult($id){
        $ejec = $this->execute("SELECT * FROM t_login WHERE T_LOGIN = $id AND ENTRY_STATUS='0'");
        return $ejec;
    }

    function mod($request)
    {
        $ejec = $this->execute("UPDATE t_login SET LOGIN_ROLE='$request[login_role]', UPDATE_DATE=NOW() WHERE T_LOGIN = '$request[t_login]'");
        return $ejec;
    }

    function delete($request){
        $ejec = $this->execute("UPDATE t_login SET ENTRY_STATUS='1', UPDATE_DATE=NOW() WHERE T_LOGIN = '$request[id]'");
        return $ejec;
    }

    function login($request){
        $ejec = $this->execute("SELECT * FROM t_client WHERE USERNAME='$request[username]' AND PASSWORD='$request[password]' AND ENTRY_STATUS='0'");
        if ($ejec->num_rows > 0) {
            $ren = $ejec->fetch_array(MYSQLI_ASSOC);
            if ($ren["T_LOGIN"] == '2309150001') {
                return 1;
            } else{
                return 2;
            }
        } else{
            return "Error, el usuario o la contraseña no son correctos";
        }
    }

    //Consultas para los campos que requieren de otras tablas
    function roles(){
        $ejec = $this->execute("SELECT * FROM t_role WHERE ENTRY_STATUS='0'");
        return $ejec;
    }
}

?>