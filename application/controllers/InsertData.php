<?php

/**
 * Created by PhpStorm.
 * User: aungpoa
 * Date: 11/18/2018
 * Time: 9:35 AM
 */
class InsertData extends CI_Controller
{
    function insertrecruit()
    {
        $title = $this->input->post('title');
        $name = $this->input->post('name');
        $lastname = $this->input->post('lastname');
        $age = $this->input->post('age');
        $number = $this->input->post('number');
        $moo = $this->input->post('moo');
        $tumbol = $this->input->post('tumbol');
        $detailaddres = $this->input->post('detailaddress');
        $detail = $this->input->post('detail');
        $this->InsertModel->insertrecruit($title, $name, $lastname, $age, $number, $moo, $tumbol, $detailaddres, $detail);
    }
    function insertmoo()
    {
        $mooname = $this->input->post('mooname');
        $this->InsertModel->insertmoo($mooname);
    }
    function inserttumbol()
    {
        $name = $this->input->post('name');
        $this->InsertModel->inserttumbol($name);
    }
    function insertpersonal()
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

        $this->InsertModel->insertpersonal($title, $position, $name, $noaddress, $tel, $moo, $tumbol, $detail,$username, $pwd);
    }
    function insertposition()
    {
        $name = $this->input->post('name');
        $this->InsertModel->insertposition($name);
    }
    function insertproject()
    {
        $before = $this->input->post('before');
        $after = $this->input->post('after');
        $this->InsertModel->insertproject($before, $after);
    }
    function insertschedule()
    {
        $datebefore = $this->input->post('datebefore');
        $dateafter = $this->input->post('dateafter');
        $bpid = $this->input->post('bpid');
        $mooid = $this->input->post('mooid');
        $this->InsertModel->insertschedule($datebefore, $dateafter,$bpid,$mooid);
    }
    function insertleave()
    {
        $schedule = $this->input->post('schedule');
        $person = $this->input->post('person');
        $recruit = $this->input->post('recruit');
        $detail = $this->input->post('detail');
        $this->InsertModel->insertleave($schedule, $person, $recruit, $detail);
    }
    function insertinfomation()
    {
        $pk = $this->input->post('pk');
        $pressure = $this->input->post('pressure');
        $detail = $this->input->post('detail');
        $this->InsertModel->insertinfomation($pk, $pressure, $detail);
    }
    function insertinfodoctor()
    {

        $pk = $this->input->post('pk');
        $pressure = $this->input->post('pressure');
        $detail = $this->input->post('detail');
        $this->InsertModel->insertinfodoctor($pk, $pressure, $detail);
    }
    function insertambulance()
    {
        $psid = $this->input->post('psid');
        $detail = $this->input->post('detail');
        $this->InsertModel->insertambulance($psid, $detail);
    }
}