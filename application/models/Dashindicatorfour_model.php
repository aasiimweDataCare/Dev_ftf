<?php
/**
 * Created by PhpStorm.
 * User: aasiimwe
 * Date: 1/13/2016
 * Time: 1:12 PM
 */

class Dashindicatorfour_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    function getIndicator4volumesSold_Beans($zoneCode)
    {
        $this->db->select("(sum(`t4`.`volBeansEx`)/1000) as `volumesSold`
                            from `tbl_form4_traders` as `t4` join `tbl_traders` as `t`
                            on (`t4`.`tbl_traderId` = `t`.`tbl_tradersId`)
                            where `t`.`traderRegion`='".$zoneCode."'", FALSE);

        $db_rows = $this->db->get();

        if ($db_rows->num_rows() > 0) {
            foreach ($db_rows->result() as $data) {
                $db_data_fetched_array[] = $data;
            }
            return $db_data_fetched_array;
        }
    }


    function getIndicator4volumesSold_Coffee($zoneCode)
    {
        $this->db->select("(sum(`t4`.`volCoffeeEx`)/1000) as `volumesSold`
                            from `tbl_form4_traders` as `t4` join `tbl_traders` as `t`
                            on (`t4`.`tbl_traderId` = `t`.`tbl_tradersId`)
                            where `t`.`traderRegion`='".$zoneCode."'", FALSE);

        $db_rows = $this->db->get();

        if ($db_rows->num_rows() > 0) {
            foreach ($db_rows->result() as $data) {
                $db_data_fetched_array[] = $data;
            }
            return $db_data_fetched_array;
        }
    }

    function getIndicator4volumesSold_Maize($zoneCode)
    {
        $this->db->select("(sum(`t4`.`volMaizeEx`)/1000) as `volumesSold`
                            from `tbl_form4_traders` as `t4` join `tbl_traders` as `t`
                            on (`t4`.`tbl_traderId` = `t`.`tbl_tradersId`)
                            where `t`.`traderRegion`='".$zoneCode."'", FALSE);

        $db_rows = $this->db->get();

        if ($db_rows->num_rows() > 0) {
            foreach ($db_rows->result() as $data) {
                $db_data_fetched_array[] = $data;
            }
            return $db_data_fetched_array;
        }
    }





}
