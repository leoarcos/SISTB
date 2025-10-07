<?php
header("Content-Type: text/html;charset=utf-8");
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);
ini_set('memory_limit', '-1');
define('EOL',(PHP_SAPI == 'cli') ? PHP_EOL : '<br />');

include_once '../DTO/autorizacion_DTO.php';
require_once '../PHPExcel/Classes/PHPExcel.php'; 

PHPExcel_Cell::setValueBinder(new PHPExcel_Cell_AdvancedValueBinder());
$data;
$mngLP = new autorizacion_DTO(); 

$strvar = (string)$_GET['estado']; 

if($strvar=="TODAS"){
    $data = $mngLP->listarAutorizacionesTodas();

}else if($strvar=="PENDIENTES"){
    $data = $mngLP->listarAutorizaciones();

}else if($strvar=="NO PENDIENTES"){
    $data = $mngLP->listarAutorizacionesNoPendientes();

} 

$objPHPExcel = new PHPExcel();
$objPHPExcel->getProperties()->setCreator("IDS")
                            ->setLastModifiedBy("SISTB")
                            ->setTitle("AUTORIZACIONES")
                            ->setSubject("LISTADO AUTORIZACIONES")
                            ->setDescription("")
                            ->setKeywords("office PHPExcel php")
                            ->setCategory("IDS");
$objPHPExcel->getActiveSheet()->setTitle("Listado Autorizaciones");                             
$colum='A';
$objPHPExcel->setActiveSheetIndex(0)
                ->setCellValue($colum++.'1', 'Consecutivo Autorizacion')
                ->setCellValue($colum++.'1', 'Año')
                ->setCellValue($colum++.'1', 'Trimestre')
                ->setCellValue($colum++.'1', 'Consecutivo Libro')
                ->setCellValue($colum++.'1', 'Fecha Solicitud')
                ->setCellValue($colum++.'1', 'Municipio')
                ->setCellValue($colum++.'1', 'Tipo Identificación')
                ->setCellValue($colum++.'1', 'Numero Identificación')
                ->setCellValue($colum++.'1', 'Nombres Y Apellidos')
                ->setCellValue($colum++.'1', 'Sexo')
                ->setCellValue($colum++.'1', 'Edad')
                ->setCellValue($colum++.'1', 'Rango')
                ->setCellValue($colum++.'1', 'Régimen')
                ->setCellValue($colum++.'1', 'EPS')
                ->setCellValue($colum++.'1', 'Telefono Paciente')
                ->setCellValue($colum++.'1', 'Peso')
                ->setCellValue($colum++.'1', 'IPS')
                ->setCellValue($colum++.'1', 'Proxima Entrega')
                ->setCellValue($colum++.'1', 'Nombre Funcionario')
                ->setCellValue($colum++.'1', 'Cargo Funcionario')
                ->setCellValue($colum++.'1', 'Institucion')
                ->setCellValue($colum++.'1', 'Telefono Funcionario')
                ->setCellValue($colum++.'1', 'Nombre Medicamento')
                ->setCellValue($colum++.'1', 'Presentacion')
                ->setCellValue($colum++.'1', 'Concentracion')
                ->setCellValue($colum++.'1', 'Cantidad Formulada')
                ->setCellValue($colum++.'1', 'Cantidad Autorizada')
                ->setCellValue($colum++.'1', 'Lote')
                ->setCellValue($colum++.'1', 'Categoria')
                ->setCellValue($colum++.'1', 'Fase')
                ->setCellValue($colum++.'1', 'Clasificacion')
                ->setCellValue($colum++.'1', 'Laboratorio')
                ->setCellValue($colum++.'1', 'Fecha Vencimiento')
                ->setCellValue($colum++.'1', 'Cumple Requisitos')
                ->setCellValue($colum++.'1', 'Soportes Pendientes')
                ->setCellValue($colum++.'1', 'Funcionario')
                ->setCellValue($colum++.'1', 'Observaciones')
                ->setCellValue($colum++.'1', 'Nombres Autoriza')
                ->setCellValue($colum++.'1', 'Cargo Autoriza')
                ->setCellValue($colum++.'1', 'Telefono Autoriza') 
                ->setCellValue($colum++.'1', 'Pendiente');

