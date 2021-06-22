<?php
include_once  '../data_access.class.php';
include_once  '../presentation.class.php';

View::start('Clínica  WebSalud',  '../');

View::end();
?>

<html lang="es">

<body>

    <?php header::print('../') ?>

    <div class="main">
        <h3>Especialidades:</h3>
        <table style="width:100%" id="especialidades">
            <tr>
                <th>Especialidad</th>
                <th>Descripción</th>
                <th>Número de especialistas</th>
            </tr>
            <tr>
                <td><a href="../especialidades/Odontología.php">
                        <h3>Odontología</h3>
                    </a></td>
                <td>Servicios dentales varios.</td>
                <td>5</td>
            </tr>
            <tr>
                <td><a href="../especialidades/Oftalmología.php">
                        <h3>Oftalmología</h3>
                    </a></td>
                <td>Revisiones y operaciones con Lasik.</td>
                <td>3</td>
            </tr>
            <tr>
                <td><a href="../especialidades/Fisioterapia.php">
                        <h3>Fisioterapia</h3>
                    </a></td>
                <td>Masajes, rehabilitación, propiocepción o preparación física.</td>
                <td>2</td>
            </tr>
            <tr>
                <td><a href="../especialidades/Estética.php">
                        <h3>Estética</h3>
                    </a></td>
                <td>Botox, peelings, implantes y redistribuciones de grasa.</td>
                <td>4</td>
            </tr>
            <tr>
                <td><a href="../especialidades/Urgencias.php">
                        <h3>Urgencias</h3>
                    </a></td>
                <td>Servicio de guardia 24h</td>
                <td>2</td>
            </tr>
        </table>
    </div>
    <?php footer::print(); ?>
</body>

</html>