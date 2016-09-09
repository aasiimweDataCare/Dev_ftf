
<?php

select i.indicator_id,i.indicator_name, i.subcomponent_id,r.year,s.subact_id,s.subactivity_code,s.subactivity_name,r.total
 

   from tbl_organizationreporting r inner join tbl_indicator i
     on(r.indicator_id=i.indicator_id) left join tbl_subactivity s on(i.subactivity_id=s.subact_id) 
where i.subcomponent_id='4' 
AND  r.year like '2011%' 
and s.subactivity_code like '4.2.1.3%' and i.indicator_id='56542'
 order by subactivity_code,i.indicator_name asc





select i.indicator_id,i.indicator_name, i.subcomponent_id,r.year,s.subact_id,s.subactivity_code,s.subactivity_name,
 
 count(r.total), sum(r.total),max(r.total),min(r.total),avg(r.total)
   from tbl_organizationreporting r inner join tbl_indicator i
     on(r.indicator_id=i.indicator_id) left join tbl_subactivity s on(i.subactivity_id=s.subact_id) 
where i.subcomponent_id='4' 
AND  r.year like '2011%' 
and s.subactivity_code like '4.2.1.3%' and i.indicator_id='56542'
  group by i.indicator_id order by subactivity_code,i.indicator_name asc











select i.indicator_id,i.indicator_name,i.subcomponent_id,r.year,r.reportingPeriod,s.subact_id,s.subactivity_code,s.subactivity_name,
   at.ptotal,max(at.ptotal),
 count(r.total), sum(r.total),max(r.total),min(r.total),avg(r.total)
   from tbl_indicator i inner join tbl_annualTarget at on(i.indicator_id=at.indicator_id) 
   inner join tbl_organizationreporting r on(i.indicator_id=r.indicator_id) left join tbl_subactivity s on(i.subactivity_id=s.subact_id) 
where i.subcomponent_id='4' 
AND  r.year like '2011%' 
and s.subactivity_code like '4.2.1.3%' and i.indicator_name like '%'
  group by i.indicator_id order by subactivity_code,i.indicator_name asc

















 if(($_SESSION['half_year']=='') and($_SESSION['year']<>'')){
 
  $sql="select tr.indicator_id,tr.year,sc.subcomponent_code,sc.subcomponent,sc.id,o.output_code,o.output_name,a.activity_code,a.activity_name,
  i.indicator_name,s.subactivity_name,s.subactivity_code,i.subactivity_id,
  

min(at.ptotal) as totalcummulativetarget, max(tr.total) as totalcummulativeactual,
   round(IFNULL(max(tr.total),0)/IFNULL(min(at.ptotal),0)*100,0) as ccfPercentageAchieved
 
  from tbl_organizationreporting  tr left join tbl_indicator i on(tr.indicator_id=i.indicator_id) 
  left join tbl_subactivity s on(i.subactivity_id=s.subact_id)
   left join tbl_subcomponent sc on(sc.id=i.subcomponent_id)
   left join tbl_output o on(o.output_id=i.output_id) 
  left join tbl_activity a on(a.activity_id=i.activity_id)
    left join view_cross_annualtarget at on(tr.indicator_id=at.indicator_id)
 where sc.id like '".$_SESSION['usersubcomponent']."%' and
 i.indicator_name like '".$_SESSION['indicator_110']."%'
 && sc.subcomponent like '".$_SESSION['ccfsubcomponent']."%'
 && o.output_name like '".$_SESSION['ccfoutput']."%' 
 && a.activity_name like '".$_SESSION['ccfactivity']."%'
 && s.subactivity_name like '".$_SESSION['ccfsubactivity']."%'
 group by tr.indicator_id having tr.year = ".$_SESSION['year']."  order by s.subactivity_code,i.indicator_name asc";
 
 
 
 
 
 
 }
 
 
 
 else if(($_SESSION['half_year']<>'') and($_SESSION['year']<>'')){
 
 

 $sql="select tr.indicator_id,sc.subcomponent_code,sc.id,sc.subcomponent,o.output_code,o.output_name,a.activity_code,a.activity_name,
  i.indicator_name,s.subactivity_name,s.subactivity_code,i.subactivity_id,
  tr.year,tr.reportingPeriod,tr.half_year,

max(at.total_target) as totalcummulativetarget, max(tr.total) as totalcummulativeactual,
   round(IFNULL(max(tr.total),0)/IFNULL(max(at.total_target),0)*100,0) as ccfPercentageAchieved
 
  from tbl_organizationreporting  tr left join tbl_indicator i on(tr.indicator_id=i.indicator_id) 
  left join tbl_subactivity s on(i.subactivity_id=s.subact_id)
   left join tbl_subcomponent sc on(sc.id=i.subcomponent_id)
   left join tbl_output o on(o.output_id=i.output_id) 
  left join tbl_activity a on(a.activity_id=i.activity_id)
    left join view_cross_annualtarget at on(tr.indicator_id=at.indicator_id)
 where 
 sc.id like '".$_SESSION['usersubcomponent']."%' and
 i.indicator_name like '".$_SESSION['indicator_110']."%'
 && sc.subcomponent like '".$_SESSION['ccfsubcomponent']."%'
 && o.output_name like '".$_SESSION['ccfoutput']."%' 
 && a.activity_name like '".$_SESSION['ccfactivity']."%'
 && s.subactivity_name like '".$_SESSION['ccfsubactivity']."%' and 
 tr.reportingPeriod like  '".$_SESSION['ccfquarter']."%' 
 
  and tr.half_year like '".$_SESSION['half_year']."%'
 group by tr.indicator_id  having tr.year like '".$_SESSION['year']."%'
   order by s.subactivity_code,i.indicator_name asc";


}


else if(($_SESSION['half_year']<>'') or ($_SESSION['year']<>'')){
 
 

 $sql="select tr.indicator_id,sc.subcomponent_code,sc.id,sc.subcomponent,o.output_code,o.output_name,a.activity_code,a.activity_name,
  i.indicator_name,s.subactivity_name,s.subactivity_code,i.subactivity_id,
  tr.year,tr.reportingPeriod,tr.half_year,

max(at.total_target) as totalcummulativetarget, max(tr.total) as totalcummulativeactual,
   round(IFNULL(max(tr.total),0)/IFNULL(max(at.total_target),0)*100,0) as ccfPercentageAchieved
 
  from tbl_organizationreporting  tr left join tbl_indicator i on(tr.indicator_id=i.indicator_id) 
  left join tbl_subactivity s on(i.subactivity_id=s.subact_id)
   left join tbl_subcomponent sc on(sc.id=i.subcomponent_id)
   left join tbl_output o on(o.output_id=i.output_id) 
  left join tbl_activity a on(a.activity_id=i.activity_id)
    left join view_cross_annualtarget at on(tr.indicator_id=at.indicator_id)
 where 
 sc.id like '".$_SESSION['usersubcomponent']."%' and
 i.indicator_name like '".$_SESSION['indicator_110']."%'
 && sc.subcomponent like '".$_SESSION['ccfsubcomponent']."%'
 && o.output_name like '".$_SESSION['ccfoutput']."%' 
 && a.activity_name like '".$_SESSION['ccfactivity']."%'
 && s.subactivity_name like '".$_SESSION['ccfsubactivity']."%' and 
 tr.reportingPeriod like  '".$_SESSION['ccfquarter']."%' 
 and tr.year like '".$_SESSION['year']."%'
  and tr.half_year like '".$_SESSION['half_year']."%'
 group by tr.indicator_id 
   order by s.subactivity_code,i.indicator_name asc";


} 














CREATE OR REPLACE VIEW view_cross_annualtarget AS
SELECT at.p_id, at.year, at.indicator_id, at.baseline, q.quarterCode, q.quarterName,
CASE WHEN q.quarterCode = '1'
THEN at.pquarter1
WHEN q.quarterCode = '2'
THEN at.pquarter2
WHEN q.quarterCode = '3'
THEN at.pquarter3
WHEN q.quarterCode = '4'
THEN at.pquarter4
END AS total_target, q.semi_annual, at.ptotal total_target1
FROM tbl_quarters q
JOIN tbl_annualtarget at 


 
select i.indicator_id,sc.id as subcomponent_id,sc.subcomponent_code,sc.subcomponent,o.output_id,o.output_code,o.output_name,a.activity_id,a.activity_code,a.activity_name,i.indicator_name,r.year,s.subact_id,s.subactivity_code,s.subactivity_name,i.gender,

max(if((i.gender='Adult Male') or (i.gender='Male Youth')  ,at.ptotal,'')) as TotalAnnualMaletargets,
max(if((i.gender='Adult Male') or (i.gender='Male Youth'),r.total,'')) as TotalMaleAnnualActuals,
round(IFNULL(max(if((i.gender='Adult Male') or (i.gender='Male Youth'),r.total,'')),0)/IFNULL(max(if((i.gender='Adult Male') or (i.gender='Male Youth'),at.ptotal,'')),0)*100,2) as percentageMaleAnnualActualvsTargets,

