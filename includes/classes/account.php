<?php

class Account extends Main {
    
    public static $table_name = "users";
    public static $table_fields = array('username', 'password', 'email', 'first_name', 'last_name', 'signup_date', 'profile_pic');
    
    public $id;
    public $username;
    public $password;
    public $email;
    public $first_name;
    public $last_name;
    public $signup_date;
    public $profile_pic;

    public $error_array;
    
    
    public function __construct(){
        
        $this->error_array = array();
    }
    
    
    public function verify_login($username, $password){
        
        global $database;
        
        $password = md5($password);
        
        $query_login = "SELECT * FROM users WHERE username = '$username' AND password = '$password' ";
        $result_login = $database->query($query_login);

        if(mysqli_num_rows($result_login) == 1 ){

            return true; 
            
        }else{
            array_push($this->error_array, Constants::$wrong_login);
            return false;
        }
                
    }
    

    public function register($signusername, $first, $last, $email, $signpassword, $confirmpassword){
        
        $this->validate_username($signusername);
        $this->validate_first($first);
        $this->validate_last($last);
        $this->validate_email($email);
        $this->validate_password($signpassword, $confirmpassword);

        if(empty($this->error_array) == true){
            return true;

        }else{
            return false;
        }
    }
    
    
//    public function insert($signusername, $first, $last, $email, $signpassword){
//        
//        global $database;
//        
//        $profile_pic = "img.jpg";
//        $signup_date = date("Y-m-d");
//        
//        
//        
//        $query = "INSERT INTO users ( username, password, email, first_name, last_name, signup_date, profile_pic) 
//                 VALUES( '$signusername', '$signpassword', '$email',  '$first', '$last', '$signup_date','$profile_pic')  ";
//        
//        $database->query($query);
//        
//        
//    }
  
    
    public function get_error($error){
        
        if(!in_array($error, $this->error_array )){
            $error = "";
        }
        return "<span>{$error}</span>";
    }
      
    
    private function validate_username($signusername){
        
        global $database;
        
        if(strlen($signusername) > 25 || strlen($signusername) < 5){
            
            array_push($this->error_array, Constants::$username);
            return;
        }
        
        $query  = "SELECT * FROM users WHERE username = '{$signusername}' ";
        $result = $database->query($query);

        if(mysqli_num_rows($result) != 0 ){

            array_push($this->error_array, Constants::$username_taken);
            return;        
        
        }
        
        
        
    }
    
    
    private function validate_first($first){
        
        if(strlen($first) > 25 || strlen($first) < 3){
            
            array_push($this->error_array, Constants::$first);
            return;
            
        }
    }
    
    
    private function validate_last($last){
  
        if(strlen($last) > 25 || strlen($last) < 3){
            
            array_push($this->error_array, Constants::$last);
            return;
            
        }    }
    
    
    private function validate_email($email){
        
        global $database;
  
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            
            array_push($this->error_array, Constants::$email);
            return;
        }   
           
        $query  = "SELECT * FROM users WHERE email = '{$email}' ";
        $result = $database->query($query);

        if(mysqli_num_rows($result) != 0 ){

            array_push($this->error_array, Constants::$email_taken);
            return;        
        }
    }
    
    
    private function validate_password($signpassword, $confirmpassword){  
        
        if(preg_match('/[^A-Za-z0-9]/', $signpassword)){
            
            array_push($this->error_array, Constants::$password);
            return;
        }        
  
        if(strlen($signpassword) > 15 || strlen($signpassword) < 6 ){
            
            array_push($this->error_array, Constants::$password_limit);
            return;
            
        }
        
        if($signpassword != $confirmpassword){
            
            array_push($this->error_array, Constants::$confirm);
            return;
        } 
    }
   
    
    
    
 
    
    
    
    
    
}

?>