<?php


list($query_string, $monthsArray) = $qmobj->form4RawDataToExcel($reportingYear, $reportingPeriod);
            $result_sql = @Execute($query_string) or die(mysql_error() . 'on line: ' . (__line__));
            $data .= "<table  style='background-color:#EBEBEB;' border='0' cellspacing='1' cellpadding='1'>
                                <tr>
                                    <th colspan='0'rowspan='2' style='min-width: 50px;'>#</th>
                                    <th rowspan='2'>Name of Business/Exporter</th>
                                    <th rowspan='2'>Reporting Period</th>
                                    <th colspan='2' rowspan='2'>Performance Indicators</th>";
            switch (true) {
                case (!empty($reportingYear)) and (empty($reportingPeriod)):
                    $data .= "<th colspan='13' >Achievements</th>";
                    break;
                case (empty($reportingYear)) and (!empty($reportingPeriod)):
                    $data .= "<th colspan='7' >Achievements</th>";
                    break;
                case (!empty($reportingYear)) and (!empty($reportingPeriod)):
                    $data .= "<th colspan='7' >Achievements</th>";
                    break;
                default:
                    $data .= "<th colspan='13' >Achievements</th>";
                    break;
            }
            $data .= "<th rowspan='2'>Given details</th>
                                </tr>

                                <tr>";
            foreach ($monthsArray as $key) {
                $month = __month__coverter($key);
                $result = substr($month, 0, 3);
                $data .= "<th >" . $result . "</th>";
            }
            $data .= "<th >Total</th>
                                </tr>
                                ";


            $x = 1;
            while ($row = @FetchRecords($result_sql)) {
                $divVwDisaggregation = "vwDisaggregation" . $row['tbl_form4_tradersId'];
                $data .= "<tr>";
                $data .= "<td rowspan='14' >" . $x . ".</td>";
                $data .= "<td rowspan='14' style='background-color:#e7e7e7'>" . $row['exporterName'] . "</td>";
                $data .= "<td rowspan='14'>" . $row['reportingPeriod_cleaned'] . "</td>";
                switch (true) {

					case (!empty($reportingYear)) and (empty($reportingPeriod)):
						$data .= view_frm4ExDisaggregation(
						"All", $row['tbl_traderId'],
						$row['year'], 
						$row['tbl_form4_tradersId'],
						($row['traderName']),
						$reportingPeriod,
						$divVwDisaggregation);

						break;
					case (empty($reportingYear)) and (!empty($reportingPeriod)):
						$data .= data_form4($row);
						break;

					case (!empty($reportingYear)) and (!empty($reportingPeriod)):
						$data .= data_form4($row);
						break;
					default:
						$data .= view_frm4ExDisaggregation(
						"All",
						$row['tbl_traderId'],
						$row['year'],
						$row['tbl_form4_tradersId'],
						($row['traderName']),
						$reportingPeriod,
						$divVwDisaggregation);
						break;
        }
		$data .= "</tr>";
                $x++;
            }
            $data .= "</table>";
