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
        <h2 id="campos">Los campos con * son obligatorios.</h2>
        <form class="cita">
            <fieldset>
                <legend>Cita previa</legend>
                <input class="input-field" type="text" placeholder="Nombre*" name="Nombre">
                <input class="input-field" type="text" placeholder="Apellidos*" name="Apellidos">
                <input class="input-field" type="text" placeholder="Domicilio*" name="Domicilio">
                <input class="input-field" type="text" placeholder="Teléfono*" name="Telefono">
                <input class="input-field" type="text" placeholder="Correo electrónico*" name="Correo electronico">
                <label for="dateofbirth">Fecha</label>
                <input type="date" name="dateofbirth" id="dateofbirth">
                <p>Sexo*:</p>
                <p><label>Masculino <input type="radio" name="Sexo" id="Masculino" /></label></p>
                <p><label>Femenino <input type="radio" name="Sexo" id="Femenino" /></label></p>
                <textarea class="input-field" placeholder="Observaciones" name="Observaciones"></textarea>
                <input type="submit" name="enviar" value="Enviar" />
                <input type="reset" name="reset" value="Limpiar" />
            </fieldset>
        </form>
    </div>
    <?php footer::print() ?>
</html>