
<?php
if(isset($_SESSION['username'])){
   $user_login = $_SESSION['username'] ;
    echo "<script>user_login = '$user_login' </script>";
}else{
    redirect("register.php");
}
?>

	<div id="mainContainer">

		<div id="topContainer">


           <?php include("includes/nav.php"); ?>
                
                <div id="mainViewContainer">
                    
                    <div id="mainContent">
                        
      