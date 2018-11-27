<?php

/**
 * Created by PhpStorm.
 * User: aungpoa
 * Date: 11/18/2018
 * Time: 9:36 AM
 */
class UpdateModel extends CI_Model
{
    function updatemoo($pk, $name)
    {
       $data = array(
           'mo_name'=>$name
       );
        $this->db->where('mo_id',$pk)->update('moo',$data);
    }
    function updatetumbol($pk, $name)
    {
        $data = array(
            'tu_name'=>$name
        );
        $this->db->where('tu_id',$pk)->update('tumbol',$data);
    }
    function updaterecruit($pk, $title, $name, $lastname, $age, $number, $moo, $tumbol, $detailaddres, $detail)
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
            'rc_detail'=>$detail
        );
        $this->db->where('rc_id',$pk)->update('recruit',$data);
    }
    function updatepersonal($pk, $title, $position, $name, $noaddress, $tel, $moo, $tumbol, $detail, $userlogin, $pwd)
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
            'ps_userlogin'=>$userlogin,
            'ps_pwd'=>$pwd
        );
        $this->db->where('ps_id',$pk)->update('personal',$data);
    }
    function updateposition($pk, $name)
    {
        $this->db->where('po_id',$pk)->update('position',['po_name'=>$name]);
    }
    function updateproject($pk, $before, $after)
    {
        $data = array(
            'bp_before'=>$before,
            'bp_after'=>$after
        );
        $this->db->where('bp_id',$pk)->update('builtproject',$data);
    }
    function finishproject($pk)
    {
        $this->db->where('bp_id',$pk)->update('builtproject',['bp_status'=>2]);
    }
    function confirmperson($pk)
    {
        $this->db->where('rc_id',$pk)->update('recruit',['rc_status'=>2]);
    }
    function updateschedule($pk, $datebefore, $dateafter,$bpid, $mooid)
    {
        $data = array(
            'sch_datebefore'=>$datebefore,
            'sch_dateafter'=>$dateafter,
            'bp_id'=>$bpid,
            'mo_id'=>$mooid
        );
        $this->db->where('sch_id',$pk)->update('schedule',$data);
    }
}