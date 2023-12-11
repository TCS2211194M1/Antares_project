<?php
require_once("connection.lib.php");

class Partition extends Connection {
    
    function __construct(){
        $this->open();
    }

    function add($request){
        $ejec = $this->execute("INSERT INTO t_partition VALUES(NULL, '$request[short_description]', '$request[device_name]', '$request[attachment_point]', '$request[partition_size]',
        '0', NOW(), '2309150001', NOW(), '2309150001')");
        return $ejec;
    }

    function consult($id){
        $ejec = $this->execute("SELECT * FROM t_partition WHERE T_PARTITION = $id AND ENTRY_STATUS='0'");
        return $ejec;
    }

    function mod($request)
    {
        $ejec = $this->execute("UPDATE t_partition SET SHORT_DESCRIPTION='$request[short_description]', DEVICE_NAME='$request[device_name]',
        ATTACHMENT_POINT='$request[attachment_point]', PARTITION_SIZE='$request[partition_size]', UPDATE_DATE=NOW() WHERE T_PARTITION = '$request[t_partition]'");
        return $ejec;
    }

    function delete($request){
        $ejec = $this->execute("UPDATE t_partition SET ENTRY_STATUS='1', UPDATE_DATE=NOW() WHERE T_PARTITION = '$request[id]'");
        return $ejec;
    }
}

?>