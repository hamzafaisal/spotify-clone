<?php
   
if(isset($_POST['signup'])){
    
 $account->username       = $account->escape($_POST['signusername']); 
 $account->first_name     = $account->escape($_POST['first']); 
 $account->last_name      = $account->escape($_POST['last']); 
 $account->email          = $account->escape($_POST['email']); 
 $account->password       = $account->escape($_POST['signpassword']); 
 $account->confirm        = $account->escape($_POST['confirmpassword']); 
    
 $account->profile_pic    = "img.jpg";
 $account->signup_date    = date("Y-m-d");
        
    
    $success = $account->register($account->username, $account->first_name, $account->last_name, $account->email, $account->password, $account->confirm);
    
    $account->password = md5($account->password);

    if($success == true){
        $account->save();
        redirect("index.php");
    }    

    
}            
            
?>