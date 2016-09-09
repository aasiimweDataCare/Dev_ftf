<?php
/**
 * Created by PhpStorm.
 * User: aasiimwe
 * Date: 1/13/2016
 * Time: 12:49 PM
 */

class Dashindicatorthree_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    function getIndicator3volumesPurchased()
    {
        $this->db->select("sum(`volMaizePurchased` + `volCoffeePurchased` + `volBeansPurchased`) as volumesPurchased
                            from `tbl_form4_traders`", FALSE);

        $db_rows = $this->db->get();

        if ($db_rows->num_rows() > 0) {
            foreach ($db_rows->result() as $data) {
                $db_data_fetched_array[] = $data;
            }
            return $db_data_fetched_array;
        }
    }





}
