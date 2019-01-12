<?php

/**
 * Created by PhpStorm.
 * User: aungpoa
 * Date: 11/18/2018
 * Time: 9:36 AM
 */
class QueryModel extends CI_Model
{
    function getcountcruit()
    {
        return $this->db->select('*')->from('recruit')->get()->num_rows();
    }
    function qrecruit($limit, $start)
    {
        $data = array();
        $this->db->limit($limit, $start);
        $this->db->where('rc_status',1);
        $this->db->where('rc_project',$this->session->userdata('projectid'));
        $query = $this->db->get('recruit');
        if($query->num_rows() > 0){
            foreach($query->result() as $row){
                $data[] = $row ;
            }
            return $data ;
        }
        return $data ;
    }
    function qtitle()
    {
        return $this->db->select('*')->from('title')->get()->result();
    }
    function qgetrecruit($id)
    {
        return $this->db->select('*')->from('recruit')
            ->join('moo','recruit.rc_moo = moo.mo_id')
            ->join('tumbol','recruit.rc_tumbol = tumbol.tu_id')
            ->where('rc_id',$id)->get()->result();
    }
    function qmoo()
    {
        return $this->db->select('*')->from('moo')->get()->result();
    }
    function qtumbol()
    {
        return $this->db->select('*')->from('tumbol')->get()->result();
    }
    function qposition()
    {
        return $this->db->get('position')->result();
    }
    function qcountpersonal()
    {
        return $this->db->get('personal')->num_rows();
    }
    function qpersonal($limit, $start)
    {
        $data = array();
        $query = $this->db->get('personal',$limit, $start);
        if($query->num_rows() > 0){
            foreach($query->result() as $row){
                $data[] = $row ;
            }
            return $data ;
        }
        return $data ;
    }
    function qdetailpersonal($pk)
    {
        $this->db->where('ps_id',$pk);
        $this->db->join('title','personal.ps_title = title.ti_id');
        $this->db->join('position','personal.ps_position = position.po_id');
        $this->db->join('tumbol','personal.ps_tumbol = tumbol.tu_id');
        $this->db->join('moo','personal.ps_moo = moo.mo_id');
        return $this->db->get('personal')->result();
    }
    function qcountproject()
    {
        return $this->db->get('builtproject')->num_rows();
    }
    function qproject($limit, $start)
    {
        $data= array();
        $this->db->order_by('bp_id','desc');
        $this->db->where('bp_status',1);
        $query = $this->db->get('builtproject',$limit, $start);
        if($query->num_rows() > 0){
            foreach($query->result() as $row){
                $data[] = $row ;
            }
            return $data ;
        }
        return $data ;
    }
    function qgeteditproject($pk)
    {
        return $this->db->get_where('builtproject',array('bp_id',$pk))->result();
    }
    function qcountcheckregis()
    {
        return $this->db->get('builtproject')->num_rows();
    }
    function qcheckregis($limit, $start)
    {
        $this->db->order_by('bp_id','desc');
        $this->db->join('recruit','builtproject.bp_id = recruit.rc_project');

        $query = $this->db->select("COUNT(recruit.rc_project) count,bp_before, bp_after, bp_id ")->from('builtproject',$limit, $start)->get();
        if($query->num_rows() > 0){
            foreach($query->result() as $row){
                $data[] = $row ;
            }
            return $data ;
        }
        return false ;
    }
    function builtprojectschedule()
    {
        $this->db->order_by('bp_id','desc');
        $this->db->limit(10);
        return $this->db->get('builtproject')->result();
    }
    function qschedule()
    {
        $this->db->where('sch_status',1);
        $this->db->order_by('sch_id','desc');
        $this->db->join('moo','schedule.mo_id = moo.mo_id');
        $this->db->join('builtproject','schedule.bp_id = builtproject.bp_id');
        return $this->db->get('schedule')->result();
    }
    function qpersonleave()
    {
        return $this->db->get_where('personal',array('ps_position'=>2))->result();
    }
    function qrecruitleave()
    {
        $this->db->join('recruit','builtproject.bp_id = recruit.rc_project');
        return $this->db->get_where('builtproject',array('bp_status'=>1))->result();
    }
    function qdataleave()
    {
        $this->db->where('sch_status',1);
        $this->db->order_by('le_id','desc');
        $this->db->join('recruit','leave.rc_id = recruit.rc_id');
        $this->db->join('personal','leave.ps_id = personal.ps_id');
        $this->db->join('schedule','leave.sch_id = schedule.sch_id');
        return $this->db->get('leave')->result();
    }
    function qcarlenda()
    {
        $this->db->join('recruit','leave.rc_id = recruit.rc_id');
        $this->db->join('schedule','leave.sch_id = schedule.sch_id');
        return $this->db->get_where('leave',array("ps_id"=>$this->session->userdata('userlogin'),'sch_status'=>1,'le_status'=>1))->result();
    }
    function qvolunteer()
    {
        $this->db->where('leave.rc_id',$this->session->userdata('userlogin'));
        $this->db->join('recruit','leave.rc_id = recruit.rc_id');
        $this->db->join('schedule','leave.sch_id = schedule.sch_id');
        return $this->db->get_where('leave',array("ps_id"=>$this->session->userdata('userlogin'),'sch_status'=>1,'le_status >'=>1,'le_status <'=>4))->result();
    }
    function qinfodocter()
    {
        $this->db->join('recruit','leave.rc_id = recruit.rc_id');
        $this->db->join('schedule','leave.sch_id = schedule.sch_id');
        return $this->db->get_where('leave',array("ps_id"=>$this->session->userdata('userlogin'),'sch_status'=>1,'le_status'=>2))->result();
    }
    function qresultdoctor()
    {
        $this->db->join('recruit','leave.rc_id = recruit.rc_id');
        $this->db->join('schedule','leave.sch_id = schedule.sch_id');
        return $this->db->get_where('leave',array("ps_id"=>$this->session->userdata('userlogin'),'sch_status'=>1,'le_status '=>4))->result();
    }
    function qrecruitamb()
    {
        $this->db->join('recruit','builtproject.bp_id = recruit.rc_project');
        return $this->db->get_where('builtproject',array('bp_status'=>1))->result();
    }
    function qambulance()
    {
        $this->db->where('amb_status',1);
        $this->db->where('bp_status',1);
        $this->db->join('builtproject','recruit.rc_project = builtproject.bp_id');
        $this->db->join('recruit','ambulance.amb_reid = recruit.rc_id');
        return $this->db->get('ambulance')->result();
    }
    function qcountoutofproject()
    {
        $this->db->where('rc_outofproject',1);
        $this->db->get('recruit','builtproject.bp_id = recruit.rc_project');
        return $this->db->get('builtproject')->num_rows();
    }
    function qoutofproject($limit, $start)
    {
        $this->db->order_by('bp_id','desc');
        $this->db->where('rc_outofproject',1);

        $this->db->join('recruit','builtproject.bp_id = recruit.rc_project');
        $query = $this->db->select("*")->from('builtproject',$limit, $start)->get();
        if($query->num_rows() > 0){
            foreach($query->result() as $row){
                $data[] = $row ;
            }
            return $data ;
        }
        return false ;
    }
    function qoutofproject1()
    {
        return $this->db->get('builtproject')->result();
    }
}