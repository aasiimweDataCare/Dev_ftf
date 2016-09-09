<?php

/**
 * Created by PhpStorm.
 * User: aasiimwe
 * Date: 1/11/2016
 * Time: 3:52 PM
 */
class Dashindicatorfive_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    function indicator5_North()
    {
        $this->db->select("sum( if( substr( t.trainingDate, 1, 4 ) = '2013', 1, 0 ) ) as Ind5_N_Yr1,
                            sum( if( substr( t.trainingDate, 1, 4 ) = '2014', 1, 0 ) ) as Ind5_N_Yr2,
                            sum( if( substr( t.trainingDate, 1, 4 ) = '2015', 1, 0 ) ) as Ind5_N_Yr3,
                            sum( if( substr( t.trainingDate, 1, 4 ) = '2016', 1, 0 ) ) as Ind5_N_Yr4,
                            sum( if( substr( t.trainingDate, 1, 4 ) = '2017', 1, 0 ) ) as Ind5_N_Yr5,
                            sum( if( substr( t.trainingDate, 1, 4 ) = '2018', 1, 0 ) ) as Ind5_N_Yr6
                            from tbl_participants p  join tbl_training as t on (t.tbl_trainingId = p.trainingId),
                            tbl_district as d,
                            tbl_zone as z
                            where t.district = d.districtCode
                            and d.zone = z.zoneCode
                            and z.zoneCode = '2'", FALSE);

        $db_rows = $this->db->get();

        if ($db_rows->num_rows() > 0) {
            foreach ($db_rows->result() as $data) {
                $db_data_fetched_array[] = $data;
            }
            return $db_data_fetched_array;
        }
    }
    function indicator5_West()
    {
        $this->db->select("sum( if( substr( t.trainingDate, 1, 4 ) = '2013', 1, 0 ) ) as Ind5_W_Yr1,
                            sum( if( substr( t.trainingDate, 1, 4 ) = '2014', 1, 0 ) ) as Ind5_W_Yr2,
                            sum( if( substr( t.trainingDate, 1, 4 ) = '2015', 1, 0 ) ) as Ind5_W_Yr3,
                            sum( if( substr( t.trainingDate, 1, 4 ) = '2016', 1, 0 ) ) as Ind5_W_Yr4,
                            sum( if( substr( t.trainingDate, 1, 4 ) = '2017', 1, 0 ) ) as Ind5_W_Yr5,
                            sum( if( substr( t.trainingDate, 1, 4 ) = '2018', 1, 0 ) ) as Ind5_W_Yr6
                            from tbl_participants p  join tbl_training as t on (t.tbl_trainingId = p.trainingId),
                            tbl_district as d,
                            tbl_zone as z
                            where t.district = d.districtCode
                            and d.zone = z.zoneCode
                            and z.zoneCode = '4'", FALSE);

        $db_rows = $this->db->get();

        if ($db_rows->num_rows() > 0) {
            foreach ($db_rows->result() as $data) {
                $db_data_fetched_array[] = $data;
            }
            return $db_data_fetched_array;
        }
    }
    function indicator5_East()
    {
        $this->db->select("sum( if( substr( t.trainingDate, 1, 4 ) = '2013', 1, 0 ) ) as Ind5_E_Yr1,
                            sum( if( substr( t.trainingDate, 1, 4 ) = '2014', 1, 0 ) ) as Ind5_E_Yr2,
                            sum( if( substr( t.trainingDate, 1, 4 ) = '2015', 1, 0 ) ) as Ind5_E_Yr3,
                            sum( if( substr( t.trainingDate, 1, 4 ) = '2016', 1, 0 ) ) as Ind5_E_Yr4,
                            sum( if( substr( t.trainingDate, 1, 4 ) = '2017', 1, 0 ) ) as Ind5_E_Yr5,
                            sum( if( substr( t.trainingDate, 1, 4 ) = '2018', 1, 0 ) ) as Ind5_E_Yr6
                            from tbl_participants p  join tbl_training as t on (t.tbl_trainingId = p.trainingId),
                            tbl_district as d,
                            tbl_zone as z
                            where t.district = d.districtCode
                            and d.zone = z.zoneCode
                            and z.zoneCode = '3'", FALSE);

        $db_rows = $this->db->get();

        if ($db_rows->num_rows() > 0) {
            foreach ($db_rows->result() as $data) {
                $db_data_fetched_array[] = $data;
            }
            return $db_data_fetched_array;
        }
    }
    function indicator5_Central()
    {
        $this->db->select("sum( if( substr( t.trainingDate, 1, 4 ) = '2013', 1, 0 ) ) as Ind5_C_Yr1,
                            sum( if( substr( t.trainingDate, 1, 4 ) = '2014', 1, 0 ) ) as Ind5_C_Yr2,
                            sum( if( substr( t.trainingDate, 1, 4 ) = '2015', 1, 0 ) ) as Ind5_C_Yr3,
                            sum( if( substr( t.trainingDate, 1, 4 ) = '2016', 1, 0 ) ) as Ind5_C_Yr4,
                            sum( if( substr( t.trainingDate, 1, 4 ) = '2017', 1, 0 ) ) as Ind5_C_Yr5,
                            sum( if( substr( t.trainingDate, 1, 4 ) = '2018', 1, 0 ) ) as Ind5_C_Yr6
                            from tbl_participants p  join tbl_training as t on (t.tbl_trainingId = p.trainingId),
                            tbl_district as d,
                            tbl_zone as z
                            where t.district = d.districtCode
                            and d.zone = z.zoneCode
                            and z.zoneCode = '1'", FALSE);

        $db_rows = $this->db->get();

        if ($db_rows->num_rows() > 0) {
            foreach ($db_rows->result() as $data) {
                $db_data_fetched_array[] = $data;
            }
            return $db_data_fetched_array;
        }
    }


}
