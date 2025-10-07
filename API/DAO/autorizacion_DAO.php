<?php

include '../db/Database.php';

class autorizacion_DAO {

    function __construct() {
        
    }

  
    public function listarAutorizaciones() {
        $instance = Database::getInstance();
        if ($instance == NULL) {
            $db = new Database();
            $instance = $db->getInstance();
        }

        $sql = "select * from autorizacion where pendiente='SI' order by consecutivoautorizacion desc";
        
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
    public function listarAutorizacionesNoPendientes() {
        $instance = Database::getInstance();
        if ($instance == NULL) {
            $db = new Database();
            $instance = $db->getInstance();
        }

        $sql = "select * from autorizacion where pendiente='NO' order by consecutivoautorizacion desc";
        
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
    public function listarAutorizacionesTodas() {
        $instance = Database::getInstance();
        if ($instance == NULL) {
            $db = new Database();
            $instance = $db->getInstance();
        }

        $sql = "select * from autorizacion order by consecutivoautorizacion desc";
        
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
    public function buscarAutorizacion($consecutivo, $id){
        $instance = Database::getInstance();
        if ($instance == NULL) {
            $db = new Database();
            $instance = $db->getInstance();
        }

        $sql = "select * from autorizacion where consecutivoautorizacion='".$consecutivo."' and numeroidentificacion='".$id."'";
        
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
    
    public function listarMedicamentosAutorizacion($consecutivo){
        $instance = Database::getInstance();
        if ($instance == NULL) {
            $db = new Database();
            $instance = $db->getInstance();
        }

        $sql = "select * from medicamentoautorizacion where consecutivoautorizacion='".$consecutivo."' order by consecutivoautorizacion desc";
        
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
    public function listarMedicamentosPaciente($id, $tipoid){
        $instance = Database::getInstance();
        if ($instance == NULL) {
            $db = new Database();
            $instance = $db->getInstance();
        }

        $sql = "SELECT au.pendiente, au.tipoidentificacion, ma.* FROM autorizacion au, medicamentoautorizacion ma where au.numeroidentificacion='".$id."' and au.tipoidentificacion='".$tipoid."' and ma.consecutivoautorizacion=au.consecutivoautorizacion order by au.consecutivoautorizacion desc";
        
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
    public function registrarAutorizacion($datos) {
        $instance = Database::getInstance();
        if ($instance == NULL) {
            $db = new Database();
            $instance = $db->getInstance();
        }
        
        $sql = "select MAX(consecutivoautorizacion) AS num from autorizacion";
        
        $result = array();
        $res = $instance->get_data($sql);
        if ($res['DATA'] ) {
           
            
            
           // print_r($datos['tipoPac']);
            $sql2="INSERT INTO autorizacion VALUES ('".($res['DATA'][0]['num']+1)."','".$datos['ano']."','".$datos['trimestre']."',".$datos['consecutivo'].",'".$datos['fechaSolicitud']."','".$datos['mnpo']."','".$datos['tipoid']."','".$datos['id']."','".$datos['nombres']."','".$datos['sexo']."','".$datos['edad']."','".$datos['UnidadM']."','".$datos['Regimen']."','".$datos['EAPBes']."','".$datos['telefono']."','".$datos['peso']."','".$datos['ipsDiagnoses']."','".$datos['proximaEntrega']."','".$datos['nombreFuncionario']."','".$datos['cargoFuncionario']."','".$datos['instFuncionario']."','".$datos['telefonoFuncionario']."','','', '','','','','','','','','".$datos['requiSoliTto-Medicamento']."','".$datos['soportePendiente-Medicamento']."','".$datos['funverdoc-Medicamento']."','".$datos['Observaciones-Medicamento']."','".$datos['nombreAutoriza']."','".$datos['cargoAutoriza']."','".$datos['telefonoAutoriza']."','SI','','')";
            $resulAuto=$instance->exec($sql2);
            if($resulAuto['STATUS']=='OK'){
                $result['STATUS']="OK";
                $result['numeroConsecutivo']=($res['DATA'][0]['num']+1);
                $result['id']=$datos['id'];
               
            }else{
                $result['STATUS']="ERROR";
            }
            
        } else {
            $result['STATUS'] = 'ERROR';
        }
        return $result;
    } 
    public function registrarAutorizacionDescarga($datos) {
        $instance = Database::getInstance();
        if ($instance == NULL) {
            $db = new Database();
            $instance = $db->getInstance();
        }
        $sql = "UPDATE autorizacion SET  pendiente='NO' WHERE consecutivoautorizacion=".$datos['consecutivo'].";";
        
        $result = array();
        $res = $instance->exec($sql);
        
        if($res['STATUS']=='OK'){
            $result['STATUS']='OK';
        }else{
            $result['STATUS']='ERROR';
        }

        return $result;
         
    } 
    public function actualizarAutorizacion($datos) {
        $instance = Database::getInstance();
        if ($instance == NULL) {
            $db = new Database();
            $instance = $db->getInstance();
        }

        $sql = "UPDATE autorizacion SET fechasolicitud='".$datos['fechaSolicitud']."', municipio='".$datos['mnpo']."', nombresapellidos='".$datos['nombres']."', sexo='".$datos['sexo']."', edad=".$datos['edad'].", menor='".$datos['UnidadM']."', regimen='".$datos['Regimen']."', eps='".$datos['EAPBes']."', telefonopaciente='".$datos['telefono']."', peso='".$datos['peso']."', ips='".$datos['ipsDiagnoses']."', proximaentrega='".$datos['proximaEntrega']."', nombrefuncionario='".$datos['nombreFuncionario']."', cargofuncionario='".$datos['cargoFuncionario']."', institucion='".$datos['consecutivo']."', telefonofuncionario='".$datos['telefonoFuncionario']."', cumplerequisitos='".$datos['requiSoliTto-Medicamento']."', soportespendientes='".$datos['soportePendiente-Medicamento']."', funcionario='".$datos['funverdoc-Medicamento']."', observaciones='".$datos['Observaciones-Medicamento']."', nombreautoriza='".$datos['nombreAutoriza']."', cargoautoriza='".$datos['cargoAutoriza']."', telefonoautoriza='".$datos['telefonoAutoriza']."'	WHERE consecutivoautorizacion=".$datos['consecutivo'].";";

        $result = array();
        $res = $instance->exec($sql);

        if ($res['STATUS']=='OK' ) {
            
            $sql2 = "DELETE FROM medicamentoautorizacion WHERE consecutivoautorizacion=".$datos['consecutivo'].";"; 
            $res2 = $instance->exec($sql2);

            if ($res2['STATUS']=='OK' ) {
                
                $result['STATUSELIMINARMEDICA']="OK";
                $i=0;
                while(isset($datos['medicamentos'][$i])){
                    $instance = Database::getInstance();
                    if ($instance == NULL) {
                        $db = new Database();
                        $instance = $db->getInstance();
                    }
                    $sql3 = "INSERT INTO medicamentoautorizacion VALUES ('".$datos['consecutivo']."','".$datos['medicamentos'][$i]['numeroidentificacion']."','".$datos['medicamentos'][$i]['nombremedicamento']."','".$datos['medicamentos'][$i]['presentacion']."', '".$datos['medicamentos'][$i]['concentracion']."','".$datos['medicamentos'][$i]['cantidadformulada']."','".$datos['medicamentos'][$i]['cantidadautorizada']."','".$datos['medicamentos'][$i]['lote']."','".$datos['medicamentos'][$i]['laboratorio']."','".$datos['medicamentos'][$i]['fechavencimiento']."','".$datos['medicamentos'][$i]['fechaingreso']."')"; 
                    $res3 = $instance->exec($sql3);
                    if($res3['STATUS']=='OK'){
                        
                        $result['STATUSADDMEDICA'][$i]="OK";
                        $i++;
                    }else{
                        $result['STATUSADDMEDICA'][$i]="ERROR";
                    }
                   

                }
                
            }else{
                $result['STATUSELIMINARMEDICA']="ERROR";
            }

            $result['STATUS']="OK";

        }else{

            $result['STATUS']="ERROR";

        }

        /*
        
        
        $result = array();
        $res = $instance->get_data($sql);
        if ($res['DATA'] ) {
           
            
            
           // print_r($datos['tipoPac']);
            $sql2="";
            $resulAuto=$instance->exec($sql2);
            if($resulAuto['STATUS']=='OK'){
                $result['STATUS']="OK";
                $result['numeroConsecutivo']=($res['DATA'][0]['num']+1);
                $result['id']=$datos['id'];
               
            }else{
                $result['STATUS']="ERROR";
            }
            
        } else {
            $result['STATUS'] = 'ERROR';
        }
        */
        return $result;
    }   
    public function registrarAutorizacionMedicamento($datos){
        print_r($datos);
      $instance = Database::getInstance();
        if ($instance == NULL) {
            $db = new Database();
            $instance = $db->getInstance();
        }
        //print_r($datos);
        $sql = "INSERT INTO medicamentoautorizacion VALUES (".intval($datos['num']).",'".$datos['id']."','".$datos['medicamentos']['nombre']."','".$datos['medicamentos']['presentacion']."', '".$datos['medicamentos']['concentracion']."','".$datos['medicamentos']['cantidadformulada']."','".$datos['medicamentos']['cantidadAutorizada']."','".$datos['medicamentos']['lote']."','".$datos['medicamentos']['laboratorio']."','".$datos['medicamentos']['fechavencimiento']."','".$datos['medicamentos']['fechaingreso']."')";
        print_r($sql);
        $result = array();
        $res = $instance->exec($sql);
        if($res['STATUS']=='OK'){
            $result['STATUS']="OK";
            
            $result['ERROR']=$res['error'];
        }else{

            $result['STATUS']='ERROR';
            $result['ERROR']=$res['error'];
            $result['medicamentoNoIngresado']=$datos['medicamentos']['nombre']." ".$datos['medicamentos']['concentracion']." ".$datos['medicamentos']['presentacion'];

        }
        return $result;

    }
    public function eliminarAutorizacion($id){
        $instance = Database::getInstance();
          if ($instance == NULL) {
              $db = new Database();
              $instance = $db->getInstance();
          }
          //print_r($datos);
          $sql = "DELETE FROM autorizacion WHERE consecutivoautorizacion=".$id."";
          
          $result = array();
          $res = $instance->exec($sql);
           
          if($res['STATUS']=='OK'){
            $sql1 = "DELETE FROM medicamentoautorizacion WHERE consecutivoautorizacion=".$id."";
            $res1 = $instance->exec($sql1);
            if($res1['STATUS']=='OK'){
                $result['STATUS']="OK";
              
                $result['ERROR']=$res['error'];
            }else{
                $result['STATUS']="OK";
              
                $result['ERROR']=$res['error'];
            }
             
          }else{
  
              $result['STATUS']='ERROR';
              $result['ERROR']=$res['error'];
              $result['medicamentoNoIngresado']=$datos['medicamentos']['nombre']." ".$datos['medicamentos']['concentracion']." ".$datos['medicamentos']['presentacion'];
  
          }
          return $result;
  
      }

}
/*
for($as=0; $as<count($datos['medicamentos']);$as++){
                    
    $sql3="INSERT INTO medicamentoautorizacion VALUES ('".($res['DATA'][0]['num']+1)."','".$datos['id']."','".$datos['medicamentos'][$as]['nombre']."','".$datos['medicamentos'][$as]['presentacion']."', '".$datos['medicamentos'][$as]['concentracion']."','".$datos['medicamentos'][$as]['cantidadformulada']."','".$datos['medicamentos'][$as]['cantidadAutorizada']."','".$datos['medicamentos'][$as]['lote']."','".$datos['medicamentos'][$as]['laboratorio']."','".$datos['medicamentos'][$as]['fechavencimiento']."','".$datos['medicamentos'][$as]['fechaingreso']."','".$datos['medicamentos'][$as]['clasificacion']."','".$datos['medicamentos'][$as]['categoria']."','".$datos['medicamentos'][$as]['fase']."')";
    
    $resultMedicam=$instance->exec($sql3);
    if($resultMedicam['STATUS']!="OK"){
        $result['medicamentosnoIngresado'][]=$datos['medicamentos'][$as]['nombre']." ".$datos['medicamentos'][$as]['presentacion']." ".$datos['medicamentos'][$as]['concentracion'];

    }else{
        $result['medicamentosIngresado'][]=$datos['medicamentos'][$as]['nombre']." ".$datos['medicamentos'][$as]['presentacion']." ".$datos['medicamentos'][$as]['concentracion'];
    }
}
*/
?>
