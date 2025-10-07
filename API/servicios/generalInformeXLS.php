<?php
header("Content-Type: text/html;charset=utf-8");
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);
ini_set('memory_limit', '-1');
define('EOL',(PHP_SAPI == 'cli') ? PHP_EOL : '<br />');

require_once '../PHPExcel/Classes/PHPExcel.php'; 
include_once '../DTO/app_DTO.php';
$mngLP = new app_DTO();
 
$trime=$_GET['trimestre'];
$ano=$_GET['ano'];
$mnpo=$_GET['mnpo'];
$dpto=$_GET['dpto'];
$ipsinicia=$_GET['ipsinicia'];
$ipscontinua=$_GET['ipsContinua'];
$aseguradora=$_GET['aseguradora'];
$fechas=str_split($_GET['fechaInforme']);
$dia=strval($fechas[8].$fechas[9]);
$mes=strval($fechas[5].$fechas[6]);
$ano=strval($fechas[0].$fechas[1].$fechas[2].$fechas[3]);
$scm=$_GET['scm'];
$scf=$_GET['scf'];
$consultavih=$_GET['consultavih'];
 
 
//$data = $mngLP->consultaIndependiente($sql);

  
PHPExcel_Cell::setValueBinder(new PHPExcel_Cell_AdvancedValueBinder());
 
//print_r($data);
 
$objPHPExcel = new PHPExcel();
$objPHPExcel = PHPExcel_IOFactory::load("../PHPEXCEL/EXCEL/plantillaInformeXLS.xlsx");
$objPHPExcel->getProperties()->setCreator("IDS")
                            ->setLastModifiedBy("SISTB")
                            ->setTitle("INFORME TRIMESTRAL")
                            ->setSubject("LISTADO AUTORIZACIONES")
                            ->setDescription("")
                            ->setKeywords("ids INFORME")
                            ->setCategory("IDS");
$objPHPExcel->getActiveSheet()->setTitle("INFORME TRIMESTRAL");   



$objPHPExcel->setActiveSheetIndex(0)
                                ->setCellValue('A3', "NORTE DE SANTANDER - ".$_GET['mnpo'])
                                ->setCellValue('F4', $trime)
                                ->setCellValue('Q4', $ano)
                                ->setCellValue('S5', $dia)
                                ->setCellValue('U5', $mes)
                                ->setCellValue('W5', $ano);              
                                
$contadorFila=10;
$colum='E';
$contadorTotal=0;

//M1
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralah1 where ".$scm." and menor='1'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F1
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralah1 where ".$scf." and menor='1'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M2
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralah1 where ".$scm." and menor='0'  and edad between '1' and '4'");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F2
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralah1 where ".$scf." and menor='0'  and edad between '1' and '4'");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M3
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralah1 where ".$scm." and menor='0'  and edad between '5' and '14'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F3
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralah1 where ".$scf." and menor='0'  and edad between '5' and '14' ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M4
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralah1 where ".$scm." and menor='0'  and edad between '15' and '24'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F4
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralah1 where ".$scf." and menor='0'  and edad between '15' and '24'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M5
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralah1 where ".$scm." and menor='0'  and edad between '25' and '34' ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F5
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralah1 where ".$scf." and menor='0'  and edad between '25' and '34' ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M6
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralah1 where ".$scm." and menor='0'  and edad between '35' and '44'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F6
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralah1 where ".$scf." and menor='0'  and edad between '35' and '44'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M7
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralah1 where ".$scm." and menor='0'  and edad between '45' and '54'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F7
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralah1 where ".$scf." and menor='0'  and edad between '45' and '54'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M8
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralah1 where ".$scm." and menor='0'  and edad between '55' and '64'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F8
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralah1 where ".$scf." and menor='0'  and edad between '55' and '64'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M9
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralah1 where ".$scm." and menor='0'  and edad between '65' and '200'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F9
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralah1 where ".$scf." and menor='0'  and edad between '65' and '200' ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila++, $data['DATA'][0]['cantidad']);
 

$colum='E';

//M1
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralbh1 where ".$scm." and menor='1'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F1
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralbh1 where ".$scf." and menor='1'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M2
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralbh1 where ".$scm." and menor='0'  and edad between '1' and '4'");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F2
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralbh1 where ".$scf." and menor='0'  and edad between '1' and '4'");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M3
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralbh1 where ".$scm." and menor='0'  and edad between '5' and '14'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F3
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralbh1 where ".$scf." and menor='0'  and edad between '5' and '14' ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M4
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralbh1 where ".$scm." and menor='0'  and edad between '15' and '24'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F4
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralbh1 where ".$scf." and menor='0'  and edad between '15' and '24'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M5
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralbh1 where ".$scm." and menor='0'  and edad between '25' and '34' ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F5
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralbh1 where ".$scf." and menor='0'  and edad between '25' and '34' ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M6
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralbh1 where ".$scm." and menor='0'  and edad between '35' and '44'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F6
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralbh1 where ".$scf." and menor='0'  and edad between '35' and '44'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M7
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralbh1 where ".$scm." and menor='0'  and edad between '45' and '54'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F7
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralbh1 where ".$scf." and menor='0'  and edad between '45' and '54'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M8
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralbh1 where ".$scm." and menor='0'  and edad between '55' and '64'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F8
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralbh1 where ".$scf." and menor='0'  and edad between '55' and '64'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M9
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralbh1 where ".$scm." and menor='0'  and edad between '65' and '200'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F9
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralbh1 where ".$scf." and menor='0'  and edad between '65' and '200' ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila++, $data['DATA'][0]['cantidad']);
 
$colum='E';

//M1
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralch1 where ".$scm." and menor='1'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F1
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralch1 where ".$scf." and menor='1'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M2
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralch1 where ".$scm." and menor='0'  and edad between '1' and '4'");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F2
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralch1 where ".$scf." and menor='0'  and edad between '1' and '4'");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M3
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralch1 where ".$scm." and menor='0'  and edad between '5' and '14'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F3
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralch1 where ".$scf." and menor='0'  and edad between '5' and '14' ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M4
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralch1 where ".$scm." and menor='0'  and edad between '15' and '24'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F4
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralch1 where ".$scf." and menor='0'  and edad between '15' and '24'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M5
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralch1 where ".$scm." and menor='0'  and edad between '25' and '34' ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F5
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralch1 where ".$scf." and menor='0'  and edad between '25' and '34' ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M6
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralch1 where ".$scm." and menor='0'  and edad between '35' and '44'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F6
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralch1 where ".$scf." and menor='0'  and edad between '35' and '44'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M7
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralch1 where ".$scm." and menor='0'  and edad between '45' and '54'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F7
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralch1 where ".$scf." and menor='0'  and edad between '45' and '54'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M8
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralch1 where ".$scm." and menor='0'  and edad between '55' and '64'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F8
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralch1 where ".$scf." and menor='0'  and edad between '55' and '64'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M9
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralch1 where ".$scm." and menor='0'  and edad between '65' and '200'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F9
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralch1 where ".$scf." and menor='0'  and edad between '65' and '200' ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila++, $data['DATA'][0]['cantidad']);
 

$colum='E';

//M1
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestraldh1 where ".$scm." and menor='1'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F1
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestraldh1 where ".$scf." and menor='1'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M2
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestraldh1 where ".$scm." and menor='0'  and edad between '1' and '4'");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F2
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestraldh1 where ".$scf." and menor='0'  and edad between '1' and '4'");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M3
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestraldh1 where ".$scm." and menor='0'  and edad between '5' and '14'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F3
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestraldh1 where ".$scf." and menor='0'  and edad between '5' and '14' ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M4
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestraldh1 where ".$scm." and menor='0'  and edad between '15' and '24'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F4
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestraldh1 where ".$scf." and menor='0'  and edad between '15' and '24'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M5
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestraldh1 where ".$scm." and menor='0'  and edad between '25' and '34' ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F5
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestraldh1 where ".$scf." and menor='0'  and edad between '25' and '34' ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M6
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestraldh1 where ".$scm." and menor='0'  and edad between '35' and '44'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F6
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestraldh1 where ".$scf." and menor='0'  and edad between '35' and '44'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M7
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestraldh1 where ".$scm." and menor='0'  and edad between '45' and '54'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F7
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestraldh1 where ".$scf." and menor='0'  and edad between '45' and '54'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M8
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestraldh1 where ".$scm." and menor='0'  and edad between '55' and '64'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F8
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestraldh1 where ".$scf." and menor='0'  and edad between '55' and '64'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M9
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestraldh1 where ".$scm." and menor='0'  and edad between '65' and '200'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F9
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestraldh1 where ".$scf." and menor='0'  and edad between '65' and '200' ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila++, $data['DATA'][0]['cantidad']);
 

$colum='E';

