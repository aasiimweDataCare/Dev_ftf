<?php
session_start();

require_once('connections/lib_connect.php');

if(isset($_SESSION['user_id'])&& isset($_SESSION['username']) && isset($_SESSION['role'])){
mysql_query("update tbl_login set status='Inactive' where user_id='".$_SESSION['user_id']."'")or die(http(__line__));

$_SESSION['username']=NULL;
$_SESSION['password']=NULL;
$_SESSION['role']=NULL;
$_SESSION['user_id']=NULL;
$_SESSION['name']=NULL;


unset($_SESSION['username']);
unset($_SESSION['password']);
unset($_SESSION['role']);
unset($_SESSION['user_id']);
unset($_SESSION['name']);

session_destroy();

echo "<center><p><font color='red'>You have Successfully Logged out</font></p></center>";
echo '<meta content="1;URL=http://localhost:82/dev_ftf/index.php/LoginController/index" http-equiv="refresh">';
/* echo '<meta content="1;URL=http://mis.ftfcpm.com:9000/index.php/LoginController/index" http-equiv="refresh">'; */
/* echo '<meta content="1;URL=http://mis.ftfcpm.com:9000/demo/index.php/LoginController/index" http-equiv="refresh">'; */

}
?>