 <?php
$host="localhost";
$name="db_grants";
$user="root";
$pass="craiwrut";
#connection string
@mysql_select_db($name,mysql_connect($host,$user,$pass))or die(mysql_error());
  
//require_once('connections/lib_aBi.php');
  
  if(isset($_POST['submitBtn'])){
   // Edit upload location here
   //$destination_path = getcwd().DIRECTORY_SEPARATOR;
$_SESSION['FileUploaded']='';
if($_FILES['img_file']['name'] != NULL){
			
			@mkdir("upload_dir");
   $destination_path = "upload_dir/";
   $result = 0;
   //$filename=$_FILES['myfile']['name'];
   $img_name = preg_replace("/.+\./", "Document_".$row['relatedlink_id'].".", $_FILES['img_file']['name']);
   $target_path = $destination_path. basename( $_FILES['myfile']['name']);

 
   if(@move_uploaded_file($_FILES['myfile']['tmp_name'], $target_path)) {
      $result = 1;
	
	
	
	//if()
	
		 $sql="  update tbl_connotadv set scau='".$_FILES['myfile']['name']."' where id='".$_POST['id']."'  ";
	 if($query=@mysql_query($sql)) 
	 echo congMsg( $_FILES['myfile']['name'] ." Has been uploaded!");
   }
   else
   
   
   /*if($_FILES['img_file']['name'] != NULL){
			$img_name = preg_replace("/.+\./", "logo_".$row['relatedlink_id'].".", $_FILES['img_file']['name']);
			@mkdir("icons");
			
			if(!move_uploaded_file($_FILES['img_file']['tmp_name'], "icons/".$img_name))
				echo"Could not upload logo!";
			else{
		 $update="update tbl_relatedlinks set logo='".$img_name."' where relatedlink_id='".$row['relatedlink_id']."'";
				$query=mysql_query($update)or die(mysql_error());
				if($query){
				echo"Document Uploaded ".$img_name."    uploaded!";
				//mysql_query("delete from tbl_safari where booking_id='".$_SESSION['booking_id']."' && safari_type='' ");
				echo "<meta http-equiv=Refresh content=3;url='home.php?linkvar=Related Links&&action=Links'>";}
}
			
}*/
    echo errorMsg( $_FILES['myfile']['name'] ."Failed to upload uploaded! Please try again.");
   

  
   sleep(1); 
   


 }
 
 //funtions----------
 
 
 function http($line){
$data="Http Error code $line because,".mysql_error();
return $data;
}


function errorMsg($msg){
# bgcolor='#FFCC99'
$data ="<fieldset><legend><span class='redhdrs'><b>Error</b></span></legend><span class=redhdrs ><table border='0' width=600 style='border-bottom-color:#CC0000; background-color:#FFCC99;'><tr><td><img src='icons/warning_icon.png'>  ".$msg."</td></tr></table></span></fieldset>";
return $data;
}

#DISPLAY notification
function noteMsg($msg){
# bgcolor='#FFCC99'
$data ="<fieldset><legend><span class=''><b>Notification</b></span></legend><span class= ><table border='0' width=600 style='border-bottom-color:#CC0000; background-color:#FFCC99;'><tr><td><img src='icons/warning_icon.png'>  ".$msg."</td></tr></table></span></fieldset>";
return $data;
}
function congMsg($msg){
# bgcolor='#FFCC99'
$data ="<fieldset><legend><span class=''><b>Congratulations</b></span></legend><span class= ><table border='0' width=600 style='border-bottom-color:#ffffff; background-color:#FFffff;'><tr><td><font color=green>  ".$msg."</font></td></tr></table></span></fieldset>";
return $data;
}
 
 ?>
	
	