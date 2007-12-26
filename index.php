<?php
$request = substr($_SERVER['REQUEST_URI'], strlen($_SERVER['SCRIPT_NAME']) + 1);

if (empty($request))
{
	header("HTTP/1.0 400 Bad Request");
}

$parts = explode("/", $request);

if ($parts[0] == "get")
{
	$file_path = implode("/", array_slice($parts, 1));
	if (strstr($file_path, ".."))
	{
		header("HTTP/1.0 400 Bad Request");
	}
	else
	{
		if (!file_exists("base/" . $file_path))
		{
			header("HTTP/1.0 404 Not Found");
		}
		else
		{
			echo file_get_contents("base/" . $file_path);
		}
	}
}

else
{
	header("HTTP/1.0 400 Bad Request");
}

?>