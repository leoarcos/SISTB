<?php
include_once '../DAO/resistenteFarmacos_DAO.php';

class resistenteFarmacos_DTO
{
	
	function __construct()
	{
		# code...
	}
	public function registrarFarmacoResistente($datos){

		$LPDAO = new resistenteFarmacos_DAO();
        $result = $LPDAO->registrarFarmacoResistente($datos);

        return $result;
        
	}
	public function buscarPacienteId($tipoid, $id){

		$LPDAO = new resistenteFarmacos_DAO();
        $result = $LPDAO->buscarPacienteId($tipoid, $id);

        return $result;
        
	}
	public function listarPacientes(){

		$LPDAO = new resistenteFarmacos_DAO();
        $result = $LPDAO->listarPacientes();

        return $result;
        
	}

	public function generarConsecutivo(){

		$LPDAO = new resistenteFarmacos_DAO();
        $result = $LPDAO->generarConsecutivo();

        return $result;
        
	}

	public function eliminarResistente($num, $id){

		$LPDAO = new resistenteFarmacos_DAO();
        $result = $LPDAO->eliminarResistente($num, $id);

        return $result;
        
	}
	public function registrarSeguimientoBacteriologico($datos){
		
		$LPDAO = new resistenteFarmacos_DAO();
        $result = $LPDAO->registrarSeguimientoBacteriologico($datos);

        return $result;
        
	}
	public function listarSeguimientosBacteriologicos($num){
		
		$LPDAO = new resistenteFarmacos_DAO();
        $result = $LPDAO->listarSeguimientosBacteriologicos($num);

        return $result;
        
	}
	public function ActualizarResistente($datos){

		$LPDAO = new resistenteFarmacos_DAO();
        $result = $LPDAO->ActualizarResistente($datos);

        return $result;
	}
}

?>