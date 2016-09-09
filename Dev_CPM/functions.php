<?php
session_start();
require_once('connections/lib_connect.php');
  
function save_narrative($narrative){ 
$narrative_name=mysql_real_escape_string(trim($_POST['narrative_name']));
$_SESSION['narrative_name']=$narrative_name;	 
$doc_type=mysql_real_escape_string(trim($_POST['doc_type']));
$file_name=$_FILES['img_file']['tmp_name'];
$doc_fy=mysql_real_escape_string(trim($_POST['cpma_year']));
$doc_desc=mysql_real_escape_string(trim($_POST['details']));
$doc_user_id=mysql_real_escape_string(trim($_POST['doc_user_id']));
$doc_ipaddress=mysql_real_escape_string(trim($_POST['doc_ipaddress']));
$doc_timestamp=mysql_real_escape_string(trim($_POST['doc_timestamp']));


	if($doc_fy==''){
			echo noteMsgDefined('Saving Narrative failed: <br/>Did not select CPMA-Year!');
		} else {
		$x="INSERT INTO `tbl_narrative`(
		`year`,
		`remarks`,
		`doc_name`,
		`file_name`, 
		`doc_userId`,
		`doc_user_ipaddress`,
		`doc_timestamp`
		) 
		VALUES(
		'".$doc_fy."',
		'".$doc_desc."',
		'".$details."'
		'".$doc_name."',
		'".$file_name."',
		'".$doc_user_id."',
		'".$doc_ipaddress."',
		'".$doc_timestamp."')";
		
		mysql_query($x)or die(noteMsgDefined('Saving Narrative failed: <br/>'.mysql_error().' on line '.http(__line__).''));

		$select="select narrative_id from tbl_narrative where indicator_id='".$indicator."'&& subcomponent_id='".$subcomponent."'&& year='".$year."' && reportingPeriod='".$reportingPeriod."'";
		//echo($select);
		$row=mysql_fetch_array(mysql_query($select))or die(noteMsgDefined('Saving Narrative failed: <br/>'.mysql_error().' on line '.http(__line__).''));
		if($_FILES['img_file']['name'] != NULL){
			$img_name = preg_replace("/.+\./", "Report_".$row['narrative_id'].".", $_FILES['img_file']['name']);
			@mkdir("".dirname(__DIR__)."/reports");

			if(!move_uploaded_file($_FILES['img_file']['tmp_name'], "".dirname(__DIR__)."/reports/".$img_name))
			
				echo noteMsgDefined('Saving Narrative failed: <br/>Could not upload Narrative!');
			else{
			$update="update tbl_narrative set report='".$img_name."' where narrative_id='".$row['narrative_id']."'";
			$query=mysql_query($update)or die(noteMsgDefined('Saving Narrative failed: <br/>'.mysql_error().' on line '.http(__line__).''));
			if($query){
				echo" Narrative ".$img_name." uploaded!";
				echo "<meta http-equiv=Refresh content=3;url='".dirname(__DIR__)."/narratives.php?linkvar=View%20Narrative&&action=Narratives'>";}
			}
		}
	}
echo "<script> hideLoadingDiv(); </script>"; 
}		
	
function save_document($document_name){ 
	$document_name=mysql_real_escape_string(trim($_POST['document_name']));
	$_SESSION['document_name']=$document_name;	 
	$doc_type=mysql_real_escape_string(trim($_POST['doc_type']));
	$file_name=$_FILES['img_file']['tmp_name'];
	$doc_fy=mysql_real_escape_string(trim($_POST['doc_fy']));
	$doc_desc=mysql_real_escape_string(trim($_POST['doc_desc']));
	$doc_user_id=mysql_real_escape_string(trim($_POST['doc_user_id']));
	$doc_ipaddress=mysql_real_escape_string(trim($_POST['doc_ipaddress']));
	$doc_timestamp=mysql_real_escape_string(trim($_POST['doc_timestamp']));


	if($document_name==''){
		echo noteMsgDefined('Document upload failed: <br/>Undefined Document name!');
	}else {
		$x="INSERT INTO `tbl_documents`(`document_name`,`doc_type`,`file_name`,`doc_fy`,`doc_desc`,`doc_user_id`,`doc_ipaddress`,`doc_timestamp`) 
		VALUES ('".$document_name."','".$doc_type."','".$file_name."','".$doc_fy."','".$doc_desc."','".$doc_user_id."','".$doc_ipaddress."','".$doc_timestamp."')";
		@mysql_query($x)or die("<font color='red'>could not save document because, ".mysql_error()."</font>");

		$qStatement="select tbl_documents_id,document_name from tbl_documents where document_name='".$_SESSION['document_name']."'";
		$row=@mysql_fetch_array(mysql_query($qStatement))or die(mysql_error());
		if($_FILES['img_file']['name'] != NULL){
		$img_name = preg_replace("/.+\./", "document_".$row['tbl_documents_id'].".", $_FILES['img_file']['name']);
		@mkdir("".dirname(__DIR__)."/reports");
			if(!move_uploaded_file($_FILES['img_file']['tmp_name'], "".dirname(__DIR__)."/reports/".$img_name)){
				echo noteMsgDefined('Sorry, Document could not be uploaded, please try again!');
			}else{
				$update="update tbl_documents set file_name='".$img_name."' where tbl_documents_id='".$row['tbl_documents_id']."'";
				$query=mysql_query($update)or die(mysql_error());
					if($query){
					echo"<font color='green'>Document ".$img_name." uploaded.</font>";				
					echo "<meta http-equiv=Refresh content=3;url='".dirname(__DIR__)."/setup.php?linkvar=view%20Documents&&action=Document%20Repository#'>";
					}
			}

		}

	}	
	echo "<script> hideLoadingDiv(); </script>"; 
}

