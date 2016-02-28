
<div class="upload-success">
	
	<h3 class="success">Your file was successfully uploaded!</h3>
	<br/>
	<ul>
	<?php foreach ($upload_data as $item => $value):?>
		<li><?php echo $item;?>: <?php echo $value;?></li>
	<?php endforeach; ?>
	</ul>
	<br/>
	<center>
	<a class="general-link" href="/eStore/index.php/<?php echo $page; ?>">Upload Another File!</a>
	</center>

</div>