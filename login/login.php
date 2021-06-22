<?php
include_once '../data_access.class.php';
include_once '../presentation.class.php';

View::start('Clínica WebSalud', '../');
View::end();

?>

<html>
<div class=header>
<div class=main>
    <a href="../index.php" class="volver">
        <h4>Volver</h4>
    </a>
    <div class=loginMainBody>
        <div>
            <form class="loginform" action="logincheck.php" method="post">
                <label for="Nombre">Usuario:<br><input type="text" name="Nombre"></label><br>
                <label for="Contraseña"><br>Contraseña:<br><input type="password" name="Contraseña"></label>
                <br><br><br>
                <input type="submit">
            </form>
            <br>
        </div>
        <div>
            <h1> Bienvenido </h1>
        </div>
    </div>
</div>

<?php footer::print('../'); ?>

</html>