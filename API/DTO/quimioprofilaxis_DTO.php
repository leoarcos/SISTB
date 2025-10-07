<?php
include_once '../DAO/quimioprofilaxis_DAO.php';

class quimioprofilaxis_DTO
{
	
	function __construct()
	{
		# code...
	}
	public function generarConsecutivo($ano){

		$LPDAO = new quimioprofilaxis_DAO();
        $result = $LPDAO->generarConsecutivo($ano);

        return $result;
        
    } 
    public function registrarQuimioprofilaxis($datos){

		$LPDAO = new quimioprofilaxis_DAO();
        $result = $LPDAO->registrarQuimioprofilaxis($datos);

        return $result;
        
    } 
    public function actualizarQuimioprofilaxis($datos){

		$LPDAO = new quimioprofilaxis_DAO();
        $result = $LPDAO->actualizarQuimioprofilaxis($datos);

        return $result;
        
    } 
    public function listarQuimioprofilaxis(){

		$LPDAO = new quimioprofilaxis_DAO();
        $result = $LPDAO->listarQuimioprofilaxis();

        return $result;
        
    } 
    public function listarQuimioprofilaxis007($ano){

		$LPDAO = new quimioprofilaxis_DAO();
        $result = $LPDAO->listarQuimioprofilaxis007($ano);

        return $result;
        
    } 
    public function listarQuimioprofilaxisEspecifico($datos){

		$LPDAO = new quimioprofilaxis_DAO();
        $result = $LPDAO->listarQuimioprofilaxisEspecifico($datos);

        return $result;
        
    }  
    public function buscarPacienteId($tipoid, $id){
        
		$LPDAO = new quimioprofilaxis_DAO();
        $result = $LPDAO->buscarPacienteId($tipoid, $id);

        return $result;
    }
    public function eliminarQuimioprofilaxis($datos){

		$LPDAO = new quimioprofilaxis_DAO();
        $result = $LPDAO->eliminarQuimioprofilaxis($datos);

        return $result;
        
    }

}

?>