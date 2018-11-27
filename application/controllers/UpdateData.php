<?php

/**
 * Created by PhpStorm.
 * User: aungpoa
 * Date: 11/18/2018
 * Time: 9:35 AM
 */
class UpdateData extends CI_Controller
{
    function updaterecruit()
    {
        $pk = $this->input->post('pk');
        $title = $this->input->post('title');
        $name = $this->input->post('name');
        $lastname = $this->input->post('lastname');
        $age = $this->input->post('age');
        $number = $this->input->post('number');
        $moo = $this->input->post('moo');
        $tumbol = $this->input->post('tumbol');
        $detailaddres = $this->input->post('detailaddress');
        $detail = $this->input->post('detail');
        $this->UpdateModel->updaterecruit($pk, $title, $name, $lastname, $age, $number, $moo, $tumbol, $detailaddres, $detail);
    }
    function updatemoo()
    {
        $pk = $this->input->post('pk');
        $name = $this->input->post('name');
        $this->UpdateModel->updatemoo($pk, $name);
    }
    function updatetumbol()
    {
        $pk = $this->input->post('pk');
        $name = $this->input->post('name');
        $this->UpdateModel->updatetumbol($pk, $name);
    }
    function updatepersonal()
    {
        $pk = $this->input->post('pk');
        $title = $this->input->post('title');
        $position = $this->input->post('position');
        $name = $this->input->post('name');
        $noaddress = $this->input->post('noaddress');
        $tel = $this->input->post('tel');
        $moo = $this->input->post('moo');
        $tumbol = $this->input->post('tumbol');
        $detail = $this->input->post('detail');
        $userlogin = $this->input->post('userlogin');
        $pwd = $this->input->post('pwd');
        $this->UpdaeModel->updatepersonal($pk, $title, $position, $name, $noaddress, $tel, $moo, $tumbol, $detail, $userlogin, $pwd);
    }
    function updateposition()
    {
        $pk = $this->input->post('pk');
        $name = $this->input->post('name');
        $this->UpdateModel->updateposition($pk, $name);
    }
    function updateproject()
    {
        $pk = $this->input->post('pk');
        $before = $this->input->post('before');
        $after = $this->input->post('after');
        $this->UpdateModel->updateproject($pk, $before, $after);
    }
    function finishproject()
    {
        $this->UpdateModel->finishproject($this->input->post('pk'));
    }
    function confirmperson()
    {
        $this->UpdateModel->confirmperson($this->input->post('pk'));
    }
    function updateschedule()
    {
        $pk = $this->input->post('pk');
        $datebefore = $this->input->post('datebefore');
        $dateafter = $this->input->post('dateafter');
        $bpid = $this->input->post('bpid');
        $mooid = $this->input->post('mooid');
        $this->UpdateModel->updateschedule($pk, $datebefore, $dateafter,$bpid,$mooid);
    }
    function closeschedule()
    {
        $this->db->where('sch_id',$this->input->post('id'))->update('schedule',['sch_status'=>2]);
    }
    function updateinform()
    {
        $this->db->where('le_id',$this->input->post("id"))->update('leave',['le_status'=>2]);
    }
    function finishcheck()
    {
        $this->db->where('le_id',$this->input->post("id"))->update('leave',['le_status'=>3]);
    }
    function finishcheckdoc()
    {
        $this->db->where('le_id',$this->input->post("id"))->update('leave',['le_status'=>4]);
    }
    function finishambulance()
    {
        $this->db->where('amb_id',$this->input->post('id'))->update('ambulance',['amb_status'=>2]);
    }
    function outofproject()
    {
        $this->db->where('rc_id',$this->input->get('id'))->update('recruit',['rc_outofproject'=>2]);
        redirect("welcome/outofproject","refresh");
        exit();
    }
}