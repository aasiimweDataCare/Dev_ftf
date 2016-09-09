<?php




function export_AnnualSubActivityBasedWorkplan($linkvar,$activity1,$subcomponent,$output,$activity,$subactivity,$year,$format){

$n=1; $inc=1;
  $data.="<form name='valueChainDevelopment' id='valueChainDevelopment' method='post' action='".$PHP_SELF."' ><TABLE id=financial width=600 border=1>




            <tr class='black2'>
           
              <td colspan='11' class='evenrow2'>Sub Activity Based Annual WorkPlan</td>
             
            </tr>
            <tr class='black2'>
			
	
			<td width='50' class='evenrow2'>No.</td>
			
              <td colspan='2' class='evenrow2'>Name</td>
			    <td colspan='2' class='evenrow2' width='200'>Indicator </td>
				  <td width='150' class='evenrow2'>Baseline</td>
              <td width='150' class='evenrow2'>Quarter 1 (Jan-Mar)</td>
              <td width='150' class='evenrow2'>Quarter 2 (Apr-Jun)</td>
              <td width='150' class='evenrow2'>Quarter 3 (Jul-Sep)</td>
              <td width='150'  class='evenrow2'>Quarter 4 (Oct-Dec)</td>
			  			<td class='evenrow2' >Total</td>
              
            </tr>
  
  ";
  $SEL=mysql_query("select * from tbl_subcomponent order by subcomponent_code asc")or die("Unexpected http error-code 767 because, ".mysql_error());
  while($rows=mysql_fetch_array($SEL)){
    $data.=" <tr class='black2'>
			
	
			<td width='50' class='black2' align='right'><input type='hidden' name='' value='".$rows['id']."'><b>".$rows['subcomponent_code']."</b></td>
			
              <td colspan='11' class='black2'><b> ".$rows['subcomponent']."</b></td>
			  
            </tr>";
  
$select=mysql_query("select * from tbl_activity a join tbl_subcomponent s on(a.subcomp_id=s.id) where a.subcomp_id in('".$rows['id']."') order by s.subcomponent_code,a.activity_code asc") or die(mysql_error());
		   while($rowaa=mysql_fetch_array($select)){
		   $activity_id=$rowaa['activity_id'];
		   $activity_name=$rowaa['activity_name'];
		   $activity_code=$rowaa['activity_code'];
		     $subcomponent_id=$rowaa['subcomponent_id'];

		 
	
		  
$query=mysql_query("select distinct(activity_name),activity_code from  tbl_activity a join tbl_subcomponent s on(a.subcomp_id=s.id) where a.activity_id='".$activity_id."' order by s.subcomponent_code,a.activity_code asc")or die(mysql_error());
       while($rowa=mysql_fetch_array($query)){    
		      
		 
		  $data.=" <tr class='black2'>
			
	
			<td width='50' class='black2' align='right'><b>".$rowa['activity_code']."</b></td>
			
              <td colspan='11' class='black2'> <b>".$rowa['activity_name']."</b></td>
			  
            </tr>";
		 

			$x="select * from view_annualTarget where activity_id like '".$activity_id."%' && lower(indicator_type) like '".strtolower($activity1)."%' and lower(subcomponent) like '".strtolower($subcomponent)."%' && lower(output_name) like '".strtolower($output)."%' && lower(activity_name) like '".strtolower($activity)."%' and lower(subactivity_name) like '".strtolower($subactivity)."%' && year like '".$fyear."%' order by subcomponent_code,activity_code,subactivity_code asc";
			 $query1=mysql_query($x)or die(mysql_error());
			 
			 //$m=1;
		  while($rowi=mysql_fetch_array($query1)){
		     $m=$rowi['indicator_id'];
  $baseline=$rowi['baseline'];
		  $base=$baseline>0?$baseline:"0";
		   $quarter1=($rowi['pquarter1']!='')?"<td align=right>$rowi[pquarter1]</td>":"<td align=right>-</td>";
		   $quarter2=($rowi['pquarter2']!='')?"<td align=right>$rowi[pquarter2]</td>":"<td align=right>-</td>";
		     $quarter3=($rowi['pquarter3']!='')?"<td align=right>$rowi[pquarter3]</td>":"<td align=right>-</td>";
		   $quarter4=($rowi['pquarter4']!='')?"<td align=right>$rowi[pquarter4]</td>":"<td align=right>-</td>";
		   $color=$n%2==1?"evenrow":"white";
		  $l="align=right";
$data.="<tr >
 <td align=left><INPUT type=hidden name='indicator_idAll[]'  id='indicator_idAll' value='".$row['indicator_id']."' >
".$rowi['subactivity_code']."</td>

            <td colspan='2'> ".$rowi['subactivity_name']."</td>
			<td colspan='2' width='200'>$rowi[indicator_name]</td>
			<td align=right>$base</td>
            ".$quarter1."
    		".$quarter2."
			".$quarter3."
			".$quarter4."
			<td align=right ><strong>$rowi[ptotal]</strong></td>
			
          </tr>";
$inc++;
		 
	
	//$m++;
	}
		  $data.="";
		}  
		  }}
		
$data.="
  
  
</table></form>";		
export($format,$data);
}












 ?>