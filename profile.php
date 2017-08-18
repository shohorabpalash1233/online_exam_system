<?php include 'inc/header.php'; ?>
<?php
	Session::checkSession();
	$userId = Session::get("userId");
?>
<?php
	if ($_SERVER['REQUEST_METHOD'] == 'POST'){
		$updateUser = $user->updateUserData($userId, $_POST);
	}
?>
<style type="text/css" media="screen">
	.profile{
		width: 530px;
		margin: 0 auto;
		border: 1px solid #ddd;
		padding: 50px;
		padding-top: 30px;
	}
</style>

<div class="main">
<h1>Your Profile</h1>
<div class="profile">
<?php
	if (isset($updateUser)) {
		echo $updateUser;
	}
?>
	

	<form action="" method="post">
	<?php

	$getData = $user->getUserData($userId);
	if ($getData) {
		$result = $getData->fetch_assoc();

?>	
		<table class="tbl">    
			 <tr>
			   <td>Name</td>
			   <td><input name="name" type="text" value="<?php echo $result['name']; ?>"></td>
			 </tr>
			 <tr>
			   <td>Username</td>
			   <td><input name="username" type="text" value="<?php echo $result['username']; ?>"></td>
			 </tr>
			 <tr>
			   <td>Email</td>
			   <td><input name="email" type="text" value="<?php echo $result['email']; ?>"></td>
			 </tr>
			 
			 
			  <tr>
			  <td></td>
			   <td><input type="submit" value="Update">
			   </td>
			 </tr>
       </table>
       <?php 	} ?>
	   </form>
	   </div>
</div>
<?php include 'inc/footer.php'; ?>