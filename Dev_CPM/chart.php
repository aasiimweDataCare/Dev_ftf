<?php
session_start();
require_once('connections/lib_connect.php');
#require_once('connections/open-flash-chart.php');
#require_once('chart3.php');
$id=$_GET['indicator_id'];
?>
<html>
<head>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link href="css/style.css" rel="stylesheet" type="text/css" />

<title><?php heading($_GET['action']); ?></title>

<script type="text/javascript" src="js/check.js" language="javascript"></script>
<script type="text/javascript" src="js/popup.js" language="javascript"></script>

</head>

<body>

<table width="870" border="0" align="center" id="content_" >
  <tr>
    <td colspan="2" valign="top"><?php require_once('connections/header.php'); ?>
      </td>
        </tr>
  <tr>
    <td width="190" valign="top"><table width="190" border="0" >
      <tr>
        <td valign="top" align="left"><?php require_once('connections/left_links.php'); ?></td>
      </tr>
    </table></td>
    <td width="660" valign="top"  ><div id="title">
  <?php   $action="Dashboard";
       $linkvar=" View Dashboard";
      title($linkvar,$action);?> <div style='float:right;'><a href='print_charts.php?indicator_id=<?php echo($id); ?> title='Print Charts' target='_blank'><input name='print' type='button' value='Print Version'></a></div>
    </div>
	<div id='bodyDisplay'> <?php

#"&indicator_name=".$_GET['indicator_name']."&title=".$_SESSION['title'].
$_SESSION['title1']=$_GET['title'];
$url="chart3.php?indicator_id=".$_GET['indicator_id']."";
open_flash_chart_object( 600, 400, $url, false );
function open_flash_chart_object_str( $width, $height, $url, $use_swfobject=true, $base='' )
{
    //
    // return the HTML as a string
    //
    return _ofc( $width, $height, $url, $use_swfobject, $base );
}

function open_flash_chart_object( $width, $height, $url, $use_swfobject=true, $base='' )
{
    //
    // stream the HTML into the page
    //
    echo _ofc( $width, $height, $url, $use_swfobject, $base );
}

function _ofc( $width, $height, $url, $use_swfobject, $base )
{
    //
    // I think we may use swfobject for all browsers,
    // not JUST for IE...
    //
    //$ie = strstr(getenv('HTTP_USER_AGENT'), 'MSIE');
    
    //
    // escape the & and stuff:
    //
    $url = urlencode($url);
    
    //
    // output buffer
    //
    $out = array();
    
    //
    // check for http or https:
    //
    if (isset ($_SERVER['HTTPS']))
    {
        if (strtoupper ($_SERVER['HTTPS']) == 'ON')
        {
            $protocol = 'https';
        }
        else
        {
            $protocol = 'http';
        }
    }
    else
    {
        $protocol = 'http';
    }
    
    //
    // if there are more than one charts on the
    // page, give each a different ID
    //
    global $open_flash_chart_seqno;
    $obj_id = 'chart';
    $div_name = 'flashcontent';
    
    /*$out[] = '<script type="text/javascript" src="'. $base .'js/ofc.js"></script>';*/
    
    if( !isset( $open_flash_chart_seqno ) )
    {
        $open_flash_chart_seqno = 1;
        $out[] = '<script type="text/javascript" src="'. $base .'js/swfobject.js"></script>';
    }
    else
    {
        $open_flash_chart_seqno++;
        $obj_id .= '_'. $open_flash_chart_seqno;
        $div_name .= '_'. $open_flash_chart_seqno;
    }
    
    if( $use_swfobject )
    {
	// Using library for auto-enabling Flash object on IE, disabled-Javascript proof  
    $out[] = '<div id="'. $div_name .'"></div>';
	$out[] = '<script type="text/javascript">';
	$out[] = 'var so = new SWFObject("'. $base .'open-flash-chart.swf", "'. $obj_id .'", "'. $width . '", "' . $height . '", "9", "#FFFFFF");';
	//$out[] = 'so.addVariable("width", "' . $width . '");';
	//$out[] = 'so.addVariable("height", "' . $height . '");';
	$out[] = 'so.addVariable("data", "'. $url . '");';
	$out[] = 'so.addParam("allowScriptAccess", "sameDomain");';
	$out[] = 'so.write("'. $div_name .'");';
	$out[] = '</script>';
	$out[] = '<noscript>';
    }

    $out[] = '<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="' . $protocol . '://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=8,0,0,0" ';
    $out[] = 'width="' . $width . '" height="' . $height . '" id="ie_'. $obj_id .'" align="middle">';
    $out[] = '<param name="allowScriptAccess" value="sameDomain" />';
    $out[] = '<param name="movie" value="'. $base .'open-flash-chart.swf?width='. $width .'&height='. $height . '&data='. $url .'" />';
    $out[] = '<param name="quality" value="high" />';
    $out[] = '<param name="bgcolor" value="#FFFFFF" />';
    $out[] = '<embed src="'. $base .'open-flash-chart.swf?data=' . $url .'" quality="high" bgcolor="#FFFFFF" width="'. $width .'" height="'. $height .'" name="'. $obj_id .'" align="middle" allowScriptAccess="sameDomain" ';
    $out[] = 'type="application/x-shockwave-flash" pluginspage="' . $protocol . '://www.macromedia.com/go/getflashplayer" id="'. $obj_id .'"/>';
    $out[] = '</object>';

    if ( $use_swfobject ) {
	$out[] = '</noscript>';
    }
    
    return implode("\n",$out);
}
 view_graphDetails($_GET['indicator_id']);

