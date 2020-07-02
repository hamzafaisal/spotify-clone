<?php include("includes/header.php"); ?>
<?php include("includes/header2.php"); ?>
<?php  
include("includes/init.php");

isset($_GET['name']) ? $name = $_GET['name'] : false ;

echo $name;

$query = "SELECT * FROM users WHERE username = '$name' ";
$result = mysqli_query($database->conn, $query);
$rows = mysqli_fetch_assoc($result);

$id = $rows['id'];
$email = $rows['email'];
$old_password = $rows['password'];

?>

<div class="userDetails">

	<div class="container borderBottom">
		<h2>EMAIL</h2>
		<form action="" method="post">

		<input type="text" class="email" name="email" placeholder="Email address..." value="<?php echo $email;  ?>">
		<span class="message">		    
		<?php

if(isset($_GET['update'])){
    echo "User E-mail Updated Successfully!";
}
?>
        </span>
		<button type="submit" name="edit_email" class="button">SAVE</button>
		
		
        </form>
	</div>

	<div class="container">
		<h2>PASSWORD</h2>
		
		<form action="" method="post">
		
		<input type="password" class="oldPassword" name="oldPassword" placeholder="Current password">
		<span class="message">
        <?php
        if(isset($_GET['error'])){
            echo "Old password not match!";
        }
        ?>
		</span>
		<input type="password" class="newPassword1" name="newPassword1" placeholder="New password">
		<input type="password" class="newPassword2" name="newPassword2" placeholder="Confirm password">
		<span class="message">
		<?php

if(isset($_GET['error2'])){
    echo "New passwords and Confirm password not match!";
}
if(isset($_GET['error3'])){
    echo "New passwords must be more than 6 characters long!";
}
if(isset($_GET['update1'])){
    echo "User Password Updated Successfully!";
}
?>
		</span>
		<button type="submit" name="edit_password" class="button">SAVE</button>
		
		</form>
	</div>

</div>

<?php

if(isset($_POST['edit_email'])){
    
$email = $_POST['email'];
$query2 = "UPDATE users SET email = '$email' WHERE id = {$id} ";
$result2 = mysqli_query($database->conn, $query2);
  
    redirect("details.php?name=$name&update");
}


if(isset($_POST['edit_password'])){
    
$oldPassword = md5($_POST['oldPassword']);
$newPassword1 = $_POST['newPassword1'];
$newPassword2 = $_POST['newPassword2'];
    
if($old_password != $oldPassword){
    redirect("details.php?name=$name&error");
}    
elseif($newPassword1 != $newPassword2){
    
    redirect("details.php?name=$name&error2");
    
}elseif(strlen($newPassword1) < 6 ){
    
    redirect("details.php?name=$name&error3");
    
}else{
    
$hashPassword = md5($_POST['newPassword1']);
    
$query3 = "UPDATE users SET password = '$hashPassword' WHERE id = {$id} ";
$result3 = mysqli_query($database->conn, $query3);
  
    redirect("details.php?name=$name&update1");
}

}
?>














<?php include("includes/footer2.php"); ?>
<?php include("includes/footer.php"); ?>