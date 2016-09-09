<?php

/**
 * Created by PhpStorm.
 * User: aasiimwe
 * Date: 1/11/2016
 * Time: 3:52 PM
 */
class DashindicatorTwelve_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    function IndicatorTwelveRegion($region)
    {
        $this->db->select("tbl_traders.tbl_tradersId,
		tbl_district.zone,tbl_district.districtCode,
		(sum(tbl_form4_traders.volMaizeExUgx)/sum(tbl_form4_traders.volMaizePurchased))  as volMaizePurchased,
		(sum(tbl_form4_traders.volBeansExUgx)/sum(tbl_form4_traders.volBeansPurchased)) as volBeansPurchased,
		(sum(tbl_form4_traders.volCoffeeExUgx)/sum(tbl_form4_traders.volCoffeePurchased)) as volCoffeePurchased
		from tbl_form4_traders 
		join tbl_traders on(tbl_form4_traders.tbl_traderId=tbl_traders.tbl_tradersId)
		join  tbl_district on(tbl_traders.traderDistrict=tbl_district.districtCode)
		where tbl_district.zone='$region'
		group by tbl_district.zone ", FALSE);

        $db_rows = $this->db->get();

        if ($db_rows->num_rows() > 0) {
            foreach ($db_rows->result() as $data) {
                $db_data_fetched_array[] = $data;
            }
            return $db_data_fetched_array;
        }
    }

    function IndicatorTwelveDistrict()
    {
        $this->db->select("tbl_traders.tbl_tradersId,
		tbl_district.zone,tbl_district.districtCode,
		(sum(tbl_form4_traders.volMaizeExUgx)/sum(tbl_form4_traders.volMaizePurchased)) as volMaizePurchased,
		(sum(tbl_form4_traders.volBeansExUgx)/sum(tbl_form4_traders.volBeansPurchased)) as volBeansPurchased,
		(sum(tbl_form4_traders.volCoffeeExUgx)/sum(tbl_form4_traders.volCoffeePurchased)) as volCoffeePurchased
		from tbl_form4_traders 
		join tbl_traders on(tbl_form4_traders.tbl_traderId=tbl_traders.tbl_tradersId)
		join  tbl_district on(tbl_traders.traderDistrict=tbl_district.districtCode)
		group by tbl_district.districtCode ", FALSE);

        $db_rows = $this->db->get();

        if ($db_rows->num_rows() > 0) {
            foreach ($db_rows->result() as $data) {
                $db_data_fetched_array[] = $data;
            }
            return $db_data_fetched_array;
        }
    }

   

    }


