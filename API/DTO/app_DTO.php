<?php
include_once '../DAO/app_DAO.php';

class app_DTO
{
	
	function __construct()
	{
		# code...
	}
	public function consultaIndependiente($sql){
		$appDAO= new app_DAO();
		$result= $appDAO->consultaIndependiente($sql);
		return $result;
    }
	public function listarMunicipios(){
		$appDAO= new app_DAO();
		$result= $appDAO->listarMunicipios();
		return $result;
    }
    public function validarNick($nick){
		$appDAO= new app_DAO();
		$result= $appDAO->validarNick($nick);
		return $result;
	}
	function listarIps(){
		$appDAO= new app_DAO();
		$result= $appDAO->listarIps();
		return $result;
	}
	function listarPaises(){
		$appDAO= new app_DAO();
		$result= $appDAO->listarPaises();
		return $result;
	}
	function listarDptosColombia(){
		$appDAO= new app_DAO();
		$result= $appDAO->listarDptosColombia();
		return $result;
	}
	function listarMnposD($dpto){
		$appDAO= new app_DAO();
		$result= $appDAO->listarMnposD($dpto);
		return $result;
	}
	function listarEtnia(){
		$appDAO= new app_DAO();
		$result= $appDAO->listarEtnia();
		return $result;
	}
	function listarAsentamiento($muni){
		$appDAO= new app_DAO();
		$result= $appDAO->listarAsentamiento($muni);
		return $result;
	}
	function listarBarrios($muni){
		$appDAO= new app_DAO();
		$result= $appDAO->listarBarrios($muni);
		return $result;
	}
	function listarComuna($muni, $sector){
		$appDAO= new app_DAO();
		$result= $appDAO->listarComuna($muni, $sector);
		return $result;
	}
	function listarVereda($muni){
		$appDAO= new app_DAO();
		$result= $appDAO->listarVereda($muni);
		return $result;
	}
	function listarCorregimiento($muni){
		$appDAO= new app_DAO();
		$result= $appDAO->listarCorregimiento($muni);
		return $result;
	}
	function listarOcupaciones(){
		$appDAO= new app_DAO();
		$result= $appDAO->listarOcupaciones();
		return $result;
	}

	function listarEAPB(){

		$appDAO= new app_DAO();
		$result= $appDAO->listarEAPB();
		return $result;

	}
	function listarMnpoNorte(){

		$appDAO= new app_DAO();
		$result= $appDAO->listarMnpoNorte();
		return $result;

	}
	function listarRegimen(){

		$appDAO= new app_DAO();
		$result= $appDAO->listarRegimen();
		return $result;

	}
	function listarTipoPulmonar(){

		$appDAO= new app_DAO();
		
		$result= $appDAO->listarTipoPulmonar();
		return $result;

	}
	function listarTipoExtraPulmonar(){

		$appDAO= new app_DAO();
		$result= $appDAO->listarTipoExtraPulmonar();
		return $result;

	}
	function listarCondicionIngreso(){

		$appDAO= new app_DAO();
		$result= $appDAO->listarCondicionIngreso();
		return $result;

	}
	function listarCoormobilidad(){

		$appDAO= new app_DAO();
		$result= $appDAO->listarCoormobilidad();
		return $result;

	}
	function numeroConsecutivo($ano){

		$appDAO= new app_DAO();
		$result= $appDAO->numeroConsecutivo($ano);
		return $result;

	}
	function otroCriterioMedicoDiagnostico(){

		$appDAO= new app_DAO();
		$result= $appDAO->otroCriterioMedicoDiagnostico();
		return $result;

	}
	function listarPruebaSusceptibilidadF(){

		$appDAO= new app_DAO();
		$result= $appDAO->listarPruebaSusceptibilidadF();
		return $result;

	}
	function resultadodepsf(){

		$appDAO= new app_DAO();
		$result= $appDAO->resultadodepsf();
		return $result;

	}
	function listarGPoblacional(){

		$appDAO= new app_DAO();
		$result= $appDAO->listarGPoblacional();
		return $result;

	}
}

