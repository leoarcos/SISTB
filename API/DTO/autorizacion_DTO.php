<?php
include_once '../DAO/autorizacion_DAO.php';

class autorizacion_DTO
{
	
	function __construct()
	{
		# code...
	}
	public function listarAutorizaciones(){

		$LPDAO = new autorizacion_DAO();
        $result = $LPDAO->listarAutorizaciones();

        return $result;
        
	}
	public function listarAutorizacionesNoPendientes(){

		$LPDAO = new autorizacion_DAO();
        $result = $LPDAO->listarAutorizacionesNoPendientes();

        return $result;
        
	}
	public function listarAutorizacionesTodas(){

		$LPDAO = new autorizacion_DAO();
        $result = $LPDAO->listarAutorizacionesTodas();

        return $result;
        
	}
	
    public function registrarAutorizacion($datos){

		$LPDAO = new autorizacion_DAO();
        $result = $LPDAO->registrarAutorizacion($datos);

        return $result;
        
	} 
	public function actualizarAutorizacion($datos){

		$LPDAO = new autorizacion_DAO();
        $result = $LPDAO->actualizarAutorizacion($datos);

        return $result;
        
	} 
	public function registrarAutorizacionMedicamento($datos){

		$LPDAO = new autorizacion_DAO();
        $result = $LPDAO->registrarAutorizacionMedicamento($datos);

        return $result;
        
	}
	public function registrarAutorizacionDescarga($datos){

		$LPDAO = new autorizacion_DAO();
        $result = $LPDAO->registrarAutorizacionDescarga($datos);

        return $result;
        
	}
	public function buscarAutorizacion($consecutivo, $id){

		$LPDAO = new autorizacion_DAO();
        $result = $LPDAO->buscarAutorizacion($consecutivo, $id);

        return $result;
        
	}
	public function listarMedicamentosAutorizacion($consecutivo){

		$LPDAO = new autorizacion_DAO();
        $result = $LPDAO->listarMedicamentosAutorizacion($consecutivo);

        return $result;
        
	}
	public function listarMedicamentosPaciente($id, $tipoid){

		$LPDAO = new autorizacion_DAO();
        $result = $LPDAO->listarMedicamentosPaciente($id, $tipoid);

        return $result;
        
	}
	public function eliminarAutorizacion($id){

		$LPDAO = new autorizacion_DAO();
        $result = $LPDAO->eliminarAutorizacion($id);

        return $result;
        
	}

}

?>