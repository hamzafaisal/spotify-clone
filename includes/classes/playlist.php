<?php

class Playlists extends Main {
    
    public static $table_name = "playlists";
    public static $table_fields = ['id', 'name', 'owner', 'dateCreated'];
    
    public $conn;
    public $id;
    public $name;    
    public $owner;    
    public $dateCreated;    

    public function __construct(){
//        
//        if(!is_array($play)){
//            
//        $query1 = "SELECT * FROM playlists WHERE id = $play";
//        return $result1 = mysqli_query($conn, $query1);
//            
//        }else{
//   
//        $this->conn        = $conn;
//        $this->id          = $play['id'];
//        $this->name        = $play['name'];
//        $this->owner       = $play['owner'];
//        $this->dateCreated = $play['dateCreated'];
            
//        }
    }
    
    public function get_id(){
        return $this->id;
    }
 
    
    public function get_name(){
                
        return $this->name;
    }
 
    
    public function get_owner(){
        return $this->owner;
    }
     
    public function get_date(){
        return $this->dateCreated;
    }
 

    public static function view_playlist($owner){
        
        global $database;

    $query = "SELECT * FROM playlists WHERE owner = '$owner' ";
//    return $result = $database->query($query);
//    return $rows = mysqli_fetch_assoc($result);
       return self::query_this($query);
    }


    public function num_of_songs($id){
        
    global $database;

    $query1 = "SELECT * FROM playlist_songs WHERE playlist_id = {$id} ";
        
    $result1 = $database->query($query1);   
    return mysqli_num_rows($result1);

    }
//
// 
//    public static function playlist_songs($id){
//        
//    global $database;
//
//    $query2 = "SELECT * FROM playlist_songs WHERE playlist_id = {$id} ";
//        
//    return $result2 = self::query_this($query2);   
//
//    }

 

    
    
    
    

}


?>