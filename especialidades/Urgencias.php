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
        <h3>Urgencias:</h3>
        <div class="descripcion">
            <div class="card">
                <ul>
                    <li>Descripción:
                        <p>Servicio disponible las 24h del día para atender cualquier
                            necesidad urgente. Disponible una camilla para tratamientos
                            intensivos y plaza libre para ambulancia. Si no podemos tratar
                            su problema le derivamos enseguida y con el mejor trato posible
                            al hospital insular.</p>
                    </li>
                </ul>
                <img src="../img/urgencias.png" alt="Urgencias" class = "visual">
            </div>
            <div class="card">
                <ul>
                    <li>Localización:
                        <ul>
                            <li>Entrada del edificio.</li>
                        </ul>
                    </li>
                </ul>
                <img src="../img/urgencias2.png" alt="Urgencias" class = "visual">
            </div>
            <div class="card">
                <ul>
                <li>Responsables:
                    <ul>
                        <li>Matilde Rosario Yéssica</li>
                        <li>Rosendo Ezequiel Aura</li>
                    </ul>
                </li>
                </ul>
                <img src="../img/responsables.png" alt="Responsables" class="visual">
            </div>
            <div class="card">
                <ul>
                <li>Precio de la consulta:
                    <p>La consulta es gratis. El tratamiento tendrá diferentes
                        costes dependiendo de las necesidades del paciente y las
                        decisiones médicas del personal.</p>
                </li>
                </ul>
                <img src="../img/precios.png" alt="Precios" class="visual">
            </div>
            </ul>
        </div>
    </div>
    <?php footer::print() ?>
</body>

</html>