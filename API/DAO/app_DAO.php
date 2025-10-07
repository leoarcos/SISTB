<?php

include '../db/Database.php';

class app_DAO {

    function __construct() {
        
    }

  
    public function consultaIndependiente($sql){
        $instance = Database::getInstance();
        if ($instance == NULL) {
            $db = new Database();
            $instance = $db->getInstance();
        }

        //
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
    public function listarMunicipios(){
        $instance = Database::getInstance();
        if ($instance == NULL) {
            $db = new Database();
            $instance = $db->getInstance();
        }

        $sqlLogIn = "SELECT mnp.*, dep.nombre FROM municipio mnp, departamento dep WHERE dep.iddepartamento=mnp.departamento_iddepartamento and departamento_iddepartamento='22'";
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
    public function validarNick($nick){
        $instance = Database::getInstance();
        if ($instance == NULL) {
            $db = new Database();
            $instance = $db->getInstance();
        }

        $sqlLogIn = "SELECT nick_user from usuarios WHERE nick_user='$nick'";
        $result = array();
        $res = $instance->get_data($sqlLogIn);
        if ($res['DATA'] ) {
           
            $result['DATA'] = $res['DATA'];

            $result['STATUS'] = 'OK';
        } else {
            $result['DATA']='ERROR';
            $result['STATUS'] = 'ERROR';
        }
        return $result;
        

    }
    function listarIps(){
        $instance = Database::getInstance();
        if ($instance == NULL) {
            $db = new Database();
            $instance = $db->getInstance();
        }

        $sqlLogIn = "select * from ipss order by nombre asc";
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
   
    function listarPaises(){
        $instance = Database::getInstance();
        if ($instance == NULL) {
            $db = new Database();
            $instance = $db->getInstance();
        }

        $sqlLogIn = "select DISTINCT(nombre) from pais order by nombre asc";
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
    function listarDptosColombia(){
        $instance = Database::getInstance();
        if ($instance == NULL) {
            $db = new Database();
            $instance = $db->getInstance();
        }

        $sqlLogIn = "select DISTINCT(nombredepartamento)     FROM departamentomunicipio ORDER BY nombredepartamento ASC";
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
    function listarMnposD($dpto){
        $instance = Database::getInstance();
        if ($instance == NULL) {
            $db = new Database();
            $instance = $db->getInstance();
        }

        $sqlLogIn = "select distinct nombremunicipio from departamentomunicipio where nombredepartamento='".$dpto."' order by nombremunicipio asc";
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
    function listarEtnia(){
        $instance = Database::getInstance();
        if ($instance == NULL) {
            $db = new Database();
            $instance = $db->getInstance();
        }

        $sqlLogIn = "select DISTINCT(nombre) from puebloindigena WHERE NOMBRE!='NO APLICA' AND NOMBRE!='U‘WA - TUNEBO ' AND NOMBRE!='BARA' ORDER BY NOMBRE ASC";
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
    function listarAsentamiento($municipio){
        $instance = Database::getInstance();
        if ($instance == NULL) {
            $db = new Database();
            $instance = $db->getInstance();
        }

        $sqlLogIn = "select * from asentamiento where municipio='".$municipio."' order by nombre asc";
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
    function listarBarrios($municipio){
        $instance = Database::getInstance();
        if ($instance == NULL) {
            $db = new Database();
            $instance = $db->getInstance();
        }

        $sqlLogIn = "SELECT * FROM BARRIOSCOMUNAS WHERE MUNICIPIO='".$municipio."' AND BARRIO NOT LIKE '%VEREDA%' AND BARRIO NOT LIKE '%CORREGIMIENTO%'";
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
    function listarComuna($muni, $sector){
        $instance = Database::getInstance();
        if ($instance == NULL) {
            $db = new Database();
            $instance = $db->getInstance();
        }

        $sqlLogIn = "SELECT DISTINCT(comuna) FROM BARRIOSCOMUNAS WHERE MUNICIPIO='".$muni."' AND BARRIO='".$sector."' ";
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
    function listarVereda($muni){
        $instance = Database::getInstance();
        if ($instance == NULL) {
            $db = new Database();
            $instance = $db->getInstance();
        }

        $sqlLogIn = "SELECT * FROM BARRIOSCOMUNAS WHERE MUNICIPIO='".$muni."' AND BARRIO LIKE '%VEREDA%' ";
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
    function listarCorregimiento($muni){
        $instance = Database::getInstance();
        if ($instance == NULL) {
            $db = new Database();
            $instance = $db->getInstance();
        }

        $sqlLogIn = "SELECT * FROM BARRIOSCOMUNAS WHERE MUNICIPIO='".$muni."' AND BARRIO LIKE '%CORREGIMIENTO%' ";
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
    function listarOcupaciones(){
        $instance = Database::getInstance();
        if ($instance == NULL) {
            $db = new Database();
            $instance = $db->getInstance();
        }

        $sqlLogIn = "select * from ocupaciones order by ocupacion asc";
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
    function listarEAPB(){
        $instance = Database::getInstance();
        if ($instance == NULL) {
            $db = new Database();
            $instance = $db->getInstance();
        }

        $sqlLogIn = "select DISTINCT(nombre) from epsars order by nombre asc";
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
    function listarMnpoNorte(){
        $instance = Database::getInstance();
        if ($instance == NULL) {
            $db = new Database();
            $instance = $db->getInstance();
        }

        $sqlLogIn = "select distinct nombremunicipio from departamentomunicipio where nombredepartamento='NORTE DE SANTANDER' order by nombremunicipio asc";
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
    function listarRegimen(){
        $instance = Database::getInstance();
        if ($instance == NULL) {
            $db = new Database();
            $instance = $db->getInstance();
        }

        $sqlLogIn = "select DISTINCT(nombre) from regimen";
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
   

    function listarTipoPulmonar(){
        $instance = Database::getInstance();
        if ($instance == NULL) {
            $db = new Database();
            $instance = $db->getInstance();
        }

        $sqlLogIn = "select DISTINCT(nombre) from tipotb where base=1  order by nombre asc";
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
    function listarTipoExtraPulmonar(){
        $instance = Database::getInstance();
        if ($instance == NULL) {
            $db = new Database();
            $instance = $db->getInstance();
        }

        $sqlLogIn = "select DISTINCT(nombre) from tipotb where base=2 order by nombre asc";
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
    function listarCondicionIngreso(){
        $instance = Database::getInstance();
        if ($instance == NULL) {
            $db = new Database();
            $instance = $db->getInstance();
        }

        $sqlLogIn = "select DISTINCT(nombre) from condicioningresol";
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

    function listarCoormobilidad(){
        $instance = Database::getInstance();
        if ($instance == NULL) {
            $db = new Database();
            $instance = $db->getInstance();
        }

        $sqlLogIn = "select DISTINCT(nombre) from patologiaasociada";
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
    function numeroConsecutivo($ano){
        $instance = Database::getInstance();
        if ($instance == NULL) {
            $db = new Database();
            $instance = $db->getInstance();
        }

        $sqlLogIn = "select num from libroderegistro WHERE ano='".$ano."' order by num desc limit 1";
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
    function otroCriterioMedicoDiagnostico(){
        $instance = Database::getInstance();
        if ($instance == NULL) {
            $db = new Database();
            $instance = $db->getInstance();
        }

        $sqlLogIn = "select * from otroscriteriosmediosdiagnostico";
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
    function listarPruebaSusceptibilidadF(){
        $instance = Database::getInstance();
        if ($instance == NULL) {
            $db = new Database();
            $instance = $db->getInstance();
        }

        $sqlLogIn = "select * from pruebadesusceptibilidadafarmacos";
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
    function resultadodepsf(){
        $instance = Database::getInstance();
        if ($instance == NULL) {
            $db = new Database();
            $instance = $db->getInstance();
        }

        $sqlLogIn = "select * from resultadopsf";
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
    function listarGPoblacional(){
        $instance = Database::getInstance();
        if ($instance == NULL) {
            $db = new Database();
            $instance = $db->getInstance();
        }

        $sqlLogIn = "select * from grupopoblacional";
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
   
   
}
