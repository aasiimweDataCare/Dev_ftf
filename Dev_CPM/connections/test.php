<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>

<body>
<?php

$host="0.0.0.0";
$ports = array(21=>'ftp',80=>'http');
$timeout = 5.0;
foreach($ports as $port=>$description) {
$socket = @fsockopen($host, $port, $errno, $errstr, $timeout);
if ($errno) {
echo "ports not open<br>";
} else {
echo "port is open<br>";
}
@fclose($socket);
}

 ?>


</body>
</html>
