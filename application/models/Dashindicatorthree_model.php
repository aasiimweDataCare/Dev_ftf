<?php
/**
 * Created by PhpStorm.
 * User: aasiimwe
 * Date: 1/13/2016
 * Time: 12:49 PM
 */

class Dashindicatorthree_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    function getIndicator3volumesPurchased()
    {
        $this->db->select("sum(`volMaizePurchased` + `volCoffeePurchased` + `volBeansPurchased`) as volumesPurchased
                            from `tbl_form4_traders`", FALSE);

        $db_rows = $this->db->get();

        if ($db_rows->num_rows() > 0) {
            foreach ($db_rows->result() as $data) {
                $db_data_fetched_array[] = $data;
            }
            return $db_data_fetched_array;
        }
    }

        function getIndicator3volumesPurchasedRegion($region)
    {
        $this->db->select("sum(`f`.`volMaizePurchased` + `f`.`volCoffeePurchased` + `f`.`volBeansPurchased`) as volumesPurchased
                            from `tbl_form4_traders` as `f`
                            join `tbl_traders` as `d` on (`d`.`tbl_tradersId` = `f`.`tbl_traderId`)
                            where `d`.`traderRegion` = ".$region."", FALSE);

        $db_rows = $this->db->get();

        if ($db_rows->num_rows() > 0) {
            foreach ($db_rows->result() as $data) {
                $db_data_fetched_array[] = $data;
            }
            return $db_data_fetched_array;
        }
    }

            function getIndicator3volumesPurchasedValueChain($region)
    {
        $this->db->select("sum( `f`.`volMaizePurchased` ) AS MaizePurchased,
                            sum( `f`.`volCoffeePurchased` ) AS CoffeePurchased,
                            sum( `f`.`volBeansPurchased` ) AS BeansPurchased
                            from `tbl_form4_traders` as `f`
                            join `tbl_traders` as `d` on (`d`.`tbl_tradersId` = `f`.`tbl_traderId`)
                            where `d`.`traderRegion` = ".$region."", FALSE);

        $db_rows = $this->db->get();

        if ($db_rows->num_rows() > 0) {
            foreach ($db_rows->result() as $data) {
                $db_data_fetched_array[] = $data;
            }
            return $db_data_fetched_array;
        }
    }





}
