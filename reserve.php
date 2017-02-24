<?php include 'inc/header.php';?>
<link href="css/style2.css" rel="stylesheet" type="text/css" media="all"/>
<?php 
	if(isset($_GET['delvehicle'])){
		 $delId = preg_replace('/[^-a-zA-Z0-9_]/','',$_GET['delvehicle']);
		 $delVehicle = $res->delVehicleByReserve($delId);
	}
?>


<div class="wrap">


 <div class="main">
    <div class="content">
    	<div class="cartoption">		
			<div class="cartpage">
			    	<h2>Pre_Booking_Page</h2>
			    	<?php 
			    		if(isset($delVehicle)){
			    			echo $delVehicle;
			    		}
			    	?>
						<table class="tblone">
							<tr>
								<th width="3%">SL</th>
								<th width="20%">Vehicle Name</th>
								<th width="10%">Image</th>
								<th width="15%">Date</th>
								<th width="10%">Time</th>
								<th width="20%">From</th>
								<th width="20%">To</th>
								<th width="5%">V.N</th>
								<th width="15%">T.Amount</th>
								<th width="10%">Action</th>

							</tr>

							
							<?php
								$getVehi = $res->getReserveVehicle();
								if($getVehi){
									$i=0;
									$sum = 0;
									while($result = $getVehi->fetch_assoc()){
										$i++;
							?>

					     	 <tr>
								<td><?php echo $i;?></td>
								<td><?php echo $result['vehicleName'];?></td>
								<td><img src="admin/<?php echo $result['image'];?>"  alt=""/></td>
								<td><?php echo $result['datePick'];?></td>
								<td><?php echo $result['timePick'];?></td>
								<td><?php echo $result['pickAdd'];?></td>
								<td><?php echo $result['endAdd'];?></td>
								<td><?php echo $result['vehicleNumber'];?></td>
								<td><?php 
								$total = $result['rate']* $result['tryTrip'] * $result['vehicleNumber']; 
								echo $total;?></td>
								<td><a onclick="return confirm('Are you sure you want to delete this item?')" href="?delvehicle=<?php echo $result['reserveId']; ?>">X</a></td>
							</tr>
							<?php 
								$sum = $sum+ $total;
								Session::set("sum",$sum);
							?>
							<?php } }?>
						</table>
							<?php
								$getData = $res->checkReserveTable();
								if($getData){
?>
						<table style="float:right;text-align:left;" width="40%">
							<tr>
								<th>Grand Total: </th>
								<td>TK. <?php echo $sum;?></td>
							</tr>
							
					   </table>
					   <?php } else {
					   		header("Location:cars.php");
					   		
					   }?>
					</div>
					<div class="shopping">
						<div class="shopleft">
							<a href="cars.php"> <img src="images/carGallery.png" alt="" /></a>
						</div>
						<div class="shopright">
							<a href="payment.php"> <img src="images/bookNow.png" alt="" /></a>
						</div>
					</div>
    	</div>  	
       <div class="clear"></div>
    </div>
 </div>
 </div>
 <?php include 'inc/footer.php';?>

