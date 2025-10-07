<?php
include_once '../DAO/libroPacientes_DAO.php';

class libroPacientes_DTO
{
	
	function __construct()
	{
		# code...
	}
	public function listarPacientes(){

		$LPDAO = new libroPacientes_DAO();
        $result = $LPDAO->listarPacientes();

        return $result;
        
	}
	public function buscarPacienteId($tipoid, $id){

		$LPDAO = new libroPacientes_DAO();
        $result = $LPDAO->buscarPacienteId($tipoid, $id);

        return $result;
        
	}
	public function buscarPacienteIdAutorizacion($tipoid, $id){

		$LPDAO = new libroPacientes_DAO();
        $result = $LPDAO->buscarPacienteIdAutorizacion($tipoid, $id);

        return $result;
        
	}
	public function listarPacientes007($ano){

		$LPDAO = new libroPacientes_DAO();
        $result = $LPDAO->listarPacientes007($ano);

        return $result;
        
	}
	public function eliminarDato($num, $id, $ano, $nombres, $fecha, $tipoid){

		$LPDAO = new libroPacientes_DAO();
        $result = $LPDAO->eliminarDato($num, $id, $ano, $nombres, $fecha, $tipoid);

        return $result;
        
	}

	public function registrarPacienteLibroRegistro($nombres, $id, $tipoId, $ingresaTto, $fechaGestionMedicamento, $fechaTAES, $ano, $ipsDiagnostica, $ipsContinua, $Pais, $entidadTerritorial, $municipioProcedencia, $sexo, $edad, $uMedida, $pertenenciaEtnica, $puebloIndigena, $sector, $barrio, $comuna, $ocupacion, $EAPB, $regimen, $ubicacionGeografica, $telefono, $direccion, $grupoPoblacional, $municipioNotifica, $fechaInicioSintomas, $fechaDiagnostico, $trimestre, $tipoTB, $localizacionTB, $ascondicionIngresod, $ClasificacionTB, $otroosCriteriosMedicos, $DiagnosticoBK, $fechaDiagnosticoBK, $cultivoDiagnostico, $fechacultivoDiagnostico, $pruebaMolecular, $fechaPruebaMolecular, $realizoAPVVIH, $realizoPruebaVIH, $resultadoPruebaVIH, $FechaReporteVIH, $PruebaConfirmatoriaAcordeNormaVIH, $fechaDXPrevioActualVIH, $recibeTARVIH, $recibeTtoPreventivoVIH, $coinfeccionPrevioVIH, $diagnosticoPrevioVIH, $pruebasusceptibilidadFarmacoResitencia, $fechaReportePSF, $tipoFarmacoResistencia, $resitenteA, $cooomorbilidad, $observacionesDiagnostico, $BK2Mes, $fechaBk2, $BK4Mes, $fechaBk4, $BK6Mes, $fechaBk6, $BK9Mes, $fechaBk9, $controlMedico2Mes, $fechaControlMedico2Mes, $observacionesControlMedico2Mes, $controlMedico4Mes, $fechaControlMedico4Mes, $observacionesControlMedico4Mes, $controlMedico6Mes, $fechaControlMedico6Mes, $observacionesControlMedico6Mes, $controlEnfermeria1Mes, $fechaControlEnfermeria1Mes, $observacionesControlEnfermeria1Mes, $controlEnfermeria3Mes, $fechaControlEnfermeria3Mes, $observacionesControlEnfermeria3Mes, $controlEnfermeria5Mes, $fechaControlEnfermeria5Mes, $observacionesControlEnfermeria5Mes, $cultivoFinalTto, $fechaCultivoFinalTto, $condicionEgreso, $fechaCondicionEgreso, $fechaFinalTto, $observacionesControl, $peso, $talla, $imc, $semanaEpidemiologica, $periodoEpidemiologico, $programasivigila, $resultBKFinal){

		$LPDAO = new libroPacientes_DAO();
        $result = $LPDAO->registrarPacienteLibroRegistro($nombres, $id, $tipoId, $ingresaTto, $fechaGestionMedicamento, $fechaTAES, $ano, $ipsDiagnostica, $ipsContinua, $Pais, $entidadTerritorial, $municipioProcedencia, $sexo, $edad, $uMedida, $pertenenciaEtnica, $puebloIndigena, $sector, $barrio, $comuna, $ocupacion, $EAPB, $regimen, $ubicacionGeografica, $telefono, $direccion, $grupoPoblacional, $municipioNotifica, $fechaInicioSintomas, $fechaDiagnostico, $trimestre, $tipoTB, $localizacionTB, $ascondicionIngresod, $ClasificacionTB, $otroosCriteriosMedicos, $DiagnosticoBK, $fechaDiagnosticoBK, $cultivoDiagnostico, $fechacultivoDiagnostico, $pruebaMolecular, $fechaPruebaMolecular, $realizoAPVVIH, $realizoPruebaVIH, $resultadoPruebaVIH, $FechaReporteVIH, $PruebaConfirmatoriaAcordeNormaVIH, $fechaDXPrevioActualVIH, $recibeTARVIH, $recibeTtoPreventivoVIH, $coinfeccionPrevioVIH, $diagnosticoPrevioVIH, $pruebasusceptibilidadFarmacoResitencia, $fechaReportePSF, $tipoFarmacoResistencia, $resitenteA, $cooomorbilidad, $observacionesDiagnostico, $BK2Mes, $fechaBk2, $BK4Mes, $fechaBk4, $BK6Mes, $fechaBk6, $BK9Mes, $fechaBk9, $controlMedico2Mes, $fechaControlMedico2Mes, $observacionesControlMedico2Mes, $controlMedico4Mes, $fechaControlMedico4Mes, $observacionesControlMedico4Mes, $controlMedico6Mes, $fechaControlMedico6Mes, $observacionesControlMedico6Mes, $controlEnfermeria1Mes, $fechaControlEnfermeria1Mes, $observacionesControlEnfermeria1Mes, $controlEnfermeria3Mes, $fechaControlEnfermeria3Mes, $observacionesControlEnfermeria3Mes, $controlEnfermeria5Mes, $fechaControlEnfermeria5Mes, $observacionesControlEnfermeria5Mes, $cultivoFinalTto, $fechaCultivoFinalTto, $condicionEgreso, $fechaCondicionEgreso, $fechaFinalTto, $observacionesControl, $peso, $talla, $imc, $semanaEpidemiologica, $periodoEpidemiologico, $programasivigila, $resultBKFinal);

        return $result;
        
	}
	public function listarPaciente($num, $ano){

		$LPDAO = new libroPacientes_DAO();
        $result = $LPDAO->listarPaciente($num, $ano);

        return $result;
        
	}
	public function actualizarPacienteLibroRegistro($numero, $nombres, $id, $tipoId, $ingresaTto, $fechaGestionMedicamento, $fechaTAES, $ano, $ipsDiagnostica, $ipsContinua, $Pais, $entidadTerritorial, $municipioProcedencia, $sexo, $edad, $uMedida, $pertenenciaEtnica, $puebloIndigena, $sector, $barrio, $comuna, $ocupacion, $EAPB, $regimen, $ubicacionGeografica, $telefono, $direccion, $grupoPoblacional, $municipioNotifica, $fechaInicioSintomas, $fechaDiagnostico, $trimestre, $tipoTB, $localizacionTB, $ascondicionIngresod, $ClasificacionTB, $otroosCriteriosMedicos, $DiagnosticoBK, $fechaDiagnosticoBK, $cultivoDiagnostico, $fechacultivoDiagnostico, $pruebaMolecular, $fechaPruebaMolecular, $realizoAPVVIH, $realizoPruebaVIH, $resultadoPruebaVIH, $FechaReporteVIH, $PruebaConfirmatoriaAcordeNormaVIH, $fechaDXPrevioActualVIH, $recibeTARVIH, $recibeTtoPreventivoVIH, $coinfeccionPrevioVIH, $diagnosticoPrevioVIH, $pruebasusceptibilidadFarmacoResitencia, $fechaReportePSF, $tipoFarmacoResistencia, $resitenteA, $cooomorbilidad, $observacionesDiagnostico, $BK2Mes, $fechaBk2, $BK4Mes, $fechaBk4, $BK6Mes, $fechaBk6, $BK9Mes, $fechaBk9, $controlMedico2Mes, $fechaControlMedico2Mes, $observacionesControlMedico2Mes, $controlMedico4Mes, $fechaControlMedico4Mes, $observacionesControlMedico4Mes, $controlMedico6Mes, $fechaControlMedico6Mes, $observacionesControlMedico6Mes, $controlEnfermeria1Mes, $fechaControlEnfermeria1Mes, $observacionesControlEnfermeria1Mes, $controlEnfermeria3Mes, $fechaControlEnfermeria3Mes, $observacionesControlEnfermeria3Mes, $controlEnfermeria5Mes, $fechaControlEnfermeria5Mes, $observacionesControlEnfermeria5Mes, $cultivoFinalTto, $fechaCultivoFinalTto, $condicionEgreso, $fechaCondicionEgreso, $fechaFinalTto, $observacionesControl, $peso, $talla, $imc, $semanaEpidemiologica, $periodoEpidemiologico, $programasivigila, $resultBKFinal){

		$LPDAO = new libroPacientes_DAO();
        $result = $LPDAO->actualizarPacienteLibroRegistro($numero, $nombres, $id, $tipoId, $ingresaTto, $fechaGestionMedicamento, $fechaTAES, $ano, $ipsDiagnostica, $ipsContinua, $Pais, $entidadTerritorial, $municipioProcedencia, $sexo, $edad, $uMedida, $pertenenciaEtnica, $puebloIndigena, $sector, $barrio, $comuna, $ocupacion, $EAPB, $regimen, $ubicacionGeografica, $telefono, $direccion, $grupoPoblacional, $municipioNotifica, $fechaInicioSintomas, $fechaDiagnostico, $trimestre, $tipoTB, $localizacionTB, $ascondicionIngresod, $ClasificacionTB, $otroosCriteriosMedicos, $DiagnosticoBK, $fechaDiagnosticoBK, $cultivoDiagnostico, $fechacultivoDiagnostico, $pruebaMolecular, $fechaPruebaMolecular, $realizoAPVVIH, $realizoPruebaVIH, $resultadoPruebaVIH, $FechaReporteVIH, $PruebaConfirmatoriaAcordeNormaVIH, $fechaDXPrevioActualVIH, $recibeTARVIH, $recibeTtoPreventivoVIH, $coinfeccionPrevioVIH, $diagnosticoPrevioVIH, $pruebasusceptibilidadFarmacoResitencia, $fechaReportePSF, $tipoFarmacoResistencia, $resitenteA, $cooomorbilidad, $observacionesDiagnostico, $BK2Mes, $fechaBk2, $BK4Mes, $fechaBk4, $BK6Mes, $fechaBk6, $BK9Mes, $fechaBk9, $controlMedico2Mes, $fechaControlMedico2Mes, $observacionesControlMedico2Mes, $controlMedico4Mes, $fechaControlMedico4Mes, $observacionesControlMedico4Mes, $controlMedico6Mes, $fechaControlMedico6Mes, $observacionesControlMedico6Mes, $controlEnfermeria1Mes, $fechaControlEnfermeria1Mes, $observacionesControlEnfermeria1Mes, $controlEnfermeria3Mes, $fechaControlEnfermeria3Mes, $observacionesControlEnfermeria3Mes, $controlEnfermeria5Mes, $fechaControlEnfermeria5Mes, $observacionesControlEnfermeria5Mes, $cultivoFinalTto, $fechaCultivoFinalTto, $condicionEgreso, $fechaCondicionEgreso, $fechaFinalTto, $observacionesControl, $peso, $talla, $imc, $semanaEpidemiologica, $periodoEpidemiologico, $programasivigila, $resultBKFinal);

        return $result;
        
	}
	public function actualizarPacienteLibroRegistroIdentific($data){

		$LPDAO = new libroPacientes_DAO();
        $result = $LPDAO->actualizarPacienteLibroRegistroIdentific($data);

        return $result;
        
	}

}

?>