//M1
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestraleh1 where ".$scm." and menor='1'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F1
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestraleh1 where ".$scf." and menor='1'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M2
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestraleh1 where ".$scm." and menor='0'  and edad between '1' and '4'");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F2
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestraleh1 where ".$scf." and menor='0'  and edad between '1' and '4'");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M3
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestraleh1 where ".$scm." and menor='0'  and edad between '5' and '14'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F3
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestraleh1 where ".$scf." and menor='0'  and edad between '5' and '14' ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M4
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestraleh1 where ".$scm." and menor='0'  and edad between '15' and '24'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F4
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestraleh1 where ".$scf." and menor='0'  and edad between '15' and '24'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M5
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestraleh1 where ".$scm." and menor='0'  and edad between '25' and '34' ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F5
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestraleh1 where ".$scf." and menor='0'  and edad between '25' and '34' ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M6
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestraleh1 where ".$scm." and menor='0'  and edad between '35' and '44'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F6
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestraleh1 where ".$scf." and menor='0'  and edad between '35' and '44'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M7
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestraleh1 where ".$scm." and menor='0'  and edad between '45' and '54'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F7
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestraleh1 where ".$scf." and menor='0'  and edad between '45' and '54'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M8
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestraleh1 where ".$scm." and menor='0'  and edad between '55' and '64'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F8
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestraleh1 where ".$scf." and menor='0'  and edad between '55' and '64'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M9
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestraleh1 where ".$scm." and menor='0'  and edad between '65' and '200'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F9
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestraleh1 where ".$scf." and menor='0'  and edad between '65' and '200' ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila++, $data['DATA'][0]['cantidad']);
 

$colum='E';

//M1
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralfh1 where ".$scm." and menor='1'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F1
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralfh1 where ".$scf." and menor='1'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M2
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralfh1 where ".$scm." and menor='0'  and edad between '1' and '4'");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F2
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralfh1 where ".$scf." and menor='0'  and edad between '1' and '4'");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M3
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralfh1 where ".$scm." and menor='0'  and edad between '5' and '14'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F3
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralfh1 where ".$scf." and menor='0'  and edad between '5' and '14' ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M4
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralfh1 where ".$scm." and menor='0'  and edad between '15' and '24'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F4
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralfh1 where ".$scf." and menor='0'  and edad between '15' and '24'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M5
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralfh1 where ".$scm." and menor='0'  and edad between '25' and '34' ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F5
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralfh1 where ".$scf." and menor='0'  and edad between '25' and '34' ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M6
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralfh1 where ".$scm." and menor='0'  and edad between '35' and '44'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F6
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralfh1 where ".$scf." and menor='0'  and edad between '35' and '44'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M7
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralfh1 where ".$scm." and menor='0'  and edad between '45' and '54'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F7
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralfh1 where ".$scf." and menor='0'  and edad between '45' and '54'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M8
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralfh1 where ".$scm." and menor='0'  and edad between '55' and '64'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F8
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralfh1 where ".$scf." and menor='0'  and edad between '55' and '64'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M9
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralfh1 where ".$scm." and menor='0'  and edad between '65' and '200'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F9
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralfh1 where ".$scf." and menor='0'  and edad between '65' and '200' ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila++, $data['DATA'][0]['cantidad']);
 

$colum='E';

//M1
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralgh1 where ".$scm." and menor='1'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F1
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralgh1 where ".$scf." and menor='1'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M2
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralgh1 where ".$scm." and menor='0'  and edad between '1' and '4'");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F2
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralgh1 where ".$scf." and menor='0'  and edad between '1' and '4'");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M3
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralgh1 where ".$scm." and menor='0'  and edad between '5' and '14'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F3
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralgh1 where ".$scf." and menor='0'  and edad between '5' and '14' ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M4
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralgh1 where ".$scm." and menor='0'  and edad between '15' and '24'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F4
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralgh1 where ".$scf." and menor='0'  and edad between '15' and '24'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M5
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralgh1 where ".$scm." and menor='0'  and edad between '25' and '34' ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F5
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralgh1 where ".$scf." and menor='0'  and edad between '25' and '34' ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M6
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralgh1 where ".$scm." and menor='0'  and edad between '35' and '44'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F6
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralgh1 where ".$scf." and menor='0'  and edad between '35' and '44'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M7
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralgh1 where ".$scm." and menor='0'  and edad between '45' and '54'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F7
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralgh1 where ".$scf." and menor='0'  and edad between '45' and '54'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M8
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralgh1 where ".$scm." and menor='0'  and edad between '55' and '64'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F8
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralgh1 where ".$scf." and menor='0'  and edad between '55' and '64'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M9
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralgh1 where ".$scm." and menor='0'  and edad between '65' and '200'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F9
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralgh1 where ".$scf." and menor='0'  and edad between '65' and '200' ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila++, $data['DATA'][0]['cantidad']);
 
$colum='E';

//M1
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralhh1 where ".$scm." and menor='1'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F1
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralhh1 where ".$scf." and menor='1'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M2
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralhh1 where ".$scm." and menor='0'  and edad between '1' and '4'");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F2
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralhh1 where ".$scf." and menor='0'  and edad between '1' and '4'");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M3
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralhh1 where ".$scm." and menor='0'  and edad between '5' and '14'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F3
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralhh1 where ".$scf." and menor='0'  and edad between '5' and '14' ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M4
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralhh1 where ".$scm." and menor='0'  and edad between '15' and '24'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F4
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralhh1 where ".$scf." and menor='0'  and edad between '15' and '24'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M5
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralhh1 where ".$scm." and menor='0'  and edad between '25' and '34' ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F5
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralhh1 where ".$scf." and menor='0'  and edad between '25' and '34' ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M6
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralhh1 where ".$scm." and menor='0'  and edad between '35' and '44'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F6
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralhh1 where ".$scf." and menor='0'  and edad between '35' and '44'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M7
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralhh1 where ".$scm." and menor='0'  and edad between '45' and '54'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F7
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralhh1 where ".$scf." and menor='0'  and edad between '45' and '54'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M8
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralhh1 where ".$scm." and menor='0'  and edad between '55' and '64'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F8
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralhh1 where ".$scf." and menor='0'  and edad between '55' and '64'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M9
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralhh1 where ".$scm." and menor='0'  and edad between '65' and '200'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F9
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralhh1 where ".$scf." and menor='0'  and edad between '65' and '200' ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila++, $data['DATA'][0]['cantidad']);
 
$colum='E';

//M1
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralih1 where ".$scm." and menor='1'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F1
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralih1 where ".$scf." and menor='1'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M2
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralih1 where ".$scm." and menor='0'  and edad between '1' and '4'");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F2
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralih1 where ".$scf." and menor='0'  and edad between '1' and '4'");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M3
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralih1 where ".$scm." and menor='0'  and edad between '5' and '14'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F3
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralih1 where ".$scf." and menor='0'  and edad between '5' and '14' ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M4
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralih1 where ".$scm." and menor='0'  and edad between '15' and '24'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F4
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralih1 where ".$scf." and menor='0'  and edad between '15' and '24'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M5
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralih1 where ".$scm." and menor='0'  and edad between '25' and '34' ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F5
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralih1 where ".$scf." and menor='0'  and edad between '25' and '34' ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M6
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralih1 where ".$scm." and menor='0'  and edad between '35' and '44'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F6
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralih1 where ".$scf." and menor='0'  and edad between '35' and '44'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M7
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralih1 where ".$scm." and menor='0'  and edad between '45' and '54'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F7
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralih1 where ".$scf." and menor='0'  and edad between '45' and '54'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M8
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralih1 where ".$scm." and menor='0'  and edad between '55' and '64'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F8
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralih1 where ".$scf." and menor='0'  and edad between '55' and '64'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M9
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralih1 where ".$scm." and menor='0'  and edad between '65' and '200'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F9
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralih1 where ".$scf." and menor='0'  and edad between '65' and '200' ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila++, $data['DATA'][0]['cantidad']);


$colum='E';

//M1
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestraljh1 where ".$scm." and menor='1'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F1
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestraljh1 where ".$scf." and menor='1'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M2
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestraljh1 where ".$scm." and menor='0'  and edad between '1' and '4'");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F2
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestraljh1 where ".$scf." and menor='0'  and edad between '1' and '4'");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M3
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestraljh1 where ".$scm." and menor='0'  and edad between '5' and '14'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F3
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestraljh1 where ".$scf." and menor='0'  and edad between '5' and '14' ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M4
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestraljh1 where ".$scm." and menor='0'  and edad between '15' and '24'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F4
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestraljh1 where ".$scf." and menor='0'  and edad between '15' and '24'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M5
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestraljh1 where ".$scm." and menor='0'  and edad between '25' and '34' ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F5
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestraljh1 where ".$scf." and menor='0'  and edad between '25' and '34' ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M6
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestraljh1 where ".$scm." and menor='0'  and edad between '35' and '44'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F6
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestraljh1 where ".$scf." and menor='0'  and edad between '35' and '44'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M7
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestraljh1 where ".$scm." and menor='0'  and edad between '45' and '54'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F7
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestraljh1 where ".$scf." and menor='0'  and edad between '45' and '54'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M8
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestraljh1 where ".$scm." and menor='0'  and edad between '55' and '64'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F8
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestraljh1 where ".$scf." and menor='0'  and edad between '55' and '64'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M9
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestraljh1 where ".$scm." and menor='0'  and edad between '65' and '200'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F9
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestraljh1 where ".$scf." and menor='0'  and edad between '65' and '200' ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila++, $data['DATA'][0]['cantidad']);
 

$colum='E';

