<html>
<head>
<link rel="stylesheet" href="nav.css" type="text/css">
</head>
<body>
<form>
<input type="text" name="url" >
<input type="submit" value="submit" name="click">
</form>
<?php

mysql_connect("localhost","root","");
mysql_select_db("phd");
$query1=mysql_query("SELECT search1 FROM securesearch");
if(isset($_GET['url']))
{
$dir=$_REQUEST['url'];
}
while($res = mysql_fetch_array($query1, MYSQL_NUM))
{
	$arr1[] = $res[0];
	/*$arr2[] = $res[1];
	$arr3[] = $res[2];
	$arr4[] = $res[3];
	$arr5[] = $res[4];*/
}
//print_r($arr5); exit; 	

//$dir1=$_REQUEST['id'];
//$dir=(trim($dir1,'http://'));

listFolderFiles($dir,$arr1);

function listFolderFiles($dir,$ar1)
{
	$data="";
    $ffs = scandir($dir);
	$flag=0;
	
    foreach($ffs as $ff)
    { 
		$c=0;
		if($ff != '.' && $ff != '..')
		{
			$CurrentFile  = $dir.'/'.$ff;
			//echo $CurrentFile."</br>"; 
	        if(is_dir($CurrentFile))
			{
				listFolderFiles($dir.'/'.$ff,$ar1);
			}
			if(!(is_dir($CurrentFile)))
			{
				//echo $CurrentFile."</br>";
				$data = file_get_contents($CurrentFile);
				$cnt = count($ar1);
				
				for($i=0;$i<$cnt;$i++)
				{
					if((stripos($data,$ar1[$i])!== false))
					{	
						//echo "\nValue Mali";
						$flag=1;
						//echo "</br>Value of Flag is ".$flag."</br>";
						//return true ;
						break 2;
					}
					
				}
    	
			}
	    }
	}
	if($flag==1)
		{		
	$a=$_REQUEST['url'];
	$ans1="There is encryption funtions so your website is safe";	
	mysql_query("insert into repsec_file (webname,rdate,msg) values ('$a',now(),'$ans1')");
	echo "There is encryption funtions so your website is safe";
	exit;
	}
}
$a=$_REQUEST['url'];
	$ans1="There is not encryption funtions so your website is not safe";	
	mysql_query("insert into repsec_file (webname,rdate,msg) values ('$a',now(),'$ans1')");
	echo "There is not encryption funtions so your website is not safe";
	print("<br><hr><b> Suggetions</b><br>");
		print("<ul><li>Encryption of user input is neccesary</li>");
		print("<li>pass data without encryption is harmful</li></ul>");
		
/*if($ans == true)
{
	$a=$_REQUEST['id'];
	$ans1="You are safeeee";	
//mysql_query("insert into rep_file (webname,rdate,msg) values ('$a',now(),'$ans1')");
	echo "You are Safeeeeeee";
}
else
{
	print("<br><hr><b> Suggetions</b><br>");
		print("<ul><li>Prepared Statements (with Parameterized Queries)</li>");
		print("<li>Use Stored Procedures</li>");
		print("<li>White List Input Validation</li>");
		print("<li>Escaping All User Supplied Input</li></ul>");
		
}*/

?>
</body>
</html>`