<?php
header("Content-Type: text/html;charset=utf-8");
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);
ini_set('memory_limit', '-1');
define('EOL',(PHP_SAPI == 'cli') ? PHP_EOL : '<br />');

include_once '../DTO/app_DTO.php';
require_once '../PHPExcel/Classes/PHPExcel.php';
$mngLP = new app_DTO();
$data = $mngLP->consultaIndependiente($_GET['sql']);
$er=1;

do{
    
    $objPHPExcel = new PHPExcel();
    $objPHPExcel->getProperties()->setCreator("IDS")
                                ->setLastModifiedBy("SISTB")
                                ->setTitle("LIBRO PACIENTES")
                                ->setSubject("LISTADO LIBRO PACIENTES")
                                ->setDescription("")
                                ->setKeywords("office PHPExcel php")
                                ->setCategory("IDS");
    $objPHPExcel->getActiveSheet()->setTitle("Libro Pacientes");                             
    $colum='A';
    $objPHPExcel->setActiveSheetIndex(0)
                ->setCellValue($colum++.'1', 'Num')
                ->setCellValue($colum++.'1', 'Fecha de Ingreso')
                ->setCellValue($colum++.'1', 'Trimestre')
                ->setCellValue($colum++.'1', 'Nombres y Apellidos')
                ->setCellValue($colum++.'1', 'Identificación')
                ->setCellValue($colum++.'1', 'Étnia')
                ->setCellValue($colum++.'1', 'Municipio')
                ->setCellValue($colum++.'1', 'Dirección')
                ->setCellValue($colum++.'1', 'Régimen')
                ->setCellValue($colum++.'1', 'EPS/ARS')
                ->setCellValue($colum++.'1', 'Sexo')
                ->setCellValue($colum++.'1', 'Edad')
                ->setCellValue($colum++.'1', 'TipoTB')
                ->setCellValue($colum++.'1', 'Condición de Ingreso')
                ->setCellValue($colum++.'1', 'Fecha de la Baciloscopia')
                ->setCellValue($colum++.'1', 'Diagnostico y Reporte de la Baciloscopia')
                ->setCellValue($colum++.'1', 'Fecha del Cultivo')
                ->setCellValue($colum++.'1', 'Reporte del Cultivo')
                ->setCellValue($colum++.'1', 'Consejeria-VIH')
                ->setCellValue($colum++.'1', 'Coinfeccion vih W-B')
                ->setCellValue($colum++.'1', 'Condicion Egreso')
                ->setCellValue($colum++.'1', 'Observaciones')
                ->setCellValue($colum++.'1', 'Año')
                ->setCellValue($colum++.'1', 'Control 2')
                ->setCellValue($colum++.'1', 'Control 4')
                ->setCellValue($colum++.'1', 'Control 6')
                ->setCellValue($colum++.'1', 'Control 9') 
                ->setCellValue($colum++.'1', 'Ocupación')
                ->setCellValue($colum++.'1', 'Ubicación Geográfica')
                ->setCellValue($colum++.'1', 'Ips Inicia')
                ->setCellValue($colum++.'1', 'Ips Continua')
                ->setCellValue($colum++.'1', 'Otro Criterio Medio Diagnostico')
                ->setCellValue($colum++.'1', 'Patología Asociada')
                ->setCellValue($colum++.'1', 'Periodo Epidemiológico Pertenece')
                ->setCellValue($colum++.'1', 'Semana epidemiológica Pertenece')
                ->setCellValue($colum++.'1', 'Fecha Investigación Epidemiológica ')
                ->setCellValue($colum++.'1', 'Fecha Ajuste Investigación Epidemiológica')
                ->setCellValue($colum++.'1', 'Contactos Inscrito')
                ->setCellValue($colum++.'1', 'Contacto Sintomático Respiratorio')
                ->setCellValue($colum++.'1', 'Contacto Analizado')
                ->setCellValue($colum++.'1', 'Contacto Positivo')
                ->setCellValue($colum++.'1', 'Mes Revisión Indirecta LSPD')
                ->setCellValue($colum++.'1', 'Fecha Reporte Cultivo')
                ->setCellValue($colum++.'1', 'Resultado Cultivo')
                ->setCellValue($colum++.'1', 'Fecha Reporte PSF')
                ->setCellValue($colum++.'1', 'Resistente A')
                ->setCellValue($colum++.'1', 'VIH TARV')
                ->setCellValue($colum++.'1', 'menor')
                ->setCellValue($colum++.'1', 'Sivigila Programa')
                ->setCellValue($colum++.'1', 'Fecha de Diagnostico')
                ->setCellValue($colum++.'1', 'Tipo de Identificación')
                ->setCellValue($colum++.'1', 'Pueblo Indígena')
                ->setCellValue($colum++.'1', 'Grupo Poblacional')
                ->setCellValue($colum++.'1', 'Entidad Territorial')
                ->setCellValue($colum++.'1', 'Sector Vivienda')
                ->setCellValue($colum++.'1', 'Numero Telefónico ')
                ->setCellValue($colum++.'1', 'Tipo de Muestra')
                ->setCellValue($colum++.'1', 'Ubicacion de la Vivienda')
                ->setCellValue($colum++.'1', 'Peso')
                ->setCellValue($colum++.'1', 'Talla')
                ->setCellValue($colum++.'1', 'Comuna')
                ->setCellValue($colum++.'1', 'Prueba de Tamizaje')
                ->setCellValue($colum++.'1', 'Diagnostico Previo de VIH')
                ->setCellValue($colum++.'1', 'Recibe Tratamiento preventivo')
                ->setCellValue($colum++.'1', 'Existe Coinfeccion TB/VIH')
                ->setCellValue($colum++.'1', 'Resultado de PSF')
                ->setCellValue($colum++.'1', 'País')
                ->setCellValue($colum++.'1', 'Realiza Prueba de Tamizaje')
                ->setCellValue($colum++.'1', 'Realiza Investigación')
                ->setCellValue($colum++.'1', 'Municipio que Notifica')
                ->setCellValue($colum++.'1', 'Fecha de Inicio de Sintomas')
                ->setCellValue($colum++.'1', 'Fecha confirmatoria wb')
                ->setCellValue($colum++.'1', 'Ingresa a Tratamiento')
                ->setCellValue($colum++.'1', 'Prueba Molecular')
                ->setCellValue($colum++.'1', 'Fecha de la Prueba Molecular')
                ->setCellValue($colum++.'1', 'Prueba de Susceptibilidad a Farmacos')
                ->setCellValue($colum++.'1', 'Fecha de Egreso')
                ->setCellValue($colum++.'1', 'Cultivo al Final del Tratamiento')
                ->setCellValue($colum++.'1', 'Fecha del Cultivo al Final del Tratamiento')
                ->setCellValue($colum++.'1', 'Fecha de Reporte VIH');

    $colum='A';
    $fil=2;

    //$objPHPExcel->setTitle('Libro Pacientes');

    $cantiLP=intVal(count($data['DATA']));
            
    for($t=0;$t<$cantiLP;$t++){
        $colum='A';
        $objPHPExcel->setActiveSheetIndex(0)
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['num'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['fechaingreso'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['trimestre'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['nombresyapellidos'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['identificacion'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['etnia'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['municipio'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['direccion'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['regimen'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['epsars'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['sexo'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['edad'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['tipotb'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['condicioningreso'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['fdrbfecha'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['fdrbreporte'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['fdrcfecha'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['fdrcreporte'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['coinfeccionvihconsejeria'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['coinfeccionvihwb'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['condicionegreso'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['observaciones'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['ano'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['controltratamiento2'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['controltratamiento4'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['controltratamiento6'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['bk9mes'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['ocupacion'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['ubicaciongeografica'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['ipsinicia'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['ipscontinua'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['otrocriteriomediodiagnostico'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['patologiaasociada'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['periodoepidepertenece'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['semanaepidepertenece'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['fechainvestigacionepide'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['fechaajusteinvestigacionepide'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['contactosinscrito'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['contactosistomaticorespiratorio'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['contactoanalizado'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['contactopositivo'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['mesrevicionindirectalspd'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['fechareportecultivo'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['resultadocultivo'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['fechareportepsf'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['resistentea'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['vihtarv'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['menor'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['sivigilaprograma'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['fechadiagnostico'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['tipoidentificacion'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['puebloindigena'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['grupopoblacional'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['entidadterritorial'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['sector'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['telefono'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['tipomuestra'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['sectores'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['peso'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['talla'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['comuna'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['pruebatamisaje'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['diagnosticopreviovih'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['recibetratamientopreventivo'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['existecoinfecciontbvih'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['resultadodepsf'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['pais'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['realizapruebadetamisaje'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['realizainvestigacion'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['municipionotifica'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['fechainiciodesintomas'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['fechaconfirmatoriawb'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['ingresaatratamiento'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['pruebamolecular'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['fechapruebamolecular'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['pruebadesusceptibilidadafarmacos'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['fechadeegreso'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['cultivoalfinaltratamiento'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['fechacultivoalfinaltratamiento'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['fechadereportevih']);
        
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
            'name'  => 'Verdana'
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
    $objPHPExcel->getActiveSheet()->getStyle('A1:CB1')->applyFromArray($style);
    colorCelda('CCFFCC','A1:CB1');
    $ancho=1;
    $ii='B';
    do{
        
        $objPHPExcel->getActiveSheet()->getColumnDimension($ii)->setAutoSize(true);
        if($ii=='CB'){
            
            $ancho=0;
        }
        $ii++;

    }
    while($ancho==1);

    

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
header('Content-Disposition: attachment;filename="LIBRO PACIENTES - CONSULTA MULTIPLE.xlsx"');
header('Cache-Control: max-age=0');

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
ob_clean();

$objWriter->save('php://output');
  