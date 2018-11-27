<?php

/**
 * Created by PhpStorm.
 * User: aungpoa
 * Date: 11/20/2018
 * Time: 11:25 AM
 */
class ReportData extends CI_Controller
{
    function getpersonalproject()
    {
        $pk = $this->input->get('pk');
        $data = array('result'=>$this->QueryReport->getpersonalproject($pk));
        $this->load->view('header');
        $this->load->view('personproject/personproject',$data);
        $this->load->view('footer');
    }
    function getchecktrue()
    {
        $data = array('result'=>$this->QueryReport->getfinalists($this->input->get('pk')));
        $this->load->view('report/finalists/finalists',$data);

    }
    function reportambulance()
    {
        $name = $this->input->get('name');
        $lastname = $this->input->get('lastname');
        $detail = $this->input->get('detail');
        $result = array("name"=>$name, 'lastname'=>$lastname, 'detail'=>$detail);
        $this->load->view('report/header');
        $this->load->view('report/ambulance/ambulance',$result);
        $this->load->view('report/footer');

    }
    function reportinfomation()
    {
        $this->load->view('header');
        $this->load->view('report/infomation/infomation');
        $this->load->view('footer');
    }
    function reportcheckinfo()
    {
        $id = $this->input->post('id');
        $datebefore = $this->input->post('datebefore');
        $dateafter = $this->input->post('dateafter');
        if($id == 1){
            $result = array('data'=>$this->QueryReport->qinfo($datebefore, $dateafter),'id'=>$id, 'date1'=>$datebefore,'date2'=>$dateafter);
        }else{
            $result = array('data'=>$this->QueryReport->qinfodoctor($datebefore, $dateafter),'id'=>$id, 'date1'=>$datebefore,'date2'=>$dateafter);
        }
        $this->load->view('report/header');
        $this->load->view('report/infomation/reportinfo',$result);
        $this->load->view('report/footer');
    }
    function reporthospital()
    {
        $this->load->view('header');
        $this->load->view('report/reporthospital/reporthospital');
        $this->load->view('footer');
    }
    function reportdetailhospital()
    {
        $datebefore = $this->input->post('datebefore');
        $dateafter = $this->input->post('dateafter');
        $result = array('data'=>$this->QueryReport->reportdetailhospital($datebefore, $dateafter),'date1'=>$datebefore,'date2'=>$dateafter);

        $this->load->view('report/header');
        $this->load->view('report/infomation/reportinfo',$result);
        $this->load->view('report/footer');
    }
    function outofproject()
    {
        $this->load->view('header');
        $this->load->view('report/outproject/outproject');
        $this->load->view('footer');
    }
    function reportoutofproject()
    {
        $id = $this->input->post('id');

        $result = array('data'=>$this->QueryReport->reportoutproject($id));

        $this->load->view('report/header');
        $this->load->view('report/outproject/reportoutofproject',$result);
        $this->load->view('report/footer');
    }
}