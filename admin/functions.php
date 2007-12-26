<?php

// these are here to be included in every page

$zip_enabled = class_exists("ZipArchive");

function get_current_display_version()
{
	$f = file_get_contents("../data/version");
	$f = explode("\n", $f);
	foreach ($f as $l)
	{
		$kvp = explode("=", trim($l));
		if ($kvp[0] == "disp_version")
		{
			return $kvp[1];
		}
	}
	return "None";
}

function get_current_version()
{
	$f = file_get_contents("../data/version");
	$f = explode("\n", $f);
	foreach ($f as $l)
	{
		$kvp = explode("=", trim($l));
		if ($kvp[0] == "version")
		{
			return (int)($kvp[1]);
		}
	}
	return 0;
}

function get_dir_list_recursive($dir)
{
	global $config;
	$bdir = "../base/";
	$list = array();
	$d = dir($bdir . $dir);
	while (false !== ($entry = $d->read())) {
		$path = $bdir . $dir . "/" . $entry;
		if ($entry == ".." || $entry == ".")
		{
			continue;
		}
		
		if (is_dir($path))
		{
			if (array_search(substr($dir . "/" . $entry, 1), $config['ignore']) === false)
			{
				$list = array_merge($list, get_dir_list_recursive($dir . "/" . $entry));
			}
		}
		else
		{
			if (array_search(substr($dir . "/" . $entry, 1), $config['ignore']) === false)
			{
				$list[] = $dir . "/" . $entry;
			}
		}
	}
	return $list;
}

function write_hashes()
{
	$f = fopen("../data/hashes", "w");
	foreach (get_dir_list_recursive("") as $file)
	{
		fwrite($f, substr($file, 1) . " " . md5_file("../base" . $file) . "\n");
	}
	fclose($f);
}

?>