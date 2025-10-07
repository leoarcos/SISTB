<?php

include '../db/Database.php';

class medicamentos_DAO {

    function __construct() {
        
    }
    public function listarMedicamentos() {
        $instance = Database::getInstance();
        if ($instance == NULL) {
            $db = new Database();
            $instance = $db->getInstance();
        }

        $sql = "select * from farmacia order by nombre,to_date(fechavencimiento, 'DD MM YYYY') asc";
        
        $result = array();
        $res = $instance->get_data($sql);
        if ($res['DATA'] ) {
           
            $result['DATA'] = $res['DATA'];

            $result['STATUS'] = 'OK';
        } else {
            $result['STATUS'] = 'ERROR';
        }
        return $result;
        
    } 
    public function listarMedicamentosExistentes() {
        $instance = Database::getInstance();
        if ($instance == NULL) {
            $db = new Database();
            $instance = $db->getInstance();
        }

        $sql = "select * from farmacia where cantidad!='0' order by nombre,to_date(fechavencimiento, 'DD MM YYYY') asc";
        
        $result = array();
        $res = $instance->get_data($sql);
        if ($res['DATA'] ) {
           
            $result['DATA'] = $res['DATA'];

            $result['STATUS'] = 'OK';
        } else {
            $result['STATUS'] = 'ERROR';
        }
        return $result;
        
    } 
  
