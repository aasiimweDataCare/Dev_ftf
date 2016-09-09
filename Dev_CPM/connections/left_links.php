<?php
//require_once('connections/lib_connect.php');



 ?>

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


	<div style="float: left" id="my_menu" class="sdmenu">





<?php 

if(!isset($MenuCategory))$MenuCategory='';
if(!isset($tableName))$tableName='';
if(!isset($MenuItems))$MenuItems='';
$_SESSION['FunctionName']='';
	$query_MenuCategorys= "SELECT * FROM `tbl_menu_categories` where display='Yes' order by `Rank`,`MenuCategory` asc";
	$MenuCategorys = mysql_query($query_MenuCategorys);
	//echo mysql_error();
	while ($rows_menuC=mysql_fetch_array($MenuCategorys))
		{
			$MenuCategory=$rows_menuC['MenuCategory'];
			$MenuCategory_id=$rows_menuC['tbl_menu_categoriesId'];
			//$tableName=$rows_menuC['tableName'];
	echo "<div class='collapsed'>
				<span style='color: #FFFFff;'>$MenuCategory</span>";
	$query_MenuItems= "SELECT i.tbl_menu_itemsId, i.MenuItem,i.`Rank`,i.LinkvalCode,i.arguments,i.function_name,i.MenuCategory,i.page,i.action FROM `tbl_menu_items`  i
			left join tbl_permisions p on (i.tbl_menu_itemsId =p.MenuItem)
			WHERE i.MenuCategory='".$MenuCategory_id."' 
			AND p.role_id='".$_SESSION['role_id']."' and i.display like 'Yes%'
			order by i.`Rank`,i.tbl_menu_itemsId";
	$MenuItems = mysql_query($query_MenuItems);
	$TotalMenuItems=mysql_num_rows($MenuItems);
	//echo mysql_error();
	if ($TotalMenuItems!=0){
		while ($rows_MenuI=mysql_fetch_array($MenuItems))
		{
			$ID=$rows_MenuI['tbl_menu_itemsId'];
			$MenuCategory1=$rows_MenuI['MenuCategory'];
			$MenuItem=$rows_MenuI['MenuItem'];
			$MenuItem=$rows_MenuI['MenuItem'];
			$LinkvalCode=$rows_MenuI['LinkvalCode'];
			$page=$rows_MenuI['page'];
			$FunctionName=$rows_MenuI['function_name'];
			$Arguments=$rows_MenuI['arguments'];
			$action=$rows_MenuI['action'];//&&FunctionName=".$FunctionName."&&Arguments=".$Arguments."
		if($LinkvalCode=='Home'){
				echo "<a href='http://localhost:82/dev_ftf/index.php/DashboardController/index'>- $MenuItem</a>";
				/* echo "<a href='http://mis.ftfcpm.com:9000/index.php/DashboardController/index'>- $MenuItem</a>"; */
				/* echo "<a href='http://mis.ftfcpm.com:9000/demo/index.php/DashboardController/index'>- $MenuItem</a>"; */
			}else{
				echo "<a href='".$page."?linkvar=".$LinkvalCode."&&action=".$action."'>- $MenuItem</a>";
			}
			
		}
	}else echo "<a href='./logout.php' class='redhdrs' onClick=\"return confirm('Are you sure you wish to logout?');\">Access Denied</a>";
	echo "</div>";
	}//linkCat=".en_cpt($MenuCategory1)."




?>

</div>
<?php		
?>  


		
</body>
