<?php
header("Content-Type: text/html;charset=utf-8");
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);
ini_set('memory_limit', '-1');
define('EOL',(PHP_SAPI == 'cli') ? PHP_EOL : '<br />');

include_once '../DTO/medicamentos_DTO.php';
require_once '../PHPExcel/Classes/PHPExcel.php';

$mngLP = new medicamentos_DTO();
        
$data = $mngLP->listarMedicamentosPendientesFechas($_GET['fechaInicio'], $_GET['fechaFin']);

$er=1;
do{
    
    $objPHPExcel = new PHPExcel();
    $objPHPExcel->getProperties()->setCreator("IDS")
                                ->setLastModifiedBy("SISTB")
                                ->setTitle("ISTADO MEDICAMENTOS PENDIENTES")
                                ->setSubject("LISTADO MEDICAMENTOS PENDIENTES")
                                ->setDescription("")
                                ->setKeywords("office PHPExcel php")
                                ->setCategory("IDS");
    $objPHPExcel->getActiveSheet()->setTitle("MEDICAMENTOS PENDIENTES   ");                             
    $colum='A';
    $objPHPExcel->setActiveSheetIndex(0)
                ->setCellValue($colum++.'1', 'Autorizacion')
                ->setCellValue($colum++.'1', 'Nombre del Medicamento')
                ->setCellValue($colum++.'1', 'Presentación')
                ->setCellValue($colum++.'1', 'Concentración')
                ->setCellValue($colum++.'1', 'Cantidad Formulada')
                ->setCellValue($colum++.'1', 'Cantidad Autorizada')
                ->setCellValue($colum++.'1', 'Cantidad Pendiente')
                ->setCellValue($colum++.'1', 'Lote')
                ->setCellValue($colum++.'1', 'Laboratorio')
                ->setCellValue($colum++.'1', 'Fecha de Vencimiento')
                ->setCellValue($colum++.'1', 'Fecha de Ingreso del Medicamento');

    $colum='A';
    $fil=2;
 
    $cantiLP=intVal(count($data['DATA']));
            
    for($t=0;$t<$cantiLP;$t++){
        $colum='A';
        $objPHPExcel->setActiveSheetIndex(0)
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['consecutivoautorizacion'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['nombremedicamento'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['presentacion'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['concentracion'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['cantidadformulada'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['cantidadautorizada'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['cantidadpendiente'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['lote'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['laboratorio'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['fechavencimiento'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['fechaingreso']);
        
        $fil++;
    
    }
    $colum='A';
                    
    


    $style = array(
        'alignment' => array(
            'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
            'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
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
        )
    );
    //$objPHPExcel->getActiveSheet()->getColumnDimension('A:DC')->setWidth(100);
    $objPHPExcel->getActiveSheet()->getDefaultStyle()->applyFromArray($alienacion);
    $objPHPExcel->getActiveSheet()->getStyle('A1:K1')->applyFromArray($style);
    colorCelda('CCFFCC','A1:K1');
    $ancho=1;
    $ii='B';
    do{
        
        $objPHPExcel->getActiveSheet()->getColumnDimension($ii)->setAutoSize(true);
        if($ii=='K'){
            
            $ancho=0;
        }
        $ii++;

    }
    while($ancho==1);

    
/*
    if($er==2){
        header('Location: ../src/vistas/libroPacientes/');
    }*/
    $er++;
}while($er<5);
//print_r($data['DATA']);
function colorCelda($color,$celda){
    global $objPHPExcel;
    $objPHPExcel->getActiveSheet()->getStyle($celda)->getFill()->applyFromArray(array(
        'type' => PHPExcel_Style_Fill::FILL_SOLID,
        'startcolor' => array(
            'rgb' => $color
        )
    ));
} 
header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
header('Content-Disposition: attachment;filename="FORMATO MEDICAMENTOS FECHAS.xlsx"');
header('Cache-Control: max-age=0');

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
ob_clean();

$objWriter->save('php://output');
        