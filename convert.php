<?php
if (isset($_GET['download'])){
	$file = $_GET['download'];
	$filename  = 'output.mid';
	require('midi.class.php');
	$midi = new Midi();
	$midi->downloadMidFile($file,$filename);
}
$file=(isset($_FILES['mid_upload'])&&$_FILES['mid_upload']['tmp_name']!='')?$_FILES['mid_upload']['tmp_name']:'';//(isset($p['file'])?$p['file']:'');
?>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
<title>CONVERSION</title>
<style>
body {font-family:arial;font-size:11px;margin:5px;}
input {font-family:arial;font-size:11px}
td {font-family:arial;font-size:11px}
</style>
</head>
<body>

<form enctype="multipart/form-data" action="convert.php" method="POST" onsubmit="if (this.mid_upload.value==''){alert('Please choose a mid-file to upload!');return false}">
<input type="hidden" name="MAX_FILE_SIZE" value="1048576"><!-- 1 MB -->
MIDI file (*.mid) to upload: <input type="file" name="mid_upload">
<br>
<input type="submit" value=" send ">
</form>
<?php


if ($file!=''){
	require('midi.class.php');
	$midi = new Midi();
	$midi->importMid($file);
	
	// SHOW OLD TYPE
	echo 'Old Midi-Type: '.$midi->type."<br>\n";	
	
	//CONVERT TO TYPE 0
	function cmp ($a, $b) {
		$ta = (int) strtok($a,' ');
		$tb = (int) strtok($b,' ');
    if ($ta == $tb) return 0;
    return ($ta < $tb) ? -1 : 1;
	}

	$newTrack=array();
	foreach ($midi->tracks as $track) {
		array_pop ($track);
		$newTrack=array_merge($newTrack,$track);
	}
	
	usort ($newTrack, "cmp");
	
	$endTime = strtok($newTrack[count($newTrack)-1], " ");
	$newTrack[]="$endTime Meta TrkEnd";
	
	$tb = $midi->getTimebase();

	$midi_new = new Midi();
	$txt = "MFile 0 1 $tb\nMTrk\n".implode("\n",$newTrack)."\nTrkEnd";
	$midi_new->importTxt($txt);

	// SHOW NEW TYPE
	echo 'New Midi-Type: '.$midi_new->type."<br>\n";	
	
	$save_dir = 'tmp/';
	srand((double)microtime()*1000000);
	$file = $save_dir.rand().'.mid';
	$midi_new->saveMidFile($file);
	$midi_new->playMidFile($file,1,1,0); //optional: 'wm','qt','bk'
	
?>
	<br><br><input type="button" name="download" value="Save converted SMF (*.mid)" onClick="self.location.href='convert.php?download=<?php echo urlencode($file)?>'">
<?php
}
?>
</body>
</html>