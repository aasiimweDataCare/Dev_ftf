<head>
	<link rel="stylesheet" type="text/css" href="sdmenu/sdmenu.css" />
	<script type="text/javascript" src="sdmenu/sdmenu.js">
		/***********************************************
		* Slashdot Menu script- By DimX
		* Submitted to Dynamic Drive DHTML code library: http://www.dynamicdrive.com
		* Visit Dynamic Drive at http://www.dynamicdrive.com/ for full source code
		***********************************************/
	</script>
	<script type="text/javascript">
		// <![CDATA[
		var myMenu;
		window.onload = function() {
			myMenu = new SDMenu("my_menu");
			myMenu.init();
		};
		// ]]>
	</script>
</head>

<body>
	<?php
		$homeLinks='
			<a href="home.php?linkvar=home&&action=Home">Home</a>
			<a href="home.php?linkvar=Dashboard&&action=Home">DashBoard</a>
			<a href="view_programme.php?linkvar=viewProgramme&&action=Home">Programme Breakdown</a>
		';
		
		$homeLinks2='
			<a href="home.php?linkvar=home&&action=Home">Home</a>
		';

		$programMonitoringLinksg4g='
			<a href="program_monitoring.php?linkvar=Value Chain Development Quarterly Physical Actuals&&action=Program Monitoring" >  Report Log</a>
			<a href="program_monitoring.php?linkvar=Value Chain Manager&&action=Program Monitoring">Gender For Growth</a>  
			<a href="program_monitoring.php?linkvar=Targets against Actuals&&Program Monitoring"> Annual Targets against Actuals</a>
		';

		$programMonitoringManagerLinks='
			<a href="program_monitoring.php?linkvar=Value Chain Development Quarterly Physical Actuals&&action=Program Monitoring" >  Report Log</a>
			<a href="program_monitoring.php?linkvar=Value Chain Manager&&action=Program Monitoring">Value Chain Manager</a>  
			<a href="program_monitoring.php?linkvar=Targets against Actuals&&Program Monitoring"> Annual Targets against Actuals</a>
			<a href="program_monitoring.php?linkvar=DCED Annual Targets against Actuals&&Program Monitoring">DCED Annual Targets against Actuals</a>
		';

		$programMonitoringManagerLinksfsManager='
			<a href="program_monitoring.php?linkvar=Value Chain Development Quarterly Physical Actuals&&action=Program Monitoring" >  Report Log</a>
			<a href="program_monitoring.php?linkvar=Value Chain Manager&&action=Program Monitoring">Financial Services</a>  
			<a href="program_monitoring.php?linkvar=Targets against Actuals&&Program Monitoring"> Annual Targets against Actuals</a>
			<a href="program_monitoring.php?linkvar=DCED Annual Targets against Actuals&&Program Monitoring">DCED Annual Targets against Actuals</a>
		';

		$programMonitoringLinksFis='
			<a href="program_monitoring.php?linkvar=view_valueChainDevelopment" >  Financial Services</a>
		';

		$aBiTrustMonitoring='
			<a href="aBiTrust_monitoring.php?linkvar=abi Trust Results Indicators&&action=aBi Trust Monitoring">abi Trust monitoring Indicators</a>
			<a href="aBiTrust_monitoring.php?linkvar=View Result Based Indicators&&action=aBi Trust Monitoring">Results Based Indicators</a>
		';

		$narrativeLinks='
			<a href="narratives.php?linkvar=View Narrative&&action=Narratives">	Narratives</a>
		';

		$partnersInventorylinks='
			<a href="organization.php">  Organizational Details</a>
		';

		$programResultsLinks='
			<a ><b>Physical Targets vs Actuals</b></a>
			<a href="program_results.php?linkvar=Annual Physical Workplan&&action=Programme Results">Annual Physical Workplan</a>
			<a href="program_results.php?linkvar=Annual Physical Monitoring&&action=Programme Results">Annual Physical Monitoring</a>
			<a href="program_results.php?linkvar=Quartery Results&&action=Programme Results" >Quarterly Results </a>
			<a href="program_results.php?linkvar=Cummulative Results&&action=Program Results">Cummulative Results</a>
			<a ><b>DCED RESULTS</b></a>
			<a href="program_results.php?linkvar=DCED Annual Physical Monitoring&&action=Programme Results">DCED Annual Physical Monitoring</a>
			<a ><b>Financial Targets vs Actuals</b></a>
			<a href="program_results.php?linkvar=Annual Financial Workplan&&action=Programme Results">Annual Financial Workplan</a>
			<a href="program_results.php?linkvar=Annual Financial Monitoring&&action=Programme Results">Annual Financial Monitoring</a>
			<a href="program_results.php?linkvar=Quarterly Financials&&action=Programme Results">Quarterly Financials</a>
			<a href="program_results.php?linkvar=Budget Summary&&action=Programme Results">Budget Summary</a>
			<a ><b>Project Life</b></a>
			<a href="program_results.php?linkvar=Project Life Financial Targets&&action=Programme Results">Project Life Financial Targets</a>
		';

		$aBiTrustResultsLinks='
			<a href="aBiTrust_monitoring.php?linkvar=abi Trust Annual Results&&action=aBi Trust Results">abi Trust Annual Results</a>
			<a href="aBiTrust_monitoring.php?linkvar=Project Life Results&&action=aBi Trust Results">Project Life Results</a>
		';


		$planningLinks='
			<a href="workplan.php?linkvar=view_annualTarget&&action=Workplan" onClick="xajax_annualTargetselect()">Annual Targets </a>
			<a href="workplan.php?linkvar=project_life_select&&action=Workplan" onClick="xajax_project_life_select()">Project Life Targets</a>
			<a href="workplan.php?linkvar=DCED Annual Targets&&action=Workplan" >DCED Annual Targets</a>
		';

		$DCEDStandardLinks="
			<a href='#DCED Standard'><b>DCED Standard</b></a>
			<a href='interventionlist.php' >Activity</a>
			<a href='triggerlist.php' >Market Trigger</a>
			<a href='marketup.php' >Market Uptake</a>
			<a href='enterprise.php' >Enterprise Performance</a>
			<a href='sector.php'>Sector Growth</a>
			<a href='livelihood.php' >Livelihood</a>
		";

		$SetupLinks= "
			<a href='view_programme.php?linkvar=view_programme&&action=Setup' >  Programme</a>
			<a href='view_programme.php?linkvar=view_component' >  Component</a>
			<a href='view_programme.php?linkvar=view_subcomponent'> Sub-Component</a>
			<a href='view_programme.php?linkvar=view_output' > Output</a>
			<a href='view_programme.php?linkvar=view_activity'> Activity</a>
			<a href='view_programme.php?linkvar=view_subactivity'> Sub-Activity</a>
			<a href='view_programme.php?linkvar=view_indicator'>  Indicator</a>
			<a href='#DCED Standard'><b>DCED Standard</b></a>
			<a href='view_programme.php?linkvar=view_subsector'>  Sub-sector</a>
			<a href='view_programme.php?linkvar=view_intervention'>  Intervention</a>
			<a href='#others'><b>Others</b></a>
			<a href='setup.php?linkvar=Reporting Period&&action=Setup' />  Reporting Period</a>
			<a href='setup.php?linkvar=Change Pasword&&action=Setup' />  Change Password</a>
		";

		$SetupLinks2="<a href='#others'><b>Others</b></a>
			<a href='setup.php?linkvar=View District&&action=Setup'> New District </a>
			<a href='setup.php?linkvar=Database Backup&&action=Setup'> Database Backup Log </a>
			<a href='Setup.php?linkvar=User Group&&action=Setup'>  User Group</a>
			<a href='Setup.php?linkvar=User Role&&action=Setup'>  User Role</a>
			<a href='Setup.php?linkvar=View users&&action=Setup'>  New User?</a>
			<a href='setup.php?linkvar=System Logins&&action=Setup'>  System Logins</a>
			<a href='setup.php?linkvar=New Link&&action=Setup'>  Related Links</a>
			<a href='setup.php?linkvar=New Document&&action=Setup'>  New Document</a>
			<a href='setup.php?linkvar=Home&&action=Setup'>  Home</a>
			<a href='setup.php?linkvar=Change Pasword&&action=Setup' />  Change Password</a>
			<a href='audit_trail.php'>  Audit Trail</a>  
		";

		$SetupLinks3= "
			<a href='#DCED Standard'><b>DCED Standard</b></a>
			<a href='view_programme.php?linkvar=view_intervention'>  Intervention</a>
			<a href='view_programme.php?linkvar=view_indicator'>  Indicator</a>  
			<a href='setup.php?linkvar=New Document&&action=Setup'>  New Document</a>     
			<a href='setup.php?linkvar=Change Pasword&&action=Setup' />  Change Password</a> 
		";

		$related_links="<a href='home.php?linkvar=Related Links&&action=Links'>Related Links</a>";

		$concepts='
			<a href="z_cNote.php?linkvar=Concept Note Advert&&action=Concepts">Concept Note Advert</a>
			<a href="z_cRegi.php?linkvar=Concepts Register&&action=Concepts">Concepts Register</a>
			<a href="z_cAEv.php?linkvar=Assign Evaluators&&action=Concepts">Assign Evaluators</a>
			<a href="z_cRER.php?linkvar=Register Evaluation Results&&action=Concepts">Register Evaluation Results</a>
		';

		$proposals='
			<a href="z_pPNot.php?linkvar=Proposal Notification&&action=Proposals">Proposal Notification</a>
			<a href="z_pRegi.php?linkvar=Proposals Register&&action=Proposals">Proposals Register</a>
			<a href="z_pAEv.php?linkvar=Assign Evaluators&&action=Proposals">Assign Evaluators</a>
			<a href="z_pGCM.php?linkvar=Grants Committee Meeting Minutes&&action=Proposals">Meeting Minutes</a>
			<a href="z_pRER.php?linkvar=Register Evaluation Results&&action=Proposals">Register Evaluation Results</a>
		';#<a href="z_pNote.php?linkvar=RFP Notification&&action=Proposals">RFP Notification</a> removed after Proposals Notification

		$projects='
			<a href="z_cona.php?linkvar=Contracts Acceptance&&action=Projects/Contracts">Contract Acceptance</a>
			<a href="z_cont.php?linkvar=Contracts Register&&action=Projects/Contracts">Contracts Register</a>
			<a href="z_disb.php?linkvar=Disbursements&&action=Projects/Contracts">Disbursements</a>
		';

		$gmmReports='
		<a href="z_project_results.php?linkvar=Concept Note Advert&&action=Reports/Analysis">Concept Note Advert</a>
			<a href="z_project_results.php?linkvar=Concept Register Analysis&&action=Reports/Analysis">Concepts Analysis</a>
			<a href="z_project_results.php?linkvar=Proposals Analysis&&action=Reports/Analysis">Proposals Analysis</a>
			<a href="z_project_results.php?linkvar=Contracts Analysis&&action=Reports/Analysis">Contracts Analysis</a>
			<a href="z_project_results.php?linkvar=Financial Disbursements and Liquidation&&action=Reports/Analysis">Disbursement & Liquidation</a>
			<a href="z_project_results.php?linkvar=Project Summary&&action=Reports/Analysis">Projects Summary</a>
			<a href="z_project_results.php?linkvar=Disbursement Plan by Project&&action=Reports/Analysis">Disbursement Plan by Project</a>
			<a href="z_project_results.php?linkvar=Funds Leveraged&&action=Reports/Analysis">Funds Leveraged</a>
		';
	
		if($_SESSION['role']=='Chief Technical Advisor'){ ?>
		<div style="float: left" id="my_menu" class="sdmenu">
			<div class="collapsed">
				<span  style='color: #FFFF99;'>Home</span>
				<?php echo $homeLinks; ?>
			</div>
			<div class="collapsed">
				<span  style='color: #FFFF99;'>DashBoard</span>
				<a href="home.php?linkvar=Dashboard&&action=Home">DashBoard</a>
			</div> 
			<div class="collapsed">
				<span  style='color: #FFFF99;'>Narratives</span>
				<?php  echo $narrativeLinks ;?>
			</div>
			<div class="collapsed">
				<span  style='color:#FFFF99;'>Partners Inventory</span>
				<?php echo $partnersInventorylinks ; ?>
			</div>
			<div class="collapsed">
				<span  style='color: #FFFF99;'>Program Results</span>
				<?php echo $programResultsLinks ; ?>
			</div>   
			<div class="collapsed">
				<span  style='color: #FFFF99;'>aBi Trust Results</span>
				<?php echo $aBiTrustResultsLinks ; ?>
			</div>
				<div class="collapsed"> 
				<span  style='color: #FFFF99;'>Setup</span>
				<a href='setup.php?linkvar=Change Pasword&&action=Setup' />  Change Password</a> 
			</div>
			<div class="collapsed">
				<span  style='color: #FFFF99;'>Documents</span>
				<a href='setup.php?linkvar=view_documents'>Documents </a>
			</div>
			<div class="collapsed">
				<span  style='color: #FFFF99;'>Help</span>
				<a href='setup.php?linkvar=Frequently Asked Questions&&action=Setup'>  Frequently Asked Questions</a>
				<a href='setup.php?linkvar=Send Mail&&action=Help'>  Send E-Mail</a>
				<a href='setup.php?linkvar=User Comments&&action=Help'>User comments</a> 
			</div>
			<div class="collapsed">
				<span style='color:#FFFF99;'>Related links</span>
				<?php echo $related_links;?> 
			</div>
			<div class="collapsed">
				<span style='color:red;'>EXIT</span>
				<a accesskey="0" href="logout.php?" onClick="return confirm('Are you sure you wish to logout?')">Logout</a>
			</div>
		</div>
		<?php 
		}
		if($_SESSION['role']=='Managing Director'){ ?>
		<div style="float: left" id="my_menu" class="sdmenu">
			<div class="collapsed">
				<span  style='color: #FFFF99;'>Home</span>
				<?php echo $homeLinks; ?>
			</div>
			<div class="collapsed">
				<span  style='color: #FFFF99;'>DashBoard</span>
				<a href="home.php?linkvar=Dashboard&&action=Home">DashBoard</a>
			</div> 
			<div class="collapsed">
				<span  style='color: #FFFF99;'>Narratives</span>
				<?php  echo $narrativeLinks ;?>
			</div>   
			<div class="collapsed">
				<span  style='color:#FFFF99;'>Partners Inventory</span>
				<?php echo $partnersInventorylinks ; ?>
			</div>
			<div class="collapsed">
				<span  style='color: #FFFF99;'>Program Results</span>
				<?php echo $programResultsLinks ; ?>
			</div>   
			<div class="collapsed">
				<span  style='color: #FFFF99;'>aBi Trust Results</span>
				<?php echo $aBiTrustResultsLinks ; ?>
			</div> 
			<div class="collapsed"> 
				<span  style='color: #FFFF99;'>Setup</span>
				<a href='setup.php?linkvar=Change Pasword&&action=Setup' />  Change Password</a> 
			</div>
			<div class="collapsed">
				<span  style='color: #FFFF99;'>Documents</span>
				<a href='setup.php?linkvar=view_documents'>Documents </a>
			</div>
			<div class="collapsed">
				<span  style='color: #FFFF99;'>Help</span>
				<a href='setup.php?linkvar=Frequently Asked Questions&&action=Setup'>  Frequently Asked Questions</a>
				<a href='setup.php?linkvar=Send Mail&&action=Help'>  Send E-Mail</a>
				<a href='setup.php?linkvar=User Comments&&action=Help'>User comments</a> 
			</div>
			<div class="collapsed">
				<span style='color:#FFFF99;'>Related links</span>
				<?php echo $related_links;?> 
			</div>
			<div class="collapsed">
				<span style='color:red;'>EXIT</span>
				<a accesskey="0" href="logout.php?" onClick="return confirm('Are you sure you wish to logout?')">Logout</a>
			</div>
		</div>
		<?php
		} 
		else if($_SESSION['role']=='Systems Administrator'){ ?>
		<div style="float: left" id="my_menu" class="sdmenu">
			<div class="collapsed">
				<span  style='color: #FFFF99;'>Home</span>
				<?php echo $homeLinks; ?>
			</div>
			<div class="collapsed">
				<span  style='color: #FFFF99;'>Setup</span>
				<?php
					echo $SetupLinks2;
				?>
			</div>   
			<div class="collapsed">
				<span  style='color: #FFFF99;'>Documents</span>
				<a href='setup.php?linkvar=view_documents'>Documents </a>
			</div>
			<div class="collapsed">
				<span  style='color: #FFFF99;'>Help</span>
				<a href='setup.php?linkvar=Frequently Asked Questions&&action=Setup'>  Frequently Asked Questions</a>
				<a href='setup.php?linkvar=Send Mail&&action=Help'>  Send E-Mail</a>
				<a href='setup.php?linkvar=User Comments&&action=Help'>User comments</a> 
			</div>
			<div class="collapsed">
				<span style='color:#FFFF99;'>Related links</span>
				<?php echo $related_links;?> 
			</div>
			<div class="collapsed">
				<span style='color:red;'>EXIT</span>
				<a accesskey="0" href="logout.php?" onClick="return confirm('Are you sure you wish to logout?')">Logout</a>
			</div>
		</div>
		<?php
		}
		else if($_SESSION['role']=='Financial Institution'){?>
		<div style="float: left" id="my_menu" class="sdmenu">
			<div class="collapsed">
				<span  style='color: #FFFF99;'>Home</span>
				<?php echo $homeLinks; ?>
			</div>
			<div class="collapsed">
				<span  style='color: #FFFF99;'>Program Monitoring</span>
				<?php echo "<a href='program_monitoring.php?linkvar=Quarterly Reporting&&action=Program Monitoring&&org_code=".$_SESSION['org_code']."&&orgName=".$_SESSION['orgName']."' >  Financial Services</a>"; ?>
			</div>
			<div class="collapsed">
				<span  style='color: #FFFF99;'>Narratives</span>
				<?php  echo $narrativeLinks ;?>
			</div>
			<div class="collapsed"> 
				<span  style='color: #FFFF99;'>Setup</span>
				<a href='setup.php?linkvar=Change Pasword&&action=Setup' />  Change Password</a> 
			</div>
			<div class="collapsed">
				<span  style='color: #FFFF99;'>Documents</span>
				<a href='setup.php?linkvar=view_documents'>Documents </a>
			</div>
				<div class="collapsed">
				<span  style='color: #FFFF99;'>Help</span>
				<a href='setup.php?linkvar=Frequently Asked Questions&&action=Setup'>  Frequently Asked Questions</a>
				<a href='setup.php?linkvar=Send Mail&&action=Help'>  Send E-Mail</a>
				<a href='setup.php?linkvar=User Comments&&action=Help'>User comments</a> 
			</div>
			<div class="collapsed">
				<span style='color:#FFFF99;'>Related links</span>
				<?php echo $related_links;?>
			</div>
			<div class="collapsed">
				<span style='color:red;'>EXIT</span>
				<a accesskey="0" href="logout.php?" onClick="return confirm('Are you sure you wish to logout?')">Logout</a>
			</div>
		</div>
		<?php
		}
		else if(($_SESSION['role']=='Farmers Organization') and  ($_SESSION['titlesubcomponent']=='Value Chain Development')){?>
		<div style="float: left" id="my_menu" class="sdmenu">
			<div class="collapsed">
				<span  style='color: #FFFF99;'>Home</span>
				<?php echo $homeLinks; ?>
			</div>
			<div class="collapsed">
				<span  style='color: #FFFF99;'>Program Monitoring</span>
				<?php echo "<a href='program_monitoring.php?linkvar=Quarterly Reporting&&action=Program Monitoring&&org_code=".$_SESSION['org_code']."&&orgName=".$_SESSION['orgName']."' >  Value Chain Development </a>"; ?>
			</div>
			<div class="collapsed">
				<span  style='color: #FFFF99;'>Narratives</span>
				<?php  echo $narrativeLinks ;?>
			</div>
			<div class="collapsed"> 
				<span  style='color: #FFFF99;'>Setup</span>
				<a href='setup.php?linkvar=Change Pasword&&action=Setup' />  Change Password</a> 
			</div>
			<div class="collapsed">
				<span  style='color: #FFFF99;'>Documents</span>
				<a href='setup.php?linkvar=view_documents'>Documents </a>
			</div>
			<div class="collapsed">
				<span  style='color: #FFFF99;'>Help</span>
				<a href='setup.php?linkvar=Frequently Asked Questions&&action=Setup'>  Frequently Asked Questions</a>
				<a href='setup.php?linkvar=Send Mail&&action=Help'>  Send E-Mail</a>
				<a href='setup.php?linkvar=User Comments&&action=Help'>User comments</a> 
			</div>
			<div class="collapsed">
				<span style='color:#FFFF99;'>Related links</span>
				<?php echo $related_links;?> 
			</div>
			<div class="collapsed">
				<span style='color:red;'>EXIT</span>
				<a accesskey="0" href="logout.php?" onClick="return confirm('Are you sure you wish to logout?')">Logout</a>
			</div>
		</div>
		<?php
		}
		else if(($_SESSION['role']=='Farmers Organization') and  ($_SESSION['titlesubcomponent']=='Gender For Growth (G4G) Fund')){?>
		<div style="float: left" id="my_menu" class="sdmenu">
			<div class="collapsed">
				<span  style='color: #FFFF99;'>Home</span>
				<?php echo $homeLinks; ?>
			</div>
			<div class="collapsed">
				<span  style='color: #FFFF99;'>Program Monitoring</span>
				<?php echo "<a href='program_monitoring.php?linkvar=Quarterly Reporting&&action=Program Monitoring&&org_code=".$_SESSION['org_code']."&&orgName=".$_SESSION['orgName']."' >  Gender For Growth</a>"; ?>
			</div>
			<div class="collapsed">
				<span  style='color: #FFFF99;'>Narratives</span>
				<?php  echo $narrativeLinks ;?>
			</div>  
			<div class="collapsed"> 
				<span  style='color: #FFFF99;'>Setup</span>
				<a href='setup.php?linkvar=Change Pasword&&action=Setup' />  Change Password</a> 
			</div>
			<div class="collapsed">
				<span  style='color: #FFFF99;'>Documents</span>
				<a href='setup.php?linkvar=view_documents'>Documents </a>
			</div>
			<div class="collapsed">
				<span  style='color: #FFFF99;'>Help</span>
				<a href='setup.php?linkvar=Frequently Asked Questions&&action=Setup'>  Frequently Asked Questions</a>
				<a href='setup.php?linkvar=Send Mail&&action=Help'>  Send E-Mail</a>
				<a href='setup.php?linkvar=User Comments&&action=Help'>User comments</a> 
			</div>
			<div class="collapsed">
				<span style='color:#FFFF99;'>Related links</span>
				<?php echo $related_links;?>
			</div>
			<div class="collapsed">
				<span style='color:red;'>EXIT</span>
				<a accesskey="0" href="logout.php?" onClick="return confirm('Are you sure you wish to logout?')">Logout</a>
			</div>
		</div>
		<?php
		}
		else if(($_SESSION['role']=='Farmers Organization') and  ($_SESSION['titlesubcomponent']=='Gender For Growth (G4G) Fund')){?>
		<div style="float: left" id="my_menu" class="sdmenu">
			<div class="collapsed">
				<span  style='color: #FFFF99;'>Home</span>
				<?php echo $homeLinks; ?>
			</div>
			<div class="collapsed">
				<span  style='color: #FFFF99;'>Program Monitoring</span>
				<?php echo "<a href='program_monitoring.php?linkvar=Quarterly Reporting&&action=Program Monitoring&&org_code=".$_SESSION['org_code']."&&orgName=".$_SESSION['orgName']."' >  Value Chain Development</a>"; ?>
			</div>
			<div class="collapsed">
				<span  style='color: #FFFF99;'>Narratives</span>
				<?php  echo $narrativeLinks ;?>
			</div>
			<div class="collapsed"> 
				<span  style='color: #FFFF99;'>Setup</span>
				<a href='setup.php?linkvar=Change Pasword&&action=Setup' />  Change Password</a> 
			</div>
			<div class="collapsed">
				<span  style='color: #FFFF99;'>Documents</span>
				<a href='setup.php?linkvar=view_documents'>Documents </a>
			</div>
			<div class="collapsed">
				<span  style='color: #FFFF99;'>Help</span>
				<a href='setup.php?linkvar=Frequently Asked Questions&&action=Setup'>  Frequently Asked Questions</a>
				<a href='setup.php?linkvar=Send Mail&&action=Help'>  Send E-Mail</a>
				<a href='setup.php?linkvar=User Comments&&action=Help'>User comments</a> 
			</div>
			<div class="collapsed">
				<span style='color:#FFFF99;'>Related links</span>
				<?php echo $related_links;?> 
			</div>
			<div class="collapsed">
				<span style='color:red;'>EXIT</span>
				<a accesskey="0" href="logout.php?" onClick="return confirm('Are you sure you wish to logout?')">Logout</a>
			</div>
		</div>
		<?php
		}
		else if($_SESSION['role']=='Trade Related SPS and QM System Manager'){?>
		<div style="float: left" id="my_menu" class="sdmenu">
			<div class="collapsed">
				<span  style='color: #FFFF99;'>Home</span>
				<?php echo $homeLinks; ?>
			</div>
			<div class="collapsed">
				<span  style='color: #FFFF99;'>Program Monitoring</span>
				<?php #echo $programMonitoringManagerLinks; ?>
				<a href="program_monitoring.php?linkvar=Value Chain Development Quarterly Physical Actuals&&action=Program Monitoring" >  Report Log</a>
				<a href="program_monitoring.php?linkvar=Value Chain Manager&&action=Program Monitoring">Trade Related SPs and QM </a>  
				<a href="program_monitoring.php?linkvar=Targets against Actuals&&Program Monitoring"> Annual Targets against Actuals</a>
			</div>
			<div class="collapsed">
				<span  style='color: #FFFF99;'>Narratives</span>
				<?php  echo $narrativeLinks ;?>        
			</div>
			<div class="collapsed">
				<span  style='color: #FFFF99;'>Program Results</span>
				<?php echo $programResultsLinks ; ?> 
			</div>
			<div class="collapsed">
				<span  style='color: #FFFF99;'>Planning</span>
				<?php //echo $planningLinks ; ?> 
				<a href="workplan.php?linkvar=view_annualTarget&&action=Program Monitoring" onClick="xajax_annualTargetselect()">Annual Targets </a>
			</div> 
			<div class="collapsed">
				<span  style='color: #FFFF99;'>Setup</span>
				<?php echo $SetupLinks3 ;?> 
			</div>  
			<div class="collapsed">
				<span  style='color: #FFFF99;'>Documents</span>
				<a href='setup.php?linkvar=view_documents'>Documents </a>
			</div>
			<div class="collapsed">
				<span  style='color: #FFFF99;'>Help</span>
				<a href='setup.php?linkvar=Frequently Asked Questions&&action=Setup'>  Frequently Asked Questions</a>
				<a href='setup.php?linkvar=Send Mail&&action=Help'>  Send E-Mail</a>
				<a href='setup.php?linkvar=User Comments&&action=Help'>User comments</a> 
			</div>
			<div class="collapsed">
				<span style='color:#FFFF99;'>Related links</span>
				<?php echo $related_links;?> 
			</div>
			<div class="collapsed">
				<span style='color:red;'>EXIT</span>
				<a accesskey="0" href="logout.php?" onClick="return confirm('Are you sure you wish to logout?')">Logout</a>
			</div>
		</div>
		<?php
		}
		else if($_SESSION['role']=='Value Chain Manager'){?>
		<div style="float: left" id="my_menu" class="sdmenu">
			<div class="collapsed">
				<span  style='color: #FFFF99;'>Home</span>
				<?php echo $homeLinks; ?>
			</div>
			<div class="collapsed">
				<span  style='color: #FFFF99;'>Program Monitoring</span>
				<?php echo $programMonitoringManagerLinks; ?>
			</div>
			<div class="collapsed">
				<span  style='color: #FFFF99;'>Narratives</span>
				<?php  echo $narrativeLinks ;?> 
			</div>
			<div class="collapsed">
				<span  style='color: #FFFF99;'>Program Results</span>
				<?php echo $programResultsLinks ; ?>
			</div>   
			<div class="collapsed">
				<span  style='color: #FFFF99;'>Planning</span>
				<?php echo $planningLinks; ?>
			</div>   
			<div class="collapsed">
				<span  style='color: #FFFF99;'>Setup</span>
				<?php echo $SetupLinks3 ;?> 
			</div>   
			<div class="collapsed">
				<span  style='color: #FFFF99;'>Documents</span>
				<a href='setup.php?linkvar=view_documents'>Documents </a>
			</div>
			<div class="collapsed">
				<span  style='color: #FFFF99;'>Help</span>
				<a href='setup.php?linkvar=Frequently Asked Questions&&action=Setup'>  Frequently Asked Questions</a>
				<a href='setup.php?linkvar=Send Mail&&action=Help'>  Send E-Mail</a>
				<a href='setup.php?linkvar=User Comments&&action=Help'>User comments</a> 
			</div>
			<div class="collapsed">
				<span style='color:#FFFF99;'>Related links</span>
				<?php echo $related_links;?> 
			</div>
			<div class="collapsed">
				<span style='color:red;'>EXIT</span>
				<a accesskey="0" href="logout.php?" onClick="return confirm('Are you sure you wish to logout?')">Logout</a>
			</div>
		</div>
		<?php
		}
		else if(($_SESSION['role']=='Development Organization') and ($_SESSION['titlesubcomponent']=='Value Chain Development')){?>
		<div style="float: left" id="my_menu" class="sdmenu">
			<div class="collapsed">
				<span  style='color: #FFFF99;'>Home</span>
				<?php echo $homeLinks; ?>
			</div>
			<div class="collapsed">
				<span  style='color: #FFFF99;'>Program Monitoring</span>
				<?php
				echo "<a href='program_monitoring.php?linkvar=Quarterly Reporting&&action=Program Monitoring&&org_code=".$_SESSION['org_code']."&&orgName=".$_SESSION['orgName']."' >  Value Chain Development </a>"; ?>
			</div>
			<div class="collapsed">
				<span  style='color: #FFFF99;'>Narratives</span>
				<?php  echo $narrativeLinks ;?> 
			</div> 
			<div class="collapsed"> 
				<span  style='color: #FFFF99;'>Setup</span>
				<a href='setup.php?linkvar=Change Pasword&&action=Setup' />  Change Password</a> 
			</div>  
			<div class="collapsed">
				<span  style='color: #FFFF99;'>Documents</span>
				<a href='setup.php?linkvar=view_documents'>Documents </a>
			</div>
			<div class="collapsed">
				<span  style='color: #FFFF99;'>Help</span>
				<a href='setup.php?linkvar=Frequently Asked Questions&&action=Setup'>  Frequently Asked Questions</a>
				<a href='setup.php?linkvar=Send Mail&&action=Help'>  Send E-Mail</a>
				<a href='setup.php?linkvar=User Comments&&action=Help'>User comments</a> 
			</div>
			<div class="collapsed">
				<span style='color:#FFFF99;'>Related links</span>
				<?php echo $related_links;?> 
			</div>
			<div class="collapsed">
				<span style='color:red;'>EXIT</span>
				<a accesskey="0" href="logout.php?" onClick="return confirm('Are you sure you wish to logout?')">Logout</a>
			</div>
		</div>
		<?php
		}
		else if(($_SESSION['role']=='Development Organization') and ($_SESSION['titlesubcomponent']=='Value Chain Development')){?>
		<div style="float: left" id="my_menu" class="sdmenu">
			<div class="collapsed">
				<span  style='color: #FFFF99;'>Home</span>
				<?php echo $homeLinks; ?>
			</div>
			<div class="collapsed">
				<span  style='color: #FFFF99;'>Program Monitoring</span>
				<?php
				echo "<a href='program_monitoring.php?linkvar=Quarterly Reporting&&action=Program Monitoring&&org_code=".$_SESSION['org_code']."&&orgName=".$_SESSION['orgName']."' >  Value Chain Development </a>"; ?>
			</div>
			<div class="collapsed">
				<span  style='color: #FFFF99;'>Narratives</span>
				<?php  echo $narrativeLinks ;?> 
			</div>   
			<div class="collapsed"> 
				<span  style='color: #FFFF99;'>Setup</span>
				<a href='setup.php?linkvar=Change Pasword&&action=Setup' />  Change Password</a> 
			</div>
			<div class="collapsed">
				<span  style='color: #FFFF99;'>Documents</span>
				<a href='setup.php?linkvar=view_documents'>Documents </a>
			</div>
			<div class="collapsed">
				<span  style='color: #FFFF99;'>Help</span>
				<a href='setup.php?linkvar=Frequently Asked Questions&&action=Setup'>  Frequently Asked Questions</a>
				<a href='setup.php?linkvar=Send Mail&&action=Help'>  Send E-Mail</a>
				<a href='setup.php?linkvar=User Comments&&action=Help'>User comments</a> 
			</div>
			<div class="collapsed">
				<span style='color:#FFFF99;'>Related links</span>
				<?php echo $related_links;?> 
			</div>
			<div class="collapsed">
				<span style='color:red;'>EXIT</span>
				<a accesskey="0" href="logout.php?" onClick="return confirm('Are you sure you wish to logout?')">Logout</a>
			</div>
		</div>
		<?php
		}
		else if(($_SESSION['role']=='Development Organization') and ($_SESSION['titlesubcomponent']=='Value Chain Development')){?>
		<div style="float: left" id="my_menu" class="sdmenu">
			<div class="collapsed">
				<span  style='color: #FFFF99;'>Home</span>
				<?php echo $homeLinks; ?>
			</div>
			<div class="collapsed">
				<span  style='color: #FFFF99;'>Program Monitoring</span>
				<?php
				echo "<a href='program_monitoring.php?linkvar=Quarterly Reporting&&action=Program Monitoring&&org_code=".$_SESSION['org_code']."&&orgName=".$_SESSION['orgName']."' >  Value Chain Development </a>"; ?>
			</div>
			<div class="collapsed">
				<span  style='color: #FFFF99;'>Narratives</span>
				<?php  echo $narrativeLinks ;?> 
			</div> 
			<div class="collapsed"> 
				<span  style='color: #FFFF99;'>Setup</span>
				<a href='setup.php?linkvar=Change Pasword&&action=Setup' />  Change Password</a> 
			</div>  
			<div class="collapsed">
				<span  style='color: #FFFF99;'>Documents</span>
				<a href='setup.php?linkvar=view_documents'>Documents </a>
			</div>
			<div class="collapsed">
				<span  style='color: #FFFF99;'>Help</span>
				<a href='setup.php?linkvar=Frequently Asked Questions&&action=Setup'>  Frequently Asked Questions</a>
				<a href='setup.php?linkvar=Send Mail&&action=Help'>  Send E-Mail</a>
				<a href='setup.php?linkvar=User Comments&&action=Help'>User comments</a> 
			</div>
			<div class="collapsed">
				<span style='color:#FFFF99;'>Related links</span>
				<?php echo $related_links;?> 
			</div>
			<div class="collapsed">
				<span style='color:red;'>EXIT</span>
				<a accesskey="0" href="logout.php?" onClick="return confirm('Are you sure you wish to logout?')">Logout</a>
			</div>
		</div>
		<?php
		}
		else if(($_SESSION['role']=='Development Organization') and ($_SESSION['titlesubcomponent']=='Trade  Related SPS and  QM System')){?>
		<div style="float: left" id="my_menu" class="sdmenu">
			<div class="collapsed">
				<span  style='color: #FFFF99;'>Home</span>
				<?php echo $homeLinks; ?>
			</div>
			<div class="collapsed">
				<span  style='color: #FFFF99;'>Program Monitoring</span>
				<?php
				echo "<a href='program_monitoring.php?linkvar=Quarterly Reporting&&action=Program Monitoring&&org_code=".$_SESSION['org_code']."&&orgName=".$_SESSION['orgName']."' >  SPS AND QMS </a>"; ?>
			</div>
			<div class="collapsed">
				<span  style='color: #FFFF99;'>Narratives</span>
				<?php  echo $narrativeLinks ;?> 
			</div> 
			<div class="collapsed"> 
				<span  style='color: #FFFF99;'>Setup</span>
				<a href='setup.php?linkvar=Change Pasword&&action=Setup' />  Change Password</a> 
			</div>  
			<div class="collapsed">
				<span  style='color: #FFFF99;'>Documents</span>
				<a href='setup.php?linkvar=view_documents'>Documents </a>
			</div>
			<div class="collapsed">
				<span  style='color: #FFFF99;'>Help</span>
				<a href='setup.php?linkvar=Frequently Asked Questions&&action=Setup'>  Frequently Asked Questions</a>
				<a href='setup.php?linkvar=Send Mail&&action=Help'>  Send E-Mail</a>
				<a href='setup.php?linkvar=User Comments&&action=Help'>User comments</a> 
			</div>
			<div class="collapsed">
				<span style='color:#FFFF99;'>Related links</span>
				<?php echo $related_links;?> 
			</div>
			<div class="collapsed">
				<span style='color:red;'>EXIT</span>
				<a accesskey="0" href="logout.php?" onClick="return confirm('Are you sure you wish to logout?')">Logout</a>
			</div>
		</div>
		<?php
		}
		else if(($_SESSION['role']=='Development Organization') and ($_SESSION['titlesubcomponent']=='Value Chain Development')){?>
		<div style="float: left" id="my_menu" class="sdmenu">
			<div class="collapsed">
				<span  style='color: #FFFF99;'>Home</span>
				<?php echo $homeLinks; ?>
			</div>
			<div class="collapsed">
				<span  style='color: #FFFF99;'>Program Monitoring</span>
				<?php
				echo "<a href='program_monitoring.php?linkvar=Quarterly Reporting&&action=Program Monitoring&&org_code=".$_SESSION['org_code']."&&orgName=".$_SESSION['orgName']."' >  Value Chain Development </a>"; ?>
			</div>
			<div class="collapsed">
				<span  style='color: #FFFF99;'>Narratives</span>
				<?php  echo $narrativeLinks ;?>
			</div>   
			<div class="collapsed"> 
				<span  style='color: #FFFF99;'>Setup</span>
				<a href='setup.php?linkvar=Change Pasword&&action=Setup' />  Change Password</a> 
			</div>
			<div class="collapsed">
				<span  style='color: #FFFF99;'>Documents</span>
				<a href='setup.php?linkvar=view_documents'>Documents </a>
			</div>
			<div class="collapsed">
				<span  style='color: #FFFF99;'>Help</span>
				<a href='setup.php?linkvar=Frequently Asked Questions&&action=Setup'>  Frequently Asked Questions</a>
				<a href='setup.php?linkvar=Send Mail&&action=Help'>  Send E-Mail</a>
				<a href='setup.php?linkvar=User Comments&&action=Help'>User comments</a> 
			</div>
			<div class="collapsed">
				<span style='color:#FFFF99;'>Related links</span>
				<?php echo $related_links;?> 
			</div>
			<div class="collapsed">
				<span style='color:red;'>EXIT</span>
				<a accesskey="0" href="logout.php?" onClick="return confirm('Are you sure you wish to logout?')">Logout</a>
			</div>
		</div>
		<?php
		}
		else if(($_SESSION['role']=='Development Organization') and ($_SESSION['titlesubcomponent']=='Gender For Growth (G4G) Fund')){?>
		<div style="float: left" id="my_menu" class="sdmenu">
			<div class="collapsed">
				<span  style='color: #FFFF99;'>Home</span>
				<?php echo $homeLinks; ?>
			</div>
			<div class="collapsed">
				<span  style='color: #FFFF99;'>Program Monitoring</span>
				<?php
				echo "<a href='program_monitoring.php?linkvar=Quarterly Reporting&&action=Program Monitoring&&org_code=".$_SESSION['org_code']."&&orgName=".$_SESSION['orgName']."' >  Gender For Growth </a>"; ?>
			</div>
			<div class="collapsed">
				<span  style='color: #FFFF99;'>Narratives</span>
				<?php  echo $narrativeLinks ;?> 
			</div>   
			<div class="collapsed"> 
				<span  style='color: #FFFF99;'>Setup</span>
				<a href='setup.php?linkvar=Change Pasword&&action=Setup' />  Change Password</a> 
			</div>
			<div class="collapsed">
				<span  style='color: #FFFF99;'>Documents</span>
				<a href='setup.php?linkvar=view_documents'>Documents </a>
			</div>
			<div class="collapsed">
				<span  style='color: #FFFF99;'>Help</span>
				<a href='setup.php?linkvar=Frequently Asked Questions&&action=Setup'>  Frequently Asked Questions</a>
				<a href='setup.php?linkvar=Send Mail&&action=Help'>  Send E-Mail</a>
				<a href='setup.php?linkvar=User Comments&&action=Help'>User comments</a> 
			</div>
			<div class="collapsed">
				<span style='color:#FFFF99;'>Related links</span>
				<?php echo $related_links;?> 
			</div>
			<div class="collapsed">
				<span style='color:red;'>EXIT</span>
				<a accesskey="0" href="logout.php?" onClick="return confirm('Are you sure you wish to logout?')">Logout</a>
			</div>
		</div>
		<?php
		}
		else if($_SESSION['role']=='Gender For Growth Manager'){?>
		<div style="float: left" id="my_menu" class="sdmenu">
			<div class="collapsed">
				<span  style='color: #FFFF99;'>Home</span>
				<?php echo $homeLinks; ?>
			</div>
			<div class="collapsed">
				<span  style='color: #FFFF99;'>Program Monitoring</span>
				<?php echo $programMonitoringLinksg4g; ?> 
			</div>
			<div class="collapsed">
				<span  style='color: #FFFF99;'>Narratives</span>
				<?php  echo $narrativeLinks ;?> 
			</div>   
			<div class="collapsed">
				<span  style='color:#FFFF99;'>Partners Inventory</span>
				<?php echo $partnersInventorylinks ; ?> 
			</div>  
			<div class="collapsed">
				<span  style='color: #FFFF99;'>Program Results</span>
				<?php echo $programResultsLinks ; ?> 
			</div>   
			<div class="collapsed">
				<span  style='color: #FFFF99;'>Planning</span>
				<?php echo $planningLinks; ?> 
			</div> 
			<div class="collapsed">
				<span  style='color: #FFFF99;'>Setup</span>
				<?php echo $SetupLinks3 ;?> 
			</div>  
			<div class="collapsed">
				<span  style='color: #FFFF99;'>Documents</span>
				<a href='setup.php?linkvar=view_documents'>Documents </a>
			</div>
			<div class="collapsed">
				<span  style='color: #FFFF99;'>Help</span>
				<a href='setup.php?linkvar=Frequently Asked Questions&&action=Setup'>  Frequently Asked Questions</a>
				<a href='setup.php?linkvar=Send Mail&&action=Help'>  Send E-Mail</a>
				<a href='setup.php?linkvar=User Comments&&action=Help'>User comments</a> 
			</div>
			<div class="collapsed">
				<span style='color:#FFFF99;'>Related links</span>
				<?php echo $related_links;?> 
			</div>
			<div class="collapsed">
				<span style='color:red;'>EXIT</span>
				<a accesskey="0" href="logout.php?" onClick="return confirm('Are you sure you wish to logout?')">Logout</a>
			</div>
		</div>
		<?php
		}
		else if(($_SESSION['role']=='Finance and Admininistration')){?>
		<div style="float: left" id="my_menu" class="sdmenu">
			<div class="collapsed">
				<span  style='color: #FFFF99;'>Home</span>
				<?php echo $homeLinks; ?>
			</div>
			<div class="collapsed">
				<span  style='color: #FFFF99;'>Program Monitoring</span>
				<?php #echo $programMonitoringManagerLinks; ?>
				<a href="program_monitoring.php?linkvar=Value Chain Manager&&action=Program Monitoring">Trust Operations</a>  
				<a href="program_monitoring.php?linkvar=Targets against Actuals&&Program Monitoring"> Annual Targets against Actuals</a> 
			</div>
			<div class="collapsed">
				<span  style='color: #FFFF99;'>Narratives</span>
				<?php  echo $narrativeLinks ;?> 
			</div>   
			<div class="collapsed">
				<span  style='color: #FFFF99;'>Program Results</span>
				<?php echo $programResultsLinks ; ?> 
			</div>   
			<div class="collapsed">
				<span  style='color: #FFFF99;'>Planning</span>
				<?php echo $planningLinks; ?> 
			</div> 
			<div class="collapsed">
				<span  style='color: #FFFF99;'>Setup</span>
				<?php echo $SetupLinks3 ;?> 
			</div>  
			<div class="collapsed">
				<span  style='color: #FFFF99;'>Documents</span>
				<a href='setup.php?linkvar=view_documents'>Documents </a>
			</div>
			<div class="collapsed">
				<span  style='color: #FFFF99;'>Help</span>
				<a href='setup.php?linkvar=Frequently Asked Questions&&action=Setup'>  Frequently Asked Questions</a>
				<a href='setup.php?linkvar=Send Mail&&action=Help'>  Send E-Mail</a>
				<a href='setup.php?linkvar=User Comments&&action=Help'>User comments</a> 
			</div>
			<div class="collapsed">
				<span style='color:#FFFF99;'>Related links</span>
				<?php echo $related_links;?> 
			</div>
			<div class="collapsed">
				<span style='color:red;'>EXIT</span>
				<a accesskey="0" href="logout.php?" onClick="return confirm('Are you sure you wish to logout?')">Logout</a>
			</div>
		</div>
		<?php
		}
		else if($_SESSION['role']=='Financial Services Manager'){?>
		<div style="float: left" id="my_menu" class="sdmenu">
			<div class="collapsed">
				<span  style='color: #FFFF99;'>Home</span>
				<?php echo $homeLinks; ?>
			</div>
			<div class="collapsed">
				<span  style='color: #FFFF99;'>Program Monitoring</span>
				<?php echo $programMonitoringManagerLinksfsManager; ?>
			</div>
			<div class="collapsed">
				<span  style='color: #FFFF99;'>Narratives</span>
				<?php  echo $narrativeLinks ;?> 
			</div>   
			<div class="collapsed">
				<span  style='color: #FFFF99;'>Program Results</span>
				<?php echo $programResultsLinks ; ?> 
			</div>   
			<div class="collapsed">
				<span  style='color: #FFFF99;'>Planning</span>
				<?php echo $planningLinks; ?> 
			</div> 
			<div class="collapsed">
				<span  style='color: #FFFF99;'>Setup</span>
				<?php echo $SetupLinks3 ;?> 
			</div>  
			<div class="collapsed">
				<span  style='color: #FFFF99;'>Documents</span>
				<a href='setup.php?linkvar=view_documents'>Documents </a>
			</div>
			<div class="collapsed">
				<span  style='color: #FFFF99;'>Help</span>
				<a href='setup.php?linkvar=Frequently Asked Questions&&action=Setup'>  Frequently Asked Questions</a>
				<a href='setup.php?linkvar=Send Mail&&action=Help'>  Send E-Mail</a>
				<a href='setup.php?linkvar=User Comments&&action=Help'>User comments</a> 
			</div>
			<div class="collapsed">
				<span style='color:#FFFF99;'>Related links</span>
				<?php echo $related_links;?> 
			</div>
			<div class="collapsed">
				<span style='color:red;'>EXIT</span>
				<a accesskey="0" href="logout.php?" onClick="return confirm('Are you sure you wish to logout?')">Logout</a>
			</div>
		</div>
		<?php
		}
		else if(($_SESSION['role']=='Small and Medium Enterprize') and ($_SESSION['titlesubcomponent']=='Trade  Related SPS and  QM System')){?>
		<div style="float: left" id="my_menu" class="sdmenu">
			<div class="collapsed">
				<span  style='color: #FFFF99;'>Home</span>
				<?php echo $homeLinks; ?>
			</div>
			<div class="collapsed">
				<span  style='color: #FFFF99;'>Program Monitoring</span>
				<?php echo "<a href='program_monitoring.php?linkvar=Quarterly Reporting&&action=Program Monitoring&&org_code=".$_SESSION['org_code']."&&orgName=".$_SESSION['orgName']."' >  SPS & QMS</a>"; ?>
			</div>
			<div class="collapsed">
				<span  style='color: #FFFF99;'>Narratives</span>
				<?php  echo $narrativeLinks ;?> 
			</div>
			<div class="collapsed">
				<span  style='color: #FFFF99;'>Program Results</span>
				<?php echo $programResultsLinks ; ?> 
			</div>   
			<div class="collapsed"> 
				<span  style='color: #FFFF99;'>Setup</span>
				<a href='setup.php?linkvar=Change Pasword&&action=Setup' />  Change Password</a> 
			</div>
			<div class="collapsed">
				<span  style='color: #FFFF99;'>Documents</span>
				<a href='setup.php?linkvar=view_documents'>Documents </a>
			</div>
			<div class="collapsed">
				<span  style='color: #FFFF99;'>Help</span>
				<a href='setup.php?linkvar=Frequently Asked Questions&&action=Setup'>  Frequently Asked Questions</a>
				<a href='setup.php?linkvar=Send Mail&&action=Help'>  Send E-Mail</a>
				<a href='setup.php?linkvar=User Comments&&action=Help'>User comments</a> 
			</div>
			<div class="collapsed">
				<span style='color:#FFFF99;'>Related links</span>
				<?php echo $related_links;?> 
			</div>
			<div class="collapsed">
				<span style='color:red;'>EXIT</span>
				<a accesskey="0" href="logout.php?" onClick="return confirm('Are you sure you wish to logout?')">Logout</a>
			</div>
		</div>
		<?php 
		}
		else if(($_SESSION['role']=='Small and Medium Enterprize') and ($_SESSION['titlesubcomponent']=='Value Chain Development')){?>
		<div style="float: left" id="my_menu" class="sdmenu">
			<div class="collapsed">
				<span  style='color: #FFFF99;'>Home</span>
				<?php echo $homeLinks; ?>
			</div>
			<div class="collapsed">
				<span  style='color: #FFFF99;'>Program Monitoring</span>
				<?php echo "<a href='program_monitoring.php?linkvar=Quarterly Reporting&&action=Program Monitoring&&org_code=".$_SESSION['org_code']."&&orgName=".$_SESSION['orgName']."' >  Value Chain Development</a>"; ?>
			</div>
			<div class="collapsed">
				<span  style='color: #FFFF99;'>Narratives</span>
				<?php  echo $narrativeLinks ;?> 
			</div>   
			<div class="collapsed">
				<span  style='color: #FFFF99;'>Program Results</span>
				<?php echo $programResultsLinks ; ?> 
			</div>   
			<div class="collapsed"> 
				<span  style='color: #FFFF99;'>Setup</span>
				<a href='setup.php?linkvar=Change Pasword&&action=Setup' />  Change Password</a> 
			</div>
			<div class="collapsed">
				<span  style='color: #FFFF99;'>Documents</span>
				<a href='setup.php?linkvar=view_documents'>Documents </a>
			</div>
			<div class="collapsed">
				<span  style='color: #FFFF99;'>Help</span>
				<a href='setup.php?linkvar=Frequently Asked Questions&&action=Setup'>  Frequently Asked Questions</a>
				<a href='setup.php?linkvar=Send Mail&&action=Help'>  Send E-Mail</a>
				<a href='setup.php?linkvar=User Comments&&action=Help'>User comments</a> 
			</div>
			<div class="collapsed">
				<span style='color:#FFFF99;'>Related links</span>
				<?php echo $related_links;?> 
			</div>
			<div class="collapsed">
				<span style='color:red;'>EXIT</span>
				<a accesskey="0" href="logout.php?" onClick="return confirm('Are you sure you wish to logout?')">Logout</a>
			</div>
		</div>
		<?php 
		}
		else if(($_SESSION['role']=='other') and ($_SESSION['titlesubcomponent']=='Gender For Growth (G4G) Fund')){?>
		<div style="float: left" id="my_menu" class="sdmenu">
			<div class="collapsed">
				<span  style='color: #FFFF99;'>Home</span>
				<?php echo $homeLinks; ?>
			</div>
			<div class="collapsed">
				<span  style='color: #FFFF99;'>Program Monitoring</span>
				<?php echo "<a href='program_monitoring.php?linkvar=Quarterly Reporting&&action=Program Monitoring&&org_code=".$_SESSION['org_code']."&&orgName=".$_SESSION['orgName']."' >  Gender For Growth</a>"; ?>
			</div>
			<div class="collapsed">
				<span  style='color: #FFFF99;'>Narratives</span>
				<?php  echo $narrativeLinks ;?> 
			</div>   
			<div class="collapsed">
				<span  style='color: #FFFF99;'>Program Results</span>
				<?php echo $programResultsLinks ; ?> 
			</div>   
			<div class="collapsed"> 
				<span  style='color: #FFFF99;'>Setup</span>
				<a href='setup.php?linkvar=Change Pasword&&action=Setup' />  Change Password</a> 
			</div>
			<div class="collapsed">
				<span  style='color: #FFFF99;'>Documents</span>
				<?php ?> 
				<a href='setup.php?linkvar=view_documents'>Documents </a>
			</div>
			<div class="collapsed">
				<span  style='color: #FFFF99;'>Help</span>
				<a href='setup.php?linkvar=Frequently Asked Questions&&action=Setup'>  Frequently Asked Questions</a>
				<a href='setup.php?linkvar=Send Mail&&action=Help'>  Send E-Mail</a>
				<a href='setup.php?linkvar=User Comments&&action=Help'>User comments</a> 
			</div>
			<div class="collapsed">
				<span style='color:#FFFF99;'>Related links</span>
				<?php echo $related_links;?> 
			</div>
			<div class="collapsed">
				<span style='color:red;'>EXIT</span>
				<a accesskey="0" href="logout.php?" onClick="return confirm('Are you sure you wish to logout?')">Logout</a>
			</div>
		</div>
		<?php 
		}
		else if(($_SESSION['role']=='other') and ($_SESSION['titlesubcomponent']=='Value Chain Development')){?>
		<div style="float: left" id="my_menu" class="sdmenu">
			<div class="collapsed">
				<span  style='color: #FFFF99;'>Home</span>
				<?php echo $homeLinks; ?>
			</div>
			<div class="collapsed">
				<span  style='color: #FFFF99;'>Program Monitoring</span>
				<?php echo "<a href='program_monitoring.php?linkvar=Quarterly Reporting&&action=Program Monitoring&&org_code=".$_SESSION['org_code']."&&orgName=".$_SESSION['orgName']."' >  Value Chain Development</a>"; ?>
			</div>
			<div class="collapsed">
				<span  style='color: #FFFF99;'>Narratives</span>
				<?php  echo $narrativeLinks ;?> 
			</div>   
			<div class="collapsed">
				<span  style='color: #FFFF99;'>Program Results</span>
				<?php echo $programResultsLinks ; ?> 
			</div>   
			<div class="collapsed"> 
				<span  style='color: #FFFF99;'>Setup</span>
				<a href='setup.php?linkvar=Change Pasword&&action=Setup' />  Change Password</a> 
			</div>
			<div class="collapsed">
				<span  style='color: #FFFF99;'>Documents</span>
				<a href='setup.php?linkvar=view_documents'>Documents </a>            
			</div>
			<div class="collapsed">
				<span  style='color: #FFFF99;'>Help</span>
				<a href='setup.php?linkvar=Frequently Asked Questions&&action=Setup'>  Frequently Asked Questions</a>
				<a href='setup.php?linkvar=Send Mail&&action=Help'>  Send E-Mail</a>
				<a href='setup.php?linkvar=User Comments&&action=Help'>User comments</a> 
			</div>
			<div class="collapsed">
				<span style='color:#FFFF99;'>Related links</span>
				<?php echo $related_links;?> 
			</div>
			<div class="collapsed">
				<span style='color:red;'>EXIT</span>
				<a accesskey="0" href="logout.php?" onClick="return confirm('Are you sure you wish to logout?')">Logout</a>
			</div>
		</div>
		<?php 
	}
	else if($_SESSION['role']=='Monitoring and Evaluation'){	?>
		<div style="float: left" id="my_menu" class="sdmenu">
			<div class="collapsed">
				<span  style='color: #FFFF99;'>Home</span>
				<?php echo $homeLinks; ?>
			</div>
			<div class="collapsed">
				<span  style='color: #FFFF99;'>aBi Trust Monitoring</span>
				<?php   echo $aBiTrustMonitoring; ?>
			</div>
			<div class="collapsed">
				<span  style='color: #FFFF99;'>Narratives</span>
				<?php  echo $narrativeLinks ;?> 
			</div>   
			<div class="collapsed">
				<span  style='color:#FFFF99;'>Partners Inventory</span>
				<?php echo $partnersInventorylinks ; ?> 
			</div>  
			<div class="collapsed">
				<span  style='color: #FFFF99;'>Program Results</span>
				<?php echo $programResultsLinks ; ?> 
			</div>   
			<div class="collapsed">
				<span  style='color: #FFFF99;'>aBi Trust Results</span>
				<?php echo $aBiTrustResultsLinks ; ?>    
			</div> 
			<div class="collapsed">
				<span  style='color: #FFFF99;'>Planning</span>
				<?php echo $planningLinks ; ?> 
			</div> 
			<div class="collapsed">
				<span  style='color: #FFFF99;'>Setup</span>
				<?php echo $SetupLinks ;?> 
			</div>   
			<div class="collapsed">
				<span  style='color: #FFFF99;'>Documents</span>
				<a href='setup.php?linkvar=view_documents'>Documents </a>
			</div>
			<div class="collapsed">
				<span  style='color: #FFFF99;'>Help</span>
				<a href='setup.php?linkvar=Frequently Asked Questions&&action=Setup'>  Frequently Asked Questions</a>
				<a href='setup.php?linkvar=Send Mail&&action=Help'>  Send E-Mail</a>
				<a href='setup.php?linkvar=User Comments&&action=Help'>User comments</a> 
			</div>
			<div class="collapsed">
				<span style='color:#FFFF99;'>Related links</span>
				<?php echo $related_links;?> 
			</div>
				<div class="collapsed">
				<span style='color:red;'>EXIT</span>
				<a accesskey="0" href="logout.php?" onClick="return confirm('Are you sure you wish to logout?')">Logout</a>
			</div>
		</div>
		<?php 
	}
	else if($_SESSION['role']=='Grants Manager'){	?>
		<div style="float: left" id="my_menu" class="sdmenu">
			<div class="collapsed">
				<span  style='color: #FFFF99;'>Home</span>
				<?php echo $homeLinks2; ?>
			</div>
			<div class="collapsed">
				<span  style='color: #FFFF99;'>Concepts</span>
				<?php   echo $concepts; ?>
			</div>
			<div class="collapsed">
				<span  style='color: #FFFF99;'>Proposals</span>
				<?php   echo $proposals; ?>
			</div>
			<div class="collapsed">
				<span  style='color: #FFFF99;'>Projects/Contracts</span>
				<?php   echo $projects; ?>
			</div>
			<div class="collapsed">
				<span  style='color: #FFFF99;'>Reports/Analysis</span>
				<?php   echo $gmmReports; ?>
			</div>
			<!--div class="collapsed">
				<span  style='color: #FFFF99;'>Setup</span>
				<?php echo $SetupLinks ;?> 
			</div-->   
			<div class="collapsed">
				<span  style='color: #FFFF99;'>Documents</span>
				<a href='setup.php?linkvar=view_documents'>Documents </a>
			</div>
			<div class="collapsed">
				<span  style='color: #FFFF99;'>Help</span>
				<a href='setup.php?linkvar=Frequently Asked Questions&&action=Setup'>  Frequently Asked Questions</a>
				<a href='setup.php?linkvar=Send Mail&&action=Help'>  Send E-Mail</a>
				<a href='setup.php?linkvar=User Comments&&action=Help'>User comments</a> 
			</div>
			<div class="collapsed">
				<span style='color:red;'>EXIT</span>
				<a accesskey="0" href="logout.php?" onClick="return confirm('Are you sure you wish to logout?')">Logout</a>
			</div>
		</div>
		<?php
	}
	else if($_SESSION['role']=='Receptionist'){	?>
		<div style="float: left" id="my_menu" class="sdmenu">
			<div class="collapsed">
				<span  style='color: #FFFF99;'>Home</span>
				<?php echo $homeLinks2; ?>
			</div>
			<div class="collapsed">
				<span  style='color: #FFFF99;'>Concepts</span>
				<a href='z_cNote.php?linkvar=Concept Note Advert&&action=Concepts'>Concept Note Advert</a> 
				<a href='z_cRegi.php?linkvar=Concepts Register&&action=Concepts'>Concept Register</a> 
				<a href='z_rConc.php?linkvar=Rejected Concepts&&action=Concepts'><b>Rejected Concepts</b></a>
			</div>
			<div class="collapsed">
				<span  style='color: #FFFF99;'>Proposals</span>
				<a href='z_pRegi.php?linkvar=Proposals Register&&action=Proposals'>Proposal Register</a> 
				<a href='z_pGCM.php?linkvar=Grants Committee Meeting Minutes&&action=Proposals'>Meeting Minutes</a> 
			</div>
			<div class="collapsed">
				<span  style='color: #FFFF99;'>Reports/Analysis</span>
				<?php   echo $gmmReports; ?>
			</div>
			<div class="collapsed">
				<span  style='color: #FFFF99;'>Documents</span>
				<a href='setup.php?linkvar=view_documents'>Documents </a>
			</div>
			<div class="collapsed">
				<span  style='color: #FFFF99;'>Help</span>
				<a href='setup.php?linkvar=Frequently Asked Questions&&action=Setup'>  Frequently Asked Questions</a>
				<a href='setup.php?linkvar=Send Mail&&action=Help'>  Send E-Mail</a>
				<a href='setup.php?linkvar=User Comments&&action=Help'>User comments</a> 
			</div>
			<div class="collapsed">
				<span style='color:red;'>EXIT</span>
				<a accesskey="0" href="logout.php?" onClick="return confirm('Are you sure you wish to logout?')">Logout</a>
			</div>
		</div>
		<?php
	}
	else if($_SESSION['role']=='Sub-Component Team'){	?>
		<div style="float: left" id="my_menu" class="sdmenu">
			<div class="collapsed">
				<span  style='color: #FFFF99;'>Home</span>
				<?php echo $homeLinks2; ?>
			</div>
			<div class="collapsed">
				<span  style='color: #FFFF99;'>Concepts</span>
				<a href='z_cRER.php?linkvar=Register Evaluation Results&&action=Concepts'>Register Evaluation Results</a> 
			</div>
			<div class="collapsed">
				<span  style='color: #FFFF99;'>Proposals</span>
				<a href='z_pRER.php?linkvar=Register Evaluation Results&&action=Proposals'>Register Evaluation Results</a> 
			</div>
			<div class="collapsed">
				<span  style='color: #FFFF99;'>Projects/Contracts</span>
				<?php echo $projects; ?>
			</div>
			<div class="collapsed">
				<span  style='color: #FFFF99;'>Reports/Analysis</span>
				<?php   echo $gmmReports; ?>
			</div>
			<div class="collapsed">
				<span  style='color: #FFFF99;'>Documents</span>
				<a href='setup.php?linkvar=view_documents'>Documents </a>
			</div>
			<div class="collapsed">
				<span  style='color: #FFFF99;'>Help</span>
				<a href='setup.php?linkvar=Frequently Asked Questions&&action=Setup'>  Frequently Asked Questions</a>
				<a href='setup.php?linkvar=Send Mail&&action=Help'>  Send E-Mail</a>
				<a href='setup.php?linkvar=User Comments&&action=Help'>User comments</a> 
			</div>
			<div class="collapsed">
				<span style='color:red;'>EXIT</span>
				<a accesskey="0" href="logout.php?" onClick="return confirm('Are you sure you wish to logout?')">Logout</a>
			</div>
		</div>
		<?php
	}
	else if($_SESSION['role']=='Secretary'){	?>
		<div style="float: left" id="my_menu" class="sdmenu">
			<div class="collapsed">
				<span  style='color: #FFFF99;'>Home</span>
				<?php echo $homeLinks2; ?>
			</div>
			<div class="collapsed">
				<span  style='color: #FFFF99;'>Proposals</span>
				<a href='z_pGCM.php?linkvar=Grants Committee Meeting Minutes&&action=Proposals'>Meeting Minutes</a> 
			</div>
			<div class="collapsed">
				<span  style='color: #FFFF99;'>Reports/Analysis</span>
				<?php   echo $gmmReports; ?>
			</div>
			<div class="collapsed">
				<span  style='color: #FFFF99;'>Documents</span>
				<a href='setup.php?linkvar=view_documents'>Documents </a>
			</div>
			<div class="collapsed">
				<span  style='color: #FFFF99;'>Help</span>
				<a href='setup.php?linkvar=Frequently Asked Questions&&action=Setup'>  Frequently Asked Questions</a>
				<a href='setup.php?linkvar=Send Mail&&action=Help'>  Send E-Mail</a>
				<a href='setup.php?linkvar=User Comments&&action=Help'>User comments</a> 
			</div>
			<div class="collapsed">
				<span style='color:red;'>EXIT</span>
				<a accesskey="0" href="logout.php?" onClick="return confirm('Are you sure you wish to logout?')">Logout</a>
			</div>
		</div>
		<?php
	}
	else if($_SESSION['role']=='Finance and Administration 2'){	?>
		<div style="float: left" id="my_menu" class="sdmenu">
			<div class="collapsed">
				<span  style='color: #FFFF99;'>Home</span>
				<?php echo $homeLinks2; ?>
			</div>
			<div class="collapsed">
				<span  style='color: #FFFF99;'>Projects/Contracts</span>
				<?php   echo $projects; ?>
				<a href='z_aDisb.php?linkvar=Approved Disbursements&&action=Projects/Contracts'>Approved Disbursements</a> 
			</div>
			<div class="collapsed">
				<span  style='color: #FFFF99;'>Documents</span>
				<a href='setup.php?linkvar=view_documents'>Documents </a>
			</div>
			<div class="collapsed">
				<span  style='color: #FFFF99;'>Help</span>
				<a href='setup.php?linkvar=Frequently Asked Questions&&action=Setup'>  Frequently Asked Questions</a>
				<a href='setup.php?linkvar=Send Mail&&action=Help'>  Send E-Mail</a>
				<a href='setup.php?linkvar=User Comments&&action=Help'>User comments</a> 
			</div>
			<div class="collapsed">
				<span style='color:red;'>EXIT</span>
				<a accesskey="0" href="logout.php?" onClick="return confirm('Are you sure you wish to logout?')">Logout</a>
			</div>
		</div>
		<?php
	}
	else if($_SESSION['role']=='Sub-Component Manager'){	?>
		<div style="float: left" id="my_menu" class="sdmenu">
			<div class="collapsed">
				<span  style='color: #FFFF99;'>Home</span>
				<?php echo $homeLinks2; ?>
			</div>
			<div class="collapsed">
				<span  style='color: #FFFF99;'>Concepts</span>
				<a href='z_aConc.php?linkvar=Accepted Concepts&&action=Concepts'>Accepted Concepts</a> 
				<a href='z_cAEv.php?linkvar=Assign Evaluators&&action=Concepts'>Assign Evaluators</a>
				<a href='z_cRER.php?linkvar=Register Evaluation Results&&action=Concepts'>Register Evaluation Results</a>
			</div>
			<div class="collapsed">
				<span  style='color: #FFFF99;'>Proposals</span>
				<a href='z_pPNot.php?linkvar=Proposal Notification&&action=Proposals'>Proposal Notification</a>
				<a href='z_pAEv.php?linkvar=Assign Evaluators&&action=Proposals'>Assign Evaluators</a>
				<a href='z_pRER.php?linkvar=Register Evaluation Results&&action=Proposals'>Register Evaluation Results</a>
			</div>
			<div class="collapsed">
				<span  style='color: #FFFF99;'>Projects/Contracts</span>
				<?php echo $projects; ?>
			</div>
			<div class="collapsed">
				<span  style='color: #FFFF99;'>Reports/Analysis</span>
				<?php   echo $gmmReports; ?>
			</div>
			<div class="collapsed">
				<span  style='color: #FFFF99;'>Documents</span>
				<a href='setup.php?linkvar=view_documents'>Documents </a>
			</div>
			<div class="collapsed">
				<span  style='color: #FFFF99;'>Help</span>
				<a href='setup.php?linkvar=Frequently Asked Questions&&action=Setup'>  Frequently Asked Questions</a>
				<a href='setup.php?linkvar=Send Mail&&action=Help'>  Send E-Mail</a>
				<a href='setup.php?linkvar=User Comments&&action=Help'>User comments</a> 
			</div>
			<div class="collapsed">
				<span style='color:red;'>EXIT</span>
				<a accesskey="0" href="logout.php?" onClick="return confirm('Are you sure you wish to logout?')">Logout</a>
			</div>
		</div>
		<?php
	}	?>
</body>
