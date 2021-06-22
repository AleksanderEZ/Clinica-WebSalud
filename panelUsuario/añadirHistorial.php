<?php
include_once '../presentation.class.php';
include_once '../data_access.class.php';

View::start('Clínica WebSalud', '../');
View::end();


if(User::getLoggedUser()['tipo'] == 4){
    $either = "ver";
} else {
    $either = $_POST['either'];
}
switch ($either) {
    case "añadir":
        $tipo = $_POST['Tipo'];
        $asunto = $_POST['Asunto'];
        $descripcion = $_POST['Descripción'];
        $paciente = $_POST['Paciente'];

        switch ($tipo) {
            case "Consulta":
                $tipo = 1;
                break;
            case "Diagnóstico":
                $tipo = 2;
                break;
            case "Tratamiento":
                $tipo = 3;
                break;
            case "Seguimiento":
                $tipo = 4;
                break;
            case "Resultado prueba":
                $tipo = 5;
                break;
        }

        DB::addHistorial($paciente, $tipo, $asunto, $descripcion);

        if (user::getLoggedUser()['tipo'] != 3) {
            header("Location: listaPacientes.php");
        } else {
            header("Location: auxiliarAñade.php");
        }
        break;

    case "ver":

        header::print("../");

        if (user::getLoggedUser()['tipo'] != 2 and user::getLoggedUser()['tipo'] != 4) {
            echo 'No eres un especialista ni paciente';
        } elseif (user::getLoggedUser()['tipo'] == 2) {
            $nombre = $_POST['Nombre'];
            DB::imprimirHistorial($nombre);
        } elseif (user::getLoggedUser()['tipo'] == 4) {
            $nombre = user::getLoggedUser()['cuenta'];
            DB::imprimirHistorial($nombre);
        }

        footer::print("../");

        break;

    case "filtrar":
        include_once '../data_access.class.php';
        $query = $_POST["Query"];

        if (empty($query)){
            $id = User::getLoggedUser()['id'];
            $data = DB::getPacientesEspecialista($id);
            $data->setFetchMode(PDO::FETCH_NAMED);
        } else {
            $id = User::getLoggedUser()['id'];
            $data = DB::execute_sql("SELECT nombre, email, poblacion, direccion, telefono 
                            FROM usuarios INNER JOIN pacientesespecialistas ON pacientesespecialistas.idpaciente = usuarios.id
                            WHERE tipo = 4 and idespecialista=? and nombre LIKE ?", array($id, "%{$query}%"));
            $data->setFetchMode(PDO::FETCH_NAMED);
        }
        
        echo "<div class=main>";
        DB::usuarioFromDataToTable($data);
        echo "</div>";

        break;
}
