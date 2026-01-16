<?php

include '../db/Database.php';

class sintomaticos_DAO {

    function __construct() {}
    /**
     * Obtiene el último número registrado para un año específico
     */
    public function numeroConsecutivo($data) { 
        $instance = Database::getInstance();
        if ($instance == NULL) {
            $db = new Database();
            $instance = $db->getInstance();
        }

        // 1. Validación de Llave SHA256
        if (strtoupper(hash("SHA256", $data->key)) != $instance->key) {
            return [
                "STATUS" => "ERROR",
                "ERROR"  => "Llaves incorrectas"
            ];
        }

        // 2. Validación de Token
        if (!$this->validarToken($data)) {
            return [
                "STATUS" => "ERROR",
                "ERROR"  => "Token incorrecto o sesión expirada"
            ];
        }

        $dbh = $instance->_connection;
        $datos = $data->data;

        // 3. Consulta del último número (MAX)
        $sql = "SELECT num FROM sintomaticorespiratorio WHERE ano = :ano ORDER BY num DESC LIMIT 1";

        try {
            $stmt = $dbh->prepare($sql);
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            
            $stmt->execute([
                ":ano" => $datos->ano
            ]);

            $result['STATUS'] = "OK";
            $result['DATA'] = [];

            while ($row = $stmt->fetch()) {
                $result['DATA'][] = $row;
            }

            // Si no hay registros previos para ese año
            if (empty($result['DATA'])) {
                $result['DATA'] = [["num" => 0]];
            }

        } catch (PDOException $e) {
            $result['STATUS'] = "ERROR";
            $result['ERROR'] = $e->getMessage();
        }

        return $result;
    }
    /**
     * listar sintomaticos
     */
    public function listarSintomaticos($data) { 
        $instance = Database::getInstance();
        if ($instance == NULL) {
            $db = new Database();
            $instance = $db->getInstance();
        }

        // 1. Validación de Llave SHA256
        if (strtoupper(hash("SHA256", $data->key)) != $instance->key) {
            return [
                "STATUS" => "ERROR",
                "ERROR"  => "Llaves incorrectas"
            ];
        }

        // 2. Validación de Token
        if (!$this->validarToken($data)) {
            return [
                "STATUS" => "ERROR",
                "ERROR"  => "Token incorrecto o sesión expirada"
            ];
        }

        $dbh = $instance->_connection;
        $datos = $data->data;

         
        $sql = "SELECT * FROM sintomaticorespiratorio";

        try {
            $stmt = $dbh->prepare($sql);
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            
            $stmt->execute();

            $result['STATUS'] = "OK";
            $result['DATA'] = [];

            while ($row = $stmt->fetch()) {
                $result['DATA'][] = $row;
            }

            // Si no hay registros previos para ese año
            if (empty($result['DATA'])) {
                $result['DATA'] = [["num" => 0]];
            }

        } catch (PDOException $e) {
            $result['STATUS'] = "ERROR";
            $result['ERROR'] = $e->getMessage();
        }

        return $result;
    }

