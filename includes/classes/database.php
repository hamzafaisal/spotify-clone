<?php require_once("connection.php"); 


class Database{
    
    public $conn;
    
    
    function __construct(){
        
        $this->open_connection();
    }
    
      
    public function open_connection(){
    
//    $this->conn = mysqli_connect(host,username,password,database);
        
    $this->conn = new mysqli(host,username,password,database);
//        
//    if($this->conn) {
//        echo "yes";
//    }   
  
    }    


    public function query($query){
        
        $result = $this->conn->query($query);
        
        $this->query_confirm($result);
        
        return $result;
                
    }
    

    public function query_confirm($result){
        
        if(!$result){
            echo "failed" . $this->conn->error;
        }
        return $result;
    }

    
    public function insert_id(){
        
        return mysqli_insert_id($this->conn);
        
    }

    
    
    
    
    
    
    
    
    
    
    
    
    

}

$database = new Database();

?>