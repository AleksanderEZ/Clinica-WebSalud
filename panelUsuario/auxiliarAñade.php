<?php
include_once '../presentation.class.php';

View::start("Clínica WebSalud", '../');
View::end();

header::print("../");

include_once '../business.class.php';
if (user::getLoggedUser()['tipo'] != 3) {
    echo 'No eres auxiliar';
} else {
    include_once '../data_access.class.php';

    $data = DB::execute_sql("SELECT nombre, email, poblacion, direccion, telefono FROM usuarios WHERE tipo = 4");
    $data->setFetchMode(PDO::FETCH_NAMED);

    echo "<div class=main>";
    
    DB::usuarioFromDataToTable($data);

    echo "<label class='collapse' for='_1'>Añadir al historial</label>
              <input id='_1' type='checkbox'>";
    echo "<form class='cita' action='añadirHistorial.php' method='post'>";
    echo "<fieldset>
                <legend>Añadir al historial</legend>
                <select class='input-field' name='Paciente'>";

    $data = DB::execute_sql("SELECT nombre, cuenta
                                FROM usuarios WHERE tipo = 4");
    $data->setFetchMode(PDO::FETCH_NAMED);

    foreach ($data as $row) {
        echo '<option value="' . $row["cuenta"] . '">' . $row["nombre"] . " (" . $row["cuenta"] . ")</option>";
    }

    echo "      </select>
                <select class='input-field' name='Tipo'>
                    <option value = 'Resultado prueba'>Resultado prueba</option>
                </select>
                <input class='input-field' type='text' placeholder='Breve descripción' name='Asunto' minlength='1' maxlength='32'>
                <input class='input-field' type='text' placeholder='Extensa descripción' name='Descripción' minlength='12' maxlength='5000'>
                <input type='hidden' name='either' value ='añadir'/>
                <input type='submit' name='enviar' value='Enviar' />
                <input type='reset' name='reset' value='Limpiar' />
            </fieldset>";
    echo "</form>";
    echo "</div>";
}

footer::print('../');
