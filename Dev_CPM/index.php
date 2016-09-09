<?php
session_start();


require_once('connections/lib_connect.php');
require_once('./xajax_0.5/xajax_core/xajax.inc.php');



$xajax = new xajax();
$xajax->setFlag('debug',false);
#*************************************
$xajax->register(XAJAX_FUNCTION,'home');
$xajax->register(XAJAX_FUNCTION,'view_relatedLinks');

#************************************


function home($data=''){
$obj=new xajaxResponse();
if($_SESSION['user_id']==''){
$obj->redirect('index.php');
return $obj;
} 

$data.="<img src='images/map.png' width='90%' height='25%' />";

/* $data.="<div id=\"container\"></div><center>"; */
 
 $data.="<p align='justify' class='black'>Smallholder farmers dominate Uganda&#8217;s agriculture sector,
 producing more than 70 percent of marketed output.In 2010-11, exports of primary agricultural commodities contributed 44 percent of Uganda&#8217;s formal export earnings.
 Agricultural exports, particularly maize  and  beans  continue to be dominated by small volumes of poor-quality produce.
 In coffee, small-scale producers with less than 3 hectares of land produce about 90 percent of the crop.";
 $data.="</p>";
 
 $data.="<p align='justify' class='black'>USAID/Uganda Feed the Future Commodity Production and Marketing Activity
is part of USAID/Uganda&#8217;s Feed the Future Value Chain Development Project  that  builds  on  more  than  20  years
of agricultural  development  experience  and  lessons  learned  by USAID/Uganda,  Ugandan  partners,  and  other  donors.
The Activity interventions are directly aligned with the 2010/11- 2014/15 Ministry of Agriculture, Animal Industry and Fisheries&#8217; Development
Strategy and Investment Plan and will foster Uganda&#8217;s agricultural industry to sustainably increase production and marketing of high-quality
maize, beans, and coffee in the 34 focus districts.";
$data.="</p>";
 
$data.="<p align='justify' class='black'>Through energizing win-win partnerships  and/or  collaborations
with other  Feed  the  Future  activities  (Agricultural  Inputs, Enabling Environment for Agriculture,
Agricultural  Research and Technology and,  Production  for  Improved  Nutrition)  the  Activity  will
engage private sector entities to demonstrate to smallholder farmers self-sustaining  innovations,  technologies  and  proven
practices  that  can effectively increase agriculture growth,  improve livelihoods  and
thus reduce poverty among small holder farmers including women.";
$data.="</p>";
			
$obj->assign('bodyDisplay','innerHTML',$data);
return $obj;
}

#************************************
$xajax->processRequest();

  ?>


<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php $xajax->printJavascript('xajax_0.5/'); ?>
	<link href="../css/nta.css" media="all" rel="stylesheet" type="text/css">
<link href="css/style.css" rel="stylesheet" type="text/css" />
<title><?php heading($_GET['action']); ?></title>
<script src="../himapsUG/js/jquery-1.11.0.js"></script>
<link rel="stylesheet" href="../himapsUG/css/map_style.css" type="text/css" />
</head>

<body>

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
			<div id="bodyDisplay"> <script language='javascript' type='text/javascript'> 
				 <?php if($_GET['linkvar']=="Related Links"){ ?>
				 xajax_view_relatedLinks();
				 
				 <?php }else if($_GET['linkvar']=="home"){ ?> 
				 //xajax_test();
				xajax_home();
				 
				 <?php 
				} else if($_GET['linkvar']=="Dashboard"){ ?> 
					xajax_dashboard('59255','');
				 //dashboardProjects('');
				 
				 <?php }else{
				 ?>
			xajax_home();
				//xajax_test(); 
				<?php  }   ?>
                  </script>
    </div>
    </td>
  </tr>
  <tr>
    <td colspan="2" valign="top"><?php require_once('connections/footer.php'); ?></td>
    </tr>
</table>

</td>
  </tr>
</table>

</div>
</body>

<script type="text/javascript" src="js/check.js" language="javascript"></script>
<!--<script type="text/javascript" src="js/popup.js" language="javascript"></script>-->
<script src="../himapsUG/js/highmaps.js"></script>
<script src="../himapsUG/js/exporting.js"></script>
<script src="../himapsUG/js/ug-all.js"></script>
<script src="../himapsUG/js/map_js.js" ></script>
</html>

