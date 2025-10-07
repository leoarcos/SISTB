<?php

include '../db/Database.php';

class adicionales_DAO {

    function __construct() {
        
    }

  
    public function listarIpsNuevos(){
        $instance = Database::getInstance();
        if ($instance == NULL) {
            $db = new Database();
            $instance = $db->getInstance();
        }

        //
        $sql="SELECT * FROM ipsnuevas2019";
        $result = array();
        $res = $instance->get_data($sql);
         
        if ($res['STATUS']=='OK' ) {
           
            $result['DATA'] = $res['DATA'];

            $result['STATUS'] = 'OK';
        } else {
            $result['STATUS'] = 'ERROR';
        }
        return $result;
        

    }
    public function registrarIpsNuevos($name){
        $instance = Database::getInstance();
        if ($instance == NULL) {
            $db = new Database();
            $instance = $db->getInstance();
        }

        //
        $sql="INSERT INTO ipsnuevas2019(nombre) VALUES ('".$name."')";
        $result = array();
        $res = $instance->exec($sql);
         
        if ($res['STATUS']=='OK' ) {
           
            $result['DATA'] = $res['DATA'];

            $result['STATUS'] = 'OK';
        } else {
            $result['STATUS'] = 'ERROR';
        }
        return $result;
        

    }
    public function borrarIpsNuevos($name){
        $instance = Database::getInstance();
        if ($instance == NULL) {
            $db = new Database();
            $instance = $db->getInstance();
        }

        //
        $sql="DELETE FROM ipsnuevas2019 WHERE nombre='".$name."'";
        $result = array();
        $res = $instance->exec($sql);
         
        if ($res['STATUS']=='OK' ) {
           
            $result['DATA'] = $res['DATA'];

            $result['STATUS'] = 'OK';
        } else {
            $result['STATUS'] = 'ERROR';
        }
        return $result;
        

    }
   
   
}