max(if((i.gender='Adult Female') or (i.gender='Female Youth'),at.ptotal,'')) as TotalAnnualFemaleTargets,
max(if((i.gender='Adult Female') or (i.gender='Female Youth'),r.total,'')) as TotalFemaleAnnualActuals,
round((IFNULL(max(if((i.gender='Adult Female') or (i.gender='Female Youth'),r.total,'')),0)/IFNULL(max(if((i.gender='Adult Female') or (i.gender='Female Youth'),at.ptotal,'')),0))*100,2) as percentageFemaleAnnualActualvsTargets ,
max(if((i.gender=''),at.ptotal,'')) as otherTotalAnnualTargets,
max(if((i.gender=''),r.total,'')) as otherTotalAnnualActuals,
round((IFNULL(max(if((i.gender=''),r.total,'')),0)/IFNULL(max(if((i.gender=''),at.ptotal,'')),0))*100,2) as percentageOtherAnnualActualvsTargets
,max(at.ptotal) as totalAnnualtarget,
max(r.total) as TotalAnnualActuals,
round(IFNULL(max(r.total),0)/IFNULL(max(at.ptotal),0)*100,2) as percentageActualvsTargets
from tbl_indicator i inner join tbl_annualTarget at on(i.indicator_id=at.indicator_id) inner join tbl_subactivity s on(i.subactivity_id=s.subact_id) inner join tbl_subcomponent sc on(sc.id=i.subcomponent_id) inner join tbl_output o on(o.output_id=i.output_id) inner join tbl_activity a on(a.activity_id=i.activity_id) inner join  tbl_organizationreporting r on(i.indicator_id=r.indicator_id) where r.year like '%' and s.subactivity_name like '%' and s.subactivity_code like '1.1.2.2%' and sc.subcomponent like '%' and o.output_name like '%' and a.activity_name like '%' group by i.indicator_id,r.year order by subactivity_code,i.indicator_name asc



