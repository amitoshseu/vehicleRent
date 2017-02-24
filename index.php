<?php include 'inc/header.php';?>
<?php include 'inc/slideshow.php';?>

<!-- +++++++++++++++++++++++++f++++++++++++++++++++++
    BOOKING,SIGNUP,LOGIN
++++++++++++++++++++++++++++++++++++++++++++++++++++-->

 
 
<br><br>
<br><br>
<div class="tabDiv">
<div class="wholeTab" id="actionBook">
  <ul class="tab">
    <li><a href="javascript:void(0)" class="tablinks"  onclick="signupPlease(event, 'Booking')" id="defaultOpen">Booking</a></li>
    <li><a href="javascript:void(0)" class="tablinks" id="goToReg"  onclick="signupPlease(event, 'Register')">Register</a></li>
  </ul>




<?php 
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['bookNow'])) {
        $customerBooking = $res->instantBooking($_POST);
    }
?> 




<div id="Booking" class="tabcontent">

 <?php 
    if (isset($customerBooking)) {
        echo $customerBooking;
    }
 
 ?>

 <h3>Get your car in 30+ minute in Dhaka. <br>৩০ মিনিটের মধ্যে গাড়ি পেতে বুকিং করুন </h3>

<form action="index.php#actionBook" method="post">
 <script type="text/javascript">
     function populate(s1,s2){
        var s1 = document.getElementById(s1);
        var s2 = document.getElementById(s2);
        s2.innerHTML = "";
        if(s1.value == "Sedan"){
            var optionArray = ["|",
            "Tk.1490:4Hr Dhaka City           |   Tk.1490:Dhaka City/4 Hours",
            "Tk.1290:Airport Pick&Drop        |   Tk.1290:Airport Pick up and Drop",
            "Tk.2590:Nearby Dhaka Pick&Drop   |   Tk.2590:Pick up and Drop (Nearby Dhaka City)",
            "Tk.3990:Outside Dhaka/10Hr       |   Tk.3990:Inside Dhaka Dist 10 Hours",
            "Tk.3490:Near Dhaka/10Hr          |   Tk.3490:Full Day(Nearby Dhaka City)/10 Hours"];

        } else if(s1.value == "Eco"){

           var optionArray = ["|",
            "Tk.1990:Full day Dhaka           |   Tk.1990:Full Day(Dhaka City)/10 Hours",
            "Tk.1790:Near By Dhaka/4hr        |   Tk.1790:Nearby Dhaka City/4 Hours",
            "Tk.2490:Full Day Dhaka Dist      |   Tk.2490:Full Day(Nearby Dhaka City)/10 Hours",
            "Tk.1990:Pick&Drop Near Dhaka     |   Tk.1990:Pick up and Drop (Nearby Dhaka City)",
            "Tk.2990:Dhaka Dist/10Hr          |   Tk.2990: Dhaka District 10 Hours"];

        }else if(s1.value == "Bike"){

           var optionArray = ["|",
            "Default Hiring Package           |   Default Hiring Package"];
        }else if(s1.value == "Mini Truk"){

           var optionArray = ["|",
            "Default Hiring Package           |   Default Hiring Package"];
        }
            



        for(var option in optionArray){
            var pair = optionArray[option].split("|");
            var newOption = document.createElement("option");
            newOption.value = pair[0];
            newOption.innerHTML= pair[1];
            s2.options.add(newOption);
        }
    }
   </script>


    <select id="pickCar" name="pickCar"  required autocomplete="off" class="selectCar" onchange="populate(this.id,'pickHire')">
        <option  value="" selected disabled>Select your car</option>
        <option  style='font-size: 20px;' value="Sedan">Sedan</option>
        <option  style='font-size: 20px;' value="Eco">Eco</option>
        <option  style='font-size: 20px;'  value="Bike">Bike</option>
        <option  style='font-size: 20px;'  value="Mini Truk">Mini Truck</option>
                                                
    </select>
        
    <select id="pickHire" name="pickHire" class="selectHire"  required autocomplete="off">
     <option value="" selected disabled >Select Hiring Options</option>
    </select>
    
        
     
    
    <input type="text" name="address" required  placeholder="Pick Up Address" class="pickupTextField">
    <input type="date" name="pickDate" required  placeholder="" class="dateSelect">

   <select class="timeSelect" name="pickTime" required >
    
        <option value="" selected disabled>Time</option>
        <option value="" selected>Time</option>
        <option value="6:00am">6:00am</option>
        <option value="6:30am">6:30am</option>
        <option value="7:00am">7:00am</option>
        <option value="7:30am">7:30am</option>
        <option value="8:00am">8:00am</option>
        <option value="8:30am">8:30am</option>
        <option value="9:00am">9:00am</option>
        <option value="9:30am">9:30am</option>
        <option value="10:00am">10:00am</option>
        <option value="10:30am">10:30am</option>
        <option value="11:00am">11:00am</option>
        <option value="11:30am">11:30am</option>
        <option value="12:00pm">12:00pm</option>
        <option value="12:30pm">12:30pm</option>
        <option value="1:00pm">1:00pm</option>
        <option value="1:30pm">1:30pm</option>
        <option value="2:00pm">2:00pm</option>
        <option value="2:30pm">2:30pm</option>
        <option value="3:00pm">3:00pm</option>
        <option value="3:30pm">3:30pm</option>
        <option value="4:00pm">4:00pm</option>
        <option value="4:30pm">4:30pm</option>
        <option value="5:00pm">5:00pm</option>
        <option value="5:30pm">5:30pm</option>
        <option value="6:00pm">6:00pm</option>
        <option value="6:30pm">6:30pm</option>
        <option value="7:00pm">7:00pm</option>
        <option value="7:30pm">7:30pm</option>
        <option value="8:00pm">8:00pm</option>
        <option value="8:30pm">8:30pm</option>
        <option value="9:00pm">9:00pm</option>
        <option value="9:30pm">9:30pm</option>
        <option value="10:00pm">10:00pm</option>
        <option value="10:30pm">10:30pm</option>
        <option value="11:00pm">11:00pm</option>
        <option value="11:30pm">11:30pm</option>
        <option value="12:00am">12:00am</option>

    </select>
      
    <input type="text" required  name="fName" placeholder="First Name" class="fnameField">
    <input type="text" required  name="lName" placeholder="Last Name" class="lnameField">
    <input type="text" required  name="phone" placeholder="Your Phone Number(01XXXXXXXXX)" class="phoneField">
    <input type="submit" name="bookNow" value="Submit" class="submit1">
 </form>
