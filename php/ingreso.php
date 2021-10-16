<?php
  $conexion = new mysqli("localhost","root","","biblioteca");

  $datos = $_POST['datosingreso'];

  $nombre = $datos[0];
  $ingreso = $datos[1];
  $codigo = $datos[2];
  $servicio = $datos[3];
  $prest = $datos[4];
  $grupo = $datos[5];
  $numero = $datos[6];
  $turno = $datos[7];
  $categoria = $datos[8];
  $fecha = $datos[9];

  $sql = "INSERT INTO registros (Nombre, Codigo, Servicio, Prestamo, Grupo, Alumnos, Turno, Ingreso, Categoria, Fecha) VALUES ('$nombre','$codigo','$servicio', '$prest','$grupo', '$numero','$turno','$ingreso','$categoria','$fecha')";
  $conexion->query($sql);
?>