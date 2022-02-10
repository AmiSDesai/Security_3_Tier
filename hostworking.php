<html>
<head>
<link rel="stylesheet" href="t.css" type="text/css">
</head>

<?php
$hosts = $_REQUEST['id'];
$host = gethostbyname($hosts);
$ports = array(21, 25, 80, 81, 110, 443, 3306);
$arrs=array("ip","icmp","ggp","tcp",
"egp","pup","udp","hmp","xns-idp",
"rdp","rvd" );
foreach ($arrs as $arr)
{   $connection = @fsockopen($host, $arrs);

    if (is_resource($connection))
    {
        echo '<h2>' . $host . ':' . $arr . ' ' . '(' . getprotobyname($arr) . ') is open.</h2>' . "\n";
	  exec('iptables -A OUTPUT -p icmp --icmp-type echo-request -j DROP');
	         fclose($connection);
    }

    else
    {
        echo '<h2>' . $host . ':' . $arr. ' is not responding.</h2>' . "\n";
    }
}
foreach ($ports as $port)

{
    $connection = @fsockopen($host, $port);

    if (is_resource($connection))
    {
        echo '<h2>' . $host . ':' . $port . ' ' . '(' . getservbyport($port, 'tcp') . ') is open.</h2>' . "\n";

        fclose($connection);
    }

    else
    {
        echo '<h2>' . $host . ':' . $port . ' is not responding.</h2>' . "\n";
    }
}?>


    


</html>