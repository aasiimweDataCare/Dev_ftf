<?php
#echo"<link rel=\"shortcut icon\" href=\"images/logo.gif\" type=\"image/icon\" />";
#***********************************************************
#Database connection
/* $c=1;
$color1=$c%2==1?"evenrow":"white1"; */
//User “redsug89_carp” was added to the database “redsug89_carpme”.
$PageSecurity=15;
session_start();
global $data,$unique_column,$table_pk_id,$Query_executed,$Table_affected,$changed_from,$changed_to,$events1,$events2,$linkvar;

//$events1="onmouseover=\"this.style.backgroundColor='#999999';\" onmouseout=\"this.style.backgroundColor='';\"";
$_SESSION['events']='';
$events2="onmouseup=\"this.style.backgroundColor='#ffa040';\"";
$_SESSION['events']=$events2;
#header("Cache-control: private"); 
#==================connection variables for localhost=========================
$host="localhost";
$name="db_redsug_v1";
$user="root";$pass="craiwrut"; 

#==================connection variables for online database =========================
 $name2="redsug89_carpme";
$user2="redsug89_carp"; 
$pass2="craiwrut";
//*/ 
#connection string
$_SESSION['databaseName']=$name;
$_SESSION['connections']=mysql_connect($host,$user,$pass);
#$_SESSION['connections']=mysql_connect($host2,$user2,$pass2);
@mysql_select_db($name,$_SESSION['connections'])or die(@http("LIB-0030"));
#@mysql_select_db($name2,$_SESSION['connections'])or die(@http("LIB-0032"));
#****************************************************
require_once('connections/scripts_updating.php');
require_once('connections/QueryManagerClass.php');
require_once('connections/ExportandPrintClass.php');
require_once('connections/GeneralClass_library.php');


/* require_once('connections/phpgraphlib.php');
require_once('connections/phpgraphlib_pie.php');
require_once('connections/phpgraphlib_stacked.php'); */ 
require_once('connections/open-flash-chart.php');
#require_once('connections/open_flash_chart_object.php');
#valid email
function is_valid_email($email) {
  return preg_match('#^[a-z0-9.!\#$%&\'*+-/=?^_`{|}~]+@([0-9.]+|([^\s]+\.+[a-z]{2,6}))$#si', $email);
}

function is_valid_phone($no){
	$n = explode("-",$no);
	$new_n=implode("",$n);
	if(strlen($new_n)<9)
		return 0;
	if(substr($new_n,0,1)=="+"){
		if(intval(substr($new_n,1,8)))
			return 1;
	}
	if(substr($new_n,0,1)=="0"){
		if(intval(substr($new_n,1,8)))
			return 1;
	}
	return 0;
}



/* function date(){


} */

function session_limits(){
if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 1800)) {
    // last request was more than 30 minates ago
    session_destroy();   // destroy session data in storage
    session_unset();     // unset $_SESSION variable for the runtime
}
$_SESSION['LAST_ACTIVITY'] = time(); // update last activity time stamp


/* if (!isset($_SESSION['CREATED'])) {
    $_SESSION['CREATED'] = time();
} else if (time() - $_SESSION['CREATED'] > 1800) {
    // session started more than 30 minates ago
    session_regenerate_id(true);    // change session ID for the current session an invalidate old session ID
    $_SESSION['CREATED'] = time();  // update creation time
}
 */





}




function heading($title){
//$this->$statement=$title;
$head="UHMGBAK M&E:";
$hd=($title=="")?$head:$head.$title;
echo($hd);
}



//EXPORT
/* header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=$filename.xls");
header("Pragma: no-cache");
header("Expires: 0"); */


function export($format,$content){
	if($format=='excel' || $format=='word' || $format=='sql'){
		if($format=='excel'){
			$export_file ='export.xls';
			$out_file = 'export.xls';
		}elseif($format == 'word'){
			$export_file ='export.doc';
			$out_file = 'export.doc';
		}
		else if($format=='sql'){
		#$backupFile = $dbname._. date("Y-m-d-H-i-s");
		$export_file ='export.sql';
			$out_file = 'Backup.sql';
		}
		else if($format=='Print'){
	echo $content;
		}
		$fp = fopen($export_file, "w+");
		fwrite($fp, $content);
		fclose($fp);
		$data = file_get_contents($export_file);
		header("Content-type: application/octet-stream");
		header("Content-Disposition: attachment; filename=$out_file");
		header("Content-Description: PHP Generated Data");
		header("Pragma: no-cache");
		header("Expires: 0");
		#header("Cache-control: private");  

		echo($data);
		unlink($export_file);
	}
 	//else if($format=='pdf'){
	//	header('content-Disposition: filename=mealplan.pdf');
	//	header("");
	//	header('content-type: application/pdf');
	else
		echo($content);
}
#Relay email
function send_email($to,$subject,$msg,$header=""){
	return mail($to,$subject,$msg,$header);
}

#Relay sms
function send_sms($phone, $content){
	
		$add="&udh=".$udh."&binary=1";
	
	//$smsc = "&smsc=".get_SMSC_ID($phone);
	$content=($content<>'') ? '&text='.$content: "";
	$ret=system("'http://localhost:13134/cgi-bin/sendsms?username=osiris&password=qbar&from=8000&to=".$phone.$content."'");
	echo("sent msg");
}

#ACTIVATION
function generateCode($length = 10)
{
   $code="";
   $chars = "abcdefghijklmnpqrstuvwxyzABCDEFGHIJKLMNPQRSTUVWXYZ123456789";
   srand((double)microtime()*1000000); 
   for ($i=0; $i<$length; $i++)
   {
      $code .= substr ($chars, rand() % strlen($chars), 1); 
   } 
   return $code; 
} 

