<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/Message.php'; ?> 
<?php include_once '../helpers/Format.php'; ?>

<?php 
	$mess = new Message();
	$fm   = new Format();
 ?>
<?php 
	if(isset($_GET['seenid'])){
		$id   = $_GET['seenid'];
		$time = $_GET['time'];
		$seenBox = $mess->sendToSeenOrderBox($id,$time);
	}

	if(isset($_GET['deleteid'])){
		$id   = $_GET['deleteid'];
		$time = $_GET['time'];
		$delSeen = $mess->delSeenOrder($id,$time);
	}



 ?>

        <div class="grid_10">
            <div class="box round first grid">
                <h2>Instant Booking Order</h2>
                <?php 
                	if(isset($seenBox)){
                		echo $seenBox;
                	}
                	if(isset($delSeen)){
                		echo $delSeen;
                	}
                 ?>
                <div class="block">        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>SL</th>
							<th>Car</th>
							<th>Try Trip</th>
							<th>Address</th>
							<th>Pick Date</th>
							<th>Pick Time</th>
							<th>Phone</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>

				<?php 
						
						$getMessage = $mess->getAllOrderRequest();
						if($getMessage){
							$i=0;
							while ($result = $getMessage->fetch_assoc()) {
								$i++
						 
				 ?>
						<tr class="odd gradeX">
							<td><?php echo $i; ?></td>
							<td><?php echo $result['pickCar']; ?></td>
							<td><?php echo $result['pickHire']; ?></td>
							<td><?php echo $fm->textShorten($result['address'],30); ?></td>
							<td><?php echo $result['pickDate']; ?></td>
							<td><?php echo $result['pickTime']; ?></td>
							<td><?php echo $result['phone']; ?></td>
							<td>
								<a href="viewOrder.php?orderid=<?php echo $result['id'];?>">View</a> || 
								<a onclick="return confirm('Are you sure you want to send history box?')" href="?seenid=<?php echo $result['id']; ?>  &time=<?php echo $result['currentTime']; ?>" >Seen</a>
								
							</td>
						</tr>
						<?php } } ?>
					</tbody>
				</table>
               </div>
            </div>


            <div class="box round first grid">
                <h2>Instant Booking History</h2>
                <div class="block">        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>SL</th>
							<th>Car</th>
							<th>Try Trip</th>
							<th>Address</th>
							<th>Pick Date</th>
							<th>Pick Time</th>
							<th>Phone</th>
							<th>Action</th>
						</tr>
					</thead>
						<tbody>
				<?php 
						
						$getMessage = $mess->getAllSeenOrder();
						if($getMessage){
							$i=0;
							while ($result = $getMessage->fetch_assoc()) {
								$i++
						 
				 ?>
						<tr class="odd gradeX">
							<td><?php echo $i; ?></td>
							<td><?php echo $result['pickCar']; ?></td>
							<td><?php echo $result['pickHire']; ?></td>
							<td><?php echo $fm->textShorten($result['address'],30); ?></td>
							<td><?php echo $result['pickDate']; ?></td>
							<td><?php echo $result['pickTime']; ?></td>
							<td><?php echo $result['phone']; ?></td>
							<td>
								<a onclick="return confirm('Are you sure you want to send seen box?')" href="?deleteid=<?php echo $result['id']; ?>  &time=<?php echo $result['currentTime']; ?>" >Delete</a>
							</td>
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
