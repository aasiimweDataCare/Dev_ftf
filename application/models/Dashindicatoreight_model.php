<?php

/**
 * Created by PhpStorm.
 * User: aasiimwe
 * Date: 1/11/2016
 * Time: 3:52 PM
 */
class Dashindicatoreight_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    function Indicator8micro()
    {
        $this->db->select("sum( if( tbl_bankloans.year = '2013' and tbl_bankloans.nameMSME <>'', tbl_bankloans.amountLoanAccessed, 0 ) ) AS numYr1,
								sum( if( tbl_bankloans.year = '2014' and tbl_bankloans.nameMSME <>'', tbl_bankloans.amountLoanAccessed, 0 ) ) AS numYr2,
								sum( if( tbl_bankloans.year = '2015' and tbl_bankloans.nameMSME <>'', tbl_bankloans.amountLoanAccessed, 0 ) ) AS numYr3,
								sum( if( tbl_bankloans.year = '2016' and tbl_bankloans.nameMSME <>'', tbl_bankloans.amountLoanAccessed, 0 ) ) AS numYr4,
								sum( if( tbl_bankloans.year = '2017' and tbl_bankloans.nameMSME <>'', tbl_bankloans.amountLoanAccessed, 0 ) ) AS numYr5,
								sum( if( tbl_bankloans.year = '2018' and tbl_bankloans.nameMSME <>'', tbl_bankloans.amountLoanAccessed, 0 ) ) AS numYr6
								FROM tbl_bankloans 
								where tbl_bankloans.numberOfFullTimeEmployees <=> 0", FALSE);

        $db_rows = $this->db->get();

        if ($db_rows->num_rows() > 0) {
            foreach ($db_rows->result() as $data) {
                $db_data_fetched_array[] = $data;
            }
            return $db_data_fetched_array;
        }
    }

    function Indicator8small()
    {
        $this->db->select("sum( if( tbl_bankloans.year = '2013' and tbl_bankloans.nameMSME <>'', tbl_bankloans.amountLoanAccessed, 0 ) ) AS numYr1,
								sum( if( tbl_bankloans.year = '2014' and tbl_bankloans.nameMSME <>'', tbl_bankloans.amountLoanAccessed, 0 ) ) AS numYr2,
								sum( if( tbl_bankloans.year = '2015' and tbl_bankloans.nameMSME <>'', tbl_bankloans.amountLoanAccessed, 0 ) ) AS numYr3,
								sum( if( tbl_bankloans.year = '2016' and tbl_bankloans.nameMSME <>'', tbl_bankloans.amountLoanAccessed, 0 ) ) AS numYr4,
								sum( if( tbl_bankloans.year = '2017' and tbl_bankloans.nameMSME <>'', tbl_bankloans.amountLoanAccessed, 0 ) ) AS numYr5,
								sum( if( tbl_bankloans.year = '2018' and tbl_bankloans.nameMSME <>'', tbl_bankloans.amountLoanAccessed, 0 ) ) AS numYr6
								FROM tbl_bankloans 
								where tbl_bankloans.numberOfFullTimeEmployees between 1 and 5", FALSE);

        $db_rows_small = $this->db->get();

        if ($db_rows_small->num_rows() > 0) {
            foreach ($db_rows_small->result() as $data) {
                $db_data_fetched_array[] = $data;
            }
            return $db_data_fetched_array;
        }
    }

    function Indicator8medium()
    {
        $this->db->select("sum( if( tbl_bankloans.year = '2013' and tbl_bankloans.nameMSME <>'', tbl_bankloans.amountLoanAccessed, 0 ) ) AS numYr1,
								sum( if( tbl_bankloans.year = '2014' and tbl_bankloans.nameMSME <>'', tbl_bankloans.amountLoanAccessed, 0 ) ) AS numYr2,
								sum( if( tbl_bankloans.year = '2015' and tbl_bankloans.nameMSME <>'', tbl_bankloans.amountLoanAccessed, 0 ) ) AS numYr3,
								sum( if( tbl_bankloans.year = '2016' and tbl_bankloans.nameMSME <>'', tbl_bankloans.amountLoanAccessed, 0 ) ) AS numYr4,
								sum( if( tbl_bankloans.year = '2017' and tbl_bankloans.nameMSME <>'', tbl_bankloans.amountLoanAccessed, 0 ) ) AS numYr5,
								sum( if( tbl_bankloans.year = '2018' and tbl_bankloans.nameMSME <>'', tbl_bankloans.amountLoanAccessed, 0 ) ) AS numYr6
								FROM tbl_bankloans 
								where tbl_bankloans.numberOfFullTimeEmployees between 6 and 10", FALSE);

        $db_rows_medium = $this->db->get();

        if ($db_rows_medium->num_rows() > 0) {
            foreach ($db_rows_medium->result() as $data) {
                $db_data_fetched_array[] = $data;
            }
            return $db_data_fetched_array;
        }
    }

}