//M1
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralkh1 where ".$scm." and menor='1'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F1
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralkh1 where ".$scf." and menor='1'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M2
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralkh1 where ".$scm." and menor='0'  and edad between '1' and '4'");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F2
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralkh1 where ".$scf." and menor='0'  and edad between '1' and '4'");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M3
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralkh1 where ".$scm." and menor='0'  and edad between '5' and '14'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F3
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralkh1 where ".$scf." and menor='0'  and edad between '5' and '14' ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M4
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralkh1 where ".$scm." and menor='0'  and edad between '15' and '24'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F4
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralkh1 where ".$scf." and menor='0'  and edad between '15' and '24'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M5
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralkh1 where ".$scm." and menor='0'  and edad between '25' and '34' ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F5
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralkh1 where ".$scf." and menor='0'  and edad between '25' and '34' ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M6
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralkh1 where ".$scm." and menor='0'  and edad between '35' and '44'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F6
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralkh1 where ".$scf." and menor='0'  and edad between '35' and '44'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M7
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralkh1 where ".$scm." and menor='0'  and edad between '45' and '54'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F7
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralkh1 where ".$scf." and menor='0'  and edad between '45' and '54'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M8
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralkh1 where ".$scm." and menor='0'  and edad between '55' and '64'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F8
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralkh1 where ".$scf." and menor='0'  and edad between '55' and '64'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M9
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralkh1 where ".$scm." and menor='0'  and edad between '65' and '200'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F9
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralkh1 where ".$scf." and menor='0'  and edad between '65' and '200' ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila++, $data['DATA'][0]['cantidad']);
 
$colum='E';

//M1
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestrallh1 where ".$scm." and menor='1'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F1
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestrallh1 where ".$scf." and menor='1'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M2
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestrallh1 where ".$scm." and menor='0'  and edad between '1' and '4'");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F2
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestrallh1 where ".$scf." and menor='0'  and edad between '1' and '4'");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M3
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestrallh1 where ".$scm." and menor='0'  and edad between '5' and '14'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F3
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestrallh1 where ".$scf." and menor='0'  and edad between '5' and '14' ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M4
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestrallh1 where ".$scm." and menor='0'  and edad between '15' and '24'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F4
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestrallh1 where ".$scf." and menor='0'  and edad between '15' and '24'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M5
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestrallh1 where ".$scm." and menor='0'  and edad between '25' and '34' ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F5
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestrallh1 where ".$scf." and menor='0'  and edad between '25' and '34' ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M6
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestrallh1 where ".$scm." and menor='0'  and edad between '35' and '44'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F6
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestrallh1 where ".$scf." and menor='0'  and edad between '35' and '44'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M7
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestrallh1 where ".$scm." and menor='0'  and edad between '45' and '54'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F7
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestrallh1 where ".$scf." and menor='0'  and edad between '45' and '54'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M8
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestrallh1 where ".$scm." and menor='0'  and edad between '55' and '64'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F8
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestrallh1 where ".$scf." and menor='0'  and edad between '55' and '64'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M9
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestrallh1 where ".$scm." and menor='0'  and edad between '65' and '200'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F9
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestrallh1 where ".$scf." and menor='0'  and edad between '65' and '200' ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila++, $data['DATA'][0]['cantidad']);
 


$colum='E';

//M1
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralmh1 where ".$scm." and menor='1'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F1
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralmh1 where ".$scf." and menor='1'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M2
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralmh1 where ".$scm." and menor='0'  and edad between '1' and '4'");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F2
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralmh1 where ".$scf." and menor='0'  and edad between '1' and '4'");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M3
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralmh1 where ".$scm." and menor='0'  and edad between '5' and '14'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F3
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralmh1 where ".$scf." and menor='0'  and edad between '5' and '14' ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M4
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralmh1 where ".$scm." and menor='0'  and edad between '15' and '24'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F4
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralmh1 where ".$scf." and menor='0'  and edad between '15' and '24'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M5
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralmh1 where ".$scm." and menor='0'  and edad between '25' and '34' ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F5
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralmh1 where ".$scf." and menor='0'  and edad between '25' and '34' ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M6
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralmh1 where ".$scm." and menor='0'  and edad between '35' and '44'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F6
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralmh1 where ".$scf." and menor='0'  and edad between '35' and '44'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M7
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralmh1 where ".$scm." and menor='0'  and edad between '45' and '54'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F7
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralmh1 where ".$scf." and menor='0'  and edad between '45' and '54'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M8
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralmh1 where ".$scm." and menor='0'  and edad between '55' and '64'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F8
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralmh1 where ".$scf." and menor='0'  and edad between '55' and '64'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M9
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralmh1 where ".$scm." and menor='0'  and edad between '65' and '200'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F9
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralmh1 where ".$scf." and menor='0'  and edad between '65' and '200' ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila++, $data['DATA'][0]['cantidad']);
 

$colum='E';

//M1
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralnh1 where ".$scm." and menor='1'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F1
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralnh1 where ".$scf." and menor='1'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M2
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralnh1 where ".$scm." and menor='0'  and edad between '1' and '4'");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F2
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralnh1 where ".$scf." and menor='0'  and edad between '1' and '4'");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M3
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralnh1 where ".$scm." and menor='0'  and edad between '5' and '14'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F3
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralnh1 where ".$scf." and menor='0'  and edad between '5' and '14' ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M4
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralnh1 where ".$scm." and menor='0'  and edad between '15' and '24'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F4
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralnh1 where ".$scf." and menor='0'  and edad between '15' and '24'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M5
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralnh1 where ".$scm." and menor='0'  and edad between '25' and '34' ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F5
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralnh1 where ".$scf." and menor='0'  and edad between '25' and '34' ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M6
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralnh1 where ".$scm." and menor='0'  and edad between '35' and '44'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F6
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralnh1 where ".$scf." and menor='0'  and edad between '35' and '44'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M7
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralnh1 where ".$scm." and menor='0'  and edad between '45' and '54'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F7
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralnh1 where ".$scf." and menor='0'  and edad between '45' and '54'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M8
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralnh1 where ".$scm." and menor='0'  and edad between '55' and '64'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F8
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralnh1 where ".$scf." and menor='0'  and edad between '55' and '64'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M9
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralnh1 where ".$scm." and menor='0'  and edad between '65' and '200'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F9
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralnh1 where ".$scf." and menor='0'  and edad between '65' and '200' ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila++, $data['DATA'][0]['cantidad']);
 

$colum='E';

//M1
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestraloh1 where ".$scm." and menor='1'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F1
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestraloh1 where ".$scf." and menor='1'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M2
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestraloh1 where ".$scm." and menor='0'  and edad between '1' and '4'");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F2
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestraloh1 where ".$scf." and menor='0'  and edad between '1' and '4'");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M3
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestraloh1 where ".$scm." and menor='0'  and edad between '5' and '14'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F3
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestraloh1 where ".$scf." and menor='0'  and edad between '5' and '14' ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M4
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestraloh1 where ".$scm." and menor='0'  and edad between '15' and '24'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F4
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestraloh1 where ".$scf." and menor='0'  and edad between '15' and '24'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M5
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestraloh1 where ".$scm." and menor='0'  and edad between '25' and '34' ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F5
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestraloh1 where ".$scf." and menor='0'  and edad between '25' and '34' ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M6
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestraloh1 where ".$scm." and menor='0'  and edad between '35' and '44'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F6
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestraloh1 where ".$scf." and menor='0'  and edad between '35' and '44'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M7
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestraloh1 where ".$scm." and menor='0'  and edad between '45' and '54'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F7
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestraloh1 where ".$scf." and menor='0'  and edad between '45' and '54'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M8
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestraloh1 where ".$scm." and menor='0'  and edad between '55' and '64'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F8
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestraloh1 where ".$scf." and menor='0'  and edad between '55' and '64'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M9
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestraloh1 where ".$scm." and menor='0'  and edad between '65' and '200'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F9
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestraloh1 where ".$scf." and menor='0'  and edad between '65' and '200' ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila++, $data['DATA'][0]['cantidad']);
 

$colum='E';

//M1
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralph1 where ".$scm." and menor='1'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F1
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralph1 where ".$scf." and menor='1'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M2
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralph1 where ".$scm." and menor='0'  and edad between '1' and '4'");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F2
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralph1 where ".$scf." and menor='0'  and edad between '1' and '4'");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M3
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralph1 where ".$scm." and menor='0'  and edad between '5' and '14'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F3
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralph1 where ".$scf." and menor='0'  and edad between '5' and '14' ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M4
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralph1 where ".$scm." and menor='0'  and edad between '15' and '24'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F4
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralph1 where ".$scf." and menor='0'  and edad between '15' and '24'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M5
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralph1 where ".$scm." and menor='0'  and edad between '25' and '34' ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F5
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralph1 where ".$scf." and menor='0'  and edad between '25' and '34' ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M6
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralph1 where ".$scm." and menor='0'  and edad between '35' and '44'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F6
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralph1 where ".$scf." and menor='0'  and edad between '35' and '44'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M7
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralph1 where ".$scm." and menor='0'  and edad between '45' and '54'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F7
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralph1 where ".$scf." and menor='0'  and edad between '45' and '54'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M8
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralph1 where ".$scm." and menor='0'  and edad between '55' and '64'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F8
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralph1 where ".$scf." and menor='0'  and edad between '55' and '64'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M9
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralph1 where ".$scm." and menor='0'  and edad between '65' and '200'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F9
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralph1 where ".$scf." and menor='0'  and edad between '65' and '200' ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila++, $data['DATA'][0]['cantidad']);
 

$colum='E';

