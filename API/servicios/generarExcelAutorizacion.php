<?php
header("Content-Type: text/html;charset=utf-8");
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);
ini_set('memory_limit', '-1');
define('EOL',(PHP_SAPI == 'cli') ? PHP_EOL : '<br />');

include_once '../DTO/autorizacion_DTO.php';
require_once '../PHPExcel/Classes/PHPExcel.php';
$style = array(
    'alignment' => array(
        'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
        'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
        ),
        'font'  => array(
                'bold'  => true,
                'size'  => 10,
                'name'  => 'Verdana'
        )
        
    );
    $styleCenter = array(
        'alignment' => array(
            'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
            'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
            ) 
            
        );
$styleBorder=array(
    'borders' => array(
        'allborders' => array(
                    'style' => PHPExcel_Style_Border::BORDER_THICK
        )
    ) 
);
$styleImagen = array(
    'alignment' => array(
        'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
        'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
        ) 
    );
$mngLP = new autorizacion_DTO();
$objPHPExcel = new PHPExcel();

$objPHPExcel->getProperties()->setCreator("IDS")
                            ->setLastModifiedBy("SISTB")
                            ->setTitle("AUTORIZACION")
                            ->setSubject("AUTORIZACION DE MEDICAMENTOS")
                            ->setDescription("")
                            ->setKeywords("MEDICAMENTOS IDS SALUD TB")
                            ->setCategory("IDS");

$objPHPExcel->getActiveSheet()->setTitle("AUTORIZACION-".$_GET['consecutivo']);       

$data = $mngLP->buscarAutorizacion($_GET['consecutivo'], $_GET['id']);
print_r($data);

