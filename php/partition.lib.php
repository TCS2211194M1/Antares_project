<?php
require_once("connection.lib.php");

class Storage extends Connection {
    
    function __construct(){
        $this->open();
    }

    function add($request){
        $ejec = $this->execute("INSERT INTO t_storage VALUES('99', '$request[short_description]', '$request[device_name]', '$request[intance_attachment]', '$request[volumen_size]',
        '$request[volumen_type]', '$request[iops]', '$request[encrypted]', '$request[delete_on_termination]', '$request[instance]', '0', NOW(), '2309150001', NOW(), '2309150001')");
        return $ejec;
    }

    function consult($id){
        $ejec = $this->execute("SELECT * FROM t_storage WHERE T_STORAGE = $id AND ENTRY_STATUS='0'");
        return $ejec;
    }

    function mod($request)
    {
        $ejec = $this->execute("UPDATE t_storage SET SHORT_DESCRIPTION='$request[short_description]', DEVICE_NAME='$request[device_name]', 
        INTANCE_ATTACHMENT_POINT='$request[intance_attachment]', VOLUME_SIZE='$request[volume_size]', VOLUME_TYPE='$request[volume_type]', IOPS='$request[iops]', 
        ENCRYPTED='$request[encrypted]', DELETE_ON_TERMINATION='$request[delete_on_termination]', INSTANCE='$request[instance]', ENTRY_STATUS='0', UPDATE_DATE=NOW()
        WHERE T_STORAGE = '$request[t_storage]'");
        return $ejec;
    }

    function delete($request){
        $ejec = $this->execute("UPDATE t_storage SET ENTRY_STATUS='1', UPDATE_DATE=NOW() WHERE T_STORAGE = '$request[id]'");
        return $ejec;
    }
}

?>