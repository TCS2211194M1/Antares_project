<?php

class Connection
{
    private $con;

    function open()
    {
        $this->con = new mysqli("localhost", "root", "root", "antares_project");
        if (mysqli_connect_errno()) {
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
