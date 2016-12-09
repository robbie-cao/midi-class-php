<?php
$p = $_POST;
$file=(isset($_FILES['mid_upload'])&&$_FILES['mid_upload']['tmp_name']!='')?$_FILES['mid_upload']['tmp_name']:'';//(isset($p['file'])?$p['file']:'');
?>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
<title>Duration</title>
<style>
body {font-family:arial;font-size:11px;margin:5px;}
input {font-family:arial;font-size:11px}
</style>
</head>
<body>

<form enctype="multipart/form-data" action="duration.php" method="POST" onsubmit="if (this.mid_upload.value==''){alert('Please choose a mid-file to upload!');return false}">
<input type="hidden" name="MAX_FILE_SIZE" value="1048576"><!-- 1 MB -->
MIDI file (*.mid) to upload: <input type="file" name="mid_upload">
<br><br>
<input type="submit" value=" send ">
</form>
<?php
if ($file!=''){
	require('midi.class.php');

	$midi = new Midi();
	$midi->importMid($file);

	$maxTime=0;
	foreach ($midi->tracks as $track){
		$msgStr = $track[count($track)-1];
		list($time)=explode(" ", $msgStr);
		$maxTime=max($maxTime,$time);
	}
	$duration=$maxTime * $midi->getTempo() / $midi->getTimebase() / 1000000;
	echo "Duration [sec]: $duration";
}
?>
</body>
</html>
