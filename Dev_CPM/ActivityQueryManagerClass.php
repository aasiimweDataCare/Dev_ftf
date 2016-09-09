<?php
//require_once('lib_sunrise.php');

class QueryManager{
 var $query;
 var $role;
function QueryManager($query){
$this->query;
}


function LOPTargets()
{
	switch($_SESSION['role'])
	{
		default:
					$x="SELECT w.`workplan_id` , i.subcomponent_id, i.output_id,
					 i.indicator_code, i.indicator_id, i.indicator_name,
					  i.`unitofmeasure` ,male,female,otherTargets, 
					  w.Target AS TotalTarget, i.`display` , 
					  i.typeofDisaggregation, i.`indicator_type`
						FROM tbl_indicator i
						LEFT JOIN `tbl_loptargets` w ON ( i.indicator_id = w.indicator_id )
						WHERE i.subcomponent_id LIKE '".$_SESSION['subcomponent_id']."%'
				 		and i.output_id like '".$_SESSION['output_id']."%'
				 		&& i.indicator_type LIKE '".$_SESSION['indicator_Type']."%'
				 		and i.indicator_name like '".$_SESSION['indicator']."%'
						GROUP BY i.indicator_id
						HAVING i.display  like 'Yes%' 
						ORDER BY i.indicator_code ASC";
	
	break;
	
	}
		return $x;





}


