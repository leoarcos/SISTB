<?php

include_once '../DAO/libropacientes_DAO.php';



class libropacientes_DTO{

	

	function __construct()

	{

		# code...

	}

	

	public function numeroConsecutivo($data){

	 

		

		$inst= new libropacientes_DAO();

		$dataOut=$inst->numeroConsecutivo($data);

        

		return $dataOut;

    } 
	public function registrarLibroPacientes($data){

	 

		

		$inst= new libropacientes_DAO();

		$dataOut=$inst->registrarLibroPacientes($data);

        

		return $dataOut;

    } 
 
	public function listarLibroPacientes($data){
 
		

		$inst= new libropacientes_DAO();

		$dataOut=$inst->listarLibroPacientes($data);

        

		return $dataOut;

    } 
 

}

//new app_DTO()->listarMunicipios();





