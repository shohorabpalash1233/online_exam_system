<?php
	/**
	* User Class
	*/

    $filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/Database.php');
	include_once ($filepath.'/../helpers/Format.php');

	class User
	{	
		private $db;
		private $fm;
		
		function __construct()
		{
			$this->db = new Database();
			$this->fm = new Format();
		}



		public function getAdminData($data){
			$adminUser = $this->fm->validation($data['adminUser']);
			$adminPass = $this->fm->validation($data['adminPass']);

			$adminUser = mysqli_real_escape_string($this->db->link, $adminUser);
			$adminPass = mysqli_real_escape_string($this->db->link, md5($adminPass));

		}

		public function getAllUser(){
			$query = "SELECT * FROM tbl_user ORDER BY userId DESC";
			$result = $this->db->select($query);
			return $result;
		}

		public function disableUser($disable){
			$query = "UPDATE tbl_user
					  SET
					  status = '1' 
					  WHERE userId = '$disable' ";
			$update = $this->db->update($query);
			if ($update) {
				$msg = "<span class='success'>User disabled!</span>";
				return $msg;
			}else{
				$msg = "<span class='error'>User Not disabled!</span>";
				return $msg;
			}
		}

		public function enableUser($enable){
			$query = "UPDATE tbl_user
					  SET
					  status = '0' 
					  WHERE userId = '$enable' ";
			$update = $this->db->update($query);
			if ($update) {
				$msg = "<span class='success'>User enabled!</span>";
				return $msg;
			}else{
				$msg = "<span class='error'>User Not enabled!</span>";
				return $msg;
			}
		}

		public function removeUser($remove){
			$query = "DELETE FROM tbl_user
					  WHERE userId = '$remove' ";
			$update = $this->db->delete($query);
			if ($update) {
				$msg = "<span class='success'>User removed!</span>";
				return $msg;
			}else{
				$msg = "<span class='error'>User Not removed!</span>";
				return $msg;
			}
		}
	}
?>