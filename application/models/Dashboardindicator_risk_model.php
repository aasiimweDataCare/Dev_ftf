<?php
/**
 * Created by PhpStorm.
 * User: shaffic
 * Date: 1/13/2016
 * Time: 11:33 AM
 */


class Dashboardindicator_risk_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    function getIndicatorRiskByRegion($region)
    {
        $this->db->select("sum( if( substr( `p`.`interview_date`, 1, 4 ) = '2013' && (`q`.`implemented_mgt_climate` like '%1%'||`q`.`implemented_mgt_climate_action`<>''), 1, 0 ) ) AS riskReducingPracticeYr1,
                                sum( if( substr( `p`.`interview_date`, 1, 4 ) = '2014' && (`q`.`implemented_mgt_climate` like '%1%'||`q`.`implemented_mgt_climate_action`<>''), 1, 0 ) ) AS riskReducingPracticeYr2,
                                sum( if( substr( `p`.`interview_date`, 1, 4 ) = '2015' && (`q`.`implemented_mgt_climate` like '%1%'||`q`.`implemented_mgt_climate_action`<>''), 1, 0 ) ) AS riskReducingPracticeYr3,
                                sum( if( substr( `p`.`interview_date`, 1, 4 ) = '2016' && (`q`.`implemented_mgt_climate` like '%1%'||`q`.`implemented_mgt_climate_action`<>''), 1, 0 ) ) AS riskReducingPracticeYr4,
                                sum( if( substr( `p`.`interview_date`, 1, 4 ) = '2017' && (`q`.`implemented_mgt_climate` like '%1%'||`q`.`implemented_mgt_climate_action`<>''), 1, 0 ) ) AS riskReducingPracticeYr5,
                                sum( if( substr( `p`.`interview_date`, 1, 4 ) = '2018' && (`q`.`implemented_mgt_climate` like '%1%'||`q`.`implemented_mgt_climate_action`<>''), 1, 0 ) ) AS riskReducingPracticeYr6
                                from `tbl_frm6particulars` as `p` 
                                join `tbl_frm6gqnsandgps` as `q` on (`q`.`fk_patid`=`p`.`pk_patid`)
            join `tbl_farmers` as `f` on (`f`.`tbl_farmersId` = `p`.`farmer_code`)
            join `tbl_district` as `d` on (`d`.`districtCode` = `f`.`farmersDistrict`)
            where `d`.`zone` = ".$region."
            and `p`.`interview_date` not between ('2013-01-01') and ('2015-03-31')", FALSE);
           $db_rows = $this->db->get();
            if ($db_rows->num_rows() > 0) {
                foreach ($db_rows->result() as $data) {
                    $resultRisk[] = $data;
                }
                
            }
            foreach ($resultRisk as $row) {

            
            $riskReducingPracticeYr1=$row->riskReducingPracticeYr1;
            $riskReducingPracticeYr2=$row->riskReducingPracticeYr2;
            $riskReducingPracticeYr3=$row->riskReducingPracticeYr3;
            $riskReducingPracticeYr4=$row->riskReducingPracticeYr4;
            $riskReducingPracticeYr5=$row->riskReducingPracticeYr5;
            $riskReducingPracticeYr6=$row->riskReducingPracticeYr6;
        }
            

            //Adding the extrapolation Factor

            $st=$this->ExtrapolationFactor(40);
            $this->db->select($st,FALSE);
           $db_rows = $this->db->get();
            if ($db_rows->num_rows() > 0) {
                foreach ($db_rows->result() as $data) {
                    $result[] = $data;
                }
                
            }
            foreach ($result as $row) {

            $extrapolationFactorYr1=$row->exFactorYr1;
            $extrapolationFactorYr2=$row->exFactorYr2;
            $extrapolationFactorYr3=$row->exFactorYr3;
            $extrapolationFactorYr4=$row->exFactorYr4;
            $extrapolationFactorYr5=$row->exFactorYr5;
            $extrapolationFactorYr6=$row->exFactorYr6;
        }
        

            
            $resultx['notrainedYr1']= ($riskReducingPracticeYr1*$extrapolationFactorYr1);
            $resultx['notrainedYr2']= ($riskReducingPracticeYr2*$extrapolationFactorYr2);
            $resultx['notrainedYr3']= ($riskReducingPracticeYr3*$extrapolationFactorYr3);
            $resultx['notrainedYr4']= ($riskReducingPracticeYr4*$extrapolationFactorYr4);
            $resultx['notrainedYr5']= ($riskReducingPracticeYr5*$extrapolationFactorYr5);
            $resultx['notrainedYr6']= ($riskReducingPracticeYr6*$extrapolationFactorYr6);
            return $resultx;

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



    function getIndicatorRiskMaizeByRegion($region)
    {
        $this->db->select("sum( if( substr( `p`.`interview_date`, 1, 4 ) = '2013' && (`q`.`implemented_mgt_climate` like '%1%'||`q`.`implemented_mgt_climate_action`<>''), 1, 0 ) ) AS riskReducingPracticeYr1,
                                sum( if( substr( `p`.`interview_date`, 1, 4 ) = '2014' && (`q`.`implemented_mgt_climate` like '%1%'||`q`.`implemented_mgt_climate_action`<>''), 1, 0 ) ) AS riskReducingPracticeYr2,
                                sum( if( substr( `p`.`interview_date`, 1, 4 ) = '2015' && (`q`.`implemented_mgt_climate` like '%1%'||`q`.`implemented_mgt_climate_action`<>''), 1, 0 ) ) AS riskReducingPracticeYr3,
                                sum( if( substr( `p`.`interview_date`, 1, 4 ) = '2016' && (`q`.`implemented_mgt_climate` like '%1%'||`q`.`implemented_mgt_climate_action`<>''), 1, 0 ) ) AS riskReducingPracticeYr4,
                                sum( if( substr( `p`.`interview_date`, 1, 4 ) = '2017' && (`q`.`implemented_mgt_climate` like '%1%'||`q`.`implemented_mgt_climate_action`<>''), 1, 0 ) ) AS riskReducingPracticeYr5,
                                sum( if( substr( `p`.`interview_date`, 1, 4 ) = '2018' && (`q`.`implemented_mgt_climate` like '%1%'||`q`.`implemented_mgt_climate_action`<>''), 1, 0 ) ) AS riskReducingPracticeYr6
                                from `tbl_frm6particulars` as `p` 
                                join `tbl_frm6gqnsandgps` as `q` on (`q`.`fk_patid`=`p`.`pk_patid`)
            join `tbl_farmers` as `f` on (`f`.`tbl_farmersId` = `p`.`farmer_code`)
            join `tbl_district` as `d` on (`d`.`districtCode` = `f`.`farmersDistrict`)
            where `d`.`zone` = ".$region."
            and `p`.`farmer_crop_maize` = '1'
            and `p`.`interview_date` not between ('2013-01-01') and ('2015-03-31')", FALSE);
           $db_rows = $this->db->get();
            if ($db_rows->num_rows() > 0) {
                foreach ($db_rows->result() as $data) {
                    $resultRisk[] = $data;
                }
                
            }
            foreach ($resultRisk as $row) {

            
            $riskReducingPracticeYr1=$row->riskReducingPracticeYr1;
            $riskReducingPracticeYr2=$row->riskReducingPracticeYr2;
            $riskReducingPracticeYr3=$row->riskReducingPracticeYr3;
            $riskReducingPracticeYr4=$row->riskReducingPracticeYr4;
            $riskReducingPracticeYr5=$row->riskReducingPracticeYr5;
            $riskReducingPracticeYr6=$row->riskReducingPracticeYr6;
        }
            

            //Adding the extrapolation Factor

            $st=$this->ExtrapolationFactor(40);
            $this->db->select($st,FALSE);
           $db_rows = $this->db->get();
            if ($db_rows->num_rows() > 0) {
                foreach ($db_rows->result() as $data) {
                    $result[] = $data;
                }
                
            }
            foreach ($result as $row) {

            $extrapolationFactorYr1=$row->exFactorYr1;
            $extrapolationFactorYr2=$row->exFactorYr2;
            $extrapolationFactorYr3=$row->exFactorYr3;
            $extrapolationFactorYr4=$row->exFactorYr4;
            $extrapolationFactorYr5=$row->exFactorYr5;
            $extrapolationFactorYr6=$row->exFactorYr6;
        }
        

            
            $resultx['notrainedYr1']= ($riskReducingPracticeYr1*$extrapolationFactorYr1);
            $resultx['notrainedYr2']= ($riskReducingPracticeYr2*$extrapolationFactorYr2);
            $resultx['notrainedYr3']= ($riskReducingPracticeYr3*$extrapolationFactorYr3);
            $resultx['notrainedYr4']= ($riskReducingPracticeYr4*$extrapolationFactorYr4);
            $resultx['notrainedYr5']= ($riskReducingPracticeYr5*$extrapolationFactorYr5);
            $resultx['notrainedYr6']= ($riskReducingPracticeYr6*$extrapolationFactorYr6);
            return $resultx;

    }

    function getIndicatorRiskBeansByRegion($region)
    {
        $this->db->select("sum( if( substr( `p`.`interview_date`, 1, 4 ) = '2013' && (`q`.`implemented_mgt_climate` like '%1%'||`q`.`implemented_mgt_climate_action`<>''), 1, 0 ) ) AS riskReducingPracticeYr1,
                                sum( if( substr( `p`.`interview_date`, 1, 4 ) = '2014' && (`q`.`implemented_mgt_climate` like '%1%'||`q`.`implemented_mgt_climate_action`<>''), 1, 0 ) ) AS riskReducingPracticeYr2,
                                sum( if( substr( `p`.`interview_date`, 1, 4 ) = '2015' && (`q`.`implemented_mgt_climate` like '%1%'||`q`.`implemented_mgt_climate_action`<>''), 1, 0 ) ) AS riskReducingPracticeYr3,
                                sum( if( substr( `p`.`interview_date`, 1, 4 ) = '2016' && (`q`.`implemented_mgt_climate` like '%1%'||`q`.`implemented_mgt_climate_action`<>''), 1, 0 ) ) AS riskReducingPracticeYr4,
                                sum( if( substr( `p`.`interview_date`, 1, 4 ) = '2017' && (`q`.`implemented_mgt_climate` like '%1%'||`q`.`implemented_mgt_climate_action`<>''), 1, 0 ) ) AS riskReducingPracticeYr5,
                                sum( if( substr( `p`.`interview_date`, 1, 4 ) = '2018' && (`q`.`implemented_mgt_climate` like '%1%'||`q`.`implemented_mgt_climate_action`<>''), 1, 0 ) ) AS riskReducingPracticeYr6
                                from `tbl_frm6particulars` as `p` 
                                join `tbl_frm6gqnsandgps` as `q` on (`q`.`fk_patid`=`p`.`pk_patid`)
            join `tbl_farmers` as `f` on (`f`.`tbl_farmersId` = `p`.`farmer_code`)
            join `tbl_district` as `d` on (`d`.`districtCode` = `f`.`farmersDistrict`)
            where `d`.`zone` = ".$region."
            and `p`.`farmer_crop_beans` = '1'
            and `p`.`interview_date` not between ('2013-01-01') and ('2015-03-31')", FALSE);
           $db_rows = $this->db->get();
            if ($db_rows->num_rows() > 0) {
                foreach ($db_rows->result() as $data) {
                    $resultRisk[] = $data;
                }
                
            }
            foreach ($resultRisk as $row) {

            
            $riskReducingPracticeYr1=$row->riskReducingPracticeYr1;
            $riskReducingPracticeYr2=$row->riskReducingPracticeYr2;
            $riskReducingPracticeYr3=$row->riskReducingPracticeYr3;
            $riskReducingPracticeYr4=$row->riskReducingPracticeYr4;
            $riskReducingPracticeYr5=$row->riskReducingPracticeYr5;
            $riskReducingPracticeYr6=$row->riskReducingPracticeYr6;
        }
            

            //Adding the extrapolation Factor

            $st=$this->ExtrapolationFactor(40);
            $this->db->select($st,FALSE);
           $db_rows = $this->db->get();
            if ($db_rows->num_rows() > 0) {
                foreach ($db_rows->result() as $data) {
                    $result[] = $data;
                }
                
            }
            foreach ($result as $row) {

            $extrapolationFactorYr1=$row->exFactorYr1;
            $extrapolationFactorYr2=$row->exFactorYr2;
            $extrapolationFactorYr3=$row->exFactorYr3;
            $extrapolationFactorYr4=$row->exFactorYr4;
            $extrapolationFactorYr5=$row->exFactorYr5;
            $extrapolationFactorYr6=$row->exFactorYr6;
        }
        

            
            $resultx['notrainedYr1']= ($riskReducingPracticeYr1*$extrapolationFactorYr1);
            $resultx['notrainedYr2']= ($riskReducingPracticeYr2*$extrapolationFactorYr2);
            $resultx['notrainedYr3']= ($riskReducingPracticeYr3*$extrapolationFactorYr3);
            $resultx['notrainedYr4']= ($riskReducingPracticeYr4*$extrapolationFactorYr4);
            $resultx['notrainedYr5']= ($riskReducingPracticeYr5*$extrapolationFactorYr5);
            $resultx['notrainedYr6']= ($riskReducingPracticeYr6*$extrapolationFactorYr6);
            return $resultx;

    }


    function getIndicatorRiskCoffeeByRegion($region)
    {
        $this->db->select("sum( if( substr( `p`.`interview_date`, 1, 4 ) = '2013' && (`q`.`implemented_mgt_climate` like '%1%'||`q`.`implemented_mgt_climate_action`<>''), 1, 0 ) ) AS riskReducingPracticeYr1,
                                sum( if( substr( `p`.`interview_date`, 1, 4 ) = '2014' && (`q`.`implemented_mgt_climate` like '%1%'||`q`.`implemented_mgt_climate_action`<>''), 1, 0 ) ) AS riskReducingPracticeYr2,
                                sum( if( substr( `p`.`interview_date`, 1, 4 ) = '2015' && (`q`.`implemented_mgt_climate` like '%1%'||`q`.`implemented_mgt_climate_action`<>''), 1, 0 ) ) AS riskReducingPracticeYr3,
                                sum( if( substr( `p`.`interview_date`, 1, 4 ) = '2016' && (`q`.`implemented_mgt_climate` like '%1%'||`q`.`implemented_mgt_climate_action`<>''), 1, 0 ) ) AS riskReducingPracticeYr4,
                                sum( if( substr( `p`.`interview_date`, 1, 4 ) = '2017' && (`q`.`implemented_mgt_climate` like '%1%'||`q`.`implemented_mgt_climate_action`<>''), 1, 0 ) ) AS riskReducingPracticeYr5,
                                sum( if( substr( `p`.`interview_date`, 1, 4 ) = '2018' && (`q`.`implemented_mgt_climate` like '%1%'||`q`.`implemented_mgt_climate_action`<>''), 1, 0 ) ) AS riskReducingPracticeYr6
                                from `tbl_frm6particulars` as `p` 
                                join `tbl_frm6gqnsandgps` as `q` on (`q`.`fk_patid`=`p`.`pk_patid`)
            join `tbl_farmers` as `f` on (`f`.`tbl_farmersId` = `p`.`farmer_code`)
            join `tbl_district` as `d` on (`d`.`districtCode` = `f`.`farmersDistrict`)
            where `d`.`zone` = ".$region."
            and `p`.`farmer_crop_coffee` = '1'
            and `p`.`interview_date` not between ('2013-01-01') and ('2015-03-31')", FALSE);
           $db_rows = $this->db->get();
            if ($db_rows->num_rows() > 0) {
                foreach ($db_rows->result() as $data) {
                    $resultRisk[] = $data;
                }
                
            }
            foreach ($resultRisk as $row) {

            
            $riskReducingPracticeYr1=$row->riskReducingPracticeYr1;
            $riskReducingPracticeYr2=$row->riskReducingPracticeYr2;
            $riskReducingPracticeYr3=$row->riskReducingPracticeYr3;
            $riskReducingPracticeYr4=$row->riskReducingPracticeYr4;
            $riskReducingPracticeYr5=$row->riskReducingPracticeYr5;
            $riskReducingPracticeYr6=$row->riskReducingPracticeYr6;
        }
            

            //Adding the extrapolation Factor

            $st=$this->ExtrapolationFactor(40);
            $this->db->select($st,FALSE);
           $db_rows = $this->db->get();
            if ($db_rows->num_rows() > 0) {
                foreach ($db_rows->result() as $data) {
                    $result[] = $data;
                }
                
            }
            foreach ($result as $row) {

            $extrapolationFactorYr1=$row->exFactorYr1;
            $extrapolationFactorYr2=$row->exFactorYr2;
            $extrapolationFactorYr3=$row->exFactorYr3;
            $extrapolationFactorYr4=$row->exFactorYr4;
            $extrapolationFactorYr5=$row->exFactorYr5;
            $extrapolationFactorYr6=$row->exFactorYr6;
        }
        

            
            $resultx['notrainedYr1']= ($riskReducingPracticeYr1*$extrapolationFactorYr1);
            $resultx['notrainedYr2']= ($riskReducingPracticeYr2*$extrapolationFactorYr2);
            $resultx['notrainedYr3']= ($riskReducingPracticeYr3*$extrapolationFactorYr3);
            $resultx['notrainedYr4']= ($riskReducingPracticeYr4*$extrapolationFactorYr4);
            $resultx['notrainedYr5']= ($riskReducingPracticeYr5*$extrapolationFactorYr5);
            $resultx['notrainedYr6']= ($riskReducingPracticeYr6*$extrapolationFactorYr6);
            return $resultx;

    }


    

    }
