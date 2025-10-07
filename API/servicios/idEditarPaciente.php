<?php

include_once '../DTO/libroPacientes_DTO.php';
 
//print_r($_POST);    
if($_POST['codigo']=='@TB2020'){
        
    $mngLP = new libroPacientes_DTO();
            
    $data = $mngLP->actualizarPacienteLibroRegistroIdentific($_POST);
    if($data['STATUS']=='OK'){ 
        echo "<script>alert('Paciente Actualizado con exito');</script>";
        echo "<script>location.href='../src/vistas/libroPacientes/editarIDPaciente.php';</script>";

    }else{
        echo "<script>alert('No se pudo actualizar paciente');</script>";
        echo "<script>location.href='../src/vistas/libroPacientes/editarIDPaciente.php';</script>";

    }

}else{
    echo "<script>alert('Codigo Erroneo');</script>";
    echo "<script>location.href='../src/vistas/libroPacientes/editarIDPaciente.php';</script>";
}