		function ViewAnnualTargets(){
					switch($_SESSION['role']){
					case pagination::roleMgt(0);
					//if($_SESSION['fyear']<>NULL){
/* $x="SELECT w.`workplan_id` , i.`indicator_id` ,i.subcomponent_id,i.output_id, i.indicator_code, 
i.indicator_id, i.indicator_name, w.`curr_year` , i.`baseline` , i.`unitofmeasure`,
   w.Target, i.`display`,i.typeofDisaggregation,i.`indicator_type`
FROM tbl_indicator i LEFT JOIN  `tbl_workplan` w
 ON ( i.indicator_id = w.indicator_id )

WHERE i.subcomponent_id LIKE '".$_SESSION['subcomponent_id']."%'
 and i.output_id like '".$_SESSION['output_id']."%'
 && i.indicator_type LIKE '".$_SESSION['indicator_type']."%'
 and i.indicator_name like '".$_SESSION['indicator']."%'
 OR w.curr_year like  '".$_SESSION['fyear']."%'
GROUP BY i.indicator_id
HAVING i.display like 'Yes%' 
ORDER BY i.indicator_id,i.indicator_code ASC"; */


$x="select w.workplan_id,i.indicator_type,i.indicator_id,i.indicator_code,i.indicator_name,
i.baseline,i.unitofmeasure,i.typeofDisaggregation,w.semi_annual,w.curr_year,
max(if(w.semi_annual='Apr - Sep' and w.curr_year='".currFinancialYear($year,'YearRange')."',w.male,'-')) as maleAprSep,
max(if(w.semi_annual='Apr - Sep' and w.curr_year='".currFinancialYear($year,'YearRange')."',w.female,'-')) as femaleAprSep,
max(if(w.semi_annual='Apr - Sep' and w.curr_year='".currFinancialYear($year,'YearRange')."',w.other,'-')) as otherAprSep,
max(if(w.semi_annual='Oct - Mar' and w.curr_year='".currFinancialYear($year,'YearRange')."',w.male,'-')) as maleOctMar,
max(if(w.semi_annual='Oct - Mar' and w.curr_year='".currFinancialYear($year,'YearRange')."',w.female,'-')) as femaleOctMar,
max(if(w.semi_annual='Oct - Mar' and w.curr_year='".currFinancialYear($year,'YearRange')."',w.other,'-')) as otherOctMar,
sum(if(w.curr_year='".$year."',w.Target,'-')) as totalAnnualTarget
 from  tbl_indicator i 
 left join tbl_workplan w on(i.indicator_id=w.indicator_id)
  where  i.subcomponent_id LIKE '".$_SESSION['subcomponent_id']."%'
 and i.output_id like '".$_SESSION['output_id']."%'
 && i.indicator_type LIKE '".$_SESSION['indicator_Type']."%'
 and i.indicator_name like '".$_SESSION['indicator']."%'
  and i.indicator_code like '".$_SESSION['indicatorCode']."%'
  group by i.indicator_id
  order by i.indicator_code asc";


//}
/* else

$x="SELECT w.`workplan_id` , i.`indicator_id` ,i.subcomponent_id,i.output_id, i.indicator_code, 
i.indicator_id, i.indicator_name, w.`curr_year` , w.`baseline` ,w.male,w.female,w.other, i.`unitofmeasure`,
   w.Target, i.`display`,i.typeofDisaggregation,i.`indicator_type`
FROM tbl_indicator i LEFT JOIN  `tbl_workplan` w
 ON ( i.indicator_id = w.indicator_id )

WHERE i.subcomponent_id LIKE '".$_SESSION['subcomponent_id']."%'
 and i.output_id like '".$_SESSION['output_id']."%'
 && i.indicator_type LIKE '".$_SESSION['indicator_type']."%'
 and i.indicator_name like '".$_SESSION['indicator']."%'

GROUP BY i.indicator_id
HAVING i.display like 'Yes%' 
ORDER BY i.indicator_code ASC"; 		
					
 */
break;
default:
					
			$x="SELECT w.`workplan_id` , i.`indicator_id` ,i.subcomponent_id,i.output_id, i.indicator_code, 
i.indicator_id, i.indicator_name, w.`curr_year` , w.`baseline` ,w.male,w.female,w.other, i.`unitofmeasure`,
   w.Target, i.`display`,i.typeofDisaggregation,i.`indicator_type`
FROM tbl_indicator i LEFT JOIN  `tbl_workplan` w
 ON ( i.indicator_id = w.indicator_id )

WHERE i.subcomponent_id LIKE '".$_SESSION['subcomponent_id']."%'
 and i.output_id like '".$_SESSION['output_id']."%'
 && i.indicator_type LIKE '".$_SESSION['indicator_type']."%'
 and i.indicator_name like '".$_SESSION['indicator']."%'

GROUP BY i.indicator_id
HAVING i.display like 'Yes%' 
ORDER BY i.indicator_code ASC"; 		
					
					
					
					}
		
		return $x;
		
		
		}


function view_AnnualResultsHO(){
					switch($_SESSION['role']){
					case pagination::roleMgt(0);
					

$x="select w.id,i.indicator_type,i.indicator_id,i.indicator_code,i.indicator_name,
i.baseline,i.unitofmeasure,i.typeofDisaggregation,w.semi_annual,w.year,
max(if(w.semi_annual='Apr - Sep' and w.year='".currFinancialYear($year,'YearRange')."',w.male,'-')) as maleAprSep,
max(if(w.semi_annual='Apr - Sep' and w.year='".currFinancialYear($year,'YearRange')."',w.female,'-')) as femaleAprSep,
max(if(w.semi_annual='Apr - Sep' and w.year='".currFinancialYear($year,'YearRange')."',w.other,'-')) as otherAprSep,
max(if(w.semi_annual='Oct - Mar' and w.year='".currFinancialYear($year,'YearRange')."',w.male,'-')) as maleOctMar,
max(if(w.semi_annual='Oct - Mar' and w.year='".currFinancialYear($year,'YearRange')."',w.female,'-')) as femaleOctMar,
max(if(w.semi_annual='Oct - Mar' and w.year='".currFinancialYear($year,'YearRange')."',w.other,'-')) as otherOctMar,
sum(if(w.year='".$year."',w.total,'-')) as totalAnnualActual
 from  tbl_indicator i 
 left join tbl_organizationreporting w on(i.indicator_id=w.indicator_id)
  where  i.subcomponent_id LIKE '".$_SESSION['subcomponent_id']."%'
 and i.output_id like '".$_SESSION['output_id']."%'
 && i.indicator_type LIKE '".$_SESSION['indicator_Type']."%'
 and i.indicator_name like '".$_SESSION['indicator']."%'
  and i.indicator_code like '".$_SESSION['indicatorCode']."%'
  group by i.indicator_id
  order by i.indicator_code asc";



/* $x="select r.`id`, r.`org_code`, r.`prog_id`, r.`subcomponent_id`,
 r.`year`, r.`reportingPeriod`, r.`semi_annual`, r.`indicator_id`, r.`male`, r.`female`, r.`total`, r.`date_reported`, r.`updatedby`,i.indicator_name,i.indicator_type,i.indicator_code,i.unitofmeasure,i.typeofDisaggregation
from tbl_indicator i left outer join tbl_organizationreporting r on(i.indicator_id=r.indicator_id)
 WHERE i.indicator_type like '".$_SESSION['indicator_type']."%'
 and 	i.indicator_name like '".$_SESSION['indicator_name']."%'
  and 	r.semi_annual like '".$_SESSION['quarterName']."%'
  and r.org_code like '".$_SESSION['orgName2']."%'
  group by i.indicator_name,r.year,r.`semi_annual`,r.reportingPeriod order by i.indicator_code asc";	
					
 */
break;
default:
					
			$x="SELECT w.`workplan_id` , i.`indicator_id` ,i.subcomponent_id,i.output_id, i.indicator_code, 
i.indicator_id, i.indicator_name, w.`curr_year` , w.`baseline` ,w.male,w.female,w.other, i.`unitofmeasure`,
   w.Target, i.`display`,i.typeofDisaggregation,i.`indicator_type`
FROM tbl_indicator i LEFT JOIN  `tbl_workplan` w
 ON ( i.indicator_id = w.indicator_id )

WHERE i.subcomponent_id LIKE '".$_SESSION['subcomponent_id']."%'
 and i.output_id like '".$_SESSION['output_id']."%'
 && i.indicator_type LIKE '".$_SESSION['indicator_type']."%'
 and i.indicator_name like '".$_SESSION['indicator']."%'

GROUP BY i.indicator_id
HAVING i.display like 'Yes%' 
ORDER BY i.indicator_code ASC"; 		
					
					
					
					}
		
		return $x;
		
		
		}






function ResultsFramework(){

	$classCode=28;

//l.classCode='".$classCode."' and l.classCode like '".$classCode."%' &&
   
switch($_SESSION['role']){
		//----------------------M&E Personnel--------------------------------
		case pagination::roleMgt(0):
						  $query_string="select * from tbl_programme where prog_id='".$_SESSION['program_id']."'  and type like 'Program%' and display='Yes' order by prog_id asc";
			break;

		//----------------------M&E Personnel--------------------------------l.classCode like '".$classCode."%' && 
		case pagination::roleMgt(1):
						  $query_string="select * from tbl_programme where prog_id='".$_SESSION['program_id']."'  and type like 'Program%' and display='Yes' order by prog_id asc";
		break;
  		case pagination::roleMgt(2);
						 $query_string="select * from tbl_programme where prog_id='".$_SESSION['program_id']."'  and type like 'Program%' and display='Yes' order by prog_id asc";
			break;
			case pagination::roleMgt(3);
						 $query_string="select * from tbl_programme where  type like 'Program%' and display='Yes' order by prog_id asc";
			break;
			
			default:
					   
     $query_string="select * from tbl_programme where type like 'Program%' 
					  and display='Yes' 
					  order by prog_id asc";
			break;
   
  			 }
			 return $query_string;

						
						}

function TotalPublications($program,$project){
switch($_SESSION['role']){
//------------Tso-----------------
		case pagination::roleMgt(0):
										
										$sql="SELECT c.`publication_id` , c.`project_id` , p.`prog_id` , c.`title` , c.`organization` , c.`dateofpublication` , c.`updatedby` , c.`status` , p.prog_id, p.program_name, sum( if( l.codeName = 'Published', 1, 0 ) ) AS Published,
								 sum( if( l.codeName = 'Manuscripts', 1, 0 ) ) AS Manuscripts,
								  sum( if( l.codeName = 'Chapter in books', 1, 0 ) ) AS Chapter_in_books,
								   sum( if( l.codeName = 'Conference proceedings', 1, 0 ) ) AS Conference_proceedings,
									sum( if( l.codeName = 'Books', 1, 0 ) ) AS Books,
									 sum( if( l.codeName = 'Electronic Newsletters', 1, 0 ) ) AS Electronic_Newsletters, 
									 sum( if( l.codeName = 'Documentaries', 1, 0 ) ) AS Documentaries,
									  sum( if( l.codeName = 'Other publications', 1, 0 ) ) AS Other_publications,
									   l.classCode
								FROM tbl_programme p
								LEFT JOIN `tbl_publication` c ON ( p.prog_id = c.prog_id )
								LEFT JOIN tbl_lookup l ON ( l.code = c.typeofpublication )
								WHERE p.prog_id='".$_SESSION['program_id']."' 
								and p.type='Program'
								and c.project_id='".$_SESSION['project_id']."'
								GROUP BY c.status
								HAVING c.status='Yes'
								ORDER BY c.status ASC";
		break;
		//---------------M&E------------------------
		case pagination::roleMgt(1):
			
								$sql="SELECT c.`publication_id` , c.`project_id` , p.`prog_id` , c.`title` , c.`organization` , c.`dateofpublication` , c.`updatedby` , c.`status` , p.prog_id, p.program_name, sum( if( l.codeName = 'Published', 1, 0 ) ) AS Published,
						 sum( if( l.codeName = 'Manuscripts', 1, 0 ) ) AS Manuscripts,
						  sum( if( l.codeName = 'Chapter in books', 1, 0 ) ) AS Chapter_in_books,
						   sum( if( l.codeName = 'Conference proceedings', 1, 0 ) ) AS Conference_proceedings,
							sum( if( l.codeName = 'Books', 1, 0 ) ) AS Books,
							 sum( if( l.codeName = 'Electronic Newsletters', 1, 0 ) ) AS Electronic_Newsletters, 
							 sum( if( l.codeName = 'Documentaries', 1, 0 ) ) AS Documentaries,
							  sum( if( l.codeName = 'Other publications', 1, 0 ) ) AS Other_publications,
							   l.classCode
						FROM tbl_programme p
						LEFT JOIN `tbl_publication` c ON ( p.prog_id = c.prog_id )
						LEFT JOIN tbl_lookup l ON ( l.code = c.typeofpublication )
						WHERE p.prog_id='".$_SESSION['program_id']."' 
						and p.type='Program'
						and c.project_id='".$_SESSION['project_id']."'
						GROUP BY c.status
						HAVING c.status='Yes'
						ORDER BY c.status ASC";
		break;
	//---------CDO-------------------------------
		case pagination::roleMgt(2):
							
									$sql="SELECT c.`publication_id` , c.`project_id` , p.`prog_id` , c.`title` , c.`organization` , c.`dateofpublication` , c.`updatedby` , c.`status` , p.prog_id, p.program_name, sum( if( l.codeName = 'Published', 1, 0 ) ) AS Published,
							 sum( if( l.codeName = 'Manuscripts', 1, 0 ) ) AS Manuscripts,
							  sum( if( l.codeName = 'Chapter in books', 1, 0 ) ) AS Chapter_in_books,
							   sum( if( l.codeName = 'Conference proceedings', 1, 0 ) ) AS Conference_proceedings,
								sum( if( l.codeName = 'Books', 1, 0 ) ) AS Books,
								 sum( if( l.codeName = 'Electronic Newsletters', 1, 0 ) ) AS Electronic_Newsletters, 
								 sum( if( l.codeName = 'Documentaries', 1, 0 ) ) AS Documentaries,
								  sum( if( l.codeName = 'Other publications', 1, 0 ) ) AS Other_publications,
								   l.classCode
							FROM tbl_programme p
							LEFT JOIN `tbl_publication` c ON ( p.prog_id = c.prog_id )
							LEFT JOIN tbl_lookup l ON ( l.code = c.typeofpublication )
							WHERE p.prog_id='".$_SESSION['program_id']."' 
							and p.type='Program'
							and c.project_id='".$_SESSION['project_id']."'
							GROUP BY c.status
							HAVING c.status='Yes'
							ORDER BY c.status ASC";		
		break;
		
		//---------CDO-------------------------------
		case pagination::roleMgt(3):
							
									$sql="SELECT c.`publication_id` , c.`project_id` , p.`prog_id` , c.`title` , c.`organization` , c.`dateofpublication` , c.`updatedby` , c.`status` , p.prog_id, p.program_name, sum( if( l.codeName = 'Published', 1, 0 ) ) AS Published,
							 sum( if( l.codeName = 'Manuscripts', 1, 0 ) ) AS Manuscripts,
							  sum( if( l.codeName = 'Chapter in books', 1, 0 ) ) AS Chapter_in_books,
							   sum( if( l.codeName = 'Conference proceedings', 1, 0 ) ) AS Conference_proceedings,
								sum( if( l.codeName = 'Books', 1, 0 ) ) AS Books,
								 sum( if( l.codeName = 'Electronic Newsletters', 1, 0 ) ) AS Electronic_Newsletters, 
								 sum( if( l.codeName = 'Documentaries', 1, 0 ) ) AS Documentaries,
								  sum( if( l.codeName = 'Other publications', 1, 0 ) ) AS Other_publications,
								   l.classCode
							FROM tbl_programme p
							LEFT JOIN `tbl_publication` c ON ( p.prog_id = c.prog_id )
							LEFT JOIN tbl_lookup l ON ( l.code = c.typeofpublication )
							WHERE p.prog_id like '".$program."%' 
							and p.type='Program'
							and c.project_id like '".$project."%'
							GROUP BY c.status
							HAVING c.status='Yes'
							ORDER BY c.status ASC";		
		break;
		
		
		default:
										$sql="SELECT c.`publication_id` , c.`project_id` , p.`prog_id` , c.`title` , c.`organization` , c.`dateofpublication` , c.`updatedby` , c.`status` , p.prog_id, p.program_name, sum( if( l.codeName = 'Published', 1, 0 ) ) AS Published,
								 sum( if( l.codeName = 'Manuscripts', 1, 0 ) ) AS Manuscripts,
								  sum( if( l.codeName = 'Chapter in books', 1, 0 ) ) AS Chapter_in_books,
								   sum( if( l.codeName = 'Conference proceedings', 1, 0 ) ) AS Conference_proceedings,
									sum( if( l.codeName = 'Books', 1, 0 ) ) AS Books,
									 sum( if( l.codeName = 'Electronic Newsletters', 1, 0 ) ) AS Electronic_Newsletters, 
									 sum( if( l.codeName = 'Documentaries', 1, 0 ) ) AS Documentaries,
									  sum( if( l.codeName = 'Other publications', 1, 0 ) ) AS Other_publications,
									   l.classCode
								FROM tbl_programme p
								LEFT JOIN `tbl_publication` c ON ( p.prog_id = c.prog_id )
								LEFT JOIN tbl_lookup l ON ( l.code = c.typeofpublication )
								WHERE p.prog_id LIKE '".$program."%' and p.type='Program'
								and c.project_id like '".$project."%'
								GROUP BY c.status
								HAVING c.status='Yes'
								ORDER BY c.status ASC";
break;
	
	}
return $sql;
}


//-------------------Perfoemance Narrative Report--------------------

