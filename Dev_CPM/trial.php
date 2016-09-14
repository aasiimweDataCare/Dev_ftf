<?php
$partnerId=22;
$partnerType='Trader';
$nameMiddleChainValueActor='Apollo(256)';

switch(true){
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
list($id,$type)=$myVarsArray;

echo "partnerId=".$id."<br/>";
echo "partnerType=".$type."<br/>";