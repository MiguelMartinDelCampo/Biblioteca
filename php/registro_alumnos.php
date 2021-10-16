 <?php 
    require 'Classes/PHPExcel/IOFactory.php';
    $conexion = new mysqli("localhost","root","","biblioteca");

    $name = $_FILES['archivo']['name'];
    $tmp_name = $_FILES['archivo']['tmp_name'];
    $ruta = 'files/'.$name;
    $res = @move_uploaded_file($tmp_name, $ruta);
	   
    if($res == true){
        $excel = PHPExcel_IOFactory::load($ruta);
        $excel->setActiveSheetIndex(0);
        $numRows = $excel->setActiveSheetIndex(0)->getHighestRow();

        for($i = 1; $i <= $numRows; $i++){
            $codigo = $excel->getActiveSheet()->getCell('A'.$i)->getCalculatedValue();
            $nombre = $excel->getActiveSheet()->getCell('B'.$i)->getCalculatedValue();

            $sql = "INSERT INTO alumnos (Nombre, Codigo) VALUES ('$nombre','$codigo')";
            $result = $conexion->query($sql);;
        }
        header('Location: ../admin.php');
    }else{
        ?>
       <script>
            alert("No se subio el archivo");
            location.href="../admin.php";
       </script>
       <?php 
    }
 
?>