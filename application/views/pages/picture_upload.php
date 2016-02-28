<div class="dashboard-container">
	<h2 class="file-title">Pictures</h2>
	<div class="upload">
		<br/>
		<?php //echo $error;?>

		<?php echo form_open_multipart('upload/do_upload');?>

		<input type="file" name="userfile" size="20" />
		<br /><br />
		<input type="submit" value="Upload" />
		</form>

	</div>

</div>