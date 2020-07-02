<?php include("includes/header.php"); ?>
<?php include("includes/header2.php");

    isset($_GET['id']) ? $artist_id = $_GET['id'] : false ;

    $albums = Albums::view_id($artist_id); 

    $artist = $albums->artist;
    $artist_name = Artists::view_id($artist);
    $artist_name->name;

?>
  
  
<div class="entityInfo borderBottom">

	<div class="centerSection">

		<div class="artistInfo">

			<h1 class="artistName"><?php echo ucwords($artist_name->name); ?></h1>

			<div class="headerButtons">
				<button class="button green">PLAY</button>
			</div>

		</div>

	</div>

</div>


<div class="tracklistContainer borderBottom">
	<h2>SONGS</h2>
	<ul class="tracklist">
		
		
<?php
        
$songs = Songs::name_of_songs_limit($artist_id);
$count = 1;
foreach($songs as $song) : ?>
        
    <li class="tracklistRow">
    <div class="trackCount">
        <img class="play" src="assets/images/icons/play-white.png">
        <span class="trackNumber"><?php echo $count; ?></span>
    </div>


    <div class="trackInfo">
        <span class="trackName"><?php echo ucwords($song->title); ?></span>
        <span class="artistName"><?php echo ucwords($artist_name->name); ?></span>
    </div>

    <div class="trackOptions">
        <img class="optionsButton" src="assets/images/icons/more.png">
    </div>

    <div class="trackDuration">
        <span class="duration"><?php echo $song->duration; ?></span>
    </div>

    </li>

<?php
        
$count = $count + 1;  
        
endforeach; ?>

	</ul>
</div>


<div class="gridViewContainer">
	<h2>ALBUMS</h2>

<?php
    
    $albums = Albums::view_artist_album($artist_id);    
    foreach($albums as $album) :
    
?>

	<div class='gridViewItem'>
        
    <a href="albums.php?id=<?php echo $album->id; ?>">
    <img src="<?php echo $album->image; ?>">
    <div class='gridViewInfo'><?php echo ucwords($album->title); ?></div>
        
    </a>
    </div>
    
<?php  endforeach; ?>

    </div>


<?php include("includes/footer2.php"); ?>
<?php include("includes/footer.php"); ?>
