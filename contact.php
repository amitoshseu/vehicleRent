<?php include 'inc/header.php';?>
<link rel="stylesheet" href="css/contactUs.css">

<?php 
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
        $sendMsg = $mess->sendMessage($_POST);
    }
?> 


<div class="container_about">
		<div class="left-amitosh">


			<h2>Contact Us!</h2>
			<?php 
			    if (isset($sendMsg)) {
			        echo $sendMsg;
			    }
			?>
			<form action="#" method="post">
				<div class="agile1">
					<h3>Name</h3>
					<input type="text" name="name" class="name" placeholder="Enter Your Name" required="">
				</div>
				<div class="agile1">
					<h3>Company</h3>
					<input type="text" name="company" class="company" placeholder="Enter Your company" required="">
				</div>
				<div class="agile1">
					<h3>Telephone</h3>
					<input type="text" name="phone" class="phone" placeholder="Ener Your Phone Number" required="">
				</div>
				<div class="agile1">
					<h3>Email</h3>
					<input type="text" name="email" class="email" placeholder="Enter Valid Email." required="">
				</div>
				<div class="agile1">
					<h3>Message</h3>
					<textarea  name="message" placeholder="Enter Your Message"  required=""></textarea>
				</div>	
				<input type="submit" name="submit" value="Send Message">
			</form>
		</div>
		<div class="right-amitosh">
			
			<h3 class="amitosh">Our Location</h3>
			<div class="agile1">
				<h3>Reach Us</h3>
				<div id="map" class="map">
					<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3650.698761519746!2d90.40213191443772!3d23.793739093037527!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c70e6b3c2401%3A0x1600e399cb997341!2sA+R+Tower%2C+Bir+Uttam+Aminul+Haque+Sarak%2C+Dhaka!5e0!3m2!1sen!2sbd!4v1482660666231" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
				</div>	
			</div>
			<h3 class="amitosh">Stay In Touch</h3>
			<div class="agile1">
				<h3>Social Icons</h3>
				<div class="socialicons w3">
					<ul>
						<li><a class="facebook" href="http://www.facebook.com/amitoshseu"></a></li>
						<li><a class="twitter" href="http://www.twitter.com/amitoshseu"></a></li>
						<li><a class="google" href="https://plus.google.com/+amitoshgain"></a></li>
						<li><a class="linkedin" href="https://www.linkedin.com/in/amitoshseu?trk=hp-identity-name"></a></li>
						<li><a class="pinterest" href="#"></a></li>
					</ul>
				</div>
			</div>
		</div>
</div>
<div class="freeSpace">
	
</div>


<?php include 'inc/footer.php';?>
	




