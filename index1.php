<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="nav.css" type="text/css">
<meta charset="utf-8">
<title>Security testing model</title>
</head>
<body>
<div class="jumbotron text-center">
<?php

$url=$_REQUEST['url'];
    ?><ul>

        <li><a href="#">User &#9662;</a>
            <ul class="dropdown">
                
                <li><a href="#"></a></li>
                <li><a href="securesearch.php">Encryption</a></li>
				<li><a href="#">Portscanning</a></li>
				<li><a href="formcont.php">Form validation controls</a></li>
            </ul>
        </li>

		        <li><a href="#">Developer &#9662;</a>
            <ul class="dropdown">
                <li><a href="hostworking.php">Portscanning</a></li>
                <li><a href="fsizetypedatabase.php">Filesize/type</a></li>
                <li><a href="udpfloodddos.php">UDP flood</a></li>
				<li><a href="icmpflood.php?id=<?php echo $url;?>">ICMP flood</a></li>
				<li><a href="os.php">OS</a></li>
				<li><a href="csrf.php">CSRF</a></li>
            </ul>
        </li>

		        <li><a href="#">Server &#9662;</a>
            <ul class="dropdown">
                <li><a href="downloadworking.php">download website</a></li>
                <li><a href="shareserver.php">Share server</a></li>
                <li><a href="#">Printers</a></li>
            </ul>
        </li>

		        <li><a href="#">Report &#9662;</a>
            <ul class="dropdown">
                <li><a href="report.php">Summary</a></li>
                <li><a href="#">Monitors</a></li>
                <li><a href="#">Printers</a></li>
            </ul>
        </li>

    </ul>
    
</div>
</body>

</html>                                		