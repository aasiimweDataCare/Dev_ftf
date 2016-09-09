<?php
session_start();
require_once('connections/lib_connect.php');
require_once('./xajax_0.2.4/xajax.inc.php');
//require_once('functions.php');
$xajax = new xajax();
$xajax->errorHandlerOn();
//regisater functions
$xajax->registerFunction('login');
$xajax->registerFunction('login2');
function login(){
$object=new xajaxResponse();

$data="<form id='abi_login' name='abi_login' onsubmit=\"xajax_login2(xajax.getFormValues('abi_login'))\"><table width='327' height='33' border='0' align='center' bordercolor='#FFFFFF'>
        <tr>
          <td colspan='2' height='33' background='images/login.gif'><div>
            <div align='center'><strong> <span class='style1'>aBi</span> Trust</strong>, <strong>Client Login</strong></div>
        </div></td>
      </tr><tr>
          <td width='' colspan=2><div align='center'>Provide a Username and password,<br>
            to access system details</div></td>
        
      </tr>
        <tr>
          <td width='1'>&nbsp;</td>
        <td width='296'><label>
          <div align='right'>Username: <img src='icons/user_icon.png' width='24' height='24' />
            <input  type='text' id='username' name='username' size='30' />
            </div>
          </label></td>
      </tr>
        <tr>
          <td>&nbsp;</td>
        <td><label>
          <div align='right'>Password: <img src='icons/padlockicon.png' width='24' height='24' />
            <input name='password' type='password' id='password' size='30' />
            </div>
          </label></td>
      </tr>
        <tr>
          <td>&nbsp;</td>
        <td><label> </label>
          <div align='right'>Reporting Period:
            <label>
              <select name='select' id='select'>
                </select>
              </label>
            </div></td>
      </tr>
        <tr>
          <td>&nbsp;</td>
        <td><div align='right'>
          <input type='submit' name='signin' id='signin'   value='Login' />
          </div>
            <label></label></td>
      </tr>
        <tr>
          <td>&nbsp;</td>
        <td><div align='right'>
          <label>
            <input type='checkbox' name='checkbox' id='checkbox' />
            Remember Me</label>
          </div></td>
      </tr>";
$data.="<tr>
          <td colspan='2'></td>
  </tr>
        <tr>
          <td colspan='2' height='33' background='images/login_bottom.gif'><div align='center'>&copy;". date('Y')." <span class='menu'><a href='http://www.unaso.or.ug' class='menu' target='_blank'>aBi Trust</a></span><a href='http://www.unaso.or.ug' class='white' target='_blank'>.</a> All rights reserved.</div></td>
      </tr>
      </table></form>";
$object->addAssign('login','innerHTML',$data);
return $object;
}




function login2($formValues){
$object=new xajaxResponse();
$user=$formValues['username'];
$password=$formValues['password'];
$reporting_period=trim($formValues['reporting_period']); 

$u="select * from tbl_user where username='$user' && password='".md5($pass)."' ";
$object->addAlert($u);
$query=mysql_query($u)or die(mysql_error());

if(mysql_num_rows($query)>0){
///-----------------------------------------------------
//ipaddress and mac address of the computer
#*******************************************************

$ipAddress=$_SERVER['REMOTE_ADDR'];
//$ipAddress=$_SERVER['SERVER_ADDR']
$macAddr=false;

#run the external command, break output into lines
$arp=`arp -a $ipAddress`;
$lines=explode("\n", $arp);

#look for the output line describing our IP address
foreach($lines as $line)
{
   $cols=preg_split('/\s+/', trim($line));
   if ($col[0]==$ipAddress)
   {
       $macAddr=$col[1];
   }
}



//------------------------------------------------------


$row = mysql_fetch_array($query)or die(mysql_error());
	$_SESSION['user_id']=$row['user_id'];
	$_SESSION['username']=$row['username'];
	$_SESSION['name']=$row['name'];
	$_SESSION['role']=$row['role'];
	
	if($row['role']=='system Administrator'){
	$id=$_SESSION['user_id'];
	$username=$_SESSION['username'];
	$role=$_SESSION['role'];
	
	$q="insert into tbl_login(user_id,role,ip_address) values('$id','$role','$ipAddress')";
	//$object->addAlert($q);
	mysql_query($q)or die("aBi Error-Code 0083: ".mysql_error());
	$object->addRedirect("home.php");
	
		#return $object;
	
	 }else if($row['role']=='guest'){
		$id=$_SESSION['user_id'];
	$username=$_SESSION['username'];
	$role=$_SESSION['role'];
	
	$q="insert into tbl_login(user_id,role,ip_address) values('$id','$role','$ipAddress')";
	//$object->addAlert($q);
		$object->addRedirect("home.php");
		#return $object;
	} else
	{
	$object->addAlert("Invalid username or Password!");
	$object->addRedirect("index.php");
	
	}
	}
$object->addAssign('bodyDisplay','innerHTML',$data);
return $object;
} 

$xajax->processRequests();

  ?>


<html>
<head>
<?php $xajax->printJavascript('xajax_0.2.4/'); 

?>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

<title>aBi Trust:Login</title>

<!--<link href="css/style.css" rel="stylesheet" type="text/css" />-->
<style type="text/css">
<!--
.style1 {color: #FFFFFF}
-->
</style>
</head>

<body bgcolor=" #ece9d8"><table width="100%" border="0">
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  
   <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  
   <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><table width="330" border="0" align="center" bgcolor="#FFFFFF" style="font-size:12px;
font-family:Tahoma;
font-weight:bold;
border:#FF9933;">
  <tr>
    <td><div id="login" align="justify"><script language="javascript" type="text/javascript">
    
    xajax_login();
    
    </script></div>
    <div id="bodyDisplay"></div>
      </td>
  </tr>
</table></td>
    <td>&nbsp;</td>
  </tr>
 
</table>



</body>
</html>
