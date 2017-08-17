<?php
	/**
	* User Class
	*/

    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath.'/../lib/Session.php');
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



		public function userRegistration($name, $username, $password, $email){
			$name 		= $this->fm->validation($name);
			$username 	= $this->fm->validation($username);
			$password 	= $this->fm->validation($password);
			$email 		= $this->fm->validation($email);

			$name 		= mysqli_real_escape_string($this->db->link, $name);
			$username 	= mysqli_real_escape_string($this->db->link, $username);
			$password 	= mysqli_real_escape_string($this->db->link, md5($password));
			$email 		= mysqli_real_escape_string($this->db->link, $email);

			if ($name == '' || $username == '' || $password == '' || $email == '') {
				echo "<span class='error'>Field Must Not Be Empty!</span>";
				exit();
			}else if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
				echo "<span class='error'>Invalid Email Address!</span>";
				exit();
			}else{
				$checkQuery = "SELECT * FROM tbl_user WHERE email = '$email' ";
				$chkResult = $this->db->select($checkQuery);
				if ($chkResult != false) {
					echo "<span class='error'>Email Address Already Exists!</span>";
					exit();
				}else{
					$query = "INSERT INTO tbl_user(name, username, password, email) VALUES ('$name', '$username', 
					'$password', '$email')";
					$insertRow = $this->db->insert($query);
					if ($insertRow) {
						echo "<span class='success'>Registration Successful!</span>";
						exit();
					}else{
						echo "<span class='error'>Error! Not Registered!</span>";
						exit();
					}
				}
			}

		}

		public function userLogin($email, $password){
			$password 	= $this->fm->validation($password);
			$email 		= $this->fm->validation($email);

			$password 	= mysqli_real_escape_string($this->db->link, $password);
			$email 		= mysqli_real_escape_string($this->db->link, $email);
			if ($email == '' || $password == '') {
				echo "empty";
				exit();
			}else{
				$query = "SELECT * FROM tbl_user WHERE email = '$email' AND password = '$password' ";
				$result = $this->db->select($query);
				if ($result != false) {
					$value = $result->fetch_assoc();
					if ($value['status'] == '1') {
						echo "disabled";
						exit();
					}else{
						Session::init();
						Session::set('login', true);
						Session::set('userId', $value['userId']);
						Session::set('name', $value['name']);
						Session::set('username', $value['username']);
					}
				}else{
					echo "error";
					exit();
				}
			}
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