 function ProgramNarrativeReporting($programID){
 

	switch($_SESSION['role']){
		//----------------------M&E Personnel--------------------------------
		case pagination::roleMgt(0):
						  $query_string="select * from tbl_programme 
						  				where prog_id='".$_SESSION['program_id']."'  
										and type like 'Program%' 
										and display='Yes' 
										order by prog_id asc";
										
						$q=Execute($query_string)or die(http("QMGR-114"));
	 				
										
			break;

		//----------------------M&E Personnel--------------------------------l.classCode like '".$classCode."%' && 
		case pagination::roleMgt(1):
						 $query_string="select * from tbl_programme 
						  				where prog_id='".$_SESSION['program_id']."'  
										and type like 'Program%' 
										and display='Yes' 
										order by prog_id asc";
										
						$q=Execute($query_string)or die(http("QMGR-128"));
	 				 
		break;
  		case pagination::roleMgt(2);
						 $query_string="select * from tbl_programme 
						  				where prog_id='".$_SESSION['program_id']."'  
										and type like 'Program%' 
										and display='Yes' 
										order by prog_id asc";
										
						$q=Execute($query_string)or die(http("QMGR-138"));
	 				
			break;
			case pagination::roleMgt(3);
						 $query_string="select * from tbl_programme where  type like 'Program%' and display='Yes' order by prog_id asc";
												
						$q=Execute($query_string)or die(http("QMGR-144"));
	 				
						 
			break;
			
			default:
					   
     $query_string="select * from tbl_programme 
	 				where type like 'Program%' 
					  and display='Yes' 
					  order by prog_id asc";
					  
					  $q=Execute($query_string)or die(http("QMGR-155"));
	 				 
					  
					  
			break;
   
  			 }
			// pagination::free_result($q);
			 return $q;

						}
						
						function ProjectNarrativeReporting($programID,$projectID){
 

	switch($_SESSION['role']){
		//----------------------Principal Investigator--------------------------------
		case pagination::roleMgt(0):
						  $query_string="select * from tbl_project 
						  				where  programme_id='".$_SESSION['program_id']."' 
										and id='".$_SESSION['project_id']."'
						   				and display='Yes' 
										order by title asc";
										
										
										
										
			break;


		case pagination::roleMgt(1):
						  $query_string="select * from tbl_project 
						  				where  programme_id='".$_SESSION['program_id']."' and 
						  				 id='".$_SESSION['project_id']."' and display='Yes' order by title asc";
						 
						  
		break;
  		case pagination::roleMgt(2);
				$query_string="select * from tbl_project where program_id='".$_SESSION['program_id']."' and id like '".$projectID."%' display='Yes' order by project_code,title asc";
						 						  
						  
			break;
			case pagination::roleMgt(3);
						  $query_string="select * from tbl_project 
						  where programme_id like '".$programID."%'
						  and id like '".$projectID."%'
						   and display='Yes' order by project_code,title asc";
						  
			break;
			
			default:
					   
      					$query_string="select * from tbl_project 
						  where programme_id like '".$programID."%'
						  and id like '".$projectID."%'
						   and display='Yes' order by project_code,title asc";
						
						 
	 				
						
			break;
  			 }
			// pagination::free_result($q);
			 return $query_string;

						}	

						
						
						
												
						
						
						
						//-------------ProjectNarrativeReportLog---------------------
						
						
						function ProjectNarrativeReportLog($programID,$projectID)
							{
								switch($_SESSION['role']){
		//----------------------Principal Investigator--------------------------------
		case pagination::roleMgt(0):
						  $query_string="select * from tbl_project 
						  				where  programme_id='".$_SESSION['program_id']."' 
										and id='".$_SESSION['project_id']."'
						   				and display='Yes' 
										order by title asc";
										
										
										
										
			break;


		case pagination::roleMgt(1):
						  $query_string="select * from tbl_project 
						  				where  programme_id='".$_SESSION['program_id']."' and 
						  				 id='".$_SESSION['project_id']."' and display='Yes' order by title asc";
						 
						  
		break;
  		case pagination::roleMgt(2);
						$query_string="select * from tbl_project where program_id='".$_SESSION['program_id']."' and id like '".$projectID."%' display='Yes' order by project_code,title asc";
						 						  
						  
			break;
			case pagination::roleMgt(3);
						  $query_string="select * from tbl_project 
						  where programme_id like '".$programID."%'
						  and id like '".$projectID."%'
						   and display='Yes' order by project_code,title asc";
						  
			break;
			
			default:
					   
      					$query_string="select * from tbl_project 
						  where programme_id like '".$programID."%'
						  and id like '".$projectID."%'
						   and display='Yes' order by project_code,title asc";
						
						 
	 				
						
			break;
		
   
  			 }
			return $query_string;
						
							}
						
					
					
					
						function ProgramGeneralQuery($programID){
 

	switch($_SESSION['role']){
		//----------------------M&E Personnel--------------------------------
		case pagination::roleMgt(0):
						  $query_string="select * from tbl_programme 
						  				where prog_id='".$_SESSION['program_id']."'  
										and type like 'Program%' 
										and display='Yes' 
										order by prog_id asc";

	 				
										
			break;

		//----------------------M&E Personnel--------------------------------l.classCode like '".$classCode."%' && 
		case pagination::roleMgt(1):
						 $query_string="select * from tbl_programme 
						  				where prog_id='".$_SESSION['program_id']."'  
										and type like 'Program%' 
										and display='Yes' 
										order by prog_id asc";
		
	 				 
		break;
  		case pagination::roleMgt(2);
						 $query_string="select * from tbl_programme 
						  				where prog_id='".$_SESSION['program_id']."'  
										and type like 'Program%' 
										and display='Yes' 
										order by prog_id asc";
										
			
	 				
			break;
			case pagination::roleMgt(3);
						 $query_string="select * from tbl_programme where  type like 'Program%' and prog_id like '".$programID."%' and display='Yes' order by prog_id asc";
												
					 				
						 
			break;
			
			default:
					   
     $query_string="select * from tbl_programme where  type like 'Program%' and prog_id like '".$programID."%' and display='Yes' order by prog_id asc";
					  
					
	 				 
					  
					  
			break;
   
  			 }
			// pagination::free_result($q);
			 return $query_string;

						}
						


					
						
						
						
