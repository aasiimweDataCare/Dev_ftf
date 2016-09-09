<?php


/*************************
#Main Class
**************************/
class paging{
#query string variable
var $statement;
public $data;
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

# error on line no
function http($line){
$data="Http Error code $line because,".mysql_error();
return $data;
}


#error type
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



function audit_trail($unique_column,$table_pk_id,$Query_executed,$Table_affected,$changed_from,$changed_to){

$sql="insert into tbl_programme_log (`user_id`,`unique_column`,`table_pk_id`,`Query_executed`,`Table_affected`,`Changed_from`, `Changed_to`, `filename`)
  values('".$_SESSION['username']."','".$unique_column."','".$table_pk_id."','".mysql_real_escape_string($Query_executed)."','".$Table_affected."','".$changed_from."','".$changed_to."','".$_SERVER['SCRIPT_FILENAME']."')";
#$obj->addAlert($sql);
@mysql_query($sql) or die(http(506));
 
  
  
  }
  
 

function delete_data($code,$unique_column,$tbl_name,$file_name){

#$del=mysql_query("delete from ".$tbl_name." where ".$unique_column."='".$code."'")or die("Error...on line 006".mysql_error());
$SQL="update ".$tbl_name." set DISPLAY='NO'  where ".$unique_column."='".$code."'";
$del=mysql_query($SQL)or die("Error...on line 006".mysql_error());
if($del){
echo"<font color='red'>Data Deleted!</font>";
echo "<meta http-equiv=Refresh content=3;url=$file_name.php>";
}else
echo"<font color='red'>Error...could not delete Data!</font>";
}

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



function Execute($query){
		mysql_query($query);
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




#end of class paging


}




 ?>
