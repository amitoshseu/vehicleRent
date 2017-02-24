<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/Vehicle.php'; ?> 
<?php include_once '../helpers/Format.php';?>

<?php 
	 $vehi = new Vehicle();
	 $fm   = new Format();
 ?>

<?php 
	if (isset($_GET['delvehicle'])) {
		$id = preg_replace('/[^-a-zA-Z0-9_]/','',$_GET['delvehicle']);
		$delvehicle = $vehi->delVehicleById($id);
	}
 ?>

<div class="grid_10">
    <div class="box round first grid">
        <h2>Vehicle List</h2>
        <div class="block">  
        	<?php 
                    if (isset($delvehicle)) {
                    	echo $delvehicle;
                    }

            ?>
                 

            <table class="data display datatable" id="example">
			<thead>
				<tr>
					<th>SL</th>
					<th>Vehicle Name</th>
					<th>Category</th>
					<th>Brand</th>
					<!-- <th>Description</th> -->
				 	<th>Rate/hour</th>
				 	<th>Rate/day</th>
				 	<th>Rate/A.Port</th>
				 	<th>Seat</th>
				 	<th>Condition</th>
					<th>Image</th>
					<th>Type</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php 
					$getVehi = $vehi->getAllVehicle();
					$i=0; 
					if ($getVehi) {
						while ($result = $getVehi->fetch_assoc()) {
							$i++;
					
				 ?>
				<tr class="odd gradeX">
					<td><?php echo $i; ?></td>
					<td><?php echo $result['vehicleName']; ?></td>
					<td><?php echo $result['catName']; ?></td>
					<td><?php echo $result['brandName']; ?></td>
					
					<td>$<?php echo $result['rate']; ?></td>
					<td>$<?php echo $result['rateDay']; ?></td>
					<td>$<?php echo $result['rateAirport']; ?></td>
					<td><?php echo $result['seat']; ?></td>
					<td><?php echo $result['vehiCondition']; ?></td>
					<td><img src="<?php echo $result['image']; ?>"  height="40px" width="60px"></td>
					<td>
					<?php 
						if ($result['type'] == 0) {
							echo "Economy";
						}else if($result['type'] == 1){
							echo "Standard";
						}else{
							echo "Luxury";
						}
					?>
						
					</td>
				
						<td><a href="vehicleedit.php?vehicleid=<?php echo $result['vehicleId']; ?>">
						Edit</a> || <a onclick="return confirm('Are you sure you want to delete this item?')" 
						href="?delvehicle=<?php echo $result['vehicleId']; ?>">Delete</a></td>
						
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