//M1
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralqh1 where ".$scm." and menor='1'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F1
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralqh1 where ".$scf." and menor='1'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M2
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralqh1 where ".$scm." and menor='0'  and edad between '1' and '4'");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F2
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralqh1 where ".$scf." and menor='0'  and edad between '1' and '4'");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M3
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralqh1 where ".$scm." and menor='0'  and edad between '5' and '14'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F3
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralqh1 where ".$scf." and menor='0'  and edad between '5' and '14' ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M4
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralqh1 where ".$scm." and menor='0'  and edad between '15' and '24'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F4
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralqh1 where ".$scf." and menor='0'  and edad between '15' and '24'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M5
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralqh1 where ".$scm." and menor='0'  and edad between '25' and '34' ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F5
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralqh1 where ".$scf." and menor='0'  and edad between '25' and '34' ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M6
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralqh1 where ".$scm." and menor='0'  and edad between '35' and '44'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F6
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralqh1 where ".$scf." and menor='0'  and edad between '35' and '44'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M7
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralqh1 where ".$scm." and menor='0'  and edad between '45' and '54'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F7
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralqh1 where ".$scf." and menor='0'  and edad between '45' and '54'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M8
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralqh1 where ".$scm." and menor='0'  and edad between '55' and '64'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F8
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralqh1 where ".$scf." and menor='0'  and edad between '55' and '64'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M9
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralqh1 where ".$scm." and menor='0'  and edad between '65' and '200'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F9
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralqh1 where ".$scf." and menor='0'  and edad between '65' and '200' ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila++, $data['DATA'][0]['cantidad']);
 
$colum='E';

//M1
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralrh1 where ".$scm." and menor='1'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F1
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralrh1 where ".$scf." and menor='1'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M2
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralrh1 where ".$scm." and menor='0'  and edad between '1' and '4'");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F2
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralrh1 where ".$scf." and menor='0'  and edad between '1' and '4'");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M3
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralrh1 where ".$scm." and menor='0'  and edad between '5' and '14'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F3
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralrh1 where ".$scf." and menor='0'  and edad between '5' and '14' ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M4
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralrh1 where ".$scm." and menor='0'  and edad between '15' and '24'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F4
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralrh1 where ".$scf." and menor='0'  and edad between '15' and '24'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M5
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralrh1 where ".$scm." and menor='0'  and edad between '25' and '34' ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F5
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralrh1 where ".$scf." and menor='0'  and edad between '25' and '34' ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M6
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralrh1 where ".$scm." and menor='0'  and edad between '35' and '44'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F6
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralrh1 where ".$scf." and menor='0'  and edad between '35' and '44'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M7
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralrh1 where ".$scm." and menor='0'  and edad between '45' and '54'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F7
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralrh1 where ".$scf." and menor='0'  and edad between '45' and '54'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M8
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralrh1 where ".$scm." and menor='0'  and edad between '55' and '64'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F8
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralrh1 where ".$scf." and menor='0'  and edad between '55' and '64'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M9
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralrh1 where ".$scm." and menor='0'  and edad between '65' and '200'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F9
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralrh1 where ".$scf." and menor='0'  and edad between '65' and '200' ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila++, $data['DATA'][0]['cantidad']);
 

$colum='E';

//M1
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralsh1 where ".$scm." and menor='1'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F1
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralsh1 where ".$scf." and menor='1'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M2
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralsh1 where ".$scm." and menor='0'  and edad between '1' and '4'");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F2
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralsh1 where ".$scf." and menor='0'  and edad between '1' and '4'");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M3
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralsh1 where ".$scm." and menor='0'  and edad between '5' and '14'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F3
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralsh1 where ".$scf." and menor='0'  and edad between '5' and '14' ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M4
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralsh1 where ".$scm." and menor='0'  and edad between '15' and '24'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F4
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralsh1 where ".$scf." and menor='0'  and edad between '15' and '24'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M5
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralsh1 where ".$scm." and menor='0'  and edad between '25' and '34' ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F5
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralsh1 where ".$scf." and menor='0'  and edad between '25' and '34' ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M6
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralsh1 where ".$scm." and menor='0'  and edad between '35' and '44'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F6
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralsh1 where ".$scf." and menor='0'  and edad between '35' and '44'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M7
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralsh1 where ".$scm." and menor='0'  and edad between '45' and '54'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F7
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralsh1 where ".$scf." and menor='0'  and edad between '45' and '54'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M8
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralsh1 where ".$scm." and menor='0'  and edad between '55' and '64'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F8
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralsh1 where ".$scf." and menor='0'  and edad between '55' and '64'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M9
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralsh1 where ".$scm." and menor='0'  and edad between '65' and '200'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F9
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralsh1 where ".$scf." and menor='0'  and edad between '65' and '200' ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila++, $data['DATA'][0]['cantidad']);
 

$colum='E';

//M1
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralth1 where ".$scm." and menor='1'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F1
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralth1 where ".$scf." and menor='1'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M2
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralth1 where ".$scm." and menor='0'  and edad between '1' and '4'");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F2
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralth1 where ".$scf." and menor='0'  and edad between '1' and '4'");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M3
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralth1 where ".$scm." and menor='0'  and edad between '5' and '14'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F3
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralth1 where ".$scf." and menor='0'  and edad between '5' and '14' ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M4
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralth1 where ".$scm." and menor='0'  and edad between '15' and '24'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F4
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralth1 where ".$scf." and menor='0'  and edad between '15' and '24'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M5
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralth1 where ".$scm." and menor='0'  and edad between '25' and '34' ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F5
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralth1 where ".$scf." and menor='0'  and edad between '25' and '34' ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M6
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralth1 where ".$scm." and menor='0'  and edad between '35' and '44'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F6
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralth1 where ".$scf." and menor='0'  and edad between '35' and '44'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M7
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralth1 where ".$scm." and menor='0'  and edad between '45' and '54'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F7
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralth1 where ".$scf." and menor='0'  and edad between '45' and '54'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M8
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralth1 where ".$scm." and menor='0'  and edad between '55' and '64'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F8
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralth1 where ".$scf." and menor='0'  and edad between '55' and '64'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M9
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralth1 where ".$scm." and menor='0'  and edad between '65' and '200'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F9
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralth1 where ".$scf." and menor='0'  and edad between '65' and '200' ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila++, $data['DATA'][0]['cantidad']);
 

$colum='E';

//M1
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestraluh1 where ".$scm." and menor='1'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F1
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestraluh1 where ".$scf." and menor='1'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M2
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestraluh1 where ".$scm." and menor='0'  and edad between '1' and '4'");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F2
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestraluh1 where ".$scf." and menor='0'  and edad between '1' and '4'");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M3
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestraluh1 where ".$scm." and menor='0'  and edad between '5' and '14'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F3
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestraluh1 where ".$scf." and menor='0'  and edad between '5' and '14' ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M4
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestraluh1 where ".$scm." and menor='0'  and edad between '15' and '24'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F4
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestraluh1 where ".$scf." and menor='0'  and edad between '15' and '24'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M5
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestraluh1 where ".$scm." and menor='0'  and edad between '25' and '34' ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F5
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestraluh1 where ".$scf." and menor='0'  and edad between '25' and '34' ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M6
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestraluh1 where ".$scm." and menor='0'  and edad between '35' and '44'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F6
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestraluh1 where ".$scf." and menor='0'  and edad between '35' and '44'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M7
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestraluh1 where ".$scm." and menor='0'  and edad between '45' and '54'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F7
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestraluh1 where ".$scf." and menor='0'  and edad between '45' and '54'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M8
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestraluh1 where ".$scm." and menor='0'  and edad between '55' and '64'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F8
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestraluh1 where ".$scf." and menor='0'  and edad between '55' and '64'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M9
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestraluh1 where ".$scm." and menor='0'  and edad between '65' and '200'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F9
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestraluh1 where ".$scf." and menor='0'  and edad between '65' and '200' ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila++, $data['DATA'][0]['cantidad']);
 
//-------------------------------

$colum='E';

//M1
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralah2 where ".$scm." and menor='1'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F1
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralah2 where ".$scf." and menor='1'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M2
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralah2 where ".$scm." and menor='0'  and edad between '1' and '4'");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F2
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralah2 where ".$scf." and menor='0'  and edad between '1' and '4'");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M3
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralah2 where ".$scm." and menor='0'  and edad between '5' and '14'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F3
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralah2 where ".$scf." and menor='0'  and edad between '5' and '14' ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M4
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralah2 where ".$scm." and menor='0'  and edad between '15' and '24'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F4
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralah2 where ".$scf." and menor='0'  and edad between '15' and '24'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M5
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralah2 where ".$scm." and menor='0'  and edad between '25' and '34' ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F5
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralah2 where ".$scf." and menor='0'  and edad between '25' and '34' ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M6
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralah2 where ".$scm." and menor='0'  and edad between '35' and '44'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F6
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralah2 where ".$scf." and menor='0'  and edad between '35' and '44'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M7
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralah2 where ".$scm." and menor='0'  and edad between '45' and '54'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F7
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralah2 where ".$scf." and menor='0'  and edad between '45' and '54'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M8
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralah2 where ".$scm." and menor='0'  and edad between '55' and '64'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F8
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralah2 where ".$scf." and menor='0'  and edad between '55' and '64'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M9
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralah2 where ".$scm." and menor='0'  and edad between '65' and '200'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F9
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralah2 where ".$scf." and menor='0'  and edad between '65' and '200' ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila++, $data['DATA'][0]['cantidad']);
 

$colum='E';

