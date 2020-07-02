<?php

class Main{


    public function escape($string){

        $string = trim(strip_tags(stripslashes($string)));
        return $string;
    }
  
    
    public function get_input_value($value){
                
        if(isset($_POST[$value])){
            
            echo $_POST[$value];
        }

    }
    
    
    public static function view_all(){
          
    global $database;
  
    $query_view  = "SELECT * FROM " . static::$table_name . " ";
    return $result_view = static::query_this($query_view);

    }
    
    
    public static function view_rand(){
          
    global $database;
  
    $query_view  = "SELECT * FROM " . static::$table_name . " ORDER BY RAND() LIMIT 10 ";
    return $result_view = static::query_this($query_view);

    }
    
   
    public static function view_id($id){
          
      global $database;
  
      $query_id        = "SELECT * FROM " . static::$table_name . " WHERE id = {$id} ";
      $result_id_array = static::query_this($query_id);
    
      return !empty($result_id_array) ? array_shift($result_id_array) : false ;    
         
    }
    
       
    public static function query_this($query){
          
    global $database;
    $result = $database->query($query);
    $object_array = array();
    
    while($rows = mysqli_fetch_assoc($result) ){
        
    $object_array[] = static::instantiation($rows);
        
    }       

    return $object_array;
         
    }
    
    
    public static function instantiation($result){
        
     $calling_class = get_called_class();
        
     $object = new $calling_class;
     
    foreach($result as $property => $value ){

        if($object->has_property($property)){

            $object->$property = $value;      // $object->username    = $result['username']

        }
    }

     return $object;
}
    
   
    public function has_property($property){
          
    $object_property = get_object_vars($this);
        
    return array_key_exists($property , $object_property);    
       
    }
 
    
    public function properties(){
        
//        return get_object_vars($this);
        
        $properties = array();
        
        foreach(static::$table_fields as $table_field){
            
            if(property_exists($this , $table_field)){
                
              $properties[$table_field] = $this->$table_field;
                
                
            }      
        }
        
        return $properties;
        
    }
    

    public function create(){
        
    global $database;
        
    $properties = $this->properties();
          
    $query = "INSERT INTO " . static::$table_name . " ( " . implode("," , array_keys($properties) ) . " )
              VALUES  ( '" . implode("','" , array_values($properties) ) . " ')";
        
    if($database->query($query)){
        
        $this->id = $database->insert_id();
        
        return true;
        
    }else{
        
        return false;
    }
    }
    

    public function update(){
        
    global $database;
        
    $properties = $this->properties();
        
    $property_pairs = array();  
        
    foreach($properties as $keys => $values){
        
        $property_pairs[] = "{$keys}='{$values}'";
        
    }
                  
    $query = "UPDATE " . static::$table_name . " SET " .   implode(" , " , $property_pairs)   . " WHERE id = {$this->id}  ";
        
    $database->query($query);
        
//    echo (mysqli_affected_rows($database->conn)) == 1 ? true : false ; 
        
    }
    
    
    public function delete(){
        
    global $database;
          
    $query = "DELETE FROM " . static::$table_name . " WHERE id = {$this->id}  ";
        
    return $database->query($query);

    }
    
        
    public function save(){
        
    return isset($this->id) ? $this->update() : $this->create();

    }      
    
    
    public static function counter(){
    
    global $database;    
    
    $query  = "SELECT * FROM " . static::$table_name . " ";
    $result = $database->query($query);
    $count  = mysqli_num_rows($result);    
      
    return $count;    
        
    }
    
    
    public function waqt($timestamp)  {  
      $time_ago         = strtotime($timestamp);  
      $current_time     = time();  
      $time_difference  = $current_time - $time_ago;  
      $seconds          = $time_difference;  
      $minutes          = round($seconds / 60 );            // value 60 is seconds  
      $hours            = round($seconds / 3600);           //value 3600 is 60 minutes * 60 sec  
      $days             = round($seconds / 86400);          //86400 = 24 * 60 * 60;  
      $weeks            = round($seconds / 604800);         // 7*24*60*60;  
      $months           = round($seconds / 2629440);        //((365+365+365+365+366)/5/12)*24*60*60  
      $years            = round($seconds / 31553280);       //(365+365+365+365+366)/5 * 24 * 60 * 60  
        
      if($seconds <= 60)  
      {  
     return "Just Now";  
   }  
      else if($minutes <=60)  
      {  
     if($minutes==1)  
           {  
       return "one minute ago";  
     }  
     else  
           {  
       return "$minutes minutes ago";  
     }  
   }  
      else if($hours <= 24)  
      {  
     if($hours==1)  
           {  
       return "an hour ago";  
     }  
           else  
           {  
       return "$hours hrs ago";  
     }  
   }  
      else if($days <= 7)  
      {  
     if($days==1)  
           {  
       return "yesterday";  
     }  
           else  
           {  
       return "$days days ago";  
     }  
   }  
      else if($weeks <= 4.3) //4.3 == 52/12  
      {  
     if($weeks==1)  
           {  
       return "a week ago";  
     }  
           else  
           {  
       return "$weeks weeks ago";  
     }  
   }  
       else if($months <=12)  
      {  
     if($months==1)  
           {  
       return "a month ago";  
     }  
           else  
           {  
       return "$months months ago";  
     }  
   }  
      else  
      {  
     if($years==1)  
           {  
       return "one year ago";  
     }  
           else  
           {  
       return "$years years ago";  
     }  
   }  
 }  
 
   
   
    
}

    $main = new Main();


?>