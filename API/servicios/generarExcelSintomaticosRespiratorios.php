<?php
require_once '../PHPExcel/Classes/PHPExcel.php';
 
require_once '../PHPExcel/Classes/PHPExcel/Cell/AdvancedValueBinder.php';

header("Content-Type: text/html;charset=utf-8");
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);
ini_set('memory_limit', '-1');
define('EOL',(PHP_SAPI == 'cli') ? PHP_EOL : '<br />');


include_once '../DTO/sintomaticoRespiratorio_DTO.php';

PHPExcel_Cell::setValueBinder( new PHPExcel_Cell_AdvancedValueBinder() );
  
$mngLP = new sintomaticoRespiratorio_DTO();
$data = $mngLP->listarSintomaticoRespiratorio();
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
        'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER
    )
);
if($data['STATUS']=='OK'){


    //print_r($data);
    $er=1;

    $objPHPExcel = new PHPExcel();
    $objPHPExcel->getProperties()->setCreator("IDS")
                                ->setLastModifiedBy("SISTB")
                                ->setTitle("SINTOMATICOS RESPIRATORIOS")
                                ->setSubject("LISTADO SINTOMATICOS RESPIRATORIOS")
                                ->setDescription("")
                                ->setKeywords("office PHPExcel php")
                                ->setCategory("IDS");
    $objPHPExcel->getActiveSheet()->setTitle("SINTOMATICOS RESPIRATORIOS");                             
    $colum='A';
    $objPHPExcel->setActiveSheetIndex(0)
                ->setCellValue($colum++.'1', 'Num')
                ->setCellValue($colum++.'1', 'Año')
                ->setCellValue($colum++.'1', 'Departamento')
                ->setCellValue($colum++.'1', 'Municipio')
                ->setCellValue($colum++.'1', 'Fecha Captación')
                ->setCellValue($colum++.'1', 'Fecha Sintomas')
                ->setCellValue($colum++.'1', 'Nombres')
                ->setCellValue($colum++.'1', 'Primer Apellido')
                ->setCellValue($colum++.'1', 'Segundo Apellido')
                ->setCellValue($colum++.'1', 'Edad')
                ->setCellValue($colum++.'1', 'Sexo')
                ->setCellValue($colum++.'1', 'Tipo Identificación')
                ->setCellValue($colum++.'1', 'Identificación')
                ->setCellValue($colum++.'1', 'Pruebas Realizadas')
                ->setCellValue($colum++.'1', 'Etnia')
                ->setCellValue($colum++.'1', 'Pueblo indigena')
                ->setCellValue($colum++.'1', 'Grupo Poblacional')
                ->setCellValue($colum++.'1', 'Ocupación')
                ->setCellValue($colum++.'1', 'Sector')
                ->setCellValue($colum++.'1', 'Barrio')
                ->setCellValue($colum++.'1', 'Dirección')
                ->setCellValue($colum++.'1', 'Comuna')
                ->setCellValue($colum++.'1', 'Telefono')
                ->setCellValue($colum++.'1', 'Regimén')
                ->setCellValue($colum++.'1', 'Entidad')
                ->setCellValue($colum++.'1', 'Observaciones')
                ->setCellValue($colum++.'1', 'Responsable')
                ->setCellValue($colum++.'1', 'Institución Responsable')
                ->setCellValue($colum.'1', 'Remitido Por');

    $colum='A';
    $fil=2;
    $cantidad=intVal(count($data['DATA']));
    for ($t=0;$t<$cantidad; $t++){
        $colum='A';
        $objPHPExcel->setActiveSheetIndex(0)
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['num'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['ano'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['departamento'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['municipio'])
                ->setCellValue($colum++.''.strval($fil), ' '.strval($data['DATA'][$t]['fechacaptacion']).'  ')
                ->setCellValue($colum++.''.strval($fil), ' '.strval($data['DATA'][$t]['fechasintomas']).'  ')
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['nombres'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['papellido'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['sapellido'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['edad'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['sexo'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['tipoidentificacion'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['identificacion']);
                
                
                $dataIn["num"]=$data['DATA'][$t]['num'];
                $dataIn["id"]=$data['DATA'][$t]['identificacion'];
               
                $dataPruebas = $mngLP->listarPruebasRealizadasEspecifico($dataIn);
                
                if($dataPruebas['STATUS']=='OK'){
                    $conteni='';
                    for($er=0;$er<count($dataPruebas['DATA']);$er++) {
                     
                        $conteni.='PRUEBA:  '.$dataPruebas['DATA'][$er]['pruebarealizada'].'     RESULTADO:  '.$dataPruebas['DATA'][$er]['resultadoprueba'].'     FECHA:  '.$dataPruebas['DATA'][$er]['fechaprueba'].' '. PHP_EOL .' ';
                    }

                    $objPHPExcel->setActiveSheetIndex(0)  
                        ->setCellValue($colum.''.strval($fil), $conteni);
                        
                    $objPHPExcel->getActiveSheet()->getStyle($colum++.''.strval($fil))->applyFromArray($alienacion);
                }else{

                    $objPHPExcel->setActiveSheetIndex(0)  
                        ->setCellValue($colum++.''.strval($fil), 'Error');
                }
                
        $objPHPExcel->setActiveSheetIndex(0)
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['etnia'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['puebloindigena'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['grupopoblacional'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['ocupacion'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['sector'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['barrio'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['direccion'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['comuna'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['telefono'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['regimen'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['entidad'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['observaciones'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['responsable'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['institucion'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['remitido']);
        
        $fil++;
    }
    $colum='A';


}

$objPHPExcel->getActiveSheet()->getDefaultStyle()->applyFromArray($alienacion);
$objPHPExcel->getActiveSheet()->getStyle('A1:AC1')->applyFromArray($style);
colorCelda('CCFFCC','A1:AC1');
$ancho=1;
    $ii='B';
    do{
        
        $objPHPExcel->getActiveSheet()->getColumnDimension($ii)->setAutoSize(true);
        if($ii=='AC'){
            
            $ancho=0;
        }
        $ii++;

    }
    while($ancho==1);

     
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
header('Content-Disposition: attachment;filename="SINTOMATICOS RESPIRATORIOS.xlsx"');
header('Cache-Control: max-age=0');

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
ob_clean();

$objWriter->save('php://output');
        
?>