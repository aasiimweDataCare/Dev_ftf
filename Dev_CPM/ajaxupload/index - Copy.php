<?php 

# DATABASE Connection String
//require_once('./connections/lib_aBi.php');
if($_GET['table_name']!="")$_SESSION['table_name']=$_GET['table_name'];

if($_GET['id']!="")$_SESSION['ConceptID']=$_GET['id'];
 $_SESSION['ConceptID'];
/* if(isset($_POST['submitBtn'])){
if($_FILES['myfile']['name']<>NULL){ */
  //echo $sql="update tbl_connotadv set scau='".$_FILES['myfile']['name']."' where id='".$_GET['id']."'";

//}

//}

/* function http($line){
$data="Http Error code $line because,".mysql_error();
return $data;
} */
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
   <title>Grants File Uploader</title>
    <link href="./css/abi.css" rel="stylesheet" type="text/css" />
    <link href="style/style.css" rel="stylesheet" type="text/css" />
   
<script language="javascript" type="text/javascript">
<!--
 function startUpload(){
      document.getElementById('f1_upload_process').style.visibility = 'visible';
      document.getElementById('f1_upload_form').style.visibility = 'hidden';
      return true;
}

function stopUpload(success){
      var result = '';
	 // var path=form.myfile.value;
	  alert(filename);
      if (success == 1){
         result = '<span class="msg">The file was uploaded successfully!<\/span><br/><br/>';
	
      }
      else {
         result = '<span class="emsg">There was an error during file upload!<\/span><br/><br/>';
      }
      document.getElementById('f1_upload_process').style.visibility = 'hidden';
      document.getElementById('f1_upload_form').innerHTML = result + '<label>File: <input name="myfile" type="file" size="30" /><\/label><label><input type="submit" name="submitBtn" class="sbtn" value="Upload" /><\/label>';
      document.getElementById('f1_upload_form').style.visibility = 'visible';      
      return true;   
}  
//-->
</script>   
</head>

<body bgcolor="">
       <div id="container">
            <div id="header"><div id="header_left"></div>
            <div id="header_main">Grants File Uploader</div><div id="header_right"></div></div>
            <div id="content">
                <form action="upload.php" method="post" enctype="multipart/form-data"  onsubmit="startUpload();" >
                     <p id="f1_upload_process">Loading...<br/><img src="loader.gif" /><br/></p>
                     <p id="f1_upload_form" align="center"><br/>
         
                         <label>File:  
                              <input name="myfile" type="file" class="evenrow" size="30" />
                              <input name="id" type="hidden" class="evenrow" value="<?php echo $_GET['id'];  ?>" size="30" />
                         </label>
                         <label>
                             <input type="submit" name="submitBtn" class="sbtn" value="Upload" />
                         </label>
                         
                     </p>
                  
                   </form>
             </div>
             <div id="footer"><a href="http://www.dcareug.com" target="_blank">Powered by Data Care (U)</a> Ltd.</div>
</div>
                 
</body>


  <?php

 
 

 
/*  
 function update_table($fileName,$Id){
if(($fileName<>NULL)&& $Id<>NULL){
 echo $sql="update tbl_connotadv set scau='".fileName."' where id='".$Id."'";
	 @mysql_query($sql)or die(http("APL-0015"));
 } 
 } */
 ?>