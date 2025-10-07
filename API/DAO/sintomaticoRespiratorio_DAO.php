
<?php

include '../db/Database.php';

class sintomaticoRespiratorio_DAO {

    function __construct() {
        
    }
    public function generarConsecutivo($ano){

        $instance = Database::getInstance();
        if ($instance == NULL) {
            $db = new Database();
            $instance = $db->getInstance();
        }  
        
        $sql = "select MAX(num) AS num from sintomaticorespiratorio WHERE ano='".$ano."'";
 

        
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
    public function registrarsintomaticoRespiratorio($datos) {
        
        $instance = Database::getInstance();
        if ($instance == NULL) {
            $db = new Database();
            $instance = $db->getInstance();
        } 

        $sql = "select MAX(num) AS num from sintomaticorespiratorio where ano='".$datos['ano']."'";
        
        $result = array();
        
        $res = $instance->get_data($sql);
        
        if ($res['STATUS']=='OK' ) {
            
            $sqla="INSERT INTO sintomaticorespiratorio(num, departamento, municipio, fechacaptacion, nombres, papellido, sapellido, edad, sexo, tipoidentificacion, identificacion, etnia, puebloindigena, grupopoblacional, direccion, telefono, barrio, comuna, regimen, entidad, observaciones, responsable, institucion, ano, remitido, sector, ocupacion, fechasintomas) VALUES (".(intVal($res['DATA'][0]['num'])+1).", '".$datos['dpto']."', '".$datos['mnpo']."', '".$datos['fechaCaptacion']."', '".$datos['nombres']."', '".$datos['papellido']."', '".$datos['sapellido']."', ".intVal($datos['edad']).", '".$datos['sexo']."', '".$datos['tipoid']."', '".$datos['numid']."', '".$datos['etnia']."', '".$datos['puebloIndigena']."', '".$datos['grupoPoblacional']."', '".$datos['direccion']."', '".$datos['telefono']."', '".$datos['sectorDeta']."', '".$datos['comuna']."', '".$datos['regimen']."', '".$datos['eapb']."', '".$datos['observaciones']."', '".$datos['responsable']."', '".$datos['institucion']."', '".$datos['ano']."', '".$datos['remitidoPor']."', '".$datos['sector']."', '".$datos['ocupacion']."', '".$datos['fechaSintomas']."')";
            $resulAuto=$instance->exec($sqla);

            if($resulAuto['STATUS']=='OK'){

                $result['STATUSREGISTRO']="OK";
                $result['NUM']=(intVal($res['DATA'][0]['num'])+1);

                $sqla2="INSERT INTO sintomaticorespiratoriohistorial(num, departamento, municipio, fechacaptacion, nombres, papellido, sapellido, edad, sexo, tipoidentificacion, identificacion, etnia, puebloindigena, grupopoblacional, direccion, telefono, barrio, comuna, regimen, entidad, observaciones, responsable, institucion, ano, remitido, fechaactualizacion, sector, ocupacion, fechasintomas) VALUES (".(intVal($res['DATA'][0]['num'])+1).", '".$datos['dpto']."', '".$datos['mnpo']."', '".$datos['fechaCaptacion']."', '".$datos['nombres']."', '".$datos['papellido']."', '".$datos['sapellido']."', ".intVal($datos['edad']).", '".$datos['sexo']."', '".$datos['tipoid']."', '".$datos['numid']."', '".$datos['etnia']."', '".$datos['puebloIndigena']."', '".$datos['grupoPoblacional']."', '".$datos['direccion']."', '".$datos['telefono']."', '".$datos['sectorDeta']."', '".$datos['comuna']."', '".$datos['regimen']."', '".$datos['eapb']."', '".$datos['observaciones']."', '".$datos['responsable']."', '".$datos['institucion']."', '".$datos['ano']."', '".$datos['remitidoPor']."', '".date("d")."/".date("m")."/".date("Y")."', '".$datos['sector']."', '".$datos['ocupacion']."' and fechacaptacion='".$datos['fechaSintomas']."')";
                $resuHistory=$instance->exec($sqla2);

                for($i=0;$i<count($datos['pruebaRealizadas']);$i++){

                    
                    $sqlPrueba="INSERT INTO sintomaticorespiratoriopruebasrealizadas(num, identificacion, pruebarealizada, resultadoprueba, fechaprueba) VALUES (".(intVal($res['DATA'][0]['num'])+1).", '".$datos['numid']."', '".$datos['pruebaRealizadas'][$i]['prueba']."', '".$datos['pruebaRealizadas'][$i]['resultado']."', '".$datos['pruebaRealizadas'][$i]['fecha']."')";
                    $resulPruebas=$instance->exec($sqlPrueba);
                    
                    $result['PRUEBAS'][$i]['PRUEBA']=$datos['pruebaRealizadas'][$i]['prueba'];
                    $result['PRUEBAS'][$i]['RESULTADO']=$datos['pruebaRealizadas'][$i]['resultado'];
                    $result['PRUEBAS'][$i]['FECHA']=$datos['pruebaRealizadas'][$i]['fecha'];
                    
                    if($resulPruebas['STATUS']=='OK'){
                        
                        $result['PRUEBAS'][$i]['STATUS']="OK";

                    }else{

                        $result['PRUEBAS'][$i]['STATUS']="ERROR";

                    }
                }
               
           }else{

               $result['STATUSREGISTRO']="ERROR";
               
           } 
           
        } else {

            $result['STATUS'] = 'ERROR';

        }
        return $result; 
    }
    public function actualizarSintomatico($datos) {
        
        $instance = Database::getInstance();
        if ($instance == NULL) {
            $db = new Database();
            $instance = $db->getInstance();
        } 
 
        $result = array();
        $sql="UPDATE sintomaticorespiratorio SET departamento='".$datos['dpto']."', municipio='".$datos['mnpo']."', nombres='".$datos['nombres']."', papellido='".$datos['papellido']."', sapellido='".$datos['sapellido']."', edad=".intVal($datos['edad']).", sexo='".$datos['sexo']."', tipoidentificacion='".$datos['tipoid']."', identificacion='".$datos['numid']."', etnia='".$datos['etnia']."', puebloindigena='".$datos['puebloIndigena']."', grupopoblacional='".$datos['grupoPoblacional']."', direccion='".$datos['direccion']."', telefono='".$datos['telefono']."', barrio='".$datos['sectorDeta']."', comuna='".$datos['comuna']."', regimen='".$datos['regimen']."', entidad='".$datos['eapb']."', observaciones='".$datos['observaciones']."', responsable='".$datos['responsable']."', institucion='".$datos['institucion']."', remitido='".$datos['remitidoPor']."', sector='".$datos['sector']."', ocupacion='".$datos['ocupacion']."', fechasintomas='".$datos['fechaSintomas']."' WHERE num=".$datos['num']." and ano='".$datos['ano']."' and fechacaptacion='".$datos['fechaCaptacion']."';";
        
        $resulAuto=$instance->exec($sql);

        if($resulAuto['STATUS']=='OK'){

            $result['STATUSACTUALIZAR']="OK";
            $result['NUM']=$datos['num'] ;

            $sqla2="INSERT INTO sintomaticorespiratoriohistorial(num, departamento, municipio, fechacaptacion, nombres, papellido, sapellido, edad, sexo, tipoidentificacion, identificacion, etnia, puebloindigena, grupopoblacional, direccion, telefono, barrio, comuna, regimen, entidad, observaciones, responsable, institucion, ano, remitido, fechaactualizacion, sector, ocupacion, fechasintomas) VALUES (".$datos['num'].", '".$datos['dpto']."', '".$datos['mnpo']."', '".$datos['fechaCaptacion']."', '".$datos['nombres']."', '".$datos['papellido']."', '".$datos['sapellido']."', ".intVal($datos['edad']).", '".$datos['sexo']."', '".$datos['tipoid']."', '".$datos['numid']."', '".$datos['etnia']."', '".$datos['puebloIndigena']."', '".$datos['grupoPoblacional']."', '".$datos['direccion']."', '".$datos['telefono']."', '".$datos['sectorDeta']."', '".$datos['comuna']."', '".$datos['regimen']."', '".$datos['eapb']."', '".$datos['observaciones']."', '".$datos['responsable']."', '".$datos['institucion']."', '".$datos['ano']."', '".$datos['remitidoPor']."', '".date("d")."/".date("m")."/".date("Y")."', '".$datos['sector']."', '".$datos['ocupacion']."', '".$datos['fechaSintomas']."')";
            $resuHistory=$instance->exec($sqla2);
            $sqlDelete="DELETE FROM sintomaticorespiratoriopruebasrealizadas WHERE num=".$datos['num']." and identificacion='".$datos['numid']."';";
            $resultDeletae=$instance->exec($sqlDelete);
            if($resultDeletae['STATUS']=='OK'){
                
                $result['STATUSDELETE']="OK";
                for($i=0;$i<count($datos['pruebaRealizadas']);$i++){

                
                    $sqlPrueba="INSERT INTO sintomaticorespiratoriopruebasrealizadas(num, identificacion, pruebarealizada, resultadoprueba, fechaprueba) VALUES (".$datos['num'].", '".$datos['numid']."', '".$datos['pruebaRealizadas'][$i]['prueba']."', '".$datos['pruebaRealizadas'][$i]['resultado']."', '".$datos['pruebaRealizadas'][$i]['fecha']."')";
                    $resulPruebas=$instance->exec($sqlPrueba);
                    
                    $result['PRUEBAS'][$i]['PRUEBA']=$datos['pruebaRealizadas'][$i]['prueba'];
                    $result['PRUEBAS'][$i]['RESULTADO']=$datos['pruebaRealizadas'][$i]['resultado'];
                    $result['PRUEBAS'][$i]['FECHA']=$datos['pruebaRealizadas'][$i]['fecha'];
                    
                    if($resulPruebas['STATUS']=='OK'){
                        
                        $result['PRUEBAS'][$i]['STATUS']="OK";
    
                    }else{
    
                        $result['PRUEBAS'][$i]['STATUS']="ERROR";
    
                    }
                }

            }
          
            
        }else{

            $result['STATUSREGISTRO']="ERROR";
            
        } 
         
        return $result; 
    }
    public function listarSintomaticoRespiratorio(){

        $instance = Database::getInstance();
        if ($instance == NULL) {
            $db = new Database();
            $instance = $db->getInstance();
        }  
        
        $sql = "select * from sintomaticorespiratorio order by num desc";
 

        
        $result = array();
        
        $res = $instance->get_data($sql);
         
        if ($res['STATUS']=='OK' ) {
            $result['STATUS']='OK';
            $result['DATA']=$res['DATA'];
        }else{
            $result['STATUS']='ERROR';
        }
        return $result;
    }
   
    public function listarSintomaticoRespiratorioEspecifico($datos){

        $instance = Database::getInstance();
        if ($instance == NULL) {
            $db = new Database();
            $instance = $db->getInstance();
        }  
        
        $sql = "select * from sintomaticorespiratorio where num=".$datos['num']." and ano='".$datos['ano']."' and tipoidentificacion='".$datos['tipoid']."' and identificacion='".$datos['identificacion']."'";
 

        
        $result = array();
        
        $res = $instance->get_data($sql);
         
        if ($res['STATUS']=='OK' ) {
            $result['STATUS']='OK';
            $result['DATA']=$res['DATA'];
        }else{
            $result['STATUS']='ERROR';
        }
        return $result;
    }
    public function listarPruebasRealizadasEspecifico($datos){

        $instance = Database::getInstance();
        if ($instance == NULL) {
            $db = new Database();
            $instance = $db->getInstance();
        }  
        
        $sql = "select * from sintomaticorespiratoriopruebasrealizadas where num=".$datos['num']." and identificacion='".$datos['id']."'";
 

        
        $result = array();
        
        $res = $instance->get_data($sql);
         
        if ($res['STATUS']=='OK' ) {
            $result['STATUS']='OK';
            $result['DATA']=$res['DATA'];
        }else{
            $result['STATUS']='ERROR';
        }
        return $result;
    }
   
}    





?>