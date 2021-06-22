<?php
include_once '../data_access.class.php';
include_once '../presentation.class.php';

View::start('Clínica WebSalud', '../');

View::end();
?>

<html lang="es">

<body>
    <?php header::print('../') ?>
    <div class="main">
        <h3>Fisioterapia:</h3>
        <div class="descripcion">
            <div class="card">
                <ul>
                    <li>Descripción:
                        <p>Servicio de fisioterapia formal. Evitamos la pseudociencia
                            al máximo. Rehabilitaciones, ejercicios de recuperacion de la
                            forma física, preparacion física, usode las nuevas técnicas a
                            nivel mundial y masajes.</p>
                    </li>
                </ul>
                <img src="../img/fisioterapia.jpg" alt="Fisioterapia" class="visual">
            </div>
            <div class="card">
                <ul>
                    <li>Localización:
                        <ul>
                            <li>Planta 1, sector 2</li>
                        </ul>
                    </li>
                </ul>
                <img src="../img/fisioterapia2.jpg" alt="Fisioterapia" class="visual">
            </div>
            <div class="card">
                <ul>
                    <li>Responsables:
                        <ul>
                            <li>Agustín Hernández Hernández</li>
                            <li>Sergei Voroshilov Santana</li>
                        </ul>
                    </li>
                </ul>
                <img src="../img/responsables.png" alt="Responsables" class="visual">
            </div>
            <div class="card">
                <ul>
                    <li>Precio de la consulta:
                        <ul>
                            <li>5€ consulta</li>
                            <li>20€ sesión</li>
                        </ul>
                    </li>
                </ul>
                <img src="../img/precios.png" alt="Precios" class="visual">
            </div>
        </div>
        <?php footer::print() ?>
</body>

</html>