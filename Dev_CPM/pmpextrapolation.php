<?php
session_start();
require_once('connections/lib_connect.php');




require_once('./xajax_0.5/xajax_core/xajax.inc.php');
require_once('filters.php');


$xajax = new xajax();
$xajax->setFlag('debug',false);

#registering functions
#************************
$xajax->register(XAJAX_FUNCTION,'view_extrapolation');
$xajax->register(XAJAX_FUNCTION,'new_extrapolation');
$xajax->register(XAJAX_FUNCTION,'save_extrapolation');
$xajax->register(XAJAX_FUNCTION,'edit_extrapolation');
$xajax->register(XAJAX_FUNCTION,'update_extrapolation');
$xajax->register(XAJAX_FUNCTION,'delete_extrapolation');



#************************************************
require_once('edit.php');
require_once('save.php');
require_once('delete.php');




 
 
 
 
function view_extrapolation($cur_page=1,$records_per_page=20){
$obj=new xajaxResponse();
if($_SESSION['user_id']==''){
$obj->redirect('index.php');
return $obj;
}

$n=1;
$inc=1;
$_SESSION['cur_page']=$cur_page;
$_SESSION['records_per_page']=$records_per_page;



$data.="<form  name='extrapolation' id='extrapolation' method='post' action='".$PHP_SELF."'>";
$data.="<table width='100%' border='0' cellspacing='1' cellpadding='1'>";

        $data.="<tr class='evenrow'>";
            $data.="<td colspan=6 align='right'>
                        <input name='new_extrapolation' type='button' class='formButton2' value='New Entry' onclick=\"xajax_new_extrapolation('','','','','','','');\">
                  </td>";
        $data.="</tr>";

    $data.="<tr class='evenrow3'><td colspan='22'>";
            $data.="<table border='0' width='100%' cellspacing='1' cellpadding='1'>
                <tr class='evenrow'><th colspan='22'><div align='center'>EXTRAPOLATION FACTOR DETAILS</div></th></tr>";
                  
				  $data.="<tr>
								<td class='offwhite' COLSPAN='11' align='left'><input type='button' class='formButton2'title='Edit'   onclick=\"xajax_edit_extrapolation(xajax.getFormValues('vAgent'));return false;\" value='edit' /> ";
								$data.=" <input type='button' value='Delete' class='red' onclick=\"ConfirmDelete(xajax.getFormValues('vAgent'),'delete_extrapolation');return false;\" align='left'></td>";
								$data.="</td>";
					$data.="</tr>";	
                    
                  //===================data to be displayed=====================
				  $data.="<tr class=''>";
							$data.="<td colspan=8>";
						$data.="<table border='0' class='hoverTable' width='100%'>";
									$data.="<tr>";
										  $data.="<th>Check All<br/><input type='checkbox' id='check_all' /></th>";
										  $data.="<th>Entered By</th>";
										  $data.="<th>Last Updated By</th>";
										  $data.="<th>Extrapolation Factor</th>";
										  $data.="<th>Financial Year</th>";
										  $data.="<th>Action</th>";
										  $data.="</tr>";
                  
                  
                  $query_string="select p.*,u.* from `tbl_pmpextrapolation` as p join tbl_user as `u` on (`u`.`user_id` = `p`.`enteredby`)  order by p.financialYear asc";
                  
                  
                                 
                           $count=1;
                           $query_=mysql_query($query_string)or die(http(__line__));
                            /**************
                            *paging parameters
                            *
                            ****/
                            $max_records = mysql_num_rows($query_);
                            $num_pages=ceil($max_records/$records_per_page);
                            $offset = ($cur_page-1)*$records_per_page;
                            $count=$offset+1;
                            $new_query=mysql_query($query_string." limit ".$offset.",".$records_per_page) or die(http(112));
                            //noRecordsFound($query,$colspan)
                            $x=1;
                            while($rowXtrapolation=mysql_fetch_array($new_query)){
                                $color=$count%2==1?"evenrow3":"evenrow";
                            $data.="<tr class='alternating_rows'>";
                            $data.="<td>".$inc.".";
                            $data.="<input type='checkbox'  name='pk_id[]' id='pk_id".$count."' value='".$rowXtrapolation['pk_id']."' />";
                            $data.="<input name='loopkey[]' id='loopkey".$count."' type='hidden' value='1'/>";
                            $data.="</td>";
							$data.="<td>".strtoupper(retrieve_info_withSpecialCharactersNowordLimit($rowXtrapolation['name']))."</td>";
							//Pick the current username
							$stUser="select * from `tbl_user` where `user_id`='".$rowXtrapolation['updatedby']."'";
							$queryU=Execute($stUser) or die(http("proportionOfFemales-275"));
							$rowU=FetchRecords($queryU);
							$entredby=$rowU['name'];
							$data.="<td>".strtoupper(retrieve_info_withSpecialCharactersNowordLimit($entredby))."</td>";
                            $data.="<td align='right'>".strtoupper(retrieve_info_withSpecialCharactersNowordLimit($rowXtrapolation['extrapolationFactor']))."</td>";
                            $data.="<td align='right'>".strtoupper(retrieve_info_withSpecialCharactersNowordLimit($rowXtrapolation['financialYear']))."</td>";
							$data.="<td><input type='button' class='formButton2' TITLE='Edit' onclick=\"xajax_edit_extrapolation(xajax.getFormValues('extrapolation'));return false;\" value='edit' /></td>";
                            $data.="</tr>";
							$inc++;
                                     }
                                     $data.="".noRecordsFound($new_query,10)."";
						 $data.="</table></td></tr>";
                                     
                        //====================end of displayed data===================
						$data.="<tr>
								<td class='offwhite' COLSPAN='11' align='left'><input type='button' class='formButton2'title='Edit'   onclick=\"xajax_edit_extrapolation(xajax.getFormValues('extrapolation'));return false;\" value='edit' /> ";
								$data.=" <input type='button' value='Delete' class='red' onclick=\"ConfirmDelete(xajax.getFormValues('extrapolation'),'delete_extrapolation');return false;\" align='left'></td>";
								$data.="</td>";
						$data.="</tr>";					
                                     
                
/*
*display pages
*/
$data.="<tr align='right'><td colspan=20>";

$p='';
$num_links=10;
$startAt_links=($cur_page-5);
$endAt_links=($cur_page+$num_links);
$cur_link=$cur_page;


if($num_pages>1){
$links=1;
		$append_bar=$p==$num_pages?"":"|";
	if ($cur_page==1)$data.="<a href='#' onclick=\"xajax_view_extrapolation('1','".$records_per_page."')\"><font color=red><b>1</b></font>\n</a>...".$append_bar;
	else $data.="<a href='#' onclick=\"xajax_view_extrapolation('1','".$records_per_page."')\">1\n</a>...".$append_bar;
	//for($p=2;$p<$num_pages;$p++){
	$p=2;
	while($p<$num_pages){
if(($p>$startAt_links) and ($p<$endAt_links)){
		$data.=$p==$cur_page?"<font color=red><b>".$p."</b></font>".$append_bar:"<a href='#' onclick=\"xajax_view_extrapolation('".$p."','".$records_per_page."')\">".$p."\n</a>".$append_bar;
	}
	$p++;
	}
	if($p==$num_pages){
			$data.="...<a href='#' onclick=\"xajax_view_extrapolation('".$p."','".$records_per_page."')\">".$p."\n</a>".$append_bar;
			}
}


$data.=" Records: <select name='num_rec' id='num_rec' onchange=\"xajax_view_extrapolation('".$cur_page."',this.value)\">";
	$i=1;
	$selected="";
	while($i*10<=$max_records){
		$selected=$i*10==$records_per_page?"SELECTED":"";
		$data.="<option value='".($i*10)."' ".$selected.">".($i*10)."</option>";
		$i++;
	}
	
	$sel=$records_per_page>=$max_records?"SELECTED":"";
	$data.="<option value='".$max_records."' ".$sel.">All</option>";
	$data.="</select>";
	$data.="</br></td></tr><table>";
	
	$data.="<table>";
        
   $data.="</tr>
   </table>
   </form>";
        
$obj->assign('bodyDisplay','innerHTML',$data);
$obj->call("shadeBgOnCheck"); 
$obj->call("hideLoadingDiv"); 
return $obj;


}

