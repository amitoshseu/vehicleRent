<?php 
	$filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/Database.php');
	include_once ($filepath.'/../helpers/Format.php');
	
?>
   
<?php 
	/**
	* 
	*/ 
	class Brand{
		
		private $db; 
		private $fm;
		public function __construct()
		{
			$this->db = new Database();
			$this->fm = new Format();
		}
		public function brandInsert($brandName){
			$brandName= $this->fm->validation($brandName);
 			$brandName = mysqli_real_escape_string($this->db->link,$brandName);

		if(empty($brandName)){
				$msg="<span class='error'> Brand Field must not be empty!</span>";
				return $msg;
			}else{
				$query = "INSERT INTO tbl_brand(brandName) VALUES('$brandName')";
				$brandInsert = $this->db->insert($query);

				if($brandInsert){
					$msg = "<span class='success'>Brand Name Inserted Successfully</span>";
					return $msg; 
				}else{
					$msg = "<span class='error'>Brand Name Not Inserted </span>";
					return $msg;
		
				}
			} 
		}

		public function getAllBrand(){
			$query = "SELECT * FROM tbl_brand ORDER BY brandId DESC";
			$result = $this->db->select($query);
			return $result;
		}

		public function getBrandById($id){
			$query = "SELECT * FROM tbl_brand WHERE brandId = '$id'";
			$result = $this->db->select($query);
			return $result;
		}

		public function brandUpdate($brandName,$id){
			$brandName  = $this->fm->validation($brandName);
 			$brandName  = mysqli_real_escape_string($this->db->link,$brandName);
 			$id       = mysqli_real_escape_string($this->db->link,$id);

		if(empty($brandName)){
				$msg="<span class='error'> Brand Field must not be empty!</span>";
				return $msg;
			}else{
				$query = "UPDATE tbl_brand
				SET
				brandName = '$brandName'
				WHERE brandId = '$id'";
				$updated_row = $this->db->update($query);

				if($updated_row){
					$msg = "<span class='success'> Brand Updated Successfully</span>";
					return $msg;
				}else{
					$msg="<span class='error'> Brand Not Updated!</span>";
					return $msg;
				}
			}
		}

		public function delBrandById($id){

			$query = "DELETE FROM  tbl_brand WHERE brandId='$id'";
			$deldata = $this->db->delete($query);
			if ($deldata) {
				$msg = "<span class='success'> Brand Deleted Successfully</span>";
					return $msg;
			}else{
				$msg="<span class='error'> Brand Not Deleted!</span>";
					return $msg;
			} 
		}
	}
 ?>