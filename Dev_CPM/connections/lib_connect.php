<?php
session_start();

#***********************************************************
#Database connection
global $data;
$PageSecurity=15;

header("Cache-control: private"); 

#connection variables
date_default_timezone_set('Africa/Kampala');	
require_once('conf.php');
#connection string
$_SESSION['connections']=@mysql_connect(DB_SERVER,DB_USER,DB_PWD);
$_SESSION['u_id']= $_GET['u_id'];


if($_GET['logout']=='true'){
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
	
	header('Location: http://mis.ftfcpm.com:9000/');
}
@mysql_select_db(DB_NAME,mysql_connect(DB_SERVER,DB_USER,DB_PWD))or die(@mysql_error());




$u="select u.user_id,u.org_code,u.name,u.username,u.password,u.usergroup,u.role,r.role_name,g.group_name,
d.countryName,u.status,u.display,o.orgName,o.orgType from tbl_user u 
left join tbl_organization o on(u.org_code=o.org_code) 
 left join tbl_country d on(d.countryCode=u.country) 
 left join tbl_role r on(r.role_id=u.role)
 left join tbl_usergroup g on(u.usergroup=g.group_id)
 where u.user_id='".$_SESSION['u_id']."' && u.display like 'Yes'";

$query=mysql_query($u)or die(mysql_error());

if(mysql_num_rows($query)>0){

//ipaddress and mac address of the computer
#*******************************************************
$ipAddress=$_SERVER['REMOTE_ADDR'];
//------------------------------------------------------
$row = mysql_fetch_array($query)or die(mysql_error());


$_SESSION['user_id']=$_SESSION['u_id'];
$_SESSION['username']=$row['username'];
$username=$_SESSION['username'];
$_SESSION['name']=$row['name'];
$_SESSION['projectName']=$row['title'];
$_SESSION['districtCode']=($row['districtCode']==0)?"":$row['districtCode'];
$_SESSION['district']=$row['districtName'];
$_SESSION['role_id']=$row['role'];
$_SESSION['UserGroup']=$row['group_name'];
$_SESSION['role']=$row['role_name'];
$role=$_SESSION['role'];
$_SESSION['quarter']=$quarter;
$_SESSION['org_code']=$row['org_code'];	
$org_code=$_SESSION['org_code'];
$_SESSION['orgName']=$row['orgName'];
$_SESSION['countryNameLogin']=$row['countryName'];

	
}
	 
$query=@mysql_query("select * from tbl_active where status='Open'")or die(mysql_error());
while($row=@mysql_fetch_array($query)){

$_SESSION['quarter']= $row['quarter'].''. $row['year'];
}


#****************************************************
//require_once(dirname(__FILE__).'\QueryManagerClass.php');
//require_once(dirname(__FILE__).'\Form2QueryAnalyzerClass.php');
//require_once(dirname(__FILE__).'\QueryAnalyzerClass.php');
//require_once(dirname(__FILE__).'\GeneralClass_library.php');
//require_once(dirname(__FILE__).'\SetupQueryManagerClass.php');
//require_once(dirname(__FILE__).'\ExportandPrintClass.php');
//require_once(dirname(__FILE__).'\class_library.php');

//for php to Excel library
require_once(dirname(__FILE__).'/PHPExcel.php');
require_once(dirname(__FILE__).'/PHPExcel/Writer/Excel2007.php');

//for linux config replace backward slash with forward slash
require_once(dirname(__FILE__).'/QueryManagerClass.php');
require_once(dirname(__FILE__).'/Form6DataValidationManagerClass.php');
require_once(dirname(__FILE__).'/ValidationManagerClass.php');
require_once(dirname(__FILE__).'/Form2QueryAnalyzerClass.php');
require_once(dirname(__FILE__).'/QueryAnalyzerClass.php');
require_once(dirname(__FILE__).'/GeneralClass_library.php');
require_once(dirname(__FILE__).'/SetupQueryManagerClass.php');
require_once(dirname(__FILE__).'/ExportandPrintClass.php');
require_once(dirname(__FILE__).'/class_library.php');

