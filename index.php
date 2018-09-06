<?php
//mysql_connect("localhost","root","") or die("Database not connected");
//mysql_select_db("audio-convert-upload") or die("Database not found");
if(isset($_POST["submit"]))
{
	move_uploaded_file($_FILES["uploadfile"]["tmp_name"],"upload/".$_FILES["uploadfile"]["name"]);
	//$src_ext = strtolower($src_ext);
	$src_file =  $_FILES["uploadfile"]["name"];
	$src_audio = "upload/".$_FILES["uploadfile"]["name"];
	
	$dest_file = substr($src_file,0,strrpos($src_file, "."));
	//$dest_file = CommonFunctions::getFileNameWithoutext($src_file);
	$dest_audio = "upload".'/'.$dest_file;
	
	//echo "ffmpeg2theora -o ".$dest_audio.".ogg ".$src_audio." \ --audioquality 6";
	//system("ffmpeg -i ".$src_audio." ".$dest_audio.".mp3");
	system("ffmpeg2theora -o ".$dest_audio.".ogg ".$src_audio." \ --audioquality 6");
	exit;
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Convert Audio</title>
</head>

<body>
<form name="frm" id="frm" method="post" action="" enctype="multipart/form-data">
<input type="file" name="uploadfile" id="uploadfile" />
<input type="submit" name="submit" id="submit" value="Save" />
</form>
</body>
</html>