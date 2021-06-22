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
        <h3>Odontología:</h3>
        <span class="descripcion">
            <div class="card">
                <ul>
                    <li>Descripción:
                        <p>Servicio de odontología. Dentistas cualificados y modernizados
                            gracias a su seminario mensual. Disponemos de todo el equipamiento
                            necesario para las revisiones e intervenciones. Curas y comprobaciones
                            rutinarias gratis.</p>
                    </li>
                </ul>
                <img src="../img/odontología.png" alt="Odontología" class="visual">
            </div>
            <div class="card">
                <ul>
                    <li>Localización:
                        <ul>
                            <li>Planta 3</li>
                        </ul>
                    </li>
                </ul>
                <img src="../img/odontología2.png" alt="Odontología" class="visual">
            </div>
            <div class="card">
                <ul>
                    <li>Responsables:
                        <ul>
                            <li>Abian Méndez Contreras</li>
                            <li>Carmen Quesada Hernández</li>
                            <li>Eva Celeste Arboleda</li>
                            <li>Cleopatra Medina Peralta</li>
                            <li>Estrella Marina Socorro Cañones</li>
                        </ul>
                    </li>
                </ul>
                <img src="../img/responsables.png" alt="Responsables" class="visual">
            </div>
            <div class="card">
                <ul>
                    <li>Precio de la consulta:
                        <ul>
                            <li>Consulta gratis</li>
                            <li>Limpieza: 50€</li>
                            <li>Reemplazo: 200€</li>
                            <li>Coronar dentadura: 4000€</li>
                            <li>Ortodoncia: 2000€</li>
                            <li>Empaste: 40€</li>
                            <li>Extraccion: 40€</li>
                            <li>Desvitalización: 100€</li>
                        </ul>
                    </li>
                </ul>
                <img src="../img/precios.png" alt="Precios" class="visual">
            </div>
        </div>
    </div>
    <?php footer::print() ?>
</body>

</html>