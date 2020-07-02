<?php

class Playlists_songs extends Main {
    
    public static $table_name = "playlist_songs";
    public static $table_fields = ['id', 'song_id', 'playlist_id', 'song_order'];
    
    public $conn;
    public $id;
    public $song_id;    
    public $playlist_id;    
    public $song_order;    

    public function __construct(){

    }

 
    public static function playlist_songs($id){
        
    global $database;

    $query2 = "SELECT * FROM playlist_songs WHERE playlist_id = {$id} ";
        
    return $result2 = self::query_this($query2);   

    }

 

    
    
    
    

}


?>