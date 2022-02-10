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
$query1=mysql_query("SELECT FS1,FS2,FS3 FROM formsearch");
while($res = mysql_fetch_array($query1, MYSQL_NUM))
{
	$arr1[] = $res[0];
	$arr2[] = $res[1];
	$arr3[] = $res[2];
	}
//print_r($arr5); exit; 	

//$dir1=$_REQUEST['id'];
//$dir=(trim($dir1,'http://'));
$dir = $_SESSION["Value"];
$flag=listFolderFiles($dir,$arr1,$arr2,$arr3);
if($flag==1)
	{		
	$a=$dir;
	$ans1="There is client and server side form checking funtions so your website is safe";	
	mysql_query("insert into rep_form (webname,rdate,msg) values ('$a',now(),'$ans1')");
	echo "There is client and server side form checking funtions so your website is safe";
	
	}
else
{
$a=$dir;
	$ans1="There is not client and server side form checking funtions so your website is not safe";	
	mysql_query("insert into rep_form (webname,rdate,msg) values ('$a',now(),'$ans1')");
	echo "There is not client and server side form checking funtions so your website is not safe";
	print("<br><hr><b> Suggetions</b><br>");
		print("<ul><li>Null validation, formate validation</li>");
		print("<li>length validation</li>");
		print("<li>spacial characters, script tag checking shoud be done.</li></ul>");
		}
function listFolderFiles($dir,$arr1,$arr2,$arr3)
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
				listFolderFiles($dir.'/'.$ff,$arr1,$arr2,$arr3);
			}
			if(!(is_dir($CurrentFile)))
			{
				//echo $CurrentFile."</br>";
				$data = file_get_contents($CurrentFile);
				$cnt = count($ar1);
				
				for($i=0;$i<$cnt;$i++)
				{
					if((stripos($data,$arr1[$i])!== false) || (stripos($data,$arr2[$i])!== false) || (stripos($data,$arr3[$i])!== false))
					{	
						//echo "\nValue Mali";
						$flag=1;
						//echo "</br>Value of Flag is ".$flag."</br>";
						return $flag ;
						break 2;
					}
					
				}
    	
			}
		//echo '</li>';$data="";
        }
	}
}
	//echo "THis is Barrr ".$flag."</br>" ;

?>
</body>
</html>