function  new_extrapolation($regionalCode,$districtCode,$subCounty,$village){

$obj=new xajaxResponse();

$qmobj=new QueryManager('');
//sessional values to be ratained
$_SESSION['regionalCode']=$regionalCode;
$_SESSION['districtCode']=$districtCode;
$_SESSION['subCounty']=$subCounty;
$_SESSION['village']=$village;




$data="<form  name='Xtrapolation' id='Xtrapolation' method='post' action='".$PHP_SELF."'>";
$data.="
<table width='600' border='0'>
        <tr>
            <td>";
            $data.="<table border='0' width='400' cellpadding='1' cellspacing='1'>
                <tr>
                  <th colspan='2' scope='col'>PMP EXTRAPOLATION FACTOR</th>
                  </tr>";
                
                 
                
					$data.="<tr class='evenrow'>";
						$data.="<td><strong>Financial Year:</strong><br/></td>";
						$data.="<td>";
							$data.="<select name='fyear' id ='fyear' size='1' style='width:177px;'>";
								for($yr=2013;$yr<=2018;$yr++){
									
									$selYear= substr($_SESSION['quarter'], 10) ;
									$selected=($selYear==$yr)?"selected":"";
									$data.="<option value=\"".$yr."\" ".$selected.">".$yr."</option>";
									}	
							$data.="</select>";
						$data.="</td>"; 
				   $data.="</tr>";
				   
				   $data.="<tr class='evenrow'>";
						$data.="<td><strong>Extrapolation Factor:</strong><br/></td>";
						$data.="<td>";
							$data.="<input type='text' name='xfactor' id ='xfactor' onkeypress='return numbersonly(event, false)'  style='width:177px;'>";
						$data.="</td>"; 
				   $data.="</tr>";
				  
                   
                  $data.="<tr class='evenrow'>";
						$data.="<td><strong>Entered By:</strong><br/></td>";
						$data.="<td>";
						//Pick the current username
						$stUser="select * from `tbl_user` where `user_id`='".$_SESSION['user_id']."'";
						$queryU=Execute($stUser) or die(http(__line__));
						$rowU=FetchRecords($queryU);
						$entredby=$rowU['name'];
						
							$data.="<input type='text' value='".$entredby."'  class='disabled' disabled=disabled name='enteredbyDisp' id='enteredbyDisp' style='width:177px;'  >";
							$data.="<input type='hidden' value='".$_SESSION['user_id']."'   name='enteredby' id='enteredby'>";	
						$data.="</td>"; 
				   $data.="</tr>";
				
                
              
                $data.="<tr class='evenrow'>
                  <td>&nbsp;</td>";
                  $data.="<td><input value='Save' id='saveXtrapolation' name='saveXtrapolation' onclick=\"loadingIcon(xajax.getFormValues('Xtrapolation'),'save_Xtrapolation');return false;\" type='button'></td>
                </tr>
              </table>";
              
              $data.="<div align='center' height='900' id='myLoader' style='display:none;'><span style='font-size:24px; margin-top:50px; font-weight:bold;'>Saving Data...</span></div>";
              
    $data.="</td>
        </tr>
  
</table>
</form>";


$obj->assign('bodyDisplay','innerHTML',$data);

return $obj;
}

