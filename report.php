<html>
<head>
<link rel="stylesheet" href="nav.css" type="text/css">
</head>
<body>

<FORM method="post" action="report.php">
<INPUT type="TEXT" name="T1">
<INPUT type="submit" name="bt1" value="submit">
</FORM>
<?php


mysql_connect("localhost","root","");
mysql_select_db("phd");
if (isset($_REQUEST['bt1']))
{$T1=$_REQUEST['T1'];
$query1=mysql_query("select webname,rdate,msg from rep_file where webname like '%".$T1."%'")  or die
        (mysql_error());
echo "<b>$T1<b><hr>";

echo "<br><B> Client side validation </b><br><hr>";
echo "<table><tr><th colspan='2'><b>File Type and Size checking</b></th></tr>";
//		echo "<tr><th><font color='blue'>Report date</font></th><th><font color='blue'>Message</font></th></tr>";
while($row=mysql_fetch_array($query1))
{
echo "<tr>";
echo "<td><b>".$row['rdate']."</b></td>";
echo "<td>".$row['msg']."</td></tr></table>";
}

$query41=mysql_query("select webname,rdate,msg from rep_form where webname like '%".$T1."%'")  or die
        (mysql_error());

		echo "<table><tr><th colspan='2'><b>Form validation</b></th></tr>";
	//echo "<tr><th><font color='blue'>Report date</font></th><th><font color='blue'>Message</font></th></tr>";
	while($row=mysql_fetch_array($query41))
{
echo "<tr>";
echo "<td><b>".$row['rdate']."</b></td>";
echo "<td>".$row['msg']."</td></tr>";
}

$query2=mysql_query("select webname,rep_date,msg from rep_pass where webname like '%".$T1."%'")  or die
        (mysql_error());

		echo "<table><tr><th colspan='2'><b>Strong Password checking</b></th></tr>";
//echo "<tr><th><font color='blue'>Report date</font></th><th><font color='blue'>Message</font></th></tr>";
while($row=mysql_fetch_array($query2))
{
echo "<tr>";
echo "<td><b>".$row['rep_date']."</b></td>";
echo "<td>".$row['msg']."</td></tr></table>";

}

echo "<br><hr><B> Developer side validation </b><br><hr>";

$query43=mysql_query("select rdate,msg from repos")  or die
        (mysql_error());

		echo "<table><tr><th colspan='2'><b>Operating system updates</b></th></tr>";
	//echo "<tr><th><font color='blue'>Report date</font></th><th><font color='blue'>Message</font></th></tr>";
	while($row=mysql_fetch_array($query43))
{
echo "<tr>";
echo "<td><b>".$row['rdate']."</b></td>";
echo "<td>".$row['msg']."</td></tr></table>";
}

$query44=mysql_query("select rdate,msg from repicmp")  or die
        (mysql_error());

		echo "<table><tr><th colspan='2'><b>ICMP flood</b></th></tr>";
	//echo "<tr><th><font color='blue'>Report date</font></th><th><font color='blue'>Message</font></th></tr>";
	while($row=mysql_fetch_array($query44))
{
echo "<tr>";
echo "<td><b>".$row['rdate']."</b></td>";
echo "<td>".$row['msg']."</td></tr></table>";
}

$query45=mysql_query("select rdate,msg from repudp")  or die
        (mysql_error());

		echo "<table><tr><th colspan='2'><b>UDP flood</b></th></tr>";
	//echo "<tr><th><font color='blue'>Report date</font></th><th><font color='blue'>Message</font></th></tr>";
	while($row=mysql_fetch_array($query45))
{
echo "<tr>";
echo "<td><b>".$row['rdate']."</b></td>";
echo "<td>".$row['msg']."</td></tr></table>";
}


$query4=mysql_query("select webname,rdate,msg from rep_xss where webname like '%".$T1."%'")  or die
        (mysql_error());

		echo "<table><tr><th colspan='2'><b>XSS checking</b></th></tr>";
	//echo "<tr><th><font color='blue'>Report date</font></th><th><font color='blue'>Message</font></th></tr>";
	while($row=mysql_fetch_array($query4))
{
echo "<tr>";
echo "<td><b>".$row['rdate']."</b></td>";
echo "<td>".$row['msg']."</td></tr></table>";
}


$query5=mysql_query("select webname,rdate,msg from repsec_file where webname like '%".$T1."%'")  or die
        (mysql_error());

		echo "<table><tr><th colspan='2'><b>Encryption</b></th></tr>";
	//echo "<tr><th><font color='blue'>Report date</font></th><th><font color='blue'>Message</font></th></tr>";
	while($row=mysql_fetch_array($query5))
{
echo "<tr>";
echo "<td><b>".$row['rdate']."</b></td>";
echo "<td>".$row['msg']."</td></tr></table>";
}

}
echo "<br><hr><B> Server side validation </b><br><hr>";

$query3=mysql_query("select webname,rep_date,msg from rep_share where webname like '%".$T1."%'")  or die
        (mysql_error());

		echo "<table><tr><th colspan='2'><b>Share server checking</b></th></tr>";
	//echo "<tr><th><font color='blue'>Report date</font></th><th><font color='blue'>Message</font></th></tr>";
	while($row=mysql_fetch_array($query3))
{
echo "<tr>";
echo "<td><b>".$row['rep_date']."</b></td>";
echo "<td>".$row['msg']."</td></tr></table>";
}


?>

</body>
</html>