//M1
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralbh2 where ".$scm." and menor='1'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F1
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralbh2 where ".$scf." and menor='1'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M2
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralbh2 where ".$scm." and menor='0'  and edad between '1' and '4'");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F2
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralbh2 where ".$scf." and menor='0'  and edad between '1' and '4'");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M3
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralbh2 where ".$scm." and menor='0'  and edad between '5' and '14'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F3
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralbh2 where ".$scf." and menor='0'  and edad between '5' and '14' ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M4
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralbh2 where ".$scm." and menor='0'  and edad between '15' and '24'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F4
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralbh2 where ".$scf." and menor='0'  and edad between '15' and '24'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M5
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralbh2 where ".$scm." and menor='0'  and edad between '25' and '34' ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F5
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralbh2 where ".$scf." and menor='0'  and edad between '25' and '34' ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M6
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralbh2 where ".$scm." and menor='0'  and edad between '35' and '44'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F6
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralbh2 where ".$scf." and menor='0'  and edad between '35' and '44'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M7
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralbh2 where ".$scm." and menor='0'  and edad between '45' and '54'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F7
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralbh2 where ".$scf." and menor='0'  and edad between '45' and '54'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M8
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralbh2 where ".$scm." and menor='0'  and edad between '55' and '64'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F8
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralbh2 where ".$scf." and menor='0'  and edad between '55' and '64'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M9
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralbh2 where ".$scm." and menor='0'  and edad between '65' and '200'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F9
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralbh2 where ".$scf." and menor='0'  and edad between '65' and '200' ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila++, $data['DATA'][0]['cantidad']);
 

$colum='E';

//M1
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralch2 where ".$scm." and menor='1'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F1
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralch2 where ".$scf." and menor='1'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M2
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralch2 where ".$scm." and menor='0'  and edad between '1' and '4'");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F2
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralch2 where ".$scf." and menor='0'  and edad between '1' and '4'");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M3
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralch2 where ".$scm." and menor='0'  and edad between '5' and '14'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F3
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralch2 where ".$scf." and menor='0'  and edad between '5' and '14' ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M4
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralch2 where ".$scm." and menor='0'  and edad between '15' and '24'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F4
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralch2 where ".$scf." and menor='0'  and edad between '15' and '24'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M5
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralch2 where ".$scm." and menor='0'  and edad between '25' and '34' ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F5
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralch2 where ".$scf." and menor='0'  and edad between '25' and '34' ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M6
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralch2 where ".$scm." and menor='0'  and edad between '35' and '44'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F6
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralch2 where ".$scf." and menor='0'  and edad between '35' and '44'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M7
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralch2 where ".$scm." and menor='0'  and edad between '45' and '54'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F7
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralch2 where ".$scf." and menor='0'  and edad between '45' and '54'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M8
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralch2 where ".$scm." and menor='0'  and edad between '55' and '64'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F8
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralch2 where ".$scf." and menor='0'  and edad between '55' and '64'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M9
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralch2 where ".$scm." and menor='0'  and edad between '65' and '200'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F9
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralch2 where ".$scf." and menor='0'  and edad between '65' and '200' ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila++, $data['DATA'][0]['cantidad']);
 

$colum='E';

//M1
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestraldh2 where ".$scm." and menor='1'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F1
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestraldh2 where ".$scf." and menor='1'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M2
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestraldh2 where ".$scm." and menor='0'  and edad between '1' and '4'");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F2
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestraldh2 where ".$scf." and menor='0'  and edad between '1' and '4'");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M3
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestraldh2 where ".$scm." and menor='0'  and edad between '5' and '14'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F3
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestraldh2 where ".$scf." and menor='0'  and edad between '5' and '14' ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M4
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestraldh2 where ".$scm." and menor='0'  and edad between '15' and '24'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F4
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestraldh2 where ".$scf." and menor='0'  and edad between '15' and '24'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M5
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestraldh2 where ".$scm." and menor='0'  and edad between '25' and '34' ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F5
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestraldh2 where ".$scf." and menor='0'  and edad between '25' and '34' ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M6
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestraldh2 where ".$scm." and menor='0'  and edad between '35' and '44'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F6
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestraldh2 where ".$scf." and menor='0'  and edad between '35' and '44'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M7
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestraldh2 where ".$scm." and menor='0'  and edad between '45' and '54'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F7
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestraldh2 where ".$scf." and menor='0'  and edad between '45' and '54'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M8
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestraldh2 where ".$scm." and menor='0'  and edad between '55' and '64'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F8
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestraldh2 where ".$scf." and menor='0'  and edad between '55' and '64'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M9
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestraldh2 where ".$scm." and menor='0'  and edad between '65' and '200'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F9
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestraldh2 where ".$scf." and menor='0'  and edad between '65' and '200' ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila++, $data['DATA'][0]['cantidad']);
 
$colum='E';

//M1
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestraleh2 where ".$scm." and menor='1'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F1
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestraleh2 where ".$scf." and menor='1'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M2
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestraleh2 where ".$scm." and menor='0'  and edad between '1' and '4'");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F2
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestraleh2 where ".$scf." and menor='0'  and edad between '1' and '4'");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M3
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestraleh2 where ".$scm." and menor='0'  and edad between '5' and '14'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F3
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestraleh2 where ".$scf." and menor='0'  and edad between '5' and '14' ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M4
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestraleh2 where ".$scm." and menor='0'  and edad between '15' and '24'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F4
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestraleh2 where ".$scf." and menor='0'  and edad between '15' and '24'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M5
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestraleh2 where ".$scm." and menor='0'  and edad between '25' and '34' ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F5
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestraleh2 where ".$scf." and menor='0'  and edad between '25' and '34' ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M6
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestraleh2 where ".$scm." and menor='0'  and edad between '35' and '44'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F6
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestraleh2 where ".$scf." and menor='0'  and edad between '35' and '44'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M7
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestraleh2 where ".$scm." and menor='0'  and edad between '45' and '54'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F7
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestraleh2 where ".$scf." and menor='0'  and edad between '45' and '54'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M8
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestraleh2 where ".$scm." and menor='0'  and edad between '55' and '64'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F8
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestraleh2 where ".$scf." and menor='0'  and edad between '55' and '64'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M9
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestraleh2 where ".$scm." and menor='0'  and edad between '65' and '200'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F9
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestraleh2 where ".$scf." and menor='0'  and edad between '65' and '200' ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila++, $data['DATA'][0]['cantidad']);
 

$colum='E';

//M1
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralfh2 where ".$scm." and menor='1'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F1
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralfh2 where ".$scf." and menor='1'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M2
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralfh2 where ".$scm." and menor='0'  and edad between '1' and '4'");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F2
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralfh2 where ".$scf." and menor='0'  and edad between '1' and '4'");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M3
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralfh2 where ".$scm." and menor='0'  and edad between '5' and '14'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F3
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralfh2 where ".$scf." and menor='0'  and edad between '5' and '14' ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M4
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralfh2 where ".$scm." and menor='0'  and edad between '15' and '24'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F4
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralfh2 where ".$scf." and menor='0'  and edad between '15' and '24'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M5
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralfh2 where ".$scm." and menor='0'  and edad between '25' and '34' ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F5
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralfh2 where ".$scf." and menor='0'  and edad between '25' and '34' ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M6
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralfh2 where ".$scm." and menor='0'  and edad between '35' and '44'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F6
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralfh2 where ".$scf." and menor='0'  and edad between '35' and '44'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M7
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralfh2 where ".$scm." and menor='0'  and edad between '45' and '54'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F7
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralfh2 where ".$scf." and menor='0'  and edad between '45' and '54'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M8
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralfh2 where ".$scm." and menor='0'  and edad between '55' and '64'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F8
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralfh2 where ".$scf." and menor='0'  and edad between '55' and '64'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M9
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralfh2 where ".$scm." and menor='0'  and edad between '65' and '200'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F9
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralfh2 where ".$scf." and menor='0'  and edad between '65' and '200' ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila++, $data['DATA'][0]['cantidad']);
 


$colum='E';

//M1
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralgh2 where ".$scm." and menor='1'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F1
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralgh2 where ".$scf." and menor='1'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M2
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralgh2 where ".$scm." and menor='0'  and edad between '1' and '4'");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F2
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralgh2 where ".$scf." and menor='0'  and edad between '1' and '4'");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M3
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralgh2 where ".$scm." and menor='0'  and edad between '5' and '14'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F3
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralgh2 where ".$scf." and menor='0'  and edad between '5' and '14' ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M4
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralgh2 where ".$scm." and menor='0'  and edad between '15' and '24'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F4
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralgh2 where ".$scf." and menor='0'  and edad between '15' and '24'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M5
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralgh2 where ".$scm." and menor='0'  and edad between '25' and '34' ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F5
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralgh2 where ".$scf." and menor='0'  and edad between '25' and '34' ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M6
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralgh2 where ".$scm." and menor='0'  and edad between '35' and '44'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F6
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralgh2 where ".$scf." and menor='0'  and edad between '35' and '44'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M7
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralgh2 where ".$scm." and menor='0'  and edad between '45' and '54'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F7
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralgh2 where ".$scf." and menor='0'  and edad between '45' and '54'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M8
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralgh2 where ".$scm." and menor='0'  and edad between '55' and '64'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F8
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralgh2 where ".$scf." and menor='0'  and edad between '55' and '64'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M9
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralgh2 where ".$scm." and menor='0'  and edad between '65' and '200'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F9
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralgh2 where ".$scf." and menor='0'  and edad between '65' and '200' ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila++, $data['DATA'][0]['cantidad']);
 
