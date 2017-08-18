<?php include 'inc/header.php'; ?>
<?php
	Session::checkSession();
?>
<style type="text/css" media="screen">
	.starttest{
		width: 590px;
		padding: 20px;
		margin: 0 auto;
		border: 1px solid #f4f4f4;
	}
	.starttest h2, h3{
		font-size: 20px;
		margin-bottom: 10px;
		padding-bottom: 10px;
		border: 1px solid #ddd;
		text-align: center;
	}
	.starttest ul{
		margin: 0;
		padding: 0;
		list-style: none;
	}
	.starttest ul li{
		margin-top: 5px;
	}
	.starttest a{
		display: block;
		margin-top: 10px;
		border: 1px solid #ddd;
		background: #f4f4f4;
		text-decoration: none;
		padding: 6px 10px;
		text-align: center;
		color: #444; 
	}
</style>
<div class="main">
<h1>You are done!</h1>
	<div class="starttest">
		<h2>Congrats! You have just completed the test.</h2>
		<h3>Final Score: 
			<?php
				if (isset($_SESSION['score'])) {
					echo $_SESSION['score'];
					unset($_SESSION['score']);
				}
			?>
		</h3>

		<a href="viewans.php" title="">View Answer</a>
		<a href="starttest.php" title="">Start Again</a>
	</div>
	
  </div>
<?php include 'inc/footer.php'; ?>