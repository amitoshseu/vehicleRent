<?php include 'inc/header.php';?>
<link href="css/style2.css" rel="stylesheet" type="text/css" media="all"/>
<?php
    $login = Session::get("cuslogin");
    if($login == false){
        header("Location:login.php");
    }
 ?>
 
 <?php 
	 if(isset($_GET['customerid'])){
		$id   = $_GET['customerid'];
		$time = $_GET['time'];
		$rate = $_GET['rate'];
		$confirm = $mess->VehicleConfirmation($id,$time,$rate);
	}

  ?>

<div class="wrap">
 

 <div class="main">
    <div class="content">
    	<div class="cartoption">		
			<div class="cartpage">
			    	<h2>Your_Booking_Details</h2>
						<table class="tblone">
							<tr>
								<th width="3%">SL</th>
								<th width="20%">Vehicle Name</th>
								<th width="10%">Image</th>
								<th width="15%">Tour Date</th>
								<th width="15%">Tour Time</th>
								<th width="15%">From</th>
								<th width="15%">To</th>
								<th width="5%">V.N</th>
								<th width="15%">Amount</th>
								<th width="15%">Status</th>

							</tr>

							
							<?php
							    $cusId = Session::get("cusId");
								$getBooking = $res->getBookingVehicle($cusId);
								if($getBooking){
									$i=0;
								while($result = $getBooking->fetch_assoc()){
										$i++;
							?>

					     	 <tr>
								<td><?php echo $i;?></td>
								<td><?php echo $result['vehicleName'];?></td>
								<td><img src="admin/<?php echo $result['image'];?>" alt=""/></td>
								<td><?php echo $result['datePick'];?></td>
								<td><?php echo $result['timePick'];?></td>
								<td><?php echo $result['pickAdd'];?></td>
								<td><?php echo $result['endAdd'];?></td>
								<td><?php echo $result['vehicleNumber'];?></td>
								<td><?php 
								$total = $result['rate'];
								echo $total;?></td>
								<td>
									<?php
									if($result['status'] == '0'){
										echo "Pending";
									} elseif ($result['status'] == '1') { ?>
										<a href="?customerid=<?php echo $cusId; ?> &rate=<?php echo $total;?> &time=<?php echo $result['date']; ?>" >Arrived</a>
								<?php	}elseif($result['status'] == '2') {
										echo "Done";
									}
									?>
								</td>
								 
								<?php  }?>
							</tr>
					
							<?php  }?>
						</table>
						
					</div>
				
    	</div>  	
       <div class="clear"></div>
    </div>
 </div>
 </div>
<br><br><br><br><br><br><br><br>

<?php include 'inc/footer.php';?>