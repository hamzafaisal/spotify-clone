<?php include("includes/header.php"); ?>
<?php include("includes/header2.php"); 

if(isset($_GET['owner'])){
    echo $owner = $_GET['owner'];
}



?>



   <div class="playlistsContainer">

	<div class="gridViewContainer">
		<h2>PLAYLISTS</h2>

		<div class="buttonItems">
			<button class="button green" onclick="createPlaylist()">NEW PLAYLIST</button>
		</div>

<?php
        
$playlists = Playlists::view_playlist($owner);
   
//while($rows = mysqli_fetch_assoc($playlists)){
        
foreach($playlists as $playlist) :

//$play = new Playlists($database->conn, $rows);
             
?>
   
   
    <div class='gridViewItem'>

    <div class='playlistImage'>
      <a href="playlists.php?id=<?php echo $playlist->id; ?>">  <img src='assets/images/icons/playlist.png'></a>
    </div>

    <div class='gridViewInfo'><?php echo ucwords($playlist->name); ?></div>

    </div>

<?php
      
      endforeach; 
        
//  }
        
?>
















<?php include("includes/footer2.php"); ?>
<?php include("includes/footer.php"); ?>
