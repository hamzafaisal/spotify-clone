<?php include("includes/header.php"); ?>
<?php include("includes/header2.php"); ?>
<?php  
include("includes/init.php");

    isset($_GET['name']) ? $name = $_GET['name'] : false ;
?>
    <div class="entityInfo">

	<div class="centerSection">
		<div class="userInfo">
			<h1><?php echo ucwords($name);  ?></h1>
		</div>
	</div>

	<div class="buttonItems">
		<a style="text-decoration:none;" href="details.php?name=
		<?php echo $name;  ?>">
		<button  type="submit" name="details" class="button" >USER DETAILS</button></a>
		
		<form action="setting.php" method="post">
		<button type="submit" name="logout" class="button" >LOGOUT</button></form>
		
	</div>

</div>

<?php

if(isset($_POST['logout'])){
    
    session_destroy();
    session_unset();
    redirect("register.php");    
}

?>





<?php include("includes/footer2.php"); ?>
<?php include("includes/footer.php"); ?>