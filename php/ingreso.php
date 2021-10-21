<?php
  include "conexion.php";
  $conexion = conexion();

  $datos = $_POST['datosingreso'];
  $datos = json_decode($datos, true);

  $nombre = $datos["name"];
  $codigo = $datos["codigo"];
  $servicio = $datos["servicio"];
  $prestamo = $datos["prestamo"];
  $grupo = $datos["grupo"];
  $numero = $datos["numero"];
  $turno = $datos["turno"];
  $ingreso = $datos["fullfecha"];
  $categoria = $datos["categoria"];
  $fecha = $datos["fecha"];

  $sql = "INSERT INTO registros (Nombre, Codigo, Servicio, Prestamo, Grupo, Alumnos, Turno, Ingreso, Categoria, Fecha) VALUES ('$nombre','$codigo','$servicio', '$prestamo','$grupo', '$numero','$turno','$ingreso','$categoria','$fecha')";
  $conexion->query($sql);

  echo true;
?>