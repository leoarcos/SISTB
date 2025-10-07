<?php
include_once '../DAO/users_DAO.php';

class users_DTO
{
	
	function __construct()
	{
		# code...
	}
	public function logIn($nick, $pass){

		$userDAO = new User_DAO();
        $result = $userDAO->logIn($nick, $pass);

        return $result;
        
	}

	public function ingresarUsuario($nombres, $apellidos, $nick, $pass, $addUser, $editUser, $listUser, $deleteUser, $actaNueva, $actaAntigua, $editActa, $deleteActa, $sexo, $nacimiento, $tipoid, $documento, $telefono, $email, $cargo){
		$userDAO= new User_DAO();
		$result= $userDAO->ingresarUsuario($nombres, $apellidos, $nick, $pass, $addUser, $editUser, $listUser, $deleteUser, $actaNueva, $actaAntigua, $editActa, $deleteActa, $sexo, $nacimiento, $tipoid, $documento, $telefono, $email, $cargo);
		return $result;

        
	}
	public function listarUsuarios(){
		$userDAO= new User_DAO();
		$result= $userDAO->listarUsuarios();
		return $result;
	}
	public function actualizarUsuario($id, $nombres, $apellidos, $nick, $pass, $addUser, $editUser, $listUser, $deleteUser, $actaNueva, $actaAntigua, $editActa, $deleteActa, $sexo, $nacimiento, $tipoid, $documento, $telefono, $email, $cargo){
		$userDAO= new User_DAO();
		$result= $userDAO->actualizarUsuario($id, $nombres, $apellidos, $nick, $pass, $addUser, $editUser, $listUser, $deleteUser, $actaNueva, $actaAntigua, $editActa, $deleteActa, $sexo, $nacimiento, $tipoid, $documento, $telefono, $email, $cargo);
		return $result;

        
	}
	public function eliminarUsuario($id){
		$userDAO= new User_DAO();
		$result= $userDAO->eliminarUsuario($id);
		return $result;
	}

}

