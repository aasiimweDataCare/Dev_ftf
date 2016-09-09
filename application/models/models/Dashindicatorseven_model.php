<?php
/**
 * Created by PhpStorm.
 * User: aasiimwe
 * Date: 1/13/2016
 * Time: 10:31 PM
 */

class Dashindicatorseven_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    function getIndicator7acreageCoffee()
    {
        $this->db->select("sum( if( `z`.`zoneCode` = '2', ((`c`.`coffee_acreage`)), 0 ) ) AS Coffee_N,
                            sum( if( `z`.`zoneCode` = '4', ((`c`.`coffee_acreage`)), 0 ) ) AS Coffee_W,
                            sum( if( `z`.`zoneCode` = '3', ((`c`.`coffee_acreage`)), 0 ) ) AS Coffee_E,
                            sum( if( `z`.`zoneCode` = '1', ((`c`.`coffee_acreage`)), 0 ) ) AS Coffee_C
                            from  `tbl_frm6production_coffee` as `c`
                            join `tbl_frm6particulars` as `p` on (`p`.`pk_patid` = `c`.`fk_patid`)
                            join `tbl_farmers` as `f` on (`f`.`tbl_farmersId` = `p`.`farmer_code`)
                            join `tbl_district` as `d` on (`d`.`districtCode` = `f`.`farmersDistrict`)
                            join `tbl_zone` as `z` on (`z`.`zoneCode` = `d`.`zone`)", FALSE);

        $db_rows = $this->db->get();

        if ($db_rows->num_rows() > 0) {
            foreach ($db_rows->result() as $data) {
                $db_data_fetched_array[] = $data;
            }
            return $db_data_fetched_array;
        }
    }

    function getIndicator7acreageMaize()
    {
        $this->db->select("sum( if( `z`.`zoneCode` = '2', ((`m`.`maize_acreage`)), 0 ) ) AS Maize_N,
                            sum( if( `z`.`zoneCode` = '4', ((`m`.`maize_acreage`)), 0 ) ) AS Maize_W,
                            sum( if( `z`.`zoneCode` = '3', ((`m`.`maize_acreage`)), 0 ) ) AS Maize_E,
                            sum( if( `z`.`zoneCode` = '1', ((`m`.`maize_acreage`)), 0 ) ) AS Maize_C
                            from  `tbl_frm6production_maize` as `m`
                            join `tbl_frm6particulars` as `p` on (`p`.`pk_patid` = `m`.`fk_patid`)
                            join `tbl_farmers` as `f` on (`f`.`tbl_farmersId` = `p`.`farmer_code`)
                            join `tbl_district` as `d` on (`d`.`districtCode` = `f`.`farmersDistrict`)
                            join `tbl_zone` as `z` on (`z`.`zoneCode` = `d`.`zone`)", FALSE);

        $db_rows = $this->db->get();

        if ($db_rows->num_rows() > 0) {
            foreach ($db_rows->result() as $data) {
                $db_data_fetched_array[] = $data;
            }
            return $db_data_fetched_array;
        }
    }

    function getIndicator7acreageBeans()
    {
        $this->db->select("sum( if( `z`.`zoneCode` = '2', ((`b`.`beans_acreage`)), 0 ) ) AS Beans_N,
                            sum( if( `z`.`zoneCode` = '4', ((`b`.`beans_acreage`)), 0 ) ) AS Beans_W,
                            sum( if( `z`.`zoneCode` = '3', ((`b`.`beans_acreage`)), 0 ) ) AS Beans_E,
                            sum( if( `z`.`zoneCode` = '1', ((`b`.`beans_acreage`)), 0 ) ) AS Beans_C
                            from  `tbl_frm6production_beans` as `b`
                            join `tbl_frm6particulars` as `p` on (`p`.`pk_patid` = `b`.`fk_patid`)
                            join `tbl_farmers` as `f` on (`f`.`tbl_farmersId` = `p`.`farmer_code`)
                            join `tbl_district` as `d` on (`d`.`districtCode` = `f`.`farmersDistrict`)
                            join `tbl_zone` as `z` on (`z`.`zoneCode` = `d`.`zone`)", FALSE);

        $db_rows = $this->db->get();

        if ($db_rows->num_rows() > 0) {
            foreach ($db_rows->result() as $data) {
                $db_data_fetched_array[] = $data;
            }
            return $db_data_fetched_array;
        }
    }





}
