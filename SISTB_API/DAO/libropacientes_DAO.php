<?php



include '../db/Database.php';



class libropacientes_DAO {



    function __construct() {

        

    }

 

    public function numeroConsecutivo($data){

          
        $instance = Database::getInstance();

        if ($instance == NULL) {

            $db = new Database();

            $instance = $db->getInstance();

        }

        if(strtoupper(hash("SHA256",$data->key))==$instance->key){

            $val=new libropacientes_DAO;

            

            if($val->validarToken($data)) {

           

                $sql = "select num from libroderegistro WHERE ano=:ano order by num desc limit 1"; 

            

                $dbh=$instance->_connection;



                $stmt = $dbh->prepare($sql);

                // Especificamos el fetch mode antes de llamar a fetch()

                $stmt->setFetchMode(PDO::FETCH_ASSOC);

                $dataIn=array(

                    ":ano" => $data->data->ano
    
                );
                try { 

                    $stmt->execute($dataIn);

                    if ($stmt){$result['STATUS'] = "OK"; }

                } catch (PDOException $errr) { 

                    $result['ERROR'] = $errr->getMessage();

                } 

                while ($row = $stmt->fetch()){

                     
                    $result['DATA'][] = $row; 

                }

                if(!isset($result['DATA'])){

                    $result['ERROR']=$dbh->errorInfo();

                }

            }else{

                $result['STATUS'] = 'ERROR';

                $result['ERROR'] = 'Token incorrecto';

            }

        }else{

            $result['STATUS'] = 'ERROR';

            $result['ERROR'] = 'Llaves incorrectas';

        }

       

        

        return $result;

        



    } 

    
 