function view_graphDetails($indicator_id){
$data="<table width='100%' border='0' align='center'>
 <tr class='evenrow2'>
    <td>NO</td>
	<td>YEAR</td>
	<td>INDICATOR</td>
	<td>TARGET</td>
	<td>ACTUAL</td>
	<td>(%) ACHIEVED</td>
  </tr>";
  $n=1; $inc=1;
$sql=mysql_query("select * from view_dashboard where indicator_id='".$indicator_id."'")or die(http(0156));
while($row=mysql_fetch_array($sql)){
$color=($inc%2==1)?"evenrow":"white1";
$data.="<tr class='".$color."'>
    <td>".$n++."</td>
	<td>".$row['year']."</td>
	<td>".$row['indicator_name']."</td>
	<td>".$row['target']."</td>
	<td>".$row['actual']."</td>
	<td>".$row['percentageAchieved']."%</td>
	
  </tr>";
  $inc++;
  }

$data.="</table>
";








echo($data);
}


#--------------------------------
/* 
$data_1 = array();
$data_2 = array();
$data_3 = array();
$data_4 = array();
 echo $sql="select indicator_id,indicator_name,year,target,actual,percentageAchieved from view_dashboard where indicator_id='".trim($id)."' order by year asc";
$sqlQRY = mysql_query($sql)or die(http(0098));
			while($row = mysql_fetch_array($sqlQRY)){
			
			$data_1[] = $row['target'];
			$data_2[] = $row['actual'];
			$data_3[] = $row['percentageAchieved'];
			$data_4[] = $row['year'];
			#$data_5[] = $row['indicator_name'];	
			
			#$yMax = max( array( max( $data_1 ), max( $data_2 ), max( $data_3 ) )); 
				$cTr++;
			}

 
 $yMax = max( array( max( $data_1 ), max( $data_2 ), max( $data_3 ) )); 
//create the chart:
$g = new graph();
$g->title( 'Annual Performance: No. of  BDS providers contracted', '{font-size: 15px; color: #800000}' );

$g->set_data( $data_1 );
$g->bar( 50, '#9933CC', 'Purple Bar', 10 );

$g->set_data( $data_2 );
$g->bar( 50, '#339966', 'Green Bar', 10 );
 
$g->set_data( $data_3 );
$g->line_dot( 3, 5, '#CC3399', 'Line', 10 );    // <-- 3px thick + dots

$g->set_x_labels($data_4);
#$g->set_x_label_style( $data_4, '#9933CC',2 );
$g->set_y_max( $yMax );
$g->y_label_steps( 5 );
$g->set_y_legend( 'Number', 12, '#736AFF' );
echo $g->render();  */ 
#----------------------------------
?>
</div>
    </td>
  </tr>
  <tr>
    <td colspan="2" valign="top"> <?php require_once('connections/footer.php'); ?></td>
    </tr>
</table>

</td>
  </tr>
</table>

</div>
</body>
</html>


