<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Contact Us</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Bootstrap styles -->
    <link href="assets/css/bootstrap.css" rel="stylesheet"/>
    <!-- Customize styles -->
    <link href="style.css" rel="stylesheet"/>
    <!-- font awesome styles -->
	<link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet">
		<!--[if IE 7]>
			<link href="css/font-awesome-ie7.min.css" rel="stylesheet">
		<![endif]-->

		<!--[if lt IE 9]>
			<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->

	<!-- Header -->
	<?php
		require_once('header.php');
	?>
	<!-- 
Body Section 
-->
	<hr class="soften">
	<div class="well well-small">
	<h1>Visit us</h1>
	<hr class="soften"/>	
	<div class="row-fluid">
		<div class="span8 relative">
		<iframe style="width:100%; height:350px" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"  src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d55148.284261992754!2d77.0091272446359!3d30.24369842027729!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390e52e8aaf1ce3f%3A0x4ba525fe3109b677!2sBarara%20Ambala!5e0!3m2!1sen!2sin!4v1631033803455!5m2!1sen!2sin" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>

		<div class="absoluteBlk">
		<div class="well wellsmall">
		<h4>Contact Details</h4>
		<h5>
			#2575,Lakkar Mandi,<br/>
			Near Railway Station,<br/>
			Barara(Ambala)<br/><br/>
			
			﻿Tel +91 95881 33250<br/>
			email:vishwaskheterpal@gmail.com
		</h5>
		</div>
		</div>
		</div>
		
		<div class="span4">
		<h4>Email Us</h4>
		<form class="form-horizontal">
        <fieldset>
          <div class="control-group">
           
              <input type="text" placeholder="name" class="input-xlarge"/>
           
          </div>
		   <div class="control-group">
           
              <input type="text" placeholder="email" class="input-xlarge"/>
           
          </div>
		   <div class="control-group">
           
              <input type="text" placeholder="subject" class="input-xlarge"/>
          
          </div>
          <div class="control-group">
              <textarea rows="3" id="textarea" class="input-xlarge"></textarea>
           
          </div>

            <button class="shopBtn" type="submit">Send email</button>

        </fieldset>
      </form>
		</div>
	</div>

	
</div>
<!-- 
Footer 
-->
<?php
		require_once('footer.php');
?>
	