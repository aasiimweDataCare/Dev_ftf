<?php

/**
 * Created by PhpStorm.
 * User: aasiimwe
 * Date: 1/11/2016
 * Time: 3:52 PM
 */
class Dashindicatornine_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    function Indicator9north()
    {
        $this->db->select("sum( if(`p`.`reportingPeriod` in ('Apr - Sep') and `p`.`year` in (2013), p.valueTotal, 0 ) ) AS North2013,
						sum( if(`p`.`reportingPeriod` in ('Oct - Mar','Apr - Sep') and `p`.`reportingMonth` between ('2013-10-01') and ('2014-09-30') and `p`.`year` in (2013,2014), p.valueTotal, 0 ) ) AS North2014,

						sum( if(`p`.`reportingPeriod` in ('Oct - Mar','Apr - Sep') and `p`.`reportingMonth` between ('2014-10-01') and ('2015-09-30') and `p`.`year` in (2014,2015), p.valueTotal, 0 ) ) AS North2015,

						sum( if(`p`.`reportingPeriod` in ('Oct - Mar','Apr - Sep') and `p`.`reportingMonth` between ('2015-10-01') and ('2016-09-30') and `p`.`DateSubmission` between ('2015-10-01') and ('2016-09-30') and `p`.`year` in (2015,2016), p.valueTotal, 0 ) ) AS North2016,

						sum( if(`p`.`reportingPeriod` in ('Oct - Mar','Apr - Sep') and `p`.`reportingMonth` between ('2016-10-01') and ('2017-09-30') and `p`.`DateSubmission` between ('2016-10-01') and ('2017-09-30') and `p`.`year` in (2016,2017), p.valueTotal, 0 ) ) AS North2017,

						sum( if(`p`.`reportingPeriod` in ('Oct - Mar','Apr - Sep') and `p`.`reportingMonth` between ('2017-10-01') and ('2018-09-30') and `p`.`year` in (2017,2018), p.valueTotal, 0 ) ) AS North2018

						FROM 
						`tbl_public_private_partnership` AS p,
						`tbl_traders` as t,
						`tbl_zone` as z 
						Where p.msmeId = t.tbl_tradersId 
						and p.msmeType='Trader'
						and t.traderRegion = z.zoneCode 
						and z.zoneCode = 2", FALSE);

        $db_rows = $this->db->get();

        if ($db_rows->num_rows() > 0) {
            foreach ($db_rows->result() as $data) {
                $db_data_fetched_array[] = $data;
            }
            return $db_data_fetched_array;
        }
    }

    function Indicator9central()
    {
        $this->db->select("sum( if(`p`.`reportingPeriod` in ('Apr - Sep') and `p`.`year` in (2013), p.valueTotal, 0 ) ) AS Central2013,
							sum( if(`p`.`reportingPeriod` in ('Oct - Mar','Apr - Sep') and `p`.`reportingMonth` between ('2013-10-01') and ('2014-09-30') and `p`.`year` in (2013,2014), p.valueTotal, 0 ) ) AS Central2014,

							sum( if(`p`.`reportingPeriod` in ('Oct - Mar','Apr - Sep') and `p`.`reportingMonth` between ('2014-10-01') and ('2015-09-30') and `p`.`year` in (2014,2015), p.valueTotal, 0 ) ) AS Central2015,

							sum( if(`p`.`reportingPeriod` in ('Oct - Mar','Apr - Sep') and `p`.`reportingMonth` between ('2015-10-01') and ('2016-09-30') and `p`.`DateSubmission` between ('2015-10-01') and ('2016-09-30') and `p`.`year` in (2015,2016), p.valueTotal, 0 ) ) AS Central2016,

							sum( if(`p`.`reportingPeriod` in ('Oct - Mar','Apr - Sep') and `p`.`reportingMonth` between ('2016-10-01') and ('2017-09-30') and `p`.`DateSubmission` between ('2016-10-01') and ('2017-09-30') and `p`.`year` in (2016,2017), p.valueTotal, 0 ) ) AS Central2017,

							sum( if(`p`.`reportingPeriod` in ('Oct - Mar','Apr - Sep') and `p`.`reportingMonth` between ('2017-10-01') and ('2018-09-30') and `p`.`year` in (2017,2018), p.valueTotal, 0 ) ) AS Central2018

							FROM 
							`tbl_public_private_partnership` AS p,
							`tbl_traders` as t,
							`tbl_zone` as z 
							Where p.msmeId = t.tbl_tradersId 
							and p.msmeType='Trader'
							and t.traderRegion = z.zoneCode 
							and z.zoneCode = 1 ", FALSE);

        $db_rows_central = $this->db->get();

        if ($db_rows_central->num_rows() > 0) {
            foreach ($db_rows_central->result() as $data) {
                $db_data_fetched_array[] = $data;
            }
            return $db_data_fetched_array;
        }
    }

    function Indicator9east()
    {
        $this->db->select("sum( if(`p`.`reportingPeriod` in ('Apr - Sep') and `p`.`year` in (2013), p.valueTotal, 0 ) ) AS East2013,
							sum( if(`p`.`reportingPeriod` in ('Oct - Mar','Apr - Sep') and `p`.`reportingMonth` between ('2013-10-01') and ('2014-09-30') and `p`.`year` in (2013,2014), p.valueTotal, 0 ) ) AS East2014,

							sum( if(`p`.`reportingPeriod` in ('Oct - Mar','Apr - Sep') and `p`.`reportingMonth` between ('2014-10-01') and ('2015-09-30') and `p`.`year` in (2014,2015), p.valueTotal, 0 ) ) AS East2015,

							sum( if(`p`.`reportingPeriod` in ('Oct - Mar','Apr - Sep') and `p`.`reportingMonth` between ('2015-10-01') and ('2016-09-30') and `p`.`DateSubmission` between ('2015-10-01') and ('2016-09-30') and `p`.`year` in (2015,2016), p.valueTotal, 0 ) ) AS East2016,

							sum( if(`p`.`reportingPeriod` in ('Oct - Mar','Apr - Sep') and `p`.`reportingMonth` between ('2016-10-01') and ('2017-09-30') and `p`.`DateSubmission` between ('2016-10-01') and ('2017-09-30') and `p`.`year` in (2016,2017), p.valueTotal, 0 ) ) AS East2017,

							sum( if(`p`.`reportingPeriod` in ('Oct - Mar','Apr - Sep') and `p`.`reportingMonth` between ('2017-10-01') and ('2018-09-30') and `p`.`year` in (2017,2018), p.valueTotal, 0 ) ) AS East2018

							FROM 
							`tbl_public_private_partnership` AS p,
							`tbl_traders` as t,
							`tbl_zone` as z 
							Where p.msmeId = t.tbl_tradersId 
							and p.msmeType='Trader'
							and t.traderRegion = z.zoneCode 
							and z.zoneCode = 9 ", FALSE);

        $db_rows_east = $this->db->get();

        if ($db_rows_east->num_rows() > 0) {
            foreach ($db_rows_east->result() as $data) {
                $db_data_fetched_array[] = $data;
            }
            return $db_data_fetched_array;
        }
    }

    function Indicator9west()
    {
        $this->db->select("sum( if(`p`.`reportingPeriod` in ('Apr - Sep') and `p`.`year` in (2013), p.valueTotal, 0 ) ) AS West2013,
					sum( if(`p`.`reportingPeriod` in ('Oct - Mar','Apr - Sep') and `p`.`reportingMonth` between ('2013-10-01') and ('2014-09-30') and `p`.`year` in (2013,2014), p.valueTotal, 0 ) ) AS West2014,

					sum( if(`p`.`reportingPeriod` in ('Oct - Mar','Apr - Sep') and `p`.`reportingMonth` between ('2014-10-01') and ('2015-09-30') and `p`.`year` in (2014,2015), p.valueTotal, 0 ) ) AS West2015,

					sum( if(`p`.`reportingPeriod` in ('Oct - Mar','Apr - Sep') and `p`.`reportingMonth` between ('2015-10-01') and ('2016-09-30') and `p`.`DateSubmission` between ('2015-10-01') and ('2016-09-30') and `p`.`year` in (2015,2016), p.valueTotal, 0 ) ) AS West2016,

					sum( if(`p`.`reportingPeriod` in ('Oct - Mar','Apr - Sep') and `p`.`reportingMonth` between ('2016-10-01') and ('2017-09-30') and `p`.`DateSubmission` between ('2016-10-01') and ('2017-09-30') and `p`.`year` in (2016,2017), p.valueTotal, 0 ) ) AS West2017,

					sum( if(`p`.`reportingPeriod` in ('Oct - Mar','Apr - Sep') and `p`.`reportingMonth` between ('2017-10-01') and ('2018-09-30') and `p`.`year` in (2017,2018), p.valueTotal, 0 ) ) AS West2018

					FROM 
					`tbl_public_private_partnership` AS p,
					`tbl_traders` as t,
					`tbl_zone` as z 
					Where p.msmeId = t.tbl_tradersId 
					and p.msmeType='Trader'
					and t.traderRegion = z.zoneCode 
					and z.zoneCode = 4 ", FALSE);

        $db_rows_west = $this->db->get();

        if ($db_rows_west->num_rows() > 0) {
            foreach ($db_rows_west->result() as $data) {
                $db_data_fetched_array[] = $data;
            }
            return $db_data_fetched_array;
        }
    }

	function Indicator9byregion($resultValue)
	{

		//Enter Technology
		$this->db->select("32 as indicator_id,
								sum( if( `t`.`year` = '2013', `t`.`amountInvestedInTechAdoption`, 0 ) ) AS amountInvested1Yr1,
								sum( if( `t`.`year` = '2014', `t`.`amountInvestedInTechAdoption`, 0 ) ) AS amountInvested1Yr2,
								sum( if( `t`.`year` = '2015', `t`.`amountInvestedInTechAdoption`, 0 ) ) AS amountInvested1Yr3,
								sum( if( `t`.`year` = '2016', `t`.`amountInvestedInTechAdoption`, 0 ) ) AS amountInvested1Yr4,
								sum( if( `t`.`year` = '2017', `t`.`amountInvestedInTechAdoption`, 0 ) ) AS amountInvested1Yr5,
								sum( if( `t`.`year` = '2018', `t`.`amountInvestedInTechAdoption`, 0 ) ) AS amountInvested1Yr6
								FROM `tbl_techadoption` as `t`
								where 32=32", FALSE);

		$db_rows_tech = $this->db->get();

		if ($db_rows_tech->num_rows() > 0) {
			foreach ($db_rows_tech->result() as $data) {
				$db_data_fetched_array_tech[] = $data;
			}

		}

		foreach ($db_data_fetched_array_tech as $row) {
			$amountYr1 = $row->amountInvested1Yr1;
			$amountYr2 = $row->amountInvested1Yr2;
			$amountYr3 = $row->amountInvested1Yr3;
			$amountYr4 = $row->amountInvested1Yr4;
			$amountYr5 = $row->amountInvested1Yr5;
			$amountYr6 = $row->amountInvested1Yr6;

		}


		//Labour Saving Technology
		$this->db->select("32 as indicator_id,
								sum( if( `s`.`year` = '2013', `s`.`amountInvestedOnTechInvestment`, 0 ) ) AS amountInvestedYr1,
								sum( if( `s`.`year` = '2014', `s`.`amountInvestedOnTechInvestment`, 0 ) ) AS amountInvestedYr2,
								sum( if( `s`.`year` = '2015', `s`.`amountInvestedOnTechInvestment`, 0 ) ) AS amountInvestedYr3,
								sum( if( `s`.`year` = '2016', `s`.`amountInvestedOnTechInvestment`, 0 ) ) AS amountInvestedYr4,
								sum( if( `s`.`year` = '2017', `s`.`amountInvestedOnTechInvestment`, 0 ) ) AS amountInvestedYr5,
								sum( if( `s`.`year` = '2018', `s`.`amountInvestedOnTechInvestment`, 0 ) ) AS amountInvestedYr6
								FROM `tbl_laboursavingtech` as `s`
								where 32=32", FALSE);

		$db_rows_labour = $this->db->get();

		if ($db_rows_labour->num_rows() > 0) {
			foreach ($db_rows_labour->result() as $data) {
				$db_data_fetched_array_labour[] = $data;
			}

		}

		foreach ($db_data_fetched_array_labour as $row) {

			$amount2Yr1 = $row->amountInvestedYr1;
			$amount2Yr2 = $row->amountInvestedYr2;
			$amount2Yr3 = $row->amountInvestedYr3;
			$amount2Yr4 = $row->amountInvestedYr4;
			$amount2Yr5 = $row->amountInvestedYr5;
			$amount2Yr6 = $row->amountInvestedYr6;

		}

		//Public private partnership
		$this->db->select("32 as indicator_id,
								sum( if( `p`.`year` = '2013', `p`.`valuePartner`, 0 ) ) AS amountInvestedYr1,
								sum( if( `p`.`year` = '2014', `p`.`valuePartner`, 0 ) ) AS amountInvestedYr2,
								sum( if( `p`.`year` = '2015', `p`.`valuePartner`, 0 ) ) AS amountInvestedYr3,
								sum( if( `p`.`year` = '2016', `p`.`valuePartner`, 0 ) ) AS amountInvestedYr4,
								sum( if( `p`.`year` = '2017', `p`.`valuePartner`, 0 ) ) AS amountInvestedYr5,
								sum( if( `p`.`year` = '2018', `p`.`valuePartner`, 0 ) ) AS amountInvestedYr6
								FROM `tbl_public_private_partnership` as `p`
								where 32=32", FALSE);


		$db_rows_partnership = $this->db->get();

		if ($db_rows_partnership->num_rows() > 0) {
			foreach ($db_rows_partnership->result() as $data) {
				$db_data_fetched_array_partnership[] = $data;
			}

		}

		foreach ($db_data_fetched_array_partnership as $row) {


			$amount3Yr1 = $row->amountInvestedYr1;
			$amount3Yr2 = $row->amountInvestedYr2;
			$amount3Yr3 = $row->amountInvestedYr3;
			$amount3Yr4 = $row->amountInvestedYr4;
			$amount3Yr5 = $row->amountInvestedYr5;
			$amount3Yr6 = $row->amountInvestedYr6;

		}

		//Input Sales
		$this->db->select("32 as indicator_id,
								sum( if( `ij`.`year` = '2013', `ij`.`amountInvestedInSettingUpInputSalesBusiness`, 0 ) ) AS amountInvestedYr1,
								sum( if( `ij`.`year` = '2014', `ij`.`amountInvestedInSettingUpInputSalesBusiness`, 0 ) ) AS amountInvestedYr2,
								sum( if( `ij`.`year` = '2015', `ij`.`amountInvestedInSettingUpInputSalesBusiness`, 0 ) ) AS amountInvestedYr3,
								sum( if( `ij`.`year` = '2016', `ij`.`amountInvestedInSettingUpInputSalesBusiness`, 0 ) ) AS amountInvestedYr4,
								sum( if( `ij`.`year` = '2017', `ij`.`amountInvestedInSettingUpInputSalesBusiness`, 0 ) ) AS amountInvestedYr5,
								sum( if( `ij`.`year` = '2018', `ij`.`amountInvestedInSettingUpInputSalesBusiness`, 0 ) ) AS amountInvestedYr6
								FROM `tbl_input_sales` as `i`
								join `tbl_input_sales_meta_data` as `ij` 
								on `ij`.`input_sales_id`=`i`.`id`
								where 32=32", FALSE);

		$db_rows_sales = $this->db->get();

		if ($db_rows_sales->num_rows() > 0) {
			foreach ($db_rows_sales->result() as $data) {
				$db_data_fetched_array_sales[] = $data;
			}

		}

		foreach ($db_data_fetched_array_sales as $row) {

			$amount4Yr1 = $row->amountInvestedYr1;
			$amount4Yr2 = $row->amountInvestedYr2;
			$amount4Yr3 = $row->amountInvestedYr3;
			$amount4Yr4 = $row->amountInvestedYr4;
			$amount4Yr5 = $row->amountInvestedYr5;
			$amount4Yr6 = $row->amountInvestedYr6;

		}

		//PHH
		$this->db->select("32 as indicator_id,
								sum( if( `pj`.`year` = '2013', `pj`.`amountInvestedInRefurbishing`, 0 ) ) AS amountInvestedYr1,
								sum( if( `pj`.`year` = '2014', `pj`.`amountInvestedInRefurbishing`, 0 ) ) AS amountInvestedYr2,
								sum( if( `pj`.`year` = '2015', `pj`.`amountInvestedInRefurbishing`, 0 ) ) AS amountInvestedYr3,
								sum( if( `pj`.`year` = '2016', `pj`.`amountInvestedInRefurbishing`, 0 ) ) AS amountInvestedYr4,
								sum( if( `pj`.`year` = '2017', `pj`.`amountInvestedInRefurbishing`, 0 ) ) AS amountInvestedYr5,
								sum( if( `pj`.`year` = '2018', `pj`.`amountInvestedInRefurbishing`, 0 ) ) AS amountInvestedYr6
								FROM `tbl_phh` as `p`
								join `tbl_phh_meta_data` as `pj` 
								on `pj`.`phh_id`=`p`.`id`
								where 32=32", FALSE);
		$db_rows_phh = $this->db->get();

		if ($db_rows_phh->num_rows() > 0) {
			foreach ($db_rows_phh->result() as $data) {
				$db_data_fetched_array_phh[] = $data;
			}

		}

		foreach ($db_data_fetched_array_phh as $row) {

			$amount5Yr1 = $row->amountInvestedYr1;
			$amount5Yr2 = $row->amountInvestedYr2;
			$amount5Yr3 = $row->amountInvestedYr3;
			$amount5Yr4 = $row->amountInvestedYr4;
			$amount5Yr5 = $row->amountInvestedYr5;
			$amount5Yr6 = $row->amountInvestedYr6;

		}


		//Summimg all the Amounts invested across the different form2's for each of the years

		$result['notrainedYr1'] = $this->convertShillingsToDollars($amountYr1 + $amount2Yr1 + $amount3Yr1 + $amount4Yr1 + $amount5Yr1);
		$result['notrainedYr2'] = $this->convertShillingsToDollars($amountYr2 + $amount2Yr2 + $amount3Yr2 + $amount4Yr2 + $amount5Yr2);
		$result['notrainedYr3'] = $this->convertShillingsToDollars($amountYr3 + $amount2Yr3 + $amount3Yr3 + $amount4Yr3 + $amount5Yr3);
		$result['notrainedYr4'] = $this->convertShillingsToDollars($amountYr4 + $amount2Yr4 + $amount3Yr4 + $amount4Yr4 + $amount5Yr4);
		$result['notrainedYr5'] = $this->convertShillingsToDollars($amountYr5 + $amount2Yr5 + $amount3Yr5 + $amount4Yr5 + $amount5Yr5);
		$result['notrainedYr6'] = $this->convertShillingsToDollars($amountYr6 + $amount2Yr6 + $amount3Yr6 + $amount4Yr6 + $amount5Yr6);

		return $result[$resultValue];

	}

	public function convertShillingsToDollars($amount)
	{
		//1USD =2500Shs

		$result = ($amount / 3410);
		return $result;

	}

}
