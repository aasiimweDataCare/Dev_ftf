<?php


	require_once('conf.php');
   @mysql_select_db(DB_NAME,mysql_connect(DB_SERVER,DB_USER,DB_PWD))or die(@http("Connection Failure!-LIB-0047"));



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
	 
	 		$data_110 = $_GET['indicator_id'];
			$data_11 = $_GET['Target'];
			$data_21 = $_GET['totalActual'];
			$data_22 = $_GET['IndicatorName'];

			include "../libchart/classes/libchart.php";

			$chart = new HorizontalBarChart(450, 250);

			$serie1 = new XYDataSet();
			$serie1->addPoint(new Point("Perf",$data_11));
			//$serie1->addPoint(new Point("18-24", 22));
			//$serie1->addPoint(new Point("25-34", 17));
			//$serie1->addPoint(new Point("35-44", 20));
			//$serie1->addPoint(new Point("45-54", 25));
	
		$serie2 = new XYDataSet();
		$serie2->addPoint(new Point("Perf", $data_21));
	#$serie2->addPoint(new Point("18-24", 13));
	//$serie2->addPoint(new Point("25-34", 18));
	//$serie2->addPoint(new Point("35-44", 23));
	//$serie2->addPoint(new Point("45-54", 22));
	
	$dataSet = new XYSeriesDataSet();
	#$dataSet->addSerie("Male", $serie1);
	#$dataSet->addSerie("Female", $serie2);
	$dataSet->addSerie("LOP Targets", $serie1);
	$dataSet->addSerie("Cumulative Actual", $serie2);
		//$dataSet->addSerie("Perfomance", $serie2);
	$chart->setDataSet($dataSet);

	$chart->setTitle($data_22);
	$chart->render("generated/demo8.png");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>Libchart line demonstration</title>
	<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-15" />
</head>
<body>
	<img alt="Line chart" src="generated/demo8.png" style="border: 1px solid gray;"/>
</body>
</html>