	function ProjectGeneralQuery($programID,$projectID){
 

	switch($_SESSION['role']){
		//----------------------Principal Investigator--------------------------------
		case pagination::roleMgt(0):
						  $query_string="select * from tbl_project 
						  				where  programme_id='".$_SESSION['program_id']."' 
										and id='".$_SESSION['project_id']."'
						   				and display='Yes' 
										order by project_code,title asc";
										
										
										
										
			break;


		case pagination::roleMgt(1):
						  $query_string="select * from tbl_project 
						  				where  programme_id='".$_SESSION['program_id']."' and 
						  				 id='".$_SESSION['project_id']."' and display='Yes' order by project_code,title asc";
						 
						  
		break;
  		case pagination::roleMgt(2);
						  $query_string="select * from tbl_project where program_id='".$_SESSION['program_id']."' and id like '".$projectID."%' display='Yes' order by project_code,title asc";
						 						  
						  
			break;
			case pagination::roleMgt(3);
						  $query_string="select * from tbl_project 
						  where programme_id like '".$programID."%'
						  and id like '".$projectID."%'
						   and display='Yes' order by project_code,title asc";
						  
			break;
			
			default:
					   
      					$query_string="select * from tbl_project 
						  where programme_id like '".$programID."%'
						  and id like '".$projectID."%'
						   and display='Yes' order by project_code,title asc";
						
						 
	 				
						
			break;
   
  			 }
			// pagination::free_result($q);
			 return $query_string;

						}	

						
						//-----------------
						function ViewAnualTargetsProjects($program,$project)
									{
									switch($_SESSION['role'])
									{
										//----------------------Principal Investigator--------------------------------
													case pagination::roleMgt(0):
																	  $query=" i.prog_id ='".$_SESSION['program_id']."' and 
											i.project_id ='".$_SESSION['project_id']."' ";
																					
																					
																					
																					
														break;
											
											
													case pagination::roleMgt(1):
																	  $query=" i.prog_id ='".$_SESSION['program_id']."' and 
											i.project_id ='".$_SESSION['project_id']."' ";
																	 
																	  
													break;
													case pagination::roleMgt(2);
																	  $query=" i.prog_id ='".$_SESSION['program_id']."' and 
											i.project_id like '".$project."%' ";
																							  
																	  
														break;
														case pagination::roleMgt(3);
																	  $query=" i.prog_id like '".$program."%' and 
											i.project_id like '".$project."%' ";
																	  
														break;
																				
																				
																				
																				
																				default:
																				$query=" i.prog_id like '".$program."%' and 
											 i.project_id like '".$project."%' ";
																	break;
																	}
						return $query;
									}
						
						
 function ViewAnnualResults($program,$project)
									{
									switch($_SESSION['role'])
									{
									
										//----------------------Principal Investigator--------------------------------
													case pagination::roleMgt(0):
																	  $query=" r.prog_id ='".$_SESSION['program_id']."' and 
											r.project_id ='".$_SESSION['project_id']."' ";
																				
																					
														break;
											
											
													case pagination::roleMgt(1):
																	  $query=" r.prog_id ='".$_SESSION['program_id']."' and 
											r.project_id ='".$_SESSION['project_id']."' ";
																	 
																	  
													break;
													case pagination::roleMgt(2);
																	  $query=" r.prog_id ='".$_SESSION['program_id']."' and 
											r.project_id like '".$project."%' ";
																							  
																	  
														break;
														case pagination::roleMgt(3);
																	  $query=" r.prog_id like '".$program."%' and 
											r.project_id like '".$project."%' ";
																	  
														break;
																				
																				
																				
																				
																				default:
																				$query=" r.prog_id like '".$program."%' and 
											r.project_id like '".$project."%' ";
																	break;
																	}
						return $query;
									}
						

function ViewTotalAnnualResults($program,$project)
									{
									switch($_SESSION['role'])
									{
									
										//----------------------Principal Investigator--------------------------------
													case pagination::roleMgt(0):
																	  $query=" w.prog_id ='".$_SESSION['program_id']."' and 
											w.project_id ='".$_SESSION['project_id']."' ";
																				
																					
														break;
											
											
													case pagination::roleMgt(1):
																	  $query=" w.prog_id ='".$_SESSION['program_id']."' and 
											w.project_id ='".$_SESSION['project_id']."' ";
																	 
																	  
													break;
													case pagination::roleMgt(2);
																	  $query=" w.prog_id ='".$_SESSION['program_id']."' and 
											w.project_id like '".$project."%' ";
																							  
																	  
														break;
														case pagination::roleMgt(3);
																	  $query=" w.prog_id like '".$program."%' and 
											w.project_id like '".$project."%' ";
																	  
														break;
																				
																				
																				
																				
																				default:
																				$query=" w.prog_id like '".$program."%' and 
											w.project_id like '".$project."%' ";
																	break;
																	}
						return $query;
									}
						


 //-------------Region Filter-----------------
 function ReportingPeriodFilter($period){
 

	switch($_SESSION['role']){
			case pagination::roleMgt(0):
								
				$x="select * from tbl_quarters  order by 2 asc";
			
										break;
								
										default:

					$x="select * from tbl_quarters  order by 2 asc";

								 }
								 
								 $q=Execute($x)or die(http("QMGR-666"));
	 				 while($rowd=FetchRecords($q)){
	  					$sel=($rowd['britishSemiannual']==$period)?"selected":"";
      					$data.="<option value=\"".$rowd['britishSemiannual']."\" ".$sel.">".$rowd['britishSemiannual']."</option>";
	
						}
 return $data;
 							 }


						
 //-------------Region Filter-----------------
 function ZoneFilter($zone){
 

	switch($_SESSION['role']){
			case pagination::roleMgt(0):
								
				$x="select * from tbl_zone  order by 2 asc";
			
										break;
								
										default:

					$x="select * from tbl_zone  order by 2 asc";

								 }
								 
								 $q=Execute($x)or die(http("QMGR-666"));
	 				 while($rowd=FetchRecords($q)){
	  					$sel=($rowd['zoneCode']==$zone)?"selected":"";
      					$data.="<option value=\"".$rowd['zoneCode']."\" ".$sel.">".$rowd['zoneName']."</option>";
	
														 }
														 
								 
								 
								 
 return $data;
																	 } 
																	 
																	 
																	 
