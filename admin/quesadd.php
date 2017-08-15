<?php 
    $filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/inc/header.php');
?>
<style type="text/css" media="screen">
	.adminpanel{
		width: 600px;
		color: #999;
		margin: 30px auto 0;
		padding: 10px;
		border: 1px solid #ddd;
	}
	.adminpanel h2{
		font-size: 30px;
		text-align: center;
	}
	.adminpanel p{
		font-size: 14px;
		text-align: center;
	}
</style>	
<div class="main">
<h1>Admin Panel - Add Question</h1>
<div class="adminpanel">
	<form action="" method="post" accept-charset="utf-8">
		<table class="tblone">
			<tbody>
				<tr>
					<td>Question No.</td>
					<td>:</td>
					<td><input type="number" name="quesNo" value="" required="required"></td>
				</tr>
				<tr>
					<td>Question</td>
					<td>:</td>
					<td><input type="text" name="ques" value="" placeholder="Enter Question" required="required"></td>
				</tr>

				<tr>
					<td>Choice One</td>
					<td>:</td>
					<td><input type="text" name="ans1" placeholder="Enter Choice One" required="required"></td>
				</tr>
				<tr>
					<td>Choice Two</td>
					<td>:</td>
					<td><input type="text" name="ans2" placeholder="Enter Choice Two" required="required"></td>
				</tr>
				<tr>
					<td>Choice Three</td>
					<td>:</td>
					<td><input type="text" name="ans3" placeholder="Enter Choice Three" required="required"></td>
				</tr>
				<tr>
					<td>Choice Four</td>
					<td>:</td>
					<td><input type="text" name="ans4" placeholder="Enter Choice Four" required="required"></td>
				</tr>
				<tr>
					<td>Correct Answer No.</td>
					<td>:</td>
					<td><input type="number" name="rightAns" required="required"></td>
				</tr>
				<tr>
					<td colspan="3" align="center">
						<input type="submit" value="Add A Question">
					</td>
				</tr>
			</tbody>
		</table>
	</form>
</div>


	
</div>
<?php include 'inc/footer.php'; ?>