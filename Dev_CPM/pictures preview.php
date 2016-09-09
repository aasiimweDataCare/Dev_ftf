<?php //----------------------------------------- TopManagers_Preview ----------------------------------------------
function  TopManagers_Preview(){

//Full Texts  	tbl_about_usId 	Title 	description 	imagePath
		$query_loard= "SELECT * FROM `tbl_top_managers` ORDER BY Rank , fullNames";
		$loard = mysql_query($query_loard);
			$totalRows_loard = mysql_num_rows($loard);
		echo mysql_error();
		//Full Texts  	tbl_top_managersId 	fullNames 	positionTitle 	Contacts 	Rank 	imagePath
?>
	  <?php echo "  <table width='100%' border='0' cellpadding='2' cellspacing='2'>
       <tr><td colspan='5'  class='title1'>Top Management</td></tr>
		  <tr> "; ?>
            <?php 
			$count=0;
			while ($rows=mysql_fetch_array($loard)) { 

				$positionTitle=$rows['positionTitle'];
				$fullNames=$rows['fullNames'];
				$Contacts=$rows['Contacts'];
				$imagePath=$rows['imagePath'];
				$image="";
				if($imagePath!="")$image="<img class='passPic' align='left' src='Admin/".$imagePath."'/>";
				else $image="<img class='passPic' align='left' src='Admin/images/spacer.gif'/>";
				
			if ($count%3==0) echo "</tr> <tr> ";
			
            echo "<td class='greydata'> ";
			if ($totalRows_loard!=0) { 
			echo "<table width='150' border='0' align='center'>
                <tr   align='center'> 
                  <td height='100'>".$image."</td>
                </tr>
                <tr   align='center' class='bold'> 
                  <td height='40' class='passContent' > ".$fullNames."</td>
                </tr>
                <tr   align='center'> 
                  <td height='20'  class='passContent' align='right'>".$positionTitle."<br>"./* $Contacts.*/"</td>
                </tr>
              </table>"; } echo "</td>";
            $count=$count+1; } 
         echo" </tr>
        </table>";

}

