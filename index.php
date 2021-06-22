<!DOCTYPE html>

<?php
include_once 'data_access.class.php';
include_once 'presentation.class.php';

View::start('Clínica WebSalud', '');

$query = '
    SELECT * FROM especialistas
      JOIN usuarios
        ON especialistas.idespecialista = usuarios.id;
    ';
$res = DB::execute_sql($query);
$res->setFetchMode(PDO::FETCH_NAMED); // Establecemos que queremos cada fila como array asociativo

$datos = $res->fetchAll(); // Leo todos los datos de una vez

View::end();
?>

<html lang="es">

<body>
    <div class="header">
        <div class="titulo">
            <div>
                <h1>Clínica <span class="titlecolor">WebSalud</span></h1>
            </div>
            <img src="img/equipo.jpg" alt="Nuestro equipo" id="equipo">
        </div>

        <div class="medio">
            <div class="medioSub1">
                <h2>Donde sí importas</h2>
            </div>
            <div class="medioSub2"><?php
                                    if (isset($_SESSION['user'])) {
                                        echo "<a href='login/logout.php' class='login'> <h4>Log out</h4></a>";
                                        echo "<a href='panelUsuario/panelUsuario.php' class='panelUsuario'> <h4>Panel personal</h4></a>";
                                    } else {
                                        echo "<a href='login/login.php' class='login'> <h4>Login</h4></a>";
                                    }
                                    ?>
            </div>
        </div>
    </div>

    <div class="main">
        <div id="descripcion">
            <p class="margin">En la clínica WebSalud te ofrecemos una clínica joven con un gran
                cuadro profesional, las más modernas técnicas de diagnóstico y una
                gestión y seguimientos de tratamientos apoyados en las tecnologías de
                la información. La clínica está situada en Las Palmas de Gran Canaria
                ofreciendo sus servicios a los habitantes de las islas.</p>


            <div class="interaccion">
                <div id="telefono">
                    <img src="img/telefono.png" alt="Contacto">
                    <a href="paginas/contacto.php">
                        <h3>Contacto</h3>
                    </a>
                </div>
                <div id="cita">
                    <img src="img/cita.png" alt="Cita">
                    <a href="paginas/cita.php">
                        <h3>Pedir cita</h3>
                    </a>
                </div>
                <div id="especialidades">
                    <img src="img/lupa.png" alt="Especialidades">
                    <a href="paginas/especialidades.php">
                        <h3>Especialidades clínicas</h3>
                    </a>
                </div>
            </div>


            <div id="ventajas">
                <div id="ventajas2">
                    <p class="margin">Ventajas si nos eliges.</p>
                    <ul>
                        <li>Rapidez: aquí ofrecemos la atención más pronta de la isla.</li>
                        <li>Profesionalidad: sabemos lo que hacemos y nuestro fuerte código ético lo refuerza.</li>
                        <li>Cercanía: tenemos la clínica ubicada de forma que sea accesible a la mayoría de la población.</li>
                        <li>Flexibilidad horaria: ofrecemos servicios 24 horas especiales y nos adaptamos a tu disponibilidad.</li>
                        <li>Libre de decepciones: la primera cita es gratis, asi que si no te gusta no pagas nada.</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <?php footer::print() ?>
</body>

</html>