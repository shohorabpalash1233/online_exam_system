<?php 
    $filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/inc/header.php');
	include_once ($filepath.'/../classes/User.php');
	$user = new User();
?>	
<?php
	if (isset($_GET['dis'])) {
		$disable = (int)$_GET['dis'];
		$disableUser = $user->disableUser($disable);
	}

	if (isset($_GET['ena'])) {
		$enable = (int)$_GET['ena'];
		$enableUser = $user->enableUser($enable);
	}

	if (isset($_GET['rem'])) {
		$remove = (int)$_GET['rem'];
		$removeUser = $user->removeUser($remove);
	}
?>

<div class="main">
<h1>Admin Panel - Manage Users</h1>
<?php
	if (isset($disableUser)) {
		echo $disableUser;
	}
	if (isset($enableUser)) {
		echo $enableUser;
	}
	if (isset($removeUser)) {
		echo $removeUser;
	}
?>
<div class="manageuser">
	<table class="tblone">
		<thead>
			<tr>
				<th>No.</th>
				<th>Name</th>
				<th>Username</th>
				<th>Email</th>
				<th>Action</th>
			</tr>
		</thead>
		<?php
			$getUser = $user->getAllUser();
			if ($getUser) {
				$i = 0;
				while ($result = $getUser->fetch_assoc()) {
					$i++;
				
		?>
		<tbody>
			<tr>
				<td>
					<?php 
						if ($result['status'] == '1') {
							echo "<span class='error'>"."<strong>".$i."</strong>"."</span>";
						}else{
							echo $i;
						}
					?>
				</td>
				<td><?php echo $result['name']; ?></td>
				<td><?php echo $result['username']; ?></td>
				<td><?php echo $result['email']; ?></td>
				<td>
				<?php
					if ($result['status'] == '0') {
						?>
		<a onclick="return confirm('Are You Sure To Disable?')" href="?dis=<?php echo $result['userId']; ?>">Disable</a>
						<?php
					} else {
						?>
		<a onclick="return confirm('Are You Sure To Enable?')" href="?ena=<?php echo $result['userId']; ?>">Enable</a>				
						<?php
					}
				?>
		
		
		|| <a onclick="return confirm('Are You Sure To Remove?')" href="?rem=<?php echo $result['userId']; ?>">Remove</a>
				</td>
			</tr>
		</tbody>
		<?php
			}
			}
		?>
	</table>
</div>


	
</div>
<?php include 'inc/footer.php'; ?>