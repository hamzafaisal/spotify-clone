<?php
   
if(isset($_POST['login'])){
    
 $username       = $_POST['username']; 
 $password       = $_POST['password']; 
     
 $success = $account->verify_login($username, $password);
    
    if($success == true){
        
        $_SESSION['username'] = $username;
        
        redirect("index.php");
        
    }

    
}            
            
?>   