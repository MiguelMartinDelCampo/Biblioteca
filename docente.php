<?php include "head.php" ?>

    <body data-cat="docentes" id="body">
    <?php include "header.php" ?>

        <article class="all">
            <section class="codigo">
                <section id="cod">
                    <h4 id="titulo">Ingresa tu código:</h4>
                    <input type="number" id="busqueda" name="busqueda" placeholder="Codigo..." autocomplete="off">
                </section>
                <section>
                    <h4 id="titulo">Nombre:</h4>
                    <h4 id="resultadoBusqueda"></h4>
                </section>
                <section>
                        <h4 id="titulo">Fecha / Hora</h4>
                        <h4 id="fecha"></h4>
                    </section>
            </section>
            <div class="seleccionables">
                <section>
                    <h4 id="titulo">Servicio</h4>
                    <select id="servicios">
                            <option value="Estudio">Sala de Estudio</option>
                            <option value="Computo">Sala de Cómputo</option>
                            <option value="Lectura">Sala de Lectura</option>
                            <option value="Catalogo">Catálogo Electrónico</option>
                    </select>
                </section>
                <section>
                    <h4 id="titulo">Prestamo</h4>
                    <select id="prestamo">
                            <option value="Ninguno" selected>Ninguno</option>
                            <option value="Calculadora">Calculadora</option>    
                            <option value="Cartografia">Cartografía</option>
                            <option value="Dvd">DVD</option>
                            <option value="Juego">Juego de mesa</option>
                            <option value="Laptop">Laptop</option>
                            <option value="Material">Material Didáctico</option>
                    </select>
                </section>

                <section>
                    <h4 id="titulo">Grupo</h4>
                    <select id="grupo" name='grupo'>
                        <option value="Solo docente" selected>Solo docente</option>
                        <option value="1-A">1-A</option>
                        <option value="1-B">1-B</option>
                        <option value="1-C">1-C</option>
                        <option value="1-D">1-D</option>
                        <option value="1-E">1-E</option>
                        <option value="2-A">2-A</option>
                        <option value="2-B">2-B</option>
                        <option value="2-C">2-C</option>
                        <option value="2-D">2-D</option>
                        <option value="2-E">2-E</option>
                        <option value="3-A">3-A</option>
                        <option value="3-B">3-B</option>
                        <option value="3-C">3-C</option>
                        <option value="3-D">3-D</option>
                        <option value="3-E">3-E</option>
                        <option value="4-A">4-A</option>
                        <option value="4-B">4-B</option>
                        <option value="4-C">4-C</option>
                        <option value="4-D">4-D</option>
                        <option value="4-E">4-E</option>
                        <option value="5-A">5-A</option>
                        <option value="5-B">5-B</option>
                        <option value="5-C">5-C</option>
                        <option value="5-D">5-D</option>
                        <option value="5-E">5-E</option>
                        <option value="6-A">6-A</option>
                        <option value="6-B">6-B</option>
                        <option value="6-C">6-C</option>
                        <option value="6-D">6-D</option>
                        <option value="6-E">6-E</option>
                    </select>
                </section>
                <section>
                    <h4 id="titulo">N° Alumnos</h4>
                    <input type="number" id="numero" name="numero" value="1" disabled="disabled">
                </section>

                <section>
                    <h4 id="titulo">Turno</h4>
                    <select id="turno">
                        <option value="Matutino">Matutino</option>
                        <option value="Vespertino">Vespertino</option>
                    </select>
                </section>
            </div>
        
            <h4 id="test"></h4>
            
            <button id="btnEnvio">Enviar Registro</button>
            <a href="index.php" class="back">Regresar</a>
    </body>

    <script type="text/javascript" src="js/docente.js"></script>
    <script src="js/jquery.min.js"></script>
</html>