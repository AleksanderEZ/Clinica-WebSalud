<?php
include_once '../presentation.class.php';
include_once '../data_access.class.php';

View::start('Clínica WebSalud', '../');
View::end();
switch ($_POST['either']) {
    case "añadir":

        $username = $_POST['Cuenta'];
        $pass = $_POST['Contraseña'];
        $name = $_POST['Nombre'];
        $mail = $_POST['E-Mail'];
        $city = $_POST['Población'];
        $address = $_POST['Dirección'];
        $phone = $_POST['Teléfono'];

        DB::addUsuario($username, $pass, $name, 2, $mail, $city, $address, $phone);

        $especialidad = $_POST['Especialidad'];
        $id = DB::get_userid($username);

        DB::addEspecialistas($id, $especialidad);
        break;
        
    case "borrar":

        $username = $_POST['Cuenta'];
        $pass = $_POST['Contraseña'];

        DB::execute_sql("DELETE FROM usuarios WHERE cuenta=? and clave=? and tipo=2", array($username, md5($pass)));
        break;

    case "modificar":

        $username = $_POST['Cuenta'];
        $pass = $_POST['Contraseña'];
        $name = $_POST['Nombre'];
        $mail = $_POST['E-Mail'];
        $city = $_POST['Población'];
        $address = $_POST['Dirección'];
        $phone = $_POST['Teléfono'];

        $especialidad = $_POST['Especialidad'];
        $id = DB::get_userid($username);

        $res = DB::getFromUsuarios($username, $pass);

        if ($name == "") {
            $name = $res[0]["nombre"];
        }

        if ($mail == "") {
            $mail = $res[0]["email"];
        }

        if ($city == "") {
            $city = $res[0]["poblacion"];
        }

        if ($address == "") {
            $address = $res[0]["direccion"];
        }

        if ($phone == "") {
            $phone = $res[0]["telefono"];
        }
        if ($especialidad == "") {
            $inst = DB::execute_sql("SELECT especialidad FROM especialistas WHERE idespecialista = ?", array($id));
            $inst->setFetchMode(PDO::FETCH_NAMED);
            $res = $inst->fetchAll();
            $especialidad = $res[0]["especialidad"];
        }

        DB::execute_sql("UPDATE usuarios
                        SET nombre = ?, email = ?, poblacion = ?, direccion = ?, telefono = ?
                        WHERE cuenta = ? and clave = ?", array($name, $mail, $city, $address, $phone, $username, md5($pass)));

        DB::execute_sql("UPDATE especialistas
                        SET especialidad = ? WHERE idespecialista = ?", array($especialidad, $id));
        break;
}


header("Location: gestionEspecialistas.php");
