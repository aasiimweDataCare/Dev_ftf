<?php
session_start();
require_once('connections/lib_connect.php');
?>

<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
        <link href="css/style.css" rel="stylesheet" type="text/css" />
        <title>CPM MIS:User Comments</title>
        <script type="text/javascript" src="js/number.js"></script>
        <script type="text/javascript" src="js/addRow.js" language="javascript"></script>
        <script language='javascript'  type='text/javascript' src="js/validation.js"> </script>
        <script type="text/javascript" src="js/jquery-1.7.1.min.js" language="javascript"></script>
        <script type="text/javascript" src="js/loading.js" language="javascript"></script>
        <script type="text/javascript" src="js/check.js" language="javascript"></script>
        <script type="text/javascript" src="js/popup.js" language="javascript"></script>
        <script type="text/javascript" src="js/js.js" language="javascript"></script>
        <script type="text/javascript" src="js/limit_text.js" language="javascript"></script>
        <script type="text/javascript" src="js/add_upload.js" language="javascript"></script>
        <script type="text/javascript" src="js/jquery-2.1.4.js" language="javascript"></script>
        <script type="text/javascript" src="js/sumRows.js" language="javascript"></script>
        <script type="text/javascript" src="js/hoverRows.js" language="javascript"></script>
    </head>

    <body>

        <table width="870" border="0" align="center" id="content_">
            <tr>
                <td colspan="2" valign="top"><?php require_once('connections/header.php'); ?></td>
            </tr>
            <tr>
                <td width="190" valign="top">
                    <table width="190" border="0">
                        <tr>
                            <td valign="top" align="left"><?php require_once('connections/left_links.php'); ?></td>
                        </tr>
                    </table>
                </td>
                <td width="660" valign="top">

                    <div id="bodyDisplay">
                        <table width='400' border='0'>
                            <tr><td class="greenlinks">Help &raquo; User Comments</td></tr>
                            <tr><td><hr/></td></tr>

                            <tr>
                                <td>
                                    <form action='new_comment.php' method='post' NAME='comments' id='comments' enctype='multipart/form-data'>
                                        <table width='535' border='0'>
                                            <tr>
                                                <td width='517'>

                                                    <table border='0'>
                                                        <tr>
                                                            <td class=''>Username:</td>
                                                            <td>
                                                                <select name='username' id='username'>
                                                                    <?php
                                                                    $user_id=$_SESSION['user_id'];
                                                                    $query=mysql_query("select * from tbl_user where user_id='".$user_id."'")or die(mysql_error());
                                                                    while($row=mysql_fetch_array($query)){
                                                                        $data="<option value='".$row['user_id']."'>".$row['username']."<option>";
                                                                        echo $data;
                                                                    }

                                                                    ?>
                                                                </select>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>Comment/Problem</td>
                                                            <td><textarea name='comment' id='comment' cols='45' rows='5'></textarea></td>
                                                        </tr>

                                                        <tr>
                                                            <td>Attach screen shot if any:</td>
                                                            <td>
                                                                <input type='hidden' name='MAX_FILE_SIZE' value='100000000' />
                                                                <input type='file'  name='img_file' id='img_file'>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>&nbsp;</td>
                                                            <td align='right'>
                                                                <?php

                                                                if(isset($_POST['save_comment'])){
                                                                    $_SESSION['username_1']=trim($_POST['username']);
                                                                    $_SESSION['comment']=trim($_POST['comment']);

                                                                    mysql_query("insert into tbl_comment(user_id,comment)values('".$_SESSION['username_1']."','".$_SESSION['comment']."')")or die("<font color='red'>could not capture comment because ".mysql_error()."</font>");

                                                                    $select="SELECT id FROM tbl_comment WHERE user_id='".$_SESSION['username_1']."'&& COMMENT='".$_SESSION['comment']."'";
                                                                    $row=mysql_fetch_array(mysql_query($select))or die(mysql_error());
                                                                    if($_FILES['img_file']['name'] != NULL){
                                                                        $img_name = preg_replace("/.+\./", "snap_".$row['id'].".", $_FILES['img_file']['name']);
                                                                        @mkdir("snapshots");

                                                                        if(!move_uploaded_file($_FILES['img_file']['tmp_name'], "snapshots/".$img_name))
                                                                            echo"Could not upload snashot!";
                                                                        //echo "<meta http-equiv=Refresh content=3;url=setup.php?linkvar=User Comments>";
                                                                        else{
                                                                            $update="update tbl_comment set snapshot='".$img_name."' where id='".$row['id']."'";
                                                                            $query=mysql_query($update)or die(mysql_error());
                                                                            if($query){
                                                                                echo"Snapshot ".$img_name."    uploaded!";

                                                                                echo "<meta http-equiv=Refresh content=3;url=setup.php?linkvar=User%20Comments&&action=Help>";
                                                                            }
                                                                        }

                                                                    }
                                                                }

                                                                ?>
                                                            </td>
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
                    </div>
                </td>
            </tr>
            <tr>
                <td colspan="2" valign="top"><?php require_once('connections/footer.php'); ?></td>
            </tr>
        </table>

</body>
</html>
