<?php
require_once '../PHPExcel/Classes/PHPExcel.php';
 
require_once '../PHPExcel/Classes/PHPExcel/Cell/AdvancedValueBinder.php';

header("Content-Type: text/html;charset=utf-8");
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);
ini_set('memory_limit', '-1');
define('EOL',(PHP_SAPI == 'cli') ? PHP_EOL : '<br />');


include_once '../DTO/app_DTO.php';

PHPExcel_Cell::setValueBinder( new PHPExcel_Cell_AdvancedValueBinder() );
  
$mngLP = new app_DTO();
$data = $mngLP->consultaIndependiente($_GET['sql']);
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
                                ->setTitle("QUIMIOPROFILAXIS")
                                ->setSubject("LISTADO QUIMIOPROFILAXIS")
                                ->setDescription("")
                                ->setKeywords("office PHPExcel php")
                                ->setCategory("IDS");
    $objPHPExcel->getActiveSheet()->setTitle("QUIMIOPROFILAXIS");                             
    $colum='A';
    $objPHPExcel->setActiveSheetIndex(0)
                ->setCellValue($colum++.'1', 'Num')
                ->setCellValue($colum++.'1', 'Trimestre')
                ->setCellValue($colum++.'1', 'Fecha Ingreso')
                ->setCellValue($colum++.'1', 'Nombres y Apellidos')
                ->setCellValue($colum++.'1', 'Edad')
                ->setCellValue($colum++.'1', 'Menor')
                ->setCellValue($colum++.'1', 'Sexo') 
                ->setCellValue($colum++.'1', 'Etnia')
                ->setCellValue($colum++.'1', 'Identificacion')
                ->setCellValue($colum++.'1', 'Direccion')
                ->setCellValue($colum++.'1', 'Regimen')
                ->setCellValue($colum++.'1', 'Entidad')
                ->setCellValue($colum++.'1', 'Medios de Apoyo Diagnostico BK')
                ->setCellValue($colum++.'1', 'Medios Apoyo Diagnostico Cultivo')
                ->setCellValue($colum++.'1', 'Medios Apoyo Diagnostico PPD')
                ->setCellValue($colum++.'1', 'Medios Apoyo Diagnostico Clinico')
                ->setCellValue($colum++.'1', 'Medios Apoyo Diagnostico RX')
                ->setCellValue($colum++.'1', 'Medios Apoyo Diagnostico Nexo Epidemiológico ')
                ->setCellValue($colum++.'1', 'Dosis Autorizada Especialista')
                ->setCellValue($colum++.'1', 'Control Evolucion Medica 1')
                ->setCellValue($colum++.'1', 'Control Evolucion Medica 2')
                ->setCellValue($colum++.'1', 'Control Evolucion Medica 3')
                ->setCellValue($colum++.'1', 'Control Evolucion Medica 4')
                ->setCellValue($colum++.'1', 'Control Evolucion Medica 5')
                ->setCellValue($colum++.'1', 'Control Evolucion Medica 6')
                ->setCellValue($colum++.'1', 'Control Evolucion Medica 7')
                ->setCellValue($colum++.'1', 'Control Evolucion Medica 8')
                ->setCellValue($colum++.'1', 'Control Evolucion Medica 9')
                ->setCellValue($colum++.'1', 'Observaciones Formato MSPS')
                ->setCellValue($colum++.'1', 'Departamento')
                ->setCellValue($colum++.'1', 'Municipio')
                ->setCellValue($colum++.'1', 'Ubicación Geográfica ')
                ->setCellValue($colum++.'1', 'Ips Inicia Manejo')
                ->setCellValue($colum++.'1', 'Ips Contunua Manejo')
                ->setCellValue($colum++.'1', 'Observaciones Formato IDS')
                ->setCellValue($colum++.'1', 'Año')
                ->setCellValue($colum++.'1', 'Tarjeta de Tratamiento')
                ->setCellValue($colum++.'1', 'Tipo de Identificación')
                ->setCellValue($colum++.'1', 'Pueblo Indigena')
                ->setCellValue($colum++.'1', 'Telefono')
                ->setCellValue($colum++.'1', 'Barrio')
                ->setCellValue($colum++.'1', 'Comuna')
                ->setCellValue($colum++.'1', 'Criterio TPI')
                ->setCellValue($colum++.'1', 'Cuantos Meses Recibe TPI')
                ->setCellValue($colum++.'1', 'Realizo PPD')
                ->setCellValue($colum++.'1', 'Grupo Poblacional')
                ->setCellValue($colum++.'1', 'Condición de Egreso');

    $colum='A';
    $fil=2;
    $cantidad=intVal(count($data['DATA']));
    for ($t=0;$t<$cantidad; $t++){
        $colum='A';
        $objPHPExcel->setActiveSheetIndex(0)
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['num'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['trimestre'])
                ->setCellValue($colum++.''.strval($fil), ' '.strval($data['DATA'][$t]['fechaingreso']).'  ')
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['nombresapellidos'])
                ->setCellValue($colum++.''.strval($fil), ' '.strval($data['DATA'][$t]['edad']).'  ') 
                ->setCellValue($colum++.''.strval($fil), ($data['DATA'][$t]['menor']==0)?'AÑOS':'MESES')
                ->setCellValue($colum++.''.strval($fil), ' '.strval($data['DATA'][$t]['sexo']).'  ')
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['etnia'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['identificacion'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['direccion'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['regimen'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['entidad'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['mediosapoyodiagnosticobk'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['mediosapoyodiagnosticocultivo'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['mediosapoyodiagnosticoppd'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['mediosapoyodiagnosticoclinico'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['mediosapoyodiagnosticorx'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['mediosapoyodiagnosticonexoepidemiologico'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['dosisautorizadaespecialista'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['controlevolucionmedica1'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['controlevolucionmedica2'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['controlevolucionmedica3'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['controlevolucionmedica4'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['controlevolucionmedica5'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['controlevolucionmedica6'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['controlevolucionmedica7'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['controlevolucionmedica8'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['controlevolucionmedica9'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['observacionesformatomsps'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['entidadterritorial'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['municipio'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['ubicaciongeograica'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['ipsiniciamanejo'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['ipscontunuamanejo'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['observacionesformatoids'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['ano'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['tarjetatratamiento'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['tipoidentificacion'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['puebloindigena'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['telefono'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['barrio'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['comuna'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['criterioadministratpi'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['cuantosmesestpirecibe'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['serealizoppd'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['grupopoblacional'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['condicionegreso']);
                 
         
        $fil++;
    }
    $colum='A';


}

$objPHPExcel->getActiveSheet()->getDefaultStyle()->applyFromArray($alienacion);
$objPHPExcel->getActiveSheet()->getStyle('A1:AU1')->applyFromArray($style);
colorCelda('CCFFCC','A1:AU1');
$ancho=1;
    $ii='B';
    do{
        
        $objPHPExcel->getActiveSheet()->getColumnDimension($ii)->setAutoSize(true);
        if($ii=='AU'){
            
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