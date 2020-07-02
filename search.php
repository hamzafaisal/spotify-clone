 <?php include("includes/header.php"); ?>
<?php include("includes/header2.php"); 

if(isset($_GET['term'])){
    
    $term = urldecode($_GET['term']);

}else{
    $term = "";
}

?>



<div class="searchContainer">

	<h4>Search for an artist, album or song</h4>
	<input type="text" class="searchInput" onfocus="this.value = this.value" 
	value="<?php echo $term; ?>" placeholder="Start typing..." 
	>

</div>
<script>
    
$(".searchInput").focus();

$(function(){
    
 $(".searchInput").keyup(function(){
     clearTimeout(timer);
     
     timer = setTimeout(function(){
        var val = $(".searchInput").val();
        openPage("search.php?term=" + val);         

     }, 1000 );
     
     
 });
    
});

</script>

<?php if($term == "") exit(); ?>

<div class="tracklistContainer borderBottom">
	<h2>SONGS</h2>
	<ul class="tracklist">
		
		
<?php
        
$songs = Songs::search_songs($term);
    
    if(empty($songs)){
      
       echo  "<span class='noResult'> No Results Found For " . ucwords($term) .  "...</span>";

        
    }
            
$count = 1;
foreach($songs as $song) : ?>
        
    <li class="tracklistRow">
    <div class="trackCount">
        <img class="play" src="assets/images/icons/play-white.png">
        <span class="trackNumber"><?php echo $count; ?></span>
    </div>


    <div class="trackInfo">
        <span class="trackName"><?php echo ucwords($song->title); ?></span>
        <span class="artistName">
        <?php
            
            $song->artist;
            $artist_name = Artists::view_id($song->artist);
            echo $artist_name->name;

        ?>    
        </span>
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


<div class="artistsContainer borderBottom">

	<h2>ARTISTS</h2>

<?php
    
    $artists = Artists::search_artists($term);
    
    if(empty($artists)){
      
       echo  "<span class='noResult'> No Results Found For " . ucwords($term) .  "...</span>";

        
    }
    
    foreach($artists as $artist) :
    
?>

<div class='searchResultRow'>
    <div class='artistName'>

<span><a style="text-decoration:none;" href="artists.php?id=<?php echo $artist->id; ?>"><?php echo ucwords($artist->name); ?></a>  </span>

    </div>
</div>


<?php endforeach;  ?>

</div>




<div class="gridViewContainer">
	<h2>ALBUMS</h2>

<?php
    
    $albums = Albums::search_album($term);
    
        
    if(empty($albums)){
      
    echo  "<span class='noResult'> No Results Found For " . ucwords($term) .  "...</span>";
        
    }
    
    
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