$colum='E';

//M1
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralhh2 where ".$scm." and menor='1'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F1
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralhh2 where ".$scf." and menor='1'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M2
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralhh2 where ".$scm." and menor='0'  and edad between '1' and '4'");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F2
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralhh2 where ".$scf." and menor='0'  and edad between '1' and '4'");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M3
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralhh2 where ".$scm." and menor='0'  and edad between '5' and '14'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F3
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralhh2 where ".$scf." and menor='0'  and edad between '5' and '14' ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M4
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralhh2 where ".$scm." and menor='0'  and edad between '15' and '24'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F4
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralhh2 where ".$scf." and menor='0'  and edad between '15' and '24'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M5
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralhh2 where ".$scm." and menor='0'  and edad between '25' and '34' ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F5
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralhh2 where ".$scf." and menor='0'  and edad between '25' and '34' ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M6
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralhh2 where ".$scm." and menor='0'  and edad between '35' and '44'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F6
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralhh2 where ".$scf." and menor='0'  and edad between '35' and '44'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M7
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralhh2 where ".$scm." and menor='0'  and edad between '45' and '54'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F7
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralhh2 where ".$scf." and menor='0'  and edad between '45' and '54'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M8
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralhh2 where ".$scm." and menor='0'  and edad between '55' and '64'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F8
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralhh2 where ".$scf." and menor='0'  and edad between '55' and '64'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M9
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralhh2 where ".$scm." and menor='0'  and edad between '65' and '200'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F9
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralhh2 where ".$scf." and menor='0'  and edad between '65' and '200' ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila++, $data['DATA'][0]['cantidad']);
 
$colum='E';

//M1
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralih2 where ".$scm." and menor='1'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F1
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralih2 where ".$scf." and menor='1'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M2
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralih2 where ".$scm." and menor='0'  and edad between '1' and '4'");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F2
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralih2 where ".$scf." and menor='0'  and edad between '1' and '4'");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M3
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralih2 where ".$scm." and menor='0'  and edad between '5' and '14'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F3
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralih2 where ".$scf." and menor='0'  and edad between '5' and '14' ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M4
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralih2 where ".$scm." and menor='0'  and edad between '15' and '24'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F4
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralih2 where ".$scf." and menor='0'  and edad between '15' and '24'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M5
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralih2 where ".$scm." and menor='0'  and edad between '25' and '34' ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F5
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralih2 where ".$scf." and menor='0'  and edad between '25' and '34' ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M6
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralih2 where ".$scm." and menor='0'  and edad between '35' and '44'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F6
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralih2 where ".$scf." and menor='0'  and edad between '35' and '44'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M7
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralih2 where ".$scm." and menor='0'  and edad between '45' and '54'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F7
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralih2 where ".$scf." and menor='0'  and edad between '45' and '54'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M8
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralih2 where ".$scm." and menor='0'  and edad between '55' and '64'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F8
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralih2 where ".$scf." and menor='0'  and edad between '55' and '64'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M9
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralih2 where ".$scm." and menor='0'  and edad between '65' and '200'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F9
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralih2 where ".$scf." and menor='0'  and edad between '65' and '200' ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila++, $data['DATA'][0]['cantidad']);
 

$colum='E';

//M1
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestraljh2 where ".$scm." and menor='1'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F1
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestraljh2 where ".$scf." and menor='1'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M2
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestraljh2 where ".$scm." and menor='0'  and edad between '1' and '4'");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F2
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestraljh2 where ".$scf." and menor='0'  and edad between '1' and '4'");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M3
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestraljh2 where ".$scm." and menor='0'  and edad between '5' and '14'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F3
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestraljh2 where ".$scf." and menor='0'  and edad between '5' and '14' ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M4
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestraljh2 where ".$scm." and menor='0'  and edad between '15' and '24'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F4
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestraljh2 where ".$scf." and menor='0'  and edad between '15' and '24'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M5
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestraljh2 where ".$scm." and menor='0'  and edad between '25' and '34' ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F5
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestraljh2 where ".$scf." and menor='0'  and edad between '25' and '34' ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M6
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestraljh2 where ".$scm." and menor='0'  and edad between '35' and '44'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F6
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestraljh2 where ".$scf." and menor='0'  and edad between '35' and '44'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M7
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestraljh2 where ".$scm." and menor='0'  and edad between '45' and '54'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F7
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestraljh2 where ".$scf." and menor='0'  and edad between '45' and '54'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M8
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestraljh2 where ".$scm." and menor='0'  and edad between '55' and '64'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F8
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestraljh2 where ".$scf." and menor='0'  and edad between '55' and '64'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M9
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestraljh2 where ".$scm." and menor='0'  and edad between '65' and '200'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F9
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestraljh2 where ".$scf." and menor='0'  and edad between '65' and '200' ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila++, $data['DATA'][0]['cantidad']);
 
$colum='E';

//M1
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralkh2 where ".$scm." and menor='1'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F1
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralkh2 where ".$scf." and menor='1'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M2
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralkh2 where ".$scm." and menor='0'  and edad between '1' and '4'");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F2
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralkh2 where ".$scf." and menor='0'  and edad between '1' and '4'");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M3
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralkh2 where ".$scm." and menor='0'  and edad between '5' and '14'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F3
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralkh2 where ".$scf." and menor='0'  and edad between '5' and '14' ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M4
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralkh2 where ".$scm." and menor='0'  and edad between '15' and '24'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F4
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralkh2 where ".$scf." and menor='0'  and edad between '15' and '24'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M5
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralkh2 where ".$scm." and menor='0'  and edad between '25' and '34' ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F5
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralkh2 where ".$scf." and menor='0'  and edad between '25' and '34' ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M6
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralkh2 where ".$scm." and menor='0'  and edad between '35' and '44'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F6
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralkh2 where ".$scf." and menor='0'  and edad between '35' and '44'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M7
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralkh2 where ".$scm." and menor='0'  and edad between '45' and '54'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F7
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralkh2 where ".$scf." and menor='0'  and edad between '45' and '54'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M8
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralkh2 where ".$scm." and menor='0'  and edad between '55' and '64'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F8
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralkh2 where ".$scf." and menor='0'  and edad between '55' and '64'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M9
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralkh2 where ".$scm." and menor='0'  and edad between '65' and '200'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F9
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralkh2 where ".$scf." and menor='0'  and edad between '65' and '200' ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila++, $data['DATA'][0]['cantidad']);
 

$colum='E';

//M1
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestrallh2 where ".$scm." and menor='1'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F1
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestrallh2 where ".$scf." and menor='1'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M2
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestrallh2 where ".$scm." and menor='0'  and edad between '1' and '4'");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F2
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestrallh2 where ".$scf." and menor='0'  and edad between '1' and '4'");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M3
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestrallh2 where ".$scm." and menor='0'  and edad between '5' and '14'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F3
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestrallh2 where ".$scf." and menor='0'  and edad between '5' and '14' ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M4
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestrallh2 where ".$scm." and menor='0'  and edad between '15' and '24'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F4
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestrallh2 where ".$scf." and menor='0'  and edad between '15' and '24'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M5
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestrallh2 where ".$scm." and menor='0'  and edad between '25' and '34' ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F5
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestrallh2 where ".$scf." and menor='0'  and edad between '25' and '34' ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M6
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestrallh2 where ".$scm." and menor='0'  and edad between '35' and '44'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F6
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestrallh2 where ".$scf." and menor='0'  and edad between '35' and '44'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M7
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestrallh2 where ".$scm." and menor='0'  and edad between '45' and '54'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F7
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestrallh2 where ".$scf." and menor='0'  and edad between '45' and '54'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M8
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestrallh2 where ".$scm." and menor='0'  and edad between '55' and '64'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F8
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestrallh2 where ".$scf." and menor='0'  and edad between '55' and '64'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M9
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestrallh2 where ".$scm." and menor='0'  and edad between '65' and '200'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F9
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestrallh2 where ".$scf." and menor='0'  and edad between '65' and '200' ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila++, $data['DATA'][0]['cantidad']);
 

$contadorFila=48;

$an=$_GET['an'];
$dep=$_GET['depp'];
$mun=$_GET['mun'];
$ip=$_GET['ip'];
$tri=$_GET['tri'];
$tri2=$_GET['tri2'];
$toti=$_GET['TOTI'];

//-----------------SR---------------

$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistasprogramacion12 where ".$an." ".$dep." ".$mun." ".$ip." ".$tri." ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('A'.$contadorFila, $data['DATA'][0]['cantidad']);
 
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistasprogramacion13 where ".$an." ".$dep." ".$mun." ".$ip." ".$tri." ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('C'.$contadorFila, $data['DATA'][0]['cantidad']);
 
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistasprogramacion14 where ".$an." ".$dep." ".$mun." ".$ip." ".$tri." and identificacion in(select identificacion from sintomaticorespiratoriopruebasrealizadas  ) ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('E'.$contadorFila, $data['DATA'][0]['cantidad']);
 
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from sintomaticorespiratoriopruebasrealizadas  where pruebarealizada='BK' ".$tri2." and EXTRACT(YEAR from to_date(fechaprueba, 'DD MM YYYY'))='".$ano."' ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('I'.$contadorFila, $data['DATA'][0]['cantidad']);

