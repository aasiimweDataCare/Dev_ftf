<?php

/**
 * Created by PhpStorm.
 * User: aasiimwe
 * Date: 1/13/2016
 * Time: 11:33 AM
 */
class Dashindicatorone_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    function getIndicator1traders()
    {
        $this->db->select("DISTINCT COUNT(*) as numTraders FROM `tbl_traders` where display='Yes' ", FALSE);

        $db_rows = $this->db->get();

        if ($db_rows->num_rows() > 0) {
            foreach ($db_rows->result() as $data) {
                $db_data_fetched_array[] = $data;
            }
            return $db_data_fetched_array;
        }
    }

    function getIndicator1exporters()
    {
        $this->db->select("DISTINCT COUNT(*) as numExporters FROM `tbl_exporters` where display='Yes' ", FALSE);

        $db_rows_small = $this->db->get();

        if ($db_rows_small->num_rows() > 0) {
            foreach ($db_rows_small->result() as $data) {
                $db_data_fetched_array[] = $data;
            }
            return $db_data_fetched_array;
        }
    }


    function getIndicator16Ruralhouseholds()
    {
        $this->db->select("sum( if( `f`.`year` = '2013', 1, 0 ) ) AS numNotNullHHYr1,
                                sum( if( `f`.`year` = '2014' , 1, 0 ) ) AS numNotNullHHYr2,
                                sum( if( `f`.`year` = '2015' , 1, 0 ) ) AS numNotNullHHYr3,
                                sum( if( `f`.`year` = '2016' , 1, 0 ) ) AS numNotNullHHYr4,
                                sum( if( `f`.`year` = '2017' , 1, 0 ) ) AS numNotNullHHYr5,
                                sum( if( `f`.`year` = '2018' , 1, 0 ) ) AS numNotNullHHYr6
                                FROM (SELECT distinct(hhName) as hhName, year,display
                                        FROM `tbl_farmers`
                                        ) as `f`  
                                where 27=27
                                ", FALSE);

        $db_rows_small = $this->db->get();

        if ($db_rows_small->num_rows() > 0) {
            foreach ($db_rows_small->result() as $data) {
                $db_data_fetched_array[] = $data;
            }

        }

        foreach ($db_data_fetched_array as $row) {

            $Yr1 = $row->numNotNullHHYr1;
            $Yr2 = $row->numNotNullHHYr2;
            $Yr3 = $row->numNotNullHHYr3;
            $Yr4 = $row->numNotNullHHYr4;
            $Yr5 = $row->numNotNullHHYr5;
            $Yr6 = $row->numNotNullHHYr6;
        }

        $result = $Yr1 + $Yr2 + $Yr3 + $Yr4 + $Yr5 + $Yr6;

        return $result;

    }


    function getIndicator24MSMEs()
    {
        $this->db->select("sum( if( `year` = '2013' and valueChain <>'', (actorServedFemale + actorServedMale), 0 ) )
         AS notrainedYr1,
                            sum( if( `year` = '2014' and valueChain <>'', (actorServedFemale + actorServedMale), 0 ) )
                             AS notrainedYr2,
                            sum( if( `year` = '2015' and valueChain <>'', (actorServedFemale + actorServedMale), 0 ) )
                             AS notrainedYr3,
                            sum( if( `year` = '2016' and valueChain <>'', (actorServedFemale + actorServedMale), 0 ) )
                             AS notrainedYr4,
                            sum( if( `year` = '2017' and valueChain <>'', (actorServedFemale + actorServedMale), 0 ) )
                             AS notrainedYr5,
                            sum( if( `year` = '2018' and valueChain <>'', (actorServedFemale + actorServedMale), 0 ) )
                             AS notrainedYr6
                            FROM `tbl_businessdev`", FALSE);

        $db_rows_small = $this->db->get();

        if ($db_rows_small->num_rows() > 0) {
            foreach ($db_rows_small->result() as $data) {
                $db_data_fetched_array[] = $data;
            }

        }

        foreach ($db_data_fetched_array as $row) {

            $MYr1 = $row->notrainedYr1;
            $MYr2 = $row->notrainedYr2;
            $MYr3 = $row->notrainedYr3;
            $MYr4 = $row->notrainedYr4;
            $MYr5 = $row->notrainedYr5;
            $MYr6 = $row->notrainedYr6;
        }

        $result = $MYr1 + $MYr2 + $MYr3 + $MYr4 + $MYr5 + $MYr6;

        return $result;

    }


    function getIndicator23Epayments()
    {
        $this->db->select("sum( if( `year` = '2013', (epayMade+epayRecieved), 0 ) ) AS epayMadeYr1,
                                sum( if( `year` = '2014', (epayMade+epayRecieved), 0 ) ) AS epayMadeYr2,
                                sum( if( `year` = '2015', (epayMade+epayRecieved), 0 ) ) AS epayMadeYr3,
                                sum( if( `year` = '2016', (epayMade+epayRecieved), 0 ) ) AS epayMadeYr4,
                                sum( if( `year` = '2017', (epayMade+epayRecieved), 0 ) ) AS epayMadeYr5,
                                sum( if( `year` = '2018', (epayMade+epayRecieved), 0 ) ) AS epayMadeYr6
                                FROM `tbl_form4_traders`", FALSE);

        $db_rows_small = $this->db->get();

        if ($db_rows_small->num_rows() > 0) {
            foreach ($db_rows_small->result() as $data) {
                $db_data_fetched_array[] = $data;
            }

        }

        foreach ($db_data_fetched_array as $row) {

            $epayMadeYr1 = $row->epayMadeYr1;
            $epayMadeYr2 = $row->epayMadeYr2;
            $epayMadeYr3 = $row->epayMadeYr3;
            $epayMadeYr4 = $row->epayMadeYr4;
            $epayMadeYr5 = $row->epayMadeYr5;
            $epayMadeYr6 = $row->epayMadeYr6;
        }


        $this->db->select("sum( if( `year` = '2013', (epayMade+epayRecieved), 0 ) ) AS epayMadeExportersYr1,
                                sum( if( `year` = '2014', (epayMade+epayRecieved), 0 ) ) AS epayMadeExportersYr2,
                                sum( if( `year` = '2015', (epayMade+epayRecieved), 0 ) ) AS epayMadeExportersYr3,
                                sum( if( `year` = '2016', (epayMade+epayRecieved), 0 ) ) AS epayMadeExportersYr4,
                                sum( if( `year` = '2017', (epayMade+epayRecieved), 0 ) ) AS epayMadeExportersYr5,
                                sum( if( `year` = '2018', (epayMade+epayRecieved), 0 ) ) AS epayMadeExportersYr6
                                FROM `tbl_form3_exporters`", FALSE);

        $db_rows_small_s = $this->db->get();

        if ($db_rows_small_s->num_rows() > 0) {
            foreach ($db_rows_small_s->result() as $data) {
                $db_data_fetched_array_s[] = $data;
            }

        }

        foreach ($db_data_fetched_array_s as $row) {

            $epayMadeExportersYr1 = $row->epayMadeExportersYr1;
            $epayMadeExportersYr2 = $row->epayMadeExportersYr2;
            $epayMadeExportersYr3 = $row->epayMadeExportersYr3;
            $epayMadeExportersYr4 = $row->epayMadeExportersYr4;
            $epayMadeExportersYr5 = $row->epayMadeExportersYr5;
            $epayMadeExportersYr6 = $row->epayMadeExportersYr6;
        }

        $result['notrainedYr1'] = $epayMadeExportersYr1 + $epayMadeYr1;
        $result['notrainedYr2'] = $epayMadeExportersYr2 + $epayMadeYr2;
        $result['notrainedYr3'] = $epayMadeExportersYr3 + $epayMadeYr3;
        $result['notrainedYr4'] = $epayMadeExportersYr4 + $epayMadeYr4;
        $result['notrainedYr5'] = $epayMadeExportersYr5 + $epayMadeYr5;
        $result['notrainedYr6'] = $epayMadeExportersYr6 + $epayMadeYr6;


        $resultAll = $result['notrainedYr1'] + $result['notrainedYr2'] + $result['notrainedYr3'] + $result['notrainedYr4'] + $result['notrainedYr5'] + $result['notrainedYr6'];

        return $resultAll;

    }

    function getIndicator23EpaymentsT()
    {
        $this->db->select("sum( if( `year` = '2013', (epayMade+epayRecieved), 0 ) ) AS epayMadeYr1,
                                sum( if( `year` = '2014', (epayMade+epayRecieved), 0 ) ) AS epayMadeYr2,
                                sum( if( `year` = '2015', (epayMade+epayRecieved), 0 ) ) AS epayMadeYr3,
                                sum( if( `year` = '2016', (epayMade+epayRecieved), 0 ) ) AS epayMadeYr4,
                                sum( if( `year` = '2017', (epayMade+epayRecieved), 0 ) ) AS epayMadeYr5,
                                sum( if( `year` = '2018', (epayMade+epayRecieved), 0 ) ) AS epayMadeYr6
                                FROM `tbl_form4_traders`", FALSE);

        $db_rows_small = $this->db->get();

        if ($db_rows_small->num_rows() > 0) {
            foreach ($db_rows_small->result() as $data) {
                $db_data_fetched_array[] = $data;
            }

        }

        foreach ($db_data_fetched_array as $row) {

            $epayMadeYr1 = $row->epayMadeYr1;
            $epayMadeYr2 = $row->epayMadeYr2;
            $epayMadeYr3 = $row->epayMadeYr3;
            $epayMadeYr4 = $row->epayMadeYr4;
            $epayMadeYr5 = $row->epayMadeYr5;
            $epayMadeYr6 = $row->epayMadeYr6;
        }


        $result['notrainedYr1'] = $epayMadeYr1;
        $result['notrainedYr2'] = $epayMadeYr2;
        $result['notrainedYr3'] = $epayMadeYr3;
        $result['notrainedYr4'] = $epayMadeYr4;
        $result['notrainedYr5'] = $epayMadeYr5;
        $result['notrainedYr6'] = $epayMadeYr6;


        $resultAll = $result['notrainedYr1'] + $result['notrainedYr2'] + $result['notrainedYr3'] + $result['notrainedYr4'] + $result['notrainedYr5'] + $result['notrainedYr6'];

        return $resultAll;

    }


    function getIndicator23EpaymentsE()
    {
        $this->db->select("sum( if( `year` = '2013', (epayMade+epayRecieved), 0 ) ) AS epayMadeExportersYr1,
                                sum( if( `year` = '2014', (epayMade+epayRecieved), 0 ) ) AS epayMadeExportersYr2,
                                sum( if( `year` = '2015', (epayMade+epayRecieved), 0 ) ) AS epayMadeExportersYr3,
                                sum( if( `year` = '2016', (epayMade+epayRecieved), 0 ) ) AS epayMadeExportersYr4,
                                sum( if( `year` = '2017', (epayMade+epayRecieved), 0 ) ) AS epayMadeExportersYr5,
                                sum( if( `year` = '2018', (epayMade+epayRecieved), 0 ) ) AS epayMadeExportersYr6
                                FROM `tbl_form3_exporters`", FALSE);

        $db_rows_small_s = $this->db->get();

        if ($db_rows_small_s->num_rows() > 0) {
            foreach ($db_rows_small_s->result() as $data) {
                $db_data_fetched_array_s[] = $data;
            }

        }

        foreach ($db_data_fetched_array_s as $row) {

            $epayMadeExportersYr1 = $row->epayMadeExportersYr1;
            $epayMadeExportersYr2 = $row->epayMadeExportersYr2;
            $epayMadeExportersYr3 = $row->epayMadeExportersYr3;
            $epayMadeExportersYr4 = $row->epayMadeExportersYr4;
            $epayMadeExportersYr5 = $row->epayMadeExportersYr5;
            $epayMadeExportersYr6 = $row->epayMadeExportersYr6;
        }

        $result['notrainedYr1'] = $epayMadeExportersYr1;
        $result['notrainedYr2'] = $epayMadeExportersYr2;
        $result['notrainedYr3'] = $epayMadeExportersYr3;
        $result['notrainedYr4'] = $epayMadeExportersYr4;
        $result['notrainedYr5'] = $epayMadeExportersYr5;
        $result['notrainedYr6'] = $epayMadeExportersYr6;


        $resultAll = $result['notrainedYr1'] + $result['notrainedYr2'] + $result['notrainedYr3'] + $result['notrainedYr4'] + $result['notrainedYr5'] + $result['notrainedYr6'];

        return $resultAll;

    }


    function getIndicator12MarketPrices()
    {
        $this->db->select("* FROM `tbl_market_prices` where `Date_Changed` = (
            SELECT MAX(Date_Changed)
            FROM tbl_market_prices
        )", FALSE);

        $db_rows = $this->db->get();

        if ($db_rows->num_rows() > 0) {
            foreach ($db_rows->result() as $data) {
                $db_data_fetched_array[] = $data;
            }
            return $db_data_fetched_array;
        }
    }

    function getIndicatorActivityLifeTime($indicator_id)
    {
        $this->db->select("* FROM `tbl_dashboard_activity_lifetime`
           where indicator_id =" . $indicator_id, FALSE);

        $db_rows = $this->db->get();

        if ($db_rows->num_rows() > 0) {
            foreach ($db_rows->result() as $data) {
                $db_data_fetched_array[] = $data;
            }
            return $db_data_fetched_array;
        }
    }


     function getIndicator15Youth()
    {

        $this->db->select("26 as indicator_id,
                                sum( if( `year` = '2013', num_youthAttachedTotalNew+num_youthAttachedTotalOld, 0 ) ) AS notrainedYr1,
                                sum( if( `year` = '2014', num_youthAttachedTotalNew+num_youthAttachedTotalOld, 0 ) ) AS notrainedYr2,
                                sum( if( `year` = '2015', num_youthAttachedTotalNew+num_youthAttachedTotalOld, 0 ) ) AS notrainedYr3,
                                sum( if( `year` = '2016', num_youthAttachedTotalNew+num_youthAttachedTotalOld, 0 ) ) AS notrainedYr4,
                                sum( if( `year` = '2017', num_youthAttachedTotalNew+num_youthAttachedTotalOld, 0 ) ) AS notrainedYr5,
                                sum( if( `year` = '2018', num_youthAttachedTotalNew+num_youthAttachedTotalOld, 0 ) ) AS notrainedYr6
                                FROM `tbl_youthapprentice` where 26=26", FALSE);

        $db_rows = $this->db->get();

        if ($db_rows->num_rows() > 0) {
            foreach ($db_rows->result() as $data) {
                $db_data_fetched_array[] = $data;
            }
            
        }

        foreach ($db_data_fetched_array as $row) {

            $Yr1 = $row->notrainedYr1;
            $Yr2 = $row->notrainedYr2;
            $Yr3 = $row->notrainedYr3;
            $Yr4 = $row->notrainedYr4;
            $Yr5 = $row->notrainedYr5;
            $Yr6 = $row->notrainedYr6;
        }

        $result['notrainedYr1'] = $Yr1;
        $result['notrainedYr2'] = $Yr2;
        $result['notrainedYr3'] = $Yr3;
        $result['notrainedYr4'] = $Yr4;
        $result['notrainedYr5'] = $Yr5;
        $result['notrainedYr6'] = $Yr6;


        $resultAll = $result['notrainedYr1'] + $result['notrainedYr2'] + $result['notrainedYr3'] + $result['notrainedYr4'] + $result['notrainedYr5'] + $result['notrainedYr6'];

        return $resultAll;
    }


}
