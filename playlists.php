<?php include("includes/header.php"); ?>
<?php include("includes/header2.php");

    isset($_GET['id']) ? $playlist_id = $_GET['id'] : false ;

//    $playlists = new Playlists($database->conn, $playlist_id); 


$playlists = Playlists::view_id($playlist_id);

?>
       

<div class="entityInfo">

	<div class="leftSection">
		<img src="assets/images/icons/playlist.png">
	</div>

	<div class="rightSection">
   
    <h2><?php echo ucwords($playlists->name); ?></h2>
    <p>By <?php echo ucwords($playlists->owner); ?></p>
    <p><?php echo $playlists->num_of_songs($playlist_id); ?> songs</p>
    <button class="button" onclick="deletePlaylist(<?php echo $playlist_id; ?>)">DELETE PLAYLIST</button>
	
	</div>
</div>

<div class="tracklistContainer">
	<ul class="tracklist">
		
<?php
        
$playlist_songs = Playlists_songs::playlist_songs($playlist_id);
$count = 1;
foreach($playlist_songs as $playlist_song) : 
        ?>
        
    <li class="tracklistRow">
    <div class="trackCount">
        <img class="play" src="assets/images/icons/play-white.png">
        <span class="trackNumber"><?php echo $count; ?></span>
    </div>


    <div class="trackInfo">
        <span class="trackName">
        <?php
          
    $song_name = Songs::view_id($playlist_song->song_id);
    echo ucwords($song_name->title);            
            
         ?>
        </span>
        
        <span class="artistName">
        <?php
            
    $artist_name = Artists::view_id($song_name->artist);
    echo ucwords($artist_name->name);            
            
        ?>
        </span>
    </div>

    <div class="trackOptions">
        <img class="optionsButton" src="assets/images/icons/more.png">
    </div>

    <div class="trackDuration">
        <span class="duration">
         <?php
          
    $song_name = Songs::view_id($playlist_song->song_id);
    echo $song_name->duration;            
            
         ?>
        </span>
    </div>

    </li>

<?php
        
$count = $count + 1;  
        
endforeach; 
        ?>

	</ul>
</div>




<?php include("includes/footer2.php"); ?>
<?php include("includes/footer.php"); ?>
