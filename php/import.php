<?php
$con = new mysqli("localhost", "root", "", "biblioteca");
$cod = $_POST['codigo'];
if (isset($cod)) {
    $consulta = mysqli_query($con, "SELECT * FROM registros WHERE Codigo = $cod");
    $filas = mysqli_num_rows($consulta);
    if ($filas === 0) {
        $mensaje = "<p>No hay ningún usuario con ese nombre y/o apellido</p>";
    } else {
        while ($dat=mysqli_fetch_assoc($consulta)) {
            $array[]= $dat;
        }
        echo json_encode($array);
    }
}
?>