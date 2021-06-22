<?php
class DB
{
    private static $connection = null;
    public static function get()
    {
        if (self::$connection === null) {
            self::$connection = new PDO('sqlite:' . __DIR__ . '/datos.db');
            self::$connection->exec('PRAGMA foreign_keys = ON;');
            self::$connection->exec('PRAGMA encoding="UTF-8";');
            self::$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        return self::$connection;
    }
    public static function execute_sql($sql, $parms = null)
    {
        try {
            $db = self::get();
            $ints = $db->prepare($sql);
            if ($ints->execute($parms)) {
                return $ints;
            }
        } catch (PDOException $e) {
            // ¡Esto debería estar en presentation !
            echo '<h3>Error al entrar a la DB: ' . $e->getMessage() . '</h3>';
        }
        return false;
    }
    public static function user_exists($usuario, $pass, &$res)
    {
        $inst = self::execute_sql("SELECT * FROM usuarios WHERE cuenta=? and clave=?", array($usuario, md5($pass)));
        $inst->setFetchMode(PDO::FETCH_NAMED);
        $res = $inst->fetchAll();
        return count($res) == 1;
    }

    public static function get_especialidad($id)
    {
        $inst = self::execute_sql("SELECT especialidad FROM especialistas WHERE idespecialista = ?", array($id));
        $inst->setFetchMode(PDO::FETCH_NAMED);
        $res = $inst->fetchAll();
        return $res[0]['especialidad'];
    }

    public static function get_userid($usuario)
    {
        $inst = self::execute_sql("SELECT id FROM usuarios WHERE cuenta = ?", array($usuario));
        $inst->setFetchMode(PDO::FETCH_NAMED);
        $res = $inst->fetchAll();
        return $res[0]['id'];
    }

    public static function imprimirHistorial($id)
    {
        $id = DB::get_userid($id);

        $data = DB::execute_sql("SELECT fechahora, tipo, asunto, descripcion
                                    FROM historial
                                    WHERE idpaciente = ?
                                    ORDER BY fechahora DESC", array($id));
        $data->setFetchMode(PDO::FETCH_NAMED);

        echo "<div class=main>";
        echo "<table id='especialidades'>
                <tr>
                    <th>Fecha</th>
                    <th>Tipo</th>
                    <th>Asunto</th>
                    <th>Descripción</th>
                </tr>";
        foreach ($data as $row) {
            switch ($row["tipo"]) {
                case 1:
                    $row["tipo"] = "Consulta";
                    break;
                case 2:
                    $row["tipo"] = "Diagnóstico";
                    break;
                case 3:
                    $row["tipo"] = "Tratamiento";
                    break;
                case 4:
                    $row["tipo"] = "Seguimiento";
                    break;
                case 5:
                    $row["tipo"] = "Resultado prueba";
                    break;
            }
            echo '<tr>
                        <td>' . date("d-m-Y H:i:s", $row["fechahora"]) . '</td>
                        <td>' . $row["tipo"] . '</td>
                        <td>' . $row["asunto"] . '</td>
                        <td>' . $row["descripcion"] . '</td>
                      </tr>';
        }
        echo "</table></div>";
    }

    public static function getFromUsuarios($username, $pass)
    {
        $inst = DB::execute_sql("SELECT nombre, email, poblacion, direccion, telefono FROM usuarios WHERE cuenta = ? and clave = ?", array($username, md5($pass)));
        $inst->setFetchMode(PDO::FETCH_NAMED);
        $res = $inst->fetchAll();
        return $res;
    }

    public static function addUsuario($username, $pass, $name, $tipo, $mail, $city, $address, $phone)
    {
        DB::execute_sql("INSERT INTO usuarios (cuenta, clave, nombre, tipo, email, poblacion, direccion, telefono) 
                        VALUES (?, ?, ?, ?, ?, ?, ?, ?)", array($username, md5($pass), $name, $tipo, $mail, $city, $address, $phone));
    }

    public static function addEspecialistas($id, $especialidad)
    {
        DB::execute_sql("INSERT INTO especialistas (idespecialista, especialidad)
                        VALUES (?, ?)", array($id, $especialidad));
    }

    public static function addHistorial($paciente, $tipo, $asunto, $descripcion)
    {
        DB::execute_sql("INSERT INTO historial (idpaciente, fechahora, idcreador, tipo, asunto, descripcion) 
                        VALUES (?, ?, ?, ?, ?, ?)", array(DB::get_userid($paciente), time(), User::getLoggedUser()['id'], $tipo, $asunto, $descripcion));
    }

    public static function usuarioFromDataToTable($data)
    {
        echo "<table id='especialidades'>
            <tr>
                <th>Nombre</th>
                <th>E-mail</th>
                <th>Población</th>
                <th>Dirección</th>
                <th>Teléfono</th>
            </tr>";
        foreach ($data as $row) {
            echo '<tr>
                    <td>' . $row["nombre"] . '</td>
                    <td>' . $row["email"] . '</td>
                    <td>' . $row["poblacion"] . '</td>
                    <td>' . $row["direccion"] . '</td>
                    <td>' . $row["telefono"] . '</td>
                  </tr>';
        }
        echo "</table></div>";
    }
    public static function usuarioFromDataToTable_bis($data,$idpaciente)
    {
        echo "<table id='especialidades'>
            <tr>
                <th>Nombre</th>
                <th>E-mail</th>
                <th>Población</th>
                <th>Dirección</th>
                <th>Teléfono</th>
                <th>Eliminar especialista</th>
            </tr>";
        foreach ($data as $row) {
            $idespecialista =self::get_userid($row["cuenta"]);
            echo '<tr id=fila'.$idespecialista.'>
                    <td>' . $row["nombre"] . '</td>
                    <td>' . $row["email"] . '</td>
                    <td>' . $row["poblacion"] . '</td>
                    <td>' . $row["direccion"] . '</td>
                    <td>' . $row["telefono"] . '</td>';
                    echo "<td><button onclick=\"deleteEspecialista($idespecialista,$idpaciente)\">Eliminar</button></td>";
                echo '</tr>';
        }
        echo "</table></div>";
    }

    public static function especialistaFromDataToTable($data, $data2)
    {
        echo "<table id='especialidades'>
            <tr>
                <th>Nombre</th>
                <th>Especialidad</th>
                <th>E-mail</th>
                <th>Población</th>
                <th>Dirección</th>
                <th>Teléfono</th>
            </tr>";

        $i = 0;
        foreach ($data as $row) {

            echo '<tr>
                    <td>' . $row["nombre"] . '</td>
                    <td>' . $data2[$i][0] . '</td>
                    <td>' . $row["email"] . '</td>
                    <td>' . $row["poblacion"] . '</td>
                    <td>' . $row["direccion"] . '</td>
                    <td>' . $row["telefono"] . '</td>
                  </tr>';
            $i = ++$i;
        }
        echo "</table></div>";
    }

    public static function getPacientesEspecialista($id)
    {
        $data = DB::execute_sql("SELECT nombre, email, poblacion, direccion, telefono, cuenta
                                FROM usuarios INNER JOIN pacientesespecialistas ON pacientesespecialistas.idpaciente = usuarios.id
                                WHERE tipo = 4 and idespecialista=?", array($id));
        $data->setFetchMode(PDO::FETCH_NAMED);
        return $data;
    }

    public static function getEspecialistasPaciente($id)
    {
        $data = DB::execute_sql("SELECT nombre, email, poblacion, direccion, telefono, cuenta
                                FROM usuarios INNER JOIN pacientesespecialistas ON pacientesespecialistas.idespecialista = usuarios.id
                                WHERE tipo = 2 and idpaciente=?", array($id));
        $data->setFetchMode(PDO::FETCH_NAMED);
        return $data;
    }

    public static function getEspecialistasNotPaciente($id)
    {
        $data = DB::execute_sql("SELECT nombre, email, poblacion, direccion, telefono, cuenta
                                FROM usuarios
                                WHERE tipo = 2 and id NOT IN (SELECT idespecialista
                                FROM usuarios INNER JOIN pacientesespecialistas ON pacientesespecialistas.idespecialista = usuarios.id
                                WHERE tipo = 2 and idpaciente=?)", array($id));
        $data->setFetchMode(PDO::FETCH_NAMED);
        return $data;
    }
}
