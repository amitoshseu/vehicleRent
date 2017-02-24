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

<?php 
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $to      = $fm->validation($_POST['toEmail']);
        $from    = $fm->validation($_POST['fromEmail']);
        $subject = $fm->validation($_POST['subject']);
        $message = $fm->validation($_POST['message']);
        $sendmail = mail($to,$subject, $message,$from);
        
        $sendmail = $mess->seneMailFromAdmin();
        if(isset($sendmail)){
             echo $sendmail;
                  
        }
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
                <tr>
                    <td>
                        <label>To</label>
                    </td>
                    <td>
                         <input type="text" readonly name="toEmail" value="<?php echo $result['email'];?>" placeholder="" class="medium" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>From</label>
                    </td>
                    <td>
                        <input type="text"  name="fromEmail" placeholder="Please Enter Your Email Address" class="medium" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Subject</label>
                    </td>
                    <td>
                        <input type="text"  name="subject" placeholder="Please Enter Subject" class="medium" />
                    </td>
                </tr>

               <tr>
                    <td>
                        <label>Message</label>
                    </td>
                    <td>
                        <textarea class="tinymce" name="message">
                           
                        </textarea>
                    </td>
                </tr>
                
                   
                <tr>
                    <td></td>
                    <td>
                        <input type="submit" name="submit" Value="Send" />
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



