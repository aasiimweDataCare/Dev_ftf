<?php
/**
 * Created by PhpStorm.
 * User: aasiimwe
 * Date: 9/19/2015
 * Time: 11:26 PM
 */

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class LoginController extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->helper('html');
        $this->load->database();
        $this->load->library('form_validation');
        //load the login model
        $this->load->model('Login_model');
    }

    public function index()
    {
        //get the posted values
        $pageName='Dashboard';
        $username = $this->input->post("txt_username");
        $password = $this->input->post("txt_password");

        //set validations
        $this->form_validation->set_rules("txt_username", "Username", "trim|required");
        $this->form_validation->set_rules("txt_password", "Password", "trim|required");

        if ($this->form_validation->run() == FALSE)
        {
            //validation fails
            $this->load->view('login_view');
        }
        else
        {
            //validation succeeds
            if ($this->input->post('btn_login') == "Sign In")
            {
                //check if username and password is correct
                $usr_result = $this->Login_model->get_user($username, $password);
                if ($usr_result > 0) //active user record is present
                {
                    $data['data_get_creds'] = $this->Login_model->getUserData($username, $password);
                    $data['data_get_active_qtr'] = $this->Login_model->getActiveQtr();

                    //set the session variables
                    foreach ($data['data_get_creds'] as $row) {

                        foreach ($data['data_get_active_qtr'] as $rowQtr) {

                        }

                            $sessiondata = array(
                                'role_id' => $row->role,
                                'user_name' => $row->username,
                                'page_name' => $pageName,
                                'CPMactiveyear' => $rowQtr->year,
                                'ipAddress' => $_SERVER['REMOTE_ADDR'],
                                'user_id' => $row->user_id,
                                'name' => $row->name,
                                'projectName' => $row->title,
                                'districtCode' => ($row->districtCode == 0) ? "" : $row->districtCode,
                                'district' => $row->districtName,
                                'UserGroup' => $row->group_name,
                                'role' => $row->role_name,
                                'CPMquarter' => $rowQtr->quarter,
                                'org_code' => $row->org_code,
                                'orgName' => $row->orgName,
                                'countryNameLogin' => $row->countryName,
                                'ClosingDate' => $rowQtr->endDate[0],
                                'StartDate' => $rowQtr->startDate,
                                'loginuser' => TRUE
                            );
                            $this->session->set_userdata($sessiondata);
                            //log the user session
                            $this->Login_model->Login_systemLogs();


                            $currentDate=date('Y-m-d');
                            $closingDate=$rowQtr->endDate;
                            if($currentDate<=$closingDate){
                                $this->Login_model->Close_reportingPeriod();
                            }
                            redirect("DashboardController/index");


                    }


                }
                else
                {
                    $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Invalid username and password!</div>');
                    redirect('LoginController/index');
                }
            }
            //if validation fails
            else
            {
                redirect('LoginController/index');
            }
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('LoginController/index');
    }


}