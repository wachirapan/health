<?php

/**
 * Created by PhpStorm.
 * User: aungpoa
 * Date: 11/20/2018
 * Time: 12:34 PM
 */
class QueryReport extends CI_Model
{
    function getpersonalproject($pk)
    {
        return $this->db->get_where('recruit', array('rc_project' => $pk, 'rc_status' => 1))->result();
    }

    function getdetailperson($pk)
    {
        $this->db->join('moo', 'recruit.rc_moo = moo.mo_id');
        $this->db->join('tumbol', 'recruit.rc_tumbol = tumbol.tu_id');
        return $this->db->get_where('recruit', array('rc_id' => $pk))->result();
    }

    function getfinalists($pk)
    {
        $this->db->join('moo', 'recruit.rc_moo = moo.mo_id');
        $this->db->join('tumbol', 'recruit.rc_tumbol = tumbol.tu_id');
        $this->db->join('builtproject', 'recruit.rc_project = builtproject.bp_id');
        return $this->db->get_where('recruit', array('rc_project' => $pk, 'rc_status' => 2))->result();
    }

    function qinfo($date1, $date2)
    {
        $this->db->join('recruit', 'leave.rc_id = recruit.rc_id');
        $this->db->join('leave', 'infomation.le_id = leave.le_id');
        return $this->db->get_where('infomation', array('inf_time >=' => $date1, 'inf_time <=' => $date2))->result();
    }

    function qinfodoctor($date1, $date2)
    {
        $this->db->join('recruit', 'leave.rc_id = recruit.rc_id');
        $this->db->join('leave', 'infomation.le_id = leave.le_id');
        return $this->db->get_where('infomation', array('inf_time >=' => $date1, 'inf_time <=' => $date2))->result();
    }

    function reportdetailhospital($datebefore, $dateafter)
    {
        $this->db->join('recruit','ambulance.amb_reid = recruit.rc_id');
        return $this->db->get_where('ambulance',array('amb_time >='=>$datebefore,'amb_time <='=>$dateafter))->result();
    }
    function reportoutproject($id)
    {
        $this->db->join('builtproject','recruit.rc_project = builtproject.bp_id');
        return $this->db->get_where('recruit',array('rc_outofproject'=>2,'bp_id'=>$id))->result();
    }
}