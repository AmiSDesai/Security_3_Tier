

<?php

$dir1=$_REQUEST['id'];
$dir=(trim($dir1,'http://'));
echo $dir;

if($_POST){
$sub_req_url = "http://localhost/index1.php";

$uri=$dir;
//$uri = $_POST['url'];
echo "<br><strong>Host IP :</strong>".gethostbyname($uri);
//$ch = curl_init();
$ch = curl_init($sub_req_url);
 curl_setopt($ch, CURLOPT_URL, "http://domains.yougetsignal.com/domains.php");
 curl_setopt($ch, CURLOPT_POST, true);
 curl_setopt($ch, CURLOPT_POSTFIELDS, "remoteAddress={$uri}");
 curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
 $postResult = curl_exec($ch);
 curl_close($ch);
 if(preg_match_all("#\"domainCount\":\"(.*?)\"#",$postResult,$domain)) {
    $nigga = $domain[1];
}
foreach ($nigga as $domains) { echo "<strong>  [+] Total Websites:</strong> ".$domains."<br><br>"; echo "===================<br>";    }
   if(preg_match_all("#\[([^\]]*)\]#",$postResult,$fuck)){
 $zebi = $fuck[1];
}
foreach ($zebi as $fucck) {  
if(preg_match_all("#\"(.*?)\", \"\"#",$fucck,$matches)) {  
        $klawi = $matches[1];
foreach ($klawi as $fuckaa)  { 
	echo "<strong>http://".$fuckaa."/</strong><br>";
  $save = fopen('Log.txt','ab');
   fwrite($save,"http://".$fuckaa."/\r\n");
  fclose($save);
}
}
}
$searchfor=gethostbyname($uri);
  $searchfor1=$uri;
  $save = fopen('Log.txt','ab');
  if (filesize('Log.txt') != 0)
  {mysql_connect("localhost","root","");
mysql_select_db("phd");
		  $query1=mysql_query("select * from rep_share");
   $data = file_get_contents('Log.txt');
	if ((stripos($data,$searchfor) !== false) && (stripos($data,$searchfor1) !== false))
            { $a=$_REQUEST['id'];
				
           	      echo "<font color='red'><b>You are website is not shared server so you are safe</b></font>";
				  $ans="You are website is not shared server so you are safe";
				  mysql_query("insert into rep_share (webname,rep_date,msg) values ('$a',now(),'$ans')");
		}
		else {$a=$_REQUEST['id'];
			
           	              echo "<font color='red'><b>You are website is on shared server so you are not safe</b></font>";
							$ans= "You are website is on shared server so you are not safe";
							mysql_query("insert into rep_share (webname,rep_date,msg) values ('$a',now(),'$ans')");
						  }
    
}
 
}
?>
<html>
<head><link rel="stylesheet" href="nav.css" type="text/css">
<style>
.btn-6d {
    border: 2px dashed #226fbe;
}
 
.btn-6d:hover {
    background: transparent;
    color: #226fbe;
}</style>
<SCRIPT LANGUAGE="JavaScript">
var rev = "fwd";
function titlebar(val)
{
var msg = "./Reverse Domain";
var res = " ";
var speed = 100;
var pos = val;
msg = "./Reverse Domain";
var le = msg.length;
if(rev == "fwd"){
if(pos < le){
pos = pos+1;
scroll = msg.substr(0,pos);
document.title = scroll;
timer = window.setTimeout("titlebar("+pos+")",speed);}
else{
rev = "bwd";
timer = window.setTimeout("titlebar("+pos+")",speed);}}
else{
if(pos > 0){
pos = pos-1;
var ale = le-pos;
scrol = msg.substr(ale,le);
document.title = scrol;
timer = window.setTimeout("titlebar("+pos+")",speed);}
else{
rev = "fwd";
timer = window.setTimeout("titlebar("+pos+")",speed);
}}}
titlebar(0);
</script></head><body background="http://s.ytimg.com/yt/imgbin/www-refreshbg-vflC3wnbM.png">
<h1>Your DNS is in Shared webserver or not??</h1>
	<form action="" method="POST">
	<strong>IP/Host :</strong> <input size="60" value="<?php echo $dir;?>" name="url" /> <button class="btn btn-6 btn-6d" name="submit"> Submit</button>
    </form>


</body>
</html>