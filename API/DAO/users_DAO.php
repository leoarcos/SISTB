<?php

include '../db/Database.php';

class User_DAO {

    function __construct() {
        
    }

  
    public function logIn($nick, $pass) {
        $instance = Database::getInstance();
        if ($instance == NULL) {
            $db = new Database();
            $instance = $db->getInstance();
        }

        $sqlLogIn = "SELECT usr.*, per.*  FROM usuario usr, usuariopermiso per WHERE usr.nombreusuario='$nick' and usr.contrasena='$pass' and per.identificacion=usr.identificacion";
         
        $result = array();
        $res = $instance->get_data($sqlLogIn);
        if ($res['DATA'] ) {
           
            $result['DATA'] = $res['DATA'];

            $result['STATUS'] = 'OK';
        } else {
            $result['STATUS'] = 'ERROR';
        }
        return $result;
        
    }

    public function listarUsuarios(){
        $instance = Database::getInstance();
        if ($instance == NULL) {
            $db = new Database();
            $instance = $db->getInstance();
        }

        $sqlLogIn = "SELECT * FROM usuario";
        $result = array();
        $res = $instance->get_data($sqlLogIn);
        if ($res['DATA'] ) {
           
            $result['DATA'] = $res['DATA'];

            $result['STATUS'] = 'OK';
        } else {
            $result['STATUS'] = 'ERROR';
        }
        return $result;
        

    }
    public function ingresarUsuario($nombres, $apellidos, $nick, $pass, $addUser, $editUser, $listUser, $deleteUser, $actaNueva, $actaAntigua, $editActa, $deleteActa, $sexo, $nacimiento, $tipoid, $documento, $telefono, $email, $cargo){

        $instance = Database::getInstance();
        if ($instance == NULL) {
            $db = new Database();
            $instance = $db->getInstance();
        }

        $sqlLogIn = "INSERT INTO usuarios(nombres_user, apellidos_user, nick_user, pass_user, addUser, editUser, listUser, deleteUser, actaNueva, actaAntigua, editActa, deleteActa, sexo, nacimiento, tipoid, documento, telefono, email, cargo)
                        VALUES ('$nombres', '$apellidos', '$nick', '$pass', '$addUser', '$editUser', '$listUser', '$deleteUser', '$actaNueva', '$actaAntigua', '$editActa', '$deleteActa', '$sexo', '$nacimiento', '$tipoid', '$documento', '$telefono', '$email', '$cargo');";
        $result = array();
        $res = $instance->exec($sqlLogIn);
        if ($res['STATUS'] ) {
           
            

            $result['STATUS'] = 'OK';
        } else {
            $result['STATUS'] = 'ERROR';
        }
        return $result;
        
        

    }
    public function actualizarUsuario($id, $nombres, $apellidos, $nick, $pass, $addUser, $editUser, $listUser, $deleteUser, $actaNueva, $actaAntigua, $editActa, $deleteActa, $sexo, $nacimiento, $tipoid, $documento, $telefono, $email, $cargo){

        $instance = Database::getInstance();
        if ($instance == NULL) {
            $db = new Database();
            $instance = $db->getInstance();
        }

        $sqlLogIn = "UPDATE usuarios
                        SET  nombres_user='$nombres', apellidos_user='$apellidos', nick_user='$nick', pass_user='$pass', 
                            adduser='$addUser', edituser='$editUser', listuser='$listUser', deleteuser='$deleteUser', actanueva='$actaNueva', 
                            actaantigua='$actaAntigua', editacta='$editActa', deleteacta='$deleteActa', sexo='$sexo', nacimiento='$nacimiento', 
                            tipoid='$tipoid', documento='$documento', telefono='$telefono', email='$email', cargo='$cargo'
                        WHERE id_user=$id;";
        $result = array();
        $res = $instance->exec($sqlLogIn);
        if ($res['STATUS'] ) {
           
            

            $result['STATUS'] = 'OK';
        } else {
            $result['STATUS'] = 'ERROR';
        }
        return $result;
        
        

    }
    public function eliminarUsuario($id){

        $instance = Database::getInstance();
        if ($instance == NULL) {
            $db = new Database();
            $instance = $db->getInstance();
        }

        $sqlLogIn = "DELETE FROM usuarios WHERE id_user=$id";
        $result = array();
        $res = $instance->exec($sqlLogIn);
        if ($res['STATUS'] ) {
           
            

            $result['STATUS'] = 'OK';
        } else {
            $result['STATUS'] = 'ERROR';
        }
        return $result;
        
        

    }
   
}
