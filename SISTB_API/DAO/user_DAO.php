<?php



include '../db/Database.php';



class user_DAO {



    function __construct() {

        

    }

 

    public function logIn($data){

          
        

        $instance = Database::getInstance();

        if ($instance == NULL) {

            $db = new Database();

            $instance = $db->getInstance();

        }

  

        if(strtoupper(hash("SHA256",$data->key))==$instance->key){

        

           

            $sql = "SELECT * FROM public.usuario WHERE nombreusuario= :correo AND contrasena= :pass"; 

            

            $dbh=$instance->_connection;

 

            $stmt = $dbh->prepare($sql);

            // Especificamos el fetch mode antes de llamar a fetch()

            $stmt->setFetchMode(PDO::FETCH_ASSOC);

            $dataIn=array(

                ":correo" => $data->data->email,

                ":pass"=> base64_encode(openssl_encrypt($data->data->password, 'aes-128-cbc', $data->key, 0, $data->key.'col0mb'))

            );

            try { 

                $stmt->execute($dataIn);

                if ($stmt){$result['STATUS'] = "OK"; }

            } catch (PDOException $errr) { 

                $result['ERROR'] = $errr->getMessage();

            } 

            while ($row = $stmt->fetch()){

                $token = random_bytes(10);

                    

                $sqltoken='INSERT INTO sesion_user(id_user,token) VALUES(:user,:token);';

                

                $dataToken=array(

                    ":user" => intval($row['id']),

                    ":token"=> hash("SHA256",$token)

                ); 

                 

                $stmt2 = $dbh->prepare($sqltoken);

                $stmt2->setFetchMode(PDO::FETCH_ASSOC);

                try { 

                    $stmt2->execute($dataToken);

                    if ($stmt2){

                        $result['TOKEN']=hash("SHA256",$token) ;

                       

                        $result['DATA'][] = $row;  



                        

                    }

                }catch (PDOException $errr) { 

                    $result['ERROR'] = $errr->getMessage();

                } 

            }

            if(!isset($result['DATA'])){

                $result['ERROR']=$dbh->errorInfo();

            }

            

        }else{

            $result['STATUS'] = 'ERROR1';

            $result['ERROR'] = 'Llaves incorrectas';

        }

        

        return $result;

        



    } 

    
 

