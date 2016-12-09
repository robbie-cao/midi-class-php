<?php
$p=$_POST;$g=$_GET;

/****************************************************************************
RTTL CLASS
****************************************************************************/
require('rttl.class.php');

if (isset($g['download'])){
	$file = $g['download'];
	$filename  = 'output.mid';
	$midi = new Rttl();
	$midi->downloadMidFile($file,$filename);
}

$test='Beethoven:d=4,o=5,b=250:e6,d#6,e6,d#6,e6,b,d6,c6,2a.,c,e,a,2b.,e,a,b,2c.6,e,e6,d#6,e6,d#6,e6,b,d6,c6,2a.,c,e,a,2b.,e,c6,b,1a';
$rttl = isset($p['rttl'])?$p['rttl']:$test;
$engine = isset($p['engine'])?$p['engine']:'qt';
?><html>
<head>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
<title>Rttl2Midi</title>
<style>
body {font-family:Verdana;font-size:11px;margin:5px;}
input {font-family:Verdana;font-size:11px}
</style>
</head>
<body>
<form action="<?=$_SERVER['PHP_SELF']?>" method="post">
<textarea name="rttl" style="width:90%" rows="2"><?=$rttl?></textarea>
<br>
<input type="radio" name="engine" value="bk"<?=$engine=='bk'?' checked':''?>>Beatnik
<input type="radio" name="engine" value="qt"<?=$engine=='qt'?' checked':''?>>QuickTime
<input type="radio" name="engine" value="wm"<?=$engine=='wm'?' checked':''?>>Windows Media
<input type="radio" name="engine" value=""<?=$engine==''?' checked':''?>>other (default Player)<br><br>
<input type="submit" value=" send ">
</form>
<br>
<?php
$p = $_POST;
if (isset($p['rttl'])){
	$save_dir = 'tmp/';
	srand((double)microtime()*1000000);
	$file = $save_dir.rand().'.mid';

	$midi = new Rttl();
	$midi->importRttl($p['rttl']);
	$midi->saveMidFile($file);
	$midi->playMidFile($file,1,1,0,$engine);
?>
<br><br><input type="button" name="download" value="Save as SMF (*.mid)" onClick="self.location.href='<?=$_SERVER['PHP_SELF']?>?download=<?=urlencode($file)?>'">
<?
}
?>
</body>
</html>