#DISPLAY ERROR
function errorMsg($msg){
# bgcolor='#FFCC99'
$data ="<fieldset><legend><span class='redhdrs'><b>Error</b></span></legend><span class=redhdrs ><table cellspacing='0'      border='0' width=600 style='border-bottom-color:#CC0000; background-color:#FFCC99;'><tr><td><img src='icons/warning_icon.png'>  ".$msg."</td></tr></table></span></fieldset>";
return $data;
}

/* function underConstruction($msg){
# bgcolor='#FFCC99'
$data ="<fieldset><legend><span class='redhdrs'><b>Error</b></span></legend><span class=redhdrs ><table cellspacing='0'      border='0' width=600 style='border-bottom-color:#CC0000; background-color:#FFCC99;'><tr><td><img src='icons/warning_icon.png'>  ".$msg."</td></tr></table></span></fieldset>";
echo $data;
} */

function http($line){
$data="Http Error code $line because,".mysql_error() ;
$subject="REDS M&E Runtime Error/Warning Recieved By ".$_SESSION['username']." (".$_SESSION['name'].")";
$message=$data." on " .$_SERVER['SCRIPT_NAME']. $_SERVER['PHP_SELF'];
 $query=@mail("ssebwana@gmail.com","Subject: $subject",$message, "From:support@redsug.com"  );
 /* if($query)
 $data.=noteMsg("Error Report Sent");
 else 
 $data.=errorMsg("Error Report Could Not be sent, Please Check your Internet Connection and Try Again."); */
return $data;
}

function http_error(){
$data="Http Error code " .__LINE__." because,".mysql_error();
#echo "File:".__FILE__ . "Line:" .__LINE__." 

return $data;
}
#DISPLAY notification
function noteMsg($msg){
# bgcolor='#FFCC99'
$data ="<fieldset><legend><span class=''><b>Notification</b></span></legend><span class= ><table cellspacing='0'      border='0' width=100% style='border-bottom-color:#CC0000; background-color:#FFCC99;'><tr><td><img src='icons/warning_icon.png'>  ".$msg."</td></tr></table></span></fieldset>";
return $data;
}

function Backgroundstyle($count){
//$this->Data=$data='';
  $color=$count%2==1?"evenrow":"white1";
$events2="onmouseup=\"this.style.backgroundColor='#A9753A';\"";

return $data="<tr height='25' class='".$color."' ".$events2.">";

}



function noteMsgDefined($msg){
# bgcolor='#FFCC99'
$data ="<table cellspacing='0'      border='0' width=100% style='border-bottom-color:#CC0000; background-color:#FFCC99;'><tr><td><img src='icons/warning_icon.png'>  ".$msg."</td></tr></table>";
return $data;
}

function checkExistance($arg1,$arg2,$argument3){
$selected=array();
$selected['selected']=($arg1==$arg2)?"selected":"";
$selected['ExistsInteger']=($arg1<>$arg2)?$arg1:"<center>-</center>";
$selected['ExistsString']=($arg1<>$arg2)?$arg1:noteMsgDefined("Undefined");
$selected['checked']=(strpos($arg1,arg2) !==false)?"CHECKED":"";
return $selected[$argument3];
}

function congMsg($msg){
# bgcolor='#FFCC99'
$data ="<fieldset><legend><span class=''><b>Congratulations</b></span></legend><span class= ><table cellspacing='0'      border='0' width=600 style='border-bottom-color:#ffffff; background-color:#FFffff;'><tr ><td class='green_field'><font >  ".$msg."</font></td></tr></table></span></fieldset>";
return $data;
}
//$Performed,$TableAffected
function SystemLog($userName){
$obj=new xajaxResponse();
  $query_reg_user = "update  parish_log set 
								user_id='$userName',
								where user_id='root@localhost'
								";
$obj->addAlert($query_reg_user);	
//$reg_user = 									
mysql_query($query_reg_user)or die(mysql_error());
//if (!$reg_user) echo mysql_error();
  // echo "Logged!" ;else 
$obj->addAssign('BodyDisplay','innerHTML','');
return $obj;
  }

#quaRTER
function quarter($month){
switch ($month){
case 1:
$quarter = 'Jan - Mar';
break;
case 2:
$quarter = 'Jan - Mar';
break;
case 3:
$quarter = 'Jan - Mar';
break;
case 4:
$quarter = 'Apr - Jun';
break;
case 5:
$quarter = 'Apr - Jun';
break;
case 6:
$quarter = 'Apr - Jun';
break;
case 7:
$quarter = 'Jul - Sep';
break;
case 8:
$quarter = 'Jul - Sep';
break;
case 9:
$quarter = 'Jul - Sep';
break;
case 10:
$quarter = 'Oct - Dec';
break;
case 11:
$quarter = 'Oct - Dec';
break;
case 12:
$quarter = 'Oct - Dec';
break;
}
return $quarter;
}

