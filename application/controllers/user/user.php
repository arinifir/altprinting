<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        //load model admin
        $this->load->helper('auth_helper');
        $this->load->library('user_agent');
        $this->load->library('primslib');
        is_logged_in();
    }

    public function index()
    {
        $this->load->view('user/header');
        $this->load->view('user/topbar');
        $this->load->view('user/vberanda');
        $this->load->view('user/footer');
    }
}
