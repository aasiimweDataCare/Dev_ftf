<?php session_start();?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php heading($_GET['action']); ?></title>
</head>

<body>
<table width='650' border='0' cellspacing='0' cellpadding='1' style='font-family:verdana;font-size:12px;'>
  <tr height='25'  style='font-family:verdana;font-size:12px;color:green;'>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td align='left' valign='center'><table width='640' align='right' border='0'>
      <tr height='20'>
        <td colspan='3' align='center' style='color:blue;'><?php 
																						if(isset($text))
																							print $text;
																					?>
        </td>
      </tr>
      <tr height='25'>
        <td align='left' valign='center'>Current Active Year</td>
        <?php 
																					$a  = "select * from active where count = (select max(count) from active)";
																					$a1 = mysql_query($a);
																					while($pik = mysql_fetch_array($a1))
																					{
																						$vAlUe = $pik['year'];	$quart = $pik['quarter'];	$doent = $pik['doentry'];
																					}
																				?>
        <td align='left' valign='center' style='font-weight:bold;'><?php print $vAlUe; ?></td>
      </tr>
      <tr height='25'>
        <td align='left' valign='center'>Current Active Quarter</td>
        <td align='left' valign='center' style='font-weight:bold;'><?php print $quart; ?></td>
      </tr>
      <tr height='25'>
        <td align='left' valign='center'>Current Date of Open Entry</td>
        <td align='left' valign='center' style='font-weight:bold;'><?php print $doent; ?></td>
      </tr>
      <tr height='25'>
        <td colspan='2'></td>
      </tr>
      <tr height='25'>
        <td align='left' valign='center'>Change Active Year</td>
        <td align='left' valign='center'><?php
																						$YeAr = date('Y');
																					?>
              <select name='aPeriod'>
                
                <option value='Closed'>Close Reporting </option>
              </select>
        </td>
      </tr>
      <tr height='25'>
        <td align='left' valign='center'>Change Active Quarter</td>
        <td align='left' valign='center'><select name='aQuarter'>
         $query=mysql_query()or die("aBi ERROR-CODE 00066".mysql_error());
          <option value='Closed'>Close Reporting </option>
        </select>
        </td>
      </tr>
      <tr height='25'>
        <td align='left' valign='center'>Change Date of Open Entry</td>
        <td align='left' valign='center'><a href="javascript:void(0)" onClick="if(self.gfPop)gfPop.fPopCalendar(document.grant.fddate);return false;" hidefocus="">
                      <input name="fddate" type="text"  size="15" value=''  readonly="readonly" />
                      <img name="popcal" src="WeekPicker/calbtn.gif" alt="" align="absmiddle" border="0" height="22" width="34"></a></td>
      </tr>
      <tr height='25'>
        <td colspan='2'></td>
      </tr>
      <tr height='25'>
        <td colspan='2' align='right'><table width='200'>
          <tr height='25'>
            <td align='center' valign='center'><input type='submit' value='  Save   ' name='saveReportPeriod' onclick="return verify();" /></td>
            <td align='center' valign='center'>&nbsp;</td>
          </tr>
        </table></td>
      </tr>
    </table></td>
  </tr>
</table>


</body>
</html>
