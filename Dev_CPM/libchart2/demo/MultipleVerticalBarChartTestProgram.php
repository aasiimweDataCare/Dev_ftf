<?php
 require_once('conf.php');
   @mysql_select_db(DB_NAME,mysql_connect(DB_SERVER,DB_USER,DB_PWD))or die(@http("Connection Failure!-LIB-0047"));

//require_once('.../lib_connect.php');
	/* Libchart - PHP chart library
	 * Copyright (C) 2005-2011 Jean-Marc Trémeaux (jm.tremeaux at gmail.com)
	 * 
	 * This program is free software: you can redistribute it and/or modify
	 * it under the terms of the GNU General Public License as published by
	 * the Free Software Foundation, either version 3 of the License, or
	 * (at your option) any later version.
	 * 
	 * This program is distributed in the hope that it will be useful,
	 * but WITHOUT ANY WARRANTY; without even the implied warranty of
	 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
	 * GNU General Public License for more details.
	 *
	 * You should have received a copy of the GNU General Public License
	 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
	 * 
	 */
	
	/**
	 * Multiple horizontal bar chart demonstration.
	 *
	 */


  		/* $SQL="select * from view_dashboard1 where indicator_id='".$_GET['indicator_id']."'  order by indicator_code asc";
		$sqlQRY = mysql_query($SQL)or die(http(0098));
		$row = @mysql_fetch_array($sqlQRY); */
		
		
		
		
			
			$Year1 = $_GET['Year1'];
			$Year2 = $_GET['Year2'];
			$Year3 = $_GET['Year3'];
			$Year4 = $_GET['Year4'];
			$Year5 = $_GET['Year5'];
			$grandTarget = $_GET['grandTotal'];
			$Actual1 = $_GET['Year1Actual'];
			$Actual2 = $_GET['Year2Actual'];
			$Actual3 = $_GET['Year3Actual'];
			$Actual4 = $_GET['Year4Actual'];
			$Actual5 = $_GET['Year5Actual'];
			$grandActual = $_GET['grandActual'];
			
			
			$data_110 = $_GET['indicator_id'];
			$data_11 = $_GET['Target'];
			$data_21 = $_GET['totalActual'];
			$data_22 = $_GET['IndicatorName'];



	include "../libchart/classes/libchart.php";

	$chart = new VerticalBarChart(800,450);
	//$chart = new HorizontalBarChart(800, 250);

	$serie1 = new XYDataSet();
	$serie1->addPoint(new Point("2009",$Year1));
	$serie1->addPoint(new Point("2010",$Year2));
	$serie1->addPoint(new Point("2011",$Year3));
	$serie1->addPoint(new Point("2012",$Year4));
	$serie1->addPoint(new Point("2013",$Year5));
	$serie1->addPoint(new Point("Grand Total",$grandTarget));
	/* $serie1->addPoint(new Point("NT", 63));
	$serie1->addPoint(new Point("BC", 58));
	$serie1->addPoint(new Point("AB", 58));
	$serie1->addPoint(new Point("SK", 46)); */
	
	$serie2 = new XYDataSet();
	$serie2->addPoint(new Point("2009",$Actual1));
	$serie2->addPoint(new Point("2010",$Actual2));
	$serie2->addPoint(new Point("2011",$Actual3));
	$serie2->addPoint(new Point("2012",$Actual4));
	$serie2->addPoint(new Point("2013",$Actual5));
	$serie2->addPoint(new Point("Grand Total",$grandActual));
	
	$dataSet = new XYSeriesDataSet();
	$dataSet->addSerie("Annual Targets", $serie1);
	$dataSet->addSerie("Annual Actual", $serie2);
	$chart->setDataSet($dataSet);
	$chart->getPlot()->setGraphCaptionRatio(0.65);
	//$chart->setTitle('-');
	$chart->setTitle($data_22);
	$chart->render("generated/demo7.png");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>Libchart line demonstration</title>
	<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-15" />
</head>
<body>
	<img alt="Line chart" src="generated/demo7.png" style="border: 1px solid gray;"/>
</body>
</html>
