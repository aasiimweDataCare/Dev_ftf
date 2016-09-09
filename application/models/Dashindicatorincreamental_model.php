<?php
/**
 * Created by PhpStorm.
 * User: shaffic
 * Date: 1/13/2016
 * Time: 11:33 AM
 */

class Dashindicatorincreamental_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    function getIndicator14farmers()
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

    function getIndicator14farmersByRegionMaize($region)
    {
        $this->db->select("sum( if(  substr( `p`.`interview_date`, 1, 4 )= '2013', ((`m`.`maize_sold`)*(`m`.`maize_sold_price`)), 0 ) ) AS incrementalSalesMaizeYr1,
sum( if(  substr( `p`.`interview_date`, 1, 4 )= '2014', ((`m`.`maize_sold`)*(`m`.`maize_sold_price`)), 0 ) ) AS incrementalSalesMaizeYr2,
sum( if(  substr( `p`.`interview_date`, 1, 4 )= '2015', ((`m`.`maize_sold`)*(`m`.`maize_sold_price`)), 0 ) ) AS incrementalSalesMaizeYr3,
sum( if(  substr( `p`.`interview_date`, 1, 4 )= '2016', ((`m`.`maize_sold`)*(`m`.`maize_sold_price`)), 0 ) ) AS incrementalSalesMaizeYr4,
sum( if(  substr( `p`.`interview_date`, 1, 4 )= '2017', ((`m`.`maize_sold`)*(`m`.`maize_sold_price`)), 0 ) ) AS incrementalSalesMaizeYr5,
sum( if(  substr( `p`.`interview_date`, 1, 4 )= '2018', ((`m`.`maize_sold`)*(`m`.`maize_sold_price`)), 0 ) ) AS incrementalSalesMaizeYr6
            FROM `tbl_frm6particulars` as `p`
            join `tbl_frm6production_maize` as `m` on (`m`.`fk_patid`=`p`.`pk_patid`)
            join `tbl_farmers` as `f` on (`f`.`tbl_farmersId` = `p`.`farmer_code`)
            join `tbl_district` as `d` on (`d`.`districtCode` = `f`.`farmersDistrict`)
            where `d`.`zone` = ".$region."", FALSE);

        $db_rows = $this->db->get();

        if ($db_rows->num_rows() > 0) {
            foreach ($db_rows->result() as $data) {
                $db_data_fetched_array[] = $data;
            }
            return $db_data_fetched_array;
        }
    }

function getIndicator14farmersByRegionBeans($region)
    {
        $this->db->select("sum( if(  substr( `p`.`interview_date`, 1, 4 )= '2013', ((`b`.`beans_sold`)*(`b`.`beans_sold_price`)), 0 ) ) AS incrementalSalesBeansYr1,
sum( if(  substr( `p`.`interview_date`, 1, 4 )= '2014', ((`b`.`beans_sold`)*(`b`.`beans_sold_price`)), 0 ) ) AS incrementalSalesBeansYr2,
sum( if(  substr( `p`.`interview_date`, 1, 4 )= '2015', ((`b`.`beans_sold`)*(`b`.`beans_sold_price`)), 0 ) ) AS incrementalSalesBeansYr3,
sum( if(  substr( `p`.`interview_date`, 1, 4 )= '2016', ((`b`.`beans_sold`)*(`b`.`beans_sold_price`)), 0 ) ) AS incrementalSalesBeansYr4,
sum( if(  substr( `p`.`interview_date`, 1, 4 )= '2017', ((`b`.`beans_sold`)*(`b`.`beans_sold_price`)), 0 ) ) AS incrementalSalesBeansYr5,
sum( if(  substr( `p`.`interview_date`, 1, 4 )= '2018', ((`b`.`beans_sold`)*(`b`.`beans_sold_price`)), 0 ) ) AS incrementalSalesBeansYr6
            FROM `tbl_frm6particulars` as `p`
            join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`)
            join `tbl_farmers` as `f` on (`f`.`tbl_farmersId` = `p`.`farmer_code`)
            join `tbl_district` as `d` on (`d`.`districtCode` = `f`.`farmersDistrict`)
            where `d`.`zone` = ".$region."", FALSE);

        $db_rows = $this->db->get();

        if ($db_rows->num_rows() > 0) {
            foreach ($db_rows->result() as $data) {
                $db_data_fetched_array[] = $data;
            }
            return $db_data_fetched_array;
        }
    }

function getIndicator14farmersByRegionCoffee($region)
    {
        $this->db->select("sum( if(  substr( `p`.`interview_date`, 1, 4 )= '2013', ((`c`.`coffee_sold`)*(`c`.`coffee_sold_price`)), 0 ) ) AS incrementalSalesCoffeeYr1,
sum( if(  substr( `p`.`interview_date`, 1, 4 )= '2014', ((`c`.`coffee_sold`)*(`c`.`coffee_sold_price`)), 0 ) ) AS incrementalSalesCoffeeYr2,
sum( if(  substr( `p`.`interview_date`, 1, 4 )= '2015', ((`c`.`coffee_sold`)*(`c`.`coffee_sold_price`)), 0 ) ) AS incrementalSalesCoffeeYr3,
sum( if(  substr( `p`.`interview_date`, 1, 4 )= '2016', ((`c`.`coffee_sold`)*(`c`.`coffee_sold_price`)), 0 ) ) AS incrementalSalesCoffeeYr4,
sum( if(  substr( `p`.`interview_date`, 1, 4 )= '2017', ((`c`.`coffee_sold`)*(`c`.`coffee_sold_price`)), 0 ) ) AS incrementalSalesCoffeeYr5,
sum( if(  substr( `p`.`interview_date`, 1, 4 )= '2018', ((`c`.`coffee_sold`)*(`c`.`coffee_sold_price`)), 0 ) ) AS incrementalSalesCoffeeYr6
            FROM `tbl_frm6particulars` as `p`
            join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patid`=`p`.`pk_patid`)
            join `tbl_farmers` as `f` on (`f`.`tbl_farmersId` = `p`.`farmer_code`)
            join `tbl_district` as `d` on (`d`.`districtCode` = `f`.`farmersDistrict`)
            where `d`.`zone` = ".$region."", FALSE);

        $db_rows = $this->db->get();

        if ($db_rows->num_rows() > 0) {
            foreach ($db_rows->result() as $data) {
                $db_data_fetched_array[] = $data;
            }
            return $db_data_fetched_array;
        }
    }

    function getIndicator14incrementalfactor()
    {
        
        $this->db->select("max(if(`p`.`financialYear`='2013',`p`.`extrapolationFactor`,1)) as exFactorYr1,
        max(if(`p`.`financialYear`='2014',`p`.`extrapolationFactor`,1)) as exFactorYr2,
        max(if(`p`.`financialYear`='2015',`p`.`extrapolationFactor`,1)) as exFactorYr3,
        max(if(`p`.`financialYear`='2016',`p`.`extrapolationFactor`,1)) as exFactorYr4,
        max(if(`p`.`financialYear`='2017',`p`.`extrapolationFactor`,1)) as exFactorYr5,
        max(if(`p`.`financialYear`='2018',`p`.`extrapolationFactor`,1)) as exFactorYr6 
        from `tbl_pmpextrapolation` as `p` order by `financialYear` asc", FALSE);

        $db_rows = $this->db->get();

        if ($db_rows->num_rows() > 0) {
            foreach ($db_rows->result() as $data) {
                $db_data_fetched_array[] = $data;
            }
            return $db_data_fetched_array;
        }
    }

    

    }
