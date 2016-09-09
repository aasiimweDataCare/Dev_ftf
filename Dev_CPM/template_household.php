<?php
require_once('connections/lib_connect.php');

$data.="<tbody class=\"household\">
							<tr class='evenrow'>";
							$data.="<td rowspan='3' valign='top'>1</td>";
							$data.="<td rowspan='3' valign='top'>
							<input type='hidden' name='loopkey[]' id='loopkey1' value='1'> 
							<input type='text' name='hhName[]' id='hhName1'></td>";
							
							$data.="<td rowspan='3' valign='top'>";
							$data.="<a href='javascript:void(0)'onclick=\"if(self.gfPop)gfPop.fPopCalendar(document.getElementById(getElementWithNameLike(this,'hhDob').attr('id')));return false;\" hidefocus=''>
							<input name='hhDob[]' type='text' size='20' value='' id='hhDob1'  style='width:85px;'>
							<img name='popcal' src='WeekPicker/calbtn.gif' alt='' align='absmiddle' border='0' height='22' width='30px'></a>";
							$data.="</td>";
							
							$data.="<td rowspan='3' valign='top'><select name='hhSex[]' id='hhSex1'>
								<option value=''>-select-</option>";
								$arrStatus=array('M','F');
									$k = 0; 
									foreach ($arrStatus as $var) {
										switch ($var) {
											case "M":
												$display='Male';
												break;
											case "F":
												$display='Female';
												break;
											default:
												$display='';
										}
										
										$data.="<option value=\"".$var."\">".$display."</option>";
										$k++;
									}
							  $data.="</select></td>";
							  
							$data.="<td rowspan='3' valign='top'>";
							$data.="<a href='javascript:void(0)'onclick=\"if(self.gfPop)gfPop.fPopCalendar(document.getElementById(getElementWithNameLike(this,'hhHeadDStart').attr('id')));return false;\" hidefocus=''>
							<input name='hhHeadDStart[]' type='text' size='20' value='' id='hhHeadDStart1'  style='width:85px;'>
							<img name='popcal' src='WeekPicker/calbtn.gif' alt='' align='absmiddle' border='0' height='22' width='30px'></a>";
							$data.="</td>";
							
							$data.="<td rowspan='3' valign='top'><input type='text' name='hhArea[]' id='hhArea1' onkeypress='return numbersonly(event, false)'></td>";
							
							//An array of possible hscomposition.
							$arrHs=array('noMaleOrFemale','maleAndFemale','femaleNoMale','childHeaded',);
									$k = 0; 
									foreach ($arrHs as $var) {
									$data.="<td rowspan='3' valign='top'><input type='radio' name='hsComposition1[]'  id='hsComposition1' value='".$var."'></td>";
									$k++;										
									}
								$data.="</tr>";	
								
								
								
								
								
								
								
								$data.="<tr class='evenrow'>";
							$data.="<td valign='top'>11</td>";
							$data.="<td valign='top'><input type='text' name='nameIndividual[]' id='nameIndividual1'></td>";
							
							$data.="<td valign='top'>";
							$data.="<a href='javascript:void(0)'onclick=\"if(self.gfPop)gfPop.fPopCalendar(document.getElementById(getElementWithNameLike(this,'memberDstart').attr('id')));return false;\" hidefocus=''>
							<input name='memberDstart[]' type='text' size='20' value='' id='memberDstart1'  style='width:85px;'>
							<img name='popcal' src='WeekPicker/calbtn.gif' alt='' align='absmiddle' border='0' height='22' width='30px'></a>";
							$data.="</td>";
						   
							$data.="<td valign='top'>";
							$data.="<a href='javascript:void(0)'onclick=\"if(self.gfPop)gfPop.fPopCalendar(document.getElementById(getElementWithNameLike(this,'farmersDob').attr('id')));return false;\" hidefocus=''>
							<input name='farmersDob[]' type='text' size='20' value='' id='farmersDob1' style='width:85px;'>
							<img name='popcal' src='WeekPicker/calbtn.gif' alt='' align='absmiddle' border='0' height='22' width='30px'></a>";
							$data.="</td>";
							
							$data.="<td valign='top'>";
								$data.="<select name='farmerSubcounty[]' id='farmerSubcounty1'  /> ";
								$data.="<option value=''>-select-</option>";
                                $query_thisUser1= "SELECT v.* FROM `tbl_villageagents` v WHERE v.`tbl_villageAgentId`='".$vaCode."'";
									$thisUser1 = @mysql_query($query_thisUser1) or die(mysql_error());
									while ($rows_sub=mysql_fetch_array($thisUser1))
									{
                                    $data.=$QueryManager->SubcountyFilterNoRegion($rows_sub['vAgentDistrict'],$rows_sub['vAgentSubcounty']);
									}
                                $data.="</select>";
                                $data.="</td>";
								
							$data.="<td valign='top'><input type='text' name='farmerVillage[]' id='farmerVillage1'></td>";
							$data.="<td valign='top'><p>
							  <select name='sexIndividual[]' id='sexIndividual1'>
								<option value=''>-select-</option>";
								$arrStatus=array('Male','Female');
									$k = 0; 
									foreach ($arrStatus as $var) {
										$data.="<option value=\"".$var."\">".$var."</option>";
										$k++;
									}
							  $data.="</select>
							</td>";
							$data.="<td valign='top'><input maxlength='13' value=\"+256\" type='text' name='telIndividual[]' id='telIndividual1'></td>";
							//Action table cell
							
							$data.="<td><input  type='button' class='formButton2'name='Remove Member' TITLE='Remove Member' value='Remove Member' onclick=\"removeMember(this)\" /></td>
						</tr>";
					$data.="<tr class='evenrow'><td valign='top' colspan='9'>
					<input  type='button' class='formButton2'name='Remove Household' TITLE='Remove Household' value='Remove Household' onclick=\"removeHousehold(this)\" />
					<input  type='button' class='formButton2'name='Add Member' TITLE='Add Member' value='Add Member' onclick='' /></td></tr>";	
					$data.="</tbody>";
echo $data;				
				?>