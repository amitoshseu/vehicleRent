<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php 
    $filepath = realpath(dirname(__FILE__));
    include_once($filepath.'/../classes/Customer.php')
 ?>

<?php 
    if (!isset($_GET['customerId']) || $_GET['customerId'] == NULL) {
        echo "<script>window.location='orderMsg.php';</script>";
    }else{
       $id = preg_replace('/[^-a-zA-Z0-9_]/','',$_GET['customerId']);
    }



    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
         echo "<script>window.location='orderMsg.php';</script>";
    }


?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Customer Details</h2>
               <div class="block copyblock"> 
              

                 <?php 
                     $cus = new Customer();
                     $getCustomer = $cus->getCustomerData($id);
                     if($getCustomer){
                        while ($result = $getCustomer->fetch_assoc()) {
                ?>

                 <form action="" method="post">
                    <table class="form">					
                        <tr>
                             <td>Name</td>
                             <td>
                                <input type="text" readonly="readonly" value="<?php echo $result['name'];?>"  class="medium" />
                            </td>
                        </tr>
                        <tr>
                             <td>Phone Number</td>
                             <td>
                                <input type="text" readonly="readonly" value="<?php echo $result['phone'];?>"  class="medium" />
                            </td>
                        </tr> 
                        <tr>
                             <td>Email</td>
                             <td>
                                <input type="text" readonly="readonly" value="<?php echo $result['email'];?>"  class="medium" />
                            </td>
                        </tr> 
                        <tr>
                             <td>Know About Us</td>
                             <td>
                                <input type="text" readonly="readonly" value="<?php echo $result['regCombo'];?>"  class="medium" />
                            </td>
                        </tr> 
                         <tr>
                             <td>Address</td>
                             <td>

                             <input type="text" readonly="readonly" value="<?php echo $result['address'];?>"  class="medium" />
                             
                            </td>
                        </tr> 
                         <tr>
                             <td>City</td>
                             <td>
                                <input type="text" readonly="readonly" value="<?php echo $result['city'];?>"  class="medium" />
                            </td>
                        </tr> 



						<tr> 
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