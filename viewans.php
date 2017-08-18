<?php include 'inc/header.php'; ?>
<?php
	Session::checkSession();
	$total = $exam->getTotalRows();
?>
<style type="text/css" media="screen">
		.test a{
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
<h1>All Question & Ans: <?php echo $total; ?></h1>
	<div class="test">

		<table> 
		<?php
			$getQues = $exam->getQuestionByOrder();
			if ($getQues) {
				while ($question = $getQues->fetch_assoc()) {
				
		?>
			<tr>
				<td colspan="2">
				 <h3>Que <?php echo $question['quesNo']; ?>: <?php echo $question['ques']; ?></h3>
				</td>
			</tr>
			<?php
				$number = $question['quesNo'];
				$answer = $exam->getAnswer($number);
				if ($answer) {
					while ($result = $answer->fetch_assoc()) {	
			?>
			<tr>
				<td>
				 <input type="radio" ?>
				 	<?php 
				 		if ($result['rightAns'] == '1') {
				 			echo "<span style='color: red';>".$result['ans']."</span>";
				 		}else{
				 			echo $result['ans'];
				 		}
				 	 ?>
				</td>
			</tr>
			<?php
				}
					}
			?>
			<?php
				}
					}
			?>
			
		</table>
		<a href="starttest.php" title="">Start Again</a>
</div>
 </div>
<?php include 'inc/footer.php'; ?>