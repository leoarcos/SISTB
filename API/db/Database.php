<?php
class Database extends PDO{
    
    //dbname
   //private $dbname = "idsprueba";
    private $dbname = "ids2016";
    private $host = "localhost";
    //private $host = "200.6.174.242";    
    //private $user = "postgres";
    //private $pass = '88260948-1';    
    private $user = "root";
    private $pass = 'toor';
    private $port = 5432;
    private $dbh;
    private static $_instance; //The single instance
   
    /*
      Get an instance of the Database
      @return Instance
     */

    public static function getInstance() {
        if (!self::$_instance) { // If no instance then make one
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    //connect with postgresql and pdo
    public function __construct(){
        try{
            $this->dbh= pg_connect("host=$this->host port=$this->port dbname=$this->dbname user=$this->user password=$this->pass");
            
           
            
        }catch(PDOException $e){
            echo  $e->getMessage();
        }
        
        
    }
    private function __clone() {
        
    }

    // Get mysqli connection
    public function getConnection() {
        return $this->dbh;
    }

    public function get_data($sql) {
        $ret = array('STATUS' => 'ERROR', 'ERROR' => '', 'DATA' => array());
        
        $query = $this->getConnection();
        $result = pg_query($query, $sql);        
         
        if ($result)
            $ret['STATUS'] = "OK";
        else
            $ret['ERROR'] ="error";

        while ($row =pg_fetch_assoc($result)){  
            $ret['DATA'][] = $row;
        }
        //$this->dbh->close();
        return $ret;
    }

    public function exec($sql) {
        $ret = array('STATUS' => 'ERROR', 'ERROR' => '');

        $query = $this->getConnection();
        
        $res = pg_query($query, $sql);
      
        if ($res) {
            $ret['STATUS'] = "OK";
            $ret['error'] = pg_result_error($res);
        } else {
            $ret['STATUS'] = 'FALLO';
            $ret['error'] = pg_result_error($res);
        }
        return $ret;
    }
    
    //función para cerrar una conexión pdo
    public function close(){
            $this->dbh = null;
    }
 
}

$cl=new Database();
$sd=$cl->getConnection();
print_r($sd);