<?php
include_once '../data_access.class.php';
include_once '../presentation.class.php';

View::start('Clínica WebSalud', '../');

View::end();
?>

<html lang="es">

<body>
    <?php header::print('../'); ?>

    <div class="main">
        <div id="textocontacto">
            <h3>Contacto:</h3>
            <p>Telefono: 674 751 931</p>
            <p>E-Mail: clinicawebsalud@mail.com</p>
            <p>Nos encontramos en: Calle Avda. Explanada Barnuevo 47, Las Palmas
                de Gran Canaria, Las Palmas, 35000</p>
            <img src="../img/direccion.png" alt="Ubicación">
        </div>
    </div>

    <?php footer::print(); ?>
</body>

</html>