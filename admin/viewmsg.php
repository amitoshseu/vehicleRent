<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/Message.php'; ?> 
<?php include_once '../helpers/Format.php'; ?>

<?php 
    $mess = new Message();
    $fm   = new Format();
 ?>


<?php 
    if (!isset($_GET['msgid']) || $_GET['msgid'] == NULL) {
        echo "<script>window.location='message.php';</script>";
    }else{
       $id = preg_replace('/[^-a-zA-Z0-9_]/','',$_GET['msgid']);
    }
?>


<div class="grid_10">
    <div class="box round first grid">
        <h2>View Message</h2>
        <div class="block">   

         <?php 
                     $getMessage = $mess->getAllMessageById($id);
                     if($getMessage){
                        while ($result = $getMessage->fetch_assoc()) {
         ?>

         <form action="message.php" method="post" enctype="multipart/form-data">
            <table class="form">
                      
                
                    <td>
                        <label>Name</label>
                    </td>
                    <td>
                        <input type="text" readonly name="name" value="<?php echo $result['name'];?>" placeholder="" class="medium" />
                    </td>
                </tr>

                
                <tr>
                    <td>
                        <label>Company</label>
                    </td>
                    <td>
                        <input type="text" readonly name="company" value="<?php echo $result['company'];?>" placeholder="" class="medium" />
                    </td>
                </tr>

              <tr>
                    <td>
                        <label>Telephone</label>
                    </td>
                    <td>
                        <input type="text" readonly name="phone" value="<?php echo $result['phone'];?>" placeholder="" class="medium" />
                    </td>
                </tr>

                <tr>
                    <td>
                        <label>Email</label>
                    </td>
                    <td>
                        <input type="text" readonly name="email" value="<?php echo $result['email'];?>" placeholder="" class="medium" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Date</label>
                    </td>
                    <td>
                        <input type="text" readonly name="email" value="<?php echo $fm->formatDate($result['date']); ?>" placeholder="" class="medium" />
                    </td>
                </tr>

               <tr>
                    <td>
                        <label>Message</label>
                    </td>
                    <td>
                        <textarea class="tinymce" name="message">
                            <?php echo $result['message'];?>
                        </textarea>
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

<!-- Load TinyMCE -->
<script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function () {
        setupTinyMCE();
        setDatePicker('date-picker');
        $('input[type="checkbox"]').fancybutton();
        $('input[type="radio"]').fancybutton();
    });
</script>
<!-- Load TinyMCE -->

<?php include 'inc/footer.php';?>



