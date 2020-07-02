<?php

class Albums extends Main {
    
    public static $table_name = "albums";
    public static $table_fields = array('id', 'title', 'artist', 'genre', 'image');
    
    public $id;
    public $title;
    public $artist;
    public $genre;
    public $image;
    

    public function __construct(){
        
    }
     

    public function num_of_songs($id){
        
        global $database;
        
        $query  = "SELECT * FROM songs WHERE album = {$id} ";
        $result = $database->query($query);
        $count  = mysqli_num_rows($result);
        return $count;
        
    }
    
           
    public static function view_artist_album($id){
          
    global $database;
  
    $query_view  = "SELECT * FROM " . static::$table_name . " WHERE artist = {$id} ";
    return $result_view = static::query_this($query_view);

    }

    
        
    public static function search_album($term){
        
        global $database;
        
        $query  = "SELECT * FROM albums WHERE title LIKE '$term%' LIMIT 5 ";
        return $result = self::query_this($query);

    }

  
    
   
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
}


?>