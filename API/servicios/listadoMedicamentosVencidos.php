<?php 

 include_once '../DTO/medicamentos_DTO.php';
 $fechaActual = date('d/m/Y');
    
 $mngLP = new medicamentos_DTO();
 $data = $mngLP->listarMedicamentosExistentes();

 
 $fechaActual=strval($fechaActual);
 
$dt1 = DateTime::createFromFormat('d/m/Y', $fechaActual);


$result=[];
for($i=0;$i<count($data['DATA']);$i++){

    $dt2 = DateTime::createFromFormat('d/m/Y', $data['DATA'][$i]['fechavencimiento']);
    
    if ($dt2 <= $dt1) {
      
        $result['DATA'][]=$data['DATA'][$i];

    } 
}
$data['DATA']=$result['DATA'];
echo JSON_encode($data);
 
?>