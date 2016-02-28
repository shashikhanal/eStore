<div class="dashboard-container">
	<h2 class="file-title">
	<a href="/eStore/index.php/file_section/video">Videos</a>
	</h2><br/>
	<a href="/eStore/index.php/video/" class="register">Upload</a>
	<a href="/eStore/index.php/video/download_vid" class="register">Download</a>
	<a href="/eStore/index.php/video/delete_vid" class="register">Delete</a>
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
					</li>
	<?php 
		        }
			}
		}

	?>

	</div>
</div>