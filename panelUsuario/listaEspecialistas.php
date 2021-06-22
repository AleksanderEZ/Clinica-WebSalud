<script src="../scripts.js"></script>
<?php
include_once '../presentation.class.php';

View::start("Clínica WebSalud", '../');
View::end();

header::print("../");

include_once '../business.class.php';
if (user::getLoggedUser()['tipo'] != 4) {
    echo 'No eres un paciente';
} else {

    include_once '../data_access.class.php';

    $id = User::getLoggedUser()['id'];

    $data = DB::getEspecialistasPaciente($id);

    echo "<div class=main>";

    DB::usuarioFromDataToTable_bis($data,$id);

    echo "<label class='collapse' for='_1'>Añadir especialista.</label>
          <input id='_1' type='checkbox'>";
    echo "<form class='cita' action='gestionarEspecialistasPaciente.php' method='post'>";
    echo "<fieldset>
            <legend>Añadir especialista.</legend>
            <select class='input-field' name='Nombre'>";

    $data = DB::getEspecialistasNotPaciente($id);

    foreach ($data as $row) {
        echo '<option value="' . $row["cuenta"] . '">' . $row["nombre"] . " (" . $row["cuenta"] . ")</option>";
    }

    echo "  </select>
            <input type='hidden' name='either' value ='añadir'/>
            <input type='submit' name='enviar' value='Enviar' />
        </fieldset>
        </form>";
	echo "<label class='collapse' for='_3'>Cambiar especialista.</label>
          <input id='_3' type='checkbox'>";
    echo "<form class='cita' action='gestionarEspecialistasPaciente.php' method='post'>";
    echo "<fieldset>
            <legend>Cambiar especialista.</legend>
            <select class='input-field' name='Nombre'>";
	echo "<option value=\"\" selected disabled hidden>De</option>";
    $data = DB::getEspecialistasNotPaciente($id);
	$data2 = DB::getEspecialistasPaciente($id);
    foreach ($data as $row) {
        echo '<option value="' . $row["cuenta"] . '">' . $row["nombre"] . " (" . $row["cuenta"] . ")</option>";
    }
	foreach ($data2 as $row) {
        echo '<option value="' . $row["cuenta"] . '">' . $row["nombre"] . " (" . $row["cuenta"] . ")</option>";
    }
	echo "</select>";
	echo "<select class='input-field' name='NombreCh'>";
	$data = DB::getEspecialistasNotPaciente($id);
	$data2 = DB::getEspecialistasPaciente($id);
	foreach ($data as $row) {
        echo '<option value="' . $row["cuenta"] . '">' . $row["nombre"] . " (" . $row["cuenta"] . ")</option>";
    }
	foreach ($data2 as $row) {
        echo '<option value="' . $row["cuenta"] . '">' . $row["nombre"] . " (" . $row["cuenta"] . ")</option>";
    }
	echo "<option value=\"\" selected disabled hidden>A</option>";
    echo "  </select>
            <input type='hidden' name='either' value ='cambiar'/>
            <input type='submit' name='enviar' value='Enviar' />
        </fieldset>
        </form>";
}

footer::print('../');
?>