#day array
function __day($str, $mday){
	$mday = ($mday<>"") ? $mday : date("d");
	$content = "<select name='".$str."_day' id='".$str."_day'><option value='".$mday."'>".$mday;
    for($i=1; $i<32; $i++){
         $x=sprintf("%02d", $i);
		 $content .= "<option value='".$x."'>".$x;
    }
	$content .= "</select>";
	return $content;
}
function __month__coverter($num){
	switch ($num){
		case "1":
			$name="JANUARY";
			break;
		case "2":
			$name="FEBRUARY";
			break;
		case "3":
			$name="MARCH";
			break;
		case "4":
			$name="APRIL";
			break;
		case "5":
			$name="MAY";
			break;
		case "6":
			$name="JUNE";
			break;
		case "7":
			$name="JULY";
			break;
		case "8":
			$name="AUGUST";
			break;
		case "9":
			$name="SEPTEMBER";
			break;
		case "10":
			$name="OCTOBER";
			break;
		case "11":
			$name="NOVEMBER";
			break;
		default:
			$name="DECEMBER";
		break;
		
	}
	return $name;
}
#Month and Year
function __month__year($str, $year, $month){
	$content = "<select name='".$str."year' id='".$str."year'>";
		if($year<>"")
			$content .= "<option value='".$year."'>" . $year;
		else
			$content .= "<option value='".date('Y')."'>" . date("Y");
		for($i=1900; $i <= date("Y")+10; $i++)
			$content .= "<option value='".$i."'>" . $i;
	$content .= "</select>";
	$content .= "<select name='".$str."month' id='".$str."month'>";
	if($month<>"")
		$content .= "<option value='".$month."'>" . substr(digit_month($month), 0, 1). strtolower(substr(digit_month($month), 1, 2));
	else
		$content .= "<option value='".date("m")."'>" . date("M");
	$Month1=array('Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec' );
	$i=1;
	$content .= "<option value='$i'>" . current($Month1);
	while(next($Month1)){	
		$i++;
		$content .= "<option value='$i'>" . current($Month1);
	}	
	$content .= "</select>";
	return $content;
}



function future_year($str,$year){
$data ="<select name ='".$str."_year' id='".$str."_year'>";
if($year!="")
	$data .="<option value='".$year."'>".$year."</option>";
$curYear = date('Y');
while($curYear<=intval(date('Y'))+41){
$data .="<option value='".$curYear."'>".$curYear."</option>";
$curYear++;
}
$data .="</select>";
return $data;
}
function future_month($str,$month,$year){
$data ="<select name='".$str."_month' id='".$str."_month'>";
if($month!="")
	$data .="<option value='".$month."'>".$month."</option>";
else
	$data .="<option value='".date('m')."'>".date('m')."</option>";
$start = 1;
//if($year==""||$year==date('Y'))
//$start=date('m');
while($start<=12){
	$disp="";
	if($start<10)
		$disp = "0".$start;
	else
		$disp = $start;
$data .="<option value='".$disp."'>".$disp."</option>";
$start++;
}
$data .="</select>";
return $data;
}
function __time($str,$hrs,$min){
	$data ="<select name='".$str."Hrs' id='".$str."Hrs'>";
	if($hrs=="")
		$data .="<option value='13'>13</option>";
	if($hrs!="")
		$data .="<option value='".$hrs."'>".$hrs."</option>";
	$inc = 0;
	while($inc<24){
		$data .="<option value='".sprintf("%02d",$inc)."'>".sprintf("%02d",$inc)."</option>";
		$inc++;
	}
	$data .="</select><select name='".$str."Min' id='".$str."Min'>";
	if($min!="")
		$data .="<option value='".$min."'>".$min."</option>";
	$inc=0;
	while($inc<60){
		$data .="<option value='".sprintf("%02d",$inc)."'>".sprintf("%02d",$inc)."</option>";
		$inc++;
	}
	$data .="</select>";
	return $data;
}








function DB_Txn_Begin(){
	mysql_query('SET autocommit=0;');
	mysql_query('START TRANSACTION');
}

function DB_Txn_Commit(){
	mysql_query('COMMIT');
	mysql_query('SET autocommit=1;');
}

function DB_Txn_Rollback(){
    mysql_query('ROLLBACK');
}

function DB_escape_string($String){
	return mysql_real_escape_string(htmlspecialchars($String, ENT_COMPAT, _('iso-8859-1')));
}

function title($linkvar,$action){
$data="<table cellspacing='0'      width='100%'><td colspan='4' class='green_field'>".$action." &raquo;  ".$linkvar."<div style='float:right;'> <input id='searchother' name='searchother' type='hidden' value='' size='50' />  <input  type='hidden'  id='button' name='searchother' id='searchother' onclick='xajax_replace(xajax.getFormValues('searchother'));return false;' value='Go' class='button_width'> 
 <input  type='button'  id='button' name='back' id='back' onclick='history.back()' value='Back' class='button_width'></div></td>
  </tr>
  <tr>
    <td colspan='4'><hr/></td>
  </tr></table>";
echo($data);
}


/*  function active_sessions($login_id){
$login_id=@mysql_fetch_array(mysql_query("select * from view_login where user_id='".$_SESSION['']."' "))or die(mysql_error());
} */
 
function error(){
?>

<script language="javascript" type="text/javascript"  >
var r;
r=alert("No Results Found!");
return r;
</script>
<?php 
}






function close_reportingPeriod(){

$data="";
$currdate=date('Y-m-d');
$closingDate='';
$closing=mysql_fetch_array(mysql_query("select * from tbl_active where status like 'Open%'"))or die("Unexpected Http Response on line 441 because, ".mysql_error());
$closingDate=$closing['doentry'];
if($currdate>=$closingDate){

$query=mysql_query("update tbl_active set quarter='Closed',year='Closed' where status like 'Open%'")or die("Unexpected Http Response on line 447 because, ".mysql_error());
echo $data.=$closing['quarter']." ".$closing['year'];
}
else

echo $data.=$closing['quarter'];


return $data;
}

