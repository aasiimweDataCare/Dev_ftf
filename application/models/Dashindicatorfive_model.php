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
        $this->db->select("sum( if( t.trainingDate between ('2012-10-01') and ('2013-09-30'), 1, 0 ) ) AS Ind5_N_Yr1,
							sum( if( t.trainingDate between ('2013-10-01') and ('2014-09-30'), 1, 0 ) ) AS Ind5_N_Yr2,
							sum( if( t.trainingDate between ('2014-10-01') and ('2015-09-30'), 1, 0 ) ) AS Ind5_N_Yr3,
							sum( if( t.trainingDate between ('2015-10-01') and ('2016-09-30'), 1, 0 ) ) AS Ind5_N_Yr4,
							sum( if( t.trainingDate between ('2016-10-01') and ('2017-09-30'), 1, 0 ) ) AS Ind5_N_Yr5,
							sum( if( t.trainingDate between ('2017-10-01') and ('2018-09-30'), 1, 0 ) ) AS Ind5_N_Yr6
							FROM `tbl_participants` p
							JOIN tbl_training t ON ( t.tbl_trainingId = p.`trainingId` ),
							tbl_district as d,
							tbl_zone as z
							where t.district = d.districtCode
							and d.zone = z.zoneCode
							and z.zoneCode = '2'
							and p.display='Yes'", FALSE);

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
        $this->db->select("sum( if( t.trainingDate between ('2012-10-01') and ('2013-09-30'), 1, 0 ) ) AS Ind5_W_Yr1,
							sum( if( t.trainingDate between ('2013-10-01') and ('2014-09-30'), 1, 0 ) ) AS Ind5_W_Yr2,
							sum( if( t.trainingDate between ('2014-10-01') and ('2015-09-30'), 1, 0 ) ) AS Ind5_W_Yr3,
							sum( if( t.trainingDate between ('2015-10-01') and ('2016-09-30'), 1, 0 ) ) AS Ind5_W_Yr4,
							sum( if( t.trainingDate between ('2016-10-01') and ('2017-09-30'), 1, 0 ) ) AS Ind5_W_Yr5,
							sum( if( t.trainingDate between ('2017-10-01') and ('2018-09-30'), 1, 0 ) ) AS Ind5_W_Yr6
							FROM `tbl_participants` p
							JOIN tbl_training t ON ( t.tbl_trainingId = p.`trainingId` ),
							tbl_district as d,
							tbl_zone as z
							where t.district = d.districtCode
							and d.zone = z.zoneCode
							and z.zoneCode = '4'
							and p.display='Yes'", FALSE);

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
        $this->db->select("sum( if( t.trainingDate between ('2012-10-01') and ('2013-09-30'), 1, 0 ) ) AS Ind5_E_Yr1,
							sum( if( t.trainingDate between ('2013-10-01') and ('2014-09-30'), 1, 0 ) ) AS Ind5_E_Yr2,
							sum( if( t.trainingDate between ('2014-10-01') and ('2015-09-30'), 1, 0 ) ) AS Ind5_E_Yr3,
							sum( if( t.trainingDate between ('2015-10-01') and ('2016-09-30'), 1, 0 ) ) AS Ind5_E_Yr4,
							sum( if( t.trainingDate between ('2016-10-01') and ('2017-09-30'), 1, 0 ) ) AS Ind5_E_Yr5,
							sum( if( t.trainingDate between ('2017-10-01') and ('2018-09-30'), 1, 0 ) ) AS Ind5_E_Yr6
							FROM `tbl_participants` p
							JOIN tbl_training t ON ( t.tbl_trainingId = p.`trainingId` ),
							tbl_district as d,
							tbl_zone as z
							where t.district = d.districtCode
							and d.zone = z.zoneCode
							and z.zoneCode = '3'
							and p.display='Yes'", FALSE);

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
        $this->db->select("sum( if( t.trainingDate between ('2012-10-01') and ('2013-09-30'), 1, 0 ) ) AS Ind5_C_Yr1,
							sum( if( t.trainingDate between ('2013-10-01') and ('2014-09-30'), 1, 0 ) ) AS Ind5_C_Yr2,
							sum( if( t.trainingDate between ('2014-10-01') and ('2015-09-30'), 1, 0 ) ) AS Ind5_C_Yr3,
							sum( if( t.trainingDate between ('2015-10-01') and ('2016-09-30'), 1, 0 ) ) AS Ind5_C_Yr4,
							sum( if( t.trainingDate between ('2016-10-01') and ('2017-09-30'), 1, 0 ) ) AS Ind5_C_Yr5,
							sum( if( t.trainingDate between ('2017-10-01') and ('2018-09-30'), 1, 0 ) ) AS Ind5_C_Yr6
							FROM `tbl_participants` p
							JOIN tbl_training t ON ( t.tbl_trainingId = p.`trainingId` ),
							tbl_district as d,
							tbl_zone as z
							where t.district = d.districtCode
							and d.zone = z.zoneCode
							and z.zoneCode = '1'
							and p.display='Yes'", FALSE);

        $db_rows = $this->db->get();

        if ($db_rows->num_rows() > 0) {
            foreach ($db_rows->result() as $data) {
                $db_data_fetched_array[] = $data;
            }
            return $db_data_fetched_array;
        }
    }


    function getindicator5_Male($region)
    {
        $this->db->select("sum( if( t.trainingDate between ('2012-10-01') and ('2013-09-30'), 1, 0 ) ) AS Ind5_C_Yr1,
							sum( if( t.trainingDate between ('2013-10-01') and ('2014-09-30'), 1, 0 ) ) AS Ind5_C_Yr2,
							sum( if( t.trainingDate between ('2014-10-01') and ('2015-09-30'), 1, 0 ) ) AS Ind5_C_Yr3,
							sum( if( t.trainingDate between ('2015-10-01') and ('2016-09-30'), 1, 0 ) ) AS Ind5_C_Yr4,
							sum( if( t.trainingDate between ('2016-10-01') and ('2017-09-30'), 1, 0 ) ) AS Ind5_C_Yr5,
							sum( if( t.trainingDate between ('2017-10-01') and ('2018-09-30'), 1, 0 ) ) AS Ind5_C_Yr6
							FROM `tbl_participants` p
							JOIN tbl_training t ON ( t.tbl_trainingId = p.`trainingId` ),
							tbl_district as d,
							tbl_zone as z
							where t.district = d.districtCode
							and d.zone = z.zoneCode
							and p.sex = 'Male'
							and z.zoneCode = " . $region . "
							and p.display='Yes'", FALSE);

        $db_rows = $this->db->get();

        if ($db_rows->num_rows() > 0) {
            foreach ($db_rows->result() as $data) {
                $db_data_fetched_array[] = $data;
            }

        }

        foreach ($db_data_fetched_array as $row) {

            $eInd5_C_Yr1 = $row->Ind5_C_Yr1;
            $eInd5_C_Yr2 = $row->Ind5_C_Yr2;
            $eInd5_C_Yr3 = $row->Ind5_C_Yr3;
            $eInd5_C_Yr4 = $row->Ind5_C_Yr4;
            $eInd5_C_Yr5 = $row->Ind5_C_Yr5;
            $eInd5_C_Yr6 = $row->Ind5_C_Yr6;
        }

        $resultx['Ind5_C_Yr1'] = $eInd5_C_Yr1;
        $resultx['Ind5_C_Yr2'] = $eInd5_C_Yr2;
        $resultx['Ind5_C_Yr3'] = $eInd5_C_Yr3;
        $resultx['Ind5_C_Yr4'] = $eInd5_C_Yr4;
        $resultx['Ind5_C_Yr5'] = $eInd5_C_Yr5;
        $resultx['Ind5_C_Yr6'] = $eInd5_C_Yr6;

        return $resultx;
    }

    function getindicator5_Female($region)
    {
        $this->db->select("sum( if( t.trainingDate between ('2012-10-01') and ('2013-09-30'), 1, 0 ) ) AS Ind5_C_Yr1,
							sum( if( t.trainingDate between ('2013-10-01') and ('2014-09-30'), 1, 0 ) ) AS Ind5_C_Yr2,
							sum( if( t.trainingDate between ('2014-10-01') and ('2015-09-30'), 1, 0 ) ) AS Ind5_C_Yr3,
							sum( if( t.trainingDate between ('2015-10-01') and ('2016-09-30'), 1, 0 ) ) AS Ind5_C_Yr4,
							sum( if( t.trainingDate between ('2016-10-01') and ('2017-09-30'), 1, 0 ) ) AS Ind5_C_Yr5,
							sum( if( t.trainingDate between ('2017-10-01') and ('2018-09-30'), 1, 0 ) ) AS Ind5_C_Yr6
							FROM `tbl_participants` p
							JOIN tbl_training t ON ( t.tbl_trainingId = p.`trainingId` ),
							tbl_district as d,
							tbl_zone as z
							where t.district = d.districtCode
							and d.zone = z.zoneCode
							and p.sex = 'Female'
							and z.zoneCode = " . $region . "
							and p.display='Yes'", FALSE);

        $db_rows = $this->db->get();

        if ($db_rows->num_rows() > 0) {
            foreach ($db_rows->result() as $data) {
                $db_data_fetched_array[] = $data;
            }

        }

        foreach ($db_data_fetched_array as $row) {

            $eInd5_C_Yr1 = $row->Ind5_C_Yr1;
            $eInd5_C_Yr2 = $row->Ind5_C_Yr2;
            $eInd5_C_Yr3 = $row->Ind5_C_Yr3;
            $eInd5_C_Yr4 = $row->Ind5_C_Yr4;
            $eInd5_C_Yr5 = $row->Ind5_C_Yr5;
            $eInd5_C_Yr6 = $row->Ind5_C_Yr6;
        }

        $resultx['Ind5_C_Yr1'] = $eInd5_C_Yr1;
        $resultx['Ind5_C_Yr2'] = $eInd5_C_Yr2;
        $resultx['Ind5_C_Yr3'] = $eInd5_C_Yr3;
        $resultx['Ind5_C_Yr4'] = $eInd5_C_Yr4;
        $resultx['Ind5_C_Yr5'] = $eInd5_C_Yr5;
        $resultx['Ind5_C_Yr6'] = $eInd5_C_Yr6;

        return $resultx;
    }


    function indicator5_Regionform8($region)
    {


        $this->db->select("sum( if( `d`.`year` = '2013', `d`.`numTotalPlotA` + `d`.`numTotalPlotB` + `d`.`numTotalPlotC` + `d`.`numTotalPlotD`, 0 ) ) AS notrainedDemoYr1,
                                sum( if( `d`.`year` = '2014', `d`.`numTotalPlotA` + `d`.`numTotalPlotB` + `d`.`numTotalPlotC` + `d`.`numTotalPlotD`, 0 ) ) AS notrainedDemoYr2,
                                sum( if( `d`.`year` = '2015', `d`.`numTotalPlotA` + `d`.`numTotalPlotB` + `d`.`numTotalPlotC` + `d`.`numTotalPlotD`, 0 ) ) AS notrainedDemoYr3,
                                sum( if( `d`.`year` = '2016', `d`.`numTotalPlotA` + `d`.`numTotalPlotB` + `d`.`numTotalPlotC` + `d`.`numTotalPlotD`, 0 ) ) AS notrainedDemoYr4,
                                sum( if( `d`.`year` = '2017', `d`.`numTotalPlotA` + `d`.`numTotalPlotB` + `d`.`numTotalPlotC` + `d`.`numTotalPlotD`, 0 ) ) AS notrainedDemoYr5,
                                sum( if( `d`.`year` = '2018', `d`.`numTotalPlotA` + `d`.`numTotalPlotB` + `d`.`numTotalPlotC` + `d`.`numTotalPlotD`, 0 ) ) AS notrainedDemoYr6
                                FROM `tbl_demo_book_details` as `d`
                                JOIN `tbl_demo_records_book` as `dr` ON ( `dr`.`demoId` = `d`.`demoId` ),
                                tbl_district as z
                            where dr.demoDistrict = z.districtCode
                            and z.zone = '" . $region . "'
                            ", FALSE);

        $db_rows = $this->db->get();

        if ($db_rows->num_rows() > 0) {
            foreach ($db_rows->result() as $data) {
                $db_data_fetched_array[] = $data;
            }
            return $db_data_fetched_array;
        }
    }


}