    /**
     * Registra un nuevo sintomático respiratorio
     */
    public function registrarsintomaticoRespiratorio($data) {
        $instance = Database::getInstance();
        if ($instance == NULL) {
            $db = new Database();
            $instance = $db->getInstance();
        }

        // 1. Validación de Seguridad (Llave SHA256)
        if (strtoupper(hash("SHA256", $data->key)) != $instance->key) {
            return ["STATUS" => "ERROR", "ERROR" => "Llaves incorrectas"];
        }

        // 2. Validación de Token
        if (!$this->validarToken($data)) {
            return ["STATUS" => "ERROR", "ERROR" => "Token incorrecto o sesión expirada"];
        }

        $dbh = $instance->_connection;
        $datos = $data->data; // Acceso simplificado a los datos internos

        try {
            $dbh->beginTransaction();

            // 3. Generar Consecutivo Automático para el año actual
            $sqlMax = "SELECT COALESCE(MAX(num), 0) + 1 AS nuevo_num FROM sintomaticorespiratorio WHERE ano = :ano";
            $stmtMax = $dbh->prepare($sqlMax);
            $stmtMax->execute([":ano" => $datos->ano]);
            $nuevoNum = $stmtMax->fetchColumn();

            // 4. Insertar en tabla principal (Sin tabla historial)
            $sqlIns = "INSERT INTO sintomaticorespiratorio (
                        num, departamento, municipio, fechacaptacion, nombres, papellido, 
                        sapellido, edad, sexo, tipoidentificacion, identificacion, etnia, 
                        puebloindigena, grupopoblacional, direccion, telefono, barrio, 
                        comuna, regimen, entidad, observaciones, responsable, institucion, 
                        ano, remitido, sector, ocupacion, fechasintomas
                    ) VALUES (
                        :num, :dpto, :mnpo, :fechaCaptacion, :nombres, :papellido, 
                        :sapellido, :edad, :sexo, :tipoid, :numid, :etnia, 
                        :puebloIndigena, :grupoPoblacional, :direccion, :telefono, :sectorDeta, 
                        :comuna, :regimen, :eapb, :observaciones, :responsable, :institucion, 
                        :ano, :remitidoPor, :sector, :ocupacion, :fechaSintomas
                    )";
            
            $stmtIns = $dbh->prepare($sqlIns);
            $stmtIns->execute([
                ":num"             => $nuevoNum,
                ":dpto"            => $datos->dpto ?? null,
                ":mnpo"            => $datos->mnpo ?? null,
                ":fechaCaptacion"  => $datos->fechaCaptacion ?? null,
                ":nombres"         => $datos->nombres ?? null,
                ":papellido"       => $datos->papellido ?? null,
                ":sapellido"       => $datos->sapellido ?? null,
                ":edad"            => (int)($datos->edad ?? 0),
                ":sexo"            => $datos->sexo ?? null,
                ":tipoid"          => $datos->tipoid ?? null,
                ":numid"           => $datos->numid ?? null,
                ":etnia"           => $datos->etnia ?? null,
                ":puebloIndigena"  => $datos->puebloIndigena ?? null,
                ":grupoPoblacional" => $datos->grupoPoblacional ?? null,
                ":direccion"       => $datos->direccion ?? null,
                ":telefono"        => $datos->telefono ?? null,
                ":sectorDeta"      => $datos->sectorDeta ?? null,
                ":comuna"          => $datos->comuna ?? null,
                ":regimen"         => $datos->regimen ?? null,
                ":eapb"            => $datos->eapb ?? null,
                ":observaciones"   => $datos->observaciones ?? null,
                ":responsable"     => $datos->responsable ?? null,
                ":institucion"     => $datos->institucion ?? null,
                ":ano"             => $datos->ano ?? null,
                ":remitidoPor"     => $datos->remitidoPor ?? null,
                ":sector"          => $datos->sector ?? null,
                ":ocupacion"       => $datos->ocupacion ?? null,
                ":fechaSintomas"   => $datos->fechaSintomas ?? null
            ]);

            // 5. Insertar Pruebas Realizadas (Bucle)
            if (isset($datos->pruebaRealizadas) && is_array($datos->pruebaRealizadas)) {
                $sqlPrueba = "INSERT INTO sintomaticorespiratoriopruebasrealizadas (
                                num, identificacion, pruebarealizada, resultadoprueba, fechaprueba
                              ) VALUES (:num, :id, :prueba, :resultado, :fecha)";
                
                $stmtPrueba = $dbh->prepare($sqlPrueba);
                foreach ($datos->pruebaRealizadas as $p) {
                    $stmtPrueba->execute([
                        ":num"       => $nuevoNum,
                        ":id"        => $datos->numid,
                        ":prueba"    => $p->prueba,
                        ":resultado" => $p->resultado,
                        ":fecha"     => $p->fecha
                    ]);
                }
            }

