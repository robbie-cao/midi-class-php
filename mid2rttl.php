<?php
$p=$_POST;

if (isset($p['save'])){
	$mime_type = 'application/octetstream'; // force download
	header('Content-Type: '.$mime_type);
	header('Expires: '.gmdate('D, d M Y H:i:s').' GMT');
	header('Content-Disposition: attachment; filename="rttl.txt"');
	header('Pragma: no-cache');
	echo $p['rttl'];
	exit();
}
$file=(isset($_FILES['mid_upload'])&&$_FILES['mid_upload']['tmp_name']!='')?$_FILES['mid_upload']['tmp_name']:'';//(isset($p['file'])?$p['file']:'');
?>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
<title>Midi2Rttl</title>
<style>
body {font-family:Verdana;font-size:11px;margin:5px;}
input {font-family:Verdana;font-size:11px}
</style>
</head>
<body>

<form enctype="multipart/form-data" action="<?=$_SERVER['PHP_SELF']?>" method="post" onsubmit="if (this.mid_upload.value==''){return true;alert('Please choose a mid-file to upload!');return false}">
<input type="hidden" name="MAX_FILE_SIZE" value="1048576"><!-- 1 MB -->
MIDI file (*.mid) to upload: <input type="file" name="mid_upload"> <input type="submit" value=" send ">
</form>
<?php

if ($file!=''){
	require('rttl.class.php');

	$fn = $_FILES['mid_upload']['name'];
	$bn = strtok($fn, '.');

	$midi = new Rttl();
	$midi->importMid($file);
?>
<hr>
RTTL converted from: <?=$fn?>
<form action="<?=$_SERVER['PHP_SELF']?>" method="post">
<textarea name="rttl" style="width:90%" rows="4"><?=$midi->getRttl($bn)?></textarea><br>
<input type="submit" name="save" value="save">
</form>
<?php
}
?>
</body>
</html>