//mail sending functionality
/* include('/mail/sendMail.php'); */
require_once(dirname(__FILE__).'/mail/sendMail.php');

//------------Data Minning Classes-----------
require_once(dirname(__FILE__).'/ActivityDataMiningClass.php');
require_once(dirname(__FILE__).'/DataFactSheetClass.php');
require_once(dirname(__FILE__).'/umemsDataMiningClass.php');
require_once(dirname(__FILE__).'/umemsDataMiningLevelOneClass.php');
require_once(dirname(__FILE__).'/ftfDataMiningClass.php');
require_once(dirname(__FILE__).'/FtFRepLevelOneDataMiningClass.php');
require_once(dirname(__FILE__).'/FtFRepLevelTwoDataMiningClass.php');
require_once(dirname(__FILE__).'/FtFRepLevelThreeDataMiningClass.php');
require_once(dirname(__FILE__).'/IndDissagDataMiningClass.php');
require_once(dirname(__FILE__).'/IndDissagTargetsClass.php');
require_once(dirname(__FILE__).'/ActivityGeneralClass_library.php');


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

/*************************
#Main Class
**************************/
class ntc{
#query string variable
var $statement;
#process error message


#insert to db
function __insert__todb($query){
	$this->statement = $query;
if($this->statement=="")
	return errorMsg("java","","Error:\nQuery statement cannot be null!");
if(!mysql_query($this->statement))
	trigger_error("Insertion Failed: ");
else
errorMsg("phpecho","#00FF33","Successfull!");
}
#Fetch from db and display on the interface
function __fetch__data($flag,$header,$query,$rows){
	$arrayRows = explode(",",$rows);
$this->statement = $query;
if($this->statement=="")
	return errorMsg("java","","Error:\nQuery statement cannot be null!");
if(!$result=(mysql_query($this->statement)))
	trigger_error("Insertion Failed: ");
else{
$count = mysql_num_rows($result);
if($count>0){

}
}
}
}


function heading($title){
//$this->$statement=$title;
$head="";
$hd=$title==""?$head:$head.$title;
echo($hd);
}
function currFinancialYear($month){;
$month=date('m');
if($month<=10){$year = date('Y')-1;}
if($month>=11){$year = date('Y');} 
$Financialyear = $year."/".($year+1);
$yearplus=($year+1);

return $Financialyear;
}
function WorkplanYearSequence($CurrSetYear,$CurrSetEndYear,$returnValue1){
$Financialyear=array();

for($x=intval($CurrSetYear);$x<$CurrSetEndYear;$x++){

$Financialyear[]=$x;
//$y=$Financialyear[$returnValue1];
//echo $y=$Financialyear[$returnValue1];
}
$y=$Financialyear[$returnValue1]+1;
return $Financialyear[$returnValue1]."/".$y;
}


