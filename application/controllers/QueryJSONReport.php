<?php

/**
 * Created by PhpStorm.
 * User: aungpoa
 * Date: 11/21/2018
 * Time: 10:26 AM
 */
class QueryJSONReport extends CI_Controller
{
    function getdetailperson()
    {
        echo json_encode($this->QueryReport->getdetailperson($this->input->get('pk')));
    }
}