function empty_RecycleBin($date_updated){

$data="";
$currdate=date('Y-m-d');
$closingDate='';
$closing=mysql_fetch_array(mysql_query("select * from tbl_active where status like 'Open%'"))or die("Unexpected Http Response on line 441 because, ".mysql_error());
$closingDate=$closing['doentry'];
if($currdate>=$closingDate){

$query=mysql_query("update tbl_active set quarter='Closed',year='Closed' where status like 'Open%'")or die("Unexpected Http Response on line 447 because, ".mysql_error());
echo $data.=$closing['quarter']." ".$closing['year'];
}
else

echo $data.=$closing['quarter'];


return $data;
}








function Login_systemLogs($id,$role,$org_code,$ipAddress){
$q="insert into tbl_login(user_id,role,org_code,ip_address) values('$id','$role','$org_code','$ipAddress')";
mysql_query($q)or die("aBi Error-Code 0143: ".mysql_error());
}


function get_Stringorg($getString){
$str="";
for($i=0;$i< count($getString); $i++){
if($str!='')$temp=$str.", ".$getString[$i];
else $temp=$str."".$getString[$i];
$str=$temp;
$gotString=$temp;
}
return $gotString;
}
 
 
 function audit_trail($unique_column,$table_pk_id,$Query_executed,$Table_affected,$changed_from,$changed_to){

$sql="insert into tbl_programme_log (`user_id`,`unique_column`,`table_pk_id`,`Query_executed`,`Table_affected`,`Changed_from`, `Changed_to`, `filename`)
  values('".$_SESSION['username']."','".$unique_column."','".$table_pk_id."','".mysql_real_escape_string($Query_executed)."','".$Table_affected."','".$changed_from."','".$changed_to."','".$_SERVER['SCRIPT_FILENAME']."')";
#$obj->addAlert($sql);
@mysql_query($sql) or die(http(506));

  
  }
  
  
  function color_codes($status){
   $StatuscolorOngoing='#00A651';
  $StatuscolorCancelled='#ff0000';
    $StatuscolorCompleted='#313292';
	$StatuscolorPending='#313292';
	$colorvalue='';
	#$status=$taskStatus;
	if($status=='On-going')$colorvalue=$StatuscolorOngoing;
	else if($status=='Completed')$colorvalue=$StatuscolorCompleted;
	else if($status=='Cancelled')$colorvalue=$StatuscolorCancelled;
	else if($status=='Pending')$colorvalue=$StatuscolorPending;
	else
	$colorvalue='';
  
  return $colorvalue;
  
  }


function dropDown($tbl_name,$colselect,$unique_id,$colorderby){

#$del=mysql_query("delete from ".$tbl_name." where ".$unique_column."='".$code."'")or die("Error...on line 006".mysql_error());
$SQL="select ".$colselect." from  ".$tbl_name." order by ".$colorderby." asc";
$sel=mysql_query($SQL)or die(http("LIB-557"));
while($row=mysql_fetch_array($sel)){
$data.="<option value=''></option>";

}
return $data;
}

/* function delete_data($code,$unique_column,$tbl_name,$file_name){

#$del=mysql_query("delete from ".$tbl_name." where ".$unique_column."='".$code."'")or die("Error...on line 006".mysql_error());
$SQL="update ".$tbl_name." set DISPLAY='NO'  where ".$unique_column."='".$code."'";
$del=mysql_query($SQL)or die("Error...on line 006".mysql_error());
if($del){
echo"<font color='red'>Data Deleted!</font>";
echo "<meta http-equiv=Refresh content=3;url=$file_name.php>";
}else
echo"<font color='red'>Error...could not delete Data!</font>";
}
 */
function rollback_delete($code,$unique_column,$tbl_name,$file_name){

#$del=mysql_query("delete from ".$tbl_name." where ".$unique_column."='".$code."'")or die("Error...on line 006".mysql_error());
$SQL="update ".$tbl_name." set DISPLAY='Yes'  where ".$unique_column."='".$code."'";
$del=mysql_query($SQL)or die("Error...on line 006".mysql_error());
if($del){
echo"<font color='blue'>Rollback Complete!</font>";
echo "<meta http-equiv=Refresh content=3;url=$file_name.php>";
}else
echo"<font color='red'>Error...could not Rollback Deletion!</font>";
}






function download($export_file){
		
		$result = file_exists($export_file);
		//@copy($export_file,$export_file.".bak");
		echo copyFiles($export_file,$export_file.".bak");
		
if($result === TRUE) {
		$fp = fopen($export_file, "r");
		$data = file_get_contents($export_file);
	 fwrite($fp, $data);
		fclose($fp); 
		
		 header("Content-type: application/octet-stream");
		header("Content-Disposition: attachment; filename=$export_file");
		header("Content-Description: PHP Generated Data");
		header("Pragma: no-cache");
		header("Expires: 0"); 

		echo($data);
		unlink($export_file);
		
		//copy files  and rename
		
		$oldfile=$export_file.".bak";
		//$oldfile;
		$newfile=$export_file;
		//echo $newfile;
		$command=@copy($oldfile,$newfile);
		if(!$command){
		 ?>
  <script  language="javascript" type="text/javascript">
  
  alert("Copy Failure!");
  
  </script>
  <?php
		
		}
		
  }
  else {
  ?>
  <script  language="javascript" type="text/javascript">
  
  alert("The File You are trying to download does not exist!");
  
  </script>
  <?php
}
}



function copyFiles($fileName,$newFile){


//$fileName = 'fileName.sql.bak';
//$newFile = 'example.sql';

if (!@copy($fileName, $newFile)) {
?>
<script language="javascript" type="text/javascript" >
    alert("failed to copy ".$fileName."...");
    
   
   </script>
    <?php 
}

}


