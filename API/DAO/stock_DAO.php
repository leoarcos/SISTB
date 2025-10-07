
<?php

include '../db/Database.php';

class stock_DAO {

    function __construct() {
        
    }

   
    public function registrarStock($datos) {
        $instance = Database::getInstance();
        if ($instance == NULL) {
            $db = new Database();
            $instance = $db->getInstance();
        } 
        $sql = "select MAX(consecutivoautorizacion) AS num from autorizacionips";
        
        $result = array();
        
        $res = $instance->get_data($sql);

        if ($res['DATA'] ) {
            
            
            $sql2="INSERT INTO autorizacionips VALUES ('".($res['DATA'][0]['num']+1)."','".$datos['fechaSolicitud']."','".$datos['municipio']."','".$datos['nombre']."','".$datos['telefono']."','".$datos['nombreSolicitud']."','".$datos['cargoSolicitud']."','".$datos['institucionSolicitud']."','".$datos['telefonoSolicitud']."','nombremedicamento','presentacion','concentracion','cantidadautorizada','lote','laboratori','".$datos['funcionarioSupervision']."','".$datos['observaciones']."','".$datos['nombreAutoriza']."','".$datos['cargoAutoriza']."','".$datos['telefonoAutoriza']."','".$datos['pendiente']."','fechavencimiento','fechaingreso','0')";
             
           $resulAuto=$instance->exec($sql2);
           if($resulAuto['STATUS']=='OK'){
               
               $result['numeroConsecutivo']=($res['DATA'][0]['num']+1);
               $okS=0;
               $errS=0;
               for($i=0;$i<count($datos['medicamentos']);$i++){
                    $result['STATUSAUTORIZACION']="OK";
                   $slqMedicamento="INSERT INTO autorizacionipsmedicamentos VALUES ('".$datos['medicamentos'][$i]['cantidadautorizada']."','".$datos['medicamentos'][$i]['concentracion']."','".$result['numeroConsecutivo']."','".$datos['medicamentos'][$i]['fechaingreso']."','".$datos['medicamentos'][$i]['fechavencimiento']."','".$datos['medicamentos'][$i]['laboratorio']."','".$datos['medicamentos'][$i]['lote']."','".$datos['medicamentos'][$i]['presentacion']."','".$datos['medicamentos'][$i]['nombremedicamento']."')";

                   $res2=$instance->exec($slqMedicamento);
                   
                   if($res2['STATUS']=='OK'){
                        $result['STATUSMEDICAMENTO'][$okS]['STATUS']="OK";
                        $result['STATUSMEDICAMENTO'][$okS++]['nombre']=$datos['medicamentos'][$i]['nombremedicamento'];
                   }else{
                    $result['STATUSMEDICAMENTO'][$okS]['STATUS']="ERROR";
                    $result['STATUSMEDICAMENTO'][$okS++]['nombre']=$datos['medicamentos'][$i]['nombremedicamento'];
                   }
               }

              
           }else{
               $result['STATUS']="ERROR";
           } 
           
        } else {
            $result['STATUS'] = 'ERROR';
        }
        return $result; 
    } 
    public function actualizarStock($datos) {
        $instance = Database::getInstance();
        if ($instance == NULL) {
            $db = new Database();
            $instance = $db->getInstance();
        } 
        $sql = "UPDATE autorizacionips SET fechasolicitud='".$datos['fechaSolicitud']."', municipio='".$datos['municipio']."', nombreips='".$datos['nombre']."', numerotelefonicoips='".$datos['telefono']."', nombrefuncionario='".$datos['nombreSolicitud']."', cargofuncionario='".$datos['cargoSolicitud']."', institucion='".$datos['institucionSolicitud']."', telefonofuncionario='".$datos['telefonoSolicitud']."',funcionario='".$datos['funcionarioSupervision']."', observaciones='".$datos['observaciones']."', nombreautoriza='".$datos['nombreAutoriza']."', cargoautoriza='".$datos['cargoAutoriza']."', telefonoautoriza='".$datos['telefonoAutoriza']."', pendiente='".$datos['pendiente']."' WHERE consecutivoautorizacion=".$datos['consecutivo']."";
        
        $result = array();
        
        $res = $instance->exec($sql);

        if ($res['STATUS']=='OK') {

            $sqlDelete="DELETE FROM autorizacionipsmedicamentos WHERE consecutivoautorizacion='".$datos['consecutivo']."'";
            $res2 = $instance->exec($sqlDelete);

            if ($res2['STATUS']=='OK') {
                $result['STATUSAUTORIZACION']="OK";
                $result['STATUSDELETEM'] = 'OK';
                

                $okS=0;
               $errS=0;
               
                for($i=0;$i<count($datos['medicamentos']);$i++){
                        
                    $slqMedicamento="INSERT INTO autorizacionipsmedicamentos VALUES ('".$datos['medicamentos'][$i]['cantidadautorizada']."','".$datos['medicamentos'][$i]['concentracion']."','".$datos['consecutivo']."','".$datos['medicamentos'][$i]['fechaingreso']."','".$datos['medicamentos'][$i]['fechavencimiento']."','".$datos['medicamentos'][$i]['laboratorio']."','".$datos['medicamentos'][$i]['lote']."','".$datos['medicamentos'][$i]['presentacion']."','".$datos['medicamentos'][$i]['nombremedicamento']."')";

                    $res3=$instance->exec($slqMedicamento);
                    
                    if($res3['STATUS']=='OK'){
                            $result['STATUSMEDICAMENTO'][$okS]['STATUS']="OK";
                            $result['STATUSMEDICAMENTO'][$okS++]['nombre']=$datos['medicamentos'][$i]['nombremedicamento'];
                    }else{
                        $result['STATUSMEDICAMENTO'][$okS]['STATUS']="ERROR";
                        $result['STATUSMEDICAMENTO'][$okS++]['nombre']=$datos['medicamentos'][$i]['nombremedicamento'];
                    }
                }

            
            }else{
                $result['STATUSDELETEM'] = 'ERROR';
                
            }

           
            
            
           
        } else {
            $result['STATUS'] = 'ERROR';
        }
        return $result; 
    }  
    public function eliminarStock($datos) {
        $instance = Database::getInstance();
        if ($instance == NULL) {
            $db = new Database();
            $instance = $db->getInstance();
        } 
        $sql = "DELETE FROM autorizacionips WHERE fechasolicitud='".$datos['fechasolicitud']."' AND municipio='".$datos['municipio']."' AND nombreips='".$datos['nombreips']."' AND numerotelefonicoips='".$datos['numerotelefonicoips']."' AND nombrefuncionario='".$datos['nombrefuncionario']."' AND cargofuncionario='".$datos['cargofuncionario']."' AND institucion='".$datos['institucion']."' AND telefonofuncionario='".$datos['telefonofuncionario']."' AND consecutivoautorizacion=".$datos['consecutivoautorizacion']."";
        
        $result = array();
        
        $res = $instance->exec($sql);

        if ($res['STATUS']=='OK') {

            $sqlDelete="DELETE FROM autorizacionipsmedicamentos WHERE consecutivoautorizacion='".$datos['consecutivoautorizacion']."'";
            $res2 = $instance->exec($sqlDelete);

            if ($res2['STATUS']=='OK') {
                $result['STATUSAUTORIZACION']="OK";
                $result['STATUSDELETEM'] = 'OK';
                

            
            }else{
                $result['STATUSDELETEM'] = 'ERROR';
                
            }

           
            
            
           
        } else {
            $result['STATUS'] = 'ERROR';
        }
        return $result; 
    } 
    public function descargarStock($datos){

        $instance = Database::getInstance();
        if ($instance == NULL) {
            $db = new Database();
            $instance = $db->getInstance();
        } 
        $sql = "UPDATE autorizacionips SET estado='1' WHERE consecutivoautorizacion=".$datos['consecutivo']."";
        
        $result = array();
        
        $res = $instance->exec($sql);

        if ($res['STATUS']=='OK') {
            $result['STATUS']='OK';
            //print_r($datos['medicamentos'][0]);
            for($i=0; $i<count($datos['medicamentos']);$i++){
                $sqlM0="UPDATE farmacia SET cantidad=cantidad-".intval($datos['medicamentos'][$i]['cantidadautorizada'])." WHERE nombre='".$datos['medicamentos'][$i]['nombremedicamento']."' and concentracion='".$datos['medicamentos'][$i]['concentracion']."' and lote='".$datos['medicamentos'][$i]['lote']."' and presentacion='".$datos['medicamentos'][$i]['presentacion']."' and laboratorio='".$datos['medicamentos'][$i]['laboratorio']."' and fechaingreso='".$datos['medicamentos'][$i]['fechaingreso']."' and fechavencimiento='".$datos['medicamentos'][$i]['fechavencimiento']."' ";
                //print_r($sqlM0);
                
                
                $resa = $instance->exec($sqlM0);
                $result['STATUSMEDICAMENTO'][$i]['nombre']=$datos['medicamentos'][$i]['nombremedicamento'];
                $result['STATUSMEDICAMENTO'][$i]['presentacion']=$datos['medicamentos'][$i]['presentacion'];
                $result['STATUSMEDICAMENTO'][$i]['concentracion']=$datos['medicamentos'][$i]['concentracion'];
                if($resa['STATUS']=='OK'){

                    $result['STATUSMEDICAMENTO'][$i]['estado']='OK';
                   

                }else{
                    $result['STATUSMEDICAMENTO'][$i]['estado']='ERROR';
                }

            }
           
        }else{
            $result['STATUS']='ERROR';
        }
        return $result;
    }
    public function listarStockId($consecutivo){

        $instance = Database::getInstance();
        if ($instance == NULL) {
            $db = new Database();
            $instance = $db->getInstance();
        } 
        $sql = "SELECT aut.consecutivoautorizacion, aut.fechasolicitud, aut.municipio, aut.nombreips, aut.numerotelefonicoips, aut.nombrefuncionario, aut.cargofuncionario, aut.institucion, aut.telefonofuncionario, aut.funcionario, aut.observaciones, aut.nombreautoriza, aut.cargoautoriza, aut.telefonoautoriza, aut.pendiente, med.* FROM autorizacionips aut, autorizacionipsmedicamentos med WHERE aut.consecutivoautorizacion=".$consecutivo." AND med.consecutivoautorizacion=CAST(aut.consecutivoautorizacion AS varchar(1000))";
        
        $result = array();
        
        $res = $instance->get_data($sql);
         
        if ($res['DATA'] ) {
            $result['STATUS']='OK';
            $result['DATA']=$res['DATA'];
        }else{
            $result['STATUS']='ERROR';
        }
        return $result;
    }
    public function listarStocksPendientes($eapb){

        $instance = Database::getInstance();
        if ($instance == NULL) {
            $db = new Database();
            $instance = $db->getInstance();
        }  
        if($eapb){
            $sql = "SELECT DISTINCT ON (consecutivoautorizacion) consecutivoautorizacion, fechasolicitud, municipio, nombreips, numerotelefonicoips, nombrefuncionario, cargofuncionario, institucion, telefonofuncionario, nombremedicamento,presentacion, concentracion, cantidadautorizada, lote, laboratorio, funcionario, observaciones, nombreautoriza, cargoautoriza, telefonoautoriza, pendiente, fechavencimiento, fechaingreso FROM autorizacionips WHERE estado='0' AND nombreips like '%".$eapb."%' order by consecutivoautorizacion desc";
             
        }else{
            $sql = "SELECT DISTINCT ON (consecutivoautorizacion) consecutivoautorizacion, fechasolicitud, municipio, nombreips, numerotelefonicoips, nombrefuncionario, cargofuncionario, institucion, telefonofuncionario, nombremedicamento,presentacion, concentracion, cantidadautorizada, lote, laboratorio, funcionario, observaciones, nombreautoriza, cargoautoriza, telefonoautoriza, pendiente, fechavencimiento, fechaingreso FROM autorizacionips WHERE estado='0' order by consecutivoautorizacion desc";
            
        } 
        
        $result = array();
        
        $res = $instance->get_data($sql);
         
        if ($res['DATA'] ) {
            $result['STATUS']='OK';
            $result['DATA']=$res['DATA'];
        }else{
            $result['STATUS']='ERROR';
        }
        return $result;
    }
    public function listarStocks($estado){

        $instance = Database::getInstance();
        if ($instance == NULL) {
            $db = new Database();
            $instance = $db->getInstance();
        }  
        if($estado=='TODOS'){
            $sql = "SELECT DISTINCT ON (consecutivoautorizacion) consecutivoautorizacion, fechasolicitud, municipio, nombreips, numerotelefonicoips, nombrefuncionario, cargofuncionario, institucion, telefonofuncionario, nombremedicamento,presentacion, concentracion, cantidadautorizada, lote, laboratorio, funcionario, observaciones, nombreautoriza, cargoautoriza, telefonoautoriza, pendiente, fechavencimiento, fechaingreso FROM autorizacionips order by consecutivoautorizacion desc";

        }else{
            $sql = "SELECT DISTINCT ON (consecutivoautorizacion) consecutivoautorizacion, fechasolicitud, municipio, nombreips, numerotelefonicoips, nombrefuncionario, cargofuncionario, institucion, telefonofuncionario, nombremedicamento,presentacion, concentracion, cantidadautorizada, lote, laboratorio, funcionario, observaciones, nombreautoriza, cargoautoriza, telefonoautoriza, pendiente, fechavencimiento, fechaingreso FROM autorizacionips WHERE estado=".$estado." order by consecutivoautorizacion desc";
        }

        
        $result = array();
        
        $res = $instance->get_data($sql);
         
        if ($res['DATA'] ) {
            $result['STATUS']='OK';
            $result['DATA']=$res['DATA'];
        }else{
            $result['STATUS']='ERROR';
        }
        return $result;
    }
    public function listarAutorizacionIpsMedicamentos($cosecutivo){

        $instance = Database::getInstance();
        if ($instance == NULL) {
            $db = new Database();
            $instance = $db->getInstance();
        } 
        $sql = "SELECT * FROM autorizacionipsmedicamentos WHERE consecutivoautorizacion='".$cosecutivo."' order by nombremedicamento asc";
        
        $result = array();
        
        $res = $instance->get_data($sql);
         
        if ($res['STATUS']=='OK') {
            $result['STATUS']='OK';
            if(count($res['DATA'])!=0){
                $result['DATA']=$res['DATA'];
            }else{
                $result['DATA']='SIN DATOS';
            }
        }else{
            $result['STATUS']='ERROR';
        }
        return $result;
    }

}

  
?>
