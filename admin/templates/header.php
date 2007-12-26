<html>
<head>
<style type="text/css">
body {
	font-family: Calibri, Arial, sans-serif;
	font-size: 12pt;
	color: #000;
	background-color: #fcfcfc;
	padding: 24px;
	margin: 0;
}
.upload-box, .currentv-box {
	float: left;	
	clear: left;
	margin-bottom: 32px;
	width: 30%;
}
.stats {
	float: left;
	margin-bottom: 32px;
	width: 70%;
}
.upload-box div.inner, .currentv-box div.inner, .stats div.inner {
	padding: 8px;
	border: 1px solid #444;
}
.stats div.inner { margin-left: 24px; }
.upload-box form {
	text-align: left;
}
h1, h2, h3, h4, h5, h6 { padding: 0; margin: 0; }

h1 {
	margin-bottom: 24px;
	font-size: 18pt;
}
h2 {
	font-size: 14pt;
	margin-top: -26px;
	margin-left: 8px;
	background: #fff;
	padding: 4px;
	float: left;
	
}
p { margin: 8px 0; clear: left; }
form { margin: 0; padding: 0; }
.current-version {
	clear: left;
	font-size: 24pt;
	font-weight: bold;
	margin: 0;
	text-align: center;
}

</style>
<title><?php echo $title; ?></title>
</head>
<body>
<h1><?php echo $title; ?></h1>