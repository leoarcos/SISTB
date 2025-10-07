<?php
header("Content-Type: text/html;charset=utf-8");
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);
ini_set('memory_limit', '-1');
define('EOL',(PHP_SAPI == 'cli') ? PHP_EOL : '<br />');

include_once '../DTO/stock_DTO.php';
require_once '../PHPExcel/Classes/PHPExcel.php';


//print_r($_POST['datos']);
$mngLP = new stock_DTO();
$data = $mngLP->listarStockId($_GET['consecutivo']);
$objPHPExcel = new PHPExcel();

$objPHPExcel->getProperties()->setCreator("IDS")
                            ->setLastModifiedBy("SISTB")
                            ->setTitle("AUTORIZACION")
                            ->setSubject("AUTORIZACION DE MEDICAMENTOS")
                            ->setDescription("")
                            ->setKeywords("MEDICAMENTOS IDS SALUD TB")
                            ->setCategory("IDS");

$objPHPExcel->getActiveSheet()->setTitle("STOCK-".$data['DATA'][0]['consecutivoautorizacion']);       
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


print_r($data);

if($data['STATUS']=='OK'){

    $objPHPExcel->setActiveSheetIndex(0)
                ->setCellValue('C1', 'AUTORIZACIÓN DE STOCK')
                ->setCellValue('C4', 'ANTITUBERCULOSOS')
                ->setCellValue('B6', 'CONTROL SOLICITUD')
                ->setCellValue('B9', 'FECHA DE LA SOLICITUD: '.$data['DATA'][0]['fechasolicitud'])
                ->setCellValue('B10', 'NUMERO DE AUTORIZACIÒN: '.$data['DATA'][0]['consecutivoautorizacion'])
                ->setCellValue('B12', 'DATOS DE EPS/IPS')
                ->setCellValue('B14', 'NOMBRE EPS/IPS :  '.strtoupper($data['DATA'][0]['nombreips']).'  TELEFONO: '.$data['DATA'][0]['numerotelefonicoips'])
                ->setCellValue('B16', 'FUNCIONARIO QUE REALIZA LA SOLICITUD')
                ->setCellValue('B18', 'NOMBRE : '.$data['DATA'][0]['nombrefuncionario'].'      CARGO : '.$data['DATA'][0]['cargofuncionario'].'')
                ->setCellValue('B19', 'INSTITUCIÒN : '.$data['DATA'][0]['institucion'].'       TELEFONO : '.$data['DATA'][0]['telefonofuncionario'].' ')
                ->setCellValue('B20', 'SOPORTES PENDIENTES') 
                ->setCellValue('B21', $data['DATA'][0]['pendiente'])
                ->setCellValue('B23', 'MEDICAMENTO(S)');

    $fila=25;
    for($i=0;$i<count($data['DATA']);$i++){
        $objPHPExcel->setActiveSheetIndex(0)
                    ->setCellValue('B'.$fila++, 'NOMBRE : '.$data['DATA'][$i]['nombremedicamento'].'     PRESENTACIÓN : '.$data['DATA'][$i]['presentacion'])
                    ->setCellValue('B'.$fila++, 'CONCENTRACIÓN : '.$data['DATA'][$i]['concentracion'].'     LOTE : '.$data['DATA'][$i]['lote'].'   LABORATORIO : '.$data['DATA'][$i]['laboratorio'])
                    ->setCellValue('B'.$fila++, 'FECHA DE VENCIMIENTO : '.$data['DATA'][$i]['fechavencimiento'].'       CANTIDAD AUTORIZADA :   '.$data['DATA'][$i]['cantidadautorizada'])
                    ->setCellValue('B'.$fila++, '_____________________________________________________');
        $fila++;
    }
    $continuafila=$fila;

    $objPHPExcel->setActiveSheetIndex(0)
                ->setCellValue('B'.($continuafila), 'FUNCIONARIO QUE RECEPCIONA Y VERIFICA LA DOCUMENTACIÓN');
    $objPHPExcel->getActiveSheet(0)->getStyle('B'.$continuafila)->applyFromArray($style);
    
    $objPHPExcel->setActiveSheetIndex(0)->mergeCells('B'.$continuafila.':D'.$continuafila);
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
                ->setCellValue('C'.($continuafila), 'APRUEBA STOCK                         AUTORIZA STOCK    '); 
    $objPHPExcel->getActiveSheet(0)->getStyle('C'.$continuafila)->applyFromArray($style);  
     


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




    //combinar celdas
    $objPHPExcel->setActiveSheetIndex(0)->mergeCells('B1:B5'); 
    $objPHPExcel->setActiveSheetIndex(0)->mergeCells('C1:C3');
    colorCelda('CCFFCC','C1:C3');
    $objPHPExcel->setActiveSheetIndex(0)->mergeCells('D1:D5'); 
    $objPHPExcel->setActiveSheetIndex(0)->mergeCells('C4:C5');
    colorCelda('CCFFCC','C4:C5');
    $objPHPExcel->setActiveSheetIndex(0)->mergeCells('B6:D7'); 
    colorCelda('CCFFCC','B6:D7');
    $objPHPExcel->setActiveSheetIndex(0)->mergeCells('B12:D12'); 
    colorCelda('CCFFCC','B12:D12');
    $objPHPExcel->setActiveSheetIndex(0)->mergeCells('B16:D16'); 
    colorCelda('CCFFCC','B16:D16');
    
    $objPHPExcel->setActiveSheetIndex(0)->mergeCells('B20:D20'); 
    $objPHPExcel->setActiveSheetIndex(0)->mergeCells('B21:D21'); 
    $objPHPExcel->setActiveSheetIndex(0)->mergeCells('B23:D23'); 
    colorCelda('CCFFCC','B23:B23');
     
    
    //alinear contenidos celdas al centro
    $objPHPExcel->getActiveSheet(0)->getStyle('B1:H7')->applyFromArray($style);  
    $objPHPExcel->getActiveSheet(0)->getStyle('B12')->applyFromArray($style); 
    $objPHPExcel->getActiveSheet(0)->getStyle('B16')->applyFromArray($style); 
    $objPHPExcel->getActiveSheet(0)->getStyle('B23')->applyFromArray($style); 
    
    $objPHPExcel->getActiveSheet(0)->getStyle('B20')->applyFromArray($styleCenter);
    
    //ESTILOS BORDES
    $objPHPExcel->getActiveSheet(0)->getStyle('C1:C3')->applyFromArray($styleBorder);
    $objPHPExcel->getActiveSheet(0)->getStyle('C4:C5')->applyFromArray($styleBorder);
    $objPHPExcel->getActiveSheet(0)->getStyle('B6:D7')->applyFromArray($styleBorder);
    $objPHPExcel->getActiveSheet(0)->getStyle('B12:D12')->applyFromArray($styleBorder);
    $objPHPExcel->getActiveSheet(0)->getStyle('B16:D16')->applyFromArray($styleBorder);
    $objPHPExcel->getActiveSheet(0)->getStyle('B23:D23')->applyFromArray($styleBorder);

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
    $objDrawing2->setWidth(109); 
    $objDrawing2->setWorksheet($objPHPExcel->getActiveSheet()); 



    //ajustar ancho celdas
    $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(4,29);
    $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(20,29);
    $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(43,29);
    $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(19,29);
    $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(9,29);


    $objPHPExcel->setActiveSheetIndex(0)
                ->setCellValue('G1', 'AUTORIZACIÓN DE STOCK')
                ->setCellValue('G4', 'ANTITUBERCULOSOS')
                ->setCellValue('F6', 'CONTROL SOLICITUD')
                ->setCellValue('F9', 'FECHA DE LA SOLICITUD: '.$data['DATA'][0]['fechasolicitud'])
                ->setCellValue('F10', 'NUMERO DE AUTORIZACIÒN: '.$data['DATA'][0]['consecutivoautorizacion'])
                ->setCellValue('F12', 'DATOS DE EPS/IPS')
                ->setCellValue('F14', 'NOMBRE EPS/IPS :  '.strtoupper($data['DATA'][0]['nombreips']).'  TELEFONO: '.$data['DATA'][0]['numerotelefonicoips'])
                ->setCellValue('F16', 'FUNCIONARIO QUE REALIZA LA SOLICITUD')
                ->setCellValue('F18', 'NOMBRE : '.$data['DATA'][0]['nombrefuncionario'].'      CARGO : '.$data['DATA'][0]['cargofuncionario'].'')
                ->setCellValue('F19', 'INSTITUCIÒN : '.$data['DATA'][0]['institucion'].'       TELEFONO : '.$data['DATA'][0]['telefonofuncionario'].' ')
                ->setCellValue('F20', 'SOPORTES PENDIENTES') 
                ->setCellValue('F21', $data['DATA'][0]['pendiente'])
                ->setCellValue('F23', 'MEDICAMENTO(S)');

    $fila=25;
    for($i=0;$i<count($data['DATA']);$i++){
        $objPHPExcel->setActiveSheetIndex(0)
                    ->setCellValue('F'.$fila++, 'NOMBRE : '.$data['DATA'][$i]['nombremedicamento'].'     PRESENTACIÓN : '.$data['DATA'][$i]['presentacion'])
                    ->setCellValue('F'.$fila++, 'CONCENTRACIÓN : '.$data['DATA'][$i]['concentracion'].'     LOTE : '.$data['DATA'][$i]['lote'].'   LABORATORIO : '.$data['DATA'][$i]['laboratorio'])
                    ->setCellValue('F'.$fila++, 'FECHA DE VENCIMIENTO : '.$data['DATA'][$i]['fechavencimiento'].'       CANTIDAD AUTORIZADA :   '.$data['DATA'][$i]['cantidadautorizada'])
                    ->setCellValue('F'.$fila++, '_____________________________________________________');
        $fila++;
    }

    $continuafila=$fila;

    $objPHPExcel->setActiveSheetIndex(0)
                ->setCellValue('F'.($continuafila), 'FUNCIONARIO QUE RECEPCIONA Y VERIFICA LA DOCUMENTACIÓN');
    $objPHPExcel->getActiveSheet(0)->getStyle('F'.$continuafila)->applyFromArray($style);
    
    $objPHPExcel->setActiveSheetIndex(0)->mergeCells('F'.$continuafila.':H'.$continuafila);
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
                ->setCellValue('G'.($continuafila), 'APRUEBA STOCK                         AUTORIZA STOCK    '); 
    $objPHPExcel->getActiveSheet(0)->getStyle('G'.$continuafila)->applyFromArray($style);  
     


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


    //combinar celdas
    $objPHPExcel->setActiveSheetIndex(0)->mergeCells('F1:F5'); 
    $objPHPExcel->setActiveSheetIndex(0)->mergeCells('G1:G3');
    colorCelda('CCFFCC','G1:G3');
    $objPHPExcel->setActiveSheetIndex(0)->mergeCells('H1:H5'); 
    $objPHPExcel->setActiveSheetIndex(0)->mergeCells('G4:G5');
    colorCelda('CCFFCC','G4:G5');
    $objPHPExcel->setActiveSheetIndex(0)->mergeCells('F6:H7'); 
    colorCelda('CCFFCC','F6:H7');
    $objPHPExcel->setActiveSheetIndex(0)->mergeCells('F12:H12'); 
    colorCelda('CCFFCC','F12:H12');
    $objPHPExcel->setActiveSheetIndex(0)->mergeCells('F16:H16'); 
    colorCelda('CCFFCC','F16:H16');
    $objPHPExcel->setActiveSheetIndex(0)->mergeCells('F20:H20'); 
    $objPHPExcel->setActiveSheetIndex(0)->mergeCells('F21:H21'); 
    
    $objPHPExcel->setActiveSheetIndex(0)->mergeCells('F23:H23'); 
    colorCelda('CCFFCC','F23:F23');
     
    
    //alinear contenidos celdas al centro
    $objPHPExcel->getActiveSheet(0)->getStyle('F1:H7')->applyFromArray($style);  
    $objPHPExcel->getActiveSheet(0)->getStyle('F12')->applyFromArray($style); 
    $objPHPExcel->getActiveSheet(0)->getStyle('F16')->applyFromArray($style); 
    $objPHPExcel->getActiveSheet(0)->getStyle('F23')->applyFromArray($style);  
    
    $objPHPExcel->getActiveSheet(0)->getStyle('F20')->applyFromArray($styleCenter);
    
    //ESTILOS BORDES
    $objPHPExcel->getActiveSheet(0)->getStyle('G1:G3')->applyFromArray($styleBorder);
    $objPHPExcel->getActiveSheet(0)->getStyle('G4:G5')->applyFromArray($styleBorder);
    $objPHPExcel->getActiveSheet(0)->getStyle('F6:H7')->applyFromArray($styleBorder);
    $objPHPExcel->getActiveSheet(0)->getStyle('F12:H12')->applyFromArray($styleBorder);
    $objPHPExcel->getActiveSheet(0)->getStyle('F16:H16')->applyFromArray($styleBorder);
    $objPHPExcel->getActiveSheet(0)->getStyle('F23:H23')->applyFromArray($styleBorder);
    
    

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
    $objDrawing2->setWidth(109); 
    $objDrawing2->setWorksheet($objPHPExcel->getActiveSheet()); 



    //ajustar ancho celdas
    $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(4,29);
    $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(20,29);
    $objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(43,29);
    $objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(19,29);



    header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
    header('Content-Disposition: attachment;filename="STOCK '.$_GET['consecutivo'].'.xlsx"');
    header('Cache-Control: max-age=0');

    $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
    ob_clean();

    $objWriter->save('php://output');    

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

?>