if($data['STATUS']){

    $dataMedicamentos = $mngLP->listarMedicamentosAutorizacion($_GET['consecutivo']);
    print_r($dataMedicamentos);
    if($dataMedicamentos['STATUS']=='OK'){
        
        $objPHPExcel->setActiveSheetIndex(0)
                    ->setCellValue('C1', 'AUTORIZACIÓN DE MEDICAMENTOS')
                    ->setCellValue('C4', 'ANTITUBERCULOSOS')
                    ->setCellValue('B7', 'CONTROL SOLICITUD')
                    ->setCellValue('B9', 'FECHA DE LA SOLICITUD: '.$data['DATA'][0]['fechasolicitud'])
                    ->setCellValue('B10', 'NUMERO DE AUTORIZACIÒN: '.$_GET['consecutivo'])
                    ->setCellValue('B12', 'DATOS DEL PACIENTE');

        if(isset($_GET['libro'])){
            $objPHPExcel->setActiveSheetIndex(0)
                ->setCellValue('B14', 'Nº DE REGISTRO EN EL LIBRO : '.$_GET['libro']);

        }else{
            $objPHPExcel->setActiveSheetIndex(0)
                ->setCellValue('B14', 'Nº DE REGISTRO EN EL LIBRO : '.$data['DATA'][0]['consecutivolibro']);

        }            
       
        $objPHPExcel->setActiveSheetIndex(0)
                    ->setCellValue('B15', 'NOMBRES COMPLETOS :  '.strtoupper($data['DATA'][0]['nombresapellidos']))
                    ->setCellValue('B16', 'TIPO DE IDENTIFICACION : '.$data['DATA'][0]['tipoidentificacion'].'         N°: '.$data['DATA'][0]['numeroidentificacion'])
                    ->setCellValue('B17', ($data['DATA'][0]['menor']=="0")? 'EDAD: '.$data['DATA'][0]['edad'].' AÑOS     PESO (Kg):'.$data['DATA'][0]['peso'].'':'EDAD: '.$data['DATA'][0]['edad'].' MESES'.'   PESO (Kg):'.$data['DATA'][0]['peso'].'')
                    ->setCellValue('B19', 'FUNCIONARIO QUE REALIZA LA SOLICITUD')
                    ->setCellValue('B21', 'NOMBRE : '.$data['DATA'][0]['nombrefuncionario'].'      CARGO : '.$data['DATA'][0]['cargofuncionario'].'')
                    ->setCellValue('B22', 'INSTITUCIÒN : '.$data['DATA'][0]['institucion'].'       TELEFONO : '.$data['DATA'][0]['telefonofuncionario'].' ')
                    ->setCellValue('B23', 'CUMPLE CON LOS REQUISITOS PARA LA SOLICITUD DE TRATAMIENTO: '.$data['DATA'][0]['cumplerequisitos'].' ')
                    ->setCellValue('B24', 'SOPORTES PENDIENTES')//cENTRAR
                    ->setCellValue('B25', $data['DATA'][0]['soportespendientes'])
                    ->setCellValue('B26', 'MEDICAMENTO');
        $fila=28;
        $objPHPExcel->getActiveSheet(0)->getStyle('C1:C3')->applyFromArray($styleBorder);  
        colorCelda('CCFFCC','C1:C3');
        $objPHPExcel->getActiveSheet(0)->getStyle('C4:C5')->applyFromArray($styleBorder);  
        colorCelda('CCFFCC','C4:C5');
        $objPHPExcel->getActiveSheet(0)->getStyle('B7:D7')->applyFromArray($styleBorder);  
        colorCelda('CCFFCC','B7:D7');
        $objPHPExcel->getActiveSheet(0)->getStyle('B12:D12')->applyFromArray($styleBorder);  
        colorCelda('CCFFCC','B12:D12');
        $objPHPExcel->getActiveSheet(0)->getStyle('B19:D19')->applyFromArray($styleBorder);  
        colorCelda('CCFFCC','B19:D19');
        $objPHPExcel->getActiveSheet(0)->getStyle('B26:D26')->applyFromArray($styleBorder);  
        colorCelda('CCFFCC','B26:D26');
        $objPHPExcel->getActiveSheet(0)->getStyle('B24')->applyFromArray($styleCenter);  

        

        for($i=0;$i<count($dataMedicamentos['DATA']);$i++){
            $objPHPExcel->setActiveSheetIndex(0)
                        ->setCellValue('B'.$fila++, 'NOMBRE : '.$dataMedicamentos['DATA'][$i]['nombremedicamento'].'     PRESENTACIÓN : '.$dataMedicamentos['DATA'][$i]['presentacion'])
                        ->setCellValue('B'.$fila++, 'CONCENTRACIÓN : '.$dataMedicamentos['DATA'][$i]['concentracion'].'     LOTE : '.$dataMedicamentos['DATA'][$i]['lote'].'   LABORATORIO : '.$dataMedicamentos['DATA'][$i]['laboratorio'])
                        ->setCellValue('B'.$fila++, 'FECHA DE VENCIMIENTO : '.$dataMedicamentos['DATA'][$i]['fechavencimiento'].'       CANTIDAD AUTORIZADA :   '.$dataMedicamentos['DATA'][$i]['cantidadautorizada'])
                        ->setCellValue('B'.$fila++, '_____________________________________________________');
            $fila++;
        }
        $continuafila=$fila;

        $objPHPExcel->setActiveSheetIndex(0)
                    ->setCellValue('B'.($continuafila), 'FUNCIONARIO QUE RECEPCIONA Y VERIFICA LA DOCUMENTACIÓN');
        $objPHPExcel->getActiveSheet(0)->getStyle('B'.$continuafila)->applyFromArray($style);
        $objPHPExcel->getActiveSheet(0)->getStyle('B'.$continuafila.':D'.$continuafila)->applyFromArray($styleBorder);  
        colorCelda('CCFFCC','B'.$continuafila.':D'.$continuafila);

        

        $continuafila=$continuafila+2;
        
        $objPHPExcel->setActiveSheetIndex(0)
                    ->setCellValue('B'.($continuafila), $data['DATA'][0]['nombreautoriza']);
        $objPHPExcel->setActiveSheetIndex(0)->mergeCells('B'.$continuafila.':D'.$continuafila);
        
        $objPHPExcel->getActiveSheet(0)->getStyle('B'.$continuafila)->applyFromArray($style);
        $continuafila=$continuafila+2;

        $objPHPExcel->setActiveSheetIndex(0)
                    ->setCellValue('B'.($continuafila), 'OBSERVACIONES');
        $objPHPExcel->setActiveSheetIndex(0)->mergeCells('B'.$continuafila.':D'.$continuafila);
        $objPHPExcel->getActiveSheet(0)->getStyle('B'.$continuafila)->applyFromArray($style);  
        $objPHPExcel->getActiveSheet(0)->getStyle('B'.$continuafila.':D'.$continuafila)->applyFromArray($styleBorder);  
        colorCelda('CCFFCC','B'.$continuafila.':D'.$continuafila);
        $continuafila=$continuafila+2;

        $objPHPExcel->setActiveSheetIndex(0)
                    ->setCellValue('B'.($continuafila), $data['DATA'][0]['observaciones']);
        $objPHPExcel->setActiveSheetIndex(0)->mergeCells('B'.$continuafila.':D'.$continuafila);
        $continuafila=$continuafila+2;
        
        $objPHPExcel->setActiveSheetIndex(0)
                    ->setCellValue('B'.($continuafila), 'FUNCIONARIO QUE AUTORIZA TAES');
        $objPHPExcel->setActiveSheetIndex(0)->mergeCells('B'.$continuafila.':D'.$continuafila);
        $objPHPExcel->getActiveSheet(0)->getStyle('B'.$continuafila)->applyFromArray($style);
        $objPHPExcel->getActiveSheet(0)->getStyle('B'.$continuafila.':D'.$continuafila)->applyFromArray($styleBorder);  
        colorCelda('CCFFCC','B'.$continuafila.':D'.$continuafila);  
        $continuafila=$continuafila+2;

        $objPHPExcel->setActiveSheetIndex(0)
                    ->setCellValue('B'.($continuafila), '_____________________        _____________________');
        $objPHPExcel->setActiveSheetIndex(0)->mergeCells('B'.$continuafila.':D'.$continuafila);
        $objPHPExcel->getActiveSheet(0)->getStyle('B'.$continuafila)->applyFromArray($style);  
        $continuafila=$continuafila+1;
        
        $objPHPExcel->setActiveSheetIndex(0)
                    ->setCellValue('B'.($continuafila), 'APRUEBA TTO                         AUTORIZA TTO    ');
        $objPHPExcel->setActiveSheetIndex(0)->mergeCells('B'.$continuafila.':D'.$continuafila);
        $objPHPExcel->getActiveSheet(0)->getStyle('B'.$continuafila)->applyFromArray($style);  
        $continuafila=$continuafila+1;
 
        $objDrawing3 = new PHPExcel_Worksheet_Drawing(); 
        $objDrawing3->setName('norte'); 
        $objDrawing3->setDescription('norte'); 
        $objDrawing3->setPath('../iconos/norte.png'); 
        $objDrawing3->setCoordinates('D'.($continuafila)); 
        //setOffsetX works properly 
        $objDrawing3->setOffsetX(5); 
        $objDrawing3->setOffsetY(5); 
        //set width, height 
        $objDrawing3->setWidth(82);  
        $objDrawing3->setWorksheet($objPHPExcel->getActiveSheet()); 
        $objPHPExcel->setActiveSheetIndex(0)->mergeCells('D'.$continuafila.':D'.($continuafila+4));
        $objPHPExcel->getActiveSheet(0)->getStyle('D'.$continuafila)->applyFromArray($styleImagen); 

        $objPHPExcel->setActiveSheetIndex(0)->mergeCells('D'.$continuafila.':D'.($continuafila+4));
        $objPHPExcel->getActiveSheet(0)->getStyle('D'.$continuafila)->applyFromArray($styleImagen);  
        $continuafila=$continuafila+5;

        
        $objPHPExcel->setActiveSheetIndex(0)->mergeCells('B'.$continuafila.':D'.($continuafila+2));
        $objPHPExcel->setActiveSheetIndex(0)
        ->setCellValue('B'.($continuafila), 'Av.0 Calle 10 Edificio Rosetal Telefono 5784988 EXT:123');
        $objPHPExcel->getActiveSheet(0)->getStyle('B'.$continuafila)->applyFromArray($style);
        $objPHPExcel->getActiveSheet(0)->getStyle('B'.$continuafila.':D'.($continuafila+2))->applyFromArray($styleBorder);  
        colorCelda('CCFFCC','B'.$continuafila.':D'.($continuafila+2));  
        $continuafila=$continuafila+1;
    

        $objDrawing = new PHPExcel_Worksheet_Drawing(); 
        $objDrawing->setName('gobernacion'); 
        $objDrawing->setDescription('gobernacion'); 
        $objDrawing->setPath('../iconos/gobernacion.png'); 
        $objDrawing->setCoordinates('B1'); 
        //setOffsetX works properly 
        $objDrawing->setOffsetX(5); 
        $objDrawing->setOffsetY(5); 
        //set width, height 
        $objDrawing->setWidth(125); 
        $objDrawing->setWorksheet($objPHPExcel->getActiveSheet()); 

        $objDrawing2 = new PHPExcel_Worksheet_Drawing(); 
        $objDrawing2->setName('ids'); 
        $objDrawing2->setDescription('ids'); 
        $objDrawing2->setPath('../iconos/ids.png'); 
        $objDrawing2->setCoordinates('D1'); 
        //setOffsetX works properly 
        $objDrawing2->setOffsetX(5); 
        $objDrawing2->setOffsetY(5); 
        //set width, height 
        $objDrawing2->setWidth(110); 
        $objDrawing2->setWorksheet($objPHPExcel->getActiveSheet()); 

        //combinar celdas
        $objPHPExcel->setActiveSheetIndex(0)->mergeCells('B1:B5');
        $objPHPExcel->setActiveSheetIndex(0)->mergeCells('C1:C3');
        $objPHPExcel->setActiveSheetIndex(0)->mergeCells('C4:C5');
        $objPHPExcel->setActiveSheetIndex(0)->mergeCells('D1:D5');
        $objPHPExcel->setActiveSheetIndex(0)->mergeCells('F1:F5');
        $objPHPExcel->setActiveSheetIndex(0)->mergeCells('G1:G3');
        $objPHPExcel->setActiveSheetIndex(0)->mergeCells('G4:G5');
        $objPHPExcel->setActiveSheetIndex(0)->mergeCells('H1:H5');
        for($o=6;$o<=$fila;$o++){
            $objPHPExcel->setActiveSheetIndex(0)->mergeCells('B'.$o.':D'.$o);
        }


        //alinear contenidos celdas al centro
        $objPHPExcel->getActiveSheet(0)->getStyle('B1:H8')->applyFromArray($style); 
        $objPHPExcel->getActiveSheet(0)->getStyle('B12')->applyFromArray($style); 
        $objPHPExcel->getActiveSheet(0)->getStyle('B19')->applyFromArray($style); 
        $objPHPExcel->getActiveSheet(0)->getStyle('B26')->applyFromArray($style);  




        //ajustar ancho celdas
        $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(4,29);
        $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(20,29);
        $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(43,29);
        $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(19,29);
        $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(9,29);


        $objPHPExcel->setActiveSheetIndex(0)
                    ->setCellValue('G1', 'AUTORIZACIÓN DE MEDICAMENTOS')
                    ->setCellValue('G4', 'ANTITUBERCULOSOS')
                    ->setCellValue('F7', 'GONTROL SOLICITUD')
                    ->setCellValue('F9', 'FECHA DE LA SOLICITUD: '.$data['DATA'][0]['fechasolicitud'])
                    ->setCellValue('F10', 'NUMERO DE AUTORIZACIÒN: '.$_GET['consecutivo'])
                    ->setCellValue('F12', 'DATOS DEL PACIENTE');

        if(isset($_GET['libro'])){

            $objPHPExcel->setActiveSheetIndex(0)
                ->setCellValue('F14', 'Nº DE REGISTRO EN EL LIBRO : '.$_GET['libro']);

        }else{
            $objPHPExcel->setActiveSheetIndex(0)
                        ->setCellValue('F14', 'Nº DE REGISTRO EN EL LIBRO : '.$data['DATA'][0]['consecutivolibro']);
        
        }      
         
        $objPHPExcel->setActiveSheetIndex(0)
                    ->setCellValue('F15', 'NOMBRES COMPLETOS :  '.strtoupper($data['DATA'][0]['nombresapellidos']))
                    ->setCellValue('F16', 'TIPO DE IDENTIFICACION : '.$data['DATA'][0]['tipoidentificacion'].'         N°: '.$data['DATA'][0]['numeroidentificacion'])
                    ->setCellValue('F17', ($data['DATA'][0]['menor']=="0")? 'EDAD: '.$data['DATA'][0]['edad'].' AÑOS     PESO (Kg):'.$data['DATA'][0]['peso'].'':'EDAD: '.$data['DATA'][0]['edad'].' MESES'.'   PESO (Kg):'.$data['DATA'][0]['peso'].'')
                    ->setCellValue('F19', 'FUNCIONARIO QUE REALIZA LA SOLICITUD')
                    ->setCellValue('F21', 'NOMBRE : '.$data['DATA'][0]['nombrefuncionario'].'      CARGO : '.$data['DATA'][0]['cargofuncionario'].'')
                    ->setCellValue('F22', 'INSTITUCIÒN : '.$data['DATA'][0]['institucion'].'       TELEFONO : '.$data['DATA'][0]['telefonofuncionario'].' ')
                    ->setCellValue('F23', 'CUMPLE CON LOS REQUISITOS PARA LA SOLICITUD DE TRATAMIENTO: '.$data['DATA'][0]['cumplerequisitos'].' ')
                    ->setCellValue('F24', 'SOPORTES PENDIENTES')
                    ->setCellValue('F25', $data['DATA'][0]['soportespendientes'])
                    ->setCellValue('F26', 'MEDICAMENTO');
        $fila=28;
        $objPHPExcel->getActiveSheet(0)->getStyle('G1:G3')->applyFromArray($styleBorder);  
        colorCelda('CCFFCC','G1:G3');
        $objPHPExcel->getActiveSheet(0)->getStyle('G4:G5')->applyFromArray($styleBorder);  
        colorCelda('CCFFCC','G4:G5');
        $objPHPExcel->getActiveSheet(0)->getStyle('F7:H7')->applyFromArray($styleBorder);  
        colorCelda('CCFFCC','F7:H7');
        $objPHPExcel->getActiveSheet(0)->getStyle('F12:H12')->applyFromArray($styleBorder);  
        colorCelda('CCFFCC','F12:H12');
        $objPHPExcel->getActiveSheet(0)->getStyle('F19:H19')->applyFromArray($styleBorder);  
        colorCelda('CCFFCC','F19:H19');
        $objPHPExcel->getActiveSheet(0)->getStyle('F26:H26')->applyFromArray($styleBorder);  
        colorCelda('CCFFCC','F26:H26');

        $objPHPExcel->getActiveSheet(0)->getStyle('F24')->applyFromArray($styleCenter);  
        


        for($i=0;$i<count($dataMedicamentos['DATA']);$i++){
            $objPHPExcel->setActiveSheetIndex(0)
                        ->setCellValue('F'.$fila++, 'NOMBRE : '.$dataMedicamentos['DATA'][$i]['nombremedicamento'].'     PRESENTACIÓN : '.$dataMedicamentos['DATA'][$i]['presentacion'])
                        ->setCellValue('F'.$fila++, 'CONCENTRACIÓN : '.$dataMedicamentos['DATA'][$i]['concentracion'].'     LOTE : '.$dataMedicamentos['DATA'][$i]['lote'].'   LABORATORIO : '.$dataMedicamentos['DATA'][$i]['laboratorio'])
                        ->setCellValue('F'.$fila++, 'FECHA DE VENCIMIENTO : '.$dataMedicamentos['DATA'][$i]['fechavencimiento'].'       CANTIDAD AUTORIZADA :   '.$dataMedicamentos['DATA'][$i]['cantidadautorizada'])
                        ->setCellValue('F'.$fila++, '_____________________________________________________');
            $fila++;
        }
        $continuafila=$fila;

        $objPHPExcel->setActiveSheetIndex(0)
                    ->setCellValue('F'.($continuafila), 'FUNCIONARIO QUE RECEPCIONA Y VERIFICA LA DOCUMENTACIÓN');
        $objPHPExcel->getActiveSheet(0)->getStyle('F'.$continuafila)->applyFromArray($style);
        $objPHPExcel->getActiveSheet(0)->getStyle('F'.$continuafila.':H'.$continuafila)->applyFromArray($styleBorder);  
        colorCelda('CCFFCC','F'.$continuafila.':H'.$continuafila);

        

        $continuafila=$continuafila+2;
        
        $objPHPExcel->setActiveSheetIndex(0)
                    ->setCellValue('F'.($continuafila), $data['DATA'][0]['nombreautoriza']);
        $objPHPExcel->setActiveSheetIndex(0)->mergeCells('F'.$continuafila.':H'.$continuafila);
        
        $objPHPExcel->getActiveSheet(0)->getStyle('F'.$continuafila)->applyFromArray($style);
        $continuafila=$continuafila+2;

        $objPHPExcel->setActiveSheetIndex(0)
                    ->setCellValue('F'.($continuafila), 'OBSERVACIONES');
        $objPHPExcel->setActiveSheetIndex(0)->mergeCells('F'.$continuafila.':H'.$continuafila);
        $objPHPExcel->getActiveSheet(0)->getStyle('F'.$continuafila)->applyFromArray($style);  
        $objPHPExcel->getActiveSheet(0)->getStyle('F'.$continuafila.':H'.$continuafila)->applyFromArray($styleBorder);  
        colorCelda('CCFFCC','F'.$continuafila.':H'.$continuafila);
        $continuafila=$continuafila+2;

        $objPHPExcel->setActiveSheetIndex(0)
                    ->setCellValue('F'.($continuafila), $data['DATA'][0]['observaciones']);
        $objPHPExcel->setActiveSheetIndex(0)->mergeCells('F'.$continuafila.':H'.$continuafila);
        $continuafila=$continuafila+2;
        
        $objPHPExcel->setActiveSheetIndex(0)
                    ->setCellValue('F'.($continuafila), 'FUNCIONARIO QUE AUTORIZA TAES');
        $objPHPExcel->setActiveSheetIndex(0)->mergeCells('F'.$continuafila.':H'.$continuafila);
        $objPHPExcel->getActiveSheet(0)->getStyle('F'.$continuafila)->applyFromArray($style);
        $objPHPExcel->getActiveSheet(0)->getStyle('F'.$continuafila.':H'.$continuafila)->applyFromArray($styleBorder);  
        colorCelda('CCFFCC','F'.$continuafila.':H'.$continuafila);  
        $continuafila=$continuafila+2;

        $objPHPExcel->setActiveSheetIndex(0)
                    ->setCellValue('F'.($continuafila), '_____________________        _____________________');
        $objPHPExcel->setActiveSheetIndex(0)->mergeCells('F'.$continuafila.':H'.$continuafila);
        $objPHPExcel->getActiveSheet(0)->getStyle('F'.$continuafila)->applyFromArray($style);  
        $continuafila=$continuafila+1;
        
        $objPHPExcel->setActiveSheetIndex(0)
                    ->setCellValue('F'.($continuafila), 'APRUEBA TTO                          AUTORIZA TTO    ');
        $objPHPExcel->setActiveSheetIndex(0)->mergeCells('F'.$continuafila.':H'.$continuafila);
        $objPHPExcel->getActiveSheet(0)->getStyle('F'.$continuafila)->applyFromArray($style);  
        $continuafila=$continuafila+1;
 
        $objDrawing3 = new PHPExcel_Worksheet_Drawing(); 
        $objDrawing3->setName('norte'); 
        $objDrawing3->setDescription('norte'); 
        $objDrawing3->setPath('../iconos/norte.png'); 
        $objDrawing3->setCoordinates('H'.($continuafila)); 
        //setOffsetX works properly 
        $objDrawing3->setOffsetX(5); 
        $objDrawing3->setOffsetY(5); 
        //set width, height 
        $objDrawing3->setWidth(82);  
        $objDrawing3->setWorksheet($objPHPExcel->getActiveSheet()); 
        $objPHPExcel->setActiveSheetIndex(0)->mergeCells('H'.$continuafila.':H'.($continuafila+4));
        $objPHPExcel->getActiveSheet(0)->getStyle('H'.$continuafila)->applyFromArray($styleImagen); 

        $objPHPExcel->setActiveSheetIndex(0)->mergeCells('H'.$continuafila.':H'.($continuafila+4));
        $objPHPExcel->getActiveSheet(0)->getStyle('H'.$continuafila)->applyFromArray($styleImagen);  
        $continuafila=$continuafila+5;

        
        $objPHPExcel->setActiveSheetIndex(0)->mergeCells('F'.$continuafila.':H'.($continuafila+2));
        $objPHPExcel->setActiveSheetIndex(0)
        ->setCellValue('F'.($continuafila), 'Av.0 Calle 10 Edificio Rosetal Telefono 5784988 EXT:123');
        $objPHPExcel->getActiveSheet(0)->getStyle('F'.$continuafila)->applyFromArray($style);
        $objPHPExcel->getActiveSheet(0)->getStyle('F'.$continuafila.':H'.($continuafila+2))->applyFromArray($styleBorder);  
        colorCelda('CCFFCC','F'.$continuafila.':H'.($continuafila+2));  
        $continuafila=$continuafila+1;
    

        $objDrawing = new PHPExcel_Worksheet_Drawing(); 
        $objDrawing->setName('gobernacion'); 
        $objDrawing->setDescription('gobernacion'); 
        $objDrawing->setPath('../iconos/gobernacion.png'); 
        $objDrawing->setCoordinates('F1'); 
        //setOffsetX works properly 
        $objDrawing->setOffsetX(5); 
        $objDrawing->setOffsetY(5); 
        //set width, height 
        $objDrawing->setWidth(125); 
        $objDrawing->setWorksheet($objPHPExcel->getActiveSheet()); 

        $objDrawing2 = new PHPExcel_Worksheet_Drawing(); 
        $objDrawing2->setName('ids'); 
        $objDrawing2->setDescription('ids'); 
        $objDrawing2->setPath('../iconos/ids.png'); 
        $objDrawing2->setCoordinates('H1'); 
        //setOffsetX works properly 
        $objDrawing2->setOffsetX(5); 
        $objDrawing2->setOffsetY(5); 
        //set width, height 
        $objDrawing2->setWidth(110); 
        $objDrawing2->setWorksheet($objPHPExcel->getActiveSheet()); 

        //combinar celdas
        $objPHPExcel->setActiveSheetIndex(0)->mergeCells('F1:F5');
        $objPHPExcel->setActiveSheetIndex(0)->mergeCells('G1:G3');
        $objPHPExcel->setActiveSheetIndex(0)->mergeCells('G4:G5');
        $objPHPExcel->setActiveSheetIndex(0)->mergeCells('H1:H5');
        $objPHPExcel->setActiveSheetIndex(0)->mergeCells('F1:F5');
        $objPHPExcel->setActiveSheetIndex(0)->mergeCells('G1:G3');
        $objPHPExcel->setActiveSheetIndex(0)->mergeCells('G4:G5');
        $objPHPExcel->setActiveSheetIndex(0)->mergeCells('H1:H5');
        for($o=6;$o<=$fila;$o++){
            $objPHPExcel->setActiveSheetIndex(0)->mergeCells('F'.$o.':H'.$o);
        }


        //alinear contenidos celdas al centro
        $objPHPExcel->getActiveSheet(0)->getStyle('F1:H8')->applyFromArray($style); 
        $objPHPExcel->getActiveSheet(0)->getStyle('F12')->applyFromArray($style); 
        $objPHPExcel->getActiveSheet(0)->getStyle('F19')->applyFromArray($style); 
        $objPHPExcel->getActiveSheet(0)->getStyle('F26')->applyFromArray($style);  




        //ajustar ancho celdas 
        $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(20,29);
        $objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(43,29);
        $objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(19,29);


        


        header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
        header('Content-Disposition: attachment;filename="AUTORIZACION '.$_GET['consecutivo'].'.xlsx"');
        header('Cache-Control: max-age=0');

        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
        ob_clean();

        $objWriter->save('php://output');                                
        
    }else{
        echo "<script>alert('Error Al Listar Medicamentos!...');</script>";
    }
}else{
    echo "<script>alert('Error Al Listar Autorizacion!...');</script>";
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
//print_r($data);


/*

            SE INICIA FOR HACIENDO LLAMADOS A LOS MEDICAMENTOS DEL PACIENTE            
 
$objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('B35', 'imagen')
            ->setCellValue('B37', 'imagen')
            ->setCellValue('B39', 'imagen')
            ->setCellValue('B41', 'imagen')
            ->setCellValue('B43', 'imagen')
            ->setCellValue('B47', 'imagen')
            ->setCellValue('B48', 'imagen')
            ->setCellValue('B49', 'imagen')
            ->setCellValue('B54', 'imagen');
            



    



            /*




            ->setCellValue('F1', 'imagen')
            ->setCellValue('G1', 'AUTORIZACIÓN DE MEDICAMENTOS')
            ->setCellValue('G4', 'ANTITUBERCULOSOS')
            ->setCellValue('H1', 'imagen')

            ->setCellValue('F7', 'CONTROL SOLICITUD');

$er=1;                      
$colum='A';

,
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

$colum='A';
$fil=2;

//$objPHPExcel->setTitle('Libro Pacientes');

$cantiLP=intVal(count($data['DATA']));

    




//
// $objPHPExcel->getActiveSheet()->getDefaultStyle()->applyFromArray($alienacion);
//$objPHPExcel->getActiveSheet()->getStyle('A1:DC1')->applyFromArray($style);
//colorCelda('CCFFCC','A1:DC1');
//$ancho=1;
// $ii='B';





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

        */