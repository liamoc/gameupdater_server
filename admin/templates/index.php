<?php
include "header.php";
?>
<div class="currentv-box">
	<div class="inner">
	<h2>Current version</h2>
		<div class="current-version"><?php echo $current_version; ?></div>
	</div>
</div>
<div class="stats">
	<div class="inner">
		<h2>Statistics</h2>
			<p>Not yet implemented.</p>
	</div>
</div>
<div class="upload-box">
	<div class="inner">
	<h2>Upload a new version</h2>
	<?php if ($zip_enabled): ?>
		<p>Upload a <em>.zip</em> file as the latest version.</p>
		<form enctype="multipart/form-data" action="<?php echo $upload_url; ?>" method="POST">			
			Version: <input type="text" name="version" /><br />
			<input type="file" name="file" /> <input type="submit" value="Upload" />
		</form>
	<?php else: ?>
		<p>Zip support is disabled.</p>
	<?php endif; ?>
	</div>
</div>

<?php
include "footer.php";
?>