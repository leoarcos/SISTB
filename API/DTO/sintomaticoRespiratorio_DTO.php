<?php
include_once '../DAO/sintomaticoRespiratorio_DAO.php';

class sintomaticoRespiratorio_DTO
{
	
	function __construct()
	{
		# code...
	}
	public function generarConsecutivo($ano){

		$LPDAO = new sintomaticoRespiratorio_DAO();
        $result = $LPDAO->generarConsecutivo($ano);

        return $result;
        
    } 
    public function registrarsintomaticoRespiratorio($datos){

		$LPDAO = new sintomaticoRespiratorio_DAO();
        $result = $LPDAO->registrarsintomaticoRespiratorio($datos);

        return $result;
        
    } 
    public function actualizarSintomatico($datos){

		$LPDAO = new sintomaticoRespiratorio_DAO();
        $result = $LPDAO->actualizarSintomatico($datos);

        return $result;
        
    } 
    public function listarSintomaticoRespiratorio(){

		$LPDAO = new sintomaticoRespiratorio_DAO();
        $result = $LPDAO->listarSintomaticoRespiratorio();

        return $result;
        
    } 
    public function listarSintomaticoRespiratorioEspecifico($datos){

		$LPDAO = new sintomaticoRespiratorio_DAO();
        $result = $LPDAO->listarSintomaticoRespiratorioEspecifico($datos);

        return $result;
        
    } 
    public function listarPruebasRealizadasEspecifico($datos){

		$LPDAO = new sintomaticoRespiratorio_DAO();
        $result = $LPDAO->listarPruebasRealizadasEspecifico($datos);

        return $result;
        
    } 
    public function eliminarSintomaticos($datos){

		$LPDAO = new sintomaticoRespiratorio_DAO();
        $result = $LPDAO->eliminarSintomaticos($datos);

        return $result;
        
    }
    
}

?>