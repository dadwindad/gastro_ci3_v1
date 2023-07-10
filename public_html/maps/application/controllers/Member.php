<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Member extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
        $this->session->set_userdata('previous_url', current_url());

        $this->load->view('form/css');
        $this->load->view('template/header');
        $this->load->view('template/top_menu');
        $this->load->view('template/nav_bar');

        $this->load->view('form/register');

        $this->load->view('template/footer');
        $this->load->view('form/js');
    }

    public function adding()
    {
        echo "<pre>";
        echo print_r($_POST);
        echo "</pre>";
    }

    public function login()
    {
        $this->load->view('form/css');
        $this->load->view('template/header');
        $this->load->view('template/top_menu');
        $this->load->view('template/nav_bar');

        $this->load->view('form/login');

        $this->load->view('template/footer');
        $this->load->view('form/js');
    }

    public function showLogin()
    {
        echo "<pre>";
        echo print_r($_POST);
        echo "</pre>";
    }
}