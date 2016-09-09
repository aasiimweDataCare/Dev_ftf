<?php
require_once('connections/lib_connect.php');
require_once('./xajax_0.2.4/xajax.inc.php');
require_once('functions.php');
//require_once('organization.php');
$xajax = new xajax();
$xajax->errorHandlerOn();

#xajax register function


#xajax register





$xajax->processRequests();

  ?>


<html>
<head>
<?php $xajax->printJavascript('xajax_0.2.4/'); 

?>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link href="css/style.css" rel="stylesheet" type="text/css" />
<title>aBi Trust:Documents</title>
</head>

<body>

<table width="100%" border="0" align="center" id="container_table">
  <tr>
    <td width="927">
<table width="880" border="0" align="center"  >
  <tr>
    <td><?php #require_once('connections/header.html'); ?></td>
  </tr>
</table><table width="870" border="0" align="center" id="content_" >
  <tr>
    <td width="190" valign="top"><table width="190" border="0" >
      <tr>
        <td valign="top" align="left"><?php #require_once('connections/left_links.php'); ?></td>
            </tr>
      </table></td>
          <td width="660" valign="top"  >
          <table width='600' border='0' align='center' cellpadding='3' cellspacing='0' style='font-family:arial;font-size:12px;'>
            <tr height='10'>
              <td valign='top'><font color='#ff6600' class="darklink">Help &raquo; Documents</font><br /></td>
            </tr>
            <tr height='10'>
              <td valign='top'><hr /></td>
            </tr>
            <tr height='10'>
              <td valign='top'><table width='600' border='0' cellspacing='0' style='border-right:1px solid #d6dff7;border-left:1px solid #d6dff7;border-bottom:1px solid #d6dff7;'>
                  <tr height='25' style='font-weight:bold;' bgcolor='#e6e6e6'>
                    <td width='50' class="evenrow">No.</td>
                    <td class="evenrow">Document Name</td>
                  </tr>
                  <tr height='25' bgcolor='#ffffff'>
                    <td width='50'>1.</td>
                    <td><a href="docs/Valuechaindevelopment.pdf" target='_blank' class="darklink">Value chain Development </a></td>
                  </tr>
                  <tr height='25' bgcolor='#e6e6e6'>
                    <td width='50' class="evenrow">2.</td>
                    <td class="evenrow"><p><a href="docs/pmf.pdf" target='_blank' class="darklink">Perfomance Management Framework.</a></p></td>
                  </tr>
                  <tr height='25' bgcolor='#e6e6e6'>
                    <td bgcolor="#FFFFFF">3</td>
                    <td bgcolor="#FFFFFF"><a href="Indicatorsdefinitions.pdf" class="darklink">Indicator Definitions</a></td>
                  </tr>
                  <tr height='25' bgcolor='#e6e6e6'>
                    <td bgcolor="#CCCCCC" class="evenrow">4</td>
                    <td bgcolor="#CCCCCC" class="evenrow"><a href="user_manual.pdf" class="darklink">User Manual </a></td>
                  </tr>
              </table></td>
            </tr>
          </table></td>
        </tr>
</table>

<table width="880" border="0" align="center">
  <tr>
    <td><?php #require_once('connections/footer.php'); ?> </td>
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
