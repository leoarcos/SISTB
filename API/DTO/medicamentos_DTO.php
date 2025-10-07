<?php
include_once '../DAO/medicamentos_DAO.php';

class medicamentos_DTO
{
	
	function __construct()
	{
		# code...
	}
	public function listarMedicamentos(){

		$LPDAO = new medicamentos_DAO();
        $result = $LPDAO->listarMedicamentos();

        return $result;
        
    }
    public function listarMedicamentosExistentes(){

		$LPDAO = new medicamentos_DAO();
        $result = $LPDAO->listarMedicamentosExistentes();

        return $result;
        
    }
    public function listarMedicamentosComprometidos(){

		$LPDAO = new medicamentos_DAO();
        $result = $LPDAO->listarMedicamentosComprometidos();

        return $result;
        
    }
    public function actualizarCantidadMedicamentos($medicamentos){
        
        $LPDAO = new medicamentos_DAO();
        $result = $LPDAO->actualizarCantidadMedicamentos($medicamentos);

        return $result;
        
    }
    public function registrarMedicamento($datos){
        $LPDAO = new medicamentos_DAO();
        $result = $LPDAO->registrarMedicamento($datos);

        return $result;
    }
    public function ActualizarFarmaco($datos){
        
        $LPDAO = new medicamentos_DAO();
        $result = $LPDAO->ActualizarFarmaco($datos);

        return $result;
    }
    public function eliminarFarmaco($datos){
        
        $LPDAO = new medicamentos_DAO();
        $result = $LPDAO->eliminarFarmaco($datos);

        return $result;
    }
    public function listarMedicamentosPendientes(){
        $LPDAO = new medicamentos_DAO();
        $result = $LPDAO->listarMedicamentosPendientes();

        return $result;
    }
    public function listarMedicamentosPendientesFechas($fechaInicio, $fechaFin){
        $LPDAO = new medicamentos_DAO();
        $result = $LPDAO->listarMedicamentosPendientesFechas($fechaInicio, $fechaFin);

        return $result;
    }
}

?>