<?php


//require_once('functions.php');


function funct_dropDown($tblName, $colSelect, $colId, $colOrderBy){
		$data = "<option value=''>-Select-</option>";
		$qry = mysql_query(" select ".$colId.", ".$colSelect."
							 from ".$tblName." 
							 order by ".$colOrderBy)or die(http("LIB-973"));
		while($res = mysql_fetch_array($qry)){
			$data.= "<option value=\"".$res[$colId]."\">".substr($res[$colSelect],0,100)."</option>";
		}
		return $data;
	}
	function selectandDelete_all($colspan,$function_name,$form_name,$unique_column,$table_name){
//

//onclick=\"xajax_delete_data(xajax.getFormValues('programme'),'prog_id','tbl_programme');return false;\"
$data.="<tr  class='evenrow'>
     
    <td colspan='$colspan'><input type='button'  id='button' onclick=\"multiCheckBox('checked');return false;\" value='check all' /> |<input type='button'  id='button' onclick=\"multiCheckBox('');\" value='uncheck all' /> | <input type='button'  id='button' TITLE='Edit'  onclick=\"xajax_$function_name(xajax.getFormValues('".$form_name."'));return false;\" value='edit' />| <input type='button' class='formButtonRed'   TITLE='Delete' onclick=\"ConfirmDeletion(xajax.getFormValues('".$form_name."'),'".$unique_column."','".$table_name."');return false;\"  value='Delete' class='redhdrs' /></td>";
return $data;
}

 function loop_key($unique_column,$column_namevalue){
 //$events2="onmouseup=\"this.style.backgroundColor='#999999';\"";
#$object->addAlert($div);
	 //$color=$n%2==1?"evenrow3":"white1";
		$data.="<td align=left><INPUT type=hidden name='loopkey[]'  id='loopkey' value='1' >
 <INPUT type='checkbox' name='".$unique_column."[]'   id='".$unique_column."' value='".$column_namevalue."' ></td>
";

return $data;
} 


	
//------------end of pagination class




 ?>
