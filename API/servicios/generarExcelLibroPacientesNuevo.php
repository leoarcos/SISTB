<?php
header("Content-Type: text/html;charset=utf-8");
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);
ini_set('memory_limit', '-1');
define('EOL',(PHP_SAPI == 'cli') ? PHP_EOL : '<br />');

include_once '../DTO/libroPacientes_DTO.php';
require_once '../PHPExcel/Classes/PHPExcel.php';
$mngLP = new libroPacientes_DTO();
$data = $mngLP->ListarPacientes();
$er=1;
$ii=0;

//print_r($data['DATA']);
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
            ->setCellValue($colum++.'1', 'Fecha de Reporte VIH')
            ->setCellValue($colum++.'1', 'Prueba de Sencibilidad a Farmacos')
            ->setCellValue($colum++.'1', 'Fecha Inicio Taes')
            ->setCellValue($colum++.'1', 'Fecha 2do BK')
            ->setCellValue($colum++.'1', 'Fecha 4To BK')
            ->setCellValue($colum++.'1', 'Fecha 6To BK')
            ->setCellValue($colum++.'1', 'Fecha 9no BK')
            ->setCellValue($colum++.'1', 'Control Medico 2 Mes')
            ->setCellValue($colum++.'1', 'Fecha Control Medico 2 Mes')
            ->setCellValue($colum++.'1', 'Observaciones Control Medico 2 Mes')
            ->setCellValue($colum++.'1', 'Control Medico 4 Mes')
            ->setCellValue($colum++.'1', 'Fecha Control Medico 4 Mes')
            ->setCellValue($colum++.'1', 'Observaciones Control Medico 4 Mes')
            ->setCellValue($colum++.'1', 'Control Medico 6 Mes')
            ->setCellValue($colum++.'1', 'Fecha Control Medico 6 Mes')
            ->setCellValue($colum++.'1', 'Observaciones Control Medico 6 Mes')
            ->setCellValue($colum++.'1', 'Control por Enfermeria 1 Mes')
            ->setCellValue($colum++.'1', 'Fecha de Control por Enfermeria 1 Mes')
            ->setCellValue($colum++.'1', 'Observaciones del Control por Enfermeria 1 Mes')
            ->setCellValue($colum++.'1', 'Control por Enfermeria 3 Mes')
            ->setCellValue($colum++.'1', 'Fecha de Control por Enfermeria 3 Mes')
            ->setCellValue($colum++.'1', 'Observaciones del Control por Enfermeria 3 Mes')
            ->setCellValue($colum++.'1', 'Control por Enfermeria 5 Mes')
            ->setCellValue($colum++.'1', 'Observaciones del Control por Enfermeria 5 Mes')
            ->setCellValue($colum++.'1', 'Tipo de Confirmación Bacteriológica')
            ->setCellValue($colum++.'1', 'Fecha de Finalizacion Tratamiento')
            ->setCellValue($colum++.'1', 'Observaciones al finalizar tratamiento')
            ->setCellValue($colum.'1', 'Se Realizo Prueba ');

$colum='A';
$fil=2;
/*
for($i=0;$i<count($data['DATA']);$i++){

    print_r($data['DATA'][$i]);
    echo "<hr>";
}


*/
$cantiLP=intVal(count($data['DATA']));
            
    for($t=0;$t<$cantiLP;$t++){
        $colum='A';
        $objPHPExcel->setActiveSheetIndex(0)
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['num'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['entidadterritorial'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['municipionotifica'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['ipsinicia'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['ipscontinua'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['trimestre'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['fechainiciodesintomas'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['ingresaatratamiento'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['fechainiciotaes'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['nombresyapellidos'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['sexo'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['edad'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['tipoidentificacion'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['identificacion'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['etnia'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['puebloindigena'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['grupopoblacional'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['direccion'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['telefono'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['comuna'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['regimen'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['epsars']);

                if($data['DATA'][$t]['tipotb']=="LARINGEA" || $data['DATA'][$t]['tipotb']=="MILIAR" || $data['DATA'][$t]['tipotb']=="PULMONAR"){

                    $objPHPExcel->setActiveSheetIndex(0)
                                ->setCellValue($colum++.''.strval($fil), 'PULMONAR')
                                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['tipotb']);
                }else if($data['DATA'][$t]['tipotb']==null || $data['DATA'][$t]['tipotb']=='' ){
                    $objPHPExcel->setActiveSheetIndex(0)
                                ->setCellValue($colum++.''.strval($fil), '')
                                ->setCellValue($colum++.''.strval($fil), '');
                }else{
        
                    
                    $objPHPExcel->setActiveSheetIndex(0)
                        ->setCellValue($colum++.''.strval($fil), 'EXTRAPULMONAR')
                        ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['tipotb']);
                        
                }
                    $objPHPExcel->setActiveSheetIndex(0)
                                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['condicioningreso'])
                                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['fdrbreporte'])
                                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['fdrbfecha'])
                                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['fdrcreporte'])
                                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['fdrcfecha'])
                                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['pruebamolecular'])
                                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['fechapruebamolecular'])
                                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['coinfeccionvihconsejeria'])
                                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['coinfeccionvihwb'])
                                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['serealizoprueba'])
                                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['pruebatamisaje'])
                                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['fechadereportevih'])
                                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['coinfeccionvihwb'])
                                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['vihtarv'])
                                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['recibetratamientopreventivo'])
                                ->setCellValue($colum++.''.strval($fil), 'SI');
                
        
        $fil++;
    
    }
 
header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
header('Content-Disposition: attachment;filename="LIBRO PACIENTES.xlsx"');
header('Cache-Control: max-age=0');

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
ob_clean();

$objWriter->save('php://output');
        