<?php
/**
 * Created by PhpStorm.
 * User: aasiimwe
 * Date: 1/13/2016
 * Time: 10:31 PM
 */

class Dashindicatorsix_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    function getIndicator6acreageCoffee()
    {
        /*used 118 for 2016 Oct-Mar

        */
        $this->db->select("sum( if( substr( `p`.`interview_date`, 1, 4 ) = '2013' and `z`.`zoneCode` = '2', (`c`.`coffee_acreage`), 0 ) ) AS Coffee_N_Yr1,
                        sum( if( substr( `p`.`interview_date`, 1, 4 ) = '2013' and `z`.`zoneCode` = '4', (`c`.`coffee_acreage`), 0 ) ) AS Coffee_W_Yr1,
                        sum( if( substr( `p`.`interview_date`, 1, 4 ) = '2013' and `z`.`zoneCode` = '3', (`c`.`coffee_acreage`), 0 ) ) AS Coffee_E_Yr1,
                        sum( if( substr( `p`.`interview_date`, 1, 4 ) = '2013' and `z`.`zoneCode` = '1', (`c`.`coffee_acreage`), 0 ) ) AS Coffee_C_Yr1,
                        sum( if( substr( `p`.`interview_date`, 1, 4 ) = '2014' and `z`.`zoneCode` = '2', (`c`.`coffee_acreage`), 0 ) ) AS Coffee_N_Yr2,
                        sum( if( substr( `p`.`interview_date`, 1, 4 ) = '2014' and `z`.`zoneCode` = '4', (`c`.`coffee_acreage`), 0 ) ) AS Coffee_W_Yr2,
                        sum( if( substr( `p`.`interview_date`, 1, 4 ) = '2014' and `z`.`zoneCode` = '3', (`c`.`coffee_acreage`), 0 ) ) AS Coffee_E_Yr2,
                        sum( if( substr( `p`.`interview_date`, 1, 4 ) = '2014' and `z`.`zoneCode` = '1', (`c`.`coffee_acreage`), 0 ) ) AS Coffee_C_Yr2,
                        sum( if( substr( `p`.`interview_date`, 1, 4 ) = '2015' and `z`.`zoneCode` = '2', ((`c`.`coffee_acreage`)*118), 0 ) ) AS Coffee_N_Yr3,
                        sum( if( substr( `p`.`interview_date`, 1, 4 ) = '2015' and `z`.`zoneCode` = '4', ((`c`.`coffee_acreage`)*118), 0 ) ) AS Coffee_W_Yr3,
                        sum( if( substr( `p`.`interview_date`, 1, 4 ) = '2015' and `z`.`zoneCode` = '3', ((`c`.`coffee_acreage`)*118), 0 ) ) AS Coffee_E_Yr3,
                        sum( if( substr( `p`.`interview_date`, 1, 4 ) = '2015' and `z`.`zoneCode` = '1', ((`c`.`coffee_acreage`)*118), 0 ) ) AS Coffee_C_Yr3,
                        sum( if( substr( `p`.`interview_date`, 1, 4 ) = '2016' and `z`.`zoneCode` = '2', ((`c`.`coffee_acreage`)*118), 0 ) ) AS Coffee_N_Yr4,
                        sum( if( substr( `p`.`interview_date`, 1, 4 ) = '2016' and `z`.`zoneCode` = '4', ((`c`.`coffee_acreage`)*118), 0 ) ) AS Coffee_W_Yr4,
                        sum( if( substr( `p`.`interview_date`, 1, 4 ) = '2016' and `z`.`zoneCode` = '3', ((`c`.`coffee_acreage`)*118), 0 ) ) AS Coffee_E_Yr4,
                        sum( if( substr( `p`.`interview_date`, 1, 4 ) = '2016' and `z`.`zoneCode` = '3', ((`c`.`coffee_acreage`)*118), 0 ) ) AS Coffee_C_Yr4
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
    function getIndicator6acreageCoffeeFY2016Onwards()
    {
        /*used survey season2 for 2016

        */
        $this->db->select("sum( if( RIGHT( `s` .`ans_15`, 4 ) = '2013' and `s`.`ans_23` = '2', (`s`.`ans_1070`), 0 ) ) AS Coffee_N_Yr1,
                            sum( if( RIGHT( `s` .`ans_15`, 4 ) = '2013' and `s`.`ans_23` = '4', (`s`.`ans_1070`), 0 ) ) AS Coffee_W_Yr1,
                            sum( if( RIGHT( `s` .`ans_15`, 4 ) = '2013' and `s`.`ans_23` = '3', (`s`.`ans_1070`), 0 ) ) AS Coffee_E_Yr1,
                            sum( if( RIGHT( `s` .`ans_15`, 4 ) = '2013' and `s`.`ans_23` = '1', (`s`.`ans_1070`), 0 ) ) AS Coffee_C_Yr1,
                            sum( if( RIGHT( `s` .`ans_15`, 4 ) = '2014' and `s`.`ans_23` = '2', (`s`.`ans_1070`), 0 ) ) AS Coffee_N_Yr2,
                            sum( if( RIGHT( `s` .`ans_15`, 4 ) = '2014' and `s`.`ans_23` = '4', (`s`.`ans_1070`), 0 ) ) AS Coffee_W_Yr2,
                            sum( if( RIGHT( `s` .`ans_15`, 4 ) = '2014' and `s`.`ans_23` = '3', (`s`.`ans_1070`), 0 ) ) AS Coffee_E_Yr2,
                            sum( if( RIGHT( `s` .`ans_15`, 4 ) = '2014' and `s`.`ans_23` = '1', (`s`.`ans_1070`), 0 ) ) AS Coffee_C_Yr2,
                            sum( if( RIGHT( `s` .`ans_15`, 4 ) = '2015' and `s`.`ans_23` = '2', (`s`.`ans_1070`), 0 ) ) AS Coffee_N_Yr3,
                            sum( if( RIGHT( `s` .`ans_15`, 4 ) = '2015' and `s`.`ans_23` = '4', (`s`.`ans_1070`), 0 ) ) AS Coffee_W_Yr3,
                            sum( if( RIGHT( `s` .`ans_15`, 4 ) = '2015' and `s`.`ans_23` = '3', (`s`.`ans_1070`), 0 ) ) AS Coffee_E_Yr3,
                            sum( if( RIGHT( `s` .`ans_15`, 4 ) = '2015' and `s`.`ans_23` = '1', (`s`.`ans_1070`), 0 ) ) AS Coffee_C_Yr3,
                            sum( if( RIGHT( `s` .`ans_15`, 4 ) = '2016' and `s`.`ans_23` = '2', (`s`.`ans_1070`), 0 ) ) AS Coffee_N_Yr4,
                            sum( if( RIGHT( `s` .`ans_15`, 4 ) = '2016' and `s`.`ans_23` = '4', (`s`.`ans_1070`), 0 ) ) AS Coffee_W_Yr4,
                            sum( if( RIGHT( `s` .`ans_15`, 4 ) = '2016' and `s`.`ans_23` = '3', (`s`.`ans_1070`), 0 ) ) AS Coffee_E_Yr4,
                            sum( if( RIGHT( `s` .`ans_15`, 4 ) = '2016' and `s`.`ans_23` = '1', (`s`.`ans_1070`), 0 ) ) AS Coffee_C_Yr4,
                            sum( if( RIGHT( `s` .`ans_15`, 4 ) = '2017' and `s`.`ans_23` = '2', (`s`.`ans_1070`), 0 ) ) AS Coffee_N_Yr5,
                            sum( if( RIGHT( `s` .`ans_15`, 4 ) = '2017' and `s`.`ans_23` = '4', (`s`.`ans_1070`), 0 ) ) AS Coffee_W_Yr5,
                            sum( if( RIGHT( `s` .`ans_15`, 4 ) = '2017' and `s`.`ans_23` = '3', (`s`.`ans_1070`), 0 ) ) AS Coffee_E_Yr5,
                            sum( if( RIGHT( `s` .`ans_15`, 4 ) = '2017' and `s`.`ans_23` = '1', (`s`.`ans_1070`), 0 ) ) AS Coffee_C_Yr5,
                            sum( if( RIGHT( `s` .`ans_15`, 4 ) = '2018' and `s`.`ans_23` = '2', (`s`.`ans_1070`), 0 ) ) AS Coffee_N_Yr6,
                            sum( if( RIGHT( `s` .`ans_15`, 4 ) = '2018' and `s`.`ans_23` = '4', (`s`.`ans_1070`), 0 ) ) AS Coffee_W_Yr6,
                            sum( if( RIGHT( `s` .`ans_15`, 4 ) = '2018' and `s`.`ans_23` = '3', (`s`.`ans_1070`), 0 ) ) AS Coffee_E_Yr6,
                            sum( if( RIGHT( `s` .`ans_15`, 4 ) = '2018' and `s`.`ans_23` = '1', (`s`.`ans_1070`), 0 ) ) AS Coffee_C_Yr6
                            FROM `tbl_form6_survey_data` as `s` ", FALSE);

        $db_rows = $this->db->get();

        if ($db_rows->num_rows() > 0) {
            foreach ($db_rows->result() as $data) {
                $db_data_fetched_array[] = $data;
            }
            return $db_data_fetched_array;
        }



    }

    function getIndicator6acreageMaize()
    {
        $this->db->select("sum( if( substr( `p`.`interview_date`, 1, 4 ) = '2013' and `z`.`zoneCode` = '2', (`m`.`maize_acreage`), 0 ) ) AS Maize_N_Yr1,
                        sum( if( substr( `p`.`interview_date`, 1, 4 ) = '2013' and `z`.`zoneCode` = '4', (`m`.`maize_acreage`), 0 ) ) AS Maize_W_Yr1,
                        sum( if( substr( `p`.`interview_date`, 1, 4 ) = '2013' and `z`.`zoneCode` = '3', (`m`.`maize_acreage`), 0 ) ) AS Maize_E_Yr1,
                        sum( if( substr( `p`.`interview_date`, 1, 4 ) = '2013' and `z`.`zoneCode` = '1', (`m`.`maize_acreage`), 0 ) ) AS Maize_C_Yr1,
                        sum( if( substr( `p`.`interview_date`, 1, 4 ) = '2014' and `z`.`zoneCode` = '2', (`m`.`maize_acreage`), 0 ) ) AS Maize_N_Yr2,
                        sum( if( substr( `p`.`interview_date`, 1, 4 ) = '2014' and `z`.`zoneCode` = '4', (`m`.`maize_acreage`), 0 ) ) AS Maize_W_Yr2,
                        sum( if( substr( `p`.`interview_date`, 1, 4 ) = '2014' and `z`.`zoneCode` = '3', (`m`.`maize_acreage`), 0 ) ) AS Maize_E_Yr2,
                        sum( if( substr( `p`.`interview_date`, 1, 4 ) = '2014' and `z`.`zoneCode` = '1', (`m`.`maize_acreage`), 0 ) ) AS Maize_C_Yr2,
                        sum( if( substr( `p`.`interview_date`, 1, 4 ) = '2015' and `z`.`zoneCode` = '2', ((`m`.`maize_acreage`)*118), 0 ) ) AS Maize_N_Yr3,
                        sum( if( substr( `p`.`interview_date`, 1, 4 ) = '2015' and `z`.`zoneCode` = '4', ((`m`.`maize_acreage`)*118), 0 ) ) AS Maize_W_Yr3,
                        sum( if( substr( `p`.`interview_date`, 1, 4 ) = '2015' and `z`.`zoneCode` = '3', ((`m`.`maize_acreage`)*118), 0 ) ) AS Maize_E_Yr3,
                        sum( if( substr( `p`.`interview_date`, 1, 4 ) = '2015' and `z`.`zoneCode` = '1', ((`m`.`maize_acreage`)*118), 0 ) ) AS Maize_C_Yr3,
                        sum( if( substr( `p`.`interview_date`, 1, 4 ) = '2016' and `z`.`zoneCode` = '2', ((`m`.`maize_acreage`)*118), 0 ) ) AS Maize_N_Yr4,
                        sum( if( substr( `p`.`interview_date`, 1, 4 ) = '2016' and `z`.`zoneCode` = '4', ((`m`.`maize_acreage`)*118), 0 ) ) AS Maize_W_Yr4,
                        sum( if( substr( `p`.`interview_date`, 1, 4 ) = '2016' and `z`.`zoneCode` = '3', ((`m`.`maize_acreage`)*118), 0 ) ) AS Maize_E_Yr4,
                        sum( if( substr( `p`.`interview_date`, 1, 4 ) = '2016' and `z`.`zoneCode` = '3', ((`m`.`maize_acreage`)*118), 0 ) ) AS Maize_C_Yr4
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
    function getIndicator6acreageMaizeFY2016Onwards()
    {
        $this->db->select("sum( if( RIGHT( `s` .`ans_15`, 4 ) = '2013' and `s`.`ans_23` = '2', (`s`.`ans_129`), 0 ) ) AS Maize_N_Yr1,
                            sum( if( RIGHT( `s` .`ans_15`, 4 ) = '2013' and `s`.`ans_23` = '4', (`s`.`ans_129`), 0 ) ) AS Maize_W_Yr1,
                            sum( if( RIGHT( `s` .`ans_15`, 4 ) = '2013' and `s`.`ans_23` = '3', (`s`.`ans_129`), 0 ) ) AS Maize_E_Yr1,
                            sum( if( RIGHT( `s` .`ans_15`, 4 ) = '2013' and `s`.`ans_23` = '1', (`s`.`ans_129`), 0 ) ) AS Maize_C_Yr1,
                            sum( if( RIGHT( `s` .`ans_15`, 4 ) = '2014' and `s`.`ans_23` = '2', (`s`.`ans_129`), 0 ) ) AS Maize_N_Yr2,
                            sum( if( RIGHT( `s` .`ans_15`, 4 ) = '2014' and `s`.`ans_23` = '4', (`s`.`ans_129`), 0 ) ) AS Maize_W_Yr2,
                            sum( if( RIGHT( `s` .`ans_15`, 4 ) = '2014' and `s`.`ans_23` = '3', (`s`.`ans_129`), 0 ) ) AS Maize_E_Yr2,
                            sum( if( RIGHT( `s` .`ans_15`, 4 ) = '2014' and `s`.`ans_23` = '1', (`s`.`ans_129`), 0 ) ) AS Maize_C_Yr2,
                            sum( if( RIGHT( `s` .`ans_15`, 4 ) = '2015' and `s`.`ans_23` = '2', (`s`.`ans_129`), 0 ) ) AS Maize_N_Yr3,
                            sum( if( RIGHT( `s` .`ans_15`, 4 ) = '2015' and `s`.`ans_23` = '4', (`s`.`ans_129`), 0 ) ) AS Maize_W_Yr3,
                            sum( if( RIGHT( `s` .`ans_15`, 4 ) = '2015' and `s`.`ans_23` = '3', (`s`.`ans_129`), 0 ) ) AS Maize_E_Yr3,
                            sum( if( RIGHT( `s` .`ans_15`, 4 ) = '2015' and `s`.`ans_23` = '1', (`s`.`ans_129`), 0 ) ) AS Maize_C_Yr3,
                            sum( if( RIGHT( `s` .`ans_15`, 4 ) = '2016' and `s`.`ans_23` = '2', (`s`.`ans_129`), 0 ) ) AS Maize_N_Yr4,
                            sum( if( RIGHT( `s` .`ans_15`, 4 ) = '2016' and `s`.`ans_23` = '4', (`s`.`ans_129`), 0 ) ) AS Maize_W_Yr4,
                            sum( if( RIGHT( `s` .`ans_15`, 4 ) = '2016' and `s`.`ans_23` = '3', (`s`.`ans_129`), 0 ) ) AS Maize_E_Yr4,
                            sum( if( RIGHT( `s` .`ans_15`, 4 ) = '2016' and `s`.`ans_23` = '1', (`s`.`ans_129`), 0 ) ) AS Maize_C_Yr4,
                            sum( if( RIGHT( `s` .`ans_15`, 4 ) = '2017' and `s`.`ans_23` = '2', (`s`.`ans_129`), 0 ) ) AS Maize_N_Yr5,
                            sum( if( RIGHT( `s` .`ans_15`, 4 ) = '2017' and `s`.`ans_23` = '4', (`s`.`ans_129`), 0 ) ) AS Maize_W_Yr5,
                            sum( if( RIGHT( `s` .`ans_15`, 4 ) = '2017' and `s`.`ans_23` = '3', (`s`.`ans_129`), 0 ) ) AS Maize_E_Yr5,
                            sum( if( RIGHT( `s` .`ans_15`, 4 ) = '2017' and `s`.`ans_23` = '1', (`s`.`ans_129`), 0 ) ) AS Maize_C_Yr5,
                            sum( if( RIGHT( `s` .`ans_15`, 4 ) = '2018' and `s`.`ans_23` = '2', (`s`.`ans_129`), 0 ) ) AS Maize_N_Yr6,
                            sum( if( RIGHT( `s` .`ans_15`, 4 ) = '2018' and `s`.`ans_23` = '4', (`s`.`ans_129`), 0 ) ) AS Maize_W_Yr6,
                            sum( if( RIGHT( `s` .`ans_15`, 4 ) = '2018' and `s`.`ans_23` = '3', (`s`.`ans_129`), 0 ) ) AS Maize_E_Yr6,
                            sum( if( RIGHT( `s` .`ans_15`, 4 ) = '2018' and `s`.`ans_23` = '1', (`s`.`ans_129`), 0 ) ) AS Maize_C_Yr6
                            FROM `tbl_form6_survey_data` as `s` ", FALSE);

        $db_rows = $this->db->get();

        if ($db_rows->num_rows() > 0) {
            foreach ($db_rows->result() as $data) {
                $db_data_fetched_array[] = $data;
            }
            return $db_data_fetched_array;
        }



    }


    function getIndicator6acreageBeans()
    {
        $this->db->select("sum( if( substr( `p`.`interview_date`, 1, 4 ) = '2013' and `z`.`zoneCode` = '2', (`b`.`beans_acreage`), 0 ) ) AS Beans_N_Yr1,
                        sum( if( substr( `p`.`interview_date`, 1, 4 ) = '2013' and `z`.`zoneCode` = '4', (`b`.`beans_acreage`), 0 ) ) AS Beans_W_Yr1,
                        sum( if( substr( `p`.`interview_date`, 1, 4 ) = '2013' and `z`.`zoneCode` = '3', (`b`.`beans_acreage`), 0 ) ) AS Beans_E_Yr1,
                        sum( if( substr( `p`.`interview_date`, 1, 4 ) = '2013' and `z`.`zoneCode` = '1', (`b`.`beans_acreage`), 0 ) ) AS Beans_C_Yr1,
                        sum( if( substr( `p`.`interview_date`, 1, 4 ) = '2014' and `z`.`zoneCode` = '2', (`b`.`beans_acreage`), 0 ) ) AS Beans_N_Yr2,
                        sum( if( substr( `p`.`interview_date`, 1, 4 ) = '2014' and `z`.`zoneCode` = '4', (`b`.`beans_acreage`), 0 ) ) AS Beans_W_Yr2,
                        sum( if( substr( `p`.`interview_date`, 1, 4 ) = '2014' and `z`.`zoneCode` = '3', (`b`.`beans_acreage`), 0 ) ) AS Beans_E_Yr2,
                        sum( if( substr( `p`.`interview_date`, 1, 4 ) = '2014' and `z`.`zoneCode` = '1', (`b`.`beans_acreage`), 0 ) ) AS Beans_C_Yr2,
                        sum( if( substr( `p`.`interview_date`, 1, 4 ) = '2015' and `z`.`zoneCode` = '2', ((`b`.`beans_acreage`)*118), 0 ) ) AS Beans_N_Yr3,
                        sum( if( substr( `p`.`interview_date`, 1, 4 ) = '2015' and `z`.`zoneCode` = '4', ((`b`.`beans_acreage`)*118), 0 ) ) AS Beans_W_Yr3,
                        sum( if( substr( `p`.`interview_date`, 1, 4 ) = '2015' and `z`.`zoneCode` = '3', ((`b`.`beans_acreage`)*118), 0 ) ) AS Beans_E_Yr3,
                        sum( if( substr( `p`.`interview_date`, 1, 4 ) = '2015' and `z`.`zoneCode` = '1', ((`b`.`beans_acreage`)*118), 0 ) ) AS Beans_C_Yr3,
                        sum( if( substr( `p`.`interview_date`, 1, 4 ) = '2016' and `z`.`zoneCode` = '2', ((`b`.`beans_acreage`)*118), 0 ) ) AS Beans_N_Yr4,
                        sum( if( substr( `p`.`interview_date`, 1, 4 ) = '2016' and `z`.`zoneCode` = '4', ((`b`.`beans_acreage`)*118), 0 ) ) AS Beans_W_Yr4,
                        sum( if( substr( `p`.`interview_date`, 1, 4 ) = '2016' and `z`.`zoneCode` = '3', ((`b`.`beans_acreage`)*118), 0 ) ) AS Beans_E_Yr4,
                        sum( if( substr( `p`.`interview_date`, 1, 4 ) = '2016' and `z`.`zoneCode` = '3', ((`b`.`beans_acreage`)*118), 0 ) ) AS Beans_C_Yr4
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
    function getIndicator6acreageBeansFY2016Onwards()
    {
        $this->db->select("sum( if( RIGHT( `s` .`ans_15`, 4 ) = '2013' and `s`.`ans_23` = '2', (`s`.`ans_590`), 0 ) ) AS Beans_N_Yr1,
                            sum( if( RIGHT( `s` .`ans_15`, 4 ) = '2013' and `s`.`ans_23` = '4', (`s`.`ans_590`), 0 ) ) AS Beans_W_Yr1,
                            sum( if( RIGHT( `s` .`ans_15`, 4 ) = '2013' and `s`.`ans_23` = '3', (`s`.`ans_590`), 0 ) ) AS Beans_E_Yr1,
                            sum( if( RIGHT( `s` .`ans_15`, 4 ) = '2013' and `s`.`ans_23` = '1', (`s`.`ans_590`), 0 ) ) AS Beans_C_Yr1,
                            sum( if( RIGHT( `s` .`ans_15`, 4 ) = '2014' and `s`.`ans_23` = '2', (`s`.`ans_590`), 0 ) ) AS Beans_N_Yr2,
                            sum( if( RIGHT( `s` .`ans_15`, 4 ) = '2014' and `s`.`ans_23` = '4', (`s`.`ans_590`), 0 ) ) AS Beans_W_Yr2,
                            sum( if( RIGHT( `s` .`ans_15`, 4 ) = '2014' and `s`.`ans_23` = '3', (`s`.`ans_590`), 0 ) ) AS Beans_E_Yr2,
                            sum( if( RIGHT( `s` .`ans_15`, 4 ) = '2014' and `s`.`ans_23` = '1', (`s`.`ans_590`), 0 ) ) AS Beans_C_Yr2,
                            sum( if( RIGHT( `s` .`ans_15`, 4 ) = '2015' and `s`.`ans_23` = '2', (`s`.`ans_590`), 0 ) ) AS Beans_N_Yr3,
                            sum( if( RIGHT( `s` .`ans_15`, 4 ) = '2015' and `s`.`ans_23` = '4', (`s`.`ans_590`), 0 ) ) AS Beans_W_Yr3,
                            sum( if( RIGHT( `s` .`ans_15`, 4 ) = '2015' and `s`.`ans_23` = '3', (`s`.`ans_590`), 0 ) ) AS Beans_E_Yr3,
                            sum( if( RIGHT( `s` .`ans_15`, 4 ) = '2015' and `s`.`ans_23` = '1', (`s`.`ans_590`), 0 ) ) AS Beans_C_Yr3,
                            sum( if( RIGHT( `s` .`ans_15`, 4 ) = '2016' and `s`.`ans_23` = '2', (`s`.`ans_590`), 0 ) ) AS Beans_N_Yr4,
                            sum( if( RIGHT( `s` .`ans_15`, 4 ) = '2016' and `s`.`ans_23` = '4', (`s`.`ans_590`), 0 ) ) AS Beans_W_Yr4,
                            sum( if( RIGHT( `s` .`ans_15`, 4 ) = '2016' and `s`.`ans_23` = '3', (`s`.`ans_590`), 0 ) ) AS Beans_E_Yr4,
                            sum( if( RIGHT( `s` .`ans_15`, 4 ) = '2016' and `s`.`ans_23` = '1', (`s`.`ans_590`), 0 ) ) AS Beans_C_Yr4,
                            sum( if( RIGHT( `s` .`ans_15`, 4 ) = '2017' and `s`.`ans_23` = '2', (`s`.`ans_590`), 0 ) ) AS Beans_N_Yr5,
                            sum( if( RIGHT( `s` .`ans_15`, 4 ) = '2017' and `s`.`ans_23` = '4', (`s`.`ans_590`), 0 ) ) AS Beans_W_Yr5,
                            sum( if( RIGHT( `s` .`ans_15`, 4 ) = '2017' and `s`.`ans_23` = '3', (`s`.`ans_590`), 0 ) ) AS Beans_E_Yr5,
                            sum( if( RIGHT( `s` .`ans_15`, 4 ) = '2017' and `s`.`ans_23` = '1', (`s`.`ans_590`), 0 ) ) AS Beans_C_Yr5,
                            sum( if( RIGHT( `s` .`ans_15`, 4 ) = '2018' and `s`.`ans_23` = '2', (`s`.`ans_590`), 0 ) ) AS Beans_N_Yr6,
                            sum( if( RIGHT( `s` .`ans_15`, 4 ) = '2018' and `s`.`ans_23` = '4', (`s`.`ans_590`), 0 ) ) AS Beans_W_Yr6,
                            sum( if( RIGHT( `s` .`ans_15`, 4 ) = '2018' and `s`.`ans_23` = '3', (`s`.`ans_590`), 0 ) ) AS Beans_E_Yr6,
                            sum( if( RIGHT( `s` .`ans_15`, 4 ) = '2018' and `s`.`ans_23` = '1', (`s`.`ans_590`), 0 ) ) AS Beans_C_Yr6
                            FROM `tbl_form6_survey_data` as `s` ", FALSE);

        $db_rows = $this->db->get();

        if ($db_rows->num_rows() > 0) {
            foreach ($db_rows->result() as $data) {
                $db_data_fetched_array[] = $data;
            }
            return $db_data_fetched_array;
        }



    }





}
