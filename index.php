<?php include("includes/header.php"); ?>
<?php include("includes/header2.php"); ?>
       
<h1 class="pageHeadingBig">You Might Also Like</h1>
<div class="gridViewContainer">
<?php
//    
//    $query  = "SELECT * FROM albums ORDER BY RAND() LIMIT 10";
//    $result =  mysqli_query($database->conn, $query);
//    
//    while($rows = mysqli_fetch_assoc($result)){
//
//     $title = $rows['title'];
//     $image = $rows['image'];
//     $id    = $rows['id'];
    
    
    
    $albums = Albums::view_rand();    
    foreach($albums as $album) :
    
?>

	<div class='gridViewItem'>
        
    <a href="albums.php?id=<?php echo $album->id; ?>">
    <img src="<?php echo $album->image; ?>">
    <div class='gridViewInfo'><?php echo ucwords($album->title); ?></div>
        
    </a>
    </div>
    
<?php  
    endforeach;
//    }
    
?>

    </div>


<?php include("includes/footer2.php"); ?>
<?php include("includes/footer.php"); ?>