            $dbh->commit();
            return ["STATUS" => "OK", "STATUSREGISTRO" => "OK", "NUM" => $nuevoNum];

        } catch (PDOException $e) {
            if ($dbh->inTransaction()) {
                $dbh->rollBack();
            }
            return ["STATUS" => "ERROR", "ERROR" => $e->getMessage()];
        }
    }

    /**
     * Actualiza un registro existente
     */
    public function actualizarSintomatico($data) {
        $instance = Database::getInstance();
        if ($instance == NULL) {
            $db = new Database();
            $instance = $db->getInstance();
        }

        if (strtoupper(hash("SHA256", $data->key)) != $instance->key) {
            return ["STATUS" => "ERROR", "ERROR" => "Llaves incorrectas"];
        }

        if (!$this->validarToken($data)) {
            return ["STATUS" => "ERROR", "ERROR" => "Token incorrecto"];
        }

        $dbh = $instance->_connection;
        $datos = $data->data;

        try {
            $dbh->beginTransaction();

            // 1. Actualizar tabla principal
            $sqlUpd = "UPDATE sintomaticorespiratorio SET 
                        departamento=:dpto, municipio=:mnpo, nombres=:nombres, papellido=:papellido, 
                        sapellido=:sapellido, edad=:edad, sexo=:sexo, tipoidentificacion=:tipoid, 
                        identificacion=:numid, etnia=:etnia, puebloindigena=:puebloIndigena, 
                        grupopoblacional=:grupoPoblacional, direccion=:direccion, telefono=:telefono, 
                        barrio=:sectorDeta, comuna=:comuna, regimen=:regimen, entidad=:eapb, 
                        observaciones=:observaciones, responsable=:responsable, institucion=:institucion, 
                        remitido=:remitidoPor, sector=:sector, ocupacion=:ocupacion, fechasintomas=:fechaSintomas 
                       WHERE num=:num AND ano=:ano AND fechacaptacion=:fechaCaptacion";
            
            $stmtUpd = $dbh->prepare($sqlUpd);
            $stmtUpd->execute([
                ":dpto"            => $datos->dpto,
                ":mnpo"            => $datos->mnpo,
                ":nombres"         => $datos->nombres,
                ":papellido"       => $datos->papellido,
                ":sapellido"       => $datos->sapellido,
                ":edad"            => (int)$datos->edad,
                ":sexo"            => $datos->sexo,
                ":tipoid"          => $datos->tipoid,
                ":numid"           => $datos->numid,
                ":etnia"           => $datos->etnia,
                ":puebloIndigena"  => $datos->puebloIndigena,
                ":grupoPoblacional" => $datos->grupoPoblacional,
                ":direccion"       => $datos->direccion,
                ":telefono"        => $datos->telefono,
                ":sectorDeta"      => $datos->sectorDeta,
                ":comuna"          => $datos->comuna,
                ":regimen"         => $datos->regimen,
                ":eapb"            => $datos->eapb,
                ":observaciones"   => $datos->observaciones,
                ":responsable"     => $datos->responsable,
                ":institucion"     => $datos->institucion,
                ":remitidoPor"     => $datos->remitidoPor,
                ":sector"          => $datos->sector,
                ":ocupacion"       => $datos->ocupacion,
                ":fechaSintomas"   => $datos->fechaSintomas,
                ":num"             => $datos->num,
                ":ano"             => $datos->ano,
                ":fechaCaptacion"  => $datos->fechaCaptacion
            ]);

            // 2. Borrar pruebas anteriores e insertar las nuevas
            $sqlDel = "DELETE FROM sintomaticorespiratoriopruebasrealizadas WHERE num = :num AND identificacion = :id";
            $stmtDel = $dbh->prepare($sqlDel);
            $stmtDel->execute([":num" => $datos->num, ":id" => $datos->numid]);

            if (isset($datos->pruebaRealizadas) && is_array($datos->pruebaRealizadas)) {
                $sqlPrueba = "INSERT INTO sintomaticorespiratoriopruebasrealizadas (num, identificacion, pruebarealizada, resultadoprueba, fechaprueba) VALUES (:num, :id, :prueba, :resultado, :fecha)";
                $stmtPrueba = $dbh->prepare($sqlPrueba);
                foreach ($datos->pruebaRealizadas as $p) {
                    $stmtPrueba->execute([
                        ":num"       => $datos->num,
                        ":id"        => $datos->numid,
                        ":prueba"    => $p->prueba,
                        ":resultado" => $p->resultado,
                        ":fecha"     => $p->fecha
                    ]);
                }
            }

            $dbh->commit();
            return ["STATUS" => "OK", "STATUSACTUALIZAR" => "OK", "NUM" => $datos->num];

        } catch (PDOException $e) {
            if ($dbh->inTransaction()) {
                $dbh->rollBack();
            }
            return ["STATUS" => "ERROR", "ERROR" => $e->getMessage()];
        }
    }

    /**
     * Lista todos los registros
     */
    public function listarSintomaticoRespiratorio() {
        $instance = Database::getInstance();
        if ($instance == NULL) {
            $db = new Database();
            $instance = $db->getInstance();
        }

        $dbh = $instance->_connection;
        $sql = "SELECT * FROM sintomaticorespiratorio ORDER BY num DESC";
        
        try {
            $stmt = $dbh->prepare($sql);
            $stmt->execute();
            return ["STATUS" => "OK", "DATA" => $stmt->fetchAll(PDO::FETCH_ASSOC)];
        } catch (PDOException $e) {
            return ["STATUS" => "ERROR", "ERROR" => $e->getMessage()];
        }
    }

    /**
     * Valida el token de sesión del usuario
     */
    public function validarToken($data) {
        $instance = Database::getInstance();
        if ($instance == NULL) {
            $db = new Database();
            $instance = $db->getInstance();
        }

        $dbh = $instance->_connection;
        // Buscamos si el token existe y pertenece al usuario que intenta registrar
        $sql = 'SELECT id_user FROM public.sesion_user WHERE "token" = :token;';

        try {
            $stmt = $dbh->prepare($sql);
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $stmt->execute([":token" => $data->token]);
            $row = $stmt->fetch();
            
            if ($row && $row['id_user'] == $data->id_registra) {
                return true;
            }
        } catch (PDOException $e) {
            return false;
        }
        return false;
    }

}

?>