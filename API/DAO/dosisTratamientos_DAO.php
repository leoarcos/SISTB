<?php

include '../db/Database.php';

class tratamientoDosis_DAO {

    function __construct() {
        
    }

  
    public function listarTratamientoDosisPrimeraFase($num, $id) {
        $instance = Database::getInstance();
        if ($instance == NULL) {
            $db = new Database();
            $instance = $db->getInstance();
        }

        $sql = "select * from primerafase where num='".$num."' and identificacion='".$id."' order by dosis asc";
        
        $result = array();
        $res = $instance->get_data($sql);
        if ($res['STATUS'] ) {
           
            $result['DATA'] = $res['DATA'];

            $result['STATUS'] = 'OK';
        } else {
            $result['STATUS'] = 'ERROR';
        }
        return $result;
        
    }
    public function listarTratamientoDosisSegundaFase($num, $id) {
        $instance = Database::getInstance();
        if ($instance == NULL) {
            $db = new Database();
            $instance = $db->getInstance();
        }

        $sql = "select * from segundafase where num='".$num."' and identificacion='".$id."' order by dosis asc";
        
        $result = array();
        $res = $instance->get_data($sql); 
        if ($res['STATUS'] ) {
           
            $result['DATA'] = $res['DATA'];

            $result['STATUS'] = 'OK';
        } else {
            $result['STATUS'] = 'ERROR';
        }
        return $result;
        
    }
    public function listarCantidadDosis($num, $id, $fase) {
        $instance = Database::getInstance();
        if ($instance == NULL) {
            $db = new Database();
            $instance = $db->getInstance();
        }

        $sql = "select count(*) as cantidad from ".$fase." where num='".$num."' and identificacion='".$id."'";
        
        $result = array();
        $res = $instance->get_data($sql);
        if ($res['DATA'] ) {
           
            $result['DATA'] = $res['DATA'];

            $result['STATUS'] = 'OK';
        } else {
            $result['STATUS'] = 'ERROR';
        }
        return $result;
        
    }
    public function verificar($num, $ano, $id, $mes, $dia, $fase) {
        $instance = Database::getInstance();
        if ($instance == NULL) {
            $db = new Database();
            $instance = $db->getInstance();
        }

        $sql = "select * from ".$fase." where num='".$num."' and identificacion='".$id."' and ano='".$ano."' and mes='".$mes."' and dia='".intVal($dia)."'";
        
        $result = array();
        $res = $instance->get_data($sql);
        if ($res['STATUS'] ) {
            $result['DATA'] = $res['DATA'];
            
 
            $result['STATUS'] = 'OK';
        } else {
            $result['STATUS'] = 'ERROR';
        }
        return $result;
        
    }
    public function registrarDosisTto($num, $ano, $id, $mes, $dia, $fase, $dosis) {
        $instance = Database::getInstance();
        if ($instance == NULL) {
            $db = new Database();
            $instance = $db->getInstance();
        }

        $sql = "INSERT INTO ".$fase." (ano, num, identificacion, mes, dia, dosis) VALUES ('".$ano."', '".$num."', '".$id."', '".$mes."', '".$dia."', ".$dosis.");";
        
        $result = array();
        $res = $instance->exec($sql); 
       if ($res['STATUS'] ) {
          
           

           $result['STATUS'] = 'OK';
       } else {
           $result['STATUS'] = 'ERROR';
       }
       return $result;
        
    }
    public function eliminarDosisTto($num, $ano, $id, $mes, $dia, $fase, $dosis) {
        $instance = Database::getInstance();
        if ($instance == NULL) {
            $db = new Database();
            $instance = $db->getInstance();
        }

        $sql = "DELETE FROM ".$fase." WHERE ano='".$ano."' and num='".$num."' and identificacion='".$id."' and mes='".$mes."' and dia='".$dia."' ";
        
        $result = array();
        $res = $instance->exec($sql); 
        if ($res['STATUS'] ) {
           
            
 
            $result['STATUS'] = 'OK';
        } else {
            $result['STATUS'] = 'ERROR';
        }
        return $result;
        
    }

}
?>