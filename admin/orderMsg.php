<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/Message.php'; ?> 
<?php  
	$mess = new Message();
	$fm   = new Format();
 ?>
<?php 
	if(isset($_GET['shiftid'])){
		$id   = $_GET['shiftid'];
		$time = $_GET['time'];
		$rate = $_GET['rate'];
		$shift = $mess->VehicleShifted($id,$time,$rate);
	}

	if(isset($_GET['delvehiid'])){
			$id   = $_GET['delvehiid'];
			$time = $_GET['time'];
			$rate = $_GET['rate'];
			$delBooking = $mess->delBookingVehicle($id,$time,$rate);
		}


 ?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Inbox</h2>
                <div class="block"> 
                <?php 
                	if(isset($shift)){
                		echo $shift;
                	}
                	if(isset($delBooking)){
                		echo $delBooking;
                	}
                 ?>         
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th width="5%">ID</th>
							<th>Vehicle</th>
							<th>N.O.V</th>
							<th>Tour Date</th>
							<th>Tour Time</th>
							<th>Customer</th>
							<th>From</th>
							<th>To</th>
							<th>Amount</th>
							<th width="10%">Action</th>
						</tr>
					</thead>
					<tbody>
				<?php 
						
						$getOrder = $mess->getAllOrder();
						
						$i=0;
						if($getOrder){
							while ($result = $getOrder->fetch_assoc()) {
						 $i++
				 ?>
						
						<tr class="odd gradeX">
							<td><?php echo $i; ?></td>
							<td><a href="viewVehicleDetails.php?vehicleid=<?php echo $result['vehicleId']; ?>" title="View Details">Details</a></td>
							<td><?php echo $result['vehicleNumber']; ?></td>
							<td><?php echo $result['datePick']; ?></td>
							<td><?php echo $result['timePick']; ?></td>
							<td><a href="customer.php?customerId=<?php echo $result['cusId']; ?>" title="View Details">Customer Details</a></td>
							<td><?php echo $result['pickAdd']; ?></td>
							<td><?php echo $result['endAdd']; ?></td>
							<td><?php echo $result['rate']; ?></td>

						<?php  
								if ($result['status'] == '0') { ?>
									<td><a href="?shiftid=<?php echo $result['cusId']; ?> &rate=<?php echo $result['rate']; ?> &time=<?php echo $result['date']; ?>" >
										Forward</a></td>
										
						<?php } elseif($result['status'] == '1'){ ?>
								    <td>Pending</a></td>
							
					    <?php } else{  ?>
								<td><a onclick="return confirm('Are you sure you want to delete this item?')" href="?delvehiid=<?php echo $result['cusId']; ?> &rate=<?php echo $result['rate']; ?> &time=<?php echo $result['date']; ?>" >
										Remove</a></td>

							<?php } ?>
						</tr>

						<?php } } ?>
						
					</tbody>
				</table>
               </div>
            </div>
        </div>
<script type="text/javascript">
    $(document).ready(function () {
        setupLeftMenu();

        $('.datatable').dataTable();
        setSidebarHeight();
    });
</script>
<?php include 'inc/footer.php';?>
