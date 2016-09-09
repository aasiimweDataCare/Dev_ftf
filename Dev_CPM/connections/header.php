<?php  session_start(); ?>
<html lang='en' xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta charset="utf-8">
	<meta name="author" content="Data Care (U) Ltd">
	<meta name="keywords" content="Data Care Data Care (U) Ltd">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	
    <!--<meta name="msapplication-config" content="http://mis.ftfcpm:82/assets/xml/browserconfig.xml"/>
    <link rel="shortcut icon" href="http://mis.ftfcpm:82/assets/icons/favicon.ico">
    <link rel="icon" href="http://mis.ftfcpm:82/assets/images/favicon.png">-->
	
	<meta name="msapplication-config" content="http://mis.ftfcpm.com:9000/assets/xml/browserconfig.xml"/>
    <link rel="shortcut icon" href="http://mis.ftfcpm.com:9000/assets/icons/favicon.ico">
    <link rel="icon" href="http://mis.ftfcpm.com:9000/assets/images/favicon.png">
	
	
	<!--<meta name="msapplication-config" content="http://mis.ftfcpm.com:9000/demo/assets/xml/browserconfig.xml"/>
    <link rel="shortcut icon" href="http://mis.ftfcpm.com:9000/demo/assets/icons/favicon.ico">
    <link rel="icon" href="http://mis.ftfcpm.com:9000/demo/assets/images/favicon.png">-->
	
    <link href="../css/nta.css" media="all" rel="stylesheet" type="text/css">
    <title>CPMA-MIS: Home</title>
    
	
	<link href="css/style.css" rel="stylesheet" type="text/css" />
	<link href='css/dash_style.css' rel='stylesheet' type='text/css' />
</head>
<script type="text/javascript">
	function startTime(){
		var today=new Date();
		var h=today.getHours();
		var m=today.getMinutes();
		var s=today.getSeconds();
		m=checkTime(m);
		s=checkTime(s);
		document.getElementById('txt').innerHTML=h+":"+m+":"+s;
		t=setTimeout('startTime()',500);
	}

	function checkTime(i){
		if (i<10)
		  {
		  i="0" + i;
		  }
		return i;
	}
	
	function toggleMenuDispaly() {
   //console.log("Here:"+div);
    $(".sd-menu-container").toggle( "slow", function() {
    // Animation complete.
  });
}
</script>
</head>

<body onLoad="startTime()">
	<table width="100%" border="0" align="center" bordercolor="" bgcolor="">
		<tr>
			<td bgcolor="#FFFFFF"><img name="head" src="images/header2.gif" width="900px" height="120" border="0" id="head" alt="CPM header image" style='margin-left: 0px;' /></td>
		</tr>
	  
		<tr>
			<td width="100%" height="18" align="left" valign="top" class='evenrow' style="background-color: #5AC5CE;">
				<table width="801" border="0" align="left">
				<tr >
					<td width="420" height="38">
					<?php 
						$data="
							<table border='0' width='100%' class=''>
								<tr>
									
									<td width='300' height='100%' style='background-color:#04285D;color:#FFFFFF;text-align: center;'>
									<a  style='background-color:#04285D;color:#FFFFFF;display: block;' href='#' onClick='toggleMenuDispaly()' >
									<div>Vertical Menu</div></a>

									</td>

									<td width='100' CLASS='black2'><b>Welcome:</b></td>
									<td width='250' align='left' >".$_SESSION['name']."</td>
									<td width='150' CLASS='black2'><b>Reporting Period:</b></td>
									<td align='left' width='250'>".$_SESSION['quarter']."</td>
								</tr>
							</table>
						"; 
						print $data; 
					?>
					</td>
					
					<td width="179">
						<div align="right" class="white">
							<?php 
								$date_fn=date_default_timezone_set("Etc/GMT-3");
								print substr(date('l'),0,3).", ".date('d')."&nbsp;".substr(date('F'),0,3)."&nbsp;".date('Y');
							?>
						</div>
					</td>
					
					<td width="67">
						<div id="txt" class='white'>
							<script language="javascript" type="text/javascript" >startTime();</script>
						</div>
					</td>
					
					<td width="52">
						<div align="right">
							<a href="http://localhost:82/dev_ftf/index.php/DashboardController/index#" class="white">Home </a>
							<!--<a href="http://mis.ftfcpm.com:9000/index.php/DashboardController/index#" class="white">Home </a>-->
							<!--<a href="http://mis.ftfcpm.com:9000/demo/index.php/DashboardController/index#" class="white">Home </a>-->
							
						</div>
					</td>
					  
					<td width="42">
						<div align="right">
							<a href="#" class="white">Help</a>
						</div>
					</td>
					<td width="49">
						<div align="right" class="redhdrs">
							<a accesskey="0" href="./logout.php">Logout</a>
						</div>
					</td>
						
				</tr>
				</table>
			</td>
		</tr>
	</table>