    public function registrarLibroPacientes($data){

        $instance = Database::getInstance();
        if ($instance == NULL) {
            $db = new Database();
            $instance = $db->getInstance();
        }

        // Validación de llave
        if (strtoupper(hash("SHA256", $data->key)) != $instance->key) {
            return [
                "STATUS" => "ERROR",
                "ERROR"  => "Llaves incorrectas"
            ];
        }

        $val = new libropacientes_DAO;

        // Validación de token
        if (!$val->validarToken($data)) {
            return [
                "STATUS" => "ERROR",
                "ERROR"  => "Token incorrecto"
            ];
        }

        $dbh = $instance->_connection;

        // 1️⃣ Validación de existencia previa
        $checkSql = "SELECT COUNT(*) FROM libroderegistro 
                    WHERE nombresyapellidos = :nombresyapellidos
                    AND ano = :ano
                    AND fechaingreso = :fechaingreso
                    AND identificacion = :identificacion
                    AND tipoidentificacion = :tipoidentificacion";

        $checkStmt = $dbh->prepare($checkSql);
        $checkStmt->execute([
            ":nombresyapellidos" => $data->data->nombres ?? null,
            ":ano" => $data->data->ano ?? null,
            ":fechaingreso" => $data->data->fechaTAES ?? null,
            ":identificacion" => $data->data->id ?? null,
            ":tipoidentificacion" => $data->data->tipoId ?? null
        ]);

        $exists = $checkStmt->fetchColumn();

        if ($exists > 0) {
            return [
                "STATUS" => "ERROR",
                "ERROR"  => "OJO!..Ya existe un registro previo con los mismos datos de identificación y fecha de diagnostico!"
            ];
        }

        // 2️⃣ Insertar registro
        $sql = "INSERT INTO libroderegistro (id,
                    num, fechaingreso, trimestre, nombresyapellidos, identificacion, etnia,
                    municipio, direccion, regimen, epsars, sexo, edad, tipotb,
                    condicioningreso, fdrbfecha, fdrbreporte, fdrcfecha, fdrcreporte,
                    coinfeccionvihconsejeria, coinfeccionvihwb, condicionegreso, observaciones,
                    ano, controltratamiento2, controltratamiento4, controltratamiento6, bk9mes,
                    ocupacion, ubicaciongeografica, ipsinicia, ipscontinua,
                    otrocriteriomediodiagnostico, patologiaasociada,
                    periodoepidepertenece, semanaepidepertenece,
                    fechareportepsf, resistentea, vihtarv, sivigilaprograma,
                    fechadiagnostico, tipoidentificacion, puebloindigena, grupopoblacional,
                    entidadterritorial, sector, telefono, tipomuestra, sectores,
                    peso, talla, comuna,
                    pruebatamisaje, diagnosticopreviovih, recibetratamientopreventivo,
                    existecoinfecciontbvih, pais, municipionotifica, fechainiciodesintomas,
                    fechaconfirmatoriawb, ingresaatratamiento, pruebamolecular,
                    fechapruebamolecular, pruebadesusceptibilidadafarmacos, fechadeegreso,
                    cultivoalfinaltratamiento, fechacultivoalfinaltratamiento, fechadereportevih,
                    fechainiciotaes, fechabk2, fechabk4, fechabk6, fechabk9,
                    controlmedico2mes, fechacontrolmedico2mes, observacionescontrolmedico2mes,
                    controlmedico4mes, fechacontrolmedico4mes, observacionescontrolmedico4mes,
                    controlmedico6mes, fechacontrolmedico6mes, observacionescontrolmedico6mes,
                    controlenfermeria1mes, fechacontrolenfermeria1mes, observacionescontrolenfermeria1mes,
                    controlenfermeria3mes, fechacontrolenfermeria3mes, observacionescontrolenfermeria3mes,
                    controlenfermeria5mes, fechacontrolenfermeria5mes, observacionescontrolenfermeria5mes,
                    tipoconfimacionbacteriologica, fechafintratamiento,
                    observacionesfechafintratamiento, serealizoprueba, resultbkfinal,
                    id_user_registra
                )
                VALUES (
                    nextval('libroderegistro_id_seq'::regclass),
                    (SELECT COALESCE(MAX(num),0)+1 FROM libroderegistro WHERE ano = :ano),
                    :fechaingreso, :trimestre, :nombresyapellidos, :identificacion, :etnia,
                    :municipio, :direccion, :regimen, :epsars, :sexo, :edad, :tipotb,
                    :condicioningreso, :fdrbfecha, :fdrbreporte, :fdrcfecha, :fdrcreporte,
                    :coinfeccionvihconsejeria, :coinfeccionvihwb, :condicionegreso, :observaciones,
                    :ano, :controltratamiento2, :controltratamiento4, :controltratamiento6, :bk9mes,
                    :ocupacion, :ubicaciongeografica, :ipsinicia, :ipscontinua,
                    :otrocriteriomediodiagnostico, :patologiaasociada,
                    :periodoepidepertenece, :semanaepidepertenece,
                    :fechareportepsf, :resistentea, :vihtarv, :sivigilaprograma,
                    :fechadiagnostico, :tipoidentificacion, :puebloindigena, :grupopoblacional,
                    :entidadterritorial, :sector, :telefono, :tipomuestra, :sectores,
                    :peso, :talla, :comuna,
                    :pruebatamisaje, :diagnosticopreviovih, :recibetratamientopreventivo,
                    :existecoinfecciontbvih, :pais, :municipionotifica, :fechainiciodesintomas,
                    :fechaconfirmatoriawb, :ingresaatratamiento, :pruebamolecular,
                    :fechapruebamolecular, :pruebadesusceptibilidadafarmacos, :fechadeegreso,
                    :cultivoalfinaltratamiento, :fechacultivoalfinaltratamiento, :fechadereportevih,
                    :fechainiciotaes, :fechabk2, :fechabk4, :fechabk6, :fechabk9,
                    :controlmedico2mes, :fechacontrolmedico2mes, :observacionescontrolmedico2mes,
                    :controlmedico4mes, :fechacontrolmedico4mes, :observacionescontrolmedico4mes,
                    :controlmedico6mes, :fechacontrolmedico6mes, :observacionescontrolmedico6mes,
                    :controlenfermeria1mes, :fechacontrolenfermeria1mes, :observacionescontrolenfermeria1mes,
                    :controlenfermeria3mes, :fechacontrolenfermeria3mes, :observacionescontrolenfermeria3mes,
                    :controlenfermeria5mes, :fechacontrolenfermeria5mes, :observacionescontrolenfermeria5mes,
                    :tipoconfimacionbacteriologica, :fechafintratamiento,
                    :observacionesfechafintratamiento, :serealizoprueba, :resultbkfinal,
                    :id_user_registra
                );";

