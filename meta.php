<?php
$file=(isset($_FILES['mid_upload'])&&$_FILES['mid_upload']['tmp_name']!='')?$_FILES['mid_upload']['tmp_name']:'';//(isset($p['file'])?$p['file']:'');
?>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
<title>Meta-Messages</title>
<style>
body {font-family:arial;font-size:11px;margin:5px;}
input {font-family:arial;font-size:11px}
</style>
</head>
<body>

<form enctype="multipart/form-data" action="meta.php" method="POST" onsubmit="if (this.mid_upload.value==''){alert('Please choose a mid-file to upload!');return false}">
<input type="hidden" name="MAX_FILE_SIZE" value="1048576"><!-- 1 MB -->
MIDI file (*.mid) to upload: <input type="file" name="mid_upload">
<br>
<input type="submit" value=" send ">
</form>
<?php
if ($file!=''){
	echo 'File: '.$_FILES['mid_upload']['name'];
	echo '<hr><pre>';
	require('midi.class.php');
	$midi = new Midi();
	$midi->importMid($file,0);
	$track = $midi->getTrack(0);

	// list of meta events that we are interested in (adjust!)
	$texttypes = array('Text','Copyright','TrkName','InstrName','Lyric','Marker','Cue');

	$nothing = 1;
	foreach ($track as $msgStr){
		$msg = explode(' ',$msgStr);
		if ($msg[1]=='Meta'&&in_array($msg[2],$texttypes)){
			echo $msg[2].': '.substr($msgStr,strpos($msgStr,'"'))."\n";
			$nothing = 0;
		}
	}
	if ($nothing) echo 'No events found!';
	echo '</pre>';
}
?>
</body>
</html>