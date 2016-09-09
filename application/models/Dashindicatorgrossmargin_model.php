<?php



class Dashindicatorgrossmargin_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function convertAcresToHectares($acres){
    //1 acre=0.404686Ha
    //Divide the acreage by the 2.47
    //define("Ha","0.40468");
    $result=($acres*0.40468);
    return $result;

    }
    public function convertShillingsToDollars($amount){
    //1USD =2500Shs
    
    $result=($amount/2500);
    return $result;

    }

    function GrossMarginPerUnitOfLandRecomputed($TP,$VS,$QS,$IC,$UP,$ExFactor){
    //(((TP*(VS/QS))-IC)/UP)
    //Variable initialize
    $TP =($TP == 0)?1:$TP;
    $VS =($VS == 0)?1:$VS;
    $QS =($QS == 0)?1:$QS;
    $IC =($IC == 0)?1:$IC;
    $UP =($UP == 0)?1:$UP;
    $ExFactor =($ExFactor == 0)?1:$ExFactor;



    $result=(((($TP*$ExFactor)*(($VS*$ExFactor)/($QS*$ExFactor)))-($IC*$ExFactor))/($UP*$ExFactor));
    
    return $result;

    } 

    function ExtrapolationFactor($indicatorId){

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

    function grossMarginPerUnitOfLandBeans($resultValue=""){
    

                            /* --------Form 6 Total Production Beans(TP)--------------------------- */
                            $x="sum( if( substr( `p`.`interview_date`, 1, 4 ) = '2013', ((`b`.`beans_harvested`)), 0 ) ) AS TotProdBeansYr1,
                                sum( if( substr( `p`.`interview_date`, 1, 4 ) = '2014', ((`b`.`beans_harvested`)), 0 ) ) AS TotProdBeansYr2,
                                sum( if( substr( `p`.`interview_date`, 1, 4 ) = '2015', ((`b`.`beans_harvested`)), 0 ) ) AS TotProdBeansYr3,
                                sum( if( substr( `p`.`interview_date`, 1, 4 ) = '2016', ((`b`.`beans_harvested`)), 0 ) ) AS TotProdBeansYr4,
                                sum( if( substr( `p`.`interview_date`, 1, 4 ) = '2017', ((`b`.`beans_harvested`)), 0 ) ) AS TotProdBeansYr5,
                                sum( if( substr( `p`.`interview_date`, 1, 4 ) = '2018', ((`b`.`beans_harvested`)), 0 ) ) AS TotProdBeansYr6
                                from `tbl_frm6particulars` as `p`
                                join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`)
                                where 2.1=2.1
                                and `p`.`interview_date` <= ('2015-10-31')";
                                $this->db->select($x,FALSE);

                                $db_rows = $this->db->get();
                                if ($db_rows->num_rows()- 0) {
                                    foreach ($db_rows->result() as $data) {
                                        $result[] = $data;
                                    }
                                    
                                }
                               // var_dump($result);
                                foreach ($result as $row) {
             
                                $TotProdBeansYr1=$row->TotProdBeansYr1;
                                $TotProdBeansYr2=$row->TotProdBeansYr2;
                                $TotProdBeansYr3=$row->TotProdBeansYr3;
                                $TotProdBeansYr4=$row->TotProdBeansYr4;
                                $TotProdBeansYr5=$row->TotProdBeansYr5;
                                $TotProdBeansYr6=$row->TotProdBeansYr6;
                            }

                                
                                
                            /* --------Form 6 Value of sales(VS)--------------------------- */
                            $x="sum( if( substr( `p`.`interview_date`, 1, 4 ) = '2013', ((`b`.`beans_sold`)*(`b`.`beans_sold_price`)), 0 ) ) AS VolSalesBeansYr1,
                                sum( if( substr( `p`.`interview_date`, 1, 4 ) = '2014', ((`b`.`beans_sold`)*(`b`.`beans_sold_price`)), 0 ) ) AS VolSalesBeansYr2,
                                sum( if( substr( `p`.`interview_date`, 1, 4 ) = '2015', ((`b`.`beans_sold`)*(`b`.`beans_sold_price`)), 0 ) ) AS VolSalesBeansYr3,
                                sum( if( substr( `p`.`interview_date`, 1, 4 ) = '2016', ((`b`.`beans_sold`)*(`b`.`beans_sold_price`)), 0 ) ) AS VolSalesBeansYr4,
                                sum( if( substr( `p`.`interview_date`, 1, 4 ) = '2017', ((`b`.`beans_sold`)*(`b`.`beans_sold_price`)), 0 ) ) AS VolSalesBeansYr5,
                                sum( if( substr( `p`.`interview_date`, 1, 4 ) = '2018', ((`b`.`beans_sold`)*(`b`.`beans_sold_price`)), 0 ) ) AS VolSalesBeansYr6
                                from `tbl_frm6particulars` as `p`
                                join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`)
                                where 2.1=2.1
                                and `p`.`interview_date` <= ('2015-10-31')";
                                $this->db->select($x,FALSE);
                                $db_rows = $this->db->get();
                                if ($db_rows->num_rows() > 0) {
                                    foreach ($db_rows->result() as $data) {
                                        $results[] = $data;
                                    }
                                
                                }
                                foreach ($results as $row) {
                                $VolSalesBeansYr1=$this->convertShillingsToDollars($row->VolSalesBeansYr1);
                                $VolSalesBeansYr2=$this->convertShillingsToDollars($row->VolSalesBeansYr2);
                                $VolSalesBeansYr3=$this->convertShillingsToDollars($row->VolSalesBeansYr3);
                                $VolSalesBeansYr4=$this->convertShillingsToDollars($row->VolSalesBeansYr4);
                                $VolSalesBeansYr5=$this->convertShillingsToDollars($row->VolSalesBeansYr5);
                                $VolSalesBeansYr6=$this->convertShillingsToDollars($row->VolSalesBeansYr6);
                            }
                                
                            /* --------Form 6 Volume sold(QS)--------------------------- */
                            $x="sum( if( substr( `p`.`interview_date`, 1, 4 ) = '2013', ((`b`.`beans_sold`)), 0 ) ) AS VolSoldBeansYr1,
                                sum( if( substr( `p`.`interview_date`, 1, 4 ) = '2014', ((`b`.`beans_sold`)), 0 ) ) AS VolSoldBeansYr2,
                                sum( if( substr( `p`.`interview_date`, 1, 4 ) = '2015', ((`b`.`beans_sold`)), 0 ) ) AS VolSoldBeansYr3,
                                sum( if( substr( `p`.`interview_date`, 1, 4 ) = '2016', ((`b`.`beans_sold`)), 0 ) ) AS VolSoldBeansYr4,
                                sum( if( substr( `p`.`interview_date`, 1, 4 ) = '2017', ((`b`.`beans_sold`)), 0 ) ) AS VolSoldBeansYr5,
                                sum( if( substr( `p`.`interview_date`, 1, 4 ) = '2018', ((`b`.`beans_sold`)), 0 ) ) AS VolSoldBeansYr6
                                from `tbl_frm6particulars` as `p`
                                join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`)
                                where 2.1=2.1
                                and `p`.`interview_date` <= ('2015-10-31')";
                                $this->db->select($x,FALSE);
                               $db_rows = $this->db->get();
                                if ($db_rows->num_rows() > 0) {
                                    foreach ($db_rows->result() as $data) {
                                        $resultSold[] = $data;
                                    }
                                    
                                }
                                foreach ($resultSold as $row) {
                                $VolSoldBeansYr1=$row->VolSoldBeansYr1;
                                $VolSoldBeansYr2=$row->VolSoldBeansYr2;
                                $VolSoldBeansYr3=$row->VolSoldBeansYr3;
                                $VolSoldBeansYr4=$row->VolSoldBeansYr4;
                                $VolSoldBeansYr5=$row->VolSoldBeansYr5;
                                $VolSoldBeansYr6=$row->VolSoldBeansYr6;
                            }
                                
                            /* --------Form 6 Input Cost(IC)--------------------------- */
                            $x="sum( if( substr( `p`.`interview_date`, 1, 4 ) = '2013', ((`b`.`beans_improved_cost`) + (`b`.`beans_fertilizer_cost`) + (`b`.`beans_chemical_cost`) + (`b`.`beans_cost_ict`) + (`b`.`beans_machinery_cost`)), 0 ) ) AS inputCostBeansYr1,
                                sum( if( substr( `p`.`interview_date`, 1, 4 ) = '2014', ((`b`.`beans_improved_cost`) + (`b`.`beans_fertilizer_cost`) + (`b`.`beans_chemical_cost`) + (`b`.`beans_cost_ict`) + (`b`.`beans_machinery_cost`)), 0 ) ) AS inputCostBeansYr2,
                                sum( if( substr( `p`.`interview_date`, 1, 4 ) = '2015', ((`b`.`beans_improved_cost`) + (`b`.`beans_fertilizer_cost`) + (`b`.`beans_chemical_cost`) + (`b`.`beans_cost_ict`) + (`b`.`beans_machinery_cost`)), 0 ) ) AS inputCostBeansYr3,
                                sum( if( substr( `p`.`interview_date`, 1, 4 ) = '2016', ((`b`.`beans_improved_cost`) + (`b`.`beans_fertilizer_cost`) + (`b`.`beans_chemical_cost`) + (`b`.`beans_cost_ict`) + (`b`.`beans_machinery_cost`)), 0 ) ) AS inputCostBeansYr4,
                                sum( if( substr( `p`.`interview_date`, 1, 4 ) = '2017', ((`b`.`beans_improved_cost`) + (`b`.`beans_fertilizer_cost`) + (`b`.`beans_chemical_cost`) + (`b`.`beans_cost_ict`) + (`b`.`beans_machinery_cost`)), 0 ) ) AS inputCostBeansYr5,
                                sum( if( substr( `p`.`interview_date`, 1, 4 ) = '2018', ((`b`.`beans_improved_cost`) + (`b`.`beans_fertilizer_cost`) + (`b`.`beans_chemical_cost`) + (`b`.`beans_cost_ict`) + (`b`.`beans_machinery_cost`)), 0 ) ) AS inputCostBeansYr6
                                from `tbl_frm6particulars` as `p`
                                join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`)
                                where 2.1=2.1
                                and `p`.`interview_date` <= ('2015-10-31')";
                                $this->db->select($x,FALSE);
                                $db_rows = $this->db->get();
                                if ($db_rows->num_rows() > 0) {
                                    foreach ($db_rows->result() as $data) {
                                        $resultCost[] = $data;
                                    }
                                    
                                }
                                 foreach ($resultCost as $row) {
                                $inputCostBeansYr1=$this->convertShillingsToDollars($row->inputCostBeansYr1);
                                $inputCostBeansYr2=$this->convertShillingsToDollars($row->inputCostBeansYr2);
                                $inputCostBeansYr3=$this->convertShillingsToDollars($row->inputCostBeansYr3);
                                $inputCostBeansYr4=$this->convertShillingsToDollars($row->inputCostBeansYr4);
                                $inputCostBeansYr5=$this->convertShillingsToDollars($row->inputCostBeansYr5);
                                $inputCostBeansYr6=$this->convertShillingsToDollars($row->inputCostBeansYr6);
                            }
                                
                            /* --------Form 6 Unit of Production/Area(UP)--------------------------- */
                            $x="sum( if( substr( `p`.`interview_date`, 1, 4 ) = '2013', ((`b`.`beans_acreage`)), 0 ) ) AS unitProductionBeansYr1,
                                sum( if( substr( `p`.`interview_date`, 1, 4 ) = '2014', ((`b`.`beans_acreage`)), 0 ) ) AS unitProductionBeansYr2,
                                sum( if( substr( `p`.`interview_date`, 1, 4 ) = '2015', ((`b`.`beans_acreage`)), 0 ) ) AS unitProductionBeansYr3,
                                sum( if( substr( `p`.`interview_date`, 1, 4 ) = '2016', ((`b`.`beans_acreage`)), 0 ) ) AS unitProductionBeansYr4,
                                sum( if( substr( `p`.`interview_date`, 1, 4 ) = '2017', ((`b`.`beans_acreage`)), 0 ) ) AS unitProductionBeansYr5,
                                sum( if( substr( `p`.`interview_date`, 1, 4 ) = '2018', ((`b`.`beans_acreage`)), 0 ) ) AS unitProductionBeansYr6
                                from `tbl_frm6particulars` as `p`
                                join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`)
                                where 2.1=2.1
                                and `p`.`interview_date` <= ('2015-10-31')";
                                $this->db->select($x,FALSE);
                                $db_rows = $this->db->get();
                                if ($db_rows->num_rows() > 0) {
                                    foreach ($db_rows->result() as $data) {
                                        $resultPro[] = $data;
                                    }
                                    
                                }

                                foreach ($resultPro as $row) {
                                $unitProductionBeansYr1=$this->convertAcresToHectares($row->unitProductionBeansYr1);
                                $unitProductionBeansYr2=$this->convertAcresToHectares($row->unitProductionBeansYr2);
                                $unitProductionBeansYr3=$this->convertAcresToHectares($row->unitProductionBeansYr3);
                                $unitProductionBeansYr4=$this->convertAcresToHectares($row->unitProductionBeansYr4);
                                $unitProductionBeansYr5=$this->convertAcresToHectares($row->unitProductionBeansYr5);
                                $unitProductionBeansYr6=$this->convertAcresToHectares($row->unitProductionBeansYr6);
                            }

                                
                                /* Calculating Gross Margin Per Unit of land (BEANS) based on the following formula:
                                (((TP*(VS/QS))-IC)/UP)*Extrapolation Factor  */

                            $st=$this->ExtrapolationFactor(2.1);
                            $this->db->select($st,FALSE);
                            $db_rows = $this->db->get();
                                if ($db_rows->num_rows() > 0) {
                                    foreach ($db_rows->result() as $data) {
                                        $resultExt[] = $data;
                                    }
                                   
                                }
                                foreach ($resultExt as $row) {
                            $extrapolationFactorYr1=$row->exFactorYr1;
                            $extrapolationFactorYr2=$row->exFactorYr2;
                            $extrapolationFactorYr3=$row->exFactorYr3;
                            $extrapolationFactorYr4=$row->exFactorYr4;
                            $extrapolationFactorYr5=$row->exFactorYr5;
                            $extrapolationFactorYr6=$row->exFactorYr6;
                        }


                           // var_dump($TotProdBeansYr3,$VolSalesBeansYr3,$VolSoldBeansYr3,$inputCostBeansYr3,$unitProductionBeansYr3,$extrapolationFactorYr3);



                                $GrossMarginPerUnitOfLandRecomputedBeansYr1=$this->GrossMarginPerUnitOfLandRecomputed($TotProdBeansYr1,$VolSalesBeansYr1,$VolSoldBeansYr1,$inputCostBeansYr1,$unitProductionBeansYr1,$extrapolationFactorYr1);
                                $GrossMarginPerUnitOfLandRecomputedBeansYr2=$this->GrossMarginPerUnitOfLandRecomputed($TotProdBeansYr2,$VolSalesBeansYr2,$VolSoldBeansYr2,$inputCostBeansYr2,$unitProductionBeansYr2,$extrapolationFactorYr2);
                                $GrossMarginPerUnitOfLandRecomputedBeansYr3=$this->GrossMarginPerUnitOfLandRecomputed($TotProdBeansYr3,$VolSalesBeansYr3,$VolSoldBeansYr3,$inputCostBeansYr3,$unitProductionBeansYr3,$extrapolationFactorYr3);
                                $GrossMarginPerUnitOfLandRecomputedBeansYr4=$this->GrossMarginPerUnitOfLandRecomputed($TotProdBeansYr4,$VolSalesBeansYr4,$VolSoldBeansYr4,$inputCostBeansYr4,$unitProductionBeansYr4,$extrapolationFactorYr4);
                                $GrossMarginPerUnitOfLandRecomputedBeansYr5=$this->GrossMarginPerUnitOfLandRecomputed($TotProdBeansYr5,$VolSalesBeansYr5,$VolSoldBeansYr5,$inputCostBeansYr5,$unitProductionBeansYr5,$extrapolationFactorYr5);
                                $GrossMarginPerUnitOfLandRecomputedBeansYr6=$this->GrossMarginPerUnitOfLandRecomputed($TotProdBeansYr6,$VolSalesBeansYr6,$VolSoldBeansYr6,$inputCostBeansYr6,$unitProductionBeansYr6,$extrapolationFactorYr6);

                                $resultx['notrainedYr1'] = $GrossMarginPerUnitOfLandRecomputedBeansYr1;
                                $resultx['notrainedYr2'] = $GrossMarginPerUnitOfLandRecomputedBeansYr2;
                                $resultx['notrainedYr3'] = $GrossMarginPerUnitOfLandRecomputedBeansYr3;
                                $resultx['notrainedYr4'] = $GrossMarginPerUnitOfLandRecomputedBeansYr4;
                                $resultx['notrainedYr5'] = $GrossMarginPerUnitOfLandRecomputedBeansYr5;
                                $resultx['notrainedYr6'] = $GrossMarginPerUnitOfLandRecomputedBeansYr6;
                               
                                    
                                return $resultx[$resultValue];
                            }
function grossMarginPerUnitOfLandCoffee($resultValue=""){
    

                          /* --------Form 6 Total Production Coffee(TP)--------------------------- */
                            $x="sum( if( substr( `p`.`interview_date`, 1, 4 ) = '2013', ((`c`.`coffee_harvested`)), 0 ) ) AS TotProdCoffeeYr1,
                                sum( if( substr( `p`.`interview_date`, 1, 4 ) = '2014', ((`c`.`coffee_harvested`)), 0 ) ) AS TotProdCoffeeYr2,
                                sum( if( substr( `p`.`interview_date`, 1, 4 ) = '2015', ((`c`.`coffee_harvested`)), 0 ) ) AS TotProdCoffeeYr3,
                                sum( if( substr( `p`.`interview_date`, 1, 4 ) = '2016', ((`c`.`coffee_harvested`)), 0 ) ) AS TotProdCoffeeYr4,
                                sum( if( substr( `p`.`interview_date`, 1, 4 ) = '2017', ((`c`.`coffee_harvested`)), 0 ) ) AS TotProdCoffeeYr5,
                                sum( if( substr( `p`.`interview_date`, 1, 4 ) = '2018', ((`c`.`coffee_harvested`)), 0 ) ) AS TotProdCoffeeYr6
                                from `tbl_frm6particulars` as `p`
                                join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patid`=`p`.`pk_patid`)
                                where 2.2=2.2
                                and `p`.`interview_date` <= ('2015-10-31')";
                                $this->db->select($x,FALSE);
                                $db_rows = $this->db->get();
                                if ($db_rows->num_rows() > 0) {
                                    foreach ($db_rows->result() as $data) {
                                        $result[] = $data;
                                    }
                                    
                                }
                                 foreach ($result as $row) {
                                $TotProdCoffeeYr1=$row->TotProdCoffeeYr1;
                                $TotProdCoffeeYr2=$row->TotProdCoffeeYr2;
                                $TotProdCoffeeYr3=$row->TotProdCoffeeYr3;
                                $TotProdCoffeeYr4=$row->TotProdCoffeeYr4;
                                $TotProdCoffeeYr5=$row->TotProdCoffeeYr5;
                                $TotProdCoffeeYr6=$row->TotProdCoffeeYr6;
                            }
                                
                            /* --------Form 6 Value of sales(VS)--------------------------- */
                            $x="sum( if( substr( `p`.`interview_date`, 1, 4 ) = '2013', ((`c`.`coffee_sold`)*(`c`.`coffee_sold_price`)), 0 ) ) AS VolSalesCoffeeYr1,
                                sum( if( substr( `p`.`interview_date`, 1, 4 ) = '2014', ((`c`.`coffee_sold`)*(`c`.`coffee_sold_price`)), 0 ) ) AS VolSalesCoffeeYr2,
                                sum( if( substr( `p`.`interview_date`, 1, 4 ) = '2015', ((`c`.`coffee_sold`)*(`c`.`coffee_sold_price`)), 0 ) ) AS VolSalesCoffeeYr3,
                                sum( if( substr( `p`.`interview_date`, 1, 4 ) = '2016', ((`c`.`coffee_sold`)*(`c`.`coffee_sold_price`)), 0 ) ) AS VolSalesCoffeeYr4,
                                sum( if( substr( `p`.`interview_date`, 1, 4 ) = '2017', ((`c`.`coffee_sold`)*(`c`.`coffee_sold_price`)), 0 ) ) AS VolSalesCoffeeYr5,
                                sum( if( substr( `p`.`interview_date`, 1, 4 ) = '2018', ((`c`.`coffee_sold`)*(`c`.`coffee_sold_price`)), 0 ) ) AS VolSalesCoffeeYr6
                                from `tbl_frm6particulars` as `p`
                                join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patid`=`p`.`pk_patid`)
                                where 2.2=2.2
                                and `p`.`interview_date` <= ('2015-10-31')";
                                $this->db->select($x,FALSE);
                                $db_rows = $this->db->get();
                                if ($db_rows->num_rows() > 0) {
                                    foreach ($db_rows->result() as $data) {
                                        $resultS[] = $data;
                                    }
                                    
                                }
                                foreach ($resultS as $row) {
                                $VolSalesCoffeeYr1=$this->convertShillingsToDollars($row->VolSalesCoffeeYr1);
                                $VolSalesCoffeeYr2=$this->convertShillingsToDollars($row->VolSalesCoffeeYr2);
                                $VolSalesCoffeeYr3=$this->convertShillingsToDollars($row->VolSalesCoffeeYr3);
                                $VolSalesCoffeeYr4=$this->convertShillingsToDollars($row->VolSalesCoffeeYr4);
                                $VolSalesCoffeeYr5=$this->convertShillingsToDollars($row->VolSalesCoffeeYr5);
                                $VolSalesCoffeeYr6=$this->convertShillingsToDollars($row->VolSalesCoffeeYr6);
                            }
                                
                            /* --------Form 6 Volume sold(QS)--------------------------- */
                            $x="sum( if( substr( `p`.`interview_date`, 1, 4 ) = '2013', ((`c`.`coffee_sold`)), 0 ) ) AS VolSoldCoffeeYr1,
                                sum( if( substr( `p`.`interview_date`, 1, 4 ) = '2014', ((`c`.`coffee_sold`)), 0 ) ) AS VolSoldCoffeeYr2,
                                sum( if( substr( `p`.`interview_date`, 1, 4 ) = '2015', ((`c`.`coffee_sold`)), 0 ) ) AS VolSoldCoffeeYr3,
                                sum( if( substr( `p`.`interview_date`, 1, 4 ) = '2016', ((`c`.`coffee_sold`)), 0 ) ) AS VolSoldCoffeeYr4,
                                sum( if( substr( `p`.`interview_date`, 1, 4 ) = '2017', ((`c`.`coffee_sold`)), 0 ) ) AS VolSoldCoffeeYr5,
                                sum( if( substr( `p`.`interview_date`, 1, 4 ) = '2018', ((`c`.`coffee_sold`)), 0 ) ) AS VolSoldCoffeeYr6
                                from `tbl_frm6particulars` as `p`
                                join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patid`=`p`.`pk_patid`)
                                where 2.2=2.2
                                and `p`.`interview_date` <= ('2015-10-31')";
                                $this->db->select($x,FALSE);
                                $db_rows = $this->db->get();
                                if ($db_rows->num_rows() > 0) {
                                    foreach ($db_rows->result() as $data) {
                                        $resultSoldC[] = $data;
                                    }
                                    
                                }
                                foreach ($resultSoldC as $row) {
                                $VolSoldCoffeeYr1=$row->VolSoldCoffeeYr1;
                                $VolSoldCoffeeYr2=$row->VolSoldCoffeeYr2;
                                $VolSoldCoffeeYr3=$row->VolSoldCoffeeYr3;
                                $VolSoldCoffeeYr4=$row->VolSoldCoffeeYr4;
                                $VolSoldCoffeeYr5=$row->VolSoldCoffeeYr5;
                                $VolSoldCoffeeYr6=$row->VolSoldCoffeeYr6;
                            }
                                
                            /* --------Form 6 Input Cost(IC)--------------------------- */
                            $x="sum( if( substr( `p`.`interview_date`, 1, 4 ) = '2013', ((`c`.`coffee_improved_cost`) + (`c`.`coffee_fertilizer_cost`) + (`c`.`coffee_chemical_cost`) + (`c`.`coffee_cost_ict`) + (`c`.`coffee_machinery_cost`)), 0 ) ) AS inputCostCoffeeYr1,
                                sum( if( substr( `p`.`interview_date`, 1, 4 ) = '2014', ((`c`.`coffee_improved_cost`) + (`c`.`coffee_fertilizer_cost`) + (`c`.`coffee_chemical_cost`) + (`c`.`coffee_cost_ict`) + (`c`.`coffee_machinery_cost`)), 0 ) ) AS inputCostCoffeeYr2,
                                sum( if( substr( `p`.`interview_date`, 1, 4 ) = '2015', ((`c`.`coffee_improved_cost`) + (`c`.`coffee_fertilizer_cost`) + (`c`.`coffee_chemical_cost`) + (`c`.`coffee_cost_ict`) + (`c`.`coffee_machinery_cost`)), 0 ) ) AS inputCostCoffeeYr3,
                                sum( if( substr( `p`.`interview_date`, 1, 4 ) = '2016', ((`c`.`coffee_improved_cost`) + (`c`.`coffee_fertilizer_cost`) + (`c`.`coffee_chemical_cost`) + (`c`.`coffee_cost_ict`) + (`c`.`coffee_machinery_cost`)), 0 ) ) AS inputCostCoffeeYr4,
                                sum( if( substr( `p`.`interview_date`, 1, 4 ) = '2017', ((`c`.`coffee_improved_cost`) + (`c`.`coffee_fertilizer_cost`) + (`c`.`coffee_chemical_cost`) + (`c`.`coffee_cost_ict`) + (`c`.`coffee_machinery_cost`)), 0 ) ) AS inputCostCoffeeYr5,
                                sum( if( substr( `p`.`interview_date`, 1, 4 ) = '2018', ((`c`.`coffee_improved_cost`) + (`c`.`coffee_fertilizer_cost`) + (`c`.`coffee_chemical_cost`) + (`c`.`coffee_cost_ict`) + (`c`.`coffee_machinery_cost`)), 0 ) ) AS inputCostCoffeeYr6
                                from `tbl_frm6particulars` as `p`
                                join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patid`=`p`.`pk_patid`)
                                where 2.2=2.2
                                and `p`.`interview_date` <= ('2015-10-31')";
                                $this->db->select($x,FALSE);
                                $db_rows = $this->db->get();
                                if ($db_rows->num_rows() > 0) {
                                    foreach ($db_rows->result() as $data) {
                                        $resultSoldCost[] = $data;
                                    }
                                    
                                }
                                foreach ($resultSoldCost as $row) {
                                $inputCostCoffeeYr1=$this->convertShillingsToDollars($row->inputCostCoffeeYr1);
                                $inputCostCoffeeYr2=$this->convertShillingsToDollars($row->inputCostCoffeeYr2);
                                $inputCostCoffeeYr3=$this->convertShillingsToDollars($row->inputCostCoffeeYr3);
                                $inputCostCoffeeYr4=$this->convertShillingsToDollars($row->inputCostCoffeeYr4);
                                $inputCostCoffeeYr5=$this->convertShillingsToDollars($row->inputCostCoffeeYr5);
                                $inputCostCoffeeYr6=$this->convertShillingsToDollars($row->inputCostCoffeeYr6);
                            }
                                
                            /* --------Form 6 Unit of Production/Area(UP)--------------------------- */
                            $x="sum( if( substr( `p`.`interview_date`, 1, 4 ) = '2013', ((`c`.`coffee_acreage`)), 0 ) ) AS unitProductionCoffeeYr1,
                                sum( if( substr( `p`.`interview_date`, 1, 4 ) = '2014', ((`c`.`coffee_acreage`)), 0 ) ) AS unitProductionCoffeeYr2,
                                sum( if( substr( `p`.`interview_date`, 1, 4 ) = '2015', ((`c`.`coffee_acreage`)), 0 ) ) AS unitProductionCoffeeYr3,
                                sum( if( substr( `p`.`interview_date`, 1, 4 ) = '2016', ((`c`.`coffee_acreage`)), 0 ) ) AS unitProductionCoffeeYr4,
                                sum( if( substr( `p`.`interview_date`, 1, 4 ) = '2017', ((`c`.`coffee_acreage`)), 0 ) ) AS unitProductionCoffeeYr5,
                                sum( if( substr( `p`.`interview_date`, 1, 4 ) = '2018', ((`c`.`coffee_acreage`)), 0 ) ) AS unitProductionCoffeeYr6
                                from `tbl_frm6particulars` as `p`
                                join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patid`=`p`.`pk_patid`)
                                where 2.2=2.2
                                and `p`.`interview_date` <= ('2015-10-31')";
                                $this->db->select($x,FALSE);
                                $db_rows = $this->db->get();
                                if ($db_rows->num_rows() > 0) {
                                    foreach ($db_rows->result() as $data) {
                                        $resultPC[] = $data;
                                    }
                                    
                                }
                                foreach ($resultPC as $row) {
                                $unitProductionCoffeeYr1=$this->convertAcresToHectares($row->unitProductionCoffeeYr1);
                                $unitProductionCoffeeYr2=$this->convertAcresToHectares($row->unitProductionCoffeeYr2);
                                $unitProductionCoffeeYr3=$this->convertAcresToHectares($row->unitProductionCoffeeYr3);
                                $unitProductionCoffeeYr4=$this->convertAcresToHectares($row->unitProductionCoffeeYr4);
                                $unitProductionCoffeeYr5=$this->convertAcresToHectares($row->unitProductionCoffeeYr5);
                                $unitProductionCoffeeYr6=$this->convertAcresToHectares($row->unitProductionCoffeeYr6);
                            }
                                
                                /* Calculating Gross Margin Per Unit of land (BEANS) based on the following formula:
                                (((TP*(VS/QS))-IC)/UP)*Extrapolation Factor  */

                                $st=$this->ExtrapolationFactor(2.2);
                                $this->db->select($st,FALSE);
                                $db_rows = $this->db->get();
                                if ($db_rows->num_rows() > 0) {
                                    foreach ($db_rows->result() as $data) {
                                        $resultExtC[] = $data;
                                    }
                                    
                                }
                                foreach ($resultExtC as $row) {
                                $extrapolationFactorYr1=$row->exFactorYr1;
                                $extrapolationFactorYr2=$row->exFactorYr2;
                                $extrapolationFactorYr3=$row->exFactorYr3;
                                $extrapolationFactorYr4=$row->exFactorYr4;
                                $extrapolationFactorYr5=$row->exFactorYr5;
                                $extrapolationFactorYr6=$row->exFactorYr6;
                            }

                                $GrossMarginPerUnitOfLandRecomputedCoffeeYr1=$this->GrossMarginPerUnitOfLandRecomputed($TotProdCoffeeYr1,$VolSalesCoffeeYr1,$VolSoldCoffeeYr1,$inputCostCoffeeYr1,$unitProductionCoffeeYr1,$extrapolationFactorYr1);
                                $GrossMarginPerUnitOfLandRecomputedCoffeeYr2=$this->GrossMarginPerUnitOfLandRecomputed($TotProdCoffeeYr2,$VolSalesCoffeeYr2,$VolSoldCoffeeYr2,$inputCostCoffeeYr2,$unitProductionCoffeeYr2,$extrapolationFactorYr2);
                                $GrossMarginPerUnitOfLandRecomputedCoffeeYr3=$this->GrossMarginPerUnitOfLandRecomputed($TotProdCoffeeYr3,$VolSalesCoffeeYr3,$VolSoldCoffeeYr3,$inputCostCoffeeYr3,$unitProductionCoffeeYr3,$extrapolationFactorYr3);
                                $GrossMarginPerUnitOfLandRecomputedCoffeeYr4=$this->GrossMarginPerUnitOfLandRecomputed($TotProdCoffeeYr4,$VolSalesCoffeeYr4,$VolSoldCoffeeYr4,$inputCostCoffeeYr4,$unitProductionCoffeeYr4,$extrapolationFactorYr4);
                                $GrossMarginPerUnitOfLandRecomputedCoffeeYr5=$this->GrossMarginPerUnitOfLandRecomputed($TotProdCoffeeYr5,$VolSalesCoffeeYr5,$VolSoldCoffeeYr5,$inputCostCoffeeYr5,$unitProductionCoffeeYr5,$extrapolationFactorYr5);
                                $GrossMarginPerUnitOfLandRecomputedCoffeeYr6=$this->GrossMarginPerUnitOfLandRecomputed($TotProdCoffeeYr6,$VolSalesCoffeeYr6,$VolSoldCoffeeYr6,$inputCostCoffeeYr6,$unitProductionCoffeeYr6,$extrapolationFactorYr6);
                                
                                $resultx['notrainedYr1'] = $GrossMarginPerUnitOfLandRecomputedCoffeeYr1;
                                $resultx['notrainedYr2'] = $GrossMarginPerUnitOfLandRecomputedCoffeeYr2;
                                $resultx['notrainedYr3'] = $GrossMarginPerUnitOfLandRecomputedCoffeeYr3;
                                $resultx['notrainedYr4'] = $GrossMarginPerUnitOfLandRecomputedCoffeeYr4;
                                $resultx['notrainedYr5'] = $GrossMarginPerUnitOfLandRecomputedCoffeeYr5;
                                $resultx['notrainedYr6'] = $GrossMarginPerUnitOfLandRecomputedCoffeeYr6;
                                return $resultx[$resultValue];
                            }
