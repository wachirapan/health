<?php

/**
 * Created by PhpStorm.
 * User: aungpoa
 * Date: 11/18/2018
 * Time: 9:36 AM
 */
class InsertModel extends CI_Model
{
    function insertrecruit($title, $name, $lastname, $age, $number, $moo, $tumbol, $detailaddres, $detail)
    {
        $data = array(
            'tc_title'=>$title,
            'rc_name'=>$name,
            'rc_lastname'=>$lastname,
            'rc_age'=>$age,
            'rc_no'=>$number,
            'rc_moo'=>$moo,
            'rc_tumbol'=>$tumbol,
            'rc_detailaddress'=>$detailaddres,
            'rc_detail'=>$detail,
            'rc_status'=>1,
            'rc_project'=>$this->session->userdata('projectid'),
            'rc_outofproject'=>1
        );
        $this->db->insert('recruit',$data);
    }
    function insertmoo($mooname)
    {
        $data = array(
            'mo_name'=>$mooname
        );
        $this->db->insert('moo',$data);
    }
    function inserttumbol($name)
    {
        $data = array(
            'tu_name'=>$name
        );
        $this->db->insert('tumbol',$data);
    }
    function insertpersonal($title, $position, $name, $noaddress, $tel, $moo, $tumbol, $detail, $username, $pwd)
    {
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
    }
    function insertposition($name)
    {
        $this->db->insert('position',['po_name'=>$name]);
    }
    function insertproject($before, $after)
    {
        $data = array(
            'bp_before'=>$before,
            'bp_after'=>$after,
            'bp_status'=>1
        );
        $this->db->insert('builtproject',$data);
    }
    function insertschedule($datebefore, $dateafter, $bpid, $mooid)
    {
        $data = array(
            'sch_datebefore'=>$datebefore,
            'sch_dateafter'=>$dateafter,
            'bp_id'=>$bpid,
            'mo_id'=>$mooid,
            'sch_status'=>1
        );
        $this->db->insert('schedule',$data);
    }
    function insertleave($schedule, $person, $recruit, $detail)
    {
        $data = array(
            'sch_id'=>$schedule,
            'ps_id'=>$person,
            'rc_id'=>$recruit,
            'le_detail'=>$detail,
            'le_status'=>1
        );
        $this->db->insert('leave',$data);
    }
    function insertinfomation($pk, $pressure, $detail)
    {
        $data = array(
            'le_id'=>$pk,
            'inf_pressure'=>$pressure,
            'inf_detail'=>$detail
        );
        $this->db->insert('infomation',$data);
    }
    function insertinfodoctor($pk, $pressure, $detail)
    {
        $data = array(
            'le_id'=>$pk,
            'infd_pressure'=>$pressure,
            'infd_detail'=>$detail
        );
        $this->db->insert('infodoctor',$data);
    }
    function insertambulance($psid, $detail)
    {
        $data = array(
            'amb_reid'=>$psid,
            'amb_detail'=>$detail,
            'amb_status'=>1
        );
        $this->db->insert('ambulance',$data);
    }
}