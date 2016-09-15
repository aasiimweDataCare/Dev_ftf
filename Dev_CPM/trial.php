<?php
$partnerString='ANKOLE COFFEE PROCESORS |EXP-13';

function form2getPartnerTypeAndIdFromString($partner_string){
		switch(true){
			case(strpos($partner_string,'|EXP-')):
			$partnerType='Exporter';
			$partner_id=trim(substr($partner_string,((strpos($partner_string,'|EXP-'))+(count('|EXP-')*5)),200));
			break;

			case(strpos($partner_string,'|T-')):
			$partnerType='Trader';
			$partner_id=trim(substr($partner_string,((strpos($partner_string,'|T-'))+(count('|T-')*3)),200));
			break;

			case(strpos($partner_string,'|V.A-')):
			$partnerType='VillageAgent';
			$partner_id=trim(substr($partner_string,((strpos($partner_string,'|V.A-'))+(count('|V.A-')*5)),200));
			break;

			default:
			break;

		}

	return array($partner_id,$partnerType);
}

list($partnerId,$partnerType)=form2getPartnerTypeAndIdFromString($partnerString);

echo "partnerId=".$partnerId."<br/>";
echo "partnerType=".$partnerType."<br/>";