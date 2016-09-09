<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<form name='reporting' id='reporting' method='post' action=''>
 
<table width='400' border='1'>
  <tr>
    <th scope='col'>Current Active Quarter</th>
    <th scope='col'><span style='font-weight:bold;'>".$_SESSION['quarter']."</span></th>
  </tr>";
  
 /*  <tr>
    <td>Date of Closing Data Entry </td>
    <td><span style='font-weight:bold;'>
      <select name='openentry'>
        ";
		$query=mysql_query("select * from tbl_active where status='Open'")or die("CPMA error-code".mysql_error());
		while($row=mysql_fetch_array($query)){
		$data.="
        <option value='".$row['dateofentry']."'>".$row['dateofentry']."</option>
        ";
		
		}
		$data.="
      </select>
    </span></td>
  </tr>
  <tr>
    <td>Change Active Year</td>
    <td><select name='aPeriod' id='aPeriod'>
      ";
                $yr = date(Y); $end=$yr;
				do{
				 $data.="
      <option value='".$end."'>".$end."</option>
      ";
				 $end--;
				} while($yr>=2010);
                $data.="
      <option value='Closed'>Close Reporting </option>
    </select>
    </td>
  </tr>
  <tr>
    <td>Change Active Quarter</td>
    <td><select name='aQuarter'>
      ";
         $query=mysql_query("select * from tbl_quarters order by quarteCode asc")or die("CPMA ERROR-CODE 00066".mysql_error());
		 while($row=mysql_fetch_array($query)){
		 $data.="
      <option value='".$row['quartername']."'>".$row['quarterName']."</option>
      ";
		 }
          $data.="
      <option value='Closed'>Close Reporting </option>
    </select>
    </td>
  </tr>
  <tr>
    <td>Change Date of Open Entry</td>
    <td><a href='javascript:void(0)' onclick='if(self.gfPop)gfPop.fPopCalendar(document.reporting.chdate);return false;' hidefocus=''>
      <input name='chdate' type='text'  size='15' value=''  readonly='readonly' />
      <img src='WeekPicker/calbtn.gif' alt='' name='popcal' width='34' height='22' border='0' align='absmiddle' id='popcal' /></a></td>
  </tr>"; */
  $data.="<tr>
    <td>&nbsp;</td>
    <td><input type='button' value='  Save   ' name='saveReportPeriod'  /></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
</form>";