<?php
    session_start();

    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {} 
    else {
        echo "Inicia Sesion para acceder a este contenido.<br>";
        header('Location: login.html');
        exit;
    }
 ?>

<!DOCTYPE html5>
<html>
    <head>
        <title>Administrador</title>
        <link rel="StyleSheet" href="css/administrador.css">
        <link rel="StyleSheet" href="css/headerRegistro.css">
        <link rel="shortcut icon" href="img/favicon.ico">
        <meta charset="UTF-8">
        <link href="https://fonts.googleapis.com/css?family=Rubik&display=swap" rel="stylesheet">
    </head>

    <body>

        <header>
        <div class="log">
                <a href="index.html" id="backmain"><img src="img/favicon.png" id="logo"></a>
                <h4>Administracion</h4>
            </div>
            <a href=php/logout.php id="admin">Cerrar Sesion</a> 
        </header>

        <div class="all">

            <div class="reportes">
                <h2>Duración del reporte</h2>
                <form method="POST" action="php/reporte.php" >
                    <input type="date"  name="fecha1" id="date1">
                    <input type="date" name="fecha2" id="date2">
                    <input type="submit" class="gen" value="Generar Reporte">
                </form>
            </div>

            <div class="habilitar">
                <h2>Alta de alumnos</h2>
                <form method="POST" action="php/registro_alumnos.php" enctype="multipart/form-data" class="hab">
                    <input type="file" accept=".xlsx" name="archivo" class="archivo">
                    <input type="submit" name="subir" class="subir">
                </form>

                <h2>Alta de docentes</h2>
                <form method="POST" action="php/registro_docentes.php" enctype="multipart/form-data" class="hab">
                    <input type="file" accept=".xlsx" name="archivo" class="archivo">
                    <input type="submit" name="subir2" class="subir2">
                </form>
            </div>

            <div class="busqueda" id="busqueda">
                <h2>Buscar alumno o docente</h2>
                <input type="number" id="codigo" placeholder="Codigo"> 
                <button class="button2" id="btnBusqueda">Buscar</button>
                <div> 
                <table class="table">
                    <thead>
                    <th>Nombre</th>
                    <th>Codigo</th>
                    <th>Servicio</th>
                    <th>Prestamo</th>
                    <th>Grupo</th>
                    <th>Personas</th>
                    <th>Turno</th>
                    <th>Ingreso</th>
                    <th>Categoria</th>
                </thead>
                <tbody id="tbody">

                </tbody>
                </table>
              </div> 
        </div>
    </body>

    <script type="text/javascript" src="js/admin.js"></script>
    <script type="text/javascript" src="js/jquery.min.js"></script>
</html>