function update_document($tbl_documents_id,$document_name){ 
$tbl_documents_id=$_POST['tbl_documents_id']; 
$document_name=mysql_real_escape_string(trim($_POST['document_name'])); 
if($document_name!='')
$x="update tbl_documents set document_name='".$document_name."' where tbl_documents_id='".$tbl_documents_id."'";
@mysql_query($x)or die("<font color='red'>could not Update Document name because, ".mysql_error()."</font>");
if($_FILES['img_file']['name']!= NULL){
$img_name = preg_replace("/.+\./", "document_".$tbl_documents_id.".", $_FILES['img_file']['name']);
@mkdir("../Old_Sys/reports");

if(!move_uploaded_file($_FILES['img_file']['tmp_name'], "../Old_Sys/reports/".$img_name))
echo"Could not upload Document!";
else{
echo $update="update tbl_documents set document_name='".$img_name."' where tbl_documents_id='".$tbl_documents_id."'";
$query=mysql_query($update)or die(mysql_error());
if($query){
echo"Document ".$img_name."  Uploaded!";
echo "<meta http-equiv=Refresh content=3;url='../Old_Sys/setup.php?linkvar=view%20Documents&&action=Document%20Repository'>";
}
}
}
echo"<font color='green'>Document Details Updated!</font>";
echo "<script> hideLoadingDiv(); </script>"; 
}

function update_narrative($narrative_id,$subcomponent,$indicator,$details){ 
if($details!='')
$xnarrative="update tbl_narrative set remarks='".mysql_real_escape_string($details)."' where narrative_id='".$narrative_id."'";
mysql_query($xnarrative)or die(http(__line__));
if($_FILES['img_file']['name']!= NULL){
$img_name = preg_replace("/.+\./", "document_".$narrative_id.".", $_FILES['img_file']['name']);
@mkdir("../Old_Sys/reports");
if(!move_uploaded_file($_FILES['img_file']['tmp_name'], "../Old_Sys/reports/".$img_name))
echo"Could not upload Document!";
else{
$update="update tbl_narrative set report='".$img_name."' where narrative_id='".$narrative_id."'";
$query=mysql_query($update)or die(http(__line__));
if($query){
echo"Document ".$img_name."    uploaded!";
echo "<meta http-equiv=Refresh content=3;url='../Old_Sys/narratives.php?linkvar=View%20Narrative&&action=Narratives'>";
}
}
}
echo"<font color='green'>Narrative Updated!</font>";
echo "<script> hideLoadingDiv(); </script>"; 
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<script language="javascript" type="text/javascript" src="js/check.js"></script>
    <link href="css/style.css" rel="stylesheet" type="text/css"/>
    <link href="css/loading.css" rel="stylesheet" type="text/css"/>
    <title><?php heading($_GET['action']); ?></title>
    <script type="text/javascript" src="js/number.js"></script>
    <script type="text/javascript" src="js/addRow.js" language="javascript"></script>
    <script type="text/javascript" src="js/jquery-1.7.1.min.js" language="javascript"></script>
    <script type="text/javascript" src="js/loading.js" language="javascript"></script>
    <script type="text/javascript" src="js/check.js" language="javascript"></script>
    <script type="text/javascript" src="js/popup.js" language="javascript"></script>
    <script type="text/javascript" src="js/js.js" language="javascript"></script>
    <script type="text/javascript" src="js/jquery-2.1.4.js" language="javascript"></script>
    <script type="text/javascript" src="js/sumRows.js" language="javascript"></script>
    <script type="text/javascript" src="js/hoverRows.js" language="javascript"></script>
</head>

<body>
<div align='center' id='dvLoading'><span
        style='font-size:24px; margin-top:50px; font-weight:bold;'>Loading Document Repository Module...</span></div>
<table width="870" border="0" align="center" id="content_" >
	<tr>
		<td colspan="2" valign="top"><?php require_once('connections/header.php'); ?></td>
	</tr>
	
	<tr>
		<td class='sd-menu-container' style="display:none;" width="190" valign="top">
		
			<table width="190" border="0" >
				<tr>
					<td valign="top" align="left"><?php require_once('connections/left_links.php'); ?></td>
				</tr>
			</table>
		</td>
		
		<td width="660" valign="top" style="background-color: #F8F5EC;" >

		 <?php title($_GET['linkvar'],$_GET['action']);   ?>
			<div id="bodyDisplay"> 
			<?php 
			    if(isset($_POST['update_relatedLinks'])){
				update_relatedLink($_POST['relatedlink_id'],$_POST['linkname'],$_POST['url']);
				}
				
				if(isset($_POST['save_relatedLink'])){
				save_relatedLink($_POST['linkname'],$_POST['url']);
				}
				
				if(isset($_POST['save_document'])){
				save_document($_POST['document_name']);
				}

				if(isset($_POST['save_narrative'])){
				save_narrative($_POST['subcomponent'],$_POST['indicator'],$_POST['details']);
				}

				if(isset($_POST['update_document'])){
				update_document($_POST['tbl_documents_id'],$_POST['document_name']);
				}

				if(isset($_POST['update_narrative'])){
				update_narrative($_POST['narrative_id'],$_POST['subcomponent'],$_POST['indicator'],$_POST['details']);

				}

			?>
          </div>
        </td>
    </tr>
    <tr>
        <td colspan="2" valign="top"><?php require_once('connections/footer.php'); ?></td>
    </tr>
</table>

<iframe name="gToday:normal:agenda.js" id="gToday:normal:agenda.js" src="WeekPicker/ipopeng.htm"
        style="visibility: visible; z-index: 700; position: absolute; top: -500px; left: -700px;" frameborder="0"
        height="178" scrolling="no" width="199"></iframe>
</body>
</html>
