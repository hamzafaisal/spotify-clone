<?php require_once("../init.php"); ?>

<?php

if(isset($_POST['id'])) {
    
$delete = $_POST['id'];

$query = "DELETE FROM playlists WHERE id = $delete ";
$result = mysqli_query($database->conn, $query);
 
$query2 = "DELETE FROM playlist_songs WHERE playlist_id = $delete ";
$result2 = mysqli_query($database->conn, $query2);
    


}
else {
	echo "Name or username parameters not passed into file";
}

?>


