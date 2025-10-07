<?php
header("Content-Type: text/html;charset=utf-8");
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);
ini_set('memory_limit', '-1');
define('EOL',(PHP_SAPI == 'cli') ? PHP_EOL : '<br />');

include_once '../DTO/resistenteFarmacos_DTO.php';
require_once '../PHPExcel/Classes/PHPExcel.php';
$mngLP = new resistenteFarmacos_DTO();
$data = $mngLP->listarPacientes();
$er=1;
do{
    
    $objPHPExcel = new PHPExcel();
    $objPHPExcel->getProperties()->setCreator("IDS")
                                ->setLastModifiedBy("SISTB")
                                ->setTitle("LIBRO PACIENTES RESISTENTES FARMACOS")
                                ->setSubject("LISTADO LIBRO PACIENTES")
                                ->setDescription("")
                                ->setKeywords("office PHPExcel php")
                                ->setCategory("IDS");
    $objPHPExcel->getActiveSheet()->setTitle("Libro resistentes farmacos");                             
    $colum='A';
    $objPHPExcel->setActiveSheetIndex(0)
                ->setCellValue($colum++.'1', 'Num')
                ->setCellValue($colum++.'1', 'tipo de caso')
                ->setCellValue($colum++.'1', 'año confirmacion caso')
                ->setCellValue($colum++.'1', 'ingresa tratamiento')
                ->setCellValue($colum++.'1', 'fecha ingreso tratamiento medicamento segunda linea')
                ->setCellValue($colum++.'1', 'nombres y apellidos')
                ->setCellValue($colum++.'1', 'tipo identificacion')
                ->setCellValue($colum++.'1', 'numero identificacion')
                ->setCellValue($colum++.'1', 'sexo')
                ->setCellValue($colum++.'1', 'edad')
                ->setCellValue($colum++.'1', 'unidad medidae edad')
                ->setCellValue($colum++.'1', 'entidad territorial')
                ->setCellValue($colum++.'1', 'municipio')
                ->setCellValue($colum++.'1', 'zona')
                ->setCellValue($colum++.'1', 'direccion')
                ->setCellValue($colum++.'1', 'barrio')
                ->setCellValue($colum++.'1', 'telefono')
                ->setCellValue($colum++.'1', 'regimen afiliacion')
                ->setCellValue($colum++.'1', 'aseguradora')
                ->setCellValue($colum++.'1', 'grupo poblacional')
                ->setCellValue($colum++.'1', 'grupo etnico')
                ->setCellValue($colum++.'1', 'pueblo indigena')
                ->setCellValue($colum++.'1', 'ocupacion')
                ->setCellValue($colum++.'1', 'factores de riesgo condiciones especiales')
                ->setCellValue($colum++.'1', 'coomorbilidades')
                ->setCellValue($colum++.'1', 'asesoria prueba voluntaria vih')
                ->setCellValue($colum++.'1', 'coinfeccion tb vih')
                ->setCellValue($colum++.'1', 'recibe tratamiento antirretroviral')
                ->setCellValue($colum++.'1', 'terapia preventiva tmpsmx cotrimoxazol')
                ->setCellValue($colum++.'1', 'tipo de tuberculosis')
                ->setCellValue($colum++.'1', 'localizacion de la forma estrapulmorar')
                ->setCellValue($colum++.'1', 'condicion de ingreso segun antecedentes medicamento recibido')
                ->setCellValue($colum++.'1', 'condicion ingreso')
                ->setCellValue($colum++.'1', 'fecha de resultado de la psf')
                ->setCellValue($colum++.'1', 'metodologia utilizada')
                ->setCellValue($colum++.'1', 's1wg')
                ->setCellValue($colum++.'1', 's4wg')
                ->setCellValue($colum++.'1', 'h01wg')
                ->setCellValue($colum++.'1', 'h04wg')
                ->setCellValue($colum++.'1', 'R')
                ->setCellValue($colum++.'1', 'e5wg')
                ->setCellValue($colum++.'1', 'e75wg')
                ->setCellValue($colum++.'1', 'z')
                ->setCellValue($colum++.'1', 'km')
                ->setCellValue($colum++.'1', 'am')
                ->setCellValue($colum++.'1', 'cm')
                ->setCellValue($colum++.'1', 'ofx')
                ->setCellValue($colum++.'1', 'lfx')
                ->setCellValue($colum++.'1', 'mfx')
                ->setCellValue($colum++.'1', 'eto')
                ->setCellValue($colum++.'1', 'cs')
                ->setCellValue($colum++.'1', 'otra')
                ->setCellValue($colum++.'1', 'otra')
                ->setCellValue($colum++.'1', 'clasificacion de la resistencia')
                ->setCellValue($colum++.'1', 'resistencia a')
                ->setCellValue($colum++.'1', 'semana confirmacion de caso')
                ->setCellValue($colum++.'1', 'ips manejo ambulatorio')
                ->setCellValue($colum++.'1', 'ips manejo especializado')
                ->setCellValue($colum++.'1', 'especialidad medica que atiende')
                ->setCellValue($colum++.'1', 'numero tratamientos recibidos')
                ->setCellValue($colum++.'1', 'antecedente tratamiento en siglas condicion ingreso año')
                ->setCellValue($colum++.'1', 'tipo esquema tratamiento actual')
                ->setCellValue($colum++.'1', 'inicial')
                ->setCellValue($colum++.'1', 'ajustetratamiento 1')
                ->setCellValue($colum++.'1', 'ajustetratamiento 2')
                ->setCellValue($colum++.'1', 'hatenido interuupciones')
                ->setCellValue($colum++.'1', 'dias de interupcion')
                ->setCellValue($colum++.'1', 'causa')
                ->setCellValue($colum++.'1', 'requirio hospitalizacion')
                ->setCellValue($colum++.'1', 'causas de hospitalizacion')
                ->setCellValue($colum++.'1', 'condicion actual')
                ->setCellValue($colum++.'1', 'fecha de actualizacion')
                ->setCellValue($colum++.'1', 'causa de egreso')
                ->setCellValue($colum++.'1', 'fecha de egreso')
                ->setCellValue($colum++.'1', 'observaciones')
                ->setCellValue($colum++.'1', 'responsable del dilegenciamiento')
                ->setCellValue($colum++.'1', 'importante msps')
                ->setCellValue($colum++.'1', 'observaciones ins')
                ->setCellValue($colum++.'1', 'listado d emsps')
                ->setCellValue($colum++.'1', 'sivigila')
                ->setCellValue($colum++.'1', 'Condicion de Ingreso Segun Tratamiento')
                ->setCellValue($colum++.'1', 'mes')
                ->setCellValue($colum++.'1', 'cultivo')
                ->setCellValue($colum++.'1', 'fecha cultivo')
                ->setCellValue($colum++.'1', 'bk')
                ->setCellValue($colum++.'1', 'fecha bk')
                ->setCellValue($colum++.'1', 'fecharesultadopsf')
                ->setCellValue($colum++.'1', 'metodologia')
                ->setCellValue($colum++.'1', 's1wg')
                ->setCellValue($colum++.'1', 's4wg')
                ->setCellValue($colum++.'1', 'h01wg')
                ->setCellValue($colum++.'1', 'h04wg')
                ->setCellValue($colum++.'1', 'r')
                ->setCellValue($colum++.'1', 'e5wg')
                ->setCellValue($colum++.'1', 'e75wg')
                ->setCellValue($colum++.'1', 'z')
                ->setCellValue($colum++.'1', 'km')
                ->setCellValue($colum++.'1', 'lfx')
                ->setCellValue($colum++.'1', 'mfx')
                ->setCellValue($colum++.'1', 'am')
                ->setCellValue($colum++.'1', 'eto')
                ->setCellValue($colum++.'1', 'cm')
                ->setCellValue($colum++.'1', 'ofx')
                ->setCellValue($colum++.'1', 'cs')
                ->setCellValue($colum++.'1', 'otra')
                ->setCellValue($colum++.'1', 'otra')
                ->setCellValue($colum++.'1', 'otra')
                ->setCellValue($colum++.'1', 'otra')
                ->setCellValue($colum++.'1', 'observaciones segimiento')
                ->setCellValue($colum++.'1', 'Se Realizo Prueba')
                ->setCellValue($colum++.'1', 'Resultado de la Fecha')
                ->setCellValue($colum++.'1', 'Fecha de Realizacion')
                ->setCellValue($colum++.'1', 'Prueba Confirmatoria Acorde a la Norma')
                ->setCellValue($colum++.'1', 'Fecha Realizacion Dx previo o Actual')
                ->setCellValue($colum++.'1', 'FECHA CONVERSION NEGATIVA')
                ->setCellValue($colum.'1', 'FECHA DE REVERSION POSITIVA');

    $colum='A';
    $fil=2;

    //$objPHPExcel->setTitle('Libro Pacientes');

    $cantiLP=intVal(count($data['DATA']));
            
    for($t=0;$t<$cantiLP;$t++){
        $colum='A';
        $objPHPExcel->setActiveSheetIndex(0)
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['num'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['tipocaso'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['anoconfirmacioncaso'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['ingresatratamiento'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['fechaingresotratamientomedicamentosegundalinea'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['nombresyapellidos'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['tipoidentificacion'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['numeroidentificacion'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['sexo'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['edad'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['unidadmedidaedad'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['entidadterritorial'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['municipio'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['zona'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['direccion'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['barrio'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['telefono'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['regimenafiliacion'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['aseguradora'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['grupopoblacional'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['grupoetnico'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['puebloindigena'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['ocupacion'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['factoresderiesgocondicionesespeciales'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['coomorbilidades'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['asesoriapruebavoluntariavih'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['coinfecciontbvih'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['recibetratamientoantirretroviral'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['terapiapreventivatmpsmxcotrimoxazol'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['tipotoberculosis'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['localizaciondelaformaestrapulmorar'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['condiciondeingresosegunantecedentesmedicamentorecibido'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['condicioningreso'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['fechaderesultadodelapsf'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['metodologiautilizada'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['s1wg'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['s4wg'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['h01wg'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['h04wg'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['r'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['e5wg'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['e75wg'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['z'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['km'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['am'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['cm'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['ofx'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['lfx'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['mfx'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['eto'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['cs'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['otra1'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['otra2'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['clasificaciondelaresistencia'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['resistenciaa'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['semanaconfirmaciondecaso'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['ipsmanejoambulatorio'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['ipsmanejoespecializado'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['especialidadmedicaqueatiende'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['numerotratamientosrecibidos'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['antecedentetratamientoensiglascondicioningresoano'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['tipoesquematratamientoactual'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['inicial'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['ajustetratamiento1'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['ajustetratamiento2'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['hatenidointeruupciones'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['diasdeinterupcion'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['causa'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['requiriohospitalizacion'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['causasdehospitalizacion'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['condicionactual'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['fechadeactualizacion'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['causadeegreso'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['fechadeegreso'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['observaciones'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['responsabledeldilegenciamiento'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['importantemsps'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['observacionesins'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['listadodemsps'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['sivigila'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['condicioningresoseguntratamiento'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['mes'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['cultivo'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['fechacultivo'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['bk'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['fechabk'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['fecharesultadopsf2'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['metodologia2'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['s1wg2'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['s4wg2'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['h01wg2'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['h04wg2'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['r2'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['e5wg2'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['e75wg2'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['z2'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['km2'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['lfx2'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['mfx2'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['am2'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['eto2'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['cm2'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['ofx2'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['cs2'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['otra21'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['otra22'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['otra23'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['otra24'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['observacionessegimiento'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['serealizoprueba'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['resultadoprueba'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['fecharealizacion'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['pruebaconfirmatoriaacordealanorma'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['fecharealizaciondxpreviooactual']) 
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['fechaconversionnegativa'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['fechadereversionpositiva']);
        
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
    $objPHPExcel->getActiveSheet()->getStyle('A1:DL1')->applyFromArray($style);
    colorCelda('CCFFCC','A1:DL1');
    $ancho=1;
    $ii='B';
    do{
        
        $objPHPExcel->getActiveSheet()->getColumnDimension($ii)->setAutoSize(true);
        if($ii=='DL'){
            
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
header('Content-Disposition: attachment;filename="LIBRO PACIENTES RESISTENTES FARMACOS.xlsx"');
header('Cache-Control: max-age=0');

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
ob_clean();

$objWriter->save('php://output');
        