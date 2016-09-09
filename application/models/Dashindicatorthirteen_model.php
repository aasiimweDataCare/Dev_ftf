<?php
/**
 * Created by PhpStorm.
 * User: shaffic
 * Date: 1/13/2016
 * Time: 11:33 AM
 */

class Dashindicatorthirteen_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    function getIndicator13farmers()
    {
        $this->db->select("DISTINCT COUNT(*) as numFarmers FROM `tbl_farmers` where display='Yes' ", FALSE);

        $db_rows = $this->db->get();

        if ($db_rows->num_rows() > 0) {
            foreach ($db_rows->result() as $data) {
                $db_data_fetched_array[] = $data;
            }
            return $db_data_fetched_array;
        }
    }

    function getIndicator13farmersByRegion($region)
    {
        $this->db->select("DISTINCT COUNT(*) as FarmerRegion
                from `tbl_farmers` as `f`
                    join `tbl_district` as `d` on (`d`.`districtCode` = `f`.`farmersDistrict`)
                    join `tbl_zone` as `z` on (`z`.`zoneCode` = `d`.`zone`)
                where `z`.`zoneCode` = ".$region."", FALSE);

        $db_rows = $this->db->get();

        if ($db_rows->num_rows() > 0) {
            foreach ($db_rows->result() as $data) {
                $db_data_fetched_array[] = $data;
            }
            return $db_data_fetched_array;
        }
    }

    

    }
