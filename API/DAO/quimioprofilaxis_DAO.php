<?php

include '../db/Database.php';

class quimioprofilaxis_DAO {

    function __construct() {
        
    }

  
    public function generarConsecutivo($ano){

        $instance = Database::getInstance();
        if ($instance == NULL) {
            $db = new Database();
            $instance = $db->getInstance();
        }  
        
        $sql = "select (MAX(num)+1) AS num from quimioprofilaxis WHERE ano='".$ano."'";
 

        
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
    public function registrarQuimioprofilaxis($datos) {
        
        $instance = Database::getInstance();
        if ($instance == NULL) {
            $db = new Database();
            $instance = $db->getInstance();
        } 

        $sql = "select (MAX(num)+1) AS num from quimioprofilaxis where ano='".$datos['ano']."'";
        
        $result = array();
        
        $res = $instance->get_data($sql);
        
        if ($res['STATUS']=='OK' ) {
            
            $sqla="INSERT INTO quimioprofilaxis(num, trimestre, fechaingreso, nombresapellidos, edad, sexo, etnia, identificacion, direccion, regimen, entidad, mediosapoyodiagnosticobk, mediosapoyodiagnosticocultivo, mediosapoyodiagnosticoppd, mediosapoyodiagnosticoclinico, mediosapoyodiagnosticorx, mediosapoyodiagnosticonexoepidemiologico, dosisautorizadaespecialista, controlevolucionmedica1, controlevolucionmedica2, controlevolucionmedica3, controlevolucionmedica4, controlevolucionmedica5, controlevolucionmedica6, controlevolucionmedica7, controlevolucionmedica8, controlevolucionmedica9, observacionesformatomsps, municipio, ubicaciongeograica, ipsiniciamanejo, ipscontunuamanejo, observacionesformatoids, ano, menor, tarjetatratamiento, tipoidentificacion, puebloindigena, telefono, barrio, comuna, criterioadministratpi, cuantosmesestpirecibe, serealizoppd, grupopoblacional, condicionegreso, entidadterritorial) VALUES (".intVal($res['DATA'][0]['num']).", '".$datos['trimestre']."', '".$datos['fechaCaptacion']."', '".$datos['nombres']."', ".intVal($datos['edad']).", '".$datos['sexo']."', '".$datos['etnia']."', '".$datos['numid']."', '".$datos['direccion']."', '".$datos['regimen']."', '".$datos['eapb']."', '".$datos['bk']."', '".$datos['cultivo']."', '".$datos['PPD']."', '".$datos['clinico']."', '".$datos['rx']."', '".$datos['nexoEpidemiologico']."', '".$datos['TratamientoAUtoriCompleto']."', '".$datos['cirterioMedico1']."', '".$datos['cirterioMedico2']."', '".$datos['cirterioMedico3']."', '".$datos['cirterioMedico4']."', '".$datos['cirterioMedico5']."', '".$datos['cirterioMedico6']."', '".$datos['cirterioMedico7']."', '".$datos['cirterioMedico8']."', '".$datos['cirterioMedico9']."', '".$datos['observacionesFormatoMSPS']."', '".$datos['mnpo']."', '".$datos['ubicacionGeografica']."', '".$datos['IpsIniciaMnjo']."', '".$datos['IpscontinuaMnjo']."', '".$datos['observacionesFormatoIDS']."', '".$datos['ano']."', '".$datos['edadMEdidad']."', '".$datos['tarjeteattoegreso']."', '".$datos['tipoid']."', '".$datos['puebloIndigena']."', '".$datos['telefono']."', '".$datos['Barrio']."', '".$datos['comuna']."', '".$datos['criteirotpi']."', '9', '".$datos['realizoppd']."', '".$datos['grupoPoblacional']."', '".$datos['condicionegreso']."', '".$datos['dpto']."');";
          
          
            $resulAuto=$instance->exec($sqla);

            if($resulAuto['STATUS']=='OK'){

                $result['STATUS']="OK";
                $result['NUM']=$res['DATA'][0]['num'];
                $sqla2="INSERT INTO quimioprofilaxishistorial(num, trimestre, fechaingreso, nombresapellidos, edad, sexo, etnia, identificacion, direccion, regimen, entidad, mediosapoyodiagnosticobk, mediosapoyodiagnosticocultivo, mediosapoyodiagnosticoppd, mediosapoyodiagnosticoclinico, mediosapoyodiagnosticorx, mediosapoyodiagnosticonexoepidemiologico, dosisautorizadaespecialista, controlevolucionmedica1, controlevolucionmedica2, controlevolucionmedica3, controlevolucionmedica4, controlevolucionmedica5, controlevolucionmedica6, controlevolucionmedica7, controlevolucionmedica8, controlevolucionmedica9, observacionesformatomsps, municipio, ubicaciongeograica, ipsiniciamanejo, ipscontunuamanejo, observacionesformatoids, ano, menor, tarjetatratamiento, tipoidentificacion, puebloindigena, telefono, barrio, comuna, criterioadministratpi, cuantosmesestpirecibe, serealizoppd, grupopoblacional, condicionegreso, identificacionactualizador, fechadeactualizador) VALUES (".intVal($res['DATA'][0]['num']).", '".$datos['trimestre']."', '".$datos['fechaCaptacion']."', '".$datos['nombres']."', ".intVal($datos['edad']).", '".$datos['sexo']."', '".$datos['etnia']."', '".$datos['numid']."', '".$datos['direccion']."', '".$datos['regimen']."', '".$datos['eapb']."', '".$datos['bk']."', '".$datos['cultivo']."', '".$datos['PPD']."', '".$datos['clinico']."', '".$datos['rx']."', '".$datos['nexoEpidemiologico']."', '".$datos['TratamientoAUtoriCompleto']."', '".$datos['cirterioMedico1']."', '".$datos['cirterioMedico2']."', '".$datos['cirterioMedico3']."', '".$datos['cirterioMedico4']."', '".$datos['cirterioMedico5']."', '".$datos['cirterioMedico6']."', '".$datos['cirterioMedico7']."', '".$datos['cirterioMedico8']."', '".$datos['cirterioMedico9']."', '".$datos['observacionesFormatoMSPS']."', '".$datos['mnpo']."', '".$datos['ubicacionGeografica']."', '".$datos['IpsIniciaMnjo']."', '".$datos['IpscontinuaMnjo']."', '".$datos['observacionesFormatoIDS']."', '".$datos['ano']."', '".$datos['edadMEdidad']."', '".$datos['tarjeteattoegreso']."', '".$datos['tipoid']."', '".$datos['puebloIndigena']."', '".$datos['telefono']."', '".$datos['Barrio']."', '".$datos['comuna']."', '".$datos['criteirotpi']."', '9', '".$datos['realizoppd']."', '".$datos['grupoPoblacional']."', '".$datos['condicionegreso']."',  '".$datos['userid']."', '".date("d")."/".date("m")."/".date("Y")."');";
               
                $resuHistory=$instance->exec($sqla2);

             
               
           }else{

               $result['STATUS']="ERROR";
               
           } 
           
        } else {

            $result['STATUS'] = 'ERROR';

        }
        return $result; 
    }
    public function actualizarQuimioprofilaxis($datos) {
        
        $instance = Database::getInstance();
        if ($instance == NULL) {
            $db = new Database();
            $instance = $db->getInstance();
        } 
        
        $result = array();
        $sql="UPDATE quimioprofilaxis	SET nombresapellidos='".$datos['nombres']."', edad='".$datos['edad']."', sexo='".$datos['sexo']."', etnia='".$datos['etnia']."', direccion='".$datos['direccion']."', regimen='".$datos['regimen']."', entidad='".$datos['eapb']."', mediosapoyodiagnosticobk='".$datos['bk']."', mediosapoyodiagnosticocultivo='".$datos['cultivo']."', mediosapoyodiagnosticoppd='".$datos['PPD']."', mediosapoyodiagnosticoclinico='".$datos['clinico']."', mediosapoyodiagnosticorx='".$datos['rx']."', mediosapoyodiagnosticonexoepidemiologico='".$datos['nexoEpidemiologico']."', dosisautorizadaespecialista='".$datos['TratamientoAUtoriCompleto']."', controlevolucionmedica1='".$datos['cirterioMedico1']."', controlevolucionmedica2='".$datos['cirterioMedico2']."', controlevolucionmedica3='".$datos['cirterioMedico3']."', controlevolucionmedica4='".$datos['cirterioMedico4']."', controlevolucionmedica5='".$datos['cirterioMedico5']."', controlevolucionmedica6='".$datos['cirterioMedico6']."', controlevolucionmedica7='".$datos['cirterioMedico7']."', controlevolucionmedica8='".$datos['cirterioMedico8']."', controlevolucionmedica9='".$datos['cirterioMedico9']."', observacionesformatomsps='".$datos['observacionesFormatoMSPS']."', municipio='".$datos['mnpo']."', ubicaciongeograica='".$datos['ubicacionGeografica']."', ipsiniciamanejo='".$datos['IpsIniciaMnjo']."', ipscontunuamanejo='".$datos['IpscontinuaMnjo']."', observacionesformatoids='".$datos['observacionesFormatoIDS']."', menor='".$datos['edadMEdidad']."', tarjetatratamiento='".$datos['tarjeteattoegreso']."', puebloindigena='".$datos['puebloIndigena']."', telefono='".$datos['telefono']."', barrio='".$datos['Barrio']."', comuna='".$datos['comuna']."', criterioadministratpi='".$datos['criteirotpi']."', serealizoppd='".$datos['realizoppd']."', grupopoblacional='".$datos['grupoPoblacional']."', condicionegreso='".$datos['condicionegreso']."', entidadterritorial='".$datos['dpto']."', trimestre='".$datos['trimestre']."', fechaingreso='".$datos['fechaCaptacion']."' 
                WHERE num=".intVal($datos['numero'])." and ano='".$datos['ano']."' ;";
        
        $resulAuto=$instance->exec($sql);

        if($resulAuto['STATUS']=='OK'){

            $result['STATUSACTUALIZAR']="OK";
            $result['NUM']=$datos['numero'] ; 
            $sqla2="INSERT INTO quimioprofilaxishistorial(num, trimestre, fechaingreso, nombresapellidos, edad, sexo, etnia, identificacion, direccion, regimen, entidad, mediosapoyodiagnosticobk, mediosapoyodiagnosticocultivo, mediosapoyodiagnosticoppd, mediosapoyodiagnosticoclinico, mediosapoyodiagnosticorx, mediosapoyodiagnosticonexoepidemiologico, dosisautorizadaespecialista, controlevolucionmedica1, controlevolucionmedica2, controlevolucionmedica3, controlevolucionmedica4, controlevolucionmedica5, controlevolucionmedica6, controlevolucionmedica7, controlevolucionmedica8, controlevolucionmedica9, observacionesformatomsps, municipio, ubicaciongeograica, ipsiniciamanejo, ipscontunuamanejo, observacionesformatoids, ano, menor, tarjetatratamiento, tipoidentificacion, puebloindigena, telefono, barrio, comuna, criterioadministratpi, cuantosmesestpirecibe, serealizoppd, grupopoblacional, condicionegreso, identificacionactualizador, fechadeactualizador) VALUES (".intVal($datos['numero']).", '".$datos['trimestre']."', '".$datos['fechaCaptacion']."', '".$datos['nombres']."', ".intVal($datos['edad']).", '".$datos['sexo']."', '".$datos['etnia']."', '".$datos['numid']."', '".$datos['direccion']."', '".$datos['regimen']."', '".$datos['eapb']."', '".$datos['bk']."', '".$datos['cultivo']."', '".$datos['PPD']."', '".$datos['clinico']."', '".$datos['rx']."', '".$datos['nexoEpidemiologico']."', '".$datos['TratamientoAUtoriCompleto']."', '".$datos['cirterioMedico1']."', '".$datos['cirterioMedico2']."', '".$datos['cirterioMedico3']."', '".$datos['cirterioMedico4']."', '".$datos['cirterioMedico5']."', '".$datos['cirterioMedico6']."', '".$datos['cirterioMedico7']."', '".$datos['cirterioMedico8']."', '".$datos['cirterioMedico9']."', '".$datos['observacionesFormatoMSPS']."', '".$datos['mnpo']."', '".$datos['ubicacionGeografica']."', '".$datos['IpsIniciaMnjo']."', '".$datos['IpscontinuaMnjo']."', '".$datos['observacionesFormatoIDS']."', '".$datos['ano']."', '".$datos['edadMEdidad']."', '".$datos['tarjeteattoegreso']."', '".$datos['tipoid']."', '".$datos['puebloIndigena']."', '".$datos['telefono']."', '".$datos['Barrio']."', '".$datos['comuna']."', '".$datos['criteirotpi']."', '9', '".$datos['realizoppd']."', '".$datos['grupoPoblacional']."', '".$datos['condicionegreso']."',  '".$datos['userid']."', '".date("d")."/".date("m")."/".date("Y")."');";
           
            $resuHistory=$instance->exec($sqla2);
             
          
            
        }else{

            $result['STATUSREGISTRO']="ERROR";
            
        } 
         
        return $result; 
    }
    public function listarQuimioprofilaxis(){

        $instance = Database::getInstance();
        if ($instance == NULL) {
            $db = new Database();
            $instance = $db->getInstance();
        }  
        $sql = "select * from quimioprofilaxis order by ano, num asc";
        //$sql = "select split_part(fechaingreso,'/',3), * from quimioprofilaxis order by split_part, num asc";
 

        
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
    public function listarQuimioprofilaxis007($ano){

        $instance = Database::getInstance();
        if ($instance == NULL) {
            $db = new Database();
            $instance = $db->getInstance();
        }   
        if($ano){
            $sql = "select * from quimioprofilaxis where ano='".$ano."' order by ano, num asc";
        }else{
            $sql = "select * from quimioprofilaxis order by ano, num asc";
        }
        
        //$sql = "select split_part(fechaingreso,'/',3), * from quimioprofilaxis order by split_part, num asc";
 

        
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
    public function listarQuimioprofilaxisEspecifico($datos){

        $instance = Database::getInstance();
        if ($instance == NULL) {
            $db = new Database();
            $instance = $db->getInstance();
        }  
        
        $sql = "select * from quimioprofilaxis where num=".$datos['num']." and ano='".$datos['ano']."' and tipoidentificacion='".$datos['tipoidentificacion']."' and nombresapellidos='".$datos['nombresapellidos']."' and identificacion='".$datos['identificacion']."'";
 

        
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
    public function  buscarPacienteId($tipoid, $id){
        $instance = Database::getInstance();
        if ($instance == NULL) {
            $db = new Database();
            $instance = $db->getInstance();
        }  
        
        $sql = "select * from quimioprofilaxis where tipoidentificacion='".$tipoid."' and identificacion='".$id."'";
 

        
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
    public function eliminarQuimioprofilaxis($datos){
        $instance = Database::getInstance();
        if ($instance == NULL) {
            $db = new Database();
            $instance = $db->getInstance();
        }  
        $result = array();
        $sql="DELETE FROM quimioprofilaxis WHERE num=".intVal($datos['num'])." and nombresapellidos='".$datos['nombresapellidos']."' and fechaingreso='".$datos['fechaingreso']."' and identificacion='".$datos['identificacion']."' and tipoidentificacion='".$datos['tipoidentificacion']."' and ano='".$datos['ano']."' ;";
        
        $resulAuto=$instance->exec($sql);

        if($resulAuto['STATUS']=='OK'){

            $result['STATUSDELETE']="OK";
            $result['NUM']=$datos['num'] ; 
            $sqla2="UPDATE quimioprofilaxis SET num=num-1 WHERE ano='".$datos['ano']."' and num>".intVal($result['NUM']).";";
           
            $resuHistory=$instance->exec($sqla2);
             
          
            
        }else{

            $result['STATUSREGISTRO']="ERROR";
            
        } 
         
        return $result; 

    }
}
?>