<?php

class Artists extends Main {
    
    public static $table_name = "artists";
    public static $table_fields = array('id', 'name');
    
    public $id;
    public $name;    

    public function __construct(){
        
    }

        
    public static function search_artists($term){
        
        global $database;
        
        $query  = "SELECT * FROM artists WHERE name LIKE '$term%' LIMIT 5 ";
        return $result = self::query_this($query);


    }

 
    
    
    
    
    
    
    
}


?>