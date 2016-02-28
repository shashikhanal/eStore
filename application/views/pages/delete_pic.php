<div class="dashboard-container">
	<h2 class="file-title">
	<a href="/eStore/index.php/file_section/picture">Pictures</a>
	</h2><br/>
	<a href="/eStore/index.php/picture/" class="register">Upload</a>
	<a href="/eStore/index.php/picture/download_pic" class="register">Download</a>
	<a class="register">Delete</a>
	<br/>
	<br/>
	<div class="display-file">

	<?php if(isset($display_query)) {
			if ($display_query->num_rows() > 0) { 
		        foreach ($display_query->result() as $row) {
	?>				<li>
	                <a href="<?php echo base_url()."$row->picture";?>">
	                <?php $pieces = explode("/", $row->picture);
	                echo $pieces[3]; ?>
	                </a>

					<?php echo validation_errors(); ?>

					<?php echo form_open('picture/delete_pic') ?>
					    <?php echo form_checkbox('check-delete', $row->picture, FALSE); ?>
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