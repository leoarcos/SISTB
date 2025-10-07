<?php

include '../db/Database.php';

class libroPacientes_DAO {

    function __construct() {
        
    }

  
    public function listarPacientes() {
        $instance = Database::getInstance();
        if ($instance == NULL) {
            $db = new Database();
            $instance = $db->getInstance();
        }

        $sql = "select * from libroderegistro order by ano,num asc";
        
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
    public function buscarPacienteId($tipoid, $id){
        $instance = Database::getInstance();
        if ($instance == NULL) {
            $db = new Database();
            $instance = $db->getInstance();
        }

        $sql = "select * from libroderegistro where identificacion='".$id."' and tipoidentificacion='".$tipoid."' order by ano,num asc";
         
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
    public function buscarPacienteIdAutorizacion($tipoid, $id){
        $instance = Database::getInstance();
        if ($instance == NULL) {
            $db = new Database();
            $instance = $db->getInstance();
        }

        $sql = "select * from libroderegistro where identificacion='".$id."' and tipoidentificacion='".$tipoid."' and condicionegreso='NO EVALUADO' order by ano,num asc";
        
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
    public function listarPacientes007($ano) {
        $instance = Database::getInstance();
        if ($instance == NULL) {
            $db = new Database();
            $instance = $db->getInstance();
        }
        if($ano=='all'){
            $sql = "select * from libroderegistro order by ano,num asc";
        }else{
            $sql = "select * from libroderegistro where ano='".$ano."' order by ano,num asc";
        }
        
        
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
    public function eliminarDato($num, $id, $ano, $nombres, $fecha, $tipoid){
      
         $instance = Database::getInstance();
        if ($instance == NULL) {
            $db = new Database();
            $instance = $db->getInstance();
        }

        $sql="delete from libroderegistro where num=".$num." and ano='".$ano."' and identificacion='".$id."' and nombresyapellidos='".$nombres."' and tipoidentificacion='".$tipoid."' and fechadiagnostico='".$fecha."' ";
        
       $res = $instance->exec($sql);
        if ($res['STATUS'] ) {
           
            

            $result['STATUS'] = 'OK';
        } else {
            $result['STATUS'] = 'ERROR';
        }
        return $result;
        
    }
    
    public function registrarPacienteLibroRegistro($nombres, $id, $tipoId, $ingresaTto, $fechaGestionMedicamento, $fechaTAES, $ano, $ipsDiagnostica, $ipsContinua, $Pais, $entidadTerritorial, $municipioProcedencia, $sexo, $edad, $uMedida, $pertenenciaEtnica, $puebloIndigena, $sector, $barrio, $comuna, $ocupacion, $EAPB, $regimen, $ubicacionGeografica, $telefono, $direccion, $grupoPoblacional, $municipioNotifica, $fechaInicioSintomas, $fechaDiagnostico, $trimestre, $tipoTB, $localizacionTB, $condicionIngreso, $ClasificacionTB, $otroosCriteriosMedicos, $DiagnosticoBK, $fechaDiagnosticoBK, $cultivoDiagnostico, $fechacultivoDiagnostico, $pruebaMolecular, $fechaPruebaMolecular, $realizoAPVVIH, $realizoPruebaVIH, $resultadoPruebaVIH, $FechaReporteVIH, $PruebaConfirmatoriaAcordeNormaVIH, $fechaDXPrevioActualVIH, $recibeTARVIH, $recibeTtoPreventivoVIH, $coinfeccionPrevioVIH, $diagnosticoPrevioVIH, $pruebasusceptibilidadFarmacoResitencia, $fechaReportePSF, $tipoFarmacoResistencia, $resitenteA, $cooomorbilidad, $observacionesDiagnostico, $BK2Mes, $fechaBk2, $BK4Mes, $fechaBk4, $BK6Mes, $fechaBk6, $BK9Mes, $fechaBk9, $controlMedico2Mes, $fechaControlMedico2Mes, $observacionesControlMedico2Mes, $controlMedico4Mes, $fechaControlMedico4Mes, $observacionesControlMedico4Mes, $controlMedico6Mes, $fechaControlMedico6Mes, $observacionesControlMedico6Mes, $controlEnfermeria1Mes, $fechaControlEnfermeria1Mes, $observacionesControlEnfermeria1Mes, $controlEnfermeria3Mes, $fechaControlEnfermeria3Mes, $observacionesControlEnfermeria3Mes, $controlEnfermeria5Mes, $fechaControlEnfermeria5Mes, $observacionesControlEnfermeria5Mes, $cultivoFinalTto, $fechaCultivoFinalTto, $condicionEgreso, $fechaCondicionEgreso, $fechaFinalTto, $observacionesControl, $peso, $talla, $imc, $semanaEpidemiologica, $periodoEpidemiologico, $programasivigila, $resultbkfinal){
      
        $instance = Database::getInstance();
       if ($instance == NULL) {
           $db = new Database();
           $instance = $db->getInstance();
       }
       
       $sql="INSERT INTO libroderegistro VALUES ((SELECT max(NUM) AS NU FROM libroderegistro where ano='".$ano."')+1,'".$fechaTAES."','".$trimestre."','".$nombres."','".$id."','".$pertenenciaEtnica."','".$municipioProcedencia."','".$direccion."','".$regimen."','".$EAPB."','".$sexo."',".$edad.",'".$localizacionTB."','".$condicionIngreso."','".$fechaDiagnosticoBK."','".$DiagnosticoBK."','".$fechacultivoDiagnostico."','".$cultivoDiagnostico."','".$realizoAPVVIH."','".$PruebaConfirmatoriaAcordeNormaVIH."','".$condicionEgreso."','".$observacionesDiagnostico."','".$ano."','".$BK2Mes."','".$BK4Mes."','".$BK6Mes."','".$BK9Mes."','".$ocupacion."','".$ubicacionGeografica."','".$ipsDiagnostica."','".$ipsContinua."','".$otroosCriteriosMedicos."','".$cooomorbilidad."','".$periodoEpidemiologico."','".$semanaEpidemiologica."','0','0','0','0','0','0','0','','','".$fechaReportePSF."','".$resitenteA."','".$recibeTARVIH."','".$uMedida."','".$programasivigila."','".$fechaDiagnostico."','".$tipoId."','".$puebloIndigena."','".$grupoPoblacional."','".$entidadTerritorial."','".$sector."','".$telefono."','TIPO MUESTRA','".$barrio."','".$peso."','".$talla."','".$comuna."','".$resultadoPruebaVIH."', '".$diagnosticoPrevioVIH."', '".$recibeTtoPreventivoVIH."', '".$coinfeccionPrevioVIH."', '".$pruebasusceptibilidadFarmacoResitencia."', '".$Pais."', '','','".$municipioNotifica."','".$fechaInicioSintomas."','".$fechaDXPrevioActualVIH."','".$ingresaTto."','".$pruebaMolecular."','".$fechaPruebaMolecular."','".$pruebasusceptibilidadFarmacoResitencia."','".$fechaCondicionEgreso."','".$cultivoFinalTto."','".$fechaCultivoFinalTto."','".$FechaReporteVIH."','".$fechaGestionMedicamento."','".$fechaBk2."','".$fechaBk4."','".$fechaBk6."','".$fechaBk9."','".$controlMedico2Mes."','".$fechaControlMedico2Mes."','".$observacionesControlMedico2Mes."','".$controlMedico4Mes."','".$fechaControlMedico4Mes."','".$observacionesControlMedico4Mes."','".$controlMedico6Mes."','".$fechaControlMedico6Mes."','".$observacionesControlMedico6Mes."','".$controlEnfermeria1Mes."','".$fechaControlEnfermeria1Mes."','".$observacionesControlEnfermeria1Mes."','".$controlEnfermeria3Mes."','".$fechaControlEnfermeria3Mes."','".$observacionesControlEnfermeria3Mes."','".$controlEnfermeria5Mes."','".$fechaControlEnfermeria5Mes."','".$observacionesControlEnfermeria5Mes."','".$ClasificacionTB."','".$fechaFinalTto."','".$observacionesControl."','".$realizoPruebaVIH."','".$resultbkfinal."')";
       //print_r($sql);
        $res = $instance->exec($sql);
       if ($res['STATUS'] ) {
          
           

           $result['STATUS'] = 'OK';
       } else {
           $result['STATUS'] = 'ERROR';
       }
       return $result;
       
    
    }

    public function listarPaciente($num, $ano){
      
        $instance = Database::getInstance();
        if ($instance == NULL) {
            $db = new Database();
            $instance = $db->getInstance();
        }

        $sql="select * from libroderegistro where num=".$num." and ano='".$ano."'  ";
    
        $res = $instance->get_data($sql);
        if ($res['DATA'] ) {
                
            $result['DATA'] = $res['DATA'];

            $result['STATUS'] = 'OK';
        } else {
            $result['STATUS'] = 'ERROR';
        }
        return $result;
    
    }

    public function actualizarPacienteLibroRegistro($numero, $nombres, $id, $tipoId, $ingresaTto, $fechaGestionMedicamento, $fechaTAES, $ano, $ipsDiagnostica, $ipsContinua, $Pais, $entidadTerritorial, $municipioProcedencia, $sexo, $edad, $uMedida, $pertenenciaEtnica, $puebloIndigena, $sector, $barrio, $comuna, $ocupacion, $EAPB, $regimen, $ubicacionGeografica, $telefono, $direccion, $grupoPoblacional, $municipioNotifica, $fechaInicioSintomas, $fechaDiagnostico, $trimestre, $tipoTB, $localizacionTB, $condicionIngreso, $ClasificacionTB, $otroosCriteriosMedicos, $DiagnosticoBK, $fechaDiagnosticoBK, $cultivoDiagnostico, $fechacultivoDiagnostico, $pruebaMolecular, $fechaPruebaMolecular, $realizoAPVVIH, $realizoPruebaVIH, $resultadoPruebaVIH, $FechaReporteVIH, $PruebaConfirmatoriaAcordeNormaVIH, $fechaDXPrevioActualVIH, $recibeTARVIH, $recibeTtoPreventivoVIH, $coinfeccionPrevioVIH, $diagnosticoPrevioVIH, $pruebasusceptibilidadFarmacoResitencia, $fechaReportePSF, $tipoFarmacoResistencia, $resitenteA, $cooomorbilidad, $observacionesDiagnostico, $BK2Mes, $fechaBk2, $BK4Mes, $fechaBk4, $BK6Mes, $fechaBk6, $BK9Mes, $fechaBk9, $controlMedico2Mes, $fechaControlMedico2Mes, $observacionesControlMedico2Mes, $controlMedico4Mes, $fechaControlMedico4Mes, $observacionesControlMedico4Mes, $controlMedico6Mes, $fechaControlMedico6Mes, $observacionesControlMedico6Mes, $controlEnfermeria1Mes, $fechaControlEnfermeria1Mes, $observacionesControlEnfermeria1Mes, $controlEnfermeria3Mes, $fechaControlEnfermeria3Mes, $observacionesControlEnfermeria3Mes, $controlEnfermeria5Mes, $fechaControlEnfermeria5Mes, $observacionesControlEnfermeria5Mes, $cultivoFinalTto, $fechaCultivoFinalTto, $condicionEgreso, $fechaCondicionEgreso, $fechaFinalTto, $observacionesControl, $peso, $talla, $imc, $semanaEpidemiologica, $periodoEpidemiologico, $programasivigila, $resultBKFinal){
       
        $instance = Database::getInstance();
       if ($instance == NULL) {
           $db = new Database();
           $instance = $db->getInstance();
       }
       
       $sql="UPDATE public.libroderegistro SET tipoidentificacion='".$tipoId."', identificacion='".$id."', fechaingreso='".$fechaTAES."', trimestre='".$trimestre."', nombresyapellidos='".$nombres."', etnia='".$pertenenciaEtnica."', municipio='".$municipioProcedencia."', direccion='".$direccion."', regimen='".$regimen."', epsars='".$EAPB."', sexo='".$sexo."', edad='".$edad."', tipotb='".$localizacionTB."', condicioningreso='".$condicionIngreso."', fdrbfecha='".$fechaDiagnosticoBK."', fdrbreporte='".$DiagnosticoBK."', fdrcfecha='".$fechacultivoDiagnostico."', fdrcreporte='".$cultivoDiagnostico."', coinfeccionvihconsejeria='".$realizoAPVVIH."', coinfeccionvihwb='".$PruebaConfirmatoriaAcordeNormaVIH."', condicionegreso='".$condicionEgreso."', observaciones='".$observacionesDiagnostico."', controltratamiento2='".$BK2Mes."', controltratamiento4='".$BK4Mes."', controltratamiento6='".$BK6Mes."', bk9mes='".$BK9Mes."', ocupacion='".$ocupacion."', ubicaciongeografica='".$ubicacionGeografica."', ipsinicia='".$ipsDiagnostica."', ipscontinua='".$ipsContinua."', otrocriteriomediodiagnostico='".$otroosCriteriosMedicos."', patologiaasociada='".$cooomorbilidad."', periodoepidepertenece='".$periodoEpidemiologico."', semanaepidepertenece='".$semanaEpidemiologica."', fechareportepsf='".$fechaReportePSF."', resistentea='".$resitenteA."', vihtarv='".$recibeTARVIH."', menor='".$uMedida."', sivigilaprograma='".$programasivigila."', fechadiagnostico='".$fechaDiagnostico."', puebloindigena='".$puebloIndigena."', grupopoblacional='".$grupoPoblacional."', entidadterritorial='".$entidadTerritorial."', sector='".$sector."', telefono='".$telefono."', sectores='".$barrio."', peso='".$peso."', talla='".$talla."', comuna='".$comuna."', pruebatamisaje='".$resultadoPruebaVIH."', diagnosticopreviovih='".$diagnosticoPrevioVIH."', recibetratamientopreventivo='".$recibeTtoPreventivoVIH."', existecoinfecciontbvih='".$coinfeccionPrevioVIH."', resultadodepsf='".$tipoFarmacoResistencia."', pais='".$Pais."',  municipionotifica='".$municipioNotifica."', fechainiciodesintomas='".$fechaInicioSintomas."', fechaconfirmatoriawb='".$fechaDXPrevioActualVIH."', ingresaatratamiento='".$ingresaTto."', pruebamolecular='".$pruebaMolecular."', fechapruebamolecular='".$fechaPruebaMolecular."', pruebadesusceptibilidadafarmacos='".$pruebasusceptibilidadFarmacoResitencia."', fechadeegreso='".$fechaCondicionEgreso."', cultivoalfinaltratamiento='".$cultivoFinalTto."', fechacultivoalfinaltratamiento='".$fechaCultivoFinalTto."', fechadereportevih='".$FechaReporteVIH."', fechainiciotaes='".$fechaGestionMedicamento."', fechabk2='".$fechaBk2."', fechabk4='".$fechaBk4."', fechabk6='".$fechaBk6."', fechabk9='".$fechaBk9."', controlmedico2mes='".$controlMedico2Mes."', fechacontrolmedico2mes='".$fechaControlMedico2Mes."', observacionescontrolmedico2mes='".$observacionesControlMedico2Mes."', controlmedico4mes='".$controlMedico4Mes."', fechacontrolmedico4mes='".$fechaControlMedico4Mes."', observacionescontrolmedico4mes='".$observacionesControlMedico4Mes."', controlmedico6mes='".$controlMedico6Mes."', fechacontrolmedico6mes='".$fechaControlMedico6Mes."', observacionescontrolmedico6mes='".$observacionesControlMedico6Mes."', controlenfermeria1mes='".$controlEnfermeria1Mes."', fechacontrolenfermeria1mes='".$fechaControlEnfermeria1Mes."', observacionescontrolenfermeria1mes='".$observacionesControlEnfermeria1Mes."', controlenfermeria3mes='".$controlEnfermeria3Mes."', fechacontrolenfermeria3mes='".$fechaControlEnfermeria3Mes."', observacionescontrolenfermeria3mes='".$observacionesControlEnfermeria3Mes."', controlenfermeria5mes='".$controlEnfermeria5Mes."', fechacontrolenfermeria5mes='".$fechaControlEnfermeria5Mes."', observacionescontrolenfermeria5mes='".$observacionesControlEnfermeria5Mes."', tipoconfimacionbacteriologica='".$ClasificacionTB."', fechafintratamiento='".$fechaFinalTto."', observacionesfechafintratamiento='".$observacionesControl."', serealizoprueba='".$realizoPruebaVIH."', resultBKFinal='".$resultBKFinal."' WHERE num='".$numero."' and  ano='".$ano."' and tipoidentificacion='".$tipoId."' and identificacion='".$id."'";
        
        $res = $instance->exec($sql);
       if ($res['STATUS'] ) {
          
           

           $result['STATUS'] = 'OK';
       } else {
           $result['STATUS'] = 'ERROR';
       }
       return $result;
       
    
    }
    public function actualizarPacienteLibroRegistroIdentific($data){
       
        $instance = Database::getInstance();
       if ($instance == NULL) {
           $db = new Database();
           $instance = $db->getInstance();
       }
       
       $sql="UPDATE public.libroderegistro SET tipoidentificacion='".$data['MTipoId']."', identificacion='".$data['Mid']."', nombresyapellidos='".$data['MNombres']."' WHERE num='".$data['MConsecutivo']."' and  ano='".$data['Mano']."'";
        
        $res = $instance->exec($sql);
       if ($res['STATUS'] ) {
          
           

           $result['STATUS'] = 'OK';
       } else {
           $result['STATUS'] = 'ERROR';
       }
       return $result;
       
    
    }

}
?>