$style = array(
    'alignment' => array(
        'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
        'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER
    ),
    'font'  => array(
        'bold'  => true,
        'size'  => 12,
        'name'  => 'Arial'
    ),
    'borders' => array(
        'allborders' => array(
            'style' => PHPExcel_Style_Border::BORDER_THICK
        )
    ) 
);
$alienacion = array(
    'alignment' => array(
        'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
        'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER
    )
);

function colorCelda($color,$celda){
    global $objPHPExcel;
    $objPHPExcel->getActiveSheet()->getStyle($celda)->getFill()->applyFromArray(array(
        'type' => PHPExcel_Style_Fill::FILL_SOLID,
        'startcolor' => array(
            'rgb' => $color
        )
    ));
} 

$objPHPExcel->getActiveSheet()->getDefaultStyle()->applyFromArray($alienacion);
$objPHPExcel->getActiveSheet()->getStyle('A1:AO1')->applyFromArray($style);

//
 
//$objPHPExcel->getActiveSheet()->getStyle('A1:AP1')->getAlignment()->setWrapText(true);
colorCelda('CCFFCC','A1:AO1');

if($data['STATUS']=='OK'){
    for($i=0;$i<count($data['DATA']);$i++){
        $columna='A';
                
        $objPHPExcel->setActiveSheetIndex(0)
                        ->setCellValue($columna++.($i+2), $data['DATA'][$i]['consecutivoautorizacion'])
                        ->setCellValue($columna++.($i+2), $data['DATA'][$i]['ano'])
                        ->setCellValue($columna++.($i+2), $data['DATA'][$i]['trimestre'])
                        ->setCellValue($columna++.($i+2), $data['DATA'][$i]['consecutivolibro'])
                        ->setCellValue($columna++.($i+2), $data['DATA'][$i]['fechasolicitud'])
                        ->setCellValue($columna++.($i+2), $data['DATA'][$i]['municipio'])
                        ->setCellValue($columna++.($i+2), $data['DATA'][$i]['tipoidentificacion'])
                        ->setCellValue($columna++.($i+2), $data['DATA'][$i]['numeroidentificacion'])
                        ->setCellValue($columna++.($i+2), $data['DATA'][$i]['nombresapellidos'])
                        ->setCellValue($columna++.($i+2), $data['DATA'][$i]['sexo'])
                        ->setCellValue($columna++.($i+2), $data['DATA'][$i]['edad'])
                        ->setCellValue($columna++.($i+2), ($data['DATA'][$i]['menor']=='1')?'MESES':'AÑOS')
                        ->setCellValue($columna++.($i+2), $data['DATA'][$i]['regimen'])
                        ->setCellValue($columna++.($i+2), $data['DATA'][$i]['eps'])
                        ->setCellValue($columna++.($i+2), $data['DATA'][$i]['telefonopaciente'])
                        ->setCellValue($columna++.($i+2), ($data['DATA'][$i]['peso'])? $data['DATA'][$i]['peso'].' Kg':'')
                        ->setCellValue($columna++.($i+2), $data['DATA'][$i]['ips'])
                        ->setCellValue($columna++.($i+2), $data['DATA'][$i]['proximaentrega'])
                        ->setCellValue($columna++.($i+2), $data['DATA'][$i]['nombrefuncionario'])
                        ->setCellValue($columna++.($i+2), $data['DATA'][$i]['cargofuncionario'])
                        ->setCellValue($columna++.($i+2), $data['DATA'][$i]['institucion'])
                        ->setCellValue($columna++.($i+2), $data['DATA'][$i]['telefonofuncionario']);
        
        //print_r($data['DATA'][$i]);
        
        
        $data2 = $mngLP->listarMedicamentosAutorizacion($data['DATA'][$i]['consecutivoautorizacion']);
        
        if($data2['STATUS']=='OK'){
            $nombreMedicamento=''.PHP_EOL;
            $PresentacionMedicamento=''.PHP_EOL;
            $ConcentracionMedicamento=''.PHP_EOL;
            $cantFormuladaMedicamento=''.PHP_EOL;
            $cantAutorizadaMedicamento=''.PHP_EOL;
            $LoteMedicamento=''.PHP_EOL;
            $CategoriaMedicamento=''.PHP_EOL;
            $FaseMedicamento=''.PHP_EOL;
            $ClasificacionMedicamento=''.PHP_EOL;
            $LaboratorioMedicamento=''.PHP_EOL;
            $fechaVencimientoMedicamento=''.PHP_EOL;
            for($o=0;$o<count($data2['DATA']);$o++){

                $nombreMedicamento.=$data2['DATA'][$o]['nombremedicamento'].PHP_EOL;
                $PresentacionMedicamento.=$data2['DATA'][$o]['presentacion'].PHP_EOL;
                $ConcentracionMedicamento.=$data2['DATA'][$o]['concentracion'].PHP_EOL;
                $cantFormuladaMedicamento.=$data2['DATA'][$o]['cantidadformulada'].PHP_EOL;
                $cantAutorizadaMedicamento.=$data2['DATA'][$o]['cantidadautorizada'].PHP_EOL;
                $LoteMedicamento.=$data2['DATA'][$o]['lote'].PHP_EOL;
                $CategoriaMedicamento.=$data2['DATA'][$o]['categoria'].PHP_EOL;
                $FaseMedicamento.=$data2['DATA'][$o]['fase'].PHP_EOL;
                $ClasificacionMedicamento.=$data2['DATA'][$o]['clasificacion'].PHP_EOL;
                $LaboratorioMedicamento.=$data2['DATA'][$o]['laboratorio'].PHP_EOL;
                $fechaVencimientoMedicamento.=$data2['DATA'][$o]['fechavencimiento'].PHP_EOL;
                
            }
            $objPHPExcel->setActiveSheetIndex(0)
                            ->setCellValue($columna++.($i+2), $nombreMedicamento)
                            ->setCellValue($columna++.($i+2), $PresentacionMedicamento)
                            ->setCellValue($columna++.($i+2), $ConcentracionMedicamento)
                            ->setCellValue($columna++.($i+2), $cantFormuladaMedicamento)
                            ->setCellValue($columna++.($i+2), $cantAutorizadaMedicamento)
                            ->setCellValue($columna++.($i+2), $LoteMedicamento)
                            ->setCellValue($columna++.($i+2), $CategoriaMedicamento)
                            ->setCellValue($columna++.($i+2), $FaseMedicamento)
                            ->setCellValue($columna++.($i+2), $ClasificacionMedicamento)
                            ->setCellValue($columna++.($i+2), $LaboratorioMedicamento)
                            ->setCellValue($columna++.($i+2), $fechaVencimientoMedicamento);
            
        }else{
            
                //echo "<script>alert('Error al listar Medicamentos autorizacion');  </script>";
        }
             
        $objPHPExcel->setActiveSheetIndex(0)
                        ->setCellValue($columna++.($i+2), $data['DATA'][$i]['cumplerequisitos'])
                        ->setCellValue($columna++.($i+2), $data['DATA'][$i]['soportespendientes'])
                        ->setCellValue($columna++.($i+2), $data['DATA'][$i]['funcionario'])
                        ->setCellValue($columna++.($i+2), $data['DATA'][$i]['observaciones'])
                        ->setCellValue($columna++.($i+2), $data['DATA'][$i]['nombreautoriza'])
                        ->setCellValue($columna++.($i+2), $data['DATA'][$i]['cargoautoriza'])
                        ->setCellValue($columna++.($i+2), $data['DATA'][$i]['telefonoautoriza'])
                        ->setCellValue($columna++.($i+2), $data['DATA'][$i]['pendiente']);
       
    }
}else{
    echo "<script>alert('Error al listar autorizaciones');  </script>";
}

    
$columancho='A';
while($columancho!=$objPHPExcel->getActiveSheet()->getHighestDataColumn()){
    
    $objPHPExcel->getActiveSheet()->getColumnDimension($columancho)->setAutoSize(true);
    $columancho++;
    if($columancho==$objPHPExcel->getActiveSheet()->getHighestDataColumn()){
         
        $objPHPExcel->getActiveSheet()->getColumnDimension($columancho)->setAutoSize(true);
    }
}  

header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
header('Content-Disposition: attachment;filename="LISTADO AUTORIZACIONES '.$strvar.'.xlsx"');
header('Cache-Control: max-age=0');

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
ob_clean();

$objWriter->save('php://output');
 
?>