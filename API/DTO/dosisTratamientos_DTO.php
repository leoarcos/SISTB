<?php
include_once '../DAO/dosisTratamientos_DAO.php';

class tratamientoDosis_DTO
{
	
	function __construct()
	{
		# code...
	}
	public function listarTratamientoDosisPrimeraFase($num, $id){

		$LPDAO = new tratamientoDosis_DAO();
        $result = $LPDAO->listarTratamientoDosisPrimeraFase($num, $id);

        return $result;
        
	}
	public function listarTratamientoDosisSegundaFase($num, $id){

		$LPDAO = new tratamientoDosis_DAO();
        $result = $LPDAO->listarTratamientoDosisSegundaFase($num, $id);

        return $result;
        
	}
	public function listarCantidadDosis($num, $id, $fase){

		$LPDAO = new tratamientoDosis_DAO();
        $result = $LPDAO->listarCantidadDosis($num, $id, $fase);

        return $result;
        
	}
    public function verificar($num, $ano, $id, $mes, $dia, $fase){

		$LPDAO = new tratamientoDosis_DAO();
        $result = $LPDAO->verificar($num, $ano, $id, $mes, $dia, $fase);

        return $result;
        
    }
    public function registrarDosisTto($num, $ano, $id, $mes, $dia, $fase, $dosis){

		$LPDAO = new tratamientoDosis_DAO();
        $result = $LPDAO->registrarDosisTto($num, $ano, $id, $mes, $dia, $fase, $dosis);

        return $result;
        
	}
	public function eliminarDosisTto($num, $ano, $id, $mes, $dia, $fase, $dosis){

		$LPDAO = new tratamientoDosis_DAO();
        $result = $LPDAO->eliminarDosisTto($num, $ano, $id, $mes, $dia, $fase, $dosis);

        return $result;
        
	}

}

?>