<?php include 'inc/header.php'; ?>
<?php
	Session::checkSession();
	$question = $exam->getQuestion();
	$total = $exam->getTotalRows();
?>
<style type="text/css" media="screen">
	.starttest{
		width: 590px;
		padding: 20px;
		margin: 0 auto;
		border: 1px solid #f4f4f4;
	}
	.starttest h2{
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
		<h1>Welcome to Online Exam - Start Now</h1>
		<div class="starttest">
			<h2>Test Your Knowledge</h2>
			<p>This is multiple choice quiz to test your knowledge</p>
			<ul>
				<li><strong>Number of Questions: </strong><?php echo $total; ?></li>
				<li><strong>Question Type: </strong>Multiple Choice</li>
			</ul>
			<a href="test.php?q=<?php echo $question['quesNo']?>" title="">Start Test</a>
		</div>
	
  	</div>
<?php include 'inc/footer.php'; ?>