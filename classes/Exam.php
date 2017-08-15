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
	}
?>