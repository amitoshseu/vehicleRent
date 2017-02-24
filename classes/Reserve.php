<?php 
	$filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/Database.php');
	include_once ($filepath.'/../helpers/Format.php');
	
?>
   
 
<?php 
	/**
	* 
	*/
	class Reserve{
		private $db;
		private $fm;

		public function __construct()
		{
			$this->db = new Database();
			$this->fm = new Format();
		}

		public function addToReserve($data,$id){
		$vehicleId	   = mysqli_real_escape_string($this->db->link,$id);
		$sId		   = session_id();
		$tryTrip	   = mysqli_real_escape_string($this->db->link,$data['tryTrip']);
		$vehicleNumber = mysqli_real_escape_string($this->db->link,$data['vehicleNumber']);
		$datePick 	   = mysqli_real_escape_string($this->db->link,$data['datePick']);
		$timePick 	   = mysqli_real_escape_string($this->db->link,$data['timePick']);
		$pickAdd	   = mysqli_real_escape_string($this->db->link,$data['pickAdd']);
		$endAdd	 	   = mysqli_real_escape_string($this->db->link,$data['endAdd']);
		
		$squery = "SELECT * FROM tbl_vehicle WHERE vehicleId = '$vehicleId'";
		$result = $this->db->select($squery)->fetch_assoc();
		
		$vehicleName = $result['vehicleName'];
		$rate 		 = $result['rate'];
		$image		 = $result['image'];

		$chquery = "SELECT * FROM tbl_reserve WHERE vehicleId = '$vehicleId' AND sId='$sId'";
		$getVehi = $this->db->select($chquery);
		if($getVehi){
			$msg = "*Vehicle Already In Reserve List!";
			return $msg;
		}else{

		$query = "INSERT INTO tbl_reserve(sId,vehicleId,vehicleName,
	    	tryTrip,vehicleNumber,datePick,timePick,pickAdd,endAdd,rate,image) VALUES('$sId','$vehicleId','$vehicleName','
	    	$tryTrip','$vehicleNumber','$datePick','$timePick','$pickAdd','$endAdd','$rate','$image')";


		    $inserted_row = $this->db->insert($query);
			if($inserted_row){
				header("Location:reserve.php");
			}else{
				header("Location:404.php");
			}
		}

		}

		public function getReserveVehicle(){
			$sId= session_id();
			$query = "SELECT * FROM tbl_reserve WHERE sId = '$sId'";
			$result = $this->db->select($query);
			return $result;
		}

		public function delVehicleByReserve($delId){
			$delId	   = mysqli_real_escape_string($this->db->link,$delId);
			$query = "DELETE FROM  tbl_reserve WHERE reserveId='$delId'";
			$deldata = $this->db->delete($query);
			if ($deldata) {
				echo "<script>window.location = 'reserve.php'</script>";
			}else{
				$msg="<span class='error'> Vehicle Not Deleted!</span>";
				return $msg;
			}
		}

		public function checkReserveTable(){
			$sId= session_id();
			$query = "SELECT * FROM tbl_reserve WHERE sId = '$sId'";
			$result = $this->db->select($query);
			return $result;
		}

		public function delCustomerReservation(){
			$sId= session_id();
			$query = "DELETE FROM tbl_reserve WHERE sId='$sId'";
			$this->db->delete($query);
		}

		public function bookVehicle($cusId){
			$sId= session_id();
			$query = "SELECT * FROM tbl_reserve WHERE sId = '$sId'";
			$getVehi = $this->db->select($query);
			if ($getVehi) {
				while ($result = $getVehi->fetch_assoc()) {
					$vehicleId = $result['vehicleId'];
					$vehicleName = $result['vehicleName'];
					$tryTrip = $result['tryTrip'];
					$vehicleNumber = $result['vehicleNumber'];
					$datePick = $result['datePick'];
					$timePick = $result['timePick'];
					$pickAdd = $result['pickAdd'];
					$endAdd = $result['endAdd'];
					$rate = $result['rate'] * $tryTrip * $vehicleNumber;
					$image = $result['image'];

					$query = "INSERT INTO tbl_booking(cusId,vehicleId,vehicleName,tryTrip,pickAdd,
					endAdd,datePick,timePick,vehicleNumber,rate,image) VALUES('$cusId','$vehicleId','$vehicleName','$tryTrip','$pickAdd','$endAdd','$datePick','$timePick','$vehicleNumber','$rate','$image')";


		    $inserted_row = $this->db->insert($query);
				}
			}
		}


	   public function PayableAmount($cusId){
			$query = "SELECT rate FROM tbl_booking WHERE cusId = '$cusId' AND date = now()";
			$result = $this->db->select($query);
			return $result;
		}

		public function getBookingVehicle($cusId){
			$query = "SELECT * FROM tbl_booking WHERE cusId = '$cusId' ORDER BY date DESC";
			$result = $this->db->select($query);
			return $result;
		}

		public function checkOrder($cusId){
			$query = "SELECT * FROM tbl_booking WHERE cusId = '$cusId'";
			$result = $this->db->select($query);
			return $result;
		}


		public function instantBooking($data){
			$pickCar = mysqli_real_escape_string($this->db->link,$data['pickCar']);
			$pickHire = mysqli_real_escape_string($this->db->link,$data['pickHire']);
			$address = mysqli_real_escape_string($this->db->link,$data['address']);
			$pickDate = mysqli_real_escape_string($this->db->link,$data['pickDate']);
			$pickTime = mysqli_real_escape_string($this->db->link,$data['pickTime']);
			$fName = mysqli_real_escape_string($this->db->link,$data['fName']);
			$lName = mysqli_real_escape_string($this->db->link,$data['lName']);
			$phone = mysqli_real_escape_string($this->db->link,$data['phone']);

			if($pickCar == "" || $pickHire == "" || $address =="" || $pickDate =="" || $pickTime =="" || $fName =="" || $lName =="" || $phone =="" ){
	    	$msg="<span class='error'>Field must not be empty!</span>";
			return $msg;
			}elseif(!preg_match('/^[0-1]{2}[0-9]{9}$/',$phone)){
				$msg="<span class='error'>Please enter a valid phone number!</span>";
				return $msg;
			}else{
				$query = "INSERT INTO tbl_quickBooking(pickCar,pickHire,address,pickDate,pickTime,fName,lName,phone) VALUES('$pickCar','$pickHire','$address','$pickDate','$pickTime','$fName','$lName','$phone')";


		    $inserted_row = $this->db->insert($query);
			if($inserted_row){
				$msg = "<span class='success'>Booking Request received.We will contact with you ASAP</span>";
				return $msg;
			}else{
				$msg = "<span class='error'>Booking request failed.Please input valid data</span>";
				return $msg;
	
			}
			}
		}


		public function getAllMonthReport(){
			$query = "SELECT * FROM tbl_booking  WHERE date >= '2017-01-01T00:00:00.000' AND date <= '2017-01-31T00:00:00.000' AND status ='2' ";
			$result = $this->db->select($query);
			return $result;
		}

		public function getYearReport(){
			$query = "SELECT * FROM tbl_booking  WHERE date >= '2017-01-01T00:00:00.000' AND date <= '2017-12-31T00:00:00.000' AND status ='2' ";
			$result = $this->db->select($query);
			return $result;
		}


	}


 ?>