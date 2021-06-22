<?php
include_once '../presentation.class.php';

View::start("Clínica WebSalud", '../');
View::end();

header::print("../");

include_once '../business.class.php';
if (user::getLoggedUser()['tipo'] != 1) {
    echo 'No eres administrador';
} else {
    include_once '../data_access.class.php';

    $data = DB::execute_sql("SELECT nombre, email, poblacion, direccion, telefono FROM usuarios WHERE tipo = 2");
    $data->setFetchMode(PDO::FETCH_NAMED);

    $data2 = DB::execute_sql("SELECT especialidad FROM especialistas");
    $data2->setFetchMode(PDO::FETCH_NUM);
    $data2 = $data2->fetchAll();

    echo "<div class=main>";
    
    DB::especialistaFromDataToTable($data, $data2);

    echo "<label class='collapse' for='_1'>Añadir especialista</label>
              <input id='_1' type='checkbox'>";
    echo "<form class='cita' action='añadirEspecialista.php' method='post'>";
    echo "<fieldset>
                <legend>Añadir especialista</legend>
                <input class='input-field' type='text' placeholder='es(Nº)' name='Cuenta'>
                <input class='input-field' type='text' placeholder='Clave' name='Contraseña'>
                <input class='input-field' type='text' placeholder='Nombre del especialista' name='Nombre'>
                <input class='input-field' type='text' placeholder='Especialidad' name='Especialidad'>
                <input class='input-field' type='text' placeholder='ejemplo@dominio.com' name='E-Mail'>
                <input class='input-field' type='text' placeholder='Almatriche' name='Población'>
                <input class='input-field' type='text' placeholder='C/Buenas tardes' name='Dirección'>
                <input class='input-field' type='text' placeholder='659404939' name='Teléfono'>
                <input type='hidden' name='either' value ='añadir'/>
                <input type='submit' name='enviar' value='Enviar' />
                <input type='reset' name='reset' value='Limpiar' />
            </fieldset>";
    echo "</form>";

    echo "<label class='collapse' for='_2'>Borrar especialista</label>
              <input id='_2' type='checkbox'>";
    echo "<form class='cita' action='añadirEspecialista.php' method='post'>";
    echo "<fieldset>
                <legend>Borrar especialista</legend>
                <input class='input-field' type='text' placeholder='es(Nº)' name='Cuenta'>
                <input class='input-field' type='text' placeholder='Clave' name='Contraseña'>
                <input type='hidden' name='either' value ='borrar'/>
                <input type='submit' name='enviar' value='Enviar' />
                <input type='reset' name='reset' value='Limpiar' />
            </fieldset>";
    echo "</form>";

    echo "<label class='collapse' for='_3'>Modificar especialista</label>
              <input id='_3' type='checkbox'>";
    echo "<form class='cita' action='añadirEspecialista.php' method='post'>";
    echo "<fieldset>
                <legend>Modificar especialista</legend>
                <h3>Dejar en blanco los campos si no se quieren modificar</h3>
                <input class='input-field' type='text' placeholder='es(Nº)' name='Cuenta'>
                <input class='input-field' type='text' placeholder='Clave' name='Contraseña'>
                <input class='input-field' type='text' placeholder='Nombre del especialista' name='Nombre'>
                <input class='input-field' type='text' placeholder='Especialidad' name='Especialidad'>
                <input class='input-field' type='text' placeholder='ejemplo@dominio.com' name='E-Mail'>
                <input class='input-field' type='text' placeholder='Almatriche' name='Población'>
                <input class='input-field' type='text' placeholder='C/Buenas tardes' name='Dirección'>
                <input class='input-field' type='text' placeholder='659404939' name='Teléfono'>
                <input type='hidden' name='either' value ='modificar'/>
                <input type='submit' name='enviar' value='Enviar' />
                <input type='reset' name='reset' value='Limpiar' />
            </fieldset>";
    echo "</form>";
}

footer::print('../');
