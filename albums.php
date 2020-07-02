<?php include("includes/header.php"); ?>
<?php include("includes/header2.php");

    isset($_GET['id']) ? $album_id = $_GET['id'] : false;

    $albums = Albums::view_id($album_id); 
    $artist = $albums->artist;

    $artist_name = Artists::view_id($artist);
    $artist_name->name;

?>
       

<div class="entityInfo">

	<div class="leftSection">
		<img src="<?php echo $albums->image; ?>">
	</div>

	<div class="rightSection">
		<h2><?php echo ucwords($albums->title); ?></h2>
		<p>By <a href="artists.php?id=<?php echo $artist_name->id; ?>"> <?php echo ucwords($artist_name->name); ?></a></p>
		<p><?php echo $albums->num_of_songs($album_id); ?> songs</p>
	</div>
</div>

<div class="tracklistContainer">
	<ul class="tracklist">
		
<?php
        
$songs = Songs::name_of_songs($album_id);
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




<?php include("includes/footer2.php"); ?>
<?php include("includes/footer.php"); ?>