function export($format,$content){
if($format=='excel' || $format=='word' || $format=='sql'){
		if($format=='excel'){
			$export_file ='export.xls';
			$out_file = 'CPM_file.xls';
			
			
			
		}elseif($format == 'word'){
			$export_file ='export.doc';
			$out_file = 'CPM_file.doc';
		}
		else if($format=='sql'){
		#$backupFile = $dbname._. date("Y-m-d-H-i-s");
		$export_file ='export.sql';
			$out_file = 'CPM_file.sql';
		}
		$fp = fopen($export_file, "w+");
		fwrite($fp, $content);
		fclose($fp);
		$data = file_get_contents($export_file);
		//header("Content-type: application/octet-stream");
		header("Content-Type: application/vnd.ms-excel;");
		header("Content-Disposition: attachment; filename=".$out_file."");
		header("Content-Description: PHP Generated Data");
		
		header("Pragma: no-cache");
		header("Expires: 0");

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


//EXPORT
function exportUsingLibrary($content){
			
		$filename = "CPM_MIS_File";
		$table =$content;
		// save $table inside temporary file that will be deleted later
		$tmpfile = tempnam(sys_get_temp_dir(), 'html');
		file_put_contents($tmpfile, $table);

		// insert $table into $objPHPExcel's Active Sheet through $excelHTMLReader
		$objPHPExcel     = new PHPExcel();
		$excelHTMLReader = PHPExcel_IOFactory::createReader('HTML');
		$excelHTMLReader->loadIntoExisting($tmpfile, $objPHPExcel);
		$objPHPExcel->getActiveSheet()->setTitle('any name you want'); // Change sheet's title if you want

		unlink($tmpfile); // delete temporary file because it isn't needed anymore

		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'); // header for .xlxs file
		header('Content-Disposition: attachment;filename='.$filename); // specify the download file name
		header('Cache-Control: max-age=0');

		// Creates a writer to output the $objPHPExcel's content
		$writer = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
		$writer->save('php://output');
		exit;
		
}
class export_data{

var $content;

function export($format,$content){
$this->content=$content;
	if($format=='excel' || $format=='word' || $format=='sql'){
		if($format=='excel'){
			$export_file ='export.xlsx';
			$out_file = 'CPM_file.xlsx';
		}elseif($format == 'word'){
			$export_file ='export.doc';
			$out_file = 'CPM_file.doc';
		}
		else if($format=='sql'){
		#$backupFile = $dbname._. date("Y-m-d-H-i-s");
		$export_file ='export.sql';
			$out_file = 'CPM_file.sql';
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
$data ="<fieldset><legend><span class='redhdrs'><b>Error</b></span></legend><span class=redhdrs ><table border='0' width=600 style='border-bottom-color:#CC0000; background-color:#FFCC99;'><tr><td><img src='icons/warning_icon.png'>  ".$msg."</td></tr></table></span></fieldset>";
return $data;
}
#DISPLAY notification
function noteMsg($msg){
# bgcolor='#FFCC99'
$data ="<fieldset><legend><span class=''><b>Notification</b></span></legend><span class= ><table border='0' width=600 style='border-bottom-color:#CC0000; background-color:#FFCC99;'><tr><td><img src='icons/warning_icon.png'>  ".$msg."</td></tr></table></span></fieldset>";
return $data;
}
function congMsg($msg){
# bgcolor='#FFCC99'
$data ="<fieldset><legend><span class=''><b>Congratulations</b></span></legend><span class= ><table border='0' width=600 style='border-bottom-color:#ffffff; background-color:#FFffff;'><tr><td><font color=green>  ".$msg."</font></td></tr></table></span></fieldset>";
return $data;
}
function SystemLog($userName){
$obj=new xajaxResponse();
  $query_reg_user = "update  parish_log set 
								user_id='$userName',
								where user_id='root@localhost'
								";
//$obj->addAlert($query_reg_user);	
//$reg_user = 									
mysql_query($query_reg_user)or die(mysql_error());
//if (!$reg_user) echo mysql_error();
  // echo "Logged!" ;else 
$obj->assign('BodyDisplay','innerHTML','');
return $obj;
  }
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
		case "12":
			$name="DECEMBER";
			break;
		case "13":
			$name="M-1";
			break;
		case "14":
			$name="M-2";
			break;
		case "15":
			$name="M-3";
			break;
		case "16":
			$name="M-4";
			break;
		case "17":
			$name="M-5";
			break;
		default:
			$name="M-6";
		break;
		
	}
	return $name;
}
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
function __error($type="java",$color="#00FF33",$msg=""){
if($type=="java"){
echo('<SCRIPT LANGUAGE="JavaScript">
<!--
	alert("$msg");
//-->
</SCRIPT>');
}
if($type=="phpecho")
	echo('<font color=$color><b>$msg</b></font>');
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
$data="<table width='100%'><td colspan='4' class='green_field'>".$action." &raquo;  ".$linkvar."</td>
  </tr>
  <tr>
    <td colspan='4'><hr/></td>
  </tr></table>";
echo($data);
}
function active_sessions($login_id){
$login_id=@mysql_fetch_array(mysql_query("select * from view_login where user_id='".$_SESSION['']."' "))or die(mysql_error());
}
 
function error(){
?>

<script language="javascript" type="text/javascript"  >
var r;
r=alert("No Results Found!");
return r;
</script>
<?php 
}

function http($line){
$emailAddress='aasiimwe@dcareug.com';	
$data="Http Error code ".$line." because,".mysql_error() ;
$subject="CPM Runtime Error/Warning Recieved By ".$_SESSION['username']." (".$_SESSION['name'].")";
$message=$data." on " .$_SERVER['SCRIPT_NAME']. $_SERVER['PHP_SELF'];
$query=@send_email($emailAddress,$subject,$message, $headers="mis.ftfcpm@dcareug.com");
	/* $query=@send_emailCPMServer($emailAddress,$subject,$message, $headers="mis@ftfcpm.com"); */ 
	/* 
	$query=@send_emailGmail($emailAddress,$subject,$message, $headers="ftfcpm.mis@gmail.com"); */
return $query;
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

function get_String($getString){
	$str="";
	for($i=0;$i< count($getString); $i++){
		if($i==0)$temp=$str."".$getString[$i];
		else $temp=$str."`,`".$getString[$i];
		$str=$temp;
		$gotString=$temp;
	}
	return $gotString;
}

function get_StringorgAll($getString){
$str="";
for($i=0;$i< count($getString); $i++){
if($str!='')$temp=$str.", ".$getString[$i];
else $temp=$str."".$getString[$i];
$str=$temp;
$gotString=$temp;
}
return $gotString;
}
 
function downloadBackup($export_file){
		
		$result = file_exists($export_file);
if ($result === TRUE) {
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
		//echo $oldfile;
		$newfile=$export_file;
		//echo $newfile;
		$command=copy($oldfile,$newfile);
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

function download($export_file){
		
		$result = file_exists($export_file);
		//@copy($export_file,$export_file.".bak");
		echo copyFiles($export_file,$export_file.".bak");
		
if($result == TRUE) {
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

if (!copy($fileName, $newFile)) {
?>
<script language="javascript" type="text/javascript" >
    alert("failed to copy $fileName...\n");
    
   
   </script>
    <?php 
}

}

function Login_systemLogs($id,$role,$org_code,$ipAddress){
$q="insert into tbl_login(user_id,role,org_code,ip_address) values('$id','$role','$org_code','$ipAddress')";
mysql_query($q)or die("CPM Error-Code 0143: ".mysql_error());
}

function display_tr($name){

 if($name=='')$content.="<tr style='display:none;'>";
 else $content.="<tr class='evenrow'>";
return $content;

}

class display_pages{
var $display='';
var $name="";


function display_tr($name){
 $this->display=$content;
 $this->name=$name;
 if($name=='')$content.="<tr style='display:none;'>";
 else $content.="<tr class='evenrow'>";
return $content;

}

}

function UnderConstruction(){
$data.="<center><i ><font color='orange' size='2'><b>Under Construction!</b></font></i></center>";
return $data;

}
function noResultsFound(){
$data.="<center><i ><font color='orange' size='2'><b>No Results Found!</b></font></i></center>";
return $data;

}

//usability      $data.="".noRecordsFound($queryzones);
function noRecordsFound($query,$colspan){
 if(mysql_num_rows($query)>0){}else
	{$data.="<tr><td colspan=$colspan ><center><i ><font color='black' size='2'><b>No Records Found!</b></font></i></center></td></tr>";}
return $data;
}

// ColorCoding($percentage,$colspan)
function calc_Percentage($target,$actual){
	  //percentage Acheivement===================================
//========Numerator====================
$percentage=100;
if($actual <= 0){
$percentageAchvmntAGOP = 0; }
//=====Numerator>==Denominator==================
/* if($rowActual['totalActual'] >=$row['Target']){
$percentageAchvmntAGOP = 100.0; } */

//=====denominator==============================

if($target==0){
$percentageAchvmntAGOP =0;
}

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
 
function ColorCoding($percentage,$colspan,$rowspan=1){
	if($percentage<=49){
	$data.="<td align='right' colspan='".$colspan."' rowspan='".$rowspan."' id='red'>".$percentage."%</td>";
	}
	elseif($percentage>=50 && $percentage<=79){
	$data.="<td align='right' colspan='".$colspan."' rowspan='".$rowspan."' id='orange'>".$percentage."%</td>";
	}elseif($percentage>=80){
	$data.="<td align='right' colspan='".$colspan."' rowspan='".$rowspan."' id='green'>".$percentage."%</td>";
	}
	else{
	$data.="<td align='right' colspan='".$colspan."' rowspan='".$rowspan."' id='green' >".$percentage."%</td>";

	}
 return $data;
 
 }
 
function ColorCodingMELA($percentage, $class){
	$data='';
			if($percentage <= 0){
			  $data .= "<td align='right' class='".$class."'>-</td>";
			 }elseif($percentage >0 && $percentage <= 49){
			  $data .= "<td align='right' class='".$class."' id='red'>".$percentage."%</td>";
			 }
			 elseif($percentage >= 50 && $percentage <= 79){
			  
			  $data .= "<td align='right' class='".$class."' id='orange'>".$percentage."%</td>";
			  }elseif($percentage >=80 ){
			  $data .= "<td align='right' class='".$class."' id='green'>".$percentage."%</td>";
			 }
			  else{
			  $data .= "<td align='right' class='".$class."' id='green'>".$percentage."%</td>";
			 
			  }
 return $data;
 
 }
 
function ColorCodingBgcolor($percentage,$colspan,$rowspan=1){
			   if($percentage<=49){
			  $data.="<td align='right' colspan='".$colspan."' rowspan='".$rowspan."'bgcolor='red'><font color='white'>".$percentage."%</font></td>";
			 }
			 elseif($percentage>=50 && $percentage<=79){
			  /* $percentage2=50;
			  //case $percentage>=50 && $percentage<=79:
			 case ($percentage2+$percentage)<=79: */
			  $data.="<td align='right' colspan='".$colspan."' rowspan='".$rowspan."'bgcolor='orange'><font color='white'>".$percentage."%</font></td>";
			  }elseif($percentage>=80){
			  $data.="<td align='right' colspan='".$colspan."' rowspan='".$rowspan."'bgcolor='green'><font color='white'>".$percentage."%</font></td>";
			 }
			  else{
			  $data.="<td align='right' colspan='".$colspan."' rowspan='".$rowspan."'bgcolor='green' ><font color='white'>".$percentage."%</font></td>";
			 
			  }
 return $data;
 
 }

function ColorCodingGeneral($percentage,$style){
			   if($percentage<=49){
			  $data.="<td style='".$style."' align='right' colspan='1'  class='redhdrs'>".$percentage."%</td>";
			 }
			 elseif($percentage>=50 && $percentage<=79){
			  
			  $data.="<td style='".$style."' align='right' colspan='1'  class='orange'>".$percentage."%</td>";
			  }elseif($percentage>=80){
			  $data.="<td style='".$style."' align='right' colspan='1'  class='green'>".$percentage."%</td>";
			 }
			  else{
			  $data.="<td style='".$style."' align='right' colspan='1'  class='green' >".$percentage."%</td>";
			 
			  }
 return $data;
 
 }
 
function ColorCodingDataMaps($percentage,$colspan,$rowspan=1,$style){
			   if($percentage<=49){
			  $data.="<td style='".$style."' align='right' colspan='".$colspan."' rowspan='".$rowspan."' class='redhdrs'>".$percentage."%</td>";
			 }
			 elseif($percentage>=50 && $percentage<=79){
			  
			  $data.="<td style='".$style."' align='right' colspan='".$colspan."' rowspan='".$rowspan."'class='orange'>".$percentage."%</td>";
			  }elseif($percentage>=80){
			  $data.="<td style='".$style."' align='right' colspan='".$colspan."' rowspan='".$rowspan."'class='green'>".$percentage."%</td>";
			 }
			  else{
			  $data.="<td style='".$style."' align='right' colspan='".$colspan."' rowspan='".$rowspan."'class='green' >".$percentage."%</td>";
			 
			  }
 return $data;
 
 }

function ColorCodingDataMapsBackgroud($percentage,$colspan,$rowspan=1,$style){
			   if($percentage<=49){
			  $data.="<td  align='right' colspan='".$colspan."' rowspan='".$rowspan."' style='background: red;'>".$percentage."%</td>";
			 }
			 elseif($percentage>=50 && $percentage<=79){
			  
			  $data.="<td  align='right' colspan='".$colspan."' rowspan='".$rowspan."' style='background: orange;'>".$percentage."%</td>";
			  }elseif($percentage>=80){
			  $data.="<td  align='right' colspan='".$colspan."' rowspan='".$rowspan."'style='background:green;'>".$percentage."%</td>";
			 }
			  else{
			  $data.="<td align='right' colspan='".$colspan."' rowspan='".$rowspan."' style='background: green' >".$percentage."%</td>";
			 
			  }
 return $data;
 
 }
		
		
		
		
function Execute($query){
return $x=@mysql_query($query,$_SESSION['connections']);
}

function FetchRecords($query){
return $x=@mysql_fetch_array($query);
}

function convertAcresToHectares($acres){
//1 acre=0.404686Ha
//Divide the acreage by the 2.47
define("Ha","0.40468");
$result=($acres*Ha);
return $result;

}

function convertShillingsToDollars($amount){
//1USD =2500Shs
define("usd","2500");
$result=($amount/usd);
return $result;

}

function GrossMarginPerUnitOfLand($TP,$VS,$QS,$IC,$UP,$ExFactor){
//(((TP*(VS/QS))-IC)/UP)
$result=(((($TP*($VS/$QS))-$IC)/$UP)*$ExFactor);
return $result;

}

function ExtrapolationFactor($indicatorId){

//Getting the Extrapolation across the LOA
	$query_string = "SELECT $indicatorId AS indicator_id,
		max(if(`p`.`financialYear`='2013',`p`.`extrapolationFactor`,1)) as exFactorYr1,
		max(if(`p`.`financialYear`='2014',`p`.`extrapolationFactor`,1)) as exFactorYr2,
		max(if(`p`.`financialYear`='2015',`p`.`extrapolationFactor`,1)) as exFactorYr3,
		max(if(`p`.`financialYear`='2016',`p`.`extrapolationFactor`,1)) as exFactorYr4,
		max(if(`p`.`financialYear`='2017',`p`.`extrapolationFactor`,1)) as exFactorYr5,
		max(if(`p`.`financialYear`='2018',`p`.`extrapolationFactor`,1)) as exFactorYr6
		FROM `tbl_pmpextrapolation` AS `p`
		WHERE $indicatorId=$indicatorId ";

return ($query_string);
}

function convertKiloToTonnes($weight){
//1T=1000Kgs
define("t","1000");
$result=($weight/t);
return $result;

}

//Convert to percentages
function convertToPercentages($numerator,$denominator){
//((a/b)*100)
if($denominator == 0){
$result='-';	
}else{
$result=(($numerator/$denominator)*100);	
} 

return $result;

}

//sanitizeForm2DirtyDate
function sanitizeForm2DirtyDate($date){
	//condition
	$lowerLimitDate=date_create("2013-01-01");
	$submittedDate=date_create("".$date."");
	$upperLimitDate=date_create("2050-12-31");
		if($submittedDate<$lowerLimitDate){
		$cleanDate = '-';	
		}else if($submittedDate>$upperLimitDate){
			$cleanDate = '-';	
		}else{
			
		$cleanDate=$date;	
		}
return $cleanDate;
}


function free_result($query){
@mysql_free_result($query);
}

function RetrieveData($table,$condition,$value,$returnValue1){
$x=@mysql_query(" select * from `".$table."` where `".$condition."` ='".$value."' order by 1") or die(http(__line__));
$row=@mysql_fetch_array($x);
return $row[$returnValue1];
}
	
	
function LookupData($code,$returnValue1){
		$x=@mysql_query(" select * from tbl_lookup2 where code ='".$code."' order by 1") or die(http(__line__));
		$row=@mysql_fetch_array($x);
		return $row[$returnValue1];
}
	
function RetrieveDataCondtion2($table,$condition1,$value1,$condition2,$value2,$returnValue1){
		$x=@mysql_query(" select * from `".$table."` where `".$condition1."` ='".$value1."'
		and `".$condition2."` ='".$value2."'
		 order by 1") or die(http(__line__));
		$row=@mysql_fetch_array($x);
		return $row[$returnValue1];
	}
	
	
function RetrieveDataManyColumns($table,$condition,$value,$returnValue1){
		$x=Execute(" select * from `".$table."` where `".$condition."` ='".$value."' order by 1") or die(http(__line__));
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

function retrieve_info_withSpecialCharacters($string)
{
	$strings_to_escape = array("&iquest;", "&Agrave;", "&Aacute;", "&Acirc;", "&Atilde;", "&Auml;", "&Aring;", "&AElig;", "&#9679;", "`", "&#8230;", "*", "'", "&#39;", "'", "&#34;", "&#8220;", "&#8211;", "&#8212;", "&macr;", "&acute;", "&cedil;", "&Ccedil;", "\n", "'", "&nbsp;");
	$replacement = array("&#191;", "&#192;", "&#193;", "&#194;", "&#195;", "&#196;", "&#197;", "&#198;", "&#149;", "`", "&#133;", "*", "&#39;", "&#145;", "&#146;", "&#147;", "&#148;", "&#150;", "&#151;", "&#175;", "&#180;", "&#184;", "&#199;");

	$string_converted = str_replace($strings_to_escape, "", $string);
	$data = iconv('UTF-8', 'ISO-8859-1//TRANSLIT', htmlentities(mysql_real_escape_string(trim($string_converted), $_SESSION['connections'])));
	if (strlen($data) > 100) {
		$data = substr($data, 0, 1000) . " ...";
	} else if ($data == '') {
		$data = "-";
	} else {
		$data = $data;


	}
	return $data;
}


function retrieve_info_withSpecialCharactersGraphs($string)
{
	$strings_to_escape = array("&iquest;", "&Agrave;", "&Aacute;", "&Acirc;", "&Atilde;", "&Auml;", "&Aring;", "&AElig;", "&#9679;", "`", "&#8230;", "*", "'", "&#39;", "'", "&#34;", "&#8220;", "&#8211;", "&#8212;", "&macr;", "&acute;", "&cedil;", "&Ccedil;", "\n", "'", "&nbsp;");
$replacement=array("&#191;", "&#192;", "&#193;", "&#194;", "&#195;", "&#196;", "&#197;", "&#198;","&#149;","`","&#133;","*","&#39;","&#145;","&#146;","&#147;","&#148;","&#150;","&#151;","&#175;","&#180;","&#184;","&#199;");

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


function insert_info_withSpecialCharacters($string)
{
	$strings_to_escape = array("&iquest;", "&Agrave;", "&Aacute;", "&Acirc;", "&Atilde;", "&Auml;", "&Aring;", "&AElig;", "&#9679;", "`", "&#8230;", "*", "'", "&#39;", "'", "&#34;", "&#8220;", "&#8211;", "&#8212;", "&macr;", "&acute;", "&cedil;", "&Ccedil;", "\n", "'", "&nbsp;");
	$replacement = array("&#191;", "&#192;", "&#193;", "&#194;", "&#195;", "&#196;", "&#197;", "&#198;", "&#149;", "`", "&#133;", "*", "&#39;", "&#145;", "&#146;", "&#147;", "&#148;", "&#150;", "&#151;", "&#175;", "&#180;", "&#184;", "&#199;");

	$string_converted = str_replace($strings_to_escape, "", $string);
	$data = iconv('UTF-8', 'ISO-8859-1//TRANSLIT',htmlentities(mysql_real_escape_string(trim($string_converted))));

return trim($data);
}


function upload_info_withSpecialCharacters($string)
{
	$strings_to_escape = array("&iquest;", "&Agrave;", "&Aacute;", "&Acirc;", "&Atilde;", "&Auml;", "&Aring;", "&AElig;", "&#9679;", "`", "&#8230;", "*", "'", "&#39;", "'", "&#34;", "&#8220;", "&#8211;", "&#8212;", "&macr;", "&acute;", "&cedil;", "&Ccedil;", "\n", "'", "&nbsp;");

	$string_converted = str_replace($strings_to_escape, "_", $string);
	$data = iconv('UTF-8', 'ISO-8859-1//TRANSLIT',htmlentities(mysql_real_escape_string(trim($string_converted))));

return $data;
}
  
  
function retrieve_info_withSpecialCharactersNowordLimit($string){
$data=$string;
if(strlen($data)>10000000000000)
{
		$data=substr($data,0,10000000)." ...";
		}else if($data==''){
		$data="-";
		}
		else {
		$data=$data;
		
		
		}
return $data;
}

#error
function UserError($type="java",$color="#00FF33",$msg=""){
if($type=="java"){
echo('<SCRIPT LANGUAGE="JavaScript">
<!--
	alert("$msg");
//-->
</SCRIPT>');
}
if($type=="phpecho")
	echo('<font color=$color><b>$msg</b></font>');
}


function noteMsgDefined($msg){
# bgcolor='#FFCC99'
$data ="<table cellspacing='0'  border='0' width=100% style='border-bottom-color:#CC0000; background-color:#FFCC99;'><tr><td><img src='icons/warning_icon.png'>  ".$msg."</td></tr></table>";
return $data;
}


function checkExistance($arg1,$arg2,$argument3){
$selected=array();
$selected['selected']=($arg1==$arg2)?"selected":"";
$selected['ExistsInteger']=($arg1<>$arg2)?number_format($arg1):"<center>-</center>";
$selected['ExistsString']=($arg1<>$arg2)?$arg1:noteMsgDefined("Undefined");
$selected['checked']=(strpos($arg1,$arg2) !==false)?"CHECKED":"";
return $selected[$argument3];
}

function displayValues($result,$precision=0){
$displayVar=($precision == 0)?number_format($result):number_format($result,$precision);
if($displayVar == 0){
$displayVar = "-";	
}
return $displayVar;
}


function TheFinancialYear($CurrSetYear,$CurrSetEndYear,$returnValue1){
$Financialyear=array();

for($x=intval($CurrSetYear);$x<$CurrSetEndYear;$x++){

$Financialyear[]=$x;
//$y=$Financialyear[$returnValue1];
//echo $y=$Financialyear[$returnValue1];
}
return $Financialyear[$returnValue1];
}

function get_userAthentication($find){
	/* $users=array(
	"java"=>229,
	"c"=>348,
	"php"=>267
	); */
	
	$users=array("auth"=>$_SESSION['user_id']);
	
	foreach($users as $singleUser=>$userId){
		if($singleUser==$find){
			return $userId;
			break;
		}
	}
}

function deliver_response($status,$status_message,$data){
	header("HTTP/1.1 $status $status_message");
	
	$response['status']=$status;
	$response['status_message']=$status_message;
	$response['data']=$data;
	
	$json_response=json_encode($response);
	echo $json_response;
	
	
}



?>