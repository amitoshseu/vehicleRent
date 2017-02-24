<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/Driver.php'; ?> 
<?php include_once '../helpers/Format.php';?>

<?php 
	 $dv = new Driver();
	 $fm   = new Format();
 ?>

<?php 
	if (isset($_GET['deldriver'])) {
		$id = preg_replace('/[^-a-zA-Z0-9_]/','',$_GET['deldriver']);
		$deldriver = $dv->delDriverById($id);
	}
 ?>

<div class="grid_10">
    <div class="box round first grid">
        <h2>Driver List</h2>
        <div class="block">  
        	<?php 
                    if (isset($deldriver)) {
                    	echo $deldriver;
                    }

            ?>

            <table class="data display datatable" id="example">
			<thead>
				<tr>
					<th>SL</th>
					<th>Driver Name</th>
					<th>Driving Licence</th>
				 	<th>Driver Address</th>
					<th>Image</th>
					<th>Phone</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php 
					$getDv = $dv->getAllDriver();
					$i=0; 
					if ($getDv) {
						while ($result = $getDv->fetch_assoc()) {
							$i++;
					
				 ?>
				<tr class="odd gradeX">
					<td><?php echo $i; ?></td>
					<td><?php echo $result['driverName']; ?></td>
					<td><?php echo $result['drivingLic']; ?></td>
					<td><?php echo $result['driverAdd']; ?></td>
					
					<td><img src="<?php echo $result['image']; ?>"  height="40px" width="60px"></td>
					<td><?php echo $result['phone']; ?></td>
					
				
				      <td><a href="driverEdit.php?driverid=<?php echo $result['driverId']; ?>">
						Edit</a> || <a onclick="return confirm('Are you sure you want to delete this item?')" 
						href="?deldriver=<?php echo $result['driverId']; ?>">Delete</a></td>
						
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
