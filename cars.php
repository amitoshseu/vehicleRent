<?php include 'inc/header.php';?>
<link href="css/vehicleStyle.css" rel="stylesheet" type="text/css" />
	
<div class="sectionVehi"  align="center">
<div class="content_top">
    		<div class="heading">
    		<h3>Car Gallery</h3>
    		</div>
    		<div class="clear"></div>
 </div>	

	
	<div class="section group">

		<?php 
			$gc = $vehi->getCar();
			if ($gc) {
				while ( $result = $gc->fetch_assoc()) {


		 ?>
		
		 <div class="grid_1_of_4 images_1_of_4">
		 	<a  href="details.php?vehicleid=<?php echo $result['vehicleid']; ?>"><img src="admin/<?php echo $result['image']; ?>" /></a>
		 	<h2><?php echo $result['vehicleName']; ?></h2>
		 	<p><?php echo $fm->textShorten($result['body'],60); ?></p> 
		 	
		 	<p><span class="price">৳<?php echo $result['rate']; ?>/hour</span></p>
		 	<div>
		 		<span class="button">
		 			<a href="details.php?vehicleid=<?php echo $result['vehicleId']; ?>" class"details">Details</a>
		 		</span>
		 	</div>
		 </div>
		<?php } } ?>
		 

	</div>
</div>






<?php include 'inc/footer.php';?>