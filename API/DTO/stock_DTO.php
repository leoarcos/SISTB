<?php
include_once '../DAO/stock_DAO.php';

class stock_DTO
{
	
	function __construct()
	{
		# code...
	}
	public function listarStocksPendientes($eapb){

		$LPDAO = new stock_DAO();
        $result = $LPDAO->listarStocksPendientes($eapb);

        return $result;
        
	} 
	public function listarStocks($estado){

		$LPDAO = new stock_DAO();
        $result = $LPDAO->listarStocks($estado);

        return $result;
        
	} 
	public function listarStockId($consecutivo){

		$LPDAO = new stock_DAO();
        $result = $LPDAO->listarStockId($consecutivo);

        return $result;
        
	} 
	
	public function descargarStock($datos){

		$LPDAO = new stock_DAO();
        $result = $LPDAO->descargarStock($datos);

        return $result;
        
	} 
    public function registrarStock($datos){

		$LPDAO = new stock_DAO();
        $result = $LPDAO->registrarStock($datos);

        return $result;
        
	} 
	public function actualizarStock($datos){

		$LPDAO = new stock_DAO();
        $result = $LPDAO->actualizarStock($datos);

        return $result;
        
	} 
	public function eliminarStock($datos){

		$LPDAO = new stock_DAO();
        $result = $LPDAO->eliminarStock($datos);

        return $result;
        
	} 
	public function listarAutorizacionIpsMedicamentos($cosecutivo){

		$LPDAO = new stock_DAO();
        $result = $LPDAO->listarAutorizacionIpsMedicamentos($cosecutivo);

        return $result;
        
	} 

}

?>