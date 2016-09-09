<?php
$Today=date('Y-m-d');
$DateSubmissionDay=date('l',strtotime($DateSubmission));
$dateCompared=$DateSubmission;

//$activeQuarter=$_SESSION['quarter'];
$thisYear=date('Y');
$nextYear=$thisYear+1;
$activeQuarter=str_replace("".$thisYear."","","".$_SESSION['quarter']."");

//$obj->alert($activeQuarter);


    if($activeQuarter==('Oct-Mar')){
    
    //$quater1='Oct-Mar';
    //
    //$var1=str_replace("-Mar","","$quater1");
    //$var2=str_replace("Oct-","","$quater1");
    //
    //$date_start = strtotime(''.$var1.' '.$thisYear.'');
    //$date_end = strtotime(''.$var2.' '.$nextYear.'');
    //
    //$startDate=date('Y-m-d', $date_start);
    //$endDate=date('Y-m-t', $date_end);
    
    
    $query=mysql_query("select * from tbl_active where status like 'Open%'")or die(http(28));
		$row=mysql_fetch_array($query);
                $endDate=$row['doentry'];
                $startDate=$row['startDate'];
    
    }
    
    else{
    
    //$quater2='Apr-Sep';
    //
    //$var1=str_replace("-Sep","","$quater2");
    //$var2=str_replace("Apr-","","$quater2");
    //
    //$date_start = strtotime(''.$var1.' '.$thisYear.'');
    //$date_end = strtotime(''.$var2.' '.$thisYear.'');
    //
    //$startDate=date('Y-m-d', $date_start);
    //$endDate=date('Y-m-t', $date_end);
    
    $query=mysql_query("select * from tbl_active where status like 'Open%'")or die(http(48));
		$row=mysql_fetch_array($query);
                $endDate=$row['doentry'];
                $startDate=$row['startDate'];
    
    }
  
 
 
?>