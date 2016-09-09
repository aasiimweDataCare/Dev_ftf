<?php
session_start();
require_once('connections/lib_connect.php');
require_once('./xajax_0.5/xajax_core/xajax.inc.php');
require_once('filters.php');


$xajax = new xajax();
$xajax->setFlag('debug',false);

#registering functions
#************************
$xajax->register(XAJAX_FUNCTION,'factSheet');




#************************************************

function factSheet($argOne,$argTwo,$argThree){
    
    
$obj=new xajaxResponse();

$qmobj= new QueryManager('');
$fcobj= new DataFactSheet('');

if($_SESSION['user_id']==''){
$obj->redirect('index.php');
return $obj;
}

$inc=1;



$data.="<form  name='factSheet' id='factSheet' method='post' action='".$PHP_SELF."'>";

$data.="<table width='100%' cellspacing='1' cellpadding='1'>";
$data.="<tr><th colspan='49' >
<center>Data Fact Sheet Report for the Year ".date('Y')."<em>, M=Male,F=Female & Y=Youth</em></center>
</th></tr>";
          $data.="<tr>";
            $data.="<th rowspan='4'></th>";
            $arrayRegion=array('North','West','East','Central');
            foreach ($arrayRegion as $region) {
            $data.="<th colspan='12'>".$region."</th>";
            }
            
          $data.="</tr>";
          
          $data.="<tr>";
          
          for($i=1;$i<=4;$i++){
            $arrayCrops=array('Coffee','Maize','Beans');
            foreach ($arrayCrops as $crop) {
            $data.="<th colspan='4'>".$crop."</th>";
            }
          }
          $data.="</tr>";
          $data.="<tr>";
            for($i=1;$i<=12;$i++){
            $arraySex=array('M','F');
            foreach ($arraySex as $sex) {
            $data.="<th rowspan='2'>".$sex."</th>";
            }
            $data.="<th colspan='2'>Y</th>";
          }
          $data.="</tr>";
          
          
          $data.="<tr>";
            for($i=1;$i<=12;$i++){
            $arraySexYouth=array('M','F');
            foreach ($arraySexYouth as $s) {
            $data.="<th>".$s."</th>";
            }
          }
          $data.="</tr>";
          $data.="<tr class='evenrow'>";
            $data.="<td><strong>Traders:</strong></td>";
            //---------------for the values in the first row
            $z=1;
            for($x=1; $x<=48; $x++){
            $data.="<td align='right'>".number_format($fcobj->FactSheetResult($x,'row'.$z.'Result'.$x.''),0)."</td>";    
            }
            //---------------End of Display for the first row
          $data.="</tr>
          <tr class='evenrow'>";
            $data.="<td colspan='49'></td>";
          $data.="</tr>";
          $data.="<tr class='white1'>";
            $data.="<td><strong>Village Agents:</strong></td>";
            
            //================row 2=============
            $i=48;
            $y=2;
            do
              {
              $i++;
              
              $data.="<td align='right'>".number_format($fcobj->FactSheetResult($i,'row'.$y.'Result'.$i.''),0)."</td>";
              
              }
            while ($i<96);
            
            //============End row 2=================
            
            
                        
          $data.="</tr>";
          
          $data.="<tr class='evenrow'>
            <td colspan='49'></td>
          </tr>";
          
          $data.="<tr class='evenrow'>
            <td><strong>Farmers:</strong></td>";
        //================row 3=============
            $w=3;
            $i=96;
            do
              {
              $i++;
              
              //$data.="<td>".$i."</td>";
              $data.="<td align='right'>".number_format($fcobj->FactSheetResult($i,'row'.$w.'Result'.$i.''),0)."</td>";
              
              }
            while ($i<144);
            
        //============End row 3=================
          $data.="</tr>";
          $data.="<tr class='evenrow'>";
            $data.="<td colspan='49'></td>";
          $data.="</tr>";
          $data.="<tr class='white1'><td><strong>New technologies or management practices applied by farmers:</strong></td>";
              
        //================row 4=============
            $r=4;
            $lastRow=144;
            $v=1;
            
            do
              {
              $v++;
              $y=$v-1;
              $var=($y>1 ? ($var+3) : $y);
              $pos1r=($var+$lastRow);
              //$data.="<td>".$pos1r."</td>";
              $data.="<td align='right'>".number_format($fcobj->FactSheetResult($pos1r,'row'.$r.'Result'.$var.''),0)."</td>";
              
              
              $var2=($v>2 ? ($var2+3) : $v);
              $pos2r=($var2+$lastRow);
              //$data.="<td>".$pos2r."</td>";
              $data.="<td align='right'>".number_format($fcobj->FactSheetResult($pos2r,'row'.$r.'Result'.$var2.''),0)."</td>";
              
              $w=$v+1;
              $var3=($w>2 ? ($var3+3) : $w);
              $pos3r=($var3+$lastRow);
             //$data.="<td colspan='2'>".$pos3r."</td>";
              $data.="<td colspan='2' align='right'>".number_format($fcobj->FactSheetResult($pos3r,'row'.$r.'Result'.$var3.''),0)."</td>";
              
              
              }
              
              while ($v<=12);
              
          $data.="</tr>";
          
          $data.="<tr class='evenrow'>
            <td colspan='49'></td>
          </tr>";
          
          $data.="<tr class='evenrow'>
            <td><strong>Hectares under improved technologies or management practices:</strong></td>";
        //================row 5=============
            $w=5;
            $i=180;
            do
              {
              $i++;
              
              //$data.="<td>".$i."</td>";
              $data.="<td align='right'>".number_format($fcobj->FactSheetResult($i,'row'.$w.'Result'.$i.''),0)."</td>";
              
              }
            while ($i<228);
            
          $data.="</tr>";
          
        //================End of row 5=============
          
          $data.="<tr class='evenrow'>
            <td colspan='49'></td>
          </tr>";
          
          $data.="<tr class='white1'>";
            $data.="<td>
            <strong>Inputs sold<i>(In Kgs)</i>:</strong></td>";
        //================row 5=============
       $w=6;$i=228; do {$i++; $data.="<td align='right'>".number_format($fcobj->FactSheetResult($i,'row'.$w.'Result'.$i.''),0)."</td>";}while ($i<276);
       $data.="</tr>";
          
          $data.="<tr class='evenrow'>
            <td colspan='49'></td>
          </tr>";
          
          $data.="<tr>
            <td colspan='49'>";
            $data.="<table width='50%'>";
            
                $data.="<tr>
                    <td colspan='49'><strong>Hectares under promoted technologies:</strong></td>
                  </tr>";
                  
                  $data.="<tr class='white1'>
                    <td rowspan='25'></td>
                    <td rowspan='4'><strong>Improved seed</strong></td>
                    <td colspan='1'>North</td>";
                                $data.="<td align='right'>".number_format($fcobj->FactSheetResult(277,'row7Result277'),2)."</td>";
                                $data.="<td colspan='45'>";
                                $data.="<table>";
                                $data.="<tr>
                                        <td colspan='70'></td>
                                      </tr>";
                                      $data.="</table>";
                                $data.="</td>";
                  $data.="</tr>";
                  
                  $data.="<tr class='evenrow'>
                        <td colspan='1'>West</td>";
                                $data.="<td align='right'>".number_format($fcobj->FactSheetResult(278,'row7Result278'),2)."</td>";
                    $data.="<td colspan='45'></td>";
                  $data.="</tr>";
                  $data.="<tr class='white1'>";
                        $data.="<td colspan='1'>East</td>";
                                $data.="<td align='right'>".number_format($fcobj->FactSheetResult(279,'row7Result279'),2)."</td>";
                    $data.="<td colspan='45'></td>";
                  $data.="</tr>";
                  $data.="<tr class='evenrow'>";
                        $data.="<td colspan='1'>Central</td>";
                                $data.="<td align='right'>".number_format($fcobj->FactSheetResult(280,'row7Result280'),2)."</td>";
                    $data.="<td colspan='45'></td>";
                  $data.="</tr>";
                  $data.="<tr>";
                    $data.="<td colspan='48'></td>";
                  $data.="</tr>";
                  
                  $data.="<tr class='evenrow'>";
                    $data.="<td rowspan='4'><strong>Herbicides</strong></td>";
                    $data.="<td colspan='1'>North</td>";
                                $data.="<td align='right'>".number_format($fcobj->FactSheetResult(281,'row7Result281'),2)."</td>";
                                $data.="<td colspan='45'></td>";
                  $data.="</tr>";
                  $data.="<tr class='white1'>";
                        $data.="<td colspan='1'>West</td>";
                                $data.="<td align='right'>".number_format($fcobj->FactSheetResult(282,'row7Result282'),2)."</td>";
                    $data.="<td colspan='45'></td>";
                  $data.="</tr>";
                  $data.="<tr class='evenrow'>";
                        $data.="<td colspan='1'>East</td>";
                                $data.="<td align='right'>".number_format($fcobj->FactSheetResult(283,'row7Result283'),2)."</td>";
                    $data.="<td colspan='45'></td>";
                  $data.="</tr>";
                  $data.="<tr class='white1'>";
                        $data.="<td colspan='1'>Central</td>";
                                $data.="<td align='right'>".number_format($fcobj->FactSheetResult(284,'row7Result284'),2)."</td>";
                    $data.="<td colspan='45'></td>";
                  $data.="</tr>";
                  $data.="<tr>";
                    $data.="<td colspan='48'></td>";
                  $data.="</tr>";
                  
                  
                  $data.="<tr class='white1'>";
                    $data.="<td rowspan='4'><strong>Pestcides</strong></td>";
                    $data.="<td colspan='1'>North</td>";
                                $data.="<td align='right'>".number_format($fcobj->FactSheetResult(285,'row7Result285'),2)."</td>";
                                $data.="<td colspan='45'></td>";
                  $data.="</tr>";
                  $data.="<tr class='evenrow'>";
                        $data.="<td colspan='1'>West</td>";
                                //$data.="<td colspan='1'></td>";
                                $data.="<td align='right'>".number_format($fcobj->FactSheetResult(286,'row7Result286'),2)."</td>";
                    $data.="<td colspan='45'></td>";
                  $data.="</tr>";
                  $data.="<tr class='white1'>";
                        $data.="<td colspan='1'>East</td>";
                                //$data.="<td colspan='1'></td>";
                                $data.="<td align='right'>".number_format($fcobj->FactSheetResult(287,'row7Result287'),2)."</td>";
                    $data.="<td colspan='45'></td>";
                  $data.="</tr>";
                  $data.="<tr class='evenrow'>";
                        $data.="<td colspan='1'>Central</td>";
                                //$data.="<td colspan='1'></td>";
                                $data.="<td align='right'>".number_format($fcobj->FactSheetResult(288,'row7Result288'),2)."</td>";
                    $data.="<td colspan='45'></td>";
                  $data.="</tr>";
                  $data.="<tr>";
                    $data.="<td colspan='48'></td>";
                  $data.="</tr>";
                  
                  $data.="<tr class='evenrow'>
                    <td rowspan='4'><strong>GAP</strong></td>
                    <td colspan='1'>North</td>
                                <td colspan='1'></td>
                                <td colspan='45'></td>
                  </tr>
                  <tr class='white1'>
                        <td colspan='1'>West</td>
                                <td colspan='1'></td>
                    <td colspan='45'></td>
                  </tr>
                  <tr class='evenrow'>
                        <td colspan='1'>East</td>
                                <td colspan='1'></td>
                    <td colspan='45'></td>
                  </tr>
                  <tr class='white1'>
                        <td colspan='1'>Central</td>
                                <td colspan='1'></td>
                    <td colspan='45'></td>
                  </tr>
                  <tr>
                    <td colspan='48'></td>
                  </tr>
                  
                  <tr class='white1'>
                    <td rowspan='4'><strong>Machinery</strong></td>
                    <td colspan='1'>North</td>
                                <td colspan='1'></td>
                                <td colspan='45'></td>
                  </tr>
                  <tr class='evenrow'>
                        <td colspan='1'>West</td>
                                <td colspan='1'></td>
                    <td colspan='45'></td>
                  </tr>
                  <tr class='white1'>
                        <td colspan='1'>East</td>
                                <td colspan='1'></td>
                    <td colspan='45'></td>
                  </tr>
                  <tr class='evenrow'>
                        <td colspan='1'>Central</td>
                                <td colspan='1'></td>
                    <td colspan='45'></td>
                  </tr>
                  <tr>
                    <td colspan='48'></td>
                  </tr>
                  
                  <tr class='evenrow'>
                    <td colspan='49'></td>
                  </tr>
                  
                  <tr>
                    <td colspan='49'><strong>Labour saving technologies made  available that meet women farmers&#8217; needs made available for transfer:</strong></td>
                  </tr>
                  
                  <tr class='evenrow'>
                    <td rowspan='4'></td>
                    <td>North</td>
                    <td colspan='1'></td>
                                <td colspan='46'></td>
                          </tr>
                  <tr class='white1'>
                    <td>West</td>
                        <td colspan='1'></td>
                                <td colspan='46'></td>
                  </tr>
                  <tr class='evenrow'>
                    <td>East</td>
                        <td colspan='1'></td>
                                <td colspan='46'></td>
                  </tr>
                  <tr class='white1'>
                    <td>Central</td>
                        <td colspan='1'></td>
                                <td colspan='46'></td>
                  </tr>
                  <tr class='evenrow'>
                        <td colspan='48'></td>
                  </tr>
                  
                   <tr class='evenrow'>
                    <td colspan='49'></td>
                  </tr>
                  
                  <tr class='white1'>
                      <td colspan='1'><strong>Planter</strong></td>
                      <td colspan='1'>".number_format($fcobj->FactSheetResult(300,'row7Result300'),2)."</td>
                      <td colspan='1'></td>
                      <td colspan='46'></td>
                  </tr>
                  
                  <tr>
                      <td colspan='1'><strong>Sheller</strong></td>
                      <td colspan='1'>".number_format($fcobj->FactSheetResult(301,'row7Result301'),2)."</td>
                      <td colspan='1'></td>
                      <td colspan='46'></td>
                  </tr>
                  
                  <tr class='white1'>
                      <td colspan='1'><strong>Sprayer</strong></td>
                      <td colspan='1'>".number_format($fcobj->FactSheetResult(302,'row7Result302'),2)."</td>
                      <td colspan='1'></td>
                      <td colspan='46'></td>
                  </tr>
                  
                  <tr class='evenrow'>
                    <td colspan='49'></td>
                  </tr>
                  
                  <tr>
                    <td colspan='49'><strong>Producer Organisations:</strong></td>
                  </tr>
                  
                  <tr class='white1'>
                    <td rowspan='4'></td>
                    <td>North</td>
                    <td colspan='1'>".number_format($fcobj->FactSheetResult(303,'row7Result303'),2)."</td>
                                <td colspan='46'></td>
                          </tr>
                  <tr class='evenrow'>
                    <td>West</td>
                        <td colspan='1'>".number_format($fcobj->FactSheetResult(304,'row7Result304'),2)."</td>
                                <td colspan='46'></td>
                  </tr>
                  <tr class='white1'>
                    <td>East</td>
                        <td colspan='1'>".number_format($fcobj->FactSheetResult(305,'row7Result305'),2)."</td>
                                <td colspan='46'></td>
                  </tr>
                  <tr class='evenrow'>
                    <td>Central</td>
                        <td colspan='1'>".number_format($fcobj->FactSheetResult(306,'row7Result306'),2)."</td>
                                <td colspan='46'></td>
                  </tr>
                  <tr>
                        <td colspan='48'></td>";
                  $data.="</tr>";
            
            $data.="</table>";
            $data.="</td>";
          $data.="</tr>";
          
        $data.="</table>";

$data.="</form>";
        
$obj->assign('bodyDisplay','innerHTML',$data);
$obj->call("hideLoadingDiv"); 
return $obj;


}







 





