<?php

include '../db/Database.php';

class resistenteFarmacos_DAO {

    function __construct() {
        
    }

  
    public function listarPacientes() {
        $instance = Database::getInstance();
        if ($instance == NULL) {
            $db = new Database();
            $instance = $db->getInstance();
        }

        $sql = "select * from resistentefarmacos order by num desc";
        
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
    public function registrarFarmacoResistente($datos){
        $instance = Database::getInstance();
        if ($instance == NULL) {
            $db = new Database();
            $instance = $db->getInstance();
        }
        //125
        $sql = "INSERT INTO resistentefarmacos VALUES (".intval($datos['numero']).", '".$datos['tipocaso']."', '".$datos['ano']."', '".$datos['ingresatto']."', '".$datos['fechaIngresoTto']."', '".$datos['nombresyapellidos']."', '".$datos['tipoid']."', '".$datos['numeroid']."', '".$datos['sexo']."', '".$datos['edad']."', '".$datos['uedad']."', '".$datos['dpto']."', '".$datos['Municipio']."', '".$datos['zona']."', '".$datos['direccion']."', '".$datos['barrio']."', '".$datos['telefono']."', '".$datos['regimen']."', '".$datos['EAPB']."', '".$datos['grupoPoblacional']."', '".$datos['etnia']."', '".$datos['peubloIndigena']."', '".$datos['ocupacion']."', '".$datos['factores']."', '".$datos['coomorbilidad']."', '".$datos['realizaAPV']."', '".$datos['coinfeccionTBVIH']."', '".$datos['recibeTAR']."', '".$datos['recibetmtprin']."', '".$datos['tipotb']."', '".$datos['Localizacion']."', '".$datos['medicamentos2daLinea']."', '".$datos['Condicioni']."', '".$datos['fechapsf']."', '".$datos['metodologiUti']."', '".$datos['medica1']."', '".$datos['medica2']."', '".$datos['medica3']."', '".$datos['medica4']."', '".$datos['medica5']."', '".$datos['medica6']."', '".$datos['medica7']."', '".$datos['medica8']."', '".$datos['medica9']."', '".$datos['medica12']."', '".$datos['medica14']."', '".$datos['medica15']."', '".$datos['medica10']."', '".$datos['medica11']."', '".$datos['medica13']."', '".$datos['medica16']."', '".$datos['medica17']."', '".$datos['medica18']."', '".$datos['tipoRes']."', '".$datos['resistenciaa']."', '".$datos['semananaconfirmCaso']."', '".$datos['ipsdiagnosticaEs']."', '".$datos['ipssegumiento']."', '".$datos['espcmedica']."', '".$datos['numttprevios']."', '".$datos['antecettosiglas']."', '".$datos['tiesqttoactual']."', '".$datos['inicial']."', '".$datos['ajustetto1']."', '".$datos['ajustetto2']."', '".$datos['tenidointerrupciones']."', '".$datos['diasInterrupcion']."', '".$datos['causaInterrupcio']."', '".$datos['rquehospit']."', '".$datos['causaHospita']."', '".$datos['condicionactual']."', '".$datos['fechaactualizac']."', '".$datos['condicionegreso']."', '".$datos['fechaEgreso']."', '".$datos['obervacio']."', '".$datos['responsdiligencia']."', '".$datos['importMSPS']."', '".$datos['observacionesINS']."', '".$datos['listadoMSPS']."', '".$datos['sivigila']."', '', '".$datos['messeguBact']."', '".$datos['cultivo']."', '".$datos['fechacultivo']."', '".$datos['bkresistente']."', '".$datos['fechabkresistente']."', '".$datos['fecharesultadopsf']."', '".$datos['metodologiapsf']."', '".$datos['medica27']."', '".$datos['medica28']."', '".$datos['medica29']."', '".$datos['medica30']."', '".$datos['medica31']."', '".$datos['medica32']."', '".$datos['medica33']."', '".$datos['medica34']."', '".$datos['medica35']."', '".$datos['medica36']."', '".$datos['medica37']."', '".$datos['medica38']."', '".$datos['medica39']."', '".$datos['medica40']."', '".$datos['medica41']."', '".$datos['medica42']."', '".$datos['medica43']."', '".$datos['medica44']."', '".$datos['medica45']."', '".$datos['medica46']."', '".$datos['observacionessegubact']."', '".$datos['realizoprueba']."', '".$datos['resultadoprueba']."', '".$datos['fechaRealizacionPrueba']."', '".$datos['preubaconfirmatoria']."', '".$datos['fechaRealizacionDx']."', '".$datos['medica19']."', '".$datos['medica20']."', '".$datos['medica21']."', '".$datos['medica22']."', '".$datos['medica23']."', '".$datos['medica24']."', '".$datos['medica25']."', '".$datos['medica26']."', '".$datos['fechaconversnega']."', '".$datos['fechareverspost']."', '".$datos['resistenciaa']."')";
         
        $result = array();
        $res = $instance->exec($sql);
        
        if ($res['STATUS'] ) {
           
            $result['STATUS'] = 'OK';
        } else {
            $result['STATUS'] = 'ERROR';
        }
        return $result;
    }
    
    public function buscarPacienteId($tipoid, $id){
        $instance = Database::getInstance();
        if ($instance == NULL) {
            $db = new Database();
            $instance = $db->getInstance();
        }

        $sql = "select * from resistentefarmacos where numeroidentificacion='".$$id."' and tipoidentificacion='".$$tipoid."' order by num asc";
        
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
    public function generarConsecutivo(){
        $instance = Database::getInstance();
        if ($instance == NULL) {
            $db = new Database();
            $instance = $db->getInstance();
        }

        $sql = "select MAX(num) as num from resistentefarmacos ";
        
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

    public function eliminarResistente($num, $id){
        $instance = Database::getInstance();
        if ($instance == NULL) {
            $db = new Database();
            $instance = $db->getInstance();
        } 
        
        $sql = "DELETE FROM resistentefarmacos WHERE num='".$num."' and numeroidentificacion='".$id."'";
      
         
        $result = array();
        $res = $instance->exec($sql);
        
        if ($res['STATUS'] ) {
            
            $result['STATUS'] = 'OK';
        } else {
            $result['STATUS'] = 'ERROR';
        }
        return $result;
    }
    public function registrarSeguimientoBacteriologico($datos){
        $instance = Database::getInstance();
        if ($instance == NULL) {
            $db = new Database();
            $instance = $db->getInstance();
        }

        $sql = "INSERT INTO seguimientobacteriologico VALUES (".intval($datos['numero']).",'".$datos['ano']."','".$datos['numeroid']."','".$datos['messeguBact']."','".$datos['cultivo']."','".$datos['fechacultivo']."','".$datos['bkresistente']."','".$datos['fechabkresistente']."','".$datos['fecharesultadopsf']."','".$datos['metodologiapsf']."','".$datos['medica27']."','".$datos['medica28']."','".$datos['medica29']."','".$datos['medica30']."','".$datos['medica31']."','".$datos['medica32']."','".$datos['medica33']."','".$datos['medica34']."','".$datos['medica35']."','".$datos['medica38']."','".$datos['medica40']."','".$datos['medica41']."','".$datos['medica36']."','".$datos['medica37']."','".$datos['medica39']."','".$datos['medica42']."','".$datos['medica43']."','".$datos['medica44']."','".$datos['medica45']."','".$datos['medica46']."','".$datos['observacionessegubact']."')";
        
        $result = array();
        $res = $instance->exec($sql);
        if ($res['STATUS'] ) {
           
            $result['STATUS'] = 'OK';

        } else {
            $result['STATUS'] = 'ERROR';
        }
        return $result;
        
    }

    
    public function listarSeguimientosBacteriologicos($num){
        $instance = Database::getInstance();
        if ($instance == NULL) {
            $db = new Database();
            $instance = $db->getInstance();
        }

        $sql = "select * from seguimientobacteriologico WHERE num=".$num." order by num desc";
        
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

    public function ActualizarResistente($datos){
        $instance = Database::getInstance();
        if ($instance == NULL) {
            $db = new Database();
            $instance = $db->getInstance();
        }
        //125
        $sql = "UPDATE resistentefarmacos SET tipocaso='".$datos['tipocaso']."', anoconfirmacioncaso='".$datos['ano']."', ingresatratamiento='".$datos['ingresatto']."', fechaingresotratamientomedicamentosegundalinea='".$datos['fechaIngresoTto']."', nombresyapellidos='".$datos['nombresyapellidos']."', tipoidentificacion='".$datos['tipoid']."', numeroidentificacion='".$datos['numeroid']."', sexo='".$datos['sexo']."', edad='".$datos['edad']."', unidadmedidaedad='".$datos['uedad']."', entidadterritorial='".$datos['dpto']."', municipio='".$datos['Municipio']."', zona='".$datos['zona']."', direccion='".$datos['direccion']."', barrio='".$datos['barrio']."', telefono='".$datos['telefono']."', regimenafiliacion='".$datos['regimen']."', aseguradora='".$datos['EAPB']."', grupopoblacional='".$datos['grupoPoblacional']."', grupoetnico='".$datos['etnia']."', puebloindigena='".$datos['peubloIndigena']."', ocupacion='".$datos['ocupacion']."', factoresderiesgocondicionesespeciales='".$datos['factores']."', coomorbilidades='".$datos['coomorbilidad']."', asesoriapruebavoluntariavih='".$datos['realizaAPV']."', coinfecciontbvih='".$datos['coinfeccionTBVIH']."', recibetratamientoantirretroviral='".$datos['recibeTAR']."', terapiapreventivatmpsmxcotrimoxazol='".$datos['recibetmtprin']."', tipotoberculosis='".$datos['tipotb']."', localizaciondelaformaestrapulmorar='".$datos['Localizacion']."', condiciondeingresosegunantecedentesmedicamentorecibido='".$datos['medicamentos2daLinea']."', condicioningreso='".$datos['Condicioni']."', fechaderesultadodelapsf='".$datos['fechapsf']."', metodologiautilizada='".$datos['metodologiUti']."', s1wg='".$datos['medica1']."', s4wg='".$datos['medica2']."', h01wg='".$datos['medica3']."', h04wg='".$datos['medica4']."', r='".$datos['medica5']."', e5wg='".$datos['medica6']."', e75wg='".$datos['medica7']."', z='".$datos['medica8']."', km='".$datos['medica9']."', am='".$datos['medica12']."', cm='".$datos['medica14']."', ofx='".$datos['medica15']."', lfx='".$datos['medica10']."', mfx='".$datos['medica11']."', eto='".$datos['medica13']."', cs='".$datos['medica16']."', otra1='".$datos['medica17']."', otra2='".$datos['medica18']."', clasificaciondelaresistencia='".$datos['tipoRes']."', resistenciaa='".$datos['resistenciaa']."', semanaconfirmaciondecaso='".$datos['semananaconfirmCaso']."', ipsmanejoambulatorio='".$datos['ipsdiagnosticaEs']."', ipsmanejoespecializado='".$datos['ipssegumiento']."', especialidadmedicaqueatiende='".$datos['espcmedica']."', numerotratamientosrecibidos='".$datos['numttprevios']."', antecedentetratamientoensiglascondicioningresoano='".$datos['antecettosiglas']."', tipoesquematratamientoactual='".$datos['tiesqttoactual']."', inicial='".$datos['inicial']."', ajustetratamiento1='".$datos['ajustetto1']."', ajustetratamiento2='".$datos['ajustetto2']."', hatenidointeruupciones='".$datos['tenidointerrupciones']."', diasdeinterupcion='".$datos['diasInterrupcion']."', causa='".$datos['causaInterrupcio']."', requiriohospitalizacion='".$datos['rquehospit']."', causasdehospitalizacion='".$datos['causaHospita']."', condicionactual='".$datos['condicionactual']."', fechadeactualizacion='".$datos['fechaactualizac']."', causadeegreso='".$datos['condicionegreso']."', fechadeegreso='".$datos['fechaEgreso']."', observaciones='".$datos['obervacio']."', responsabledeldilegenciamiento='".$datos['responsdiligencia']."', importantemsps='".$datos['importMSPS']."', mes='".$datos['messeguBact']."', cultivo='".$datos['cultivo']."', fechacultivo='".$datos['fechacultivo']."', bk='".$datos['bkresistente']."', fechabk='".$datos['fechabkresistente']."', fecharesultadopsf2='".$datos['fecharesultadopsf']."', metodologia2='".$datos['metodologiapsf']."', s1wg2='".$datos['medica27']."', s4wg2='".$datos['medica28']."', h01wg2='".$datos['medica29']."', h04wg2='".$datos['medica30']."', r2='".$datos['medica31']."', e5wg2='".$datos['medica32']."', e75wg2='".$datos['medica33']."', z2='".$datos['medica34']."', km2='".$datos['medica35']."', lfx2='".$datos['medica36']."', mfx2='".$datos['medica37']."', am2='".$datos['medica38']."', eto2='".$datos['medica39']."', cm2='".$datos['medica40']."', ofx2='".$datos['medica41']."', cs2='".$datos['medica42']."', otra21='".$datos['medica43']."', otra22='".$datos['medica44']."', otra23='".$datos['medica45']."', otra24='".$datos['medica46']."', observacionessegimiento='".$datos['observacionessegubact']."', serealizoprueba='".$datos['realizoprueba']."', resultadoprueba='".$datos['resultadoprueba']."', fecharealizacion='".$datos['fechaRealizacionPrueba']."', pruebaconfirmatoriaacordealanorma='".$datos['preubaconfirmatoria']."', fecharealizaciondxpreviooactual='".$datos['fechaRealizacionDx']."', pas='".$datos['medica19']."', cfz='".$datos['medica20']."', lzd='".$datos['medica21']."', amxclv='".$datos['medica22']."', lpm='".$datos['medica23']."', mz='".$datos['medica24']."', clr='".$datos['medica25']."', rfb='".$datos['medica26']."', fechaconversionnegativa='".$datos['fechaconversnega']."', fechadereversionpositiva='".$datos['fechareverspost']."', resistentea='".$datos['resistenciaa']."' WHERE num=".intVal($datos['numero'])."";
         
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