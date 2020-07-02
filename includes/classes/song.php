<?php

class Songs extends Main {
    
    public static $table_name = "songs";
    public static $table_fields = array('id', 'title', 'artist', 'album', 'genre', 'duration', 'path', 'albumOrder', 'plays');
    
    public $id;
    public $title;    
    public $artist;    
    public $album;    
    public $genre;    
    public $duration;    
    public $path;    
    public $albumOrder;    
    public $plays;    

    public function __construct(){
        
    }
    
    
    public static function name_of_songs($id){
        
        global $database;
        
        $query  = "SELECT * FROM songs WHERE album = {$id} ";
        return $result = self::query_this($query);

    }

    
    public static function name_of_songs_limit($id){
        
        global $database;
        
        $query  = "SELECT * FROM songs WHERE album = {$id} LIMIT 5 ";
        return $result = self::query_this($query);

    }

    
    public static function search_songs($term){
        
        global $database;
        
        $query  = "SELECT * FROM songs WHERE title LIKE '$term%' LIMIT 5 ";
        return $result = self::query_this($query);

    }

  
   
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
}


?>