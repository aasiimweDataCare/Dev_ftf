<?php
//require_once('lib_sunrise.php');

class InputField{
 var $query;
 var $role;
function InputField($query){
$this->query;
}


function OpenTable($id,$class,$data="",$width=""){
 	$data.="<table class=".$class." id=".$id." width=".$width." >";
	return $data;
}


function CloseTable($data=""){
 	$data.="</table>";
	return $data;
}



function OpenTR($class,$data=""){
 	$data.="<tr class=".$class." >";
	return $data;
}


function CloseTR($data=""){
 	$data.="</tr>";
	return $data;
}


function OpenTD($fieldname,$value,$data=""){
 	$data.="</table>";
	return $data;
}


function edit_txtFieldArray($fieldname,$value,$class='combobox2'){
 $data.="<input type='text' name='".$fieldname."[]' id='$fieldname'  class='$class' value='".$value."'  >";
return $data;
}

function add_txtFieldArray($fieldname,$value,$class='combobox2'){
 $data.="<input type='text' name='".$fieldname."[]' id='$fieldname'  class='$class' value='".$value."'  >";
return $data;
}


function edit_txtFieldPasswordArray($fieldname,$value,$class='combobox2'){
 $data.="<input type='password' name='".$fieldname."[]' id='$fieldname'  class='$class' value='".$value."'  >";
return $data;
}


function edit_txtField($fieldname,$value,$class='combobox2'){
 $data.="<input type='text' name='$fieldname' id='$fieldname'  class='$class' value='".$value."'  >";
return $data;
}



function add_txtField($fieldname,$class='combobox2'){
 $data.="<input type='text' name='$fieldname' id='$fieldname'  class='$class' value=''  >";
return $data;
}


function add_txtarea($fieldname,$class='combobox2'){
 $data.="<textarea name='$fieldname' id='$fieldname' cols='80' rows='5' class='$class'></textarea>";
return $data;
}


function edit_txtarea($fieldname,$value,$class='combobox2'){
 $data.="<textarea name='$fieldname' id='$fieldname' cols='80' rows='5' class='$class'>".$value."</textarea>";
return $data;
}

function AddLabel($value,$data=""){
 $data.=$value;
return $data;
}

 

//end of class IndicatorMapping();

} 

//}


?>