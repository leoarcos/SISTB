<?php
include_once '../DAO/adicionales_DAO.php';

class adicionales_DTO
{
	
	function __construct()
	{
		# code...
	}
	public function listarIpsNuevos(){

		$LPDAO = new adicionales_DAO();
        $result = $LPDAO->listarIpsNuevos();

        return $result;
        
	}
	public function registrarIpsNuevos($nombre){

		$LPDAO = new adicionales_DAO();
        $result = $LPDAO->registrarIpsNuevos($nombre);

        return $result;
        
	}
	public function borrarIpsNuevos($nombre){

		$LPDAO = new adicionales_DAO();
        $result = $LPDAO->borrarIpsNuevos($nombre);

        return $result;
        
	}

}

?>