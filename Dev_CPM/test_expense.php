<?php
global $data;
$PageSecurity=15;
session_start();
require_once('connections/lib_connect.php');

//connect to a DSN "myDSN"
$conn = odbc_connect('aBiIntergration','Prossie','MarkBiti000');

if ($conn)
{
 header("Cache-control: private"); 
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=navision_file.xls");
header("Content-Description: PHP Generated Data");
header("Pragma: no-cache");
header("Expires: 0"); 



//$query= "select * from expense order by activity_code, year asc";
// for activity
  //the SQL statement that will query the database
  $query = "select * from expense where year =2013";
  //$query = "select  * from budget where Year=2012  and Activity_Code='1.1.1' ";
  //$query = "select Activity_Code, count(Quarter) as 'Quarter' from budget where Year=2012 group by Activity_Code";
   //$query = "select Activity_Code, count(Quarter) as 'Quarter' from expense where Year=2012 group by Activity_Code";
   //$query="select * from expense where year=2012 and activity_code='1.4.1'";
  /* $query= "SELECT Budget_Name, Activity_Code, Year,
sum( IF( Year = '2012'AND Quarter = '1', Amount, 0 ) ) AS 'Qtr 1(Jan - Mar)',
 sum( IF( Year = '2012'AND Quarter = '2', Amount, 0 ) ) AS 'Qtr 2(Apr - Jun)',
 sum( IF( Year = '2012' AND Quarter = '3', Amount, 0 ) ) AS 'Qtr 3(July - Sep)',
 sum( IF( Year = '2012' AND Quarter = '4', Amount, 0 ) ) AS 'Qtr 4(Oct - Dec)'
FROM budget
WHERE Activity_Code LIKE '%'
AND year = '2012'
GROUP BY Year, Activity_Code
ORDER BY year ASC";  */
  //perform the query
  //$query="select a.activity_code as 'Activity Code',a.activity_name as 'Activity Name',e.year as 'Financial Year',e.month as 'Month',e.quarter as 'Quorter',e.amount as 'Amount' from activity a,expense e where e.activity_code=a.activity_code  order by a.activity_code, year ";
  $result=odbc_exec($conn, $query);

  echo "<table border=\"1\"><tr>";

  //print field name
  $colName = odbc_num_fields($result);
  for ($j=1; $j<= $colName; $j++)
  { 
    echo "<th>";
    echo odbc_field_name ($result, $j );
    echo "</th>";
  }

  //fetch tha data from the database
  while(odbc_fetch_row($result))
  {
  echo $budget[0];
    echo "<tr>";
    for($i=1;$i<=odbc_num_fields($result);$i++) 
    {
      echo "<td>";
      echo odbc_result($result,$i);
      echo "</td>";
    }
    echo "</tr>";
  }

  echo "</td> </tr>";
  echo "</table >";
 

 
 
  //close the connection
  odbc_close ($conn);
}


else echo "odbc not connected"; 
#mysql_query("DROP TABLE `n_activity`, `n_budget`, `n_expense`, `n_income`")or die(mysql_error());
?>

