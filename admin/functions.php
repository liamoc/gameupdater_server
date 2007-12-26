<?php
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
	foreach (get_dir_list_recursive("") as $dir)
	{
		fwrite($f, substr($dir, 1) . " " . md5_file("../base" . $dir) . "\n");
	}
	fclose($f);
}

?>