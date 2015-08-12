<div id="content">
<div class="reg_form">
<div class="form_title">Sign In</div>
<div class="form_sub_title">Please Enter Username And Password.</div>
<?php echo validation_errors('<div class="alert alert-danger text-center">'); ?>
<?php echo $this->session->flashdata('msg'); ?>
	<?php echo form_open("user/login"); ?>
		    
		<p>
			<label for="email_address">Email:</label>
			<input type="text" id="email" name="email" value="" />
		</p>
		<p>
			<label for="password">Password:</label>
			<input type="password" id="pass" name="pass" value="" />
		</p>
		      
		<p>
		<input type="submit" class="greenButton" id="btn_login" name="btn_login" value="Login" />
		</p>
	<?php echo form_close(); ?>
		<div class="alert alert-danger text-center"> Forgot Password? New member? <a href="http://localhost/democode/index.php/user/register"> Sign-up Here</a></div>
</div><!--<div class="reg_form">-->    
</div><!--<div id="content">-->