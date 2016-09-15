<?php
$partner_string='Nyakyera - Rukoni ACE |T-287';

//check if trader

switch(true){
	case(strpos($partner_string,'|T-')):
	$partnerType='Trader';
	$partner_id=get_string_part($partner_string,'-',' ');
	break;

	default:
	$partnerType='Unknown';
	$partner_id='Unknown';
	break;

}

function get_string_part($string, $starting_part, $ending_part){
		$string = " ".$string;
		$initial = strpos($string,$starting_part);
		if ($initial == 0) return "";
		$initial += strlen($starting_part);
		$length = strpos($string,$ending_part,$initial) - $initial;
		return substr($string,$initial,$length);
	}


/*switch(true){
			case(($partnerId !== '') and ($partnerType !== '') and ($nameMiddleChainValueActor !== '')):
			$partner_id=$partnerId;
			$partner_type=$partnerType;
			break;

			case( (is_null($partnerId)) and ($nameMiddleChainValueActor !=='') and ((strpos($nameMiddleChainValueActor, '(') !== false))):
			$partner_id=$partnerId;
			$partner_type=$partnerType;
			break;

			default:
			break;

		}

$myVarsArray=array($partner_id,$partner_type);
list($id,$type)=$myVarsArray;*/

echo "partnerId=".$partner_id."<br/>";
echo "partnerType=".$partnerType."<br/>";