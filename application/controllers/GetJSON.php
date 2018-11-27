<?php

/**
 * Created by PhpStorm.
 * User: aungpoa
 * Date: 11/18/2018
 * Time: 9:36 AM
 */
class GetJSON extends CI_Controller
{
    function qgetrecruit()
    {
        echo json_encode($this->QueryModel->qgetrecruit($this->input->get('pk')));
    }
    function qmoo()
    {
        echo json_encode($this->QueryModel->qmoo());
    }
    function qtumbol()
    {
        echo json_encode($this->QueryModel->qtumbol());
    }
    function qtitle()
    {
        echo json_encode($this->QueryModel->qtitle());
    }
    function qposition()
    {
        echo json_encode($this->QueryModel->qposition());
    }
    function qdetailpersonal()
    {
        echo json_encode($this->QueryModel->qdetailpersonal($this->input->get('pk')));
    }
    function qgeteditproject()
    {
        echo json_encode($this->QueryModel->qgeteditproject($this->input->get('pk')));
    }
    function builtprojectschedule()
    {
       echo json_encode($this->QueryModel->builtprojectschedule());
    }
    function qschedule()
    {
       echo json_encode($this->QueryModel->qschedule());
    }
    function qpersonleave()
    {
        echo json_encode($this->QueryModel->qpersonleave());
    }
    function qrecruitleave()
    {
        echo json_encode($this->QueryModel->qrecruitleave());
    }
    function qdataleave()
    {
        echo json_encode($this->QueryModel->qdataleave());
    }
    function qcarlenda()
    {
        echo json_encode($this->QueryModel->qcarlenda());
    }
    function qvolunteer()
    {
        echo json_encode($this->QueryModel->qvolunteer());
    }
    function qinfodocter()
    {
       echo json_encode($this->QueryModel->qinfodocter());
    }
    function qresultdoctor()
    {
        echo json_encode($this->QueryModel->qresultdoctor());
    }
    function qrecruitamb()
    {
       echo json_encode($this->QueryModel->qrecruitamb());
    }
    function qambulance()
    {
        echo json_encode($this->QueryModel->qambulance());
    }
    function qoutofproject()
    {
        echo json_encode($this->QueryModel->qoutofproject1());
    }
}