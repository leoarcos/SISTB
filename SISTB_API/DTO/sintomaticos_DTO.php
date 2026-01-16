<?php

include_once '../DAO/sintomaticos_DAO.php';



class sintomaticos_DTO{

	

	function __construct()

	{

		# code...

	}

	

	public function numeroConsecutivo($data){

	 

		

		$inst= new sintomaticos_DAO();

		$dataOut=$inst->numeroConsecutivo($data);

        

		return $dataOut;

    }  

	public function registrarsintomaticoRespiratorio($data){

	 

		

		$inst= new sintomaticos_DAO();

		$dataOut=$inst->registrarsintomaticoRespiratorio($data);

        

		return $dataOut;

    }  
	public function listarSintomaticos($data){

	 

		

		$inst= new sintomaticos_DAO();

		$dataOut=$inst->listarSintomaticos($data);

        

		return $dataOut;

    }  
 
}

//new app_DTO()->listarMunicipios();





