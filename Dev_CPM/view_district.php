<?php
session_start();
require_once('connections/lib_connect.php');
require_once('./xajax_0.2.4/xajax.inc.php');
require_once('filters.php');
$xajax = new xajax();
$xajax->errorHandlerOn();
#************************
#registering functions
#************************
//$xajax->registerFunction('view_all');
$xajax->registerFunction('search_district');
$xajax->registerFunction('view_district');
$xajax->registerFunction('edit_district');
$xajax->registerFunction('update_district');
$xajax->registerFunction('updatedistrict2');
$xajax->registerFunction('delete_district');
$xajax->registerFunction('deletedistrict');
$xajax->registerFunction('SystemLog');



#**************************
#view district
#edit district
#update district
#confirm update district
#delete district
#confirm delete district
#**************************
function view_district($distcode,$district,$acronym,$subcounty,$parish,$cur_page=1,$records_per_page=20){
$object=new xajaxResponse();
$n=1;
$dist=$_SESSION['district'];
$cur_user=$_SESSION['role'];
//$object->addAlert($cur_user);
$data="<table width='600' border='0'><tr><td>Setup &raquo; Districts</td></tr>
<tr><td><hr/></td></tr>
</table>";
$data.="<table width='400' border='0'>".filter_district()."</table>";
$data.="<table width='400' border='0' align='left'>

<tr class=''><th scope='col' colspan='5' align='center'><b class='greenlinks'>REGISTERED DISTRICTS</b></th></tr>
<tr class='' align='left'><th scope='col' >NO</th>
<th scope='col'>DISTRICT </th>
<th scope='col'>ACRONYM</th>
<th scope='col' colspan='2' align='center' >ACTION</th></tr>";
	 $p=1;
	 $query_string="select * from tbl_district order by districtName";
	$SELECT=@mysql_query($query_string)or die("<div align='center' style='color:#ff0000;font-weight:bold;font-size:12px;'>abi-Error code 0073:".mysql_error());
	/**************
*paging parameters
*
****/
$max_records = mysql_num_rows($SELECT);
//$records_per_page=5;
$num_pages=ceil($max_records/$records_per_page);
//$feedback->addAlert($cur_page);
$offset = ($cur_page-1)*$records_per_page;
$p=$offset+1;
$new_query=mysql_query($query_string." limit ".$offset.",".$records_per_page) or die(mysql_error());
	
	
	
	
	while($row=mysql_fetch_array($new_query)){
	$_SESSION['parishCode']=$row['parishCode'];
	 $color=$n%2==1?"#f0e5a5":"#ffffff";
		$data.="<tr class=$color>
		<td><input type ='hidden' name ='".$row['districtCode']."' id='".$row['districtCode']."'>".$p++."</td>
		<td>".$row['districtName']."</td><td>".$row['acronym']."</td>
		<TD align='right' width='10'><input type='button' name='edit' value='Edit' onclick=\"xajax_edit_district('".$_SESSION['parishCode']."')\"></TD>
		<td align='right' width='10'><input type='button' id='delete' class='redhdrs' value='Delete' onclick=\"xajax_delete_district('".$_SESSION['parishCode']."')\"></td>
		</tr>";
$n++;		      
}			
		
		
		/*
*display pages
*/
$data.="<tr align='right'><td colspan=6>";

$num_links=10;
$startAt_links=($cur_page-5);
$endAt_links=($cur_page+$num_links);
$cur_link=$cur_page;


if($num_pages>1){
$links=1;
		$append_bar=$p==$num_pages?"":"|";
	if ($cur_page==1)$data.="<a href='#' onclick=\"xajax_view_district('".$distcode."','".$district."','".$acronym."','".$subcounty."','".$parish."','1','".$records_per_page."')\"><font color=red><b>1</b></font>\n</a>...".$append_bar;
	else $data.="<a href='#' onclick=\"xajax_view_district('".$distcode."','".$district."','".$acronym."','".$subcounty."','".$parish."','1','".$records_per_page."')\">1\n</a>...".$append_bar;
	//for($p=2;$p<$num_pages;$p++){
	$p=2;
	while($p<$num_pages){
if(($p>$startAt_links) and ($p<$endAt_links)){
		$data.=$p==$cur_page?"<font color=red><b>".$p."</b></font>".$append_bar:"<a href='#' onclick=\"xajax_view_district('".$distcode."','".$district."','".$acronym."','".$subcounty."','".$parish."','".$pp."','".$records_per_page."')\">".$p."\n</a>".$append_bar;
	}
	$p++;
	}
	if($p==$num_pages){
			$data.="...<a href='#' onclick=\"xajax_view_district('".$distcode."','".$district."','".$acronym."','".$subcounty."','".$parish."','".$pp."','".$records_per_page."')\">".$p."\n</a>".$append_bar;
			}
}



/*
if($num_pages>1){
	for($pp=1;$pp<=$num_pages;$pp++){
		$append_bar=$pp==$num_pages?"":"|";
		$data.=$pp==$cur_page?"<font color=red><b>".$pp."</b></font>".$append_bar:"<a href='#' onclick=\"xajax_view_district('".$distcode."','".$district."','".$acronym."','".$subcounty."','".$parish."','".$pp."','".$records_per_page."')\">".$pp."\n</a>".$append_bar;
		///while($pp=20){
		//$data.="<br>";
		//$pp++;
		//}
		}
	
} */
$data.=" Records: <select name='num_rec' id='num_rec' onchange=\"xajax_view_district('".$distcode."','".$district."','".$acronym."','".$subcounty."','".$parish."','".$cur_page."',this.value)\">";
	$i=1;
	$selected="";
	while($i*10<=$max_records){
		$selected=$i*10==$records_per_page?"SELECTED":"";
		$data.="<option value='".($i*10)."' ".$selected.">".($i*10)."</option>";
		$i++;
	}
	//$feedback->addAlert($max_records."-->".($i*10));
	$sel=$records_per_page>=$max_records?"SELECTED":"";
	$data.="<option value='".$max_records."' ".$sel.">All</option>";
	$data.="</select>";
	$data.="</br></td></tr><table>";	
$object->addAssign('bodyDisplay','innerHTML',$data);
return $object;
}

