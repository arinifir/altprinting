<?php

class Regis extends CI_Controller
{

    function index()
    {
        $data['judul'] = 'ALT | Regis';
        $data['h_100'] = 'Regis';
        $this->load->view('templates/header', $data);
        $this->load->view('v_regis');
        $this->load->view('templates/footer');
    }
}
