<div class="dashboard-sidebar">
	<h4 class="username">
	<?php 
		if(isset($login_session)) {
			echo 'Welcome '. $login_session .'!'; 
		} else {
			echo 'Welcome !';
		}
	?>
	</h4>
	<ul>
		<a href="/eStore/index.php/login_form/logout"><li>Log Out!</li></a>

		<?php if(isset($document)) {
				echo "
						<a href='/eStore/index.php/dashboard'><li>Goto Dashboard</li></a>
					";
			} 
		?>
	</ul>


</div>