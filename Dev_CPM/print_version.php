<?php
session_start();
require_once('connections/lib_connect.php');

//header("Cache-control: private"); 






 ?>




<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="shortcut icon" href="images/logo.png" type="image/icon" />  
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/style.css" rel="stylesheet" type="text/css" />

<title><?php heading($_GET['linkvar']); ?></title>
</head>

<body onload="window.print();" bgcolor="#FFFFFF">
<table cellspacing='0'      width="800" border="0" align="center" style='font-family:Arial, Helvetica, sans-serif;
font-size:12px;border:1px solid #d6dff7;' bgcolor="#FFFFFF">
  <tr>
    <td align="center"><img src="images/print_header.png" width='100%'/></td>
  </tr>
  <tr>
    <td align="center"><?php
	if($_GET['linkvar']<>NULL){
	require_once('export_to_excel_word.php');
	}
	 
 /**/

 ?></td>
  </tr>
</table>



</body>
</html>