        $dataIn = array(
            ":ano" => $data->data->ano ?? null,
                ":fechaingreso" => $data->data->fechaTAES ?? null,
                ":trimestre" => $data->data->trimestre ?? null,
                ":nombresyapellidos" => $data->data->nombres ?? null,
                ":identificacion" => $data->data->id ?? null,
                ":etnia" => $data->data->pertenenciaEtnica ?? null,
                ":municipio" => $data->data->municipioProcedencia ?? null,
                ":direccion" => $data->data->direccion ?? null,
                ":regimen" => $data->data->regimen ?? null,
                ":epsars" => $data->data->EAPB ?? null,
                ":sexo" => $data->data->sexo ?? null,
                ":edad" => $data->data->edad ?? null,
                ":tipotb" => $data->data->localizacionTB ?? null,
                ":condicioningreso" => $data->data->condicionIngreso ?? null,
                ":fdrbfecha" => $data->data->fechaDiagnosticoBK ?? null,
                ":fdrbreporte" => $data->data->DiagnosticoBK ?? null,
                ":fdrcfecha" => $data->data->fechacultivoDiagnostico ?? null,
                ":fdrcreporte" => $data->data->cultivoDiagnostico ?? null,
                ":coinfeccionvihconsejeria" => $data->data->realizoAPVVIH ?? null,
                ":coinfeccionvihwb" => $data->data->PruebaConfirmatoriaAcordeNormaVIH ?? null,
                ":condicionegreso" => $data->data->condicionEgreso ?? null,
                ":observaciones" => $data->data->observacionesDiagnostico ?? null,
                ":controltratamiento2" => $data->data->BK2Mes ?? null,
                ":controltratamiento4" => $data->data->BK4Mes ?? null,
                ":controltratamiento6" => $data->data->BK6Mes ?? null,
                ":bk9mes" => $data->data->BK9Mes ?? null,
                ":ocupacion" => $data->data->ocupacion ?? null,
                ":ubicaciongeografica" => $data->data->ubicacionGeografica ?? null,
                ":ipsinicia" => $data->data->ipsDiagnostica ?? null,
                ":ipscontinua" => $data->data->ipsContinua ?? null,
                ":otrocriteriomediodiagnostico" => $data->data->otroosCriteriosMedicos ?? null,
                ":patologiaasociada" => $data->data->cooomorbilidad ?? null,
                ":periodoepidepertenece" => $data->data->periodoEpidemiologico ?? null,
                ":semanaepidepertenece" => $data->data->semanaEpidemiologica ?? null,
                ":fechareportepsf" => $data->data->fechaReportePSF ?? null,
                ":resistentea" => $data->data->resitenteA ?? null,
                ":vihtarv" => $data->data->recibeTARVIH ?? null,
                ":sivigilaprograma" => $data->data->programasivigila ?? null,
                ":fechadiagnostico" => $data->data->fechaDiagnostico ?? null,
                ":tipoidentificacion" => $data->data->tipoId ?? null,
                ":puebloindigena" => $data->data->puebloIndigena ?? null,
                ":grupopoblacional" => $data->data->grupoPoblacional ?? null,
                ":entidadterritorial" => $data->data->entidadTerritorial ?? null,
                ":sector" => $data->data->sector ?? null,
                ":telefono" => $data->data->telefono ?? null,
                ":tipomuestra" => 'TIPO MUESTRA',
                ":sectores" => $data->data->barrio ?? null,
                ":peso" => $data->data->peso ?? null,
                ":talla" => $data->data->talla ?? null,
                ":comuna" => $data->data->comuna ?? null,
                ":pruebatamisaje" => $data->data->resultadoPruebaVIH ?? null,
                ":diagnosticopreviovih" => $data->data->diagnosticoPrevioVIH ?? null,
                ":recibetratamientopreventivo" => $data->data->recibeTtoPreventivoVIH ?? null,
                ":existecoinfecciontbvih" => $data->data->coinfeccionPrevioVIH ?? null,
                ":pais" => $data->data->Pais ?? null,
                ":municipionotifica" => $data->data->municipioNotifica ?? null,
                ":fechainiciodesintomas" => $data->data->fechaInicioSintomas ?? null,
                ":fechaconfirmatoriawb" => $data->data->fechaDXPrevioActualVIH ?? null,
                ":ingresaatratamiento" => $data->data->ingresaTto ?? null,
                ":pruebamolecular" => $data->data->pruebaMolecular ?? null,
                ":fechapruebamolecular" => $data->data->fechaPruebaMolecular ?? null,
                ":pruebadesusceptibilidadafarmacos" => $data->data->pruebasusceptibilidadFarmacoResitencia ?? null,
                ":fechadeegreso" => $data->data->fechaCondicionEgreso ?? null,
                ":cultivoalfinaltratamiento" => $data->data->cultivoFinalTto ?? null,
                ":fechacultivoalfinaltratamiento" => $data->data->fechaCultivoFinalTto ?? null,
                ":fechadereportevih" => $data->data->FechaReporteVIH ?? null,
                ":fechainiciotaes" => $data->data->fechaTAES ?? null,
                ":fechabk2" => $data->data->fechaBk2 ?? null,
                ":fechabk4" => $data->data->fechaBk4 ?? null,
                ":fechabk6" => $data->data->fechaBk6 ?? null,
                ":fechabk9" => $data->data->fechaBk9 ?? null,
                ":controlmedico2mes" => $data->data->controlMedico2Mes ?? null,
                ":fechacontrolmedico2mes" => $data->data->fechaControlMedico2Mes ?? null,
                ":observacionescontrolmedico2mes" => $data->data->observacionesControlMedico2Mes ?? null,
                ":controlmedico4mes" => $data->data->controlMedico4Mes ?? null,
                ":fechacontrolmedico4mes" => $data->data->fechaControlMedico4Mes ?? null,
                ":observacionescontrolmedico4mes" => $data->data->observacionesControlMedico4Mes ?? null,
                ":controlmedico6mes" => $data->data->controlMedico6Mes ?? null,
                ":fechacontrolmedico6mes" => $data->data->fechaControlMedico6Mes ?? null,
                ":observacionescontrolmedico6mes" => $data->data->observacionesControlMedico6Mes ?? null,
                ":controlenfermeria1mes" => $data->data->controlEnfermeria1Mes ?? null,
                ":fechacontrolenfermeria1mes" => $data->data->fechaControlEnfermeria1Mes ?? null,
                ":observacionescontrolenfermeria1mes" => $data->data->observacionesControlEnfermeria1Mes ?? null,
                ":controlenfermeria3mes" => $data->data->controlEnfermeria3Mes ?? null,
                ":fechacontrolenfermeria3mes" => $data->data->fechaControlEnfermeria3Mes ?? null,
                ":observacionescontrolenfermeria3mes" => $data->data->observacionesControlEnfermeria3Mes ?? null,
                ":controlenfermeria5mes" => $data->data->controlEnfermeria5Mes ?? null,
                ":fechacontrolenfermeria5mes" => $data->data->fechaControlEnfermeria5Mes ?? null,
                ":observacionescontrolenfermeria5mes" => $data->data->observacionesControlEnfermeria5Mes ?? null,
                ":tipoconfimacionbacteriologica" => $data->data->ClasificacionTB ?? null,
                ":fechafintratamiento" => $data->data->fechaFinalTto ?? null,
                ":observacionesfechafintratamiento" => $data->data->observacionesControl ?? null,
                ":serealizoprueba" => $data->data->realizoPruebaVIH ?? null,
                ":resultbkfinal" => $data->data->resultBKFinal ?? null,
                ":id_user_registra" => $data->id_registra
        );