    public function listarMedicamentosComprometidos() {
        $instance = Database::getInstance();
        if ($instance == NULL) {
            $db = new Database();
            $instance = $db->getInstance();
        }

        $sql = "select * from medicamentocomprometido order by nombremedicamento,to_date(fechavencimiento, 'DD MM YYYY') asc";
        
        $result = array();
        $res = $instance->get_data($sql);
        if ($res['DATA'] ) {
           
            $result['DATA'] = $res['DATA'];

            $result['STATUS'] = 'OK';
        } else {
            $result['STATUS'] = 'ERROR';
        }
        return $result;
        
    } 
    public function actualizarCantidadMedicamentos($medicamentos){
        $instance = Database::getInstance();
        if ($instance == NULL) {
            $db = new Database();
            $instance = $db->getInstance();
        } 
        for($i=0;$i<count($medicamentos);$i++){
            $sql = "UPDATE farmacia SET cantidad=cantidad-".intVal($medicamentos[$i]['cantidadautorizada'])." WHERE nombre='".$medicamentos[$i]['nombremedicamento']."'  AND presentacion='".$medicamentos[$i]['presentacion']."'  AND concentracion='".$medicamentos[$i]['concentracion']."'  AND lote='".$medicamentos[$i]['lote']."'  AND laboratorio='".$medicamentos[$i]['laboratorio']."'  AND fechaingreso='".$medicamentos[$i]['fechaingreso']."'  AND fechavencimiento='".$medicamentos[$i]['fechavencimiento']."'";
            $result=$instance->exec($sql);
            $sql2="INSERT INTO farmaciahistorial(nombre, presentacion, concentracion, lote, fecha, cantidad, observacionesmedicamento) VALUES ('".$medicamentos[$i]['nombremedicamento']."', '".$medicamentos[$i]['presentacion']."', '".$medicamentos[$i]['concentracion']."', '".$medicamentos[$i]['lote']."', '".date("d")."/".date("m")."/".date("Y")."', ".intVal($medicamentos[$i]['cantidadautorizada']).", 'SALIDA')";
            $result2=$instance->exec($sql2);
        }
       
        
    }
    public function registrarMedicamento($datos){
        $instance = Database::getInstance();
        if ($instance == NULL) {
            $db = new Database();
            $instance = $db->getInstance();
        }
         

        $sql = "select f.* from farmacia as f where f.nombre='".$datos['nombre']."' and f.presentacion='".$datos['presentacion']."' and f.concentracion='".$datos['concentracion']."' and f.lote='".$datos['lote']."' and f.fechaingreso='".$datos['fechaIngreso']."' and f.fechavencimiento='".$datos['fechaVencimiento']."' and f.laboratorio='".$datos['laboratorio']."';";
        
        $result = array();
        $res = $instance->get_data($sql);
         
        if(count($res['DATA'])!=0){ 
            $sql2="update farmacia set cantidad='".($datos['cantidad']+$res['DATA'][0]['cantidad'])."', observacionesmedicamento='".$datos['observaciones']."' where nombre='".$datos['nombre']."' and presentacion='".$datos['presentacion']."' and concentracion='".$datos['concentracion']."' and lote='".$datos['lote']."' and fechaingreso='".$datos['fechaIngreso']."' and fechavencimiento='".$datos['fechaVencimiento']."' and laboratorio='".$datos['laboratorio']."'";
            
            $res2 = $instance->exec($sql2);
            if($res2['STATUS']=='OK'){
                $result['ACCION']='ACTUALIZADO';
                $result['STATUS']='OK';
            }else{
                $result['STATUS']='ERROR';
            }
        }else{ 
            $sql2="INSERT INTO farmacia VALUES ('".$datos['nombre']."','".$datos['presentacion']."','".$datos['concentracion']."','".$datos['cantidad']."','".$datos['lote']."','".$datos['fechaIngreso']."','".$datos['fechaVencimiento']."','".$datos['observaciones']."','".$datos['nombreDonante']."','".$datos['donado']."','".$datos['laboratorio']."')";
             
            $res2 = $instance->exec($sql2);
            if($res2['STATUS']=='OK'){
                $result['ACCION']='INGRESADO';
                $result['STATUS']='OK';
            }else{
                $result['STATUS']='ERROR';
            }
        }
         
        return $result;
    }
    public function ActualizarFarmaco($datos){
        $instance = Database::getInstance();
        if ($instance == NULL) {
            $db = new Database();
            $instance = $db->getInstance();
        }
        
        $result = array();

        $sql = "update farmacia set cantidad='".$datos['datosCambio']['cantidad']."', nombre='".$datos['datosCambio']['nombre']."', presentacion='".$datos['datosCambio']['presentacion']."', concentracion='".$datos['datosCambio']['concentracion']."', lote='".$datos['datosCambio']['lote']."', fechaingreso='".$datos['datosCambio']['fechaIngreso']."', fechavencimiento='".$datos['datosCambio']['fechaVencimiento']."', laboratorio='".$datos['datosCambio']['laboratorio']."', observacionesmedicamento='".$datos['datosCambio']['observaciones']."', remite='".$datos['datosCambio']['donado']."', nombreremitente='".$datos['datosCambio']['nombreDonante']."' where nombre='".$datos['datosWhere']['nombre']."' and presentacion='".$datos['datosWhere']['presentacion']."' and concentracion='".$datos['datosWhere']['concentracion']."' and lote='".$datos['datosWhere']['lote']."' and fechaingreso='".$datos['datosWhere']['fechaIngreso']."' and fechavencimiento='".$datos['datosWhere']['fechaVencimiento']."' and laboratorio='".$datos['datosWhere']['laboratorio']."' and remite='".$datos['datosWhere']['donado']."' and nombreremitente='".$datos['datosWhere']['nombreDonante']."'";
        
        $result = array();
        $res = $instance->exec($sql);
        if($res['STATUS']=='OK'){
             
            $result['STATUS']='OK';
        }else{
            $result['STATUS']='ERROR';
        }  
         
        return $result;
    }
    public function eliminarFarmaco($datos){
        $instance = Database::getInstance();
        if ($instance == NULL) {
            $db = new Database();
            $instance = $db->getInstance();
        }
        
        $result = array();

        $sql = "delete from farmacia where nombre='".$datos['nombre']."' and presentacion='".$datos['presentacion']."' and concentracion='".$datos['concentracion']."' and lote='".$datos['lote']."' and fechaingreso='".$datos['fechaIngreso']."' and fechavencimiento='".$datos['fechaVencimiento']."' and laboratorio='".$datos['laboratorio']."' and remite='".$datos['donado']."' and nombreremitente='".$datos['nombreDonante']."'";
        
        $result = array();
        $res = $instance->exec($sql);
        if($res['STATUS']=='OK'){
             
            $result['STATUS']='OK';
        }else{
            $result['STATUS']='ERROR';
        }  
         
        return $result;
    }
}
?>