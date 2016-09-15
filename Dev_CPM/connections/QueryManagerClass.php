<?php

//require_once('lib_sunrise.php');

class QueryManager
{
    var $query;
    var $role;


    function QueryManager($query)
    {
        $this->query;
    }

//------------------------Setup Query Manager----------------
//------------------------End of Setup Query Manager----------------
    function DashBoardIndicator($indicator, $MappingType)
    {
        $x = "select * from tbl_indicator 
									where mapping_type='" . $MappingType . "'
									and indicator_id LIKE '" . $indicator . "%' 
									order by indicator_name asc";
        return $x;
    }

    function VIEWDashBoard($indicator, $MappingType)
    {
        $x = "select * from tbl_indicator 
									where mapping_type='" . $MappingType . "'
									and indicator_id LIKE '" . $indicator . "%'
									and displayonDashboard='TRUE' 
									order by indicator_name asc";
        return $x;
    }


    function FinancialYearFilter($fyear)
    {

        $yr = $_SESSION['Activeyear'] + 4;
        $end = $yr;

        do {

            $prevyr = $end - 1;
            $sel = $prevyr . "/" . $end;
            $selected = ($fyear == $sel) ? "selected" : $fyear;
            $projectYear = ($_SESSION['quarter'] == 'Apr - Sep') ? $end : $sel;
            $data .= "<option value=\"" . $prevyr . "/" . $end . "\" " . $selected . " >" . $projectYear . "</option>";
            $end--;
        } while ($end >= 2013);
        return $data;


    }

    function FinancialYearDigitsFilter($financialYear)
    {

        $curr_year = date('Y');
        $start_year = 2013;
        $end_year = 2019;

        for ($yearCount = $start_year; $yearCount <= $end_year; $yearCount++) {
            //$selected=($yearCount==$curr_year)?"selected":$yearCount;
            $selected = ($yearCount == $financialYear) ? "selected" : "";
            $data .= "<option value=\"" . $yearCount . "\" " . $selected . " >" . $yearCount . "</option>";
        }


        return $data;


    }
	


//Months Filter 

    function mediaTypeFilter($media)
    {
        $q = Execute("select * from tbl_lookup where classCode='33' order by codeName asc ") or die(http(__line__));
        while ($rowx = FetchRecords($q)) {
            $selected = ($media == $rowx['codeName']) ? "selected" : "";
            $data .= "<option value=\"" . $rowx['codeName'] . "\"" . $selected . ">" . $rowx['codeName'] . "</option>";

        }
        $data .= "</select>";
        return $data;
    }

	function reportTypeFilter($reportType)
    {
        $q = Execute("select * from tbl_lookup where classCode='39' order by code asc ") or die(http(__line__));
        while ($row = FetchRecords($q)) {
            $selected = ($media == $row['codeName']) ? "selected" : "";
            $data .= "<option value=\"" . $row['codeName'] . "\"" . $selected . ">" . $row['codeName'] . "</option>";

        }
        $data .= "</select>";
        return $data;
    }
	
	function getUserName($userId){
			$q = Execute("SELECT `u`.`name` FROM `tbl_user` as `u` where `u`.`user_id` = '".$userId."'") or die(http(__line__));
				$row = FetchRecords($q);
            $nameString = $row['name'];
        return $nameString;
	
	}

	
	
    function monthFilter($year, $dateString, $date)
    {

        $curr_month = date('Y');
        $month = date("n", strtotime("" . $dateString . ""));

        $start_month = 1;
        $end_month = 12;

        for ($monthCount = $start_month; $monthCount <= $end_month; $monthCount++) {
            //$selected=($monthCount==$curr_month)?"selected":$monthCount;
            $selected = ($monthCount == $month) ? "selected" : "";
            $mon = date("F", mktime(0, 0, 0, $monthCount + 1, 0, 0, 0));
            $newMonthCount = strlen($monthCount) < 2 ? "0" . $monthCount : $monthCount;
            $value = $year . "-" . $newMonthCount . "-0" . $date . " " . date('h:i:s');
            $data .= "<option value=\"" . $value . "\" " . $selected . " >" . $mon . "</option>";
        }


        return $data;
    }


//-------------Reports Filter-----------------
    function ReportsFilter($report)
    {


        switch ($_SESSION['role']) {
            case pagination::roleMgt(0):

                $x = "select * from tbl_reports order by 2 asc";

                break;

            default:

                $x = "select * from tbl_reports  order by 2 asc";

        }

        $q = Execute($x) or die(http(__line__));
        while ($rowd = FetchRecords($q)) {
            $sel = ($rowd['reportCode'] == 2) ? "selected" : "";
            $data .= "<option value=\"" . $rowd['reportCode'] . "\" " . $sel . ">" . $rowd['reportName'] . "</option>";

        }


        return $data;
    }


    //-------------Region Filter-----------------
	function ZoneFilter($zone)
	{
		$data='';
			$x = "select * from tbl_zone  order by 2 asc";
			$q = Execute($x) or die(mysql_error());
			while ($rowd = FetchRecords($q)) {
				$sel = ($rowd['zoneCode'] == $zone) ? "selected" : "";
				$data .= "<option value=\"" . $rowd['zoneCode'] . "\" " . $sel . ">" . $rowd['zoneName'] . "</option>";
			}
		return $data;
	}

    //-------------Partner Filter-----------------
    function PartnerFilter($zone)
    {


        

                $x = "select * from tbl_partners  order by 2 asc";

        $q = Execute($x) or die(mysql_error());
        while ($rowd = FetchRecords($q)) {
            $sel = ($rowd['partnerCode'] == $zone) ? "selected" : "";
            $data .= "<option value=\"" . $rowd['partnerCode'] . "\" " . $sel . ">" . $rowd['partnerName'] . "</option>";

        }


        return $data;
    }


    function view_AnnualResultsReportLog($fyear, $district)
    {
        
		$query_string = "select q.district,q.semi_annual,q.year,
		sum(if(((q.semi_annual='Oct - Mar') and q.year='" . $fyear . "'),q.district,0)) AS Quarter1,
		sum(if(((q.semi_annual='Apr - Sep') and q.year like '" . $fyear . "'),q.district,0)) AS Quarter2
		from tbl_organizationreporting q  
		where q.district ='" . $district . "'
		group by q.district 
		order by q.district Asc";
		
		return $query_string;


    }


    function OutcomeFilter($outcome)
    {


        switch ($_SESSION['role']) {
            case pagination::roleMgt(0):
                $x = "select * from tbl_subcomponent order by subcomponent_code asc";
                $q = Execute($x) or die(http(__line__));
                while ($row = FetchRecords($q)) {
                    $selected = ($outcome == $row['subcomponent_id']) ? "selectED" : "";
                    $data .= "<option value=\"" . $row['subcomponent_id'] . "\" " . $selected . ">" . $row['subcomponent_code'] . " " . $row['subcomponent'] . "</option>";

                }
                break;

            case pagination::roleMgt(1):
                $x = "select * from tbl_subcomponent order by subcomponent_code asc";
                $q = Execute($x) or die(http(__line__));
                while ($row = FetchRecords($q)) {
                    $selected = ($outcome == $row['subcomponent_id']) ? "selectED" : "";
                    $data .= "<option value=\"" . $row['subcomponent_id'] . "\" " . $selected . ">" . $row['subcomponent_code'] . " " . $row['subcomponent'] . "</option>";

                }
                break;
            default:
                $x = "select * from tbl_subcomponent order by subcomponent_code asc";
                $q = Execute($x) or die(http(__line__));
                while ($row = FetchRecords($q)) {
                    $selected = ($outcome == $row['subcomponent_id']) ? "selectED" : "";
                    $data .= "<option value=\"" . $row['subcomponent_id'] . "\" " . $selected . ">" . $row['subcomponent_code'] . " " . $row['subcomponent'] . "</option>";

                }


        }


        return $data;
    }


    function ReportingPeriodFilter($period)
    {


        switch ($_SESSION['role']) {
            case pagination::roleMgt(0):

                $x = "select * from tbl_quarters  GROUP BY britishSemiannual order by 2 asc";

                break;

            default:

                $x = "select * from tbl_quarters  GROUP BY britishSemiannual order by 2 asc";

        }

        $q = Execute($x) or die(http(__line__));
        while ($rowd = FetchRecords($q)) {
            $sel = ($rowd['britishSemiannual'] == $period) ? "selected" : "";
            $data .= "<option value=\"" . $rowd['britishSemiannual'] . "\" " . $sel . ">" . $rowd['britishSemiannual'] . "</option>";

        }
        return $data;
    }


    function LOPTargets($subcomponent, $output, $indicatorType, $indicator)
    {

        $queryHeader = @FetchRecords(@Execute("select * from tbl_workplan_setup where status LIKE 'Open%' order by 1 asc"));

        switch ($_SESSION['role']) {
            default:
                $x = "select w.`workplan_id` , i.subcomponent_id, i.output_id,
					 i.indicator_code, i.indicator_id, i.indicator_name, i.`unitofmeasure` ,
					   	max(if((w.`target_year`='" . WorkplanYearSequence($queryHeader['opening_year'], $queryHeader['closure_year'], 0) . "'),w.`male`,'-')) as MaleYear1,
						max(if((w.`target_year`='" . WorkplanYearSequence($queryHeader['opening_year'], $queryHeader['closure_year'], 0) . "'),w.`female`,'-')) as FemaleYear1,
						max(if((w.`target_year`='" . WorkplanYearSequence($queryHeader['opening_year'], $queryHeader['closure_year'], 0) . "'),w.`otherTargets`,'-')) as OthersYear1,
						max(if((w.`target_year`='" . WorkplanYearSequence($queryHeader['opening_year'], $queryHeader['closure_year'], 1) . "'),w.`male`,'-')) as MaleYear2,
						max(if((w.`target_year`='" . WorkplanYearSequence($queryHeader['opening_year'], $queryHeader['closure_year'], 1) . "'),w.`female`,'-')) as FemaleYear2,
						max(if((w.`target_year`='" . WorkplanYearSequence($queryHeader['opening_year'], $queryHeader['closure_year'], 1) . "'),w.`otherTargets`,'-')) as OthersYear2,
						max(if((w.`target_year`='" . WorkplanYearSequence($queryHeader['opening_year'], $queryHeader['closure_year'], 2) . "'),w.`male`,'-')) as MaleYear3,
						max(if((w.`target_year`='" . WorkplanYearSequence($queryHeader['opening_year'], $queryHeader['closure_year'], 2) . "'),w.`female`,'-')) as FemaleYear3,
						max(if((w.`target_year`='" . WorkplanYearSequence($queryHeader['opening_year'], $queryHeader['closure_year'], 2) . "'),w.`otherTargets`,'-')) as OthersYear3,
						max(if((w.`target_year`='" . WorkplanYearSequence($queryHeader['opening_year'], $queryHeader['closure_year'], 3) . "'),w.`male`,'-')) as MaleYear4,
						max(if((w.`target_year`='" . WorkplanYearSequence($queryHeader['opening_year'], $queryHeader['closure_year'], 3) . "'),w.`female`,'-')) as FemaleYear4,
						max(if((w.`target_year`='" . WorkplanYearSequence($queryHeader['opening_year'], $queryHeader['closure_year'], 3) . "'),w.`otherTargets`,'-')) as OthersYear4,
						 i.`display` , i.typeofDisaggregation, i.disaggregation,i.`indicator_type`
						from tbl_indicator i
						LEFT JOIN `tbl_loptargets` w ON ( i.indicator_id = w.indicator_id )
						where i.output_id='" . $output . "'
				 		&& i.indicator_type LIKE '" . $indicatorType . "%'
				 		and i.indicator_name like '" . $indicator . "%' and i.display  like 'Yes%' 
						GROUP BY i.indicator_id
						
						order by i.output_id,i.indicator_code asc";

                break;

        }
        return $x;

    }


    function VariableIndicatorFilter($ResultChainLevel, $mappingType, $subcomponent_id, $parent_Indicator, $variable)
    {

        switch ($mappingType) {
            case "Variable Definition":

                break;
            default:

                //-------------Variable Indicaoors to be mapped
                if ($ResultChainLevel == NULL)
                    $x1 = "select * from tbl_indicator i
											   where i.indicator_name <> '' 
											   and i.mapping_type='" . $mappingType . "' 
											   and subcomponent_id LIKE '" . $subcomponent_id . "%'
											   and variable='" . $variable . "'
											   GROUP BY  indicator_code,indicator_name asc ";
                else $x1 = "select * from tbl_indicator i
											   where i.indicator_name <> '' 
											   and i.mapping_type='" . $mappingType . "' 
											   and subcomponent_id LIKE '" . $subcomponent_id . "%'
											   and rc_id='" . $ResultChainLevel . "'
											   and variable='" . $variable . "'
												GROUP BY indicator_code,indicator_name asc ";

                $queryi = @Execute($x1) or die(http(__line__));
                while ($rowi = @FetchRecords($queryi)) {
                    $selected2i2 = $rowi['indicator_id'] == $parent_Indicator ? "selectED" : "";


                    $data .= "<option value=\"" . $rowi['indicator_id'] . "\" " . $selected2i2 . ">" . $rowi['indicator_code'] . " 
					  " . retrieve_info_withSpecialCharacters($rowi['indicator_name']) . "</option>";
                }
                break;

        }
        return $data;
    }

    function ViewIndicatorAnnualTargets($output_id)
    {

        $x = "select i.responsible,i.indicator_type,i.indicator_id,i.indicator_code,i.indicator_name,
				i.baseline,i.unitofmeasure,i.typeofDisaggregation,i.disaggregation
 				from  tbl_indicator i 
  				";

        switch ($_SESSION['role']) {
            case pagination::roleMgt(0);


                $x .= " where  i.subcomponent_id LIKE '" . $_SESSION['subcomponent_id'] . "%'
				 and i.output_id='" . $output_id . "'
				 && i.indicator_type LIKE '" . $_SESSION['indicator_Type'] . "%'
				 and i.indicator_name like '" . $_SESSION['indicator'] . "%'
				  and i.indicator_code like '" . $_SESSION['indicatorCode'] . "%' 
				  group by i.indicator_id
				  order by i.indicator_code asc";

                break;
            default:

                $x .= "where  i.subcomponent_id LIKE '" . $_SESSION['subcomponent_id'] . "%'
			 and i.output_id='" . $output_id . "'
			 && i.indicator_type LIKE '" . $_SESSION['indicator_Type'] . "%'
			 and i.indicator_name like '" . $_SESSION['indicator'] . "%'
			  and i.indicator_code like '" . $_SESSION['indicatorCode'] . "%' 
			  group by i.indicator_id
			  order by i.indicator_code asc";


        }

        return $x;


    }

//Ftf Report select indicators

    function ViewIndicatorAnnualTargetsFtF($output_id)
    {

        $x = "select i.responsible,i.indicator_type,i.indicator_id,i.indicator_code,i.indicator_name,
				i.baseline,i.unitofmeasure,i.typeofDisaggregation,i.disaggregation
 				from  tbl_indicator i 
  				";

        $arr_indicator_id = array(12,21,22,23,24,25,26,33,34,36,38,39);
		
        switch ($_SESSION['role']) {
            case pagination::roleMgt(0);


                $x .= " where  i.subcomponent_id LIKE '" . $_SESSION['subcomponent_id'] . "%'
				 and i.output_id='" . $output_id . "'
				 && i.indicator_type LIKE '" . $_SESSION['indicator_Type'] . "%'
				 and i.indicator_name like '" . $_SESSION['indicator'] . "%'
				  and i.indicator_code like '" . $_SESSION['indicatorCode'] . "%'";
                foreach ($arr_indicator_id as $indicator_id) {
                    $x .= " and i.indicator_id <> " . $indicator_id . "";
                }
                $x .= "group by i.indicator_id
				  order by i.indicator_code asc";

                break;
            default:


                $x .= "where  i.subcomponent_id LIKE '" . $_SESSION['subcomponent_id'] . "%'
			 and i.output_id='" . $output_id . "'
			 && i.indicator_type LIKE '" . $_SESSION['indicator_Type'] . "%'
			 and i.indicator_name like '" . $_SESSION['indicator'] . "%'
			  and i.indicator_code like '" . $_SESSION['indicatorCode'] . "%'";
                foreach ($arr_indicator_id as $indicator_id) {
                    $x .= " and i.indicator_id<>" . $indicator_id . "";
                }
                $x .= " group by i.indicator_id
			  order by i.indicator_code asc";


        }

        return $x;


    }

    function ViewIndicatorAnnualTargetsReportsFtF($indicator_id, $opening_year, $closure_year)
    {

        $x = "select
				max(if(w.curr_year='" . TheFinancialYear($opening_year, $closure_year, 0) . "',w.Target,'-')) as fy1,
				max(if(w.curr_year='" . TheFinancialYear($opening_year, $closure_year, 1) . "',w.Target,'-')) as fy2,
				max(if(w.curr_year='" . TheFinancialYear($opening_year, $closure_year, 2) . "',w.Target,'-')) as fy3,
				max(if(w.curr_year='" . TheFinancialYear($opening_year, $closure_year, 3) . "' ,w.Target,'-')) as fy4,
				max(if(w.curr_year='" . TheFinancialYear($opening_year, $closure_year, 4) . "',w.Target,'-')) as fy5,
				max(if(w.curr_year='" . TheFinancialYear($opening_year, $closure_year, 5) . "' ,w.Target,'-')) as fy6
 				from tbl_workplan w 
  				";

        switch ($_SESSION['role']) {
            case pagination::roleMgt(0);


                $x .= " where 
				  w.indicator_id='" . $indicator_id . "' 
				  group by w.indicator_id
				  order by w.indicator_id asc";

                break;
            default:


                $x .= " where 
				 w.indicator_id='" . $indicator_id . "' 
				  group by w.indicator_id
				  order by w.indicator_id asc";


        }

        return $x;


    }

//End of FtFindicator Report select Indicators
    function ViewIndicatorAnnualTargetsReports($indicator_id, $opening_year, $closure_year)
    {

        $x = "select `s`.`sub_indicatorId`,
				max(if(w.curr_year='" . TheFinancialYear($opening_year, $closure_year, 0) . "',w.Target,'-')) as fy1,
				max(if(w.curr_year='" . TheFinancialYear($opening_year, $closure_year, 1) . "',w.Target,'-')) as fy2,
				max(if(w.curr_year='" . TheFinancialYear($opening_year, $closure_year, 2) . "',w.Target,'-')) as fy3,
				max(if(w.curr_year='" . TheFinancialYear($opening_year, $closure_year, 3) . "' ,w.Target,'-')) as fy4,
				max(if(w.curr_year='" . TheFinancialYear($opening_year, $closure_year, 4) . "',w.Target,'-')) as fy5,
				max(if(w.curr_year='" . TheFinancialYear($opening_year, $closure_year, 5) . "' ,w.Target,'-')) as fy6
 				from tbl_workplan w left join `tbl_sub_indicator` as `s` on `s`.`indicator_id`=`w`.`indicator_id`
				";

        switch ($_SESSION['role']) {
            case pagination::roleMgt(0);


                $x .= " where 
				  w.indicator_id='" . $indicator_id . "' 
				  group by `s`.`sub_indicatorId`
				  order by w.indicator_id asc";

                break;
            default:


                $x .= " where 
				 w.indicator_id='" . $indicator_id . "' 
				  group by `s`.`sub_indicatorId`
				  order by w.indicator_id asc";


        }

        return $x;


    }


    function identifyIndicatorLevelTargets($unitofMeasure, $yr1, $yr2, $yr3, $yr4, $yr5, $yr6, $yr7)
    {
        $total = 0;

        switch ($unitofMeasure) {

            case "Percentage":
                $l = array(
                    0 => '' . $yr1 . '',
                    1 => '' . $yr2 . '',
                    2 => '' . $yr3 . '',
                    3 => '' . $yr4 . '',
                    4 => '' . $yr5 . '',
                    5 => '' . $yr6 . '',
                    6 => '' . $yr7 . ''
                );
                arsort($l);
                sort($l);
                $total = (($l[6]) <> '') ? $l[6] : max($l);

                break;
            case "%":
                $l = array(
                    0 => '' . $yr1 . '',
                    1 => '' . $yr2 . '',
                    2 => '' . $yr3 . '',
                    3 => '' . $yr4 . '',
                    4 => '' . $yr5 . '',
                    5 => '' . $yr6 . '',
                    6 => '' . $yr7 . ''
                );
                arsort($l);
                sort($l);
                $total = (($l[6]) <> '') ? $l[6] : max($l);


                break;

            default:
                $total = ($yr1 + $yr2 + $yr3 + $yr4 + $yr5 + $yr6 + $yr7);
                break;

        }

        return $total;

    }

    function identifyIndicatorLevelActuals($unitofMeasure, $yr1, $yr2, $yr3, $yr4, $yr5, $yr6, $yr7)
    {
        $total = 0;

        switch ($unitofMeasure) {

            case "Percentage":
                $l = array(
                    0 => '' . $yr1 . '',
                    1 => '' . $yr2 . '',
                    2 => '' . $yr3 . '',
                    3 => '' . $yr4 . '',
                    4 => '' . $yr5 . '',
                    5 => '' . $yr6 . '',
                    6 => '' . $yr7 . ''
                );
                arsort($l);
                sort($l);
                $total = (($l[6]) <> '') ? $l[6] : max($l);

                break;
            case "%":
                $l = array(
                    0 => '' . $yr1 . '',
                    1 => '' . $yr2 . '',
                    2 => '' . $yr3 . '',
                    3 => '' . $yr4 . '',
                    4 => '' . $yr5 . '',
                    5 => '' . $yr6 . '',
                    6 => '' . $yr7 . ''
                );
                arsort($l);
                sort($l);
                $total = (($l[6]) <> '') ? $l[6] : max($l);


                break;

            default:
                $total = ($yr1 + $yr2 + $yr3 + $yr4 + $yr5 + $yr6 + $yr7);
                break;

        }

        return $total;

    }

	function dataMapsTargets($yr1, $yr2, $yr3, $yr4, $yr5, $yr6, $yr7)
    {
         $total = ($yr1 + $yr2 + $yr3 + $yr4 + $yr5 + $yr6 + $yr7);
        return $total;

    }
	
	function dataMapsActual($yr1, $yr2, $yr3, $yr4, $yr5, $yr6, $yr7)
    {
         $total = ($yr1 + $yr2 + $yr3 + $yr4 + $yr5 + $yr6 + $yr7);
        return $total;

    }
	
   function identifyIndicatorLevel($unitofMeasure,$yr1,$yr2,$yr3,$yr4,$yr5,$yr6,$yr7=0)
    {
        $total=0;

        switch($unitofMeasure){

            case "Percentage":
                //$l= array($yr1,$yr2,$yr3,$yr4,$yr5,$yr6,$yr7);
                $total=$yr6;
                break;

            case "%":
                //$l= array($yr1,$yr2,$yr3,$yr4,$yr5,$yr6,$yr7);
                $total=$yr6;
                break;

            default:
                $total=($yr1+$yr2+$yr3+$yr4+$yr5+$yr6+$yr7);
                break;

        }
        return $total;
    }



    function TotalNumberFarmers($totNumFarmers)
    {
        $stmnt = "select count(DISTINCT `f`.`tbl_farmersId`) AS `totNumFarmers` from `tbl_farmers` AS `f`";
        $farmerQuery = Execute($stmnt) or die(http(__line__));
        $rowFarmers = FetchRecords($farmerQuery);
        $sumFarmers = $rowFarmers['totNumFarmers'];
        return $sumFarmers;
    }



    function ViewAnnualTargets($year, $quarter, $indicator_id)
    {
        switch ($_SESSION['role']) {
            case pagination::roleMgt(0);


                $x = "select w.workplan_id,i.indicator_type,i.indicator_id,i.indicator_code,i.indicator_name,
i.baseline,i.unitofmeasure,i.typeofDisaggregation,i.disaggregation,w.semi_annual,w.curr_year,w.region,
sum(w.Target) AS totalAnnualTarget
 from  tbl_indicator i 
 LEFT JOIN tbl_workplan w ON(i.indicator_id=w.indicator_id)
  where  i.subcomponent_id LIKE '" . $_SESSION['subcomponent_id'] . "%'
 and i.output_id LIKE '" . $_SESSION['output_id'] . "%'
 && i.indicator_type LIKE '" . $_SESSION['indicator_Type'] . "%'
 and i.indicator_name LIKE '" . $_SESSION['indicator'] . "%'
  and i.indicator_code LIKE '" . $_SESSION['indicatorCode'] . "%'
  and w.region LIKE '" . $_SESSION['zoneID'] . "%'
  and w.indicator_id='" . $indicator_id . "'
  and w.curr_year LIKE '" . $year . "%'
  GROUP BY i.indicator_id
  order by i.indicator_code asc";


                break;
            default:


                $x = "select w.workplan_id,i.indicator_type,i.indicator_id,i.indicator_code,i.indicator_name,
i.baseline,i.unitofmeasure,i.typeofDisaggregation,i.disaggregation,w.semi_annual,w.curr_year,w.region,
max(w.Target) AS totalAnnualTarget
 from  tbl_indicator i 
 LEFT JOIN tbl_workplan w ON(i.indicator_id=w.indicator_id)
 where  i.subcomponent_id LIKE '" . $_SESSION['subcomponent_id'] . "%'
 and i.output_id LIKE '" . $_SESSION['output_id'] . "%'
 && i.indicator_type LIKE '" . $_SESSION['indicator_Type'] . "%'
 and i.indicator_name LIKE '" . $_SESSION['indicator'] . "%'
  and i.indicator_code LIKE '" . $_SESSION['indicatorCode'] . "%'
  and w.region LIKE '" . $_SESSION['zoneID'] . "%'
  and w.indicator_id='" . $indicator_id . "'
  and w.curr_year LIKE '" . $year . "%'
  GROUP BY i.indicator_id
  order by i.indicator_code asc";
                break;


        }

        $yQuery = Execute($x) or die(http(__line__));
        $rowHO = FetchRecords($yQuery);
        return $x;


    }

	function ViewAnnualTargetsSub($year, $quarter, $indicator_id)
    {
        switch ($_SESSION['role']) {
            case pagination::roleMgt(0);


                $x = "select w.workplan_id,i.indicator_type,i.indicator_id,i.indicator_code,i.indicator_name,
i.baseline,i.unitofmeasure,i.typeofDisaggregation,i.disaggregation,w.semi_annual,w.curr_year,w.region,

max(w.Target) AS totalAnnualTarget
 from  tbl_indicator i 
 LEFT JOIN tbl_workplan w ON(i.indicator_id=w.indicator_id)
 LEFT JOIN tbl_workplan_sub wb ON(w.indicator_id=wb.indicator_id)
 where  i.subcomponent_id LIKE '" . $_SESSION['subcomponent_id'] . "%'
 and i.output_id LIKE '" . $_SESSION['output_id'] . "%'
 && i.indicator_type LIKE '" . $_SESSION['indicator_Type'] . "%'
 and i.indicator_name LIKE '" . $_SESSION['indicator'] . "%'
  and i.indicator_code LIKE '" . $_SESSION['indicatorCode'] . "%'
  and w.region LIKE '" . $_SESSION['zoneID'] . "%'
  and w.indicator_id='" . $indicator_id . "'
  and w.curr_year LIKE '" . $year . "%' 
  and wb.curr_year = w.curr_year 
  GROUP BY i.indicator_id
  order by i.indicator_code asc";


                break;
            default:


                $x = "select w.workplan_id,i.indicator_type,i.indicator_id,i.indicator_code,i.indicator_name,
i.baseline,i.unitofmeasure,i.typeofDisaggregation,i.disaggregation,w.semi_annual,w.curr_year,w.region,

max(w.Target) AS totalAnnualTarget
 from  tbl_indicator i 
 LEFT JOIN tbl_workplan w ON(i.indicator_id=w.indicator_id)
 LEFT JOIN tbl_workplan_sub wb ON(w.indicator_id=wb.indicator_id)
 where  i.subcomponent_id LIKE '" . $_SESSION['subcomponent_id'] . "%'
 and i.output_id LIKE '" . $_SESSION['output_id'] . "%'
 && i.indicator_type LIKE '" . $_SESSION['indicator_Type'] . "%'
 and i.indicator_name LIKE '" . $_SESSION['indicator'] . "%'
  and i.indicator_code LIKE '" . $_SESSION['indicatorCode'] . "%'
  and w.region LIKE '" . $_SESSION['zoneID'] . "%'
  and w.indicator_id='" . $indicator_id . "'
  and w.curr_year LIKE '" . $year . "%' 
  and wb.curr_year = w.curr_year 
  GROUP BY i.indicator_id
  order by i.indicator_code asc";
                break;


        }

        $yQuery = Execute($x) or die(http(__line__));
        $rowHO = FetchRecords($yQuery);
        return $x;


    }


    function DerivedTableIdentifier($UniqueKey, $TableName, $PrimaryKey, $ErrorCode)
    {
        $select = "select * from " . $TableName . " where " . $UniqueKey;
        $query = @Execute($select) or die(http($ErrorCode));
        $rowKey = @FetchRecords($query);
        return $rowKey[$PrimaryKey];
    }


    function viewASARECAIndicators($level1)
    {
        $level = array('ASARECA', 'Program', 'Project');

        $query_string = "select  i.`disaggregation`, i.`gender`, 
					 i.`frequency_of_reporting`, i.`remarks`, i.`responsible`, i.`expected_output`, i.`unitofmeasure`,
					  i.`baseyear`, i.`baseline`, i.`updatedby`, i.`display`, i.`dateupdated`, ";


        switch ($level1) {

            case $level[0]:

                $query_string .= "i.indicator_id,i.prog_id,i.output_id, i.project_id,i.indicator_type, i.display,
i.mapping_type, i.indicator_code, i.indicator_name, i.prog_id from tbl_indicator i
			where i.mapping_type like '" . $level[0] . "%'
			and  i.indicator_code like '%" . $_SESSION['indicator_code'] . "%' and i.display like 'Yes%'
			order by i.mapping_type,i.indicator_type,i.indicator_code,i.indicator_name asc";

                break;

            case $level[1]:

                $query_string .= " i.indicator_id,i.prog_id,i.output_id,i.project_id,i.indicator_type,i.mapping_type,i.indicator_code,i.indicator_name
					,i.subcomponent_id,p.program_name,p.prog_id,i.display
						from tbl_indicator i 
							left join tbl_programme p on(p.prog_id=i.prog_id)
								where i.mapping_type like '" . $level[1] . "%'
										and  i.indicator_code like '%" . $_SESSION['indicator_code'] . "%' 
										and i.display like 'Yes%' and 
										p.prog_id like '" . $_SESSION['programme'] . "%'
											and i.indicator_code like '%" . $_SESSION['indicator_code'] . "%'
											order by i.mapping_type,i.indicator_type,i.indicator_code,i.indicator_name asc";

                break;

            case $level[2]:

                $query_string .= " i.indicator_id,i.indicator_type,
						i.prog_id,i.output_id,i.project_id,i.mapping_type,i.indicator_code,i.indicator_name,s.subcomponent_code,
						s.subcomponent,s.subcomponent_id,p.program_name,p.prog_id,i.display,i.project_id
							from tbl_indicator i left join tbl_subcomponent s on(s.subcomponent_id=i.subcomponent_id) 
								left join tbl_programme p on(p.prog_id=i.prog_id)
									where i.mapping_type like '" . $level[2] . "%'
								and  i.project_id like '%" . $_SESSION['project'] . "%'
								 and i.display like 'Yes%'
									and i.indicator_code like '%" . $_SESSION['indicator_code'] . "%'
										and p.prog_id like '" . $_SESSION['programme'] . "%'
										
										order by i.mapping_type,i.indicator_type,i.indicator_code,i.indicator_name asc";

                break;

            default:
                $query_string .= " i.indicator_id, i.indicator_type,i.prog_id,i.project_id,i.output_id, i.display,
							i.mapping_type, i.indicator_code, i.indicator_name,
 							i.prog_id from tbl_indicator i
							where i.mapping_type like '" . $level[0] . "%'
							and  i.indicator_code like '%" . $_SESSION['indicator_code'] . "%' and i.display like 'Yes%'
							order by i.mapping_type,i.indicator_type,i.indicator_code,i.indicator_name asc";


        }
        return $query_string;


    }


//include("connections/setupModuleClass.php");
    function ResultsFramework()
    {

        $classCode = 28;

//l.classCode='".$classCode."' and l.classCode like '".$classCode."%' &&

        switch ($_SESSION['role']) {
            //----------------------M&E Personnel--------------------------------
            case pagination::roleMgt(0):
                $query_string = "select * from tbl_programme where prog_id='" . $_SESSION['program_id'] . "'  and type LIKE 'Program%' and display='Yes' order by prog_id asc";
                break;

            //----------------------M&E Personnel--------------------------------l.classCode like '".$classCode."%' && 
            case pagination::roleMgt(1):
                $query_string = "select * from tbl_programme where prog_id='" . $_SESSION['program_id'] . "'  and type LIKE 'Program%' and display='Yes' order by prog_id asc";
                break;
            case pagination::roleMgt(2);
                $query_string = "select * from tbl_programme where prog_id='" . $_SESSION['program_id'] . "'  and type LIKE 'Program%' and display='Yes' order by prog_id asc";
                break;
            case pagination::roleMgt(3);
                $query_string = "select * from tbl_programme where  type LIKE 'Program%' and display='Yes' order by prog_id asc";
                break;

            default:

                $query_string = "select * from tbl_programme where type LIKE 'Program%' 
					  and display='Yes' 
					  order by prog_id asc";
                break;

        }
        return $query_string;


    }

    function TotalPublications($program, $project)
    {
        switch ($_SESSION['role']) {
//------------Tso-----------------
            case pagination::roleMgt(0):

                $sql = "select c.`publication_id` , c.`project_id` , p.`prog_id` , c.`title` , c.`organization` , c.`dateofpublication` , c.`updatedby` , c.`status` , p.prog_id, p.program_name, sum( if( l.codeName = 'Published', 1, 0 ) ) AS Published,
								 sum( if( l.codeName = 'Manuscripts', 1, 0 ) ) AS Manuscripts,
								  sum( if( l.codeName = 'Chapter in books', 1, 0 ) ) AS Chapter_in_books,
								   sum( if( l.codeName = 'Conference proceedings', 1, 0 ) ) AS Conference_proceedings,
									sum( if( l.codeName = 'Books', 1, 0 ) ) AS Books,
									 sum( if( l.codeName = 'Electronic Newsletters', 1, 0 ) ) AS Electronic_Newsletters, 
									 sum( if( l.codeName = 'Documentaries', 1, 0 ) ) AS Documentaries,
									  sum( if( l.codeName = 'Other publications', 1, 0 ) ) AS Other_publications,
									   l.classCode
								from tbl_programme p
								LEFT JOIN `tbl_publication` c ON ( p.prog_id = c.prog_id )
								LEFT JOIN tbl_lookup l ON ( l.code = c.typeofpublication )
								where p.prog_id='" . $_SESSION['program_id'] . "' 
								and p.type='Program'
								and c.project_id='" . $_SESSION['project_id'] . "'
								GROUP BY c.status
								HAVING c.status='Yes'
								order by c.status asc";
                break;
            //---------------M&E------------------------
            case pagination::roleMgt(1):

                $sql = "select c.`publication_id` , c.`project_id` , p.`prog_id` , c.`title` , c.`organization` , c.`dateofpublication` , c.`updatedby` , c.`status` , p.prog_id, p.program_name, sum( if( l.codeName = 'Published', 1, 0 ) ) AS Published,
						 sum( if( l.codeName = 'Manuscripts', 1, 0 ) ) AS Manuscripts,
						  sum( if( l.codeName = 'Chapter in books', 1, 0 ) ) AS Chapter_in_books,
						   sum( if( l.codeName = 'Conference proceedings', 1, 0 ) ) AS Conference_proceedings,
							sum( if( l.codeName = 'Books', 1, 0 ) ) AS Books,
							 sum( if( l.codeName = 'Electronic Newsletters', 1, 0 ) ) AS Electronic_Newsletters, 
							 sum( if( l.codeName = 'Documentaries', 1, 0 ) ) AS Documentaries,
							  sum( if( l.codeName = 'Other publications', 1, 0 ) ) AS Other_publications,
							   l.classCode
						from tbl_programme p
						LEFT JOIN `tbl_publication` c ON ( p.prog_id = c.prog_id )
						LEFT JOIN tbl_lookup l ON ( l.code = c.typeofpublication )
						where p.prog_id='" . $_SESSION['program_id'] . "' 
						and p.type='Program'
						and c.project_id='" . $_SESSION['project_id'] . "'
						GROUP BY c.status
						HAVING c.status='Yes'
						order by c.status asc";
                break;
            //---------CDO-------------------------------
            case pagination::roleMgt(2):

                $sql = "select c.`publication_id` , c.`project_id` , p.`prog_id` , c.`title` , c.`organization` , c.`dateofpublication` , c.`updatedby` , c.`status` , p.prog_id, p.program_name, sum( if( l.codeName = 'Published', 1, 0 ) ) AS Published,
							 sum( if( l.codeName = 'Manuscripts', 1, 0 ) ) AS Manuscripts,
							  sum( if( l.codeName = 'Chapter in books', 1, 0 ) ) AS Chapter_in_books,
							   sum( if( l.codeName = 'Conference proceedings', 1, 0 ) ) AS Conference_proceedings,
								sum( if( l.codeName = 'Books', 1, 0 ) ) AS Books,
								 sum( if( l.codeName = 'Electronic Newsletters', 1, 0 ) ) AS Electronic_Newsletters, 
								 sum( if( l.codeName = 'Documentaries', 1, 0 ) ) AS Documentaries,
								  sum( if( l.codeName = 'Other publications', 1, 0 ) ) AS Other_publications,
								   l.classCode
							from tbl_programme p
							LEFT JOIN `tbl_publication` c ON ( p.prog_id = c.prog_id )
							LEFT JOIN tbl_lookup l ON ( l.code = c.typeofpublication )
							where p.prog_id='" . $_SESSION['program_id'] . "' 
							and p.type='Program'
							and c.project_id='" . $_SESSION['project_id'] . "'
							GROUP BY c.status
							HAVING c.status='Yes'
							order by c.status asc";
                break;

            //---------CDO-------------------------------
            case pagination::roleMgt(3):

                $sql = "select c.`publication_id` , c.`project_id` , p.`prog_id` , c.`title` , c.`organization` , c.`dateofpublication` , c.`updatedby` , c.`status` , p.prog_id, p.program_name, sum( if( l.codeName = 'Published', 1, 0 ) ) AS Published,
							 sum( if( l.codeName = 'Manuscripts', 1, 0 ) ) AS Manuscripts,
							  sum( if( l.codeName = 'Chapter in books', 1, 0 ) ) AS Chapter_in_books,
							   sum( if( l.codeName = 'Conference proceedings', 1, 0 ) ) AS Conference_proceedings,
								sum( if( l.codeName = 'Books', 1, 0 ) ) AS Books,
								 sum( if( l.codeName = 'Electronic Newsletters', 1, 0 ) ) AS Electronic_Newsletters, 
								 sum( if( l.codeName = 'Documentaries', 1, 0 ) ) AS Documentaries,
								  sum( if( l.codeName = 'Other publications', 1, 0 ) ) AS Other_publications,
								   l.classCode
							from tbl_programme p
							LEFT JOIN `tbl_publication` c ON ( p.prog_id = c.prog_id )
							LEFT JOIN tbl_lookup l ON ( l.code = c.typeofpublication )
							where p.prog_id LIKE '" . $program . "%' 
							and p.type='Program'
							and c.project_id LIKE '" . $project . "%'
							GROUP BY c.status
							HAVING c.status='Yes'
							order by c.status asc";
                break;


            default:
                $sql = "select c.`publication_id` , c.`project_id` , p.`prog_id` , c.`title` , c.`organization` , c.`dateofpublication` , c.`updatedby` , c.`status` , p.prog_id, p.program_name, sum( if( l.codeName = 'Published', 1, 0 ) ) AS Published,
								 sum( if( l.codeName = 'Manuscripts', 1, 0 ) ) AS Manuscripts,
								  sum( if( l.codeName = 'Chapter in books', 1, 0 ) ) AS Chapter_in_books,
								   sum( if( l.codeName = 'Conference proceedings', 1, 0 ) ) AS Conference_proceedings,
									sum( if( l.codeName = 'Books', 1, 0 ) ) AS Books,
									 sum( if( l.codeName = 'Electronic Newsletters', 1, 0 ) ) AS Electronic_Newsletters, 
									 sum( if( l.codeName = 'Documentaries', 1, 0 ) ) AS Documentaries,
									  sum( if( l.codeName = 'Other publications', 1, 0 ) ) AS Other_publications,
									   l.classCode
								from tbl_programme p
								LEFT JOIN `tbl_publication` c ON ( p.prog_id = c.prog_id )
								LEFT JOIN tbl_lookup l ON ( l.code = c.typeofpublication )
								where p.prog_id LIKE '" . $program . "%' and p.type='Program'
								and c.project_id LIKE '" . $project . "%'
								GROUP BY c.status
								HAVING c.status='Yes'
								order by c.status asc";
                break;

        }
        return $sql;
    }


//-------------------Perfoemance Narrative Report--------------------

    function ProgramNarrativeReporting($programID)
    {


        switch ($_SESSION['role']) {
            //----------------------M&E Personnel--------------------------------
            case pagination::roleMgt(0):
                $query_string = "select * from tbl_programme 
						  				where prog_id='" . $_SESSION['program_id'] . "'  
										and type LIKE 'Program%' 
										and display='Yes' 
										order by prog_id asc";

                $q = Execute($query_string) or die(http(__line__));


                break;

            //----------------------M&E Personnel--------------------------------l.classCode like '".$classCode."%' && 
            case pagination::roleMgt(1):
                $query_string = "select * from tbl_programme 
						  				where prog_id='" . $_SESSION['program_id'] . "'  
										and type LIKE 'Program%' 
										and display='Yes' 
										order by prog_id asc";

                $q = Execute($query_string) or die(http(__line__));

                break;
            case pagination::roleMgt(2);
                $query_string = "select * from tbl_programme 
						  				where prog_id='" . $_SESSION['program_id'] . "'  
										and type LIKE 'Program%' 
										and display='Yes' 
										order by prog_id asc";

                $q = Execute($query_string) or die(http(__line__));

                break;
            case pagination::roleMgt(3);
                $query_string = "select * from tbl_programme where  type LIKE 'Program%' and display='Yes' order by prog_id asc";

                $q = Execute($query_string) or die(http(__line__));


                break;

            default:

                $query_string = "select * from tbl_programme 
	 				where type LIKE 'Program%' 
					  and display='Yes' 
					  order by prog_id asc";

                $q = Execute($query_string) or die(http(__line__));


                break;

        }
        // pagination::free_result($q);
        return $q;

    }

    function ProjectNarrativeReporting($programID, $projectID)
    {


        switch ($_SESSION['role']) {
            //----------------------Principal Investigator--------------------------------
            case pagination::roleMgt(0):
                $query_string = "select * from tbl_project 
						  				where  programme_id='" . $_SESSION['program_id'] . "' 
										and id='" . $_SESSION['project_id'] . "'
						   				and display='Yes' 
										order by title asc";


                break;


            case pagination::roleMgt(1):
                $query_string = "select * from tbl_project 
						  				where  programme_id='" . $_SESSION['program_id'] . "' and 
						  				 id='" . $_SESSION['project_id'] . "' and display='Yes' order by title asc";


                break;
            case pagination::roleMgt(2);
                $query_string = "select * from tbl_project where program_id='" . $_SESSION['program_id'] . "' and id LIKE '" . $projectID . "%' display='Yes' order by project_code,title asc";


                break;
            case pagination::roleMgt(3);
                $query_string = "select * from tbl_project 
						  where programme_id LIKE '" . $programID . "%'
						  and id LIKE '" . $projectID . "%'
						   and display='Yes' order by project_code,title asc";

                break;

            default:

                $query_string = "select * from tbl_project 
						  where programme_id LIKE '" . $programID . "%'
						  and id LIKE '" . $projectID . "%'
						   and display='Yes' order by project_code,title asc";


                break;
        }
        // pagination::free_result($q);
        return $query_string;

    }


//-------------ProjectNarrativeReportLog---------------------
    function ProjectNarrativeReportLog($programID, $projectID)
    {
        switch ($_SESSION['role']) {
            //----------------------Principal Investigator--------------------------------
            case pagination::roleMgt(0):
                $query_string = "select * from tbl_project 
						  				where  programme_id='" . $_SESSION['program_id'] . "' 
										and id='" . $_SESSION['project_id'] . "'
						   				and display='Yes' 
										order by title asc";


                break;


            case pagination::roleMgt(1):
                $query_string = "select * from tbl_project 
						  				where  programme_id='" . $_SESSION['program_id'] . "' and 
						  				 id='" . $_SESSION['project_id'] . "' and display='Yes' order by title asc";


                break;
            case pagination::roleMgt(2);
                $query_string = "select * from tbl_project where program_id='" . $_SESSION['program_id'] . "' and id LIKE '" . $projectID . "%' display='Yes' order by project_code,title asc";


                break;
            case pagination::roleMgt(3);
                $query_string = "select * from tbl_project 
						  where programme_id LIKE '" . $programID . "%'
						  and id LIKE '" . $projectID . "%'
						   and display='Yes' order by project_code,title asc";

                break;

            default:

                $query_string = "select * from tbl_project 
						  where programme_id LIKE '" . $programID . "%'
						  and id LIKE '" . $projectID . "%'
						   and display='Yes' order by project_code,title asc";


                break;


        }
        return $query_string;

    }


    function ProgramGeneralQuery($programID)
    {


        switch ($_SESSION['role']) {
            //----------------------M&E Personnel--------------------------------
            case pagination::roleMgt(0):
                $query_string = "select * from tbl_programme 
						  				where prog_id='" . $programID . "'  
										and type LIKE 'Program%' 
										and display='Yes' 
										GROUP BY program_name 
										order by prog_id
										asc";


                break;

            //----------------------M&E Personnel--------------------------------l.classCode like '".$classCode."%' && 
            case pagination::roleMgt(1):
                $query_string = "select * from tbl_programme 
						  				where prog_id='" . $programID . "'  
										and type LIKE 'Program%' 
										and display='Yes'
										GROUP BY program_name  
										order by prog_id asc";


                break;
            case pagination::roleMgt(2);
                $query_string = "select * from tbl_programme 
						  				where prog_id='" . $programID . "'  
										and type LIKE 'Program%' 
										and display='Yes' 
										GROUP BY program_name 
										order by prog_id asc";


                break;
            case pagination::roleMgt(3);

                // and prog_id like '".$programID."%'
                if ($programID == NULL) {
                    $query_string = "select * from tbl_programme where  type LIKE 'Program%' and display='Yes' GROUP BY program_name  order by prog_id asc";
                } else {

                    $query_string = "select * from tbl_programme where  type='Program' 
						 and display='Yes'
						 and prog_id='" . $programID . "'
						  GROUP BY program_name
						  order by prog_id asc";


                }


                break;

            default:

                $query_string = "select * from tbl_programme where  type LIKE 'Program%' and prog_id LIKE '" . $programID . "%' and display='Yes' GROUP BY program_name order by prog_id asc";


                break;

        }
        // pagination::free_result($q);
        return $query_string;

    }


    function ProjectGeneralQuery($programID, $projectID)
    {


        switch ($_SESSION['role']) {
            //----------------------Principal Investigator--------------------------------
            case pagination::roleMgt(0):
                $query_string = "select * from tbl_project 
						  				where  programme_id='" . $_SESSION['program_id'] . "' 
										and id='" . $_SESSION['project_id'] . "'
						   				and display='Yes' 
										order by project_code,title asc";


                break;


            case pagination::roleMgt(1):
                $query_string = "select * from tbl_project 
						  				where  programme_id='" . $_SESSION['program_id'] . "' and 
						  				 id='" . $_SESSION['project_id'] . "' and display='Yes' order by project_code,title asc";


                break;
            case pagination::roleMgt(2);
                $query_string = "select * from tbl_project where program_id='" . $_SESSION['program_id'] . "' and id LIKE '" . $projectID . "%' display='Yes' order by project_code,title asc";


                break;
            case pagination::roleMgt(3);
                $query_string = "select * from tbl_project 
						  where programme_id LIKE '" . $programID . "%'
						  and id LIKE '" . $projectID . "%'
						   and display='Yes' order by project_code,title asc";

                break;

            default:

                $query_string = "select * from tbl_project 
						  where programme_id LIKE '" . $programID . "%'
						  and id LIKE '" . $projectID . "%'
						   and display='Yes' order by project_code,title asc";


                break;

        }
        // pagination::free_result($q);
        return $query_string;

    }


    //-----------------
    function ViewAnualTargetsProjects($program, $project)
    {
        switch ($_SESSION['role']) {
            //----------------------Principal Investigator--------------------------------
            case pagination::roleMgt(0):
                $query = " i.prog_id ='" . $_SESSION['program_id'] . "' and 
											i.project_id ='" . $_SESSION['project_id'] . "' ";


                break;


            case pagination::roleMgt(1):
                $query = " i.prog_id ='" . $_SESSION['program_id'] . "' and 
											i.project_id ='" . $_SESSION['project_id'] . "' ";


                break;
            case pagination::roleMgt(2);
                $query = " i.prog_id ='" . $_SESSION['program_id'] . "' and 
											i.project_id ='" . $project . "' ";


                break;
            case pagination::roleMgt(3);
                $query = " i.prog_id='" . $program . "' and 
											i.project_id='" . $project . "' ";

                break;


            default:
                $query = " i.prog_id='" . $program . "' and 
											 i.project_id='" . $project . "' ";
                break;
        }
        return $query;
    }


    function ViewAnualTargetsPrograms($program)
    {
        switch ($_SESSION['role']) {
            //----------------------Principal Investigator--------------------------------
            case pagination::roleMgt(0):
                $query = " i.prog_id ='" . $_SESSION['program_id'] . "'  ";


                break;


            case pagination::roleMgt(1):
                $query = " i.prog_id ='" . $_SESSION['program_id'] . "'  ";


                break;
            case pagination::roleMgt(2);
                $query = " i.prog_id ='" . $_SESSION['program_id'] . "'  ";


                break;
            case pagination::roleMgt(3);
                $query = " i.prog_id like '" . $program . "%'  ";

                break;


            default:
                $query = " i.prog_id like '" . $program . "%'  ";
                break;
        }
        return $query;
    }


    function ViewAnnualResults($program, $project)
    {
        switch ($_SESSION['role']) {

            //----------------------Principal Investigator--------------------------------
            case pagination::roleMgt(0):
                $query = " r.prog_id ='" . $_SESSION['program_id'] . "' and 
											r.project_id ='" . $_SESSION['project_id'] . "' ";


                break;


            case pagination::roleMgt(1):
                $query = " r.prog_id ='" . $_SESSION['program_id'] . "' and 
											r.project_id ='" . $_SESSION['project_id'] . "' ";


                break;
            case pagination::roleMgt(2);
                $query = " r.prog_id ='" . $_SESSION['program_id'] . "' and 
											r.project_id like '" . $project . "%' ";


                break;
            case pagination::roleMgt(3);
                $query = " r.prog_id like '" . $program . "%' and 
											r.project_id like '" . $project . "%' ";

                break;


            default:
                $query = " r.prog_id like '" . $program . "%' and 
											r.project_id like '" . $project . "%' ";
                break;
        }
        return $query;
    }


    function ViewTotalAnnualResults($program, $project)
    {
        switch ($_SESSION['role']) {

            //----------------------Principal Investigator--------------------------------
            case pagination::roleMgt(0):
                $query = " w.prog_id ='" . $_SESSION['program_id'] . "' and 
											w.project_id ='" . $_SESSION['project_id'] . "' ";


                break;


            case pagination::roleMgt(1):
                $query = " w.prog_id ='" . $_SESSION['program_id'] . "' and 
											w.project_id ='" . $_SESSION['project_id'] . "' ";


                break;
            case pagination::roleMgt(2);
                $query = " w.prog_id ='" . $_SESSION['program_id'] . "' and 
											w.project_id like '" . $project . "%' ";


                break;
            case pagination::roleMgt(3);
                $query = " w.prog_id like '" . $program . "%' and 
											w.project_id like '" . $project . "%' ";

                break;


            default:
                $query = " w.prog_id like '" . $program . "%' and 
											w.project_id like '" . $project . "%' ";
                break;
        }
        return $query;
    }


    function IndicatorClassFilter()
    {


        switch ($_SESSION['role']) {
            default:
                $query = @Execute("select * from tbl_indicator where indicator_type<> ''
										 GROUP BY indicator_type order by 
										 indicator_type asc") or die(http(__line__));
                while ($row = @FetchRecords($query)) {
                    $selected = ($_SESSION['indicatorType'] == $row['indicator_type']) ? "selectED" : "";
                    $data .= "<option value=\"" . $row['indicator_type'] . "\" " . $selected . "> " . $row['indicator_type'] . "</option>";
                }
                break;
        }
        return $data;
    }


    function DCED_AnnualActuals($indicatorType, $Quantitative, $subcomponent, $resultchain, $quarter, $year, $org_code)
    {


        $y = "select i.indicator_id,i.indicator_type,i.subcomponent_id,
			i.expected_output,i.rc_id,w.Target,
			i.unitofmeasure,i.physical_target,i.indicator_name from 
			tbl_indicator i LEFT JOIN tbl_dcedworkplan w ON(w.indicator_id=i.indicator_id)
			where i.indicator_type LIKE '" . $indicatorType . "%'  
			&& i.expected_output  LIKE '" . $Quantitative . "%'
			and i.subcomponent_id LIKE '" . $subcomponent . "%'
			and i.rc_id LIKE '" . $resultchain . "%' and 
			w.Quarter LIKE '" . $quarter . "%'
			and w.curr_year LIKE '" . $year . "%'
			and w.org_code LIKE '" . $org_code . "%'
  			GROUP BY indicator_id order by i.rc_id,indicator_id asc";

        return $y;
    }

    //-------------regional Filter---------------
    function regionalFilter($regionalCode)
    {

        $query_thisUser1 = "select * from `tbl_zone` order by `tbl_zone`.`zoneName` asc";


        $thisUser1 = @Execute($query_thisUser1) or die(http(__line__));


        while ($rows_zones = FetchRecords($thisUser1)) {


            $selected = ($regionalCode == $rows_zones['zoneCode']) ? "selected" : "";
            $data .= "<option value=\"" . $rows_zones['zoneCode'] . "\" " . $selected . " >" . $rows_zones['zoneName'] . "</option>";

        }
        return $data;

    }

    //-------------Zone Filter---------------

    function DistrictFilter($regionalCode, $districtCode)
    {
        $query_thisUser1 = "select * from `tbl_district`
						where `tbl_district`.`Display`='Yes'
						and `tbl_district`.`zone`='" . $regionalCode . "'
						order by `tbl_district`.`districtName` asc";
        $thisUser1 = @Execute($query_thisUser1) or die(http(__line__));


        while ($rows_districts = FetchRecords($thisUser1)) {
            $selected = ($districtCode == $rows_districts['districtCode']) ? "selected" : "";
            $data .= "<option value=\"" . $rows_districts['districtCode'] . "\" " . $selected . " >" . $rows_districts['districtName'] . "</option>";

        }
        return $data;

    }

     //--------------------Traderfilter------------------------------------


        function TraderFilterFormOne($trader)
    {

        
        $query_thisUser1 = "select traderName,tbl_tradersId FROM `tbl_traders`
                        where display ='Yes'
                        order by traderName asc";
        $thisUser1 = @Execute($query_thisUser1) or die(http(__line__));


        while ($rows_trader = FetchRecords($thisUser1)) {
            $selected = ($trader == $rows_trader['tbl_tradersId']) ? "selected" : "";
            $data .= "<option value=\"" . $rows_trader['tbl_tradersId'] . "\" " . $selected . " >" . $rows_trader['traderName'] . "</option>";

        }
        return $data;

    }

    function VillageFilterFormOne($trader,$va)
    {

        
        $query_thisUser1 = "select tbl_villageAgentId,vAgentName,tbl_tradersId FROM `tbl_villageagents`
                        where display ='Yes'
                        and tbl_tradersId ='".$trader."'
                        order by vAgentName asc";
        $thisUser1 = @Execute($query_thisUser1) or die(mysql_error());


        while ($rows_va = FetchRecords($thisUser1)) {
            $selected = ($va == $rows_va['tbl_villageAgentId']) ? "selected" : "";
            $data .= "<option value=\"" . $rows_va['tbl_villageAgentId'] . "\" " . $selected . " >" . $rows_va['vAgentName'] . "</option>";

        }
        return $data;

    }


    


    function DistrictFilterNoRegion($districtCode)
    {

        
        $query_thisUser1 = "select * from `tbl_district`
						where `tbl_district`.`Display`='Yes'
						order by `tbl_district`.`districtName` asc";
        $thisUser1 = @Execute($query_thisUser1) or die(http(__line__));


        while ($rows_districts = FetchRecords($thisUser1)) {
            $selected = ($districtCode == $rows_districts['districtCode']) ? "selected" : "";
            $data .= "<option value=\"" . $rows_districts['districtCode'] . "\" " . $selected . " >" . $rows_districts['districtName'] . "</option>";

        }
        return $data;

    }

    //--------------------Subcountyfilter------------------------------------

    function SubcountyFilter($regionalCode, $districtCode, $subCounty)
    {
        $query_thisUser1 = "select s.* from `tbl_subcounty` s
			where s.`districtCode`='" . $districtCode . "'
			order by s.`subcountyName` asc";
        $thisUser1 = @Execute($query_thisUser1) or die(http(__line__));

        while ($rows_subcounty = FetchRecords($thisUser1)) {
            $selected = ($subCounty == $rows_subcounty['subcountyCode']) ? "selected" : "";
            $data .= "<option value=\"" . $rows_subcounty['subcountyCode'] . "\" " . $selected . " >
				" . $rows_subcounty['subcountyName'] . "</option>";

        }
        return $data;

    }


    function SubcountyFilterNoRegion($districtCode, $subCounty)
    {
        $query_thisUser1 = "select s.* from `tbl_subcounty` s
			where s.`districtCode`='" . $districtCode . "'
			order by s.`subcountyName` asc";
        $thisUser1 = @Execute($query_thisUser1) or die(http(__line__));

        while ($rows_subcounty = FetchRecords($thisUser1)) {
            $selected = ($subCounty == $rows_subcounty['subcountyCode']) ? "selected" : "";
            $data .= "<option value=\"" . $rows_subcounty['subcountyCode'] . "\" " . $selected . " >
				" . $rows_subcounty['subcountyName'] . "</option>";

        }
        return $data;

    }

    //-------------------------------Parish Flter-------------------------
    function ParishFilter($regionalCode, $districtCode, $subCounty, $Parish)
    {
        $query_thisUser1 = "select p.* from `tbl_parish` p
			where p.`SubcountyCode` = '$subCounty'	
			order by p.`ParishName` asc";
        $thisUser1 = @Execute($query_thisUser1) or die(http(__line__));

        while ($rows_parish = FetchRecords($thisUser1)) {

            $selected = ($Parish == $rows_parish['ParishCode']) ? "selected" : "";
            $data .= "<option value=\"" . $rows_parish['ParishCode'] . "\" " . $selected . ">
			" . $rows_parish['ParishName'] . "</option>";

        }
        return $data;

    }


//-------------------------------Parish Flter-------------------------
    function ParishFilterNoRegion($districtCode, $subCounty, $Parish)
    {
        $query_thisUser1 = "select p.* from `tbl_parish` p
			where p.`SubcountyCode` = '$subCounty'	
			order by p.`ParishName` asc";
        $thisUser1 = @Execute($query_thisUser1) or die(http(__line__));

        while ($rows_parish = FetchRecords($thisUser1)) {

            $selected = ($Parish == $rows_parish['ParishCode']) ? "selected" : "";
            $data .= "<option value=\"" . $rows_parish['ParishCode'] . "\" " . $selected . ">
			" . $rows_parish['ParishName'] . "</option>";

        }
        return $data;

    }


//-------------------------------VillageAgent Flter-------------------------
    function filterTrader($trCode)
    {
        $query_thisUser1 = "SELECT `tbl_tradersId`, `traderName` FROM `tbl_traders`";
        $thisUser1 = @Execute($query_thisUser1) or die(http(__line__));

        while ($rows_tr = FetchRecords($thisUser1)) {

            $selected = ($trCode == $rows_tr['tbl_tradersId']) ? "selected" : "";
            $data .= "<option value=\"" . $rows_tr['tbl_tradersId'] . "\" " . $selected . ">" . $rows_tr['traderName'] . "</option>";

        }
        return $data;

    }


    //-------------------------------VillageAgent Flter-------------------------
    function filterExporter($exCode)
    {
		$data='';
        $query_thisUser1 = "select *
			 from `tbl_exporters`
			 order by `tbl_exporters`.`exporterName` asc";
        $thisUser1 = @Execute($query_thisUser1) or die(http(mysql_error()));

        while ($rows_ex = FetchRecords($thisUser1)) {

            $selected = ($exCode == $rows_ex['tbl_exportersId']) ? "selected" : "";
            $data .= "<option value=\"" . $rows_ex['tbl_exportersId'] . "\" " . $selected . ">" . $rows_ex['exporterName'] . "</option>";

        }
        return $data;

    }


    //-------------------------------Trader with Subcounty  Filter-------------------------
    function filterTraderWithSubcounty($Subcounty, $trCode)
    {
        $query_thisUser1 = "select *
			 from `tbl_traders` where `traderSubcounty`='" . $Subcounty . "'
			 order by `tbl_traders`.`traderName` asc";
        $thisUser1 = @Execute($query_thisUser1) or die(http(__line__));

        while ($rows_tr = FetchRecords($thisUser1)) {

            $selected = ($trCode == $rows_tr['tbl_tradersId']) ? "selected" : "";
            $data .= "<option value=\"" . $rows_tr['tbl_tradersId'] . "\" " . $selected . ">
			" . $rows_tr['traderName'] . "</option>";

        }
        return $data;

    }

//-------------------------------VillageAgent Flter-------------------------
    function filterVillageAgent($trCode, $vaCode)
    {
		
		$query_thisUser1 = "select v . * 
			from `tbl_villageagents` v
			where v.`tbl_tradersId`='" . $trCode . "'
			order by  v.`vAgentName`, v.`tbl_villageAgentId` asc";
        
        $thisUser1 = @Execute($query_thisUser1) or die(http(__line__));

        while ($rows_va = FetchRecords($thisUser1)) {

            $selected = ($vaCode == $rows_va['tbl_villageAgentId']) ? "selected" : "";
            $data .= "<option value=\"" . $rows_va['tbl_villageAgentId'] . "\" " . $selected . ">
			" . $rows_va['vAgentName'] . "</option>";

        }
        return $data;

    }

	//-------------------------------VillageAgent Flter-------------------------
    function filterVillageAgentNoTrader($vaCode)
    {
		
			$query_thisUser1 = "select `v` . * 
			from `tbl_villageagents` as `v` order by  `v`.`vAgentName`, `v`.`tbl_villageAgentId` asc";
		
        
        $thisUser1 = @Execute($query_thisUser1) or die(http(__line__));

        while ($rows_va = FetchRecords($thisUser1)) {

            $selected = ($vaCode == $rows_va['tbl_villageAgentId']) ? "selected" : "";
            $data .= "<option value=\"" . $rows_va['tbl_villageAgentId'] . "\" " . $selected . ">
			" . $rows_va['vAgentName'] . "</option>";

        }
        return $data;

    }
//-------------------------------Farmer Flter-------------------------
    function farmerFilter($trCode, $vaCode, $faCode)
    {
        $query_thisUser1 = "select f. * , v. *
			from `tbl_villageagents` v, `tbl_farmers` f
			where f.`tbl_villageAgentId` = v.`tbl_villageAgentId`
			and v.`tbl_villageAgentId` ='" . $vaCode . "'
			order by f.`farmersName` asc";
        $thisUser1 = @Execute($query_thisUser1) or die(http(__line__));

        while ($rows_fa = FetchRecords($thisUser1)) {

            $selected = ($faCode == $rows_fa['tbl_farmersId']) ? "selected" : "";
            $data .= "<option value=\"" . $rows_fa['tbl_farmersId'] . "\" " . $selected . ">
			" . $rows_fa['farmersName'] . "</option>";

        }
        return $data;

    }


    //==========================================================================================================================================================
    //==========================================================================================================================================================


    //-------------------------------Crop varieties Filter-------------------------
    function filterCrop($Crop)
    {


        $stmntTwo = "select * from `tbl_lookup` l where  l.`classDescription` = 'Activity Crops' order by  l.`code`";
        $qcrop = Execute($stmntTwo);
        while ($rowCrop = FetchRecords($qcrop)) {

            $selected = ($Crop == $rowCrop['codeName']) ? "selected" : "";
            $data .= "<option value=\"" . $rowCrop['codeName'] . "\" " . $selected . ">" . $rowCrop['codeName'] . "</option>";
        }


        return $data;

    }

    

    function filterCropVarieties($cropVariety)
    {
        $query_thisUser1 = "select v.* from `tbl_cropvarieties` v
			 order by v.`cropVariety` asc";
        $thisUser1 = @Execute($query_thisUser1) or die(http(__line__));

        while ($rows_cropVariety = FetchRecords($thisUser1)) {

            $selected = ($cropVariety == $rows_cropVariety['pk_cropVarietiesId']) ? "selected" : "";
            $data .= "<option value=\"" . $rows_cropVariety['pk_cropVarietiesId'] . "\" " . $selected . ">
			" . $rows_cropVariety['cropVariety'] . "</option>";

        }
        return $data;

    }

    //==========================================================================================================================================================

    //==========================================================================================================================================================


    //------------ResultChainFilter-----------------
    function ResultChainFilter($RCID)
    {


        switch ($_SESSION['role']) {
            //----------------------Monitoring and Evaluation--------------------------------
            case pagination::roleMgt('Monitoring'):


                $query_string = pagination::viewResults($tableName = 'tbl_resultschain', $whereClause = '', $clauseValue = '', $groupby = 'name', $orderby = 'rc_id');


                break;


            case pagination::roleMgt('Manager'):
                $query_string = pagination::viewResults($tableName = 'tbl_resultschain', $whereClause = '', $clauseValue = '', $groupby = 'name', $orderby = 'rc_id');

                break;

            default:

                $query_string = pagination::viewResults($tableName = 'tbl_resultschain', $whereClause = '', $clauseValue = '', $groupby = 'name', $orderby = 'rc_id');

                break;

        }


        $q = Execute($query_string) or die(http(__line__));
        while ($rowd = FetchRecords($q)) {
            $sel = ($rowd['rc_id'] == $RCID) ? "selected" : "";
            $data .= "<option value=\"" . $rowd['rc_id'] . "\" " . $sel . ">
						" . retrieve_info_withSpecialCharactersNowordLimit($rowd['rc_id']) . "
						 " . retrieve_info_withSpecialCharactersNowordLimit($rowd['name']) . "</option>";

        }

        pagination::free_result($q);
        return $data;

    }


    //------------ResultChainFilter-----------------
    function MappingTypeFilter($programID)
    {


        switch ($_SESSION['role']) {
            //----------------------Monitoring and Evaluation--------------------------------
            case pagination::roleMgt('Monitoring'):


                $query_string = "select * from tbl_lookup where classCode='11' order by codeName asc";


                break;


            case pagination::roleMgt('Manager'):
                $query_string = "select * from tbl_lookup where classCode='11' order by codeName asc";

                break;

            default:

                $query_string = "select * from tbl_lookup where classCode='11' order by codeName asc";

                break;

        }


        $q = Execute($query_string) or die(http(__line__));
        while ($rowd = FetchRecords($q)) {
            $sel = ($rowd['codeName'] == $programID) ? "selected" : "";
            $data .= "<option value=\"" . $rowd['codeName'] . "\" " . $sel . ">
					
						 " . retrieve_info_withSpecialCharactersNowordLimit($rowd['codeName']) . "</option>";

        }

        pagination::free_result($q);
        return $data;

    }


    function DashboardFilter($indicator, $mappingType)
    {
        $query_string = "select * from tbl_indicator 
					where mapping_type LIKE '" . $mappingType . "%' 
					and displayonDashboard='TRUE' 
					order by  indicator_name asc";
        $q = Execute($query_string) or die(http(__line__));
        while ($rowd = FetchRecords($q)) {
            $sel = ($rowd['indicator_id'] == $indicator) ? "selected" : "";
            $data .= "<option value=\"" . $rowd['indicator_id'] . "\" " . $sel . ">
					
						 " . retrieve_info_withSpecialCharactersNowordLimit($rowd['indicator_name']) . "</option>";

        }

        pagination::free_result($q);
        return $data;

    }

    function IndicatorFilter($programID, $mappingType)
    {


        switch ($_SESSION['role']) {
            //----------------------Monitoring and Evaluation--------------------------------
            case pagination::roleMgt('Monitoring'):


                // $query_string="select * from tbl_lookup where classCode='12' order by codeName asc";
                $query_string = "select * from tbl_indicator where mapping_type LIKE '" . $mappingType . "%' order by  indicator_name asc";


                break;


            case pagination::roleMgt('Manager'):
                $query_string = "select * from tbl_indicator where mapping_type LIKE '" . $mappingType . "%' order by  indicator_name asc";
                break;

            default:

                $query_string = "select * from tbl_indicator where mapping_type LIKE '" . $mappingType . "%' order by  indicator_name asc";
                break;

        }


        $q = Execute($query_string) or die(http(__line__));
        while ($rowd = FetchRecords($q)) {
            $sel = ($rowd['indicator_id'] == $programID) ? "selected" : "";
            $data .= "<option value=\"" . $rowd['indicator_id'] . "\" " . $sel . ">
					
						 " . retrieve_info_withSpecialCharactersNowordLimit($rowd['indicator_name']) . "</option>";

        }

        pagination::free_result($q);
        return $data;

    }



    function ViewTraining($program, $project)
    {


        switch ($_SESSION['role']) {

            case pagination::roleMgt(0):
                $sql = "select t.*,p.* , sum( t.total ) AS TotalProgramValue from tbl_programme p
  																		  LEFT JOIN tbl_training t ON(t.prog_id=p.prog_id) 
																		  where p.prog_id='" . $_SESSION['program_id'] . "' 
																		  && t.project_id ='" . $_SESSION['project_id'] . "'
																		   && p.type LIKE 'Program%'
																		  GROUP BY p.prog_id 
																		  order by p.prog_id asc ";


                break;


            case pagination::roleMgt(1):
                $sql = "select t.*,p.* , sum( t.total ) AS TotalProgramValue from tbl_programme p
  																		  LEFT JOIN tbl_training t ON(t.prog_id=p.prog_id) 
																		  where p.prog_id='" . $_SESSION['program_id'] . "' 
																		  && t.project_id ='" . $_SESSION['project_id'] . "'
																		   && p.type LIKE 'Program%'
																		  GROUP BY p.prog_id 
																		  order by p.prog_id asc ";

                break;
            case pagination::roleMgt(2);
                $sql = "select t.*,p.* , sum( t.total ) AS TotalProgramValue from tbl_programme p
  																		  LEFT JOIN tbl_training t ON(t.prog_id=p.prog_id) 
																		  where p.prog_id='" . $_SESSION['program_id'] . "' 
																		  && t.project_id LIKE '" . $project . "%'
																		   && p.type LIKE 'Program%'
																		  GROUP BY p.prog_id 
																		  order by p.prog_id asc ";

                break;
            case pagination::roleMgt(3);
                $sql = "select  t.*,p.* , sum( total ) AS TotalProgramValue,project_id from tbl_programme p
																						  LEFT JOIN tbl_training t ON(t.prog_id=p.prog_id) 
																						  where p.prog_id LIKE '" . $program . "%' 
																						  && t.project_id LIKE '" . $project . "%'
																						   && p.type LIKE 'Program%'
																						  GROUP BY p.prog_id 
																						  order by p.prog_id asc ";

                break;

            default:
                $sql = "select  t.*,p.* , sum( total ) AS TotalProgramValue,project_id from tbl_programme p
																						  LEFT JOIN tbl_training t ON(t.prog_id=p.prog_id) 
																						  where p.prog_id LIKE '" . $program . "%' 
																						  && t.project_id LIKE '" . $project . "%'
																						   && p.type LIKE 'Program%'
																						  GROUP BY p.prog_id 
																						  order by p.prog_id asc ";

                break;

        }

        return $sql;

    }


    function View_currentYearTarget($indicator_id, $year)
    {


        $x = "select w.`workplan_id` , w.`indicator_id` , w.coorporateIndicator_id , w.`prog_id` ,
			 w.`project_id`, d.`DefName` , d.`display` ,sum(currTarget) AS currTarget, w.`display`,w.curr_year
						from view_currenttarget w INNER JOIN `tbl_indicator_definition` d ON ( w.coorporateIndicator_id  = d.indicator_id )
						where w.`coorporateIndicator_id` ='" . $indicator_id . "' and w.`curr_year`='" . $year . "'
						GROUP BY w.coorporateIndicator_id 
						order by w.coorporateIndicator_id  asc";

//
        return $x;

    }


    function View_currentActual($indicator_id, $year)
    {


        $x = "select r.`id` ,  r.`prog_id` , r.`project_id` , r.`country_id` ,
									r.`ConsolidationindicatorDefinition_id` , d.DefName,
							 		d.indicator_id, r.`male` , r.`female`,									  
								  sum(r.CurrentActual) AS CurrentActual
								  from `view_currentactual` r
								  INNER JOIN tbl_indicator_definition d ON (r.ConsolidationindicatorDefinition_id = d.indicator_id )
								  where r.ConsolidationindicatorDefinition_id='" . $indicator_id . "' and r.`year`='" . $year . "'
								  GROUP BY r.ConsolidationindicatorDefinition_id
								  order by r.ConsolidationindicatorDefinition_id asc";

        //
        return $x;

    }

//------------------view training details-----------------------------------------------
    function ViewTrainingDetails($program, $project, $semi_annual, $year)
    {


        switch ($_SESSION['role']) {

            case pagination::roleMgt(0):
                $sql = "select t.`training_id` , t.`narrative_id` , t.`prog_id` , t.`project_id` ,p.title AS projectName, t.`semi_annual` , t.`year` , t.`course` , t.`trainer` , t.`typeofparticipants` , l.codeName, t.`male` , t.`female` , t.`total` , t.`organizing_date` , t.`updatedby` , t.`status`
						from `tbl_training` t
						LEFT JOIN tbl_lookup l ON ( l.code = t.typeofparticipants )
						LEFT JOIN tbl_project p ON(p.id=t.project_id)
						where l.classCode = '25' 
						and t.status LIKE 'Yes%' 
						and t.prog_id='" . $_SESSION['program_id'] . "' 
						and t.project_id='" . $_SESSION['project_id'] . "'
						and  t.`semi_annual`  LIKE '" . $semi_annual . "%'  
						and t.`year`  LIKE '" . $year . "%'
						GROUP BY  t.`course`, t.`prog_id`
						order by  t.`course`, t.`prog_id` asc";


                break;


            case pagination::roleMgt(1):
                $sql = "select t.`training_id` , t.`narrative_id` , t.`prog_id` , t.`project_id` ,p.title AS projectName, t.`semi_annual` , t.`year` , t.`course` , t.`trainer` , t.`typeofparticipants` , l.codeName, t.`male` , t.`female` , t.`total` , t.`organizing_date` , t.`updatedby` , t.`status`
						from `tbl_training` t
						LEFT JOIN tbl_lookup l ON ( l.code = t.typeofparticipants )
						LEFT JOIN tbl_project p ON(p.id=t.project_id)
						where l.classCode = '25' 
						and t.status LIKE 'Yes%' 
						and t.prog_id='" . $_SESSION['program_id'] . "' 
						and t.project_id='" . $_SESSION['project_id'] . "'
						and  t.`semi_annual`  LIKE '" . $semi_annual . "%'  
						and t.`year`  LIKE '" . $year . "%'
						GROUP BY  t.`course`, t.`prog_id`
						order by  t.`course`, t.`prog_id` asc";

                break;
            case pagination::roleMgt(2);
                $sql = "select t.`training_id` , t.`narrative_id` , t.`prog_id` , t.`project_id` ,p.title AS projectName, t.`semi_annual` , t.`year` , t.`course` , t.`trainer` , t.`typeofparticipants` , l.codeName, t.`male` , t.`female` , t.`total` , t.`organizing_date` , t.`updatedby` , t.`status`
						from `tbl_training` t
						LEFT JOIN tbl_lookup l ON ( l.code = t.typeofparticipants )
						LEFT JOIN tbl_project p ON(p.id=t.project_id)
						where l.classCode = '25' 
						and t.status LIKE 'Yes%' 
						and t.prog_id='" . $_SESSION['program_id'] . "' 
						and t.project_id LIKE '" . $project . "%'
						and  t.`semi_annual`  LIKE '" . $semi_annual . "%'  
						and t.`year`  LIKE '" . $year . "%'
						GROUP BY  t.`course`, t.`prog_id`
						order by  t.`course`, t.`prog_id` asc";

                break;
            case pagination::roleMgt(3);
                $sql = "select t.`training_id` , t.`narrative_id` , t.`prog_id` , t.`project_id` ,p.title AS projectName, t.`semi_annual` , t.`year` , t.`course` , t.`trainer` , t.`typeofparticipants` , l.codeName, t.`male` , t.`female` , t.`total` , t.`organizing_date` , t.`updatedby` , t.`status`
						from `tbl_training` t
						LEFT JOIN tbl_lookup l ON ( l.code = t.typeofparticipants )
						LEFT JOIN tbl_project p ON(p.id=t.project_id)
						where l.classCode = '25' 
						and t.status LIKE 'Yes%' 
						and t.prog_id LIKE '" . $program . "%' 
						and t.project_id LIKE '" . $project . "%'
						and  t.`semi_annual`  LIKE '" . $semi_annual . "%'  
						and t.`year`  LIKE '" . $year . "%'
						GROUP BY  t.`course`, t.`prog_id`
						order by  t.`course`, t.`prog_id` asc";


                break;

            default:
                $sql = "select t.`training_id` , t.`narrative_id` , t.`prog_id` , t.`project_id` ,p.title AS projectName, t.`semi_annual` , t.`year` , t.`course` , t.`trainer` , t.`typeofparticipants` , l.codeName, t.`male` , t.`female` , t.`total` , t.`organizing_date` , t.`updatedby` , t.`status`
						from `tbl_training` t
						LEFT JOIN tbl_lookup l ON ( l.code = t.typeofparticipants )
						LEFT JOIN tbl_project p ON(p.id=t.project_id)
						where l.classCode = '25' 
						and t.status LIKE 'Yes%' 
						and t.prog_id LIKE '" . $program . "%' 
						and t.project_id LIKE '" . $project . "%'
						and  t.`semi_annual`  LIKE '" . $semi_annual . "%'  
						and t.`year`  LIKE '" . $year . "%'
						GROUP BY  t.`course`, t.`prog_id`
						order by  t.`course`, t.`prog_id` asc";

                break;

        }

        return $sql;

    }


    //-----------viewViewPublications------------
    function ViewPublications($program, $project)
    {


        switch ($_SESSION['role']) {

            case pagination::roleMgt(0):
                $sql = "select c.`publication_id` ,c.semi_annual,c.year, c.`project_id` , p.`prog_id` ,p.type, c.`title` , c.`organization` , c.`dateofpublication` , c.`updatedby` , c.`status` , p.prog_id, p.program_name,
		sum( if( l.codeName = 'Published', 1, 0 ) ) AS Published,
		 sum( if( l.codeName = 'Manuscripts', 1, 0 ) ) AS Manuscripts,
		 sum( if( l.codeName = 'Chapter in books', 1, 0 ) ) AS Chapter_in_books, 
		sum( if( l.codeName = 'Conference proceedings', 1, 0 )) AS Conference_proceedings,
		 sum( if( l.codeName = 'Books', 1, 0 ) ) AS Books,
		  sum( if( l.codeName = 'Electronic Newsletters', 1, 0 ) ) AS Electronic_Newsletters,
		   sum( if( l.codeName = 'Documentaries', 1, 0 ) ) AS Documentaries,
		    sum( if( l.codeName = 'Other publications', 1, 0 ) ) AS Other_publications,
			 count(typeofpublication) AS TotalpublicationsPerProgram,l.classCode
from tbl_programme p
LEFT JOIN `tbl_publication` c ON ( p.prog_id = c.prog_id )
LEFT JOIN tbl_lookup l ON ( l.code = c.typeofpublication )
where p.prog_id='" . $_SESSION['program_id'] . "'  
and c.project_id='" . $_SESSION['project_id'] . "'
and p.type LIKE 'Program%'
GROUP BY p.prog_id 
order by p.prog_id asc";


                break;


            case pagination::roleMgt(1):
                $sql = "select c.`publication_id` ,c.semi_annual,c.year, c.`project_id` , p.`prog_id` ,p.type, c.`title` , c.`organization` , c.`dateofpublication` , c.`updatedby` , c.`status` , p.prog_id, p.program_name,
		sum( if( l.codeName = 'Published', 1, 0 ) ) AS Published,
		 sum( if( l.codeName = 'Manuscripts', 1, 0 ) ) AS Manuscripts,
		 sum( if( l.codeName = 'Chapter in books', 1, 0 ) ) AS Chapter_in_books, 
		sum( if( l.codeName = 'Conference proceedings', 1, 0 )) AS Conference_proceedings,
		 sum( if( l.codeName = 'Books', 1, 0 ) ) AS Books,
		  sum( if( l.codeName = 'Electronic Newsletters', 1, 0 ) ) AS Electronic_Newsletters,
		   sum( if( l.codeName = 'Documentaries', 1, 0 ) ) AS Documentaries,
		    sum( if( l.codeName = 'Other publications', 1, 0 ) ) AS Other_publications,
			 count(typeofpublication) AS TotalpublicationsPerProgram,l.classCode
from tbl_programme p
LEFT JOIN `tbl_publication` c ON ( p.prog_id = c.prog_id )
LEFT JOIN tbl_lookup l ON ( l.code = c.typeofpublication )
where p.prog_id='" . $_SESSION['program_id'] . "'  
and c.project_id='" . $_SESSION['project_id'] . "'
and p.type LIKE 'Program%'
GROUP BY p.prog_id 
order by p.prog_id asc";

                break;
            case pagination::roleMgt(2);
                $sql = "select c.`publication_id` ,c.semi_annual,c.year, c.`project_id` , p.`prog_id` ,p.type, c.`title` , c.`organization` , c.`dateofpublication` , c.`updatedby` , c.`status` , p.prog_id, p.program_name,
		sum( if( l.codeName = 'Published', 1, 0 ) ) AS Published,
		 sum( if( l.codeName = 'Manuscripts', 1, 0 ) ) AS Manuscripts,
		 sum( if( l.codeName = 'Chapter in books', 1, 0 ) ) AS Chapter_in_books, 
		sum( if( l.codeName = 'Conference proceedings', 1, 0 )) AS Conference_proceedings,
		 sum( if( l.codeName = 'Books', 1, 0 ) ) AS Books,
		  sum( if( l.codeName = 'Electronic Newsletters', 1, 0 ) ) AS Electronic_Newsletters,
		   sum( if( l.codeName = 'Documentaries', 1, 0 ) ) AS Documentaries,
		    sum( if( l.codeName = 'Other publications', 1, 0 ) ) AS Other_publications,
			 count(typeofpublication) AS TotalpublicationsPerProgram,l.classCode
from tbl_programme p
LEFT JOIN `tbl_publication` c ON ( p.prog_id = c.prog_id )
LEFT JOIN tbl_lookup l ON ( l.code = c.typeofpublication )
where p.prog_id='" . $_SESSION['program_id'] . "'  
and c.project_id LIKE '" . $project . "%'
and p.type LIKE 'Program%'
GROUP BY p.prog_id 
order by p.prog_id asc";

                break;
            case pagination::roleMgt(3);
                $sql = "select c.`publication_id` ,c.semi_annual,c.year, c.`project_id` , p.`prog_id` ,p.type, c.`title` , c.`organization` , c.`dateofpublication` , c.`updatedby` , c.`status` , p.prog_id, p.program_name,
		sum( if( l.codeName = 'Published', 1, 0 ) ) AS Published,
		 sum( if( l.codeName = 'Manuscripts', 1, 0 ) ) AS Manuscripts,
		 sum( if( l.codeName = 'Chapter in books', 1, 0 ) ) AS Chapter_in_books, 
		sum( if( l.codeName = 'Conference proceedings', 1, 0 )) AS Conference_proceedings,
		 sum( if( l.codeName = 'Books', 1, 0 ) ) AS Books,
		  sum( if( l.codeName = 'Electronic Newsletters', 1, 0 ) ) AS Electronic_Newsletters,
		   sum( if( l.codeName = 'Documentaries', 1, 0 ) ) AS Documentaries,
		    sum( if( l.codeName = 'Other publications', 1, 0 ) ) AS Other_publications,
			 count(typeofpublication) AS TotalpublicationsPerProgram,l.classCode
from tbl_programme p
LEFT JOIN `tbl_publication` c ON ( p.prog_id = c.prog_id )
LEFT JOIN tbl_lookup l ON ( l.code = c.typeofpublication )
where p.prog_id LIKE '" . $program . "%'  
and c.project_id LIKE '" . $project . "%'
and p.type LIKE 'Program%'
GROUP BY p.prog_id 
order by p.prog_id asc";

                break;

            default:
                $sql = "select c.`publication_id` ,c.semi_annual,c.year, c.`project_id` , p.`prog_id` ,p.type, c.`title` , c.`organization` , c.`dateofpublication` , c.`updatedby` , c.`status` , p.prog_id, p.program_name,
		sum( if( l.codeName = 'Published', 1, 0 ) ) AS Published,
		 sum( if( l.codeName = 'Manuscripts', 1, 0 ) ) AS Manuscripts,
		 sum( if( l.codeName = 'Chapter in books', 1, 0 ) ) AS Chapter_in_books, 
		sum( if( l.codeName = 'Conference proceedings', 1, 0 )) AS Conference_proceedings,
		 sum( if( l.codeName = 'Books', 1, 0 ) ) AS Books,
		  sum( if( l.codeName = 'Electronic Newsletters', 1, 0 ) ) AS Electronic_Newsletters,
		   sum( if( l.codeName = 'Documentaries', 1, 0 ) ) AS Documentaries,
		    sum( if( l.codeName = 'Other publications', 1, 0 ) ) AS Other_publications,
			 count(typeofpublication) AS TotalpublicationsPerProgram,l.classCode
from tbl_programme p
LEFT JOIN `tbl_publication` c ON ( p.prog_id = c.prog_id )
LEFT JOIN tbl_lookup l ON ( l.code = c.typeofpublication )
where p.prog_id LIKE '" . $program . "%'  
and c.project_id LIKE '" . $project . "%'
and p.type LIKE 'Program%'
GROUP BY p.prog_id 
order by p.prog_id asc";
                break;

        }

        return $sql;

    }


    function bdsFilter($bdspartner)
    {
        $data .= "<option value=''>-select-</option>";
        $query = "select b.*
					from `tbl_bdsprovider` b";
        $q = Execute($query) or die(http("FLTR-2258"));
        while ($rowd = FetchRecords($q)) {
            $selected = ($bdspartner == $rowd['tbl_bdsproviderId']) ? "selected" : "";
            $data .= "<option value=\"" . $rowd['tbl_bdsproviderId'] . "\" " . $selected . " >" . $rowd['name'] . "</option>";


        }

        pagination::free_result($q);
        return $data;

    }

    function bdsServicesFilter()
    {

        $query = "select b.*, s.*
					from `tbl_bdsprovider` b, `tbl_bdsproviderservices` s  
					where  s.`tbl_bdsproviderId` = b.`tbl_bdsproviderId`";
        $q = Execute($query) or die(http("FLTR-2258"));
        while ($rowd = FetchRecords($q)) {

            $data .= "<option value=\"" . $rowd['tbl_bdsproviderServicesId'] . "\">" . $rowd['serviceName'] . "</option>";

        }

        pagination::free_result($q);
        return $data;

    }


    function valueChainFilter($valueChain)
    {
        $query = "select * from tbl_mainvaluechain order by 2 asc";
        $q = Execute($query) or die(http(__line__));
        while ($rowd = FetchRecords($q)) {

            $selected = ($valueChain == $rowd['tbl_chainId']) ? "selected" : "";
            $data .= "<option value=\"" . $rowd['tbl_chainId'] . "\" " . $selected . ">" . $rowd['name'] . "</option>";

        }

        pagination::free_result($q);
        return $data;

    }



    function valueChainFilterFromOne($valueChain)
    {
        $query = "select * from tbl_mainvaluechain order by 2 asc limit 3";
        $q = Execute($query) or die(http(__line__));
        while ($rowd = FetchRecords($q)) {

            $selected = ($valueChain == $rowd['tbl_chainId']) ? "selected" : "";
            
            $data .= "<input type='checkbox' name=valueChain".$rowd['tbl_chainId']." value=\"" . $rowd['tbl_chainId'] . "\" " . $selected . ">" . $rowd['name'] . "</input>";

        }

       // pagination::free_result($q);
        return $data;

    }


    

	function TypeOfBusinessFilter($typeBusiness)
    {
        $typeBusinessArray=array('Trader','Exporter','Processor',
		'Input dealer','Trade and business association','CBOs','Others');
		
		foreach ($typeBusinessArray as $bizType) {
		$selected = ($typeBusiness == $bizType) ? "selected" : "";
            $data .= "<option value='" . $bizType . "' " . $selected . ">" . $bizType . "</option>";
		}
        return $data;

    }
	
	function Form2GenderFilter($form2gender)
    {
        $form2genderArray=array('M','F','Both');
		
		foreach ($form2genderArray as $gender) {
		$selected = ($form2gender == $gender) ? "selected" : "";
            $data .= "<option value='" . $gender . "' " . $selected . ">" . $gender . "</option>";
		}
        return $data;

    }
	
	function Form2ValueChainFilter($form2ValueChain)
    {
        $form2ValueChainArray=array(
		'Maize',
		'Coffee',
		'Beans',
		'Maize,Coffee',
		'Maize,Beans',
		'Coffee,Beans',
		'Maize,Coffee,Beans'
		);
		
		foreach ($form2ValueChainArray as $crop) {
		$selected = ($form2ValueChain == $crop) ? "selected" : "";
            $data .= "<option value='" . $crop . "' " . $selected . ">" . $crop . "</option>";
		}
        return $data;

    }
	
	function Form2TypeOfMediaUtilisedFilter($mediaType)
    {
        $mediaTypeArray=array(
		'Radio',
		'SMS',
		'Radio,SMS',
		'Others'
		);
		
		foreach ($mediaTypeArray as $media) {
		$selected = ($mediaType == $media) ? "selected" : "";
            $data .= "<option value='" . $media . "' " . $selected . ">" . $media . "</option>";
		}
        return $data;

    }
	
	
	function Form2TraderFilter($traderId)
    {
        $query = "
		SELECT `tbl_tradersId`, `traderName`
		FROM `tbl_traders` 
		WHERE `display`='Yes'
		order by `traderName` asc";
        $q = Execute($query) or die(http(__line__));
        while ($rowd = FetchRecords($q)) {

            $selected = ($traderId == $rowd['tbl_tradersId']) ? "selected" : "";
            $data .= "<option value=\"" . $rowd['tbl_tradersId'] . "\" " . $selected . ">" . $rowd['traderName'] . "</option>";

        }

        pagination::free_result($q);
        return $data;

    }
	
	function Form2businessLocation($businessLocation)
    {
        $bizArray=array(
		'Rural',
		'Urban'
		);
		
		foreach ($bizArray as $biz) {
		$selected = ($businessLocation == $biz) ? "selected" : "";
            $data .= "<option value='" . $biz . "' " . $selected . ">" . $biz . "</option>";
		}
        return $data;

    }
	
	//Organisation level technologies and management practices
	function Form2OrgLevelTechnologiesMangtPractices($techPractice)
    {
        $technologiesArray=array(
		'Financial',
		'Planning',
		'Human Resources',
		'Member Services',
		'Procurement Techs'
		);
		
		foreach ($technologiesArray as $tech) {
		$selected = ($techPractice == $tech) ? "selected" : "";
            $data .= "<option value='" . $tech . "' " . $selected . ">" . $tech . "</option>";
		}
        return $data;

    }
	//Technical innovations
	function Form2TechnicalInnovations($techInnovation)
    {
        $innovationArray=array(
		'Processing',
		'Storage',
		'Quality control',
		'Marketing'
		);
		
		foreach ($innovationArray as $innovation) {
		$selected = ($techInnovation == $innovation) ? "selected" : "";
            $data .= "<option value='" . $innovation . "' " . $selected . ">" . $innovation . "</option>";
		}
        return $data;

    }
	//Land based technologies
	function Form2LandBasedTechnologies($LandBasedTech)
    {
        $technologiesArray=array(
		'Crop genetics',
		'Pest management',
		'Disease management',
		'soil-related fertility and conservation','Irrigation','Water management',
		'Climate mitigation or adaptation',
		'Improved mechanical and physical land preparation','Harvesting approaches'
		);
		
		foreach ($technologiesArray as $tech) {
		$selected = ($LandBasedTech == $tech) ? "selected" : "";
            $data .= "<option value='" . $tech . "' " . $selected . ">" . $tech . "</option>";
		}
        return $data;

    }
	
	//LabourSavingTechnologies
	function Form2LabourSavingTechnologies($LabourSavingTech)
    {
        $technologiesArray=array(
		'PRE-EMMERGENCY WED CONTROL',
		'ELECTRONIC SPRAY PUMPS',
		'MOBILE SHELLERS',
		'MAIZE CLEANER',
		'PRUNNING SAWS',
		'SECATEUR',
		'MAIZE CRIBS',
		'MINIMUM TILLAGE'
		);
		
		foreach ($technologiesArray as $tech) {
		$selected = ($LabourSavingTech == $tech) ? "selected" : "";
            $data .= "<option value='" . $tech . "' " . $selected . ">" . $tech . "</option>";
		}
        return $data;

    }

	
	
	function Form2PartnerFilter($partnerId)
    {
        $s_exporter = "
		SELECT `tbl_exportersId`, `exporterName`
		FROM `tbl_exporters` 
		WHERE `display`='Yes'
		order by `exporterName` asc";
		
		$s_trader= "
		SELECT `tbl_tradersId`, `traderName`
		FROM `tbl_traders` 
		WHERE `display`='Yes'
		order by `traderName` asc";
		
		$s_vAgent = "
		SELECT `tbl_villageAgentId`, `vAgentName`
		FROM `tbl_villageagents` 
		WHERE `display`='Yes'
		order by `vAgentName` asc";
		
		
        $q_ex = Execute($s_exporter) or die(http(__line__));
		$q_tr = Execute($s_trader) or die(http(__line__));
		$q_va = Execute($s_vAgent) or die(http(__line__));




        while ($row_ex = FetchRecords($q_ex)) {

            $selected = ($partnerId == $row_ex['exporterName']) ? "selected" : "";
			$exporterName=$row_ex['exporterName']." |EXP-".$row_ex['tbl_exportersId']."";
            $data.= "<option value=\"" . $exporterName . "\" " . $selected . ">" . $row_ex['exporterName'] . "</option>";

        }
		
		while ($row_tr = FetchRecords($q_tr)) {

            $selected = ($partnerId == $row_tr['traderName']) ? "selected" : "";
			$traderNameString=$row_tr['traderName']." |T-".$row_tr['tbl_tradersId']."";
            $data.= "<option value=\"" . $traderNameString . "\" " . $selected . ">" .  $row_tr['traderName'] . "</option>";

        }
		
		while ($row_va = FetchRecords($q_va)) {
			
			$vAgentNameString=$row_va['vAgentName']." |V.A-".$row_va['tbl_villageAgentId']."";
            $selected = ($partnerId == $row_va['vAgentName']) ? "selected" : "";
            $data.= "<option value=\"" . $vAgentNameString . "\" " . $selected . ">" . $row_va['vAgentName'] . "</option>";

        }
		
		

        
        return $data;

    }
	
	//start of type of partner methods
	
	function get_partnership_id($partnerString){
	$stringAfter = substr($partnerString, strpos($partnerString, "|") + 1);   
	$partnerId=substr(trim($stringAfter), strpos(trim($stringAfter), "-") + 1);
	return $partnerId;
	
	}

	function get_string_part($string, $starting_part, $ending_part){
		$string = " ".$string;
		$initial = strpos($string,$starting_part);
		if ($initial == 0) return "";
		$initial += strlen($starting_part);
		$length = strpos($string,$ending_part,$initial) - $initial;
		return substr($string,$initial,$length);
	}


	function get_partner_type_and_Id($id,$partnerString){
	$start_of_string_character="|";
	$end_of_string_character="-";
	$partnerTypeAbbreviated=QueryManager::get_string_part($partnerString,$start_of_string_character,$end_of_string_character); 
		switch($partnerTypeAbbreviated){
			
			case"EXP":
			$partnerType="Exporter";
			break;
			
			case"T":
			$partnerType="Trader";
			break;
			
			case"V.A":
			$partnerType="VillageAgent";
			break;
			
			default:
			break;
		}
	return array($id,$partnerType);	
	}
	
	
	
	//end partner methods
	
	function Form2TypeOfActorServiced($id)
    {
        $query = "SELECT l . * FROM `tbl_lookup` l WHERE l.`classCode`='31' AND l.`status` = 'Yes' ORDER BY l.`code` ASC";
        $q = Execute($query) or die(http(__line__));
        while ($rowd = FetchRecords($q)) {

            $selected = ($id == $rowd['codeName']) ? "selected" : "";
            $data .= "<option value=\"" . $rowd['codeName'] . "\" " . $selected . ">" . $rowd['codeName'] . "</option>";

        }

        pagination::free_result($q);
        return $data;

    }
	
	
	//Bankloans-Type of Loan recipient
	function Form2typeOfLoanRecepient($LoanReciever)
    {
        $loanRecieverArray=array(
		'Farmer',
		'Local trader',
		'Processors',
		'Exporter',
		'Other'
		);
		
		foreach ($loanRecieverArray as $reciever) {
		$selected = ($LabourSavingTech == $reciever) ? "selected" : "";
            $data .= "<option value='" . $reciever . "' " . $selected . ">" . $reciever . "</option>";
		}
        return $data;

    }
	
	//Bankloans-Type of Loan recipient
	function Form2BankLoansGenderRecepient($gender)
    {
        $genderArray=array(
		'Male',
		'Female',
		'Joint'
		);
		
		foreach ($genderArray as $sex) {
			switch(true){
				case $sex=='Male':
				$sme_gender='M';
				break;
				
				case $sex=='Female':
				$sme_gender='F';
				break;
				
				case $sex=='Joint':
				$sme_gender=$sex;
				break;
				
				default:
				break;
			}
		$selected = ($gender == $sme_gender) ? "selected" : "";
            $data .= "<option value='" . $sme_gender . "' " . $selected . ">" . $sex . "</option>";
		}
        return $data;

    }
	
	
	function DurationWithActivityFilter($durationWithActivityFilter)
    {
        $durationWithActivityArray=array('Old','New');
		
		foreach ($durationWithActivityArray as $duration) {
		$selected = ($durationWithActivityFilter == $duration) ? "selected" : "";
            $data .= "<option value='" . $duration . "' " . $selected . ">" . $duration . "</option>";
		}
        return $data;

    }

	
    function nameOfImprovedTechFilter($nameOfImprovedTech)
    {
        $query = "select * from tbl_lookup where classCode=37 order by `code` asc";
        $q = Execute($query) or die(http("FLTR-2441"));
        while ($rowd = FetchRecords($q)) {

            $selected = ($nameOfImprovedTech == $rowd['codeName']) ? "selected" : "";
            $data .= "<option value=\"" . $rowd['codeName'] . "\" " . $selected . ">" . $rowd['codeName'] . "</option>";

        }

        pagination::free_result($q);
        return $data;

    }

    function trainingFocusFilter($trainingFocus)
    {

        $query = "select * from tbl_trainingfocus order by 1 asc";
        $q = Execute($query) or die(http("FLTR-2161"));
        while ($rowd = FetchRecords($q)) {
            $selected = ($trainingFocus == $rowd['tbl_focusId']) ? "selected" : "";
            $data .= "<option value=\"" . $rowd['tbl_focusId'] . "\" " . $selected . ">" . $rowd['focusName'] . "</option>";

        }

        pagination::free_result($q);
        return $data;

    }

    function targetAudienceFilter($targetAudience)
    {

        $query = "select * from tbl_targetaudience order by 2 asc";
        $q = Execute($query) or die(http("FLTR-2177"));
        while ($rowd = FetchRecords($q)) {

            $selected = ($targetAudience == $rowd['tbl_audienceId']) ? "selected" : "";
            $data .= "<option value=\"" . $rowd['tbl_audienceId'] . "\" " . $selected . ">" . $rowd['audienceName'] . "</option>";

        }

        pagination::free_result($q);
        return $data;

    }

        function targetAudienceFilterFormOne($targetAudience)
    {

        $query = "select * from tbl_targetaudience order by 2 asc limit 2";
        $q = Execute($query) or die(http("FLTR-2177"));
        while ($rowd = FetchRecords($q)) {

            $selected = ($targetAudience == $rowd['tbl_audienceId']) ? "selected" : "";
            $data .= "<option value=\"" . $rowd['tbl_audienceId'] . "\" " . $selected . ">" . $rowd['audienceName'] . "</option>";

        }

        pagination::free_result($q);
        return $data;

    }


    function view_indicatorMappingProject($indicator, $level, $prog_id)
    {
        $query_string = "select d.`defn_id`, d.`indicator_id`, d.`DefName`,
						   		d.`projectIndicatorDefinition_id`, i.`prog_id`, i.`project_id`, 
						   		i.`indicator_code`, i.`indicator_name`, i.`indicator_type`, 
						   		i.`mapping_type`, i.`baseline`,p.id,p.title,p.project_code,
						  		max(if((w.`curr_year`='" . currFinancialYear(ProjectTimeLine('opening_year'), ProjectTimeLine('closure_year'), 0) . "'),w.`Target`,'-')) as Year1,
								max(if((w.`curr_year`='" . currFinancialYear(ProjectTimeLine('opening_year'), ProjectTimeLine('closure_year'), 1) . "'),w.`Target`,'-')) as Year2,
								max(if((w.`curr_year`='" . currFinancialYear(ProjectTimeLine('opening_year'), ProjectTimeLine('closure_year'), 2) . "'),w.`Target`,'-')) as Year3,
								max(if((w.`curr_year`='" . currFinancialYear(ProjectTimeLine('opening_year'), ProjectTimeLine('closure_year'), 3) . "'),w.`Target`,'-')) as Year4,
								max(if((w.`curr_year`='" . currFinancialYear(ProjectTimeLine('opening_year'), ProjectTimeLine('closure_year'), 4) . "'),w.`Target`,'-')) as Year5	,
								x.`projectIndicatorDefinition_id`,x.counter,
								 	x.`ConsolidationindicatorDefinition_id`, x.`male`, x.`female`, x.`updatedby`, x.`display`,
								  	x.`Year1Actual` as ActualYear1,
									x.`Year2Actual` as ActualYear2,
								    x.`Year3Actual` as ActualYear3, 
									x.`Year4Actual` as ActualYear4,
								    x.`Year5Actual` as ActualYear5
								 from tbl_indicator_definition d
								left  join tbl_indicator i on(i.indicator_id=d.projectIndicatorDefinition_id)
								left join tbl_workplan w on(w.indicator_id=i.indicator_id)
								left join `view_projectresultvalues` x on(i.indicator_id=x.projectIndicatorDefinition_id) 				  
								left join tbl_project p on(p.id=d.project_id)
							
								 ";


        switch ($_SESSION['role']) {
            //----------------------M&E Personnel-------------------------------- and d.DefName='".$indicator."' 
            case pagination::roleMgt(0):

                $query_string .= "where 
								i.mapping_type like '" . $level . "%'
								and d.prog_id='" . $prog_id . "' 
								and d.DefName='" . $indicator . "'
								group by d.projectIndicatorDefinition_id asc ";
                break;

            //----------------------M&E Personnel--------------------------------l.classCode like '".$classCode."%' && 
            case pagination::roleMgt(1):


                $query_string .= "where 
								i.mapping_type like '" . $level . "%'
								and d.prog_id='" . $prog_id . "' 
								and d.DefName='" . $indicator . "'
								group by d.projectIndicatorDefinition_id asc ";
                break;
            case pagination::roleMgt(2);
                $query_string .= "where 
								i.mapping_type like '" . $level . "%'
								and d.prog_id='" . $prog_id . "' 
								and d.DefName='" . $indicator . "'
								group by d.projectIndicatorDefinition_id asc ";
                break;
            case pagination::roleMgt(3);
                $query_string .= "where 
								i.mapping_type like '" . $level . "%'
								and d.prog_id='" . $prog_id . "'
								and d.DefName='" . $indicator . "' 
								group by d.projectIndicatorDefinition_id asc ";
                break;

            default:

                $query_string .= "where 
								i.mapping_type like '" . $level . "%'
								and d.prog_id='" . $prog_id . "' 
								and d.DefName='" . $indicator . "'
								group by d.projectIndicatorDefinition_id asc ";
                break;

        }
        return $query_string;


    }


    function ViewAsarecaTargetsAndResultsDashboard($indicator_id)
    {

        switch ($indicator_id) {


            default:
                $x = "select  d.counter,i.subcomponent_id, i.output_id, i.indicator_code, i.indicator_id, i.indicator_name, i.`unitofmeasure` , 
					 i.`display` ,  i.`indicator_type`, i.`baseline`, i.`baseyear`,i.prog_id, i.project_id,
							d.Year1, 
							d.Year2, 
							d.Year3,
							 d.Year4,
							  d.Year5,r.`ConsolidationindicatorDefinition_id`,
								r.Year1Actual,
								r.Year2Actual,
								r.Year3Actual,
								r.Year4Actual,
								r.Year5Actual
							from tbl_indicator i LEFT JOIN view_asarecaconsolidatedtargets d ON( i.indicator_id = d.indicator_id )
							LEFT JOIN view_asarecaactuals r ON(i.indicator_id=r.ConsolidationindicatorDefinition_id)
							where i.indicator_id='" . $indicator_id . "' 
					
							 	GROUP BY i.indicator_id
								order by i.indicator_code asc";
                break;

        }
        return $x;


    }


    function ViewAsarecaTargetsAndResults($indicator_type, $target_type, $component_id)
    {

       

        switch ($_SESSION['role']) {

            default:
                $x = "select  d.counter,i.subcomponent_id, i.output_id, i.indicator_code, i.indicator_id, i.indicator_name, i.`unitofmeasure` , 
					 i.`display` ,  i.`indicator_type`, i.`baseline`, i.`baseyear`,i.prog_id, i.project_id,
							d.Year1, 
							d.Year2, 
							d.Year3,
							 d.Year4,
							  d.Year5,r.`ConsolidationindicatorDefinition_id`,
								r.Year1Actual,
								r.Year2Actual,
								r.Year3Actual,
								r.Year4Actual,
								r.Year5Actual
							from tbl_indicator i LEFT JOIN view_asarecaconsolidatedtargets d ON( i.indicator_id = d.indicator_id )
							LEFT JOIN view_asarecaactuals r ON(i.indicator_id=r.ConsolidationindicatorDefinition_id)
							where i.indicator_type LIKE '" . $indicator_type . "%' 
							and i.mapping_type LIKE '" . $target_type . "%' 
							and(i.output_id LIKE '" . $component_id . "%' OR 
							 i.supergoal_id LIKE '" . $component_id . "%' OR 
							  i.goal_id LIKE '" . $component_id . "%' OR
							   i.purpose_id LIKE '" . $component_id . "%')
							 	GROUP BY i.indicator_id
								order by i.indicator_code asc";
                break;

        }
        return $x;


    }


    function CPMDashboardViewTargetsAndResults($indicator_type, $target_type, $component_id, $indicator_id)
    {


        switch ($_SESSION['role']) {

            default:
                $x = "select
						
						d.counter,i.subcomponent_id, i.output_id, i.indicator_code, i.indicator_id, i.indicator_name, i.`unitofmeasure` , 
					 i.`display` ,  i.`indicator_type`, i.`baseline`, i.`baseyear`,i.prog_id, i.project_id,
							d.Year1, 
							d.Year2, 
							d.Year3,
							 d.Year4,
							  d.Year5,
							  d.Year6,
							  d.Target
							from tbl_indicator i LEFT JOIN view_consolidatedprogramworkplan d ON( i.indicator_id = d.indicator_id )
							where i.indicator_type LIKE '" . $indicator_type . "%' 
							and i.level_ofindicator LIKE '" . $target_type . "%'
							and i.prog_id LIKE '" . $_SESSION['program_id'] . "%'
							and(i.output_id LIKE '" . $component_id . "%' OR 
							 i.supergoal_id LIKE '" . $component_id . "%' OR 
							  i.goal_id LIKE '" . $component_id . "%' OR
							   i.purpose_id LIKE '" . $component_id . "%')
							   and i.indicator_id LIKE '" . $indicator_id . "%' 
							 	GROUP BY i.indicator_id
								order by i.indicator_code asc";
                break;

        }
        return $x;


    }

    function RetrieveData($table, $condition, $value, $returnValue1)
    {
        $x = @Execute(" select * from `" . $table . "` where `" . $condition . "` ='" . $value . "' order by 1") or die(http(__line__));
        $row = @FetchRecords($x);
        return $row[$returnValue1];
    }

// by Asiimwe

    function RetrieveDataWithParameters($fieldPrams, $tables, $condition, $returnValue1)
    {
        //$x=@Execute("select $fieldPrams from `".$table."` where ".$condition." order by 1") or die(http("QM-2504"));
        $x = @Execute("select $fieldPrams from " . $tables . " where " . $conditions . "") or die(http(__line__));
        $row = @FetchRecords($x);
        return $row[$returnValue1];
    }


    function view_ASARECAActuals($indicator)
    {


        


        $query_string = " select d.counter,i.indicator_id,  d.`DefName`,
						   		d.`projectIndicatorDefinition_id`,d.`ConsolidationindicatorDefinition_id`,
								r.`ConsolidationindicatorDefinition_id`,
								sum(r.Year1Actual),
								sum(r.Year2Actual),
								sum(r.Year3Actual),
								sum(r.Year4Actual),
								sum(r.Year5Actual)	
								from tbl_indicator i JOIN view_projectresultvalues d 
								 ON(i.indicator_id=d.ConsolidationindicatorDefinition_id) ";


        switch ($_SESSION['role']) {
            //----------------------M&E Personnel--------------------------------
            //".QueryManager::ViewAnualTargetsPrograms($program)." and
            case pagination::roleMgt(0):

                $query_string .= "
								where i.indicator_id='" . $indicator . "' 
								group by i.indicator_id ";
                break;

            //----------------------M&E Personnel--------------------------------l.classCode like '".$classCode."%' && 
            case pagination::roleMgt(1):

                $query_string .= "
							where i.indicator_id='" . $indicator . "' 
							group by i.indicator_id ";
                break;
            case pagination::roleMgt(2);
                $query_string .= "
							where i.indicator_id='" . $indicator . "' 
							group by i.indicator_id ";
                break;
            case pagination::roleMgt(3);

                $query_string .= "
						where i.indicator_id='" . $indicator . "' 
						group by i.indicator_id ";
                break;

            default:
                $query_string .= "
							where i.indicator_id='" . $indicator . "' 
							group by i.indicator_id ";
                break;

        }
        return $query_string;


    }


   

    function view_indicatorMappingProjectBackup($indicator, $level, $prog_id)
    {
        $query_string = "select d.`defn_id`, d.`indicator_id`, d.`DefName`,
						   		d.`projectIndicatorDefinition_id`, i.`prog_id`, i.`project_id`, 
						   		i.`indicator_code`, i.`indicator_name`, i.`indicator_type`, 
						   		i.`mapping_type`, i.`baseline`,p.id,p.title,p.project_code,x.year,x.indicator_id,
						  		max(if((w.`curr_year`='" . currFinancialYear(ProjectTimeLine('opening_year'), ProjectTimeLine('closure_year'), 0) . "'),w.`Target`,'-')) as Year1,
								max(if((w.`curr_year`='" . currFinancialYear(ProjectTimeLine('opening_year'), ProjectTimeLine('closure_year'), 1) . "'),w.`Target`,'-')) as Year2,
								max(if((w.`curr_year`='" . currFinancialYear(ProjectTimeLine('opening_year'), ProjectTimeLine('closure_year'), 2) . "'),w.`Target`,'-')) as Year3,
								max(if((w.`curr_year`='" . currFinancialYear(ProjectTimeLine('opening_year'), ProjectTimeLine('closure_year'), 3) . "'),w.`Target`,'-')) as Year4,
								max(if((w.`curr_year`='" . currFinancialYear(ProjectTimeLine('opening_year'), ProjectTimeLine('closure_year'), 4) . "'),w.`Target`,'-')) as Year5,					    							sum(if((x.`year`='" . currFinancialYear(ProjectTimeLine('opening_year'), ProjectTimeLine('closure_year'), 0) . "'),x.`total`,'-')) as ActualYear1,
								sum(if((x.`year`='" . currFinancialYear(ProjectTimeLine('opening_year'), ProjectTimeLine('closure_year'), 1) . "'),x.`total`,'-')) as ActualYear2,
								sum(if((x.`year`='" . currFinancialYear(ProjectTimeLine('opening_year'), ProjectTimeLine('closure_year'), 2) . "'),x.`total`,'-')) as ActualYear3,
								sum(if((x.`year`='" . currFinancialYear(ProjectTimeLine('opening_year'), ProjectTimeLine('closure_year'), 3) . "'),x.`total`,'-')) as ActualYear4,
								sum(if((x.`year`='" . currFinancialYear(ProjectTimeLine('opening_year'), ProjectTimeLine('closure_year'), 4) . "'),x.`total`,'-')) as ActualYear5	
								
								
								from tbl_indicator_definition d
								inner  join tbl_indicator i on(i.indicator_id=d.projectIndicatorDefinition_id)
								inner join tbl_workplan w on(w.indicator_id=i.indicator_id)
								left JOIN  tbl_organizationreporting x on (x.indicator_id=d.projectIndicatorDefinition_id)
								left join tbl_project p on(p.id=d.project_id)
								
								 ";


        switch ($_SESSION['role']) {
            //----------------------M&E Personnel-------------------------------- and d.DefName='".$indicator."' 
            case pagination::roleMgt(0):

                $query_string .= "where 
								i.mapping_type like '" . $level . "%'
								and d.prog_id='" . $prog_id . "' 
								and d.DefName='" . $indicator . "'
								group by i.indicator_id";
                break;

            //----------------------M&E Personnel--------------------------------l.classCode like '".$classCode."%' && 
            case pagination::roleMgt(1):


                $query_string .= "where 
								i.mapping_type like '" . $level . "%'
								and d.prog_id='" . $prog_id . "' 
								and d.DefName='" . $indicator . "'
								group by i.indicator_id";
                break;
            case pagination::roleMgt(2);
                $query_string .= "where 
								i.mapping_type like '" . $level . "%'
								and d.prog_id='" . $prog_id . "' 
								and d.DefName='" . $indicator . "'
								group by i.indicator_id";
                break;
            case pagination::roleMgt(3);
                $query_string .= "where 
								i.mapping_type like '" . $level . "%'
								and d.prog_id='" . $prog_id . "'
								and d.DefName='" . $indicator . "' 
								group by i.indicator_id";
                break;

            default:

                $query_string .= "where 
								i.mapping_type like '" . $level . "%'
								and d.prog_id='" . $prog_id . "' 
								and d.DefName='" . $indicator . "'
								group by i.indicator_id";
                break;

        }
        return $query_string;


    }


    function view_indicatorMappingProgram($indicator)
    {

        

        $query_string = "select d.`defn_id`, d.`indicator_id`, d.`DefName`,
						   			d.`projectIndicatorDefinition_id`, i.`prog_id`, i.unitofmeasure,i.`project_id`, 
						   			i.`indicator_code`, i.`indicator_name`, i.`indicator_type`, 
						   			i.`mapping_type`, i.`baseline`,p.program_id,p.program_name,p.Accronym,
						  			sum(Year1) AS Year1,
									sum(Year2) AS Year2,
									sum(Year3) AS Year3,
									sum(Year4) AS Year4,
									sum(Year5) AS Year5	
								from `view_projectworkplanvalues` d 
								LEFT JOIN  tbl_indicator i ON(i.indicator_id=d.DefName)
								LEFT JOIN tbl_programme p ON(p.prog_id=d.prog_id)
								";

        switch ($_SESSION['role']) {
            //----------------------M&E Personnel--------------------------------
            //".QueryManager::ViewAnualTargetsPrograms($program)." and
            case pagination::roleMgt(0):

                $query_string .= "
								where   d.`indicator_id`='" . $indicator . "' 
								and d.DefName<>'' && indicator_name <> ''
								group by d.DefName
								order by p.prog_id asc  ";
                break;

            //----------------------M&E Personnel--------------------------------l.classCode like '".$classCode."%' && 
            case pagination::roleMgt(1):

                $query_string .= "
								where   d.`indicator_id`='" . $indicator . "' 
								and d.DefName<>'' && indicator_name <> ''
								group by d.DefName
								order by p.prog_id asc ";
                break;
            case pagination::roleMgt(2);
                $query_string .= "
								where   d.`indicator_id`='" . $indicator . "' 
								and d.DefName<>'' && indicator_name <> ''
								group by d.DefName
								order by p.prog_id asc  ";
                break;
            case pagination::roleMgt(3);

                $query_string .= "
								where   d.`indicator_id`='" . $indicator . "' 
								and d.DefName<>'' && indicator_name <> ''
								group by d.DefName
								order by p.prog_id asc  ";
                break;

            default:

                $query_string .= "
								where   d.`indicator_id`='" . $indicator . "' 
								and d.DefName<>'' && indicator_name <> ''
								group by d.DefName
								order by p.prog_id asc  ";
                break;

        }
        return $query_string;


    }


    function view_indicatorMappingProjectActuals($indicator, $level, $prog_id)
    {

        /* $query_string="select d.`defn_id`, d.`indicator_id`, d.`DefName`,
						   		d.`projectIndicatorDefinition_id`, i.`prog_id`, i.`project_id`, 
						   		i.`indicator_code`, i.`indicator_name`, i.`indicator_type`, 
						   		i.`mapping_type`, i.`baseline`,p.id,p.title,p.project_code,x.year,x.indicator_id,
						  		sum(if((x.`year`='".currFinancialYear(ProjectTimeLine('opening_year'),ProjectTimeLine('closure_year'),0)."'),x.`total`,'-')) as ActualYear1,
								sum(if((x.`year`='".currFinancialYear(ProjectTimeLine('opening_year'),ProjectTimeLine('closure_year'),1)."'),x.`total`,'-')) as ActualYear2,
								sum(if((x.`year`='".currFinancialYear(ProjectTimeLine('opening_year'),ProjectTimeLine('closure_year'),2)."'),x.`total`,'-')) as ActualYear3,
								sum(if((x.`year`='".currFinancialYear(ProjectTimeLine('opening_year'),ProjectTimeLine('closure_year'),3)."'),x.`total`,'-')) as ActualYear4,
								sum(if((x.`year`='".currFinancialYear(ProjectTimeLine('opening_year'),ProjectTimeLine('closure_year'),4)."'),x.`total`,'-')) as ActualYear5		
								from tbl_indicator_definition d
								inner  join tbl_indicator i on(i.indicator_id=d.projectIndicatorDefinition_id)
								left JOIN  tbl_organizationreporting x on (x.indicator_id=d.projectIndicatorDefinition_id)
								left join tbl_project p on(p.id=d.project_id)
								"; */

        $query_string = "select `defn_id`, `ConsolidationindicatorDefinition_id`, `DefName`, `projectIndicatorDefinition_id`,
								 `prog_id`, `project_id`, `id`, `org_code`, `country_id`, `subcomponent_id`,
								  `indicator_id`, `male`, `female`, `updatedby`, `display`,
								  		`Year1Actual` AS ActualYear1,
										`Year2Actual` AS ActualYear2,
								    	`Year3Actual` AS ActualYear3, 
										`Year4Actual` AS ActualYear4,
								    	`Year5Actual` AS ActualYear5
									 from `view_projectresultvalues` ";

        switch ($_SESSION['role']) {
            default:
                //prog_id='".$prog_id."' 
                $query_string .= " where 
								 `projectIndicatorDefinition_id` ='" . $indicator . "'
								group by indicator_id  ";
                break;

        }
        return $query_string;


    }


//-----------Program Actuals-----------
    function view_indicatorMappingProgramActuals($indicator)
    {

        /* $query_string="select w.`indicator_id` , d.DefName,
								d.`defn_id`, d.`indicator_id`, d.`DefName`,
						   		d.`projectIndicatorDefinition_id`, i.`prog_id`, i.`project_id`, 
						   		i.`indicator_code`, i.`indicator_name`, i.`indicator_type`, 
						   		i.`mapping_type`, i.`baseline`,p.program_id,p.program_name,p.Accronym,
								sum(if((w.`year`='".currFinancialYear(ProjectTimeLine('opening_year'),ProjectTimeLine('closure_year'),0)."'),w.`total`,'-')) as ActualYear1,
								sum(if((w.`year`='".currFinancialYear(ProjectTimeLine('opening_year'),ProjectTimeLine('closure_year'),1)."'),w.`total`,'-')) as ActualYear2,
								sum(if((w.`year`='".currFinancialYear(ProjectTimeLine('opening_year'),ProjectTimeLine('closure_year'),2)."'),w.`total`,'-')) as ActualYear3,
								sum(if((w.`year`='".currFinancialYear(ProjectTimeLine('opening_year'),ProjectTimeLine('closure_year'),3)."'),w.`total`,'-')) as ActualYear4,
								sum(if((w.`year`='".currFinancialYear(ProjectTimeLine('opening_year'),ProjectTimeLine('closure_year'),4)."'),w.`total`,'-')) as ActualYear5						    							 from tbl_indicator_definition d 
								 inner join  tbl_indicator i on(i.indicator_id=d.DefName)
								INNER JOIN  tbl_organizationreporting w 
								on (w.indicator_id=d.projectIndicatorDefinition_id)
								left join tbl_programme p on(p.prog_id=d.prog_id)
									
									"; */

        $query_string = "select  d.DefName,
								d.`defn_id`, counter, d.`ConsolidationindicatorDefinition_id`, d.`DefName`,
						   		d.`projectIndicatorDefinition_id`,
								`male`, `female`, `updatedby`, `display`, 
								sum(Year1Actual) AS Year1Actual,
								sum(Year2Actual) AS Year2Actual,
								sum(Year3Actual) AS Year3Actual,
								sum(Year4Actual) AS Year4Actual,
								sum(Year5Actual) AS Year5Actual	
								from view_projectresultvalues d 
								";


        /*  inner join  tbl_indicator i on(i.indicator_id=d.DefName)
								on (w.indicator_id=d.projectIndicatorDefinition_id)
								left join tbl_programme p on(p.prog_id=d.prog_id) */

        switch ($_SESSION['role']) {
            //----------------------M&E Personnel--------------------------------
            case pagination::roleMgt(0):

                $query_string .= " where d.DefName='" . $indicator . "' 
								group by d.DefName";
                break;

            //----------------------M&E Personnel--------------------------------l.classCode like '".$classCode."%' && 
            case pagination::roleMgt(1):

                $query_string .= " where d.DefName='" . $indicator . "' 
								group by d.DefName";
                break;
            case pagination::roleMgt(2);
                $query_string .= " where d.DefName='" . $indicator . "' 
								group by d.DefName";
                break;
            case pagination::roleMgt(3);
                $query_string .= " where d.DefName='" . $indicator . "' 
								group by d.DefName";
                break;

            default:

                $query_string .= " where d.DefName='" . $indicator . "' 
								group by d.DefName";
                break;

        }
        return $query_string;
    }


//$qlP=QueryManager::view_ProjectsTargetsLog($project_id);
    //$obj->alert($qlP);

    function YearFilter($year)
    {
        $date = date('Y');
        $yr = $date;
        $end = $yr + 4;
        do {
            $sel = ($year == $end) ? "selectED" : "";
            $data .= "<option value=\"" . $end . "\" " . $sel . " >" . $end . "</option>";
            $end--;
        } while ($end >= 2013);

        return $data;


    }


    function view_ProjectsTargetsLog($project_id)
    {

        $query_string = "select p.`id`,p.programme_id,q.`prog_id`,q.`project_id`,p.subprogram_id,p.id,p.title,p.project_code,
												sum(if((q.curr_year='" . currFinancialYear($opening_year, $closure_year, 0) . "'),p.`id`,'')) AS year1,
												sum(if((q.curr_year='" . currFinancialYear($opening_year, $closure_year, 1) . "'),p.`id`,'')) AS year2,
												sum(if((q.curr_year='" . currFinancialYear($opening_year, $closure_year, 2) . "'),p.`id`,'')) AS year3,
												sum(if((q.curr_year='" . currFinancialYear($opening_year, $closure_year, 3) . "'),p.`id`,'')) AS year4,
												sum(if((q.curr_year='" . currFinancialYear($opening_year, $closure_year, 4) . "'),p.`id`,'')) AS year5
												 from tbl_project p
												LEFT JOIN tbl_workplan q ON ( q.project_id = p.id ) 
												
												";


        switch ($_SESSION['role']) {
            //----------------------M&E Personnel--------------------------------
            case pagination::roleMgt(0):

                $query_string .= "where p.id='" . $project_id . "'
												 group by p.id order by p.title Asc";
                break;

            //----------------------M&E Personnel--------------------------------l.classCode like '".$classCode."%' && 
            case pagination::roleMgt(1):

                $query_string .= "where p.id ='" . $project_id . "'
												 group by p.id order by p.title Asc";
                break;
            case pagination::roleMgt(2);
                $query_string .= "where p.id='" . $project_id . "'
												 group by p.id order by p.title Asc";
                break;
            case pagination::roleMgt(3);
                $query_string .= "where p.id='" . $project_id . "'
												 group by p.id order by p.title Asc";
                break;

            default:

                $query_string .= "where p.id='" . $project_id . "'
												 group by p.id order by p.title Asc";
                break;

        }
        return $query_string;


    }


    //================Calculating the average Entries==========
    function CalcAverageReporting($indicator_id, $indicator_idValue, $Year1, $table)
    {
        $z = "	select " . $indicator_id . ",
											sum( `counter` ) as NumEntriesYear1			 
											from " . $table . " 
											where " . $Year1 . " <>0 and " . $indicator_id . " ='" . $indicator_idValue . "'
											group by " . $indicator_id . "
											order by " . $indicator_id . " asc";


        /* select `indicator_id` , sum( `counter` ) AS NumEntries, `Year1`
											from `view_programworkplanvalues`
											where `indicator_id` = '2984'
											and `Year1` <>0 */
        $zQuery = @Execute($z) or die(http(__line__));
        $zCount = @FetchRecords($zQuery);

        return $zCount['NumEntriesYear1'];
    }

    //$obj->alert($z);	  

    function ProgramandProjectMean($totalAc, $unitofMeasure, $count)
    {
        if (($count == NULL) || ($count == 0)) $count1 = 1;
        else $count1 = $count;
        if ($unitofMeasure == NULL) $TotalActual = $totalAc;
        else if ($unitofMeasure == 'Number') $TotalActual = $totalAc;
        //--------Get the mean Percentage-------------
        elseif ($unitofMeasure == 'Percentage') $TotalActual = round($totalAc / $count1, 1);
        else $TotalActual = $totalAc;
        return $TotalActual;

    }


    function CurrentYearPercentageAchievement($openingYear, $Targetyr5, $ActualYr5, $Targetyr4, $ActualYr4, $Targetyr3, $ActualYr3, $Targetyr2, $ActualYr2, $Targetyr1, $ActualYr1, $result)
    {

        $result1 = array();
        if ($_SESSION['Activeyear'] == 'Closed') {
            $currActual = 0;
            $currTarget = 0;
            $CurrentpercentageAchvmnt1 = 0;
            $result1 = array($currTarget, $currActual, $CurrentpercentageAchvmnt1);
        } else {

            $count = ($_SESSION['Activeyear'] - intval($openingYear));
            //$obj->alert($count);
            if ($count == 4) {
                $currTarget = $Targetyr5;
                $currActual = $ActualYr5;

                $CurrentpercentageAchvmnt1 = calc_Percentage($currTarget, $currActual);
                $result1 = array($currTarget, $currActual, $CurrentpercentageAchvmnt1);
            } elseif ($count == 3) {
                $currTarget = $Targetyr4;
                $currActual = $ActualYr4;
                $CurrentpercentageAchvmnt1 = calc_Percentage($currTarget, $currActual);
                $result1 = array($currTarget, $currActual, $CurrentpercentageAchvmnt1);
            } elseif ($count == 2) {
                $currTarget = $Targetyr3;
                $currActual = $ActualYr3;
                $CurrentpercentageAchvmnt1 = calc_Percentage($currTarget, $currActual);
                $result1 = array($currTarget, $currActual, $CurrentpercentageAchvmnt1);
            } elseif ($count == 1) {
                $currTarget = $Targetyr2;
                $currActual = $ActualYr2;
                $CurrentpercentageAchvmnt1 = calc_Percentage($currTarget, $currActual);
                $result1 = array($currTarget, $currActual, $CurrentpercentageAchvmnt1);
            } elseif ($count == 0) {
                $currTarget = $Targetyr1;
                $currActual = $ActualYr1;
                $CurrentpercentageAchvmnt1 = calc_Percentage($currTarget, $currActual);
                $result1 = array($currTarget, $currActual, $CurrentpercentageAchvmnt1);
            }
        }


        return $result1[$result];

    }


    //------------Cumulative Percentage Achievement---------------------------


    function CumulativePercentageAchievement($openingYear, $indicatorName, $Targetyr5, $ActualYr5, $Targetyr4, $ActualYr4, $Targetyr3, $ActualYr3,
                                             $Targetyr2, $ActualYr2, $Targetyr1, $ActualYr1, $result)
    {
        $result = array();

        if ($_SESSION['Activeyear'] == 'Closed') {
            $cumulativeTodate = 0;
        } else {
            $cumulativeTodate = 0;
            $count = ($_SESSION['Activeyear'] - $queryHeader['opening_year']);
            if ($count == 4) {

                $target = QueryManager::identifyIndicatorLevel($indicatorName, $Targetyr5, $Targetyr4, $Targetyr3, $Targetyr2, $Targetyr1);
                //$target=Mean($target,$row['unitofmeasure']);
                $actual = QueryManager::identifyIndicatorLevel($indicatorName, $ActualYr5, $ActualYr4, $ActualYr3, $ActualYr2, $ActualYr1);
                //$actual=Mean($actual,$row['unitofmeasure']);
                $cumulativeTodate = calc_Percentage($target, $actual);
            } else if ($count == 3) {

                $target = QueryManager::identifyIndicatorLevel($row['indicator_name'], $Targetyr4, $Targetyr3, $Targetyr2, $Targetyr1, '');
                $actual = QueryManager::identifyIndicatorLevel($row['indicator_name'], $ActualYr4, $ActualYr3, $ActualYr2, $ActualYr1, '');
                $cumulativeTodate = calc_Percentage($target, $actual);

            } else if ($count == 2) {

                $target = QueryManager::identifyIndicatorLevel($row['indicator_name'], $Targetyr2, $Targetyr1, '', '', '');
                $actual = QueryManager::identifyIndicatorLevel($row['indicator_name'], $ActualYr2, $ActualYr1, '', '', '');
                $cumulativeTodate = calc_Percentage($target, $actual);

            } else if ($count == 1) {
                $target = QueryManager::identifyIndicatorLevel($row['indicator_name'], $Targetyr1, '', '', '', '');
                $actual = QueryManager::identifyIndicatorLevel($row['indicator_name'], $ActualYr1, '', '', '', '');
                //$actual=Mean($actual,$row['unitofmeasure']);
                $cumulativeTodate .= calc_Percentage($target, $actual);

            } elseif ($count == 0) {

                $target = QueryManager::identifyIndicatorLevel($row['indicator_name'], $yTargetyr1, '', '', '', '');
                $actual = QueryManager::identifyIndicatorLevel($row['indicator_name'], $ActualYr1, '', '', '', '');
                //$actual=Mean($actual,$row['unitofmeasure']);
                $cumulativeTodate .= calc_Percentage($target, $actual);


            }


        }


    }


    function calc_Percentage($target, $actual)
    {

//========Numerator====================
        $percentage = 100;
        if ($actual <= 0) {
            $percentageAchvmntAGOP = 0;
        }


//=====denominator==============================

        if ($target == 0) {
            $percentageAchvmntAGOP = 0;
        }

        if ($target > 0) {
            $percentageAchvmntAGOP = round(($actual / $target) * $percentage, 1);
        }

        return $percentageAchvmntAGOP;
    }


    function LookupFilter($classCode, $codeName = "")
    {


        $x = "select * from tbl_lookup where classCode='" . $classCode . "' order by 3 asc";
        $q = Execute($x) or die(http(__line__));
        while ($rowd = FetchRecords($q)) {
            $sel = ($rowd['codeName'] == $codeName) ? "selected" : "";
            $data .= "<option value=\"" . $rowd['codeName'] . "\" " . $sel . ">" . $rowd['codeName'] . "</option>";
        }

        return $data;
    }


    function OrganizationFilter($organization, $subcomponent)
    {

        if ($subcomponent = NULL) {
            $x = "select * from tbl_organization order by orgName asc";
        } else {
            $x = "select * from tbl_organization where subcomponent_id  LIKE '%" . $subcomponent . "%' order by orgName asc";
        }
        $q = Execute($x) or die(http(__line__));
        while ($rowd = FetchRecords($q)) {
            $sel = ($rowd['org_code'] == $organization) ? "selected" : "";
            $data .= "<option value=\"" . $rowd['org_code'] . "\" " . $sel . ">" . $rowd['orgName'] . "</option>";
        }

        return $data;
    }


    function ResultsChainFilter($rc_id)
    {


        $x = "select * from tbl_resultschain  order by 2 asc";
        $q = Execute($x) or die(http(__line__));
        while ($rowd = FetchRecords($q)) {
            $sel = ($rowd['rc_id'] == $rc_id) ? "selected" : "";
            $data .= "<option value=\"" . $rowd['rc_id'] . "\" " . $sel . ">" . $rowd['name'] . "</option>";
        }

        return $data;
    }


    function ViewDCEDWorkplanOneQuarter($indicator_id, $year, $quarter)
    {


        $x = "select *
		from tbl_dcedworkplan w where  w.indicator_id LIKE '" . $indicator_id . "%'
		&& w.curr_year LIKE '" . $year . "%' 
		&& w.Quarter LIKE '" . $quarter . "%' 
		GROUP BY w.indicator_id
		order by w.indicator_id asc";


        return $x;
    }


    function EditDCEDWorkplan($subcomponent, $organization, $project, $resultchain, $year, $indicator)
    {


        $x = "select w.workplan_id,w.org_code,w.projectId,w.curr_year,
		i.rc_id,w.indicator_id,i.unitofmeasure,i.subcomponent_id,
		i.indicator_name,i.indicator_type,i.physical_target,
		max(if((w.`Quarter`='Jan - Mar'),w.`Target`,0)) AS pquarter1,
		max(if((w.`Quarter`='Apr - Jun'),w.`Target`,0)) AS pquarter2,
		max(if((w.`Quarter`='Jul - Sep'),w.`Target`,0)) AS pquarter3,
		max(if((w.`Quarter`='Oct - Dec'),w.`Target`,0)) AS pquarter4
		from tbl_dcedworkplan w INNER JOIN 
		tbl_indicator i ON(i.indicator_id=w.indicator_id) 
		where i.rc_id='" . $resultchain . "' 
		&& i.indicator_type LIKE 'DCED Based%'  
		and i.subcomponent_id LIKE '" . $subcomponent . "%'
		and w.org_code LIKE '" . $organization . "%'
		and w.projectId LIKE '" . $project . "%'
		&& w.curr_year LIKE '" . $year . "%' 
		GROUP BY i.indicator_id
		order by i.indicator_name asc";

#&& w.indicator_id='".$indicator."' 

        return $x;
    }


    function ViewDCEDActualResults($year, $indicator)
    {

        /* $querySqlActual="select 1 AS `counter` , d.`defn_id` , d.`indicator_id` , d.`DefName` ,
		w.year, d.`prog_id` , d.`project_id` ,
	  	sum( if(( w.`reportingPeriod` = 'Jan - Mar'), w.`total` , '-' )) AS ActualQuarter1, 
	  	sum( if(( w.`reportingPeriod` = 'Apr- Jun'), w.`total` , '-' )) AS ActualQuarter2, 
	  	sum( if(( w.`reportingPeriod` = 'Jul - Sep'), w.`total` , '-' )) AS ActualQuarter3,
		sum( if(( w.`reportingPeriod` = 'Oct - Dec'), w.`total` , '-' )) AS ActualQuarter4
		from tbl_indicator_definition d
		INNER JOIN tbl_organizationreporting w ON ( w.indicator_id = d.DefName )
		where w.year='".$year."' 
		&& `EntryType`='DCED'
		and d.indicator_id='".$indicator."'
		GROUP BY d.indicator_id"; 
		d.`prog_id` , d.`project_id` ,
		 d.`defn_id` , d.`indicator_id` , d.`DefName` ,tbl_indicator_definition d
		INNER JOIN  ON ( w.indicator_id = d.DefName )
		*/

        $querySqlActual = "select 1 AS `counter` ,
		w.year, 
	  	sum( if(( w.`reportingPeriod` = 'Jan - Mar'), w.`total` , '-' )) AS ActualQuarter1, 
	  	sum( if(( w.`reportingPeriod` = 'Apr - Jun'), w.`total` , '-' )) AS ActualQuarter2, 
	  	sum( if(( w.`reportingPeriod` = 'Jul - Sep'), w.`total` , '-' )) AS ActualQuarter3,
		sum( if(( w.`reportingPeriod` = 'Oct - Dec'), w.`total` , '-' )) AS ActualQuarter4
		from  tbl_organizationreporting w
		where w.year='" . $year . "' 
		&& `EntryType`='DCED'
		and w.indicator_id='" . $indicator . "'
		GROUP BY w.indicator_id,w.year";


        return $querySqlActual;


    }

    function viewDCEDReportlog($year, $org_code)
    {

        $xx = "select o.org_code, o.orgName, o.subcomponent_id,r.updatedby,r.EntryType,
	 max( if( (r.reportingPeriod = 'Jan - Mar' and r.year='" . $year . "'  and r.subcomponent_id='1'), 1, 0) ) AS Quarter1s1,
	  max( if( (r.reportingPeriod = 'Apr - Jun' and r.year= '" . $year . "' and r.subcomponent_id='1'), 1, 0) ) AS Quarter2s1,
 		max( if( (r.reportingPeriod = 'Jul - Sep' and r.year='" . $year . "'  and r.subcomponent_id='1' ), 1, 0) ) AS Quarter3s1,
  		max( if( (r.reportingPeriod = 'Oct - Dec' and r.year= '" . $year . "' and r.subcomponent_id='1'),1, 0) ) AS Quarter4s1,
		max( if( (r.reportingPeriod = 'Jan - Mar' and r.year='" . $year . "' and r.subcomponent_id='2'), 1, 0) ) AS Quarter1s2,
	  max( if( (r.reportingPeriod = 'Apr - Jun' and r.year= '" . $year . "' and r.subcomponent_id='2'), 1, 0) ) AS Quarter2s2,
 		max( if( (r.reportingPeriod = 'Jul - Sep' and r.year='" . $year . "' and r.subcomponent_id='2'), 1, 0) ) AS Quarter3s2,
  		max( if( (r.reportingPeriod = 'Oct - Dec' and r.year= '" . $year . "' and r.subcomponent_id='2'),1, 0) ) AS Quarter4s2,
		max( if( (r.reportingPeriod = 'Jan - Mar' and r.year='" . $year . "'  and r.subcomponent_id='4'), 1, 0) ) AS Quarter1s4,
	  max( if( (r.reportingPeriod = 'Apr - Jun' and r.year= '" . $year . "' and r.subcomponent_id='4'), 1, 0) ) AS Quarter2s4,
 		max( if( (r.reportingPeriod = 'Jul - Sep' and r.year='" . $year . "' and r.subcomponent_id='4'), 1, 0) ) AS Quarter3s4,
  		max( if( (r.reportingPeriod = 'Oct - Dec' and r.year= '" . $year . "' and r.subcomponent_id='4'), 1, 0) ) AS Quarter4s4,
		 r.year
from tbl_organization o inner JOIN tbl_organizationreporting r ON ( o.org_code = r.org_code )
 and o.org_code='" . $org_code . "'
 and r.EntryType='DCED'
GROUP BY orgName order by orgName asc";
        /* $xx="select o.org_code, o.orgName, o.subcomponent,r.updatedby,r.EntryType,
	 max( if( (r.reportingPeriod = 'Jan - Mar' and r.year='".$year."' and r.updatedby='Partners' and r.subcomponent_id='1'), 1, 0) ) AS Quarter1s1,
	  max( if( (r.reportingPeriod = 'Apr - Jun' and r.year= '".$year."' and r.updatedby='Partners' and r.subcomponent_id='1'), 1, 0) ) AS Quarter2s1,
 		max( if( (r.reportingPeriod = 'Jul - Sep' and r.year='".$year."' and r.updatedby='Partners' and r.subcomponent_id='1'), 1, 0) ) AS Quarter3s1,
  		max( if( (r.reportingPeriod = 'Oct - Dec' and r.year= '".$year."' and r.updatedby='Partners' and r.subcomponent_id='1'),1, 0) ) AS Quarter4s1,
		max( if( (r.reportingPeriod = 'Jan - Mar' and r.year='".$year."' and r.updatedby='Partners' and r.subcomponent_id='2'), 1, 0) ) AS Quarter1s2,
	  max( if( (r.reportingPeriod = 'Apr - Jun' and r.year= '".$year."' and r.updatedby='Partners' and r.subcomponent_id='2'), 1, 0) ) AS Quarter2s2,
 		max( if( (r.reportingPeriod = 'Jul - Sep' and r.year='".$year."' and r.updatedby='Partners' and r.subcomponent_id='2'), 1, 0) ) AS Quarter3s2,
  		max( if( (r.reportingPeriod = 'Oct - Dec' and r.year= '".$year."' and r.updatedby='Partners' and r.subcomponent_id='2'),1, 0) ) AS Quarter4s2,
		max( if( (r.reportingPeriod = 'Jan - Mar' and r.year='".$year."' and r.updatedby='Partners' and r.subcomponent_id='4'), 1, 0) ) AS Quarter1s4,
	  max( if( (r.reportingPeriod = 'Apr - Jun' and r.year= '".$year."' and r.updatedby='Partners' and r.subcomponent_id='4'), 1, 0) ) AS Quarter2s4,
 		max( if( (r.reportingPeriod = 'Jul - Sep' and r.year='".$year."' and r.updatedby='Partners' and r.subcomponent_id='4'), 1, 0) ) AS Quarter3s4,
  		max( if( (r.reportingPeriod = 'Oct - Dec' and r.year= '".$year."' and r.updatedby='Partners' and r.subcomponent_id='4'), 1, 0) ) AS Quarter4s4,
		 r.year
from tbl_organization o inner JOIN tbl_organizationreporting r ON ( o.org_code = r.org_code )
 and o.org_code='".$org_code."'
 and r.EntryType='DCED'
GROUP BY orgName order by orgName asc"; */
        return $xx;


    }

    function viewPerfomanceMeasurementTargets($resultChain, $subcomponent)
    {
        $select = "select i.indicator_id,i.rc_id,i.unitofmeasure,
				i.indicator_name,i.physical_target,d.DefName
				from tbl_indicator i JOIN tbl_indicator_definition d 
				ON(d.indicator_id=i.indicator_id)
				where i.rc_id='" . $resultChain . "'
					and i.subcomponent_id LIKE '" . $subcomponent . "%'
					and i.mapping_type LIKE '" . LookupData($code = 1, $returnValue1 = 3) . "%'
					GROUP BY i.indicator_id asc";

        /* where i.rc_id='".$resultChain."'
		$select="select i.indicator_id,i.indicator_name,r.year,
		MAX(if(r.reportingPeriod='Jan - Mar',r.total,'')) as actualQ1,
		MAX(if(r.reportingPeriod='Apr - Jun',r.total,''))  as actualQ2,
		MAX(if(r.reportingPeriod='Jul - Sep',r.total,''))  as actualQ3,
		MAX(if(r.reportingPeriod='Oct - Dec',r.total,'')) as actualQ4,
		MAX(r.total) as actualAnnual from tbl_indicator i 
		left join tbl_organizationreporting r on(i.indicator_id=r.indicator_id) 
		left join tbl_dcedworkplan at on(i.indicator_id=at.indicator_id)
		join tbl_indicator i on(i.indicator_id=at.indicator_id)
		group by i.indicator_id,r.year"; */


        return $select;

    }


    function ViewDCEDWorkplan($subcomponent, $organization, $project, $resultchain, $year)
    {


        $x = "select w.workplan_id,w.org_code,w.projectId,w.curr_year,
		i.rc_id,i.indicator_id,i.unitofmeasure,i.subcomponent_id,
		i.indicator_name,i.indicator_type,i.physical_target,
		max(if((w.`Quarter`='Jan - Mar'),w.`Target`,0)) AS pquarter1,
		max(if((w.`Quarter`='Apr - Jun'),w.`Target`,0)) AS pquarter2,
		max(if((w.`Quarter`='Jul - Sep'),w.`Target`,0)) AS pquarter3,
		max(if((w.`Quarter`='Oct - Dec'),w.`Target`,0)) AS pquarter4
		from tbl_dcedworkplan w INNER JOIN 
		tbl_indicator i ON(i.indicator_id=w.indicator_id) 
		where i.rc_id='" . $resultchain . "' 
		&& i.indicator_type LIKE 'DCED Based%'  
		and i.subcomponent_id LIKE '" . $subcomponent . "%'
		and w.org_code LIKE '" . $organization . "%'
		and w.projectId LIKE '" . $project . "%'
		&& w.curr_year LIKE '" . $year . "%' 
		GROUP BY i.indicator_id
		order by i.indicator_name asc";


        return $x;
    }

    function viewPerfomanceMeasurementTargetsPrimary($mappingType, $resultChain, $subcomponent)
    {
        $select = "select i.indicator_id,i.rc_id,i.unitofmeasure, i.indicator_name,i.physical_target
				from tbl_indicator i 
				where i.rc_id='" . $resultChain . "' 	
				and i.subcomponent_id LIKE '" . $subcomponent . "%' 
				GROUP BY i.indicator_id	
				order by i.rc_id,i.indicator_id asc";

        #i.mapping_type ='$mappingType' and 
        return $select;

    }

    function viewNarrative($orgname)
    {
        switch ($_SESSION['role']) {
            case "Implementing Partner":
                $sql = "select n.*,o.*,i.* from tbl_organization o LEFT JOIN tbl_narrative n  ON(o.org_code=n.org_code)
LEFT JOIN tbl_intervention i ON (n.indicator_id=i.intervention_id)
 where o.org_code='" . $orgname . "' order by n.remarks asc";
                break;
            default:

                $sql = "select n.*,o.*,i.* from tbl_organization o LEFT JOIN tbl_narrative n  ON(o.org_code=n.org_code)
LEFT JOIN tbl_intervention i ON (n.indicator_id=i.intervention_id)
 where o.org_code LIKE '" . $orgname . "%' order by n.remarks asc";

                break;
        }
        return $sql;

    }


    function viewPartnerWorkplan($indicator_id, $organization, $project, $year)
    {
        $x = "select w.workplan_id,w.org_code,w.indicator_id,w.projectId,w.curr_year,
							max(if((w.`Quarter`='Jan - Mar'),w.`Target`,0)) AS Quarter1,
							max(if((w.`Quarter`='Apr - Jun'),w.`Target`,0)) AS Quarter2,
							max(if((w.`Quarter`='Jul - Sep'),w.`Target`,0)) AS Quarter3,
							max(if((w.`Quarter`='Oct - Dec'),w.`Target`,0)) AS Quarter4
							from tbl_dcedworkplan w 
							where w.curr_year LIKE '" . $year . "%'
							and w.org_code LIKE '" . $organization . "%'	
							and w.projectId LIKE '" . $project . "%'	
							&& w.indicator_id='" . $indicator_id . "' 
							GROUP BY w.indicator_id
							order by w.rc_id,w.indicator_id asc";


        return $x;

    }


    function RetrieveDCEDWorkplan($indicator_id, $year, $ReportingPeriod, $org_code, $project, $rc_id, $returnValue)
    {

        $sqlActual = "select *
				  from  tbl_dcedworkplan  w  
				  where w.curr_year LIKE '" . $year . "%' 
				   and w.Quarter LIKE '" . $ReportingPeriod . "%' 
				  and w.rc_id='" . $rc_id . "'
				  and w.org_code='" . $org_code . "' and w.org_code<> '0'
				and w.indicator_id='" . $indicator_id . "' 
				and w.projectId='" . $project . "'
				  order by w.indicator_id asc";
        #GROUP by r.indicator_id
        $queryActual = @Execute($sqlActual) or die(http(__line__));
        $rowActual = FetchRecords($queryActual);
        return $rowActual[$returnValue];


    }

    function RetrieveActuals($indicator_id, $year, $ReportingPeriod, $org_code, $project, $returnValue)
    {

        $sqlActual = "select r.id,r.reportingPeriod,r.year,r.org_code,r.EntryType,r.total,r.updatedby
				  			  	from tbl_organizationreporting r 
				   				where r.indicator_id='" . $indicator_id . "%' 
				  				and r.year like '" . $year . "%' 
				  			 	and r.reportingPeriod like '" . $ReportingPeriod . "%' 
				  				and r.org_code='" . $org_code . "' and r.org_code<> '0'
								and r.EntryType ='DCED'
								and r.projectId ='$project'
				  				
				  				order by r.indicator_id asc";
        #GROUP by r.indicator_id
        $queryActual = @Execute($sqlActual) or die(http(__line__));
        $rowActual = FetchRecords($queryActual);
        return $rowActual[$returnValue];


    }


    function viewHighLevelWorkplan($indicator_id, $organization, $project, $year)
    {


        /* $querySql="select 1 AS `counter` , d.`defn_id` , d.`indicator_id` , d.`DefName` ,
							w.curr_year,w.projectId,w.curr_year,w.org_code,
							sum( if(( w.`Quarter` = 'Jan - Mar'), w.`Target` , '-' )) AS Quarter1, 
							sum( if(( w.`Quarter` = 'Apr- Jun'), w.`Target` , '-' )) AS Quarter2, 
							sum( if(( w.`Quarter` = 'Jul - Sep'), w.`Target` , '-' )) AS Quarter3,
							sum( if(( w.`Quarter` = 'Oct - Dec'), w.`Target` , '-' )) AS Quarter4
							from tbl_indicator_definition d
							INNER JOIN tbl_dcedworkplan w ON ( w.indicator_id = d.DefName )
							where w.curr_year like '".$year."%'
							and w.org_code like '".$organization."%'	
							and w.projectId like '".$project."%'	
							&& d.indicator_id='".$indicator_id."' 
							group by d.indicator_id
							order by w.rc_id,w.indicator_id asc";
							
							d.`defn_id` , d.`indicator_id` , d.`DefName` ,
							tbl_indicator_definition d
							INNER JOIN 
							ON ( w.indicator_id = d.DefName )
							 */

        $querySql = "select 1 AS `counter` , 
							w.curr_year,w.projectId,w.curr_year,w.org_code,
							sum( if(( w.`Quarter` = 'Jan - Mar'), w.`Target` , '-' )) AS Quarter1, 
							sum( if(( w.`Quarter` = 'Apr - Jun'), w.`Target` , '-' )) AS Quarter2, 
							sum( if(( w.`Quarter` = 'Jul - Sep'), w.`Target` , '-' )) AS Quarter3,
							sum( if(( w.`Quarter` = 'Oct - Dec'), w.`Target` , '-' )) AS Quarter4
							from tbl_dcedworkplan w 
							where w.curr_year LIKE '" . $year . "%'
							and w.org_code LIKE '" . $organization . "%'	
							and w.projectId LIKE '" . $project . "%'	
							&& w.indicator_id='" . $indicator_id . "' 
							GROUP BY w.indicator_id
							order by w.rc_id,w.indicator_id asc";
        return $querySql;

    }


    function viewPartnerActuals($indicator_id, $organization, $project, $year)
    {


        $querySqlActual = "select 1 AS `counter` ,
						w.year,w.org_code,w.projectId,
						sum( if(( w.`reportingPeriod` = 'Jan - Mar'), w.`total` , '-' )) AS ActualQuarter1, 
						sum( if(( w.`reportingPeriod` = 'Apr- Jun'), w.`total` , '-' )) AS ActualQuarter2, 
						sum( if(( w.`reportingPeriod` = 'Jul - Sep'), w.`total` , '-' )) AS ActualQuarter3,
						sum( if(( w.`reportingPeriod` = 'Oct - Dec'), w.`total` , '-' )) AS ActualQuarter4
						from  tbl_organizationreporting w 
						where w.year = '" . $year . "'
						and w.org_code LIKE '" . $organization . "%'	
						and w.projectId LIKE '" . $project . "%'	
						and w.`EntryType`='DCED'
						and w.indicator_id='" . $indicator_id . "'
						GROUP BY w.indicator_id";

        return $querySqlActual;

    }

    function noteMsg($msg)
    {
# bgcolor='#FFCC99'
        $data = "<fieldset><legend><span class=''><b>Notification</b></span></legend><span class= ><table cellspacing='0'      border='0' width=100% style='border-bottom-color:#CC0000; background-color:#FFCC99;'><tr><td><img src='icons/warning_icon.png'>  " . $msg . "</td></tr></table></span></fieldset>";
        return $data;
    }

    function congMsg($msg)
    {
# bgcolor='#FFCC99'
        $data = "<fieldset><legend><span class=''><b>Congratulations</b></span></legend><span class= ><table cellspacing='0'      border='0' width=600 style='border-bottom-color:#ffffff; background-color:#FFffff;'><tr ><td class='green_field'><font >  " . $msg . "</font></td></tr></table></span></fieldset>";
        return $data;
    }

    function noteMsgDefined($msg)
    {
# bgcolor='#FFCC99'
        $data = "<table cellspacing='0'      border='0' width=100% style='border-bottom-color:#CC0000; background-color:#FFCC99;'><tr><td><img src='icons/warning_icon.png'>  " . $msg . "</td></tr></table>";
        return $data;
    }

#DISPLAY ERROR
    function errorMsg($msg)
    {
# bgcolor='#FFCC99'
        $data = "<fieldset><legend><span class='redhdrs'><b>Error</b></span></legend><span class=redhdrs ><table cellspacing='0'      border='0' width=600 style='border-bottom-color:#CC0000; background-color:#FFCC99;'><tr><td><img src='icons/warning_icon.png'>  " . $msg . "</td></tr></table></span></fieldset>";
        return $data;
    }


//---------------------------UpdATED  ON 19062014----------------------------
    function OutputFilter($outcome, $output)
    {


        switch ($_SESSION['role']) {
            case pagination::roleMgt(0):
                $x = "select * from tbl_output where subprog_id LIKE '" . $outcome . "%' order by output_code asc";

                break;

            case pagination::roleMgt(1):
                $x = "select * from tbl_output where subprog_id LIKE '" . $outcome . "%' order by output_code asc";

                break;


            default:
                $x = "select * from tbl_output where subprog_id LIKE '" . $outcome . "%' order by output_code asc";

                break;

        }
        $query = Execute($x) or die(http(__line__));
        while ($row = FetchRecords($query)) {
            $selected = ($output == $row['output_id']) ? "selectED" : "";
            $data .= "<option value=\"" . $row['output_id'] . "\" " . $selected . ">" . $row['output_code'] . " " . $row['output_name'] . "</option>";

        }
        return $data;
    }


    function IndicatorTypeFilter($indicatorType)
    {

        $classCode = 5;
        switch ($_SESSION['role']) {
            case pagination::roleMgt(0):
                $x = "select * from tbl_lookup where classCode='" . $classCode . "'   GROUP BY codeName order by codeName asc ";
                $query = @Execute($x) or die(http(__line__));
                while ($row = @FetchRecords($query)) {
                    $selected = ($indicatorType == $row['codeName']) ? "selectED" : "";
                    $data .= "<option value=\"" . $row['codeName'] . "\" " . $selected . ">" . $row['codeName'] . " </option>";
                }
                break;

            case pagination::roleMgt(1):
                $x = "select * from tbl_lookup where classCode='" . $classCode . "'  GROUP BY codeName order by codeName asc ";
                $query = @Execute($x) or die(http(__line__));
                while ($row = @FetchRecords($query)) {
                    $selected = ($indicatorType == $row['codeName']) ? "selectED" : "";
                    $data .= "<option value=\"" . $row['codeName'] . "\" " . $selected . ">" . $row['codeName'] . " </option>";
                }
                break;
            default:
                $x = "select * from tbl_lookup where classCode='" . $classCode . "'  GROUP BY codeName order by codeName asc ";
                $query = @Execute($x) or die(http(__line__));
                while ($row = @FetchRecords($query)) {
                    $selected = ($indicatorType == $row['codeName']) ? "selectED" : "";
                    $data .= "<option value=\"" . $row['codeName'] . "\" " . $selected . ">" . $row['codeName'] . " </option>";
                }
                break;
        }


        return $data;
    }

    //-----------------------------------class Update from akiwanuka---------------------------------------


    function EaappSubIndicatorsOnly($indicatorId, $year)
    {
        $myYear = (!empty($year)) ? $year :'';
        if ($myYear <> '' && $indicatorId <> '') {
            //start of catering for targets with years
            $query_string = "select `w`.*,`s`.*  
								from `tbl_sub_indicator` AS `s`
								LEFT JOIN `tbl_workplan_sub` AS `w` ON `w`.`indicator_id`=`s`.`indicator_id`
								and `w`.`sub_indicatorId`=`s`.`sub_indicatorId`
								where `s`.`indicator_id`='" . $indicatorId . "'
								and `w`.`curr_year` = '" . $year . "'
	order by `s`.`sub_indicatorId` asc";
            //end of  of catering for targets without years
        } else {


            //start of catering for initial setup of targets
            $query_string = "select `w`.*,`s`.*  
								from `tbl_sub_indicator` AS `s`
								LEFT JOIN `tbl_workplan_sub` AS `w` ON `w`.`indicator_id`=`s`.`indicator_id`
								and `w`.`sub_indicatorId`=`s`.`sub_indicatorId`
								where `s`.`indicator_id`='" . $indicatorId . "'
								order by `s`.`sub_indicatorId` asc";


            //end of  of catering for initial setup of targets
        }
        return $query_string;
    }

	function cpmSubIndicatorsByYear($indicatorId,$subIndicatorId,$year)
    {
        
            //start of catering for targets with years
            $query_string = "select `w`.*,`s`.*  
								from `tbl_sub_indicator` AS `s`
								LEFT JOIN `tbl_workplan_sub` AS `w` ON `w`.`indicator_id`=`s`.`indicator_id`
								and `w`.`sub_indicatorId`=`s`.`sub_indicatorId`
								where `s`.`indicator_id`='" . $indicatorId . "'
								and `w`.`curr_year` = '" . $year . "'
								and `s`.`sub_indicatorId` = '".$subIndicatorId."'
								order by `s`.`sub_indicatorId`, w.dateUpdated desc";
           
        return $query_string;
    }

	

	
    function CpmSubIndicatorsNoneDisagg($indicatorId)
    {

        $query_string = "select s.* from tbl_sub_indicator s 
			where s.indicator_id='" . $indicatorId . "'
			order by sub_indicatorId asc";

        return $query_string;
    }

    function cpmSubIndicatorsOnly($indicatorId)
    {
		$query_string = "select `i`.*,`i`.`unitofmeasure` AS `indUnitofmeasure`,`s`.*, `s`.`baseline` AS `subBaseline`  
		from `tbl_indicator` AS `i`
		LEFT JOIN `tbl_sub_indicator` AS `s` ON (`s`.`indicator_id`=`i`.`indicator_id`)
		where `s`.`indicator_id`='" . $indicatorId . "'
		order by `s`.`sub_indicatorId` asc";

        return $query_string;
    }
	
	function melaDissagregation ($indicatorId){
		$query_string="select `i`.*,`i`.`unitofmeasure` AS `indUnitofmeasure`,`s`.*
		from `tbl_indicator` AS `i`
		LEFT JOIN `tbl_mela_dissagregation_level_one` AS `s` ON (`s`.`indicator_id`=`i`.`indicator_id`)
		where `s`.`indicator_id` = " . $indicatorId . "
		order by `s`.`tbl_mela_dissagregationId` asc";
		
		return $query_string;
	}
	
	function cpmSubIndicatorsOnlylevel_two($indicatorId,$subIndicatorId)
    {
		$query_string = "select  `s`.`indicator_id`,`st`.*  
		from `tbl_sub_indicator` AS `s`
		LEFT JOIN `tbl_sub_indicator_level_two` AS `st` 
		ON (`st`.`sub_indicatorId`=`s`.`sub_indicatorId`)
		where `st`.`indicator_id`='" . $indicatorId . "'
		and `s`.`sub_indicatorId`='" . $subIndicatorId . "'
		order by `st`.`level_two_sub_indicatorId` asc";

        return $query_string;
    }
	
	function melaDissagregationLevel_two($indicatorId,$subIndicatorId)
    {
		$query_string = "select  `s`.`indicator_id`,`st`.*  
		from `tbl_mela_dissagregation_level_one` AS `s`
		LEFT JOIN `tbl_mela_dissagregation_level_two` AS `st` 
		ON (`st`.`level_one_id` = `s`.`tbl_mela_dissagregationId`)
		where `st`.`indicator_id` = " . $indicatorId . "
		and `s`.`tbl_mela_dissagregationId` = " . $subIndicatorId . "
		order by `st`.`tbl_mela_sub_dissagregationId` asc";

        return $query_string;
    }
	
	function cpmSubIndicatorsOnlylevel_three($subIndicatorId,$level_two_sub_indicatorId)
    {
		$query_string = "select  `s`.`indicator_id`,`st`.*  
		from `tbl_sub_indicator_level_two` AS `s`
		LEFT JOIN `tbl_sub_indicator_level_three` AS `st` 
		ON (`st`.`level_two_sub_indicatorId`=`s`.`level_two_sub_indicatorId`)
		where `s`.`sub_indicatorId`='" . $subIndicatorId . "'
		and `st`.`level_two_sub_indicatorId`='" . $level_two_sub_indicatorId . "'
		order by `st`.`level_three_sub_indicatorId` asc";

        return $query_string;
    }




    function ControlDisplay($action, $html, $altresult = "")
    {
        if ($_GET['action'] == $action) {
            $data .= $altresult;
        } else {
            $data .= $html;

        }
        return $data;

    }


    function view_AnnualResultsHO()
    {
        switch ($_SESSION['role']) {
            case pagination::roleMgt(0);


                $x = "select w.id,i.indicator_type,i.indicator_id,i.indicator_code,i.indicator_name,
i.baseline,i.unitofmeasure,i.typeofDisaggregation,w.semi_annual,w.year,
max(if(w.semi_annual='Apr - Sep' and w.year='" . currFinancialYear($year, 'YearRange') . "',w.male,'-')) as maleAprSep,
max(if(w.semi_annual='Apr - Sep' and w.year='" . currFinancialYear($year, 'YearRange') . "',w.female,'-')) as femaleAprSep,
max(if(w.semi_annual='Apr - Sep' and w.year='" . currFinancialYear($year, 'YearRange') . "',w.other,'-')) as otherAprSep,
max(if(w.semi_annual='Oct - Mar' and w.year='" . currFinancialYear($year, 'YearRange') . "',w.male,'-')) as maleOctMar,
max(if(w.semi_annual='Oct - Mar' and w.year='" . currFinancialYear($year, 'YearRange') . "',w.female,'-')) as femaleOctMar,
max(if(w.semi_annual='Oct - Mar' and w.year='" . currFinancialYear($year, 'YearRange') . "',w.other,'-')) as otherOctMar,
sum(if(w.year='" . $year . "',w.total,'-')) as totalAnnualActual
 from  tbl_indicator i 
 left join tbl_organizationreporting w on(i.indicator_id=w.indicator_id)
  where  i.subcomponent_id LIKE '" . $_SESSION['subcomponent_id'] . "%'
 and i.output_id like '" . $_SESSION['output_id'] . "%'
 && i.indicator_type LIKE '" . $_SESSION['indicator_Type'] . "%'
 and i.indicator_name like '" . $_SESSION['indicator'] . "%'
  and i.indicator_code like '" . $_SESSION['indicatorCode'] . "%'
  group by i.indicator_id
  order by i.indicator_code asc";


                /* $x="select r.`id`, r.`org_code`, r.`prog_id`, r.`subcomponent_id`,
 r.`year`, r.`reportingPeriod`, r.`semi_annual`, r.`indicator_id`, r.`male`, r.`female`, r.`total`, r.`date_reported`, r.`updatedby`,i.indicator_name,i.indicator_type,i.indicator_code,i.unitofmeasure,i.typeofDisaggregation
from tbl_indicator i left outer join tbl_organizationreporting r on(i.indicator_id=r.indicator_id)
 where i.indicator_type like '".$_SESSION['indicator_type']."%'
 and 	i.indicator_name like '".$_SESSION['indicator_name']."%'
  and 	r.semi_annual like '".$_SESSION['quarterName']."%'
  and r.org_code like '".$_SESSION['orgName2']."%'
  group by i.indicator_name,r.year,r.`semi_annual`,r.reportingPeriod order by i.indicator_code asc";	
					
 */
                break;
            default:

                $x = "select w.`workplan_id` , i.`indicator_id` ,i.subcomponent_id,i.output_id, i.indicator_code, 
i.indicator_id, i.indicator_name, w.`curr_year` , w.`baseline` ,w.male,w.female,w.other, i.`unitofmeasure`,
   w.Target, i.`display`,i.typeofDisaggregation,i.`indicator_type`
from tbl_indicator i LEFT JOIN  `tbl_workplan` w
 ON ( i.indicator_id = w.indicator_id )

where i.subcomponent_id LIKE '" . $_SESSION['subcomponent_id'] . "%'
 and i.output_id LIKE '" . $_SESSION['output_id'] . "%'
 && i.indicator_type LIKE '" . $_SESSION['indicator_type'] . "%'
 and i.indicator_name LIKE '" . $_SESSION['indicator'] . "%'

GROUP BY i.indicator_id
HAVING i.display LIKE 'Yes%' 
order by i.indicator_code asc";


        }

        return $x;


    }


    //------------program Filter Data-----------

    function ProgramFilter($programID)
    {


        switch ($_SESSION['role']) {
            //----------------------M&E Personnel--------------------------------
            case pagination::roleMgt(0):
                $query_string = "select * from tbl_programme 
						  				where prog_id='" . $_SESSION['program_id'] . "'  
										and type LIKE 'Program%' 
										and display='Yes' 
										order by prog_id asc";

                $q = Execute($query_string) or die(http(__line__));
                while ($rowd = FetchRecords($q)) {
                    $sel = ($rowd['prog_id'] == $_SESSION['program_id']) ? "selected" : "";
                    $data .= "<option value=\"" . $rowd['prog_id'] . "\" " . $sel . ">" . $rowd['program_id'] . " " . $rowd['program_name'] . "</option>";

                }

                break;

            //----------------------M&E Personnel--------------------------------l.classCode like '".$classCode."%' && 
            case pagination::roleMgt(1):
                $query_string = "select * from tbl_programme 
						  				where prog_id='" . $_SESSION['program_id'] . "'  
										and type LIKE 'Program%' 
										and display='Yes' 
										order by prog_id asc";

                $q = Execute($query_string) or die(http(__line__));
                while ($rowd = FetchRecords($q)) {
                    $sel = ($rowd['prog_id'] == $_SESSION['program_id']) ? "selected" : "";
                    $data .= "<option value=\"" . $rowd['prog_id'] . "\" " . $sel . ">" . $rowd['program_id'] . " " . $rowd['program_name'] . "</option>";

                }
                break;
            case pagination::roleMgt(2);
                $query_string = "select * from tbl_programme 
						  				where prog_id='" . $_SESSION['program_id'] . "'  
										and type LIKE 'Program%' 
										and display='Yes' 
										order by prog_id asc";

                $q = Execute($query_string) or die(http(__line__));
                while ($rowd = FetchRecords($q)) {
                    $sel = ($rowd['prog_id'] == $_SESSION['program_id']) ? "selected" : "";
                    $data .= "<option value=\"" . $rowd['prog_id'] . "\" " . $sel . ">" . $rowd['program_id'] . " " . $rowd['program_name'] . "</option>";

                }
                break;
            case pagination::roleMgt(3);
                $query_string = "select * from tbl_programme where  type LIKE 'Program%' and display='Yes' order by prog_id asc";

                $q = Execute($query_string) or die(http(__line__));
                while ($rowd = FetchRecords($q)) {
                    $sel = ($rowd['prog_id'] == $programID) ? "selected" : "";
                    $data .= "<option value=\"" . $rowd['prog_id'] . "\" " . $sel . ">" . $rowd['program_id'] . " " . $rowd['program_name'] . "</option>";

                }

                break;

            default:

                $query_string = "select * from tbl_programme where 1
					  order by prog_id asc";

                $q = Execute($query_string) or die(http(__line__));
                while ($rowd = FetchRecords($q)) {
                    $sel = ($rowd['prog_id'] == $programID) ? "selected" : "";
                    $data .= "<option value=\"" . $rowd['prog_id'] . "\" " . $sel . ">" . $rowd['program_id'] . " " . $rowd['program_name'] . "</option>";

                }


                break;

        }
        pagination::free_result($q);
        return $data;

    }


    //------------Project Filter Data-----------

    function ProjectFilter($programID, $projectID)
    {


        switch ($_SESSION['role']) {
            //----------------------Principal Investigator--------------------------------
            case pagination::roleMgt(0):
                $query_string = "select * from tbl_project 
						  				where id='" . $_SESSION['project_id'] . "'
						   				and display='Yes' 
										order by title asc";

                $q = Execute($query_string) or die(http(__line__));
                while ($rowd = FetchRecords($q)) {
                    $sel = ($rowd['id'] == $_SESSION['project_id']) ? "selected" : "";
                    $data .= "<option value=\"" . $rowd['id'] . "\" " . $sel . ">
						" . retrieve_info_withSpecialCharactersNowordLimit($rowd['project_code']) . "
						 " . retrieve_info_withSpecialCharactersNowordLimit($rowd['title']) . "</option>";

                }


                break;


            case pagination::roleMgt(1):
                $query_string = "select * from tbl_project where id='" . $_SESSION['project_id'] . "' and display='Yes' order by title asc";
                $q = Execute($query_string) or die(http("QMGR-798"));
                while ($rowd = FetchRecords($q)) {
                    $sel = ($rowd['id'] == $_SESSION['project_id']) ? "selected" : "";
                    $data .= "<option value=\"" . $rowd['id'] . "\" " . $sel . ">
						" . retrieve_info_withSpecialCharactersNowordLimit($rowd['project_code']) . "
						 " . retrieve_info_withSpecialCharactersNowordLimit($rowd['title']) . "</option>";

                }


                break;
            case pagination::roleMgt(2);
                $query_string = "select * from tbl_project where program_id='" . $_SESSION['program_id'] . "' and display='Yes' order by title asc";

                $q = Execute($query_string) or die(http("QMGR-812"));
                while ($rowd = FetchRecords($q)) {
                    $sel = ($rowd['id'] == $_SESSION['project_id']) ? "selected" : "";
                    $data .= "<option value=\"" . $rowd['id'] . "\" " . $sel . ">
						" . retrieve_info_withSpecialCharactersNowordLimit($rowd['project_code']) . "
						 " . retrieve_info_withSpecialCharactersNowordLimit($rowd['title']) . "</option>";

                }


                break;
            case pagination::roleMgt(3);
                $query_string = "select * from tbl_project where programme_id LIKE '" . $_SESSION['program_id'] . "%' and display='Yes' order by title asc";
                $q = Execute($query_string) or die(http("QMGR-824"));
                while ($rowd = FetchRecords($q)) {
                    $sel = ($rowd['id'] == $_SESSION['project_id']) ? "selected" : "";
                    $data .= "<option value=\"" . $rowd['id'] . "\" " . $sel . ">
						" . retrieve_info_withSpecialCharactersNowordLimit($rowd['project_code']) . "
						 " . retrieve_info_withSpecialCharactersNowordLimit($rowd['title']) . "</option>";

                }
                break;

            default:

                $query_string = "select * from tbl_project 
	   					where display='Yes' 
						order by title asc";

                $q = Execute($query_string) or die(http("QMGR-841"));
                while ($rowd = FetchRecords($q)) {
                    $sel = ($rowd['id'] == $projectID) ? "selected" : "";
                    $data .= "<option value=\"" . $rowd['id'] . "\" " . $sel . ">
						" . retrieve_info_withSpecialCharactersNowordLimit($rowd['project_code']) . "
						 " . retrieve_info_withSpecialCharactersNowordLimit($rowd['title']) . "</option>";

                }


                break;

        }
        pagination::free_result($q);
        return $data;

    }


//------------------view training details-----------------------------------------------


    function edit_AnnualResults($id, $year, $country)
    {


        $y = "select  s.*,r.id,r.total,r.male,r.female,w.Target,w.curr_year,i.`indicator_id` , i.`prog_id` , i.`supergoal_id` , i.`goal_id` , i.`purpose_id` ,
			 i.`subcomponent_id` , i.`output_id` , i.`project_id` , i.`indicator_code` , i.`indicator_name` , i.`disaggregation` , 
			 i.`gender` , i.`indicator_type` , i.`level_ofindicator` ,r.comment,
			 i.`frequency_of_reporting` , i.`remarks` , i.`responsible` , i.`expected_output` , i.`unitofmeasure` ,
			 i.`updatedby` , i.`display` , i.`dateupdated`,r.country_id
			from tbl_sub_indicator s JOIN tbl_indicator i ON(s.indicator_id=i.indicator_id)  LEFT JOIN tbl_workplan w ON(w.indicator_id=i.indicator_id)
			LEFT JOIN tbl_organizationreporting r ON(r.indicator_id=i.indicator_id)
			where r.id='" . $id . "' 
			and r.year LIKE '" . $year . "%' &&
			w.curr_year LIKE '" . $year . "%' 
			&& r.country_id LIKE '" . $country . "%' 
			GROUP BY s.sub_indicatorId
			order by indicator_code asc";


        return $y;
    }


//QueryManager::ViewAnualTargetsProjects($program,$project)

    function EditAnnualTargets($level, $indicator_id, $year, $program)
    {
        $x = "select s.*,w.`workplan_id` , i.`indicator_id` , i.`prog_id` ,i.unitofmeasure, i.`project_id` ,
 i.indicator_code,w.country, i.indicator_name, i.indicator_type,
  i.level_ofindicator, s.baseline AS baseline2, i.baseyear, w.country,w.curr_year,
						max(if((w.`country`='14'),w.`Target`,0)) AS Year1, 
						max(if((w.`country`='8'),w.`Target`,0)) AS Year2,
						max(if((w.`country`='30'),w.`Target`,0)) AS Year3,
						max(if((w.`country`='33'),w.`Target`,0)) AS Year4,
						sum(w.`Target`) AS Target, w.`display`
					from tbl_sub_indicator s JOIN tbl_indicator i ON ( s.indicator_id = i.indicator_id )
					LEFT JOIN tbl_workplan w ON ( w.indicator_id = i.indicator_id )
					where i.level_ofindicator ='" . $level . "'
					and w.curr_year='" . $year . "'
					and  " . $program . " and 
					i.indicator_type LIKE '" . $_SESSION['indicator_type'] . "%'
					&& s.sub_indicatorId='" . $indicator_id . "' 
					GROUP BY s.`sub_indicatorId`,w.`indicator_id`,s.otherMeasures
					order by i.indicator_id,i.indicator_code asc";

        return $x;

    }
//w.curr_year,w.`prog_id`,w.`project_id`,
//view_AnnualResults($_SESSION['indicator_type'],$_SESSION['indicator_name'],$z,semi_annual,$_SESSION['fyear'],$_SESSION['country']);
    function view_AnnualResults($indicator_type, $indicator_name, $z, $semi_annual, $fyear, $country)
    {

        $y = "select s.*,r.`id`, r.`org_code`, r.`prog_id`, r.`subcomponent_id`, r.`project_id`, r.`country_id`,
 r.`year`, r.`reportingPeriod`, r.`semi_annual`, r.`indicator_id`, r.`male`, r.`female`, r.`total`, r.`date_reported`, r.`updatedby`,i.indicator_name,i.indicator_type,i.indicator_code,w.Target,w.curr_year,r.comment

from tbl_sub_indicator s JOIN tbl_indicator i ON(s.indicator_id=i.indicator_id)
LEFT JOIN tbl_organizationreporting r ON(s.sub_indicatorId = r.subIndicatorId )
LEFT JOIN tbl_workplan w ON(s.sub_indicatorId = w.subIndicatorID )
 where i.level_ofindicator LIKE '" . $indicator_type . "%'
 and i.indicator_name LIKE '" . $indicator_name . "%'
  and  " . $z . "
  and r.semi_annual LIKE '" . $semi_annual . "%'
  and r.year LIKE '" . $fyear . "%'
  and r.country_id LIKE '" . $country . "%'
  and w.curr_year LIKE '" . $fyear . "%'
  GROUP BY s.sub_indicatorId,r.year,i.prog_id,i.project_id,r.country_id
  order by i.indicator_id,i.indicator_code asc";

//i.indicator_id,r.`semi_annual`,r.reportingPeriod 
        return $y;
    }

//edit_AnnualWorkplan($row['indicator_id'],$_SESSION['Activeyear']);
    function edit_AnnualWorkplan($indicator_id, $year)
    {


        $y = "select  s.*, w.indicator_id,w.curr_year,w.Target
									from tbl_sub_indicator s JOIN tbl_indicator i ON(s.indicator_id=i.indicator_id) 
									LEFT JOIN tbl_workplan w ON(i.indicator_id=w.indicator_id)
			 						where i.indicator_id='" . $indicator_id . "' 
									and w.curr_year LIKE '" . $year . "%'
									GROUP BY s.sub_indicatorId
			 						order by indicator_code asc";


        return $y;
    }


    function EaappSubIndicators()
    {
        $level = array('Program', 'Project');


        switch ($_SESSION['role']) {

            //case $level[0]:
            case pagination::roleMgt(3):
                $query_string = "select i.*,s.* from tbl_sub_indicator s JOIN tbl_indicator i ON(i.indicator_id=s.indicator_id)
											where i.indicator_code LIKE '%" . $_SESSION['indicator_code'] . "%'
											GROUP BY s.indicator_id
											order by i.indicator_type,i.indicator_code,i.indicator_name asc";

                break;


            default:
                /* $query_string="select i.*,s.* from tbl_sub_indicator s join 
											tbl_indicator i on(i.indicator_id=s.indicator_id)
											where i.indicator_code like '%".$_SESSION['indicator_code']."%'
											group by s.sub_indicatorId	
											order by i.indicator_type,i.indicator_code,i.indicator_name asc"; */
                $query_string = "select `i`.*,`s`.* from `tbl_sub_indicator` AS `s` 
											JOIN  `tbl_indicator` AS `i` ON (`i`.`indicator_id`=`s`.`indicator_id`)
											where i.indicator_code LIKE '%" . $_SESSION['indicator_code'] . "%'
											GROUP BY `s`.`indicator_id`
											order by i.indicator_type,i.indicator_code,i.indicator_name asc";
                break;


        }
        return $query_string;


    }


    function ViewLOPTargets($indicator_type, $component_id, $program)
    {


        $x = "select w.`workplan_id` , i.subcomponent_id, i.output_id, i.indicator_code, i.indicator_id, i.indicator_name, i.`unitofmeasure` , 
w.Target AS TotalTarget, i.`display` ,  i.`indicator_type`,i.`baseline`,
 Year1,Year2,Year3,Year4,Year5,Year6,sum( w.`Target` ) AS LOPTarget, w.`display`
from tbl_indicator i
LEFT JOIN `view_consolidatedprogramworkplan` w ON ( w.indicator_id = i.indicator_id )
where i.indicator_type LIKE '" . $indicator_type . "%' 
i.level_ofindicator LIKE 'Program%'
 GROUP BY i.indicator_id,i.indicator_type,i.prog_id
order by i.indicator_code asc";


        /* and( i.output_id like '".$component_id."%' or 
 i.supergoal_id like '".$component_id."%' or 
  i.goal_id like '".$component_id."%' or
   i.purpose_id like '".$component_id."%')
     and i.prog_id like '".$program."%'
 */
        return $x;

    }


    function viewASARECAIndicatorsDetails($level1, $indicator_id)
    {
        $level = array('ASARECA', 'Program', 'Project');

        $query_string = "select  i.`disaggregation`, i.`gender`, 
					 i.`frequency_of_reporting`, i.`remarks`, i.`responsible`, i.`expected_output`, i.`unitofmeasure`,
					  i.`baseyear`, i.`baseline`, i.`updatedby`, i.`display`, i.`dateupdated`, ";


        switch ($level1) {

            case $level[0]:

                $query_string .= "i.indicator_id,i.prog_id,i.output_id, i.project_id,i.indicator_type, i.display,
i.level_ofindicator, i.indicator_code, i.indicator_name, i.prog_id from tbl_indicator i
			where i.level_ofindicator like '" . $level[0] . "%'
			and  i.indicator_id='" . $indicator_id . "' 
			order by i.level_ofindicator,i.indicator_type,i.indicator_code,i.indicator_name asc";

                break;

            case $level[1]:

                $query_string .= " i.indicator_id,i.prog_id,i.output_id,i.project_id,i.indicator_type,i.level_ofindicator,i.indicator_code,i.indicator_name
					,i.subcomponent_id,p.program_name,p.prog_id,i.display
						from tbl_indicator i 
							left join tbl_programme p on(p.prog_id=i.prog_id)
								where i.level_ofindicator like '" . $level[1] . "%'
								and  i.indicator_id='" . $indicator_id . "' 
											order by i.level_ofindicator,i.indicator_type,i.indicator_code,i.indicator_name asc";

                break;

            case $level[2]:

                $query_string .= " i.indicator_id,i.indicator_type,
						i.prog_id,i.output_id,i.project_id,i.level_ofindicator,i.indicator_code,i.indicator_name,s.subcomponent_code,
						s.subcomponent,s.subcomponent_id,p.program_name,p.prog_id,i.display,i.project_id
							from tbl_indicator i left join tbl_subcomponent s on(s.subcomponent_id=i.subcomponent_id) 
								left join tbl_programme p on(p.prog_id=i.prog_id)
									where i.level_ofindicator like '" . $level[2] . "%'
										and  i.indicator_id='" . $indicator_id . "' 
										order by i.level_ofindicator,i.indicator_type,i.indicator_code,i.indicator_name asc";

                break;

            default:
                $query_string .= " i.indicator_id, i.indicator_type,i.prog_id,i.project_id,i.output_id, i.display,
							i.level_ofindicator, i.indicator_code, i.indicator_name,
 							i.prog_id from tbl_indicator i
							where i.level_ofindicator like '" . $level[0] . "%'
							and  i.indicator_id='" . $indicator_id . "' 
							order by i.level_ofindicator,i.indicator_type,i.indicator_code,i.indicator_name asc";


        }
        return $query_string;


    }

    function viewSubcomponent()
    {
        switch ($_SESSION['role']) {
            case pagination::roleMgt(2):

                $select = "select s.subcomponent_id,p.prog_id,s.subcomponent_code,s.subcomponent,p.program_name 
								from tbl_subcomponent s 
								LEFT JOIN tbl_programme p ON(s.prog_id=p.prog_id) 
								where  s.subcomponent_id LIKE '" . $_SESSION['subcomponent'] . "%'
								&& p.prog_id LIKE '" . $_SESSION['program_id'] . "%' 
								GROUP BY s.subcomponent_code 
								order by s.subcomponent_code asc";

                break;
            case pagination::roleMgt(3):

                $select = "select s.subcomponent_id,p.prog_id,s.subcomponent_code,s.subcomponent,p.program_name 
								from tbl_subcomponent s 
								LEFT JOIN tbl_programme p ON(s.prog_id=p.prog_id) 
								where  s.subcomponent_id LIKE '" . $_SESSION['subcomponent'] . "%'
								&& p.prog_id LIKE '" . $_SESSION['program_name'] . "%' 
								GROUP BY s.subcomponent_code 
								order by s.subcomponent_code asc";

                break;
            case pagination::roleMgt(0):

                $select = "select s.subcomponent_id,p.prog_id,s.subcomponent_code,s.subcomponent,p.program_name 
								from tbl_subcomponent s 
								LEFT JOIN tbl_programme p ON(s.prog_id=p.prog_id) 
								where  s.subcomponent_id LIKE '" . $_SESSION['subcomponent'] . "%'
								&& p.prog_id LIKE '" . $_SESSION['program_name'] . "%' 
								GROUP BY s.subcomponent_code 
								order by s.subcomponent_code asc";

                break;
            default:


                $select = "select s.subcomponent_id,p.prog_id,s.subcomponent_code,s.subcomponent,p.program_name 
								from tbl_subcomponent s 
								LEFT JOIN tbl_programme p ON(s.prog_id=p.prog_id) 
								where  s.subcomponent_id LIKE '" . $_SESSION['subcomponent'] . "%'
								&& p.prog_id LIKE '" . $_SESSION['program_name'] . "%' 
								GROUP BY s.subcomponent_code 
								order by s.subcomponent_code asc";

                break;


        }


        return $select;
    }


    function viewProject()
    {
        $que = "select p.`id`, p.programme_id, p.`goal`, p.`purpose`,
											 p.`project_code`, p.`title`, p.`background`, p.`projectFundingtype`, p.`countries`, 
											 p.`institutions`, p.`leadInstitution`, p.`duration`, p.`startDate`, p.`EndDate`,
											  p.`NewendingDate`, p.`description`, p.`subcomponent_id`, p.`status`, p.`sourceof_funding`,
											   p.`amount_available`, p.`shortfall`, p.`updatedby`,pr.program_name,o.orgName,s.subcomponent,
											   p.display,pr.program_name from `tbl_project` p 
									LEFT JOIN tbl_programme pr ON(p.`programme_id`=pr.`prog_id`)
									LEFT JOIN tbl_organization o ON(o.`org_code`=p.`leadInstitution`) 
									LEFT JOIN tbl_subcomponent s ON(s.`subcomponent_id`=p.`subcomponent_id`) ";


        switch ($_SESSION['role']) {

            case pagination::roleMgt(2):

                //	and   p.`leadInstitution` like '".$_SESSION['organization']."%' 										 

                $que .= " where  pr.prog_id like '" . $_SESSION['program'] . "%' 
											and p.title like '%" . $_SESSION['project'] . "%'
											 and  p.subprogram_id like '" . $_SESSION['subcomponent'] . "%'
											and   p.`countries` like '%" . $_SESSION['country'] . "%' 
											and   p.`status` like '" . $_SESSION['status'] . "%' 
											and p.display like 'Yes%'
											order by p.title asc";


                break;
            default:
                $que .= " where
										 pr.prog_id like '" . $_SESSION['program'] . "%' and 
										  p.title like '%" . $_SESSION['project'] . "%'
										 and  p.subprogram_id like '" . $_SESSION['subcomponent'] . "%'
													and   p.`status` like '" . $_SESSION['status'] . "%' 
													and   p.`countries` like '%" . $_SESSION['country'] . "%' 
													
													and p.display like 'Yes%'
													order by p.title asc";


                //and   p.`leadInstitution` like '".$_SESSION['organization']."%' 
                break;


        }

        return $que;
    }


//------------Subcomponent Filter-----------------
    function SubcomponentFilter($programID, $subprogram = "", $sel = "", $data = "")
    {


        //$query_string=pagination::viewResults($tableName='tbl_subcomponent', $whereClause='prog_id', $clauseValue=$programID,$groupby='subcomponent_code',$orderby='subcomponent_code');


        $q = Execute($query_string = "select * from tbl_subcomponent where prog_id LIKE '" . $programID . "%' order by subcomponent_code asc") or die(http(__line__));
        while ($rowd = FetchRecords($q)) {
            $sel = ($rowd['subcomponent_id'] == $subprogram) ? "selected" : "";
            $data .= "<option value=\"" . $rowd['subcomponent_id'] . "\" " . $sel . ">
						" . retrieve_info_withSpecialCharactersNowordLimit($rowd['subcomponent_code']) . "
						 " . retrieve_info_withSpecialCharactersNowordLimit($rowd['subcomponent']) . "</option>";

        }

        pagination::free_result($q);
        return $data;

    }

    function viewEaappWorkplan($level, $year, $projectId, $indicator_type, $x = "")
    {

        $x = "select s.*,s.baseline AS baseline2,w.`workplan_id` , i.`indicator_id` , i.`prog_id` ,i.unitofmeasure, i.`project_id` , i.indicator_code,w.country, i.indicator_name, i.indicator_type, i.level_ofindicator, w.country,w.curr_year,
					max(if((w.`country`='14'),w.`Target`,0)) AS Year1, 
					max(if((w.`country`='8'),w.`Target`,0)) AS Year2,
					max(if((w.`country`='30'),w.`Target`,0)) AS Year3,
					max(if((w.`country`='33'),w.`Target`,0)) AS Year4,
					sum( w.`Target` ) AS Target, w.`display`
					from tbl_sub_indicator s JOIN tbl_indicator i ON(s.indicator_id=i.indicator_id)
					LEFT JOIN tbl_workplan w ON ( s.sub_indicatorId = w.subIndicatorID )
					where i.level_ofindicator ='" . $level . "' and w.curr_year='" . $year . "'
					and  " . $projectId . " and 
					i.indicator_type LIKE '" . $indicator_type . "%' 
					GROUP BY w.curr_year,w.indicator_id,w.project_id,w.prog_id,s.sub_indicatorId
					order by i.indicator_id,i.indicator_code asc";
//w.country,w.curr_year,w.indicator_id,w.project_id,w.prog_id

        return $x;

    }


    function ReportLog($opening_year, $closure_year, $functionOne, $functionTwo, $data = "")
    {


        for ($j = intval($opening_year), $k = 0, $l = 1; $j < intval($closure_year), $k < 5, $l < 6; $j++, $k++, $l++) {
            $fyear = currFinancialYear($opening_year, $closure_year, $k);
            //$functionOne = getRecordIdQuantitative('Project','".$fyear."','".$row['prog_id']."','".$rowq['id']."','".$div."')
            //$functionTwo = new_annualTargets('Project','".$row['prog_id']."','".$rowq['subprogram_id']."','".$rowP['id']."','','','".$fyear."')
            $data .= "<td align='center'>";


            if (($rowq['year' . $l] <> 0)) {

                $data .= "<font color='green' size='5' title='View Targets for " . $fyear . "'  onclick=\"xajax_" . $functionOne . "\">&#x2714;</font>";
            } else {
                $data .= "<font color='Red' size='5' title='Set Targets for " . $fyear . "'
onclick=\"xajax_" . $functionTwo . "\">&#x2718;</font>";
            }


            $data .= "</td>";


        }


        return $data;

    }

    //EAAPPProjectReportLogQuery($opening_year,$closure_year,$prog_id1,$project_id1)
    function EAAPPProjectReportLogQuery($opening_year, $closure_year, $prog_id1, $project_id1)
    {
        $query_string = "select p.`id`,q.`prog_id`,p.programme_id,p.id as project_id,p.subprogram_id,p.title,p.project_code,
								sum(if((q.curr_year='" . currFinancialYear($opening_year, $closure_year, 0) . "'),p.`id`,'')) AS year1,
								sum(if((q.curr_year='" . currFinancialYear($opening_year, $closure_year, 1) . "'),p.`id`,'')) AS year2,
								sum(if((q.curr_year='" . currFinancialYear($opening_year, $closure_year, 2) . "'),p.`id`,'')) AS year3,
								sum(if((q.curr_year='" . currFinancialYear($opening_year, $closure_year, 3) . "'),p.`id`,'')) AS year4,
								sum(if((q.curr_year='" . currFinancialYear($opening_year, $closure_year, 4) . "'),p.`id`,'')) AS year5,
								sum(if((q.curr_year='" . currFinancialYear($opening_year, $closure_year, 5) . "'),p.`id`,'')) AS year6,
								sum(if((q.curr_year='" . currFinancialYear($opening_year, $closure_year, 6) . "'),p.`id`,'')) AS year7
 								from tbl_project p left JOIN tbl_workplan q ON (p.id=q.project_id) 
								where p.programme_id ='$prog_id1' 
						 		and p.id='$project_id1'
								group by p.project_code
								order by p.project_code,
								p.title Asc";
        return $query_string;
    }


    function viewIndicator($level, $type, $prog_id, $project_id, $indicatorId)
    {
        $query_string = "select * from tbl_indicator 
							where prog_id LIKE '" . $prog_id . "%'
							and project_id LIKE '" . $project_id . "%'
							and level_ofindicator LIKE '" . $level . "%' 
						and indicator_type LIKE '" . $type . "%' 
						order by indicator_code,indicator_name asc";

        /* */
        $query = @Execute($query_string) or die(http("4776"));
        while ($row = @FetchRecords($query)) {
            $selected = ($indicatorId == $row['indicator_id']) ? "selectED" : "";
            $data .= "<option value=\"" . $row['indicator_id'] . "\" " . $selected . " > " . $row['indicator_name'] . "</option>";
        }
        return $data;
    }


    function EaappNewEntry($program, $project)
    {


        if ($_SESSION['target_type'] == 'Project') {


            $y = "select i.*,s.*,count(s.otherMeasures) AS numRows from tbl_sub_indicator s JOIN tbl_indicator i ON(i.indicator_id=s.indicator_id)
											where i.level_ofindicator LIKE '" . $_SESSION['target_type'] . "%'
											and i.display LIKE 'Yes%' and 
											i.prog_id LIKE '" . $program . "'
											and i.subcomponent_id LIKE '" . $_SESSION['subprogram'] . "%'
											and  i.project_id LIKE '%" . $project . "%'
											GROUP BY i.indicator_id,s.otherMeasures
											order by i.level_ofindicator,i.indicator_type,i.indicator_code,i.indicator_name asc";
        } elseif ($_SESSION['target_type'] == 'Program') {
            $y = "select * from tbl_indicator where level_ofindicator='" . $_SESSION['target_type'] . "' and prog_id='" . $program . "'  order by indicator_id,indicator_code,indicator_name asc";
            // $query2=Execute($y)or die(http("WP-791"));
            //$obj->alert($y);
        } else {
            if ($_SESSION['TypeofIndicator'] == 'Output Indicator') {
                $y = "select * from tbl_indicator where level_ofindicator='" . $_SESSION['target_type'] . "' and  indicator_type LIKE '" . $_SESSION['TypeofIndicator'] . "%' and output_id LIKE '" . $_SESSION['output_id'] . "%' order by indicator_id,indicator_code,indicator_name asc";

            } else {

                $y = "select * from tbl_indicator where level_ofindicator='" . $_SESSION['target_type'] . "' and  indicator_type LIKE '" . $_SESSION['TypeofIndicator'] . "%' order by indicator_id,indicator_code,indicator_name asc";

            }
        }


        return $y;
    }


    function EaappNewAnnualResults($level, $program, $project, $gender)
    {
        $y = "select  i.`indicator_id` , i.`prog_id` , i.`supergoal_id` , i.`goal_id` ,
			 i.`purpose_id` , i.`subcomponent_id` , i.`output_id` , i.`project_id` ,
			  i.`indicator_code` , i.`indicator_name` , i.`disaggregation` , i.`gender` ,
			   i.`indicator_type` , i.`level_ofindicator` , w.curr_year,i.`frequency_of_reporting` , 
			   i.`remarks` , i.`responsible` , i.`expected_output` ,  i.`updatedby` ,
			    i.`display` , i.`dateupdated`,w.curr_year,w.Target,s.*
				from tbl_sub_indicator s LEFT JOIN  tbl_indicator i ON(i.indicator_id=s.indicator_id) 
				LEFT JOIN tbl_workplan w ON( s.sub_indicatorId = w.subIndicatorID )
			 where i.level_ofindicator LIKE '" . $level . "%' 
			 and i.indicator_type LIKE '" . $_SESSION['indicator_type'] . "%' and 
			  " . QueryManager::ViewAnualTargetsProjects($program, $project) . " 
			 && w.curr_year LIKE '" . $_SESSION['fyear'] . "%'
			 and i.disaggregation LIKE '" . $gender . "%' 
			 GROUP BY w.curr_year,i.`indicator_id`,s.sub_indicatorId
			 order by i.`indicator_id`,indicator_code asc";

        return $y;
    }


    function save_SubIndicator($indicator_id, $unitofmeasure, $baseYear, $baseline)
    {


        $sql = "INSERT INTO tbl_sub_indicator(indicator_id,unitofmeasure,baselineYear,baseline,updatedby,display)
			 VALUES('" . $indicator_id . "',
			 '" . mysql_real_escape_string($unitofmeasure) . "',
			 '" . mysql_real_escape_string($baseYear) . "',
			 '" . mysql_real_escape_string($baseline) . "',
			 '" . $baseline . "',
			 '" . $_SESSION['username'] . "',
			 'Yes')
			 ON DUPLICATE KEY UPDATE 
				 indicator_id='" . $indicator_id . "',
				 unitofmeasure='" . $unitofmeasure . "',
				 baselineYear='" . $baseYear . "',
				 baseline='" . $baseline . "',
				 updatedby='" . $_SESSION['username'] . "',
				 display='Yes' ";
        $query = @Execute($sql) or die(http(__line__));
        return $query;
    }


    function logUserAction($action, $description, $user, $oldValue, $newValue, $table, $id)
    {

        $stmnt = "INSERT INTO `tbl_usertrack`(`username`, `action`, `description`,
      `valueBeforeAction`, `valueAfterAction`, `affectedTable`, `affectedTableId`)
        VALUES ('" . $user . "','" . $action . "','" . $description . "','" . $oldValue . "','" . $newValue . "','" . $table . "','" . $id . "')";

        $query = @Execute($stmnt) or die(http(__line__));

        return $query;
    }
	
	function getTraderNumFarmers($traderId){
		
		$stmnt = "select count(distinct(tbl_farmersId)) as `numFarmers` 
		from `tbl_farmers` where tbl_tradersId='".$traderId."'";
		
		$query = @Execute($stmnt) or die(http(__line__));	
		$row = @FetchRecords($query);
		$numFarmers = $row['numFarmers']; 
		
		return $numFarmers;
	}

    
	function getTradeVolPurchasedByYear($traderId,$year){
		
		$stmnt = "select sum(if(`year` = '".$year."',(`volMaizePurchased`+`volCoffeePurchased`+`volBeansPurchased`), 0) ) as `volPurchased` 
		from `tbl_form4_traders` 
		where `tbl_traderId`='".$traderId."' 
		group by `tbl_traderId`";
		
			
		
		return $stmnt;
	}
	
	function getTraderLoan($traderId,$traderName){
		
		$stmnt = "select sum(if(`b`.`nameMSME` like '".$traderName."%',(`b`.`amountLoanAccessed`), 0) ) as `loanAmount` 
		from `tbl_bankloans` as `b` join `tbl_traders` as `t` on (`t`.`traderName` = `b`.`nameMSME`)
		where `t`.`tbl_tradersId`='".$traderId."' 
		group by `t`.`tbl_tradersId`
		";
		
		$query = @Execute($stmnt) or die(http(__line__));	
		$row = @FetchRecords($query);
		$amountLoan = $row['loanAmount']; 
		
		return $amountLoan;
	}
	
	function form1RawDataToExcel($reportingYear,$reportingPeriod){
		//$append_dateRange=((($fromDate)!='') and (($toDate)!=''))?" and t.trainingDate between ('".$fromDate."') and ('".$toDate."')":"";
		$reportingYearToPeriod='';
		$reportingPeriodToDateRange='';
		$reportingYearToPeriodCleaned='';
        switch($reportingYear){
            case'CPMA Year One':
            $reportingYearToPeriod="and `t`.`reportingPeriod` in ('Oct - Mar','Apr - Sep') 
            and `t`.`reportingMonth` between ('2012-10-01') and ('2013-09-30')
            and `t`.`year` in (2012,2013)";
            break;
            
            case'CPMA Year Two':
            $reportingYearToPeriod="and `t`.`reportingPeriod` in ('Oct - Mar','Apr - Sep') 
            and `t`.`reportingMonth` between ('2013-10-01') and ('2014-09-30')
            and `t`.`year` in (2013,2014)";
            break;
            
            case'CPMA Year Three':
            $reportingYearToPeriod="and `t`.`reportingPeriod` in ('Oct - Mar','Apr - Sep') 
            and `t`.`reportingMonth` between ('2014-10-01') and ('2015-09-30')
            and `t`.`year` in (2014,2015)";
            break;
            
            case'CPMA Year Four':
            $reportingYearToPeriod="and `t`.`reportingPeriod` in ('Oct - Mar','Apr - Sep') 
            and `t`.`reportingMonth` between ('2015-10-01') and ('2016-09-30')
            and `t`.`year` in (2015,2016)";
            break;
            
            case'CPMA Year Five':
            $reportingYearToPeriod="and `t`.`reportingPeriod` in ('Oct - Mar','Apr - Sep') 
            and `t`.`reportingMonth` between ('2016-10-01') and ('2017-09-30')
            and `t`.`year` in (2016,2017)";
            break;
            
            case'CPMA Year Six':
            $reportingYearToPeriod="and `t`.`reportingPeriod` in ('Oct - Mar','Apr - Sep') 
            and `t`.`reportingMonth` between ('2017-10-01') and ('2018-09-30')
            and `t`.`year` in (2017,2018)";
            break;
            
            default:
            break;
        }
        
        switch($reportingPeriod){
            case'Oct 2012 - Mar 2013':
            $reportingYearToPeriodCleaned="
            and `t`.`reportingPeriod` = 'Oct - Mar' 
            and `t`.`reportingMonth` between ('2012-10-01') and ('2013-03-31')
            and `t`.`year` in (2012,2013)
            ";
            break;
            
            case'Apr 2013 - Sep 2013':
            $reportingYearToPeriodCleaned="
            and `t`.`reportingPeriod` = 'Apr - Sep' 
            and `t`.`reportingMonth` between ('2013-04-01') and ('2013-09-30')
            and `t`.`year` in (2013)
            ";
            break;
            
            case'Oct 2013 - Mar 2014':
            $reportingYearToPeriodCleaned="
            and `t`.`reportingPeriod` = 'Oct - Mar' 
            and `t`.`reportingMonth` between ('2013-10-01') and ('2014-03-31')
            and `t`.`year` in (2013,2014)
            ";
            break;
            
            case'Apr 2014 - Sep 2014':
            $reportingYearToPeriodCleaned="
            and `t`.`reportingPeriod` = 'Apr - Sep' 
            and `t`.`reportingMonth` between ('2014-04-01') and ('2014-09-30')
            and `t`.`year` in (2014)
            ";
            break;
            
            case'Oct 2014 - Mar 2015':
            $reportingYearToPeriodCleaned="
            and `t`.`reportingPeriod` = 'Oct - Mar' 
            and `t`.`reportingMonth` between ('2014-10-01') and ('2015-03-31')
            and `t`.`year` in (2014,2015)
            ";
            break;
            
            case'Apr 2015 - Sep 2015':
            $reportingYearToPeriodCleaned="
            and `t`.`reportingPeriod` = 'Apr - Sep' 
            and `t`.`reportingMonth` between ('2015-04-01') and ('2015-09-30')
            and `t`.`year` in (2015)
            ";
            break;
            
            case'Oct 2015 - Mar 2016':
            $reportingYearToPeriodCleaned="
            and `t`.`reportingPeriod` = 'Oct - Mar' 
            and `t`.`reportingMonth` between ('2015-10-01') and ('2016-03-31')
            and `t`.`year` in (2015,2016)
            ";
            break;
            
            case'Apr 2016 - Sep 2016':
            $reportingYearToPeriodCleaned="
            and `t`.`reportingPeriod` = 'Apr - Sep' 
            and `t`.`reportingMonth` between ('2016-04-01') and ('2016-09-30')
            and `t`.`year` in (2016)
            ";
            break;
            
            case'Oct 2016 - Mar 2017':
            $reportingYearToPeriodCleaned="
            and `t`.`reportingPeriod` = 'Oct - Mar' 
            and `t`.`reportingMonth` between ('2016-10-01') and ('2017-03-31')
            and `t`.`year` in (2016,2017)
            ";
            break;
            
            case'Apr 2017 - Sep 2017':
            $reportingYearToPeriodCleaned="
            and `t`.`reportingPeriod` = 'Apr - Sep' 
            and `t`.`reportingMonth` between ('2017-04-01') and ('2017-09-30')
            and `t`.`year` in (2017)
            ";
            break;
            
            case'Oct 2017 - Mar 2018':
            $reportingYearToPeriodCleaned="
            and `t`.`reportingPeriod` = 'Oct - Mar' 
            and `t`.`reportingMonth` between ('2017-10-01') and ('2018-03-31')
            and `t`.`year` in (2017,2018)
            ";
            break;
            
            case'Apr 2018 - Sep 2018':
            $reportingYearToPeriodCleaned="
            and `t`.`reportingPeriod` = 'Apr - Sep' 
            and `t`.`reportingMonth` between ('2018-04-01') and ('2018-09-30')
            and `t`.`year` in (2018)
            ";
            break;
            
            
            break;
            
            default:
            break;
        }

        
         $reporting_period=(!empty($reportingYear))?'':$reportingPeriod;
         $reporting_year=(!empty($reportingPeriod))?'':$reportingYear;
         $reporting_period=(!empty($reportingPeriod))?" ".$reportingYearToPeriodCleaned." ":"";
         $reporting_year=(!empty($reportingYear))?" ".$reportingYearToPeriod." ":"";

			$sql = "select 
			1 as `#`,
			z.`zoneName` ,
			d.`districtName` ,
			s.`subcountyName`,
			p.ParishName,
			t.`trainingVillage`,
			t.`trainingDate`,
			SUBSTRING(m.`name`, 3)as `main Value Chain`,
			SUBSTRING(f.`focusName`, 3) as `training Focus`,
			SUBSTRING(a.`audienceName`, 3) as `Target Audience`, 
			t.`pat_recommendations` as `Participant Recommendations`,
			`pt`.`name` as `Participant Name`, 
			`pt`.`age` as `Participant Age`, 
			`pt`.`sex` as `Participant Gender`,  
			`pt`.`status` as `Participant Status`,
			`pt`.`village` as `Participant Village`, 
			l.`codeName` as `Participant Type of Individual`, 
			`pt`.`telephone` as `Participant Tel`
			from 
			`tbl_training` t,
			`tbl_participants` as `pt`,
			`tbl_zone` z,
			`tbl_district` d,
			`tbl_subcounty` s,
			`tbl_parish` p,
			tbl_mainvaluechain m,
			tbl_trainingfocus f,
			tbl_targetaudience a,
			tbl_lookup l
			where 1=1
			and `t`.`tbl_trainingId` = `pt`.`trainingId`
			and d.`zone` = z.`zoneCode`
			and d.`districtCode` = s.`districtCode`
			and t.`district` = d.`districtCode`
			and t.`subcounty` = s.`subcountyCode`
			and t.parish = p.`ParishCode`
			and m.tbl_chainId = t.`mainValueChain`
			and f.tbl_focusId = t.trainingFocus
			and a.tbl_audienceId = t.`targetAudience`
			and l.code = `pt`.`typeOfIndividual`
			and l.classCode = 25
			and pt.display='Yes'
			order by t.trainingDate DESC limit 0,50";
			
		return $sql;


	}


        function form1RawDataToExcelAll($reportingYear,$reportingPeriod){
        //$append_dateRange=((($fromDate)!='') and (($toDate)!=''))?" and t.trainingDate between ('".$fromDate."') and ('".$toDate."')":"";
        $reportingYearToPeriod='';
        $reportingPeriodToDateRange='';
        $reportingYearToPeriodCleaned='';
        switch($reportingYear){
            case'CPMA Year One':
            $reportingYearToPeriod="and `t`.`reportingPeriod` in ('Oct - Mar','Apr - Sep') 
            and `t`.`reportingMonth` between ('2012-10-01') and ('2013-09-30')
            and `t`.`year` in (2012,2013)";
            break;
            
            case'CPMA Year Two':
            $reportingYearToPeriod="and `t`.`reportingPeriod` in ('Oct - Mar','Apr - Sep') 
            and `t`.`reportingMonth` between ('2013-10-01') and ('2014-09-30')
            and `t`.`year` in (2013,2014)";
            break;
            
            case'CPMA Year Three':
            $reportingYearToPeriod="and `t`.`reportingPeriod` in ('Oct - Mar','Apr - Sep') 
            and `t`.`reportingMonth` between ('2014-10-01') and ('2015-09-30')
            and `t`.`year` in (2014,2015)";
            break;
            
            case'CPMA Year Four':
            $reportingYearToPeriod="and `t`.`reportingPeriod` in ('Oct - Mar','Apr - Sep') 
            and `t`.`reportingMonth` between ('2015-10-01') and ('2016-09-30')
            and `t`.`year` in (2015,2016)";
            break;
            
            case'CPMA Year Five':
            $reportingYearToPeriod="and `t`.`reportingPeriod` in ('Oct - Mar','Apr - Sep') 
            and `t`.`reportingMonth` between ('2016-10-01') and ('2017-09-30')
            and `t`.`year` in (2016,2017)";
            break;
            
            case'CPMA Year Six':
            $reportingYearToPeriod="and `t`.`reportingPeriod` in ('Oct - Mar','Apr - Sep') 
            and `t`.`reportingMonth` between ('2017-10-01') and ('2018-09-30')
            and `t`.`year` in (2017,2018)";
            break;
            
            default:
            break;
        }
        
        switch($reportingPeriod){
            case'Oct 2012 - Mar 2013':
            $reportingYearToPeriodCleaned="
            and `t`.`reportingPeriod` = 'Oct - Mar' 
            and `t`.`reportingMonth` between ('2012-10-01') and ('2013-03-31')
            and `t`.`year` in (2012,2013)
            ";
            break;
            
            case'Apr 2013 - Sep 2013':
            $reportingYearToPeriodCleaned="
            and `t`.`reportingPeriod` = 'Apr - Sep' 
            and `t`.`reportingMonth` between ('2013-04-01') and ('2013-09-30')
            and `t`.`year` in (2013)
            ";
            break;
            
            case'Oct 2013 - Mar 2014':
            $reportingYearToPeriodCleaned="
            and `t`.`reportingPeriod` = 'Oct - Mar' 
            and `t`.`reportingMonth` between ('2013-10-01') and ('2014-03-31')
            and `t`.`year` in (2013,2014)
            ";
            break;
            
            case'Apr 2014 - Sep 2014':
            $reportingYearToPeriodCleaned="
            and `t`.`reportingPeriod` = 'Apr - Sep' 
            and `t`.`reportingMonth` between ('2014-04-01') and ('2014-09-30')
            and `t`.`year` in (2014)
            ";
            break;
            
            case'Oct 2014 - Mar 2015':
            $reportingYearToPeriodCleaned="
            and `t`.`reportingPeriod` = 'Oct - Mar' 
            and `t`.`reportingMonth` between ('2014-10-01') and ('2015-03-31')
            and `t`.`year` in (2014,2015)
            ";
            break;
            
            case'Apr 2015 - Sep 2015':
            $reportingYearToPeriodCleaned="
            and `t`.`reportingPeriod` = 'Apr - Sep' 
            and `t`.`reportingMonth` between ('2015-04-01') and ('2015-09-30')
            and `t`.`year` in (2015)
            ";
            break;
            
            case'Oct 2015 - Mar 2016':
            $reportingYearToPeriodCleaned="
            and `t`.`reportingPeriod` = 'Oct - Mar' 
            and `t`.`reportingMonth` between ('2015-10-01') and ('2016-03-31')
            and `t`.`year` in (2015,2016)
            ";
            break;
            
            case'Apr 2016 - Sep 2016':
            $reportingYearToPeriodCleaned="
            and `t`.`reportingPeriod` = 'Apr - Sep' 
            and `t`.`reportingMonth` between ('2016-04-01') and ('2016-09-30')
            and `t`.`year` in (2016)
            ";
            break;
            
            case'Oct 2016 - Mar 2017':
            $reportingYearToPeriodCleaned="
            and `t`.`reportingPeriod` = 'Oct - Mar' 
            and `t`.`reportingMonth` between ('2016-10-01') and ('2017-03-31')
            and `t`.`year` in (2016,2017)
            ";
            break;
            
            case'Apr 2017 - Sep 2017':
            $reportingYearToPeriodCleaned="
            and `t`.`reportingPeriod` = 'Apr - Sep' 
            and `t`.`reportingMonth` between ('2017-04-01') and ('2017-09-30')
            and `t`.`year` in (2017)
            ";
            break;
            
            case'Oct 2017 - Mar 2018':
            $reportingYearToPeriodCleaned="
            and `t`.`reportingPeriod` = 'Oct - Mar' 
            and `t`.`reportingMonth` between ('2017-10-01') and ('2018-03-31')
            and `t`.`year` in (2017,2018)
            ";
            break;
            
            case'Apr 2018 - Sep 2018':
            $reportingYearToPeriodCleaned="
            and `t`.`reportingPeriod` = 'Apr - Sep' 
            and `t`.`reportingMonth` between ('2018-04-01') and ('2018-09-30')
            and `t`.`year` in (2018)
            ";
            break;
            
            
            break;
            
            default:
            break;
        }

        
         $reporting_period=(!empty($reportingYear))?'':$reportingPeriod;
         $reporting_year=(!empty($reportingPeriod))?'':$reportingYear;
         $reporting_period=(!empty($reportingPeriod))?" ".$reportingYearToPeriodCleaned." ":"";
         $reporting_year=(!empty($reportingYear))?" ".$reportingYearToPeriod." ":"";

            $sql = "select 
            1 as `#`,
            z.`zoneName` ,
            d.`districtName` ,
            s.`subcountyName`,
            p.ParishName,
            t.`trainingVillage`,
            t.`trainingDate`,
            SUBSTRING(m.`name`, 3)as `main Value Chain`,
            SUBSTRING(f.`focusName`, 3) as `training Focus`,
            SUBSTRING(a.`audienceName`, 3) as `Target Audience`, 
            t.`pat_recommendations` as `Participant Recommendations`,
            `pt`.`name` as `Participant Name`, 
            `pt`.`age` as `Participant Age`, 
            `pt`.`sex` as `Participant Gender`,  
            `pt`.`status` as `Participant Status`,
            `pt`.`village` as `Participant Village`, 
            l.`codeName` as `Participant Type of Individual`, 
            `pt`.`telephone` as `Participant Tel`
            from 
            `tbl_training` t,
            `tbl_participants` as `pt`,
            `tbl_zone` z,
            `tbl_district` d,
            `tbl_subcounty` s,
            `tbl_parish` p,
            tbl_mainvaluechain m,
            tbl_trainingfocus f,
            tbl_targetaudience a,
            tbl_lookup l
            where 1=1
            and `t`.`tbl_trainingId` = `pt`.`trainingId`
            and d.`zone` = z.`zoneCode`
            and d.`districtCode` = s.`districtCode`
            and t.`district` = d.`districtCode`
            and t.`subcounty` = s.`subcountyCode`
            and t.parish = p.`ParishCode`
            and m.tbl_chainId = t.`mainValueChain`
            and f.tbl_focusId = t.trainingFocus
            and a.tbl_audienceId = t.`targetAudience`
            and l.code = `pt`.`typeOfIndividual`
            and l.classCode = 25
            and pt.display='Yes'
            order by t.trainingDate DESC";
            
        return $sql;


    }
	
	function form2EntTechRawDataToExcel($reportingYear,$reportingPeriod){
		//$append_dateRange=((($fromDate)!='') and (($toDate)!=''))?" and t.trainingDate between ('".$fromDate."') and ('".$toDate."')":"";
		$reportingYearToPeriod='';
		$reportingPeriodToDateRange='';
        $reportingYearToPeriodCleaned='';
        switch($reportingYear){
            case'CPMA Year One':
            $reportingYearToPeriod="and `t`.`reportingPeriod` in ('Oct - Mar','Apr - Sep') 
            and `t`.`reportingMonth` between ('2012-10-01') and ('2013-09-30')
            and `t`.`year` in (2012,2013)";
            break;
            
            case'CPMA Year Two':
            $reportingYearToPeriod="and `t`.`reportingPeriod` in ('Oct - Mar','Apr - Sep') 
            and `t`.`reportingMonth` between ('2013-10-01') and ('2014-09-30')
            and `t`.`year` in (2013,2014)";
            break;
            
            case'CPMA Year Three':
            $reportingYearToPeriod="and `t`.`reportingPeriod` in ('Oct - Mar','Apr - Sep') 
            and `t`.`reportingMonth` between ('2014-10-01') and ('2015-09-30')
            and `t`.`year` in (2014,2015)";
            break;
            
            case'CPMA Year Four':
            $reportingYearToPeriod="and `t`.`reportingPeriod` in ('Oct - Mar','Apr - Sep') 
            and `t`.`reportingMonth` between ('2015-10-01') and ('2016-09-30')
            and `t`.`year` in (2015,2016)";
            break;
            
            case'CPMA Year Five':
            $reportingYearToPeriod="and `t`.`reportingPeriod` in ('Oct - Mar','Apr - Sep') 
            and `t`.`reportingMonth` between ('2016-10-01') and ('2017-09-30')
            and `t`.`year` in (2016,2017)";
            break;
            
            case'CPMA Year Six':
            $reportingYearToPeriod="and `t`.`reportingPeriod` in ('Oct - Mar','Apr - Sep') 
            and `t`.`reportingMonth` between ('2017-10-01') and ('2018-09-30')
            and `t`.`year` in (2017,2018)";
            break;
            
            default:
            break;
        }
        
        switch($reportingPeriod){
            case'Oct 2012 - Mar 2013':
            $reportingYearToPeriodCleaned="
            and `t`.`reportingPeriod` = 'Oct - Mar' 
            and `t`.`reportingMonth` between ('2012-10-01') and ('2013-03-31')
            and `t`.`year` in (2012,2013)
            ";
            break;
            
            case'Apr 2013 - Sep 2013':
            $reportingYearToPeriodCleaned="
            and `t`.`reportingPeriod` = 'Apr - Sep' 
            and `t`.`reportingMonth` between ('2013-04-01') and ('2013-09-30')
            and `t`.`year` in (2013)
            ";
            break;
            
            case'Oct 2013 - Mar 2014':
            $reportingYearToPeriodCleaned="
            and `t`.`reportingPeriod` = 'Oct - Mar' 
            and `t`.`reportingMonth` between ('2013-10-01') and ('2014-03-31')
            and `t`.`year` in (2013,2014)
            ";
            break;
            
            case'Apr 2014 - Sep 2014':
            $reportingYearToPeriodCleaned="
            and `t`.`reportingPeriod` = 'Apr - Sep' 
            and `t`.`reportingMonth` between ('2014-04-01') and ('2014-09-30')
            and `t`.`year` in (2014)
            ";
            break;
            
            case'Oct 2014 - Mar 2015':
            $reportingYearToPeriodCleaned="
            and `t`.`reportingPeriod` = 'Oct - Mar' 
            and `t`.`reportingMonth` between ('2014-10-01') and ('2015-03-31')
            and `t`.`year` in (2014,2015)
            ";
            break;
            
            case'Apr 2015 - Sep 2015':
            $reportingYearToPeriodCleaned="
            and `t`.`reportingPeriod` = 'Apr - Sep' 
            and `t`.`reportingMonth` between ('2015-04-01') and ('2015-09-30')
            and `t`.`year` in (2015)
            ";
            break;
            
            case'Oct 2015 - Mar 2016':
            $reportingYearToPeriodCleaned="
            and `t`.`reportingPeriod` = 'Oct - Mar' 
            and `t`.`reportingMonth` between ('2015-10-01') and ('2016-03-31')
            and `t`.`year` in (2015,2016)
            ";
            break;
            
            case'Apr 2016 - Sep 2016':
            $reportingYearToPeriodCleaned="
            and `t`.`reportingPeriod` = 'Apr - Sep' 
            and `t`.`reportingMonth` between ('2016-04-01') and ('2016-09-30')
            and `t`.`year` in (2016)
            ";
            break;
            
            case'Oct 2016 - Mar 2017':
            $reportingYearToPeriodCleaned="
            and `t`.`reportingPeriod` = 'Oct - Mar' 
            and `t`.`reportingMonth` between ('2016-10-01') and ('2017-03-31')
            and `t`.`year` in (2016,2017)
            ";
            break;
            
            case'Apr 2017 - Sep 2017':
            $reportingYearToPeriodCleaned="
            and `t`.`reportingPeriod` = 'Apr - Sep' 
            and `t`.`reportingMonth` between ('2017-04-01') and ('2017-09-30')
            and `t`.`year` in (2017)
            ";
            break;
            
            case'Oct 2017 - Mar 2018':
            $reportingYearToPeriodCleaned="
            and `t`.`reportingPeriod` = 'Oct - Mar' 
            and `t`.`reportingMonth` between ('2017-10-01') and ('2018-03-31')
            and `t`.`year` in (2017,2018)
            ";
            break;
            
            case'Apr 2018 - Sep 2018':
            $reportingYearToPeriodCleaned="
            and `t`.`reportingPeriod` = 'Apr - Sep' 
            and `t`.`reportingMonth` between ('2018-04-01') and ('2018-09-30')
            and `t`.`year` in (2018)
            ";
            break;
            
            
            break;
            
            default:
            break;
        }

        
         $reporting_period=(!empty($reportingYear))?'':$reportingPeriod;
         $reporting_year=(!empty($reportingPeriod))?'':$reportingYear;
         $reporting_period=(!empty($reportingPeriod))?" ".$reportingYearToPeriodCleaned." ":"";
         $reporting_year=(!empty($reportingYear))?" ".$reportingYearToPeriod." ":"";



		
			$sql = "select 
			1 as `#`,
					`t`.`tbl_techadoptionId`, 
					`t`.`valueChain`, 
					case
    when `t`.`reportingPeriod` = 'Oct - Mar' 
    and `t`.`reportingMonth` 
    between ('2012-10-01') and ('2013-03-31') 
    and `t`.`year` in (2012,2013) 
    then 'Oct 2012 - Mar 2013'
    
    when `t`.`reportingPeriod` = 'Apr - Sep' 
    and `t`.`reportingMonth` 
    between ('2013-04-01') and ('2013-09-30') 
    and `t`.`year` in (2013) 
    then 'Apr 2013 - Sep 2013'
    
    when `t`.`reportingPeriod` = 'Oct - Mar' 
    and `t`.`reportingMonth` 
    between ('2013-10-01') and ('2014-03-31') 
    and `t`.`year` in (2013,2014) 
    then 'Oct 2013 - Mar 2014'
    
    when `t`.`reportingPeriod` = 'Apr - Sep' 
    and `t`.`reportingMonth` 
    between ('2014-04-01') and ('2014-09-30') 
    and `t`.`year` in (2014) 
    then 'Apr 2014 - Sep 2014'
    
    when `t`.`reportingPeriod` = 'Oct - Mar' 
    and `t`.`reportingMonth` 
    between ('2014-10-01') and ('2015-03-31') 
    and `t`.`year` in (2014,2015) 
    then 'Oct 2014 - Mar 2015'
    
    when `t`.`reportingPeriod` = 'Apr - Sep' 
    and `t`.`reportingMonth` 
    between ('2015-04-01') and ('2015-09-30') 
    and `t`.`year` in (2015) 
    then 'Apr 2015 - Sep 2015'
    
    when `t`.`reportingPeriod` = 'Oct - Mar' 
    and `t`.`reportingMonth` 
    between ('2015-10-01') and ('2016-03-31') 
    and `t`.`year` in (2015,2016) 
    then 'Oct 2015 - Mar 2016'
    
    when `t`.`reportingPeriod` = 'Apr - Sep' 
    and `t`.`reportingMonth` 
    between ('2016-04-01') and ('2016-09-30') 
    and `t`.`year` in (2016) 
    then 'Apr 2016 - Sep 2016'
    
    when `t`.`reportingPeriod` = 'Oct - Mar' 
    and `t`.`reportingMonth` 
    between ('2016-10-01') and ('2017-03-31') 
    and `t`.`year` in (2016,2017) 
    then 'Oct 2016 - Mar 2017'
    
    when `t`.`reportingPeriod` = 'Apr - Sep' 
    and `t`.`reportingMonth` 
    between ('2017-04-01') and ('2017-09-30') 
    and `t`.`year` in (2017) 
    then 'Apr 2017 - Sep 2017'
    
    when `t`.`reportingPeriod` = 'Oct - Mar' 
    and `t`.`reportingMonth` 
    between ('2017-10-01') and ('2018-03-31') 
    and `t`.`year` in (2017,2018) 
    then 'Oct 2017 - Mar 2018'
    
    when `t`.`reportingPeriod` = 'Apr - Sep' 
    and `t`.`reportingMonth` 
    between ('2018-04-01') and ('2018-09-30') 
    and `t`.`year` in (2017) 
    then 'Apr 2018 - Sep 2018'
    
else `t`.`reportingPeriod`
end 
					as  `reportingPeriod`,					
					`t`.`businessTraderName`, 
					`t`.`businessLocation`, 
					`t`.`durationWithActivity`, 
					`t`.`nameOfImprovedTech`, 
					`t`.`techAdoptedInReportingPeriod`,
					`t`.`techContinuedFromPast`,
					`t`.`amountInvestedInTechAdoption`,
					`t`.`jobsCreatedFemaleNew`, 
					`t`.`jobsCreatedFemaleOld`,
					`t`.`jobsCreatedMaleNew`, 
					`t`.`jobsCreatedMaleOld`, 
					`t`.`jobsCreatedTotalNew`, 
					`t`.`jobsCreatedTotalOld`,
					`t`.`CompiledBy`,
					`t`.`ReviewedBy`, 
					`t`.`SubmittedBy`, 
					`t`.`DateSubmission`,
					`t`.`updatedby`,
					`t`.`code`, 
					`t`.`dateOfEngagement`,
					`t`.`durationWithOldActivity`,
					`t`.`nameOfJobHolder`, 
					`t`.`sexOfJobHolder`,
					`t`.`timeSpentOnJob`,
					`t`.`typeOfBusiness`,
					`t`.`year`,
					`t`.`reportingMonth`,
					tj.`dateOfEngagement` as `dateOfEngagementTj`,
					tj.`nameOfJobHolder` as `nameOfJobHolderTj`,
					tj.`sexOfJobHolder` as `sexOfJobHolderTj`, 
					tj.`timeSpentOnJob` as `timeSpentOnJobTj`,
					x.`tbl_tradersId`,
					x.traderCode,
					x.`traderName` 					
					FROM `tbl_techadoption` t join  `tbl_tech_adoption_jobHolder` tj
							 on (`t`.`tbl_techadoptionId` = `tj`.`techAdoption_id`),
							 `tbl_traders` x
				    WHERE x.`tbl_tradersId`=`t`.`businessTraderName`
                    ".$reporting_period."
                    ".$reporting_year."
					order by t.`tbl_techadoptionId` DESC
					";
			
		return $sql;


	}
	
	function form2LabSavRawDataToExcel($reportingYear,$reportingPeriod){
		//$append_dateRange=((($fromDate)!='') and (($toDate)!=''))?" and l.trainingDate between ('".$fromDate."') and ('".$toDate."')":"";
		$reportingYearToPeriod='';
		$reportingPeriodToDateRange='';
         $reportingYearToPeriodCleaned='';
		        switch($reportingYear){
            case'CPMA Year One':
            $reportingYearToPeriod="and `l`.`reportingPeriod` in ('Oct - Mar','Apr - Sep') 
            and `l`.`reportingMonth` between ('2012-10-01') and ('2013-09-30')
            and `l`.`year` in (2012,2013)";
            break;
            
            case'CPMA Year Two':
            $reportingYearToPeriod="and `l`.`reportingPeriod` in ('Oct - Mar','Apr - Sep') 
            and `l`.`reportingMonth` between ('2013-10-01') and ('2014-09-30')
            and `l`.`year` in (2013,2014)";
            break;
            
            case'CPMA Year Three':
            $reportingYearToPeriod="and `l`.`reportingPeriod` in ('Oct - Mar','Apr - Sep') 
            and `l`.`reportingMonth` between ('2014-10-01') and ('2015-09-30')
            and `l`.`year` in (2014,2015)";
            break;
            
            case'CPMA Year Four':
            $reportingYearToPeriod="and `l`.`reportingPeriod` in ('Oct - Mar','Apr - Sep') 
            and `l`.`reportingMonth` between ('2015-10-01') and ('2016-09-30')
            and `l`.`year` in (2015,2016)";
            break;
            
            case'CPMA Year Five':
            $reportingYearToPeriod="and `l`.`reportingPeriod` in ('Oct - Mar','Apr - Sep') 
            and `l`.`reportingMonth` between ('2016-10-01') and ('2017-09-30')
            and `l`.`year` in (2016,2017)";
            break;
            
            case'CPMA Year Six':
            $reportingYearToPeriod="and `l`.`reportingPeriod` in ('Oct - Mar','Apr - Sep') 
            and `l`.`reportingMonth` between ('2017-10-01') and ('2018-09-30')
            and `l`.`year` in (2017,2018)";
            break;
            
            default:
            break;
        }
        
        switch($reportingPeriod){
            case'Oct 2012 - Mar 2013':
            $reportingYearToPeriodCleaned="
            and `l`.`reportingPeriod` = 'Oct - Mar' 
            and `l`.`reportingMonth` between ('2012-10-01') and ('2013-03-31')
            and `l`.`year` in (2012,2013)
            ";
            break;
            
            case'Apr 2013 - Sep 2013':
            $reportingYearToPeriodCleaned="
            and `l`.`reportingPeriod` = 'Apr - Sep' 
            and `l`.`reportingMonth` between ('2013-04-01') and ('2013-09-30')
            and `l`.`year` in (2013)
            ";
            break;
            
            case'Oct 2013 - Mar 2014':
            $reportingYearToPeriodCleaned="
            and `l`.`reportingPeriod` = 'Oct - Mar' 
            and `l`.`reportingMonth` between ('2013-10-01') and ('2014-03-31')
            and `l`.`year` in (2013,2014)
            ";
            break;
            
            case'Apr 2014 - Sep 2014':
            $reportingYearToPeriodCleaned="
            and `l`.`reportingPeriod` = 'Apr - Sep' 
            and `l`.`reportingMonth` between ('2014-04-01') and ('2014-09-30')
            and `l`.`year` in (2014)
            ";
            break;
            
            case'Oct 2014 - Mar 2015':
            $reportingYearToPeriodCleaned="
            and `l`.`reportingPeriod` = 'Oct - Mar' 
            and `l`.`reportingMonth` between ('2014-10-01') and ('2015-03-31')
            and `l`.`year` in (2014,2015)
            ";
            break;
            
            case'Apr 2015 - Sep 2015':
            $reportingYearToPeriodCleaned="
            and `l`.`reportingPeriod` = 'Apr - Sep' 
            and `l`.`reportingMonth` between ('2015-04-01') and ('2015-09-30')
            and `l`.`year` in (2015)
            ";
            break;
            
            case'Oct 2015 - Mar 2016':
            $reportingYearToPeriodCleaned="
            and `l`.`reportingPeriod` = 'Oct - Mar' 
            and `l`.`reportingMonth` between ('2015-10-01') and ('2016-03-31')
            and `l`.`year` in (2015,2016)
            ";
            break;
            
            case'Apr 2016 - Sep 2016':
            $reportingYearToPeriodCleaned="
            and `l`.`reportingPeriod` = 'Apr - Sep' 
            and `l`.`reportingMonth` between ('2016-04-01') and ('2016-09-30')
            and `l`.`year` in (2016)
            ";
            break;
            
            case'Oct 2016 - Mar 2017':
            $reportingYearToPeriodCleaned="
            and `l`.`reportingPeriod` = 'Oct - Mar' 
            and `l`.`reportingMonth` between ('2016-10-01') and ('2017-03-31')
            and `l`.`year` in (2016,2017)
            ";
            break;
            
            case'Apr 2017 - Sep 2017':
            $reportingYearToPeriodCleaned="
            and `l`.`reportingPeriod` = 'Apr - Sep' 
            and `l`.`reportingMonth` between ('2017-04-01') and ('2017-09-30')
            and `l`.`year` in (2017)
            ";
            break;
            
            case'Oct 2017 - Mar 2018':
            $reportingYearToPeriodCleaned="
            and `l`.`reportingPeriod` = 'Oct - Mar' 
            and `l`.`reportingMonth` between ('2017-10-01') and ('2018-03-31')
            and `l`.`year` in (2017,2018)
            ";
            break;
            
            case'Apr 2018 - Sep 2018':
            $reportingYearToPeriodCleaned="
            and `l`.`reportingPeriod` = 'Apr - Sep' 
            and `l`.`reportingMonth` between ('2018-04-01') and ('2018-09-30')
            and `l`.`year` in (2018)
            ";
            break;
            
            
            break;
            
            default:
            break;
        }


        $reporting_period=(!empty($reportingYear))?'':$reportingPeriod;
         $reporting_year=(!empty($reportingPeriod))?'':$reportingYear;
         $reporting_period=(!empty($reportingPeriod))?" ".$reportingYearToPeriodCleaned." ":"";
         $reporting_year=(!empty($reportingYear))?" ".$reportingYearToPeriod." ":"";


			$sql = "select  
					1 as `#`,
					SUBSTRING(`v`.`name`,3,20) as `ValueChain`,
					case
    when `l`.`reportingPeriod` = 'Oct - Mar' 
    and `l`.`reportingMonth` 
    between ('2012-10-01') and ('2013-03-31') 
    and `l`.`year` in (2012,2013) 
    then 'Oct 2012 - Mar 2013'
    
    when `l`.`reportingPeriod` = 'Apr - Sep' 
    and `l`.`reportingMonth` 
    between ('2013-04-01') and ('2013-09-30') 
    and `l`.`year` in (2013) 
    then 'Apr 2013 - Sep 2013'
    
    when `l`.`reportingPeriod` = 'Oct - Mar' 
    and `l`.`reportingMonth` 
    between ('2013-10-01') and ('2014-03-31') 
    and `l`.`year` in (2013,2014) 
    then 'Oct 2013 - Mar 2014'
    
    when `l`.`reportingPeriod` = 'Apr - Sep' 
    and `l`.`reportingMonth` 
    between ('2014-04-01') and ('2014-09-30') 
    and `l`.`year` in (2014) 
    then 'Apr 2014 - Sep 2014'
    
    when `l`.`reportingPeriod` = 'Oct - Mar' 
    and `l`.`reportingMonth` 
    between ('2014-10-01') and ('2015-03-31') 
    and `l`.`year` in (2014,2015) 
    then 'Oct 2014 - Mar 2015'
    
    when `l`.`reportingPeriod` = 'Apr - Sep' 
    and `l`.`reportingMonth` 
    between ('2015-04-01') and ('2015-09-30') 
    and `l`.`year` in (2015) 
    then 'Apr 2015 - Sep 2015'
    
    when `l`.`reportingPeriod` = 'Oct - Mar' 
    and `l`.`reportingMonth` 
    between ('2015-10-01') and ('2016-03-31') 
    and `l`.`year` in (2015,2016) 
    then 'Oct 2015 - Mar 2016'
    
    when `l`.`reportingPeriod` = 'Apr - Sep' 
    and `l`.`reportingMonth` 
    between ('2016-04-01') and ('2016-09-30') 
    and `l`.`year` in (2016) 
    then 'Apr 2016 - Sep 2016'
    
    when `l`.`reportingPeriod` = 'Oct - Mar' 
    and `l`.`reportingMonth` 
    between ('2016-10-01') and ('2017-03-31') 
    and `l`.`year` in (2016,2017) 
    then 'Oct 2016 - Mar 2017'
    
    when `l`.`reportingPeriod` = 'Apr - Sep' 
    and `l`.`reportingMonth` 
    between ('2017-04-01') and ('2017-09-30') 
    and `l`.`year` in (2017) 
    then 'Apr 2017 - Sep 2017'
    
    when `l`.`reportingPeriod` = 'Oct - Mar' 
    and `l`.`reportingMonth` 
    between ('2017-10-01') and ('2018-03-31') 
    and `l`.`year` in (2017,2018) 
    then 'Oct 2017 - Mar 2018'
    
    when `l`.`reportingPeriod` = 'Apr - Sep' 
    and `l`.`reportingMonth` 
    between ('2018-04-01') and ('2018-09-30') 
    and `l`.`year` in (2017) 
    then 'Apr 2018 - Sep 2018'
    
else `l`.`reportingPeriod`
end 
					as  `reportingPeriod`,
					`l`.`labourSavingTech`, 
					`l`.`labourSavingConcept`,
					`l`.`personResponsible`,
					`l`.`jobsCreatedFemaleNew`,
					`l`.`jobsCreatedFemaleOld`,
					`l`.`jobsCreatedMaleNew`, 
					`l`.`jobsCreatedMaleOld`,
					`l`.`jobsCreatedTotalNew`,
					`l`.`jobsCreatedTotalOld`, 
					`l`.`CompiledBy`, 
					`l`.`ReviewedBy`, 
					`l`.`SubmittedBy`, 
					`l`.`DateSubmission`,
					`l`.`updatedby`, 
					`l`.`amountInvestedOnTechInvestment`,
					MONTHNAME(`l`.`reportingMonth`) as `reportingMonth`,
					case
						when Lj.`dateOfEngagement` like '1900-02-%' then '-'
						when Lj.`dateOfEngagement` like '1900-02-%' then '-'
					else Lj.`dateOfEngagement`
					end 
					as  `dateOfEngagement`,
					Lj.`nameOfJobHolder` as `nameOfJobHolder`,
					Lj.`sexOfJobHolder` as `sexOfJobHolder`, 
					Lj.`timeSpentOnJob` as `timeSpentOnJob`
					from `tbl_laboursavingtech` as `l`  
					join tbl_labourSavingTech_jobHolder as `Lj`
					on (`l`.`tbl_laboursavingtechId` = `Lj`.`labour_saving_tech_id`),
					`tbl_mainvaluechain` as `v`
					where 1=1
					and `l`.valueChain LIKE CONCAT('%', SUBSTRING(`v`.`name`, 3, 20) ,'%')  
                    ".$reporting_period."
                    ".$reporting_year."
					order by `l`.`tbl_laboursavingtechId` desc
					";
			
		return $sql;


	}

	function form2MedProRawDataToExcel($reportingYear,$reportingPeriod){
		//$append_dateRange=((($fromDate)!='') and (($toDate)!=''))?" and m.trainingDate between ('".$fromDate."') and ('".$toDate."')":"";
		$reportingYearToPeriod='';
		$reportingPeriodToDateRange='';
		 $reportingYearToPeriodCleaned='';
         switch($reportingYear){
            case'CPMA Year One':
            $reportingYearToPeriod="and `m`.`reportingPeriod` in ('Oct - Mar','Apr - Sep') 
            and `m`.`reportingMonth` between ('2012-10-01') and ('2013-09-30')
            and `m`.`year` in (2012,2013)";
            break;
            
            case'CPMA Year Two':
            $reportingYearToPeriod="and `m`.`reportingPeriod` in ('Oct - Mar','Apr - Sep') 
            and `m`.`reportingMonth` between ('2013-10-01') and ('2014-09-30')
            and `m`.`year` in (2013,2014)";
            break;
            
            case'CPMA Year Three':
            $reportingYearToPeriod="and `m`.`reportingPeriod` in ('Oct - Mar','Apr - Sep') 
            and `m`.`reportingMonth` between ('2014-10-01') and ('2015-09-30')
            and `m`.`year` in (2014,2015)";
            break;
            
            case'CPMA Year Four':
            $reportingYearToPeriod="and `m`.`reportingPeriod` in ('Oct - Mar','Apr - Sep') 
            and `m`.`reportingMonth` between ('2015-10-01') and ('2016-09-30')
            and `m`.`year` in (2015,2016)";
            break;
            
            case'CPMA Year Five':
            $reportingYearToPeriod="and `m`.`reportingPeriod` in ('Oct - Mar','Apr - Sep') 
            and `m`.`reportingMonth` between ('2016-10-01') and ('2017-09-30')
            and `m`.`year` in (2016,2017)";
            break;
            
            case'CPMA Year Six':
            $reportingYearToPeriod="and `m`.`reportingPeriod` in ('Oct - Mar','Apr - Sep') 
            and `m`.`reportingMonth` between ('2017-10-01') and ('2018-09-30')
            and `m`.`year` in (2017,2018)";
            break;
            
            default:
            break;
        }
        
        switch($reportingPeriod){
            case'Oct 2012 - Mar 2013':
            $reportingYearToPeriodCleaned="
            and `m`.`reportingPeriod` = 'Oct - Mar' 
            and `m`.`reportingMonth` between ('2012-10-01') and ('2013-03-31')
            and `m`.`year` in (2012,2013)
            ";
            break;
            
            case'Apr 2013 - Sep 2013':
            $reportingYearToPeriodCleaned="
            and `m`.`reportingPeriod` = 'Apr - Sep' 
            and `m`.`reportingMonth` between ('2013-04-01') and ('2013-09-30')
            and `m`.`year` in (2013)
            ";
            break;
            
            case'Oct 2013 - Mar 2014':
            $reportingYearToPeriodCleaned="
            and `m`.`reportingPeriod` = 'Oct - Mar' 
            and `m`.`reportingMonth` between ('2013-10-01') and ('2014-03-31')
            and `m`.`year` in (2013,2014)
            ";
            break;
            
            case'Apr 2014 - Sep 2014':
            $reportingYearToPeriodCleaned="
            and `m`.`reportingPeriod` = 'Apr - Sep' 
            and `m`.`reportingMonth` between ('2014-04-01') and ('2014-09-30')
            and `m`.`year` in (2014)
            ";
            break;
            
            case'Oct 2014 - Mar 2015':
            $reportingYearToPeriodCleaned="
            and `m`.`reportingPeriod` = 'Oct - Mar' 
            and `m`.`reportingMonth` between ('2014-10-01') and ('2015-03-31')
            and `m`.`year` in (2014,2015)
            ";
            break;
            
            case'Apr 2015 - Sep 2015':
            $reportingYearToPeriodCleaned="
            and `m`.`reportingPeriod` = 'Apr - Sep' 
            and `m`.`reportingMonth` between ('2015-04-01') and ('2015-09-30')
            and `m`.`year` in (2015)
            ";
            break;
            
            case'Oct 2015 - Mar 2016':
            $reportingYearToPeriodCleaned="
            and `m`.`reportingPeriod` = 'Oct - Mar' 
            and `m`.`reportingMonth` between ('2015-10-01') and ('2016-03-31')
            and `m`.`year` in (2015,2016)
            ";
            break;
            
            case'Apr 2016 - Sep 2016':
            $reportingYearToPeriodCleaned="
            and `m`.`reportingPeriod` = 'Apr - Sep' 
            and `m`.`reportingMonth` between ('2016-04-01') and ('2016-09-30')
            and `m`.`year` in (2016)
            ";
            break;
            
            case'Oct 2016 - Mar 2017':
            $reportingYearToPeriodCleaned="
            and `m`.`reportingPeriod` = 'Oct - Mar' 
            and `m`.`reportingMonth` between ('2016-10-01') and ('2017-03-31')
            and `m`.`year` in (2016,2017)
            ";
            break;
            
            case'Apr 2017 - Sep 2017':
            $reportingYearToPeriodCleaned="
            and `m`.`reportingPeriod` = 'Apr - Sep' 
            and `m`.`reportingMonth` between ('2017-04-01') and ('2017-09-30')
            and `m`.`year` in (2017)
            ";
            break;
            
            case'Oct 2017 - Mar 2018':
            $reportingYearToPeriodCleaned="
            and `m`.`reportingPeriod` = 'Oct - Mar' 
            and `m`.`reportingMonth` between ('2017-10-01') and ('2018-03-31')
            and `m`.`year` in (2017,2018)
            ";
            break;
            
            case'Apr 2018 - Sep 2018':
            $reportingYearToPeriodCleaned="
            and `m`.`reportingPeriod` = 'Apr - Sep' 
            and `m`.`reportingMonth` between ('2018-04-01') and ('2018-09-30')
            and `m`.`year` in (2018)
            ";
            break;
            
            
            break;
            
            default:
            break;
        }

        $reporting_period=(!empty($reportingYear))?'':$reportingPeriod;
         $reporting_year=(!empty($reportingPeriod))?'':$reportingYear;
         $reporting_period=(!empty($reportingPeriod))?" ".$reportingYearToPeriodCleaned." ":"";
         $reporting_year=(!empty($reportingYear))?" ".$reportingYearToPeriod." ":"";

		
			$sql = "select 
					1 as `#`,
					`m`.`mediaAwarenessMessage`, 
					SUBSTRING(`v`.`name`,3,20) as `ValueChain`,
					case
    when `m`.`reportingPeriod` = 'Oct - Mar' 
    and `m`.`reportingMonth` 
    between ('2012-10-01') and ('2013-03-31') 
    and `m`.`year` in (2012,2013) 
    then 'Oct 2012 - Mar 2013'
    
    when `m`.`reportingPeriod` = 'Apr - Sep' 
    and `m`.`reportingMonth` 
    between ('2013-04-01') and ('2013-09-30') 
    and `m`.`year` in (2013) 
    then 'Apr 2013 - Sep 2013'
    
    when `m`.`reportingPeriod` = 'Oct - Mar' 
    and `m`.`reportingMonth` 
    between ('2013-10-01') and ('2014-03-31') 
    and `m`.`year` in (2013,2014) 
    then 'Oct 2013 - Mar 2014'
    
    when `m`.`reportingPeriod` = 'Apr - Sep' 
    and `m`.`reportingMonth` 
    between ('2014-04-01') and ('2014-09-30') 
    and `m`.`year` in (2014) 
    then 'Apr 2014 - Sep 2014'
    
    when `m`.`reportingPeriod` = 'Oct - Mar' 
    and `m`.`reportingMonth` 
    between ('2014-10-01') and ('2015-03-31') 
    and `m`.`year` in (2014,2015) 
    then 'Oct 2014 - Mar 2015'
    
    when `m`.`reportingPeriod` = 'Apr - Sep' 
    and `m`.`reportingMonth` 
    between ('2015-04-01') and ('2015-09-30') 
    and `m`.`year` in (2015) 
    then 'Apr 2015 - Sep 2015'
    
    when `m`.`reportingPeriod` = 'Oct - Mar' 
    and `m`.`reportingMonth` 
    between ('2015-10-01') and ('2016-03-31') 
    and `m`.`year` in (2015,2016) 
    then 'Oct 2015 - Mar 2016'
    
    when `m`.`reportingPeriod` = 'Apr - Sep' 
    and `m`.`reportingMonth` 
    between ('2016-04-01') and ('2016-09-30') 
    and `m`.`year` in (2016) 
    then 'Apr 2016 - Sep 2016'
    
    when `m`.`reportingPeriod` = 'Oct - Mar' 
    and `m`.`reportingMonth` 
    between ('2016-10-01') and ('2017-03-31') 
    and `m`.`year` in (2016,2017) 
    then 'Oct 2016 - Mar 2017'
    
    when `m`.`reportingPeriod` = 'Apr - Sep' 
    and `m`.`reportingMonth` 
    between ('2017-04-01') and ('2017-09-30') 
    and `m`.`year` in (2017) 
    then 'Apr 2017 - Sep 2017'
    
    when `m`.`reportingPeriod` = 'Oct - Mar' 
    and `m`.`reportingMonth` 
    between ('2017-10-01') and ('2018-03-31') 
    and `m`.`year` in (2017,2018) 
    then 'Oct 2017 - Mar 2018'
    
    when `m`.`reportingPeriod` = 'Apr - Sep' 
    and `m`.`reportingMonth` 
    between ('2018-04-01') and ('2018-09-30') 
    and `m`.`year` in (2017) 
    then 'Apr 2018 - Sep 2018'
    
else `m`.`reportingPeriod`
end 
					as  `reportingPeriod`,
					`m`.`categoryYouthTargeted`,
					`m`.`anticipatedResults`, 
					`m`.`typeOfMedia`,
					DATEDIFF( `m`.`toDate` , `m`.`fromDate` ) AS `duration`,
					`m`.`coverage`, 
					`m`.`CompiledBy`, 
					`m`.`ReviewedBy`,
					`m`.`SubmittedBy`, 
					`m`.`DateSubmission`,
					`m`.`updatedby`, 
					`m`.`dateOfEngagement`, 
					`m`.`nameOfJobHolder`,
					`m`.`sexOfJobHolder`, 
					`m`.`timeSpentOnJob`,
					MONTHNAME(`m`.`reportingMonth`) as `reportingMonth`, 
					case
						when Mj.`dateOfEngagement` like '1900-02-%' then '-'
						when Mj.`dateOfEngagement` like '1900-02-%' then '-'
					else Mj.`dateOfEngagement`
					end 
					as  `dateOfEngagement`,
					Mj.`nameOfJobHolder` as `nameOfJobHolder`,
					Mj.`sexOfJobHolder` as `sexOfJobHolder`, 
					Mj.`timeSpentOnJob` as `timeSpentOnJob` 
					from `tbl_mediaprograms` AS `m` 
					join tbl_mediaProgram_jobHolder as `Mj`
					on (`m`.`tbl_mediaprogramsId` = `Mj`.`media_program_id`),
					tbl_mainvaluechain as `v`
					where 1=1
					and `m`.valueChain LIKE CONCAT('%', SUBSTRING(`v`.`name`, 3, 20) ,'%') 
					".$reporting_period."
                    ".$reporting_year."
					order by `m`.`tbl_mediaprogramsId` desc";
			
		return $sql;


	}

	function form2YouAppRawDataToExcel($reportingYear,$reportingPeriod){
		//$append_dateRange=((($fromDate)!='') and (($toDate)!=''))?" and y.trainingDate between ('".$fromDate."') and ('".$toDate."')":"";
		$reportingYearToPeriod='';
		$reportingPeriodToDateRange='';
		$reportingYearToPeriodCleaned='';
switch($reportingYear){
            case'CPMA Year One':
            $reportingYearToPeriod="and `y`.`reportingPeriod` in ('Oct - Mar','Apr - Sep') 
            and `y`.`reportingMonth` between ('2012-10-01') and ('2013-09-30')
            and `y`.`year` in (2012,2013)";
            break;
            
            case'CPMA Year Two':
            $reportingYearToPeriod="and `y`.`reportingPeriod` in ('Oct - Mar','Apr - Sep') 
            and `y`.`reportingMonth` between ('2013-10-01') and ('2014-09-30')
            and `y`.`year` in (2013,2014)";
            break;
            
            case'CPMA Year Three':
            $reportingYearToPeriod="and `y`.`reportingPeriod` in ('Oct - Mar','Apr - Sep') 
            and `y`.`reportingMonth` between ('2014-10-01') and ('2015-09-30')
            and `y`.`year` in (2014,2015)";
            break;
            
            case'CPMA Year Four':
            $reportingYearToPeriod="and `y`.`reportingPeriod` in ('Oct - Mar','Apr - Sep') 
            and `y`.`reportingMonth` between ('2015-10-01') and ('2016-09-30')
            and `y`.`year` in (2015,2016)";
            break;
            
            case'CPMA Year Five':
            $reportingYearToPeriod="and `y`.`reportingPeriod` in ('Oct - Mar','Apr - Sep') 
            and `y`.`reportingMonth` between ('2016-10-01') and ('2017-09-30')
            and `y`.`year` in (2016,2017)";
            break;
            
            case'CPMA Year Six':
            $reportingYearToPeriod="and `y`.`reportingPeriod` in ('Oct - Mar','Apr - Sep') 
            and `y`.`reportingMonth` between ('2017-10-01') and ('2018-09-30')
            and `y`.`year` in (2017,2018)";
            break;
            
            default:
            break;
        }
        
        switch($reportingPeriod){
            case'Oct 2012 - Mar 2013':
            $reportingYearToPeriodCleaned="
            and `y`.`reportingPeriod` = 'Oct - Mar' 
            and `y`.`reportingMonth` between ('2012-10-01') and ('2013-03-31')
            and `y`.`year` in (2012,2013)
            ";
            break;
            
            case'Apr 2013 - Sep 2013':
            $reportingYearToPeriodCleaned="
            and `y`.`reportingPeriod` = 'Apr - Sep' 
            and `y`.`reportingMonth` between ('2013-04-01') and ('2013-09-30')
            and `y`.`year` in (2013)
            ";
            break;
            
            case'Oct 2013 - Mar 2014':
            $reportingYearToPeriodCleaned="
            and `y`.`reportingPeriod` = 'Oct - Mar' 
            and `y`.`reportingMonth` between ('2013-10-01') and ('2014-03-31')
            and `y`.`year` in (2013,2014)
            ";
            break;
            
            case'Apr 2014 - Sep 2014':
            $reportingYearToPeriodCleaned="
            and `y`.`reportingPeriod` = 'Apr - Sep' 
            and `y`.`reportingMonth` between ('2014-04-01') and ('2014-09-30')
            and `y`.`year` in (2014)
            ";
            break;
            
            case'Oct 2014 - Mar 2015':
            $reportingYearToPeriodCleaned="
            and `y`.`reportingPeriod` = 'Oct - Mar' 
            and `y`.`reportingMonth` between ('2014-10-01') and ('2015-03-31')
            and `y`.`year` in (2014,2015)
            ";
            break;
            
            case'Apr 2015 - Sep 2015':
            $reportingYearToPeriodCleaned="
            and `y`.`reportingPeriod` = 'Apr - Sep' 
            and `y`.`reportingMonth` between ('2015-04-01') and ('2015-09-30')
            and `y`.`year` in (2015)
            ";
            break;
            
            case'Oct 2015 - Mar 2016':
            $reportingYearToPeriodCleaned="
            and `y`.`reportingPeriod` = 'Oct - Mar' 
            and `y`.`reportingMonth` between ('2015-10-01') and ('2016-03-31')
            and `y`.`year` in (2015,2016)
            ";
            break;
            
            case'Apr 2016 - Sep 2016':
            $reportingYearToPeriodCleaned="
            and `y`.`reportingPeriod` = 'Apr - Sep' 
            and `y`.`reportingMonth` between ('2016-04-01') and ('2016-09-30')
            and `y`.`year` in (2016)
            ";
            break;
            
            case'Oct 2016 - Mar 2017':
            $reportingYearToPeriodCleaned="
            and `y`.`reportingPeriod` = 'Oct - Mar' 
            and `y`.`reportingMonth` between ('2016-10-01') and ('2017-03-31')
            and `y`.`year` in (2016,2017)
            ";
            break;
            
            case'Apr 2017 - Sep 2017':
            $reportingYearToPeriodCleaned="
            and `y`.`reportingPeriod` = 'Apr - Sep' 
            and `y`.`reportingMonth` between ('2017-04-01') and ('2017-09-30')
            and `y`.`year` in (2017)
            ";
            break;
            
            case'Oct 2017 - Mar 2018':
            $reportingYearToPeriodCleaned="
            and `y`.`reportingPeriod` = 'Oct - Mar' 
            and `y`.`reportingMonth` between ('2017-10-01') and ('2018-03-31')
            and `y`.`year` in (2017,2018)
            ";
            break;
            
            case'Apr 2018 - Sep 2018':
            $reportingYearToPeriodCleaned="
            and `y`.`reportingPeriod` = 'Apr - Sep' 
            and `y`.`reportingMonth` between ('2018-04-01') and ('2018-09-30')
            and `y`.`year` in (2018)
            ";
            break;
            
            
            break;
            
            default:
            break;
        }

        $reporting_period=(!empty($reportingYear))?'':$reportingPeriod;
         $reporting_year=(!empty($reportingPeriod))?'':$reportingYear;
         $reporting_period=(!empty($reportingPeriod))?" ".$reportingYearToPeriodCleaned." ":"";
         $reporting_year=(!empty($reportingYear))?" ".$reportingYearToPeriod." ":"";


			$sql = "select
					1 as `#`, 
					`y`.`nameofBusiness`, 
					SUBSTRING(`y`.`valueChain`,3,20) as `ValueChain`,
					case
    when `y`.`reportingPeriod` = 'Oct - Mar' 
    and `y`.`reportingMonth` 
    between ('2012-10-01') and ('2013-03-31') 
    and `y`.`year` in (2012,2013) 
    then 'Oct 2012 - Mar 2013'
    
    when `y`.`reportingPeriod` = 'Apr - Sep' 
    and `y`.`reportingMonth` 
    between ('2013-04-01') and ('2013-09-30') 
    and `y`.`year` in (2013) 
    then 'Apr 2013 - Sep 2013'
    
    when `y`.`reportingPeriod` = 'Oct - Mar' 
    and `y`.`reportingMonth` 
    between ('2013-10-01') and ('2014-03-31') 
    and `y`.`year` in (2013,2014) 
    then 'Oct 2013 - Mar 2014'
    
    when `y`.`reportingPeriod` = 'Apr - Sep' 
    and `y`.`reportingMonth` 
    between ('2014-04-01') and ('2014-09-30') 
    and `y`.`year` in (2014) 
    then 'Apr 2014 - Sep 2014'
    
    when `y`.`reportingPeriod` = 'Oct - Mar' 
    and `y`.`reportingMonth` 
    between ('2014-10-01') and ('2015-03-31') 
    and `y`.`year` in (2014,2015) 
    then 'Oct 2014 - Mar 2015'
    
    when `y`.`reportingPeriod` = 'Apr - Sep' 
    and `y`.`reportingMonth` 
    between ('2015-04-01') and ('2015-09-30') 
    and `y`.`year` in (2015) 
    then 'Apr 2015 - Sep 2015'
    
    when `y`.`reportingPeriod` = 'Oct - Mar' 
    and `y`.`reportingMonth` 
    between ('2015-10-01') and ('2016-03-31') 
    and `y`.`year` in (2015,2016) 
    then 'Oct 2015 - Mar 2016'
    
    when `y`.`reportingPeriod` = 'Apr - Sep' 
    and `y`.`reportingMonth` 
    between ('2016-04-01') and ('2016-09-30') 
    and `y`.`year` in (2016) 
    then 'Apr 2016 - Sep 2016'
    
    when `y`.`reportingPeriod` = 'Oct - Mar' 
    and `y`.`reportingMonth` 
    between ('2016-10-01') and ('2017-03-31') 
    and `y`.`year` in (2016,2017) 
    then 'Oct 2016 - Mar 2017'
    
    when `y`.`reportingPeriod` = 'Apr - Sep' 
    and `y`.`reportingMonth` 
    between ('2017-04-01') and ('2017-09-30') 
    and `y`.`year` in (2017) 
    then 'Apr 2017 - Sep 2017'
    
    when `y`.`reportingPeriod` = 'Oct - Mar' 
    and `y`.`reportingMonth` 
    between ('2017-10-01') and ('2018-03-31') 
    and `y`.`year` in (2017,2018) 
    then 'Oct 2017 - Mar 2018'
    
    when `y`.`reportingPeriod` = 'Apr - Sep' 
    and `y`.`reportingMonth` 
    between ('2018-04-01') and ('2018-09-30') 
    and `y`.`year` in (2017) 
    then 'Apr 2018 - Sep 2018'
    
else `y`.`reportingPeriod`
end 
					as  `reportingPeriod`,
					`y`.`sexBusinessOwner`,
					`y`.`num_youthAttachedFemaleNew`, 
					`y`.`num_youthAttachedFemaleOld`,
					`y`.`num_youthAttachedMaleNew`,
					`y`.`num_youthAttachedMaleOld`,
					`y`.`num_youthAttachedTotalNew`, 
					`y`.`num_youthAttachedTotalOld`, 
					DATEDIFF( `y`.`toDate` , `y`.`fromDate` ) AS `duration`,
					`y`.`anticipatedOutcome`, 
					`y`.`CompiledBy`, 
					`y`.`ReviewedBy`, 
					`y`.`SubmittedBy`, 
					`y`.`DateSubmission`, 
					`y`.`updatedby`, 
					`y`.`apprenticeShip`, 
					`y`.`dateOfEngagement`,
					`y`.`nameOfJobHolder`,
					`y`.`sexOfJobHolder`, 
					`y`.`timeSpentOnJob`,
					`y`.`reportingMonth`,
					MONTHNAME(`y`.`reportingMonth`) as `reportingMonth`, 
					DATEDIFF( `y`.`fromDate`,`y`.`toDate`) AS `duration`,
					case
						when Yj.`dateOfEngagement` like '1900-02-%' then '-'
						when Yj.`dateOfEngagement` like '1900-02-%' then '-'
					else Yj.`dateOfEngagement`
					end 
					as  `dateOfEngagement`,
					`Yj`.`nameOfJobHolder` as `nameOfJobHolder`,
					`Yj`.`sexOfJobHolder` as `sexOfJobHolder`, 
					`Yj`.`timeSpentOnJob` as `timeSpentOnJob` 
					from `tbl_youthapprentice` as `y` 
					join 	tbl_apprenticeship_jobHolder as `Yj`
					on (`y`.`tbl_youthapprenticeId` = `Yj`.`apprenticeship_id`)
					where 1=1
					".$reporting_period."
                    ".$reporting_year."
					order BY `y`.`tbl_youthapprenticeId` 
					desc";
			
		return $sql;


	}

	function form2BusDevRawDataToExcel($reportingYear,$reportingPeriod){
		//$append_dateRange=((($fromDate)!='') and (($toDate)!=''))?" and v.trainingDate between ('".$fromDate."') and ('".$toDate."')":"";
		$reportingYearToPeriod='';
		$reportingPeriodToDateRange='';


 $reportingYearToPeriodCleaned='';
switch($reportingYear){
            case'CPMA Year One':
            $reportingYearToPeriod="and `v`.`reportingPeriod` in ('Oct - Mar','Apr - Sep') 
            and `v`.`reportingMonth` between ('2012-10-01') and ('2013-09-30')
            and `v`.`year` in (2012,2013)";
            break;
            
            case'CPMA Year Two':
            $reportingYearToPeriod="and `v`.`reportingPeriod` in ('Oct - Mar','Apr - Sep') 
            and `v`.`reportingMonth` between ('2013-10-01') and ('2014-09-30')
            and `v`.`year` in (2013,2014)";
            break;
            
            case'CPMA Year Three':
            $reportingYearToPeriod="and `v`.`reportingPeriod` in ('Oct - Mar','Apr - Sep') 
            and `v`.`reportingMonth` between ('2014-10-01') and ('2015-09-30')
            and `v`.`year` in (2014,2015)";
            break;
            
            case'CPMA Year Four':
            $reportingYearToPeriod="and `v`.`reportingPeriod` in ('Oct - Mar','Apr - Sep') 
            and `v`.`reportingMonth` between ('2015-10-01') and ('2016-09-30')
            and `v`.`year` in (2015,2016)";
            break;
            
            case'CPMA Year Five':
            $reportingYearToPeriod="and `v`.`reportingPeriod` in ('Oct - Mar','Apr - Sep') 
            and `v`.`reportingMonth` between ('2016-10-01') and ('2017-09-30')
            and `v`.`year` in (2016,2017)";
            break;
            
            case'CPMA Year Six':
            $reportingYearToPeriod="and `v`.`reportingPeriod` in ('Oct - Mar','Apr - Sep') 
            and `v`.`reportingMonth` between ('2017-10-01') and ('2018-09-30')
            and `v`.`year` in (2017,2018)";
            break;
            
            default:
            break;
        }
        
        switch($reportingPeriod){
            case'Oct 2012 - Mar 2013':
            $reportingYearToPeriodCleaned="
            and `v`.`reportingPeriod` = 'Oct - Mar' 
            and `v`.`reportingMonth` between ('2012-10-01') and ('2013-03-31')
            and `v`.`year` in (2012,2013)
            ";
            break;
            
            case'Apr 2013 - Sep 2013':
            $reportingYearToPeriodCleaned="
            and `v`.`reportingPeriod` = 'Apr - Sep' 
            and `v`.`reportingMonth` between ('2013-04-01') and ('2013-09-30')
            and `v`.`year` in (2013)
            ";
            break;
            
            case'Oct 2013 - Mar 2014':
            $reportingYearToPeriodCleaned="
            and `v`.`reportingPeriod` = 'Oct - Mar' 
            and `v`.`reportingMonth` between ('2013-10-01') and ('2014-03-31')
            and `v`.`year` in (2013,2014)
            ";
            break;
            
            case'Apr 2014 - Sep 2014':
            $reportingYearToPeriodCleaned="
            and `v`.`reportingPeriod` = 'Apr - Sep' 
            and `v`.`reportingMonth` between ('2014-04-01') and ('2014-09-30')
            and `v`.`year` in (2014)
            ";
            break;
            
            case'Oct 2014 - Mar 2015':
            $reportingYearToPeriodCleaned="
            and `v`.`reportingPeriod` = 'Oct - Mar' 
            and `v`.`reportingMonth` between ('2014-10-01') and ('2015-03-31')
            and `v`.`year` in (2014,2015)
            ";
            break;
            
            case'Apr 2015 - Sep 2015':
            $reportingYearToPeriodCleaned="
            and `v`.`reportingPeriod` = 'Apr - Sep' 
            and `v`.`reportingMonth` between ('2015-04-01') and ('2015-09-30')
            and `v`.`year` in (2015)
            ";
            break;
            
            case'Oct 2015 - Mar 2016':
            $reportingYearToPeriodCleaned="
            and `v`.`reportingPeriod` = 'Oct - Mar' 
            and `v`.`reportingMonth` between ('2015-10-01') and ('2016-03-31')
            and `v`.`year` in (2015,2016)
            ";
            break;
            
            case'Apr 2016 - Sep 2016':
            $reportingYearToPeriodCleaned="
            and `v`.`reportingPeriod` = 'Apr - Sep' 
            and `v`.`reportingMonth` between ('2016-04-01') and ('2016-09-30')
            and `v`.`year` in (2016)
            ";
            break;
            
            case'Oct 2016 - Mar 2017':
            $reportingYearToPeriodCleaned="
            and `v`.`reportingPeriod` = 'Oct - Mar' 
            and `v`.`reportingMonth` between ('2016-10-01') and ('2017-03-31')
            and `v`.`year` in (2016,2017)
            ";
            break;
            
            case'Apr 2017 - Sep 2017':
            $reportingYearToPeriodCleaned="
            and `v`.`reportingPeriod` = 'Apr - Sep' 
            and `v`.`reportingMonth` between ('2017-04-01') and ('2017-09-30')
            and `v`.`year` in (2017)
            ";
            break;
            
            case'Oct 2017 - Mar 2018':
            $reportingYearToPeriodCleaned="
            and `v`.`reportingPeriod` = 'Oct - Mar' 
            and `v`.`reportingMonth` between ('2017-10-01') and ('2018-03-31')
            and `v`.`year` in (2017,2018)
            ";
            break;
            
            case'Apr 2018 - Sep 2018':
            $reportingYearToPeriodCleaned="
            and `v`.`reportingPeriod` = 'Apr - Sep' 
            and `v`.`reportingMonth` between ('2018-04-01') and ('2018-09-30')
            and `v`.`year` in (2018)
            ";
            break;
            
            
            break;
            
            default:
            break;
        }

        $reporting_period=(!empty($reportingYear))?'':$reportingPeriod;
         $reporting_year=(!empty($reportingPeriod))?'':$reportingYear;
         $reporting_period=(!empty($reportingPeriod))?" ".$reportingYearToPeriodCleaned." ":"";
         $reporting_year=(!empty($reportingYear))?" ".$reportingYearToPeriod." ":"";
		
			$sql = "select 
					1 as `#`, 
					`v`.`nameOfPartner`,
					SUBSTRING(`v`.`valueChain`,3,20) as `ValueChain`,
					case
    when `v`.`reportingPeriod` = 'Oct - Mar' 
    and `v`.`reportingMonth` 
    between ('2012-10-01') and ('2013-03-31') 
    and `v`.`year` in (2012,2013) 
    then 'Oct 2012 - Mar 2013'
    
    when `v`.`reportingPeriod` = 'Apr - Sep' 
    and `v`.`reportingMonth` 
    between ('2013-04-01') and ('2013-09-30') 
    and `v`.`year` in (2013) 
    then 'Apr 2013 - Sep 2013'
    
    when `v`.`reportingPeriod` = 'Oct - Mar' 
    and `v`.`reportingMonth` 
    between ('2013-10-01') and ('2014-03-31') 
    and `v`.`year` in (2013,2014) 
    then 'Oct 2013 - Mar 2014'
    
    when `v`.`reportingPeriod` = 'Apr - Sep' 
    and `v`.`reportingMonth` 
    between ('2014-04-01') and ('2014-09-30') 
    and `v`.`year` in (2014) 
    then 'Apr 2014 - Sep 2014'
    
    when `v`.`reportingPeriod` = 'Oct - Mar' 
    and `v`.`reportingMonth` 
    between ('2014-10-01') and ('2015-03-31') 
    and `v`.`year` in (2014,2015) 
    then 'Oct 2014 - Mar 2015'
    
    when `v`.`reportingPeriod` = 'Apr - Sep' 
    and `v`.`reportingMonth` 
    between ('2015-04-01') and ('2015-09-30') 
    and `v`.`year` in (2015) 
    then 'Apr 2015 - Sep 2015'
    
    when `v`.`reportingPeriod` = 'Oct - Mar' 
    and `v`.`reportingMonth` 
    between ('2015-10-01') and ('2016-03-31') 
    and `v`.`year` in (2015,2016) 
    then 'Oct 2015 - Mar 2016'
    
    when `v`.`reportingPeriod` = 'Apr - Sep' 
    and `v`.`reportingMonth` 
    between ('2016-04-01') and ('2016-09-30') 
    and `v`.`year` in (2016) 
    then 'Apr 2016 - Sep 2016'
    
    when `v`.`reportingPeriod` = 'Oct - Mar' 
    and `v`.`reportingMonth` 
    between ('2016-10-01') and ('2017-03-31') 
    and `v`.`year` in (2016,2017) 
    then 'Oct 2016 - Mar 2017'
    
    when `v`.`reportingPeriod` = 'Apr - Sep' 
    and `v`.`reportingMonth` 
    between ('2017-04-01') and ('2017-09-30') 
    and `v`.`year` in (2017) 
    then 'Apr 2017 - Sep 2017'
    
    when `v`.`reportingPeriod` = 'Oct - Mar' 
    and `v`.`reportingMonth` 
    between ('2017-10-01') and ('2018-03-31') 
    and `v`.`year` in (2017,2018) 
    then 'Oct 2017 - Mar 2018'
    
    when `v`.`reportingPeriod` = 'Apr - Sep' 
    and `v`.`reportingMonth` 
    between ('2018-04-01') and ('2018-09-30') 
    and `v`.`year` in (2017) 
    then 'Apr 2018 - Sep 2018'
    
else `v`.`reportingPeriod`
end 
					as  `reportingPeriod`,
					`v`.`areaOfExpertise`,
					`v`.`servicesOffered`,
					`v`.`typeOfActorServiced`,
					`v`.`actorServedFemale`, 
					`v`.`actorServedMale`,
					`v`.`roleOfActivity`,
					`v`.`CompiledBy`, 
					`v`.`ReviewedBy`,
					`v`.`SubmittedBy`,
					`v`.`DateSubmission`,
					`v`.`updatedby`,
					`v`.`dateOfEngagement`,
					`v`.`nameOfJobHolder`,
					`v`.`nameOfMSME`,
					`v`.`nameofBusiness`,
					`v`.`numOfEmployee`, 
					`v`.`sexOfJobHolder`,
					`v`.`sexOfMSME`,
					`v`.`timeSpentOnJob`,
					MONTHNAME(`v`.`reportingMonth`) as `reportingMonth`,
					`v`.`msmeType`, 
					case
						when Vj.`dateOfEngagement` like '1900-02-%' then '-'
						when Vj.`dateOfEngagement` like '1900-02-%' then '-'
					else Vj.`dateOfEngagement`
					end 
					as  `dateOfEngagement`,
					`Vj`.`nameOfJobHolder` as `nameOfJobHolder`,
					`Vj`.`sexOfJobHolder` as `sexOfJobHolder`, 
					`Vj`.`timeSpentOnJob` as `timeSpentOnJob`
					from `tbl_businessdev` as `v` 
					join 	tbl_bds_jobHolder as `Vj`
					on (`v`.`tbl_businessdevId` = `Vj`.`bds_id`) 
					where 1=1
					".$reporting_period."
                    ".$reporting_year."
					order by `v`.`tbl_businessdevId` desc";
			
		return $sql;


	}

	function form2BanLoaRawDataToExcel($reportingYear,$reportingPeriod){
		//$append_dateRange=((($fromDate)!='') and (($toDate)!=''))?" and b.trainingDate between ('".$fromDate."') and ('".$toDate."')":"";
		$reportingYearToPeriod='';
		$reportingPeriodToDateRange='';
         $reportingYearToPeriodCleaned='';
switch($reportingYear){
            case'CPMA Year One':
            $reportingYearToPeriod="and `b`.`reportingPeriod` in ('Oct - Mar','Apr - Sep') 
            and `b`.`reportingMonth` between ('2012-10-01') and ('2013-09-30')
            and `b`.`year` in (2012,2013)";
            break;
            
            case'CPMA Year Two':
            $reportingYearToPeriod="and `b`.`reportingPeriod` in ('Oct - Mar','Apr - Sep') 
            and `b`.`reportingMonth` between ('2013-10-01') and ('2014-09-30')
            and `b`.`year` in (2013,2014)";
            break;
            
            case'CPMA Year Three':
            $reportingYearToPeriod="and `b`.`reportingPeriod` in ('Oct - Mar','Apr - Sep') 
            and `b`.`reportingMonth` between ('2014-10-01') and ('2015-09-30')
            and `b`.`year` in (2014,2015)";
            break;
            
            case'CPMA Year Four':
            $reportingYearToPeriod="and `b`.`reportingPeriod` in ('Oct - Mar','Apr - Sep') 
            and `b`.`reportingMonth` between ('2015-10-01') and ('2016-09-30')
            and `b`.`year` in (2015,2016)";
            break;
            
            case'CPMA Year Five':
            $reportingYearToPeriod="and `b`.`reportingPeriod` in ('Oct - Mar','Apr - Sep') 
            and `b`.`reportingMonth` between ('2016-10-01') and ('2017-09-30')
            and `b`.`year` in (2016,2017)";
            break;
            
            case'CPMA Year Six':
            $reportingYearToPeriod="and `b`.`reportingPeriod` in ('Oct - Mar','Apr - Sep') 
            and `b`.`reportingMonth` between ('2017-10-01') and ('2018-09-30')
            and `b`.`year` in (2017,2018)";
            break;
            
            default:
            break;
        }

       switch($reportingPeriod){
            case'Oct 2012 - Mar 2013':
            $reportingYearToPeriodCleaned="
            and `b`.`reportingPeriod` = 'Oct - Mar' 
            and `b`.`reportingMonth` between ('2012-10-01') and ('2013-03-31')
            and `b`.`year` in (2012,2013)
            ";
            break;
            
            case'Apr 2013 - Sep 2013':
            $reportingYearToPeriodCleaned="
            and `b`.`reportingPeriod` = 'Apr - Sep' 
            and `b`.`reportingMonth` between ('2013-04-01') and ('2013-09-30')
            and `b`.`year` in (2013)
            ";
            break;
            
            case'Oct 2013 - Mar 2014':
            $reportingYearToPeriodCleaned="
            and `b`.`reportingPeriod` = 'Oct - Mar' 
            and `b`.`reportingMonth` between ('2013-10-01') and ('2014-03-31')
            and `b`.`year` in (2013,2014)
            ";
            break;
            
            case'Apr 2014 - Sep 2014':
            $reportingYearToPeriodCleaned="
            and `b`.`reportingPeriod` = 'Apr - Sep' 
            and `b`.`reportingMonth` between ('2014-04-01') and ('2014-09-30')
            and `b`.`year` in (2014)
            ";
            break;
            
            case'Oct 2014 - Mar 2015':
            $reportingYearToPeriodCleaned="
            and `b`.`reportingPeriod` = 'Oct - Mar' 
            and `b`.`reportingMonth` between ('2014-10-01') and ('2015-03-31')
            and `b`.`year` in (2014,2015)
            ";
            break;
            
            case'Apr 2015 - Sep 2015':
            $reportingYearToPeriodCleaned="
            and `b`.`reportingPeriod` = 'Apr - Sep' 
            and `b`.`reportingMonth` between ('2015-04-01') and ('2015-09-30')
            and `b`.`year` in (2015)
            ";
            break;
            
            case'Oct 2015 - Mar 2016':
            $reportingYearToPeriodCleaned="
            and `b`.`reportingPeriod` = 'Oct - Mar' 
            and `b`.`reportingMonth` between ('2015-10-01') and ('2016-03-31')
            and `b`.`year` in (2015,2016)
            ";
            break;
            
            case'Apr 2016 - Sep 2016':
            $reportingYearToPeriodCleaned="
            and `b`.`reportingPeriod` = 'Apr - Sep' 
            and `b`.`reportingMonth` between ('2016-04-01') and ('2016-09-30')
            and `b`.`year` in (2016)
            ";
            break;
            
            case'Oct 2016 - Mar 2017':
            $reportingYearToPeriodCleaned="
            and `b`.`reportingPeriod` = 'Oct - Mar' 
            and `b`.`reportingMonth` between ('2016-10-01') and ('2017-03-31')
            and `b`.`year` in (2016,2017)
            ";
            break;
            
            case'Apr 2017 - Sep 2017':
            $reportingYearToPeriodCleaned="
            and `b`.`reportingPeriod` = 'Apr - Sep' 
            and `b`.`reportingMonth` between ('2017-04-01') and ('2017-09-30')
            and `b`.`year` in (2017)
            ";
            break;
            
            case'Oct 2017 - Mar 2018':
            $reportingYearToPeriodCleaned="
            and `b`.`reportingPeriod` = 'Oct - Mar' 
            and `b`.`reportingMonth` between ('2017-10-01') and ('2018-03-31')
            and `b`.`year` in (2017,2018)
            ";
            break;
            
            case'Apr 2018 - Sep 2018':
            $reportingYearToPeriodCleaned="
            and `b`.`reportingPeriod` = 'Apr - Sep' 
            and `b`.`reportingMonth` between ('2018-04-01') and ('2018-09-30')
            and `b`.`year` in (2018)
            ";
            break;
            
            
            break;
            
            default:
            break;
        }

        $reporting_period=(!empty($reportingYear))?'':$reportingPeriod;
         $reporting_year=(!empty($reportingPeriod))?'':$reportingYear;
         $reporting_period=(!empty($reportingPeriod))?" ".$reportingYearToPeriodCleaned." ":"";
         $reporting_year=(!empty($reportingYear))?" ".$reportingYearToPeriod." ":"";


		
			$sql = "select 
					1 as `#`,  
					case
    when `b`.`reportingPeriod` = 'Oct - Mar' 
    and `b`.`reportingMonth` 
    between ('2012-10-01') and ('2013-03-31') 
    and `b`.`year` in (2012,2013) 
    then 'Oct 2012 - Mar 2013'
    
    when `b`.`reportingPeriod` = 'Apr - Sep' 
    and `b`.`reportingMonth` 
    between ('2013-04-01') and ('2013-09-30') 
    and `b`.`year` in (2013) 
    then 'Apr 2013 - Sep 2013'
    
    when `b`.`reportingPeriod` = 'Oct - Mar' 
    and `b`.`reportingMonth` 
    between ('2013-10-01') and ('2014-03-31') 
    and `b`.`year` in (2013,2014) 
    then 'Oct 2013 - Mar 2014'
    
    when `b`.`reportingPeriod` = 'Apr - Sep' 
    and `b`.`reportingMonth` 
    between ('2014-04-01') and ('2014-09-30') 
    and `b`.`year` in (2014) 
    then 'Apr 2014 - Sep 2014'
    
    when `b`.`reportingPeriod` = 'Oct - Mar' 
    and `b`.`reportingMonth` 
    between ('2014-10-01') and ('2015-03-31') 
    and `b`.`year` in (2014,2015) 
    then 'Oct 2014 - Mar 2015'
    
    when `b`.`reportingPeriod` = 'Apr - Sep' 
    and `b`.`reportingMonth` 
    between ('2015-04-01') and ('2015-09-30') 
    and `b`.`year` in (2015) 
    then 'Apr 2015 - Sep 2015'
    
    when `b`.`reportingPeriod` = 'Oct - Mar' 
    and `b`.`reportingMonth` 
    between ('2015-10-01') and ('2016-03-31') 
    and `b`.`year` in (2015,2016) 
    then 'Oct 2015 - Mar 2016'
    
    when `b`.`reportingPeriod` = 'Apr - Sep' 
    and `b`.`reportingMonth` 
    between ('2016-04-01') and ('2016-09-30') 
    and `b`.`year` in (2016) 
    then 'Apr 2016 - Sep 2016'
    
    when `b`.`reportingPeriod` = 'Oct - Mar' 
    and `b`.`reportingMonth` 
    between ('2016-10-01') and ('2017-03-31') 
    and `b`.`year` in (2016,2017) 
    then 'Oct 2016 - Mar 2017'
    
    when `b`.`reportingPeriod` = 'Apr - Sep' 
    and `b`.`reportingMonth` 
    between ('2017-04-01') and ('2017-09-30') 
    and `b`.`year` in (2017) 
    then 'Apr 2017 - Sep 2017'
    
    when `b`.`reportingPeriod` = 'Oct - Mar' 
    and `b`.`reportingMonth` 
    between ('2017-10-01') and ('2018-03-31') 
    and `b`.`year` in (2017,2018) 
    then 'Oct 2017 - Mar 2018'
    
    when `b`.`reportingPeriod` = 'Apr - Sep' 
    and `b`.`reportingMonth` 
    between ('2018-04-01') and ('2018-09-30') 
    and `b`.`year` in (2017) 
    then 'Apr 2018 - Sep 2018'
    
else `b`.`reportingPeriod`
end 
					as  `reportingPeriod`,
					`b`.`nameMSME`,
					SUBSTRING(`b`.`valueChain`,3,20) as `ValueChain`,
					`b`.`cpmAssistance`, 
					`b`.`amountLoanAccessed`, 
					`b`.`recipientSex`, 
					`b`.`bankingInstitution`, 
					`b`.`CompiledBy`, 
					`b`.`ReviewedBy`,
					`b`.`SubmittedBy`, 
					`b`.`DateSubmission`,
					`b`.`updatedby`,
					`b`.`dateOfBirth`, 
					`b`.`sexOfMSME`,
					`b`.`typeOfLoanRecepient`,
					`b`.`reportingMonth`, 
					MONTHNAME(`b`.`reportingMonth`) as `reportingMonth`,
					`b`.`msmeType`,
					case
						when Bj.`dateOfEngagement` like '1900-02-%' then '-'
						when Bj.`dateOfEngagement` like '1900-02-%' then '-'
					else Bj.`dateOfEngagement`
					end 
					as  `dateOfEngagement`,
					`Bj`.`nameOfJobHolder` as `nameOfJobHolder`,
					`Bj`.`sexOfJobHolder` as `sexOfJobHolder`, 
					`Bj`.`timeSpentOnJob` as `timeSpentOnJob` 
					from `tbl_bankloans` as `b` join tbl_bank_loans_jobHolder `Bj`
					on (`b`.`tbl_bankLoanId` = `Bj`.`bankLoan_id`) 
					where 1=1
					".$reporting_period."
                    ".$reporting_year."
					order by `b`.`tbl_bankLoanId` desc";
			
		return $sql;


	}

	function form2InpSalRawDataToExcel($reportingYear,$reportingPeriod){
		//$append_dateRange=((($fromDate)!='') and (($toDate)!=''))?" and sm.trainingDate between ('".$fromDate."') and ('".$toDate."')":"";
		$reportingYearToPeriod='';
		$reportingPeriodToDateRange='';
		 $reportingYearToPeriodCleaned='';
switch($reportingYear){
            case'CPMA Year One':
            $reportingYearToPeriod="and `sm`.`reportingPeriod` in ('Oct - Mar','Apr - Sep') 
            and `sm`.`reportingMonth` between ('2012-10-01') and ('2013-09-30')
            and `sm`.`year` in (2012,2013)";
            break;
            
            case'CPMA Year Two':
            $reportingYearToPeriod="and `sm`.`reportingPeriod` in ('Oct - Mar','Apr - Sep') 
            and `sm`.`reportingMonth` between ('2013-10-01') and ('2014-09-30')
            and `sm`.`year` in (2013,2014)";
            break;
            
            case'CPMA Year Three':
            $reportingYearToPeriod="and `sm`.`reportingPeriod` in ('Oct - Mar','Apr - Sep') 
            and `sm`.`reportingMonth` between ('2014-10-01') and ('2015-09-30')
            and `sm`.`year` in (2014,2015)";
            break;
            
            case'CPMA Year Four':
            $reportingYearToPeriod="and `sm`.`reportingPeriod` in ('Oct - Mar','Apr - Sep') 
            and `sm`.`reportingMonth` between ('2015-10-01') and ('2016-09-30')
            and `sm`.`year` in (2015,2016)";
            break;
            
            case'CPMA Year Five':
            $reportingYearToPeriod="and `sm`.`reportingPeriod` in ('Oct - Mar','Apr - Sep') 
            and `sm`.`reportingMonth` between ('2016-10-01') and ('2017-09-30')
            and `sm`.`year` in (2016,2017)";
            break;
            
            case'CPMA Year Six':
            $reportingYearToPeriod="and `sm`.`reportingPeriod` in ('Oct - Mar','Apr - Sep') 
            and `sm`.`reportingMonth` between ('2017-10-01') and ('2018-09-30')
            and `sm`.`year` in (2017,2018)";
            break;
            
            default:
            break;
        }
        
        switch($reportingPeriod){
            case'Oct 2012 - Mar 2013':
            $reportingYearToPeriodCleaned="
            and `sm`.`reportingPeriod` = 'Oct - Mar' 
            and `sm`.`reportingMonth` between ('2012-10-01') and ('2013-03-31')
            and `sm`.`year` in (2012,2013)
            ";
            break;
            
            case'Apr 2013 - Sep 2013':
            $reportingYearToPeriodCleaned="
            and `sm`.`reportingPeriod` = 'Apr - Sep' 
            and `sm`.`reportingMonth` between ('2013-04-01') and ('2013-09-30')
            and `sm`.`year` in (2013)
            ";
            break;
            
            case'Oct 2013 - Mar 2014':
            $reportingYearToPeriodCleaned="
            and `sm`.`reportingPeriod` = 'Oct - Mar' 
            and `sm`.`reportingMonth` between ('2013-10-01') and ('2014-03-31')
            and `sm`.`year` in (2013,2014)
            ";
            break;
            
            case'Apr 2014 - Sep 2014':
            $reportingYearToPeriodCleaned="
            and `sm`.`reportingPeriod` = 'Apr - Sep' 
            and `sm`.`reportingMonth` between ('2014-04-01') and ('2014-09-30')
            and `sm`.`year` in (2014)
            ";
            break;
            
            case'Oct 2014 - Mar 2015':
            $reportingYearToPeriodCleaned="
            and `sm`.`reportingPeriod` = 'Oct - Mar' 
            and `sm`.`reportingMonth` between ('2014-10-01') and ('2015-03-31')
            and `sm`.`year` in (2014,2015)
            ";
            break;
            
            case'Apr 2015 - Sep 2015':
            $reportingYearToPeriodCleaned="
            and `sm`.`reportingPeriod` = 'Apr - Sep' 
            and `sm`.`reportingMonth` between ('2015-04-01') and ('2015-09-30')
            and `sm`.`year` in (2015)
            ";
            break;
            
            case'Oct 2015 - Mar 2016':
            $reportingYearToPeriodCleaned="
            and `sm`.`reportingPeriod` = 'Oct - Mar' 
            and `sm`.`reportingMonth` between ('2015-10-01') and ('2016-03-31')
            and `sm`.`year` in (2015,2016)
            ";
            break;
            
            case'Apr 2016 - Sep 2016':
            $reportingYearToPeriodCleaned="
            and `sm`.`reportingPeriod` = 'Apr - Sep' 
            and `sm`.`reportingMonth` between ('2016-04-01') and ('2016-09-30')
            and `sm`.`year` in (2016)
            ";
            break;
            
            case'Oct 2016 - Mar 2017':
            $reportingYearToPeriodCleaned="
            and `sm`.`reportingPeriod` = 'Oct - Mar' 
            and `sm`.`reportingMonth` between ('2016-10-01') and ('2017-03-31')
            and `sm`.`year` in (2016,2017)
            ";
            break;
            
            case'Apr 2017 - Sep 2017':
            $reportingYearToPeriodCleaned="
            and `sm`.`reportingPeriod` = 'Apr - Sep' 
            and `sm`.`reportingMonth` between ('2017-04-01') and ('2017-09-30')
            and `sm`.`year` in (2017)
            ";
            break;
            
            case'Oct 2017 - Mar 2018':
            $reportingYearToPeriodCleaned="
            and `sm`.`reportingPeriod` = 'Oct - Mar' 
            and `sm`.`reportingMonth` between ('2017-10-01') and ('2018-03-31')
            and `sm`.`year` in (2017,2018)
            ";
            break;
            
            case'Apr 2018 - Sep 2018':
            $reportingYearToPeriodCleaned="
            and `sm`.`reportingPeriod` = 'Apr - Sep' 
            and `sm`.`reportingMonth` between ('2018-04-01') and ('2018-09-30')
            and `sm`.`year` in (2018)
            ";
            break;
            
            
            break;
            
            default:
            break;
        }


        $reporting_period=(!empty($reportingYear))?'':$reportingPeriod;
         $reporting_year=(!empty($reportingPeriod))?'':$reportingYear;
         $reporting_period=(!empty($reportingPeriod))?" ".$reportingYearToPeriodCleaned." ":"";
         $reporting_year=(!empty($reportingYear))?" ".$reportingYearToPeriod." ":"";

			$sql = "select
					1 as `#`, 
					`s`.`nameOfMiddleValueChainActor`,
					case
    when `sm`.`reportingPeriod` = 'Oct - Mar' 
    and `sm`.`reportingMonth` 
    between ('2012-10-01') and ('2013-03-31') 
    and `sm`.`year` in (2012,2013) 
    then 'Oct 2012 - Mar 2013'
    
    when `sm`.`reportingPeriod` = 'Apr - Sep' 
    and `sm`.`reportingMonth` 
    between ('2013-04-01') and ('2013-09-30') 
    and `sm`.`year` in (2013) 
    then 'Apr 2013 - Sep 2013'
    
    when `sm`.`reportingPeriod` = 'Oct - Mar' 
    and `sm`.`reportingMonth` 
    between ('2013-10-01') and ('2014-03-31') 
    and `sm`.`year` in (2013,2014) 
    then 'Oct 2013 - Mar 2014'
    
    when `sm`.`reportingPeriod` = 'Apr - Sep' 
    and `sm`.`reportingMonth` 
    between ('2014-04-01') and ('2014-09-30') 
    and `sm`.`year` in (2014) 
    then 'Apr 2014 - Sep 2014'
    
    when `sm`.`reportingPeriod` = 'Oct - Mar' 
    and `sm`.`reportingMonth` 
    between ('2014-10-01') and ('2015-03-31') 
    and `sm`.`year` in (2014,2015) 
    then 'Oct 2014 - Mar 2015'
    
    when `sm`.`reportingPeriod` = 'Apr - Sep' 
    and `sm`.`reportingMonth` 
    between ('2015-04-01') and ('2015-09-30') 
    and `sm`.`year` in (2015) 
    then 'Apr 2015 - Sep 2015'
    
    when `sm`.`reportingPeriod` = 'Oct - Mar' 
    and `sm`.`reportingMonth` 
    between ('2015-10-01') and ('2016-03-31') 
    and `sm`.`year` in (2015,2016) 
    then 'Oct 2015 - Mar 2016'
    
    when `sm`.`reportingPeriod` = 'Apr - Sep' 
    and `sm`.`reportingMonth` 
    between ('2016-04-01') and ('2016-09-30') 
    and `sm`.`year` in (2016) 
    then 'Apr 2016 - Sep 2016'
    
    when `sm`.`reportingPeriod` = 'Oct - Mar' 
    and `sm`.`reportingMonth` 
    between ('2016-10-01') and ('2017-03-31') 
    and `sm`.`year` in (2016,2017) 
    then 'Oct 2016 - Mar 2017'
    
    when `sm`.`reportingPeriod` = 'Apr - Sep' 
    and `sm`.`reportingMonth` 
    between ('2017-04-01') and ('2017-09-30') 
    and `sm`.`year` in (2017) 
    then 'Apr 2017 - Sep 2017'
    
    when `sm`.`reportingPeriod` = 'Oct - Mar' 
    and `sm`.`reportingMonth` 
    between ('2017-10-01') and ('2018-03-31') 
    and `sm`.`year` in (2017,2018) 
    then 'Oct 2017 - Mar 2018'
    
    when `sm`.`reportingPeriod` = 'Apr - Sep' 
    and `sm`.`reportingMonth` 
    between ('2018-04-01') and ('2018-09-30') 
    and `sm`.`year` in (2017) 
    then 'Apr 2018 - Sep 2018'
    
else `sm`.`reportingPeriod`
end  
					as  `dateOfStartOfinputsSalesBusiness`,
					`sm`.`amountInvestedInSettingUpInputSalesBusiness`,
					`sm`.`compiledBy`,
					case
						when sm.`dateOfEngagement` like '1900-02-%' then '-'
						when sm.`dateOfEngagement` like '1900-02-%' then '-'
					else sm.`dateOfEngagement`
					end 
					as  `dateOfEngagement`,
					`sm`.`dateSubmission`,
					`sm`.`inputsSoldByChemicals`,
					`sm`.`inputsSoldByFarmImplements`,
					`sm`.`inputsSoldByFertilizers`,
					`sm`.`inputsSoldByHerbicides`,
					`sm`.`inputsSoldByOthers`,
					`sm`.`inputsSoldBySeeds`,
					`sm`.`nameOfJobHolder`,
					`sm`.`numberOfFarmersBenefitingFemale`,
					`sm`.`numberOfFarmersBenefitingMale`,
					`sm`.`numberOfFarmersBenefitingTotal`,
					`sm`.`numberOfMessengersFemale`,
					`sm`.`numberOfMessengersMale`, 
					`sm`.`numberOfMessengersTOtal`,
					case
						when `sm`.`reportingPeriod` = 'Oct - Mar' and `sm`.`year`=2015 then 'Oct 2015 - Mar 2016'
						when `sm`.`reportingPeriod` = 'Oct - Mar' and `sm`.`year`=2016 then 'Oct 2015 - Mar 2016'
					else `sm`.`reportingPeriod`
					end 
					as  `reportingPeriod`,
					`sm`.`reviewedBy`, 
					`sm`.`sexOfJobHolder`, 
					`sm`.`submittedBy`, 
					`sm`.`timeSpentOnJob`, 
					`sm`.`updatedby`,
					`sm`.`valueChain` as `ValueChain`,
					MONTHNAME(`sm`.`reportingMonth`) as `reportingMonth`
					from `tbl_input_sales` as `s`,
					`tbl_input_sales_meta_data` as `sm` 
					where 1=1
					".$reporting_period."
                    ".$reporting_year."
					and `s`.`id`=`sm`.`input_sales_id` 
					group by `s`.`id` order by `s`.`id` desc";
			
		return $sql;


	}

	function form2PHHRawDataToExcel($reportingYear,$reportingPeriod){
		//$append_dateRange=((($fromDate)!='') and (($toDate)!=''))?" and pm.trainingDate between ('".$fromDate."') and ('".$toDate."')":"";
		$reportingYearToPeriod='';
		$reportingPeriodToDateRange='';
		 $reportingYearToPeriodCleaned='';
switch($reportingYear){
            case'CPMA Year One':
            $reportingYearToPeriod="and `pm`.`reportingPeriod` in ('Oct - Mar','Apr - Sep') 
            and `pm`.`reportingMonth` between ('2012-10-01') and ('2013-09-30')
            and `pm`.`year` in (2012,2013)";
            break;
            
            case'CPMA Year Two':
            $reportingYearToPeriod="and `pm`.`reportingPeriod` in ('Oct - Mar','Apr - Sep') 
            and `pm`.`reportingMonth` between ('2013-10-01') and ('2014-09-30')
            and `pm`.`year` in (2013,2014)";
            break;
            
            case'CPMA Year Three':
            $reportingYearToPeriod="and `pm`.`reportingPeriod` in ('Oct - Mar','Apr - Sep') 
            and `pm`.`reportingMonth` between ('2014-10-01') and ('2015-09-30')
            and `pm`.`year` in (2014,2015)";
            break;
            
            case'CPMA Year Four':
            $reportingYearToPeriod="and `pm`.`reportingPeriod` in ('Oct - Mar','Apr - Sep') 
            and `pm`.`reportingMonth` between ('2015-10-01') and ('2016-09-30')
            and `pm`.`year` in (2015,2016)";
            break;
            
            case'CPMA Year Five':
            $reportingYearToPeriod="and `pm`.`reportingPeriod` in ('Oct - Mar','Apr - Sep') 
            and `pm`.`reportingMonth` between ('2016-10-01') and ('2017-09-30')
            and `pm`.`year` in (2016,2017)";
            break;
            
            case'CPMA Year Six':
            $reportingYearToPeriod="and `pm`.`reportingPeriod` in ('Oct - Mar','Apr - Sep') 
            and `pm`.`reportingMonth` between ('2017-10-01') and ('2018-09-30')
            and `pm`.`year` in (2017,2018)";
            break;
            
            default:
            break;
        }
        
        switch($reportingPeriod){
            case'Oct 2012 - Mar 2013':
            $reportingYearToPeriodCleaned="
            and `pm`.`reportingPeriod` = 'Oct - Mar' 
            and `pm`.`reportingMonth` between ('2012-10-01') and ('2013-03-31')
            and `pm`.`year` in (2012,2013)
            ";
            break;
            
            case'Apr 2013 - Sep 2013':
            $reportingYearToPeriodCleaned="
            and `pm`.`reportingPeriod` = 'Apr - Sep' 
            and `pm`.`reportingMonth` between ('2013-04-01') and ('2013-09-30')
            and `pm`.`year` in (2013)
            ";
            break;
            
            case'Oct 2013 - Mar 2014':
            $reportingYearToPeriodCleaned="
            and `pm`.`reportingPeriod` = 'Oct - Mar' 
            and `pm`.`reportingMonth` between ('2013-10-01') and ('2014-03-31')
            and `pm`.`year` in (2013,2014)
            ";
            break;
            
            case'Apr 2014 - Sep 2014':
            $reportingYearToPeriodCleaned="
            and `pm`.`reportingPeriod` = 'Apr - Sep' 
            and `pm`.`reportingMonth` between ('2014-04-01') and ('2014-09-30')
            and `pm`.`year` in (2014)
            ";
            break;
            
            case'Oct 2014 - Mar 2015':
            $reportingYearToPeriodCleaned="
            and `pm`.`reportingPeriod` = 'Oct - Mar' 
            and `pm`.`reportingMonth` between ('2014-10-01') and ('2015-03-31')
            and `pm`.`year` in (2014,2015)
            ";
            break;
            
            case'Apr 2015 - Sep 2015':
            $reportingYearToPeriodCleaned="
            and `pm`.`reportingPeriod` = 'Apr - Sep' 
            and `pm`.`reportingMonth` between ('2015-04-01') and ('2015-09-30')
            and `pm`.`year` in (2015)
            ";
            break;
            
            case'Oct 2015 - Mar 2016':
            $reportingYearToPeriodCleaned="
            and `pm`.`reportingPeriod` = 'Oct - Mar' 
            and `pm`.`reportingMonth` between ('2015-10-01') and ('2016-03-31')
            and `pm`.`year` in (2015,2016)
            ";
            break;
            
            case'Apr 2016 - Sep 2016':
            $reportingYearToPeriodCleaned="
            and `pm`.`reportingPeriod` = 'Apr - Sep' 
            and `pm`.`reportingMonth` between ('2016-04-01') and ('2016-09-30')
            and `pm`.`year` in (2016)
            ";
            break;
            
            case'Oct 2016 - Mar 2017':
            $reportingYearToPeriodCleaned="
            and `pm`.`reportingPeriod` = 'Oct - Mar' 
            and `pm`.`reportingMonth` between ('2016-10-01') and ('2017-03-31')
            and `pm`.`year` in (2016,2017)
            ";
            break;
            
            case'Apr 2017 - Sep 2017':
            $reportingYearToPeriodCleaned="
            and `pm`.`reportingPeriod` = 'Apr - Sep' 
            and `pm`.`reportingMonth` between ('2017-04-01') and ('2017-09-30')
            and `pm`.`year` in (2017)
            ";
            break;
            
            case'Oct 2017 - Mar 2018':
            $reportingYearToPeriodCleaned="
            and `pm`.`reportingPeriod` = 'Oct - Mar' 
            and `pm`.`reportingMonth` between ('2017-10-01') and ('2018-03-31')
            and `pm`.`year` in (2017,2018)
            ";
            break;
            
            case'Apr 2018 - Sep 2018':
            $reportingYearToPeriodCleaned="
            and `pm`.`reportingPeriod` = 'Apr - Sep' 
            and `pm`.`reportingMonth` between ('2018-04-01') and ('2018-09-30')
            and `pm`.`year` in (2018)
            ";
            break;
            
            
            break;
            
            default:
            break;
        }

        $reporting_period=(!empty($reportingYear))?'':$reportingPeriod;
         $reporting_year=(!empty($reportingPeriod))?'':$reportingYear;
         $reporting_period=(!empty($reportingPeriod))?" ".$reportingYearToPeriodCleaned." ":"";
         $reporting_year=(!empty($reportingYear))?" ".$reportingYearToPeriod." ":"";

			$sql = "select
					1 as `#`, 
					`p`.`nameOfMiddleValueChainActor`, 
					`p`.`dateOfStartOfinputsSalesBusiness`,
					case
    when `pm`.`reportingPeriod` = 'Oct - Mar' 
    and `pm`.`reportingMonth` 
    between ('2012-10-01') and ('2013-03-31') 
    and `pm`.`year` in (2012,2013) 
    then 'Oct 2012 - Mar 2013'
    
    when `pm`.`reportingPeriod` = 'Apr - Sep' 
    and `pm`.`reportingMonth` 
    between ('2013-04-01') and ('2013-09-30') 
    and `pm`.`year` in (2013) 
    then 'Apr 2013 - Sep 2013'
    
    when `pm`.`reportingPeriod` = 'Oct - Mar' 
    and `pm`.`reportingMonth` 
    between ('2013-10-01') and ('2014-03-31') 
    and `pm`.`year` in (2013,2014) 
    then 'Oct 2013 - Mar 2014'
    
    when `pm`.`reportingPeriod` = 'Apr - Sep' 
    and `pm`.`reportingMonth` 
    between ('2014-04-01') and ('2014-09-30') 
    and `pm`.`year` in (2014) 
    then 'Apr 2014 - Sep 2014'
    
    when `pm`.`reportingPeriod` = 'Oct - Mar' 
    and `pm`.`reportingMonth` 
    between ('2014-10-01') and ('2015-03-31') 
    and `pm`.`year` in (2014,2015) 
    then 'Oct 2014 - Mar 2015'
    
    when `pm`.`reportingPeriod` = 'Apr - Sep' 
    and `pm`.`reportingMonth` 
    between ('2015-04-01') and ('2015-09-30') 
    and `pm`.`year` in (2015) 
    then 'Apr 2015 - Sep 2015'
    
    when `pm`.`reportingPeriod` = 'Oct - Mar' 
    and `pm`.`reportingMonth` 
    between ('2015-10-01') and ('2016-03-31') 
    and `pm`.`year` in (2015,2016) 
    then 'Oct 2015 - Mar 2016'
    
    when `pm`.`reportingPeriod` = 'Apr - Sep' 
    and `pm`.`reportingMonth` 
    between ('2016-04-01') and ('2016-09-30') 
    and `pm`.`year` in (2016) 
    then 'Apr 2016 - Sep 2016'
    
    when `pm`.`reportingPeriod` = 'Oct - Mar' 
    and `pm`.`reportingMonth` 
    between ('2016-10-01') and ('2017-03-31') 
    and `pm`.`year` in (2016,2017) 
    then 'Oct 2016 - Mar 2017'
    
    when `pm`.`reportingPeriod` = 'Apr - Sep' 
    and `pm`.`reportingMonth` 
    between ('2017-04-01') and ('2017-09-30') 
    and `pm`.`year` in (2017) 
    then 'Apr 2017 - Sep 2017'
    
    when `pm`.`reportingPeriod` = 'Oct - Mar' 
    and `pm`.`reportingMonth` 
    between ('2017-10-01') and ('2018-03-31') 
    and `pm`.`year` in (2017,2018) 
    then 'Oct 2017 - Mar 2018'
    
    when `pm`.`reportingPeriod` = 'Apr - Sep' 
    and `pm`.`reportingMonth` 
    between ('2018-04-01') and ('2018-09-30') 
    and `pm`.`year` in (2017) 
    then 'Apr 2018 - Sep 2018'
    
else `pm`.`reportingPeriod`
end 
					as  `reportingPeriod`,
					MONTHNAME(`pm`.`reportingMonth`) as `reportingMonth`,
					`pm`.`valueChain`,
					`pm`.`amountInvestedInRefurbishing`,
					`pm`.`assistanceRenderedByActivity`, 
					case
						when pm.`dateOfEngagement` like '1900-02-%' then '-'
						when pm.`dateOfEngagement` like '1900-02-%' then '-'
					else pm.`dateOfEngagement`
					end 
					as  `dateOfEngagement`,
					`pm`.`dateSubmission`, 
					`pm`.`nameOfJobHolder`,
					`pm`.`sexOfJobHolder`,
					`pm`.`timeSpentOnJob`, 
					`pm`.`sizeOfStoreRefurbished`,
					`pm`.`storageTypeForColdChain`,
					`pm`.`storageTypeForDryGoods`, 
					`pm`.`submittedBy`, 
					`pm`.`compiledBy`,
					`pm`.`reviewedBy`,
					`pm`.`updatedby`
					from `tbl_phh` as `p`,
					`tbl_phh_meta_data` as `pm`  
					where 1=1
					".$reporting_period."
                    ".$reporting_year."
					and `p`.`id`=`pm`.`phh_id`
					group by `p`.`id` order by `p`.`id` desc";
			
		return $sql;


	}

	function form2PubPriRawDataToExcel($reportingYear,$reportingPeriod){
		//$append_dateRange=((($fromDate)!='') and (($toDate)!=''))?" and p.trainingDate between ('".$fromDate."') and ('".$toDate."')":"";
		$reportingYearToPeriod='';
		$reportingPeriodToDateRange='';
         $reportingYearToPeriodCleaned='';
switch($reportingYear){
            case'CPMA Year One':
            $reportingYearToPeriod="and `p`.`reportingPeriod` in ('Oct - Mar','Apr - Sep') 
            and `p`.`reportingMonth` between ('2012-10-01') and ('2013-09-30')
            and `p`.`year` in (2012,2013)";
            break;
            
            case'CPMA Year Two':
            $reportingYearToPeriod="and `p`.`reportingPeriod` in ('Oct - Mar','Apr - Sep') 
            and `p`.`reportingMonth` between ('2013-10-01') and ('2014-09-30')
            and `p`.`year` in (2013,2014)";
            break;
            
            case'CPMA Year Three':
            $reportingYearToPeriod="and `p`.`reportingPeriod` in ('Oct - Mar','Apr - Sep') 
            and `p`.`reportingMonth` between ('2014-10-01') and ('2015-09-30')
            and `p`.`year` in (2014,2015)";
            break;
            
            case'CPMA Year Four':
            $reportingYearToPeriod="and `p`.`reportingPeriod` in ('Oct - Mar','Apr - Sep') 
            and `p`.`reportingMonth` between ('2015-10-01') and ('2016-09-30')
            and `p`.`year` in (2015,2016)";
            break;
            
            case'CPMA Year Five':
            $reportingYearToPeriod="and `p`.`reportingPeriod` in ('Oct - Mar','Apr - Sep') 
            and `p`.`reportingMonth` between ('2016-10-01') and ('2017-09-30')
            and `p`.`year` in (2016,2017)";
            break;
            
            case'CPMA Year Six':
            $reportingYearToPeriod="and `p`.`reportingPeriod` in ('Oct - Mar','Apr - Sep') 
            and `p`.`reportingMonth` between ('2017-10-01') and ('2018-09-30')
            and `p`.`year` in (2017,2018)";
            break;
            
            default:
            break;
        }
        
        switch($reportingPeriod){
            case'Oct 2012 - Mar 2013':
            $reportingYearToPeriodCleaned="
            and `p`.`reportingPeriod` = 'Oct - Mar' 
            and `p`.`reportingMonth` between ('2012-10-01') and ('2013-03-31')
            and `p`.`year` in (2012,2013)
            ";
            break;
            
            case'Apr 2013 - Sep 2013':
            $reportingYearToPeriodCleaned="
            and `p`.`reportingPeriod` = 'Apr - Sep' 
            and `p`.`reportingMonth` between ('2013-04-01') and ('2013-09-30')
            and `p`.`year` in (2013)
            ";
            break;
            
            case'Oct 2013 - Mar 2014':
            $reportingYearToPeriodCleaned="
            and `p`.`reportingPeriod` = 'Oct - Mar' 
            and `p`.`reportingMonth` between ('2013-10-01') and ('2014-03-31')
            and `p`.`year` in (2013,2014)
            ";
            break;
            
            case'Apr 2014 - Sep 2014':
            $reportingYearToPeriodCleaned="
            and `p`.`reportingPeriod` = 'Apr - Sep' 
            and `p`.`reportingMonth` between ('2014-04-01') and ('2014-09-30')
            and `p`.`year` in (2014)
            ";
            break;
            
            case'Oct 2014 - Mar 2015':
            $reportingYearToPeriodCleaned="
            and `p`.`reportingPeriod` = 'Oct - Mar' 
            and `p`.`reportingMonth` between ('2014-10-01') and ('2015-03-31')
            and `p`.`year` in (2014,2015)
            ";
            break;
            
            case'Apr 2015 - Sep 2015':
            $reportingYearToPeriodCleaned="
            and `p`.`reportingPeriod` = 'Apr - Sep' 
            and `p`.`reportingMonth` between ('2015-04-01') and ('2015-09-30')
            and `p`.`year` in (2015)
            ";
            break;
            
            case'Oct 2015 - Mar 2016':
            $reportingYearToPeriodCleaned="
            and `p`.`reportingPeriod` = 'Oct - Mar' 
            and `p`.`reportingMonth` between ('2015-10-01') and ('2016-03-31')
            and `p`.`year` in (2015,2016)
            ";
            break;
            
            case'Apr 2016 - Sep 2016':
            $reportingYearToPeriodCleaned="
            and `p`.`reportingPeriod` = 'Apr - Sep' 
            and `p`.`reportingMonth` between ('2016-04-01') and ('2016-09-30')
            and `p`.`year` in (2016)
            ";
            break;
            
            case'Oct 2016 - Mar 2017':
            $reportingYearToPeriodCleaned="
            and `p`.`reportingPeriod` = 'Oct - Mar' 
            and `p`.`reportingMonth` between ('2016-10-01') and ('2017-03-31')
            and `p`.`year` in (2016,2017)
            ";
            break;
            
            case'Apr 2017 - Sep 2017':
            $reportingYearToPeriodCleaned="
            and `p`.`reportingPeriod` = 'Apr - Sep' 
            and `p`.`reportingMonth` between ('2017-04-01') and ('2017-09-30')
            and `p`.`year` in (2017)
            ";
            break;
            
            case'Oct 2017 - Mar 2018':
            $reportingYearToPeriodCleaned="
            and `p`.`reportingPeriod` = 'Oct - Mar' 
            and `p`.`reportingMonth` between ('2017-10-01') and ('2018-03-31')
            and `p`.`year` in (2017,2018)
            ";
            break;
            
            case'Apr 2018 - Sep 2018':
            $reportingYearToPeriodCleaned="
            and `p`.`reportingPeriod` = 'Apr - Sep' 
            and `p`.`reportingMonth` between ('2018-04-01') and ('2018-09-30')
            and `p`.`year` in (2018)
            ";
            break;
            
            
            break;
            
            default:
            break;
        }

        $reporting_period=(!empty($reportingYear))?'':$reportingPeriod;
         $reporting_year=(!empty($reportingPeriod))?'':$reportingYear;
         $reporting_period=(!empty($reportingPeriod))?" ".$reportingYearToPeriodCleaned." ":"";
         $reporting_year=(!empty($reportingYear))?" ".$reportingYearToPeriod." ":"";
		

			$sql = "select 
				1 as `#`,
				`p`.`namePartner`, 
				SUBSTRING(`p`.`valueChain`,3,20) as `ValueChain`,
				case
    when `p`.`reportingPeriod` = 'Oct - Mar' 
    and `p`.`reportingMonth` 
    between ('2012-10-01') and ('2013-03-31') 
    and `p`.`year` in (2012,2013) 
    then 'Oct 2012 - Mar 2013'
    
    when `p`.`reportingPeriod` = 'Apr - Sep' 
    and `p`.`reportingMonth` 
    between ('2013-04-01') and ('2013-09-30') 
    and `p`.`year` in (2013) 
    then 'Apr 2013 - Sep 2013'
    
    when `p`.`reportingPeriod` = 'Oct - Mar' 
    and `p`.`reportingMonth` 
    between ('2013-10-01') and ('2014-03-31') 
    and `p`.`year` in (2013,2014) 
    then 'Oct 2013 - Mar 2014'
    
    when `p`.`reportingPeriod` = 'Apr - Sep' 
    and `p`.`reportingMonth` 
    between ('2014-04-01') and ('2014-09-30') 
    and `p`.`year` in (2014) 
    then 'Apr 2014 - Sep 2014'
    
    when `p`.`reportingPeriod` = 'Oct - Mar' 
    and `p`.`reportingMonth` 
    between ('2014-10-01') and ('2015-03-31') 
    and `p`.`year` in (2014,2015) 
    then 'Oct 2014 - Mar 2015'
    
    when `p`.`reportingPeriod` = 'Apr - Sep' 
    and `p`.`reportingMonth` 
    between ('2015-04-01') and ('2015-09-30') 
    and `p`.`year` in (2015) 
    then 'Apr 2015 - Sep 2015'
    
    when `p`.`reportingPeriod` = 'Oct - Mar' 
    and `p`.`reportingMonth` 
    between ('2015-10-01') and ('2016-03-31') 
    and `p`.`year` in (2015,2016) 
    then 'Oct 2015 - Mar 2016'
    
    when `p`.`reportingPeriod` = 'Apr - Sep' 
    and `p`.`reportingMonth` 
    between ('2016-04-01') and ('2016-09-30') 
    and `p`.`year` in (2016) 
    then 'Apr 2016 - Sep 2016'
    
    when `p`.`reportingPeriod` = 'Oct - Mar' 
    and `p`.`reportingMonth` 
    between ('2016-10-01') and ('2017-03-31') 
    and `p`.`year` in (2016,2017) 
    then 'Oct 2016 - Mar 2017'
    
    when `p`.`reportingPeriod` = 'Apr - Sep' 
    and `p`.`reportingMonth` 
    between ('2017-04-01') and ('2017-09-30') 
    and `p`.`year` in (2017) 
    then 'Apr 2017 - Sep 2017'
    
    when `p`.`reportingPeriod` = 'Oct - Mar' 
    and `p`.`reportingMonth` 
    between ('2017-10-01') and ('2018-03-31') 
    and `p`.`year` in (2017,2018) 
    then 'Oct 2017 - Mar 2018'
    
    when `p`.`reportingPeriod` = 'Apr - Sep' 
    and `p`.`reportingMonth` 
    between ('2018-04-01') and ('2018-09-30') 
    and `p`.`year` in (2017) 
    then 'Apr 2018 - Sep 2018'
    
else `p`.`reportingPeriod`
end 
				as  `reportingPeriod`,
				`p`.`partnershipFocus`,
				`p`.`valueActivity`,
				`p`.`valuePartner`, 
				`p`.`valueTotal`,
				`p`.`CompiledBy`,
				`p`.`ReviewedBy`,
				`p`.`SubmittedBy`, 
				`p`.`updatedby`, 
				`p`.`DateSubmission`,
				case
					when p.`dateOfEngagement` like '1900-02-%' then '-'
					when p.`dateOfEngagement` like '1900-02-%' then '-'
				else p.`dateOfEngagement`
				end 
				as  `dateOfEngagement`,
				`p`.`nameOfJobHolder`,
				`p`.`sexOfJobHolder`, 
				`p`.`timeSpentOnJob`, 
				MONTHNAME(`p`.`reportingMonth`) as `reportingMonth`,
				`Pj`.`dateOfEngagement` as `dateOfEngagement`,
				`Pj`.`nameOfJobHolder` as `nameOfJobHolder`,
				`Pj`.`sexOfJobHolder` as `sexOfJobHolder`, 
				`Pj`.`timeSpentOnJob` as `timeSpentOnJob` 
				from `tbl_public_private_partnership` as `p` 
				join tbl_partnership_jobHolder as `Pj`
				on (`p`.`tbl_partnershipId` = `Pj`.`partnership_id`) 
				where 1=1
				".$reporting_period."
                ".$reporting_year."
				order by `p`.`tbl_partnershipId` desc";
							
		return $sql;


	}
	
	function form3RawDataToExcel($reportingYear,$reportingPeriod){
       // $append_dateRange=((($fromDate)!='') and (($toDate)!=''))?" and t.trainingDate between ('".$fromDate."') and ('".$toDate."')":"";
        $reportingYearToPeriod='';
        $reportingPeriodToDateRange='';
        $reportingYearToPeriodCleaned='';
switch(trim($reportingYear)){
	case trim('Project start up'):
      $reportingYearToPeriod="and `w`.`reportingPeriod` in ('Apr - Sep') 
      and `w`.`year` in (2013)";
      break;
	  
	  case trim('CPMA Year One'):
      $reportingYearToPeriod="and `w`.`reportingPeriod` in ('Oct - Mar','Apr - Sep') 
      and `w`.`year` in (2013,2014)";
      break;
      
      case trim('CPMA Year Two'):
      $reportingYearToPeriod="and `w`.`reportingPeriod` in ('Oct - Mar','Apr - Sep') 
      and `w`.`year` in (2014,2015)";
      break;
      
      case trim('CPMA Year Three'):
      $reportingYearToPeriod="and `w`.`reportingPeriod` in ('Oct - Mar','Apr - Sep') 
      and `w`.`year` in (2015,2016)
      and `w`.`DateSubmission` between ('2015-10-01') and ('2016-03-31')";
      break;
      
      case trim('CPMA Year Four'):
      $reportingYearToPeriod="and `w`.`reportingPeriod` in ('Oct - Mar','Apr - Sep') 
      and `w`.`year` in (2016,2017)
      and `w`.`DateSubmission` between ('2016-10-01') and ('2017-03-31')";
      break;      
      
      case trim('CPMA Year Five(Activity close out)'):
      $reportingYearToPeriod="and `w`.`reportingPeriod` in ('Oct - Mar','Apr - Sep') 
      and `w`.`year` in (2017,2018)";
      break;
      
      default:
      break;
    }
        
        switch($reportingPeriod){
            case trim('Project start up'):
      $reportingYearToPeriodCleaned="
      and `w`.`reportingPeriod` = 'Apr - Sep' 
      and `w`.`year` in (2013)
      ";
      break;
      
      case trim('Oct 2013 - Mar 2014'):
      $reportingYearToPeriodCleaned="
      and `w`.`reportingPeriod` = 'Oct - Mar' 
      and `w`.`year` in (2013,2014)
      ";
      break;
      
      case trim('Apr 2014 - Sep 2014'):
      $reportingYearToPeriodCleaned="
      and `w`.`reportingPeriod` = 'Apr - Sep' 
      and `w`.`year` in (2014)
      ";
      break;
      
      case trim('Oct 2014 - Mar 2015'):
      $reportingYearToPeriodCleaned="
      and `w`.`reportingPeriod` = 'Oct - Mar' 
      and `w`.`year` in (2014,2015)
      ";
      break;
      
      case trim('Apr 2015 - Sep 2015'):
      $reportingYearToPeriodCleaned="
      and `w`.`reportingPeriod` = 'Apr - Sep' 
      and `w`.`year` in (2015)
      ";
      break;
      
      case trim('Oct 2015 - Mar 2016'):
      $reportingYearToPeriodCleaned="
      and `w`.`reportingPeriod` = 'Oct - Mar' 
      and `w`.`year` in (2015,2016)
      and `w`.`DateSubmission` between ('2015-10-01') and ('2016-03-31')
      ";
      break;
      
      case trim('Apr 2016 - Sep 2016'):
      $reportingYearToPeriodCleaned="
      and `w`.`reportingPeriod` = 'Apr - Sep' 
      and `w`.`year` in (2016)
      ";
      break;
      
      case trim('Oct 2016 - Mar 2017'):
      $reportingYearToPeriodCleaned="
      and `w`.`reportingPeriod` = 'Oct - Mar' 
      and `w`.`year` in (2016,2017)
      and `w`.`DateSubmission` between ('2016-10-01') and ('2017-03-31')
      ";
      break;
      
      case trim('Apr 2017 - Sep 2017'):
      $reportingYearToPeriodCleaned="
      and `w`.`reportingPeriod` = 'Apr - Sep' 
      and `w`.`year` in (2017)
      ";
      break;
      
      case trim('Oct 2017 – Mar 2018'):
      $reportingYearToPeriodCleaned="
      and `w`.`reportingPeriod` = 'Oct - Mar' 
      and `w`.`year` in (2017,2018)
      ";
      break;
      
      case trim('Apr 2018 – May 2018'):
      $reportingYearToPeriodCleaned="
      and `w`.`reportingPeriod` = 'Apr - Sep' 
      and `w`.`year` in (2018)
      ";
      break;
      
      default:
      break;
    }

		$reporting_period=(!empty($reportingYear))?'':$reportingPeriod;
		$reporting_year=(!empty($reportingPeriod))?'':$reportingYear;
		$reporting_period=(!empty($reportingPeriod))?" ".$reportingYearToPeriodCleaned." ":"";
		$reporting_year=(!empty($reportingYear))?" ".$reportingYearToPeriod." ":"";

		$sql = "select 
		1 as `#`,
		`x`.`exporterName` as `Ex_Name`, 
		`x`.`exporterDob` as `Ex_DOB`, 
		`x`.`exporterCode` as `Ex_Code`, 
		`x`.`exporterSex` as `Ex_Gender`,  
		`d`.`districtName` as `Ex_District`,  
		`s`.`subcountyName` as `Ex_Subcounty`,  
		`x`.`exporterVillage` as `Ex_Village`,
		case
		when `x`.`exporterTel` like '+2560%' then '-'
		when `x`.`exporterTel` = '+256' then '-'
		else `x`.`exporterTel`
		end 
		as  `Ex_Tel`,
		`x`.`exporterCropBeans` as `Ex_Crop_Beans`,
		`x`.`exporterCropCoffee` as `Ex_Crop_Coffee`,
		`x`.`exporterCropMaize` as `Ex_Crop_Maize`,
		case
		when `w`.`reportingPeriod` = 'Apr - Sep' 
		and `w`.`year` in (2013) 
		then 'Apr 2013 - Sep 2013'

		when `w`.`reportingPeriod` = 'Oct - Mar' 
		and `w`.`year` in (2013,2014) 
		then 'Oct 2013 - Mar 2014'

		when `w`.`reportingPeriod` = 'Apr - Sep' 
		and `w`.`year` in (2014) 
		then 'Apr 2014 - Sep 2014'

		when `w`.`reportingPeriod` = 'Oct - Mar' 
		and `w`.`year` in (2014,2015) 
		then 'Oct 2014 - Mar 2015'

		when `w`.`reportingPeriod` = 'Apr - Sep' 
		and `w`.`year` in (2015) 
		then 'Apr 2015 - Sep 2015'

		when `w`.`reportingPeriod` = 'Oct - Mar' 
		and `w`.`year` in (2015,2016) 
        and `w`.`DateSubmission` between ('2015-10-01') and ('2016-03-31')
		then 'Oct 2015 - Mar 2016'

		when `w`.`reportingPeriod` = 'Apr - Sep' 
		and `w`.`year` in (2016) 
		then 'Apr 2016 - Sep 2016'

		when `w`.`reportingPeriod` = 'Oct - Mar' 
		and `w`.`year` in (2016,2017) 
        and `w`.`DateSubmission` between ('2016-10-01') and ('2017-03-31')
		then 'Oct 2016 - Mar 2017'

		when `w`.`reportingPeriod` = 'Apr - Sep' 
		and `w`.`year` in (2017) 
		then 'Apr 2017 - Sep 2017'

		when `w`.`reportingPeriod` = 'Oct - Mar' 
		and `w`.`year` in (2017,2018) 
		then 'Oct 2017 - Mar 2018'

		when `w`.`reportingPeriod` = 'Apr - Sep' 
		and `w`.`year` in (2018) 
		then 'Apr 2018 - May 2018'

		else `w`.`reportingPeriod`
		end 
		as  `reportingPeriod`,
		`w`.`year`,
		`w`.`epayMadeFifthQuarterMonth` as `epayMFifthQM`,
		`w`.`epayMadeFirstQuarterMonth` as `epayMFirstQM`,
		`w`.`epayMadeFourthQuarterMonth` as `epayMFourthQM`,
		`w`.`epayMadeSecondQuarterMonth` as `epayMSecondQM`,
		`w`.`epayMadeSixthQuarterMonth` as `epayMSixthQM`,
		`w`.`epayMadeThirdQuarterMonth` as `epayMThirdQM`,

		`w`.`epayRecievedFifthQuarterMonth` as `epayRFifthQM`,
		`w`.`epayRecievedFirstQuarterMonth` as `epayRFirstQM`,
		`w`.`epayRecievedFourthQuarterMonth` as `epayRFourthQM`,
		`w`.`epayRecievedSecondQuarterMonth` as `epayRSecondQM`,
		`w`.`epayRecievedSixthQuarterMonth` as `epayRSixthQM`,
		`w`.`epayRecievedThirdQuarterMonth` as `epayRThirdQM`,

		`w`.`exTradersSupplyChainFifthQuarterMonth` as `exTSCFifthQM`,
		`w`.`exTradersSupplyChainFirstQuarterMonth` as `exTSCFirstQM`,
		`w`.`exTradersSupplyChainFourthQuarterMonth` as `exTSCFourthQM`,
		`w`.`exTradersSupplyChainSecondQuarterMonth` as `exTSCSecondQM`,
		`w`.`exTradersSupplyChainSixthQuarterMonth` as `exTSCSixthQM`, 
		`w`.`exTradersSupplyChainThirdQuarterMonth` as `exTSCThirdQM`,
		`w`.`exTradersSupplyChain`,
		`w`.`exTradersSupplyChainDetails`,

		`w`.`exUnionSupplyChainFifthQuarterMonth` as `exUSCFifthQM`, 
		`w`.`exUnionSupplyChainFirstQuarterMonth` as `exUSCFirstQM`, 
		`w`.`exUnionSupplyChainFourthQuarterMonth` as `exUSCFourthQM`, 
		`w`.`exUnionSupplyChainSecondQuarterMonth` as `exUSCSecondQM`, 
		`w`.`exUnionSupplyChainSixthQuarterMonth` as `exUSCSixthQM`,  
		`w`.`exUnionSupplyChainThirdQuarterMonth` as `exUSCThirdQM`,
		`w`.`exUnionsSupplyChainDetails`,

		`w`.`volMaizePurchasedDetails`,
		`w`.`volMaizeExDetails`,
		`w`.`volCoffeeExDetails`,
		`w`.`volBeansExDetails`,
		`w`.`epayRecievedDetails`,
		`w`.`epayMadeDetails`,

		`w`.`volBeansExFifthQuarterMonth` as `volBEFifthQM`,
		`w`.`volBeansExFirstQuarterMonth` as `volBEFirstQM`, 
		`w`.`volBeansExFourthQuarterMonth` as `volBEFourthQM`,
		`w`.`volBeansExSecondQuarterMonth` as `volBESecondQM`,
		`w`.`volBeansExSixthQuarterMonth` as `volBESixthQM`,
		`w`.`volBeansExThirdQuarterMonth` as `volBEThirdQM`,
		`w`.`volBeansExUgx`, `w`.`volBeansExUgxDetails`,

		`w`.`volBeansExUgxFifthQuarterMonth` as `volBEUgxFifthQM`,
		`w`.`volBeansExUgxFirstQuarterMonth` as `volBEUgxFirstQM`,
		`w`.`volBeansExUgxFourthQuarterMonth` as `volBEUgxFourthQM`,
		`w`.`volBeansExUgxSecondQuarterMonth` as `volBEUgxSecondQM`,
		`w`.`volBeansExUgxSixthQuarterMonth` as `volBEUgxSixthQM`,
		`w`.`volBeansExUgxThirdQuarterMonth` as `volBEUgxThirdQM`,

		`w`.`volBeansPurchasedFifthQuarterMonth` as `volBPFifthQM`,
		`w`.`volBeansPurchasedFirstQuarterMonth` as `volBPFirstQM`,
		`w`.`volBeansPurchasedFourthQuarterMonth` as `volBPFourthQM`,
		`w`.`volBeansPurchasedSecondQuarterMonth` as `volBPSecondQM`, 
		`w`.`volBeansPurchasedSixthQuarterMonth` as `volBPSixthQM`,
		`w`.`volBeansPurchasedThirdQuarterMonth` as `volBPThirdQM`, 

		`w`.`volCoffeeExFifthQuarterMonth` as `volCEFifthQM`,
		`w`.`volCoffeeExFirstQuarterMonth` as `volCEFirstQM`,
		`w`.`volCoffeeExFourthQuarterMonth` as `volCEFourthQM`,
		`w`.`volCoffeeExSecondQuarterMonth` as `volCESecondQM`,
		`w`.`volCoffeeExSixthQuarterMonth` as `volCESixthQM`,
		`w`.`volCoffeeExThirdQuarterMonth` as `volCEThirdQM`,
		`w`.`volCoffeeExUgx`,`w`.`volCoffeeExUgxDetails`,

		`w`.`volCoffeeExUgxFifthQuarterMonth` as `volCEUgxFifthQM`,
		`w`.`volCoffeeExUgxFirstQuarterMonth` as `volCEUgxFirstQM`,
		`w`.`volCoffeeExUgxFourthQuarterMonth` as `volCEUgxFourthQM`,
		`w`.`volCoffeeExUgxSecondQuarterMonth` as `volCEUgxSecondQM`,
		`w`.`volCoffeeExUgxSixthQuarterMonth` as `volCEUgxSixthQM`,
		`w`.`volCoffeeExUgxThirdQuarterMonth` as `volCEUgxThirdQM`,

		`w`.`volCoffeePurchasedFifthQuarterMonth` as `volCPFifthQM`,
		`w`.`volCoffeePurchasedFirstQuarterMonth` as `volCPFirstQM`,
		`w`.`volCoffeePurchasedFourthQuarterMonth` as `volCPFourthQM`,
		`w`.`volCoffeePurchasedSecondQuarterMonth` as `volCPSecondQM`,
		`w`.`volCoffeePurchasedSixthQuarterMonth` as `volCPSixthQM`, 
		`w`.`volCoffeePurchasedThirdQuarterMonth` as `volCPThirdQM`,

		`w`.`volMaizeExFifthQuarterMonth` as `volMEFifthQM`,
		`w`.`volMaizeExFirstQuarterMonth` as `volMEFirstQM`,
		`w`.`volMaizeExFourthQuarterMonth` as `volMEFourthQM`,
		`w`.`volMaizeExSecondQuarterMonth` as `volMESecondQM`,
		`w`.`volMaizeExSixthQuarterMonth` as `volMESixthQM`,
		`w`.`volMaizeExThirdQuarterMonth` as `volMEThirdQM`,
		`w`.`volMaizeExUgx`, 
		`w`.`volMaizeExUgxDetails`,

		`w`.`volMaizeExUgxFifthQuarterMonth` as `volMEUgxFifthQM`,
		`w`.`volMaizeExUgxFirstQuarterMonth` as `volMEUgxFirstQM`,
		`w`.`volMaizeExUgxFourthQuarterMonth` as `volMEUgxFourthQM`,
		`w`.`volMaizeExUgxSecondQuarterMonth` as `volMEUgxSecondQM`,
		`w`.`volMaizeExUgxSixthQuarterMonth` as `volMEUgxSixthQM`,
		`w`.`volMaizeExUgxThirdQuarterMonth` as `volMEUgxThirdQM`,

		`w`.`volMaizePurchasedFifthQuarterMonth` as `volMPFifthQM`,
		`w`.`volMaizePurchasedFirstQuarterMonth` as `volMPFirstQM`,
		`w`.`volMaizePurchasedFourthQuarterMonth` as `volMPFourthQM`,
		`w`.`volMaizePurchasedSecondQuarterMonth` as `volMPSecondQM`,
		`w`.`volMaizePurchasedSixthQuarterMonth` as `volMPSixthQM`,
		`w`.`volMaizePurchasedThirdQuarterMonth` as `volMPThirdQM`
		FROM 
		`tbl_form3_exporters` as `w`,
		`tbl_exporters` as `x`,
		`tbl_district` as `d`,
		`tbl_subcounty` as `s`
		WHERE 1=1
		and `w`.`tbl_exporterId` = `x`.`tbl_exportersId`
		".$reporting_period."
		".$reporting_year."
		AND `d`.`districtCode`=`x`.`exporterDistrict`
		AND `d`.`Display`='Yes' 
		AND `d`.`districtCode`=`s`.`districtCode`
		AND `s`.`subcountyCode`=`x`.`exporterSubcounty`
		AND `s`.`Display`='Yes' 
		AND `w`.`display`='Yes'
		ORDER BY w.`tbl_form3_exportersId` DESC";

		return $sql;


    }
	
	function form4RawDataToExcel($reportingYear,$reportingPeriod){
		//$append_dateRange=((($fromDate)!='') and (($toDate)!=''))?" and t.trainingDate between ('".$fromDate."') and ('".$toDate."')":"";
		$reportingYearToPeriod='';
		$reportingPeriodToDateRange='';
		$reportingYearToPeriodCleaned='';
	switch($reportingYear){
        case trim('Project start up'):
      $reportingYearToPeriod="and `w`.`reportingPeriod` in ('Apr - Sep') 
      and `w`.`year` in (2013)";
      break;
				case'CPMA Year One':
				$reportingYearToPeriod="and `w`.`reportingPeriod` in ('Oct - Mar','Apr - Sep') 
				
				and `w`.`year` in (2012,2013)";
				break;
				
				case'CPMA Year Two':
				$reportingYearToPeriod="and `w`.`reportingPeriod` in ('Oct - Mar','Apr - Sep') 
				and `w`.`year` in (2013,2014)";
				break;
				
				case'CPMA Year Three':
				$reportingYearToPeriod="and `w`.`reportingPeriod` in ('Oct - Mar','Apr - Sep') 
				
				and `w`.`year` in (2014,2015)";
				break;
				
				case trim('CPMA Year Three'):
      $reportingYearToPeriod="and `w`.`reportingPeriod` in ('Oct - Mar','Apr - Sep') 
      and `w`.`year` in (2015,2016)
      and `w`.`DateSubmission` between ('2015-10-01') and ('2016-03-31')";
      break;
      
      case trim('CPMA Year Four'):
      $reportingYearToPeriod="and `w`.`reportingPeriod` in ('Oct - Mar','Apr - Sep') 
      and `w`.`year` in (2016,2017)
      and `w`.`DateSubmission` between ('2016-10-01') and ('2017-03-31')";
      break;    
				
				case'CPMA Year Six':
				$reportingYearToPeriod="and `w`.`reportingPeriod` in ('Oct - Mar','Apr - Sep') 
				
				and `w`.`year` in (2017,2018)";
				break;
				
				default:
				break;
			}
			
        switch($reportingPeriod){

                   case trim('Project start up'):
      $reportingYearToPeriodCleaned="
      and `w`.`reportingPeriod` = 'Apr - Sep' 
     
      and `w`.`year` in (2013)
      ";
      break;
            case'Oct 2012 - Mar 2013':
            $reportingYearToPeriodCleaned="
            and `w`.`reportingPeriod` = 'Oct - Mar' 
           
            and `w`.`year` in (2012,2013)
            ";
            break;
            
            case'Apr 2013 - Sep 2013':
            $reportingYearToPeriodCleaned="
            and `w`.`reportingPeriod` = 'Apr - Sep' 
            
            and `w`.`year` in (2013)
            ";
            break;
            
            case'Oct 2013 - Mar 2014':
            $reportingYearToPeriodCleaned="
            and `w`.`reportingPeriod` = 'Oct - Mar' 
            
            and `w`.`year` in (2013,2014)
            ";
            break;
            
            case'Apr 2014 - Sep 2014':
            $reportingYearToPeriodCleaned="
            and `w`.`reportingPeriod` = 'Apr - Sep' 
            
            and `w`.`year` in (2014)
            ";
            break;
            
            case'Oct 2014 - Mar 2015':
            $reportingYearToPeriodCleaned="
            and `w`.`reportingPeriod` = 'Oct - Mar' 
            
            and `w`.`year` in (2014,2015)
            ";
            break;
            
            case'Apr 2015 - Sep 2015':
            $reportingYearToPeriodCleaned="
            and `w`.`reportingPeriod` = 'Apr - Sep' 
            
            and `w`.`year` in (2015)
            ";
            break;
            
            case trim('Oct 2015 - Mar 2016'):
      $reportingYearToPeriodCleaned="
      and `w`.`reportingPeriod` = 'Oct - Mar' 
      and `w`.`year` in (2015,2016)
      and `w`.`DateSubmission` between ('2015-10-01') and ('2016-03-31')
      ";
      break;
      
      case trim('Apr 2016 - Sep 2016'):
      $reportingYearToPeriodCleaned="
      and `w`.`reportingPeriod` = 'Apr - Sep' 
      and `w`.`year` in (2016)
      ";
      break;
      
      case trim('Oct 2016 - Mar 2017'):
      $reportingYearToPeriodCleaned="
      and `w`.`reportingPeriod` = 'Oct - Mar' 
      and `w`.`year` in (2016,2017)
      and `w`.`DateSubmission` between ('2016-10-01') and ('2017-03-31')
      ";
      break;
            
            case'Apr 2017 - Sep 2017':
            $reportingYearToPeriodCleaned="
            and `w`.`reportingPeriod` = 'Apr - Sep' 
            
            and `w`.`year` in (2017)
            ";
            break;
            
            case'Oct 2017 – Mar 2018':
            $reportingYearToPeriodCleaned="
            and `w`.`reportingPeriod` = 'Oct - Mar' 
            
            and `w`.`year` in (2017,2018)
            ";
            break;
            
            case'Apr 2018 – May 2018':
            $reportingYearToPeriodCleaned="
            and `w`.`reportingPeriod` = 'Apr - Sep' 
            
            and `w`.`year` in (2018)
            ";
            break;
            
            
            break;
            
            default:
            break;
        }

        $reporting_period=(!empty($reportingYear))?'':$reportingPeriod;
         $reporting_year=(!empty($reportingPeriod))?'':$reportingYear;
         $reporting_period=(!empty($reportingPeriod))?" ".$reportingYearToPeriodCleaned." ":"";
         $reporting_year=(!empty($reportingYear))?" ".$reportingYearToPeriod." ":"";
        

			$sql = "select 
			1 as `#`,
			`x`.`traderName` as `Tr_Name`, 
			`x`.`traderDob` as `Tr_DOB`, 
			CONCAT((space(2)), `x`.`traderCode`)  as `Tr_Code`, 
			`x`.`traderSex` as `Tr_Gender`,  
			`d`.`districtName` as `Tr_District`,  
			`s`.`subcountyName` as `Tr_Subcounty`,  
			`x`.`traderVillage` as `Tr_Village`,
			 case
				when `x`.`traderTel` like '+2560%' then '-'
				when `x`.`traderTel` = '+256' then '-'
			else CONCAT((space(2)), `x`.`traderTel`) 
			end 
			as  `Tr_Tel`,
			`x`.`traderCropBeans` as `Tr_Crop_Beans`,
			`x`.`traderCropCoffee` as `Tr_Crop_Coffee`,
			`x`.`traderCropMaize` as `Tr_Crop_Maize`,
            case
			when `w`.`reportingPeriod` = 'Oct - Mar' 
    and `w`.`year` in (2012,2013) 
    then 'Oct 2012 - Mar 2013'
    
    when `w`.`reportingPeriod` = 'Apr - Sep' 
    and `w`.`year` in (2013) 
    then 'Apr 2013 - Sep 2013'
    
    when `w`.`reportingPeriod` = 'Oct - Mar' 
    and `w`.`year` in (2013,2014) 
    then 'Oct 2013 - Mar 2014'
    
    when `w`.`reportingPeriod` = 'Apr - Sep' 
    and `w`.`year` in (2014) 
    then 'Apr 2014 - Sep 2014'
    
    when `w`.`reportingPeriod` = 'Oct - Mar' 
    and `w`.`year` in (2014,2015) 
    then 'Oct 2014 - Mar 2015'
    
    when `w`.`reportingPeriod` = 'Apr - Sep'  
    and `w`.`year` in (2015) 
    then 'Apr 2015 - Sep 2015'
    
    when `w`.`reportingPeriod` = 'Oct - Mar' 
    and `w`.`year` in (2015,2016) 
    and `w`.`DateSubmission` between ('2015-10-01') and ('2016-03-31')
    then 'Oct 2015 - Mar 2016'
    
    when `w`.`reportingPeriod` = 'Apr - Sep' 
    and `w`.`year` in (2016) 
    then 'Apr 2016 - Sep 2016'
    
    when `w`.`reportingPeriod` = 'Oct - Mar'
    and `w`.`DateSubmission` between ('2016-10-01') and ('2017-03-31')
    and `w`.`year` in (2016,2017) 
    then 'Oct 2016 - Mar 2017'
    
    when `w`.`reportingPeriod` = 'Apr - Sep' 
    and `w`.`year` in (2017) 
    then 'Apr 2017 - Sep 2017'
    
    when `w`.`reportingPeriod` = 'Oct - Mar' 
    and `w`.`year` in (2017,2018) 
    then 'Oct 2017 - Mar 2018'
    
    when `w`.`reportingPeriod` = 'Apr - Sep'  
    and `w`.`year` in (2017) 
    then 'Apr 2018 - Sep 2018'
    
else `w`.`reportingPeriod`
end 
                as  `reportingPeriod`,
			`w`.`year`,
			`w`.`epayMadeFirstQuarterMonth` as `epayMade-Oct`,
			`w`.`epayMadeSecondQuarterMonth` as `epayMade-Nov`,
			`w`.`epayMadeThirdQuarterMonth` as `epayMade-Dec`,
			`w`.`epayMadeFourthQuarterMonth` as `epayMade-Jan`,
			`w`.`epayMadeFifthQuarterMonth` as `epayMade-Feb`,
			`w`.`epayMadeSixthQuarterMonth` as `epayMade-Mar`,
			`w`.`epayMadeDetails` as `epayMade_Oct-Mar`,
			`w`.`epayRecievedFirstQuarterMonth` as `epayRecieved-Oct`,
			`w`.`epayRecievedSecondQuarterMonth` as `epayRecieved-Nov`,
			`w`.`epayRecievedThirdQuarterMonth` as `epayRecieved-Dec`,
			`w`.`epayRecievedFourthQuarterMonth` as `epayRecieved-Jan`,
			`w`.`epayRecievedFifthQuarterMonth` as `epayRecieved-Feb`,
			`w`.`epayRecievedSixthQuarterMonth` as `epayRecieved-Mar`,
			`w`.`epayRecievedDetails` as `epayRecieved_Oct-Mar`,
			`w`.`vaSupplyChainFirstQuarterMonth` as `VAsInSupplyChain-Oct`,
			`w`.`vaSupplyChainSecondQuarterMonth` as `VAsInSupplyChain-Nov`,
			`w`.`vaSupplyChainThirdQuarterMonth` as `VAsInSupplyChain-Dec`,
			`w`.`vaSupplyChainFourthQuarterMonth` as `VAsInSupplyChain-Jan`,
			`w`.`vaSupplyChainFifthQuarterMonth` as `VAsInSupplyChain-Feb`,
			`w`.`vaSupplyChainSixthQuarterMonth` as `VAsInSupplyChain-Mar`,
			`w`.`vaSupplyChainDetails` as `VAsInSupplyChain_Details_Oct-Mar`,
			`w`.`numCboFirstQuarterMonth` as `CBOsInSupplyChain-Oct`,
			`w`.`numCboSecondQuarterMonth` as `CBOsInSupplyChain-Nov`,
			`w`.`numCboThirdQuarterMonth` as `CBOsInSupplyChain-Dec`,
			`w`.`numCboFourthQuarterMonth` as `CBOsInSupplyChain-Jan`,
			`w`.`numCboFifthQuarterMonth` as `CBOsInSupplyChain-Feb`,
			`w`.`numCboSixthQuarterMonth` as `CBOsInSupplyChain-Mar`,
			`w`.`numCboDetails` as `CBOsInSupplyChainDetails_Oct-Mar`,
			`w`.`volBeansExFirstQuarterMonth` as `vol_Beans_Exported-Oct`,
			`w`.`volBeansExSecondQuarterMonth` as `vol_Beans_Exported-Nov`,
			`w`.`volBeansExThirdQuarterMonth` as `vol_Beans_Exported-Dec`,
			`w`.`volBeansExFourthQuarterMonth` as `vol_Beans_Exported-Jan`,
			`w`.`volBeansExFifthQuarterMonth` as `vol_Beans_Exported-Feb`,
			`w`.`volBeansExSixthQuarterMonth` as `vol_Beans_Exported-Mar`,
			`w`.`volBeansExDetails` as `vol_Beans_Exported_Details_Oct-Mar`,
			`w`.`volBeansExUgx` as `vol_Amount_UGX_Oct-Mar`,
			`w`.`volBeansExUgxFirstQuarterMonth` as `vol_Amount_UGX_Beans_Exported-Oct`,
			`w`.`volBeansExUgxSecondQuarterMonth` as `vol_Amount_UGX_Beans_Exported-Nov`,
			`w`.`volBeansExUgxThirdQuarterMonth` as `vol_Amount_UGX_Beans_Exported-Dec`,
			`w`.`volBeansExUgxFourthQuarterMonth` as `vol_Amount_UGX_Beans_Exported-Jan`,
			`w`.`volBeansExUgxFifthQuarterMonth` as `vol_Amount_UGX_Beans_Exported-Feb`,
			`w`.`volBeansExUgxSixthQuarterMonth` as `vol_Amount_UGX_Beans_Exported-Mar`,
			`w`.`volBeansExUgxDetails` as `vol_Amount_UGX_Beans_Exported_Details_Oct-Mar`,
			`w`.`volBeansPurchasedFirstQuarterMonth` as `vol_Purchased_Beans_Exporter-Oct`,
			`w`.`volBeansPurchasedSecondQuarterMonth` as `vol_Purchased_Beans_Exporter-Nov`,
			`w`.`volBeansPurchasedThirdQuarterMonth` as `vol_Purchased_Beans_Exporter-Dec`,
			`w`.`volBeansPurchasedFourthQuarterMonth` as `vol_Purchased_Beans_Exporter-Jan`,
			`w`.`volBeansPurchasedFifthQuarterMonth` as `vol_Purchased_Beans_Exporter-Feb`,
			`w`.`volBeansPurchasedSixthQuarterMonth` as `vol_Purchased_Beans_Exporter-Mar`,
			`w`.`volCoffeeExFirstQuarterMonth` as `vol_Coffee_Exported-Oct`,
			`w`.`volCoffeeExSecondQuarterMonth` as `vol_Coffee_Exported-Nov`,
			`w`.`volCoffeeExThirdQuarterMonth` as `vol_Coffee_Exported-Dec`,
			`w`.`volCoffeeExFourthQuarterMonth` as `vol_Coffee_Exported-Jan`,
			`w`.`volCoffeeExFifthQuarterMonth` as `vol_Coffee_Exported-Feb`,
			`w`.`volCoffeeExSixthQuarterMonth` as `vol_Coffee_Exported-Mar`,
			`w`.`volCoffeeExDetails` as `vol_Coffee_Exported_Details_Oct-Mar`,
			`w`.`volCoffeeExUgx` as `vol_Amount_UGX`,
			`w`.`volCoffeeExUgxFirstQuarterMonth` as `vol_Amount_UGX_Coffee_Exported-Oct`,
			`w`.`volCoffeeExUgxSecondQuarterMonth` as `vol_Amount_UGX_Coffee_Exported-Nov`,
			`w`.`volCoffeeExUgxThirdQuarterMonth` as `vol_Amount_UGX_Coffee_Exported-Dec`,
			`w`.`volCoffeeExUgxFourthQuarterMonth` as `vol_Amount_UGX_Coffee_Exported-Jan`,
			`w`.`volCoffeeExUgxFifthQuarterMonth` as `vol_Amount_UGX_Coffee_Exported-Feb`,
			`w`.`volCoffeeExUgxSixthQuarterMonth` as `vol_Amount_UGX_Coffee_Exported-Mar`,
			`w`.`volCoffeeExUgxDetails` as `vol_Amount_UGX_Coffee_Exported_Details_Oct-Mar`,
			`w`.`volCoffeePurchasedFirstQuarterMonth` as `vol_Purchased_Coffee_Exporter-Oct`,
			`w`.`volCoffeePurchasedSecondQuarterMonth` as `vol_Purchased_Coffee_Exporter-Nov`,
			`w`.`volCoffeePurchasedThirdQuarterMonth` as `vol_Purchased_Coffee_Exporter-Dec`,
			`w`.`volCoffeePurchasedFourthQuarterMonth` as `vol_Purchased_Coffee_Exporter-Jan`,
			`w`.`volCoffeePurchasedFifthQuarterMonth` as `vol_Purchased_Coffee_Exporter-Feb`,
			`w`.`volCoffeePurchasedSixthQuarterMonth` as `vol_Purchased_Coffee_Exporter-Mar`,
			`w`.`volMaizeExFirstQuarterMonth` as `vol_Maize_Exported-Oct`,
			`w`.`volMaizeExSecondQuarterMonth` as `vol_Maize_Exported-Nov`,
			`w`.`volMaizeExThirdQuarterMonth` as `vol_Maize_Exported-Dec`,
			`w`.`volMaizeExFourthQuarterMonth` as `vol_Maize_Exported-Jan`,
			`w`.`volMaizeExFifthQuarterMonth` as `vol_Maize_Exported-Feb`,
			`w`.`volMaizeExSixthQuarterMonth` as `vol_Maize_Exported-Mar`,
			`w`.`volMaizeExDetails` as `vol_Maize_Exported_Details_Oct-Mar`,
			`w`.`volMaizeExUgx` as `vol_Amount_UGX`,
			`w`.`volMaizeExUgxFirstQuarterMonth` as `vol_Amount_UGX_Maize_Exported-Oct`,
			`w`.`volMaizeExUgxSecondQuarterMonth` as `vol_Amount_UGX_Maize_Exported-Nov`,
			`w`.`volMaizeExUgxThirdQuarterMonth` as `vol_Amount_UGX_Maize_Exported-Dec`,
			`w`.`volMaizeExUgxFourthQuarterMonth` as `vol_Amount_UGX_Maize_Exported-Jan`,
			`w`.`volMaizeExUgxFifthQuarterMonth` as `vol_Amount_UGX_Maize_Exported-Feb`,
			`w`.`volMaizeExUgxSixthQuarterMonth` as `vol_Amount_UGX_Maize_Exported-Mar`,
			`w`.`volMaizeExUgxDetails` as `vol_Amount_UGX_Maize_Exported_Details_Oct-Mar`,
			`w`.`volMaizePurchasedFirstQuarterMonth` as `vol_Purchased_Maize_Exporter-Oct`,
			`w`.`volMaizePurchasedSecondQuarterMonth` as `vol_Purchased_Maize_Exporter-Nov`,
			`w`.`volMaizePurchasedThirdQuarterMonth` as `vol_Purchased_Maize_Exporter-Dec`,
			`w`.`volMaizePurchasedFourthQuarterMonth` as `vol_Purchased_Maize_Exporter-Jan`,
			`w`.`volMaizePurchasedFifthQuarterMonth` as `vol_Purchased_Maize_Exporter-Feb`,
			`w`.`volMaizePurchasedSixthQuarterMonth` as `vol_Purchased_Maize_Exporter-Mar`
			from 
			`tbl_form4_traders` as `w`,
			`tbl_traders` as `x`,
			`tbl_district` as `d`,
			`tbl_subcounty` as `s`
			where 1=1
			and `w`.`tbl_traderId` = `x`.`tbl_tradersId`
			".$reporting_period."
            ".$reporting_year."
			and `d`.`districtCode`=`x`.`traderDistrict`
			and `d`.`Display`='Yes' 
			and `d`.`districtCode`=`s`.`districtCode`
			and `s`.`subcountyCode`=`x`.`traderSubcounty`
			and `s`.`Display`='Yes' 
			and `w`.`display`='Yes'
			order by w.`tbl_form4_tradersId` desc";
			
		return $sql;


	}


    function form6RawDataToExcel($reportingYear,$reportingPeriod){
       // $append_dateRange=((($fromDate)!='') and (($toDate)!=''))?" p.interview_date between ('".$fromDate."') and ('".$toDate."')":"";

        $reportingYearToPeriod='';
        $reportingPeriodToDateRange='';
               $reportingYearToPeriodCleaned='';
        
        $sql = "select 
						1 as `#`,
				p.interview_date as `Date_Surveyed`,
				f.farmersName as `Farmer_Name`,
				f.tbl_farmersId as `Farmer_Code`,
				f.farmersSex as `Farmer_Gender`,
				z.zoneName as `Farmer_Region`,
				d.districtName as `Farmer_District`,
				s.subcountyName as `Farmer_Sub-County`,
				f.farmersVillage as `Farmer_Village`,
				p.respondent as `Respondent`,
				case
					when p.`farmer_crop_maize` = '1' then 'Yes'
					when p.`farmer_crop_maize` = '0' then 'No'
				else 'null'
				end 
				as `farmer_crop_maize`,
				case
					when p.`farmer_crop_beans` = '1' then 'Yes'
					when p.`farmer_crop_beans` = '0' then 'No'
				else 'null'
				end 
				as `farmer_crop_beans`,
				case
					when p.`farmer_crop_coffee` = '1' then 'Yes'
					when p.`farmer_crop_coffee` = '0' then 'No'
				else 'null'
				end 
				as `farmer_crop_coffee`,
				case
					when m.farmer_crop_maize_crop = '1' then 'Yes'
					when m.farmer_crop_maize_crop = '2' then 'No'
				else 'null'
				end 
				as `farmer_crop_maize_crop`,
				replace(replace(replace(replace(concat(
				(replace(m.maize_other_crop, '1', 'Beans,')), 
				(replace(m.maize_other_crop, '2', 'Coffee,')), 
				(replace(m.maize_other_crop, '3', 'Others,')),
				(replace(m.maize_other_crop, ' ', 'null,'))
				),'1',''),'2',''),'3',''),' ','') as  `Other_Crop_Planted_Maize`,
				COALESCE(m.maize_other_crop_other, 'null') as `Maize_Other_Crop`,
				case
					when m.maize_acreage = ' ' then 'null'
				else m.maize_acreage
				end 
				as `maize_acreage`,
				case
					when m.maize_mapped = '1' then 'Yes'
					when m.maize_mapped = '2' then 'No'
				else 'null'
				end 
				as `Land_Mapped`,
				replace(replace(replace(replace(replace(replace(replace(replace(concat(
				(replace(m.maize_equipment_openingland, '0', 'None,')), 
				(replace(m.maize_equipment_openingland, '1', 'Use of Tractor,')), 
				(replace(m.maize_equipment_openingland, '2', 'Oxen-Ploughing,')), 
				(replace(m.maize_equipment_openingland, '3', 'Hand hoe Ploughing,')),
				(replace(m.maize_equipment_openingland, '4', 'Spraying/Use of herbicides,')),
				(replace(m.maize_equipment_openingland, '5', 'Use of rippers')),
				(replace(m.maize_equipment_openingland, '6', 'Basin conservation technology')),
				(replace(m.maize_equipment_openingland, ' ', 'null'))
				),'0',''),'1',''),'2',''),'3',''),'4',''),'5',''),'6',''),' ','') as  `Maize_Equipment_Used`,

				replace(replace(replace(replace(concat(
				(replace(m.maize_seed_variety, '1', 'Home saved/local seeds,')), 
				(replace(m.maize_seed_variety, '2', 'Improved seed-Hybrid,')), 
				(replace(m.maize_seed_variety, '3', 'Improved seed-Open pollinated variety(OPVs),')),
				(replace(m.maize_seed_variety, ' ', 'null,'))
				),'1',''),'2',''),'3',''),' ','') as  `Maize_Seed_Variety`,

				replace(replace(replace(replace(replace(replace(concat(
				(replace(m.maize_improvedseeds_notuse, '1', 'High cost of improved seeds, canít afford,')), 
				(replace(m.maize_improvedseeds_notuse, '2', 'Lack of knowledge about improved seeds,')), 
				(replace(m.maize_improvedseeds_notuse, '3', 'Donít knowwhere to access Improved seeds/ not available in the market,')), 
				(replace(m.maize_improvedseeds_notuse, '4', 'Frustrated because of counterfeit seeds,')), 
				(replace(m.maize_improvedseeds_notuse, '5', 'Others,')),
				(replace(m.maize_improvedseeds_notuse, ' ', 'null'))
				),'1',''),'2',''),'3',''),'4',''),'5',''),' ','')as  `Maize_Improvedseeds_Notuse`,

				case
					when m.maize_improvedseeds_notuse_other = ' ' then 'null'
				else m.maize_improvedseeds_notuse_other
				end 
				as `Maize_improvedseeds_notuse_other`,
				replace(replace(replace(replace(replace(replace(replace(replace(replace(replace(replace(concat(
				(replace(m.maize_improvedseeds_benefits, '1', 'Good yields/ Better quality,')), 
				(replace(m.maize_improvedseeds_benefits, '2', 'Labour saving,')), 
				(replace(m.maize_improvedseeds_benefits, '3', 'Pests and Disease tolerant,')), 
				(replace(m.maize_improvedseeds_benefits, '4', 'Drought tolerant ,')),
				(replace(m.maize_improvedseeds_benefits, '5', 'Early Maturity,')),
				(replace(m.maize_improvedseeds_benefits, '6', 'Market demand')),
				(replace(m.maize_improvedseeds_benefits, '7', 'Cost of improved seeds was affordable')),
				(replace(m.maize_improvedseeds_benefits, '8', 'Easily accessible')),
				(replace(m.maize_improvedseeds_benefits, '9', 'Advised by friend/VA/extension worker')),
				(replace(m.maize_improvedseeds_benefits, '10', 'Others')),
				(replace(m.maize_improvedseeds_benefits, ' ', 'null'))
				),'1',''),'2',''),'3',''),'4',''),'5',''),'6',''),'7',''),'8',''),'9',''),'10',''),' ','')
				as  `Maize_Improvedseeds_Benefits`,
				case
					when m.maize_improvedseeds_benefits_other = ' ' then 'null'
				else m.maize_improvedseeds_benefits_other
				end 
				as `maize_improvedseeds_benefits_other`,
				replace(replace(replace(replace(replace(replace(replace(replace(replace(concat(
				(replace(m.maize_improvedseed_supplier, '1', 'Stockist through VARM,')), 
				(replace(m.maize_improvedseed_supplier, '2', 'Village Agents,')), 
				(replace(m.maize_improvedseed_supplier, '3', 'Stockist,')), 
				(replace(m.maize_improvedseed_supplier, '4', 'Bought in the market/shop ,')),
				(replace(m.maize_improvedseed_supplier, '5', 'Got from another farmer,')),
				(replace(m.maize_improvedseed_supplier, '6', 'Direct from manufacturer')),
				(replace(m.maize_improvedseed_supplier, '7', 'Container Village in Kampala,')),
				(replace(m.maize_improvedseed_supplier, '8', 'Others')),
				(replace(m.maize_improvedseed_supplier, ' ', 'null'))
				),'1',''),'2',''),'3',''),'4',''),'5',''),'6',''),'7',''),'8',''),' ','')
				as  `Maize_Improvedseeds_Supplier`,
				case
					when m.maize_improvedseed_supplier_other = ' ' then 'null'
				else m.maize_improvedseed_supplier_other
				end 
				as `maize_improvedseed_supplier_other`,

				case
					when m.maize_improvedseed_properusage = '1' then 'Yes'
					when m.maize_improvedseed_properusage = '2' then 'No'
				else 'null'
				end 
				as `Maize_Improvedseed_Properusage`,

				m.maize_acreage_improvedseeds as `Landsize_Maize_Improvedseeds`,
				replace(replace(replace(replace(replace(replace(replace(concat(
				(replace(m.maize_equipment_planting, '1', 'Zero tillage Planters,')), 
				(replace(m.maize_equipment_planting, '2', 'Non-Zero tillage Planters,')), 
				(replace(m.maize_equipment_planting, '3', 'Basin conservation planting,')), 
				(replace(m.maize_equipment_planting, '4', 'Spacing using robes and hand hoe,')), 
				(replace(m.maize_equipment_planting, '5', 'Spacing using hand hoe only,')), 
				(replace(m.maize_equipment_planting, '6', 'Broadcasting/sowing,')),
				(replace(m.maize_equipment_planting, ' ', 'null,'))
				),'1',''),'2',''),'3',''),'4',''),'5',''),'6',''),'6','')  as  `MaizeEquipmentMethod_Planting`,

				case
					when m.maize_equipment_planting_other = ' ' then 'null'
				else m.maize_equipment_planting_other
				end 
				as `maize_equipment_planting_other`,


				replace(replace(replace(replace(replace(replace(concat(
				(replace(m.maize_improvedseeds_notuse, '1', 'Myself/ used family labour,')), 
				(replace(m.maize_improvedseeds_notuse, '2', 'Hired causal labourers,')), 
				(replace(m.maize_improvedseeds_notuse, '3', 'Hired specialized services provider,')), 
				(replace(m.maize_improvedseeds_notuse, '4', 'Used members of a group,')), 
				(replace(m.maize_improvedseeds_notuse, '5', 'Village Agent,')),
				(replace(m.maize_improvedseeds_notuse, ' ', 'null,'))
				),'1',''),'2',''),'3',''),'4',''),'5',''),' ','') as  `Maize_Whoplanted`,

				case
					when m.maize_whoplanted_Other = ' ' then 'null'
				else m.maize_whoplanted_Other
				end 
				as `maize_whoplanted_Other`,
				case
					when m.maize_fertilizer_use = '2' then 'Yes, 1st fertilizer application(DAP)only'
					when m.maize_fertilizer_use = '1' then 'No'
					when m.maize_fertilizer_use = '3' then 'Yes, 2nd fertilizer application(UREA) only'
					when m.maize_fertilizer_use = '4' then 'Yes, both 1st and 2nd fertilizer application'
				else 'null'
				end 
				as `Maize_Fertilizer_use`,
				replace(replace(replace(replace(replace(replace(concat(
				(replace(m.maize_fertlizer_notuse, '1', 'High cost of fertilizers, canít afford,')), 
				(replace(m.maize_fertlizer_notuse, '2', 'Labour intensive,')), 
				(replace(m.maize_fertlizer_notuse, '3', 'Lack of knowledge about use of fertilizers,')), 
				(replace(m.maize_fertlizer_notuse, '4', 'Donít know where to access fertilizers seeds/ not available in the market,')), 
				(replace(m.maize_fertlizer_notuse, '5', 'Frustrated because of counterfeit fertilizers,')),
				(replace(m.maize_fertlizer_notuse, ' ', 'null,'))
				),'1',''),'2',''),'3',''),'4',''),'5',''),' ','') as  `Maize_Fertlizer_Notuse`,
				case
					when m.maize_fertlizer_notuse_other = ' ' then 'null'
				else m.maize_fertlizer_notuse_other
				end 
				as`maize_fertlizer_notuse_other`,

				replace(replace(replace(replace(replace(replace(replace(replace(replace(concat(
				(replace(m.maize_fertilizer_benefits, '1', 'Good yields/ Better quality,')), 
				(replace(m.maize_fertilizer_benefits, '2', 'Pests and Disease tolerant,')), 
				(replace(m.maize_fertilizer_benefits, '3', 'Drought tolerant,')), 
				(replace(m.maize_fertilizer_benefits, '4', 'Early Maturity ,')),
				(replace(m.maize_fertilizer_benefits, '5', 'Cost of fertilizer was affordable,')),
				(replace(m.maize_fertilizer_benefits, '6', 'Easily accessible')),
				(replace(m.maize_fertilizer_benefits, '7', 'Advised by friend/VA/extension worker,')),
				(replace(m.maize_fertilizer_benefits, '8', 'Others')),
				(replace(m.maize_fertilizer_benefits, ' ', 'null'))
				),'1',''),'2',''),'3',''),'4',''),'5',''),'6',''),'7',''),'8',''),' ','')
				as  `Maize_Fertilizer_Benefits`,
				case
					when m.maize_fertilizer_benefits_other = ' ' then 'null'
				else m.maize_fertilizer_benefits_other
				end 
				as`maize_fertilizer_benefits_other`,
				replace(replace(replace(replace(replace(replace(replace(replace(replace(concat(
				(replace(m.maize_fertilizer_supplier, '1', 'Stockist through VARM,')), 
				(replace(m.maize_fertilizer_supplier, '2', 'Village Agents,')), 
				(replace(m.maize_fertilizer_supplier, '3', 'Stockist,')), 
				(replace(m.maize_fertilizer_supplier, '4', 'Bought in the market/shop,')),
				(replace(m.maize_fertilizer_supplier, '5', 'Got from another farmer,')),
				(replace(m.maize_fertilizer_supplier, '6', 'Direct from manufacturer')),
				(replace(m.maize_fertilizer_supplier, '7', 'Container Village in Kampala,')),
				(replace(m.maize_fertilizer_supplier, '8', 'Others')),
				(replace(m.maize_fertilizer_supplier, ' ', 'null'))
				),'1',''),'2',''),'3',''),'4',''),'5',''),'6',''),'7',''),'8',''),' ','')
				as  `Maize_Fertilizer_Supplier`,
				case
					when m.maize_fertilizer_supplier_other = ' ' then 'null'
				else m.maize_fertilizer_supplier_other
				end 
				as`maize_fertilizer_supplier_other`,
				case
					when m.maize_fertilizer_properusage = '1' then 'Yes'
					when m.maize_fertilizer_properusage = '2' then 'No'
				else 'null'
				end 
				as `Maize_Fertilizer_Properusage`,
				replace(replace(replace(replace(replace(replace(concat(
				(replace(m.maize_ferilizer_whosupplied, '1', 'Myself/ used family labour,')), 
				(replace(m.maize_ferilizer_whosupplied, '2', 'Hired causal labourers,')), 
				(replace(m.maize_ferilizer_whosupplied, '3', 'Hired specialized services provider,')), 
				(replace(m.maize_ferilizer_whosupplied, '4', 'Used members of a group,')), 
				(replace(m.maize_ferilizer_whosupplied, '5', 'Village Agent,')),
				(replace(m.maize_ferilizer_whosupplied, ' ', 'null,'))
				),'1',''),'2',''),'3',''),'4',''),'5',''),' ','') as  `Maize_WhoApplied`,

				case
					when m.maize_ferilizer_whosupplied_other = ' ' then 'null'
				else m.maize_ferilizer_whosupplied_other
				end 
				as`maize_ferilizer_whosupplied_other`,

				case
					when m.maize_acreage_fertilizer = ' ' then 'null'
				else m.maize_acreage_fertilizer
				end 
				as `Maize_Land_fertilizers`,

				replace(replace(replace(replace(replace(replace(concat(
				(replace(m.maize_chemical_use, '0', 'Weeding using hand hoe/picking weed,')), 
				(replace(m.maize_chemical_use, '1', 'Weeding using machinery,')), 
				(replace(m.maize_chemical_use, '2', 'Sprayed crop with selective herbicides,')), 
				(replace(m.maize_chemical_use, '3', 'Sprayed crop with Pesticides,')), 
				(replace(m.maize_chemical_use, '4', 'Sprayed crop with fungicides,')),
				(replace(m.maize_chemical_use, ' ', 'null,'))
				),'0',''),'1',''),'2',''),'3',''),'4',''),' ','') as  `Maize_Chemical_Use`,

				case
					when m.maize_chemical_use_other = ' ' then 'null'
				else m.maize_chemical_use_other
				end 
				as`Maize_Chemical_use_other`,

				replace(replace(replace(replace(replace(replace(concat(
				(replace(m.maize_chemical_notuse, '1', 'High cost of agricultural chemicals, canít afford,')), 
				(replace(m.maize_chemical_notuse, '2', 'Labour intensive,')), 
				(replace(m.maize_chemical_notuse, '3', 'Lack of knowledge about use of agricultural chemicals,')), 
				(replace(m.maize_chemical_notuse, '4', 'Donít know where to access agricultural chemicals/ not available in the market,')), 
				(replace(m.maize_chemical_notuse, '5', 'Frustrated because of counterfeit agricultural chemicals,')),
				(replace(m.maize_chemical_notuse, ' ', 'null,'))
				),'1',''),'2',''),'3',''),'4',''),'5',''),' ','') as  `Maize_Chemicals_NotUse`,

				case
					when m.maize_chemical_notuse_other = ' ' then 'null'
				else m.maize_chemical_notuse_other
				end 
				as`maize_chemical_notuse_other`,


				replace(replace(replace(replace(replace(replace(replace(replace(replace(concat(
				(replace(m.maize_chemical_benefits, '1', 'Good yields/ Better quality,')), 
				(replace(m.maize_chemical_benefits, '2', 'Labour saving,')), 
				(replace(m.maize_chemical_benefits, '3', 'Pests and Disease control,')), 
				(replace(m.maize_chemical_benefits, '4', 'Drought toleran,')),
				(replace(m.maize_chemical_benefits, '5', 'Early Maturity,')),
				(replace(m.maize_chemical_benefits, '6', 'Cost of chemicals was affordable')),
				(replace(m.maize_chemical_benefits, '7', 'Easily accessible,')),
				(replace(m.maize_chemical_benefits, '8', 'Advised by friend/VA/extension worker,')),
				(replace(m.maize_chemical_benefits, '9', 'Others')),
				(replace(m.maize_chemical_benefits, ' ', 'null'))
				),'1',''),'2',''),'3',''),'4',''),'5',''),'6',''),'7',''),'8',''),' ','')
				as  `Maize_Chemicals_Benefits`,

				case
					when m.maize_chemical_benefits_other = ' ' then 'null'
				else m.maize_chemical_benefits_other
				end
				as `maize_chemical_benefits_other`,

				replace(replace(replace(replace(replace(replace(replace(replace(replace(concat(
				(replace(m.maize_chemical_supplier, '1', 'Stockist through VARM,')), 
				(replace(m.maize_chemical_supplier, '2', 'Village Agents,')), 
				(replace(m.maize_chemical_supplier, '3', 'Stockist,')), 
				(replace(m.maize_chemical_supplier, '4', 'Bought in the market/shop,')),
				(replace(m.maize_chemical_supplier, '5', 'Got from another farmer,')),
				(replace(m.maize_chemical_supplier, '6', 'Direct from manufacturer')),
				(replace(m.maize_chemical_supplier, '7', 'Container Village in Kampala,')),
				(replace(m.maize_chemical_supplier, '8', 'Others')),
				(replace(m.maize_chemical_supplier, ' ', 'null'))
				),'1',''),'2',''),'3',''),'4',''),'5',''),'6',''),'7',''),'8',''),' ','')
				as  `Maize_Chemicals_Supplier`,

				case
					when m.maize_chemical_supplier_other = ' ' then 'null'
				else m.maize_chemical_supplier_other
				end 
				as `maize_chemical_supplier_other`,
				case
					when m.maize_chemicals_properusage = '1' then 'Yes'
					when m.maize_chemicals_properusage = '2' then 'No'
				else 'null'
				end 
				as `Maize_Chemicals_Properusage`,

				replace(replace(replace(replace(replace(replace(concat(
				(replace(m.maize_chemical_whoapplied, '1', 'Myself/ used family labour,')), 
				(replace(m.maize_chemical_whoapplied, '2', 'Hired causal labourers,')), 
				(replace(m.maize_chemical_whoapplied, '3', 'Hired specialized services provider,')), 
				(replace(m.maize_chemical_whoapplied, '4', 'Used members of a group,')), 
				(replace(m.maize_chemical_whoapplied, '5', 'Village Agent,')),
				(replace(m.maize_chemical_whoapplied, ' ', 'null,'))
				),'1',''),'2',''),'3',''),'4',''),'5',''),' ','') as  `Maize_Chemicals_WhoApplied`,

				case
					when m.maize_chemical_whoapplied_other = ' ' then 'null'
				else m.maize_chemical_whoapplied_other
				end 
				as `maize_chemical_whoapplied_other`,
				case
					when m.maize_acreage_chemicals = ' ' then 'null'
				else m.maize_acreage_chemicals
				end 
				as `Maize_Land_Chemicals`,
				case
					when m.maize_detect_counterfeit = '1' then 'Yes'
					when m.maize_detect_counterfeit = '2' then 'No'
				else 'null'
				end 
				as `Maize_Detect_Counterfeit`,

				case
					when m.maize_opinion = '1' then 'Decreased a great deal'
					when m.maize_opinion = '2' then 'Decreased quite a bit'
					when m.maize_opinion = '3' then 'Decreased somewhat'
					when m.maize_opinion = '4' then 'Decrease is Very little'
					when m.maize_opinion = '5' then 'No decrease  at all'
				else 'null'
				end 
				as `Maize_Opinion`,
				case
					when m.maize_counterfeit_improvedseeds = '1' then 'All were counterfeit/fake'
					when m.maize_counterfeit_improvedseeds = '2' then 'Some were counterfeit/fake'
					when m.maize_counterfeit_improvedseeds = '3' then 'All was good/not counterfeit'
				else 'null'
				end 
				as `Maize_Counterfeit_Improvedseeds`,
				case
					when m.maize_counterfeit_herbicides = '1' then 'All were counterfeit/fake'
					when m.maize_counterfeit_herbicides = '2' then 'Some were counterfeit/fake'
					when m.maize_counterfeit_herbicides = '3' then 'All was good/not counterfeit'
				else 'null'
				end 
				as `Maize_Counterfeit_Herbicides`,
				case
					when m.maize_counterfeit_pesticides = '1' then 'All were counterfeit/fake'
					when m.maize_counterfeit_pesticides = '2' then 'Some were counterfeit/fake'
					when m.maize_counterfeit_pesticides = '3' then 'All was good/not counterfeit'
				else 'null'
				end 
				as `Maize_Counterfeit_Pesticides`,
				case
					when m.maize_counterfeit_Fungicides = '1' then 'All were counterfeit/fake'
					when m.maize_counterfeit_Fungicides = '2' then 'Some were counterfeit/fake'
					when m.maize_counterfeit_Fungicides = '3' then 'All was good/not counterfeit'
				else 'null'
				end 
				as `Maize_Counterfeit_Fungicides`,

				case
					when m.maize_counterfeit_Fertilizers = '1' then 'All were counterfeit/fake'
					when m.maize_counterfeit_Fertilizers = '2' then 'Some were counterfeit/fake'
					when m.maize_counterfeit_Fertilizers = '3' then 'All was good/not counterfeit'
				else 'null'
				end 
				as `Maize_Counterfeit_Fertilizers`,
				replace(replace(replace(replace(replace(concat(
				(replace(m.maize_avoid_counterfeits, '1', 'Through information receivedfrom VA/extension workers/training/ radio about fake products ,I know how to avoid them,')), 
				(replace(m.maize_avoid_counterfeits, '2', 'I am buying in bulk with other farmers,')), 
				(replace(m.maize_avoid_counterfeits, '3', 'I am using more trusted sources of supply,')), 
				(replace(m.maize_avoid_counterfeits, '4', 'Others,')),
				(replace(m.maize_avoid_counterfeits, ' ', 'null,'))
				),'1',''),'2',''),'3',''),'4',''),' ','') as  `Maize_Avoid_Counterfeits`,

				case
					when m.maize_avoid_counterfeits_other = ' ' then 'null'
				else m.maize_avoid_counterfeits_other
				end 
				as `maize_avoid_counterfeits_other`,

				replace(replace(replace(replace(replace(replace(replace(replace(concat(
				(replace(m.maize_dry_harvested, '1', 'Ordinary sun drying on bear ground,')), 
				(replace(m.maize_dry_harvested, '2', 'Used Tarpaulins,')), 
				(replace(m.maize_dry_harvested, '3', 'Maize cribs,')), 
				(replace(m.maize_dry_harvested, '4', 'Used solar dryers with panel,')), 
				(replace(m.maize_dry_harvested, '5', 'Used solar dryer without panels,')), 
				(replace(m.maize_dry_harvested, '6', 'Used locally fabricated mechanical dyers,')),
				(replace(m.maize_dry_harvested, '7', 'Used  imported mechanical dryers,')),
				(replace(m.maize_dry_harvested, ' ', 'null,'))
				),'1',''),'2',''),'3',''),'4',''),'5',''),'6',''),'7',''),' ','') as  `Maize_Dry_Harvested`,

				case
					when m.maize_dry_harvested_other = ' ' then 'null'
				else m.maize_dry_harvested_other
				end 
				as `maize_dry_harvested_other`,

				replace(replace(replace(replace(replace(concat(
				(replace(m.maize_shell_use, '1', 'Bare hands,')), 
				(replace(m.maize_shell_use, '2', 'Suck and stick,')), 
				(replace(m.maize_shell_use, '3', 'Mobile Shellers,')), 
				(replace(m.maize_shell_use, '4', 'Others,')),
				(replace(m.maize_shell_use, ' ', 'null,'))
				),'1',''),'2',''),'3',''),'4',''),' ','') as  `Maize_Shelling_Use`,

				case
					when m.maize_shell_use_other = ' ' then 'null'
				else m.maize_shell_use_other
				end 
				as `maize_shell_use_other`,
				replace(replace(replace(replace(replace(replace(replace(replace(concat(
				(replace(m.maize_storage, '1', 'Ordinary storage house not on bags,')), 
				(replace(m.maize_storage, '2', 'Owned warehouse,')), 
				(replace(m.maize_storage, '3', 'Hired warehouse,')), 
				(replace(m.maize_storage, '4', 'Maize cribs,')), 
				(replace(m.maize_storage, '5', 'Silos/metal tanks,')), 
				(replace(m.maize_storage, '6', 'Grain /grain pic bags,')),
				(replace(m.maize_storage, '7', 'Others,')),
				(replace(m.maize_storage, ' ', 'null,'))
				),'1',''),'2',''),'3',''),'4',''),'5',''),'6',''),'7',''),' ','') as  `Maize_Storage`,

				case
					when m.maize_storage_other = ' ' then 'null'
				else m.maize_storage_other
				end 
				as `maize_storage_other`,
				m.maize_cost_production as `Maize_Cost_Production`,
				m.maize_cost_production_machinery as `maize_cost_production_machinery`,
				m.maize_cost_production_improvedseed as `maize_cost_production_improvedseed`,
				m.maize_cost_production_fertilizers as `maize_cost_production_fertilizers`,
				m.maize_cost_production_chemicals as `maize_cost_production_chemicals`,
				m.maize_cost_production_storage as `maize_cost_production_storage`,
				m.maize_cost_production_transportation as `maize_cost_production_transportation`,
				m.maize_cost_production_labour as `maize_cost_production_labour`,
				m.maize_cost_production_other as `maize_cost_production_other`,
				m.maize_harvested as `maize_harvested`,
				m.maize_sold as `maize_sold`,
				m.maize_sold_lastperiod as `maize_sold_lastperiod`,
				m.maize_sold_price as `maize_sold_price`,
				m.maize_harvest_loss as `maize_harvest_loss`,
				replace(replace(replace(replace(replace(replace(concat(
				(replace(m.maize_aware_standard, '1', 'Completely aware,')), 
				(replace(m.maize_aware_standard, '2', 'Largely aware,')), 
				(replace(m.maize_aware_standard, '3', 'Partly aware,')), 
				(replace(m.maize_aware_standard, '4', 'Slightly aware,')),
				(replace(m.maize_aware_standard, '5', 'Not aware at all,')),
				(replace(m.maize_aware_standard, ' ', 'null,'))
				),'1',''),'2',''),'3',''),'4',''),'5',''),' ','') as  `Maize_Aware_Standard`,

				case
					when b.farmer_crop_beans_crop = '1' then 'Yes'
					when b.farmer_crop_beans_crop = '2' then 'No'
				else 'null'
				end 
				as `farmer_crop_beans_crop`,
				replace(replace(replace(replace(concat(
				(replace(b.beans_other_crop, '1', 'Maize,')), 
				(replace(b.beans_other_crop, '2', 'Coffee,')), 
				(replace(b.beans_other_crop, '3', 'Others,')),
				(replace(b.beans_other_crop, ' ', 'null,'))
				),'1',''),'2',''),'3',''),' ','') as  `Other_Crop_Planted_Beans`,
				COALESCE(b.beans_other_crop_other, 'null') as `Beans_Other_Crop`,
				COALESCE(b.beans_acreage, 'null') as `beans_acreage`,
				case
					when b.beans_mapped = '1' then 'Yes'
					when b.beans_mapped = '2' then 'No'
				else 'null'
				end 
				as `Land_Mapped`,
				replace(replace(replace(replace(replace(replace(replace(replace(concat(
				(replace(b.beans_equipment_openingland, '0', 'None,')), 
				(replace(b.beans_equipment_openingland, '1', 'Use of Tractor,')), 
				(replace(b.beans_equipment_openingland, '2', 'Oxen-Ploughing,')), 
				(replace(b.beans_equipment_openingland, '3', 'Hand hoe Ploughing,')),
				(replace(b.beans_equipment_openingland, '4', 'Spraying/Use of herbicides,')),
				(replace(b.beans_equipment_openingland, '5', 'Use of rippers')),
				(replace(b.beans_equipment_openingland, '6', 'Basin conservation technology')),
				(replace(b.beans_equipment_openingland, ' ', 'null'))
				),'0',''),'1',''),'2',''),'3',''),'4',''),'5',''),'6',''),' ','') as  `Beans_Equipment_Used`,

				replace(replace(replace(replace(concat(
				(replace(b.beans_seed_variety, '1', 'Home saved/local seeds,')), 
				(replace(b.beans_seed_variety, '2', 'Improved seed-Hybrid,')), 
				(replace(b.beans_seed_variety, '3', 'Improved seed-Open pollinated variety(OPVs),')),
				(replace(b.beans_seed_variety, ' ', 'null,'))
				),'1',''),'2',''),'3',''),' ','') as  `Beans_Seed_Variety`,

				replace(replace(replace(replace(replace(replace(concat(
				(replace(b.beans_improvedseeds_notuse, '1', 'High cost of improved seeds, canít afford,')), 
				(replace(b.beans_improvedseeds_notuse, '2', 'Lack of knowledge about improved seeds,')), 
				(replace(b.beans_improvedseeds_notuse, '3', 'Donít knowwhere to access Improved seeds/ not available in the market,')), 
				(replace(b.beans_improvedseeds_notuse, '4', 'Frustrated because of counterfeit seeds,')), 
				(replace(b.beans_improvedseeds_notuse, '5', 'Others,')),
				(replace(b.beans_improvedseeds_notuse, ' ', 'null'))
				),'1',''),'2',''),'3',''),'4',''),'5',''),' ','')as  `Beans_Improvedseeds_Notuse`,
				COALESCE(b.beans_improvedseeds_notuse_other, 'null') as `Beans_improvedseeds_notuse_other`,
				replace(replace(replace(replace(replace(replace(replace(replace(replace(replace(replace(concat(
				(replace(b.beans_improvedseeds_benefits, '1', 'Good yields/ Better quality,')), 
				(replace(b.beans_improvedseeds_benefits, '2', 'Labour saving,')), 
				(replace(b.beans_improvedseeds_benefits, '3', 'Pests and Disease tolerant,')), 
				(replace(b.beans_improvedseeds_benefits, '4', 'Drought tolerant ,')),
				(replace(b.beans_improvedseeds_benefits, '5', 'Early Maturity,')),
				(replace(b.beans_improvedseeds_benefits, '6', 'Market demand')),
				(replace(b.beans_improvedseeds_benefits, '7', 'Cost of improved seeds was affordable')),
				(replace(b.beans_improvedseeds_benefits, '8', 'Easily accessible')),
				(replace(b.beans_improvedseeds_benefits, '9', 'Advised by friend/VA/extension worker')),
				(replace(b.beans_improvedseeds_benefits, '10', 'Others')),
				(replace(b.beans_improvedseeds_benefits, ' ', 'null'))
				),'1',''),'2',''),'3',''),'4',''),'5',''),'6',''),'7',''),'8',''),'9',''),'10',''),' ','')
				as  `Beans_Improvedseeds_Benefits`,
				COALESCE(b.beans_improvedseeds_benefits_other, 'null') as `beans_improvedseeds_benefits_other`,
				replace(replace(replace(replace(replace(replace(replace(replace(replace(concat(
				(replace(b.beans_improvedseed_supplier, '1', 'Stockist through VARM,')), 
				(replace(b.beans_improvedseed_supplier, '2', 'Village Agents,')), 
				(replace(b.beans_improvedseed_supplier, '3', 'Stockist,')), 
				(replace(b.beans_improvedseed_supplier, '4', 'Bought in the market/shop ,')),
				(replace(b.beans_improvedseed_supplier, '5', 'Got from another farmer,')),
				(replace(b.beans_improvedseed_supplier, '6', 'Direct from manufacturer')),
				(replace(b.beans_improvedseed_supplier, '7', 'Container Village in Kampala,')),
				(replace(b.beans_improvedseed_supplier, '8', 'Others')),
				(replace(b.beans_improvedseed_supplier, ' ', 'null'))
				),'1',''),'2',''),'3',''),'4',''),'5',''),'6',''),'7',''),'8',''),' ','')
				as  `Beans_Improvedseeds_Supplier`,
				COALESCE(b.beans_improvedseed_supplier_other, 'null') as `beans_improvedseed_supplier_other`,
				case
					when b.beans_improvedseed_properusage = '1' then 'Yes'
					when b.beans_improvedseed_properusage = '2' then 'No'
				else 'null'
				end 
				as `Beans_Improvedseed_Properusage`,

				b.beans_acreage_improvedseeds as `Landsize_Beans_Improvedseeds`,
				replace(replace(replace(replace(replace(replace(replace(concat(
				(replace(b.beans_equipment_planting, '1', 'Zero tillage Planters,')), 
				(replace(b.beans_equipment_planting, '2', 'Non-Zero tillage Planters,')), 
				(replace(b.beans_equipment_planting, '3', 'Basin conservation planting,')), 
				(replace(b.beans_equipment_planting, '4', 'Spacing using robes and hand hoe,')), 
				(replace(b.beans_equipment_planting, '5', 'Spacing using hand hoe only,')), 
				(replace(b.beans_equipment_planting, '6', 'Broadcasting/sowing,')),
				(replace(b.beans_equipment_planting, ' ', 'null,'))
				),'1',''),'2',''),'3',''),'4',''),'5',''),'6',''),'6','')  as  `BeansEquipmentMethod_Planting`,
				COALESCE(b.beans_equipment_planting_other, 'null') as `beans_equipment_planting_other`,
				replace(replace(replace(replace(replace(replace(concat(
				(replace(b.beans_improvedseeds_notuse, '1', 'Myself/ used family labour,')), 
				(replace(b.beans_improvedseeds_notuse, '2', 'Hired causal labourers,')), 
				(replace(b.beans_improvedseeds_notuse, '3', 'Hired specialized services provider,')), 
				(replace(b.beans_improvedseeds_notuse, '4', 'Used members of a group,')), 
				(replace(b.beans_improvedseeds_notuse, '5', 'Village Agent,')),
				(replace(b.beans_improvedseeds_notuse, ' ', 'null,'))
				),'1',''),'2',''),'3',''),'4',''),'5',''),' ','') as  `Beans_Whoplanted`,
				COALESCE(b.beans_whoplanted_Other, 'null') as `beans_whoplanted_Other`,
				case
					when b.beans_fertilizer_use = '2' then 'Yes, 1st fertilizer application(DAP)only'
					when b.beans_fertilizer_use = '1' then 'No'
					when b.beans_fertilizer_use = '3' then 'Yes, 2nd fertilizer application(UREA) only'
					when b.beans_fertilizer_use = '4' then 'Yes, both 1st and 2nd fertilizer application'
				else 'null'
				end 
				as `Beans_Fertilizer_use`,
				replace(replace(replace(replace(replace(replace(concat(
				(replace(b.beans_fertlizer_notuse, '1', 'High cost of fertilizers, canít afford,')), 
				(replace(b.beans_fertlizer_notuse, '2', 'Labour intensive,')), 
				(replace(b.beans_fertlizer_notuse, '3', 'Lack of knowledge about use of fertilizers,')), 
				(replace(b.beans_fertlizer_notuse, '4', 'Donít know where to access fertilizers seeds/ not available in the market,')), 
				(replace(b.beans_fertlizer_notuse, '5', 'Frustrated because of counterfeit fertilizers,')),
				(replace(b.beans_fertlizer_notuse, ' ', 'null,'))
				),'1',''),'2',''),'3',''),'4',''),'5',''),' ','') as  `Beans_Fertlizer_Notuse`,
				COALESCE(b.beans_fertlizer_notuse_other, 'null') as `beans_fertlizer_notuse_other`,
				replace(replace(replace(replace(replace(replace(replace(replace(replace(concat(
				(replace(b.beans_fertilizer_benefits, '1', 'Good yields/ Better quality,')), 
				(replace(b.beans_fertilizer_benefits, '2', 'Pests and Disease tolerant,')), 
				(replace(b.beans_fertilizer_benefits, '3', 'Drought tolerant,')), 
				(replace(b.beans_fertilizer_benefits, '4', 'Early Maturity ,')),
				(replace(b.beans_fertilizer_benefits, '5', 'Cost of fertilizer was affordable,')),
				(replace(b.beans_fertilizer_benefits, '6', 'Easily accessible')),
				(replace(b.beans_fertilizer_benefits, '7', 'Advised by friend/VA/extension worker,')),
				(replace(b.beans_fertilizer_benefits, '8', 'Others')),
				(replace(b.beans_fertilizer_benefits, ' ', 'null'))
				),'1',''),'2',''),'3',''),'4',''),'5',''),'6',''),'7',''),'8',''),' ','')
				as  `Beans_Fertilizer_Benefits`,
				COALESCE(b.beans_fertilizer_benefits_other, 'null') as `beans_fertilizer_benefits_other`,
				replace(replace(replace(replace(replace(replace(replace(replace(replace(concat(
				(replace(b.beans_fertilizer_supplier, '1', 'Stockist through VARM,')), 
				(replace(b.beans_fertilizer_supplier, '2', 'Village Agents,')), 
				(replace(b.beans_fertilizer_supplier, '3', 'Stockist,')), 
				(replace(b.beans_fertilizer_supplier, '4', 'Bought in the market/shop,')),
				(replace(b.beans_fertilizer_supplier, '5', 'Got from another farmer,')),
				(replace(b.beans_fertilizer_supplier, '6', 'Direct from manufacturer')),
				(replace(b.beans_fertilizer_supplier, '7', 'Container Village in Kampala,')),
				(replace(b.beans_fertilizer_supplier, '8', 'Others')),
				(replace(b.beans_fertilizer_supplier, ' ', 'null'))
				),'1',''),'2',''),'3',''),'4',''),'5',''),'6',''),'7',''),'8',''),' ','')
				as  `Beans_Fertilizer_Supplier`,
				COALESCE(b.beans_fertilizer_supplier_other, 'null') as `beans_fertilizer_supplier_other`,
				case
					when b.beans_fertilizer_properusage = '1' then 'Yes'
					when b.beans_fertilizer_properusage = '2' then 'No'
				else 'null'
				end 
				as `Beans_Fertilizer_Properusage`,
				replace(replace(replace(replace(replace(replace(concat(
				(replace(b.beans_ferilizer_whosupplied, '1', 'Myself/ used family labour,')), 
				(replace(b.beans_ferilizer_whosupplied, '2', 'Hired causal labourers,')), 
				(replace(b.beans_ferilizer_whosupplied, '3', 'Hired specialized services provider,')), 
				(replace(b.beans_ferilizer_whosupplied, '4', 'Used members of a group,')), 
				(replace(b.beans_ferilizer_whosupplied, '5', 'Village Agent,')),
				(replace(b.beans_ferilizer_whosupplied, ' ', 'null,'))
				),'1',''),'2',''),'3',''),'4',''),'5',''),' ','') as  `Beans_WhoApplied`,
				COALESCE(b.beans_ferilizer_whosupplied_other, 'null') as `beans_ferilizer_whosupplied_other`,
				COALESCE(b.beans_acreage_fertilizer, 'null') as `Beans_Land_fertilizers`,
				replace(replace(replace(replace(replace(replace(concat(
				(replace(b.beans_chemical_use, '0', 'Weeding using hand hoe/picking weed,')), 
				(replace(b.beans_chemical_use, '1', 'Weeding using machinery,')), 
				(replace(b.beans_chemical_use, '2', 'Sprayed crop with selective herbicides,')), 
				(replace(b.beans_chemical_use, '3', 'Sprayed crop with Pesticides,')), 
				(replace(b.beans_chemical_use, '4', 'Sprayed crop with fungicides,')),
				(replace(b.beans_chemical_use, ' ', 'null,'))
				),'0',''),'1',''),'2',''),'3',''),'4',''),' ','') as  `Beans_Chemical_Use`,
				COALESCE(b.beans_chemical_use_other, 'null') as `Beans_Chemical_use_other`,
				replace(replace(replace(replace(replace(replace(concat(
				(replace(b.beans_chemical_notuse, '1', 'High cost of agricultural chemicals, canít afford,')), 
				(replace(b.beans_chemical_notuse, '2', 'Labour intensive,')), 
				(replace(b.beans_chemical_notuse, '3', 'Lack of knowledge about use of agricultural chemicals,')), 
				(replace(b.beans_chemical_notuse, '4', 'Donít know where to access agricultural chemicals/ not available in the market,')), 
				(replace(b.beans_chemical_notuse, '5', 'Frustrated because of counterfeit agricultural chemicals,')),
				(replace(b.beans_chemical_notuse, ' ', 'null,'))
				),'1',''),'2',''),'3',''),'4',''),'5',''),' ','') as  `Beans_Chemicals_NotUse`,
				COALESCE(b.beans_chemical_notuse_other, 'null') as `beans_chemical_notuse_other`,
				replace(replace(replace(replace(replace(replace(replace(replace(replace(concat(
				(replace(b.beans_chemical_benefits, '1', 'Good yields/ Better quality,')), 
				(replace(b.beans_chemical_benefits, '2', 'Labour saving,')), 
				(replace(b.beans_chemical_benefits, '3', 'Pests and Disease control,')), 
				(replace(b.beans_chemical_benefits, '4', 'Drought toleran,')),
				(replace(b.beans_chemical_benefits, '5', 'Early Maturity,')),
				(replace(b.beans_chemical_benefits, '6', 'Cost of chemicals was affordable')),
				(replace(b.beans_chemical_benefits, '7', 'Easily accessible,')),
				(replace(b.beans_chemical_benefits, '8', 'Advised by friend/VA/extension worker,')),
				(replace(b.beans_chemical_benefits, '9', 'Others')),
				(replace(b.beans_chemical_benefits, ' ', 'null'))
				),'1',''),'2',''),'3',''),'4',''),'5',''),'6',''),'7',''),'8',''),' ','')
				as  `Beans_Chemicals_Benefits`,
				COALESCE(b.beans_chemical_benefits_other, 'null') as `beans_chemical_benefits_other`,
				replace(replace(replace(replace(replace(replace(replace(replace(replace(concat(
				(replace(b.beans_chemical_supplier, '1', 'Stockist through VARM,')), 
				(replace(b.beans_chemical_supplier, '2', 'Village Agents,')), 
				(replace(b.beans_chemical_supplier, '3', 'Stockist,')), 
				(replace(b.beans_chemical_supplier, '4', 'Bought in the market/shop,')),
				(replace(b.beans_chemical_supplier, '5', 'Got from another farmer,')),
				(replace(b.beans_chemical_supplier, '6', 'Direct from manufacturer')),
				(replace(b.beans_chemical_supplier, '7', 'Container Village in Kampala,')),
				(replace(b.beans_chemical_supplier, '8', 'Others')),
				(replace(b.beans_chemical_supplier, ' ', 'null'))
				),'1',''),'2',''),'3',''),'4',''),'5',''),'6',''),'7',''),'8',''),' ','')
				as  `Beans_Chemicals_Supplier`,
				COALESCE(b.beans_chemical_supplier_other, 'null') as `beans_chemical_supplier_other`,
				COALESCE(b.beans_chemicals_properusage, 'null') as `Beans_Chemicals_Properusage`,
				replace(replace(replace(replace(replace(replace(concat(
				(replace(b.beans_chemical_whoapplied, '1', 'Myself/ used family labour,')), 
				(replace(b.beans_chemical_whoapplied, '2', 'Hired causal labourers,')), 
				(replace(b.beans_chemical_whoapplied, '3', 'Hired specialized services provider,')), 
				(replace(b.beans_chemical_whoapplied, '4', 'Used members of a group,')), 
				(replace(b.beans_chemical_whoapplied, '5', 'Village Agent,')),
				(replace(b.beans_chemical_whoapplied, ' ', 'null,'))
				),'1',''),'2',''),'3',''),'4',''),'5',''),' ','') as  `Beans_Chemicals_WhoApplied`,
				COALESCE(b.beans_chemical_whoapplied_other, 'null') as `beans_chemical_whoapplied_other`,
				COALESCE(b.beans_acreage_chemicals, 'null') as `Beans_Land_Chemicals`,
				case
					when b.beans_detect_counterfeit = '1' then 'Yes'
					when b.beans_detect_counterfeit = '2' then 'No'
				else 'null'
				end 
				as `Beans_Detect_Counterfeit`,

				case
					when b.beans_opinion = '1' then 'Decreased a great deal'
					when b.beans_opinion = '2' then 'Decreased quite a bit'
					when b.beans_opinion = '3' then 'Decreased somewhat'
					when b.beans_opinion = '4' then 'Decrease is Very little'
					when b.beans_opinion = '5' then 'No decrease  at all'
				else 'null'
				end 
				as `Beans_Opinion`,
				case
					when b.beans_counterfeit_improvedseeds = '1' then 'All were counterfeit/fake'
					when b.beans_counterfeit_improvedseeds = '2' then 'Some were counterfeit/fake'
					when b.beans_counterfeit_improvedseeds = '3' then 'All was good/not counterfeit'
				else 'null'
				end 
				as `Beans_Counterfeit_Improvedseeds`,
				case
					when b.beans_counterfeit_herbicides = '1' then 'All were counterfeit/fake'
					when b.beans_counterfeit_herbicides = '2' then 'Some were counterfeit/fake'
					when b.beans_counterfeit_herbicides = '3' then 'All was good/not counterfeit'
				else 'null'
				end 
				as `Beans_Counterfeit_Herbicides`,
				case
					when b.beans_counterfeit_pesticides = '1' then 'All were counterfeit/fake'
					when b.beans_counterfeit_pesticides = '2' then 'Some were counterfeit/fake'
					when b.beans_counterfeit_pesticides = '3' then 'All was good/not counterfeit'
				else 'null'
				end 
				as `Beans_Counterfeit_Pesticides`,
				case
					when b.beans_counterfeit_Fungicides = '1' then 'All were counterfeit/fake'
					when b.beans_counterfeit_Fungicides = '2' then 'Some were counterfeit/fake'
					when b.beans_counterfeit_Fungicides = '3' then 'All was good/not counterfeit'
				else 'null'
				end 
				as `Beans_Counterfeit_Fungicides`,

				case
					when b.beans_counterfeit_Fertilizers = '1' then 'All were counterfeit/fake'
					when b.beans_counterfeit_Fertilizers = '2' then 'Some were counterfeit/fake'
					when b.beans_counterfeit_Fertilizers = '3' then 'All was good/not counterfeit'
				else 'null'
				end 
				as `Beans_Counterfeit_Fertilizers`,
				replace(replace(replace(replace(replace(concat(
				(replace(b.beans_avoid_counterfeits, '1', 'Through information receivedfrom VA/extension workers/training/ radio about fake products ,I know how to avoid them,')), 
				(replace(b.beans_avoid_counterfeits, '2', 'I am buying in bulk with other farmers,')), 
				(replace(b.beans_avoid_counterfeits, '3', 'I am using more trusted sources of supply,')), 
				(replace(b.beans_avoid_counterfeits, '4', 'Others,')),
				(replace(b.beans_avoid_counterfeits, ' ', 'null,'))
				),'1',''),'2',''),'3',''),'4',''),' ','') as  `Beans_Avoid_Counterfeits`,
				COALESCE(b.beans_avoid_counterfeits_other, 'null') as `beans_avoid_counterfeits_other`,
				replace(replace(replace(replace(replace(replace(replace(replace(concat(
				(replace(b.beans_dry_harvested, '1', 'Ordinary sun drying on bear ground,')), 
				(replace(b.beans_dry_harvested, '2', 'Used Tarpaulins,')), 
				(replace(b.beans_dry_harvested, '3', 'Beans cribs,')), 
				(replace(b.beans_dry_harvested, '4', 'Used solar dryers with panel,')), 
				(replace(b.beans_dry_harvested, '5', 'Used solar dryer without panels,')), 
				(replace(b.beans_dry_harvested, '6', 'Used locally fabricated mechanical dyers,')),
				(replace(b.beans_dry_harvested, '7', 'Used  imported mechanical dryers,')),
				(replace(b.beans_dry_harvested, ' ', 'null,'))
				),'1',''),'2',''),'3',''),'4',''),'5',''),'6',''),'7',''),' ','') as  `Beans_Dry_Harvested`,
				COALESCE(b.beans_dry_harvested_other, 'null') as `beans_dry_harvested_other`,
				replace(replace(replace(replace(replace(concat(
				(replace(b.beans_shell_use, '1', 'Bare hands,')), 
				(replace(b.beans_shell_use, '2', 'Suck and stick,')), 
				(replace(b.beans_shell_use, '3', 'Mobile Shellers,')), 
				(replace(b.beans_shell_use, '4', 'Others,')),
				(replace(b.beans_shell_use, ' ', 'null,'))
				),'1',''),'2',''),'3',''),'4',''),' ','') as  `Beans_Shelling_Use`,
				COALESCE(b.beans_shell_use_other, 'null') as `beans_shell_use_other`,
				replace(replace(replace(replace(replace(replace(replace(replace(concat(
				(replace(b.beans_storage, '1', 'Ordinary storage house not on bags,')), 
				(replace(b.beans_storage, '2', 'Owned warehouse,')), 
				(replace(b.beans_storage, '3', 'Hired warehouse,')), 
				(replace(b.beans_storage, '4', 'Beans cribs,')), 
				(replace(b.beans_storage, '5', 'Silos/metal tanks,')), 
				(replace(b.beans_storage, '6', 'Grain /grain pic bags,')),
				(replace(b.beans_storage, '7', 'Others,')),
				(replace(b.beans_storage, ' ', 'null,'))
				),'1',''),'2',''),'3',''),'4',''),'5',''),'6',''),'7',''),' ','') as  `Beans_Storage`,
				COALESCE(b.beans_storage_other, 'null') as `beans_storage_other`,
				b.beans_cost_production as `Beans_Cost_Production`,
				b.beans_cost_production_machinery as `beans_cost_production_machinery`,
				b.beans_cost_production_improvedseed as `beans_cost_production_improvedseed`,
				b.beans_cost_production_fertilizers as `beans_cost_production_fertilizers`,
				b.beans_cost_production_chemicals as `beans_cost_production_chemicals`,
				b.beans_cost_production_storage as `beans_cost_production_storage`,
				b.beans_cost_production_transportation as `beans_cost_production_transportation`,
				b.beans_cost_production_labour as `beans_cost_production_labour`,
				b.beans_cost_production_other as `beans_cost_production_other`,
				b.beans_harvested as `beans_harvested`,
				b.beans_sold as `beans_sold`,
				b.beans_sold_lastperiod as `beans_sold_lastperiod`,
				b.beans_sold_price as `beans_sold_price`,
				b.beans_harvest_loss as `beans_harvest_loss`,
				replace(replace(replace(replace(replace(replace(concat(
				(replace(b.beans_aware_standard, '1', 'Completely aware,')), 
				(replace(b.beans_aware_standard, '2', 'Largely aware,')), 
				(replace(b.beans_aware_standard, '3', 'Partly aware,')), 
				(replace(b.beans_aware_standard, '4', 'Slightly aware,')),
				(replace(b.beans_aware_standard, '5', 'Not aware at all,')),
				(replace(b.beans_aware_standard, ' ', 'null,'))
				),'1',''),'2',''),'3',''),'4',''),'5',''),' ','') as  `Beans_Aware_Standard`,



				case
					when c.farmer_crop_coffee_crop = '1' then 'Yes'
					when c.farmer_crop_coffee_crop = '2' then 'No'
				else 'null'
				end 
				as `farmer_crop_coffee_crop`,
				replace(replace(replace(replace(concat(
				(replace(c.coffee_other_crop, '1', 'Maize,')), 
				(replace(c.coffee_other_crop, '2', 'Beans,')), 
				(replace(c.coffee_other_crop, '3', 'Others,')),
				(replace(c.coffee_other_crop, ' ', 'null,'))
				),'1',''),'2',''),'3',''),' ','') as  `Other_Crop_Planted_Coffee`,
				COALESCE(c.coffee_other_crop_other, 'null') as `Coffee_Other_Crop`,
				COALESCE(c.coffee_acreage, 'null') as `coffee_acreage`,
				case
					when c.coffee_mapped = '1' then 'Yes'
					when c.coffee_mapped = '2' then 'No'
				else 'null'
				end 
				as `Land_Mapped`,
				replace(replace(replace(replace(replace(replace(replace(replace(concat(
				(replace(c.coffee_equipment_openingland, '0', 'None,')), 
				(replace(c.coffee_equipment_openingland, '1', 'Use of Tractor,')), 
				(replace(c.coffee_equipment_openingland, '2', 'Oxen-Ploughing,')), 
				(replace(c.coffee_equipment_openingland, '3', 'Hand hoe Ploughing,')),
				(replace(c.coffee_equipment_openingland, '4', 'Spraying/Use of herbicides,')),
				(replace(c.coffee_equipment_openingland, '5', 'Use of rippers')),
				(replace(c.coffee_equipment_openingland, '6', 'Basin conservation technology')),
				(replace(c.coffee_equipment_openingland, ' ', 'null'))
				),'0',''),'1',''),'2',''),'3',''),'4',''),'5',''),'6',''),' ','') as  `Coffee_Equipment_Used`,

				replace(replace(replace(replace(concat(
				(replace(c.coffee_tree_variety, '1', 'Home saved/local trees,')), 
				(replace(c.coffee_tree_variety, '2', 'Improved trees-Hybrid,')), 
				(replace(c.coffee_tree_variety, '3', 'Improved trees-Open pollinated variety(OPVs),')),
				(replace(c.coffee_tree_variety, ' ', 'null,'))
				),'1',''),'2',''),'3',''),' ','') as  `Coffee_Trees_Variety`,

				replace(replace(replace(replace(replace(replace(concat(
				(replace(c.coffee_improvedtrees_notuse, '1', 'High cost of improved trees, canít afford,')), 
				(replace(c.coffee_improvedtrees_notuse, '2', 'Lack of knowledge about improved trees,')), 
				(replace(c.coffee_improvedtrees_notuse, '3', 'Donít knowwhere to access Improved trees/ not available in the market,')), 
				(replace(c.coffee_improvedtrees_notuse, '4', 'Frustrated because of counterfeit trees,')), 
				(replace(c.coffee_improvedtrees_notuse, '5', 'Others,')),
				(replace(c.coffee_improvedtrees_notuse, ' ', 'null'))
				),'1',''),'2',''),'3',''),'4',''),'5',''),' ','')as  `Coffee_Improvedtrees_Notuse`,
				COALESCE(c.Coffee_improvedtrees_notuse_other, 'null') as `Coffee_improvedtrees_notuse_other`,
				replace(replace(replace(replace(replace(replace(replace(replace(replace(replace(replace(concat(
				(replace(c.coffee_improvedtrees_benefits, '1', 'Good yields/ Better quality,')), 
				(replace(c.coffee_improvedtrees_benefits, '2', 'Labour saving,')), 
				(replace(c.coffee_improvedtrees_benefits, '3', 'Pests and Disease tolerant,')), 
				(replace(c.coffee_improvedtrees_benefits, '4', 'Drought tolerant ,')),
				(replace(c.coffee_improvedtrees_benefits, '5', 'Early Maturity,')),
				(replace(c.coffee_improvedtrees_benefits, '6', 'Market demand')),
				(replace(c.coffee_improvedtrees_benefits, '7', 'Cost of improved trees was affordable')),
				(replace(c.coffee_improvedtrees_benefits, '8', 'Easily accessible')),
				(replace(c.coffee_improvedtrees_benefits, '9', 'Advised by friend/VA/extension worker')),
				(replace(c.coffee_improvedtrees_benefits, '10', 'Others')),
				(replace(c.coffee_improvedtrees_benefits, ' ', 'null'))
				),'1',''),'2',''),'3',''),'4',''),'5',''),'6',''),'7',''),'8',''),'9',''),'10',''),' ','')
				as  `Coffee_Improvedtrees_Benefits`,
				COALESCE(c.coffee_improvedtrees_benefits_other, 'null') as `coffee_improvedtrees_benefits_other`,
				replace(replace(replace(replace(replace(replace(replace(replace(replace(concat(
				(replace(c.coffee_improvedtrees_supplier, '1', 'Stockist through VARM,')), 
				(replace(c.coffee_improvedtrees_supplier, '2', 'Village Agents,')), 
				(replace(c.coffee_improvedtrees_supplier, '3', 'Stockist,')), 
				(replace(c.coffee_improvedtrees_supplier, '4', 'Bought in the market/shop ,')),
				(replace(c.coffee_improvedtrees_supplier, '5', 'Got from another farmer,')),
				(replace(c.coffee_improvedtrees_supplier, '6', 'Direct from manufacturer')),
				(replace(c.coffee_improvedtrees_supplier, '7', 'Container Village in Kampala,')),
				(replace(c.coffee_improvedtrees_supplier, '8', 'Others')),
				(replace(c.coffee_improvedtrees_supplier, ' ', 'null'))
				),'1',''),'2',''),'3',''),'4',''),'5',''),'6',''),'7',''),'8',''),' ','')
				as  `Coffee_Improvedtrees_Supplier`,
				COALESCE(c.coffee_improvedtrees_supplier_other, 'null') as `coffee_improvedtrees_supplier_other`,
				case
					when c.coffee_improvedtrees_properusage = '1' then 'Yes'
					when c.coffee_improvedtrees_properusage = '2' then 'No'
				else 'null'
				end 
				as `Coffee_Improvedtrees_Properusage`,

				c.coffee_acreage_improvedtrees as `Landsize_Coffee_Improvedtrees`,
				replace(replace(replace(replace(replace(replace(replace(concat(
				(replace(c.coffee_equipment_planting, '1', 'Zero tillage Planters,')), 
				(replace(c.coffee_equipment_planting, '2', 'Non-Zero tillage Planters,')), 
				(replace(c.coffee_equipment_planting, '3', 'Basin conservation planting,')), 
				(replace(c.coffee_equipment_planting, '4', 'Spacing using robes and hand hoe,')), 
				(replace(c.coffee_equipment_planting, '5', 'Spacing using hand hoe only,')), 
				(replace(c.coffee_equipment_planting, '6', 'Broadcasting/sowing,')),
				(replace(c.coffee_equipment_planting, ' ', 'null,'))
				),'1',''),'2',''),'3',''),'4',''),'5',''),'6',''),'6','')  as  `CoffeeEquipmentMethod_Planting`,
				COALESCE(c.coffee_equipment_planting_other, 'null') as `coffee_equipment_planting_other`,
				replace(replace(replace(replace(replace(replace(concat(
				(replace(c.coffee_improvedtrees_notuse, '1', 'Myself/ used family labour,')), 
				(replace(c.coffee_improvedtrees_notuse, '2', 'Hired causal labourers,')), 
				(replace(c.coffee_improvedtrees_notuse, '3', 'Hired specialized services provider,')), 
				(replace(c.coffee_improvedtrees_notuse, '4', 'Used members of a group,')), 
				(replace(c.coffee_improvedtrees_notuse, '5', 'Village Agent,')),
				(replace(c.coffee_improvedtrees_notuse, ' ', 'null,'))
				),'1',''),'2',''),'3',''),'4',''),'5',''),' ','') as  `Coffee_Whoplanted`,
				COALESCE(c.coffee_whoplanted_Other, 'null') as `coffee_whoplanted_Other`,
				case
					when c.coffee_fertilizer_use = '2' then 'Yes, 1st fertilizer application(DAP)only'
					when c.coffee_fertilizer_use = '1' then 'No'
					when c.coffee_fertilizer_use = '3' then 'Yes, 2nd fertilizer application(UREA) only'
					when c.coffee_fertilizer_use = '4' then 'Yes, both 1st and 2nd fertilizer application'
				else 'null'
				end 
				as `Coffee_Fertilizer_use`,
				replace(replace(replace(replace(replace(replace(concat(
				(replace(c.coffee_fertlizer_notuse, '1', 'High cost of fertilizers, canít afford,')), 
				(replace(c.coffee_fertlizer_notuse, '2', 'Labour intensive,')), 
				(replace(c.coffee_fertlizer_notuse, '3', 'Lack of knowledge about use of fertilizers,')), 
				(replace(c.coffee_fertlizer_notuse, '4', 'Donít know where to access fertilizers trees/ not available in the market,')), 
				(replace(c.coffee_fertlizer_notuse, '5', 'Frustrated because of counterfeit fertilizers,')),
				(replace(c.coffee_fertlizer_notuse, ' ', 'null,'))
				),'1',''),'2',''),'3',''),'4',''),'5',''),' ','') as  `Coffee_Fertlizer_Notuse`,
				COALESCE(c.coffee_fertlizer_notuse_other, 'null') as `coffee_fertlizer_notuse_other`,
				replace(replace(replace(replace(replace(replace(replace(replace(replace(concat(
				(replace(c.coffee_fertilizer_benefits, '1', 'Good yields/ Better quality,')), 
				(replace(c.coffee_fertilizer_benefits, '2', 'Pests and Disease tolerant,')), 
				(replace(c.coffee_fertilizer_benefits, '3', 'Drought tolerant,')), 
				(replace(c.coffee_fertilizer_benefits, '4', 'Early Maturity ,')),
				(replace(c.coffee_fertilizer_benefits, '5', 'Cost of fertilizer was affordable,')),
				(replace(c.coffee_fertilizer_benefits, '6', 'Easily accessible')),
				(replace(c.coffee_fertilizer_benefits, '7', 'Advised by friend/VA/extension worker,')),
				(replace(c.coffee_fertilizer_benefits, '8', 'Others')),
				(replace(c.coffee_fertilizer_benefits, ' ', 'null'))
				),'1',''),'2',''),'3',''),'4',''),'5',''),'6',''),'7',''),'8',''),' ','')
				as  `Coffee_Fertilizer_Benefits`,
				COALESCE(c.coffee_fertilizer_benefits_other, 'null') as `coffee_fertilizer_benefits_other`,
				replace(replace(replace(replace(replace(replace(replace(replace(replace(concat(
				(replace(c.coffee_fertilizer_supplier, '1', 'Stockist through VARM,')), 
				(replace(c.coffee_fertilizer_supplier, '2', 'Village Agents,')), 
				(replace(c.coffee_fertilizer_supplier, '3', 'Stockist,')), 
				(replace(c.coffee_fertilizer_supplier, '4', 'Bought in the market/shop,')),
				(replace(c.coffee_fertilizer_supplier, '5', 'Got from another farmer,')),
				(replace(c.coffee_fertilizer_supplier, '6', 'Direct from manufacturer')),
				(replace(c.coffee_fertilizer_supplier, '7', 'Container Village in Kampala,')),
				(replace(c.coffee_fertilizer_supplier, '8', 'Others')),
				(replace(c.coffee_fertilizer_supplier, ' ', 'null'))
				),'1',''),'2',''),'3',''),'4',''),'5',''),'6',''),'7',''),'8',''),' ','')
				as  `Coffee_Fertilizer_Supplier`,
				COALESCE(c.coffee_fertilizer_supplier_other, 'null') as `coffee_fertilizer_supplier_other`,
				case
					when c.coffee_fertilizer_properusage = '1' then 'Yes'
					when c.coffee_fertilizer_properusage = '2' then 'No'
				else 'null'
				end 
				as `Coffee_Fertilizer_Properusage`,
				replace(replace(replace(replace(replace(replace(concat(
				(replace(c.coffee_ferilizer_whosupplied, '1', 'Myself/ used family labour,')), 
				(replace(c.coffee_ferilizer_whosupplied, '2', 'Hired causal labourers,')), 
				(replace(c.coffee_ferilizer_whosupplied, '3', 'Hired specialized services provider,')), 
				(replace(c.coffee_ferilizer_whosupplied, '4', 'Used members of a group,')), 
				(replace(c.coffee_ferilizer_whosupplied, '5', 'Village Agent,')),
				(replace(c.coffee_ferilizer_whosupplied, ' ', 'null,'))
				),'1',''),'2',''),'3',''),'4',''),'5',''),' ','') as  `Coffee_WhoApplied`,
				COALESCE(c.coffee_ferilizer_whosupplied_other, 'null') as `coffee_ferilizer_whosupplied_other`,
				COALESCE(c.coffee_acreage_fertilizer, 'null') as `Coffee_Land_fertilizers`,
				replace(replace(replace(replace(replace(replace(concat(
				(replace(c.coffee_chemical_use, '0', 'Weeding using hand hoe/picking weed,')), 
				(replace(c.coffee_chemical_use, '1', 'Weeding using machinery,')), 
				(replace(c.coffee_chemical_use, '2', 'Sprayed crop with selective herbicides,')), 
				(replace(c.coffee_chemical_use, '3', 'Sprayed crop with Pesticides,')), 
				(replace(c.coffee_chemical_use, '4', 'Sprayed crop with fungicides,')),
				(replace(c.coffee_chemical_use, ' ', 'null,'))
				),'0',''),'1',''),'2',''),'3',''),'4',''),' ','') as  `Coffee_Chemical_Use`,
				COALESCE(c.coffee_chemical_use_other, 'null') as `coffee_chemical_use_other`,
				replace(replace(replace(replace(replace(replace(concat(
				(replace(c.coffee_chemical_notuse, '1', 'High cost of agricultural chemicals, canít afford,')), 
				(replace(c.coffee_chemical_notuse, '2', 'Labour intensive,')), 
				(replace(c.coffee_chemical_notuse, '3', 'Lack of knowledge about use of agricultural chemicals,')), 
				(replace(c.coffee_chemical_notuse, '4', 'Donít know where to access agricultural chemicals/ not available in the market,')), 
				(replace(c.coffee_chemical_notuse, '5', 'Frustrated because of counterfeit agricultural chemicals,')),
				(replace(c.coffee_chemical_notuse, ' ', 'null,'))
				),'1',''),'2',''),'3',''),'4',''),'5',''),' ','') as  `Coffee_Chemicals_NotUse`,
				COALESCE(c.coffee_chemical_notuse_other, 'null') as `coffee_chemical_notuse_other`,
				replace(replace(replace(replace(replace(replace(replace(replace(replace(concat(
				(replace(c.coffee_chemical_benefits, '1', 'Good yields/ Better quality,')), 
				(replace(c.coffee_chemical_benefits, '2', 'Labour saving,')), 
				(replace(c.coffee_chemical_benefits, '3', 'Pests and Disease control,')), 
				(replace(c.coffee_chemical_benefits, '4', 'Drought toleran,')),
				(replace(c.coffee_chemical_benefits, '5', 'Early Maturity,')),
				(replace(c.coffee_chemical_benefits, '6', 'Cost of chemicals was affordable')),
				(replace(c.coffee_chemical_benefits, '7', 'Easily accessible,')),
				(replace(c.coffee_chemical_benefits, '8', 'Advised by friend/VA/extension worker,')),
				(replace(c.coffee_chemical_benefits, '9', 'Others')),
				(replace(c.coffee_chemical_benefits, ' ', 'null'))
				),'1',''),'2',''),'3',''),'4',''),'5',''),'6',''),'7',''),'8',''),' ','')
				as  `Coffee_Chemicals_Benefits`,
				COALESCE(c.coffee_chemical_benefits_other, 'null') as `coffee_chemical_benefits_other`,
				replace(replace(replace(replace(replace(replace(replace(replace(replace(concat(
				(replace(c.coffee_chemical_supplier, '1', 'Stockist through VARM,')), 
				(replace(c.coffee_chemical_supplier, '2', 'Village Agents,')), 
				(replace(c.coffee_chemical_supplier, '3', 'Stockist,')), 
				(replace(c.coffee_chemical_supplier, '4', 'Bought in the market/shop,')),
				(replace(c.coffee_chemical_supplier, '5', 'Got from another farmer,')),
				(replace(c.coffee_chemical_supplier, '6', 'Direct from manufacturer')),
				(replace(c.coffee_chemical_supplier, '7', 'Container Village in Kampala,')),
				(replace(c.coffee_chemical_supplier, '8', 'Others')),
				(replace(c.coffee_chemical_supplier, ' ', 'null'))
				),'1',''),'2',''),'3',''),'4',''),'5',''),'6',''),'7',''),'8',''),' ','')
				as  `Coffee_Chemicals_Supplier`,
				COALESCE(c.coffee_chemical_supplier_other, 'null') as `coffee_chemical_supplier_other`,
				case
					when c.coffee_chemicals_properusage = '1' then 'Yes'
					when c.coffee_chemicals_properusage = '2' then 'No'
				else 'null'
				end 
				as `Coffee_Chemicals_Properusage`,

				replace(replace(replace(replace(replace(replace(concat(
				(replace(c.coffee_chemical_whoapplied, '1', 'Myself/ used family labour,')), 
				(replace(c.coffee_chemical_whoapplied, '2', 'Hired causal labourers,')), 
				(replace(c.coffee_chemical_whoapplied, '3', 'Hired specialized services provider,')), 
				(replace(c.coffee_chemical_whoapplied, '4', 'Used members of a group,')), 
				(replace(c.coffee_chemical_whoapplied, '5', 'Village Agent,')),
				(replace(c.coffee_chemical_whoapplied, ' ', 'null,'))
				),'1',''),'2',''),'3',''),'4',''),'5',''),' ','') as  `Coffee_Chemicals_WhoApplied`,
				COALESCE(c.coffee_chemical_whoapplied_other, 'null') as `coffee_chemical_whoapplied_other`,
				COALESCE(c.coffee_acreage_chemicals, 'null') as `Coffee_Land_Chemicals`,
				case
					when c.coffee_detect_counterfeit = '1' then 'Yes'
					when c.coffee_detect_counterfeit = '2' then 'No'
				else 'null'
				end 
				as `Coffee_Detect_Counterfeit`,

				case
					when c.coffee_opinion = '1' then 'Decreased a great deal'
					when c.coffee_opinion = '2' then 'Decreased quite a bit'
					when c.coffee_opinion = '3' then 'Decreased somewhat'
					when c.coffee_opinion = '4' then 'Decrease is Very little'
					when c.coffee_opinion = '5' then 'No decrease  at all'
				else 'null'
				end 
				as `Coffee_Opinion`,
				case
					when c.coffee_counterfeit_improvedtrees = '1' then 'All were counterfeit/fake'
					when c.coffee_counterfeit_improvedtrees = '2' then 'Some were counterfeit/fake'
					when c.coffee_counterfeit_improvedtrees = '3' then 'All was good/not counterfeit'
				else 'null'
				end 
				as `Coffee_Counterfeit_Improvedtrees`,
				case
					when c.coffee_counterfeit_herbicides = '1' then 'All were counterfeit/fake'
					when c.coffee_counterfeit_herbicides = '2' then 'Some were counterfeit/fake'
					when c.coffee_counterfeit_herbicides = '3' then 'All was good/not counterfeit'
				else 'null'
				end 
				as `Coffee_Counterfeit_Herbicides`,
				case
					when c.coffee_counterfeit_pesticides = '1' then 'All were counterfeit/fake'
					when c.coffee_counterfeit_pesticides = '2' then 'Some were counterfeit/fake'
					when c.coffee_counterfeit_pesticides = '3' then 'All was good/not counterfeit'
				else 'null'
				end 
				as `Coffee_Counterfeit_Pesticides`,
				case
					when c.coffee_counterfeit_Fungicides = '1' then 'All were counterfeit/fake'
					when c.coffee_counterfeit_Fungicides = '2' then 'Some were counterfeit/fake'
					when c.coffee_counterfeit_Fungicides = '3' then 'All was good/not counterfeit'
				else 'null'
				end 
				as `Coffee_Counterfeit_Fungicides`,

				case
					when c.coffee_counterfeit_Fertilizers = '1' then 'All were counterfeit/fake'
					when c.coffee_counterfeit_Fertilizers = '2' then 'Some were counterfeit/fake'
					when c.coffee_counterfeit_Fertilizers = '3' then 'All was good/not counterfeit'
				else 'null'
				end 
				as `Coffee_Counterfeit_Fertilizers`,
				replace(replace(replace(replace(replace(concat(
				(replace(c.coffee_avoid_counterfeits, '1', 'Through information receivedfrom VA/extension workers/training/ radio about fake products ,I know how to avoid them,')), 
				(replace(c.coffee_avoid_counterfeits, '2', 'I am buying in bulk with other farmers,')), 
				(replace(c.coffee_avoid_counterfeits, '3', 'I am using more trusted sources of supply,')), 
				(replace(c.coffee_avoid_counterfeits, '4', 'Others,')),
				(replace(c.coffee_avoid_counterfeits, '', 'null,'))
				),'1',''),'2',''),'3',''),'4',''),'','') as  `Coffee_Avoid_Counterfeits`,

				case
					when c.coffee_avoid_counterfeits_other = ' ' then 'null'
				else c.coffee_avoid_counterfeits_other
				end 
				as `coffee_avoid_counterfeits_other`,

				replace(replace(replace(replace(replace(replace(replace(replace(concat(
				(replace(c.coffee_dry_harvested, '1', 'Ordinary sun drying on bear ground,')), 
				(replace(c.coffee_dry_harvested, '2', 'Used Tarpaulins,')), 
				(replace(c.coffee_dry_harvested, '3', 'Coffee cribs,')), 
				(replace(c.coffee_dry_harvested, '4', 'Used solar dryers with panel,')), 
				(replace(c.coffee_dry_harvested, '5', 'Used solar dryer without panels,')), 
				(replace(c.coffee_dry_harvested, '6', 'Used locally fabricated mechanical dyers,')),
				(replace(c.coffee_dry_harvested, '7', 'Used  imported mechanical dryers,')),
				(replace(c.coffee_dry_harvested, ' ', 'null,'))
				),'1',''),'2',''),'3',''),'4',''),'5',''),'6',''),'7',''),' ','') as  `Coffee_Dry_Harvested`,
				COALESCE(coffee_dry_harvested_other, 'null') as `coffee_dry_harvested_other`,
				replace(replace(replace(replace(replace(replace(replace(replace(concat(
				(replace(c.coffee_storage, '1', 'Ordinary storage house not on bags,')), 
				(replace(c.coffee_storage, '2', 'Owned warehouse,')), 
				(replace(c.coffee_storage, '3', 'Hired warehouse,')), 
				(replace(c.coffee_storage, '4', 'Coffee cribs,')), 
				(replace(c.coffee_storage, '5', 'Silos/metal tanks,')), 
				(replace(c.coffee_storage, '6', 'Grain /grain pic bags,')),
				(replace(c.coffee_storage, '7', 'Others,')),
				(replace(c.coffee_storage, ' ', 'null,'))
				),'1',''),'2',''),'3',''),'4',''),'5',''),'6',''),'7',''),' ','') as  `Coffee_Storage`,
				COALESCE(c.coffee_storage_other, 'null') as `c.coffee_storage_other`,
				c.coffee_cost_production as `Coffee_Cost_Production`,
				c.coffee_cost_production_machinery as `coffee_cost_production_machinery`,
				c.coffee_cost_production_improvedseed as `coffee_cost_production_improvedtrees`,
				c.coffee_cost_production_fertilizers as `coffee_cost_production_fertilizers`,
				c.coffee_cost_production_chemicals as `coffee_cost_production_chemicals`,
				c.coffee_cost_production_storage as `coffee_cost_production_storage`,
				c.coffee_cost_production_transportation as `coffee_cost_production_transportation`,
				c.coffee_cost_production_labour as `coffee_cost_production_labour`,
				c.coffee_cost_production_other as `coffee_cost_production_other`,
				c.coffee_harvested as `coffee_harvested`,
				c.coffee_sold as `coffee_sold`,
				c.coffee_sold_lastperiod as `coffee_sold_lastperiod`,
				c.coffee_sold_price as `coffee_sold_price`,
				c.coffee_harvest_loss as `coffee_harvest_loss`,
				replace(replace(replace(replace(replace(replace(concat(
				(replace(c.coffee_aware_standard, '1', 'Completely aware,')), 
				(replace(c.coffee_aware_standard, '2', 'Largely aware,')), 
				(replace(c.coffee_aware_standard, '3', 'Partly aware,')), 
				(replace(c.coffee_aware_standard, '4', 'Slightly aware,')),
				(replace(c.coffee_aware_standard, '5', 'Not aware at all,')),
				(replace(c.coffee_aware_standard, ' ', 'null,'))
				),'1',''),'2',''),'3',''),'4',''),'5',''),' ','') as  `Coffee_Aware_Standard`,


				case
					when q.climate_change_impact like '1%' then 'Completely aware'
					when q.climate_change_impact like '2%' then 'Largely aware'
					when q.climate_change_impact like '3%' then 'Partly aware'
					when q.climate_change_impact like '4%' then 'Slightly aware'
					when q.climate_change_impact like '5%' then 'Not aware at all'
				else 'null'
				end 
				as `Climate Change Impacts`,

				case
					when q.implemented_mgt_climate = '1' then 'Yes'
					when q.implemented_mgt_climate = '0' then 'No'
				else 'null'
				end 
				as `Management Practices Climate`,
				replace(replace(replace(replace(replace(replace(replace(concat(
				(replace(q.implemented_mgt_climate_action, '1', 'Use of improved seed varieties,')), 
				(replace(q.implemented_mgt_climate_action, '2', 'Irrigation,')), 
				(replace(q.implemented_mgt_climate_action, '3', 'Planting early maturing crop varieties,')), 
				(replace(q.implemented_mgt_climate_action, '4', 'Planting drought resistant varieties,')),
				(replace(q.implemented_mgt_climate_action, '5', 'mulching,')),
				(replace(q.implemented_mgt_climate_action, '6', 'Others')),
				(replace(q.implemented_mgt_climate_action, ' ', 'null'))
				),'1',''),'2',''),'3',''),'4',''),'5',''),'6',''),' ','') as  `Management practices implemented`,
				COALESCE(q.implemented_mgt_climate_action_other, 'null') as `implemented_mgt_climate_action_other`,
				replace(replace(replace(replace(replace(replace(concat(
				(replace(q.protection_counterfeit, '1', 'Buy from a reputable dealer,')), 
				(replace(q.protection_counterfeit, '2', 'Always demand a receipt,')), 
				(replace(q.protection_counterfeit, '3', 'Always keep the container,')), 
				(replace(q.protection_counterfeit, '4', 'Only buy from sealed containers,')),
				(replace(q.protection_counterfeit, '5', 'Others,')),
				(replace(q.protection_counterfeit, ' ', 'null,'))
				),'1',''),'2',''),'3',''),'4',''),'5',''),' ','') as  `Protection Counterfeit`,
				COALESCE(q.protection_counterfeit_other, 'null') as `protection_counterfeit_other`,
				case
					when q.hotline_counterfeit = '1' then 'Yes'
					when q.hotline_counterfeit = '0' then 'No'
				else 'null'
				end 
				as `hotline_counterfeit`,
				case
					when q.hotline_evercalled = '1' then 'Yes'
					when q.hotline_evercalled = '0' then 'No'
				else 'null'
				end 
				as `Called The Hotline`,
				replace(replace(replace(replace(replace(replace(replace(replace(replace(concat(
				(replace(q.receive_information_method, '1', 'Radio,')), 
				(replace(q.receive_information_method, '2', 'Television,')), 
				(replace(q.receive_information_method, '3', 'Newspaper,')), 
				(replace(q.receive_information_method, '4', 'Meetings or workshops,')),
				(replace(q.receive_information_method, '5', 'From fellow farmers,')),
				(replace(q.receive_information_method, '6', 'Popular written versions of Government documents')),
				(replace(q.receive_information_method, '7', 'SMS on Mobile phone')),
				(replace(q.receive_information_method, '8', 'Internet')),
				(replace(q.receive_information_method, ' ', 'null'))
				),'1',''),'2',''),'3',''),'4',''),'5',''),'6',''),'7',''),'8',''),' ','') as  `Government_Agricultural_Related_Information`,
				q.receive_information_method_other as `receive_information_method_other`,
				replace(replace(replace(replace(replace(concat(
				(replace(q.farming_decisions, '1', 'Husband,')), 
				(replace(q.farming_decisions, '2', 'Wife,')), 
				(replace(q.farming_decisions, '3', 'Children,')), 
				(replace(q.farming_decisions, '4', 'All family members,')),
				(replace(q.farming_decisions, ' ', 'null,'))
				),'1',''),'2',''),'3',''),'4',''),' ','')  as  `Farming Decisions`,
				replace(replace(replace(replace(replace(concat(
				(replace(q.farm_assets, '1', 'Husband,')), 
				(replace(q.farm_assets, '2', 'Wife,')), 
				(replace(q.farm_assets, '3', 'Children,')), 
				(replace(q.farm_assets, '4', 'All family members,')),
				(replace(q.farm_assets, ' ', 'null,'))
				),'1',''),'2',''),'3',''),'4',''),' ','')  as  `Owns_Farming_Assests`,
				replace(replace(replace(replace(replace(concat(
				(replace(q.money_spent, '1', 'Husband,')), 
				(replace(q.money_spent, '2', 'Wife,')), 
				(replace(q.money_spent, '3', 'Children,')), 
				(replace(q.money_spent, '4', 'All family members,')),
				(replace(q.money_spent, ' ', 'null,'))
				),'1',''),'2',''),'3',''),'4',''),' ','') as  `Farming_Money_Spent`,
				replace(replace(replace(replace(replace(concat(
				(replace(q.training_events, '1', 'Husband,')), 
				(replace(q.training_events, '2', 'Wife,')), 
				(replace(q.training_events, '3', 'Children,')), 
				(replace(q.training_events, '4', 'All family members,')),
				(replace(q.training_events, ' ', 'null,'))
				),'1',''),'2',''),'3',''),'4',''),' ','') as  `Attend Training Events`,
				replace(replace(replace(replace(replace(concat(
				(replace(q.member_organisation, '1', 'Husband,')), 
				(replace(q.member_organisation, '2', 'Wife,')), 
				(replace(q.member_organisation, '3', 'Children,')), 
				(replace(q.member_organisation, '4', 'All family members,')),
				(replace(q.member_organisation, ' ', 'null,'))
				),'1',''),'2',''),'3',''),'4',''),' ','') as  `Member_Organisation`,

				case
					when q.GPSLatitude = ' ' then 'null'
				else q.GPSLatitude
				end 
				as `GPSLatitude`,

				case
					when q.GPSLongitude = ' ' then 'null'
				else q.GPSLongitude
				end 
				as `GPSLongitude`,

				case
					when q.GPSAltitude = ' ' then 'null'
				else q.GPSAltitude
				end 
				as `GPSAltitude`,

				case
					when q.GPSAccuracy = ' ' then 'null'
				else q.GPSAccuracy
				end 
				as `GPSAccuracy`,

				case
					when q.X_axis = ' ' then 'null'
				else q.X_axis
				end 
				as `X_axis`,

				case
					when q.Y_axis = ' ' then 'null'
				else q.Y_axis
				end 
				as `Y_axis`,
				case
					when q.loan_accessed <> ' ' then 'Yes'
				else 'No'
				end 
				as `Accessed a loan`,
				format(q.loan_accessed,0) as  `Amount Loan accessed`,
				case
					when q.implemented_mgt_climate = '1' then 'Yes'
					when q.implemented_mgt_climate = '0' then 'No'
				else 'null'
				end 
				as  `Implemented management practices`, 

				case
					when q.compiled_by = ' ' then 'null'
				else q.compiled_by
				end 
				as `Compiled_By`,

				case
					when q.telephone = ' ' then 'null'
				else q.telephone
				end 
				as  `Tel_Data_Compiler`,

				case
					when q.gps = ' ' then 'null'
				else q.gps
				end 
				as `GPS_coordinates`,

				case
					when q.msg_at_readtime = ' ' then 'null'
				else q.msg_at_readtime
				end 
				as  `Message_Logged_at_Readtime`,


				case
					when q.readtime = ' ' then 'null'
				else q.readtime
				end 
				as `MIS_Data_Readtime`

				FROM
				`tbl_frm6particulars` as `p`,
				`tbl_frm6production_maize` as `m`,
				`tbl_frm6production_beans` as `b`,
				`tbl_frm6production_coffee` as `c`,
				`tbl_frm6gqnsandgps` as `q`, 
				`tbl_farmers` as `f`,
				`tbl_zone` as `z`,
				`tbl_district`as `d`,
				`tbl_subcounty` as `s`

				WHERE 1=1
				and `p`.`farmer_code` = `f`.`tbl_farmersId`
				AND `c`.`farmer_code` = `p`.`farmer_code`
				AND `m`.`farmer_code` = `p`.`farmer_code`
				AND `b`.`farmer_code` = `p`.`farmer_code` 
				AND `p`.`pk_patId` = `m`.`fk_patId`
				AND `p`.`pk_patId` = `m`.`fk_patId`
				AND `m`.`fk_patId` = `b`.`fk_patId`
				AND `b`.`fk_patId` = `c`.`fk_patId`
				AND `c`.`fk_patId` = `q`.`fk_patId`
				AND `d`.`zone` = `z`.`zoneCode`
                and p.interview_date between cast('2016-03-01' as date) and cast('2016-03-31' as date)
				AND `f`.`farmersDistrict` = `d`.`districtCode`
				AND `f`.`farmersSubcounty` = `s`.`subcountyCode`
				group by `p`.`pk_patId`
				ORDER BY `p`.`pk_patId` DESC
				limit 0, 50";
            
        return $sql;
        


    }

    function form6RawDataToExcelAll($reportingYear,$reportingPeriod){
       // $append_dateRange=((($fromDate)!='') and (($toDate)!=''))?" p.interview_date between ('".$fromDate."') and ('".$toDate."')":"";

        $reportingYearToPeriod='';
        $reportingPeriodToDateRange='';
        switch($reportingYear){
            case'CPMA Year One':
            $reportingYearToPeriod='Oct - Mar 2013, Oct - Mar 2014, Apr - Sep 2014';
            break;
            
            case'CPMA Year Two':
            $reportingYearToPeriod='Oct - Mar 2014, Oct - Mar 2015, Apr - Sep 2015';
            break;
            
            case'CPMA Year Three':
            $reportingYearToPeriod='Oct - Mar 2015, Oct - Mar 2016, Apr - Sep 2016';
            break;
            
            case'CPMA Year Four':
            $reportingYearToPeriod='Oct - Mar 2016, Oct - Mar 2017, Apr - Sep 2017';
            break;
            
            case'CPMA Year Five':
            $reportingYearToPeriod='Oct - Mar 2017, Oct - Mar 2018, Apr - Sep 2018';
            break;
            
            case'CPMA Year Six':
            $reportingYearToPeriod='Oct - Mar 2018, Oct - Mar 2019, Apr - Sep 2019';
            break;
            
            default:
            $reportingYearToPeriod='';
            break;
        }
        $append_reportingYear=(($reportingYearToPeriod)!='')?" and `f`.`reportingPeriod` in (".$reportingYearToPeriod.")":"";
        
        switch($reportingPeriod){
            
            case'Apr - Sep':
            $reportingPeriodToDateRange=' and `f`.`reportingPeriod` like "Oct - Mar '.$reportingYear.'%"';
            break;
            
            case'Oct - Mar':
            $reportingPeriodToDateRange=' and month(t.trainingDate) in (10,11,12,1,2,3)';
            break;
            
            default:
            $reportingPeriodToDateRange='';
            break;
        } 
        
        $append_reportingPeriod=(reportingPeriodToDateRange !='')?" ".$reportingPeriodToDateRange:"";

        $sql = "select 
						1 as `#`,
				p.interview_date as `Date_Surveyed`,
				f.farmersName as `Farmer_Name`,
				f.tbl_farmersId as `Farmer_Code`,
				f.farmersSex as `Farmer_Gender`,
				z.zoneName as `Farmer_Region`,
				d.districtName as `Farmer_District`,
				s.subcountyName as `Farmer_Sub-County`,
				f.farmersVillage as `Farmer_Village`,
				p.respondent as `Respondent`,
				case
					when p.`farmer_crop_maize` = '1' then 'Yes'
					when p.`farmer_crop_maize` = '0' then 'No'
				else 'null'
				end 
				as `farmer_crop_maize`,
				case
					when p.`farmer_crop_beans` = '1' then 'Yes'
					when p.`farmer_crop_beans` = '0' then 'No'
				else 'null'
				end 
				as `farmer_crop_beans`,
				case
					when p.`farmer_crop_coffee` = '1' then 'Yes'
					when p.`farmer_crop_coffee` = '0' then 'No'
				else 'null'
				end 
				as `farmer_crop_coffee`,
				case
					when m.farmer_crop_maize_crop = '1' then 'Yes'
					when m.farmer_crop_maize_crop = '2' then 'No'
				else 'null'
				end 
				as `farmer_crop_maize_crop`,
				replace(replace(replace(replace(concat(
				(replace(m.maize_other_crop, '1', 'Beans,')), 
				(replace(m.maize_other_crop, '2', 'Coffee,')), 
				(replace(m.maize_other_crop, '3', 'Others,')),
				(replace(m.maize_other_crop, ' ', 'null,'))
				),'1',''),'2',''),'3',''),' ','') as  `Other_Crop_Planted_Maize`,
				COALESCE(m.maize_other_crop_other, 'null') as `Maize_Other_Crop`,
				case
					when m.maize_acreage = ' ' then 'null'
				else m.maize_acreage
				end 
				as `maize_acreage`,
				case
					when m.maize_mapped = '1' then 'Yes'
					when m.maize_mapped = '2' then 'No'
				else 'null'
				end 
				as `Land_Mapped`,
				replace(replace(replace(replace(replace(replace(replace(replace(concat(
				(replace(m.maize_equipment_openingland, '0', 'None,')), 
				(replace(m.maize_equipment_openingland, '1', 'Use of Tractor,')), 
				(replace(m.maize_equipment_openingland, '2', 'Oxen-Ploughing,')), 
				(replace(m.maize_equipment_openingland, '3', 'Hand hoe Ploughing,')),
				(replace(m.maize_equipment_openingland, '4', 'Spraying/Use of herbicides,')),
				(replace(m.maize_equipment_openingland, '5', 'Use of rippers')),
				(replace(m.maize_equipment_openingland, '6', 'Basin conservation technology')),
				(replace(m.maize_equipment_openingland, ' ', 'null'))
				),'0',''),'1',''),'2',''),'3',''),'4',''),'5',''),'6',''),' ','') as  `Maize_Equipment_Used`,

				replace(replace(replace(replace(concat(
				(replace(m.maize_seed_variety, '1', 'Home saved/local seeds,')), 
				(replace(m.maize_seed_variety, '2', 'Improved seed-Hybrid,')), 
				(replace(m.maize_seed_variety, '3', 'Improved seed-Open pollinated variety(OPVs),')),
				(replace(m.maize_seed_variety, ' ', 'null,'))
				),'1',''),'2',''),'3',''),' ','') as  `Maize_Seed_Variety`,

				replace(replace(replace(replace(replace(replace(concat(
				(replace(m.maize_improvedseeds_notuse, '1', 'High cost of improved seeds, canít afford,')), 
				(replace(m.maize_improvedseeds_notuse, '2', 'Lack of knowledge about improved seeds,')), 
				(replace(m.maize_improvedseeds_notuse, '3', 'Donít knowwhere to access Improved seeds/ not available in the market,')), 
				(replace(m.maize_improvedseeds_notuse, '4', 'Frustrated because of counterfeit seeds,')), 
				(replace(m.maize_improvedseeds_notuse, '5', 'Others,')),
				(replace(m.maize_improvedseeds_notuse, ' ', 'null'))
				),'1',''),'2',''),'3',''),'4',''),'5',''),' ','')as  `Maize_Improvedseeds_Notuse`,

				case
					when m.maize_improvedseeds_notuse_other = ' ' then 'null'
				else m.maize_improvedseeds_notuse_other
				end 
				as `Maize_improvedseeds_notuse_other`,
				replace(replace(replace(replace(replace(replace(replace(replace(replace(replace(replace(concat(
				(replace(m.maize_improvedseeds_benefits, '1', 'Good yields/ Better quality,')), 
				(replace(m.maize_improvedseeds_benefits, '2', 'Labour saving,')), 
				(replace(m.maize_improvedseeds_benefits, '3', 'Pests and Disease tolerant,')), 
				(replace(m.maize_improvedseeds_benefits, '4', 'Drought tolerant ,')),
				(replace(m.maize_improvedseeds_benefits, '5', 'Early Maturity,')),
				(replace(m.maize_improvedseeds_benefits, '6', 'Market demand')),
				(replace(m.maize_improvedseeds_benefits, '7', 'Cost of improved seeds was affordable')),
				(replace(m.maize_improvedseeds_benefits, '8', 'Easily accessible')),
				(replace(m.maize_improvedseeds_benefits, '9', 'Advised by friend/VA/extension worker')),
				(replace(m.maize_improvedseeds_benefits, '10', 'Others')),
				(replace(m.maize_improvedseeds_benefits, ' ', 'null'))
				),'1',''),'2',''),'3',''),'4',''),'5',''),'6',''),'7',''),'8',''),'9',''),'10',''),' ','')
				as  `Maize_Improvedseeds_Benefits`,
				case
					when m.maize_improvedseeds_benefits_other = ' ' then 'null'
				else m.maize_improvedseeds_benefits_other
				end 
				as `maize_improvedseeds_benefits_other`,
				replace(replace(replace(replace(replace(replace(replace(replace(replace(concat(
				(replace(m.maize_improvedseed_supplier, '1', 'Stockist through VARM,')), 
				(replace(m.maize_improvedseed_supplier, '2', 'Village Agents,')), 
				(replace(m.maize_improvedseed_supplier, '3', 'Stockist,')), 
				(replace(m.maize_improvedseed_supplier, '4', 'Bought in the market/shop ,')),
				(replace(m.maize_improvedseed_supplier, '5', 'Got from another farmer,')),
				(replace(m.maize_improvedseed_supplier, '6', 'Direct from manufacturer')),
				(replace(m.maize_improvedseed_supplier, '7', 'Container Village in Kampala,')),
				(replace(m.maize_improvedseed_supplier, '8', 'Others')),
				(replace(m.maize_improvedseed_supplier, ' ', 'null'))
				),'1',''),'2',''),'3',''),'4',''),'5',''),'6',''),'7',''),'8',''),' ','')
				as  `Maize_Improvedseeds_Supplier`,
				case
					when m.maize_improvedseed_supplier_other = ' ' then 'null'
				else m.maize_improvedseed_supplier_other
				end 
				as `maize_improvedseed_supplier_other`,

				case
					when m.maize_improvedseed_properusage = '1' then 'Yes'
					when m.maize_improvedseed_properusage = '2' then 'No'
				else 'null'
				end 
				as `Maize_Improvedseed_Properusage`,

				m.maize_acreage_improvedseeds as `Landsize_Maize_Improvedseeds`,
				replace(replace(replace(replace(replace(replace(replace(concat(
				(replace(m.maize_equipment_planting, '1', 'Zero tillage Planters,')), 
				(replace(m.maize_equipment_planting, '2', 'Non-Zero tillage Planters,')), 
				(replace(m.maize_equipment_planting, '3', 'Basin conservation planting,')), 
				(replace(m.maize_equipment_planting, '4', 'Spacing using robes and hand hoe,')), 
				(replace(m.maize_equipment_planting, '5', 'Spacing using hand hoe only,')), 
				(replace(m.maize_equipment_planting, '6', 'Broadcasting/sowing,')),
				(replace(m.maize_equipment_planting, ' ', 'null,'))
				),'1',''),'2',''),'3',''),'4',''),'5',''),'6',''),'6','')  as  `MaizeEquipmentMethod_Planting`,

				case
					when m.maize_equipment_planting_other = ' ' then 'null'
				else m.maize_equipment_planting_other
				end 
				as `maize_equipment_planting_other`,


				replace(replace(replace(replace(replace(replace(concat(
				(replace(m.maize_improvedseeds_notuse, '1', 'Myself/ used family labour,')), 
				(replace(m.maize_improvedseeds_notuse, '2', 'Hired causal labourers,')), 
				(replace(m.maize_improvedseeds_notuse, '3', 'Hired specialized services provider,')), 
				(replace(m.maize_improvedseeds_notuse, '4', 'Used members of a group,')), 
				(replace(m.maize_improvedseeds_notuse, '5', 'Village Agent,')),
				(replace(m.maize_improvedseeds_notuse, ' ', 'null,'))
				),'1',''),'2',''),'3',''),'4',''),'5',''),' ','') as  `Maize_Whoplanted`,

				case
					when m.maize_whoplanted_Other = ' ' then 'null'
				else m.maize_whoplanted_Other
				end 
				as `maize_whoplanted_Other`,
				case
					when m.maize_fertilizer_use = '2' then 'Yes, 1st fertilizer application(DAP)only'
					when m.maize_fertilizer_use = '1' then 'No'
					when m.maize_fertilizer_use = '3' then 'Yes, 2nd fertilizer application(UREA) only'
					when m.maize_fertilizer_use = '4' then 'Yes, both 1st and 2nd fertilizer application'
				else 'null'
				end 
				as `Maize_Fertilizer_use`,
				replace(replace(replace(replace(replace(replace(concat(
				(replace(m.maize_fertlizer_notuse, '1', 'High cost of fertilizers, canít afford,')), 
				(replace(m.maize_fertlizer_notuse, '2', 'Labour intensive,')), 
				(replace(m.maize_fertlizer_notuse, '3', 'Lack of knowledge about use of fertilizers,')), 
				(replace(m.maize_fertlizer_notuse, '4', 'Donít know where to access fertilizers seeds/ not available in the market,')), 
				(replace(m.maize_fertlizer_notuse, '5', 'Frustrated because of counterfeit fertilizers,')),
				(replace(m.maize_fertlizer_notuse, ' ', 'null,'))
				),'1',''),'2',''),'3',''),'4',''),'5',''),' ','') as  `Maize_Fertlizer_Notuse`,
				case
					when m.maize_fertlizer_notuse_other = ' ' then 'null'
				else m.maize_fertlizer_notuse_other
				end 
				as`maize_fertlizer_notuse_other`,

				replace(replace(replace(replace(replace(replace(replace(replace(replace(concat(
				(replace(m.maize_fertilizer_benefits, '1', 'Good yields/ Better quality,')), 
				(replace(m.maize_fertilizer_benefits, '2', 'Pests and Disease tolerant,')), 
				(replace(m.maize_fertilizer_benefits, '3', 'Drought tolerant,')), 
				(replace(m.maize_fertilizer_benefits, '4', 'Early Maturity ,')),
				(replace(m.maize_fertilizer_benefits, '5', 'Cost of fertilizer was affordable,')),
				(replace(m.maize_fertilizer_benefits, '6', 'Easily accessible')),
				(replace(m.maize_fertilizer_benefits, '7', 'Advised by friend/VA/extension worker,')),
				(replace(m.maize_fertilizer_benefits, '8', 'Others')),
				(replace(m.maize_fertilizer_benefits, ' ', 'null'))
				),'1',''),'2',''),'3',''),'4',''),'5',''),'6',''),'7',''),'8',''),' ','')
				as  `Maize_Fertilizer_Benefits`,
				case
					when m.maize_fertilizer_benefits_other = ' ' then 'null'
				else m.maize_fertilizer_benefits_other
				end 
				as`maize_fertilizer_benefits_other`,
				replace(replace(replace(replace(replace(replace(replace(replace(replace(concat(
				(replace(m.maize_fertilizer_supplier, '1', 'Stockist through VARM,')), 
				(replace(m.maize_fertilizer_supplier, '2', 'Village Agents,')), 
				(replace(m.maize_fertilizer_supplier, '3', 'Stockist,')), 
				(replace(m.maize_fertilizer_supplier, '4', 'Bought in the market/shop,')),
				(replace(m.maize_fertilizer_supplier, '5', 'Got from another farmer,')),
				(replace(m.maize_fertilizer_supplier, '6', 'Direct from manufacturer')),
				(replace(m.maize_fertilizer_supplier, '7', 'Container Village in Kampala,')),
				(replace(m.maize_fertilizer_supplier, '8', 'Others')),
				(replace(m.maize_fertilizer_supplier, ' ', 'null'))
				),'1',''),'2',''),'3',''),'4',''),'5',''),'6',''),'7',''),'8',''),' ','')
				as  `Maize_Fertilizer_Supplier`,
				case
					when m.maize_fertilizer_supplier_other = ' ' then 'null'
				else m.maize_fertilizer_supplier_other
				end 
				as`maize_fertilizer_supplier_other`,
				case
					when m.maize_fertilizer_properusage = '1' then 'Yes'
					when m.maize_fertilizer_properusage = '2' then 'No'
				else 'null'
				end 
				as `Maize_Fertilizer_Properusage`,
				replace(replace(replace(replace(replace(replace(concat(
				(replace(m.maize_ferilizer_whosupplied, '1', 'Myself/ used family labour,')), 
				(replace(m.maize_ferilizer_whosupplied, '2', 'Hired causal labourers,')), 
				(replace(m.maize_ferilizer_whosupplied, '3', 'Hired specialized services provider,')), 
				(replace(m.maize_ferilizer_whosupplied, '4', 'Used members of a group,')), 
				(replace(m.maize_ferilizer_whosupplied, '5', 'Village Agent,')),
				(replace(m.maize_ferilizer_whosupplied, ' ', 'null,'))
				),'1',''),'2',''),'3',''),'4',''),'5',''),' ','') as  `Maize_WhoApplied`,

				case
					when m.maize_ferilizer_whosupplied_other = ' ' then 'null'
				else m.maize_ferilizer_whosupplied_other
				end 
				as`maize_ferilizer_whosupplied_other`,

				case
					when m.maize_acreage_fertilizer = ' ' then 'null'
				else m.maize_acreage_fertilizer
				end 
				as `Maize_Land_fertilizers`,

				replace(replace(replace(replace(replace(replace(concat(
				(replace(m.maize_chemical_use, '0', 'Weeding using hand hoe/picking weed,')), 
				(replace(m.maize_chemical_use, '1', 'Weeding using machinery,')), 
				(replace(m.maize_chemical_use, '2', 'Sprayed crop with selective herbicides,')), 
				(replace(m.maize_chemical_use, '3', 'Sprayed crop with Pesticides,')), 
				(replace(m.maize_chemical_use, '4', 'Sprayed crop with fungicides,')),
				(replace(m.maize_chemical_use, ' ', 'null,'))
				),'0',''),'1',''),'2',''),'3',''),'4',''),' ','') as  `Maize_Chemical_Use`,

				case
					when m.maize_chemical_use_other = ' ' then 'null'
				else m.maize_chemical_use_other
				end 
				as`Maize_Chemical_use_other`,

				replace(replace(replace(replace(replace(replace(concat(
				(replace(m.maize_chemical_notuse, '1', 'High cost of agricultural chemicals, canít afford,')), 
				(replace(m.maize_chemical_notuse, '2', 'Labour intensive,')), 
				(replace(m.maize_chemical_notuse, '3', 'Lack of knowledge about use of agricultural chemicals,')), 
				(replace(m.maize_chemical_notuse, '4', 'Donít know where to access agricultural chemicals/ not available in the market,')), 
				(replace(m.maize_chemical_notuse, '5', 'Frustrated because of counterfeit agricultural chemicals,')),
				(replace(m.maize_chemical_notuse, ' ', 'null,'))
				),'1',''),'2',''),'3',''),'4',''),'5',''),' ','') as  `Maize_Chemicals_NotUse`,

				case
					when m.maize_chemical_notuse_other = ' ' then 'null'
				else m.maize_chemical_notuse_other
				end 
				as`maize_chemical_notuse_other`,


				replace(replace(replace(replace(replace(replace(replace(replace(replace(concat(
				(replace(m.maize_chemical_benefits, '1', 'Good yields/ Better quality,')), 
				(replace(m.maize_chemical_benefits, '2', 'Labour saving,')), 
				(replace(m.maize_chemical_benefits, '3', 'Pests and Disease control,')), 
				(replace(m.maize_chemical_benefits, '4', 'Drought toleran,')),
				(replace(m.maize_chemical_benefits, '5', 'Early Maturity,')),
				(replace(m.maize_chemical_benefits, '6', 'Cost of chemicals was affordable')),
				(replace(m.maize_chemical_benefits, '7', 'Easily accessible,')),
				(replace(m.maize_chemical_benefits, '8', 'Advised by friend/VA/extension worker,')),
				(replace(m.maize_chemical_benefits, '9', 'Others')),
				(replace(m.maize_chemical_benefits, ' ', 'null'))
				),'1',''),'2',''),'3',''),'4',''),'5',''),'6',''),'7',''),'8',''),' ','')
				as  `Maize_Chemicals_Benefits`,

				case
					when m.maize_chemical_benefits_other = ' ' then 'null'
				else m.maize_chemical_benefits_other
				end
				as `maize_chemical_benefits_other`,

				replace(replace(replace(replace(replace(replace(replace(replace(replace(concat(
				(replace(m.maize_chemical_supplier, '1', 'Stockist through VARM,')), 
				(replace(m.maize_chemical_supplier, '2', 'Village Agents,')), 
				(replace(m.maize_chemical_supplier, '3', 'Stockist,')), 
				(replace(m.maize_chemical_supplier, '4', 'Bought in the market/shop,')),
				(replace(m.maize_chemical_supplier, '5', 'Got from another farmer,')),
				(replace(m.maize_chemical_supplier, '6', 'Direct from manufacturer')),
				(replace(m.maize_chemical_supplier, '7', 'Container Village in Kampala,')),
				(replace(m.maize_chemical_supplier, '8', 'Others')),
				(replace(m.maize_chemical_supplier, ' ', 'null'))
				),'1',''),'2',''),'3',''),'4',''),'5',''),'6',''),'7',''),'8',''),' ','')
				as  `Maize_Chemicals_Supplier`,

				case
					when m.maize_chemical_supplier_other = ' ' then 'null'
				else m.maize_chemical_supplier_other
				end 
				as `maize_chemical_supplier_other`,
				case
					when m.maize_chemicals_properusage = '1' then 'Yes'
					when m.maize_chemicals_properusage = '2' then 'No'
				else 'null'
				end 
				as `Maize_Chemicals_Properusage`,

				replace(replace(replace(replace(replace(replace(concat(
				(replace(m.maize_chemical_whoapplied, '1', 'Myself/ used family labour,')), 
				(replace(m.maize_chemical_whoapplied, '2', 'Hired causal labourers,')), 
				(replace(m.maize_chemical_whoapplied, '3', 'Hired specialized services provider,')), 
				(replace(m.maize_chemical_whoapplied, '4', 'Used members of a group,')), 
				(replace(m.maize_chemical_whoapplied, '5', 'Village Agent,')),
				(replace(m.maize_chemical_whoapplied, ' ', 'null,'))
				),'1',''),'2',''),'3',''),'4',''),'5',''),' ','') as  `Maize_Chemicals_WhoApplied`,

				case
					when m.maize_chemical_whoapplied_other = ' ' then 'null'
				else m.maize_chemical_whoapplied_other
				end 
				as `maize_chemical_whoapplied_other`,
				case
					when m.maize_acreage_chemicals = ' ' then 'null'
				else m.maize_acreage_chemicals
				end 
				as `Maize_Land_Chemicals`,
				case
					when m.maize_detect_counterfeit = '1' then 'Yes'
					when m.maize_detect_counterfeit = '2' then 'No'
				else 'null'
				end 
				as `Maize_Detect_Counterfeit`,

				case
					when m.maize_opinion = '1' then 'Decreased a great deal'
					when m.maize_opinion = '2' then 'Decreased quite a bit'
					when m.maize_opinion = '3' then 'Decreased somewhat'
					when m.maize_opinion = '4' then 'Decrease is Very little'
					when m.maize_opinion = '5' then 'No decrease  at all'
				else 'null'
				end 
				as `Maize_Opinion`,
				case
					when m.maize_counterfeit_improvedseeds = '1' then 'All were counterfeit/fake'
					when m.maize_counterfeit_improvedseeds = '2' then 'Some were counterfeit/fake'
					when m.maize_counterfeit_improvedseeds = '3' then 'All was good/not counterfeit'
				else 'null'
				end 
				as `Maize_Counterfeit_Improvedseeds`,
				case
					when m.maize_counterfeit_herbicides = '1' then 'All were counterfeit/fake'
					when m.maize_counterfeit_herbicides = '2' then 'Some were counterfeit/fake'
					when m.maize_counterfeit_herbicides = '3' then 'All was good/not counterfeit'
				else 'null'
				end 
				as `Maize_Counterfeit_Herbicides`,
				case
					when m.maize_counterfeit_pesticides = '1' then 'All were counterfeit/fake'
					when m.maize_counterfeit_pesticides = '2' then 'Some were counterfeit/fake'
					when m.maize_counterfeit_pesticides = '3' then 'All was good/not counterfeit'
				else 'null'
				end 
				as `Maize_Counterfeit_Pesticides`,
				case
					when m.maize_counterfeit_Fungicides = '1' then 'All were counterfeit/fake'
					when m.maize_counterfeit_Fungicides = '2' then 'Some were counterfeit/fake'
					when m.maize_counterfeit_Fungicides = '3' then 'All was good/not counterfeit'
				else 'null'
				end 
				as `Maize_Counterfeit_Fungicides`,

				case
					when m.maize_counterfeit_Fertilizers = '1' then 'All were counterfeit/fake'
					when m.maize_counterfeit_Fertilizers = '2' then 'Some were counterfeit/fake'
					when m.maize_counterfeit_Fertilizers = '3' then 'All was good/not counterfeit'
				else 'null'
				end 
				as `Maize_Counterfeit_Fertilizers`,
				replace(replace(replace(replace(replace(concat(
				(replace(m.maize_avoid_counterfeits, '1', 'Through information receivedfrom VA/extension workers/training/ radio about fake products ,I know how to avoid them,')), 
				(replace(m.maize_avoid_counterfeits, '2', 'I am buying in bulk with other farmers,')), 
				(replace(m.maize_avoid_counterfeits, '3', 'I am using more trusted sources of supply,')), 
				(replace(m.maize_avoid_counterfeits, '4', 'Others,')),
				(replace(m.maize_avoid_counterfeits, ' ', 'null,'))
				),'1',''),'2',''),'3',''),'4',''),' ','') as  `Maize_Avoid_Counterfeits`,

				case
					when m.maize_avoid_counterfeits_other = ' ' then 'null'
				else m.maize_avoid_counterfeits_other
				end 
				as `maize_avoid_counterfeits_other`,

				replace(replace(replace(replace(replace(replace(replace(replace(concat(
				(replace(m.maize_dry_harvested, '1', 'Ordinary sun drying on bear ground,')), 
				(replace(m.maize_dry_harvested, '2', 'Used Tarpaulins,')), 
				(replace(m.maize_dry_harvested, '3', 'Maize cribs,')), 
				(replace(m.maize_dry_harvested, '4', 'Used solar dryers with panel,')), 
				(replace(m.maize_dry_harvested, '5', 'Used solar dryer without panels,')), 
				(replace(m.maize_dry_harvested, '6', 'Used locally fabricated mechanical dyers,')),
				(replace(m.maize_dry_harvested, '7', 'Used  imported mechanical dryers,')),
				(replace(m.maize_dry_harvested, ' ', 'null,'))
				),'1',''),'2',''),'3',''),'4',''),'5',''),'6',''),'7',''),' ','') as  `Maize_Dry_Harvested`,

				case
					when m.maize_dry_harvested_other = ' ' then 'null'
				else m.maize_dry_harvested_other
				end 
				as `maize_dry_harvested_other`,

				replace(replace(replace(replace(replace(concat(
				(replace(m.maize_shell_use, '1', 'Bare hands,')), 
				(replace(m.maize_shell_use, '2', 'Suck and stick,')), 
				(replace(m.maize_shell_use, '3', 'Mobile Shellers,')), 
				(replace(m.maize_shell_use, '4', 'Others,')),
				(replace(m.maize_shell_use, ' ', 'null,'))
				),'1',''),'2',''),'3',''),'4',''),' ','') as  `Maize_Shelling_Use`,

				case
					when m.maize_shell_use_other = ' ' then 'null'
				else m.maize_shell_use_other
				end 
				as `maize_shell_use_other`,
				replace(replace(replace(replace(replace(replace(replace(replace(concat(
				(replace(m.maize_storage, '1', 'Ordinary storage house not on bags,')), 
				(replace(m.maize_storage, '2', 'Owned warehouse,')), 
				(replace(m.maize_storage, '3', 'Hired warehouse,')), 
				(replace(m.maize_storage, '4', 'Maize cribs,')), 
				(replace(m.maize_storage, '5', 'Silos/metal tanks,')), 
				(replace(m.maize_storage, '6', 'Grain /grain pic bags,')),
				(replace(m.maize_storage, '7', 'Others,')),
				(replace(m.maize_storage, ' ', 'null,'))
				),'1',''),'2',''),'3',''),'4',''),'5',''),'6',''),'7',''),' ','') as  `Maize_Storage`,

				case
					when m.maize_storage_other = ' ' then 'null'
				else m.maize_storage_other
				end 
				as `maize_storage_other`,
				m.maize_cost_production as `Maize_Cost_Production`,
				m.maize_cost_production_machinery as `maize_cost_production_machinery`,
				m.maize_cost_production_improvedseed as `maize_cost_production_improvedseed`,
				m.maize_cost_production_fertilizers as `maize_cost_production_fertilizers`,
				m.maize_cost_production_chemicals as `maize_cost_production_chemicals`,
				m.maize_cost_production_storage as `maize_cost_production_storage`,
				m.maize_cost_production_transportation as `maize_cost_production_transportation`,
				m.maize_cost_production_labour as `maize_cost_production_labour`,
				m.maize_cost_production_other as `maize_cost_production_other`,
				m.maize_harvested as `maize_harvested`,
				m.maize_sold as `maize_sold`,
				m.maize_sold_lastperiod as `maize_sold_lastperiod`,
				m.maize_sold_price as `maize_sold_price`,
				m.maize_harvest_loss as `maize_harvest_loss`,
				replace(replace(replace(replace(replace(replace(concat(
				(replace(m.maize_aware_standard, '1', 'Completely aware,')), 
				(replace(m.maize_aware_standard, '2', 'Largely aware,')), 
				(replace(m.maize_aware_standard, '3', 'Partly aware,')), 
				(replace(m.maize_aware_standard, '4', 'Slightly aware,')),
				(replace(m.maize_aware_standard, '5', 'Not aware at all,')),
				(replace(m.maize_aware_standard, ' ', 'null,'))
				),'1',''),'2',''),'3',''),'4',''),'5',''),' ','') as  `Maize_Aware_Standard`,

				case
					when b.farmer_crop_beans_crop = '1' then 'Yes'
					when b.farmer_crop_beans_crop = '2' then 'No'
				else 'null'
				end 
				as `farmer_crop_beans_crop`,
				replace(replace(replace(replace(concat(
				(replace(b.beans_other_crop, '1', 'Maize,')), 
				(replace(b.beans_other_crop, '2', 'Coffee,')), 
				(replace(b.beans_other_crop, '3', 'Others,')),
				(replace(b.beans_other_crop, ' ', 'null,'))
				),'1',''),'2',''),'3',''),' ','') as  `Other_Crop_Planted_Beans`,
				COALESCE(b.beans_other_crop_other, 'null') as `Beans_Other_Crop`,
				COALESCE(b.beans_acreage, 'null') as `beans_acreage`,
				case
					when b.beans_mapped = '1' then 'Yes'
					when b.beans_mapped = '2' then 'No'
				else 'null'
				end 
				as `Land_Mapped`,
				replace(replace(replace(replace(replace(replace(replace(replace(concat(
				(replace(b.beans_equipment_openingland, '0', 'None,')), 
				(replace(b.beans_equipment_openingland, '1', 'Use of Tractor,')), 
				(replace(b.beans_equipment_openingland, '2', 'Oxen-Ploughing,')), 
				(replace(b.beans_equipment_openingland, '3', 'Hand hoe Ploughing,')),
				(replace(b.beans_equipment_openingland, '4', 'Spraying/Use of herbicides,')),
				(replace(b.beans_equipment_openingland, '5', 'Use of rippers')),
				(replace(b.beans_equipment_openingland, '6', 'Basin conservation technology')),
				(replace(b.beans_equipment_openingland, ' ', 'null'))
				),'0',''),'1',''),'2',''),'3',''),'4',''),'5',''),'6',''),' ','') as  `Beans_Equipment_Used`,

				replace(replace(replace(replace(concat(
				(replace(b.beans_seed_variety, '1', 'Home saved/local seeds,')), 
				(replace(b.beans_seed_variety, '2', 'Improved seed-Hybrid,')), 
				(replace(b.beans_seed_variety, '3', 'Improved seed-Open pollinated variety(OPVs),')),
				(replace(b.beans_seed_variety, ' ', 'null,'))
				),'1',''),'2',''),'3',''),' ','') as  `Beans_Seed_Variety`,

				replace(replace(replace(replace(replace(replace(concat(
				(replace(b.beans_improvedseeds_notuse, '1', 'High cost of improved seeds, canít afford,')), 
				(replace(b.beans_improvedseeds_notuse, '2', 'Lack of knowledge about improved seeds,')), 
				(replace(b.beans_improvedseeds_notuse, '3', 'Donít knowwhere to access Improved seeds/ not available in the market,')), 
				(replace(b.beans_improvedseeds_notuse, '4', 'Frustrated because of counterfeit seeds,')), 
				(replace(b.beans_improvedseeds_notuse, '5', 'Others,')),
				(replace(b.beans_improvedseeds_notuse, ' ', 'null'))
				),'1',''),'2',''),'3',''),'4',''),'5',''),' ','')as  `Beans_Improvedseeds_Notuse`,
				COALESCE(b.beans_improvedseeds_notuse_other, 'null') as `Beans_improvedseeds_notuse_other`,
				replace(replace(replace(replace(replace(replace(replace(replace(replace(replace(replace(concat(
				(replace(b.beans_improvedseeds_benefits, '1', 'Good yields/ Better quality,')), 
				(replace(b.beans_improvedseeds_benefits, '2', 'Labour saving,')), 
				(replace(b.beans_improvedseeds_benefits, '3', 'Pests and Disease tolerant,')), 
				(replace(b.beans_improvedseeds_benefits, '4', 'Drought tolerant ,')),
				(replace(b.beans_improvedseeds_benefits, '5', 'Early Maturity,')),
				(replace(b.beans_improvedseeds_benefits, '6', 'Market demand')),
				(replace(b.beans_improvedseeds_benefits, '7', 'Cost of improved seeds was affordable')),
				(replace(b.beans_improvedseeds_benefits, '8', 'Easily accessible')),
				(replace(b.beans_improvedseeds_benefits, '9', 'Advised by friend/VA/extension worker')),
				(replace(b.beans_improvedseeds_benefits, '10', 'Others')),
				(replace(b.beans_improvedseeds_benefits, ' ', 'null'))
				),'1',''),'2',''),'3',''),'4',''),'5',''),'6',''),'7',''),'8',''),'9',''),'10',''),' ','')
				as  `Beans_Improvedseeds_Benefits`,
				COALESCE(b.beans_improvedseeds_benefits_other, 'null') as `beans_improvedseeds_benefits_other`,
				replace(replace(replace(replace(replace(replace(replace(replace(replace(concat(
				(replace(b.beans_improvedseed_supplier, '1', 'Stockist through VARM,')), 
				(replace(b.beans_improvedseed_supplier, '2', 'Village Agents,')), 
				(replace(b.beans_improvedseed_supplier, '3', 'Stockist,')), 
				(replace(b.beans_improvedseed_supplier, '4', 'Bought in the market/shop ,')),
				(replace(b.beans_improvedseed_supplier, '5', 'Got from another farmer,')),
				(replace(b.beans_improvedseed_supplier, '6', 'Direct from manufacturer')),
				(replace(b.beans_improvedseed_supplier, '7', 'Container Village in Kampala,')),
				(replace(b.beans_improvedseed_supplier, '8', 'Others')),
				(replace(b.beans_improvedseed_supplier, ' ', 'null'))
				),'1',''),'2',''),'3',''),'4',''),'5',''),'6',''),'7',''),'8',''),' ','')
				as  `Beans_Improvedseeds_Supplier`,
				COALESCE(b.beans_improvedseed_supplier_other, 'null') as `beans_improvedseed_supplier_other`,
				case
					when b.beans_improvedseed_properusage = '1' then 'Yes'
					when b.beans_improvedseed_properusage = '2' then 'No'
				else 'null'
				end 
				as `Beans_Improvedseed_Properusage`,

				b.beans_acreage_improvedseeds as `Landsize_Beans_Improvedseeds`,
				replace(replace(replace(replace(replace(replace(replace(concat(
				(replace(b.beans_equipment_planting, '1', 'Zero tillage Planters,')), 
				(replace(b.beans_equipment_planting, '2', 'Non-Zero tillage Planters,')), 
				(replace(b.beans_equipment_planting, '3', 'Basin conservation planting,')), 
				(replace(b.beans_equipment_planting, '4', 'Spacing using robes and hand hoe,')), 
				(replace(b.beans_equipment_planting, '5', 'Spacing using hand hoe only,')), 
				(replace(b.beans_equipment_planting, '6', 'Broadcasting/sowing,')),
				(replace(b.beans_equipment_planting, ' ', 'null,'))
				),'1',''),'2',''),'3',''),'4',''),'5',''),'6',''),'6','')  as  `BeansEquipmentMethod_Planting`,
				COALESCE(b.beans_equipment_planting_other, 'null') as `beans_equipment_planting_other`,
				replace(replace(replace(replace(replace(replace(concat(
				(replace(b.beans_improvedseeds_notuse, '1', 'Myself/ used family labour,')), 
				(replace(b.beans_improvedseeds_notuse, '2', 'Hired causal labourers,')), 
				(replace(b.beans_improvedseeds_notuse, '3', 'Hired specialized services provider,')), 
				(replace(b.beans_improvedseeds_notuse, '4', 'Used members of a group,')), 
				(replace(b.beans_improvedseeds_notuse, '5', 'Village Agent,')),
				(replace(b.beans_improvedseeds_notuse, ' ', 'null,'))
				),'1',''),'2',''),'3',''),'4',''),'5',''),' ','') as  `Beans_Whoplanted`,
				COALESCE(b.beans_whoplanted_Other, 'null') as `beans_whoplanted_Other`,
				case
					when b.beans_fertilizer_use = '2' then 'Yes, 1st fertilizer application(DAP)only'
					when b.beans_fertilizer_use = '1' then 'No'
					when b.beans_fertilizer_use = '3' then 'Yes, 2nd fertilizer application(UREA) only'
					when b.beans_fertilizer_use = '4' then 'Yes, both 1st and 2nd fertilizer application'
				else 'null'
				end 
				as `Beans_Fertilizer_use`,
				replace(replace(replace(replace(replace(replace(concat(
				(replace(b.beans_fertlizer_notuse, '1', 'High cost of fertilizers, canít afford,')), 
				(replace(b.beans_fertlizer_notuse, '2', 'Labour intensive,')), 
				(replace(b.beans_fertlizer_notuse, '3', 'Lack of knowledge about use of fertilizers,')), 
				(replace(b.beans_fertlizer_notuse, '4', 'Donít know where to access fertilizers seeds/ not available in the market,')), 
				(replace(b.beans_fertlizer_notuse, '5', 'Frustrated because of counterfeit fertilizers,')),
				(replace(b.beans_fertlizer_notuse, ' ', 'null,'))
				),'1',''),'2',''),'3',''),'4',''),'5',''),' ','') as  `Beans_Fertlizer_Notuse`,
				COALESCE(b.beans_fertlizer_notuse_other, 'null') as `beans_fertlizer_notuse_other`,
				replace(replace(replace(replace(replace(replace(replace(replace(replace(concat(
				(replace(b.beans_fertilizer_benefits, '1', 'Good yields/ Better quality,')), 
				(replace(b.beans_fertilizer_benefits, '2', 'Pests and Disease tolerant,')), 
				(replace(b.beans_fertilizer_benefits, '3', 'Drought tolerant,')), 
				(replace(b.beans_fertilizer_benefits, '4', 'Early Maturity ,')),
				(replace(b.beans_fertilizer_benefits, '5', 'Cost of fertilizer was affordable,')),
				(replace(b.beans_fertilizer_benefits, '6', 'Easily accessible')),
				(replace(b.beans_fertilizer_benefits, '7', 'Advised by friend/VA/extension worker,')),
				(replace(b.beans_fertilizer_benefits, '8', 'Others')),
				(replace(b.beans_fertilizer_benefits, ' ', 'null'))
				),'1',''),'2',''),'3',''),'4',''),'5',''),'6',''),'7',''),'8',''),' ','')
				as  `Beans_Fertilizer_Benefits`,
				COALESCE(b.beans_fertilizer_benefits_other, 'null') as `beans_fertilizer_benefits_other`,
				replace(replace(replace(replace(replace(replace(replace(replace(replace(concat(
				(replace(b.beans_fertilizer_supplier, '1', 'Stockist through VARM,')), 
				(replace(b.beans_fertilizer_supplier, '2', 'Village Agents,')), 
				(replace(b.beans_fertilizer_supplier, '3', 'Stockist,')), 
				(replace(b.beans_fertilizer_supplier, '4', 'Bought in the market/shop,')),
				(replace(b.beans_fertilizer_supplier, '5', 'Got from another farmer,')),
				(replace(b.beans_fertilizer_supplier, '6', 'Direct from manufacturer')),
				(replace(b.beans_fertilizer_supplier, '7', 'Container Village in Kampala,')),
				(replace(b.beans_fertilizer_supplier, '8', 'Others')),
				(replace(b.beans_fertilizer_supplier, ' ', 'null'))
				),'1',''),'2',''),'3',''),'4',''),'5',''),'6',''),'7',''),'8',''),' ','')
				as  `Beans_Fertilizer_Supplier`,
				COALESCE(b.beans_fertilizer_supplier_other, 'null') as `beans_fertilizer_supplier_other`,
				case
					when b.beans_fertilizer_properusage = '1' then 'Yes'
					when b.beans_fertilizer_properusage = '2' then 'No'
				else 'null'
				end 
				as `Beans_Fertilizer_Properusage`,
				replace(replace(replace(replace(replace(replace(concat(
				(replace(b.beans_ferilizer_whosupplied, '1', 'Myself/ used family labour,')), 
				(replace(b.beans_ferilizer_whosupplied, '2', 'Hired causal labourers,')), 
				(replace(b.beans_ferilizer_whosupplied, '3', 'Hired specialized services provider,')), 
				(replace(b.beans_ferilizer_whosupplied, '4', 'Used members of a group,')), 
				(replace(b.beans_ferilizer_whosupplied, '5', 'Village Agent,')),
				(replace(b.beans_ferilizer_whosupplied, ' ', 'null,'))
				),'1',''),'2',''),'3',''),'4',''),'5',''),' ','') as  `Beans_WhoApplied`,
				COALESCE(b.beans_ferilizer_whosupplied_other, 'null') as `beans_ferilizer_whosupplied_other`,
				COALESCE(b.beans_acreage_fertilizer, 'null') as `Beans_Land_fertilizers`,
				replace(replace(replace(replace(replace(replace(concat(
				(replace(b.beans_chemical_use, '0', 'Weeding using hand hoe/picking weed,')), 
				(replace(b.beans_chemical_use, '1', 'Weeding using machinery,')), 
				(replace(b.beans_chemical_use, '2', 'Sprayed crop with selective herbicides,')), 
				(replace(b.beans_chemical_use, '3', 'Sprayed crop with Pesticides,')), 
				(replace(b.beans_chemical_use, '4', 'Sprayed crop with fungicides,')),
				(replace(b.beans_chemical_use, ' ', 'null,'))
				),'0',''),'1',''),'2',''),'3',''),'4',''),' ','') as  `Beans_Chemical_Use`,
				COALESCE(b.beans_chemical_use_other, 'null') as `Beans_Chemical_use_other`,
				replace(replace(replace(replace(replace(replace(concat(
				(replace(b.beans_chemical_notuse, '1', 'High cost of agricultural chemicals, canít afford,')), 
				(replace(b.beans_chemical_notuse, '2', 'Labour intensive,')), 
				(replace(b.beans_chemical_notuse, '3', 'Lack of knowledge about use of agricultural chemicals,')), 
				(replace(b.beans_chemical_notuse, '4', 'Donít know where to access agricultural chemicals/ not available in the market,')), 
				(replace(b.beans_chemical_notuse, '5', 'Frustrated because of counterfeit agricultural chemicals,')),
				(replace(b.beans_chemical_notuse, ' ', 'null,'))
				),'1',''),'2',''),'3',''),'4',''),'5',''),' ','') as  `Beans_Chemicals_NotUse`,
				COALESCE(b.beans_chemical_notuse_other, 'null') as `beans_chemical_notuse_other`,
				replace(replace(replace(replace(replace(replace(replace(replace(replace(concat(
				(replace(b.beans_chemical_benefits, '1', 'Good yields/ Better quality,')), 
				(replace(b.beans_chemical_benefits, '2', 'Labour saving,')), 
				(replace(b.beans_chemical_benefits, '3', 'Pests and Disease control,')), 
				(replace(b.beans_chemical_benefits, '4', 'Drought toleran,')),
				(replace(b.beans_chemical_benefits, '5', 'Early Maturity,')),
				(replace(b.beans_chemical_benefits, '6', 'Cost of chemicals was affordable')),
				(replace(b.beans_chemical_benefits, '7', 'Easily accessible,')),
				(replace(b.beans_chemical_benefits, '8', 'Advised by friend/VA/extension worker,')),
				(replace(b.beans_chemical_benefits, '9', 'Others')),
				(replace(b.beans_chemical_benefits, ' ', 'null'))
				),'1',''),'2',''),'3',''),'4',''),'5',''),'6',''),'7',''),'8',''),' ','')
				as  `Beans_Chemicals_Benefits`,
				COALESCE(b.beans_chemical_benefits_other, 'null') as `beans_chemical_benefits_other`,
				replace(replace(replace(replace(replace(replace(replace(replace(replace(concat(
				(replace(b.beans_chemical_supplier, '1', 'Stockist through VARM,')), 
				(replace(b.beans_chemical_supplier, '2', 'Village Agents,')), 
				(replace(b.beans_chemical_supplier, '3', 'Stockist,')), 
				(replace(b.beans_chemical_supplier, '4', 'Bought in the market/shop,')),
				(replace(b.beans_chemical_supplier, '5', 'Got from another farmer,')),
				(replace(b.beans_chemical_supplier, '6', 'Direct from manufacturer')),
				(replace(b.beans_chemical_supplier, '7', 'Container Village in Kampala,')),
				(replace(b.beans_chemical_supplier, '8', 'Others')),
				(replace(b.beans_chemical_supplier, ' ', 'null'))
				),'1',''),'2',''),'3',''),'4',''),'5',''),'6',''),'7',''),'8',''),' ','')
				as  `Beans_Chemicals_Supplier`,
				COALESCE(b.beans_chemical_supplier_other, 'null') as `beans_chemical_supplier_other`,
				COALESCE(b.beans_chemicals_properusage, 'null') as `Beans_Chemicals_Properusage`,
				replace(replace(replace(replace(replace(replace(concat(
				(replace(b.beans_chemical_whoapplied, '1', 'Myself/ used family labour,')), 
				(replace(b.beans_chemical_whoapplied, '2', 'Hired causal labourers,')), 
				(replace(b.beans_chemical_whoapplied, '3', 'Hired specialized services provider,')), 
				(replace(b.beans_chemical_whoapplied, '4', 'Used members of a group,')), 
				(replace(b.beans_chemical_whoapplied, '5', 'Village Agent,')),
				(replace(b.beans_chemical_whoapplied, ' ', 'null,'))
				),'1',''),'2',''),'3',''),'4',''),'5',''),' ','') as  `Beans_Chemicals_WhoApplied`,
				COALESCE(b.beans_chemical_whoapplied_other, 'null') as `beans_chemical_whoapplied_other`,
				COALESCE(b.beans_acreage_chemicals, 'null') as `Beans_Land_Chemicals`,
				case
					when b.beans_detect_counterfeit = '1' then 'Yes'
					when b.beans_detect_counterfeit = '2' then 'No'
				else 'null'
				end 
				as `Beans_Detect_Counterfeit`,

				case
					when b.beans_opinion = '1' then 'Decreased a great deal'
					when b.beans_opinion = '2' then 'Decreased quite a bit'
					when b.beans_opinion = '3' then 'Decreased somewhat'
					when b.beans_opinion = '4' then 'Decrease is Very little'
					when b.beans_opinion = '5' then 'No decrease  at all'
				else 'null'
				end 
				as `Beans_Opinion`,
				case
					when b.beans_counterfeit_improvedseeds = '1' then 'All were counterfeit/fake'
					when b.beans_counterfeit_improvedseeds = '2' then 'Some were counterfeit/fake'
					when b.beans_counterfeit_improvedseeds = '3' then 'All was good/not counterfeit'
				else 'null'
				end 
				as `Beans_Counterfeit_Improvedseeds`,
				case
					when b.beans_counterfeit_herbicides = '1' then 'All were counterfeit/fake'
					when b.beans_counterfeit_herbicides = '2' then 'Some were counterfeit/fake'
					when b.beans_counterfeit_herbicides = '3' then 'All was good/not counterfeit'
				else 'null'
				end 
				as `Beans_Counterfeit_Herbicides`,
				case
					when b.beans_counterfeit_pesticides = '1' then 'All were counterfeit/fake'
					when b.beans_counterfeit_pesticides = '2' then 'Some were counterfeit/fake'
					when b.beans_counterfeit_pesticides = '3' then 'All was good/not counterfeit'
				else 'null'
				end 
				as `Beans_Counterfeit_Pesticides`,
				case
					when b.beans_counterfeit_Fungicides = '1' then 'All were counterfeit/fake'
					when b.beans_counterfeit_Fungicides = '2' then 'Some were counterfeit/fake'
					when b.beans_counterfeit_Fungicides = '3' then 'All was good/not counterfeit'
				else 'null'
				end 
				as `Beans_Counterfeit_Fungicides`,

				case
					when b.beans_counterfeit_Fertilizers = '1' then 'All were counterfeit/fake'
					when b.beans_counterfeit_Fertilizers = '2' then 'Some were counterfeit/fake'
					when b.beans_counterfeit_Fertilizers = '3' then 'All was good/not counterfeit'
				else 'null'
				end 
				as `Beans_Counterfeit_Fertilizers`,
				replace(replace(replace(replace(replace(concat(
				(replace(b.beans_avoid_counterfeits, '1', 'Through information receivedfrom VA/extension workers/training/ radio about fake products ,I know how to avoid them,')), 
				(replace(b.beans_avoid_counterfeits, '2', 'I am buying in bulk with other farmers,')), 
				(replace(b.beans_avoid_counterfeits, '3', 'I am using more trusted sources of supply,')), 
				(replace(b.beans_avoid_counterfeits, '4', 'Others,')),
				(replace(b.beans_avoid_counterfeits, ' ', 'null,'))
				),'1',''),'2',''),'3',''),'4',''),' ','') as  `Beans_Avoid_Counterfeits`,
				COALESCE(b.beans_avoid_counterfeits_other, 'null') as `beans_avoid_counterfeits_other`,
				replace(replace(replace(replace(replace(replace(replace(replace(concat(
				(replace(b.beans_dry_harvested, '1', 'Ordinary sun drying on bear ground,')), 
				(replace(b.beans_dry_harvested, '2', 'Used Tarpaulins,')), 
				(replace(b.beans_dry_harvested, '3', 'Beans cribs,')), 
				(replace(b.beans_dry_harvested, '4', 'Used solar dryers with panel,')), 
				(replace(b.beans_dry_harvested, '5', 'Used solar dryer without panels,')), 
				(replace(b.beans_dry_harvested, '6', 'Used locally fabricated mechanical dyers,')),
				(replace(b.beans_dry_harvested, '7', 'Used  imported mechanical dryers,')),
				(replace(b.beans_dry_harvested, ' ', 'null,'))
				),'1',''),'2',''),'3',''),'4',''),'5',''),'6',''),'7',''),' ','') as  `Beans_Dry_Harvested`,
				COALESCE(b.beans_dry_harvested_other, 'null') as `beans_dry_harvested_other`,
				replace(replace(replace(replace(replace(concat(
				(replace(b.beans_shell_use, '1', 'Bare hands,')), 
				(replace(b.beans_shell_use, '2', 'Suck and stick,')), 
				(replace(b.beans_shell_use, '3', 'Mobile Shellers,')), 
				(replace(b.beans_shell_use, '4', 'Others,')),
				(replace(b.beans_shell_use, ' ', 'null,'))
				),'1',''),'2',''),'3',''),'4',''),' ','') as  `Beans_Shelling_Use`,
				COALESCE(b.beans_shell_use_other, 'null') as `beans_shell_use_other`,
				replace(replace(replace(replace(replace(replace(replace(replace(concat(
				(replace(b.beans_storage, '1', 'Ordinary storage house not on bags,')), 
				(replace(b.beans_storage, '2', 'Owned warehouse,')), 
				(replace(b.beans_storage, '3', 'Hired warehouse,')), 
				(replace(b.beans_storage, '4', 'Beans cribs,')), 
				(replace(b.beans_storage, '5', 'Silos/metal tanks,')), 
				(replace(b.beans_storage, '6', 'Grain /grain pic bags,')),
				(replace(b.beans_storage, '7', 'Others,')),
				(replace(b.beans_storage, ' ', 'null,'))
				),'1',''),'2',''),'3',''),'4',''),'5',''),'6',''),'7',''),' ','') as  `Beans_Storage`,
				COALESCE(b.beans_storage_other, 'null') as `beans_storage_other`,
				b.beans_cost_production as `Beans_Cost_Production`,
				b.beans_cost_production_machinery as `beans_cost_production_machinery`,
				b.beans_cost_production_improvedseed as `beans_cost_production_improvedseed`,
				b.beans_cost_production_fertilizers as `beans_cost_production_fertilizers`,
				b.beans_cost_production_chemicals as `beans_cost_production_chemicals`,
				b.beans_cost_production_storage as `beans_cost_production_storage`,
				b.beans_cost_production_transportation as `beans_cost_production_transportation`,
				b.beans_cost_production_labour as `beans_cost_production_labour`,
				b.beans_cost_production_other as `beans_cost_production_other`,
				b.beans_harvested as `beans_harvested`,
				b.beans_sold as `beans_sold`,
				b.beans_sold_lastperiod as `beans_sold_lastperiod`,
				b.beans_sold_price as `beans_sold_price`,
				b.beans_harvest_loss as `beans_harvest_loss`,
				replace(replace(replace(replace(replace(replace(concat(
				(replace(b.beans_aware_standard, '1', 'Completely aware,')), 
				(replace(b.beans_aware_standard, '2', 'Largely aware,')), 
				(replace(b.beans_aware_standard, '3', 'Partly aware,')), 
				(replace(b.beans_aware_standard, '4', 'Slightly aware,')),
				(replace(b.beans_aware_standard, '5', 'Not aware at all,')),
				(replace(b.beans_aware_standard, ' ', 'null,'))
				),'1',''),'2',''),'3',''),'4',''),'5',''),' ','') as  `Beans_Aware_Standard`,



				case
					when c.farmer_crop_coffee_crop = '1' then 'Yes'
					when c.farmer_crop_coffee_crop = '2' then 'No'
				else 'null'
				end 
				as `farmer_crop_coffee_crop`,
				replace(replace(replace(replace(concat(
				(replace(c.coffee_other_crop, '1', 'Maize,')), 
				(replace(c.coffee_other_crop, '2', 'Beans,')), 
				(replace(c.coffee_other_crop, '3', 'Others,')),
				(replace(c.coffee_other_crop, ' ', 'null,'))
				),'1',''),'2',''),'3',''),' ','') as  `Other_Crop_Planted_Coffee`,
				COALESCE(c.coffee_other_crop_other, 'null') as `Coffee_Other_Crop`,
				COALESCE(c.coffee_acreage, 'null') as `coffee_acreage`,
				case
					when c.coffee_mapped = '1' then 'Yes'
					when c.coffee_mapped = '2' then 'No'
				else 'null'
				end 
				as `Land_Mapped`,
				replace(replace(replace(replace(replace(replace(replace(replace(concat(
				(replace(c.coffee_equipment_openingland, '0', 'None,')), 
				(replace(c.coffee_equipment_openingland, '1', 'Use of Tractor,')), 
				(replace(c.coffee_equipment_openingland, '2', 'Oxen-Ploughing,')), 
				(replace(c.coffee_equipment_openingland, '3', 'Hand hoe Ploughing,')),
				(replace(c.coffee_equipment_openingland, '4', 'Spraying/Use of herbicides,')),
				(replace(c.coffee_equipment_openingland, '5', 'Use of rippers')),
				(replace(c.coffee_equipment_openingland, '6', 'Basin conservation technology')),
				(replace(c.coffee_equipment_openingland, ' ', 'null'))
				),'0',''),'1',''),'2',''),'3',''),'4',''),'5',''),'6',''),' ','') as  `Coffee_Equipment_Used`,

				replace(replace(replace(replace(concat(
				(replace(c.coffee_tree_variety, '1', 'Home saved/local trees,')), 
				(replace(c.coffee_tree_variety, '2', 'Improved trees-Hybrid,')), 
				(replace(c.coffee_tree_variety, '3', 'Improved trees-Open pollinated variety(OPVs),')),
				(replace(c.coffee_tree_variety, ' ', 'null,'))
				),'1',''),'2',''),'3',''),' ','') as  `Coffee_Trees_Variety`,

				replace(replace(replace(replace(replace(replace(concat(
				(replace(c.coffee_improvedtrees_notuse, '1', 'High cost of improved trees, canít afford,')), 
				(replace(c.coffee_improvedtrees_notuse, '2', 'Lack of knowledge about improved trees,')), 
				(replace(c.coffee_improvedtrees_notuse, '3', 'Donít knowwhere to access Improved trees/ not available in the market,')), 
				(replace(c.coffee_improvedtrees_notuse, '4', 'Frustrated because of counterfeit trees,')), 
				(replace(c.coffee_improvedtrees_notuse, '5', 'Others,')),
				(replace(c.coffee_improvedtrees_notuse, ' ', 'null'))
				),'1',''),'2',''),'3',''),'4',''),'5',''),' ','')as  `Coffee_Improvedtrees_Notuse`,
				COALESCE(c.Coffee_improvedtrees_notuse_other, 'null') as `Coffee_improvedtrees_notuse_other`,
				replace(replace(replace(replace(replace(replace(replace(replace(replace(replace(replace(concat(
				(replace(c.coffee_improvedtrees_benefits, '1', 'Good yields/ Better quality,')), 
				(replace(c.coffee_improvedtrees_benefits, '2', 'Labour saving,')), 
				(replace(c.coffee_improvedtrees_benefits, '3', 'Pests and Disease tolerant,')), 
				(replace(c.coffee_improvedtrees_benefits, '4', 'Drought tolerant ,')),
				(replace(c.coffee_improvedtrees_benefits, '5', 'Early Maturity,')),
				(replace(c.coffee_improvedtrees_benefits, '6', 'Market demand')),
				(replace(c.coffee_improvedtrees_benefits, '7', 'Cost of improved trees was affordable')),
				(replace(c.coffee_improvedtrees_benefits, '8', 'Easily accessible')),
				(replace(c.coffee_improvedtrees_benefits, '9', 'Advised by friend/VA/extension worker')),
				(replace(c.coffee_improvedtrees_benefits, '10', 'Others')),
				(replace(c.coffee_improvedtrees_benefits, ' ', 'null'))
				),'1',''),'2',''),'3',''),'4',''),'5',''),'6',''),'7',''),'8',''),'9',''),'10',''),' ','')
				as  `Coffee_Improvedtrees_Benefits`,
				COALESCE(c.coffee_improvedtrees_benefits_other, 'null') as `coffee_improvedtrees_benefits_other`,
				replace(replace(replace(replace(replace(replace(replace(replace(replace(concat(
				(replace(c.coffee_improvedtrees_supplier, '1', 'Stockist through VARM,')), 
				(replace(c.coffee_improvedtrees_supplier, '2', 'Village Agents,')), 
				(replace(c.coffee_improvedtrees_supplier, '3', 'Stockist,')), 
				(replace(c.coffee_improvedtrees_supplier, '4', 'Bought in the market/shop ,')),
				(replace(c.coffee_improvedtrees_supplier, '5', 'Got from another farmer,')),
				(replace(c.coffee_improvedtrees_supplier, '6', 'Direct from manufacturer')),
				(replace(c.coffee_improvedtrees_supplier, '7', 'Container Village in Kampala,')),
				(replace(c.coffee_improvedtrees_supplier, '8', 'Others')),
				(replace(c.coffee_improvedtrees_supplier, ' ', 'null'))
				),'1',''),'2',''),'3',''),'4',''),'5',''),'6',''),'7',''),'8',''),' ','')
				as  `Coffee_Improvedtrees_Supplier`,
				COALESCE(c.coffee_improvedtrees_supplier_other, 'null') as `coffee_improvedtrees_supplier_other`,
				case
					when c.coffee_improvedtrees_properusage = '1' then 'Yes'
					when c.coffee_improvedtrees_properusage = '2' then 'No'
				else 'null'
				end 
				as `Coffee_Improvedtrees_Properusage`,

				c.coffee_acreage_improvedtrees as `Landsize_Coffee_Improvedtrees`,
				replace(replace(replace(replace(replace(replace(replace(concat(
				(replace(c.coffee_equipment_planting, '1', 'Zero tillage Planters,')), 
				(replace(c.coffee_equipment_planting, '2', 'Non-Zero tillage Planters,')), 
				(replace(c.coffee_equipment_planting, '3', 'Basin conservation planting,')), 
				(replace(c.coffee_equipment_planting, '4', 'Spacing using robes and hand hoe,')), 
				(replace(c.coffee_equipment_planting, '5', 'Spacing using hand hoe only,')), 
				(replace(c.coffee_equipment_planting, '6', 'Broadcasting/sowing,')),
				(replace(c.coffee_equipment_planting, ' ', 'null,'))
				),'1',''),'2',''),'3',''),'4',''),'5',''),'6',''),'6','')  as  `CoffeeEquipmentMethod_Planting`,
				COALESCE(c.coffee_equipment_planting_other, 'null') as `coffee_equipment_planting_other`,
				replace(replace(replace(replace(replace(replace(concat(
				(replace(c.coffee_improvedtrees_notuse, '1', 'Myself/ used family labour,')), 
				(replace(c.coffee_improvedtrees_notuse, '2', 'Hired causal labourers,')), 
				(replace(c.coffee_improvedtrees_notuse, '3', 'Hired specialized services provider,')), 
				(replace(c.coffee_improvedtrees_notuse, '4', 'Used members of a group,')), 
				(replace(c.coffee_improvedtrees_notuse, '5', 'Village Agent,')),
				(replace(c.coffee_improvedtrees_notuse, ' ', 'null,'))
				),'1',''),'2',''),'3',''),'4',''),'5',''),' ','') as  `Coffee_Whoplanted`,
				COALESCE(c.coffee_whoplanted_Other, 'null') as `coffee_whoplanted_Other`,
				case
					when c.coffee_fertilizer_use = '2' then 'Yes, 1st fertilizer application(DAP)only'
					when c.coffee_fertilizer_use = '1' then 'No'
					when c.coffee_fertilizer_use = '3' then 'Yes, 2nd fertilizer application(UREA) only'
					when c.coffee_fertilizer_use = '4' then 'Yes, both 1st and 2nd fertilizer application'
				else 'null'
				end 
				as `Coffee_Fertilizer_use`,
				replace(replace(replace(replace(replace(replace(concat(
				(replace(c.coffee_fertlizer_notuse, '1', 'High cost of fertilizers, canít afford,')), 
				(replace(c.coffee_fertlizer_notuse, '2', 'Labour intensive,')), 
				(replace(c.coffee_fertlizer_notuse, '3', 'Lack of knowledge about use of fertilizers,')), 
				(replace(c.coffee_fertlizer_notuse, '4', 'Donít know where to access fertilizers trees/ not available in the market,')), 
				(replace(c.coffee_fertlizer_notuse, '5', 'Frustrated because of counterfeit fertilizers,')),
				(replace(c.coffee_fertlizer_notuse, ' ', 'null,'))
				),'1',''),'2',''),'3',''),'4',''),'5',''),' ','') as  `Coffee_Fertlizer_Notuse`,
				COALESCE(c.coffee_fertlizer_notuse_other, 'null') as `coffee_fertlizer_notuse_other`,
				replace(replace(replace(replace(replace(replace(replace(replace(replace(concat(
				(replace(c.coffee_fertilizer_benefits, '1', 'Good yields/ Better quality,')), 
				(replace(c.coffee_fertilizer_benefits, '2', 'Pests and Disease tolerant,')), 
				(replace(c.coffee_fertilizer_benefits, '3', 'Drought tolerant,')), 
				(replace(c.coffee_fertilizer_benefits, '4', 'Early Maturity ,')),
				(replace(c.coffee_fertilizer_benefits, '5', 'Cost of fertilizer was affordable,')),
				(replace(c.coffee_fertilizer_benefits, '6', 'Easily accessible')),
				(replace(c.coffee_fertilizer_benefits, '7', 'Advised by friend/VA/extension worker,')),
				(replace(c.coffee_fertilizer_benefits, '8', 'Others')),
				(replace(c.coffee_fertilizer_benefits, ' ', 'null'))
				),'1',''),'2',''),'3',''),'4',''),'5',''),'6',''),'7',''),'8',''),' ','')
				as  `Coffee_Fertilizer_Benefits`,
				COALESCE(c.coffee_fertilizer_benefits_other, 'null') as `coffee_fertilizer_benefits_other`,
				replace(replace(replace(replace(replace(replace(replace(replace(replace(concat(
				(replace(c.coffee_fertilizer_supplier, '1', 'Stockist through VARM,')), 
				(replace(c.coffee_fertilizer_supplier, '2', 'Village Agents,')), 
				(replace(c.coffee_fertilizer_supplier, '3', 'Stockist,')), 
				(replace(c.coffee_fertilizer_supplier, '4', 'Bought in the market/shop,')),
				(replace(c.coffee_fertilizer_supplier, '5', 'Got from another farmer,')),
				(replace(c.coffee_fertilizer_supplier, '6', 'Direct from manufacturer')),
				(replace(c.coffee_fertilizer_supplier, '7', 'Container Village in Kampala,')),
				(replace(c.coffee_fertilizer_supplier, '8', 'Others')),
				(replace(c.coffee_fertilizer_supplier, ' ', 'null'))
				),'1',''),'2',''),'3',''),'4',''),'5',''),'6',''),'7',''),'8',''),' ','')
				as  `Coffee_Fertilizer_Supplier`,
				COALESCE(c.coffee_fertilizer_supplier_other, 'null') as `coffee_fertilizer_supplier_other`,
				case
					when c.coffee_fertilizer_properusage = '1' then 'Yes'
					when c.coffee_fertilizer_properusage = '2' then 'No'
				else 'null'
				end 
				as `Coffee_Fertilizer_Properusage`,
				replace(replace(replace(replace(replace(replace(concat(
				(replace(c.coffee_ferilizer_whosupplied, '1', 'Myself/ used family labour,')), 
				(replace(c.coffee_ferilizer_whosupplied, '2', 'Hired causal labourers,')), 
				(replace(c.coffee_ferilizer_whosupplied, '3', 'Hired specialized services provider,')), 
				(replace(c.coffee_ferilizer_whosupplied, '4', 'Used members of a group,')), 
				(replace(c.coffee_ferilizer_whosupplied, '5', 'Village Agent,')),
				(replace(c.coffee_ferilizer_whosupplied, ' ', 'null,'))
				),'1',''),'2',''),'3',''),'4',''),'5',''),' ','') as  `Coffee_WhoApplied`,
				COALESCE(c.coffee_ferilizer_whosupplied_other, 'null') as `coffee_ferilizer_whosupplied_other`,
				COALESCE(c.coffee_acreage_fertilizer, 'null') as `Coffee_Land_fertilizers`,
				replace(replace(replace(replace(replace(replace(concat(
				(replace(c.coffee_chemical_use, '0', 'Weeding using hand hoe/picking weed,')), 
				(replace(c.coffee_chemical_use, '1', 'Weeding using machinery,')), 
				(replace(c.coffee_chemical_use, '2', 'Sprayed crop with selective herbicides,')), 
				(replace(c.coffee_chemical_use, '3', 'Sprayed crop with Pesticides,')), 
				(replace(c.coffee_chemical_use, '4', 'Sprayed crop with fungicides,')),
				(replace(c.coffee_chemical_use, ' ', 'null,'))
				),'0',''),'1',''),'2',''),'3',''),'4',''),' ','') as  `Coffee_Chemical_Use`,
				COALESCE(c.coffee_chemical_use_other, 'null') as `coffee_chemical_use_other`,
				replace(replace(replace(replace(replace(replace(concat(
				(replace(c.coffee_chemical_notuse, '1', 'High cost of agricultural chemicals, canít afford,')), 
				(replace(c.coffee_chemical_notuse, '2', 'Labour intensive,')), 
				(replace(c.coffee_chemical_notuse, '3', 'Lack of knowledge about use of agricultural chemicals,')), 
				(replace(c.coffee_chemical_notuse, '4', 'Donít know where to access agricultural chemicals/ not available in the market,')), 
				(replace(c.coffee_chemical_notuse, '5', 'Frustrated because of counterfeit agricultural chemicals,')),
				(replace(c.coffee_chemical_notuse, ' ', 'null,'))
				),'1',''),'2',''),'3',''),'4',''),'5',''),' ','') as  `Coffee_Chemicals_NotUse`,
				COALESCE(c.coffee_chemical_notuse_other, 'null') as `coffee_chemical_notuse_other`,
				replace(replace(replace(replace(replace(replace(replace(replace(replace(concat(
				(replace(c.coffee_chemical_benefits, '1', 'Good yields/ Better quality,')), 
				(replace(c.coffee_chemical_benefits, '2', 'Labour saving,')), 
				(replace(c.coffee_chemical_benefits, '3', 'Pests and Disease control,')), 
				(replace(c.coffee_chemical_benefits, '4', 'Drought toleran,')),
				(replace(c.coffee_chemical_benefits, '5', 'Early Maturity,')),
				(replace(c.coffee_chemical_benefits, '6', 'Cost of chemicals was affordable')),
				(replace(c.coffee_chemical_benefits, '7', 'Easily accessible,')),
				(replace(c.coffee_chemical_benefits, '8', 'Advised by friend/VA/extension worker,')),
				(replace(c.coffee_chemical_benefits, '9', 'Others')),
				(replace(c.coffee_chemical_benefits, ' ', 'null'))
				),'1',''),'2',''),'3',''),'4',''),'5',''),'6',''),'7',''),'8',''),' ','')
				as  `Coffee_Chemicals_Benefits`,
				COALESCE(c.coffee_chemical_benefits_other, 'null') as `coffee_chemical_benefits_other`,
				replace(replace(replace(replace(replace(replace(replace(replace(replace(concat(
				(replace(c.coffee_chemical_supplier, '1', 'Stockist through VARM,')), 
				(replace(c.coffee_chemical_supplier, '2', 'Village Agents,')), 
				(replace(c.coffee_chemical_supplier, '3', 'Stockist,')), 
				(replace(c.coffee_chemical_supplier, '4', 'Bought in the market/shop,')),
				(replace(c.coffee_chemical_supplier, '5', 'Got from another farmer,')),
				(replace(c.coffee_chemical_supplier, '6', 'Direct from manufacturer')),
				(replace(c.coffee_chemical_supplier, '7', 'Container Village in Kampala,')),
				(replace(c.coffee_chemical_supplier, '8', 'Others')),
				(replace(c.coffee_chemical_supplier, ' ', 'null'))
				),'1',''),'2',''),'3',''),'4',''),'5',''),'6',''),'7',''),'8',''),' ','')
				as  `Coffee_Chemicals_Supplier`,
				COALESCE(c.coffee_chemical_supplier_other, 'null') as `coffee_chemical_supplier_other`,
				case
					when c.coffee_chemicals_properusage = '1' then 'Yes'
					when c.coffee_chemicals_properusage = '2' then 'No'
				else 'null'
				end 
				as `Coffee_Chemicals_Properusage`,

				replace(replace(replace(replace(replace(replace(concat(
				(replace(c.coffee_chemical_whoapplied, '1', 'Myself/ used family labour,')), 
				(replace(c.coffee_chemical_whoapplied, '2', 'Hired causal labourers,')), 
				(replace(c.coffee_chemical_whoapplied, '3', 'Hired specialized services provider,')), 
				(replace(c.coffee_chemical_whoapplied, '4', 'Used members of a group,')), 
				(replace(c.coffee_chemical_whoapplied, '5', 'Village Agent,')),
				(replace(c.coffee_chemical_whoapplied, ' ', 'null,'))
				),'1',''),'2',''),'3',''),'4',''),'5',''),' ','') as  `Coffee_Chemicals_WhoApplied`,
				COALESCE(c.coffee_chemical_whoapplied_other, 'null') as `coffee_chemical_whoapplied_other`,
				COALESCE(c.coffee_acreage_chemicals, 'null') as `Coffee_Land_Chemicals`,
				case
					when c.coffee_detect_counterfeit = '1' then 'Yes'
					when c.coffee_detect_counterfeit = '2' then 'No'
				else 'null'
				end 
				as `Coffee_Detect_Counterfeit`,

				case
					when c.coffee_opinion = '1' then 'Decreased a great deal'
					when c.coffee_opinion = '2' then 'Decreased quite a bit'
					when c.coffee_opinion = '3' then 'Decreased somewhat'
					when c.coffee_opinion = '4' then 'Decrease is Very little'
					when c.coffee_opinion = '5' then 'No decrease  at all'
				else 'null'
				end 
				as `Coffee_Opinion`,
				case
					when c.coffee_counterfeit_improvedtrees = '1' then 'All were counterfeit/fake'
					when c.coffee_counterfeit_improvedtrees = '2' then 'Some were counterfeit/fake'
					when c.coffee_counterfeit_improvedtrees = '3' then 'All was good/not counterfeit'
				else 'null'
				end 
				as `Coffee_Counterfeit_Improvedtrees`,
				case
					when c.coffee_counterfeit_herbicides = '1' then 'All were counterfeit/fake'
					when c.coffee_counterfeit_herbicides = '2' then 'Some were counterfeit/fake'
					when c.coffee_counterfeit_herbicides = '3' then 'All was good/not counterfeit'
				else 'null'
				end 
				as `Coffee_Counterfeit_Herbicides`,
				case
					when c.coffee_counterfeit_pesticides = '1' then 'All were counterfeit/fake'
					when c.coffee_counterfeit_pesticides = '2' then 'Some were counterfeit/fake'
					when c.coffee_counterfeit_pesticides = '3' then 'All was good/not counterfeit'
				else 'null'
				end 
				as `Coffee_Counterfeit_Pesticides`,
				case
					when c.coffee_counterfeit_Fungicides = '1' then 'All were counterfeit/fake'
					when c.coffee_counterfeit_Fungicides = '2' then 'Some were counterfeit/fake'
					when c.coffee_counterfeit_Fungicides = '3' then 'All was good/not counterfeit'
				else 'null'
				end 
				as `Coffee_Counterfeit_Fungicides`,

				case
					when c.coffee_counterfeit_Fertilizers = '1' then 'All were counterfeit/fake'
					when c.coffee_counterfeit_Fertilizers = '2' then 'Some were counterfeit/fake'
					when c.coffee_counterfeit_Fertilizers = '3' then 'All was good/not counterfeit'
				else 'null'
				end 
				as `Coffee_Counterfeit_Fertilizers`,
				replace(replace(replace(replace(replace(concat(
				(replace(c.coffee_avoid_counterfeits, '1', 'Through information receivedfrom VA/extension workers/training/ radio about fake products ,I know how to avoid them,')), 
				(replace(c.coffee_avoid_counterfeits, '2', 'I am buying in bulk with other farmers,')), 
				(replace(c.coffee_avoid_counterfeits, '3', 'I am using more trusted sources of supply,')), 
				(replace(c.coffee_avoid_counterfeits, '4', 'Others,')),
				(replace(c.coffee_avoid_counterfeits, '', 'null,'))
				),'1',''),'2',''),'3',''),'4',''),'','') as  `Coffee_Avoid_Counterfeits`,

				case
					when c.coffee_avoid_counterfeits_other = ' ' then 'null'
				else c.coffee_avoid_counterfeits_other
				end 
				as `coffee_avoid_counterfeits_other`,

				replace(replace(replace(replace(replace(replace(replace(replace(concat(
				(replace(c.coffee_dry_harvested, '1', 'Ordinary sun drying on bear ground,')), 
				(replace(c.coffee_dry_harvested, '2', 'Used Tarpaulins,')), 
				(replace(c.coffee_dry_harvested, '3', 'Coffee cribs,')), 
				(replace(c.coffee_dry_harvested, '4', 'Used solar dryers with panel,')), 
				(replace(c.coffee_dry_harvested, '5', 'Used solar dryer without panels,')), 
				(replace(c.coffee_dry_harvested, '6', 'Used locally fabricated mechanical dyers,')),
				(replace(c.coffee_dry_harvested, '7', 'Used  imported mechanical dryers,')),
				(replace(c.coffee_dry_harvested, ' ', 'null,'))
				),'1',''),'2',''),'3',''),'4',''),'5',''),'6',''),'7',''),' ','') as  `Coffee_Dry_Harvested`,
				COALESCE(coffee_dry_harvested_other, 'null') as `coffee_dry_harvested_other`,
				replace(replace(replace(replace(replace(replace(replace(replace(concat(
				(replace(c.coffee_storage, '1', 'Ordinary storage house not on bags,')), 
				(replace(c.coffee_storage, '2', 'Owned warehouse,')), 
				(replace(c.coffee_storage, '3', 'Hired warehouse,')), 
				(replace(c.coffee_storage, '4', 'Coffee cribs,')), 
				(replace(c.coffee_storage, '5', 'Silos/metal tanks,')), 
				(replace(c.coffee_storage, '6', 'Grain /grain pic bags,')),
				(replace(c.coffee_storage, '7', 'Others,')),
				(replace(c.coffee_storage, ' ', 'null,'))
				),'1',''),'2',''),'3',''),'4',''),'5',''),'6',''),'7',''),' ','') as  `Coffee_Storage`,
				COALESCE(c.coffee_storage_other, 'null') as `c.coffee_storage_other`,
				c.coffee_cost_production as `Coffee_Cost_Production`,
				c.coffee_cost_production_machinery as `coffee_cost_production_machinery`,
				c.coffee_cost_production_improvedseed as `coffee_cost_production_improvedtrees`,
				c.coffee_cost_production_fertilizers as `coffee_cost_production_fertilizers`,
				c.coffee_cost_production_chemicals as `coffee_cost_production_chemicals`,
				c.coffee_cost_production_storage as `coffee_cost_production_storage`,
				c.coffee_cost_production_transportation as `coffee_cost_production_transportation`,
				c.coffee_cost_production_labour as `coffee_cost_production_labour`,
				c.coffee_cost_production_other as `coffee_cost_production_other`,
				c.coffee_harvested as `coffee_harvested`,
				c.coffee_sold as `coffee_sold`,
				c.coffee_sold_lastperiod as `coffee_sold_lastperiod`,
				c.coffee_sold_price as `coffee_sold_price`,
				c.coffee_harvest_loss as `coffee_harvest_loss`,
				replace(replace(replace(replace(replace(replace(concat(
				(replace(c.coffee_aware_standard, '1', 'Completely aware,')), 
				(replace(c.coffee_aware_standard, '2', 'Largely aware,')), 
				(replace(c.coffee_aware_standard, '3', 'Partly aware,')), 
				(replace(c.coffee_aware_standard, '4', 'Slightly aware,')),
				(replace(c.coffee_aware_standard, '5', 'Not aware at all,')),
				(replace(c.coffee_aware_standard, ' ', 'null,'))
				),'1',''),'2',''),'3',''),'4',''),'5',''),' ','') as  `Coffee_Aware_Standard`,


				case
					when q.climate_change_impact like '1%' then 'Completely aware'
					when q.climate_change_impact like '2%' then 'Largely aware'
					when q.climate_change_impact like '3%' then 'Partly aware'
					when q.climate_change_impact like '4%' then 'Slightly aware'
					when q.climate_change_impact like '5%' then 'Not aware at all'
				else 'null'
				end 
				as `Climate Change Impacts`,

				case
					when q.implemented_mgt_climate = '1' then 'Yes'
					when q.implemented_mgt_climate = '0' then 'No'
				else 'null'
				end 
				as `Management Practices Climate`,
				replace(replace(replace(replace(replace(replace(replace(concat(
				(replace(q.implemented_mgt_climate_action, '1', 'Use of improved seed varieties,')), 
				(replace(q.implemented_mgt_climate_action, '2', 'Irrigation,')), 
				(replace(q.implemented_mgt_climate_action, '3', 'Planting early maturing crop varieties,')), 
				(replace(q.implemented_mgt_climate_action, '4', 'Planting drought resistant varieties,')),
				(replace(q.implemented_mgt_climate_action, '5', 'mulching,')),
				(replace(q.implemented_mgt_climate_action, '6', 'Others')),
				(replace(q.implemented_mgt_climate_action, ' ', 'null'))
				),'1',''),'2',''),'3',''),'4',''),'5',''),'6',''),' ','') as  `Management practices implemented`,
				COALESCE(q.implemented_mgt_climate_action_other, 'null') as `implemented_mgt_climate_action_other`,
				replace(replace(replace(replace(replace(replace(concat(
				(replace(q.protection_counterfeit, '1', 'Buy from a reputable dealer,')), 
				(replace(q.protection_counterfeit, '2', 'Always demand a receipt,')), 
				(replace(q.protection_counterfeit, '3', 'Always keep the container,')), 
				(replace(q.protection_counterfeit, '4', 'Only buy from sealed containers,')),
				(replace(q.protection_counterfeit, '5', 'Others,')),
				(replace(q.protection_counterfeit, ' ', 'null,'))
				),'1',''),'2',''),'3',''),'4',''),'5',''),' ','') as  `Protection Counterfeit`,
				COALESCE(q.protection_counterfeit_other, 'null') as `protection_counterfeit_other`,
				case
					when q.hotline_counterfeit = '1' then 'Yes'
					when q.hotline_counterfeit = '0' then 'No'
				else 'null'
				end 
				as `hotline_counterfeit`,
				case
					when q.hotline_evercalled = '1' then 'Yes'
					when q.hotline_evercalled = '0' then 'No'
				else 'null'
				end 
				as `Called The Hotline`,
				replace(replace(replace(replace(replace(replace(replace(replace(replace(concat(
				(replace(q.receive_information_method, '1', 'Radio,')), 
				(replace(q.receive_information_method, '2', 'Television,')), 
				(replace(q.receive_information_method, '3', 'Newspaper,')), 
				(replace(q.receive_information_method, '4', 'Meetings or workshops,')),
				(replace(q.receive_information_method, '5', 'From fellow farmers,')),
				(replace(q.receive_information_method, '6', 'Popular written versions of Government documents')),
				(replace(q.receive_information_method, '7', 'SMS on Mobile phone')),
				(replace(q.receive_information_method, '8', 'Internet')),
				(replace(q.receive_information_method, ' ', 'null'))
				),'1',''),'2',''),'3',''),'4',''),'5',''),'6',''),'7',''),'8',''),' ','') as  `Government_Agricultural_Related_Information`,
				q.receive_information_method_other as `receive_information_method_other`,
				replace(replace(replace(replace(replace(concat(
				(replace(q.farming_decisions, '1', 'Husband,')), 
				(replace(q.farming_decisions, '2', 'Wife,')), 
				(replace(q.farming_decisions, '3', 'Children,')), 
				(replace(q.farming_decisions, '4', 'All family members,')),
				(replace(q.farming_decisions, ' ', 'null,'))
				),'1',''),'2',''),'3',''),'4',''),' ','')  as  `Farming Decisions`,
				replace(replace(replace(replace(replace(concat(
				(replace(q.farm_assets, '1', 'Husband,')), 
				(replace(q.farm_assets, '2', 'Wife,')), 
				(replace(q.farm_assets, '3', 'Children,')), 
				(replace(q.farm_assets, '4', 'All family members,')),
				(replace(q.farm_assets, ' ', 'null,'))
				),'1',''),'2',''),'3',''),'4',''),' ','')  as  `Owns_Farming_Assests`,
				replace(replace(replace(replace(replace(concat(
				(replace(q.money_spent, '1', 'Husband,')), 
				(replace(q.money_spent, '2', 'Wife,')), 
				(replace(q.money_spent, '3', 'Children,')), 
				(replace(q.money_spent, '4', 'All family members,')),
				(replace(q.money_spent, ' ', 'null,'))
				),'1',''),'2',''),'3',''),'4',''),' ','') as  `Farming_Money_Spent`,
				replace(replace(replace(replace(replace(concat(
				(replace(q.training_events, '1', 'Husband,')), 
				(replace(q.training_events, '2', 'Wife,')), 
				(replace(q.training_events, '3', 'Children,')), 
				(replace(q.training_events, '4', 'All family members,')),
				(replace(q.training_events, ' ', 'null,'))
				),'1',''),'2',''),'3',''),'4',''),' ','') as  `Attend Training Events`,
				replace(replace(replace(replace(replace(concat(
				(replace(q.member_organisation, '1', 'Husband,')), 
				(replace(q.member_organisation, '2', 'Wife,')), 
				(replace(q.member_organisation, '3', 'Children,')), 
				(replace(q.member_organisation, '4', 'All family members,')),
				(replace(q.member_organisation, ' ', 'null,'))
				),'1',''),'2',''),'3',''),'4',''),' ','') as  `Member_Organisation`,

				case
					when q.GPSLatitude = ' ' then 'null'
				else q.GPSLatitude
				end 
				as `GPSLatitude`,

				case
					when q.GPSLongitude = ' ' then 'null'
				else q.GPSLongitude
				end 
				as `GPSLongitude`,

				case
					when q.GPSAltitude = ' ' then 'null'
				else q.GPSAltitude
				end 
				as `GPSAltitude`,

				case
					when q.GPSAccuracy = ' ' then 'null'
				else q.GPSAccuracy
				end 
				as `GPSAccuracy`,

				case
					when q.X_axis = ' ' then 'null'
				else q.X_axis
				end 
				as `X_axis`,

				case
					when q.Y_axis = ' ' then 'null'
				else q.Y_axis
				end 
				as `Y_axis`,
				case
					when q.loan_accessed <> ' ' then 'Yes'
				else 'No'
				end 
				as `Accessed a loan`,
				format(q.loan_accessed,0) as  `Amount Loan accessed`,
				case
					when q.implemented_mgt_climate = '1' then 'Yes'
					when q.implemented_mgt_climate = '0' then 'No'
				else 'null'
				end 
				as  `Implemented management practices`, 

				case
					when q.compiled_by = ' ' then 'null'
				else q.compiled_by
				end 
				as `Compiled_By`,

				case
					when q.telephone = ' ' then 'null'
				else q.telephone
				end 
				as  `Tel_Data_Compiler`,

				case
					when q.gps = ' ' then 'null'
				else q.gps
				end 
				as `GPS_coordinates`,

				case
					when q.msg_at_readtime = ' ' then 'null'
				else q.msg_at_readtime
				end 
				as  `Message_Logged_at_Readtime`,


				case
					when q.readtime = ' ' then 'null'
				else q.readtime
				end 
				as `MIS_Data_Readtime`

				FROM
				`tbl_frm6particulars` as `p`,
				`tbl_frm6production_maize` as `m`,
				`tbl_frm6production_beans` as `b`,
				`tbl_frm6production_coffee` as `c`,
				`tbl_frm6gqnsandgps` as `q`, 
				`tbl_farmers` as `f`,
				`tbl_zone` as `z`,
				`tbl_district`as `d`,
				`tbl_subcounty` as `s`

				WHERE 1=1
				and `p`.`farmer_code` = `f`.`tbl_farmersId`
				AND `c`.`farmer_code` = `p`.`farmer_code`
				AND `m`.`farmer_code` = `p`.`farmer_code`
				AND `b`.`farmer_code` = `p`.`farmer_code` 
				AND `p`.`pk_patId` = `m`.`fk_patId`
				AND `p`.`pk_patId` = `m`.`fk_patId`
				AND `m`.`fk_patId` = `b`.`fk_patId`
				AND `b`.`fk_patId` = `c`.`fk_patId`
				AND `c`.`fk_patId` = `q`.`fk_patId`
				AND `d`.`zone` = `z`.`zoneCode`
				and p.interview_date between cast('2016-03-01' as date) and cast('2016-03-31' as date)
				AND `f`.`farmersDistrict` = `d`.`districtCode`
				AND `f`.`farmersSubcounty` = `s`.`subcountyCode`
				group by `p`.`pk_patId`
				ORDER BY `p`.`pk_patId` DESC";
            
        return $sql;
        


    }


	function form7RawDataToExcel($reportingYear,$reportingPeriod){
		
		$reportingYearToPeriod='';
		$reportingPeriodToDateRange='';
        $reportingYearToPeriodCleaned='';
switch($reportingYear){
            case'CPMA Year One':
            $reportingYearToPeriod="and `f`.`reportingPeriod` in ('Oct - Mar','Apr - Sep')
            and `f`.`year` in (2012,2013)";
            break;
            
            case'CPMA Year Two':
            $reportingYearToPeriod="and `f`.`reportingPeriod` in ('Oct - Mar','Apr - Sep') 
            and `f`.`year` in (2013,2014)";
            break;
            
            case'CPMA Year Three':
            $reportingYearToPeriod="and `f`.`reportingPeriod` in ('Oct - Mar','Apr - Sep') 
            and `f`.`year` in (2014,2015)";
            break;
            
            case'CPMA Year Four':
            $reportingYearToPeriod="and `f`.`reportingPeriod` in ('Oct - Mar','Apr - Sep') 
            and `f`.`year` in (2015,2016)";
            break;
            
            case'CPMA Year Five':
            $reportingYearToPeriod="and `f`.`reportingPeriod` in ('Oct - Mar','Apr - Sep')
            and `f`.`year` in (2016,2017)";
            break;
            
            case'CPMA Year Six':
            $reportingYearToPeriod="and `f`.`reportingPeriod` in ('Oct - Mar','Apr - Sep') 
            and `f`.`year` in (2017,2018)";
            break;
            
            default:
            break;
        }
        
        switch($reportingPeriod){
            case'Oct 2012 - Mar 2013':
            $reportingYearToPeriodCleaned="
            and `f`.`reportingPeriod` = 'Oct - Mar' 
            and `f`.`year` in (2012,2013)
            ";
            break;
            
            case'Apr 2013 - Sep 2013':
            $reportingYearToPeriodCleaned="
            and `f`.`reportingPeriod` = 'Apr - Sep' 
            and `f`.`year` in (2013)
            ";
            break;
            
            case'Oct 2013 - Mar 2014':
            $reportingYearToPeriodCleaned="
            and `f`.`reportingPeriod` = 'Oct - Mar' 
            and `f`.`year` in (2013,2014)
            ";
            break;
            
            case'Apr 2014 - Sep 2014':
            $reportingYearToPeriodCleaned="
            and `f`.`reportingPeriod` = 'Apr - Sep' 
            and `f`.`year` in (2014)
            ";
            break;
            
            case'Oct 2014 - Mar 2015':
            $reportingYearToPeriodCleaned="
            and `f`.`reportingPeriod` = 'Oct - Mar' 
            and `f`.`year` in (2014,2015)
            ";
            break;
            
            case'Apr 2015 - Sep 2015':
            $reportingYearToPeriodCleaned="
            and `f`.`reportingPeriod` = 'Apr - Sep' 
            and `f`.`year` in (2015)
            ";
            break;
            
            case'Oct 2015 - Mar 2016':
            $reportingYearToPeriodCleaned="
            and `f`.`reportingPeriod` = 'Oct - Mar' 
            and `f`.`year` in (2015,2016)
            ";
            break;
            
            case'Apr 2016 - Sep 2016':
            $reportingYearToPeriodCleaned="
            and `f`.`reportingPeriod` = 'Apr - Sep' 
            and `f`.`year` in (2016)
            ";
            break;
            
            case'Oct 2016 - Mar 2017':
            $reportingYearToPeriodCleaned="
            and `f`.`reportingPeriod` = 'Oct - Mar' 
            and `f`.`year` in (2016,2017)
            ";
            break;
            
            case'Apr 2017 - Sep 2017':
            $reportingYearToPeriodCleaned="
            and `f`.`reportingPeriod` = 'Apr - Sep' 
            and `f`.`year` in (2017)
            ";
            break;
            
            case'Oct 2017 - Mar 2018':
            $reportingYearToPeriodCleaned="
            and `f`.`reportingPeriod` = 'Oct - Mar' 
            and `f`.`year` in (2017,2018)
            ";
            break;
            
            case'Apr 2018 - Sep 2018':
            $reportingYearToPeriodCleaned="
            and `f`.`reportingPeriod` = 'Apr - Sep' 
            and `f`.`year` in (2018)
            ";
            break;
            
            
            break;
            
            default:
            break;
        }

        $reporting_period=(!empty($reportingYear))?'':$reportingPeriod;
         $reporting_year=(!empty($reportingPeriod))?'':$reportingYear;
         $reporting_period=(!empty($reportingPeriod))?" ".$reportingYearToPeriodCleaned." ":"";
         $reporting_year=(!empty($reportingYear))?" ".$reportingYearToPeriod." ":"";
        
		$sql = "select 
		1 as `#`,
		`f`.`tbl_farmersId`,
		
		case 
		when `f`.`reportingPeriod` = 'Oct - Mar' 
		and `f`.`year` in (2012,2013) 
		then 'Oct 2012 - Mar 2013'
		
		when `f`.`reportingPeriod` = 'Apr - Sep' 
		and `f`.`year` in (2013) 
		then 'Apr 2013 - Sep 2013'
    
		when `f`.`reportingPeriod` = 'Oct - Mar' 
		and `f`.`year` in (2013,2014) 
		then 'Oct 2013 - Mar 2014'
		
		when `f`.`reportingPeriod` = 'Apr - Sep' 
		and `f`.`year` in (2014) 
		then 'Apr 2014 - Sep 2014'
		
		when `f`.`reportingPeriod` = 'Oct - Mar' 
		and `f`.`year` in (2014,2015) 
		then 'Oct 2014 - Mar 2015'
		
		when `f`.`reportingPeriod` = 'Apr - Sep' 
		and `f`.`year` in (2015) 
		then 'Apr 2015 - Sep 2015'
		
		when `f`.`reportingPeriod` = 'Oct - Mar' 
		and `f`.`year` in (2015,2016) 
		then 'Oct 2015 - Mar 2016'
		
		when `f`.`reportingPeriod` = 'Apr - Sep' 
		and `f`.`year` in (2016) 
		then 'Apr 2016 - Sep 2016'
		
		when `f`.`reportingPeriod` = 'Oct - Mar' 
		and `f`.`year` in (2016,2017) 
		then 'Oct 2016 - Mar 2017'
		
		when `f`.`reportingPeriod` = 'Apr - Sep' 
		and `f`.`year` in (2017) 
		then 'Apr 2017 - Sep 2017'
		
		when `f`.`reportingPeriod` = 'Oct - Mar' 
		and `f`.`year` in (2017,2018) 
		then 'Oct 2017 - Mar 2018'
		
		when `f`.`reportingPeriod` = 'Apr - Sep' 
		and `f`.`year` in (2017) 
		then 'Apr 2018 - Sep 2018'
			
		else `f`.`reportingPeriod`
		end 
                as  `reportingPeriod`,
		 `f`.`groupName`,
		`z`.`zoneName`,
		`d`.`districtName`,
		`s`.`subcountyName`, 
		`f`.`farmersVillage`,
		`f`.`farmersName`, 
		`f`.`memberDstart`,
		`f`.`memberStatus`, 
		TIMESTAMPDIFF(YEAR,`f`.`farmersDob`,CURDATE()) AS `FarmerAge`,
		`f`.`farmersSex`, 
		`f`.`farmersTel`, 
		`f`.`hhName`,
		TIMESTAMPDIFF(YEAR,`f`.`hhDob`,CURDATE()) AS `hhAge`,
		`f`.`hhSex`, 
		`f`.`hhHeadDStart`, 
		`f`.`hhArea`,
		`f`.`hsComposition`
		FROM 
		`tbl_farmers` as `f`,
		`tbl_subcounty` as `s`, 
		`tbl_district` as `d`,
		`tbl_zone` as `z`
		WHERE 1=1
		".$reporting_period."
        ".$reporting_year."
		and `d`.`zone` = `z`.`zoneCode`
		and `f`.`farmersDistrict` = `d`.`districtCode`
		and `f`.`farmersSubcounty`= `s`.`subcountyCode` 
		and `f`.`display`='Yes'
		order by `f`.`tbl_farmersId` DESC limit 0,50";
			
		return $sql;


	}
	
	function form7RawDataToExcelAll($reportingYear,$reportingPeriod){
		
		$reportingYearToPeriod='';
        $reportingPeriodToDateRange='';
        $reportingYearToPeriodCleaned='';
switch($reportingYear){
            case'CPMA Year One':
            $reportingYearToPeriod="and `f`.`reportingPeriod` in ('Oct - Mar','Apr - Sep')
            and `f`.`year` in (2012,2013)";
            break;
            
            case'CPMA Year Two':
            $reportingYearToPeriod="and `f`.`reportingPeriod` in ('Oct - Mar','Apr - Sep') 
            and `f`.`year` in (2013,2014)";
            break;
            
            case'CPMA Year Three':
            $reportingYearToPeriod="and `f`.`reportingPeriod` in ('Oct - Mar','Apr - Sep') 
            and `f`.`year` in (2014,2015)";
            break;
            
            case'CPMA Year Four':
            $reportingYearToPeriod="and `f`.`reportingPeriod` in ('Oct - Mar','Apr - Sep') 
            and `f`.`year` in (2015,2016)";
            break;
            
            case'CPMA Year Five':
            $reportingYearToPeriod="and `f`.`reportingPeriod` in ('Oct - Mar','Apr - Sep')
            and `f`.`year` in (2016,2017)";
            break;
            
            case'CPMA Year Six':
            $reportingYearToPeriod="and `f`.`reportingPeriod` in ('Oct - Mar','Apr - Sep') 
            and `f`.`year` in (2017,2018)";
            break;
            
            default:
            break;
        }
        
        switch($reportingPeriod){
            case'Oct 2012 - Mar 2013':
            $reportingYearToPeriodCleaned="
            and `f`.`reportingPeriod` = 'Oct - Mar' 
            and `f`.`year` in (2012,2013)
            ";
            break;
            
            case'Apr 2013 - Sep 2013':
            $reportingYearToPeriodCleaned="
            and `f`.`reportingPeriod` = 'Apr - Sep' 
            and `f`.`year` in (2013)
            ";
            break;
            
            case'Oct 2013 - Mar 2014':
            $reportingYearToPeriodCleaned="
            and `f`.`reportingPeriod` = 'Oct - Mar' 
            and `f`.`year` in (2013,2014)
            ";
            break;
            
            case'Apr 2014 - Sep 2014':
            $reportingYearToPeriodCleaned="
            and `f`.`reportingPeriod` = 'Apr - Sep' 
            and `f`.`year` in (2014)
            ";
            break;
            
            case'Oct 2014 - Mar 2015':
            $reportingYearToPeriodCleaned="
            and `f`.`reportingPeriod` = 'Oct - Mar' 
            and `f`.`year` in (2014,2015)
            ";
            break;
            
            case'Apr 2015 - Sep 2015':
            $reportingYearToPeriodCleaned="
            and `f`.`reportingPeriod` = 'Apr - Sep' 
            and `f`.`year` in (2015)
            ";
            break;
            
            case'Oct 2015 - Mar 2016':
            $reportingYearToPeriodCleaned="
            and `f`.`reportingPeriod` = 'Oct - Mar' 
            and `f`.`year` in (2015,2016)
            ";
            break;
            
            case'Apr 2016 - Sep 2016':
            $reportingYearToPeriodCleaned="
            and `f`.`reportingPeriod` = 'Apr - Sep' 
            and `f`.`year` in (2016)
            ";
            break;
            
            case'Oct 2016 - Mar 2017':
            $reportingYearToPeriodCleaned="
            and `f`.`reportingPeriod` = 'Oct - Mar' 
            and `f`.`year` in (2016,2017)
            ";
            break;
            
            case'Apr 2017 - Sep 2017':
            $reportingYearToPeriodCleaned="
            and `f`.`reportingPeriod` = 'Apr - Sep' 
            and `f`.`year` in (2017)
            ";
            break;
            
            case'Oct 2017 - Mar 2018':
            $reportingYearToPeriodCleaned="
            and `f`.`reportingPeriod` = 'Oct - Mar' 
            and `f`.`year` in (2017,2018)
            ";
            break;
            
            case'Apr 2018 - Sep 2018':
            $reportingYearToPeriodCleaned="
            and `f`.`reportingPeriod` = 'Apr - Sep' 
            and `f`.`year` in (2018)
            ";
            break;
            
            
            break;
            
            default:
            break;
        }

        $reporting_period=(!empty($reportingYear))?'':$reportingPeriod;
         $reporting_year=(!empty($reportingPeriod))?'':$reportingYear;
         $reporting_period=(!empty($reportingPeriod))?" ".$reportingYearToPeriodCleaned." ":"";
         $reporting_year=(!empty($reportingYear))?" ".$reportingYearToPeriod." ":"";
        
        $sql = "select 
        1 as `#`,
        `f`.`tbl_farmersId`,
        
        case 
        when `f`.`reportingPeriod` = 'Oct - Mar' 
        and `f`.`year` in (2012,2013) 
        then 'Oct 2012 - Mar 2013'
        
        when `f`.`reportingPeriod` = 'Apr - Sep' 
        and `f`.`year` in (2013) 
        then 'Apr 2013 - Sep 2013'
    
        when `f`.`reportingPeriod` = 'Oct - Mar' 
        and `f`.`year` in (2013,2014) 
        then 'Oct 2013 - Mar 2014'
        
        when `f`.`reportingPeriod` = 'Apr - Sep' 
        and `f`.`year` in (2014) 
        then 'Apr 2014 - Sep 2014'
        
        when `f`.`reportingPeriod` = 'Oct - Mar' 
        and `f`.`year` in (2014,2015) 
        then 'Oct 2014 - Mar 2015'
        
        when `f`.`reportingPeriod` = 'Apr - Sep' 
        and `f`.`year` in (2015) 
        then 'Apr 2015 - Sep 2015'
        
        when `f`.`reportingPeriod` = 'Oct - Mar' 
        and `f`.`year` in (2015,2016) 
        then 'Oct 2015 - Mar 2016'
        
        when `f`.`reportingPeriod` = 'Apr - Sep' 
        and `f`.`year` in (2016) 
        then 'Apr 2016 - Sep 2016'
        
        when `f`.`reportingPeriod` = 'Oct - Mar' 
        and `f`.`year` in (2016,2017) 
        then 'Oct 2016 - Mar 2017'
        
        when `f`.`reportingPeriod` = 'Apr - Sep' 
        and `f`.`year` in (2017) 
        then 'Apr 2017 - Sep 2017'
        
        when `f`.`reportingPeriod` = 'Oct - Mar' 
        and `f`.`year` in (2017,2018) 
        then 'Oct 2017 - Mar 2018'
        
        when `f`.`reportingPeriod` = 'Apr - Sep' 
        and `f`.`year` in (2017) 
        then 'Apr 2018 - Sep 2018'
            
        else `f`.`reportingPeriod`
        end 
                as  `reportingPeriod`,
         `f`.`groupName`,
        `z`.`zoneName`,
        `d`.`districtName`,
        `s`.`subcountyName`, 
        `f`.`farmersVillage`,
        `f`.`farmersName`, 
        `f`.`memberDstart`,
        `f`.`memberStatus`, 
        TIMESTAMPDIFF(YEAR,`f`.`farmersDob`,CURDATE()) AS `FarmerAge`,
        `f`.`farmersSex`, 
        `f`.`farmersTel`, 
        `f`.`hhName`,
        TIMESTAMPDIFF(YEAR,`f`.`hhDob`,CURDATE()) AS `hhAge`,
        `f`.`hhSex`, 
        `f`.`hhHeadDStart`, 
        `f`.`hhArea`,
        `f`.`hsComposition`
        FROM 
        `tbl_farmers` as `f`,
        `tbl_subcounty` as `s`, 
        `tbl_district` as `d`,
        `tbl_zone` as `z`
        WHERE 1=1
        ".$reporting_period."
        ".$reporting_year."
        and `d`.`zone` = `z`.`zoneCode`
        and `f`.`farmersDistrict` = `d`.`districtCode`
        and `f`.`farmersSubcounty`= `s`.`subcountyCode` 
        and `f`.`display`='Yes'
        order by `f`.`tbl_farmersId` DESC limit 0,50";
            
        return $sql;
	}
		
	
	function TradersFilter($trader)
    {
		
		
		$x = "select 1, `t`.`tbl_tradersId`, `t`.`traderName`, `t`.`display` 
				from `tbl_traders` as `t` 
				where 1=1 
				and `t`.`display`='Yes' 
				order by `t`.`traderName` asc";

        $q = Execute($x) or die(http(__line__));
        while ($rowd = FetchRecords($q)) {
            $sel = ($rowd['tbl_tradersId'] == $trader) ? "selected" : "";
            $data .= "<option value=\"" . $rowd['tbl_tradersId'] . "\" " . $sel . ">" . $rowd['traderName'] . "</option>";

        }
        return $data;
    }
	
	function VasFilter($trader,$va)
    {
		$append_trader=(!empty($trader) or ($trader!==''))?" and `v`.`tbl_tradersId`=".$trader."":"";
		
		$x = "SELECT 1, `t`.`tbl_tradersId`,
		`v`.`tbl_villageAgentId`,
		`v`.`tbl_tradersId`,
		`v`.`vAgentName`,
		`v`.`display` 
		FROM `tbl_villageagents` as `v`
		JOIN `tbl_traders` as `t`  
		ON (`t`.`tbl_tradersId`=`v`.`tbl_tradersId`)
		WHERE 1=1 "; 
		$x .= "".$append_trader."";
		$x .= " and `v`.`display` ='Yes'
		and `t`.`display` ='Yes'
		order by `v`.`vAgentName` asc";

        $q = Execute($x) or die(http(__line__));
        while ($rowd = FetchRecords($q)) {
            $sel = ($rowd['tbl_villageAgentId'] == $va) ? "selected" : "";
            $data .= "<option value=\"" . $rowd['tbl_villageAgentId'] . "\" " . $sel . ">" . $rowd['vAgentName'] . "</option>";

        }
        return $data;
    }
	
	
function CPMYearFilter($cmpa_year)
    {
		$data='';
		$CPMAYearArray=array(
		'Project start up',
		'CPMA Year One',
		'CPMA Year Two',
		'CPMA Year Three',
		'CPMA Year Four',
		'CPMA Year Five(Activity close out)'
		);
		
		foreach ($CPMAYearArray as $year) {
		$sel = ($year == $cmpa_year) ? "selected" : "";
            $data .= "<option value=\"" . $year . "\" " . $sel . ">" . $year . "</option>";

        }
        return $data;
    }
	
	function CPMAReportingPeriodFilter($reporting_period)
    {
		$data='';
		
		$CPMAReportingPeriodArray=array(
		'Project start up',		
		'Oct 2013 - Mar 2014',
		'Apr 2014 - Sep 2014',		
		'Oct 2014 - Mar 2015',
		'Apr 2015 - Sep 2015',		
		'Oct 2015 - Mar 2016',
		'Apr 2016 - Sep 2016',		
		'Oct 2016 - Mar 2017',
		'Apr 2017 - Sep 2017',		
		'Oct 2017 – Mar 2018',   
		'Apr 2018 – May 2018');
		
		foreach ($CPMAReportingPeriodArray as $rPeriod) {
		$sel = ($rPeriod == $reporting_period) ? "selected" : "";
            $data .= "<option value=\"" . $rPeriod . "\" " . $sel . ">" . $rPeriod . "</option>";

        }
        return $data;
    }
		

	
		function labourSavingTechFilter($labourSavingTech)
    {
		
		
		$x = "SELECT `tbl_lookup_id`, `codeName` FROM `tbl_lookup` 
			where `classCode`=30 
			order by `code` 
			ASC";

        $q = Execute($x) or die(http(__line__));
        while ($rowd = FetchRecords($q)) {
            $sel = ($rowd['codeName'] == $labourSavingTech) ? "selected" : "";
            $data .= "<option value=\"" . $rowd['codeName'] . "\" " . $sel . ">" . $rowd['codeName'] . "</option>";

        }
        return $data;
    }
	
	
	function cleanValueChainDisplay($string){
		switch($string){
		case is_numeric($string[0]):
		$result=substr(($string), 2);
		break;
		
		case empty($string):
		$result='-';
		break;

		default:
		$result=$string;
		break;		
			
		}
		return $result;
	}
	
	function cleanDirtyDates($date){
		$sanitizeDate= @date('Y-m-d', @strtotime($date));
		switch($sanitizeDate){
		case ($sanitizeDate > date('Y-m-d')):
		$result='n/a';
		break;
		
		case ($sanitizeDate < date_format((date_create('1910-01-01')), 'Y-m-d')):
		$result='-';
		break;

		default:
		$result=$sanitizeDate;
		break;		
			
		}
		return $result;
	}
	
	function cleanHtmlSpecialCharacters($string){
		
		$value= htmlspecialchars("".$string."", ENT_QUOTES);
		
		return $value;
		
	} 
	
	   function fetchForm6AprToSep2016Fields($mapping_id){
        
        $query_string="select 
                        `id`,
                        `question`,
                        `answer`,
                        `mis_field_name` as  `field`
                        from 
                        `tbl_form6_survey_mapping` 
                        where `mis_field_name` is not NULL";
                        
        return $query_string;
    } 
    
    
    function fetchForm6AprToSep2016Data($mapping_id){

        $query_string_field="select 
                        `id`,
                        `question`,
                        `answer`,
                        `mis_field_name`
                        from 
                        `tbl_form6_survey_mapping` 
                        where `mis_field_name` is not NULL";


        $q = Execute($query_string_field) or die(mysql_error().__line__);
        $query_string="SELECT ";
        $query_sel="";
        while ($rowd = FetchRecords($q)) {
            $sel = $rowd['answer'];
            
            $query_sel.= $sel.",";
            

        }

        $query_sel = substr($query_sel,0,-1);
        $query_string.=$query_sel;
        $query_string.=" FROM `tbl_form6_survey_data`";


        return $query_string;
    }
	
	
	
//method to clean up date of Submission before use in Analysis
function cleanUpDateSubmissionValues($date_submission,$reporting_period,$table,$name_column_submission_date,$name_column_rep_period,$name_column_year,$primary_key_column,$rec_id){
	
	$reporting_period_month_two=trim(substr($reporting_period,11,3));
	$reporting_period_month_one=trim((substr($reporting_period,0,3)));
	$year_values=''.trim(substr($reporting_period,-4)).'';
	$reporting_period_values=''.$reporting_period_month_one.' - '.$reporting_period_month_two.'';
	$expected_start_date=''.((trim(substr($reporting_period,-4)))-1).'-10-01';
	$expected_end_date=''.trim(substr($reporting_period,-4)).'-03-31';


	switch(true){
		case((strtotime($date_submission) <= strtotime($expected_end_date))  and (strtotime($date_submission) >= strtotime($expected_start_date))):
			$queryStatement='';
		break;

		case((strtotime($date_submission) > strtotime($expected_end_date))):
		$queryStatement="update `".$table."` 
		set `".$name_column_submission_date."` = '".$expected_end_date."'
		where `".$name_column_rep_period."` = '".$reporting_period_values."'
		and	`".$name_column_year."` in (".$year_values.") 
		and `".$primary_key_column."` = '".$rec_id."'
		";
		break;

		default:
		break;
	}
	
	return 	$queryStatement;
}


function cleanDirtyDates_Form2Edits($date){
		$sanitizeDate= @date('Y-m-d', @strtotime($date));
		switch($sanitizeDate){
		case ($sanitizeDate > date('Y-m-d')):
		$result=date('Y-m-d h:i:s');
		break;
		
		case ($sanitizeDate < date_format((date_create('1910-01-01')), 'Y-m-d')):
		$result=date('Y-m-d h:i:s');
		break;

		default:
		$result=$sanitizeDate;
		break;		
			
		}
		return $result;
	}

	function validateRequiredNumericInput_Form2Edits($input){
		
		switch(true){
			case is_numeric($input):
			$result=intval($input);
			break;

			case (empty($input) or ($input=='')):
			$result=0;
			break;

			default:
			$result=intval($input);
			break;


		}

		return $result;
	}


	function get_phh_nameValuchainPartnerTypeAndId($partnerId,$partnerType,$nameMiddleChainValueActor){

		switch(true){
			case(($partnerId !== '') and ($partnerType !== '') and ($nameMiddleChainValueActor !== '')):
			$partner_id=$partnerId;
			$partner_type=$partnerType;
			break;

			case(($partnerId=='') and ($nameMiddleChainValueActor !=='') and ((strpos($nameMiddleChainValueActor, '(') !== false))):
			$partner_id=QueryManager::get_string_part($nameMiddleChainValueActor,'(',')');
			$partner_type=($partnerType=='')?'Trader':$partnerType;
			break;

			default:
			break;
		}
		
		return array($partner_id,$partner_type);
	}

function get_form2_partner_filter($partnerId,$partnerType)
    {
        $s_exporter = "
		SELECT `tbl_exportersId`, `exporterName`
		FROM `tbl_exporters` 
		WHERE `display`='Yes'
		order by `exporterName` asc";
		
		$s_trader= "
		SELECT `tbl_tradersId`, `traderName`
		FROM `tbl_traders` 
		WHERE `display`='Yes'
		order by `traderName` asc";
		
		$s_vAgent = "
		SELECT `tbl_villageAgentId`, `vAgentName`
		FROM `tbl_villageagents` 
		WHERE `display`='Yes'
		order by `vAgentName` asc";
		
		
        $q_ex = Execute($s_exporter) or die(http(__line__));
		$q_tr = Execute($s_trader) or die(http(__line__));
		$q_va = Execute($s_vAgent) or die(http(__line__));



		
        
           
		   switch(true){
				case(trim($partnerType)=='Exporter'):				
				while ($row_ex = FetchRecords($q_ex)) {
					$selected = (trim($partnerId) == $row_ex['tbl_exportersId']) ? "selected" : "";
					$exporterName=$row_ex['exporterName']." |EXP-".$row_ex['tbl_exportersId']."";
					$data.= "<option value=\"" . $exporterName . "\" " . $selected . ">" . $exporterName . "</option>";
				}
				while ($row_tr = FetchRecords($q_tr)) {
					$traderNameString=$row_tr['traderName']." |T-".$row_tr['tbl_tradersId']."";
					$data.= "<option value=\"" . $traderNameString . "\">" .  $traderNameString . "</option>";

				}
				while ($row_va = FetchRecords($q_va)) {
					$vAgentNameString=$row_va['vAgentName']." |V.A-".$row_va['tbl_villageAgentId']."";            
					$data.= "<option value=\"" . $vAgentNameString . "\">" . $vAgentNameString . "</option>";

				}
				break;


							
				

				case(trim($partnerType)=='Trader'):
				while ($row_ex = FetchRecords($q_ex)) {
					$exporterName=$row_ex['exporterName']." |EXP-".$row_ex['tbl_exportersId']."";
					$data.= "<option value=\"" . $exporterName . "\">" . $exporterName . "</option>";
				}				
				while ($row_tr = FetchRecords($q_tr)) {
					$selected = (trim($partnerId) == $row_tr['tbl_tradersId']) ? "selected" : "";
					$traderNameString=$row_tr['traderName']." |T-".$row_tr['tbl_tradersId']."";
					$data.= "<option value=\"" . $traderNameString . "\" " . $selected . ">" .  $traderNameString . "</option>";

				}
				while ($row_va = FetchRecords($q_va)) {
					$vAgentNameString=$row_va['vAgentName']." |V.A-".$row_va['tbl_villageAgentId']."";            
					$data.= "<option value=\"" . $vAgentNameString . "\">" . $vAgentNameString . "</option>";

				}
				break;




				case(trim($partnerType)=='VillageAgent'):
				while ($row_ex = FetchRecords($q_ex)) {
					$exporterName=$row_ex['exporterName']." |EXP-".$row_ex['tbl_exportersId']."";
					$data.= "<option value=\"" . $exporterName . "\">" . $exporterName . "</option>";
				}
				while ($row_tr = FetchRecords($q_tr)) {
					$traderNameString=$row_tr['traderName']." |T-".$row_tr['tbl_tradersId']."";
					$data.= "<option value=\"" . $traderNameString . "\">" .  $traderNameString . "</option>";

				}				
				while ($row_va = FetchRecords($q_va)) {
					$selected = (trim($partnerId) == $row_va['tbl_villageAgentId']) ? "selected" : "";
					$vAgentNameString=$row_va['vAgentName']." |V.A-".$row_va['tbl_villageAgentId']."";            
					$data.= "<option value=\"" . $vAgentNameString . "\" " . $selected . ">" . $vAgentNameString . "</option>";

				}
				break;




				default:
				while ($row_ex = FetchRecords($q_ex)) {
					$exporterName=$row_ex['exporterName']." |EXP-".$row_ex['tbl_exportersId']."";
					$data.= "<option value=\"" . $exporterName . "\">" . $exporterName . "</option>";
				}
				while ($row_tr = FetchRecords($q_tr)) {
					$traderNameString=$row_tr['traderName']." |T-".$row_tr['tbl_tradersId']."";
					$data.= "<option value=\"" . $traderNameString . "\">" .  $traderNameString . "</option>";

				}				
				while ($row_va = FetchRecords($q_va)) {
					$vAgentNameString=$row_va['vAgentName']." |V.A-".$row_va['tbl_villageAgentId']."";            
					$data.= "<option value=\"" . $vAgentNameString . "\" " . $selected . ">" . $vAgentNameString . "</option>";

				}
				break;
			}

        return $data;

    }

	function get_form2_partner_filterNoPrams($no_value)
    {
        $s_exporter = "
		SELECT `tbl_exportersId`, `exporterName`
		FROM `tbl_exporters` 
		WHERE `display`='Yes'
		order by `exporterName` asc";
		
		$s_trader= "
		SELECT `tbl_tradersId`, `traderName`
		FROM `tbl_traders` 
		WHERE `display`='Yes'
		order by `traderName` asc";
		
		$s_vAgent = "
		SELECT `tbl_villageAgentId`, `vAgentName`
		FROM `tbl_villageagents` 
		WHERE `display`='Yes'
		order by `vAgentName` asc";
		
		
        $q_ex = Execute($s_exporter) or die(http(__line__));
		$q_tr = Execute($s_trader) or die(http(__line__));
		$q_va = Execute($s_vAgent) or die(http(__line__));
		
        
           
		   switch(true){
				
				default:
				while ($row_ex = FetchRecords($q_ex)) {
					$exporterName=$row_ex['exporterName']." |EXP-".$row_ex['tbl_exportersId']."";
					$data.= "<option value=\"" . $exporterName . "\">" . $exporterName . "</option>";
				}
				while ($row_tr = FetchRecords($q_tr)) {
					$traderNameString=$row_tr['traderName']." |T-".$row_tr['tbl_tradersId']."";
					$data.= "<option value=\"" . $traderNameString . "\">" .  $traderNameString . "</option>";

				}				
				while ($row_va = FetchRecords($q_va)) {
					$vAgentNameString=$row_va['vAgentName']." |V.A-".$row_va['tbl_villageAgentId']."";            
					$data.= "<option value=\"" . $vAgentNameString . "\" " . $selected . ">" . $vAgentNameString . "</option>";

				}
				break;
			}

        return $data;

    }


	function form2PartnershipFocus($selected_focus){
		$data='';
		$array_prams_partnership_focus=array('Agricultural production',
		'Agricultural PH transformation',
		'Multi-focus',
		'Input supply',
		'Supply Chain Management',
		'Entreprenuership',
		'Finance',
		'Market Linkages',
		);

		foreach ($array_prams_partnership_focus as $focus){
				$selected=($selected_focus==$focus)?"selected":"";
                $data.="<option value=\"".$focus."\" ".$selected.">".$focus."</option>";
		}

		
		return $data;

	}

	function form2getPartnerTypeAndIdFromString($partner_string){
		switch(true){
			case(strpos($partner_string,'|EXP-')):
			$partnerType='Exporter';
			$partner_id=trim(substr($partner_string,((strpos($partner_string,'|EXP-'))+(count('|EXP-')*5)),200));
			break;

			case(strpos($partner_string,'|T-')):
			$partnerType='Trader';
			$partner_id=trim(substr($partner_string,((strpos($partner_string,'|T-'))+(count('|T-')*3)),200));
			break;

			case(strpos($partner_string,'|V.A-')):
			$partnerType='VillageAgent';
			$partner_id=trim(substr($partner_string,((strpos($partner_string,'|V.A-'))+(count('|V.A-')*5)),200));
			break;

			default:
			break;

		}

	return array($partner_id,$partnerType);
}
	


}//end of class QueryManager();


?>