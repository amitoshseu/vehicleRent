<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/Message.php'; ?> 
<?php include_once '../helpers/Format.php'; ?>

<?php 
    $mess = new Message();
    $fm   = new Format();
 ?>


<?php 
    if (!isset($_GET['orderid']) || $_GET['orderid'] == NULL) {
        echo "<script>window.location='bookNow.php';</script>";
    }else{
       $id = preg_replace('/[^-a-zA-Z0-9_]/','',$_GET['orderid']);
    }
?>


<div class="grid_10">
    <div class="box round first grid">
        <h2>View Instant Order Details</h2>
        <div class="block">   

         <?php 
                     $getMessage = $mess->getAllOrderById($id);
                     if($getMessage){
                        while ($result = $getMessage->fetch_assoc()) {
         ?>

         <form action="bookNow.php" method="post" enctype="multipart/form-data">
            <table class="form">
                      
                
                    <td>
                        <label>First Name</label>
                    </td>
                    <td>
                        <input type="text" readonly name="fName" value="<?php echo $result['fName'];?>" placeholder="" class="medium" />
                    </td>
                </tr>

                
                <tr>
                    <td>
                        <label>Last Name</label>
                    </td>
                    <td>
                        <input type="text" readonly name="lName" value="<?php echo $result['lName'];?>" placeholder="" class="medium" />
                    </td>
                </tr>

              <tr>
                    <td>
                        <label>Phone</label>
                    </td>
                    <td>
                        <input type="text" readonly name="phone" value="<?php echo $result['phone'];?>" placeholder="" class="medium" />
                    </td>
                </tr>

                <tr>
                    <td>
                        <label>Address</label>
                    </td>
                    <td>
                        <input type="text" readonly name="address" value="<?php echo $result['address'];?>" placeholder="" class="medium" />
                    </td>
                </tr>

                <tr>
                    <td>
                        <label>Car</label>
                    </td>
                    <td>
                        <input type="text" readonly name="pickCar" value="<?php echo $result['pickCar'];?>" placeholder="" class="medium" />
                    </td>
                </tr>

                <tr>
                    <td>
                        <label>Hiring Option</label>
                    </td>
                    <td>
                        <input type="text" readonly name="pickHire" value="<?php echo $result['pickHire'];?>" placeholder="" class="medium" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Pick Up Date</label>
                    </td>
                    <td>
                        <input type="text" readonly name="pickDate" value="<?php echo $result['pickDate'];?>" placeholder="" class="medium" />
                    </td>
                </tr> 
                <td>
                        <label>Pick Up Time</label>
                    </td>
                    <td>
                        <input type="text" readonly name="pickTime" value="<?php echo $result['pickTime'];?>" placeholder="" class="medium" />
                    </td>
                </tr>

                <tr>
                    <td>
                        <label>Order Time</label>
                    </td>
                    <td>
                        <input type="text" readonly name="currentTime" value="<?php echo $fm->formatDate($result['currentTime']); ?>" placeholder="" class="medium" />
                    </td>
                </tr>

              
                
                   
                <tr>
                    <td></td>
                    <td>
                        <input type="submit" name="submit" Value="OK" />
                    </td>
                </tr>

            </table>
            </form>
            <?php } } ?>
        </div>
    </div>
</div>

<?php include 'inc/footer.php';?>



