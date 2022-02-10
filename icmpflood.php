<html>
<head>
<link rel="stylesheet" href="t.css" type="text/css">
</head>
<?php


//unlink("s1.txt");
//system('netstat -a > a.txt');
//system('netstat -p proto> p.txt');
system('netstat -s > s1.txt');
$file = fopen("s1.txt", "r");
$members = array();

while (!feof($file)) {
   $members[] = fgets($file);
   }

//fclose($file);
//echo count($members);
//echo $members[44];
echo "<br>*************ICMPV4 stastics***********<br>";
echo "<br>message request";
echo $x=intval(substr($members[44],27,5));
echo "<br>message response ";
echo $y=intval(substr($members[44],40,5));
echo "<br>echo request ";
echo $recho=intval(substr($members[50],27,5));
echo "<br>message response ";
echo $reecho=intval(substr($members[50],40,5));
if ($x>=1000 or $y>=1000 or $reecho>=1000 or $recho>=1000)
 {
 echo "<br>it is no safe for transaction";
 echo "<br>it may be ICMP flood";
 }
 else
 {echo "<br><b>you are safe</b>";
 }
//var_dump($members);

echo "<br>****************ICMPV6 stastics*************<br>";
echo "<br>message request";
echo $x2=intval(substr($members[63],27,5));
echo "<br>message response ";
echo $y2=intval(substr($members[63],40,5));
echo "<br>echo request ";
echo $recho2=intval(substr($members[69],27,5));
echo "<br>message response ";
echo $reecho2=intval(substr($members[69],40,5));
if ($x2>=1000 or $y2>=1000 or $reecho2>=1000 or $recho2>=1000)
 {
 echo "<br>it is no safe for transaction";
 echo "<br>it may be ICMP flood";
 $ans= "it may be ICMP flood";
 }
 else
 {echo "<br><b>you are safe</b>";
$ans="you are safe no ICMP flood";
 }
//var_dump($members);


mysql_connect("localhost","root","");
mysql_select_db("phd");
$q1="update repicmp set rdate=now(),msg='$ans'";
//$q1="insert into repicmp (rdate,msg) values (now(),'$ans')";
	  mysql_query($q1);



?>


</html>