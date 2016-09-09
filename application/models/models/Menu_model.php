<?php
/**
 * Created by PhpStorm.
 * User: aasiimwe
 * Date: 1/11/2016
 * Time: 7:27 PM
 */


class Menu_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    function Categories()
    {
        $displayValue='Yes';
        $this->db->select('*');
        $this->db->from('tbl_menu_categories');
        $this->db->where('display', $displayValue);
        $this->db->order_by("Rank", "MenuCategory", "desc");
        $db_rows = $this->db->get();

        if ($db_rows->num_rows() > 0) {
            foreach ($db_rows->result() as $data) {
                $db_data_fetched_array[] = $data;
            }
            return $db_data_fetched_array;
        }
    }

}