  function OutputFilter($outcome,$output){
 

	switch($_SESSION['role']){
			case pagination::roleMgt(0):
				$x="select * from tbl_output where subprog_id like '".$outcome."%' order by output_code asc";
										
										break;
										
			case pagination::roleMgt(1):
						$x="select * from tbl_output where subprog_id like '".$outcome."%' order by output_code asc";
												
										break;
	
				
										default:
							$x="select * from tbl_output where subprog_id like '".$outcome."%' order by output_code asc";
												
										break;
						
						 }				
						$query=Execute($x)or die(http("QMGR-2719"));
	 		while($row=FetchRecords($query)){
$selected=($output==$row['output_id'])?"SELECTED":"";
$data.="<option value=\"".$row['output_id']."\" ".$selected.">".$row['output_code']." ".$row['output_name']."</option>";
				
					  }  
 return $data;
						 } 
 
																	 
							 function IndicatorTypeFilter($indicatorType){
 
$classCode=5;
	switch($_SESSION['role']){
			case pagination::roleMgt(0):
										$x="select * from tbl_lookup where classCode='".$classCode."'   group by codeName order by codeName asc ";
										$query=@Execute($x)or die(http("QMGR-843"));
	 				  						while($row=@FetchRecords($query)){
												$selected=($indicatorType==$row['codeName'])?"SELECTED":"";
										  		$data.="<option value=\"".$row['codeName']."\" ".$selected.">".$row['codeName']." </option>";
	 														 }
										break;
										
									case pagination::roleMgt(1):
										$x="select * from tbl_lookup where classCode='".$classCode."'  group by codeName order by codeName asc ";
										$query=@Execute($x)or die(http("QMGR-843"));
	 				  						while($row=@FetchRecords($query)){
												 $selected=($indicatorType==$row['codeName'])?"SELECTED":"";
										  		$data.="<option value=\"".$row['codeName']."\" ".$selected.">".$row['codeName']." </option>";
	 														 }			
										break;
										default:
												$x="select * from tbl_lookup where classCode='".$classCode."'  group by codeName order by codeName asc ";
													$query=@Execute($x)or die(http("QMGR-843"));
	 				  						while($row=@FetchRecords($query)){
												 $selected=($indicatorType==$row['codeName'])?"SELECTED":"";
										  		$data.="<option value=\"".$row['codeName']."\" ".$selected.">".$row['codeName']." </option>";
	 														 }
												break;
										}
										
									
										return $data;
											} 
 
 
 
 										 
							
							
							
							
																	 
 //-----------------------outcome-------------------------
 
 
 			
  function OutcomeFilter($outcome){
 

	switch($_SESSION['role']){
			case pagination::roleMgt(0):
			$x="select * from tbl_subcomponent order by subcomponent_code asc";
				$q=Execute($x)or die(http("QMGR-870"));
	 				 while($row=FetchRecords($q)){
	  					$selected=($outcome==$row['subcomponent_id'])?"SELECTED":"";
					$data.="<option value=\"".$row['subcomponent_id']."\" ".$selected.">".$row['subcomponent_code']." ".$row['subcomponent']."</option>";
	
														 }
										break;
										
			case pagination::roleMgt(1):
						$x="select * from tbl_subcomponent order by subcomponent_code asc";
							$q=Execute($x)or die(http("QMGR-879"));
	 				 while($row=FetchRecords($q)){
	  					$selected=($outcome==$row['subcomponent_id'])?"SELECTED":"";
					$data.="<option value=\"".$row['subcomponent_id']."\" ".$selected.">".$row['subcomponent_code']." ".$row['subcomponent']."</option>";
	
														 }		
										break;
										default:
												$x="select * from tbl_subcomponent order by subcomponent_code asc";	
												$q=Execute($x)or die(http("QMGR-889"));
	 				 while($row=FetchRecords($q)){
	  					$selected=($outcome==$row['subcomponent_id'])?"SELECTED":"";
					$data.="<option value=\"".$row['subcomponent_id']."\" ".$selected.">".$row['subcomponent_code']." ".$row['subcomponent']."</option>";
	
														 }
										
										
						}				
						
				
														 
									 return $data;
																	 } 
 
 
 
 
 //-------------District Filter---------------
 
  function DistrictFilter($zone,$district){
 

	switch($_SESSION['role']){
			case pagination::roleMgt(0):
								
				$x="select * from tbl_district where zone='".$zone."' order by 2 asc";
			$q=Execute($x)or die(http("QMGR-2719"));
	 				 while($rowd=FetchRecords($q)){
	  					$sel=($rowd['districtCode']==$district)?"selected":"";
      					$data.="<option value=\"".$rowd['districtCode']."\" ".$sel.">".$rowd['districtName']."</option>";
	
														 }
														 
										
										break;
										
			case pagination::roleMgt(1):
	
							
				$x="select * from tbl_district where zone='".$zone."' order by 2 asc";
			$q=Execute($x)or die(http("QMGR-2719"));
	 				 while($rowd=FetchRecords($q)){
	  					$sel=($rowd['districtCode']==$district)?"selected":"";
      					$data.="<option value=\"".$rowd['districtCode']."\" ".$sel.">".$rowd['districtName']."</option>";
	
														 }
												
										break;
	
				
										default:

						$x="select * from tbl_district  order by 3 asc";
						$q=Execute($x)or die(http("QMGR-2719"));
	 				 while($rowd=FetchRecords($q)){
	  					$sel=($rowd['districtCode']==$district)?"selected":"";
      					$data.="<option value=\"".$rowd['districtCode']."\" ".$sel.">".$rowd['districtName']."</option>";
	
														 }
														
																 }
 return $data;
																	 } 
 
 //------------program Filter Data-----------
 
 function ProgramFilter($programID){
 

	switch($_SESSION['role']){
		//----------------------M&E Personnel--------------------------------
		case pagination::roleMgt(0):
						  $query_string="select * from tbl_programme 
						  				where prog_id='".$_SESSION['program_id']."'  
										and type like 'Program%' 
										and display='Yes' 
										order by prog_id asc";
										
						$q=Execute($query_string)or die(http("QMGR-280"));
	 				 while($rowd=FetchRecords($q)){
	  					$sel=($rowd['prog_id']==$_SESSION['program_id'])?"selected":"";
      					$data.="<option value=\"".$rowd['prog_id']."\" ".$sel.">".$rowd['program_id']." ".$rowd['program_name']."</option>";
	
														 }
										
			break;

		//----------------------M&E Personnel--------------------------------l.classCode like '".$classCode."%' && 
		case pagination::roleMgt(1):
						 $query_string="select * from tbl_programme 
						  				where prog_id='".$_SESSION['program_id']."'  
										and type like 'Program%' 
										and display='Yes' 
										order by prog_id asc";
										
						$q=Execute($query_string)or die(http("QMGR-280"));
	 				 while($rowd=FetchRecords($q)){
	  					$sel=($rowd['prog_id']==$_SESSION['program_id'])?"selected":"";
      					$data.="<option value=\"".$rowd['prog_id']."\" ".$sel.">".$rowd['program_id']." ".$rowd['program_name']."</option>";
	
														 }
		break;
  		case pagination::roleMgt(2);
						 $query_string="select * from tbl_programme 
						  				where prog_id='".$_SESSION['program_id']."'  
										and type like 'Program%' 
										and display='Yes' 
										order by prog_id asc";
										
						$q=Execute($query_string)or die(http("QMGR-280"));
	 				 while($rowd=FetchRecords($q)){
	  					$sel=($rowd['prog_id']==$_SESSION['program_id'])?"selected":"";
      					$data.="<option value=\"".$rowd['prog_id']."\" ".$sel.">".$rowd['program_id']." ".$rowd['program_name']."</option>";
	
														 }
			break;
			case pagination::roleMgt(3);
						 $query_string="select * from tbl_programme where  type like 'Program%' and display='Yes' order by prog_id asc";
												
						$q=Execute($query_string)or die(http("QMGR-280"));
	 				 while($rowd=FetchRecords($q)){
	  					$sel=($rowd['prog_id']==$programID)?"selected":"";
      					$data.="<option value=\"".$rowd['prog_id']."\" ".$sel.">".$rowd['program_id']." ".$rowd['program_name']."</option>";
	
														 }
						 
			break;
			
			default:
					   
     $query_string="select * from tbl_programme where type like 'Program%' 
					  and display='Yes' 
					  order by prog_id asc";
					  
					  $q=Execute($query_string)or die(http("QMGR-336"));
	 				 while($rowd=FetchRecords($q)){
	  					$sel=($rowd['prog_id']==$programID)?"selected":"";
      					$data.="<option value=\"".$rowd['prog_id']."\" ".$sel.">".$rowd['program_id']." ".$rowd['program_name']."</option>";
	
														 }
					  
					  
					  
			break;
   
  			 }
			 pagination::free_result($q);
			 return $data;

						}																 





