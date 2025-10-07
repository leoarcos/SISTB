<?php
require_once '../PHPExcel/Classes/PHPExcel.php';
 
require_once '../PHPExcel/Classes/PHPExcel/Cell/AdvancedValueBinder.php';

header("Content-Type: text/html;charset=utf-8");
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);
ini_set('memory_limit', '-1');
define('EOL',(PHP_SAPI == 'cli') ? PHP_EOL : '<br />');


include_once '../DTO/quimioprofilaxis_DTO.php';

PHPExcel_Cell::setValueBinder( new PHPExcel_Cell_AdvancedValueBinder() );
  
$mngLP = new quimioprofilaxis_DTO();
$data = $mngLP->listarQuimioprofilaxis007($_GET['ano']);
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
            'style' => PHPExcel_Style_Border::BORDER_MEDIUM
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
                                ->setTitle("QUIMIOPROFILAXIS")
                                ->setSubject("LISTADO QUIMIOPROFILAXIS")
                                ->setDescription("")
                                ->setKeywords("office PHPExcel php")
                                ->setCategory("IDS");
    $objPHPExcel->getActiveSheet()->setTitle("QUIMIOPROFILAXIS");                             
    $colum='A';
    $objPHPExcel->setActiveSheetIndex(0)
                ->setCellValue($colum++.'1', 'No')
                ->setCellValue($colum++.'1', 'DEPARTAMENTO')
                ->setCellValue($colum++.'1', 'MUNICIPIO')
                ->setCellValue($colum++.'1', 'IPS')
                ->setCellValue($colum++.'1', 'TRIMESTRE DEL AÑO')
                ->setCellValue($colum++.'1', 'FECHA DE INICIO DE LA QUIMIOPROFILAXIS (dd/mm/aaaa)')
                ->setCellValue($colum++.'1', 'NOMBRE')
                ->setCellValue($colum++.'1', 'PRIMER APELLIDO')
                ->setCellValue($colum++.'1', 'SEGUNDO APELLIDO')
                ->setCellValue($colum++.'1', 'SEXO') 
                ->setCellValue($colum++.'1', 'EDAD') 
                ->setCellValue($colum++.'1', 'TIPO DE ID')
                ->setCellValue($colum++.'1', 'No ID')
                ->setCellValue($colum++.'1', 'PERTENENCIA ÉTNICA')
                ->setCellValue($colum++.'1', 'PUEBLO INDÍGENA')
                ->setCellValue($colum++.'1', 'GRUPO POBLACIONAL')
                ->setCellValue($colum++.'1', 'DIRECCIÓN')
                ->setCellValue($colum++.'1', 'TELÉFONO')
                ->setCellValue($colum++.'1', 'BARRIO')
                ->setCellValue($colum++.'1', 'COMUNA/LOCALIDAD')
                ->setCellValue($colum++.'1', 'RÉGIMEN DE AFILIACIÓN')
                ->setCellValue($colum++.'1', 'EAPB')
                ->setCellValue($colum++.'1', 'SE REALIZÓ PPD')
                ->setCellValue($colum++.'1', 'RESULTADO EN mm')//PPD
                ->setCellValue($colum++.'1', 'CRITERIO POR EL CUAL SE ADMINISTRA TPI')
                ->setCellValue($colum++.'1', 'CUANTOS MESES DE TPI RECIBÍO')
                ->setCellValue($colum++.'1', 'OBSERVACIONES')
                ->setCellValue($colum++.'1', '1')
                ->setCellValue($colum++.'1', '2')
                ->setCellValue($colum++.'1', '3')
                ->setCellValue($colum++.'1', '4')
                ->setCellValue($colum++.'1', '5')
                ->setCellValue($colum++.'1', '6')
                ->setCellValue($colum++.'1', '7')
                ->setCellValue($colum++.'1', '8')
                ->setCellValue($colum++.'1', '9')
                ->setCellValue($colum++.'1', 'CONDICIÓN DE EGRESO');

    $colum='A';
    $fil=2;
    $cantidad=intVal(count($data['DATA']));
    for ($t=0;$t<$cantidad; $t++){
        $colum='A';
        
        $nombres=explode(" ",$data['DATA'][$t]['nombresapellidos']);
        if(isset($nombres[3])){

            $nombrescomp=$nombres[0].' '.$nombres[1];
            $pappe=$nombres[2];
            $sappe=$nombres[3];

        }else{
            $nombrescomp=$nombres[0];
            $pappe=$nombres[1];
            $sappe=$nombres[2];

        }
       $menos=($data['DATA'][$t]['menor']==0)?'AÑOS':'MESES';
        
        $objPHPExcel->setActiveSheetIndex(0)
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['num'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['entidadterritorial'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['municipio'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['ipsiniciamanejo'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['trimestre'])
                ->setCellValue($colum++.''.strval($fil), ' '.strval($data['DATA'][$t]['fechaingreso']).'  ')
                ->setCellValue($colum++.''.strval($fil), $nombrescomp)
                ->setCellValue($colum++.''.strval($fil), $pappe)
                ->setCellValue($colum++.''.strval($fil), $sappe)
                ->setCellValue($colum++.''.strval($fil), ' '.strval($data['DATA'][$t]['sexo']).'  ')
                ->setCellValue($colum++.''.strval($fil), ' '.strval($data['DATA'][$t]['edad']).' '.$menos)
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['tipoidentificacion'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['identificacion'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['etnia'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['puebloindigena'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['grupopoblacional'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['direccion'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['telefono'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['barrio'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['comuna'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['regimen'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['entidad'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['serealizoppd'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['mediosapoyodiagnosticoppd']." mm")
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['criterioadministratpi'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['cuantosmesestpirecibe'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['observacionesformatoids'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['controlevolucionmedica1'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['controlevolucionmedica2'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['controlevolucionmedica3'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['controlevolucionmedica4'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['controlevolucionmedica5'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['controlevolucionmedica6'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['controlevolucionmedica7'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['controlevolucionmedica8'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['controlevolucionmedica9'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['condicionegreso']);
                 
         
        $fil++;
    }
    $colum='A';


}

$objPHPExcel->getActiveSheet()->getDefaultStyle()->applyFromArray($alienacion);
$objPHPExcel->getActiveSheet()->getStyle('A1:AK1')->applyFromArray($style);
colorCelda('CCFFCC','A1:AK1');

$objPHPExcel->getActiveSheet()->getRowDimension('1')->setRowHeight(40);
$ancho=1;
    $ii='B';
    do{
        
        $objPHPExcel->getActiveSheet()->getColumnDimension($ii)->setAutoSize(true);
        if($ii=='AK'){
            
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
header('Content-Disposition: attachment;filename="Quimioprofilaxis.xlsx"');
header('Cache-Control: max-age=0');

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
ob_clean();

$objWriter->save('php://output');
        
?>