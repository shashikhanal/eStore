<div class="dashboard-container">
	<h2 class="file-title">
	<a href="/eStore/index.php/file_section/music">Music</a>
	</h2><br/>
	<a href="/eStore/index.php/music/" class="register">Upload</a>
	<a class="register">Download</a>
	<a href="/eStore/index.php/music/delete_music" class="register">Delete</a>
	<br/>
	<br/>
	<div class="display-file">

	<?php if(isset($display_query)) {
			if ($display_query->num_rows() > 0) { 
		        foreach ($display_query->result() as $row) {
	?>				<li>
	                <a href="<?php echo base_url()."$row->music";?>">
	                <?php $pieces = explode("/", $row->music);
	                echo $pieces[3]; ?>
	                </a>

					<?php echo validation_errors(); ?>

					<?php echo form_open('music/download_music') ?>
					    <?php echo form_checkbox('check-download', $row->music, FALSE); ?>
					    <input type="submit" name="submit" value="Download" />
					</li>

					</form>

	<?php 
		        }
			}
		}

	?>

	</div>
</div>