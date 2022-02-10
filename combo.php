<html>
<head>
<?PHP
if(isset($_GET['url']))
{
$dir=$_REQUEST['url'];
}
//include ("os.php");
//echo "aaa<br>";
//include("csrf.php");
//echo "bbbb<br>";
//include("securesearch.php");
//echo "cccc<br>";
include("formcont.php");
//echo "dddddd<br>";
//include("hostworking.php");
//echo "eeeeee<br>";
include("fsizetypedatabase.php");
//echo "ffffff<br>";
//include("udpfloodddos.php");
//echo "iiiiii<br>";
//include("icmpflood.php");
?>
</head>
<body>
<form>
<input type="text" name="url" >
<input type="submit" value="submit" name="click">
</form>
</body></html>