$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistasprogramacion16 where ".$an." ".$dep." ".$mun." ".$ip." ".$tri." and identificacion in(select identificacion from sintomaticorespiratoriopruebasrealizadas where pruebarealizada='BK' AND resultadoprueba LIKE '%+%' ) ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('L'.$contadorFila, $data['DATA'][0]['cantidad']);

$data = $mngLP->consultaIndependiente("select count(*) as cantidad from sintomaticorespiratoriopruebasrealizadas  where pruebarealizada='CULTIVO' ".$tri2." and EXTRACT(YEAR from to_date(fechaprueba, 'DD MM YYYY'))='".$ano."' ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('N'.$contadorFila, $data['DATA'][0]['cantidad']);

$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistasprogramacion18 where ".$an." ".$dep." ".$mun." ".$ip." ".$tri." and identificacion in(select identificacion from sintomaticorespiratoriopruebasrealizadas where pruebarealizada='CULTIVO' AND resultadoprueba LIKE '%+%'  )");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('P'.$contadorFila, $data['DATA'][0]['cantidad']);

$data = $mngLP->consultaIndependiente("select count(*) as cantidad from contacto where contacto.identificacionasociado in ( select identificacion from LIBRODEREGISTRO where ".$toti." )  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('R'.$contadorFila, $data['DATA'][0]['cantidad']);

$data = $mngLP->consultaIndependiente("select count(*) as cantidad from visitapaciente where identificacionpaciente in (select identificacion from contacto where contacto.identificacionasociado in ( select identificacion from LIBRODEREGISTRO where ".$toti." ) ) AND sr='SI' ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('T'.$contadorFila, $data['DATA'][0]['cantidad']);

$data = $mngLP->consultaIndependiente("select count(*) as cantidad from visitapaciente where identificacionpaciente in (select identificacion from contacto where contacto.identificacionasociado in ( select identificacion from LIBRODEREGISTRO where ".$toti." ) ) and ( bk LIKE '%+%' or bk LIKE '%-%')  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('V'.$contadorFila, $data['DATA'][0]['cantidad']);

$data = $mngLP->consultaIndependiente("select count(*) as cantidad from visitapaciente where identificacionpaciente in (select identificacion from contacto where contacto.identificacionasociado in ( select identificacion from LIBRODEREGISTRO where ".$toti." ) ) and  bk LIKE '%+%' ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('X'.$contadorFila, $data['DATA'][0]['cantidad']);


//-----------------------VIH--------------------------------

$contadorFila=53;
$colum='E';

//M1
$data = $mngLP->consultaIndependiente(" select count(*) as cantidad from   vistastrimestralah3 where ".$scm." and menor='1'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F1
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from   vistastrimestralah3 where ".$scf." and menor='1'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M2
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from   vistastrimestralah3 where ".$scm." and menor='0'  and edad between '1' and '4'");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F2
$data = $mngLP->consultaIndependiente(" select count(*) as cantidad from   vistastrimestralah3 where ".$scf." and menor='0'  and edad between '1' and '4'");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M3
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from   vistastrimestralah3 where ".$scm." and menor='0'  and edad between '5' and '14' ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F3
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from   vistastrimestralah3 where ".$scf." and menor='0'  and edad between '5' and '14' ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M4
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from   vistastrimestralah3 where ".$scm." and menor='0'  and edad between '15' and '24'");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F4
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from   vistastrimestralah3 where ".$scf." and menor='0'  and edad between '15' and '24' ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M5
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from   vistastrimestralah3 where ".$scm." and menor='0'  and edad between '25' and '34'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F5
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from   vistastrimestralah3 where ".$scf." and menor='0'  and edad between '25' and '34' ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M6
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from   vistastrimestralah3 where ".$scm." and menor='0'  and edad between '35' and '44' ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F6
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from   vistastrimestralah3 where ".$scf." and menor='0'  and edad between '35' and '44' ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M7
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from   vistastrimestralah3 where ".$scm." and menor='0'  and edad between '45' and '54'");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F7
$data = $mngLP->consultaIndependiente(" select count(*) as cantidad from   vistastrimestralah3 where ".$scf." and menor='0'  and edad between '45' and '54' ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M8
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from   vistastrimestralah3 where ".$scm." and menor='0'  and edad between '55' and '64'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F8
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from   vistastrimestralah3 where ".$scf." and menor='0'  and edad between '55' and '64'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M9
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from   vistastrimestralah3 where ".$scm." and menor='0'  and edad between '65' and '200' ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F9
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from   vistastrimestralah3 where ".$scf." and menor='0'  and edad between '65' and '200'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila++, $data['DATA'][0]['cantidad']);

$colum='E';

//M1
$data = $mngLP->consultaIndependiente(" select count(*) as cantidad from   vistastrimestralbh3 where ".$scm." and menor='1'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F1
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from   vistastrimestralbh3 where ".$scf." and menor='1'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M2
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from   vistastrimestralbh3 where ".$scm." and menor='0'  and edad between '1' and '4'");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F2
$data = $mngLP->consultaIndependiente(" select count(*) as cantidad from   vistastrimestralbh3 where ".$scf." and menor='0'  and edad between '1' and '4'");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M3
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from   vistastrimestralbh3 where ".$scm." and menor='0'  and edad between '5' and '14' ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F3
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from   vistastrimestralbh3 where ".$scf." and menor='0'  and edad between '5' and '14' ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M4
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from   vistastrimestralbh3 where ".$scm." and menor='0'  and edad between '15' and '24'");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F4
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from   vistastrimestralbh3 where ".$scf." and menor='0'  and edad between '15' and '24' ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M5
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from   vistastrimestralbh3 where ".$scm." and menor='0'  and edad between '25' and '34'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F5
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from   vistastrimestralbh3 where ".$scf." and menor='0'  and edad between '25' and '34' ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M6
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from   vistastrimestralbh3 where ".$scm." and menor='0'  and edad between '35' and '44' ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F6
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from   vistastrimestralbh3 where ".$scf." and menor='0'  and edad between '35' and '44' ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M7
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from   vistastrimestralbh3 where ".$scm." and menor='0'  and edad between '45' and '54'");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F7
$data = $mngLP->consultaIndependiente(" select count(*) as cantidad from   vistastrimestralbh3 where ".$scf." and menor='0'  and edad between '45' and '54' ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M8
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from   vistastrimestralbh3 where ".$scm." and menor='0'  and edad between '55' and '64'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F8
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from   vistastrimestralbh3 where ".$scf." and menor='0'  and edad between '55' and '64'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M9
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from   vistastrimestralbh3 where ".$scm." and menor='0'  and edad between '65' and '200' ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F9
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from   vistastrimestralbh3 where ".$scf." and menor='0'  and edad between '65' and '200'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila++, $data['DATA'][0]['cantidad']);

$colum='E';

//M1
$data = $mngLP->consultaIndependiente(" select count(*) as cantidad from   vistastrimestralch3 where ".$scm." and menor='1'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F1
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from   vistastrimestralch3 where ".$scf." and menor='1'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M2
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from   vistastrimestralch3 where ".$scm." and menor='0'  and edad between '1' and '4'");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F2
$data = $mngLP->consultaIndependiente(" select count(*) as cantidad from   vistastrimestralch3 where ".$scf." and menor='0'  and edad between '1' and '4'");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M3
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from   vistastrimestralch3 where ".$scm." and menor='0'  and edad between '5' and '14' ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F3
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from   vistastrimestralch3 where ".$scf." and menor='0'  and edad between '5' and '14' ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M4
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from   vistastrimestralch3 where ".$scm." and menor='0'  and edad between '15' and '24'");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F4
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from   vistastrimestralch3 where ".$scf." and menor='0'  and edad between '15' and '24' ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M5
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from   vistastrimestralch3 where ".$scm." and menor='0'  and edad between '25' and '34'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F5
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from   vistastrimestralch3 where ".$scf." and menor='0'  and edad between '25' and '34' ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M6
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from   vistastrimestralch3 where ".$scm." and menor='0'  and edad between '35' and '44' ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F6
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from   vistastrimestralch3 where ".$scf." and menor='0'  and edad between '35' and '44' ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M7
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from   vistastrimestralch3 where ".$scm." and menor='0'  and edad between '45' and '54'");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F7
$data = $mngLP->consultaIndependiente(" select count(*) as cantidad from   vistastrimestralch3 where ".$scf." and menor='0'  and edad between '45' and '54' ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M8
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from   vistastrimestralch3 where ".$scm." and menor='0'  and edad between '55' and '64'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F8
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from   vistastrimestralch3 where ".$scf." and menor='0'  and edad between '55' and '64'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M9
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from   vistastrimestralch3 where ".$scm." and menor='0'  and edad between '65' and '200' ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F9
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from   vistastrimestralch3 where ".$scf." and menor='0'  and edad between '65' and '200'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila++, $data['DATA'][0]['cantidad']);

$colum='E';

//M1
$data = $mngLP->consultaIndependiente(" select count(*) as cantidad from   vistastrimestraldh3 where ".$scm." and menor='1'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F1
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from   vistastrimestraldh3 where ".$scf." and menor='1'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M2
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from   vistastrimestraldh3 where ".$scm." and menor='0'  and edad between '1' and '4'");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F2
$data = $mngLP->consultaIndependiente(" select count(*) as cantidad from   vistastrimestraldh3 where ".$scf." and menor='0'  and edad between '1' and '4'");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M3
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from   vistastrimestraldh3 where ".$scm." and menor='0'  and edad between '5' and '14' ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F3
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from   vistastrimestraldh3 where ".$scf." and menor='0'  and edad between '5' and '14' ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M4
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from   vistastrimestraldh3 where ".$scm." and menor='0'  and edad between '15' and '24'");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F4
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from   vistastrimestraldh3 where ".$scf." and menor='0'  and edad between '15' and '24' ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M5
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from   vistastrimestraldh3 where ".$scm." and menor='0'  and edad between '25' and '34'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F5
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from   vistastrimestraldh3 where ".$scf." and menor='0'  and edad between '25' and '34' ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M6
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from   vistastrimestraldh3 where ".$scm." and menor='0'  and edad between '35' and '44' ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F6
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from   vistastrimestraldh3 where ".$scf." and menor='0'  and edad between '35' and '44' ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M7
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from   vistastrimestraldh3 where ".$scm." and menor='0'  and edad between '45' and '54'");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F7
$data = $mngLP->consultaIndependiente(" select count(*) as cantidad from   vistastrimestraldh3 where ".$scf." and menor='0'  and edad between '45' and '54' ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M8
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from   vistastrimestraldh3 where ".$scm." and menor='0'  and edad between '55' and '64'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F8
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from   vistastrimestraldh3 where ".$scf." and menor='0'  and edad between '55' and '64'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//M9
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from   vistastrimestraldh3 where ".$scm." and menor='0'  and edad between '65' and '200' ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila, $data['DATA'][0]['cantidad']);
//F9
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from   vistastrimestraldh3 where ".$scf." and menor='0'  and edad between '65' and '200'  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum++.$contadorFila++, $data['DATA'][0]['cantidad']);


$contadorFila=57;

$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestrala where ".$consultavih." ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('D'.$contadorFila, $data['DATA'][0]['cantidad']);

$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralb where ".$consultavih."   ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('M'.$contadorFila, $data['DATA'][0]['cantidad']);

$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestralc where ".$consultavih."  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('X'.$contadorFila++, $data['DATA'][0]['cantidad']);
 
$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestrald where ".$consultavih." ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('E'.$contadorFila, $data['DATA'][0]['cantidad']);

$data = $mngLP->consultaIndependiente("select count(*) as cantidad from vistastrimestrale where ".$consultavih."  ");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('S'.$contadorFila++, $data['DATA'][0]['cantidad']);
 

if($mnpo!="" && $trime!="" && $ipsinicia!=""){
    
    $data = $mngLP->consultaIndependiente("select count(*) as cantidad from quimioprofilaxis where criterioadministratpi='VIH' AND ano='".$ano."' AND municipio='".$mnpo."' and trimestre='".$trime."' and ipscontunuamanejo='".$ipsinicia."' ");
    $objPHPExcel->setActiveSheetIndex(0)->setCellValue('X'.$contadorFila++, $data['DATA'][0]['cantidad']);

    $data = $mngLP->consultaIndependiente("select count(*) as cantidad from quimioprofilaxis where criterioadministratpi!='VIH' AND ano='".$ano."' AND municipio='".$mnpo."'  and trimestre='".$trime."' and ipscontunuamanejo='".$ipsinicia."'  ");
    $objPHPExcel->setActiveSheetIndex(0)->setCellValue('X'.$contadorFila, $data['DATA'][0]['cantidad']);
 
}
if($mnpo!="" && $trime!="" && $ipsinicia==""){
    $data = $mngLP->consultaIndependiente("select count(*) as cantidad from quimioprofilaxis where criterioadministratpi='VIH' AND ano='".$ano."' AND municipio='".$mnpo."' and trimestre='".$trime."'  ");
    $objPHPExcel->setActiveSheetIndex(0)->setCellValue('X'.$contadorFila++, $data['DATA'][0]['cantidad']);

    $data = $mngLP->consultaIndependiente(" select count(*) as cantidad from quimioprofilaxis where criterioadministratpi!='VIH' AND ano='".$ano."' AND municipio='".$mnpo."'  and trimestre='".$trime."'");
    $objPHPExcel->setActiveSheetIndex(0)->setCellValue('X'.$contadorFila++, $data['DATA'][0]['cantidad']);
 
}
if($mnpo!="" && $trime=="" && $ipsinicia!=""){
    $data = $mngLP->consultaIndependiente(" select count(*) as cantidad from quimioprofilaxis where criterioadministratpi='VIH' AND ano='".$ano."' AND municipio='".$mnpo."'  and ipscontunuamanejo='".$ipsinicia."' ");
    $objPHPExcel->setActiveSheetIndex(0)->setCellValue('X'.$contadorFila++, $data['DATA'][0]['cantidad']);

    $data = $mngLP->consultaIndependiente(" select count(*) as cantidad from quimioprofilaxis where criterioadministratpi!='VIH' AND ano='".$ano."' AND municipio='".$mnpo."'  and ipscontunuamanejo='".$ipsinicia."'");
    $objPHPExcel->setActiveSheetIndex(0)->setCellValue('X'.$contadorFila++, $data['DATA'][0]['cantidad']);
 
}
if($mnpo!="" && $trime=="" && $ipsinicia==""){
    $data = $mngLP->consultaIndependiente("select count(*) as cantidad from quimioprofilaxis where criterioadministratpi='VIH' AND ano='".$ano."' AND municipio='".$mnpo."' ");
    $objPHPExcel->setActiveSheetIndex(0)->setCellValue('X'.$contadorFila++, $data['DATA'][0]['cantidad']);

    $data = $mngLP->consultaIndependiente("select count(*) as cantidad from quimioprofilaxis where criterioadministratpi!='VIH' AND ano='".$ano."' AND municipio='".$mnpo."' ");
    $objPHPExcel->setActiveSheetIndex(0)->setCellValue('X'.$contadorFila++, $data['DATA'][0]['cantidad']);
 
}
if($mnpo=="" && $trime!="" && $ipsinicia!=""){
    $data = $mngLP->consultaIndependiente("select count(*) as cantidad from quimioprofilaxis where criterioadministratpi='VIH' AND ano='".$ano."' and trimestre='".$trime."'  and ipscontunuamanejo='".$ipsinicia."' ");
    $objPHPExcel->setActiveSheetIndex(0)->setCellValue('X'.$contadorFila++, $data['DATA'][0]['cantidad']);

    $data = $mngLP->consultaIndependiente("select count(*) as cantidad from quimioprofilaxis where criterioadministratpi!='VIH' AND ano='".$ano."' and trimestre='".$trime."' and ipscontunuamanejo='".$ipsinicia."' ");
    $objPHPExcel->setActiveSheetIndex(0)->setCellValue('X'.$contadorFila++, $data['DATA'][0]['cantidad']);
 
}
if($mnpo=="" && $trime!="" && $ipsinicia==""){
    $data = $mngLP->consultaIndependiente("select count(*) as cantidad from quimioprofilaxis where criterioadministratpi='VIH' AND ano='".$ano."' and trimestre='".$trime."' ");
    $objPHPExcel->setActiveSheetIndex(0)->setCellValue('X'.$contadorFila++, $data['DATA'][0]['cantidad']);

    $data = $mngLP->consultaIndependiente("select count(*) as cantidad from quimioprofilaxis where criterioadministratpi!='VIH' AND ano='".$ano."' and trimestre='".$trime."'");
    $objPHPExcel->setActiveSheetIndex(0)->setCellValue('X'.$contadorFila++, $data['DATA'][0]['cantidad']);
 
}
if($mnpo=="" && $trime=="" && $ipsinicia!=""){
    $data = $mngLP->consultaIndependiente("select count(*) as cantidad from quimioprofilaxis where criterioadministratpi='VIH' AND ano='".$ano."' and ipscontunuamanejo='".$ipsinicia."'");
    $objPHPExcel->setActiveSheetIndex(0)->setCellValue('X'.$contadorFila++, $data['DATA'][0]['cantidad']);

    $data = $mngLP->consultaIndependiente(" select count(*) as cantidad from quimioprofilaxis where criterioadministratpi!='VIH' AND ano='".$ano."' and ipscontunuamanejo='".$ipsinicia."'");
    $objPHPExcel->setActiveSheetIndex(0)->setCellValue('X'.$contadorFila++, $data['DATA'][0]['cantidad']);
 
}
if($mnpo=="" && $trime=="" && $ipsinicia==""){
    $data = $mngLP->consultaIndependiente("select count(*) as cantidad from quimioprofilaxis where criterioadministratpi='VIH' AND ano='".$ano."'");
    $objPHPExcel->setActiveSheetIndex(0)->setCellValue('X'.$contadorFila++, $data['DATA'][0]['cantidad']);

    $data = $mngLP->consultaIndependiente("select count(*) as cantidad from quimioprofilaxis where criterioadministratpi!='VIH' AND ano='".$ano."'");
    $objPHPExcel->setActiveSheetIndex(0)->setCellValue('X'.$contadorFila++, $data['DATA'][0]['cantidad']);
 
}
function colorCelda($color,$celda){
    global $objPHPExcel;
    $objPHPExcel->getActiveSheet()->getStyle($celda)->getFill()->applyFromArray(array(
        'type' => PHPExcel_Style_Fill::FILL_SOLID,
        'startcolor' => array(
            'rgb' => $color
        )
    ));
}                                 
if($trime=='I'){
    colorCelda('CCFFCC','F41:G5');
}else if($trime=='II'){
    colorCelda('CCFFCC','F41:G5');
}else if($trime=='III'){
    colorCelda('CCFFCC','F41:G5');
}else if($trime=='IV'){
    colorCelda('CCFFCC','F41:G5');
} 




header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
header('Content-Disposition: attachment;filename="INFORME TRIMESTRAL'.$strvar.'.xlsx"');
header('Cache-Control: max-age=0');

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
ob_clean();

 return ($objWriter->save('php://output'));
 
?>