function read_and_write($export_file){
			#$out_file = 'aBi_file.sql';
		#}
		$result = file_exists($export_file);
if ($result == TRUE) {
		$fp = fopen($export_file, "w+");
		$data = file_get_contents($export_file);
	 fwrite($fp, $data);
		fclose($fp); 
		
		 header("Content-type: application/octet-stream");
		header("Content-Disposition: attachment; filename=$export_file");
		header("Content-Description: PHP Generated Data");
		header("Pragma: no-cache");
		header("Expires: 0"); 

		echo($data);
		unlink($export_file);
  }
  else {
  ?>
  <script  language="javascript" type="text/javascript">
  
  alert("The File You are trying to download does not exist!");
  
  </script>
  <?php
}
}




function LimitRecords($query_string,$query){
$inc=1;
$cur_page=1;
$records_per_page=20;
$max_records = mysql_num_rows($query);
//$records_per_page=5;
$num_pages=ceil($max_records/$records_per_page);
//$feedback->addAlert($cur_page);
$offset = ($cur_page-1)*$records_per_page;
$inc=$offset+1;
$new_query=mysql_query($query_string." limit ".$offset.",".$records_per_page) or die(http(1000));

return $new_query;
}



function displayPages($fxnName,$query,$cur_page,$records_per_page){
$cur_page=1;
$records_per_page=20;
$num_links=10;
$startAt_links=($cur_page-5);
$endAt_links=($cur_page+$num_links);
$cur_link=$cur_page;
$max_records = mysql_num_rows($query);


$num_pages=ceil($max_records/$records_per_page);
if($num_pages>1){
$links=1;
		$append_bar=$p==$num_pages?"":"|";
	if ($cur_page==1)$data.="<a href='#' onclick=\"xajax_".$fxnName."('1','".$records_per_page."')\"><font color=red><b>1</b></font>\n</a>...".$append_bar;
	else $data.="<a href='#' onclick=\"xajax_".$fxnName."('1','".$records_per_page."')\">1\n</a>...".$append_bar;
	//for($p=2;$p<$num_pages;$p++){
	$p=2;
	while($p<$num_pages){
if(($p>$startAt_links) and ($p<$endAt_links)){
		$data.=$p==$cur_page?"<font color=red><b>".$p."</b></font>".$append_bar:"<a href='#' onclick=\"xajax_".$fxnName."('".$p."','".$records_per_page."')\">".$p."\n</a>".$append_bar;
	}
	$p++;
	}
	if($p==$num_pages){
			$data.="...<a href='#' onclick=\"xajax_".$fxnName."('".$p."','".$records_per_page."')\">".$p."\n</a>".$append_bar;
			}
}

$data.="  Records:<select name='num_rec' id='num_rec' onchange=\"xajax_".$fxnName."('".$cur_page."',this.value)\">";
	$i=1;
	$selected="";
	while($i*20<=$max_records){
		$selected=$i*20==$records_per_page?"SELECTED":"";
		$data.="<option value='".($i*20)."' ".$selected.">".($i*20)."</option>";
		$i++;
	}
	//$feedback->addAlert($max_records."-->".($i*10));
	$sel=$records_per_page>=$max_records?"SELECTED":"";
	$data.="<option value='".$max_records."' ".$sel.">All</option>";
	$data.="</select></td></tr></table>";
return $data;

}


//No Results Found Function

function noResultsFound(){
$data.="<center><i ><font color='orange' size='2'><b>No Records Found!</b></font></i></center>";
return $data;
}

function UnderConstruction(){
$data.="<center><i><font color='orange' size='2'><b>Under Construction!</b></font></i></center>";
return $data;

}

//usability      $data.="".noRecordsFound($queryzones);
function noRecordsFound($query,$colspan){
 if(mysql_num_rows($query)>0){
 }
 else {
 
 $data.="<tr><td colspan=$colspan ><center><i ><font color='orange' size='2'><b>No Records Found!</b></font></i></center></td></tr>";
 }
return $data;
}

//selectandDelete_all($colspan,$function_name,$form_name,$delete_link,$unique_column,$column_namevalue,$table_name)
function selectandDelete_all($colspan,$function_name,$form_name,$unique_column,$table_name){
//

//onclick=\"xajax_delete_data(xajax.getFormValues('programme'),'prog_id','tbl_programme');return false;\"
$data.="<tr  class='evenrow'>
     
    <td colspan='$colspan'><input type='button'  id='button' onclick=\"multiCheckBox('checked');return false;\" value='check all' /> |<input type='button'  id='button' onclick=\"multiCheckBox('');\" value='uncheck all' /> | <input type='button'  id='button' TITLE='Edit'  onclick=\"xajax_$function_name(xajax.getFormValues('".$form_name."'));return false;\" value='edit' />| <input type='button' class='formButtonRed'   TITLE='Delete' onclick=\"ConfirmDeletion(xajax.getFormValues('".$form_name."'),'".$unique_column."','".$table_name."');return false;\"  value='Delete' class='redhdrs' /></td>";
return $data;
}

 function loop_key($unique_column,$column_namevalue){
 //$events2="onmouseup=\"this.style.backgroundColor='#999999';\"";
#$object->addAlert($div);
	 //$color=$n%2==1?"evenrow3":"white1";
		$data.="<td align=left><INPUT type=hidden name='loopkey[]'  id='loopkey' value='1' >
 <INPUT type='checkbox' name='".$unique_column."[]'   id='".$unique_column."' value='".$column_namevalue."' ></td>
";

return $data;
} 




 function function_caller($funtion_or_file_name,$arguments){
$y="\"";
//$z="$";
$data=$y.$funtion_or_file_name.$y;
for($x=0;$x<$arguments;$x++){
$t=",''";
$data.=$t;

}
return $data;
}
 function calcArguments($arguments){
$y="\"";
//$z="$";
//$data=$y.$funtion_or_file_name.$y;
$data='';
for($x=0;$x<$arguments;$x++){
$t=",''";
$data.=$t;

}
$data.=",1,20";
return $data;
}
function en_cpt($input)
{
if(!isset($input))$input='';
 if($input!=''){
 if(!isset($inputchr))$inputchr='';

   $inputlen = strlen($input);// Counts number characters in string $input
    $randkey = rand(1, 9); // Gets a random number between 1 and 9
    $i = 0;
    while ($i < $inputlen)
    {
        $inputchr[$i] = (ord($input[$i]) - $randkey);//encrpytion
        $i++; // For the loop to function
    }
//Puts the $inputchr array togtheir in a string with the $randkey add to the end of the string
    $encrypted = implode('A', $inputchr) . 'A' . (ord($randkey)+2);
    return $encrypted;
	}
}