 //------------Project Filter Data-----------
 
 function ProjectFilter($programID,$projectID){
 

	switch($_SESSION['role']){
		//----------------------Principal Investigator--------------------------------
		case pagination::roleMgt(0):
						  $query_string="select * from tbl_project 
						  				where id='".$_SESSION['project_id']."'
						   				and display='Yes' 
										order by title asc";
										
										$q=Execute($query_string)or die(http("QMGR-780"));
	 				 while($rowd=FetchRecords($q)){
	  					$sel=($rowd['id']==$_SESSION['project_id'])?"selected":"";
      					$data.="<option value=\"".$rowd['id']."\" ".$sel.">
						".retrieve_info_withSpecialCharactersNowordLimit($rowd['project_code'])."
						 ".retrieve_info_withSpecialCharactersNowordLimit($rowd['title'])."</option>";
	
														 }
	
										
										
										
			break;


		case pagination::roleMgt(1):
						  $query_string="select * from tbl_project where id='".$_SESSION['project_id']."' and display='Yes' order by title asc";
						  $q=Execute($query_string)or die(http("QMGR-798"));
	 				 while($rowd=FetchRecords($q)){
	  					$sel=($rowd['id']==$_SESSION['project_id'])?"selected":"";
      					$data.="<option value=\"".$rowd['id']."\" ".$sel.">
						".retrieve_info_withSpecialCharactersNowordLimit($rowd['project_code'])."
						 ".retrieve_info_withSpecialCharactersNowordLimit($rowd['title'])."</option>";
	
														 }
						  
						  
		break;
  		case pagination::roleMgt(2);
						  $query_string="select * from tbl_project where program_id='".$_SESSION['program_id']."' and display='Yes' order by title asc";
						  
						  $q=Execute($query_string)or die(http("QMGR-812"));
	 				 while($rowd=FetchRecords($q)){
	  					$sel=($rowd['id']==$_SESSION['project_id'])?"selected":"";
      					$data.="<option value=\"".$rowd['id']."\" ".$sel.">
						".retrieve_info_withSpecialCharactersNowordLimit($rowd['project_code'])."
						 ".retrieve_info_withSpecialCharactersNowordLimit($rowd['title'])."</option>";
	
														 }
						  
						  
			break;
			case pagination::roleMgt(3);
						  $query_string="select * from tbl_project where programme_id like '".$_SESSION['program_id']."%' and display='Yes' order by title asc";
						  $q=Execute($query_string)or die(http("QMGR-824"));
	 				 while($rowd=FetchRecords($q)){
	  					$sel=($rowd['id']==$_SESSION['project_id'])?"selected":"";
      					$data.="<option value=\"".$rowd['id']."\" ".$sel.">
						".retrieve_info_withSpecialCharactersNowordLimit($rowd['project_code'])."
						 ".retrieve_info_withSpecialCharactersNowordLimit($rowd['title'])."</option>";
	
														 }
			break;
			
			default:
					   
       $query_string="select * from tbl_project 
	   					where display='Yes' 
						order by title asc";
						
						 $q=Execute($query_string)or die(http("QMGR-841"));
	 				 while($rowd=FetchRecords($q)){
	  					$sel=($rowd['id']==$projectID)?"selected":"";
      					$data.="<option value=\"".$rowd['id']."\" ".$sel.">
						".retrieve_info_withSpecialCharactersNowordLimit($rowd['project_code'])."
						 ".retrieve_info_withSpecialCharactersNowordLimit($rowd['title'])."</option>";
	
														 }
						
						
			break;
   
  			 }
			 pagination::free_result($q);
			 return $data;

						}	
						
