<?php 
	$filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/Database.php');
	include_once ($filepath.'/../helpers/Format.php');
	
?>
   

<?php 

	class Vehicle
	{
		private $db;
		private $fm;

		public function __construct()
		{
			$this->db = new Database();
			$this->fm = new Format();
		}

	public function vehicleInsert($data,$file){
		$vehicleName = mysqli_real_escape_string($this->db->link,$data['vehicleName']);
		$catId 		 = mysqli_real_escape_string($this->db->link,$data['catId']);
		$brandId	 = mysqli_real_escape_string($this->db->link,$data['brandId']);
		$body 		 = mysqli_real_escape_string($this->db->link,$data['body']);
		$rate		 = mysqli_real_escape_string($this->db->link,$data['rate']);
		$rateDay	 = mysqli_real_escape_string($this->db->link,$data['rateDay']);
		$rateAirport = mysqli_real_escape_string($this->db->link,$data['rateAirport']);
		$seat 		 = mysqli_real_escape_string($this->db->link,$data['seat']);
		$vehiCondition = mysqli_real_escape_string($this->db->link,$data['vehiCondition']);
		$type		   = mysqli_real_escape_string($this->db->link,$data['type']);


	    $permited  = array('jpg', 'jpeg', 'png', 'gif');
	    $file_name = $file['image']['name'];
	    $file_size = $file['image']['size'];
	    $file_temp = $file['image']['tmp_name'];

	    $div = explode('.', $file_name);
	    $file_ext = strtolower(end($div));
	    $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
	    $uploaded_image = "uploads/".$unique_image;
	    if($vehicleName == "" || $catId == "" || $brandId =="" || $body =="" || $rate =="" || $rateDay =="" || $rateAirport =="" || $seat =="" || $vehiCondition =="" || $file_name =="" || $type =="" ){
	    	$msg="<span class='error'>Field must not be empty!</span>";
			return $msg;
			
		}elseif ($file_size >1048567) {
		     echo "<span class='error'>Image Size should be less then 1MB!
		     </span>";

	    } elseif (in_array($file_ext, $permited) === false) {
		     echo "<span class='error'>You can upload only:-"
		     .implode(', ', $permited)."</span>";

	    }else{
	    	move_uploaded_file($file_temp, $uploaded_image);
	    	$query = "INSERT INTO tbl_vehicle(vehicleName,catId,brandId,
	    	body,rate,rateDay,rateAirport,seat,vehiCondition,image,type) VALUES('$vehicleName','$catId','$brandId','
	    	$body','$rate','$rateDay','$rateAirport','$seat','$vehiCondition','$uploaded_image','$type')";


		    $inserted_row = $this->db->insert($query);
			if($inserted_row){
				$msg = "<span class='success'>Vehicle Inserted Successfully</span>";
				return $msg;
			}else{
				$msg = "<span class='error'>Vehicle Not Inserted </span>";
				return $msg;
	
			}
	    }
	}

	public function  getAllVehicle(){
			$query = "SELECT v.*, c.catName, b.brandName
					FROM tbl_vehicle as v, tbl_category as c, tbl_brand as b
					WHERE v.catId = c.catId AND v.brandId = b.brandId
					ORDER BY v.vehicleId DESC";

			// $query = "SELECT tbl_vehicle.*, tbl_category.catName, tbl_brand.brandName
			// 		FROM tbl_vehicle
			// 		INNER JOIN tbl_category
			// 		ON  tbl_vehicle.catId = tbl_category.catId
			// 		INNER JOIN tbl_brand
			// 		ON  tbl_vehicle.brandId = tbl_brand.brandId
			// 		ORDER BY tbl_vehicle.vehicleId DESC";

			$result = $this->db->select($query);
			return $result;

		}

	public function getVehicleById($id){
		$query = "SELECT * FROM tbl_vehicle WHERE vehicleId = '$id'";
			$result = $this->db->select($query);
			return $result;
	}
 
	public function vehicleUpdate($data,$file,$id){
		
		$vehicleName = mysqli_real_escape_string($this->db->link,$data['vehicleName']);
		$catId 		 = mysqli_real_escape_string($this->db->link,$data['catId']);
		$brandId	 = mysqli_real_escape_string($this->db->link,$data['brandId']);
		$body 		 = mysqli_real_escape_string($this->db->link,$data['body']);
		$rate		 = mysqli_real_escape_string($this->db->link,$data['rate']);
		$rateDay	 = mysqli_real_escape_string($this->db->link,$data['rateDay']);
		$rateAirport = mysqli_real_escape_string($this->db->link,$data['rateAirport']);
		$seat = mysqli_real_escape_string($this->db->link,$data['seat']);
		$vehiCondition = mysqli_real_escape_string($this->db->link,$data['vehiCondition']);
		$type		   = mysqli_real_escape_string($this->db->link,$data['type']);


	    $permited  = array('jpg', 'jpeg', 'png', 'gif');
	    $file_name = $file['image']['name'];
	    $file_size = $file['image']['size'];
	    $file_temp = $file['image']['tmp_name'];

	    $div = explode('.', $file_name);
	    $file_ext = strtolower(end($div));
	    $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
	    $uploaded_image = "uploads/".$unique_image;
	    if($vehicleName == "" || $catId == "" || $brandId =="" || $body =="" || $rate =="" || $rateDay =="" || $rateAirport =="" || $seat =="" || $vehiCondition =="" || $type =="" ){
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
			    	$query = "UPDATE tbl_vehicle
			    				SET
			    				vehicleName  	 = '$vehicleName',
			    				catId 			 = '$catId',
			    				brandId 		 = '$brandId',
			    				body 			 = '$body',
			    				rate 			 = '$rate',
			    				rateDay 		 = '$rateDay',
			    				rateAirport 	 = '$rateAirport',
			    				seat 	 		 = '$seat',
			    				vehiCondition 	 = '$vehiCondition',
			    				image 		 	 = '$uploaded_image',
			    				type 		 	 = '$type'
			    				WHERE vehicleId ='$id'";

				    $updated_row = $this->db->update($query);
					if($updated_row){
						$msg = "<span class='success'>Vehicle Update Successfully</span>";
						return $msg;
					}else{
						$msg = "<span class='error'>Vehicle Not Updated </span>";
						return $msg;
			
					}
			    }
			    }else{
			    	$query = "UPDATE tbl_vehicle
			    				SET
			    				vehicleName   	 = '$vehicleName',
			    				catId 		 	 = '$catId',
			    				brandId 	     = '$brandId',
			    				body 		 	 = '$body',
			    				rate 			 = '$rate',
			    				rateDay 		 = '$rateDay',
			    				rateAirport 	 = '$rateAirport',
			    				seat 	 		 = '$seat',
			    				vehiCondition 	 = '$vehiCondition',
			    				type 		 = '$type'
			    				WHERE vehicleId ='$id'";

				    $updated_row = $this->db->update($query);
					if($updated_row){
						$msg = "<span class='success'>Vehicle Update Successfully</span>";
						return $msg;
					}else{
						$msg = "<span class='error'>Vehicle Not Updated </span>";
						return $msg;
			
					}
			    }
	
      }
  }
  	public function delVehicleById($id){
  		$query = "SELECT * FROM tbl_vehicle WHERE vehicleId = '$id'";
  		$getData = $this->db->select($query);
  		if ($getData) {
  			while ($delImg = $getData->fetch_assoc()) {
  				$dellink = $delImg['image'];
  				unlink($dellink);
  			}
  		}

  		$delquery = "DELETE FROM tbl_vehicle WHERE vehicleId = '$id'";
  		$deldata = $this->db->delete($delquery);
  		if ($deldata) {
				$msg = "<span class='success'> Vehicle Deleted Successfully</span>";
					return $msg;
			}else{
				$msg="<span class='error'> Vehicle Not Deleted!</span>";
					return $msg;
			}
  	}

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

  	public function getBike(){
  		// $query = "SELECT * FROM tbl_vehicle WHERE type = '2' ORDER BY vehicleId DESC";

  		$query = "SELECT tbl_vehicle.*, tbl_category.catName
					FROM tbl_vehicle
					INNER JOIN tbl_category
					ON  tbl_vehicle.catId = tbl_category.catId
					WHERE catName='Motorbike'
					ORDER BY tbl_vehicle.vehicleId DESC";

		$result = $this->db->select($query);
		return $result;
  	}

  	public function getMinitruck(){
  		// $query = "SELECT * FROM tbl_vehicle WHERE type = '2' ORDER BY vehicleId DESC";

  		$query = "SELECT tbl_vehicle.*, tbl_category.catName
					FROM tbl_vehicle
					INNER JOIN tbl_category
					ON  tbl_vehicle.catId = tbl_category.catId
					WHERE catName='Mini Truck'
					ORDER BY tbl_vehicle.vehicleId DESC";

		$result = $this->db->select($query);
		return $result;
  	}

  	public function getSingleVehicle($id){
  		$query = "SELECT v.*, c.catName, b.brandName
					FROM tbl_vehicle as v, tbl_category as c, tbl_brand as b
					WHERE v.catId = c.catId AND v.brandId = b.brandId AND v.vehicleId = '$id'";
			
			$result = $this->db->select($query);
			return $result;
  	}

  	public function vehicleByBrand($id){ 			/* Brand wise vehicle filter*/
  		$brandId = mysqli_real_escape_string($this->db->link,$id);
  		$query = "SELECT * FROM tbl_vehicle WHERE brandId = '$brandId'";
		$result = $this->db->select($query);
		return $result;
  	}


}

?>