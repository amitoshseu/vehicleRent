<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/Reserve.php'; ?> 

<?php  
	$res = new Reserve();
	$fm   = new Format();
 ?>

 <div class="grid_10">
            <div class="box round first grid">
                <h2>Add New Category</h2>
               <div class="block copyblock"> 
              
                 <form action="dashbord.php" method="post">
                    <table class="form">					
                 <?php
							    
							    $getReport = $res->getAllMonthReport();
								if($getReport){
									$sum = 0;
									$i=0;
								while($result = $getReport->fetch_assoc()){
										$i++;
							?>
                <tr>
		                <?php 
		                	$sum = $sum+ $result['rate'];
		             	 ?>
                    <td>
				<?php } } ?>
               
                        <label>Total Revenue In This Month: </label>
                    </td>
                    <td>
                        <label type="text" name="revMonth"  class="medium" ><?php echo $sum; ?></label>
                    </td>
                </tr>
                <?php
						    
						    $getReport = $res->getYearReport();
							if($getReport){
								$sum = 0;
								$i=0;
							while($result = $getReport->fetch_assoc()){
									$i++;
						?>
 
              		<tr>
						<?php 
		                	$sum = $sum+ $result['rate'];
		             	 ?>
                    <td>
                    <?php } } ?>

                        <label>Total Revenue In This Year(2017):</label>
                    </td>
                    <td>
                         <label type="text" name="revYear"  class="medium" ><?php echo $sum; ?></label>
                    </td>
                </tr>

				<tr> 
	                <td>
	                    <input type="submit" name="submit" Value="Back" />
	                </td>
	            </tr>


                    </table>
                    </form>
           
                </div>
            </div>
        </div>

<?php include 'inc/footer.php';?>