						function ViewTraining($program,$project)
							{
						
						

switch($_SESSION['role']){

case pagination::roleMgt(0):
						  $sql="SELECT t.*,p.* , sum( t.total ) AS TotalProgramValue from tbl_programme p
  																		  left join tbl_training t on(t.prog_id=p.prog_id) 
																		  where p.prog_id='".$_SESSION['program_id']."' 
																		  && t.project_id ='".$_SESSION['project_id']."'
																		   && p.type like 'Program%'
																		  GROUP BY p.prog_id 
																		  order by p.prog_id asc ";
										
										
			break;


		case pagination::roleMgt(1):
					$sql="SELECT t.*,p.* , sum( t.total ) AS TotalProgramValue from tbl_programme p
  																		  left join tbl_training t on(t.prog_id=p.prog_id) 
																		  where p.prog_id='".$_SESSION['program_id']."' 
																		  && t.project_id ='".$_SESSION['project_id']."'
																		   && p.type like 'Program%'
																		  GROUP BY p.prog_id 
																		  order by p.prog_id asc ";
						  
		break;
  		case pagination::roleMgt(2);
						$sql="SELECT t.*,p.* , sum( t.total ) AS TotalProgramValue from tbl_programme p
  																		  left join tbl_training t on(t.prog_id=p.prog_id) 
																		  where p.prog_id='".$_SESSION['program_id']."' 
																		  && t.project_id like '".$project."%'
																		   && p.type like 'Program%'
																		  GROUP BY p.prog_id 
																		  order by p.prog_id asc ";
						  
			break;
			case pagination::roleMgt(3);
				 $sql="SELECT  t.*,p.* , sum( total ) AS TotalProgramValue,project_id from tbl_programme p
																						  left join tbl_training t on(t.prog_id=p.prog_id) 
																						  where p.prog_id like '".$program."%' 
																						  && t.project_id like '".$project."%'
																						   && p.type like 'Program%'
																						  GROUP BY p.prog_id 
																						  order by p.prog_id asc ";

	break;
			
			default:
					   				 $sql="SELECT  t.*,p.* , sum( total ) AS TotalProgramValue,project_id from tbl_programme p
																						  left join tbl_training t on(t.prog_id=p.prog_id) 
																						  where p.prog_id like '".$program."%' 
																						  && t.project_id like '".$project."%'
																						   && p.type like 'Program%'
																						  GROUP BY p.prog_id 
																						  order by p.prog_id asc ";

			break;
   
  			 }
			
			 return $sql;
						
							}


//------------------view training details-----------------------------------------------
function ViewTrainingDetails($program,$project,$semi_annual,$year)
							{
switch($_SESSION['role']){

case pagination::roleMgt(0):
												  $sql="SELECT t.`training_id` , t.`narrative_id` , t.`prog_id` , t.`project_id` ,p.title as projectName, t.`semi_annual` , t.`year` , t.`course` , t.`trainer` , t.`typeofparticipants` , l.codeName, t.`male` , t.`female` , t.`total` , t.`organizing_date` , t.`updatedby` , t.`status`
						FROM `tbl_training` t
						LEFT JOIN tbl_lookup l ON ( l.code = t.typeofparticipants )
						left join tbl_project p on(p.id=t.project_id)
						WHERE l.classCode = '25' 
						and t.status like 'Yes%' 
						and t.prog_id='".$_SESSION['program_id']."' 
						and t.project_id='".$_SESSION['project_id']."'
						and  t.`semi_annual`  like '".$semi_annual."%'  
						and t.`year`  like '".$year."%'
						group BY  t.`course`, t.`prog_id`
						ORDER BY  t.`course`, t.`prog_id` asc";
										
										
						
			break;


		case pagination::roleMgt(1):
					 $sql="SELECT t.`training_id` , t.`narrative_id` , t.`prog_id` , t.`project_id` ,p.title as projectName, t.`semi_annual` , t.`year` , t.`course` , t.`trainer` , t.`typeofparticipants` , l.codeName, t.`male` , t.`female` , t.`total` , t.`organizing_date` , t.`updatedby` , t.`status`
						FROM `tbl_training` t
						LEFT JOIN tbl_lookup l ON ( l.code = t.typeofparticipants )
						left join tbl_project p on(p.id=t.project_id)
						WHERE l.classCode = '25' 
						and t.status like 'Yes%' 
						and t.prog_id='".$_SESSION['program_id']."' 
						and t.project_id='".$_SESSION['project_id']."'
						and  t.`semi_annual`  like '".$semi_annual."%'  
						and t.`year`  like '".$year."%'
						group BY  t.`course`, t.`prog_id`
						ORDER BY  t.`course`, t.`prog_id` asc";
										
		break;
  		case pagination::roleMgt(2);
						 $sql="SELECT t.`training_id` , t.`narrative_id` , t.`prog_id` , t.`project_id` ,p.title as projectName, t.`semi_annual` , t.`year` , t.`course` , t.`trainer` , t.`typeofparticipants` , l.codeName, t.`male` , t.`female` , t.`total` , t.`organizing_date` , t.`updatedby` , t.`status`
						FROM `tbl_training` t
						LEFT JOIN tbl_lookup l ON ( l.code = t.typeofparticipants )
						left join tbl_project p on(p.id=t.project_id)
						WHERE l.classCode = '25' 
						and t.status like 'Yes%' 
						and t.prog_id='".$_SESSION['program_id']."' 
						and t.project_id like '".$project."%'
						and  t.`semi_annual`  like '".$semi_annual."%'  
						and t.`year`  like '".$year."%'
						group BY  t.`course`, t.`prog_id`
						ORDER BY  t.`course`, t.`prog_id` asc";
										
			break;
			case pagination::roleMgt(3);
				  $sql="SELECT t.`training_id` , t.`narrative_id` , t.`prog_id` , t.`project_id` ,p.title as projectName, t.`semi_annual` , t.`year` , t.`course` , t.`trainer` , t.`typeofparticipants` , l.codeName, t.`male` , t.`female` , t.`total` , t.`organizing_date` , t.`updatedby` , t.`status`
						FROM `tbl_training` t
						LEFT JOIN tbl_lookup l ON ( l.code = t.typeofparticipants )
						left join tbl_project p on(p.id=t.project_id)
						WHERE l.classCode = '25' 
						and t.status like 'Yes%' 
						and t.prog_id like '".$program."%' 
						and t.project_id like '".$project."%'
						and  t.`semi_annual`  like '".$semi_annual."%'  
						and t.`year`  like '".$year."%'
						group BY  t.`course`, t.`prog_id`
						ORDER BY  t.`course`, t.`prog_id` asc";
										

	break;
			
			default:
					   				 $sql="SELECT t.`training_id` , t.`narrative_id` , t.`prog_id` , t.`project_id` ,p.title as projectName, t.`semi_annual` , t.`year` , t.`course` , t.`trainer` , t.`typeofparticipants` , l.codeName, t.`male` , t.`female` , t.`total` , t.`organizing_date` , t.`updatedby` , t.`status`
						FROM `tbl_training` t
						LEFT JOIN tbl_lookup l ON ( l.code = t.typeofparticipants )
						left join tbl_project p on(p.id=t.project_id)
						WHERE l.classCode = '25' 
						and t.status like 'Yes%' 
						and t.prog_id like '".$program."%' 
						and t.project_id like '".$project."%'
						and  t.`semi_annual`  like '".$semi_annual."%'  
						and t.`year`  like '".$year."%'
						group BY  t.`course`, t.`prog_id`
						ORDER BY  t.`course`, t.`prog_id` asc";

			break;
   
  			 }
			
			 return $sql;
						
							}

						
						
						
						
						
						//-----------viewViewPublications------------
						function ViewPublications($program,$project)
							{
						
						

switch($_SESSION['role']){

case pagination::roleMgt(0):
						  $sql="SELECT c.`publication_id` ,c.semi_annual,c.year, c.`project_id` , p.`prog_id` ,p.type, c.`title` , c.`organization` , c.`dateofpublication` , c.`updatedby` , c.`status` , p.prog_id, p.program_name,
		sum( if( l.codeName = 'Published', 1, 0 ) ) AS Published,
		 sum( if( l.codeName = 'Manuscripts', 1, 0 ) ) AS Manuscripts,
		 sum( if( l.codeName = 'Chapter in books', 1, 0 ) ) AS Chapter_in_books, 
		sum( if( l.codeName = 'Conference proceedings', 1, 0 )) AS Conference_proceedings,
		 sum( if( l.codeName = 'Books', 1, 0 ) ) AS Books,
		  sum( if( l.codeName = 'Electronic Newsletters', 1, 0 ) ) AS Electronic_Newsletters,
		   sum( if( l.codeName = 'Documentaries', 1, 0 ) ) AS Documentaries,
		    sum( if( l.codeName = 'Other publications', 1, 0 ) ) AS Other_publications,
			 count(typeofpublication) AS TotalpublicationsPerProgram,l.classCode
FROM tbl_programme p
LEFT JOIN `tbl_publication` c ON ( p.prog_id = c.prog_id )
LEFT JOIN tbl_lookup l ON ( l.code = c.typeofpublication )
WHERE p.prog_id='".$_SESSION['program_id']."'  
and c.project_id='".$_SESSION['project_id']."'
and p.type like 'Program%'
GROUP BY p.prog_id 
ORDER BY p.prog_id ASC";
										
										
			break;


		case pagination::roleMgt(1):
						  $sql="SELECT c.`publication_id` ,c.semi_annual,c.year, c.`project_id` , p.`prog_id` ,p.type, c.`title` , c.`organization` , c.`dateofpublication` , c.`updatedby` , c.`status` , p.prog_id, p.program_name,
		sum( if( l.codeName = 'Published', 1, 0 ) ) AS Published,
		 sum( if( l.codeName = 'Manuscripts', 1, 0 ) ) AS Manuscripts,
		 sum( if( l.codeName = 'Chapter in books', 1, 0 ) ) AS Chapter_in_books, 
		sum( if( l.codeName = 'Conference proceedings', 1, 0 )) AS Conference_proceedings,
		 sum( if( l.codeName = 'Books', 1, 0 ) ) AS Books,
		  sum( if( l.codeName = 'Electronic Newsletters', 1, 0 ) ) AS Electronic_Newsletters,
		   sum( if( l.codeName = 'Documentaries', 1, 0 ) ) AS Documentaries,
		    sum( if( l.codeName = 'Other publications', 1, 0 ) ) AS Other_publications,
			 count(typeofpublication) AS TotalpublicationsPerProgram,l.classCode
FROM tbl_programme p
LEFT JOIN `tbl_publication` c ON ( p.prog_id = c.prog_id )
LEFT JOIN tbl_lookup l ON ( l.code = c.typeofpublication )
WHERE p.prog_id='".$_SESSION['program_id']."'  
and c.project_id='".$_SESSION['project_id']."'
and p.type like 'Program%'
GROUP BY p.prog_id 
ORDER BY p.prog_id ASC";
						  
		break;
  		case pagination::roleMgt(2);
						 $sql="SELECT c.`publication_id` ,c.semi_annual,c.year, c.`project_id` , p.`prog_id` ,p.type, c.`title` , c.`organization` , c.`dateofpublication` , c.`updatedby` , c.`status` , p.prog_id, p.program_name,
		sum( if( l.codeName = 'Published', 1, 0 ) ) AS Published,
		 sum( if( l.codeName = 'Manuscripts', 1, 0 ) ) AS Manuscripts,
		 sum( if( l.codeName = 'Chapter in books', 1, 0 ) ) AS Chapter_in_books, 
		sum( if( l.codeName = 'Conference proceedings', 1, 0 )) AS Conference_proceedings,
		 sum( if( l.codeName = 'Books', 1, 0 ) ) AS Books,
		  sum( if( l.codeName = 'Electronic Newsletters', 1, 0 ) ) AS Electronic_Newsletters,
		   sum( if( l.codeName = 'Documentaries', 1, 0 ) ) AS Documentaries,
		    sum( if( l.codeName = 'Other publications', 1, 0 ) ) AS Other_publications,
			 count(typeofpublication) AS TotalpublicationsPerProgram,l.classCode
FROM tbl_programme p
LEFT JOIN `tbl_publication` c ON ( p.prog_id = c.prog_id )
LEFT JOIN tbl_lookup l ON ( l.code = c.typeofpublication )
WHERE p.prog_id='".$_SESSION['program_id']."'  
and c.project_id like '".$project."%'
and p.type like 'Program%'
GROUP BY p.prog_id 
ORDER BY p.prog_id ASC";
						  
			break;
			case pagination::roleMgt(3);
			 $sql="SELECT c.`publication_id` ,c.semi_annual,c.year, c.`project_id` , p.`prog_id` ,p.type, c.`title` , c.`organization` , c.`dateofpublication` , c.`updatedby` , c.`status` , p.prog_id, p.program_name,
		sum( if( l.codeName = 'Published', 1, 0 ) ) AS Published,
		 sum( if( l.codeName = 'Manuscripts', 1, 0 ) ) AS Manuscripts,
		 sum( if( l.codeName = 'Chapter in books', 1, 0 ) ) AS Chapter_in_books, 
		sum( if( l.codeName = 'Conference proceedings', 1, 0 )) AS Conference_proceedings,
		 sum( if( l.codeName = 'Books', 1, 0 ) ) AS Books,
		  sum( if( l.codeName = 'Electronic Newsletters', 1, 0 ) ) AS Electronic_Newsletters,
		   sum( if( l.codeName = 'Documentaries', 1, 0 ) ) AS Documentaries,
		    sum( if( l.codeName = 'Other publications', 1, 0 ) ) AS Other_publications,
			 count(typeofpublication) AS TotalpublicationsPerProgram,l.classCode
FROM tbl_programme p
LEFT JOIN `tbl_publication` c ON ( p.prog_id = c.prog_id )
LEFT JOIN tbl_lookup l ON ( l.code = c.typeofpublication )
WHERE p.prog_id like '".$program."%'  
and c.project_id like '".$project."%'
and p.type like 'Program%'
GROUP BY p.prog_id 
ORDER BY p.prog_id ASC";

	break;
			
			default:
					   $sql="SELECT c.`publication_id` ,c.semi_annual,c.year, c.`project_id` , p.`prog_id` ,p.type, c.`title` , c.`organization` , c.`dateofpublication` , c.`updatedby` , c.`status` , p.prog_id, p.program_name,
		sum( if( l.codeName = 'Published', 1, 0 ) ) AS Published,
		 sum( if( l.codeName = 'Manuscripts', 1, 0 ) ) AS Manuscripts,
		 sum( if( l.codeName = 'Chapter in books', 1, 0 ) ) AS Chapter_in_books, 
		sum( if( l.codeName = 'Conference proceedings', 1, 0 )) AS Conference_proceedings,
		 sum( if( l.codeName = 'Books', 1, 0 ) ) AS Books,
		  sum( if( l.codeName = 'Electronic Newsletters', 1, 0 ) ) AS Electronic_Newsletters,
		   sum( if( l.codeName = 'Documentaries', 1, 0 ) ) AS Documentaries,
		    sum( if( l.codeName = 'Other publications', 1, 0 ) ) AS Other_publications,
			 count(typeofpublication) AS TotalpublicationsPerProgram,l.classCode
FROM tbl_programme p
LEFT JOIN `tbl_publication` c ON ( p.prog_id = c.prog_id )
LEFT JOIN tbl_lookup l ON ( l.code = c.typeofpublication )
WHERE p.prog_id like '".$program."%'  
and c.project_id like '".$project."%'
and p.type like 'Program%'
GROUP BY p.prog_id 
ORDER BY p.prog_id ASC";
			break;
   
  			 }
			
			 return $sql;
						
							}
						
						
						

function SubcountyFilter(){
		switch($_SESSION['role']){
			case pagination::roleMgt(0):
			//  
				$query="select * from tbl_subcounty where districtCode='".$_SESSION['districtZone']."' order by 1 asc";
				break;
			case pagination::roleMgt(1):
				$query="select * from tbl_subcounty  where districtCode='".$_SESSION['districtZone']."' order by 1 asc";
				break;
			case pagination::roleMgt(2):
				$query="select * from tbl_subcounty  where districtCode='".$_SESSION['districtCode']."' order by 1 asc";
				break;
			default:
				$query="select * from tbl_subcounty order by 1 asc";
				
								//------end of session switching-----------
					}
							
							
				$q=Execute($query)or die(http("FLTR-247"));
			  	while($rowd=FetchRecords($q)){
			  	$selsubcounty=($_SESSION['subcountyCode']==$rowd['subcountyCode'])?"SELECTED":"";
			  	$data.="<option value=\"".$rowd['subcountyCode']."\" ".$selsubcounty.">".$rowd['subcountyName']."</option>";
			
			 	} 

							
				pagination::free_result($q);
				return $data;

					}
					//-------------------------------Parish Flter-------------------------
					
