<?php

/**
 * Created by PhpStorm.
 * User: aasiimwe
 * Date: 1/11/2016
 * Time: 3:52 PM
 */
class Dashindicatornine_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    function Indicator9north()
    {
        $this->db->select("sum( if( p.year = '2013', p.valueTotal, 0 ) ) AS North2013,
							sum( if( p.year = '2014', p.valueTotal, 0 ) ) AS North2014,
							sum( if( p.year = '2015', p.valueTotal, 0 ) ) AS North2015,
							sum( if( p.year = '2016', p.valueTotal, 0 ) ) AS North2016,
							sum( if( p.year = '2017', p.valueTotal, 0 ) ) AS North2017,
							sum( if( p.year = '2018', p.valueTotal, 0 ) ) AS North2018

							FROM `tbl_public_private_partnership` AS p,`tbl_traders` as t,`tbl_zone` as z 
							Where p.namePartner = t.traderName 
							and t.traderRegion = z.zoneCode 
							and z.zoneCode = 2 ", FALSE);

        $db_rows = $this->db->get();

        if ($db_rows->num_rows() > 0) {
            foreach ($db_rows->result() as $data) {
                $db_data_fetched_array[] = $data;
            }
            return $db_data_fetched_array;
        }
    }

    function Indicator9central()
    {
        $this->db->select("sum( if( p.year = '2013', p.valueTotal, 0 ) ) AS Central2013,
							sum( if( p.year = '2014', p.valueTotal, 0 ) ) AS Central2014,
							sum( if( p.year = '2015', p.valueTotal, 0 ) ) AS Central2015,
							sum( if( p.year = '2016', p.valueTotal, 0 ) ) AS Central2016,
							sum( if( p.year = '2017', p.valueTotal, 0 ) ) AS Central2017,
							sum( if( p.year = '2018', p.valueTotal, 0 ) ) AS Central2018

							FROM `tbl_public_private_partnership` AS p,`tbl_traders` as t,`tbl_zone` as z 
							Where p.namePartner = t.traderName 
							and t.traderRegion = z.zoneCode 
							and z.zoneCode = 1 ", FALSE);

        $db_rows_central = $this->db->get();

        if ($db_rows_central->num_rows() > 0) {
            foreach ($db_rows_central->result() as $data) {
                $db_data_fetched_array[] = $data;
            }
            return $db_data_fetched_array;
        }
    }

    function Indicator9east()
    {
        $this->db->select("sum( if( p.year = '2013', p.valueTotal, 0 ) ) AS East2013,
										sum( if( p.year = '2014', p.valueTotal, 0 ) ) AS East2014,
										sum( if( p.year = '2015', p.valueTotal, 0 ) ) AS East2015,
										sum( if( p.year = '2016', p.valueTotal, 0 ) ) AS East2016,
										sum( if( p.year = '2017', p.valueTotal, 0 ) ) AS East2017,
										sum( if( p.year = '2018', p.valueTotal, 0 ) ) AS East2018

										FROM `tbl_public_private_partnership` AS p,`tbl_traders` as t,`tbl_zone` as z 
										Where p.namePartner = t.traderName 
										and t.traderRegion = z.zoneCode 
										and z.zoneCode = 3 ", FALSE);

        $db_rows_east = $this->db->get();

        if ($db_rows_east->num_rows() > 0) {
            foreach ($db_rows_east->result() as $data) {
                $db_data_fetched_array[] = $data;
            }
            return $db_data_fetched_array;
        }
    }

    function Indicator9west()
    {
        $this->db->select("sum( if( p.year = '2013', p.valueTotal, 0 ) ) AS West2013,
										sum( if( p.year = '2014', p.valueTotal, 0 ) ) AS West2014,
										sum( if( p.year = '2015', p.valueTotal, 0 ) ) AS West2015,
										sum( if( p.year = '2016', p.valueTotal, 0 ) ) AS West2016,
										sum( if( p.year = '2017', p.valueTotal, 0 ) ) AS West2017,
										sum( if( p.year = '2018', p.valueTotal, 0 ) ) AS West2018

										FROM `tbl_public_private_partnership` AS p,`tbl_traders` as t,`tbl_zone` as z 
										Where p.namePartner = t.traderName 
										and t.traderRegion = z.zoneCode 
										and z.zoneCode = 4 ", FALSE);

        $db_rows_west = $this->db->get();

        if ($db_rows_west->num_rows() > 0) {
            foreach ($db_rows_west->result() as $data) {
                $db_data_fetched_array[] = $data;
            }
            return $db_data_fetched_array;
        }
    }

}
