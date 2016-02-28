<div class="login-box">

	<div class="login-form">
		
		<h2>Register</h2>
		<br/>
		<?php echo validation_errors(); ?>

		<?php echo form_open('register_form') ?>

		    <label for="username">Username</label>
		    <input type="input" name="username" /><br />

		    <label for="password">Password</label>
		    <input type="password" name="password" /><br />

		    <label for="email">E-mail</label>
		    <input type="input" name="email" /><br />
		    <br/>

		    <input type="submit" name="submit" value="Create Account" />
		</form>
		<a href="/eStore/index.php/login_form" class="register">Login</a>

	</div>

</div>