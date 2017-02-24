<?php 
	$filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/Database.php');
	include_once ($filepath.'/../helpers/Format.php');
	
?>
   
<?php 
 
	class Driver
	{
		private $db;
		private $fm;

		public function __construct()
		{
			$this->db = new Database();
			$this->fm = new Format();
		}

	public function driverInsert($data,$file){
		$driverName = mysqli_real_escape_string($this->db->link,$data['driverName']);
		$drivingLic = mysqli_real_escape_string($this->db->link,$data['drivingLic']);
		$driverAdd	= mysqli_real_escape_string($this->db->link,$data['driverAdd']);
		$phone 		= mysqli_real_escape_string($this->db->link,$data['phone']);
		

	    $permited  = array('jpg', 'jpeg', 'png', 'gif');
	    $file_name = $file['image']['name'];
	    $file_size = $file['image']['size'];
	    $file_temp = $file['image']['tmp_name'];

	    $div = explode('.', $file_name);
	    $file_ext = strtolower(end($div));
	    $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
	    $uploaded_image = "uploads/".$unique_image;
	    if($driverName == "" || $drivingLic == "" || $driverAdd =="" || $phone =="" ){
	    	$msg="<span class='error'>Field must not be empty!</span>";
			return $msg;
			
		}

		$DLquery = "SELECT * FROM tbl_driver WHERE drivingLic='$drivingLic' LIMIT 1";
			$LicChk   = $this->db->select($DLquery);
			if ($LicChk != false) {
				$msg="<span class='error'>Driving Licencer already Exist!</span>";
				return $msg;

		}elseif ($file_size >1048567) {
		     echo "<span class='error'>Image Size should be less then 1MB!
		     </span>";

	    } elseif (in_array($file_ext, $permited) === false) {
		     echo "<span class='error'>You can upload only:-"
		     .implode(', ', $permited)."</span>";

	    }else{
	    	move_uploaded_file($file_temp, $uploaded_image);
	    	$query = "INSERT INTO tbl_driver(driverName,drivingLic,driverAdd,
	    	phone,image) VALUES('$driverName',trim('$drivingLic'),'$driverAdd',trim('$phone'),'$uploaded_image')";


		    $inserted_row = $this->db->insert($query);
			if($inserted_row){
				$msg = "<span class='success'>Driver Inserted Successfully</span>";
				return $msg;
			}else{
				$msg = "<span class='error'>Driver Not Inserted </span>";
				return $msg;
	
			}
	    }
	}


	public function  getAllDriver(){
			$query = "SELECT * FROM tbl_driver ORDER BY driverId DESC";
			$result = $this->db->select($query);
			return $result;

		}


	public function getDriverById($id){
		$query = "SELECT * FROM tbl_driver WHERE driverId = '$id'";
			$result = $this->db->select($query);
			return $result;
	}





	public function driverUpdate($data,$file,$id){
		
		
		$driverName 	= mysqli_real_escape_string($this->db->link,$data['driverName']);
		$drivingLic 	= mysqli_real_escape_string($this->db->link,$data['drivingLic']);
		$driverAdd		= mysqli_real_escape_string($this->db->link,$data['driverAdd']);
		$phone 			= mysqli_real_escape_string($this->db->link,$data['phone']);

	    $permited  = array('jpg', 'jpeg', 'png', 'gif');
	    $file_name = $file['image']['name'];
	    $file_size = $file['image']['size'];
	    $file_temp = $file['image']['tmp_name'];

	    $div = explode('.', $file_name);
	    $file_ext = strtolower(end($div));
	    $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
	    $uploaded_image = "uploads/".$unique_image;
	    if($driverName == "" || $drivingLic == "" || $driverAdd =="" || $phone ==""){
	    	$msg="<span class='error'>Field must not be empty!</span>";
			return $msg;
			
		}else{
			if (!empty($file_name)) {
				
				if ($file_size >1048567) {
				     echo "<span class='error'>Image Size should be less then 1MB!
				     </span>";

			    } elseif (in_array($file_ext, $permited) === false) {
				     echo "<span class='error'>You can upload only:-"
				     .implode(', ', $permited)."</span>";

			    }else{
			    	move_uploaded_file($file_temp, $uploaded_image);
			    	$query = "UPDATE tbl_driver
			    				SET
			    				driverName  	 = '$driverName',
			    				drivingLic 		 = '$drivingLic',
			    				driverAdd 		 = '$driverAdd',
			    				phone 			 = '$phone',
			    				image 		 	 = '$uploaded_image'
			    				WHERE driverId =  '$id'";






				    $updated_row = $this->db->update($query);
					if($updated_row){
						$msg = "<span class='success'>Driver Update Successfully</span>";
						return $msg;
					}else{
						$msg = "<span class='error'>Driver Not Updated </span>";
						return $msg;
			
					}
			    }
			    }else{
			    	$query = "UPDATE tbl_driver
			    				SET
			    				driverName  	 = '$driverName',
			    				drivingLic 		 = '$drivingLic',
			    				driverAdd 		 = '$driverAdd',
			    				phone 			 = '$phone'
			    				WHERE driverId   =  '$id'";

				    $updated_row = $this->db->update($query);
					if($updated_row){
						$msg = "<span class='success'>Driver Update Successfully</span>";
						return $msg;
					}else{
						$msg = "<span class='error'>Driver Not Updated </span>";
						return $msg;
			
					}
			    }
	
      }
  }

  	public function delDriverById($id){
  		$query = "SELECT * FROM tbl_driver WHERE driverId = '$id'";
  		$getData = $this->db->select($query);
  		if ($getData) {
  			while ($delImg = $getData->fetch_assoc()) {
  				$dellink = $delImg['image'];
  				unlink($dellink);
  			}
  		}

  		$delquery = "DELETE FROM tbl_driver WHERE driverId = '$id'";
  		$deldata = $this->db->delete($delquery);
  		if ($deldata) {
				$msg = "<span class='success'> Driver Deleted Successfully</span>";
					return $msg;
			}else{
				$msg="<span class='error'>Driver Not Deleted!</span>";
					return $msg;
			}
  	}


  	/*

  	public function getCar(){
  		// $query = "SELECT * FROM tbl_vehicle WHERE type = '2' ORDER BY vehicleId DESC";

  		$query = "SELECT tbl_vehicle.*, tbl_category.catName
					FROM tbl_vehicle
					INNER JOIN tbl_category
					ON  tbl_vehicle.catId = tbl_category.catId
					WHERE catName='Car'
					ORDER BY tbl_vehicle.vehicleId DESC";

		$result = $this->db->select($query);
		return $result;
  	}


  	*/

}

?>