    public function registrarUsuario($data ){

        $instance = Database::getInstance();

        if ($instance == NULL) {

            $db = new Database();

            $instance = $db->getInstance();

        }

        if(strtoupper(hash("SHA256",$data->key))==$instance->key){
            
            $val=new user_DAO;
            if($val->validarToken($data)) {
                


                $dbh=$instance->_connection;



                $stmt = $dbh->prepare("INSERT INTO public.usuario(nombres, apellidos, identificacion, sexo, edad, cargo, correoelectronico, numerocomunicacionusuario, nombreusuario, contrasena, tipousuario, fechanacimiento, dpto, mnpo) 
                VALUES(:nonbres, :apellidos, :id, :sexo, :edad, :cargo, :email, :numcontacto, :user, :pass, :tipousuario, :fechanacimiento, :dpto, :mnpo) ");

                // Especificamos el fetch mode antes de llamar a fetch()
 
                $stmt->setFetchMode(PDO::FETCH_ASSOC);

                $dataIn=array(

                    ":nonbres" => $data->data->nonbres,

                    ":apellidos"=> $data->data->apellidos,

                    ":id"=> $data->data->id,

                    ":sexo"=> $data->data->sexo, 

                    ":edad"=> $data->data->fechanaci, 

                    ":cargo"=> $data->data->cargo, 

                    ":email"=> $data->data->email, 

                    ":numcontacto"=> $data->data->numcontacto, 

                    ":user"=> $data->data->user, 

                    ":pass"=> base64_encode(string: openssl_encrypt($data->data->pass, 'aes-128-cbc', $data->key, 0, $data->key.'col0mb')), 

                    ":tipousuario"=> $data->data->rol, 

                    ":fechanacimiento"=> $data->data->fechanaci,
                    
                    ":dpto"=> 'NORTE DE SANTANDER',

                    ":mnpo"=> $data->data->mnpo,

                );



                try { 

                    $stmt->execute($dataIn);

                    if ($stmt){

                        $result['STATUS'] = "OK"; 

                        $result['ID'] = $dbh->lastInsertId();

                    }

                } catch (PDOException $errr) { 

                    $result['ERROR'] = $errr->getMessage();

                } 

                //$result['ID'] = $dbh->lastInsertId();





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

     
    public function listarUsuarios($data){
 
        $instance = Database::getInstance();

        if ($instance == NULL) {

            $db = new Database();

            $instance = $db->getInstance();

        }

 



        if(strtoupper(hash("SHA256",$data->key))==$instance->key){

            $val=new user_DAO;

            

            if($val->validarToken($data)) {

           

                $sql = "SELECT so.* FROM usuario so"; 

                

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

                    

                    //$row['pass']=openssl_decrypt(base64_decode($row['pass']), 'aes-128-cbc', $data->key, 0, $data->key.'col0mb');

                    

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

   
    public function listarUsuarioPass($data){

         
        $instance = Database::getInstance();

        if ($instance == NULL) {

            $db = new Database();

            $instance = $db->getInstance();

        }

 



        if(strtoupper(hash("SHA256",$data->key))==$instance->key){

            $val=new user_DAO;

            

            if($val->validarToken($data)) {

           

                $sql = "SELECT so.pass FROM usuarios so WHERE id=:id"; 

                

                $dbh=$instance->_connection;



                $stmt = $dbh->prepare($sql);

                // Especificamos el fetch mode antes de llamar a fetch()

                $stmt->setFetchMode(PDO::FETCH_ASSOC);

                
                
                $dataIn=array(

                    ":id" => $data->data->id, 

                );

                try { 

                    $stmt->execute($dataIn);

                    if ($stmt){$result['STATUS'] = "OK"; }

                } catch (PDOException $errr) { 

                    $result['ERROR'] = $errr->getMessage();

                } 

                while ($row = $stmt->fetch()){

                    

                    $row['pass']=openssl_decrypt(base64_decode($row['pass']), 'aes-128-cbc', $data->key, 0, $data->key.'col0mb');

                    

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
    public function editarUsuario($data){

         

 
        

        $instance = Database::getInstance();

        if ($instance == NULL) {

            $db = new Database();

            $instance = $db->getInstance();

        }
 

        if(strtoupper(hash("SHA256",$data->key))==$instance->key){

        
            $val=new user_DAO;


            

            if($val->validarToken($data)) {

                $sql = "UPDATE `usuarios`
                        SET 
                            `nombres` = :nombres, 
                            `tipoid` = :tipoid, 
                            `numid` = :numid,  
                            `correo` = :correo,  
                            `pass` = :pass,  
                            `perfil` = :perfil
                WHERE `id` = :id";

                

                $dbh=$instance->_connection;

     

                $stmt = $dbh->prepare($sql);

                // Especificamos el fetch mode antes de llamar a fetch()

                $stmt->setFetchMode(PDO::FETCH_ASSOC);

                $dataIn=array(

                    ":nombres" => $data->data->nombres,

                    ":tipoid" => $data->data->tipoid,

                    ":numid" => $data->data->numid, 

                    ":correo" => $data->data->correo,

                    ":pass"=> base64_encode(string: openssl_encrypt($data->data->pass, 'aes-128-cbc', $data->key, 0, $data->key.'col0mb')), 

                    ":perfil"=> $data->data->perfil,

                    ":id"=> $data->data->id,

                );

                try { 
                    $stmt->execute($dataIn);
                    if ($stmt){$result['STATUS'] = 'OK'; }
                } catch (PDOException $errr) { 
                    $result['ERROR'] = $errr->getMessage();
                } 
                
                
                

            }else{

                $result['STATUS'] = 'ERROR';

                $result['ERROR'] = 'Token incorrecto';

            }

        }else{

            $result['STATUS'] = 'ERROR1';

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

        $sql='SELECT * FROM sesion_user WHERE token=:token;';

                

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