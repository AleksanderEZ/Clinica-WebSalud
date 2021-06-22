<?php
include_once 'data_access.class.php';
$res = new stdClass();
$res->deleted=false; 
try{
    $datoscrudos = file_get_contents("php://input"); 
    $datos = json_decode($datoscrudos);
    $idpaciente = $datos -> idpaciente;
    $idespecialista = $datos -> idespecialista;
    $sql=DB::execute_sql('DELETE FROM pacientesespecialistas WHERE idpaciente = ? and idespecialista = ?',array($idpaciente,$idespecialista));
    if($sql){
        if($sql->rowCount()>0){ 
           $res->deleted=true; 
        }
    }
    
}catch(Exception $e){
   $res->message=$e->getMessage(); 
}
header('Content-type: application/json');
echo json_encode($res);
