<?php

/**
 * Created by PhpStorm.
 * User: aungpoa
 * Date: 11/18/2018
 * Time: 9:35 AM
 */
class DeleteData extends CI_Controller
{
    function delmoo()
    {
        $pk = $this->input->post('pk');
        $this->db->where('mo_id',$pk)->delete('moo');
    }
    function deletetumbol()
    {
        $this->db->where('tu_id',$this->input->post('pk'))->delete('tumbol');
    }
    function deleterecruit()
    {
        $this->db->where('rc_id',$this->input->post('pk'))->delete('recruit');
    }
    function delpersonal()
    {
        $this->db->where('ps_id',$this->input->post('pk'))->delete('personal');
    }
    function delposition()
    {
        $this->db->where('po_id',$this->input->post('pk'))->delete('position');
    }
    function delschedule()
    {
        $this->db->where('sch_id',$this->input->post('pk'))->delete('schedule');
    }
    function delleave()
    {
        $this->db->where('le_id',$this->input->post('id'))->delete('leave');
    }
}