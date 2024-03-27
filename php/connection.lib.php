<?php   

class Connection
{
    protected $con;

    function open()
    {
        $this->con = new mysqli("localhost", "root", "", "antares");
        if (mysqli_connect_errno()) {
            echo "Ocurrió un error al intentar conectarse a la base de datos";
            exit();
        }
    }

    function execute($query)
    {
        $conne = $this->con;
        $res = $conne->query($query);
        return $res;
    }


}