#*********************************
#search district
#delete district

#*********************************

function search_district($district,$subcounty,$parish){
$object=new xajaxResponse();
$n=1;
$dist=$_SESSION['district'];
$data="<table width='' border='0' align='left'>
<tr class='evenrow'><td class='black2' colspan='2'>District:</td><td colspan='2'><select id='district'><option value=''>-All-</option>";
  $query=mysql_query("select DISTINCT(districtname) from view_dsp order by districtname ASC")or die(mysql_error());
  while($row=mysql_fetch_array($query)){
  $data.="<option value='".$row['districtname']."'>".$row['districtname']."</option>";
  }
  $data.="</select></td><td></td></tr>
  <tr class='evenrow'>
    
    <td class='black2' colspan='2'>Subcounty</td>
    <td class='black2' colspan='2'>Parish</td>
    <td><label>
      <input type='button' id='export' name='export' value='Export to Excel' />
    </label></td>
  </tr>
  <tr class='evenrow'>
    
    <td colspan='2'><select id='subcounty'><option value=''>-All-</option>";
      $query=mysql_query("select  distinct(subcountyName) from view_dsp order by subcountyName ASC ")or die(mysql_error());
	  while($row=mysql_fetch_array($query)){
	  $data.="<option value='".$row['subcountyName']."'>".$row['subcountyName']."</option>";
	  
	  }
	  $data.="</select></td>
    <td colspan='2'><select id='parish'><option value=''>-All-</option>
	";
      $query=mysql_query("select  distinct(parishName) from view_dsp order by parishName Asc")or die(mysql_error());
	  while($row=mysql_fetch_array($query)){
	  $data.="<option value='".$row['parishName']."'>".$row['parishName']."</option>";
	  }
	  $data.="
    </select></td>
    <td colspan=''><label>
      <input type='button' id='search' value='Go' onclick=\"xajax_search_district(getElementById('district').value,getElementById('subcounty').value,getElementById('parish').value); return false;\" />
    </label></td>
  </tr>
";
$data.="
<tr><td class='evenrow' colspan='4' align='center'><b class='greenlinks'>REGISTERED DISTRICTS, SUBCOUNTIES AND PARISHES</b></td><td class='evenrow'><a href='adddistrict.php' class='evenrow''><input name='new_district' type='button' value='Add District' /></a></td></tr>
<tr class='evenrow' align='left'><td class='black2'>NO</td><td class='black2'>DISTRICT </td><td class='black2'>ACRONYM</td><td class='black2'>SUB-COUNTY</td><td class='black2'>PARISH</td><td class='black2' align='right'>ACTION</td></tr>";
 $p=1;
	$SELECT=@mysql_query("select * from view_dsp where lower(districtname) like '%".strtolower($district)."%' && lower(subcountyName) like '%".strtolower($subcounty)."%' && lower(parishName) like '%".strtolower($parish)."%' order by districtname")or die('UNASO-Error code 00163:'.mysql_error());
	if(mysql_num_rows($SELECT)>0){
	while($row=mysql_fetch_array($SELECT)){
	$color=$n%2==1?"#E6E6E6":"#ffffff";
		$data.="<tr class=$color><td>".$p++."<input type ='hidden' name ='".$row['districtCode']."' id='".$row['districtCode']."'></td><td>".$row['districtname']."</td><td>".$row['acronym']."</td><td>".$row['subcountyName']."</td><td>".$row['parishName']."</td><TD align='right'><input type='button' name='details' value='Details' onclick=\"xajax_view_all('".$row['parishCode']."')\"></TD></tr>";
$n++;		      
}}			
		$data.="<table>";
$object->addAssign('bodyDisplay','innerHTML',$data);
return $object;
}

