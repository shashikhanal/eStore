<div class="dashboard-container">
	<h2 class="file-title">
	<a href="/eStore/index.php/file_section/video">Videos</a>
	</h2><br/>
	<a href="/eStore/index.php/video/" class="register">Upload</a>
	<a href="/eStore/index.php/video/download_vid" class="register">Download</a>
	<a class="register">Delete</a>
	<br/>
	<br/>
	<div class="display-file">

	<?php if(isset($display_query)) {
			if ($display_query->num_rows() > 0) { 
		        foreach ($display_query->result() as $row) {
	?>				<li>
	                <a href="<?php echo base_url()."$row->video";?>">
	                <?php $pieces = explode("/", $row->video);
	                echo $pieces[3]; ?>
	                </a>

					<?php echo validation_errors(); ?>

					<?php echo form_open('video/delete_vid') ?>
					    <?php echo form_checkbox('check-delete', $row->video, FALSE); ?>
					    <input type="submit" name="submit" value="Delete" />
					</li>

					</form>

	<?php 
		        }
			}
		}

	?>

	</div>
</div>