					function ParishFilter(){
		switch($_SESSION['role']){
			case pagination::roleMgt(0):
			//  
				$query="select * from tbl_parish where subcountyCode='".$_SESSION['subcountyCode']."' order by 3 asc";
				break;
			case pagination::roleMgt(1):
				$query="select * from tbl_parish  where subcountyCode='".$_SESSION['subcountyCode']."' order by 3 asc";
				break;
			case pagination::roleMgt(2):
				$query="select * from tbl_parish  where subcountyCode='".$_SESSION['subcountyCode']."' order by 3 asc";
				break;
			default:
				$query="select * from tbl_parish order by 3 asc";
					}
							
							
				$q=Execute($query)or die(http("FLTR-247"));
			  	while($rowd=FetchRecords($q)){
			  	$selsubcounty=($_SESSION['parishCode']==$rowd['ParishCode'])?"SELECTED":"";
			  	$data.="<option value=\"".$rowd['ParishCode']."\" ".$selsubcounty.">".$rowd['ParishName']."</option>";
			
			 	} 
							
				pagination::free_result($q);
				return $data;

					}

					
					
					 function FinancialYearFilter($fyear){
 
  $yr=$_SESSION['Activeyear'];
				  $end=$yr;
				  
				  do{
				  
				  $prevyr=$end-1;
				  $sel=$prevyr."/".$end;
				  $selected=($fyear==$sel)?"selected":"";
				  $data.="<option value=\"".$prevyr."/".$end."\" ".$selected." >".$prevyr."/".$end."</option>";
				  $end--;}while($end>=2011);
				  return $data;
 
 
 }


 function YearFilter($fyear){
 
  $yr=$_SESSION['Activeyear'];
				  $end=$yr;
				  
				  do{
				  
				  $prevyr=$end-1;
				  $sel=$end==$fyear?"selected":"";;
				  $data.="<option value=\"".$end."\" ".$sel.">".$end."</option>";
				  $end--;}while($end>=2011);
				  return $data;
 
 
 }





 

//end of class QueryManager();

} 

//}


?>