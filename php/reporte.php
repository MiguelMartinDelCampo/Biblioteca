<?php
    require 'Classes/PHPExcel.php';
    include "conexion.php";
    $conexion = conexion();

    $fecha1 = $_POST['fecha1'];
    $fecha2 = $_POST['fecha2'];
    if(($fecha1 != null) && ($fecha2 != null)){
        if($fecha1 <= $fecha2){
        
            $sql = "SELECT id, Nombre, Codigo, Servicio, Prestamo, Grupo, Alumnos, Turno, Ingreso, Categoria, Fecha FROM registros where Fecha BETWEEN '$fecha1' AND '$fecha2' ORDER BY Ingreso";
            $res = $conexion->query($sql);

            $a = $fecha1."-".$fecha2;

            $fila = 2;

            $excel = new PHPExcel();

            $excel->setActiveSheetIndex(0);
            $excel->getActiveSheet()->setTitle("Reporte de Biblioteca");

            $excel->getActiveSheet()->setCellValue('A1','Codigo');
            $excel->getActiveSheet()->setCellValue('B1','Nombre');
            $excel->getActiveSheet()->setCellValue('C1','Servicio');
            $excel->getActiveSheet()->setCellValue('D1','Prestamo');
            $excel->getActiveSheet()->setCellValue('E1','Grupo');
            $excel->getActiveSheet()->setCellValue('F1','Alumnos');
            $excel->getActiveSheet()->setCellValue('G1','Turno');
            $excel->getActiveSheet()->setCellValue('H1','Ingreso');
            $excel->getActiveSheet()->setCellValue('I1','Categoria');

            while($row = $res->fetch_assoc()){
                $excel->getActiveSheet()->setCellValue('A'.$fila, $row['Codigo']);
                $excel->getActiveSheet()->setCellValue('B'.$fila, $row['Nombre']);
                $excel->getActiveSheet()->setCellValue('C'.$fila, $row['Servicio']);
                $excel->getActiveSheet()->setCellValue('D'.$fila, $row['Prestamo']);
                $excel->getActiveSheet()->setCellValue('E'.$fila, $row['Grupo']);
                $excel->getActiveSheet()->setCellValue('F'.$fila, $row['Alumnos']);
                $excel->getActiveSheet()->setCellValue('G'.$fila, $row['Turno']);
                $excel->getActiveSheet()->setCellValue('H'.$fila, $row['Ingreso']);
                $excel->getActiveSheet()->setCellValue('I'.$fila, $row['Categoria']);

                $fila++;
            }

            header("Content-Type:application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
            header('Content-Disposition: attachment; filename="Reporte Biblioteca.xlsx"');
            header('Cache-control: max-age=0');

            $objWriter = new PHPExcel_Writer_Excel2007($excel);
            $objWriter->save('php://output');
        }
        else{
            ?> 
            <script>
            alert("Error en el tiempo de fechas");
            location.href="../admin.php";
            </script>
            <?php
        }
    }
    else{
    ?> 
        <script>
            alert("fechas vacias");
            location.href="../admin.php";
        </script>
    <?php
    }
?>