//$xajax->processRequests();
$xajax->processRequest();

  ?>


<html>
<head>
<?php //$xajax->printJavascript('xajax_0.2.4/'); 

?>

<?php $xajax->printJavascript('xajax_0.5/'); 

?>

<link href="css/style.css" rel="stylesheet" type="text/css" />
<link href="css/loading.css" rel="stylesheet" type="text/css" />
<title><?php heading($_GET['action']); ?></title>
<script type="text/javascript" src="js/number.js"></script>
<script type="text/javascript" src="js/addRow.js" language="javascript"></script>
<script type="text/javascript" src="js/jquery-1.7.1.min.js" language="javascript"></script>
<script type="text/javascript" src="js/loading.js" language="javascript"></script>
<script type="text/javascript" src="js/check.js" language="javascript"></script>
<script type="text/javascript" src="js/popup.js" language="javascript"></script>
<script type="text/javascript" src="js/js.js" language="javascript"></script>
<script type="text/javascript" src="js/limit_text.js" language="javascript"></script>
<script type="text/javascript" src="js/add_upload.js" language="javascript"></script>
</head>

<body>
<div align='center' height='900' id='dvLoading'><span style='font-size:24px; margin-top:50px; font-weight:bold;'>Loading Content...</span></div>
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
    <td width="660" valign="top"  >
    
     <?php title($_GET['linkvar'],$_GET['action']);   ?>
    <div id="bodyDisplay">
      <script language="JavaScript" type="text/javascript">
			
			<?php 
			if(!isset($FunctionName))$FunctionName='';
                        else $FunctionName='';
                        if(!isset($Arguments))$Arguments='';
                        else $Arguments='';
			$linkvar='';
			$linkvar=$_GET['linkvar'];
			$FunctionName=$_GET['FunctionName'];
			$Arguments=$_GET['Arguments'];
			
			switch($_GET['linkvar']){
                            case "Data Fact Sheet": 
                        ?>
                              xajax_factSheet('','','');
                          
                        <?php
                                  
                          break;
                          
                          default:
                                  
                               #underConstruction("Under Construction!");
                                   
                                   }
                              
                        ?>
    </script>
    </div></td>
  </tr>
  <tr>
    <td colspan="2" valign="top"><?php require_once('connections/footer.php'); ?></td>
    </tr>
</table>


</div>
<iframe name="gToday:normal:agenda.js"
        id="gToday:normal:agenda.js"
        src="WeekPicker/ipopeng.htm"
        style="visibility: visible; z-index: 700; position: absolute; top: -500px; left: -700px;"
        frameborder="0" height="178" scrolling="no" width="199"></iframe>
</body>
</html>