$new_entry=($_SESSION['role']<>'Monitoring and Evaluation')?"":





 if($_SESSION['usersubcomponent']<>''){
$query=mysql_query("select * from tbl_subcomponent where id like '".$_SESSION['usersubcomponent']."%' order by subcomponent_code asc")or die(mysql_error());
while($row=mysql_fetch_array($query)){
#$sel=($_SESSION['subcomponent1']==$row['subcomponent'])?"SELECTED":"";
$data.="<option value='".$row['subcomponent']."' >".$row['subcomponent_code']." ".$row['subcomponent']."</option>";
				
					  } }
					  else {
					  $data.="<option value=''>-All-</option>";







";
	
	if($_SESSION['usersubcomponent']<>''){
$query=mysql_query("select * from tbl_subcomponent where id like '".$_SESSION['usersubcomponent']."%' order by subcomponent_code asc")or die(mysql_error());
while($row=mysql_fetch_array($query)){
#$sel=($_SESSION['subcomponent1']==$row['subcomponent'])?"SELECTED":"";
$data.="<option value=\"".$row['subcomponent']."\" >".$row['subcomponent_code']." ".$row['subcomponent']."</option>";
				
					  } }
					  else {
					  $data.="<option value=''>-All-</option>";
##==========================pagination-================================
$data.="<tr align='right'><td colspan='6'>";

$num_links=10;
$startAt_links=($cur_page-5);
$endAt_links=($cur_page+$num_links);
$cur_link=$cur_page;


if($num_pages>1){
$links=1;
		$append_bar=$p==$num_pages?"":"|";
	if ($cur_page==1)$data.="<a href='#' onclick=\"xajax_view_district('".$distcode."','".$district."','".$acronym."','1','".$records_per_page."')\"><font color=red><b>1</b></font>\n</a>...".$append_bar;
	else $data.="<a href='#' onclick=\"xajax_view_district('".$distcode."','".$district."','".$acronym."','1','".$records_per_page."')\">1\n</a>...".$append_bar;
	//for($p=2;$p<$num_pages;$p++){
	$p=2;
	while($p<$num_pages){
if(($p>$startAt_links) and ($p<$endAt_links)){
		$data.=$p==$cur_page?"<font color=red><b>".$p."</b></font>".$append_bar:"<a href='#' onclick=\"xajax_view_district('".$distcode."','".$district."','".$acronym."','".$pp."','".$records_per_page."')\">".$p."\n</a>".$append_bar;
	}
	$p++;
	}
	if($p==$num_pages){
			$data.="...<a href='#' onclick=\"xajax_view_district('".$distcode."','".$district."','".$acronym."','".$pp."','".$records_per_page."')\">".$p."\n</a>".$append_bar;
			}
}

$data.=" Records: <select name='num_rec' id='num_rec' onchange=\"xajax_view_district('".$distcode."','".$district."','".$acronym."','".$cur_page."',this.value)\">";
	$i=1;
	$selected="";
	while($i*10<=$max_records){
		$selected=$i*10==$records_per_page?"SELECTED":"";
		$data.="<option value='".($i*10)."' ".$selected.">".($i*10)."</option>";
		$i++;
	}
	//$feedback->addAlert($max_records."-->".($i*10));
	$sel=$records_per_page>=$max_records?"SELECTED":"";
	$data.="<option value='".$max_records."' ".$sel.">All</option>";
	$data.="</select>";
	$data.="</br></td></tr> 












<td align='center' bgcolor='#0000000'>";
style='background-color:#ff0000;'


if(($row2['Quarter1']!==0) and ($quarter=='Jan - Mar')){$data.="<img src='icons/tick_icon.png' width='16' height='16' onclick=\"xajax_view_valueChainDevelopment('".$row2['org_code']."','".$row2['orgName']."','','','');\">";
}else if(($row2['quarter1']==0) and ($quarter=='Jan - Mar')){
$data.="<img src='icons/cross_shield_icon.png'  onclick=\"xajax_view_valueChainDevelopment('".$row2['org_code']."','".$row2['orgName']."','','','');\">";
}else if(($row2['quarter1']==0) and ($quarter!=='Jan - Mar')){
$data.="<img src='icons/cross_shield_icon.png'  onclick=\"return alert('The Selected Quarter is not Set For Reporting');\">";
}else{

$data.="<img src='icons/cross_shield_icon.png'  onclick=\"return alert('The Selected Quarter is not Set For Reporting');return false;\">";
}
$data."</td><td align='center' bgcolor='#ff0000'>";


if(($row2['Quarter2']!==0) and ($quarter=='Apr - Jun')){$data.="<img src='icons/tick_icon.png' width='16' height='16' onclick=\"xajax_view_valueChainDevelopment('".$row2['org_code']."','".$row2['orgName']."','','','');return false;\">";
}else if(($row2['quarter2']==0) and ($quarter=='Apr - Jun')){
$data.="<img src='icons/cross_shield_icon.png'  onclick=\"xajax_view_valueChainDevelopment('".$row2['org_code']."','".$row2['orgName']."','','','');return false;\">";
}else if(($row2['quarter2']==0) and ($quarter!=='Apr - Jun')){
$data.="<img src='icons/cross_shield_icon.png'  onclick=\"return alert('The Selected Quarter is not Set For Reporting');return false;\">";
}else{

$data.="<img src='icons/cross_shield_icon.png'  onclick=\"return alert('The Selected Quarter is not Set For Reporting');return false;\">";
}
$data."</td><td align='center'>";






if(($row2['Quarter3']!==0) and ($quarter=='Jul - Sep')){$data.="<img src='icons/tick_icon.png' width='16' height='16' onclick=\"xajax_view_valueChainDevelopment('".$row2['org_code']."','".$row2['orgName']."','','','');return false;\">";
}else if(($row2['quarter3']==0) and ($quarter=='Jul - Sep')){
$data.="<img src='icons/cross_shield_icon.png'  onclick=\"xajax_view_valueChainDevelopment('".$row2['org_code']."','".$row2['orgName']."','','','');return false;\">";
}else if(($row2['quarter3']==0) and ($quarter!=='Jul - Sep')){
$data.="<img src='icons/cross_shield_icon.png'  onclick=\"return alert('The Selected Quarter is not Set For Reporting');return false;\">";
}else{

$data.="<img src='icons/cross_shield_icon.png'  onclick=\"return alert('The Selected Quarter is not Set For Reporting');return false;\">";
}
 
 
$data."</td><td align='center'>";

 if(($row2['Quarter4']!==0) and ($quarter=='Oct - Dec')){$data.="<img src='icons/tick_icon.png' width='16' height='16' onclick=\"xajax_view_valueChainDevelopment('".$row2['org_code']."','".$row2['orgName']."','','','');return false;\">";
}else if(($row2['quarter4']==0) and ($quarter=='Oct - Dec')){
$data.="<img src='icons/cross_shield_icon.png'  onclick=\"xajax_view_valueChainDevelopment('".$row2['org_code']."','".$row2['orgName']."','','','');return false;\">";
}else if(($row2['quarter4']==0) and ($quarter!=='Oct - Dec')){
$data.="<img src='icons/cross_shield_icon.png'  onclick=\"return alert('The Selected Quarter is not Set For Reporting');return false;\">";
}else{

$data.="<img src='icons/cross_shield_icon.png'  onclick=\"return alert('The Selected Quarter is not Set For Reporting');return false;\">";
}
 
  
 $data.="</td>

















<?php
//nested ternary operator
echo ($X > $Y)  ?   "X is greater then Y" 
   : (($X < $Y) ?   "Y is greater then X" 
   :                "X and Y has the same value")
   ;  



$querysubcomponent=mysql_query("select * from tbl_subcomponent order by id asc") or die(http(3343));
				while($rowsubcomponent=mysql_fetch_array($querysubcomponent)){
				#$checked=(strpos($row['subcomponent'], "Value Chain Development") !==false)?"CHECKED":"";
				$checked=(strpos($row['subcomponent'], $rowsubcomponent['subcomponent']) !==false)?"CHECKED":"";
				#$checked=(strpos($row['subcomponent'], "Value Chain Development") !==false)?"CHECKED":"";
				#$checked=(strpos($row['subcomponent'], "Value Chain Development") !==false)?"CHECKED":"";
				#$checked=(strpos($row['subcomponent'], "Value Chain Development") !==false)?"CHECKED":"";
				$data.="<tr><td> <input type='checkbox' '".$checked."'   name='subcomponent[]' id='checkbox8' value='".$rowsubcomponent['subcomponent']."' /></td><td>".$rowsubcomponent['subcomponent_code']."  ".$rowsubcomponent['subcomponent']."</td></tr>";
				
				}










<tr class=evenrow2>
    <td>Action</td><td colspan=><input type='button' value='Back' title='Close' onclick=\"xajax_view_subcomponent('','','','')\"  /> | <input type='button' value='Print'  title='print' onclick=\"print();\"  /> </td>


  </tr>



$data.="<tr class=$color>
     
    <td colspan=4><input type='button' onclick=\"multiCheckBox('checked');return false;\" value='check all' /> |<input type='button' onclick=\"multiCheckBox('');\" value='uncheck all' />  <input type='button' value='Delete' name='Delete' class='redhdrs' src='icons/delete_icon.png' TITLE='Delete' width='16' height='16' onclick=\"xajax_delete_programme(xajax.getFormValues('programme'));return false;\"  /></td>
    
	 <td></td>
<td></td>

   

  </tr>";
$data.="</table></div></form>";



#error------msgs----------------------
function register($fname,$lname,$salutation,$profession,$username,$pass,$cpass,$country,$region,$city,$phone,$email,$cksafe,$ckdiabetes,$ckhighbp,$disease,$blood_grp,$age,$weight,$code,$vcode){
	$obj = new xajaxResponse();
	$error = "<ul>";
	$erCount=0;
	if($fname==""){
		$error .="<li>First Name Missing!</li>";
		$erCount++;
	}
	if($lname==""){
		$error .="<li>Last Name Missing!</li>";
		$erCount++;
	}
	if($username==""){
		$error .="<li>Username Missing!</li>";
		$erCount++;
	}
	if($pass==""){
		$error .="<li>Password Missing!</li>";
		$erCount++;
	}
	if(strlen($username)<6){
		$error .="<li>Username too short!</li>";
		$erCount++;
	}
	if(strlen($username)>10){
		$error .="<li>Username too long!</li>";
		$erCount++;
	}
	if(strlen($pass)<6){
		$error .="<li>Password too short!</li>";
		$erCount++;
	}
	if(strlen($pass)>10){
		$error .="<li>Password too long!</li>";
		$erCount++;
	}
	if($phone!=""){
		if(!is_valid_phone($phone)){
		$error .="<li>Invalid phone number!</li>";
		$erCount++;
	}
	}
if($email!=""){
if(!is_valid_email($email)){
	$error .='<li>Wrong email address!</li>';
	$erCount++;
}
}
$p = crypt("xy",$pass);
if($pass!=$cpass){
$error .='<li>Password Mismatch!</li>';
$erCount++;
}
if(strtolower($code)!=strtolower($vcode)){
	$error .="<li>Wrong activation code!</li>";
	$erCount++;
}
$error .="</ul>";
if($erCount > 0){
	$obj->addAssign("status","innerHTML",errorMsg($error));
	$obj->addScriptCall("xajax_registerForm",$fname,$lname,$salutation,$profession,$username,$pass,$cpass,$country,$region,$city,$phone,$email,$cksafe,$ckdiabetes,$ckhighbp,$disease,$blood_grp,$age,$weight);
	return $obj;
}
if(pg_query("insert into users(fname,lname,profession,region,country,salutation,username,password,telephone,email) values('$fname','$lname','$profession','$region','$country','$salutation','$username','$p','$phone','$email')")){
$id = pg_fetch_array(pg_query("select max(id) as id from users"));
if($cksafe=="false"&&($ckdiabetes=="true"||$ckhihgbp=="true")){
pg_query("insert into victim (user_id,disease,blood_group,age,weight) values(".$id['id'].",'$disease','$age','$blood_grp','$weight')");
}
$obj->addAssign("status","innerHTML","<font color ='orange' size=''><h1>Congratulations!</h1><h2> ".$fname."</h2></font><br/><h3> Your account has been created successfully!</h3>");
$data="<a href='ntclogin.php'><h4>Click here</h4></a><h4> to login.</h4>";
$obj->addAssign("bodyDisp","innerHTML",$data);
}
	return $obj;
}













$selectTotal="select  fa.year,sum(a.ftotal) as TotalSumannualtarget,sum(fa.amount) as TotalSumFinancialActualAmount from tbl_subactivity s inner join  tbl_subcomponent sc on(sc.id=s.subcomponent_id) inner join tbl_activity aa on(aa.activity_id=s.activity_id) left join  tbl_annualbudget  a on(a.subactivity_id=s.subact_id) left join tbl_financialactuals fa on(s.subact_id=fa.subactivity_id) where sc.subcomponent like '".$_SESSION['Resultsubcomponent']."%' and aa.activity_name like '".$_SESSION['Resultactivity']."%' and s.subactivity_name like '".$_SESSION['Resultsubactivity']."%' and fa.year like '".$year."%' and fa.reportingPeriod like '".$quarter."%' group by fa.reportingPeriod,  asc ";
  #$obj->addAlert($select);
  $QUERYTOTAL=mysql_fetch_array(mysql_query($selectTotal))or die("Http Error-code 1232 because ".mysql_error());
  
  
  $data.="<tr class='evenrow'>
    <td colspan=3><b>Total</b></td>
   
    <td align='right'><b>".number_format($QUERYTOTAL['TotalSumannualtarget'])."</b></td>
    <td align='right'><b>".number_format($QUERYTOTAL['TotalSumFinancialActualAmount'])."</b></td>
   
    <td>&nbsp;</td>
  </tr>
</table>";









<tr>
        <td>Verification Code </td>
        <td    width='174'><table width='159' border='0' align='center'>
          <tr>
            <td bgcolor='#f0e5a5' background='images/pub.jpg'>";
			$code = generateCode(6);
              $data.="<font color='#990000' size='4' face ='palatino linotype'><b>".$code."</b></font>
              <input type='hidden' name='code'  size='30' id='code' value='".$code."' /></td>
          </tr></table>
		  
		  
		  </td><td></td></tr>



 $color=$n%2==1?"evenrow":"white";

 style='border-right:1px solid #d6dff7;border-left:1px solid #d6dff7;border-bottom:1px solid #d6dff7;'
 <tr class='evenrow'>
  <td colspan=2>Sub-Component:</td><td colspan=3><select name='subcomponent' id='subcomponent'>
      <option value=''>-ALL-</option>";
	$sel2=mysql_query("select * from tbl_subcomponent order by subcomponent_code")or die("aBi Error-code 285 because ".mysql_error());
	while($row2=mysql_fetch_array($sel2)){
	$s23=($_SESSION['Resultsubcomponent3']==$row2['subcomponent'])?"SELECTED":"";
	$data.="<option value='".$row2['subcomponent']."' '".$s23."'>".$row2['subcomponent_code']." ".substr($row2['subcomponent'],0,30)."</option>";
	}
	
	
    $data.="</select></td>
    <td colspan='2' scope='col' width=''  align='right'>Output:</td><td colspan='4'>
	<div style='float:left;'><select name='output' id='output'>
      <option value=''>-ALL-</option>";
	$sel=mysql_query("select * from tbl_output group by output_code order by output_code")or die("aBi Error-code 297 because ".mysql_error());
	while($row1=mysql_fetch_array($sel)){
	$s33=($_SESSION['Resultoutput3']==$row1['output_name'])?"SELECTED":"";
	$data.="<option value='".$row1['output_name']."' '".$s33."'>".$row1['output_code']." ".substr($row1['output_name'],0,40)."</option>";
	
	
	}
	
	
    $data.="</select></td> <td scope='col'></td>
  </tr>
 
 <tr class='evenrow'>
  <td colspan=2>Activity:</td><td colspan=3><select name='activity' id='activity'>
      <option value=''>-ALL-</option>";
	$sel2=mysql_query("select * from tbl_activity order by activity_code")or die("aBi Error-code 285 because ".mysql_error());
	while($row2=mysql_fetch_array($sel2)){
	$s24=($_SESSION['Resultactivity3']==$row2['activity_name'])?"SELECTED":"";
	$data.="<option value='".$row2['activity_name']."' '".$s24."'>".$row2['activity_code']." ".substr($row2['activity_name'],0,30)."</option>";
	}
	
	
    $data.="</select></td>
    <td colspan='2' scope='col' width=''  align='right'>Sub-Activity</td><td colspan='4'>
	<div style='float:left;'><select name='subactivity' id='subactivity'>
      <option value=''>-ALL-</option>";
	$sel=mysql_query("select indicator_id,indicator_name,subactivity_name,subactivity_code from view_indicator_target_actual group by subactivity_code order by subactivity_code")or die("aBi Error-code 297 because ".mysql_error());
	while($row1=mysql_fetch_array($sel)){
	$s=($_SESSION['Resultsubactivity3']==$row1['subactivity_name'])?"SELECTED":"";
	$data.="<option value='".$row1['subactivity_name']."' '".$s."'>".$row1['subactivity_code']." ".substr($row1['subactivity_name'],0,40)."</option>";
	
	
	}
	
	
    $data.="</select></td> <td scope='col'><div align='left'>
      <input type='button' name='search' id='button' value='Go' onclick=\"xajax_view_quarterlyResults(getElementById('project_quarter').value,getElementById('project_year').value,getElementById('subcomponent').value,getElementById('output').value,getElementById('activity').value,getElementById('subactivity').value);\" />
    </div></td>
  </tr>
 









<a href='program_monitoring.php?linkvar=view Organizational Actuals&&action=Program Montoring&&orgcode=".$row2['org_code']."'>

style='background:#ff0000;'
<form name='users' id='users'  method='post' action='".$PHP_SELF."' >



<a href='export_to_excel_word.php?linkvar=Export Programme&&programme=".$_SESSION['programme']."&&funder=".$_SESSION['funder']."&&format=excel'><input type='button' name='export' value='Export to Excel' /></a>



$data.="<tr class=evenrow2>
              <td colspan=''>Programme</td>
              <td colspan='2'><select name='programme' id='programme' onchange=\"xajax_new_ABTrustBasedIndicatorPlanning('abi trust',getElementById('programme').value)\">
                <option value='%'>-All-</option>";
				$q=mysql_query("select * from tbl_programme order by prog_id asc")or die("aBi Error-code:197 because, ".mysql_error());
				while($row=mysql_fetch_array($q)){
				$sel=($programme==$row['prog_id'])?"SELECTED":"";
				$data.="<option value='".$row['prog_id']."'  '".$sel."'>".$row['program_name']."</option>";
				
				}
              $data.="</select>     </td>
            </tr>



<tr>

    <th scope='col' colspan='2'>Sub-component</th><th colspan=3>
      <select name='subcomponent' size='1' id='subcomponent'>";
	  $query=mysql_query("select * from tbl_subcomponent order by id asc")or die(mysql_error());
	  while($row=mysql_fetch_array($query)){
	  
	  $data.="<option value='".$row['id']."'>".$row['subcomponent']."</option>";
	  }
	  
	  $data.="</select>
    </th>
   
  </tr>
align=right bgcolor='#669900'


#back javascript
<a href=javascript:
history.back(1)>

//check all

$data.="<tr class=$color>
     
    <td colspan=4><input type='button' onclick=\"multiCheckBox('checked');return false;\" value='check all' /> |<input type='button' onclick=\"multiCheckBox('');\" value='uncheck all' /> | <img src='icons/edit_icon.png' TITLE='Edit'  onclick=\"xajax_edit_programmeAll(xajax.getFormValues('programme'));return false;\" width='16' height='16' />| <img src='icons/delete_icon.png' TITLE='Delete' width='16' height='16' onclick=\"xajax_delete_programme(xajax.getFormValues('programme'));return false;\"  /></td>
    
	 <td></td>
<td></td>

   

  </tr>";
$data.="</table></div></form>";


//edit checkall


$data.="<tr class=$color>
     
    <td colspan=4><input type='button' onclick=\"multiCheckBox('checked');return false;\" value='check all' /> |<input type='button' onclick=\"multiCheckBox('');\" value='uncheck all' /> | <input type='button' TITLE='Edit'  onclick=\"xajax_edit_programmeAll(xajax.getFormValues('programme'));return false;\" value='edit' />| <input type='button' TITLE='Delete'  onclick=\"xajax_delete_programme(xajax.getFormValues('programme'));return false;\" value='Delete' class='redhdrs' /></td>
    
	 <td></td>
<td></td>

   

  </tr>";
$data.="</table></div></form>";

//div back button
<div style='float:right;'><input name='back'  value='Back' onclick=\"xajax_view_component()\" type='button' /></div>


#form
<form name='subactivity1' id='subactivity1'><div id='records'>

// for loop

 for($m=0;$m<count($formvalues['subcomponent_id']);$m++){
 $id=$formvalues['subcomponent_id'][$m];

//access rights

if($_SESSION['role']<>'Monitoring and Evaluation'){
$feedback->addAlert("Access Denied! Only Monitoring and Evaluation officer can Delete a programme!");
return $feedback;

}


/*
$gender=$rowi['disagreggation'];
			 $genderDisagreggated2="<td bordercolor='#FF9933'><input name='male[]' readonly=readonly class='evenrow' disabled='disabled' type='text' id='male".$m."' size='10' onKeyPress=\"return numbersonly(event, false)\"/></td>
              <td bordercolor='#FF9933'><input name='female[]' type='text' id='female".$m."' size='10' readonly=readonly  disabled='disabled' class='evenrow' onKeyPress=\"return numbersonly(event, false)\" /></td>
              <td bordercolor='#FF9933'><input name='maleyouth[]' type='text' id='maleyouth".$m."' size='10'readonly=readonly disabled='disabled' class='evenrow' onKeyPress=\"return numbersonly(event, false)\" /></td>
			  <td bordercolor='#FF9933'><input name='femaleyouth[]' type='text' id='femaleyouth".$m."' size='10' readonly=readonly disabled='disabled' onKeyPress=\"return numbersonly(event, false)\" class='evenrow' /></td>";
			 $genderDisagreggated="<td bordercolor='#FF9933'><input name='male[]' type='text'  id='male".$m."' size='10' onKeyPress=\"return numbersonly(event, false)\"/></td>
              <td bordercolor='#FF9933'><input name='female[]' type='text' id='female".$m."' size='10' onKeyPress=\"return numbersonly(event, false)\" /></td>
              <td bordercolor='#FF9933'><input name='maleyouth[]' type='text' id='maleyouth".$m."' size='10' onKeyPress=\"return numbersonly(event, false)\" /></td>
			  <td bordercolor='#FF9933'><input name='femaleyouth[]' type='text' id='femaleyouth".$m."' size='10' onKeyPress=\"return numbersonly(event, false)\" /></td>";
			 $sex=($gender=="Yes")?$genderDisagreggated:$genderDisagreggated2; 
			 
			 
			 
			 
			 
			 
			 
			 
			 
			 if($_SESSION['role']=='Managing Director')
		$data.="";
		else if($_SESSION['role']=='Chief Technical Advisor')
		$data.="";
		else
		$data.="<input type='button' name='newentry' value='Add Organization' onclick=\"xajax_new_organization();return false;\">";
			 
			 
			 
			 
			 
			 




















 $data.="<option value='aBi Trust%' '".$selected."' >aBi Trust</option>
					 <option value='Results Based%' '".$selected."' >Results Based</option>
					 <option value='Sub-Activity Based%' '".$selected."' >Sub-Activity Based</option>";



//updateaaaaaa


/*  $data.="<tr class=evenrow2>
              <td colspan='2'>Indicator Type:
                <label></label></td>
              <td colspan='6'><select name='planning_type' id='planning_type' onchange=\"xajax_reload_newActivityBasedPlanning(getElementById('planning_type').value)\">";
			if($_SESSION['activity']!='')
			$data.="<option value='".$_SESSION['activity']."'>".$_SESSION['activity']."</option>";
$data.="<option value=''>-Select-</option>"; 
$query=mysql_query("select distinct(indicator_type) from tbl_indicator group by indicator_type order by indicator_type asc")or die(mysql_error());
while($row=mysql_fetch_array($query)){
$data.="<option value='".$row['indicator_type']."'>".$row['indicator_type']."</option>";
				
					  }  
$data.="</select></td>
        </tr>
		<tr class=evenrow>
              <td colspan='2'>Sub-component:
                <label></label></td>
              <td colspan='6'><select name='subcomponent' id='subcomponent' onchange=\"xajax_reload_newProjectLifeTarget_subcomponent(getElementById('subcomponent').value)\">";
			  if($_SESSION['PLTsubcomponent_id']!='')
$data.="<option value='".$_SESSION['PLTsubcomponent_id']."'>".$_SESSION['PLTsubcomponent_code']." ".$_SESSION['PLTsubcomponent']."</option>";

else
$data.="<option value=''>-Select-</option>"; 
$query=mysql_query("select * from tbl_subcomponent order by subcomponent_code asc")or die(mysql_error());
while($row=mysql_fetch_array($query)){
$data.="<option value='".$row['id']."'>".$row['subcomponent_code']." ".$row['subcomponent']."</option>";
				
					  }  
$data.="</select></td>
        </tr>
<tr style='display:none;'>
              <td colspan='2'>Outputs
                <label></label></td>
              <td colspan='6'><select name='output' >";
			    if($_SESSION['PLTsubcomponent_id']!='')
					  $query=mysql_query("select * from tbl_output where subcomp_id='".$_SESSION['PLTsubcomponent_id']."' order by output_code asc")or die(mysql_error());
					  while($row=mysql_fetch_array($query)){
					  $data.="<option value='".$row['output_id']."'>".$row['output_code']." ".$row['output_name']."</option>";
					  }
					
					  $data.="
              </select></td>
            </tr>";
           
			
            $data.="<tr class=evenrow2>
              <td colspan='2'>Period</td>
              <td colspan='6'><select name='period' id='period'>
                <option value='4'>4Yrs</option>
              </select>              </td>
            </tr>";*/

function update_programme($formvalues){
$obj=new xajaxResponse();
$prog_id=$formvalues['prog_id'];
$x="select * from tbl_programme where prog_id='".$prog_id."'";

$select=mysql_query($x)or die(mysql_error());
if(mysql_num_rows($select)>0){
$obj->AddConfirmCommands(1,"Do You really Want to Update?");
$obj->AddScriptCall('xajax_updateProgramme2',$formvalues);
}
$obj->addAssign('bodyDisplay','innerHTML',$data);
return $obj;
}

function updateProgramme2($formvalues){
$obj=new xajaxResponse();
$prog_id=$formvalues['prog_id'];
$pname=$formvalues['pname'];
$pfunder=$formvalues['pfunder'];
$imp_org=$formvalues['imp_org'];
$pdesc=$formvalues['pdescription'];
$x="update tbl_programme set program_name='$pname',Funder='$pfunder',imp_org='$imp_org',details='$pdesc' where prog_id='$prog_id'";
$obj->addAlert($x);

@mysql_query($x)or die(mysql_error());
$obj->addAssign('bodyDisplay','innerHTML',congMsg("Programme Details Updated"));
$obj->AddScriptCall("xajax_programme_details",$prog_id);
return $obj;
}


//check all
$data.="<tr class=$color>
     
	  <td></td>
	  <td><input type='checkbox' name='test[]' value='select_all' onClick='selectAll(this.form)'/></td>
    <td colspan=2><a href='#' >Check All</a> | <img src='icons/edit_icon.png' TITLE='Edit' width='16' height='16'>| <img src='icons/delete_icon.png' TITLE='Delete' width='16' height='16'></td>
    <td></td>
	 <td></td>

   

  </tr>
  
</table></form>";




function update_organization($orgcode,$orgName,$qncode,$accronym,$address,$boxno,$tel,$fax,$email,$website,$cp,$cptel,$cpemail,$cppositn,$yrfounded,$rd1,$regno,$yearofreg,$renewal,$level,$operation,$type){
$obj=new xajaxResponse();
//if($_SESSION['role']<>'Admin'){
//$obj->AddAlert("Access Denied!\n Only the Administator can edit an item");
//$obj->addRedirect('index.php');
//return $obj;
//}
$check=mysql_query("select * from tblorganizationheader where orgCode='".$orgcode."'")or die("Unaso-Error code 00832.".mysql_error());
if(@mysql_num_rows($check)>0){
$obj->AddConfirmCommands(1,"Do You really Want to Update?");
$obj->AddScriptCall('xajax_updateorganization',$orgcode,$orgName,$qncode,$accronym,$address,$boxno,$tel,$fax,$email,$website,$cp,$cptel,$cpemail,$cppositn,$yrfounded,$rd1,$regno,$yearofreg,$renewal,$level,$operation,$type);
}
$obj->addAssign('bodyDisplay','innerHTML',$data);
return $obj;

}

function updateorganization($orgcode,$orgName,$qncode,$accronym,$address,$boxno,$tel,$fax,$email,$website,$cp,$cptel,$cpemail,$cppositn,$yrfounded,$rd1,$regno,$yearofreg,$renewal,$level,$operation,$type){
$object=new xajaxResponse();
mysql_query("UPDATE tblorganizationheader SET orgName='".$orgName."',questionnaireCode='".$qncode."',orgAbbreviation='".$accronym."',orgPhysicalAddress='".$address."',orgBoxNumber='".$boxno."',orgTelephone='".$tel."',orgFax='".$fax."',orgEmail='".$email."',orgWebsite='".$website."',orgContactPerson='".$cp."',orgContactPersonTelephone='".$cptel."',orgContactpersonEmail='".$cpemail."',orgContactPersonPosition='".$cppositn."',orgYearFounded='".$yrfounded."',orgLegallyRegistered='".$rd1."',orgRegistrationNumber='".$regno."',orgYearOfRegistration='".$yearofreg."',orgRecentRenewal='".$renewal."',orgLevelOfRegistration='".$level."',LevelOfOperation='".$operation."',orgTypeCode='".$type."' where orgCode='".$orgcode."'")or die('UNASO-Error code 0870'.mysql_error());

$object->addAssign('bodyDisplay','innerHTML',"<div align='center' class='green'>Organizational Details changed Successfully!</div>");
$object->AddScriptCall("xajax_view_all",$orgcode);
return $object;
}





$querter=quarter(date(m));



 ///<td><img src='icons/dashboard_icon.png' title='graph' onclick=\"xajax_show_graph(getElementById('indicator_name').value)\" id='graphs' name='graph' value='".$row['indicator_id']."' /></td>



 $selected=$row5['section_id']==$row2['section']?"SELECTED":"";
  $data.="<option value='".$row5['section_id']."' '".$selected."'>".$row5['sect_name']."</option>";


#resuable codes
 <select name='org_name' id='org_name'><option value='%'>-All-</option>";
	 $query=mysql_query("select * from tbl_organization where orgName <> '' order by orgName asc ")or die(mysql_error());
  while($row=mysql_fetch_array($query)){
  $data.="<option value='".$row['orgName']."%'>".substr($row['orgName'],0,30)."</option>";
   }
      $data.="
      </select>
	  
	  
	  
	  <div align='left'>
      <select name='location' id='location'><option value='%'>-All-</option>
        ";
	 $query=mysql_query("select * from tbl_district order by districtName asc ")or die(mysql_error());
  while($row=mysql_fetch_array($query)){
  $data.="
        <option value='".$row['districtName']."%'>".$row['districtName']."</option>
        ";
   }
      $data.="</select>
    </div>
	
	
	
	
	
	$data.="<table width='600' border='0'>
   <tr>
    <td colspan='2' class='green_field' >Program Monitoring &raquo; View Branches</td>
    
    <td colspan='4' class=green_field ><div align='right'>
      <input name='' type='button' value='Export to Excel' /> 
      <input name='new_branch' type='button' value='New Branch' onclick=\"xajax_new_branch()\"/>
    </div></td>
  </tr>
  <tr>
    <td colspan='4'><hr></td>
  </tr>
    <tr><th scope='col'><div align='left'>Year </div></th>
    <th colspan='' scope='col'><div align='left'>
      <select name='year' id='year'>";
	  
	    $yr = date(Y); $end = $yr; do{
$data.="<option value='".$end."'>".$end."</option>";
$end--;} while ($end>= 2010);

      $data.="
      </select>
    </div></th>
    <th width='102' scope='col'><div align='left'>Reporting Period </div></th>
    <th width='' colspan='' scope='col'><select name='reportingperiod' id='reportingperiod'>";
	
	  $query1=mysql_query("select * from tbl_organizationreporting group by reportingPeriod order by reportingPeriod")or die(mysql_error());
	  while($row2=mysql_fetch_array($query1)){
	  $data.="<option value='".$row2['reportingPeriod']."'>".$row2['reportingPeriod']."</option>";
	  }
	  
     $data."</select>    </th>
  </tr>
  <tr>
    <th scope='col'><div align='left'>Branch</div></th>
    <th width='' colspan='' scope='col'><div align='left'>Organization</div></th>
    <th scope='col'><div align='left'></div></th>
    <th colspan='2' scope='col'><div align='left'>Location</div></th>
  </tr>
  
  <tr>
    <th><div align='left'>
      <select name='branch' id='branch'><option value='%'>-All-</option>";
	 $query=mysql_query("select * from tbl_branch order by branch_name asc ")or die(mysql_error());
  while($row=mysql_fetch_array($query)){
  
  $data.="<option value='".$row['branch_name']."%'>".$row['branch_name']."</option>";
   }
      $data.="</select>
    </div></th>
    <th colspan=''><div align='left'>
     
    </div></th>
    <th colspan='2'></th>
  </tr>
  <tr>
    <th><div align='left'>Northings</div></th>
    <th align=left><input name='northings' type='text' id='northings' size='25' /></th>
    <th width='107'><div align='left'>Eastings</div></th>
    <th><div align='left'>
      <input name='eastings' type='text' id='eastings' size='25' />
    </div></th>
   <th><input type='button' name='button' id='button' value='Go' onclick=\"xajax_search_branch(getElementById('branch').value,getElementById('org_name').value,getElementById('location').value,getElementById('northings').value,getElementById('eastings').value)\" /></th>
  </tr>
  
</table>
";





 $inc=1;
 $query=mysql_query()or die(mysql_error())
  while($row=mysql_fetch_array($query)){ 
   $color=$n%2==1?"evenrow":"white";
  $data.="<tr class=$color>
  
  
  //<fieldset><legend>".$row['activity_code']." ".$row['activity_name']."</legend>$data.="<>
  
  //onFocus="startCalc();" onBlur="stopCalc();" onKeyPress="return numbersonly(event, false)"
  
  
  <select name='' size='1'><option value=''>-Select-</option></select>
  
  
  $yr = date(Y); $end = $yr; do{
$data.="<option value='$end'>".$end."</option>";
$end--;} while ($end>= 2010);
 
 
 
  $query=mysql_query("select * from tbl_organizationreporting order by reportingPeriod")or die(mysql_error());
	  while($row2=mysql_fetch_array($query)){
	  $data.="<option value='".$row2['reportingPeriod']."'>".$row2['reportingPeriod']."</option>";
	  }
	  
	  
	  
function edit_subactivity($subactivity_id){
$obj=new xajaxResponse();
$query=mysql_query("select * from tbl_subactivity where subact_id='".$subactivity_id."'")or die(mysql_error());
while($row=mysql_fetch_array($query)){

$data="<form name='subactivity' id='subactivity' method='post'><table border='0'>
 <tr>
    <td colspan='2' class='green_field'>Setup &raquo; New Sub-activity</td></tr>
  <tr>
  <tr>
    <td colspan='2'><hr/></td></tr>
  <tr>
  <tr>
    <td colspan='2'><div id='status'></td></tr>
	<tr>
    <td>Programme</td>
    <td><select name='saprogramme' id='saprogramme'>";
       $query=mysql_query('select * from tbl_programme order by program_name')or die(mysql_error());
					while($rowp=mysql_fetch_array($query)){
					$selected=$rowp['prog_id']==$row['prog_id']?"SELECTED":"";
					$data.="<option value='".$rowp['prog_id']."' '".$selected."'>".$rowp['program_name']."</option>";
					
					}  
					   
    $data.="</select></td>
  </tr>
 
  <tr>
    <td>Component</td>
    <td><select name='sacomponent' id='sacomponent'>";
   $queryc=mysql_query("select component_code as code,component from tbl_component")or die(mysql_error());
   while($rowc=mysql_fetch_array($queryc)){
  $selected=$rowc['id']==$row['id']?"SELECTED":"";
   $data.="<option value='".$rowc['id']."' '".$selected."'>".$rowc['component']."</option>";
   }
					      
			//		   
    $data.="</select></td>
  </tr>";
 $data.="<tr>
    <td>Sub-Component</td>
    <td><select name='sasubcomponent' id='sasubcomponent' onchange=\"xajax_dynamicfilter_subactivity_editing(getElementById('sasubcomponent').value)\">";
      if($_SESSION['esasubcomponent_id']!=NULL)
	   
$data.="<option value='".$_SESSION['esasubcomponent_id']."'>".$_SESSION['esasubcomponent_code']."  ".$_SESSION['esasubcomponent_id']."</option>";					

else 
$data.="<option value=''>-select-</option>";
$querysc = mysql_query("select * from tbl_subcomponent  order by subcomponent_code ASC")or die(mysql_error());
 while($rowsc=mysql_fetch_array($querysc)){
 			 $selected2=$rowsc['id']==$row['subcomponent_id']?"SELECTED":"";
$data.="<option value='".$rowsc['id']."' '".$selected2."'>".$rowsc['subcomponent_code']."  ".$rowsc['subcomponent']."</option>";
}

					   
					     
					  
    $data.="</select>    </td>
  </tr>";
 
  $data.="<tr>
    <td>Output </td>
    <td>
     <select name='saoutput' id='saoutput' onchange=\"xajax_dynamicfilter_output_editing('".$_SESSION['esasubcomponent_id']."',getElementById('saoutput').value)\">";
	 
	  if($_SESSION['esasubcomponent_id']!=''){

	   $queryo=@mysql_query("select * from tbl_output where subcomp_id='".$_SESSION['esasubcomponent_id']."' order by output_code  asc")or die(mysql_error());
						  while($rowo=mysql_fetch_array($queryo)){
						  $sel=$rowo['output_id']==$row['output_id']?"SELECTED":"";
					$data.="<option value='".$rowo['output_id']."' '".$sel."'>".$rowo['output_code']."  ".$rowo['output_name']."</option>";	   
					
						 } } else{
						 $data.="<option value=''>-Select-</option>";
						 $queryOO=@mysql_query("select * from tbl_output  order by output_code  asc")or die(mysql_error());
						  while($rowOO=mysql_fetch_array($queryOO)){
						  $sel=$rowOO['output_id']==$row['output_id']?"SELECTED":"";
					$data.="<option value='".$rowOO['output_id']."' '".$sel."'>".$rowOO['output_code']."  ".$rowOO['output_name']."</option>";
						 
						 }} 
	 $data.="</select>
    </td>
  </tr>";
  
  $data.="<tr>
                    <td>Activity</td>
                    <td><select name='saactivity'  id='saactivity'>"; 
					if($_SESSION['esasubcomponent_id']&& $_SESSION['esaoutput_id']!=''){
					$querya=mysql_query("select * from tbl_activity where subcomp_id='".$_SESSION['esasubcomponent_id']."' order by activity_code asc")or die(mysql_error());
						  while($rowa=mysql_fetch_array($querya)){
						  $selected=$rowa['activity_id']==$row['activity_id']?"SELECTED":"";
					$data.="<option value='".$rowa['activity_id']."' '".$selected."' >".$rowa['activity_code']."  ".$rowa['activity_name']."</option>";	   
			
						 }}
						 else{
						 $querya1=mysql_query("select * from tbl_activity order by activity_code asc")or die(mysql_error());
						  while($rowa1=mysql_fetch_array($querya1)){
						  $selected=$rowa1['activity_id']==$row['activity_id']?"SELECTED":"";
					$data.="<option value='".$rowa1['activity_id']."' '".$selected."' >".$rowa1['activity_code']."  ".$rowa1['activity_name']."</option>";	   
						 
						 
						 } }
						$data.="</select></td>
                  </tr>";
				 
                  $data.="<tr>
                    <td>Sub-activity Code</td>
                    <td><input type='hidden' name='subactivity_id' class='' id='subactivity_id' size='43' value='".$row['subact_id']."' /><input type='text' name='subactivity_code' class='' id='subactivity_code' value='".$row['subactivity_code']."' size='43' /> e.g 2.1.1.1</td>
                  </tr>
                  <tr>
                    <td>Sub-activity Name </td>
                    <td><label>
                      <input name='subactivity_name' type='text' class='' id='subactivity_name' value='".$row['subactivity_name']."' size='43' />
                    </label></td>
                  </tr>
				  <tr>
                    <td>Implementer </td>
                    <td><textarea name='responsible' id='responsible' cols='40' rows='5'>".$row['responsible']."</textarea>
                    </label></td>
                  </tr>
				  <tr>
                    <td>Responsible</td>
                    <td><label>
                      <textarea name='implementer' id='implementer' cols='40' rows='5'>".$row['implementer']."</textarea>
                    </label></td>
                  </tr>
                  
				 
				  <tr>
         <td>Remarks</td>
        <td><textarea name='sadetails' id='sadetails' cols='40' rows='5'>".$row['description']."</textarea></td>
  </tr><tr>
    <td>&nbsp;</td>
    <td><div align='right'>
      <p>
        <input type='button' name='output' id='output' value='Save' onclick=\"xajax_update_subactivity(xajax.getFormValues('subactivity'))\">
        </p>
      </div></td>
  </tr>
				  
</table></form>"; 
}
$obj->addAssign('bodyDisplay','innerHTML',$data);
return $obj;
}







$_SESSION['indicatorType']


////abi	else if($_SESSION['indicatorType']=="aBi Trust"){
	//$obj->addScriptCall("xajax_add_abiTrustIndicator",$_SESSION['indicatorType']);
	//return $obj;
	
$data="<table width='400' border='0'>
<tr><td colspan='' class='green_field'>Setup &raquo; New Indicator (Logframe Standard) </td><TD align=right><input name='dced' type='button' value='DCED Standard' onclick=\"xajax_add_indicatorDCED()\"/></TD></tr>
<tr><td colspan='2'><hr/></td></tr>
<tr><td colspan='2'><div id='status'></div></td></tr>
      <tr>
        <td>
          <form action='".$PHP_SELF."' name='indicator' id='indicator'>
            <table width='535' border='0'>
              <tr>
                <td colspan='3'>
                  <table border='0'>
                    <tr>
                      <td>Programme</td>
                      <td><select name='prog_id' id='prog_id'>
                        ";
					  $query=mysql_query('select * from tbl_programme order by program_name')or die(mysql_error());
					 while($row=mysql_fetch_array($query)){
					   $data.="<option value='".$row['prog_id']."'>".$row['program_name']."</option>";
				
					   }
					      
					  $data.="</select></td>
                    </tr>
                   <tr>
                      <td>Component</td>
                      <td><select name='component' id='component'>
					  ";
					  $query=mysql_query('select * from tbl_component order by component')or die(mysql_error());
					 while($row=mysql_fetch_array($query)){
					   $data.="<option value='".$row['id']."'>".$row['component']."</option>";
				
					   }
					      
					  $data.="
					  
                      </select></td>
                    </tr>
					 <tr>
                      <td>Type of Indicator</td>
                      <td><select name='type_ofindicator' id='type_ofindicator' onchange=\"xajax_check_indicatorType(getElementById('type_ofindicator').value);\">
					  ";
					  if($_SESSION['indicatorType']!='')
					  $data.="<option value='".$_SESSION['indicatorType']."'>".$_SESSION['indicatorType']."</option>";
					else
					$data.="<option value=''>-select-</option>";
				$queryi=mysql_query("select * from tbl_lookup where classCode=2 order by code asc ")or die(mysql_error());
					  while($rowi=mysql_fetch_array($queryi)){
					  //$selected=$_SESSION['indicatorType']==$rowi['codeName']?"SELECTED":"";
					 // if($_SESSION['indicatorType']!='')$data.="<option value='".$_SESSION['indicatorType']."'>".$_SESSION['indicatorType']."</option>";
					 $data.="<option value='".$rowi['codeName']."' '".$selected."'>".$rowi['codeName']."</option>";
					 }
						      
							      
					  $data.="			  
                      </select></td>
                    </tr>
					 <tr>
                      <td>Sub-Component</td>
                      <td><select name='sub_component' id='sub_component' >";
					    if($_SESSION['indsubcomponent_id']!='')
	
	$data.="<option value='".$_SESSION['indsubcomponent_id']."'>".$_SESSION['indsubcomponent_code']." ".$_SESSION['indsubcomponent']."</option>";
	
	else
	$data.="<option value=''>-Select-</option>"; 
      
					  $query = mysql_query("select * from tbl_subcomponent order by subcomponent_code ASC")or die(mysql_error());
					 while($row=mysql_fetch_array($query)){
$data.="<option value='".$row['id']."'>".$row['subcomponent_code']."  ".$row['subcomponent']."</option>";
					   } 
					      
					  $data.="
					  
                      </select></td>
                    </tr>
                   <tr>
					<td></td>
                      <td colspan='1'  align='left' width='300' ><table width='300' border='0'>
  <tr>
    <th scope='col'>No.</th>
    <th scope='col'>Physical Target/Item </th>
    <th scope='col'>Indicator </th>
	<th scope='col' colspan='' width='150'>Disagregated by Gender</th>
  </tr>
  <tr>
    <td>1 <input name='loopkey[]' type='hidden' value='1' /></td>
    <td><input name='target[]' type='text' id='target' size='20' /></td>
    <td><input name='indicator[]' type='text' id='indicator1' size='30' /></td>
	<td><input name='gender[]' type='checkbox' value='Yes'/> Yes </td>
	
  </tr>
   <td>2 <input name='loopkey[]' type='hidden' value='1' /></td>
    <td><input name='target[]' type='text' id='target2' size='20' /></td>
    <td><input name='indicator[]' type='text' id='indicator2' size='30' /></td>
	<td><input name='gender[]' type='checkbox' value='Yes'/> Yes </td>
	 
  </tr>
   </tr>
   <td>3 <input name='loopkey[]' type='hidden' value='1' /></td>
    <td><input name='target[]' type='text' id='target3' size='20' /></td>
    <td><input name='indicator[]' type='text' id='indicator3' size='30' /></td>
	<td><input name='gender[]' type='checkbox' value='Yes'/> Yes </td>
  </tr>
</table>
</td>
                    
                   
					 <tr>
                      <td>Indicator Definition</td>
                      <td><textarea name='definition' id='definition' cols='55' rows='5'></textarea></td>
                    </tr>
                    <tr>
                      <td>&nbsp;</td>
                      <td></td>
                    </tr>
					<tr>
                      <td colspan=2><input name='dced_mapping' id='dced_mapping' type='checkbox' value='DCED' onclick=\"xajax_DCED_mapping()\" />DCED Mapping</td>
                     
                    </tr>
					<tr>
                      <td colspan='2'><div id='DCED'></div></td>
                     
                    </tr>
                  </table>
          </td>
                <td width='28'>&nbsp;</td>
              </tr>
              <tr>
                <td width='165'>&nbsp;</td>
                <td width='255'>&nbsp;</td>
                <td width='69'><input type='button' name='save_indicator' id='button' value='Save' onclick=\"xajax_save_indicator(xajax.getFormValues('indicator'));\" /></td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td colspan='4'></td>
              </tr>
            </table>
          </form>
        </td>
      </tr>
    </table>";

	
	
	
	/* function DCED_mapping(){
$obj=new xajaxResponse();

  $query=mysql_query("select * from tbl_indicator where indicator_id='".$indicator_id."'")or die(mysql_error());
      while($row=mysql_fetch_array($query)){
$data="<table width='400' border='0'>
<tr><td colspan='' class='green_field'>Setup &raquo; New Indicator (DCED Standard) </td></tr>
<tr><td colspan=''><hr/></td></tr>
<tr><td colspan=''><div id='status'></div></td></tr>
      <tr>
        <td>
          <form action='".$PHP_SELF."' name='indicator' id='indicator' method='post'>
            <table width='535' border='0'>
              <tr>
                <td colspan='3'>
                  <table border='0'>
                    
					<tr>
                      <td>Intervention:</td>
                      <td><select name='intervention' id='intervention'><option value=''>-Select-</option>
					  ";
					  $query1=mysql_query('select * from tbl_intervention order by intervention asc')or die(mysql_error());
					 while($row1=mysql_fetch_array($query1)){
					   $data.="<option value='".$row1['intervention_id']."'>".$row1['intervention']."</option>";
				
					   } 
					      
					  $data.="
					  
                      </select></td>
                    </tr>
						<tr>
                      <td>Results Chain Level:</td>
                      <td><select name='resultschain_level' 'resultschain_level'><option value=''>-Select-</option>
					  ";
					   $query2=mysql_query('select * from tbl_resultschain order by name asc')or die(mysql_error());
					 while($row2=mysql_fetch_array($query2)){
					   $data.="<option value='".$row2['rc_id']."'>".$row2['name']."</option>";
				
					   } 
					      
					  $data.="
					  
                      </select></td>
                    </tr>
                    <tr>
                      <td>Sub-Component</td>
                      <td><select name='sub_component' id='sub_component' onchange=\"xajax_dynamicfilter_indicatorDCED(getElementById('sub_component').value)\">";
					   if($_SESSION['indsubcomponent_id']!='')
	
	$data.="<option value='".$_SESSION['indsubcomponent_id']."'>".$_SESSION['indsubcomponent_code']." ".$_SESSION['indsubcomponent']."</option>";
	
	else 
	$data.="<option value=''>-Select-</option>"; 
      
					 $query3 = mysql_query("select * from tbl_subcomponent order by subcomponent_code ASC")or die(mysql_error());
					 while($row3=mysql_fetch_array($query3)){
$data.="<option value='".$row3['id']."'>".$row3['subcomponent_code']."  ".$row3['subcomponent']."</option>";
					   }  
					      
					  $data.="
					  
                      </select></td>
                    </tr>
					 <tr>
                      <td>Output</td>
                      <td><select name='output_id'  id='output_id' \">
					   ";
						   if($_SESSION['indsubcomponent_id'] && $_SESSION['indoutput_id']!='')
						 $data."<option value='".$_SESSION['indoutput_id']."'>".$_SESSION['indoutput_code']." ".$_SESSION['indoutput_name']."</option>"; 
						else  
			
						$data."<option value=''>-select-</option>";
						 $query4=@mysql_query("select * from view_output where subcomponent_id='".$_SESSION['indsubcomponent_id']."'  order by output_code aSC")or die(mysql_error());
					
						  while($row4=mysql_fetch_array($query4)){
					$data.="<option value='".$row4['output_id']."'>".$row4['output_code']." ".$row4['output_name']."</option>";	   
					}
					 
					 
						 
						 $data.="
                      </select></td>
                    </tr>
                    <tr>
                      <td>Activity</td>
                      <td><select name='activity' id='activity'>";
					    if($_SESSION['indsubcomponent'] && $_SESSION['indoutput'] && $_SESSION['activity_id']!='')
					  $data."<option value='".$_SESSION['indactivity_id']."'>".$_SESSION['indactivity_code']."".$_SESSION['indactivity_name']."</option>";
					  else
					  $data.="<option value=''>-Select-</option>"; 
					  $query5=mysql_query("select * from tbl_activity where subcomp_id='".$_SESSION['indsubcomponent_id']."' order by activity_code asc")or die(mysql_error());
					 while($row5=mysql_fetch_array($query)){
					 $_SESSION['act_id']=$row5['activity_id'];
					   $data.="<option value='".$row5['activity_id']."'>".$row5['activity_code']." ".$row5['activity_name']."</option>";
				
					   } 
					      /* $query21=mysql_query("select * from tbl_activity where output_id='4' order by activity_code asc")or die(mysql_error());
						    while($row21=mysql_fetch_array($query21)){
							
							 $data.="<option value='".$row21['activity_id']."'>".$row21['activity_code']." ".$row21['activity_name']."</option>";
							}  */
						/*    
					  $data.="
                      </select></td>
                    </tr>
                    <tr>
                      <td>Sub-activity</td>
                      <td><select name='subactivity' id='subactivity'><option value=''>-Select-</option>"; */
					  //if($_SESSION['indsubcomponent']&& $_SESSION['indoutput_id'] && $_SESSION['activity_id']!='')
					  /* $data."<option value='".$_SESSION['indsubactivity_id']."'>".$_SESSION['indsubactivity_code']."".$_SESSION['indsubactivity_name']."</option>";
					  else  * */ 
					    
					 //subactivity_code like '".$_SESSION['subactivity_code']."%'
					  
					  
					//$select2="select * from tbl_subactivity where output_id='".$_SESSION['indoutput_id']."' order by subactivity_code asc";/* 
					 /*  $select="select * from tbl_subactivity where subcomponent_id='".$_SESSION['indsubcomponent_id']."%' order by subactivity_code asc";
					  $q=mysql_query($select)or die(mysql_error());
					 //$obj->addAlert($select2);
					 while($rowq=mysql_fetch_array($q)){
					   $data.="<option value='".$rowq['subact_id']."'>".$rowq['subactivity_code']." ".$rowq['subactivity_name']."</option>";
				
					  }  
					      
					  $data.="
                      </select></td>
                    </tr>
                    <tr>
                      <td>Physical Target</td>
                      <td><input name='target' type='text' id='target' size='60' value='".$row['physical_target']."' /></td>
                    </tr>
					<tr>
                      <td>Indicator Name</td>
                      <td><input name='indicator' type='text' id='indicator' size='60' value='".$row['indicator_name']."' /></td>
                    </tr>
					
                    <tr>
                      <td>&nbsp;</td>
                      <td></td>
                    </tr>
                  </table>
          </td>
                <td width='28'>&nbsp;</td>
              </tr>
              <tr>
                <td width='165'>&nbsp;</td>
                <td width='255'>&nbsp;</td>
                <td width='69'><input type='button' name='save_indicator' id='button' value='Save' onclick=\"xajax_save_DCEDindicator(xajax.getFormValues('indicator'));\" /></td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td colspan='4'></td>
              </tr>
            </table>
          </form>
        </td>
      </tr>
    </table>";} */ 
	//$obj->addAlert($data);
/*$obj->addAssign('DCED','innerHTML',$data);
return $obj;
}
 */

	
}





/* 
function add_indicatorDCED($indicator){
$obj=new xajaxResponse();
$query=mysql_query("select * FROM  view_indicator where indicator_id='".$indicator."'")or die(mysql_error());
$bj->addAlert($query);
while($row=mysql_fetch_array($query)){
$data="<table width='400' border='0'>
<tr><td colspan='' class='green_field'>Setup &raquo; New Indicator (DCED Standard) </td></tr>
<tr><td colspan=''><hr/></td></tr>
<tr><td colspan=''><div id='status'></div></td></tr>
      <tr>
        <td>
          <form action='".$PHP_SELF."' name='indicator' id='indicator' method='post'>
            <table width='535' border='0'>
              <tr>
                <td colspan='3'>
                  <table border='0'>
                    <tr>
                      <td>Programme</td>
                      <td><select name='prog_id' id='prog_id'>
                        ";
					  $query=mysql_query('select * from tbl_programme order by program_name')or die(mysql_error());
					 while($row=mysql_fetch_array($query)){
					   $data.="<option value='".$row['prog_id']."'>".$row['program_name']."</option>";
				
					   }
					      
					  $data.="</select></td>
                    </tr>
                   <tr>
                      <td>Component</td>
                      <td><select name='component' id='component'>
					  ";
					  $query=mysql_query('select * from tbl_component order by component')or die(mysql_error());
					 while($row=mysql_fetch_array($query)){
					   $data.="<option value='".$row['id']."'>".$row['component']."</option>";
				
					   }
					      
					  $data.="
					  
                      </select></td>
                    </tr>
					<tr>
                      <td>Intervention:</td>
                      <td><select name='component' id='component'>
					  ";
					  $query=mysql_query('select * from tbl_intervention order by intervention asc')or die(mysql_error());
					 while($row=mysql_fetch_array($query)){
					   $data.="<option value='".$row['intervention_id']."'>".$row['intervention']."</option>";
				
					   }
					      
					  $data.="
					  
                      </select></td>
                    </tr>
						<tr>
                      <td>Results Chain Level:</td>
                      <td><select name='resultschain_level' 'resultschain_level'>
					  ";
					  $query=mysql_query('select * from tbl_resultschain order by name asc')or die(mysql_error());
					 while($row=mysql_fetch_array($query)){
					   $data.="<option value='".$row['rc_id']."'>".$row['name']."</option>";
				
					   }
					      
					  $data.="
					  
                      </select></td>
                    </tr>
                    <tr>
                      <td>Sub-Component</td>
                      <td><select name='sub_component' id='sub_component' onchange=\"xajax_dynamicfilter_indicatorDCED(getElementById('sub_component').value)\">";
					    if($_SESSION['indsubcomponent_id']!='')
	
	$data.="<option value='".$_SESSION['indsubcomponent_id']."'>".$_SESSION['indsubcomponent_code']." ".$_SESSION['indsubcomponent']."</option>";
	
	else
	$data.="<option value=''>-Select-</option>"; 
      
					  $query = mysql_query("select * from tbl_subcomponent order by subcomponent_code ASC")or die(mysql_error());
					 while($row=mysql_fetch_array($query)){
$data.="<option value='".$row['id']."'>".$row['subcomponent_code']."  ".$row['subcomponent']."</option>";
					   } 
					      
					  $data.="
					  
                      </select></td>
                    </tr>
					 <tr>
                      <td>Output</td>
                      <td><select name='output_id'  id='output_id' \">
					   ";
						  if($_SESSION['indsubcomponent_id'] && $_SESSION['indoutput_id']!='')
						 $data."<option value='".$_SESSION['indoutput_id']."'>".$_SESSION['indoutput_code']." ".$_SESSION['indoutput_name']."</option>"; 
						else 
			
						$data."<option value=''>-select-</option>";
						$query3=@mysql_query("select * from view_output where subcomponent_id='".$_SESSION['indsubcomponent_id']."'  order by output_code aSC")or die(mysql_error());
					
						  while($row=mysql_fetch_array($query3)){
					$data.="<option value='".$row['output_id']."'>".$row['output_code']." ".$row['output_name']."</option>";	   
					}
					
					 
						 
						 $data.="
                      </select></td>
                    </tr>
                    <tr>
                      <td>Activity</td>
                      <td><select name='activity' id='activity'>";
					   if($_SESSION['indsubcomponent'] && $_SESSION['indoutput'] && $_SESSION['activity_id']!='')
					  $data."<option value='".$_SESSION['indactivity_id']."'>".$_SESSION['indactivity_code']."".$_SESSION['indactivity_name']."</option>";
					  else 
					  $query=mysql_query("select * from tbl_activity where subcomp_id='".$_SESSION['indsubcomponent_id']."' order by activity_code asc")or die(mysql_error());
					 while($row=mysql_fetch_array($query)){
					 $_SESSION['act_id']=$row['activity_id'];
					   $data.="<option value='".$row['activity_id']."'>".$row['activity_code']." ".$row['activity_name']."</option>";
				
					   }/* 
					      $query2=mysql_query("select * from tbl_activity where output_id='4' order by activity_code asc")or die(mysql_error());
						    while($row=mysql_fetch_array($query2)){
							
							 $data.="<option value='".$row['activity_id']."'>".$row['activity_code']." ".$row['activity_name']."</option>";
							} 
						   
					  $data.="
                      </select></td>
                    </tr>
                    <tr>
                      <td>Sub-activity</td>
                      <td><select name='subactivity' id='subactivity'>";
					  //if($_SESSION['indsubcomponent']&& $_SESSION['indoutput_id'] && $_SESSION['activity_id']!='')
					  $data."<option value='".$_SESSION['indsubactivity_id']."'>".$_SESSION['indsubactivity_code']."".$_SESSION['indsubactivity_name']."</option>";
					  else  * 
					    
					 subactivity_code like '".$_SESSION['subactivity_code']."%'
					  
					  
					$select2="select * from tbl_subactivity where output_id='".$_SESSION['indoutput_id']."' order by subactivity_code asc";
					  $select="select * from tbl_subactivity where subcomponent_id='".$_SESSION['indsubcomponent_id']."%' order by subactivity_code asc";
					  $query=mysql_query($select)or die(mysql_error());
					 $obj->addAlert($select2);
					 while($row=mysql_fetch_array($query)){
					   $data.="<option value='".$row['subact_id']."'>".$row['subactivity_code']." ".$row['subactivity_name']."</option>";
				
					  } 
					      
					  $data.="
                      </select></td>
                    </tr>
                    <tr>
                      <td>Physical Target</td>
                      <td><input name='target' type='text' id='target' size='60' value='".$row['physical_target']."' /></td>
                    </tr>
					<tr>
                      <td>Indicator Name</td>
                      <td><input name='indicator' type='text' id='indicator' size='60' value='".$row['indicator_name']."' /></td>
                    </tr>
					
                    <tr>
                      <td>&nbsp;</td>
                      <td></td>
                    </tr>
                  </table>
          </td>
                <td width='28'>&nbsp;</td>
              </tr>
              <tr>
                <td width='165'>&nbsp;</td>
                <td width='255'>&nbsp;</td>
                <td width='69'><input type='button' name='save_indicator' id='button' value='Save' onclick=\"xajax_save_indicator(xajax.getFormValues('indicator'));\" /></td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td colspan='4'></td>
              </tr>
            </table>
          </form>
        </td>
      </tr>
    </table>";}
	$obj->addAlert($data);
$obj->addAssign('bodyDisplay','innerHTML',$data);
return $obj;
}
 */	  
	  
?>