        try {
            $dbh->beginTransaction();

            $stmt = $dbh->prepare($sql);
            $stmt->execute($dataIn);

            if ($stmt->rowCount() <= 0) {
                $dbh->rollBack();
                return [
                    "STATUS" => "ERROR",
                    "ERROR"  => "No se insertó el registro"
                ];
            }

            $dbh->commit();

            return [
                "STATUS" => "OK"
            ];

        } catch (PDOException $e) {
            if ($dbh->inTransaction()) {
                $dbh->rollBack();
            }

            return [
                "STATUS" => "ERROR",
                "ERROR"  => $e->getMessage()
            ];
        }
    }


    public function listarLibroPacientes($data){

        $instance = Database::getInstance();

        if ($instance == NULL) {

            $db = new Database();

            $instance = $db->getInstance();

        }

        if(strtoupper(hash("SHA256",$data->key))==$instance->key){

            $val=new libropacientes_DAO;

            

            if($val->validarToken($data)) {

           

                $sql = "select * from libroderegistro"; 

            

                $dbh=$instance->_connection;



                $stmt = $dbh->prepare($sql);

                // Especificamos el fetch mode antes de llamar a fetch()

                $stmt->setFetchMode(PDO::FETCH_ASSOC);
 
                try { 

                    $stmt->execute();

                    if ($stmt){$result['STATUS'] = "OK"; }

                } catch (PDOException $errr) { 

                    $result['ERROR'] = $errr->getMessage();

                } 

                while ($row = $stmt->fetch()){

                     
                    $result['DATA'][] = $row; 

                }

                if(!isset($result['DATA'])){

                    $result['ERROR']=$dbh->errorInfo();

                }

            }else{

                $result['STATUS'] = 'ERROR';

                $result['ERROR'] = 'Token incorrecto';

            }

        }else{

            $result['STATUS'] = 'ERROR';

            $result['ERROR'] = 'Llaves incorrectas';

        }

       

        

        return $result;

        



    } 


    public function validarToken($data){ 
        $instance = Database::getInstance();

        if ($instance == NULL) {

            $db = new Database();

            $instance = $db->getInstance();

        }

         

        $dbh=$instance->_connection;

        $sql='SELECT * FROM public.sesion_user where "token" = :token;';

                

        $dataToken=array( 

            ":token"=> $data->token

        ); 

        $stmt = $dbh->prepare($sql);

        $stmt->setFetchMode(PDO::FETCH_ASSOC);

        try { 

            $stmt->execute($dataToken);

            if ($stmt){

                $result['STATUS'] = 'OK';

                

                while ($row = $stmt->fetch()){

                     

                    if($row['id_user']==$data->id_registra){

                       

                        return true;

                    

                    }else{

                        return false;

                    }

                }

            }

        }catch (PDOException $errr) { 

            $result['ERROR'] = $errr->getMessage();

        } 

       

        return false;



    }

}