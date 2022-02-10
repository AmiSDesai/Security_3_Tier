<html>
<head>
<link rel="stylesheet" href="nav.css" type="text/css">
<?php
if(isset($_GET['url']))
{
$dir=$_REQUEST['url'];
}
echo "<u>".$dir."</u>";
exec('wget -r '.$dir );
$dir1=(trim($dir,'http://'));
echo "    website is stored in current directory with named (foldername) <u>". $dir1. "</u>"; 
?>
</head>
<body>
<form>
<input type="text" name="url" >
<input type="submit" value="submit" name="click">
</form>

</body>
</html>