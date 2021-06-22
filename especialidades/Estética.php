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
        <h3>Estética:</h3>
        <div class="descripcion">
            <div class="card">
                <ul>
                    <li>Descripción:
                        <p>Servicio variado de operaciones y tratamientos estéticos:
                            Implantes de silicona o bótox. También tenemos a su disposición
                            diversos tratamientos para la piel. (Imperfecciones,
                            aclaramientos, oscurecimientos y depilaciones) Por último y
                            como novedad tenemos liposucciones y lipotransferencias.</p>
                    </li>
                </ul>
                <img src="../img/estética.png" alt="Estetica" class="visual">
            </div>

            <div class="card">
                <ul>
                    <li>Localización:
                        <ul>
                            <li>Planta 2</li>
                        </ul>
                    </li>
                </ul>
                <img src="../img/estetica2.jpeg" alt="Estetica" class="visual">
            </div>

            <div class="card">
                <ul>
                    <li>Responsables:
                        <ul>
                            <li>Saúl Estepa García</li>
                            <li>Agustín Foso Herrero</li>
                            <li>Ana María Afonso Izquierdo</li>
                            <li>Sara García Talavera</li>
                        </ul>
                    </li>
                </ul>
                <img src="../img/responsables.png" alt="Responsables" class="visual">
            </div>
            <div class="card">
                <ul>
                    <li>Precio de la consulta:
                        <ul>
                            <li>Consulta: 50€</li>
                            <li>Implantes: 700€-2000€ </li>
                            <li>Tratamientos piel: 1000€-5000€</li>
                            <li>Lipo-operaciones: 1000€-3000€</li>
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