</div>


<?php 
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['register'])) {
        $customerReg = $cmr->customerRegistration($_POST);
    }
?> 
<div id="Register" class="tabcontent">

<?php 
    if (isset($customerReg)) {
        echo '<script type="text/javascript">alert("' .$customerReg. '")</script>';
        // echo $customerReg;
    }
 
 ?>

<form action="index.php#goToReg" method="post" onsubmit="return validateForm();">
    <h3>Register</h3>
    <input type="text" required  name="name" placeholder="Your Name" class="RegNameField">
    <input type="text" required  name="phone" placeholder="Your Phone" class="RegPhoneField">
    <input type="text" required  name="email" placeholder="Your Email" class="RegEmailField">
    <select name="regCombo" required  class="hearaboutSelect">
        <option value="" selected>How did you hear about us</option>
        <option value="facebook">Facebook</option>
        <option value="newspaper">Newspaper</option>
        <option value="billboard">Billboard</option>
        <option value="mouth">Word of mouth</option>
        <option value="google">Google</option>
        <option value="youtube">Youtube</option>
        <option value="fmRadio">FM radio</option>
        <option value="directSales">Direct sales</option>
    </select>
    <input type="text" required  name="address" placeholder="Your Address" class="RegNameField">
    <input type="text" required  name="city" placeholder="Your City" class="RegPhoneField">

  <input type="password" required  name="pass" placeholder="Enter Password" class="RegEnterPass">
  <input type="password" required  name="conPass" placeholder="Confirm Password" class="RegConPass">
  <input type="submit" name="register" value="Next Step" class="submit2">
  <p>Completed Register! Log In Here <a href="login.php"> here</a></p>
</form>
</div>
 
<script type="text/javascript" src="js/booking.js"></script>
</div>
</div>


<!-- +++++++++++++++++++++++++f++++++++++++++++++++++
   WELCOME MESSAGE BLOCK
++++++++++++++++++++++++++++++++++++++++++++++++++++-->

<div class="welcomeMsg" style="color: black; font-size:40px">
    <h3>Welcome to our page</h3><br>
    <br>
    <span style="color: black; font-size:40px">
    <p>Thank you visiting our page. Our website related apps are under development now</p></span>
    <link href="https://fonts.googleapis.com/css?family=Dancing+Script" rel="stylesheet">
</div>
<br><br>
<?php include 'inc/footer.php';?>

