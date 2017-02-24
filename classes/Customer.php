<?php 
	$filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/Database.php');
	include_once ($filepath.'/../helpers/Format.php');
?>
    
 
<?php 
	/**
	* 
	*/
	class Customer{
		private $db;
		private $fm;

		public function __construct()
		{
			$this->db = new Database();
			$this->fm = new Format();
		}

		public function customerRegistration($data){
			$name = mysqli_real_escape_string($this->db->link,$data['name']);
			$phone = mysqli_real_escape_string($this->db->link,$data['phone']);
			$email = mysqli_real_escape_string($this->db->link,$data['email']);
			$regCombo = mysqli_real_escape_string($this->db->link,$data['regCombo']);
			$address = mysqli_real_escape_string($this->db->link,$data['address']);
			$city = mysqli_real_escape_string($this->db->link,$data['city']);
			$pass = mysqli_real_escape_string($this->db->link, md5($data['pass']));
			$conPass = mysqli_real_escape_string($this->db->link,md5($data['conPass']));

			if($name == "" || $phone == "" || $email =="" || $regCombo =="" || $address =="" || $city =="" || $pass =="" || $conPass =="" ){
	    	$msg="<span class='error'>Field must not be empty!</span>";
			return $msg;
			}

			if($pass != $conPass){
				$msg="<span class='error'>Password doesn't match!</span>";
				return $msg;
			}

			$mailquery = "SELECT * FROM tbl_customer WHERE email='$email' LIMIT 1";
			$mailchk   = $this->db->select($mailquery);
			if ($mailchk != false) {
				$msg="<span class='error'>Email already Exist!</span>";
				return $msg;
			}elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			    $msg="<span class='error'>Please enter a valid email!</span>";
				return $msg;

			}else{
				$query = "INSERT INTO tbl_customer(name,phone,email,regCombo,address,city,pass) VALUES('$name','$phone','$email','$regCombo','$address','$city','$pass')";


		    $inserted_row = $this->db->insert($query);
			if($inserted_row){
				$msg = "<span class='success'>Customer Data Insert Successfully</span>";
				return $msg;
			}else{
				$msg = "<span class='error'>Customer Data Not Inserted </span>";
				return $msg;
	
			}
			}

		}

		public function customerLogin($data){ //u can chose any name instead of $data
			$email = mysqli_real_escape_string($this->db->link,$data['email']);
			$pass  = mysqli_real_escape_string($this->db->link, md5($data['pass']));
			if (empty($email) || empty($pass)) {
				$msg="<span class='error'>Field must not be empty!</span>";
				return $msg;
			}
			$query = "SELECT * FROM tbl_customer WHERE email='$email' AND pass = '$pass'";
			$result = $this->db->select($query);
			if ($result != false) {
				$value = $result->fetch_assoc();
				Session::set("cuslogin",true);
				Session::set("cusId",$value['id']);
				Session::set("cusName",$value['name']);
				header("Location:reserve.php");
			}else{
				$msg="<span class='error'>Email or Password Not match!</span>";
				return $msg;
			}

		}

		public function getCustomerData($id){
			$query = "SELECT * FROM tbl_customer WHERE id='$id'";
			$result = $this->db->select($query);
			return $result;
		}

		public function customerUpdate($data,$cusId){
			$name = mysqli_real_escape_string($this->db->link,$data['name']);
			$phone = mysqli_real_escape_string($this->db->link,$data['phone']);
			$email = mysqli_real_escape_string($this->db->link,$data['email']);
			$address = mysqli_real_escape_string($this->db->link,$data['address']);
			$city = mysqli_real_escape_string($this->db->link,$data['city']);

			if($name == "" || $phone == "" || $email =="" || $address =="" || $city ==""){
	    	$msg="<span class='error'>Field must not be empty!</span>";
			return $msg;
			}else{
		
				$query = "UPDATE tbl_customer
				SET
				name 		= '$name',
				phone 		= '$phone',
				email 		= '$email',
				address 	= '$address',
				city 		= '$city'
				WHERE id 	= '$cusId'";

				$updated_row = $this->db->update($query);

				if($updated_row){
					$msg = "<span class='success'>Customer Details Updated Successfully</span>";
					return $msg;
				}else{
					$msg="<span class='error'>Customer Deails Not Updated!</span>";
					return $msg;
				}
			}
			
	}

/*-------------------------------------------------
ADD NEW ADMIN CLASS
-------------------------------------------------*/

	public function adminRegistration($data){
			$adminName = mysqli_real_escape_string($this->db->link,$data['adminName']);
			$adminUser = mysqli_real_escape_string($this->db->link,$data['adminUser']);
			$adminEmail = mysqli_real_escape_string($this->db->link,$data['adminEmail']);
			$adminPass = mysqli_real_escape_string($this->db->link, md5($data['adminPass']));
			$conPass = mysqli_real_escape_string($this->db->link,md5($data['conPass']));

			if($adminName == "" || $adminUser == "" || $adminEmail =="" || $adminPass =="" || $conPass =="" ){
	    	$msg="<span class='error'>Field must not be empty!</span>";
			return $msg;
			}

			if($adminPass != $conPass){
				$msg="<span class='error'>Password doesn't match!</span>";
				return $msg;
			}

			$usernameQuery = "SELECT * FROM tbl_admin WHERE adminUser='$adminUser' LIMIT 1";
			$unameCheck   = $this->db->select($usernameQuery);
			if ($unameCheck != false) {
				$msg="<span class='error'>Username already Exist!</span>";
				return $msg;
			}

			$mailquery = "SELECT * FROM tbl_admin WHERE adminEmail='$adminEmail' LIMIT 1";
			$mailchk   = $this->db->select($mailquery);
			if ($mailchk != false) {
				$msg="<span class='error'>Email already Exist!</span>";
				return $msg;
			}elseif (!filter_var($adminEmail, FILTER_VALIDATE_EMAIL)) {
			    $msg="<span class='error'>Please enter a valid email!</span>";
				return $msg;

			}else{
				$query = "INSERT INTO tbl_admin(adminName,adminUser,adminEmail,adminPass) VALUES('$adminName','$adminUser','$adminEmail','$adminPass')";


		    $inserted_row = $this->db->insert($query);
			if($inserted_row){
				$msg = "<span class='success'>New Admin Insert Successfully</span>";
				return $msg;
			}else{
				$msg = "<span class='error'>New Admin Not Inserted </span>";
				return $msg;
	
			}
			}

		}

/*-------------------------------------------------
ADMIN PASSWORD CHANGE CLASS
-------------------------------------------------*/
  
/*		public function changePassword($data,$id){
			$oldPass = mysqli_real_escape_string($this->db->link, md5($data['oldPass']));
			$newPass = mysqli_real_escape_string($this->db->link,md5($data['newPass']));

			if($oldPass == "" || $newPass == ""){
	    	$msg="<span class='error'>Field must not be empty!</span>";
			return $msg;
			}
			$passQuery = "SELECT * FROM tbl_admin WHERE adminPass='$oldPass' LIMIT 1";
			$passChk   = $this->db->select($passQuery);
			if ($passChk != $oldPass) {
				$msg="<span class='error'>Old Password doesn't match!</span>";
				return $msg;
			}else{
		
				$query = "UPDATE tbl_admin
				SET
				adminPass 		= '$newPass',
				WHERE adminId 	= '$adminId'";

				$updated_row = $this->db->update($query);

				if($updated_row){
					$msg = "<span class='success'>Password change Successfully</span>";
					return $msg;
				}else{
					$msg="<span class='error'>Password not changed!</span>";
					return $msg;
				}
			}
			
	}
*/
	


	}


 ?>