//----------------------------decrypt---------------------------------------------------------------------
//decrypt_encrypt_string
function d_cpt($input)
{
if(!isset($input))$input='';
 if($input!=''){
	if(!isset($real))$real='';

  $input_count = strlen($input);
  $dec = explode("A", $input);// splits up the string to any array
  $x = count($dec);
  $y = $x-1;// To get the key of the last bit in the array
  $calc = $dec[$y]-2;
  $randkey = chr($calc);// works out the randkey number
  $i = 0;
   while ($i < $y)
  {
    $array[$i] = $dec[$i]+$randkey; // Works out the ascii characters actual numbers
    $real .= chr($array[$i]); //The actual decryption
    $i++;
  };
 
$input = $real;
}
return $input;
}


/* function reportingDates(){

}
 */
 
 
 
//---check for USAID financial year-------------------
function check_financialYear(){
$month=date('m');
$day=date('d');
if(date('m')<=10){$year = date('Y')-1;}
if(date('m')>=11){$year = date('Y');} 
$per = $year."/".($year+1);
$yearplus=($year+1);
$startDate=$year."-10-01";
$endDate=$yearplus."-09-30";
$query=mysql_query("select * from tbl_financialyear where financialYear='".$per."' order by financialYear asc")or die(http("CN-00728"));
if(mysql_num_rows($query)>0){

}
else 
@mysql_query("insert into tbl_financialyear(`financialYear`, `startDate`, `endDate`)values('".$per."','".$startDate."','".$endDate."')")or die(http("CN-00733"));

//$fyear=mysql_fetch_array(mysql_query("select * from tbl_financialyear where financialYear='".$per."' order by financialYear asc"))or die(http("CN-00728"));

}

function currFinancialYear($month){;
$month=date('m');
if($month<=10){$year = date('Y')-1;}
if($month>=11){$year = date('Y');} 
$Financialyear = $year."/".($year+1);
$yearplus=($year+1);

return $Financialyear;
}








function currReportingYear($month){;
$month=date('m');
if($month<=3){$year = date('Y')+1;}
if($month>=4){$year = date('Y');} 


return $year;
}




//backup_tables('localhost','username','password','blog');


/* backup the db OR just a table */
function backup_tables($host,$user,$pass,$name,$tables = '*')
{
	
	$link = mysql_connect($host,$user,$pass);
	mysql_select_db($name,$link);
	
	//get all of the tables
	if($tables == '*')
	{
		$tables = array();
		$result = mysql_query('SHOW TABLES');
		while($row = mysql_fetch_row($result))
		{
			$tables[] = $row[0];
		}
	}
	else
	{
		$tables = is_array($tables) ? $tables : explode(',',$tables);
	}
	
	//cycle through
	foreach($tables as $table)
	{
		$result = mysql_query('SELECT * FROM '.$table);
		$num_fields = mysql_num_fields($result);
		
		$return.= 'DROP TABLE '.$table.';';
		$row2 = mysql_fetch_row(mysql_query('SHOW CREATE TABLE '.$table));
		$return.= "\n\n".$row2[1].";\n\n";
		
		for ($i = 0; $i < $num_fields; $i++) 
		{
			while($row = mysql_fetch_row($result))
			{
				$return.= 'INSERT INTO '.$table.' VALUES(';
				for($j=0; $j<$num_fields; $j++) 
				{
					$row[$j] = addslashes($row[$j]);
					$row[$j] = ereg_replace("\n","\\n",$row[$j]);
					if (isset($row[$j])) { $return.= '"'.$row[$j].'"' ; } else { $return.= '""'; }
					if ($j<($num_fields-1)) { $return.= ','; }
				}
				$return.= ");\n";
			}
		}
		$return.="\n\n\n";
	}
	
	//save file
	$handle = fopen('db-backup-'.time().'-'.(md5(implode(',',$tables))).'.sql','w+');
	fwrite($handle,$return);
	fclose($handle);
}


//-------------drop down Functions-----------------

