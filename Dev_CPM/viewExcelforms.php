<?php
require_once('connections/lib_connect.php');
require_once('filters.php');
require_once('./xajax_0.5/xajax_core/xajax.inc.php');

$xajax = new xajax();
$xajax->setFlag('debug',false);
global $sem_annual;


#==============================Form6===========
$xajax->register(XAJAX_FUNCTION,'view_excelForms');

 
function view_excelForms(){
	
$obj=new xajaxResponse();
if($_SESSION['user_id']==''){
$obj->redirect('index.php');
return $obj;
}

$id=$_SESSION['user_id'];

	/* if(empty($id)){
		$message="This functionality is currently unavailable, Contact Administrator for help.";
		$obj->assign('bodyDisplay','innerHTML',errorMsg($message));
	}else{
		$obj->redirect('http://mis.ftfcpm.com:4322/cpm/pages/home/home.xhtml?userid='.$id.'');
		
	} */
	
	if(empty($id)){
		$message="This functionality is currently unavailable, Contact Administrator for help.";
		$obj->assign('bodyDisplay','innerHTML',errorMsg($message));
	}else{
		/* $obj->redirect('http://196.10.119.130:8080/fsduganda/pages/home/home.xhtml?userid='.$id.''); */
		
		/* $obj->redirect('http://mis.ftfcpm.com:4322/demo/pages/home/home.xhtml?userid='.$id.''); */
		$obj->redirect('http://mis.ftfcpm.com:4322/cpm/pages/home/home.xhtml?userid='.$id.'');
		
	}

return $obj;
}
    


#************************************
$xajax->processRequest();
?>


<html>
	<head>
		<?php 
		$xajax->printJavascript('xajax_0.5/'); 

		?>

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
	</head>

	<body>

		<!--<div align='center' height='900' id='dvLoading'><span style='font-size:24px; margin-top:50px; font-weight:bold;'>Loading Content...</span></div>-->
		<table cellspacing='0'  width="100%" border="0" align="center" cellpadding="0" bgcolor="#F0F0F0" bordercolor="#CCCCCC" style="border-left:none; border:none; border-spacing:0px; border-style:hidden;" >
			<tr>
				<td bgcolor="#F0F0F0">
					<table cellspacing='0'  width="100%" border="0" align="center" cellpadding="0" bgcolor="#FFFFFF" bordercolor="#CCCCCC"  style="border-left:none; border:none; border-spacing:0px; border-style:hidden;" >
						<tr>
							<td bgcolor="#F0F0F0"></td>
							<td><?php require_once('connections/header.php'); ?></td>
							<td bgcolor="#f0f0f0"></td>
						</tr>
						<tr>
							<td width="12%"  bgcolor="#F0F0F0"></td>
							<td width="76%" align="left" valign="top">
								<table cellspacing='0'  width="1011" border="0" bordercolor="">
									<tr>
										<td width="20%"  align="left" valign="top">
											<table cellspacing='0'  width="100%" border="0">
												  <tr>
														<td width="10%" valign="top" style="border-spacing:0px; top:0px;p">
															<?php require_once('connections/left_links.php'); ?>
														</td>
												  </tr>
											</table>
										</td>
										<td width="80%" align="left" valign="top" style="text-align:justify; top:0px; ">
											<table cellspacing='0'  width="100%" border="0">
												<tr>
													<td width="10%" valign="top" style="border-spacing:0px; top:0px;p">
														<div id="title">
														<?php title($_GET['linkvar'],$_GET['action']); ?>
														</div>
														<div id="bodyDisplay" align="left">
															<script language="JavaScript" type="text/javascript">
															<?php  $linkvar=$_GET['linkvar'];
															switch($linkvar){
															case"Upload Excel Forms":
															?>

															xajax_view_excelForms();
															<?php
															break; 
															default: 
															?>
															<?php } 
															?>
															</script>
														</div>
													 </td>
												</tr>
											</table>
										</td>
									</tr>
								</table>
							</td>
							<td width="12%" bgcolor="#f0f0f0">&nbsp;</td>
						</tr>
						<tr>
							<td height="38" bgcolor="#F0F0F0">&nbsp;</td>
							<td height="38"><?php require_once('connections/footer.php'); ?></td>
							<td height="38" bgcolor="#f0f0f0">&nbsp;</td>
						</tr>
					</table>
				</td>
			</tr>
		</table>
		<iframe name="gToday:normal:agenda.js" id="gToday:normal:agenda.js" src="WeekPicker/ipopeng.htm" style="visibility: visible; z-index: 700; position: absolute; top: -500px; left: -700px;" frameborder="0" height="178" scrolling="no" width="199"></iframe>
	</body>
</html>

