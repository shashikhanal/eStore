<div class="dashboard-container">
	<h2 class="file-title">
	<a href="/eStore/index.php/file_section/music">Music</a>
	</h2><br/>
	<a class="register">Upload</a>
	<a href="/eStore/index.php/music/download_music" class="register">Download</a>
	<a href="/eStore/index.php/music/delete_music" class="register">Delete</a>
	<br/>
	<br/>
	<div class="upload">
		<br/>
		<?php if(isset($error)){
			echo $error;		
		}
		?>

		<?php echo form_open_multipart('music/do_upload');?>

		<input type="file" name="userfile" size="20" />
		<br /><br />
		<input type="submit" value="Upload" />
		</form>

	</div>

</div>