function grossMarginPerUnitOfLandMaize($resultValue=""){
    
      /* --------Form 6 Total Production Maize(TP)--------------------------- */
                            $x="sum( if( substr( `p`.`interview_date`, 1, 4 ) = '2013', ((`m`.`maize_harvested`)), 0 ) ) AS TotProdMaizeYr1,
                                sum( if( substr( `p`.`interview_date`, 1, 4 ) = '2014', ((`m`.`maize_harvested`)), 0 ) ) AS TotProdMaizeYr2,
                                sum( if( substr( `p`.`interview_date`, 1, 4 ) = '2015', ((`m`.`maize_harvested`)), 0 ) ) AS TotProdMaizeYr3,
                                sum( if( substr( `p`.`interview_date`, 1, 4 ) = '2016', ((`m`.`maize_harvested`)), 0 ) ) AS TotProdMaizeYr4,
                                sum( if( substr( `p`.`interview_date`, 1, 4 ) = '2017', ((`m`.`maize_harvested`)), 0 ) ) AS TotProdMaizeYr5,
                                sum( if( substr( `p`.`interview_date`, 1, 4 ) = '2018', ((`m`.`maize_harvested`)), 0 ) ) AS TotProdMaizeYr6
                                from `tbl_frm6particulars` as `p`
                                join `tbl_frm6production_maize` as `m` on (`m`.`fk_patid`=`p`.`pk_patid`)
                                where 2.3=2.3
                                and `p`.`interview_date` <= ('2015-10-31')";
                                $this->db->select($x,FALSE);
                                $db_rows = $this->db->get();
                                if ($db_rows->num_rows() > 0) {
                                    foreach ($db_rows->result() as $data) {
                                        $result[] = $data;
                                    }
                                    
                                }
                                foreach ($result as $row) {
                                $TotProdMaizeYr1=$row->TotProdMaizeYr1;
                                $TotProdMaizeYr2=$row->TotProdMaizeYr2;
                                $TotProdMaizeYr3=$row->TotProdMaizeYr3;
                                $TotProdMaizeYr4=$row->TotProdMaizeYr4;
                                $TotProdMaizeYr5=$row->TotProdMaizeYr5;
                                $TotProdMaizeYr6=$row->TotProdMaizeYr6;
                            }
                                
                            /* --------Form 6 Value of sales(VS)--------------------------- */
                            $x="sum( if( substr( `p`.`interview_date`, 1, 4 ) = '2013', ((`m`.`maize_sold`)*(`m`.`maize_sold_price`)), 0 ) ) AS VolSalesMaizeYr1,
                                sum( if( substr( `p`.`interview_date`, 1, 4 ) = '2014', ((`m`.`maize_sold`)*(`m`.`maize_sold_price`)), 0 ) ) AS VolSalesMaizeYr2,
                                sum( if( substr( `p`.`interview_date`, 1, 4 ) = '2015', ((`m`.`maize_sold`)*(`m`.`maize_sold_price`)), 0 ) ) AS VolSalesMaizeYr3,
                                sum( if( substr( `p`.`interview_date`, 1, 4 ) = '2016', ((`m`.`maize_sold`)*(`m`.`maize_sold_price`)), 0 ) ) AS VolSalesMaizeYr4,
                                sum( if( substr( `p`.`interview_date`, 1, 4 ) = '2017', ((`m`.`maize_sold`)*(`m`.`maize_sold_price`)), 0 ) ) AS VolSalesMaizeYr5,
                                sum( if( substr( `p`.`interview_date`, 1, 4 ) = '2018', ((`m`.`maize_sold`)*(`m`.`maize_sold_price`)), 0 ) ) AS VolSalesMaizeYr6
                                from `tbl_frm6particulars` as `p`
                                join `tbl_frm6production_maize` as `m` on (`m`.`fk_patid`=`p`.`pk_patid`)
                                where 2.3=2.3
                                and `p`.`interview_date` <= ('2015-10-31')";
                                $this->db->select($x,FALSE);
                                $db_rows = $this->db->get();
                                if ($db_rows->num_rows() > 0) {
                                    foreach ($db_rows->result() as $data) {
                                        $resultSM[] = $data;
                                    }
                                    
                                }
                                foreach ($resultSM as $row) {
                                $VolSalesMaizeYr1=$this->convertShillingsToDollars($row->VolSalesMaizeYr1);
                                $VolSalesMaizeYr2=$this->convertShillingsToDollars($row->VolSalesMaizeYr2);
                                $VolSalesMaizeYr3=$this->convertShillingsToDollars($row->VolSalesMaizeYr3);
                                $VolSalesMaizeYr4=$this->convertShillingsToDollars($row->VolSalesMaizeYr4);
                                $VolSalesMaizeYr5=$this->convertShillingsToDollars($row->VolSalesMaizeYr5);
                                $VolSalesMaizeYr6=$this->convertShillingsToDollars($row->VolSalesMaizeYr6);
                            }
                                
                            /* --------Form 6 Volume sold(QS)--------------------------- */
                            $x="sum( if( substr( `p`.`interview_date`, 1, 4 ) = '2013', ((`m`.`maize_sold`)), 0 ) ) AS VolSoldMaizeYr1,
                                sum( if( substr( `p`.`interview_date`, 1, 4 ) = '2014', ((`m`.`maize_sold`)), 0 ) ) AS VolSoldMaizeYr2,
                                sum( if( substr( `p`.`interview_date`, 1, 4 ) = '2015', ((`m`.`maize_sold`)), 0 ) ) AS VolSoldMaizeYr3,
                                sum( if( substr( `p`.`interview_date`, 1, 4 ) = '2016', ((`m`.`maize_sold`)), 0 ) ) AS VolSoldMaizeYr4,
                                sum( if( substr( `p`.`interview_date`, 1, 4 ) = '2017', ((`m`.`maize_sold`)), 0 ) ) AS VolSoldMaizeYr5,
                                sum( if( substr( `p`.`interview_date`, 1, 4 ) = '2018', ((`m`.`maize_sold`)), 0 ) ) AS VolSoldMaizeYr6
                                from `tbl_frm6particulars` as `p`
                                join `tbl_frm6production_maize` as `m` on (`m`.`fk_patid`=`p`.`pk_patid`)
                                where 2.3=2.3
                                and `p`.`interview_date` <= ('2015-10-31')";
                                $this->db->select($x,FALSE);
                                $db_rows = $this->db->get();
                                if ($db_rows->num_rows() > 0) {
                                    foreach ($db_rows->result() as $data) {
                                        $resultSoldM[] = $data;
                                    }
                                   
                                }
                                foreach ($resultSoldM as $row) {
                                $VolSoldMaizeYr1=$row->VolSoldMaizeYr1;
                                $VolSoldMaizeYr2=$row->VolSoldMaizeYr2;
                                $VolSoldMaizeYr3=$row->VolSoldMaizeYr3;
                                $VolSoldMaizeYr4=$row->VolSoldMaizeYr4;
                                $VolSoldMaizeYr5=$row->VolSoldMaizeYr5;
                                $VolSoldMaizeYr6=$row->VolSoldMaizeYr6;
                            }
                                
                            /* --------Form 6 Input Cost(IC)--------------------------- */
                            $x="sum( if( substr( `p`.`interview_date`, 1, 4 ) = '2013', ((`m`.`maize_improved_cost`) + (`m`.`maize_fertilizer_cost`) + (`m`.`maize_chemical_cost`) + (`m`.`maize_cost_ict`) + (`m`.`maize_machinery_cost`)), 0 ) ) AS inputCostMaizeYr1,
                                sum( if( substr( `p`.`interview_date`, 1, 4 ) = '2014', ((`m`.`maize_improved_cost`) + (`m`.`maize_fertilizer_cost`) + (`m`.`maize_chemical_cost`) + (`m`.`maize_cost_ict`) + (`m`.`maize_machinery_cost`)), 0 ) ) AS inputCostMaizeYr2,
                                sum( if( substr( `p`.`interview_date`, 1, 4 ) = '2015', ((`m`.`maize_improved_cost`) + (`m`.`maize_fertilizer_cost`) + (`m`.`maize_chemical_cost`) + (`m`.`maize_cost_ict`) + (`m`.`maize_machinery_cost`)), 0 ) ) AS inputCostMaizeYr3,
                                sum( if( substr( `p`.`interview_date`, 1, 4 ) = '2016', ((`m`.`maize_improved_cost`) + (`m`.`maize_fertilizer_cost`) + (`m`.`maize_chemical_cost`) + (`m`.`maize_cost_ict`) + (`m`.`maize_machinery_cost`)), 0 ) ) AS inputCostMaizeYr4,
                                sum( if( substr( `p`.`interview_date`, 1, 4 ) = '2017', ((`m`.`maize_improved_cost`) + (`m`.`maize_fertilizer_cost`) + (`m`.`maize_chemical_cost`) + (`m`.`maize_cost_ict`) + (`m`.`maize_machinery_cost`)), 0 ) ) AS inputCostMaizeYr5,
                                sum( if( substr( `p`.`interview_date`, 1, 4 ) = '2018', ((`m`.`maize_improved_cost`) + (`m`.`maize_fertilizer_cost`) + (`m`.`maize_chemical_cost`) + (`m`.`maize_cost_ict`) + (`m`.`maize_machinery_cost`)), 0 ) ) AS inputCostMaizeYr6
                                from `tbl_frm6particulars` as `p`
                                join `tbl_frm6production_maize` as `m` on (`m`.`fk_patid`=`p`.`pk_patid`)
                                where 2.3=2.3
                                and `p`.`interview_date` <= ('2015-10-31')";
                                $this->db->select($x,FALSE);
                                $db_rows = $this->db->get();
                                if ($db_rows->num_rows() > 0) {
                                    foreach ($db_rows->result() as $data) {
                                        $resultCM[] = $data;
                                    }
                                    
                                }
                                foreach ($resultCM as $row) {
                                $inputCostMaizeYr1=$this->convertShillingsToDollars($row->inputCostMaizeYr1);
                                $inputCostMaizeYr2=$this->convertShillingsToDollars($row->inputCostMaizeYr2);
                                $inputCostMaizeYr3=$this->convertShillingsToDollars($row->inputCostMaizeYr3);
                                $inputCostMaizeYr4=$this->convertShillingsToDollars($row->inputCostMaizeYr4);
                                $inputCostMaizeYr5=$this->convertShillingsToDollars($row->inputCostMaizeYr5);
                                $inputCostMaizeYr6=$this->convertShillingsToDollars($row->inputCostMaizeYr6);
                            }
                                
                            /* --------Form 6 Unit of Production/Area(UP)--------------------------- */
                            $x="sum( if( substr( `p`.`interview_date`, 1, 4 ) = '2013', ((`m`.`maize_acreage`)), 0 ) ) AS unitProductionMaizeYr1,
                                sum( if( substr( `p`.`interview_date`, 1, 4 ) = '2014', ((`m`.`maize_acreage`)), 0 ) ) AS unitProductionMaizeYr2,
                                sum( if( substr( `p`.`interview_date`, 1, 4 ) = '2015', ((`m`.`maize_acreage`)), 0 ) ) AS unitProductionMaizeYr3,
                                sum( if( substr( `p`.`interview_date`, 1, 4 ) = '2016', ((`m`.`maize_acreage`)), 0 ) ) AS unitProductionMaizeYr4,
                                sum( if( substr( `p`.`interview_date`, 1, 4 ) = '2017', ((`m`.`maize_acreage`)), 0 ) ) AS unitProductionMaizeYr5,
                                sum( if( substr( `p`.`interview_date`, 1, 4 ) = '2018', ((`m`.`maize_acreage`)), 0 ) ) AS unitProductionMaizeYr6
                                from `tbl_frm6particulars` as `p`
                                join `tbl_frm6production_maize` as `m` on (`m`.`fk_patid`=`p`.`pk_patid`)
                                where 2.3=2.3
                                and `p`.`interview_date` <= ('2015-10-31')";
                                $this->db->select($x,FALSE);
                                $db_rows = $this->db->get();
                                if ($db_rows->num_rows() > 0) {
                                    foreach ($db_rows->result() as $data) {
                                        $resultPM[] = $data;
                                    }
                                    
                                }
                                foreach ($resultPM as $row) {
                                $unitProductionMaizeYr1=$this->convertAcresToHectares($row->unitProductionMaizeYr1);
                                $unitProductionMaizeYr2=$this->convertAcresToHectares($row->unitProductionMaizeYr2);
                                $unitProductionMaizeYr3=$this->convertAcresToHectares($row->unitProductionMaizeYr3);
                                $unitProductionMaizeYr4=$this->convertAcresToHectares($row->unitProductionMaizeYr4);
                                $unitProductionMaizeYr5=$this->convertAcresToHectares($row->unitProductionMaizeYr5);
                                $unitProductionMaizeYr6=$this->convertAcresToHectares($row->unitProductionMaizeYr6);
                            }
                                
                                /* Calculating Gross Margin Per Unit of land (MAIZE) based on the following formula:
                                (((TP*(VS/QS))-IC)/UP)*Extrapolation Factor  */

                                $st=$this->ExtrapolationFactor(2.3);
                                $this->db->select($st,FALSE);
                                $db_rows = $this->db->get();
                                if ($db_rows->num_rows() > 0) {
                                    foreach ($db_rows->result() as $data) {
                                        $resultExtM[] = $data;
                                    }
                                    
                                }
                                foreach ($resultExtM as $row) {
                                $extrapolationFactorYr1=$row->exFactorYr1;
                                $extrapolationFactorYr2=$row->exFactorYr2;
                                $extrapolationFactorYr3=$row->exFactorYr3;
                                $extrapolationFactorYr4=$row->exFactorYr4;
                                $extrapolationFactorYr5=$row->exFactorYr5;
                                $extrapolationFactorYr6=$row->exFactorYr6;
                            }

                                $GrossMarginPerUnitOfLandRecomputedMaizeYr1=$this->GrossMarginPerUnitOfLandRecomputed($TotProdMaizeYr1,$VolSalesMaizeYr1,$VolSoldMaizeYr1,$inputCostMaizeYr1,$unitProductionMaizeYr1,$extrapolationFactorYr1);
                                $GrossMarginPerUnitOfLandRecomputedMaizeYr2=$this->GrossMarginPerUnitOfLandRecomputed($TotProdMaizeYr2,$VolSalesMaizeYr2,$VolSoldMaizeYr2,$inputCostMaizeYr2,$unitProductionMaizeYr2,$extrapolationFactorYr2);
                                $GrossMarginPerUnitOfLandRecomputedMaizeYr3=$this->GrossMarginPerUnitOfLandRecomputed($TotProdMaizeYr3,$VolSalesMaizeYr3,$VolSoldMaizeYr3,$inputCostMaizeYr3,$unitProductionMaizeYr3,$extrapolationFactorYr3);
                                $GrossMarginPerUnitOfLandRecomputedMaizeYr4=$this->GrossMarginPerUnitOfLandRecomputed($TotProdMaizeYr4,$VolSalesMaizeYr4,$VolSoldMaizeYr4,$inputCostMaizeYr4,$unitProductionMaizeYr4,$extrapolationFactorYr4);
                                $GrossMarginPerUnitOfLandRecomputedMaizeYr5=$this->GrossMarginPerUnitOfLandRecomputed($TotProdMaizeYr5,$VolSalesMaizeYr5,$VolSoldMaizeYr5,$inputCostMaizeYr5,$unitProductionMaizeYr5,$extrapolationFactorYr5);
                                $GrossMarginPerUnitOfLandRecomputedMaizeYr6=$this->GrossMarginPerUnitOfLandRecomputed($TotProdMaizeYr6,$VolSalesMaizeYr6,$VolSoldMaizeYr6,$inputCostMaizeYr6,$unitProductionMaizeYr6,$extrapolationFactorYr6);
                                
                                $resultx['notrainedYr1'] = $GrossMarginPerUnitOfLandRecomputedMaizeYr1;
                                $resultx['notrainedYr2'] = $GrossMarginPerUnitOfLandRecomputedMaizeYr2;
                                $resultx['notrainedYr3'] = $GrossMarginPerUnitOfLandRecomputedMaizeYr3;
                                $resultx['notrainedYr4'] = $GrossMarginPerUnitOfLandRecomputedMaizeYr4;
                                $resultx['notrainedYr5'] = $GrossMarginPerUnitOfLandRecomputedMaizeYr5;
                                $resultx['notrainedYr6'] = $GrossMarginPerUnitOfLandRecomputedMaizeYr6;
                                return $resultx[$resultValue];
                            }




}

?>