<?php

require_once('connections/lib_connect.php');
require_once('./xajax_0.2.4/xajax.inc.php');
$xajax = new xajax();
$xajax->errorHandlerOn();
#registering functions
#************************


$xajax->processRequests();

  ?>


<html>
<head>
<?php $xajax->printJavascript('xajax_0.2.4/'); 

?>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link href="css/style.css" rel="stylesheet" type="text/css" />
<title>aBi Trust:Financial Services</title>
</head>

<body>

<table width="100%" border="0" align="center" id="container_table">
  <tr>
    <td width="927">
<table width="880" border="0" align="center"  >
  <tr>
    <td><?php require_once('connections/header.php'); ?></td>
  </tr>
</table><table width="870" border="0" align="center" id="content_" >
  <tr>
    <td width="190" valign="top"><table width="190" border="0" >
      <tr>
        <td valign="top" align="left"><?php require_once('connections/left_links.php'); ?></td>
            </tr>
      </table></td>
          <td width="660" valign="top"  ><fieldset>
              <legend class="green_field">Financial Services Utilization </legend>
              <table width="101%" border="0" id="financial">
           <tr>
              <td height="26" bordercolor="#FF9933" bgcolor="#FFCC66" class="black2">NO.</td>
              <td bordercolor="#FF9933" bgcolor="#FFCC66" class="black2">INDICATOR</td>
              <td bordercolor="#FF9933" bgcolor="#FFCC66" class="black2">MALE</td>
              <td bordercolor="#FF9933" bgcolor="#FFCC66" class="black2">FEMALE</td>
              <td bordercolor="#FF9933" bgcolor="#FFCC66" class="black2">YOUTH</td>
              <td bordercolor="#FF9933" bgcolor="#FFCC66" class="black2">TOTAL</td>
           </tr>
            <tr>
              <td bordercolor="#FF9933">1</td>
              <td bordercolor="#FF9933">No. of applications made to banks </td>
              <td bordercolor="#FF9933"><input name="textfield2" type="text" id="textfield2" size="10" /></td>
              <td bordercolor="#FF9933"><input name="textfield14" type="text" id="textfield14" size="10" /></td>
              <td bordercolor="#FF9933"><input name="textfield15" type="text" id="textfield15" size="10" /></td>
              <td bordercolor="#FF9933" bgcolor="#FFFFFF"><input name="textfield35" type="text" id="textfield35" size="10" /></td>
            </tr>
            <tr>
              <td bordercolor="#FF9933">2</td>
              <td bordercolor="#FF9933">No of loans approved</td>
              <td bordercolor="#FF9933"><input name="textfield3" type="text" id="textfield3" size="10" /></td>
              <td bordercolor="#FF9933"><input name="textfield16" type="text" id="textfield16" size="10" /></td>
              <td bordercolor="#FF9933"><input name="textfield17" type="text" id="textfield17" size="10" /></td>
              <td bordercolor="#FF9933" bgcolor="#FFFFFF"><input name="textfield36" type="text" id="textfield36" size="10" /></td>
            </tr>
            <tr>
              <td bordercolor="#FF9933">3</td>
              <td bordercolor="#FF9933">No.  of loans  disbursed</td>
              <td bordercolor="#FF9933"><input name="textfield4" type="text" id="textfield4" size="10" /></td>
              <td bordercolor="#FF9933"><input name="textfield18" type="text" id="textfield18" size="10" /></td>
              <td bordercolor="#FF9933"><input name="textfield19" type="text" id="textfield19" size="10" /></td>
              <td bordercolor="#FF9933" bgcolor="#FFFFFF"><input name="textfield37" type="text" id="textfield37" size="10" /></td>
            </tr>
            <tr>
              <td bordercolor="#FF9933">4</td>
              <td bordercolor="#FF9933">Amount of loans disbursed </td>
              <td bordercolor="#FF9933"><input name="textfield42" type="text" id="textfield42" size="10" /></td>
              <td bordercolor="#FF9933"><input name="textfield45" type="text" id="textfield45" size="10" /></td>
              <td bordercolor="#FF9933"><input name="textfield410" type="text" id="textfield410" size="10" /></td>
              <td bordercolor="#FF9933" bgcolor="#FFFFFF"><input name="textfield411" type="text" id="textfield411" size="10" /></td>
            </tr>
            <tr>
              <td bordercolor="#FF9933">5</td>
              <td bordercolor="#FF9933">No. of loans due for repayment</td>
              <td bordercolor="#FF9933"><input name="textfield5" type="text" id="textfield5" size="10" /></td>
              <td bordercolor="#FF9933"><input name="textfield20" type="text" id="textfield20" size="10" /></td>
              <td bordercolor="#FF9933"><input name="textfield21" type="text" id="textfield21" size="10" /></td>
              <td bordercolor="#FF9933" bgcolor="#FFFFFF"><input name="textfield38" type="text" id="textfield38" size="10" /></td>
            </tr>
            <tr>
              <td bordercolor="#FF9933">6</td>
              <td bordercolor="#FF9933">Actual amount of loans repaid.</td>
              <td bordercolor="#FF9933"><input name="textfield6" type="text" id="textfield6" size="10" /></td>
              <td bordercolor="#FF9933"><input name="textfield22" type="text" id="textfield22" size="10" /></td>
              <td bordercolor="#FF9933"><input name="textfield23" type="text" id="textfield23" size="10" /></td>
              <td bordercolor="#FF9933" bgcolor="#FFFFFF"><input name="textfield39" type="text" id="textfield39" size="10" /></td>
            </tr>
            <tr>
              <td bordercolor="#FF9933">7</td>
              <td bordercolor="#FF9933">Volume of loans above 30 days&nbsp; in arrears</td>
              <td bordercolor="#FF9933"><input name="textfield7" type="text" id="textfield7" size="10" /></td>
              <td bordercolor="#FF9933"><input name="textfield24" type="text" id="textfield24" size="10" /></td>
              <td bordercolor="#FF9933"><input name="textfield25" type="text" id="textfield25" size="10" /></td>
              <td bordercolor="#FF9933" bgcolor="#FFFFFF"><input name="textfield40" type="text" id="textfield40" size="10" /></td>
            </tr>

            <tr>
              <td bordercolor="#FF9933">8</td>
              <td bordercolor="#FF9933">Level of savings at the beginning of the  program.</td>
              <td bordercolor="#FF9933"><input name="textfield10" type="text" id="textfield10" size="10" /></td>
              <td bordercolor="#FF9933"><input name="textfield30" type="text" id="textfield30" size="10" /></td>
              <td bordercolor="#FF9933"><input name="textfield31" type="text" id="textfield31" size="10" /></td>
              <td bordercolor="#FF9933" bgcolor="#FFFFFF"><input name="textfield43" type="text" id="textfield43" size="10" /></td>
            </tr>
            <tr>
              <td bordercolor="#FF9933">9</td>
              <td bordercolor="#FF9933">Level of savings at the end of the reporting  period</td>
              <td bordercolor="#FF9933"><input name="textfield11" type="text" id="textfield11" size="10" /></td>
              <td bordercolor="#FF9933"><input name="textfield32" type="text" id="textfield32" size="10" /></td>
              <td bordercolor="#FF9933"><input name="textfield33" type="text" id="textfield33" size="10" /></td>
              <td bordercolor="#FF9933" bgcolor="#FFFFFF"><input name="textfield44" type="text" id="textfield44" size="10" /></td>
            </tr>


          </table> 
          </fieldset>
              <fieldset>
              <legend class="green_field">Financial Services Outreach</legend>
              <table width="86%" border="0" id="service">
                <tr>
                  <td width="6%" class="selections"></td>
                  <td width="82%" class="selections">               </td>
                  <td width="12%" class="selections"><strong>Total</strong></td>
                </tr>
                <tr>
                  <td>1</td>
                  <td>Number of new branches               </td>
                  <td><input name="textfield8" type="text" id="textfield8" size="10" /></td>
                </tr>
				 <tr>
                  <td>2</td>
                  <td>No. of new accounts</td>
                  <td><input name="textfield26" type="text" id="textfield26" size="10" /></td>
                </tr>
                <tr>
                  <td>3</td>
                  <td>Type and number  of branchless delivery   mechanisms</td>
               
                </tr>
				<tr><td align="right">a)</td>
				<td>Type #1 Point of sale</td>
				<td><input name="textfield26" type="text" id="textfield26" size="10" /></td>
				
				</tr>
				<tr><td align="right">b)</td>
				<td> Type #2 Mobile banks</td>
				<td><input name="textfield26" type="text" id="textfield26" size="10" /></td>
				
				</tr>
				<tr><td align="right">c)</td>
				<td>Type #3</td>
				<td><input name="textfield26" type="text" id="textfield26" size="10" /></td>
				
				</tr>
               
               
                <tr>
                  <td>4</td>
                  <td>Type and number of risks management instruments used</td>
                </tr>
								  <tr><td align="right">a)</td><td>Risk #1</td><td><input name="textfield26" type="text" id="textfield26" size="10" /></td>
				
				</tr>
                <tr>
				<tr><td align="right">b)</td><td>Risk  #2</td><td><input name="textfield26" type="text" id="textfield26" size="10" /></td>
				
				</tr>
                <tr>
				<tr><td align="right">c)</td><td>Risk  #3</td><td><input name="textfield26" type="text" id="textfield26" size="10" /></td>
				
				</tr>
								  
                <tr>
                  <td>5</td>
                  <td>Type and number of new&nbsp; products developed</td>
                                </tr>
								<tr><td align="right">a)</td><td>Product #1</td><td><input name="textfield26" type="text" id="textfield26" size="10" /></td>
				
				</tr>
                <tr>
				<tr><td align="right">b)</td><td>Product #2</td><td><input name="textfield26" type="text" id="textfield26" size="10" /></td>
				
				</tr>
                <tr>
				<tr><td align="right">c)</td><td>Product #3</td><td><input name="textfield26" type="text" id="textfield26" size="10" /></td>
				
				</tr>
              </table>
              <p>&nbsp;</p>
              <p>&nbsp;</p>
              </fieldset>
			  <?php
			  if($_SESSION['role']=="aBi"){
			  
			   ?>
			  
			  
              <fieldset style="display:inline">
			  
			
              <legend class="green_field">Financial Services Management</legend>
              <table width="89%" border="0" id="mgt">
                <tr>
                  <td class="selections">&nbsp;</td>
                  <td class="selections">&nbsp;</td>
                  <td class="selections">Total</td>
                </tr>
                
                <tr>
                  <td width="6%">1</td>
                  <td width="72%">No. of  partner Finacial Institutions which signed Memorandum of Understanding (MOU)</td>
                  <td width="22%"><input name="textfield29" type="text" id="textfield29" size="10" /></td>
                </tr>
                <tr>
                  <td>2</td>
                  <td>No. of Financial Institutions awarded grants.</td>
                  <td><input name="textfield41" type="text" id="textfield41" size="10" /></td>
                </tr>
                <tr>
                  <td>3</td>
                  <td>Amount of  grants awarded (Ug shs)</td>
                  <td><input name="textfield46" type="text" id="textfield46" size="10" /></td>
                </tr>
                <tr>
                  <td>4</td>
                  <td>No. of BDS  providers trained</td>
                  <td><input name="textfield47" type="text" id="textfield47" size="10" /></td>
                </tr>
                <tr>
                  <td>5</td>
                  <td>No of Finacial Institutions  approved to receive Line of Credit</td>
                  <td><input name="textfield48" type="text" id="textfield48" size="10" /></td>
                </tr>
                <tr>
                  <td>6</td>
                  <td>No of No. of bankable borrowers linked to Financial Institutions                                 </td>
                  <td><input name="textfield49" type="text" id="textfield49" size="10" /></td>
                </tr>
                <tr>
                  <td>7</td>
                  <td>No. of  risk management instruments and strategies developed</td>
                  <td><input name="textfield50" type="text" id="textfield50" size="10" /></td>
                </tr>
                <tr>
                  <td>8</td>
                  <td>Leverage targets(%)</td>
                  <td><input name="textfield51" type="text" id="textfield51" size="10" /></td>
                </tr>
                <tr>
                  <td>9</td>
                  <td>Actual leverage achieved (%)</td>
                  <td><input name="textfield52" type="text" id="textfield52" size="10" /></td>
                </tr>
                <tr>
                  <td>10</td>
                  <td>Agribusiness/banks guaranteed to raise bonds</td>
                  <td><input name="textfield53" type="text" id="textfield53" size="10" /></td>
                </tr>
                <tr>
                  <td>11</td>
                  <td>Amount of  equity/bond guarantee committed</td>
                  <td><input name="textfield54" type="text" id="textfield54" size="10" /></td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                </tr>
              </table>
        
              </fieldset><?php }else{
			  
			  
			  
			  } ?>
            
         <table width="100%" border="0">
                <tr>
                  <td width="12%">&nbsp;</td>
                  <td width="12%">&nbsp;</td>
                  <td width="69%">&nbsp;</td>
                  <td width="7%"><input type="submit" name="save" id="save" value="Save" /></td>
                </tr>
              </table>
          
          </td>
  </tr>
</table>

<table width="880" border="0" align="center">
  <tr>
    <td><?phprequire_once('connections/footer.php'); ?> </td>
    </tr>
</table></td>
  </tr>
</table>

</td>
  </tr>
</table>
</div>
</body>
</html>
