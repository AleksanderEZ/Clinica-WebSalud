<?php
include_once '../presentation.class.php';
View::start('Clínica WebSalud', '../');
View::end();

header::print('../');

$user = new User;
$info = $user->getLoggedUser();
if ($info != false) {

    switch ($info['tipo']) {
        case 1:
            echo
            "<div class='interaccion2'>
                        <div class = card>
                            <a href='gestionEspecialistas.php'> <h3>Gestión de especialistas.</h3></a>
                            <img src='../img/TEAMSKILLS.png' alt='Gestion especialistas' class='visual'>
                        </div>
                        <div class = card>
                            <h3>Listar usuarios (No realizado)</h3>
                        </div>
                        <div class = card>
                            <h3>Crear, modificar, borrar usuarios.(No realizado)</h3>
                        </div>
                    </div>";
            break;
        case 2:
            echo
            "<div class='interaccion2'>
                        <div class = card>
                            <a href='listaPacientes.php'> <h3>Pacientes.</h3></a>
                            <img src='../img/paciente.png' alt='Paciente' class='visual'>
                        </div>
                        <div class = card>
                            <h3>Mis historiales.(No realizar)</h3>
                        </div>
                    </div>";
            break;
        case 3:
            echo
            "<div class='interaccion2'>
                        <div class = card>
                            <a href='auxiliarAñade.php'><h3>Añadir al historial.</h3></a>
                            <img src='../img/añadirHistorial.png' alt='Historial' class='visual'>
                        </div>
                        <div class = card>
                            <h3>Modificar historiales.(No realizado)</h3>
                        </div>
                    </div>";
            break;
        case 4:
            echo
            "<div class='interaccion2'>
                        <div class = card>
                            <a href='listaEspecialistas.php'><h3>Mis especialistas.</h3></a>
                            <img src='../img/TEAMSKILLS.png' alt='Gestion especialistas' class='visual'>
                        </div>
                        <div class = card>
                            <a href='añadirHistorial.php'><h3>Ver historial médico.</h3></a>
                            <img src='../img/añadirHistorial.png' alt='Historial' class='visual'>
                        </div>
                    </div>";
            break;
    }
} else {
    echo "Error";
}

footer::print();
