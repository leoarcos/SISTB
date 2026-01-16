<?php

include_once '../DAO/user_DAO.php';



class user_DTO

{

	

	function __construct()

	{

		# code...

	}

	

	public function logIn($data){

	 

		

		$inst= new user_DAO();

		$dataOut=$inst->logIn($data);

        

		return $dataOut;

    } 

	public function listarUsuarios($data){

		

		$inst= new user_DAO();

		$dataOut=$inst->listarUsuarios($data);

        

		return $dataOut;

    } 
	public function listarUsuarioPass($data){

		

		$inst= new user_DAO();

		$dataOut=$inst->listarUsuarioPass($data);

        

		return $dataOut;

    } 

 

	public function editarUsuario($data){

		

		$inst= new user_DAO();

		$dataOut=$inst->editarUsuario($data);

        

		return $dataOut;

    } 

	public function registrarUsuario($data){

		

		$inst= new user_DAO();

		$dataOut=$inst->registrarUsuario($data);

        

		return $dataOut;

    } 

}

//new app_DTO()->listarMunicipios();





