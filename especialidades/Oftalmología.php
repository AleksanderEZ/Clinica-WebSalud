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
        <h3>Oftalmología:</h3>
        <div class="descripcion">
            <div class="card">
                <ul>
                    <li>Descripción:
                        <p>Servicio de oftalmología. Nuestros oculistas están formados para
                            las últimas implementaciones. Disponemos de todo el equipamiento
                            necesario para las revisiones y la intervención con laser Lasik.</p>
                    </li>
                </ul>
                <img src="../img/oftalmología.jpg" alt="Oftalmología" class="visual">
            </div>
            <div class="card">
                <ul>
                    <li>Localización:
                        <ul>
                            <li>Planta 1, sector 1</li>
                        </ul>
                    </li>
                </ul>
                <img src="../img/oftalmología2.jpg" alt="Oftalmología" class="visual">
            </div>
            <div class="card">
                <ul>
                    <li>Responsables:
                        <ul>
                            <li>Marta Melián Chen</li>
                            <li>Abigail Sosa Cárdenas</li>
                            <li>Clemente Sánchez de la Cruz</li>
                        </ul>
                    </li>
                </ul>
                <img src="../img/responsables.png" alt="Responsables" class="visual">
            </div>
            <div class="card">
                <ul>
                    <li>Precio de la consulta:
                        <ul>
                            <li>5€ consulta/revisión</li>
                            <li>1000€-2000€ operación dependiendo de la complejidad de la misma.</li>
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