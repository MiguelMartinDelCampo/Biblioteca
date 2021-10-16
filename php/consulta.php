<?php
 $conexion = new mysqli("localhost","root","","biblioteca");
 $consultaBusqueda = $_POST['valorBusqueda'];
 $categoria = $_POST['categoria'];

$caracteres_malos = array("<", ">", "\"", "'", "/", "<", ">", "'", "/");
$caracteres_buenos = array("& lt;", "& gt;", "& quot;", "& #x27;", "& #x2F;", "& #060;", "& #062;", "& #039;", "& #047;");
$consultaBusqueda = str_replace($caracteres_malos, $caracteres_buenos, $consultaBusqueda);
 
$mensaje = "";

if (isset($consultaBusqueda)) {

	$consulta = mysqli_query($conexion, "SELECT * FROM $categoria WHERE Codigo = $consultaBusqueda ");
    
    $filas = mysqli_num_rows($consulta);

	if ($filas === 0) {
		$mensaje = "<p>No hay ningún usuario con codigo</p>";	
	} 
	
	else {
        
		$resultados = mysqli_fetch_array($consulta);
            $Nombre = $resultados['Nombre'];

			$mensaje = $Nombre;
        
	};

};

echo $mensaje;

?>