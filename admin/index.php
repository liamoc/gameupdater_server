<?php
require_once "../config.php";
require_once "functions.php";

require_once "template.php";

$page = new template("index.php");

$current_version = get_current_display_version();

$page->set("title", $config['title']);
$page->set("upload_url", "upload.php");
$page->set("current_version", $current_version);
$page->set("zip_enabled", $zip_enabled);

$page->show();

?>