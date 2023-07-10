<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Map extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
	}
	public function index()
	{
		$this->session->set_userdata('previous_url', current_url());

		$this->load->view('map/header');
		$this->load->view('theme/menu');
		$this->load->view('map/map');
		$this->load->view('theme/footer');
		$this->load->view('map/footer');
	}
}