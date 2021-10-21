<?php
    function conexion(){
        $con = new mysqli("localhost", "root", "", "biblioteca");
        return $con;
    }
?>