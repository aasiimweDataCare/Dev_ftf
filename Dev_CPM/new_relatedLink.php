<?php
require_once('connections/lib_connect.php');
?>

<html>
<head>




<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link href="css/style.css" rel="stylesheet" type="text/css" />
<title><?php heading($_GET['action']); ?></title>
</head>

<body>

<table width="100%" border="0" align="center" id="container_table">
  <tr>
    <td width="927">
<table width="880" border="0" align="center"  >
  <tr>
    <td><?php //require_once('connections/header.html'); ?></td>
  </tr>
</table><table width="870" border="0" align="center" id="content_" >
  <tr>
    <td width="190" valign="top"><table width="190" border="0" >
      <tr>
        <td valign="top" align="left"><?php //require_once('connections/left_links.php'); ?></td>
            </tr>
      </table></td>
          <td width="660" valign="top"  ><div id='bodyDisplay'> <script language='javascript' type='text/javascript'> //xajax_view_comments();</script>
          </div>
          <table width='400' border='0'>


          <tr>
            <td>
              <form action='new_comment.php' method='post' NAME='comments' id='comments' enctype='multipart/form-data'>
                <table width='535' border='0'>
                  <tr>
                    <td width='517'>
                      <table border='0'>
                        <tr>
                          <td class=''>Username:</td>
                          <td><input name="textfield" type="text" id="textfield" size="48" /></td>
                        </tr>
                        <tr>
                          <td>Comment/Problem</td>
                          <td><textarea name='comment' id='comment' cols='45' rows='5'></textarea></td>
                        </tr>
                        <tr>
                          <td>Attach screen shot if any:</td>
                          <td> <input type='hidden' name='MAX_FILE_SIZE' value='100000000' /> <input name='img_file' type='file' class='evenrow' id='img_file' size="30"></td>
                        </tr>

                        <tr>
                          <td>&nbsp;</td>
                          <td align='right'><?php
						  
						  if(isset($_POST['save_comment'])){
 $_SESSION['username_1']=trim($_POST['username']);
$_SESSION['comment']=trim($_POST['comment']);

mysql_query("insert into tbl_comment(user_id,comment)values('".$_SESSION['username_1']."','".$_SESSION['comment']."')")or die("<font color='red'>could not capture comment because ".mysql_error()."</font>");

$select="select id from tbl_comment where user_id='".$_SESSION['username_1']."'&& comment='".$_SESSION['comment']."'";
 $row=mysql_fetch_array(mysql_query($select))or die(mysql_error());
if($_FILES['img_file']['name'] != NULL){
			$img_name = preg_replace("/.+\./", "snap_".$row['id'].".", $_FILES['img_file']['name']);
			@mkdir("snapshots");
			
			if(!move_uploaded_file($_FILES['img_file']['tmp_name'], "snapshots/".$img_name))
				echo"Could not upload snashot!";
			else{
		 $update="update tbl_comment set snapshot='".$img_name."' where id='".$row['id']."'";
				$query=mysql_query($update)or die(mysql_error());
				if($query){
				echo"aBi  ".$img_name."    uploaded!";
				//mysql_query("delete from tbl_safari where booking_id='".$_SESSION['booking_id']."' && safari_type='' ");
				echo "<meta http-equiv=Refresh content=3;url=home.php>";}
}
			
}
}
						  
						  
						   ?></td>
                        </tr>
                        <tr>
                          <td>&nbsp;</td>
                          <td align='right'><input type='submit' name='save_comment' id='save_comment'  value='Save' /></td>
                        </tr>
                      </table>
                   </td>
                  </tr>
                </table>
              </form>
           </td>
          </tr>
        </table>
          </td>
        </tr>
</table>

<table width="880" border="0" align="center">
  <tr>
    <td><?php require_once('connections/footer.php'); ?> </td>
    </tr>
</table></td>
  </tr>
</table>

</td>
  </tr>
</table>
</div>
</body>
</html>
