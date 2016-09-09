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


        switch ($_SESSION['role']) {
            case pagination::roleMgt(0):

                $x = "select * from tbl_zone  order by 2 asc";

                break;

            default:

                $x = "select * from tbl_zone  order by 2 asc";

        }

        $q = Execute($x) or die(http(__line__));
        while ($rowd = FetchRecords($q)) {
            $sel = ($rowd['zoneCode'] == $zone) ? "selected" : "";
            $data .= "<option value=\"" . $rowd['zoneCode'] . "\" " . $sel . ">" . $rowd['zoneName'] . "</option>";

        }


        return $data;
    }

    //-------------Partner Filter-----------------
    function PartnerFilter($zone)
    {


        switch ($_SESSION['role']) {
            case pagination::roleMgt(0):

                $x = "select * from tbl_partners  order by 2 asc";

                break;

            default:

                $x = "select * from tbl_partners  order by 2 asc";

        }

        $q = Execute($x) or die(http(__line__));
        while ($rowd = FetchRecords($q)) {
            $sel = ($rowd['partnerCode'] == $zone) ? "selected" : "";
            $data .= "<option value=\"" . $rowd['partnerCode'] . "\" " . $sel . ">" . $rowd['partnerName'] . "</option>";

        }


        return $data;
    }


    function view_AnnualResultsReportLog($fyear, $district)
    {
        switch ($_SESSION['role']) {

            case pagination::roleMgt(0);
                $query_string = "select q.district,q.semi_annual,q.year,
							sum(if(((q.semi_annual='Oct - Mar') and q.year='" . $fyear . "'),q.district,0)) AS Quarter1,
							sum(if(((q.semi_annual='Apr - Sep') and q.year like '" . $fyear . "'),q.district,0)) AS Quarter2
							from tbl_organizationreporting q  
 							where q.district ='" . $district . "'
 							group by q.district 
							order by q.district Asc";

                break;


            default:
                $query_string = "select q.district,q.semi_annual,q.year,
							sum(if(((q.semi_annual='Oct - Mar') and q.year='" . $fyear . "'),q.district,0)) AS Quarter1,
							sum(if(((q.semi_annual='Apr - Sep') and q.year like '" . $fyear . "'),q.district,0)) AS Quarter2
							from tbl_organizationreporting q  
 							where q.district ='" . $district . "'
 							group by q.district 
							order by q.district Asc";
                break;
        }
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
        $query_thisUser1 = "select *
			 from `tbl_traders`
			 order by `tbl_traders`.`traderName` asc";
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
        $query_thisUser1 = "select *
			 from `tbl_exporters`
			 order by `tbl_exporters`.`exporterName` asc";
        $thisUser1 = @Execute($query_thisUser1) or die(http("QMClass--1562"));

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

    //-------------------------------Crop varieties Filter-------------------------
//function filterCropVarieties($Crop,$cropVariety)
//		{
// 			$query_thisUser1= "select v.* from `tbl_cropvarieties` v where v.`cropCode`='".$Crop."'
//			 order by v.`cropVariety` asc";
//			$thisUser1 = @Execute($query_thisUser1) or die(http(__line__));
//
//			while ($rows_cropVariety=FetchRecords($thisUser1))
//				{
//				
//				$selected=($cropVariety==$rows_cropVariety['pk_cropVarietiesId'])?"selected":"";
//				$data.="<option value=\"".$rows_cropVariety['pk_cropVarietiesId']."\" ".$selected.">
//			".$rows_cropVariety['cropVariety']."</option>";
//
//		}		 
//		return 	$data;
//
// }


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
        $q = Execute($query) or die(http("FLTR-2146"));
        while ($rowd = FetchRecords($q)) {

            $selected = ($valueChain == $rowd['tbl_chainId']) ? "selected" : "";
            $data .= "<option value=\"" . $rowd['tbl_chainId'] . "\" " . $selected . ">" . $rowd['name'] . "</option>";

        }

        pagination::free_result($q);
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
								order by `s`.`sub_indicatorId` asc";
           
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
	
	function form1RawDataToExcel($fromDate,$toDate,$reportingYear,$reportingPeriod){
		$append_dateRange=((($fromDate)!='') and (($toDate)!=''))?" and t.trainingDate between ('".$fromDate."') and ('".$toDate."')":"";
		$reportingYearToPeriod='';
		$reportingPeriodToDateRange='';
		switch($reportingYear){
			case'CPMA Year One':
			$reportingYearToPeriod='("2013-10-01") and ("2014-09-30")';
			break;
			
			case'CPMA Year Two':
			$reportingYearToPeriod='("2014-10-01") and ("2015-09-30")';
			break;
			
			case'CPMA Year Three':
			$reportingYearToPeriod='("2015-10-01") and ("2016-09-30")';
			break;
			
			case'CPMA Year Four':
			$reportingYearToPeriod='("2016-10-01") and ("2017-09-30")';
			break;
			
			case'CPMA Year Five':
			$reportingYearToPeriod='("2017-10-01") and ("2018-09-30")';
			break;
			
			case'CPMA Year Six':
			$reportingYearToPeriod='("2018-10-01") and ("2019-09-30")';
			break;
			
			default:
			$reportingYearToPeriod='';
			break;
		}
		$append_reportingYear=(($reportingYearToPeriod)!='')?" and t.trainingDate between ".$reportingYearToPeriod."":"";
		
		switch($reportingPeriod){
			
			case'Apr - Sep':
			$reportingPeriodToDateRange=' and month(t.trainingDate) in (4,5,6,7,8,9)';
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
			".$append_dateRange."
			".$append_reportingYear."
			".$append_reportingPeriod."
			order by t.trainingDate asc
			";
			
		return $sql;


	}
	
	function form2EntTechRawDataToExcel($fromDate,$toDate,$reportingYear,$reportingPeriod){
		$append_dateRange=((($fromDate)!='') and (($toDate)!=''))?" and t.trainingDate between ('".$fromDate."') and ('".$toDate."')":"";
		$reportingYearToPeriod='';
		$reportingPeriodToDateRange='';
		switch($reportingYear){
			case'CPMA Year One':
			$reportingYearToPeriod='("2013-10-01") and ("2014-09-30")';
			break;
			
			case'CPMA Year Two':
			$reportingYearToPeriod='("2014-10-01") and ("2015-09-30")';
			break;
			
			case'CPMA Year Three':
			$reportingYearToPeriod='("2015-10-01") and ("2016-09-30")';
			break;
			
			case'CPMA Year Four':
			$reportingYearToPeriod='("2016-10-01") and ("2017-09-30")';
			break;
			
			case'CPMA Year Five':
			$reportingYearToPeriod='("2017-10-01") and ("2018-09-30")';
			break;
			
			case'CPMA Year Six':
			$reportingYearToPeriod='("2018-10-01") and ("2019-09-30")';
			break;
			
			default:
			$reportingYearToPeriod='';
			break;
		}
		$append_reportingYear=(($reportingYearToPeriod)!='')?" and t.trainingDate between ".$reportingYearToPeriod."":"";
		
		switch($reportingPeriod){
			
			case'Apr - Sep':
			$reportingPeriodToDateRange=' and month(t.trainingDate) in (4,5,6,7,8,9)';
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
					`t`.`tbl_techadoptionId`, 
					`t`.`valueChain`, 
					case
						when `t`.`reportingPeriod` = 'Oct - Mar' and `t`.`year`=2015 then 'Oct 2015 - Mar 2016'
						when `t`.`reportingPeriod` = 'Oct - Mar' and `t`.`year`=2016 then 'Oct 2015 - Mar 2016'
						when `t`.`reportingPeriod` = 'Apr - Sep' and `t`.`year`=2016 then 'Apr 2015 - Sep 2015'
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
					and `t`.`reportingPeriod` = 'Oct - Mar' 
					and `t`.`year`=2016
					order by t.`tbl_techadoptionId` DESC
					";
			
		return $sql;


	}
	
	function form2LabSavRawDataToExcel($fromDate,$toDate,$reportingYear,$reportingPeriod){
		$append_dateRange=((($fromDate)!='') and (($toDate)!=''))?" and t.trainingDate between ('".$fromDate."') and ('".$toDate."')":"";
		$reportingYearToPeriod='';
		$reportingPeriodToDateRange='';
		switch($reportingYear){
			case'CPMA Year One':
			$reportingYearToPeriod='("2013-10-01") and ("2014-09-30")';
			break;
			
			case'CPMA Year Two':
			$reportingYearToPeriod='("2014-10-01") and ("2015-09-30")';
			break;
			
			case'CPMA Year Three':
			$reportingYearToPeriod='("2015-10-01") and ("2016-09-30")';
			break;
			
			case'CPMA Year Four':
			$reportingYearToPeriod='("2016-10-01") and ("2017-09-30")';
			break;
			
			case'CPMA Year Five':
			$reportingYearToPeriod='("2017-10-01") and ("2018-09-30")';
			break;
			
			case'CPMA Year Six':
			$reportingYearToPeriod='("2018-10-01") and ("2019-09-30")';
			break;
			
			default:
			$reportingYearToPeriod='';
			break;
		}
		$append_reportingYear=(($reportingYearToPeriod)!='')?" and t.trainingDate between ".$reportingYearToPeriod."":"";
		
		switch($reportingPeriod){
			
			case'Apr - Sep':
			$reportingPeriodToDateRange=' and month(t.trainingDate) in (4,5,6,7,8,9)';
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
					SUBSTRING(`v`.`name`,3,20) as `ValueChain`,
					case
						when `l`.`reportingPeriod` = 'Oct - Mar' and `l`.`year`=2015 then 'Oct 2015 - Mar 2016'
						when `l`.`reportingPeriod` = 'Oct - Mar' and `l`.`year`=2016 then 'Oct 2015 - Mar 2016'
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
					and `l`.valueChain= `v`.`name` 
					and `l`.`reportingPeriod` = 'Oct - Mar' 
					and `l`.`year`=2016
					order by `l`.`tbl_laboursavingtechId` desc
					";
			
		return $sql;


	}

	function form2MedProRawDataToExcel($fromDate,$toDate,$reportingYear,$reportingPeriod){
		$append_dateRange=((($fromDate)!='') and (($toDate)!=''))?" and t.trainingDate between ('".$fromDate."') and ('".$toDate."')":"";
		$reportingYearToPeriod='';
		$reportingPeriodToDateRange='';
		switch($reportingYear){
			case'CPMA Year One':
			$reportingYearToPeriod='("2013-10-01") and ("2014-09-30")';
			break;
			
			case'CPMA Year Two':
			$reportingYearToPeriod='("2014-10-01") and ("2015-09-30")';
			break;
			
			case'CPMA Year Three':
			$reportingYearToPeriod='("2015-10-01") and ("2016-09-30")';
			break;
			
			case'CPMA Year Four':
			$reportingYearToPeriod='("2016-10-01") and ("2017-09-30")';
			break;
			
			case'CPMA Year Five':
			$reportingYearToPeriod='("2017-10-01") and ("2018-09-30")';
			break;
			
			case'CPMA Year Six':
			$reportingYearToPeriod='("2018-10-01") and ("2019-09-30")';
			break;
			
			default:
			$reportingYearToPeriod='';
			break;
		}
		$append_reportingYear=(($reportingYearToPeriod)!='')?" and t.trainingDate between ".$reportingYearToPeriod."":"";
		
		switch($reportingPeriod){
			
			case'Apr - Sep':
			$reportingPeriodToDateRange=' and month(t.trainingDate) in (4,5,6,7,8,9)';
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
					`m`.`mediaAwarenessMessage`, 
					SUBSTRING(`v`.`name`,3,20) as `ValueChain`,
					case
						when `m`.`reportingPeriod` = 'Oct - Mar' and `m`.`year`=2015 then 'Oct 2015 - Mar 2016'
						when `m`.`reportingPeriod` = 'Oct - Mar' and `m`.`year`=2016 then 'Oct 2015 - Mar 2016'
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
					and `m`.valueChain = `v`.`name` 
					and `m`.`reportingPeriod` = 'Oct - Mar' 
					and `m`.`year`=2016
					order by `m`.`tbl_mediaprogramsId` desc";
			
		return $sql;


	}

	function form2YouAppRawDataToExcel($fromDate,$toDate,$reportingYear,$reportingPeriod){
		$append_dateRange=((($fromDate)!='') and (($toDate)!=''))?" and t.trainingDate between ('".$fromDate."') and ('".$toDate."')":"";
		$reportingYearToPeriod='';
		$reportingPeriodToDateRange='';
		switch($reportingYear){
			case'CPMA Year One':
			$reportingYearToPeriod='("2013-10-01") and ("2014-09-30")';
			break;
			
			case'CPMA Year Two':
			$reportingYearToPeriod='("2014-10-01") and ("2015-09-30")';
			break;
			
			case'CPMA Year Three':
			$reportingYearToPeriod='("2015-10-01") and ("2016-09-30")';
			break;
			
			case'CPMA Year Four':
			$reportingYearToPeriod='("2016-10-01") and ("2017-09-30")';
			break;
			
			case'CPMA Year Five':
			$reportingYearToPeriod='("2017-10-01") and ("2018-09-30")';
			break;
			
			case'CPMA Year Six':
			$reportingYearToPeriod='("2018-10-01") and ("2019-09-30")';
			break;
			
			default:
			$reportingYearToPeriod='';
			break;
		}
		$append_reportingYear=(($reportingYearToPeriod)!='')?" and t.trainingDate between ".$reportingYearToPeriod."":"";
		
		switch($reportingPeriod){
			
			case'Apr - Sep':
			$reportingPeriodToDateRange=' and month(t.trainingDate) in (4,5,6,7,8,9)';
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
					`y`.`nameofBusiness`, 
					SUBSTRING(`y`.`valueChain`,3,20) as `ValueChain`,
					case
						when `y`.`reportingPeriod` = 'Oct - Mar' and `y`.`year`=2015 then 'Oct 2015 - Mar 2016'
						when `y`.`reportingPeriod` = 'Oct - Mar' and `y`.`year`=2016 then 'Oct 2015 - Mar 2016'
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
					and `y`.`reportingPeriod` = 'Oct - Mar' 
					and `y`.`year`=2016
					order BY `y`.`tbl_youthapprenticeId` 
					desc";
			
		return $sql;


	}

	function form2BusDevRawDataToExcel($fromDate,$toDate,$reportingYear,$reportingPeriod){
		$append_dateRange=((($fromDate)!='') and (($toDate)!=''))?" and t.trainingDate between ('".$fromDate."') and ('".$toDate."')":"";
		$reportingYearToPeriod='';
		$reportingPeriodToDateRange='';
		switch($reportingYear){
			case'CPMA Year One':
			$reportingYearToPeriod='("2012-10-01") and ("2013-09-30")';
			break;
			
			case'CPMA Year Two':
			$reportingYearToPeriod='("2013-10-01") and ("2014-09-30")';
			break;
			
			case'CPMA Year Three':
			$reportingYearToPeriod='("2014-10-01") and ("2015-09-30")';
			break;
			
			case'CPMA Year Four':
			$reportingYearToPeriod='("2015-10-01") and ("2016-09-30")';
			break;
			
			case'CPMA Year Five':
			$reportingYearToPeriod='("2016-10-01") and ("2017-09-30")';
			break;
			
			case'CPMA Year Six':
			$reportingYearToPeriod='("2017-10-01") and ("2018-09-30")';
			break;
			
			default:
			$reportingYearToPeriod='';
			break;
		}
		$append_reportingYear=(($reportingYearToPeriod)!='')?" and t.trainingDate between ".$reportingYearToPeriod."":"";
		
		switch($reportingPeriod){
			
			case'Apr - Sep':
			$reportingPeriodToDateRange=' and month(t.trainingDate) in (4,5,6,7,8,9)';
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
					`v`.`nameOfPartner`,
					SUBSTRING(`v`.`valueChain`,3,20) as `ValueChain`,
					case
						when `v`.`reportingPeriod` = 'Oct - Mar' and `v`.`year`=2015 then 'Oct 2015 - Mar 2016'
						when `v`.`reportingPeriod` = 'Oct - Mar' and `v`.`year`=2016 then 'Oct 2015 - Mar 2016'
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
					and `v`.`reportingPeriod` = 'Oct - Mar' 
					and `v`.`year`=2016
					order by `v`.`tbl_businessdevId` desc";
			
		return $sql;


	}

	function form2BanLoaRawDataToExcel($fromDate,$toDate,$reportingYear,$reportingPeriod){
		$append_dateRange=((($fromDate)!='') and (($toDate)!=''))?" and t.trainingDate between ('".$fromDate."') and ('".$toDate."')":"";
		$reportingYearToPeriod='';
		$reportingPeriodToDateRange='';
		switch($reportingYear){
			case'CPMA Year One':
			$reportingYearToPeriod='("2013-10-01") and ("2014-09-30")';
			break;
			
			case'CPMA Year Two':
			$reportingYearToPeriod='("2014-10-01") and ("2015-09-30")';
			break;
			
			case'CPMA Year Three':
			$reportingYearToPeriod='("2015-10-01") and ("2016-09-30")';
			break;
			
			case'CPMA Year Four':
			$reportingYearToPeriod='("2016-10-01") and ("2017-09-30")';
			break;
			
			case'CPMA Year Five':
			$reportingYearToPeriod='("2017-10-01") and ("2018-09-30")';
			break;
			
			case'CPMA Year Six':
			$reportingYearToPeriod='("2018-10-01") and ("2019-09-30")';
			break;
			
			default:
			$reportingYearToPeriod='';
			break;
		}
		$append_reportingYear=(($reportingYearToPeriod)!='')?" and t.trainingDate between ".$reportingYearToPeriod."":"";
		
		switch($reportingPeriod){
			
			case'Apr - Sep':
			$reportingPeriodToDateRange=' and month(t.trainingDate) in (4,5,6,7,8,9)';
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
					case
						when `b`.`reportingPeriod` = 'Oct - Mar' and `b`.`year`=2015 then 'Oct 2015 - Mar 2016'
						when `b`.`reportingPeriod` = 'Oct - Mar' and `b`.`year`=2016 then 'Oct 2015 - Mar 2016'
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
					and `b`.`reportingPeriod` = 'Oct - Mar' 
					and `b`.`year`=2016
					order by `b`.`tbl_bankLoanId` desc";
			
		return $sql;


	}

	function form2InpSalRawDataToExcel($fromDate,$toDate,$reportingYear,$reportingPeriod){
		$append_dateRange=((($fromDate)!='') and (($toDate)!=''))?" and t.trainingDate between ('".$fromDate."') and ('".$toDate."')":"";
		$reportingYearToPeriod='';
		$reportingPeriodToDateRange='';
		switch($reportingYear){
			case'CPMA Year One':
			$reportingYearToPeriod='("2013-10-01") and ("2014-09-30")';
			break;
			
			case'CPMA Year Two':
			$reportingYearToPeriod='("2014-10-01") and ("2015-09-30")';
			break;
			
			case'CPMA Year Three':
			$reportingYearToPeriod='("2015-10-01") and ("2016-09-30")';
			break;
			
			case'CPMA Year Four':
			$reportingYearToPeriod='("2016-10-01") and ("2017-09-30")';
			break;
			
			case'CPMA Year Five':
			$reportingYearToPeriod='("2017-10-01") and ("2018-09-30")';
			break;
			
			case'CPMA Year Six':
			$reportingYearToPeriod='("2018-10-01") and ("2019-09-30")';
			break;
			
			default:
			$reportingYearToPeriod='';
			break;
		}
		$append_reportingYear=(($reportingYearToPeriod)!='')?" and t.trainingDate between ".$reportingYearToPeriod."":"";
		
		switch($reportingPeriod){
			
			case'Apr - Sep':
			$reportingPeriodToDateRange=' and month(t.trainingDate) in (4,5,6,7,8,9)';
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
					`s`.`nameOfMiddleValueChainActor`,
					case
						when s.`dateOfStartOfinputsSalesBusiness` like '1900-02-%' then '-'
						when s.`dateOfStartOfinputsSalesBusiness` like '1900-02-%' then '-'
					else s.`dateOfStartOfinputsSalesBusiness`
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
					and `sm`.`reportingPeriod` = 'Oct - Mar' 
					and `sm`.`year`=2016
					and `s`.`id`=`sm`.`input_sales_id` 
					group by `s`.`id` order by `s`.`id` desc";
			
		return $sql;


	}

	function form2PHHRawDataToExcel($fromDate,$toDate,$reportingYear,$reportingPeriod){
		$append_dateRange=((($fromDate)!='') and (($toDate)!=''))?" and t.trainingDate between ('".$fromDate."') and ('".$toDate."')":"";
		$reportingYearToPeriod='';
		$reportingPeriodToDateRange='';
		switch($reportingYear){
			case'CPMA Year One':
			$reportingYearToPeriod='("2013-10-01") and ("2014-09-30")';
			break;
			
			case'CPMA Year Two':
			$reportingYearToPeriod='("2014-10-01") and ("2015-09-30")';
			break;
			
			case'CPMA Year Three':
			$reportingYearToPeriod='("2015-10-01") and ("2016-09-30")';
			break;
			
			case'CPMA Year Four':
			$reportingYearToPeriod='("2016-10-01") and ("2017-09-30")';
			break;
			
			case'CPMA Year Five':
			$reportingYearToPeriod='("2017-10-01") and ("2018-09-30")';
			break;
			
			case'CPMA Year Six':
			$reportingYearToPeriod='("2018-10-01") and ("2019-09-30")';
			break;
			
			default:
			$reportingYearToPeriod='';
			break;
		}
		$append_reportingYear=(($reportingYearToPeriod)!='')?" and t.trainingDate between ".$reportingYearToPeriod."":"";
		
		switch($reportingPeriod){
			
			case'Apr - Sep':
			$reportingPeriodToDateRange=' and month(t.trainingDate) in (4,5,6,7,8,9)';
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
					`p`.`nameOfMiddleValueChainActor`, 
					`p`.`dateOfStartOfinputsSalesBusiness`,
					case
						when `pm`.`reportingPeriod` = 'Oct - Mar' and `pm`.`year`=2015 then 'Oct 2015 - Mar 2016'
						when `pm`.`reportingPeriod` = 'Oct - Mar' and `pm`.`year`=2016 then 'Oct 2015 - Mar 2016'
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
					and `pm`.`reportingPeriod` = 'Oct - Mar' 
					and `pm`.`year`=2016
					and `p`.`id`=`pm`.`phh_id`
					group by `p`.`id` order by `p`.`id` desc";
			
		return $sql;


	}

	function form2PubPriRawDataToExcel($fromDate,$toDate,$reportingYear,$reportingPeriod){
		$append_dateRange=((($fromDate)!='') and (($toDate)!=''))?" and t.trainingDate between ('".$fromDate."') and ('".$toDate."')":"";
		$reportingYearToPeriod='';
		$reportingPeriodToDateRange='';
		switch($reportingYear){
			case'CPMA Year One':
			$reportingYearToPeriod='("2013-10-01") and ("2014-09-30")';
			break;
			
			case'CPMA Year Two':
			$reportingYearToPeriod='("2014-10-01") and ("2015-09-30")';
			break;
			
			case'CPMA Year Three':
			$reportingYearToPeriod='("2015-10-01") and ("2016-09-30")';
			break;
			
			case'CPMA Year Four':
			$reportingYearToPeriod='("2016-10-01") and ("2017-09-30")';
			break;
			
			case'CPMA Year Five':
			$reportingYearToPeriod='("2017-10-01") and ("2018-09-30")';
			break;
			
			case'CPMA Year Six':
			$reportingYearToPeriod='("2018-10-01") and ("2019-09-30")';
			break;
			
			default:
			$reportingYearToPeriod='';
			break;
		}
		$append_reportingYear=(($reportingYearToPeriod)!='')?" and t.trainingDate between ".$reportingYearToPeriod."":"";
		
		switch($reportingPeriod){
			
			case'Apr - Sep':
			$reportingPeriodToDateRange=' and month(t.trainingDate) in (4,5,6,7,8,9)';
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
				`p`.`namePartner`, 
				SUBSTRING(`p`.`valueChain`,3,20) as `ValueChain`,
				case
					when `p`.`reportingPeriod` = 'Oct - Mar' and `p`.`year`=2015 then 'Oct 2015 - Mar 2016'
					when `p`.`reportingPeriod` = 'Oct - Mar' and `p`.`year`=2016 then 'Oct 2015 - Mar 2016'
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
				and `p`.`reportingPeriod` = 'Oct - Mar' 
				and `p`.`year`=2016
				order by `p`.`tbl_partnershipId` desc";
							
		return $sql;


	}
	
	function form3RawDataToExcel($fromDate,$toDate,$reportingYear,$reportingPeriod){
		$append_dateRange=((($fromDate)!='') and (($toDate)!=''))?" and t.trainingDate between ('".$fromDate."') and ('".$toDate."')":"";
		$reportingYearToPeriod='';
		$reportingPeriodToDateRange='';
		switch($reportingYear){
			case'CPMA Year One':
			$reportingYearToPeriod='("2013-10-01") and ("2014-09-30")';
			break;
			
			case'CPMA Year Two':
			$reportingYearToPeriod='("2014-10-01") and ("2015-09-30")';
			break;
			
			case'CPMA Year Three':
			$reportingYearToPeriod='("2015-10-01") and ("2016-09-30")';
			break;
			
			case'CPMA Year Four':
			$reportingYearToPeriod='("2016-10-01") and ("2017-09-30")';
			break;
			
			case'CPMA Year Five':
			$reportingYearToPeriod='("2017-10-01") and ("2018-09-30")';
			break;
			
			case'CPMA Year Six':
			$reportingYearToPeriod='("2018-10-01") and ("2019-09-30")';
			break;
			
			default:
			$reportingYearToPeriod='';
			break;
		}
		$append_reportingYear=(($reportingYearToPeriod)!='')?" and t.trainingDate between ".$reportingYearToPeriod."":"";
		
		switch($reportingPeriod){
			
			case'Apr - Sep':
			$reportingPeriodToDateRange=' and month(t.trainingDate) in (4,5,6,7,8,9)';
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
				when `w`.`reportingPeriod` = 'Oct - Mar' and `w`.`year`=2015 then 'Oct 2015 - Mar 2016'
				when `w`.`reportingPeriod` = 'Oct - Mar' and `w`.`year`=2016 then 'Oct 2015 - Mar 2016'
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
			`w`.`epayRecievedDetails` as `epayRecieved-Mar`,
			`w`.`exTradersSupplyChainFirstQuarterMonth` as `TradersInSupplyChain-Oct`,
			`w`.`exTradersSupplyChainSecondQuarterMonth` as `TradersInSupplyChain-Nov`,
			`w`.`exTradersSupplyChainThirdQuarterMonth` as `TradersInSupplyChain-Dec`,
			`w`.`exTradersSupplyChainFourthQuarterMonth` as `TradersInSupplyChain-Jan`,
			`w`.`exTradersSupplyChainFifthQuarterMonth` as `TradersInSupplyChain-Feb`,
			`w`.`exTradersSupplyChainSixthQuarterMonth` as `TradersInSupplyChain-Mar`,
			`w`.`exTradersSupplyChainDetails` as `TradersInSupplyChain_Details_Oct-Mar`,
			`w`.`exUnionSupplyChainFirstQuarterMonth` as `UnionsInSupplyChain-Oct`,
			`w`.`exUnionSupplyChainSecondQuarterMonth` as `UnionsInSupplyChain-Nov`,
			`w`.`exUnionSupplyChainThirdQuarterMonth` as `UnionsInSupplyChain-Dec`,
			`w`.`exUnionSupplyChainFourthQuarterMonth` as `UnionsInSupplyChain-Jan`,
			`w`.`exUnionSupplyChainFifthQuarterMonth` as `UnionsInSupplyChain-Feb`,
			`w`.`exUnionSupplyChainSixthQuarterMonth` as `UnionsInSupplyChain-Mar`,
			`w`.`exUnionsSupplyChainDetails` as `UnionsInSupplyChain_Details_Oct-Mar`,
			`w`.`volBeansExFirstQuarterMonth` as `vol_Beans_Exported-Oct`,
			`w`.`volBeansExSecondQuarterMonth` as `vol_Beans_Exported-Nov`,
			`w`.`volBeansExThirdQuarterMonth` as `vol_Beans_Exported-Dec`,
			`w`.`volBeansExFourthQuarterMonth` as `vol_Beans_Exported-Jan`,
			`w`.`volBeansExFifthQuarterMonth` as `vol_Beans_Exported-Feb`,
			`w`.`volBeansExSixthQuarterMonth` as `vol_Beans_Exported-Mar`,
			`w`.`volBeansExDetails` as `vol_Beans_Exported_Details_Oct-Mar`,
			`w`.`volBeansExUgx` as `vol_Amount_UGX`,
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
	FROM 
	`tbl_form3_exporters` as `w`,
	`tbl_exporters` as `x`,
	`tbl_district` as `d`,
	`tbl_subcounty` as `s`
	WHERE 1=1
	and `w`.`tbl_exporterId` = `x`.`tbl_exportersId`
	and `w`.`reportingPeriod` = 'Oct - Mar' 
	and `w`.`year`=2016
	AND `d`.`districtCode`=`x`.`exporterDistrict`
	AND `d`.`Display`='Yes' 
	AND `d`.`districtCode`=`s`.`districtCode`
	AND `s`.`subcountyCode`=`x`.`exporterSubcounty`
	AND `s`.`Display`='Yes' 
	AND `w`.`display`='Yes'
	ORDER BY w.`tbl_form3_exportersId` DESC";
			
		return $sql;


	}
	
	function form4RawDataToExcel($fromDate,$toDate,$reportingYear,$reportingPeriod){
		$append_dateRange=((($fromDate)!='') and (($toDate)!=''))?" and t.trainingDate between ('".$fromDate."') and ('".$toDate."')":"";
		$reportingYearToPeriod='';
		$reportingPeriodToDateRange='';
		switch($reportingYear){
			case'CPMA Year One':
			$reportingYearToPeriod='("2013-10-01") and ("2014-09-30")';
			break;
			
			case'CPMA Year Two':
			$reportingYearToPeriod='("2014-10-01") and ("2015-09-30")';
			break;
			
			case'CPMA Year Three':
			$reportingYearToPeriod='("2015-10-01") and ("2016-09-30")';
			break;
			
			case'CPMA Year Four':
			$reportingYearToPeriod='("2016-10-01") and ("2017-09-30")';
			break;
			
			case'CPMA Year Five':
			$reportingYearToPeriod='("2017-10-01") and ("2018-09-30")';
			break;
			
			case'CPMA Year Six':
			$reportingYearToPeriod='("2018-10-01") and ("2019-09-30")';
			break;
			
			default:
			$reportingYearToPeriod='';
			break;
		}
		$append_reportingYear=(($reportingYearToPeriod)!='')?" and t.trainingDate between ".$reportingYearToPeriod."":"";
		
		switch($reportingPeriod){
			
			case'Apr - Sep':
			$reportingPeriodToDateRange=' and month(t.trainingDate) in (4,5,6,7,8,9)';
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
				when `w`.`reportingPeriod` = 'Oct - Mar' and `w`.`year`=2015 then 'Oct 2015 - Mar 2016'
				when `w`.`reportingPeriod` = 'Oct - Mar' and `w`.`year`=2016 then 'Oct 2015 - Mar 2016'
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
			and `w`.`reportingPeriod` = 'Oct - Mar' 
			and `w`.`year`=2016
			and `d`.`districtCode`=`x`.`traderDistrict`
			and `d`.`Display`='Yes' 
			and `d`.`districtCode`=`s`.`districtCode`
			and `s`.`subcountyCode`=`x`.`traderSubcounty`
			and `s`.`Display`='Yes' 
			and `w`.`display`='Yes'
			order by w.`tbl_form4_tradersId` desc";
			
		return $sql;


	}
		
	function form7RawDataToExcel($fromDate,$toDate,$reportingYear,$reportingPeriod){
		
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
		`f`.`tbl_farmersId`,
		case
			when `f`.`reportingPeriod` = 'Oct - Mar 2016' then 'Oct 2015 - Mar 2016'
			when `f`.`reportingPeriod` = 'Oct - Mar2016' then 'Oct 2015 - Mar 2016'
			when `f`.`reportingPeriod` = 'Oct - Mar 2015' then 'Oct 2015 - Mar 2016'
			when `f`.`reportingPeriod` = 'Apr - Sep 2016' then 'Apr 2016 - Sep 2016'
			when `f`.`reportingPeriod` = 'Apr - Sep 2015' then 'Apr 2015 - Sep 2015'
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
		and `f`.`year` ='2016'
		and `f`.`reportingPeriod` like 'Oct - Mar%'
		and `d`.`zone` = `z`.`zoneCode`
		and `f`.`farmersDistrict` = `d`.`districtCode`
		and `f`.`farmersSubcounty`= `s`.`subcountyCode` 
		and `f`.`display`='Yes'
		order by `f`.`tbl_farmersId` DESC limit 0,50";
			
		return $sql;


	}
	
	function form7RawDataToExcelAll($fromDate,$toDate,$reportingYear,$reportingPeriod){
		
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
			`f`.`tbl_farmersId`,
				case
					when `f`.`reportingPeriod` = 'Oct - Mar 2016' then 'Oct 2015 - Mar 2016'
					when `f`.`reportingPeriod` = 'Oct - Mar2016' then 'Oct 2015 - Mar 2016'
					when `f`.`reportingPeriod` = 'Oct - Mar 2015' then 'Oct 2015 - Mar 2016'
					when `f`.`reportingPeriod` = 'Apr - Sep 2016' then 'Apr 2016 - Sep 2016'
					when `f`.`reportingPeriod` = 'Apr - Sep2016' then 'Apr 2016 - Sep 2016'
					when `f`.`reportingPeriod` = 'Apr - Sep 2015' then 'Apr 2015 - Sep 2015'
					when `f`.`reportingPeriod` = 'Apr - Sep 2015' then 'Apr 2015 - Sep 2015'
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
				and`f`.`year` ='2016'
				and `f`.`reportingPeriod` like 'Oct - Mar%'
				and `d`.`zone` = `z`.`zoneCode`
				and `f`.`farmersDistrict` = `d`.`districtCode`
				and `f`.`farmersSubcounty`= `s`.`subcountyCode` 
				and `f`.`display`='Yes'
				order by `f`.`tbl_farmersId` DESC";
			
		return $sql;


	}



}//end of class QueryManager();


?>