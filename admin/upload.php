<?php
require_once "../config.php";
require_once "functions.php";

require_once "template.php";
if (!isset($_POST['version']) || empty($_POST['version']))
{
	$page = new template("error.php");
	$page->set("message", "No version was specified.");
	$page->show();
}
if (!$zip_enabled)
{
	$page = new template("error.php");
	$page->set("message", "Zip support is not enabled.");
	$page->show();
}
else
{
	$filename = $_FILES['file']['name'];
	$tmp_path = $_FILES['file']['tmp_name'];
	
	$zip = new ZipArchive();
	$zip->open($tmp_path);
	$zip->extractTo("../base");
	
	$version = $_POST['version'];
	
	$nv = get_current_version() + 1;
	
	$f = fopen("../data/version", "w");
	fwrite($f, "disp_version=" . $version . "\r\n");
	fwrite($f, "version=" . $nv . "\r\n");
	fclose($f);
	
	write_hashes();
	
	header("Location: index.php");
}

?>