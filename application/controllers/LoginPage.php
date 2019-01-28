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
    function forgotpass(){
        $this->load->view('forgetpass/forgetpass');
    }
    function newregis()
    {
        $this->load->view('register/newregis');
    }
    function logout()
    {
        $this->session->sess_destroy();
        redirect('LoginPage/login','refresh');
        exit();
    }
    function register()
    {
        $title = $this->input->post('title');
        $position = $this->input->post('position');
        $name = $this->input->post('name');
        $noaddress = $this->input->post('noaddress');
        $tel = $this->input->post('tel');
        $moo = $this->input->post('moo');
        $tumbol = $this->input->post('tumbol');
        $detail = $this->input->post('detail');
        $username = $this->input->post('username');
        $pwd = $this->input->post('pwd');
        $questiondetail = $this->input->post('questiondetail');
        $anwserdetail = $this->input->post('anwserdetail');
        $data = array(
            'ps_name'=>$name,
            'ps_position'=>$position,
            'ps_no'=>$noaddress,
            'ps_tel'=>$tel,
            'ps_tumbol'=>$tumbol,
            'ps_moo'=>$moo,
            'ps_detail'=>$detail,
            'ps_title'=>$title,
            'ps_userlogin'=>$username,
            'ps_pwd'=>$pwd
        );
        $this->db->insert('personal',$data);
        $insert_id = $this->db->insert_id();
        $data1 = array(
            'quest_ack_id'=>$questiondetail,
            'quest_awser'=>$anwserdetail,
            'register_id'=>$insert_id
        );
        $this->db->insert('quest_register',$data1);
        $this->session->set_userdata(array('userlogin'=>$insert_id,'ps_position'=>$position));
        redirect("welcome/index","refresh");
        exit();
    }
    function forgetpasscheck()
    {
        $phone = $this->input->post('phone');
        $question = $this->input->post('question');
        $anwser = $this->input->post('anwser');
        $pass = $this->input->post('pass');
        $query = $this->db->select('*')->from('personal')->where('ps_tel',$phone)->get();
        if($query->num_rows() > 0){
            foreach($query->result() as $item){
                $quest = $this->db->select('*')->from('quest_register')->where('quest_ack_id',$question)
                    ->where('quest_awser',$anwser)->where('register_id',$item->ps_id)->get();
                if($quest->num_rows() > 0){
                    $this->db->where('ps_id',$item->ps_id)->update('personal',['ps_pwd'=>$pass]);
                    $this->session->set_userdata(array('userlogin'=>$item->ps_id,'ps_position'=>$item->ps_position));
                    redirect("welcome/index","refresh");
                    exit();
                }else{
                    echo '<script>alert("คำถามหรือคำตอบของคุณไม่ถูกต้องค่ะ");</script>';
                    redirect('LoginPage/forgotpass','refresh');
                    exit();
                }
            }

        }else{
            echo '<script>alert("ไม่มีเบอร์โทรนี้ในระบบค่ะ");</script>';
            redirect('LoginPage/forgotpass','refresh');
            exit();
        }
    }
}