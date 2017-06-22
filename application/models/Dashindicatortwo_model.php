<?php
/**
 * Created by PhpStorm.
 * User: aasiimwe
 * Date: 1/13/2016
 * Time: 12:08 PM
 */

class Dashindicatortwo_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    function getIndicator2valuePartnerships()
    {
        $this->db->select("sum(p.valuePartner) as valuePartnerships 
            from `tbl_public_private_partnership` as p,
            `tbl_traders` as t
            Where p.msmeId = t.tbl_tradersId 
            and p.msmeType='Trader'
            ", FALSE);

        $db_rows = $this->db->get();

        if ($db_rows->num_rows() > 0) {
            foreach ($db_rows->result() as $data) {
                $db_data_fetched_array[] = $data;
            }
            return $db_data_fetched_array;
        }
    }


    function getIndicator2valuePartnershipsRegion($region)
    {
        $this->db->select("sum(p.valuePartner) AS valuePartnershipsRegion
					FROM 
					`tbl_public_private_partnership` AS p,
					`tbl_traders` as t
					Where p.msmeId = t.tbl_tradersId 
					and p.msmeType='Trader'
					and t.traderRegion =".$region."", FALSE);

        $db_rows = $this->db->get();

        if ($db_rows->num_rows() > 0) {
            foreach ($db_rows->result() as $data) {
                $db_data_fetched_array[] = $data;
            }
            return $db_data_fetched_array;
        }
    }


    function jobsAttributedToFtFImplementation($resultValue)
    {

        //Enterprise and Tech Adoption
        $this->db->select("28 as indicator_id,
                                sum( if( `t`.`year` = '2013' and `tj`.`nameOfJobHolder` <>'' and `tj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobs1Yr1,
                                sum( if( `t`.`year` = '2014' and `tj`.`nameOfJobHolder` <>'' and `tj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobs1Yr2,
                                sum( if( `t`.`year` = '2015' and `tj`.`nameOfJobHolder` <>'' and `tj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobs1Yr3,
                                sum( if( `t`.`year` = '2016' and `tj`.`nameOfJobHolder` <>'' and `tj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobs1Yr4,
                                sum( if( `t`.`year` = '2017' and `tj`.`nameOfJobHolder` <>'' and `tj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobs1Yr5,
                                sum( if( `t`.`year` = '2018' and `tj`.`nameOfJobHolder` <>'' and `tj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobs1Yr6
                                FROM `tbl_techadoption` as `t` 
                                join `tbl_tech_adoption_jobHolder` as `tj` 
                                on `tj`.`techAdoption_id`=`t`.`tbl_techadoptionId`
                                where 28=28", FALSE);

        $db_rows = $this->db->get();

        if ($db_rows->num_rows() > 0) {
            foreach ($db_rows->result() as $data) {
                $db_data_fetched_arraytech[] = $data;
            }

        }

        foreach ($db_data_fetched_arraytech as $row) {

            $jobYr1 = $row->noJobs1Yr1;
            $jobYr2 = $row->noJobs1Yr2;
            $jobYr3 = $row->noJobs1Yr3;
            $jobYr4 = $row->noJobs1Yr4;
            $jobYr5 = $row->noJobs1Yr5;
            $jobYr6 = $row->noJobs1Yr6;
        }


        //Labour Saving Technology
        $this->db->select("28 as indicator_id,
                                sum( if( `s`.`year` = '2013' and `sj`.`nameOfJobHolder` <>'' and `sj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobsYr1,
                                sum( if( `s`.`year` = '2014' and `sj`.`nameOfJobHolder` <>'' and `sj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobsYr2,
                                sum( if( `s`.`year` = '2015' and `sj`.`nameOfJobHolder` <>'' and `sj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobsYr3,
                                sum( if( `s`.`year` = '2016' and `sj`.`nameOfJobHolder` <>'' and `sj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobsYr4,
                                sum( if( `s`.`year` = '2017' and `sj`.`nameOfJobHolder` <>'' and `sj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobsYr5,
                                sum( if( `s`.`year` = '2018' and `sj`.`nameOfJobHolder` <>'' and `sj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobsYr6
                                FROM `tbl_laboursavingtech` as `s`
                                join `tbl_labourSavingTech_jobHolder` as `sj` 
                                on `sj`.`labour_saving_tech_id`=`s`.`tbl_laboursavingtechId`
                                where 28=28", FALSE);

        $db_rows = $this->db->get();

        if ($db_rows->num_rows() > 0) {
            foreach ($db_rows->result() as $data) {
                $db_data_fetched_arraylabour[] = $data;
            }

        }

        foreach ($db_data_fetched_arraylabour as $row) {

            $job2Yr1 = $row->noJobsYr1;
            $job2Yr2 = $row->noJobsYr2;
            $job2Yr3 = $row->noJobsYr3;
            $job2Yr4 = $row->noJobsYr4;
            $job2Yr5 = $row->noJobsYr5;
            $job2Yr6 = $row->noJobsYr6;
        }

        //Media Programs
        $this->db->select("28 as indicator_id,
                                sum( if( `m`.`year` = '2013' and `mj`.`nameOfJobHolder` <>'' and `mj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobsYr1,
                                sum( if( `m`.`year` = '2014' and `mj`.`nameOfJobHolder` <>'' and `mj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobsYr2,
                                sum( if( `m`.`year` = '2015' and `mj`.`nameOfJobHolder` <>'' and `mj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobsYr3,
                                sum( if( `m`.`year` = '2016' and `mj`.`nameOfJobHolder` <>'' and `mj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobsYr4,
                                sum( if( `m`.`year` = '2017' and `mj`.`nameOfJobHolder` <>'' and `mj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobsYr5,
                                sum( if( `m`.`year` = '2018' and `mj`.`nameOfJobHolder` <>'' and `mj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobsYr6
                                FROM `tbl_mediaprograms` as `m`
                                join `tbl_mediaProgram_jobHolder` as `mj` 
                                on `mj`.`media_program_id`=`m`.`tbl_mediaprogramsId`
                                where 28=28", FALSE);

        $db_rows = $this->db->get();

        if ($db_rows->num_rows() > 0) {
            foreach ($db_rows->result() as $data) {
                $db_data_fetched_arraymedia[] = $data;
            }

        }

        foreach ($db_data_fetched_arraymedia as $row) {

            $job3Yr1 = $row->noJobsYr1;
            $job3Yr2 = $row->noJobsYr2;
            $job3Yr3 = $row->noJobsYr3;
            $job3Yr4 = $row->noJobsYr4;
            $job3Yr5 = $row->noJobsYr5;
            $job3Yr6 = $row->noJobsYr6;
        }


        //Youth Apprentice
        $this->db->select("28 as indicator_id,
                                sum( if( `y`.`year` = '2013' and `yj`.`nameOfJobHolder` <>'' and `yj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobsYr1,
                                sum( if( `y`.`year` = '2014' and `yj`.`nameOfJobHolder` <>'' and `yj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobsYr2,
                                sum( if( `y`.`year` = '2015' and `yj`.`nameOfJobHolder` <>'' and `yj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobsYr3,
                                sum( if( `y`.`year` = '2016' and `yj`.`nameOfJobHolder` <>'' and `yj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobsYr4,
                                sum( if( `y`.`year` = '2017' and `yj`.`nameOfJobHolder` <>'' and `yj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobsYr5,
                                sum( if( `y`.`year` = '2018' and `yj`.`nameOfJobHolder` <>'' and `yj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobsYr6
                                FROM `tbl_youthapprentice` as `y`
                                join `tbl_apprenticeship_jobHolder` as `yj` 
                                on `yj`.`apprenticeship_id`=`y`.`tbl_youthapprenticeId`
                                where 28=28", FALSE);

        $db_rows = $this->db->get();

        if ($db_rows->num_rows() > 0) {
            foreach ($db_rows->result() as $data) {
                $db_data_fetched_arrayyouth[] = $data;
            }

        }

        foreach ($db_data_fetched_arrayyouth as $row) {

            $job4Yr1 = $row->noJobsYr1;
            $job4Yr2 = $row->noJobsYr2;
            $job4Yr3 = $row->noJobsYr3;
            $job4Yr4 = $row->noJobsYr4;
            $job4Yr5 = $row->noJobsYr5;
            $job4Yr6 = $row->noJobsYr6;
        }


        //Public private partnership
        $this->db->select("28 as indicator_id,
                                sum( if( `p`.`year` = '2013' and `pj`.`nameOfJobHolder` <>'' and `pj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobsYr1,
                                sum( if( `p`.`year` = '2014' and `pj`.`nameOfJobHolder` <>'' and `pj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobsYr2,
                                sum( if( `p`.`year` = '2015' and `pj`.`nameOfJobHolder` <>'' and `pj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobsYr3,
                                sum( if( `p`.`year` = '2016' and `pj`.`nameOfJobHolder` <>'' and `pj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobsYr4,
                                sum( if( `p`.`year` = '2017' and `pj`.`nameOfJobHolder` <>'' and `pj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobsYr5,
                                sum( if( `p`.`year` = '2018' and `pj`.`nameOfJobHolder` <>'' and `pj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobsYr6
                                FROM `tbl_public_private_partnership` as `p` 
                                join `tbl_partnership_jobHolder` as `pj` 
                                on `pj`.`partnership_id`=`p`.`tbl_partnershipId`
                                where 28=28", FALSE);

        $db_rows = $this->db->get();

        if ($db_rows->num_rows() > 0) {
            foreach ($db_rows->result() as $data) {
                $db_data_fetched_arraypartner[] = $data;
            }

        }

        foreach ($db_data_fetched_arraypartner as $row) {

            $job5Yr1 = $row->noJobsYr1;
            $job5Yr2 = $row->noJobsYr2;
            $job5Yr3 = $row->noJobsYr3;
            $job5Yr4 = $row->noJobsYr4;
            $job5Yr5 = $row->noJobsYr5;
            $job5Yr6 = $row->noJobsYr6;
        }


        //Bank Loans
        $this->db->select("28 as indicator_id,
                                sum( if( `b`.`year` = '2013' and `bj`.`nameOfJobHolder` <>'' and `bj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobsYr1,
                                sum( if( `b`.`year` = '2014' and `bj`.`nameOfJobHolder` <>'' and `bj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobsYr2,
                                sum( if( `b`.`year` = '2015' and `bj`.`nameOfJobHolder` <>'' and `bj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobsYr3,
                                sum( if( `b`.`year` = '2016' and `bj`.`nameOfJobHolder` <>'' and `bj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobsYr4,
                                sum( if( `b`.`year` = '2017' and `bj`.`nameOfJobHolder` <>'' and `bj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobsYr5,
                                sum( if( `b`.`year` = '2018' and `bj`.`nameOfJobHolder` <>'' and `bj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobsYr6
                                FROM `tbl_bankloans` as `b`
                                join `tbl_bank_loans_jobHolder` as `bj` 
                                on `bj`.`bankLoan_id`=`b`.`tbl_bankLoanId`
                                where 28=28", FALSE);
        $db_rows = $this->db->get();

        if ($db_rows->num_rows() > 0) {
            foreach ($db_rows->result() as $data) {
                $db_data_fetched_arrayloans[] = $data;
            }

        }

        foreach ($db_data_fetched_arrayloans as $row) {

            $job6Yr1 = $row->noJobsYr1;
            $job6Yr2 = $row->noJobsYr2;
            $job6Yr3 = $row->noJobsYr3;
            $job6Yr4 = $row->noJobsYr4;
            $job6Yr5 = $row->noJobsYr5;
            $job6Yr6 = $row->noJobsYr6;
        }


        //BDS
        $this->db->select("28 as indicator_id,
                                sum( if( `bds`.`year` = '2013' and `bdsj`.`nameOfJobHolder` <>'' and `bdsj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobsYr1,
                                sum( if( `bds`.`year` = '2014' and `bdsj`.`nameOfJobHolder` <>'' and `bdsj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobsYr2,
                                sum( if( `bds`.`year` = '2015' and `bdsj`.`nameOfJobHolder` <>'' and `bdsj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobsYr3,
                                sum( if( `bds`.`year` = '2016' and `bdsj`.`nameOfJobHolder` <>'' and `bdsj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobsYr4,
                                sum( if( `bds`.`year` = '2017' and `bdsj`.`nameOfJobHolder` <>'' and `bdsj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobsYr5,
                                sum( if( `bds`.`year` = '2018' and `bdsj`.`nameOfJobHolder` <>'' and `bdsj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobsYr6
                                FROM `tbl_businessdev` as `bds`
                                join `tbl_bds_jobHolder` as `bdsj` 
                                on `bdsj`.`bds_id`=`bds`.`tbl_businessdevId`
                                where 28=28", FALSE);
        $db_rows = $this->db->get();

        if ($db_rows->num_rows() > 0) {
            foreach ($db_rows->result() as $data) {
                $db_data_fetched_arraybd[] = $data;
            }

        }
        foreach ($db_data_fetched_arraybd as $row) {

            $job7Yr1 = $row->noJobsYr1;
            $job7Yr2 = $row->noJobsYr2;
            $job7Yr3 = $row->noJobsYr3;
            $job7Yr4 = $row->noJobsYr4;
            $job7Yr5 = $row->noJobsYr5;
            $job7Yr6 = $row->noJobsYr6;
        }


        //Input Sales
        $this->db->select("28 as indicator_id,
                                sum( if( `ij`.`year` = '2013' and `ij`.`nameOfJobHolder` <>'' and `ij`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobsYr1,
                                sum( if( `ij`.`year` = '2014' and `ij`.`nameOfJobHolder` <>'' and `ij`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobsYr2,
                                sum( if( `ij`.`year` = '2015' and `ij`.`nameOfJobHolder` <>'' and `ij`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobsYr3,
                                sum( if( `ij`.`year` = '2016' and `ij`.`nameOfJobHolder` <>'' and `ij`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobsYr4,
                                sum( if( `ij`.`year` = '2017' and `ij`.`nameOfJobHolder` <>'' and `ij`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobsYr5,
                                sum( if( `ij`.`year` = '2018' and `ij`.`nameOfJobHolder` <>'' and `ij`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobsYr6
                                FROM `tbl_input_sales` as `i`
                                join `tbl_input_sales_meta_data` as `ij` 
                                on `ij`.`input_sales_id`=`i`.`id`
                                where 28=28", FALSE);

        $db_rows = $this->db->get();

        if ($db_rows->num_rows() > 0) {
            foreach ($db_rows->result() as $data) {
                $db_data_fetched_arraysales[] = $data;
            }

        }
        foreach ($db_data_fetched_arraysales as $row) {

            $job8Yr1 = $row->noJobsYr1;
            $job8Yr2 = $row->noJobsYr2;
            $job8Yr3 = $row->noJobsYr3;
            $job8Yr4 = $row->noJobsYr4;
            $job8Yr5 = $row->noJobsYr5;
            $job8Yr6 = $row->noJobsYr6;
        }


        //PHH
        $this->db->select("28 as indicator_id,
                                sum( if( `pj`.`year` = '2013' and `pj`.`nameOfJobHolder` <>'' and `pj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobsYr1,
                                sum( if( `pj`.`year` = '2014' and `pj`.`nameOfJobHolder` <>'' and `pj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobsYr2,
                                sum( if( `pj`.`year` = '2015' and `pj`.`nameOfJobHolder` <>'' and `pj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobsYr3,
                                sum( if( `pj`.`year` = '2016' and `pj`.`nameOfJobHolder` <>'' and `pj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobsYr4,
                                sum( if( `pj`.`year` = '2017' and `pj`.`nameOfJobHolder` <>'' and `pj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobsYr5,
                                sum( if( `pj`.`year` = '2018' and `pj`.`nameOfJobHolder` <>'' and `pj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobsYr6
                                FROM `tbl_phh` as `p`
                                join `tbl_phh_meta_data` as `pj` 
                                on `pj`.`phh_id`=`p`.`id`
                                where 28=28", FALSE);

        $db_rows = $this->db->get();

        if ($db_rows->num_rows() > 0) {
            foreach ($db_rows->result() as $data) {
                $db_data_fetched_arrayphh[] = $data;
            }

        }

        foreach ($db_data_fetched_arrayphh as $row) {

            $job9Yr1 = $row->noJobsYr1;
            $job9Yr2 = $row->noJobsYr2;
            $job9Yr3 = $row->noJobsYr3;
            $job9Yr4 = $row->noJobsYr4;
            $job9Yr5 = $row->noJobsYr5;
            $job9Yr6 = $row->noJobsYr6;
        }


        //Summimg all the Jobs across the different form2's for each of the years

        $result['notrainedYr1'] = $jobYr1 + $job2Yr1 + $job3Yr1 + $job4Yr1 + $job5Yr1 + $job6Yr1 + $job7Yr1 + $job8Yr1 + $job9Yr1;
        $result['notrainedYr2'] = $jobYr2 + $job2Yr2 + $job3Yr2 + $job4Yr2 + $job5Yr2 + $job6Yr2 + $job7Yr2 + $job8Yr2 + $job9Yr2;
        $result['notrainedYr3'] = $jobYr3 + $job2Yr3 + $job3Yr3 + $job4Yr3 + $job5Yr3 + $job6Yr3 + $job7Yr3 + $job8Yr3 + $job9Yr3;
        $result['notrainedYr4'] = $jobYr4 + $job2Yr4 + $job3Yr4 + $job4Yr4 + $job5Yr4 + $job6Yr4 + $job7Yr4 + $job8Yr4 + $job9Yr4;
        $result['notrainedYr5'] = $jobYr5 + $job2Yr5 + $job3Yr5 + $job4Yr5 + $job5Yr5 + $job6Yr5 + $job7Yr5 + $job8Yr5 + $job9Yr5;
        $result['notrainedYr6'] = $jobYr6 + $job2Yr6 + $job3Yr6 + $job4Yr6 + $job5Yr6 + $job6Yr6 + $job7Yr6 + $job8Yr6 + $job9Yr6;

        return $result[$resultValue];
    }




        function getIndicator2valuePartnershipsAll()
    {

        //Enterprise and Tech Adoption
        $this->db->select("28 as indicator_id,
                                sum( if( `t`.`year` = '2013', `t`.`amountInvestedInTechAdoption`, 0 ) ) AS noJobs1Yr1,
                                sum( if( `t`.`year` = '2014', `t`.`amountInvestedInTechAdoption`, 0 ) ) AS noJobs1Yr2,
                                sum( if( `t`.`year` = '2015', `t`.`amountInvestedInTechAdoption`, 0 ) ) AS noJobs1Yr3,
                                sum( if( `t`.`year` = '2016', `t`.`amountInvestedInTechAdoption`, 0 ) ) AS noJobs1Yr4,
                                sum( if( `t`.`year` = '2017', `t`.`amountInvestedInTechAdoption`, 0 ) ) AS noJobs1Yr5,
                                sum( if( `t`.`year` = '2018', `t`.`amountInvestedInTechAdoption`, 0 ) ) AS noJobs1Yr6
                                FROM `tbl_techadoption` as `t` 
                                join `tbl_tech_adoption_jobHolder` as `tj` 
                                on `tj`.`techAdoption_id`=`t`.`tbl_techadoptionId`
                                where 28=28", FALSE);

        $db_rows = $this->db->get();

        if ($db_rows->num_rows() > 0) {
            foreach ($db_rows->result() as $data) {
                $db_data_fetched_arraytech[] = $data;
            }

        }

        foreach ($db_data_fetched_arraytech as $row) {

            $jobYr1 = $row->noJobs1Yr1;
            $jobYr2 = $row->noJobs1Yr2;
            $jobYr3 = $row->noJobs1Yr3;
            $jobYr4 = $row->noJobs1Yr4;
            $jobYr5 = $row->noJobs1Yr5;
            $jobYr6 = $row->noJobs1Yr6;
        }


        //Labour Saving Technology
        $this->db->select("28 as indicator_id,
                                sum( if( `s`.`year` = '2013', `s`.`amountInvestedOnTechInvestment`, 0 ) ) AS noJobsYr1,
                                sum( if( `s`.`year` = '2014', `s`.`amountInvestedOnTechInvestment`, 0 ) ) AS noJobsYr2,
                                sum( if( `s`.`year` = '2015', `s`.`amountInvestedOnTechInvestment`, 0 ) ) AS noJobsYr3,
                                sum( if( `s`.`year` = '2016', `s`.`amountInvestedOnTechInvestment`, 0 ) ) AS noJobsYr4,
                                sum( if( `s`.`year` = '2017', `s`.`amountInvestedOnTechInvestment`, 0 ) ) AS noJobsYr5,
                                sum( if( `s`.`year` = '2018', `s`.`amountInvestedOnTechInvestment`, 0 ) ) AS noJobsYr6
                                FROM `tbl_laboursavingtech` as `s`
                                join `tbl_labourSavingTech_jobHolder` as `sj` 
                                on `sj`.`labour_saving_tech_id`=`s`.`tbl_laboursavingtechId`
                                where 28=28", FALSE);

        $db_rows = $this->db->get();

        if ($db_rows->num_rows() > 0) {
            foreach ($db_rows->result() as $data) {
                $db_data_fetched_arraylabour[] = $data;
            }

        }

        foreach ($db_data_fetched_arraylabour as $row) {

            $job2Yr1 = $row->noJobsYr1;
            $job2Yr2 = $row->noJobsYr2;
            $job2Yr3 = $row->noJobsYr3;
            $job2Yr4 = $row->noJobsYr4;
            $job2Yr5 = $row->noJobsYr5;
            $job2Yr6 = $row->noJobsYr6;
        }

        

       // Public private partnership
        $this->db->select("28 as indicator_id,
                                sum( if( `p`.`year` = '2013' ,`p`.`valuePartner`, 0 ) ) AS noJobsYr1,
                                sum( if( `p`.`year` = '2014' ,`p`.`valuePartner`, 0 ) ) AS noJobsYr2,
                                sum( if( `p`.`year` = '2015' ,`p`.`valuePartner`, 0 ) ) AS noJobsYr3,
                                sum( if( `p`.`year` = '2016' ,`p`.`valuePartner`, 0 ) ) AS noJobsYr4,
                                sum( if( `p`.`year` = '2017' ,`p`.`valuePartner`, 0 ) ) AS noJobsYr5,
                                sum( if( `p`.`year` = '2018' ,`p`.`valuePartner`, 0 ) ) AS noJobsYr6
                                FROM `tbl_public_private_partnership` as `p`
                                where 28=28", FALSE);

        $db_rows = $this->db->get();

        if ($db_rows->num_rows() > 0) {
            foreach ($db_rows->result() as $data) {
                $db_data_fetched_arraypartner[] = $data;
            }

        }

        foreach ($db_data_fetched_arraypartner as $row) {

            $job5Yr1 = $row->noJobsYr1;
            $job5Yr2 = $row->noJobsYr2;
            $job5Yr3 = $row->noJobsYr3;
            $job5Yr4 = $row->noJobsYr4;
            $job5Yr5 = $row->noJobsYr5;
            $job5Yr6 = $row->noJobsYr6;
        }

        


        //Input Sales
        $this->db->select("28 as indicator_id,
                                sum( if( `ij`.`year` = '2013' ,`ij`.`amountInvestedInSettingUpInputSalesBusiness`, 0 ) ) AS noJobsYr1,
                                sum( if( `ij`.`year` = '2014' ,`ij`.`amountInvestedInSettingUpInputSalesBusiness`, 0 ) ) AS noJobsYr2,
                                sum( if( `ij`.`year` = '2015' ,`ij`.`amountInvestedInSettingUpInputSalesBusiness`, 0 ) ) AS noJobsYr3,
                                sum( if( `ij`.`year` = '2016' ,`ij`.`amountInvestedInSettingUpInputSalesBusiness`, 0 ) ) AS noJobsYr4,
                                sum( if( `ij`.`year` = '2017' ,`ij`.`amountInvestedInSettingUpInputSalesBusiness`, 0 ) ) AS noJobsYr5,
                                sum( if( `ij`.`year` = '2018' ,`ij`.`amountInvestedInSettingUpInputSalesBusiness`, 0 ) ) AS noJobsYr6
                                FROM `tbl_input_sales` as `i`
                                join `tbl_input_sales_meta_data` as `ij` 
                                on `ij`.`input_sales_id`=`i`.`id`
                                where 28=28", FALSE);

        $db_rows = $this->db->get();

        if ($db_rows->num_rows() > 0) {
            foreach ($db_rows->result() as $data) {
                $db_data_fetched_arraysales[] = $data;
            }

        }
        foreach ($db_data_fetched_arraysales as $row) {

            $job8Yr1 = $row->noJobsYr1;
            $job8Yr2 = $row->noJobsYr2;
            $job8Yr3 = $row->noJobsYr3;
            $job8Yr4 = $row->noJobsYr4;
            $job8Yr5 = $row->noJobsYr5;
            $job8Yr6 = $row->noJobsYr6;
        }


        //PHH
        $this->db->select("28 as indicator_id,
                                sum( if( `pj`.`year` = '2013', `pj`.`amountInvestedInRefurbishing`, 0 ) ) AS noJobsYr1,
                                sum( if( `pj`.`year` = '2014', `pj`.`amountInvestedInRefurbishing`, 0 ) ) AS noJobsYr2,
                                sum( if( `pj`.`year` = '2015', `pj`.`amountInvestedInRefurbishing`, 0 ) ) AS noJobsYr3,
                                sum( if( `pj`.`year` = '2016', `pj`.`amountInvestedInRefurbishing`, 0 ) ) AS noJobsYr4,
                                sum( if( `pj`.`year` = '2017', `pj`.`amountInvestedInRefurbishing`, 0 ) ) AS noJobsYr5,
                                sum( if( `pj`.`year` = '2018', `pj`.`amountInvestedInRefurbishing`, 0 ) ) AS noJobsYr6
                                FROM `tbl_phh` as `p`
                                join `tbl_phh_meta_data` as `pj` 
                                on `pj`.`phh_id`=`p`.`id`
                                where 28=28", FALSE);

        $db_rows = $this->db->get();

        if ($db_rows->num_rows() > 0) {
            foreach ($db_rows->result() as $data) {
                $db_data_fetched_arrayphh[] = $data;
            }

        }

        foreach ($db_data_fetched_arrayphh as $row) {

            $job9Yr1 = $row->noJobsYr1;
            $job9Yr2 = $row->noJobsYr2;
            $job9Yr3 = $row->noJobsYr3;
            $job9Yr4 = $row->noJobsYr4;
            $job9Yr5 = $row->noJobsYr5;
            $job9Yr6 = $row->noJobsYr6;
        }


        //Summimg all the Jobs across the different form2's for each of the years

        $result['notrainedYr1'] = $jobYr1 + $job2Yr1 + $job5Yr1+ $job8Yr1 + $job9Yr1;
        $result['notrainedYr2'] = $jobYr2 + $job2Yr2 + $job5Yr2 + $job8Yr2 + $job9Yr2;
        $result['notrainedYr3'] = $jobYr3 + $job2Yr3  + $job5Yr3 + $job8Yr3 + $job9Yr3;
        $result['notrainedYr4'] = $jobYr4 + $job2Yr4  + $job5Yr4+ $job8Yr4 + $job9Yr4;
        $result['notrainedYr5'] = $jobYr5 + $job2Yr5 + $job5Yr5+ $job8Yr5 + $job9Yr5;
        $result['notrainedYr6'] = $jobYr6 + $job2Yr6  + $job5Yr6+ $job8Yr6 + $job9Yr6;

        $resultValue=$result['notrainedYr1']+$result['notrainedYr2']+$result['notrainedYr3']+$result['notrainedYr4']+$result['notrainedYr5']+$result['notrainedYr6'];

        return ($resultValue/cpma_dollar_rate);
    }



}
