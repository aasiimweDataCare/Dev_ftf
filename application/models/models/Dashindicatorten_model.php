<?php

/**
 * Created by PhpStorm.
 * User: aasiimwe
 * Date: 1/11/2016
 * Time: 3:52 PM
 */
class DashindicatorTen_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    function IndicatorTenRegion($region)
    {
        $this->db->select("
		tbl_traders.traderName,
		tbl_input_sales.`nameOfMiddleValueChainActor`,
tbl_traders.traderRegion,
tbl_traders.traderDistrict,
sum(`inputsSoldByChemicals`) as inputsSoldByChemicals,
 sum(`inputsSoldByFarmImplements`) as inputsSoldByFarmImplements ,
 sum(`inputsSoldByFertilizers`) as inputsSoldByFertilizers,
  sum(`inputsSoldByHerbicides`) as inputsSoldByHerbicides,
 sum(`inputsSoldByOthers`) as inputsSoldByOthers,
  sum(`inputsSoldBySeeds`) as inputsSoldBySeeds
 FROM `tbl_input_sales_meta_data` 
 join tbl_input_sales  on(tbl_input_sales.id=tbl_input_sales_meta_data.input_sales_id)
 join tbl_traders on(tbl_input_sales.nameOfMiddleValueChainActor=tbl_traders.traderName)
 where tbl_traders.traderRegion='".$region."'
 group by tbl_traders.traderRegion
		", FALSE);

        $db_rows = $this->db->get();

        if ($db_rows->num_rows() > 0) {
            foreach ($db_rows->result() as $data) {
                $db_data_fetched_array[] = $data;
            }
            return $db_data_fetched_array;
        }
    }

    function IndicatorTenDistrict()
    {
        $this->db->select("tbl_traders.traderName,
		tbl_input_sales.`nameOfMiddleValueChainActor`,
tbl_traders.traderRegion,
tbl_traders.traderDistrict,
sum(`inputsSoldByChemicals`) as inputsSoldByChemicals,
 sum(`inputsSoldByFarmImplements`) as inputsSoldByFarmImplements ,
 sum(`inputsSoldByFertilizers`) as inputsSoldByFertilizers,
  sum(`inputsSoldByHerbicides`) as inputsSoldByHerbicides,
 sum(`inputsSoldByOthers`) as inputsSoldByOthers,
  sum(`inputsSoldBySeeds`) as inputsSoldBySeeds
 FROM `tbl_input_sales_meta_data` 
 join tbl_input_sales  on(tbl_input_sales.id=tbl_input_sales_meta_data.input_sales_id)
 join tbl_traders on(tbl_input_sales.nameOfMiddleValueChainActor=tbl_traders.traderName)
 group by tbl_traders.traderDistrict", FALSE);

        $db_rows_small = $this->db->get();

        if ($db_rows_small->num_rows() > 0) {
            foreach ($db_rows_small->result() as $data) {
                $db_data_fetched_array[] = $data;
            }
            return $db_data_fetched_array;
        }
    }



}
