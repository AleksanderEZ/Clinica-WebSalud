<?php
include_once '../presentation.class.php';
include_once '../business.class.php';

View::start('Clínica WebSalud', '../');
View::end();


$username = $_POST['Nombre'];
$pass = $_POST['Contraseña'];

$user = new User;
if ($user -> login($username, $pass)) {
    $info = $user -> getLoggedUser();
    
    if ($info != false){
        header("Location: ../panelUsuario/panelUsuario.php");
    }
} else {
    echo "Error";
}
