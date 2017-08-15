<?php 
    $filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/inc/header.php');
	include_once ($filepath.'/../classes/Exam.php');
	$exam = new Exam();
?>	
<?php
	if (isset($_GET['rem'])) {
		$quesNo = (int)$_GET['rem'];
		$removeQuestion = $exam->removeQuestionByID($quesNo);
	}
?>
<div class="main">
<h1>Admin Panel - Question List</h1>
<?php
	if (isset($removeQuestion)) {
		echo $removeQuestion;
	}
?>
<div class="quelist">
	<table class="tblone">
		<thead>
			<tr>
				<th width="5%">No.</th>
				<th width="85%">Questions</th>
				<th width="10%">Action</th>
			</tr>
		</thead>
		<?php
			$getData = $exam->getQuestionByOrder();
			if ($getData) {
				$i = 0;
				while ($result = $getData->fetch_assoc()) {
					$i++;	
		?>
		<tbody>
			<tr>
				<td><?php echo $i; ?></td>
				<td><?php echo $result['ques']; ?></td>
				<td>
<a onclick="return confirm('Are You Sure To Remove?')" href="?rem=<?php echo $result['quesNo']; ?>">Remove</a>
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