//Save extrapolation
function save_extrapolation($formvalues){
$obj=new xajaxResponse();

$fyear=$formvalues['fyear'];
$xfactor=$formvalues['xfactor'];
$enteredby=$formvalues['enteredby'];



$stmnt_xtra="INSERT INTO `tbl_pmpextrapolation`(`extrapolationFactor`, `financialYear`, `enteredby`, `updatedby`) 
VALUES ('".$xfactor."','".$fyear."','".$enteredby."','".$enteredby."')";
	/* $obj->alert($stmnt_va);                                            */
	@mysql_query($stmnt_xtra)or die(http(__line__));
    $obj->call("hidemyLoaderDiv"); 
    $obj->assign('bodyDisplay','innerHTML',congMsg("Extrapolation factor has been added successfully!"));
    $obj->call('xajax_view_extrapolation',1,20);
return $obj;    
}

//$xajax->processRequests();
$xajax->processRequest();

  ?>


<html>
<head>
<?php $xajax->printJavascript('xajax_0.5/'); 

?>
<script language="javascript" type="text/javascript" src="js/check.js">


-->

</script>
<link href="css/style.css" rel="stylesheet" type="text/css" />
<link href="css/loading.css" rel="stylesheet" type="text/css" />
<title><?php heading($_GET['action']); ?></title>
<script type="text/javascript" src="js/number.js"></script>
<script type="text/javascript" src="js/addRow.js" language="javascript"></script>
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
<div align='center' height='900' id='dvLoading'><span style='font-size:24px; margin-top:50px; font-weight:bold;'>Loading Content...</span></div>
<table width="870" border="0" align="center" id="content_" >
  <tr>
    <td colspan="2" valign="top"><?php require_once('connections/header.php'); ?>
      </td>
        </tr>
  <tr>
    <td width="190" valign="top"><table width="190" border="0" >
      <tr>
        <td valign="top" align="left"><?php require_once('connections/left_links.php'); ?></td>
      </tr>
    </table></td>
    <td width="660" valign="top"  >
    
     <?php title($_GET['linkvar'],$_GET['action']);   ?>
    <div id="bodyDisplay">
      <script language="JavaScript" type="text/javascript">
			
			<?php 
			if(!isset($FunctionName))$FunctionName='';
                        else $FunctionName='';
                        if(!isset($Arguments))$Arguments='';
                        else $Arguments='';
			$linkvar='';
			$linkvar=$_GET['linkvar'];
			$FunctionName=$_GET['FunctionName'];
			$Arguments=$_GET['Arguments'];
			
			switch($_GET['linkvar']){
                            case "PMP Extrapolation Factor": 
                        ?>
                              xajax_view_extrapolation(1,20);
                          
                        <?php
                                  
                          break;
                          
                          default:
                                  
                               #underConstruction("Under Construction!");
                                   
                                   }
                              
                        ?>
    </script>
    </div></td>
  </tr>
  <tr>
    <td colspan="2" valign="top"><?php require_once('connections/footer.php'); ?></td>
    </tr>
</table>


</div>
<iframe name="gToday:normal:agenda.js"
        id="gToday:normal:agenda.js"
        src="WeekPicker/ipopeng.htm"
        style="visibility: visible; z-index: 700; position: absolute; top: -500px; left: -700px;"
        frameborder="0" height="178" scrolling="no" width="199"></iframe>
</body>
</html>
