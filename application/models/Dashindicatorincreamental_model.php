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

    function getIndicator14farmersSales($resultValue)
    {

        //--------From 6 Maize---------------------------
        $this->db->select("14 as indicator_id,
                                sum( if( substr( `p`.`interview_date`, 1, 4 ) = '2013', ((`m`.`maize_sold`)*(`m`.`maize_sold_price`)), 0 ) ) AS incrementalSalesMaizeYr1,
                                sum( if( substr( `p`.`interview_date`, 1, 4 ) = '2014', ((`m`.`maize_sold`)*(`m`.`maize_sold_price`)), 0 ) ) AS incrementalSalesMaizeYr2,
                                sum( if( substr( `p`.`interview_date`, 1, 4 ) = '2015', ((`m`.`maize_sold`)*(`m`.`maize_sold_price`)), 0 ) ) AS incrementalSalesMaizeYr3,
                                sum( if( substr( `p`.`interview_date`, 1, 4 ) = '2016', ((`m`.`maize_sold`)*(`m`.`maize_sold_price`)), 0 ) ) AS incrementalSalesMaizeYr4,
                                sum( if( substr( `p`.`interview_date`, 1, 4 ) = '2017', ((`m`.`maize_sold`)*(`m`.`maize_sold_price`)), 0 ) ) AS incrementalSalesMaizeYr5,
                                sum( if( substr( `p`.`interview_date`, 1, 4 ) = '2018', ((`m`.`maize_sold`)*(`m`.`maize_sold_price`)), 0 ) ) AS incrementalSalesMaizeYr6
                                FROM `tbl_frm6particulars` as `p`
                                join `tbl_frm6production_maize` as `m` on (`m`.`fk_patid`=`p`.`pk_patid`)
                                where 14=14
                                and `p`.`interview_date` not between ('2013-01-01') and ('2015-03-31')", FALSE);
        $db_rows_maize = $this->db->get();
        if ($db_rows_maize->num_rows() > 0) {
            foreach ($db_rows_maize->result() as $data) {
                $db_data_fetched_array_maize[] = $data;
            }

        }

        foreach ($db_data_fetched_array_maize as $row) {

            $incrementalSalesMaizeYr1 = $row->incrementalSalesMaizeYr1;
            $incrementalSalesMaizeYr2 = $row->incrementalSalesMaizeYr2;
            $incrementalSalesMaizeYr3 = $row->incrementalSalesMaizeYr3;
            $incrementalSalesMaizeYr4 = $row->incrementalSalesMaizeYr4;
            $incrementalSalesMaizeYr5 = $row->incrementalSalesMaizeYr5;
            $incrementalSalesMaizeYr6 = $row->incrementalSalesMaizeYr6;
        }


        //=====================Form 6 Beans==============
        $this->db->select("14 as indicator_id,
                                sum( if( substr( `p`.`interview_date`, 1, 4 ) = '2013', ((`m`.`beans_sold`)*(`m`.`beans_sold_price`)), 0 ) ) AS incrementalSalesBeansYr1,
                                sum( if( substr( `p`.`interview_date`, 1, 4 ) = '2014', ((`m`.`beans_sold`)*(`m`.`beans_sold_price`)), 0 ) ) AS incrementalSalesBeansYr2,
                                sum( if( substr( `p`.`interview_date`, 1, 4 ) = '2015', ((`m`.`beans_sold`)*(`m`.`beans_sold_price`)), 0 ) ) AS incrementalSalesBeansYr3,
                                sum( if( substr( `p`.`interview_date`, 1, 4 ) = '2016', ((`m`.`beans_sold`)*(`m`.`beans_sold_price`)), 0 ) ) AS incrementalSalesBeansYr4,
                                sum( if( substr( `p`.`interview_date`, 1, 4 ) = '2017', ((`m`.`beans_sold`)*(`m`.`beans_sold_price`)), 0 ) ) AS incrementalSalesBeansYr5,
                                sum( if( substr( `p`.`interview_date`, 1, 4 ) = '2018', ((`m`.`beans_sold`)*(`m`.`beans_sold_price`)), 0 ) ) AS incrementalSalesBeansYr6
                                FROM `tbl_frm6particulars` as `p`
                                join `tbl_frm6production_beans` as `m` on (`m`.`fk_patid`=`p`.`pk_patid`)
                                where 14=14
                                and `p`.`interview_date` not between ('2013-01-01') and ('2015-03-31')", FALSE);


        $db_rows_beans = $this->db->get();
        if ($db_rows_beans->num_rows() > 0) {
            foreach ($db_rows_beans->result() as $data) {
                $db_data_fetched_array_beans[] = $data;
            }

        }
        foreach ($db_data_fetched_array_beans as $row_beans) {


            $incrementalSalesBeansYr1 = $row_beans->incrementalSalesBeansYr1;
            $incrementalSalesBeansYr2 = $row_beans->incrementalSalesBeansYr2;
            $incrementalSalesBeansYr3 = $row_beans->incrementalSalesBeansYr3;
            $incrementalSalesBeansYr4 = $row_beans->incrementalSalesBeansYr4;
            $incrementalSalesBeansYr5 = $row_beans->incrementalSalesBeansYr5;
            $incrementalSalesBeansYr6 = $row_beans->incrementalSalesBeansYr6;

        }


        //=====================Form 6 Coffee==============
        $this->db->select("14 as indicator_id,
                                sum( if( substr( `p`.`interview_date`, 1, 4 ) = '2013', ((`m`.`coffee_sold`)*(`m`.`coffee_sold_price`)), 0 ) ) AS incrementalSalesCoffeeYr1,
                                sum( if( substr( `p`.`interview_date`, 1, 4 ) = '2014', ((`m`.`coffee_sold`)*(`m`.`coffee_sold_price`)), 0 ) ) AS incrementalSalesCoffeeYr2,
                                sum( if( substr( `p`.`interview_date`, 1, 4 ) = '2015', ((`m`.`coffee_sold`)*(`m`.`coffee_sold_price`)), 0 ) ) AS incrementalSalesCoffeeYr3,
                                sum( if( substr( `p`.`interview_date`, 1, 4 ) = '2016', ((`m`.`coffee_sold`)*(`m`.`coffee_sold_price`)), 0 ) ) AS incrementalSalesCoffeeYr4,
                                sum( if( substr( `p`.`interview_date`, 1, 4 ) = '2017', ((`m`.`coffee_sold`)*(`m`.`coffee_sold_price`)), 0 ) ) AS incrementalSalesCoffeeYr5,
                                sum( if( substr( `p`.`interview_date`, 1, 4 ) = '2018', ((`m`.`coffee_sold`)*(`m`.`coffee_sold_price`)), 0 ) ) AS incrementalSalesCoffeeYr6
                                FROM `tbl_frm6particulars` as `p`
                                join `tbl_frm6production_coffee` as `m` on (`m`.`fk_patid`=`p`.`pk_patid`)
                                where 14=14
                                and `p`.`interview_date` not between ('2013-01-01') and ('2015-03-31')", FALSE);

        $db_rows_coffee = $this->db->get();

        if ($db_rows_coffee->num_rows() > 0) {
            foreach ($db_rows_coffee->result() as $data) {
                $db_data_fetched_array_coffee[] = $data;
            }

        }
        foreach ($db_data_fetched_array_coffee as $db_rows_coffee) {


            $incrementalSalesCoffeeYr1 = $db_rows_coffee->incrementalSalesCoffeeYr1;
            $incrementalSalesCoffeeYr2 = $db_rows_coffee->incrementalSalesCoffeeYr2;
            $incrementalSalesCoffeeYr3 = $db_rows_coffee->incrementalSalesCoffeeYr3;
            $incrementalSalesCoffeeYr4 = $db_rows_coffee->incrementalSalesCoffeeYr4;
            $incrementalSalesCoffeeYr5 = $db_rows_coffee->incrementalSalesCoffeeYr5;
            $incrementalSalesCoffeeYr6 = $db_rows_coffee->incrementalSalesCoffeeYr6;


        }

        //Include incremental factor...

        $st = $this->ExtrapolationFactor(14);
        $this->db->select($st, FALSE);
        $db_rows = $this->db->get();
        if ($db_rows->num_rows() > 0) {
            foreach ($db_rows->result() as $data) {
                $resultExt[] = $data;
            }

        }
        foreach ($resultExt as $row) {
            $extrapolationFactorYr1 = $row->exFactorYr1;
            $extrapolationFactorYr2 = $row->exFactorYr2;
            $extrapolationFactorYr3 = $row->exFactorYr3;
            $extrapolationFactorYr4 = $row->exFactorYr4;
            $extrapolationFactorYr5 = $row->exFactorYr5;
            $extrapolationFactorYr6 = $row->exFactorYr6;
        }


        $result['notrainedYr1'] = ($extrapolationFactorYr1 * $this->convertShillingsToDollars($incrementalSalesMaizeYr1 + $incrementalSalesBeansYr1 + $incrementalSalesCoffeeYr1));
        $result['notrainedYr2'] = ($extrapolationFactorYr2 * $this->convertShillingsToDollars($incrementalSalesMaizeYr2 + $incrementalSalesBeansYr2 + $incrementalSalesCoffeeYr2));
        $result['notrainedYr3'] = ($extrapolationFactorYr3 * $this->convertShillingsToDollars($incrementalSalesMaizeYr3 + $incrementalSalesBeansYr3 + $incrementalSalesCoffeeYr3));
        $result['notrainedYr4'] = ($extrapolationFactorYr4 * $this->convertShillingsToDollars($incrementalSalesMaizeYr4 + $incrementalSalesBeansYr4 + $incrementalSalesCoffeeYr4));
        $result['notrainedYr5'] = ($extrapolationFactorYr5 * $this->convertShillingsToDollars($incrementalSalesMaizeYr5 + $incrementalSalesBeansYr5 + $incrementalSalesCoffeeYr5));
        $result['notrainedYr6'] = ($extrapolationFactorYr6 * $this->convertShillingsToDollars($incrementalSalesMaizeYr6 + $incrementalSalesBeansYr6 + $incrementalSalesCoffeeYr6));

        return $result[$resultValue];

    }

    function ExtrapolationFactor($indicatorId)
    {

//Getting the Extrapolation across the LOA
        $query_string = "
        max(if(`p`.`financialYear`='2013',`p`.`extrapolationFactor`,1)) as exFactorYr1,
        max(if(`p`.`financialYear`='2014',`p`.`extrapolationFactor`,1)) as exFactorYr2,
        max(if(`p`.`financialYear`='2015',`p`.`extrapolationFactor`,1)) as exFactorYr3,
        max(if(`p`.`financialYear`='2016',`p`.`extrapolationFactor`,1)) as exFactorYr4,
        max(if(`p`.`financialYear`='2017',`p`.`extrapolationFactor`,1)) as exFactorYr5,
        max(if(`p`.`financialYear`='2018',`p`.`extrapolationFactor`,1)) as exFactorYr6
        FROM `tbl_pmpextrapolation` AS `p`
        order by `p`.`financialYear` asc";

        return ($query_string);
    }

    public function convertShillingsToDollars($amount)
    {
        //1USD =2500Shs

        $result = ($amount / 2500);
        return $result;

    }


    

    

    }
