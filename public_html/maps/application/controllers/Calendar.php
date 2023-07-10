<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Calendar extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('user_agent');

    }
    public function index()
    {
        $this->session->set_userdata('previous_url', current_url());

        $this->load->view('calendar/header');
        $this->load->view('theme/menu');
        $this->load->view('calendar/calendar');

        $this->load->view('theme/footer');
        $this->load->view('calendar/footer');
    }

}