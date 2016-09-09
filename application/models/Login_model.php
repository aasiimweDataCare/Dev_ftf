<?php
/**
 * Created by PhpStorm.
 * User: aasiimwe
 * Date: 9/19/2015
 * Time: 11:17 PM
 */

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Login_model extends CI_Model
{
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    //get the username & password from tbl_users
    function get_user($usr, $pwd)
    {
        $sql = "select u.user_id,u.org_code,u.name,u.username,u.password,u.usergroup,u.role,r.role_name,g.group_name,
                d.countryName,u.status,u.display,o.orgName,o.orgType
                from tbl_user u
                left join tbl_organization o on(u.org_code=o.org_code)
                left join tbl_country d on(d.countryCode=u.country)
                left join tbl_role r on(r.role_id=u.role)
                left join tbl_usergroup g on(u.usergroup=g.group_id)
                where u.username='" . $usr . "'
                and u.password='" . md5($pwd) . "'
                and u.status = 'active'
                and u.display like 'Yes' ";

        $query = $this->db->query($sql);
        
        return $query->num_rows();

    }


    //get the username & password from tbl_users
    function getUserData($usr, $pwd)
    {
        $this->db->select("u.user_id,u.org_code,u.name,u.username,u.password,u.usergroup,u.role,r.role_name,g.group_name,
                d.countryName,u.status,u.display,o.orgName,o.orgType
                from tbl_user u
                left join tbl_organization o on(u.org_code=o.org_code)
                left join tbl_country d on(d.countryCode=u.country)
                left join tbl_role r on(r.role_id=u.role)
                left join tbl_usergroup g on(u.usergroup=g.group_id)
                where u.username='" . $usr . "'
                and u.password='" . md5($pwd) . "'
                and u.status = 'active'
                and u.display like 'Yes'", FALSE);
        $db_rows = $this->db->get();
        if ($db_rows->num_rows() > 0) {
            foreach ($db_rows->result() as $data) {
                $db_data_fetched_array[] = $data;
            }
            return $db_data_fetched_array;
        }

    }

    //get the active quarter
    function getActiveQtr()
    {
        $this->db->select("`a`.* from `tbl_active` as `a`  where `a`.`status`='Open'", FALSE);
        $db_rows = $this->db->get();
        if ($db_rows->num_rows() > 0) {
            foreach ($db_rows->result() as $data) {
                $db_data_fetched_array[] = $data;
            }
            return $db_data_fetched_array;
        }

    }

    //save User session
    function Login_systemLogs()
    {
        $id = $this->session->userdata['user_id'];
        $role = $this->session->userdata['role'];
        $orgCode = $this->session->userdata['org_code'];
        $ipAddress = $this->session->userdata['ipAddress'];


        $data = array(
            'user_id' => $id,
            'role' => $role,
            'org_code' => $orgCode,
            'ip_address' => $ipAddress
        );
        $this->db->insert('tbl_login', $data);


    }

    //Close reportingPeriod
    function Close_reportingPeriod()
    {
        $current_status = 'Open';
        $new_status = 'Closed';

        $data = array(
            'quarter' => $new_status,
            'year' => $new_status
        );

        $this->db->like('status', $current_status, 'after');
        $this->db->update('tbl_active', $data);
    }
}