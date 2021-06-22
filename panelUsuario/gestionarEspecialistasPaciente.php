<?php
    include_once '../presentation.class.php';
    include_once '../data_access.class.php';
    
    View::start('Clínica WebSalud', '../');
    View::end();
    
    $either = $_POST['either'];
    $username = $_POST['Nombre'];
	if($either == "cambiar"){
		$usernamech = $_POST['NombreCh'];
	}
	

    include_once '../business.class.php';

    $idpaciente = User::getLoggedUser()['id'];
    $idespecialista = DB::get_userid($username);
	if($either == "cambiar"){
		$idespecialistach = DB::get_userid($usernamech);
	}

    switch($either){
        case "añadir":
            DB::execute_sql("INSERT INTO pacientesespecialistas (idpaciente, idespecialista)
                            VALUES (?, ?)", array($idpaciente, $idespecialista));
            break;
        case "borrar":
            DB::execute_sql("DELETE FROM pacientesespecialistas 
                            WHERE idpaciente = ? and idespecialista = ?", array($idpaciente, $idespecialista));
            break;
		case "cambiar":
			DB::execute_sql("UPDATE pacientesespecialistas
							SET idespecialista = ? WHERE idespecialista = ? AND idpaciente = ?", array($idespecialistach, $idespecialista,$idpaciente));
			break;
    }

    header("Location: listaEspecialistas.php");