/*view_all district,subcounty,parish*/
/* function view_all($parishcode){
$obj=new xajaxResponse();

$_SESSION['parishCode']=$parishcode;
$data="</td></tr>
 <tr><td><form method='post' ><table>
 <tr><td class='greenlinks' colspan='4' align='center'><div align='center'><b>DISTRICT INFORMATION</b></div></td></tr>
 <tr class='black2'>

 
 

 </tr>";
 $y=1; $xx=1;
 $query=mysql_query("select * from view_dsp where parishCode='".$_SESSION['parishCode']."'")or die(mysql_error());
 while($row=mysql_fetch_array($query)){
$_SESSION['parishCode']=$row['parishCode'];
   $data.="<tr><td><strong>District:</strong></td><td><input type='hidden' value='".$row['parishCode']."' id='".$row['parishCode']."'>".$row['districtname']."</td></tr>
   <tr><td><strong>Acronym:</strong></td><td>".$row['acronym']."</td></tr>
   <tr><td><strong>SubCounty:</strong></td><td>".$row['subcountyName']."</td></tr>
   <tr><td><strong>Parish:</strong></td><td>".$row['parishName']."</td></tr>";
 $data.=" <tr><td colspan=2>
 <input type='button' value='Delete' class='redhdrs' title='delete' onclick=\"xajax_delete_district('".$_SESSION['parishCode']."')\">|
 <input type='button' value='Cancel' title='close' onclick=\"xajax_view_district('','','','','',1,20)\">|
 <input type='button' value='Edit' title='edit' onclick=\"xajax_edit_district('".$_SESSION['parishCode']."')\"></td>
 </tr></table></form>";
 }
$obj->addAssign('bodyDisplay','innerHTML',$data);
return $obj;
} */

//edit district
//confirm edit district

 function edit_district($parish){
$object=new xajaxResponse();

$_SESSION['parishCode']=$parish;

$check="select * from view_dsp where parishCode ='".$_SESSION['parishCode']."'";
//$object->addAlert($check);
$select = mysql_query($check)or die(mysql_error());
while($row = mysql_fetch_array($select)){
 $data="<table width='419' border='0'>
              
              <tr>
                <td colspan='2'>
                  <table border='0'>
                    <tr>
                      <td>District Name:</td>
                      <td>".$row['districtname']."</td>
                    </tr>
                    <tr>
                      <td>Acronym:</td>
                      <td><input type='text' id='acronym' value='".$row['acronym']."' /></td>
                    </tr>
               
                    <tr>
                      <td>Subcounty Name:</td>
                      <td><input type='text' name='subcountyName' id='subcountyName' value='".$row['subcountyName']."' /></td>
                    </tr>
					<tr>
                      <td>Parish Name:</td>
                      <td><input type='text' name='parishname' id='parishname' value='".$row['parishName']."'/></td>
                    </tr>
					<tr>
               
                <td colspan='2' align='center'><input name='close' title='Close' type='button' id='cancel' value='Cancel' /> | <input name='btn_item' title='update' type='button' id='btn_item' onclick=\"xajax_update_district('".$row['parishCode']."','".$row['subcountyCode']."',getElementById('acronym').value,getElementById('subcountyName').value,getElementById('parishname').value)\" value='Save' /> |<a href='adddistrict.php'><input name='btn_item' title='New Entry' type='button' id='btn_item'  value='New Entry' /></a></td>
                <td>&nbsp;</td>
              </tr>
					";
					}
                 $data.=" </table>";


$object->addAssign('bodyDisplay','innerHTML',$data);
return $object;
}


#****************************************************


