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

    function getIndicator7ImprovedSeed($region)
    {
        $this->db->select("sum( if( (`m`.`maize_improved_seeds` ='1' or `m`.`maize_improvedseeds_notuse` in ('2','3') or
				`b`.`beans_improved_seeds` ='1' or `b`.`beans_improvedseeds_notuse` in ('2','3') or
				`c`.`coffee_improved_seeds` ='1' or `c`.`coffee_improvedtrees_notuse` in ('2','3')
				), 1, 0 ) ) AS improvedSeed
                from `tbl_farmers` as `f`  join `tbl_frm6particulars` as `p` on (`p`.`farmer_code`=`f`.`tbl_farmersId`)
                    join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`)
                    join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patid`=`b`.`fk_patid`)
                    join `tbl_frm6production_maize` as `m` on (`m`.`fk_patid`=`c`.`fk_patid`)
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

    function getIndicator7Fertilizer($region)
    {
        $this->db->select("sum( if( (`m`.`maize_fertilizer_use` >'1' and `m`.`maize_fertilizer_use` is not null or
				`b`.`beans_fertilizer_use` >'1' and `b`.`beans_fertilizer_use` is not null or
				`c`.`coffee_fertilizer_use` >'1' and `c`.`coffee_fertilizer_use` is not null
				), 1, 0 ) ) AS Fertilizer
                from `tbl_farmers` as `f`  join `tbl_frm6particulars` as `p` on (`p`.`farmer_code`=`f`.`tbl_farmersId`)
                    join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`)
                    join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patid`=`b`.`fk_patid`)
                    join `tbl_frm6production_maize` as `m` on (`m`.`fk_patid`=`c`.`fk_patid`)
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

    function getIndicator7Chemical($region)
    {
        $this->db->select("sum( if( (`m`.`maize_chemical_use` ='1' or `m`.`maize_chemical_notuse` in ('2','3','4') or
				`b`.`beans_chemical_use` ='1' or `b`.`beans_chemical_notuse` in ('2','3','4') or
				`c`.`coffee_chemical_use` ='1' or `c`.`coffee_chemical_notuse` in ('2','3','4')
				), 1, 0 ) ) AS Chemical
                from `tbl_farmers` as `f`  join `tbl_frm6particulars` as `p` on (`p`.`farmer_code`=`f`.`tbl_farmersId`)
                    join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`)
                    join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patid`=`b`.`fk_patid`)
                    join `tbl_frm6production_maize` as `m` on (`m`.`fk_patid`=`c`.`fk_patid`)
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

    function getIndicator7ManagementPractices($region)
    {
        $this->db->select("sum( if( (`m`.`maize_mgt_practices` ='1' or
				`b`.`beans_mgt_practices` ='1' or
				`c`.`coffee_mgt_practices` ='1'
				), 1, 0 ) ) AS ManagementPractices
                from `tbl_farmers` as `f`  join `tbl_frm6particulars` as `p` on (`p`.`farmer_code`=`f`.`tbl_farmersId`)
                    join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`)
                    join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patid`=`b`.`fk_patid`)
                    join `tbl_frm6production_maize` as `m` on (`m`.`fk_patid`=`c`.`fk_patid`)
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

    function getIndicator7Machinery($region)
    {
        $this->db->select("sum( if( (`m`.`maize_machinery_use` ='1' or
				`b`.`beans_machinery_use` ='1' or
				`c`.`coffee_machinery_use` ='1'
				), 1, 0 ) ) AS Machinery
                from `tbl_farmers` as `f`  join `tbl_frm6particulars` as `p` on (`p`.`farmer_code`=`f`.`tbl_farmersId`)
                    join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`)
                    join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patid`=`b`.`fk_patid`)
                    join `tbl_frm6production_maize` as `m` on (`m`.`fk_patid`=`c`.`fk_patid`)
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
