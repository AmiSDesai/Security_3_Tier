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
$query1=mysql_query("SELECT fsdesc,fsdesc1,fsdesc2,fsdesc3,fsdesc4 FROM filesearch");
while($res = mysql_fetch_array($query1, MYSQL_NUM))
{
	$arr1[] = $res[0];
	$arr2[] = $res[1];
	$arr3[] = $res[2];
	$arr4[] = $res[3];
	$arr5[] = $res[4];
}
//print_r($arr5); exit; 	
$dir = $_SESSION["Value"];
//$dir1=$_REQUEST['id'];
//$dir=(trim($dir1,'http://'));

$flag=listFolderFiles23($dir,$arr1,$arr2,$arr3,$arr4,$arr5);
if($flag==1)
	{		
	$a=$dir;
	$ans1="There is file type and size checking funtions so your website is safe";	
	mysql_query("insert into rep_file (webname,rdate,msg) values ('$a',now(),'$ans1')");
	echo "There is file type and size checking funtions so your website is safe";
	}
else
{
$a=$dir;
	$ans1="There is not file type and size checking funtions so your website is not safe";	
	mysql_query("insert into rep_file (webname,rdate,msg) values ('$a',now(),'$ans1')");
	echo "There is not file type and size checking funtions so your website is not safe";
	print("<br><hr><b> Suggetions</b><br>");
		print("<ul><li>Check uploaded file type before enter in database</li>");
		print("<li>if it will not check backdoor will be insert sing scripting file</li>");
		print("<li>file size is also big problem because it slow down system.</li></ul>");
		}

function listFolderFiles23($dir,$arr1,$arr2,$arr3,$arr4,$arr5)
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
			echo $CurrentFile."</br>"; 
	        if(is_dir($CurrentFile))
			{
				listFolderFiles23($dir.'/'.$ff,$arr1,$arr2,$arr3,$arr4,$arr5);
			}
			if(!(is_dir($CurrentFile)))
			{
				echo $CurrentFile."</br>";
				$data = file_get_contents($CurrentFile);
				$cnt = count($arr1);
				
				for($i=0;$i<$cnt;$i++)
				{
					if((stripos($data,$arr1[$i])!== false) || (stripos($data,$arr2[$i])!== false) || (stripos($data,$arr3[$i])!== false) || (stripos($data,$arr4[$i])!== false) || (stripos($data,$arr5[$i])!== false))
					{	
						//echo "\nValue Mali";
						$flag=1;
						//echo "</br>Value of Flag is ".$flag."</br>";
						//return true ;
						return $flag ;
						break 2;
					}
					
				}
    	
			}
		//echo '</li>';$data="";
        }
	}
}


?>
</body>
</html>