<?php
defined('BASEPATH') or exit('No direct script access allowed');



class Home extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->library(['user_agent', 'session']);

		if ($this->agent->is_mobile()) {
			redirect(site_url() . '../mobile/');
		}
	}

	public function index()
	{
		$this->session->set_userdata('previous_url', current_url());

		$this->load->view('pages/header');
		$this->load->view('theme/menu');
		$this->load->view('pages/home');

		$this->load->view('theme/footer');
		$this->load->view('pages/footer');
	}

	public function about()
	{
		$this->load->view('pages/header');
		$this->load->view('theme/menu');
		$this->load->view('pages/about');
		$this->load->view('theme/footer');
		$this->load->view('pages/footer');
	}

	public function rule()
	{
		$this->load->view('pages/header');
		$this->load->view('theme/menu');
		$this->load->view('pages/rule');
		$this->load->view('theme/footer');
		$this->load->view('pages/footer');
	}

	public function permission()
	{
		$this->load->view('pages/header');
		$this->load->view('theme/menu');
		$this->load->view('pages/permission');
		$this->load->view('theme/footer');
		$this->load->view('pages/footer');
	}


	public function session()
	{
		if (isset($_SESSION['email'])) {
			echo 'success';
		}
	}
}