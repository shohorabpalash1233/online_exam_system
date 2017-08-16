<?php
	/**
	* Exam Class
	*/

    $filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/Database.php');
	include_once ($filepath.'/../helpers/Format.php');

	class Exam
	{	
		private $db;
		private $fm;
		
		function __construct()
		{
			$this->db = new Database();
			$this->fm = new Format();
		}

		public function addQuestion($data){
			$quesNo = mysqli_real_escape_string($this->db->link, $data['quesNo']);
			$ques = mysqli_real_escape_string($this->db->link, $data['ques']);

			$ans = array();
			$ans[1] = $data['ans1'];
			$ans[2] = $data['ans2'];
			$ans[3] = $data['ans3'];
			$ans[4] = $data['ans4'];

			$rightAns = $data['rightAns'];


			$query = "INSERT INTO tbl_ques(quesNo, ques) VALUES ('$quesNo', 'ques')";
			$insertRow = $this->db->insert($query);

			if ($insertRow) {
				foreach ($ans as $key => $answer) {
					if ($answer != '') {
						if ($rightAns == $key) {
							$rquery = "INSERT INTO tbl_ans(quesNo, rightAns, ans) VALUES ('$quesNo', '1', '$answer')";
							
						}else{
							$rquery = "INSERT INTO tbl_ans(quesNo, rightAns, ans) VALUES ('$quesNo', '0', '$answer')";
							
						}
						$insertRow = $this->db->insert($rquery);
						if ($insertRow) {
							continue;
						}else{
							die('Error!!!');
						}
					}
				}

				$msg = "<span class='success'>Question added successfully</span>";
			}
		}

		public function getQuestionByOrder(){
			$query = "SELECT * FROM tbl_ques ORDER BY quesNo ASC";
			$result = $this->db->select($query);
			return $result;
		}

		public function removeQuestionByID($quesNo){
			$tables = array("tbl_ques", "tbl_ans");
			foreach ($tables as $table) {
				$query = "DELETE FROM $table 
						  WHERE quesNo = '$quesNo' ";
				$delData = $this->db->delete($query);
			}
			if ($delData) {
				$msg = "<span class='success'>Data deleted successfully!</span>";
				return $msg;
			}else{
				$msg = "<span class='error'>Data not deleted!</span>";
				return $msg;
			}
			
		}

		public function getTotalRows(){
			$query 		= "SELECT * FROM tbl_ques";
			$getResult 	= $this->db->select($query);
			$total 		= $getResult->num_rows;
			return $total;
		}


	}
?>