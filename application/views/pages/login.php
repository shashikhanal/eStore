 <div class="login-box">
 	<div class="login-form">
 	

 		<h2>Login</h2>
 		<br/>
 		<?php
 		/*display this error if $data['error'] is not null that is if the error is passed from the
 		controller
 		*/
	 		if (isset($error) == TRUE) {
	 			echo "<i class='form-error'>*Incorrect Username and/or Password!!!</i>";
	 		}
 		?>
	 	<?php echo validation_errors(); ?>

		<?php echo form_open('login_form') ?>

		    <label for="username">Username</label>
		    <input type="input" name="username" /><br />

		    <label for="password">Password</label>
		    <input type="password" name="password" placeholder="**********"/><br />
		    <br/>
		    <input type="submit" name="submit" value="Login" />

		</form>
		<a href="/eStore/index.php/register_form" class="register">Register</a>
	</div>
	<br/>
	<br/>

 </div>