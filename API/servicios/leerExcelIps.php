<?php
header("Content-Type: text/html;charset=utf-8");
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);
ini_set('memory_limit', '-1');
define('EOL',(PHP_SAPI == 'cli') ? PHP_EOL : '<br />');

require_once '../PHPExcel/Classes/PHPExcel.php';
$archivo = "../PHPEXCEL/EXCEL/ips.xlsx";
$inputFileType = PHPExcel_IOFactory::identify($archivo);
$objReader = PHPExcel_IOFactory::createReader($inputFileType);
$objPHPExcel = $objReader->load($archivo);
$sheet = $objPHPExcel->getSheet(0); 
$highestRow = $sheet->getHighestRow(); 
$data;
$highestColumn = $sheet->getHighestColumn();
for ($row = 1; $row <= $highestRow; $row++){ 
        $data[$row-1]['nombre']=$sheet->getCell("A".$row)->getValue();
		//echo $data[$row-1]['nombre'];
		//echo "<br>";
}
echo json_encode($data);




?>