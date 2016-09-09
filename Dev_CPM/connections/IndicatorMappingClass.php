<?php
//require_once('lib_sunrise.php');

class IndicatorMapping{
 var $query;
 var $role;
function IndicatorMapping($query){
$this->query;
}


function ViewAnyDetails($tblName,$whereClause,$GroupByClause,$orderByClause){
			$select="select * FROM ".$tblName." 
			 WHERE ".$whereClause." 
			 GROUP BY ".$GroupByClause."  
			 ORDER BY ".$orderByClause."";
			return $select;
		}


function FilterLookup($query){
			$select="select * from tbl_indicatormapping where 1 order by 1";
			return $select;
		}
		
		function ViewIndicatorMapping($whereClause,$GroupByClause,$orderByClause){
			$select="select * FROM tbl_indicatormapping 
			 WHERE ".$whereClause." 
			 GROUP BY ".$GroupByClause."  
			 ORDER BY ".$orderByClause."";
			return $select;
		}



function funct_dropDown($tblName, $colSelect, $colId, $colOrderBy){
		$data = "<option value='%'>-- Select --</option>";
		$qry = mysql_query(" select * from ".$tblName." group by ".$colSelect." order by ".$colOrderBy)or die(mysql_error());
		while($res = mysql_fetch_array($qry)){
			$data.= "<option value='".$res[$colId]."'>".substr($res[$colSelect],0,100)."</option>";
		}
		return $data;
	}


function funct_dropDownWhere($tblName,$colId, $colSelect, $colOrderBy, $colWhere, $colWhereVal,$SELECTED,$data=""){
		/* $vals = explode("|",$colWhereVal);
		for($one='',$a=0;$a<count($vals);$a++){
			if($a==(count($vals)-1)){
				$one.="'".$vals[$a]."'";
			}
			else{
				$one.="'".$vals[$a]."',";
			}
			$two = "(".$one.")";
		}
		 */
		$data = "<option value=''>-Any-</option>";
		$qry = Execute(" select * from ".$tblName." where ".$colWhere." = ".$colWhereVal." order by ".$colOrderBy)or die(http("IndicatorMapping-0047"));
		while($res = FetchRecords($qry)){
		$SEL=($res[$colId]==$SELECTED)?"selected":"";
			$data.= "<option value=\"".$res[$colId]."\" ".$SEL.">".$res[$colSelect]."</option>";
		}
		return $data;
	}
	


 

//end of class IndicatorMapping();

} 

//}


?>