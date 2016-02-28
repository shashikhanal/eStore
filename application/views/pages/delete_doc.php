<div class="dashboard-container">
	<h2 class="file-title">
	<a href="/eStore/index.php/file_section/document">Documents</a>
	</h2><br/>
	<a href="/eStore/index.php/document/" class="register">Upload</a>
	<a href="/eStore/index.php/document/download_doc" class="register">Download</a>
	<a class="register">Delete</a>
	<br/>
	<br/>
	<div class="display-file">

	<?php if(isset($display_query)) {
			if ($display_query->num_rows() > 0) { 
		        foreach ($display_query->result() as $row) {
	?>				<li>
	                <a href="<?php echo base_url()."$row->document";?>">
	                <?php $pieces = explode("/", $row->document);
	                echo $pieces[3]; ?>
	                </a>

					<?php echo validation_errors(); ?>

					<?php echo form_open('document/delete_doc') ?>
					    <?php echo form_checkbox('check-delete', $row->document, FALSE); ?>
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