<div class="dashboard-container">
	<h2 class="file-title">
	<a href="/eStore/index.php/file_section/document">Documents</a>
	</h2><br/>
	<a class="register">Upload</a>
	<a href="/eStore/index.php/document/download_doc" class="register">Download</a>
	<a href="/eStore/index.php/document/delete_doc" class="register">Delete</a>
	<br/>
	<br/>
	<div class="upload">
		<br/>
		<?php if(isset($error)){
			echo $error;		
		}
		?>

		<?php echo form_open_multipart('document/do_upload');?>

		<input type="file" name="userfile" size="20" />
		<br /><br />
		<input type="submit" value="Upload" />
		</form>

	</div>

</div>