function funct_dropDown($tblName, $colSelect, $colId, $colOrderBy){
		$data = "<option value=''>-Select-</option>";
		$qry = mysql_query(" select ".$colId.", ".$colSelect."
							 from ".$tblName." 
							 order by ".$colOrderBy)or die(http("LIB-973"));
		while($res = mysql_fetch_array($qry)){
			$data.= "<option value=\"".$res[$colId]."\">".substr($res[$colSelect],0,100)."</option>";
		}
		return $data;
	}
	
	function funct_dropDownSelected($tblName, $colSelect, $colId, $colOrderBy,$selected){
		$data = "";
		$qry = mysql_query(" select ".$colId.", ".$colSelect." from ".$tblName." order by ".$colOrderBy)or die(mysql_error());
		while($res = mysql_fetch_array($qry)){
		$selectedxx=($res[$colId]==$selected)?"selected":"";
			$data.= "<option value=\"".$res[$colId]."\" ".$selectedxx." >".$res[$colSelect]."</option>";
		}
		return $data;
	}
 
 
 
 function funct_dropDownSelectedWhere($tblName, $colSelect, $colId, $colOrderBy,$selected,$whereColumn,$whereColumnValue){
		$data = "";
		$qry = @mysql_query(" select ".$colId.", ".$colSelect." from ".$tblName."  ".$whereColumn." like '".$whereColumnValue."%' order by ".$colOrderBy)or die(mysql_error());
		while($res = @mysql_fetch_array($qry)){
		$selectedxx=($res[$colId]==$selected)?"selected":"";
			$data.= "<option value=\"".$res[$colId]."\" ".$selectedxx." >".$res[$colSelect]."</option>";
		}
		return $data;
	}
 
 
 
 function mappQuarterToSemiAnnual($quarter){
if($quarter=='Closed')$semi_annual='';
else
$query=@mysql_query("select * FROM tbl_quarters where britishSemiannual='".$quarter."'") or die(http("LIB-871"));
$semi=@mysql_fetch_array($query);
$semi_annual=$semi['britishSemiannual'];
return $semi_annual;
}
 
 
 


function calc_Percentage($target,$actual){
	  //percentage Acheivement===================================
//========Numerator====================
$percentage=100;
if($actual <= 0){
$percentageAchvmntAGOP = 0.0; }
//=====Numerator>==Denominator==================
/* if($rowActual['totalActual'] >=$row['Target']){
$percentageAchvmntAGOP = 100.0; } */

//=====denominator==============================

if($target > 0){
$percentageAchvmntAGOP = round(($actual/$target) * $percentage,1);
}

/* if($percentageAchvmntAGOP > 100){

$percentageAchvmntAGOP=100.0;
}
	 */		
//$percentageAchvmntAGOPDisplay=($percentageAchvmntAGOP!=0)?"<td align='right'>".$percentageAchvmntAGOP."%</td>":"<td ALIGN='RIGHT' >0.0%</td>";
return $percentageAchvmntAGOP;
 }
 
 
 
 
 function Sum_PercentageandNumber($totalAc,$unitofMeasure){
 						   if($unitofMeasure==NULL) $TotalActual=($totalAc==NULL)?"<td align=right><center><strong>-</strong></center></td>":"<td align=right><strong>".number_format($totalAc)."</strong></td>";
				  else if($unitofMeasure=='Number') $TotalActual=($totalAc==NULL)?"<td align=right><center><strong>-</strong></center></td>":"<td align=right><strong>".number_format($totalAc)."</strong></td>";
				  //-------------Get the mean Percentage---------------------
				  else $TotalActual=($totalAc==NULL)?"<td align=right><center><strong>-</strong></center></td>":"<td align=right><strong>".round($totalAc/1,1)."</strong></td>";
 
 return $TotalActual;
  }
 
 
 function Mean($totalAc,$unitofMeasure){
 						   if($unitofMeasure=='%') $TotalActual=round($totalAc/1,1);
				  else if($unitofMeasure=='Number') $TotalActual=$totalAc;
				  //-------------Get the mean Percentage---------------------
				  else $TotalActual=$totalAc;
 
 return $TotalActual;
 
  }
 
 function cumulativeMean($totalAc,$unitofMeasure,$count){
   if($unitofMeasure==NULL) $TotalActual=number_format($totalAc);
				  else if($unitofMeasure=='Number') $TotalActual=number_format($totalAc);
				  //-------------Get the mean Percentage---------------------
				  else $TotalActual=round($totalAc/$count,1);

 return $TotalActual;
 
  }
 
 
 
 
function _fetch_data($sql,$result){
$query=@mysql_query($sql) or die(http("LIB-1590"));
$rowsRecords=@mysql_fetch_array($query);
return $rowsRecords[$result];
}




function insert_info_withSpecialCharacters($string){
$strings_to_escape = array("¿", "À", "Á", "Â","Ã","Ä","Å","Æ","•","`","…","*","'", "‘" ,"’"  ,"“"   ,"”" , "–" ,"—" ,"¯" ,"´","¸","Ç","\n","'","&nbsp;");
$replacement=array("&#191;", "&#192;", "&#193;", "&#194;", "&#195;", "&#196;", "&#197;", "&#198;","&#149;","&#96;","&#133;","&#42;","&#39;","&#145;","&#146;","&#147;","&#148;","&#150;","&#151;","&#175;","&#180;","&#184;","&#199;");

$string_converted=str_replace($strings_to_escape,"",$string);
$data=iconv('UTF-8', 'ISO-8859-1//TRANSLIT',htmlentities(mysql_real_escape_string(trim($string_converted))));

return trim($data);
}



function retrieve_info_withSpecialCharactersGraphs($string){
$strings_to_escape = array("¿", "À", "Á", "Â","Ã","Ä","Å","Æ","•","`","…","*","'", "‘" ,"’"  ,"“"   ,"”" , "–" ,"—" ,"¯" ,"´","¸","Ç","\n","'","&nbsp;");
$replacement=array("&#191;", "&#192;", "&#193;", "&#194;", "&#195;", "&#196;", "&#197;", "&#198;","&#149;","&#96;","&#133;","&#42;","&#39;","&#145;","&#146;","&#147;","&#148;","&#150;","&#151;","&#175;","&#180;","&#184;","&#199;");

$string_converted=str_replace($strings_to_escape,"",$string);
$data=iconv('UTF-8', 'ISO-8859-1//TRANSLIT',htmlentities(mysql_real_escape_string(trim($string_converted))));
if(strlen($data)>100)
{
		$data=substr($data,0,50)." ...";
		}else if($data==''){
		$data="<center>-</center>";
		}
		else {
		$data=$data;
		
		
		}
return $data;
}







  function MatchExplodedRecords($table){
  $qryX = @mysql_query("select * from ".$table." ")or die(http("z_project_results-434"));
										//$fTyA = explode(",",$res['subc']);
							$output=$res['outp'];		
										$k=0;
										
										while($resX = @mysql_fetch_array($qryX)){
											//$cA=(in_array($resX['output_id'], $res['outp'] ))?$resX['output_code']:" ";
									$cA=(strpos($res['outp'], $resX['output_id']) !==false)?$resX['output_code'].",":"";
									
											$data.=$cA;
					
								$k++;
										}
										@mysql_free_result($qryX);
  
  
  }
  
  
  
  
  
  
  
function Execute($query){
		return $x=@mysql_query($query,$_SESSION['connections']);
			}

	function FetchRecords($query){
		return $x=@mysql_fetch_array($query);
	}
	function free_result($query){
		@mysql_free_result($query);
	}

function RetrieveData($table,$condition,$value,$returnValue1){
		$x=@mysql_query(" select * from `".$table."` where `".$condition."` ='".$value."' order by 1") or die(http("LIB-1123"));
		$row=@mysql_fetch_array($x);
		return $row[$returnValue1];
	}
	
	
	
	function RetrieveDataManyColumns($table,$condition,$value,$returnValue1){
		$x=Execute(" select * from `".$table."` where `".$condition."` ='".$value."' order by 1") or die(http("LIB-1123"));
		$count = 0;
		$data = array();
		while($row = @mysql_fetch_array($results)){
			$data[$count] = $row;
			$count++;
		}
		// NB: free the variable result here please
		$x = NULL;
		return $data;
	}




function edit_txtFieldArray($fieldname,$value){
 $data.="<input type='text' name='".$fieldname."[]' id='$fieldname'  class='combobox2' value='".$value."'  >";
return $data;
}

function edit_txtFieldPasswordArray($fieldname,$value){
 $data.="<input type='password' name='".$fieldname."[]' id='$fieldname'  class='combobox2' value='".$value."'  >";
return $data;
}


function edit_txtField($fieldname,$value){
 $data.="<input type='text' name='$fieldname' id='$fieldname'  class='combobox2' value='".$value."'  >";
return $data;
}



function add_txtField($fieldname){
 $data.="<input type='text' name='$fieldname' id='$fieldname'  class='combobox2' value=''  >";
return $data;
}
function add_txtarea($fieldname){
 $data.="<textarea name='$fieldname' id='$fieldname' cols='80' rows='5' class='combobox2'></textarea>";
return $data;
}


function edit_txtarea($fieldname,$value){
 $data.="<textarea name='$fieldname' id='$fieldname' cols='80' rows='5' class='combobox2'>".$value."</textarea>";
return $data;
}


  
  
  function generateAutoIndicatorPrefixCode($indicatorType){
  switch($indicatorType){
  case "Impact Indicator(Super Goal)":
  $Prefix="SG";
  break;
  case "Impact Indicator":
  $Prefix="G";
  break;
  
  case "Outcome Indicator":
 $Prefix="P";
  break;
  case "Output Indicator":
  $Prefix="";
  break;
  case "Secretariat Indicator":
  $Prefix="S";
  break;
  
default:
$Prefix="";

  }
  
 return $Prefix;
  }
  
  
  function upload_info_withSpecialCharacters($string){
$strings_to_escape = array("¿", "À", "Á", "Â","Ã","Ä","Å","Æ","•","`","…","*","'", "‘" ,"’"  ,"“"   ,"”" , "–" ,"—" ,"¯" ,"´","¸","Ç"," ","\n","'");

$string_converted=str_replace($strings_to_escape,"_",$string);
$data=iconv('UTF-8', 'ISO-8859-1//TRANSLIT',htmlentities(mysql_real_escape_string(trim($string_converted))));

return $data;
}
  
  
  
  function retrieve_info_withSpecialCharactersNowordLimit($string){
$strings_to_escape = array("¿", "À", "Á", "Â","Ã","Ä","Å","Æ","•","`","…","*","'", "‘" ,"’"  ,"“"   ,"”" , "–" ,"—" ,"¯" ,"´","¸","Ç","\n","'","&nbsp;","â€");
$replacement=array("&#191;", "&#192;", "&#193;", "&#194;", "&#195;", "&#196;", "&#197;", "&#198;","&#149;","&#96;","&#133;","&#42;","&#39;","&#145;","&#146;","&#147;","&#148;","&#150;","&#151;","&#175;","&#180;","&#184;","&#199;");

$string_converted=str_replace($strings_to_escape,"",$string);
$data=iconv('UTF-8', 'ISO-8859-1//TRANSLIT',htmlentities(mysql_real_escape_string(trim($string_converted))));
if(strlen($data)>100)
{
		$data=substr($data,0,100000)." ...";
		}else if($data==''){
		$data="-";
		}
		else {
		$data=$data;
		
		
		}
return $data;
}



?>