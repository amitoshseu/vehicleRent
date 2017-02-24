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
		$seenBox = $mess->sendToSeenBox($id,$time);
	}

	if(isset($_GET['deleteid'])){
		$id   = $_GET['deleteid'];
		$time = $_GET['time'];
		$delSeen = $mess->delSeenMsg($id,$time);
	}



 ?>

        <div class="grid_10">
            <div class="box round first grid">
                <h2>Message</h2>
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
							<th>Name</th>
							<th>Email</th>
							<th>Date</th>
							<th>Message</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>

				<?php 
						
						$getMessage = $mess->getAllMessage();
						if($getMessage){
							$i=0;
							while ($result = $getMessage->fetch_assoc()) {
								$i++
						 
				 ?>
						<tr class="odd gradeX">
							<td><?php echo $i; ?></td>
							<td><?php echo $result['name']; ?></td>
							<td><?php echo $result['email']; ?></td>
							<td><?php echo $fm->formatDate($result['date']); ?></td>
							<td><?php echo $fm->textShorten($result['message'],30); ?></td>
							<td>
								<a href="viewmsg.php?msgid=<?php echo $result['id'];?>">View</a> || 
								<a href="replymsg.php?msgid=<?php echo $result['id'];?>">Reply</a> ||
								<a onclick="return confirm('Are you sure you want to send seen box?')" href="?seenid=<?php echo $result['id']; ?>  &time=<?php echo $result['date']; ?>" >Seen</a>
								
							</td>
						</tr>
						<?php } } ?>
					</tbody>
				</table>
               </div>
            </div>


            <div class="box round first grid">
                <h2>Seen Message</h2>
                <div class="block">        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th width="5%">SL</th>
							<th>Name</th>
							<th>Email</th>
							<th>Date</th>
							<th>Message</th>
							<th width="10%">Action</th>
						</tr>
					</thead>
						<tbody>
				<?php 
						
						$getMessage = $mess->getAllSeenMessage();
						if($getMessage){
							$i=0;
							while ($result = $getMessage->fetch_assoc()) {
								$i++
						 
				 ?>
						<tr class="odd gradeX">
							<td><?php echo $i; ?></td>
							<td><?php echo $result['name']; ?></td>
							<td><?php echo $result['email']; ?></td>
							<td><?php echo $fm->formatDate($result['date']); ?></td>
							<td><?php echo $fm->textShorten($result['message'],30); ?></td>
							<td>
								<a onclick="return confirm('Are you sure you want to send seen box?')" href="?deleteid=<?php echo $result['id']; ?>  &time=<?php echo $result['date']; ?>" >Delete</a>
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
