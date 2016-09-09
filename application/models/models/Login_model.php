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
}