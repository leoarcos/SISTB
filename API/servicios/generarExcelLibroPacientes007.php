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

if($_GET['ano']){
     
    $data = $mngLP->listarPacientes007($_GET['ano']);
}else{
    
    $data = $mngLP->listarPacientes007('all');
}
 
if($data['STATUS']=="OK"){


    $er=1;

    
    $objPHPExcel = new PHPExcel();
    $objPHPExcel->getProperties()->setCreator("IDS")
                                ->setLastModifiedBy("SISTB")
                                ->setTitle("LIBRO PACIENTES")
                                ->setSubject("LISTADO LIBRO PACIENTES CIRCULAR =/")
                                ->setDescription("")
                                ->setKeywords("office PHPExcel php")
                                ->setCategory("IDS");
    $objPHPExcel->getActiveSheet()->setTitle("Libro Pacientes Circular 007");                             
    $colum='A';
    $objPHPExcel->setActiveSheetIndex(0)
                ->setCellValue($colum++.'1', 'N°')
                ->setCellValue($colum++.'1', 'DEPARTAMENTO')
                ->setCellValue($colum++.'1', 'MUNICIPIO')
                ->setCellValue($colum++.'1', 'IPS DE DIAGNÓSTICO')
                ->setCellValue($colum++.'1', 'IPS DE SEGUIMIENTO DE TRATAMIENTO')
                ->setCellValue($colum++.'1', 'TRIMESTRE DEL AÑO')
                ->setCellValue($colum++.'1', 'FECHA DE DIAGNOSTICO (dd/mm/aaaa)')
                ->setCellValue($colum++.'1', 'FECHA DE INICIO DE SÍNTOMAS (dd/mm/aaaa)')
                ->setCellValue($colum++.'1', 'INGRESA A TRATAMIENTO')
                ->setCellValue($colum++.'1', 'FECHA DE INGRESO A TRATAMIENTO (dd/mm/aaaa)')
                ->setCellValue($colum++.'1', 'NOMBRES')
                ->setCellValue($colum++.'1', 'PRIMER APELLIDO')
                ->setCellValue($colum++.'1', 'SEGUNDO APELLIDO')
                ->setCellValue($colum++.'1', 'SEXO')
                ->setCellValue($colum++.'1', 'EDAD (EN AÑOS)')
                ->setCellValue($colum++.'1', 'TIPO DE ID')
                ->setCellValue($colum++.'1', 'No. ID')
                ->setCellValue($colum++.'1', 'PERTENENCIA ÉTNICA')
                ->setCellValue($colum++.'1', 'PUEBLO INDÍGENA')
                ->setCellValue($colum++.'1', 'GRUPO POBLACIONAL')
                ->setCellValue($colum++.'1', 'DIRECCIÓN')
                ->setCellValue($colum++.'1', 'TELÉFONO')
                ->setCellValue($colum++.'1', 'BARRIO')
                ->setCellValue($colum++.'1', 'COMUNA/LOCALIDAD')
                ->setCellValue($colum++.'1', 'RÉGIMEN DE AFILIACIÓN')
                ->setCellValue($colum++.'1', 'EAPB')
                ->setCellValue($colum++.'1', 'TIPO DE TUBERCULOSIS') 
                ->setCellValue($colum++.'1', 'LOCALIZACIÓN DE LA TB EXTRAPULMONAR')
                ->setCellValue($colum++.'1', 'CLASIFICACIÓN')
                ->setCellValue($colum++.'1', 'CONDICIÓN DE INGRESO')
                ->setCellValue($colum++.'1', 'BK')
                ->setCellValue($colum++.'1', 'FECHA (dd/mm/aaaa)')
                ->setCellValue($colum++.'1', 'CULTIVO')
                ->setCellValue($colum++.'1', 'FECHA (dd/mm/aaaa)')
                ->setCellValue($colum++.'1', 'PRUEBA MOLECULAR')
                ->setCellValue($colum++.'1', 'FECHA (dd/mm/aaaa) ')
                ->setCellValue($colum++.'1', 'SE REALIZÓ APV')
                ->setCellValue($colum++.'1', 'SE REALIZÓ PRUEBA')
                ->setCellValue($colum++.'1', 'RESULTADO PRUEBA')
                ->setCellValue($colum++.'1', 'FECHA REALIZACIÓN (dd/mm/aaaa)')
                ->setCellValue($colum++.'1', 'PRUEBA CONFIRMATORIA ACORDE A LA NORMA')
                ->setCellValue($colum++.'1', 'FECHA REALIZACIÓN (Dx previo o actual) (dd/mm/aaaa)')
                ->setCellValue($colum++.'1', 'RECIBE TAR')
                ->setCellValue($colum++.'1', 'RECIBE TRIMETOPRIM')
                ->setCellValue($colum++.'1', 'BK (Final 1ra Fase) ')
                ->setCellValue($colum++.'1', 'BK (Mitad de la 2da Fase)')
                ->setCellValue($colum++.'1', 'BK (Final tto)')
                ->setCellValue($colum++.'1', 'CULTIVO AL FINAL DEL TRATAMIENTO')
                ->setCellValue($colum++.'1', 'PRUEBA DE SUSCEPTIBILIDAD A FÁRMACOS')
                ->setCellValue($colum++.'1', 'TIPO DE FARMACORRESISTENCIA')
                ->setCellValue($colum++.'1', 'CONDICIÓN DE EGRESO')
                ->setCellValue($colum++.'1', 'FECHA DE EGRESO (dd/mm/aaaa) ')
                ->setCellValue($colum++.'1', 'COMORBILIDAD')
                ->setCellValue($colum++.'1', 'OBSERVACIONES')
                ->setCellValue($colum++.'1', 'TIENE VISITA?')
                ->setCellValue($colum++.'1', 'FECHA DE INVESTIGACIÓN DE LA VISITA')
                ->setCellValue($colum++.'1', 'CONTACTOS IDENTIFICADOS')
                ->setCellValue($colum++.'1', 'CONTACTOS SR')
                ->setCellValue($colum++.'1', 'CONTACTOS EXAMINADOS CON BACILOSCOPIA')
                ->setCellValue($colum++.'1', 'CONTACTOS ENFERMOS');
    
    $colum='A';
    $fil=2;
    
    //$objPHPExcel->setTitle('Libro Pacientes');
    
    $cantiLP=intVal(count($data['DATA']));
            
    for($t=0;$t<$cantiLP;$t++){
        $colum='A';
        $objPHPExcel->setActiveSheetIndex(0)
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['num'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['entidadterritorial'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['municipio'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['ipsinicia'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['ipscontinua'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['trimestre'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['fechadiagnostico'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['fechainiciodesintomas'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['ingresaatratamiento'])
                ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['fechaingreso']);


                $nomv=$data['DATA'][$t]['nombresyapellidos'];
                       $nom1="";
                       $nom2="";
                       $pape="";
                       $sape="";
                       $cov=str_split($nomv);
                       $c=0;
                       for($i=0;$i<count($cov);$i++)
                           if($cov[$i]!=' '){
                             $nom1.=$cov[$i];
                             $c=$i;
                            }
                           else $i=count($cov);
                       
                       for($i=$c+2;$i<count($cov);$i++)
                            if($cov[$i]!=' '){
                              $nom2.=$cov[$i];
                              $c=$i;
                            }
                            else $i=count($cov);
                       
                       for($i=$c+2;$i<count($cov);$i++)
                           if($cov[$i]!=' '){
                              $pape.=$cov[$i];
                              $c=$i;
                              }
                            else $i=count($cov);
                       
                       for($i=$c+2;$i<count($cov);$i++)
                           $sape.=$cov[$i];
                       
                       if($sape==""){
                         $sape=$pape;
                         $pape=$nom2;
                         $nom2="";
                       }
        $objPHPExcel->setActiveSheetIndex(0)
                    ->setCellValue($colum++.''.strval($fil), $nom1." ".$nom2)
                    ->setCellValue($colum++.''.strval($fil), $pape)
                    ->setCellValue($colum++.''.strval($fil), $sape)
                    ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['sexo'])
                    ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['edad'])
                    ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['tipoidentificacion'])
                    ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['identificacion'])
                    ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['etnia'])
                    ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['puebloindigena'])
                    ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['grupopoblacional'])
                    ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['direccion'])
                    ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['telefono'])
                    ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['sectores'])
                    ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['comuna'])
                    ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['regimen'])
                    ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['epsars']);

                    if($data['DATA'][$t]['tipotb']=="LARINGEA" || $data['DATA'][$t]['tipotb']=="MILIAR" || $data['DATA'][$t]['tipotb']=="PULMONAR"){
                        $objPHPExcel->setActiveSheetIndex(0)
                                    ->setCellValue($colum++.''.strval($fil), 'PULMONAR');
                    }else{
                        $objPHPExcel->setActiveSheetIndex(0)
                                    ->setCellValue($colum++.''.strval($fil), 'EXTRAPULMONAR');
                    }
                    
        $objPHPExcel->setActiveSheetIndex(0)
                    ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['tipotb'])
                    ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['tipoconfimacionbacteriologica'])
                    ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['condicioningreso'])
                    ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['fdrbreporte'])
                    ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['fdrbfecha'])
                    ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['fdrcreporte'])
                    ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['fdrcfecha'])
                    ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['pruebamolecular'])
                    ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['fechapruebamolecular'])
                    ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['coinfeccionvihconsejeria'])
                    ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['serealizoprueba'])
                    ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['pruebatamisaje'])
                    ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['fechadereportevih'])
                    ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['coinfeccionvihwb'])
                    ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['fechaconfirmatoriawb'])
                    ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['vihtarv'])
                    ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['recibetratamientopreventivo'])
                    ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['controltratamiento2'])
                    ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['controltratamiento4'])
                    ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['controltratamiento6'])
                    ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['cultivoalfinaltratamiento'])
                    ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['pruebadesusceptibilidadafarmacos'])
                    ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['resistentea'])
                    ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['condicionegreso'])
                    ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['fechadeegreso'])
                    ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['patologiaasociada'])
                    ->setCellValue($colum++.''.strval($fil), $data['DATA'][$t]['observaciones']);
        
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
    $objPHPExcel->getActiveSheet()->getStyle('A1:DC1')->applyFromArray($style);
    colorCelda('CCFFCC','A1:DC1');
    $ancho=1;
    $ii='B';
    do{
        
        $objPHPExcel->getActiveSheet()->getColumnDimension($ii)->setAutoSize(true);
        if($ii=='DC'){
            
            $ancho=0;
        }
        $ii++;
    
    }
    while($ancho==1);
    
    


}else{
    echo "<script>alert('No Se Encuentran Registros!');</script>";
    
}

  


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
header('Content-Disposition: attachment;filename="LIBRO PACIENTES.xlsx"');
header('Cache-Control: max-age=0');

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
ob_clean();

$objWriter->save('php://output');
        

?>