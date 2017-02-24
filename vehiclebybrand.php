<?php include 'inc/header.php';?>
<link href="css/vehicleStyle.css" rel="stylesheet" type="text/css" />
<?php 
	if (!isset($_GET['brandId']) || $_GET['brandId'] == NULL) {
        echo "<script>window.location='404.php';</script>";
    }else{
       $id = preg_replace('/[^-a-zA-Z0-9_]/','',$_GET['brandId']);
    }
 ?>
	



<div class="sectionVehi"  align="center">
<div class="content_top">
    		<div class="heading">
    		<h3>Sort By Brand</h3>
    		</div>
    		<div class="clear"></div>
 </div>	

	
	<div class="section group">
		<?php 
			$vehiclebybrand = $vehi->vehicleByBrand($id);
			if ($vehiclebybrand) {
				while ($result = $vehiclebybrand->fetch_assoc()) {
			
		 ?>


	
		 <div class="grid_1_of_4 images_1_of_4">
		 	<a href="details.php?vehicleid=<?php echo $result['vehicleid']; ?>"><img src="admin/<?php echo $result['image']; ?>" /></a>
		 	<h2><?php echo $result['vehicleName']; ?></h2>
		 	<p><?php echo $fm->textShorten($result['body'],60); ?></p> 
		 	
		 	<p><span class="price">৳<?php echo $result['rate']; ?>/hour</span></p>
		 	<div>
		 		<span class="button">
		 			<a href="details.php?vehicleid=<?php echo $result['vehicleId']; ?>" class"details">Details</a>
		 		</span>
		 	</div>
		 </div>

		<?php } } else{
				header("Location:404.php");
				// echo "<p>Vehicle of this brand are not available</p>";

			}?>
		

	</div>
</div>

<?php include 'inc/footer.php';?>