function update_district($parishcode,$subcountycode,$acronym,$subcountyname,$parishname){
$object=new xajaxResponse();
if($_SESSION['role']<>'Admin'){
$object->AddAlert("Access Denied!\n Only the Admin can edit an item");
$object->addRedirect("index.php");
return $object;
}
$check=mysql_query("select * from view_dsp where parishCode='".$parishcode."'")or die(mysql_error());
if(@mysql_num_rows($check)>0){
$object->AddConfirmCommands(1,"Do You really Want to Update?");
$object->AddScriptCall('xajax_updatedistrict2',$parishcode,$subcountycode,$acronym,$subcountyname,$parishname);
//$object->AddScriptCall('SystemLog',$_SESSION['username']);
}
$object->addAssign('bodyDisplay','innerHTML',$data);
return $object;
}


function updatedistrict2($parishcode,$subcountycode,$acronym,$subcountyname,$parishname){
$object=new xajaxResponse();
$cur_user=$_SESSION['role'];
mysql_query("update tblparish set parishName='".$parishname."' where parishCode='".$parishcode."'")or die(mysql_error());
mysql_query("update tblsubcounty set subcountyName='".$subcountyname."' where subcountyCode='".$subcountycode."'")or die(mysql_error());
//$sel=mysql_fetch_array(mysql_query("select max(login_id) from tbl_login"))or die(mysql_error());
$user="select user() as cur_user";
//$object->addAlert($user);
$usr=mysql_fetch_array(mysql_query("select user() as cur_user"))or die(mysql_error());
//root@localhost
$upd="update parish_log set user_id='".$_SESSION['id']."',district='".$_SESSION['district']."' where user_id='".$usr['cur_user']."'";
$object->addAlert($upd);
mysql_query($upd)or die("UNASO-Error: 333 Because". mysql_error());
$object->addAssign('status','innerHTML',"<div align='center' class='green'>Subcounty and subcounty changed Successfully!</div>");
$object->addRedirect("view_district.php");
return $object;
}

/************************
*delete district os subcounty
*
******/

function delete_district($parishcode){
$feedback = new xajaxResponse(); 
$check="select * from view_dsp where parishCode ='".$parishcode."'";
$select =mysql_query($check)or die(mysql_error());
//$feedback->addAlert($check);
if(@mysql_num_rows($select)>0){
$feedback->AddConfirmCommands(1,"Do you really want to delete?");
$feedback->AddScriptCall('xajax_deletedistrict', $parishcode);
	}
	
	$feedback->addAssign('bodyDisplay','innerHTML',$data);
return $feedback;
}

function deletedistrict($parishcode){
$feedback =new xajaxResponse();
$row =mysql_fetch_array(mysql_query("select * from view_dsp where parishCode ='".$parishcode."'"))or die("<font color=red>Could not delete subcounty or parish because " .mysql_error()."</font>");
mysql_query("delete from tblparish where parishCode='".$parishcode."'")or die(mysql_error());
$feedback->addAssign('bodyDisplay','innerHTML',"<font color=red>Parish Deleted!</font>");
$feedback->AddRedirect("view_district.php");
return $feedback;
}


$xajax->processRequests();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<?php $xajax->printJavascript('xajax_0.2.4/'); ?>
<title>aBi Trust:VIEW DISTRICTS</title>
<link href="css/style.css" rel="stylesheet" type="text/css" />
</head>
<body>
<table width="820" border="0" align="center" bgcolor="#FFFFFF">
  <tr>
    <td><?php require_once('connections/header.php'); ?></td>
  </tr>
  <tr>
    <td></td>
  </tr>
  <tr>
    <td><table width="820" border="0" bgcolor="#FFFFFF">
      <tr>
        <td width="200" valign="top"><table width="200" border="0" bgcolor="#FFFFFF">
          <tr>
            <td valign="top"><?php require_once('connections/left_links.php'); ?></td>
          </tr>
        </table></td>
        <td width="620" valign="top" align="left"><table width="620" border="0">
          <tr>
            <td><div id="bodyDisplay" align="left"><script language="JavaScript" type="text/javascript">
xajax_view_district("","","","","");
</script>
</div><div id="status"></div></td>
          </tr>
        </table></td>
      </tr>
    </table></td>
  </tr>
  <tr><td><table width="820" border="0" align="center" bordercolor="#FFFFFF">
  <tr>
    <td><?php require_once('connections/footer.php'); ?></td>
  </tr>
</table>
</td></tr>
</table>
</body>
</html>
