<?php

/**
 * Created by PhpStorm.
 * User: aungpoa
 * Date: 11/26/2018
 * Time: 9:24 AM
 */
class LoginPage extends CI_Controller
{
    function login()
    {
        $this->load->view('login/login');
    }
    function checklogin()
    {
        $username = $this->input->post('username');
        $pass = $this->input->post('pass');
        $query = $this->db->get_where('personal',array("ps_userlogin"=>$username,"ps_pwd"=>$pass));
        if($query->num_rows() > 0 ){
            foreach($query->result() as $item){
                $this->session->set_userdata(array("userlogin"=>$item->ps_id,"ps_position"=>$item->ps_position));
                redirect("welcome/index","refresh");
                exit();
            }
        }
        redirect("LoginPage/login","refresh");
        exit();
    }
}