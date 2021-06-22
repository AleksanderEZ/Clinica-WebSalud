<script src="https://code.jquery.com/jquery-1.11.2.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
  $("#form").validate({
	  rules: {
		  Asunto : {
			required: true,
			minlength: 1,
			maxlength: 32
		  },
		  Descripción: {
			required: true,
			minlength: 12,
			maxlength: 5000
		  }
	  },
	  messages: {
		  Asunto : {
			  required: "Este campo es obligatorio",
			  minlength: "El asunto tiene que tener al menos 1 caracter",
			  maxlength: "El asunto no puede sobrepasar de 32 caracteres"
		  },
		  Descripción: {
			  required: "Este campo es obligatorio",
		      minlength: "La descripción tiene que tener al menos 12 caracteres",
			  maxlength: "La descripción no puede sobrepasar de 5000 caracteres"
		  }
	  }
  });
});
</script>





<?php
include_once '../presentation.class.php';

View::start("Clínica WebSalud", '../');
View::end();

header::print("../");

include_once '../business.class.php';
if (user::getLoggedUser()['tipo'] != 2) {
    echo 'No eres un especialista';
} else {
    echo "<div class=main>";
?>

<html>
  <br><br><label for="searchBar"> Buscar: </label>
  <input type="text" id="searchBar"><br><br><br><br>
</html>

<html>
  <div id = "response">
      <?php
      $id = User::getLoggedUser()['id'];
      $data = DB::getPacientesEspecialista($id);
      $data->setFetchMode(PDO::FETCH_NAMED);
      DB::usuarioFromDataToTable($data);
      ?>
  </div>
</html>

<script src="../scripts.js"></script>

<?php
    echo "<label class='collapse' for='_1'>Añadir al historial</label>
              <input id='_1' type='checkbox'>";
    echo "<form id='form' class='cita' action='añadirHistorial.php' method='post'>";
    echo "<fieldset>
                <legend>Añadir al historial</legend>
                <select class='input-field' name='Paciente'>";

    $data = DB::getPacientesEspecialista($id);

    foreach ($data as $row) {
        echo '<option value="' . $row["cuenta"] . '">' . $row["nombre"] . " (" . $row["cuenta"] . ")</option>";
    }

    echo "      </select>
                <select class='input-field' name='Tipo'>
                    <option value = 'Consulta'>Consulta</option>
                    <option value = 'Diagnóstico'>Diagnóstico</option>
                    <option value = 'Tratamiento'>Tratamiento</option>
                    <option value = 'Seguimiento'>Seguimiento</option>
                </select>
                <input class='input-field' id='Asunto' type='text' placeholder='Breve descripción' name='Asunto'>
                <input class='input-field' id='Descripción' type='text' placeholder='Extensa descripción' name='Descripción'>
                <input type='hidden' name='either' value ='añadir'/>
                <input type='submit' name='enviar' value='Enviar' />
                <input type='reset' name='reset' value='Limpiar' />
            </fieldset>";
    echo "</form>";

    echo "<label class='collapse' for='_2'>Acceder al historial</label>
              <input id='_2' type='checkbox'>";
    echo "<form class='cita' action='añadirHistorial.php' method='post'>";
    echo "<fieldset>
                <legend>¿De quién quiere ver el historial?</legend>
                <select class='input-field' name='Nombre'>";

    $data = DB::getPacientesEspecialista($id);

    foreach ($data as $row) {
        echo '<option value="' . $row["cuenta"] . '">' . $row["nombre"] . " (" . $row["cuenta"] . ")</option>";
    }

    echo "  </select>
            <input type='hidden' name='either' value ='ver'/>
            <input type='submit' name='enviar' value='Enviar' />
        </fieldset>
        </form>";
    echo "</div>";
}
?>


<?php
  footer::print('../');
?>